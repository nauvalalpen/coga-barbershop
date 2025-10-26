<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriModel;

class GaleriController extends BaseController
{
    /**
     * Menampilkan daftar item galeri.
     */
    public function index()
    {
        $galeriModel = new GaleriModel();
        $data['galeri'] = $galeriModel->findAll();
        return view('admin/galeri/index', $data);
    }

    /**
     * Menampilkan view form 'create' (sebagai potongan HTML untuk modal).
     */
    public function new()
    {
        return view('admin/galeri/create');
    }

    /**
     * Memproses data dari form 'create'.
     */
    public function create()
    {
        $rules = [
            'judul'  => 'required',
            'gambar' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]',
        ];

        if (! $this->validate($rules)) {
            // Jika validasi gagal, kembalikan ke halaman index.
            // Modal perlu dibuka manual lagi oleh user.
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $gambar = $this->request->getFile('gambar');
        $namaGambar = $gambar->getRandomName();
        $gambar->move('uploads/galeri', $namaGambar);

        $galeriModel = new GaleriModel();
        $galeriModel->save([
            'judul'      => $this->request->getPost('judul'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'url_gambar' => $namaGambar,
        ]);

        return redirect()->to('/admin/galeri')->with('success', 'Gambar baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan view form 'edit' (sebagai potongan HTML untuk modal).
     */
    public function edit($id)
    {
        $galeriModel = new GaleriModel();
        $data['item'] = $galeriModel->find($id);

        if (empty($data['item'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Item galeri tidak ditemukan.');
        }

        return view('admin/galeri/edit', $data);
    }

    /**
     * Memproses data dari form 'edit'.
     */
    public function update($id)
    {
        $rules = ['judul' => 'required'];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $galeriModel = new GaleriModel();
        $galeriModel->update($id, [
            'judul'     => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/admin/galeri')->with('success', 'Informasi gambar berhasil diperbarui.');
    }

    /**
     * Menghapus item galeri.
     */
    public function delete($id)
    {
        $galeriModel = new GaleriModel();
        $item = $galeriModel->find($id);
        if ($item) {
            $filePath = 'uploads/galeri/' . $item->url_gambar;
            if (file_exists($filePath)) unlink($filePath);
            $galeriModel->delete($id);
            return redirect()->to('/admin/galeri')->with('success', 'Gambar berhasil dihapus.');
        }
        return redirect()->to('/admin/galeri')->with('error', 'Item galeri tidak ditemukan.');
    }
}
