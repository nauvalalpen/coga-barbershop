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
    public function create()
    {
        $rules = [
            'layanan_id' => 'required',
            'kapster_id' => 'required',
            'tanggal_booking' => 'required|valid_date',
            'jam_booking' => 'required',
        ];
        // TODO: Tambahkan validasi untuk memastikan slot waktu belum di-book

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $bookingModel = new BookingModel();
        $bookingModel->save([
            'pelanggan_id' => session()->get('user_id'),
            'layanan_id' => $this->request->getPost('layanan_id'),
            'kapster_id' => $this->request->getPost('kapster_id'),
            'tanggal_booking' => $this->request->getPost('tanggal_booking'),
            'jam_booking' => $this->request->getPost('jam_booking'),
            'status' => 'confirmed'
        ]);

        return redirect()->to('/my-bookings')->with('success', 'Booking Anda berhasil dibuat!');
    }
}
