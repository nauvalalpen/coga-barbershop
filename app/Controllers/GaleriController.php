<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GaleriModel;

class GaleriController extends BaseController
{
    public function index()
    {
        $galeriModel = new GaleriModel();
        $data['galeri'] = $galeriModel->findAll();

        return view('pelanggan/galeri/index', $data);
    }

    public function show($id)
    {
        $galeriModel = new \App\Models\GaleriModel();
        $item = $galeriModel->find($id);

        // If the item doesn't exist, show a 404 page
        if ($item === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['item'] = $item;

        return view('pelanggan/galeri/show', $data);
    }
}
