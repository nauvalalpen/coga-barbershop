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
}
