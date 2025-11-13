<?php

namespace App\Controllers;

use App\Models\GaleriModel;

class GaleriController extends BaseController
{
    public function index()
    {
        $model = new GaleriModel();

        $data = [
            'galeri' => $model->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('pelanggan/galeri/index', $data);
    }

    public function show($id)
    {
        $model = new GaleriModel();
        $item = $model->find($id);

        if (!$item) {
            return redirect()->to('/galeri')->with('error', 'Gallery item not found');
        }

        $data = [
            'item' => $item
        ];

        return view('pelanggan/galeri/show', $data);
    }
}
