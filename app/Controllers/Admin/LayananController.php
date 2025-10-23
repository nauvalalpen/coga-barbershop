<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananModel;

class LayananController extends BaseController
{
    /**
     * Display a list of all services for the admin.
     */
    public function index()
    {
        $layananModel = new LayananModel();
        $data['layanan'] = $layananModel->findAll();

        return view('admin/layanan/index', $data);
    }

    /**
     * Show the form for creating a new service.
     */
    public function new()
    {
        return view('admin/layanan/create');
    }

    /**
     * Process the creation of a new service.
     */
    public function create()
    {
        $rules = [
            'nama_layanan' => 'required|is_unique[layanans.nama_layanan]',
            'harga'        => 'required|numeric',
            'durasi_menit' => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $layananModel = new LayananModel();
        $layananModel->save([
            'nama_layanan' => $this->request->getPost('nama_layanan'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'harga'        => $this->request->getPost('harga'),
            'durasi_menit' => $this->request->getPost('durasi_menit'),
        ]);

        return redirect()->to('/admin/layanan')->with('success', 'Layanan baru berhasil ditambahkan.');
    }

    /**
     * Show the form for editing a specific service.
     */
    public function edit($id)
    {
        $layananModel = new LayananModel();
        $data['layanan'] = $layananModel->find($id);

        if (empty($data['layanan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Layanan tidak ditemukan.');
        }

        return view('admin/layanan/edit', $data);
    }

    /**
     * Process the update of a specific service.
     */
    public function update($id)
    {
        $rules = [
            'nama_layanan' => "required|is_unique[layanans.nama_layanan,id,{$id}]",
            'harga'        => 'required|numeric',
            'durasi_menit' => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $layananModel = new LayananModel();
        $layananModel->update($id, [
            'nama_layanan' => $this->request->getPost('nama_layanan'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'harga'        => $this->request->getPost('harga'),
            'durasi_menit' => $this->request->getPost('durasi_menit'),
        ]);

        return redirect()->to('/admin/layanan')->with('success', 'Data layanan berhasil diperbarui.');
    }

    /**
     * Delete a service.
     */
    public function delete($id)
    {
        $layananModel = new LayananModel();
        $layananModel->delete($id);

        return redirect()->to('/admin/layanan')->with('success', 'Layanan berhasil dihapus.');
    }
}
