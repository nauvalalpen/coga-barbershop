<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\KapsterModel;

class BookingController extends BaseController
{
    // Untuk Admin & Kapster: Melihat daftar semua booking
    public function index()
    {
        $bookingModel = new BookingModel();
        $filters = [];

        // Jika yang login adalah Kapster, filter hanya booking untuknya
        if (session()->get('role') === 'kapster') {
            $kapsterModel = new KapsterModel();
            $kapster = $kapsterModel->where('user_id', session()->get('user_id'))->first();
            if ($kapster) {
                $filters['kapster_id'] = $kapster->id;
            }
        }

        $data['bookings'] = $bookingModel->getBookings($filters);
        return view('admin/bookings/index', $data);
    }

    // Untuk Admin & Kapster: Mengubah status booking
    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        $validStatus = ['confirmed', 'completed', 'cancelled'];
        if (!in_array($status, $validStatus)) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $bookingModel = new BookingModel();

        // TODO: Tambahkan security check untuk memastikan kapster hanya bisa mengubah status booking-nya sendiri

        $bookingModel->update($id, ['status' => $status]);

        return redirect()->to('/admin/bookings')->with('success', 'Status booking berhasil diperbarui.');
    }
}
