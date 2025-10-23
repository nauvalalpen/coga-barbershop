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
            'name'    => 'required',
            'email'   => 'required|valid_email',
            'subject' => 'required',
            'message' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to('/contact')->withInput()->with('errors', $this->validator->getErrors());
        }

        // --- Email Sending Logic ---
        $email = \Config\Services::email();

        // Set who the email is to
        $email->setTo('nauvalalpenperdana@gmail.com'); // Ganti dengan email admin Anda

        // Set who the email is from
        $email->setFrom($this->request->getPost('email'), $this->request->getPost('name'));

        // Set the subject
        $subject = "[Pesan Kontak] " . $this->request->getPost('subject');
        $email->setSubject($subject);

        // Set the message
        $email->setMessage($this->request->getPost('message'));

        if ($email->send()) {
            return redirect()->to('/contact')->with('success', 'Pesan Anda telah berhasil terkirim. Kami akan segera merespons.');
        } else {
            // You can log the error for debugging
            log_message('error', $email->printDebugger(['headers']));
            return redirect()->to('/contact')->withInput()->with('error', 'Gagal mengirim pesan. Silakan coba lagi nanti.');
        }
    }
}
