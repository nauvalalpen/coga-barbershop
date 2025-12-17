<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KapsterModel;
use App\Models\TransaksiCukurModel;
use App\Models\UserModel;
use App\Models\BookingModel; // Pastikan model ini di-use
use CodeIgniter\I18n\Time;

class DashboardController extends BaseController
{
    public function index()
    {
        $transaksiModel = new TransaksiCukurModel();
        $userModel = new UserModel();
        $kapsterModel = new KapsterModel();
        $bookingModel = new BookingModel();

        $currentMonth = date('m');
        $currentYear = date('Y');
        $startDate = date('Y-m-01 00:00:00');
        $endDate = date('Y-m-t 23:59:59');
        $today = date('Y-m-d');

        // --- 1. DATA KARTU UTAMA (Tetap sama) ---
        $pendapatanBulanIni = $transaksiModel->selectSum('harga_saat_transaksi')
            ->where('created_at >=', $startDate)->where('created_at <=', $endDate)
            ->first()->harga_saat_transaksi ?? 0;

        $transaksiBulanIni = $transaksiModel->where('created_at >=', $startDate)
            ->where('created_at <=', $endDate)->countAllResults();

        $pelangganBaruBulanIni = $userModel->where('role', 'pelanggan')
            ->where('created_at >=', $startDate)->where('created_at <=', $endDate)->countAllResults();

        $kapsterAktif = $kapsterModel->where('status', 'aktif')->countAllResults();

        // --- 2. DATA QUICK STATS (Baru) ---
        $todayBookings = $bookingModel->like('tanggal_booking', $today)->countAllResults();

        // Menghitung booking minggu ini (Senin - Minggu)
        $monday = date('Y-m-d', strtotime('monday this week'));
        $sunday = date('Y-m-d', strtotime('sunday this week'));
        $weekBookings = $bookingModel->where('tanggal_booking >=', $monday)
            ->where('tanggal_booking <=', $sunday)
            ->countAllResults();

        $completedBookings = $bookingModel->where('status', 'completed')->countAllResults();
        $pendingBookings = $bookingModel->where('status', 'confirmed')->countAllResults(); // Confirmed dianggap pending eksekusi

        // --- 3. DATA RECENT ACTIVITY (Baru & Dinamis) ---
        $activities = [];

        // Ambil 3 Booking Terakhir
        $latestBookings = $bookingModel->getBookings(); // Menggunakan method join yang sudah ada
        // Kita limit manual array_slice nanti atau ambil 3 teratas jika model mendukung limit
        foreach (array_slice($latestBookings, 0, 3) as $b) {
            $activities[] = [
                'type' => 'booking',
                'title' => 'New booking received',
                'desc' => $b->nama_pelanggan . ' - ' . $b->nama_layanan,
                'time' => $b->created_at, // Pastikan created_at ada di model booking
                'icon' => 'fas fa-calendar-check',
                'color' => 'booking' // class CSS
            ];
        }

        // Ambil 3 Transaksi Terakhir
        $latestTrans = $transaksiModel->getTransactions();
        foreach (array_slice($latestTrans, 0, 3) as $t) {
            $activities[] = [
                'type' => 'payment',
                'title' => 'Payment completed',
                'desc' => 'Rp ' . number_format($t->harga_saat_transaksi, 0, ',', '.'),
                'time' => $t->created_at,
                'icon' => 'fas fa-money-bill-wave',
                'color' => 'payment'
            ];
        }

        // Ambil 3 User Baru Terakhir
        $latestUsers = $userModel->where('role', 'pelanggan')->orderBy('created_at', 'DESC')->findAll(3);
        foreach ($latestUsers as $u) {
            $activities[] = [
                'type' => 'user',
                'title' => 'New customer registered',
                'desc' => $u->nama,       // Gunakan ->nama
                'time' => $u->created_at, // Gunakan ->created_at
                'icon' => 'fas fa-user-plus',
                'color' => 'user'
            ];
        }

        // Gabungkan semua aktivitas dan urutkan berdasarkan waktu (Terbaru ke Terlama)
        usort($activities, function ($a, $b) {
            return strtotime($b['time']) - strtotime($a['time']);
        });

        // Ambil hanya 5 aktivitas terbaru untuk ditampilkan
        $recentActivities = array_slice($activities, 0, 5);

        $data = [
            'pendapatan_bulan_ini'     => $pendapatanBulanIni,
            'transaksi_bulan_ini'      => $transaksiBulanIni,
            'pelanggan_baru_bulan_ini' => $pelangganBaruBulanIni,
            'jumlah_kapster'           => $kapsterAktif,
            'nama_bulan'               => date('F'),
            // Data Baru
            'today_bookings'           => $todayBookings,
            'week_bookings'            => $weekBookings,
            'completed_total'          => $completedBookings,
            'pending_total'            => $pendingBookings,
            'recent_activities'        => $recentActivities
        ];

        return view('admin/dashboard', $data);
    }
}
