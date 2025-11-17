<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - COGA Barbershop</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --gold-color: #d4af37;
            --gold-light: #f4d983;
            --dark-bg: #0a0a0a;
            --light-dark-bg: #1a1a1a;
            --card-bg: #141414;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--dark-bg) 0%, #050505 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Animated Background Elements */
        body::before,
        body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.08) 0%, transparent 70%);
            animation: float 20s ease-in-out infinite;
        }

        body::before {
            width: 600px;
            height: 600px;
            top: -300px;
            left: -300px;
        }

        body::after {
            width: 800px;
            height: 800px;
            bottom: -400px;
            right: -400px;
            animation-delay: -10s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(50px, 50px);
            }
        }

        /* Main Container */
        .auth-container {
            width: 100%;
            max-width: 950px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: var(--card-bg);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 1;
        }

        /* Left Side - Branding */
        .auth-brand {
            background: linear-gradient(135deg, var(--gold-color) 0%, var(--gold-light) 100%);
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .auth-brand::before {
            content: '🔒';
            position: absolute;
            font-size: 25rem;
            opacity: 0.1;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(15deg);
        }

        .brand-logo {
            width: 120px;
            height: 120px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            font-size: 4rem;
            position: relative;
            z-index: 1;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .brand-title {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 800;
            color: #000;
            margin-bottom: 15px;
            letter-spacing: 3px;
            position: relative;
            z-index: 1;
        }

        .brand-subtitle {
            font-size: 1.1rem;
            color: rgba(0, 0, 0, 0.7);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
            z-index: 1;
        }

        /* Right Side - Form */
        .auth-form-section {
            padding: 60px 50px;
            background: var(--card-bg);
        }

        .form-header {
            margin-bottom: 30px;
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: #fff;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .form-subtitle {
            color: #888;
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Alerts */
        .alert {
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border: none;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.15);
            border-left: 4px solid #dc3545;
            color: #dc3545;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            color: #b0b0b0;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
            display: block;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gold-color);
            font-size: 1.1rem;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid #333;
            border-radius: 10px;
            padding: 14px 16px 14px 45px;
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--gold-color);
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.2);
            color: #fff;
            outline: none;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            cursor: pointer;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--gold-color);
        }

        /* Submit Button */
        .btn-submit {
            background: linear-gradient(135deg, var(--gold-color), var(--gold-light));
            color: #000;
            border: none;
            border-radius: 10px;
            padding: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            width: 100%;
            font-size: 1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-top: 1.5rem;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: all 0.5s ease;
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .auth-container {
                grid-template-columns: 1fr;
            }

            .auth-brand {
                display: none;
            }

            .auth-form-section {
                padding: 40px 30px;
            }

            .form-title {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <!-- Left Side - Branding -->
        <div class="auth-brand">
            <div class="brand-logo">🔒</div>
            <h1 class="brand-title">COGA</h1>
            <p class="brand-subtitle">Secure Your Account</p>
        </div>

        <!-- Right Side - Form -->
        <div class="auth-form-section">
            <div class="form-header">
                <h2 class="form-title">Set New Password</h2>
                <p class="form-subtitle">Your new password must be different from previous ones.</p>
            </div>

            <!-- Display validation errors -->
            <?php if (session()->get('errors')): ?>
                <div class="alert alert-danger">
                    <strong><i class="fas fa-exclamation-triangle me-2"></i> Please fix the following:</strong><br>
                    <?php foreach (session('errors') as $error): ?>
                        • <?= esc($error) ?><br>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="/reset-password" method="post" id="resetForm">
                <?= csrf_field() ?>
                <input type="hidden" name="token" value="<?= esc($token) ?>">

                <div class="form-group">
                    <label for="password" class="form-label">New Password</label>
                    <div class="input-wrapper">
                        <i class="input-icon fas fa-lock"></i>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password" required>
                        <i class="password-toggle fas fa-eye" onclick="togglePassword('password')"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass_confirm" class="form-label">Confirm New Password</label>
                    <div class="input-wrapper">
                        <i class="input-icon fas fa-lock"></i>
                        <input type="password" class="form-control" name="pass_confirm" id="pass_confirm" placeholder="Re-enter new password" required>
                        <i class="password-toggle fas fa-eye" onclick="togglePassword('pass_confirm')"></i>
                    </div>
                </div>

                <button type="submit" class="btn-submit" id="submitBtn">
                    <i class="fas fa-check-circle me-2"></i>
                    Reset Password
                </button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleIcon = passwordInput.nextElementSibling;

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        document.getElementById('resetForm').addEventListener('submit', function() {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Updating...';
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('password').focus();
        });
    </script>
</body>

</html>