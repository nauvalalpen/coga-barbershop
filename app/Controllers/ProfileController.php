<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    /**
     * Menampilkan halaman profil pengguna yang sedang login.
     */
    public function index()
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find(session()->get('user_id'));

        return view('pelanggan/profile/index', $data);
    }

    /**
     * Memproses pembaruan data profil.
     */
    public function update()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        // 1. Aturan Validasi
        $rules = [
            'nama'      => 'required',
            'no_telpon' => 'permit_empty|min_length[10]|max_length[15]',
            // Email harus unik, tapi abaikan email milik user itu sendiri
            'email'     => "required|valid_email|is_unique[users.email,id,{$userId}]",
        ];

        // Tambahkan validasi password hanya jika field password diisi
        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[8]';
            $rules['pass_confirm'] = 'matches[password]';
        }

        if (! $this->validate($rules)) {
            return redirect()->to('/my-profile')->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Siapkan Data untuk Disimpan
        $dataToUpdate = [
            'nama'      => $this->request->getPost('nama'),
            'email'     => $this->request->getPost('email'),
            'no_telpon' => $this->request->getPost('no_telpon'),
        ];

        // Tambahkan password ke data update hanya jika diisi
        if ($this->request->getPost('password')) {
            $dataToUpdate['password'] = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        }

        // 3. Update data di database
        if ($userModel->update($userId, $dataToUpdate)) {
            // Update juga data di session agar nama di navbar ikut berubah
            session()->set('nama', $dataToUpdate['nama']);
            session()->set('email', $dataToUpdate['email']);

            return redirect()->to('/my-profile')->with('success', 'Profil berhasil diperbarui.');
        } else {
            return redirect()->to('/my-profile')->with('error', 'Gagal memperbarui profil.');
        }
    }
}
