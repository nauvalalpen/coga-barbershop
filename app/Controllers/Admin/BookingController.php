<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\KapsterModel;
use App\Models\TransaksiCukurModel; // Pastikan ini di-import
use App\Models\LayananModel;        // Pastikan ini di-import

class BookingController extends BaseController
{
    /**
     * Menampilkan daftar booking.
     * Admin melihat semua, Kapster hanya melihat miliknya.
     */
    public function index()
    {
        $bookingModel = new BookingModel();
        $filters = [];

        // Jika yang login adalah Kapster, filter hanya booking untuknya
        if (session()->get('role') === 'kapster') {
            $kapsterModel = new KapsterModel();
            // Ambil data kapster berdasarkan user_id yang login
            $kapster = $kapsterModel->where('user_id', session()->get('user_id'))->first();

            // Jika profil kapster ditemukan, terapkan filter
            if ($kapster) {
                $filters['kapster_id'] = $kapster->id;
            } else {
                // Jika profil kapster tidak ada (error/data tidak sinkron), jangan tampilkan booking apa pun
                $filters['kapster_id'] = 0; // ID yang tidak mungkin ada
            }
        }

        $data['bookings'] = $bookingModel->getBookings($filters);
        return view('admin/bookings/index', $data);
    }

    /**
     * Memperbarui status booking.
     * Jika status diubah menjadi 'completed', secara otomatis membuat catatan transaksi cukur.
     */
    public function updateStatus($id)
    {
        // 1. Validasi input status
        $status = $this->request->getPost('status');
        $validStatus = ['confirmed', 'completed', 'cancelled'];
        if (!in_array($status, $validStatus)) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $bookingModel = new BookingModel();
        $booking = $bookingModel->find($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking tidak ditemukan.');
        }

        // 2. Security Check: Pastikan pengguna berhak mengubah status
        if (session()->get('role') === 'kapster') {
            $kapsterModel = new KapsterModel();
            $kapster = $kapsterModel->where('user_id', session()->get('user_id'))->first();

            // Tolak jika kapster mencoba mengubah booking yang bukan miliknya
            if (!$kapster || $booking->kapster_id != $kapster->id) {
                return redirect()->to('/admin/bookings')->with('error', 'Anda tidak berhak mengubah status booking ini.');
            }
        }

        // 3. Logika Inti: Buat catatan transaksi jika status baru adalah 'completed'
        //    dan status sebelumnya bukan 'completed' (untuk mencegah duplikasi)
        if ($status === 'completed' && $booking->status !== 'completed') {

            $layananModel = new LayananModel();
            $layanan = $layananModel->find($booking->layanan_id);

            // Pastikan data layanan ada sebelum membuat transaksi
            if ($layanan) {
                $transaksiModel = new TransaksiCukurModel();
                $transaksiModel->save([
                    'kapster_id'           => $booking->kapster_id,
                    'layanan_id'           => $booking->layanan_id,
                    'harga_saat_transaksi' => $layanan->harga,
                    'created_at'           => date('Y-m-d H:i:s') // Catat waktu saat layanan diselesaikan
                ]);
            } else {
                // Jika layanan terkait sudah dihapus, beri pesan error
                return redirect()->to('/admin/bookings')->with('error', 'Gagal membuat catatan: Layanan tidak ditemukan.');
            }
        }

        // 4. Update status booking di database
        $bookingModel->update($id, ['status' => $status]);

        return redirect()->to('/admin/bookings')->with('success', 'Status booking berhasil diperbarui.');
    }
}
