<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KapsterModel;
use App\Models\TransaksiCukurModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $transaksiModel = new TransaksiCukurModel();
        $userModel = new UserModel();
        $kapsterModel = new KapsterModel();

        // Prepare data for the stat cards
        $data = [
            'total_pendapatan' => $transaksiModel->selectSum('harga_saat_transaksi')->first()->harga_saat_transaksi ?? 0,
            'jumlah_transaksi' => $transaksiModel->countAllResults(),
            'jumlah_pelanggan' => $userModel->where('role', 'pelanggan')->countAllResults(),
            'jumlah_kapster'   => $kapsterModel->countAllResults(),
        ];

        return view('admin/dashboard', $data);
    }
}
