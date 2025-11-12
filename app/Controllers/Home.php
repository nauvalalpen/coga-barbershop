<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('pelanggan/homepage');
    }

    public function contact()
    {
        return view('pelanggan/contact');
    }

    public function sendMessage()
    {
        $rules = [
            'name'    => ['label' => 'Nama', 'rules' => 'required'],
            'email'   => ['label' => 'Email', 'rules' => 'required|valid_email'],
            'subject' => ['label' => 'Subjek', 'rules' => 'required'],
            'message' => ['label' => 'Pesan', 'rules' => 'required'],
        ];

        $messages = [
            'email' => [
                'valid_email' => 'Mohon masukkan alamat email yang valid.'
            ]
        ];

        if (! $this->validate($rules, $messages)) { // Kirim pesan kustom ke validator
            return redirect()->to('/contact')->withInput()->with('errors', $this->validator->getErrors());
        }

        // if (! $this->validate($rules)) {
        //     return redirect()->to('/contact')->withInput()->with('errors', $this->validator->getErrors());
        // }

        $emailService = \Config\Services::email();

        $visitorName = $this->request->getPost('name');
        $visitorEmail = $this->request->getPost('email');
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('message');

        // --- PERBAIKAN LOGIKA PENGIRIMAN EMAIL ---

        // 1. Email akan selalu DIKIRIM OLEH akun Anda di .env
        // $emailService->setFrom('nauvalalpenperdana@gmail.com', 'Coga Barbershop Contact Form'); // Opsional, bisa dihapus karena sudah ada di .env

        // 2. Email DIKIRIM KEPADA Anda (admin)
        $emailService->setTo('nauvalalpenperdana@gmail.com'); // Ganti dengan email admin Anda

        // 3. (PENTING) Atur Reply-To ke alamat email pengunjung
        $emailService->setReplyTo($visitorEmail, $visitorName);

        // 4. Buat subjek yang informatif
        $emailService->setSubject("[Pesan Kontak] " . $subject);

        // 5. Buat isi pesan yang lebih informatif
        $emailBody = "Anda menerima pesan baru dari formulir kontak:<br><br>" .
            "<b>Nama:</b> " . esc($visitorName) . "<br>" .
            "<b>Email:</b> " . esc($visitorEmail) . "<br>" .
            "<b>Subjek:</b> " . esc($subject) . "<br><br>" .
            "<b>Pesan:</b><br>" . nl2br(esc($message));

        $emailService->setMessage($emailBody);

        if ($emailService->send()) {
            return redirect()->to('/contact')->with('success', 'Pesan Anda telah berhasil terkirim. Kami akan segera merespons.');
        } else {
            log_message('error', $emailService->printDebugger(['headers']));
            return redirect()->to('/contact')->withInput()->with('error', 'Gagal mengirim pesan. Silakan coba lagi nanti.');
        }
    }
}
