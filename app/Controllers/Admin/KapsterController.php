<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KapsterModel;
use App\Models\UserModel;

class KapsterController extends BaseController
{
    /**
     * Display a list of all kapsters for the admin.
     */
    public function index()
    {
        $kapsterModel = new KapsterModel();
        $data['kapsters'] = $kapsterModel->getKapstersWithUserDetails();

        return view('admin/kapsters/index', $data);
    }

    /**
     * Show the form for creating a new kapster.
     */
    public function new()
    {
        return view('admin/kapsters/create');
    }

    /**
     * Process the creation of a new kapster.
     */
    public function create()
    {
        // 1. Validation Rules
        $rules = [
            'nama' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'foto_profil' => 'uploaded[foto_profil]|max_size[foto_profil,1024]|is_image[foto_profil]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Handle File Upload
        $foto = $this->request->getFile('foto_profil');
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads/kapsters', $namaFoto);

        // 3. Use a transaction for safety
        $db = \Config\Database::connect();
        $db->transStart();

        // 4. Create User first
        $userModel = new UserModel();
        $userId = $userModel->insert([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role' => 'kapster',
            'verified_at' => date('Y-m-d H:i:s') // Kapsters are verified by admin
        ]);

        // 5. Create Kapster profile
        $kapsterModel = new KapsterModel();
        $kapsterModel->insert([
            'user_id' => $userId,
            'spesialisasi' => $this->request->getPost('spesialisasi'),
            'foto_profil' => $namaFoto,
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->withInput()->with('error', 'Gagal membuat kapster.');
        }

        return redirect()->to('/admin/kapsters')->with('success', 'Kapster baru berhasil ditambahkan.');
    }

    // Methods for edit, update, and delete will go here...
    public function edit($id)
    {
        $kapsterModel = new KapsterModel();
        $data['kapster'] = $kapsterModel->findKapsterWithUserDetails($id);

        if (empty($data['kapster'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kapster tidak ditemukan: ' . $id);
        }

        return view('admin/kapsters/edit', $data);
    }

    /**
     * Process the update of a specific kapster.
     */
    public function update($id)
    {
        $kapsterModel = new KapsterModel();
        $kapster = $kapsterModel->find($id);

        // 1. Validation Rules
        $rules = [
            'nama' => 'required',
            'email' => "required|valid_email|is_unique[users.email,id,{$kapster->user_id}]", // Ignore self on unique check
            'spesialisasi' => 'permit_empty',
            'status' => 'required|in_list[aktif,tidak_aktif]',
        ];

        // Optional password validation
        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[8]';
        }

        // Optional photo validation
        if ($this->request->getFile('foto_profil')->isValid()) {
            $rules['foto_profil'] = 'max_size[foto_profil,1024]|is_image[foto_profil]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Prepare Data
        $userData = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
        ];
        if ($this->request->getPost('password')) {
            $userData['password'] = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        }

        $kapsterData = [
            'spesialisasi' => $this->request->getPost('spesialisasi'),
            'status' => $this->request->getPost('status'),
        ];

        // 3. Handle Optional File Upload
        $foto = $this->request->getFile('foto_profil');
        if ($foto->isValid() && !$foto->hasMoved()) {
            // Delete old photo if it exists
            if ($kapster->foto_profil && file_exists('uploads/kapsters/' . $kapster->foto_profil)) {
                unlink('uploads/kapsters/' . $kapster->foto_profil);
            }
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/kapsters', $namaFoto);
            $kapsterData['foto_profil'] = $namaFoto;
        }

        // 4. Update Database using a transaction
        $db = \Config\Database::connect();
        $db->transStart();

        $userModel = new UserModel();
        $userModel->update($kapster->user_id, $userData);

        $kapsterModel->update($id, $kapsterData);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data kapster.');
        }

        return redirect()->to('/admin/kapsters')->with('success', 'Data kapster berhasil diperbarui.');
    }
    public function delete($id)
    {
        $kapsterModel = new KapsterModel();
        $kapster = $kapsterModel->find($id);

        if ($kapster) {
            // Delete the user record. The foreign key's CASCADE will handle deleting the kapster record.
            $userModel = new UserModel();
            $userModel->delete($kapster->user_id);

            // Delete the profile photo file
            if ($kapster->foto_profil && file_exists('uploads/kapsters/' . $kapster->foto_profil)) {
                unlink('uploads/kapsters/' . $kapster->foto_profil);
            }

            return redirect()->to('/admin/kapsters')->with('success', 'Kapster berhasil dihapus.');
        }

        return redirect()->to('/admin/kapsters')->with('error', 'Kapster tidak ditemukan.');
    }
}
