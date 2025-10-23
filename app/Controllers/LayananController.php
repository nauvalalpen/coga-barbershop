<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LayananModel;

class LayananController extends BaseController
{
    /**
     * Display a public list of all services.
     */
    public function index()
    {
        $layananModel = new LayananModel();
        $data['layanan'] = $layananModel->findAll();

        return view('pelanggan/layanan/index', $data);
    }
}
