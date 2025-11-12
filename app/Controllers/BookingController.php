<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\LayananModel;
use App\Models\KapsterModel;

class BookingController extends BaseController
{
    // Untuk Pelanggan: Melihat riwayat booking-nya sendiri
    public function index()
    {
        $bookingModel = new BookingModel();
        $data['bookings'] = $bookingModel->getBookings(['pelanggan_id' => session()->get('user_id')]);
        return view('pelanggan/booking/index', $data);
    }

    // Untuk Pelanggan: Menampilkan form booking
    public function new()
    {
        $layananModel = new \App\Models\LayananModel();
        $kapsterModel = new \App\Models\KapsterModel();

        // Ambil kapster_id dari URL, jika ada.
        $selectedKapsterId = $this->request->getGet('kapster_id');

        $data = [
            'layanans'           => $layananModel->findAll(),
            'kapsters'           => $kapsterModel->getKapstersWithUserDetails(),
            'selected_kapster_id' => $selectedKapsterId // Kirim ID kapster yang dipilih ke view
        ];

        return view('pelanggan/booking/create', $data);
    }

    // Untuk Pelanggan: Memproses booking baru
    // app/Controllers/BookingController.php

    // app/Controllers/BookingController.php

    public function create()
    {
        $rules = [
            'layanan_id'      => 'required|is_natural_no_zero',
            'kapster_id'      => 'required|is_natural_no_zero',
            'tanggal_booking' => 'required|valid_date',
            'jam_booking'     => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil semua data input
        $layananId = $this->request->getPost('layanan_id');
        $kapsterId = $this->request->getPost('kapster_id');
        $tanggal = $this->request->getPost('tanggal_booking');
        $jam = $this->request->getPost('jam_booking');

        // --- VALIDASI BARU: MENCEGAH BOOKING WAKTU LAMPAU ---

        // Gabungkan tanggal dan jam menjadi satu string datetime
        $waktuBooking = $tanggal . ' ' . $jam;

        // Dapatkan waktu saat ini
        $waktuSekarang = date('Y-m-d H:i:s');

        // Bandingkan
        if ($waktuBooking < $waktuSekarang) {
            return redirect()->back()->withInput()->with('error', 'Anda tidak dapat membuat booking untuk waktu yang sudah lewat.');
        }

        // --- LOGIKA VALIDASI JADWAL (dari sebelumnya, tetap ada) ---

        $layananModel = new \App\Models\LayananModel();
        $layanan = $layananModel->find($layananId);
        if (!$layanan) {
            return redirect()->back()->withInput()->with('error', 'Layanan yang dipilih tidak valid.');
        }
        $durasi = $layanan->durasi_menit;

        $bookingModel = new BookingModel();
        $isAvailable = $bookingModel->isScheduleAvailable($kapsterId, $tanggal, $jam, $durasi);

        if (!$isAvailable) {
            return redirect()->back()->withInput()->with('error', 'Maaf, jadwal pada tanggal dan jam tersebut untuk kapster yang dipilih sudah tidak tersedia. Silakan pilih waktu lain.');
        }

        // --- JIKA JADWAL TERSEDIA, LANJUTKAN PENYIMPANAN ---

        $bookingModel->save([
            'pelanggan_id'    => session()->get('user_id'),
            'layanan_id'      => $layananId,
            'kapster_id'      => $kapsterId,
            'tanggal_booking' => $tanggal,
            'jam_booking'     => $jam,
            'status'          => 'confirmed'
        ]);

        return redirect()->to('/my-bookings')->with('success', 'Booking Anda berhasil dibuat!');
    }
}
