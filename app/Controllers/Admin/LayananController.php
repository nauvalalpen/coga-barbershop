<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananModel;
// validator


class LayananController extends BaseController
{
    /**
     * Menampilkan halaman daftar layanan utama.
     */
    public function index()
    {
        $layananModel = new LayananModel();
        $data['layanan'] = $layananModel->findAll();

        return view('admin/layanan/index', $data);
    }

    /**
     * Menampilkan view form 'create' (sebagai potongan HTML untuk modal).
     */
    public function new()
    {
        // Metode ini hanya merender file view parsial, tanpa layout.
        return view('admin/layanan/create');
    }

    /**
     * Memproses data dari form 'create'.
     */
    public function create()
    {
        $rules = [
            'nama_layanan' => 'required|is_unique[layanans.nama_layanan]',
            'harga'        => 'required|numeric',
            'durasi_menit' => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            // Jika validasi gagal, kembalikan ke halaman index dengan error.
            // Sayangnya, dengan pendekatan ini, modal tidak akan terbuka otomatis.
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
     * Menampilkan view form 'edit' (sebagai potongan HTML untuk modal).
     */
    public function edit($id)
    {
        $layananModel = new LayananModel();
        $data['layanan'] = $layananModel->find($id);

        if (empty($data['layanan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Layanan tidak ditemukan.');
        }

        // Metode ini hanya merender file view parsial, tanpa layout.
        return view('admin/layanan/edit', $data);
    }

    /**
     * Memproses data dari form 'edit'.
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
     * Menghapus sebuah layanan.
     */
    public function delete($id)
    {
        $layananModel = new LayananModel();
        $layananModel->delete($id);
        return redirect()->to('/admin/layanan')->with('success', 'Layanan berhasil dihapus.');
    }
}
