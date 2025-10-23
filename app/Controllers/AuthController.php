<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    // Display the registration form
    public function showRegisterForm()
    {
        return view('auth/register'); // We will create this view
    }

    // Process the registration data
    public function register()
    {
        // 1. Define Validation Rules (Cleanly)
        $rules = [
            'nama' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'no_telpon' => 'permit_empty|min_length[10]|max_length[15]',
            'password' => 'required|min_length[8]',
            'pass_confirm' => 'required|matches[password]',
        ];

        // 2. Validate the input
        if (! $this->validate($rules)) {
            // If validation fails, return to the form with errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 3. If validation is successful, save the user
        $userModel = new UserModel();
        $verificationCode = random_int(100000, 999999);
        $expiryTime = date('Y-m-d H:i:s', time() + (15 * 60));
        $userModel->save([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_telpon' => $this->request->getPost('no_telpon'),
            // IMPORTANT: Never store plain text passwords! Hash it.
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role' => 'pelanggan', // Default role for registration
            'verification_code'         => $verificationCode,
            'verification_expires_at'   => $expiryTime,
        ]);
        $this->sendVerificationCodeEmail($this->request->getPost('email'), $verificationCode);

        // Store the email in the session and redirect to the verification page
        session()->set('email_for_verification', $this->request->getPost('email'));


        // 4. Redirect to login page with a success message
        return redirect()->to('/verify-email')->with('success', 'Registrasi berhasil! Kode 6 digit telah dikirim ke email Anda.');
    }

    // Add these to app/Controllers/AuthController.php

    // Display the login form
    public function showLoginForm()
    {
        return view('auth/login'); // We will create this view
    }

    // Process the login attempt
    public function login()
    {
        // 1. Validation Rules
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Get credentials
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // 3. Find user in the database (delegated to Model)
        $userModel = new UserModel();
        $user = $userModel->findByEmail($email);

        // 4. Verify user and password (Clean logic)
        if (! $user || ! password_verify($password, $user->password)) {
            // If authentication fails, return with an error
            return redirect()->back()->withInput()->with('error', 'Email atau Password salah.');
        }
        // Check 2: User account is verified
        if ($user->verified_at === null) {
            // Optional: Resend verification email
            // $this->sendVerificationEmail($user->email, $user->verification_token);

            return redirect()->to('/login')->with('error', 'Akun Anda belum diverifikasi. Silakan cek email Anda.');
        }

        // 5. Authentication successful, create session
        $this->setUserSession($user);

        // 6. Redirect based on role
        if ($user->role === 'admin' || $user->role === 'kapster') {
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/'); // Redirect pelanggan to homepage
        }
    }

    // A clean, private method to handle session creation
    private function setUserSession($user)
    {
        $sessionData = [
            'user_id' => $user->id,
            'nama' => $user->nama,
            'email' => $user->email,
            'role' => $user->role,
            'isLoggedIn' => true,
        ];

        session()->set($sessionData);
    }

    // Logout method
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah berhasil logout.');
    }

    private function sendVerificationEmail($emailAddress, $token)
    {
        $email = \Config\Services::email();
        $email->setTo($emailAddress);
        $email->setSubject('Verifikasi Akun Coga Barbershop');

        $verificationLink = site_url('verify-email?token=' . $token);

        $message = "<h1>Selamat Datang di Coga Barbershop!</h1>";
        $message .= "<p>Terima kasih telah mendaftar. Silakan klik link di bawah ini untuk mengaktifkan akun Anda:</p>";
        $message .= "<a href='{$verificationLink}'>Aktivasi Akun Saya</a>";

        $email->setMessage($message);

        if (! $email->send()) {
            // You can log the error if email sending fails
            log_message('error', $email->printDebugger(['headers']));
        }
    }

    public function verifyEmail()
    {
        $token = $this->request->getGet('token');
        if (! $token) {
            return redirect()->to('/login')->with('error', 'Token verifikasi tidak valid atau hilang.');
        }

        $userModel = new UserModel();
        // Find user by the token
        $user = $userModel->where('verification_token', $token)->first();

        if (! $user) {
            return redirect()->to('/login')->with('error', 'Token verifikasi tidak valid atau sudah digunakan.');
        }

        // If user is found, update their status to verified
        $userModel->update($user->id, [
            'verified_at'        => date('Y-m-d H:i:s'), // Set current timestamp
            'verification_token' => null, // Clear the token so it can't be reused
        ]);

        return redirect()->to('/login')->with('success', 'Akun Anda telah berhasil diverifikasi! Silakan login.');
    }

    private function sendVerificationCodeEmail($emailAddress, $code)
    {
        $email = \Config\Services::email();
        $email->setTo($emailAddress);
        $email->setSubject('Kode Verifikasi Akun Coga Barbershop');

        $message = "<h1>Verifikasi Akun Coga Barbershop</h1>";
        $message .= "<p>Terima kasih telah mendaftar. Gunakan kode di bawah ini untuk mengaktifkan akun Anda:</p>";
        $message .= "<h2><strong>{$code}</strong></h2>";
        $message .= "<p>Kode ini akan kedaluwarsa dalam 15 menit.</p>";

        $email->setMessage($message);

        if (! $email->send()) {
            log_message('error', $email->printDebugger(['headers']));
        }
    }

    public function showVerifyForm()
    {
        // Check if the session variable exists, otherwise redirect
        if (! session()->get('email_for_verification')) {
            return redirect()->to('/register')->with('error', 'Sesi verifikasi tidak valid. Silakan daftar ulang.');
        }
        return view('auth/verify_email');
    }

    public function verifyCode()
    {
        $email = session()->get('email_for_verification');
        $code = $this->request->getPost('verification_code');

        if (!$email || !$code) {
            return redirect()->to('/login')->with('error', 'Sesi tidak valid atau kode tidak diberikan.');
        }

        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('email', $email)->first();

        // Check if the code is correct and not expired
        if (!$user || $user->verification_code !== $code || time() > strtotime($user->verification_expires_at)) {
            return redirect()->back()->with('error', 'Kode verifikasi salah atau sudah kedaluwarsa.');
        }

        // If code is correct, activate the account
        $userModel->update($user->id, [
            'verified_at'       => date('Y-m-d H:i:s'),
            'verification_code' => null, // Clear the code
            'verification_expires_at' => null,
        ]);

        // Remove the session variable
        session()->remove('email_for_verification');

        return redirect()->to('/login')->with('success', 'Akun Anda telah berhasil diverifikasi! Silakan login.');
    }
}
