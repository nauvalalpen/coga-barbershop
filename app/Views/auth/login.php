<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Login
<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
MEMBER LOGIN
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    :root {
        --gold-color: #d4af37;
        --dark-bg: #0a0a0a;
        --light-dark-bg: #1a1a1a;
        --card-bg: #141414;
        --border-color: #2a2a2a;
    }

    /* Auth Section */
    .auth-section {
        padding: 100px 0;
        background: linear-gradient(180deg, var(--dark-bg) 0%, #050505 100%);
        min-height: 80vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .auth-section::before {
        content: '✂️';
        position: absolute;
        font-size: 20rem;
        opacity: 0.02;
        top: 50%;
        right: -5%;
        transform: translateY(-50%) rotate(-15deg);
        pointer-events: none;
    }

    /* Auth Container */
    .auth-form-container {
        max-width: 500px;
        margin: auto;
        background: linear-gradient(145deg, var(--card-bg), var(--light-dark-bg));
        padding: 50px 40px;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        position: relative;
        overflow: hidden;
    }

    .auth-form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--gold-color), #f4d983);
    }

    /* Header */
    .auth-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .auth-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, var(--gold-color), #f4d983);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: #000;
        box-shadow: 0 0 30px rgba(212, 175, 55, 0.4);
    }

    .auth-form-container h2 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .auth-subtitle {
        color: #888;
        font-size: 0.95rem;
    }

    /* Alerts */
    .alert {
        border-radius: 8px;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
        border: none;
        animation: slideInDown 0.4s ease-out;
    }

    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success {
        background: rgba(40, 167, 69, 0.15);
        border-left: 4px solid #28a745;
        color: #28a745;
    }

    .alert-danger {
        background: rgba(220, 53, 69, 0.15);
        border-left: 4px solid #dc3545;
        color: #dc3545;
    }

    .alert p {
        margin: 5px 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Form Styling */
    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-label {
        color: #b0b0b0;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i {
        color: var(--gold-color);
    }

    .input-wrapper {
        position: relative;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid #333;
        border-radius: 8px;
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

    .form-control::placeholder {
        color: #666;
    }

    .input-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gold-color);
        font-size: 1.1rem;
    }

    /* Password Toggle */
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

    /* Remember Me */
    .form-check-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .form-check {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-check input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: var(--gold-color);
    }

    .form-check label {
        color: #b0b0b0;
        font-size: 0.9rem;
        margin: 0;
    }

    .forgot-link {
        color: var(--gold-color);
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .forgot-link:hover {
        color: #f4d983;
    }

    /* Submit Button */
    .btn-submit {
        background: linear-gradient(135deg, var(--gold-color), #f4d983);
        color: #000;
        border: none;
        border-radius: 8px;
        padding: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        width: 100%;
        font-size: 1rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
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

    /* Auth Link */
    .auth-link {
        text-align: center;
        margin-top: 30px;
        padding-top: 30px;
        border-top: 1px solid var(--border-color);
        color: #888;
        font-size: 0.95rem;
    }

    .auth-link a {
        color: var(--gold-color);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .auth-link a:hover {
        color: #f4d983;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .auth-section {
            padding: 60px 20px;
        }

        .auth-form-container {
            padding: 40px 25px;
        }

        .auth-form-container h2 {
            font-size: 1.8rem;
        }

        .form-check-wrapper {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }
    }
</style>

<div class="auth-section">
    <div class="container">
        <div class="auth-form-container">
            <div class="auth-header">
                <div class="auth-icon">
                    <i class="fas fa-user-circle"></i>
                </div>
                <h2>Welcome Back</h2>
                <p class="auth-subtitle">Sign in to your account</p>
            </div>

            <!-- Display feedback messages -->
            <?php if (session()->get('success')): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?= session()->get('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->get('error')): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <?= session()->get('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->get('errors')): ?>
                <div class="alert alert-danger">
                    <strong><i class="fas fa-exclamation-triangle"></i> Please fix the following:</strong>
                    <?php foreach (session()->get('errors') as $error) : ?>
                        <p><i class="fas fa-circle" style="font-size: 0.4rem;"></i> <?= esc($error) ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>

            <form action="/login" method="post" id="loginForm">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i>
                        Email Address
                    </label>
                    <div class="input-wrapper">
                        <i class="input-icon fas fa-envelope"></i>
                        <input type="email"
                            class="form-control"
                            name="email"
                            id="email"
                            value="<?= old('email') ?>"
                            placeholder="your@email.com"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i>
                        Password
                    </label>
                    <div class="input-wrapper">
                        <i class="input-icon fas fa-lock"></i>
                        <input type="password"
                            class="form-control"
                            name="password"
                            id="password"
                            placeholder="Enter your password"
                            required>
                        <i class="password-toggle fas fa-eye" onclick="togglePassword()"></i>
                    </div>
                </div>

                <div class="form-check-wrapper">
                    <div class="form-check">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="#" class="forgot-link">Forgot Password?</a>
                </div>

                <button type="submit" class="btn-submit" id="submitBtn">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    Login
                </button>
            </form>

            <p class="auth-link">
                Don't have an account? <a href="/register">Create one here</a>
            </p>
        </div>
    </div>
</div>

<script>
    // Password visibility toggle
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.querySelector('.password-toggle');

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

    // Form submission handling
    document.getElementById('loginForm').addEventListener('submit', function() {
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Logging in...';
    });

    // Auto-focus on email field
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('email').focus();
    });
</script>

<?= $this->endSection() ?>