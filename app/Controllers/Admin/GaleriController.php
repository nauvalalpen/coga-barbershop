<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriModel;

class GaleriController extends BaseController
{
    /**
     * Display a list of all gallery items for the admin.
     */
    public function index()
    {
        $galeriModel = new GaleriModel();
        $data['galeri'] = $galeriModel->findAll();

        return view('admin/galeri/index', $data);
    }

    /**
     * Show the form for uploading a new gallery image.
     */
    public function new()
    {
        return view('admin/galeri/create');
    }

    /**
     * Process the upload of a new gallery image.
     */
    public function create()
    {
        $rules = [
            'judul' => 'required',
            'gambar' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $gambar = $this->request->getFile('gambar');
        $namaGambar = $gambar->getRandomName();
        $gambar->move('uploads/galeri', $namaGambar);

        // Save to database
        $galeriModel = new GaleriModel();
        $galeriModel->save([
            'judul'      => $this->request->getPost('judul'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'url_gambar' => $namaGambar, // Save the filename
        ]);

        return redirect()->to('/admin/galeri')->with('success', 'Gambar baru berhasil ditambahkan ke galeri.');
    }

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
     * Process the update of a gallery item.
     */
    public function update($id)
    {
        $rules = [
            'judul' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $galeriModel = new GaleriModel();
        $galeriModel->update($id, [
            'judul'      => $this->request->getPost('judul'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/admin/galeri')->with('success', 'Informasi gambar berhasil diperbarui.');
    }

    /**
     * Delete a gallery item.
     */
    public function delete($id)
    {
        $galeriModel = new GaleriModel();
        $item = $galeriModel->find($id);

        if ($item) {
            // Delete the image file from the server
            $filePath = 'uploads/galeri/' . $item->url_gambar;
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Delete the record from the database
            $galeriModel->delete($id);

            return redirect()->to('/admin/galeri')->with('success', 'Gambar berhasil dihapus dari galeri.');
        }

        return redirect()->to('/admin/galeri')->with('error', 'Item galeri tidak ditemukan.');
    }
}
