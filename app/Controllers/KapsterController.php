<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KapsterModel;

class KapsterController extends BaseController
{
    /**
     * Display a public list of all kapsters.
     */
    public function index()
    {
        $kapsterModel = new KapsterModel();
        $data['kapsters'] = $kapsterModel->getKapstersWithUserDetails();

        return view('pelanggan/kapsters/index', $data);
    }
}
