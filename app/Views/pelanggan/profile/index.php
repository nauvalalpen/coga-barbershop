<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
My Profile
<?= $this->endSection() ?>

<!-- This section provides the NEW, rich content for the 'hero' slot in the layout -->
<?= $this->section('hero') ?>
<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                </ol>
            </nav>
            <h1 class="hero-title">My Profile</h1>
            <p class="hero-subtitle">
                Keep your personal information and password up to date.
            </p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<style>
    /* Root Variables & Animations */
    :root {
        --gold-color: #d4af37;
        --dark-bg: #0a0a0a;
        --light-dark-bg: #1a1a1a;
        --card-bg: #141414;
        --border-color: #2a2a2a;
        --transition-smooth: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Main Section */
    .profile-section {
        padding: 100px 0;
        background: linear-gradient(180deg, var(--dark-bg) 0%, #050505 100%);
    }

    /* Main Profile Card */
    .profile-card {
        max-width: 800px;
        margin: auto;
        background: linear-gradient(145deg, var(--card-bg), var(--light-dark-bg));
        padding: 50px 40px;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        animation: fadeInUp 1s ease-out backwards;
    }

    /* Profile Header */
    .profile-header {
        display: flex;
        align-items: center;
        gap: 25px;
        margin-bottom: 30px;
    }

    .profile-avatar {
        width: 80px;
        height: 80px;
        flex-shrink: 0;
        background: linear-gradient(135deg, var(--gold-color), #f4d983);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        font-weight: 700;
        color: #000;
        box-shadow: 0 0 30px rgba(212, 175, 55, 0.4);
    }

    .profile-name {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .profile-email {
        color: #888;
        font-size: 1rem;
    }

    /* Alerts */
    .alert {
        border-radius: 8px;
        border-left-width: 4px;
    }

    .alert-success {
        background-color: rgba(40, 167, 69, 0.1);
        color: #28a745;
        border-color: #28a745;
    }

    .alert-danger {
        background-color: rgba(220, 53, 69, 0.1);
        color: #dc3545;
        border-color: #dc3545;
    }

    /* Form Styling */
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
        background: rgba(0, 0, 0, 0.3);
        border: 2px solid #333;
        border-radius: 8px;
        padding: 14px 16px 14px 45px;
        color: #fff;
        font-size: 1rem;
        transition: var(--transition-smooth);
    }

    .form-control:focus {
        background: rgba(0, 0, 0, 0.4);
        border-color: var(--gold-color);
        box-shadow: 0 0 20px rgba(212, 175, 55, 0.2);
        color: #fff;
    }

    .password-toggle {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
        cursor: pointer;
        font-size: 1.1rem;
    }

    /* Password Section Info */
    .password-info-text {
        color: #888;
        font-style: italic;
        font-size: 0.9rem;
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
        margin-top: 10px;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
    }
</style>

<div class="profile-section">
    <div class="container">
        <div class="profile-card">

            <div class="profile-header">
                <div class="profile-avatar">
                    <?= esc(strtoupper(substr($user->nama, 0, 1))) ?>
                </div>
                <div>
                    <h2 class="profile-name"><?= esc($user->nama) ?></h2>
                    <p class="profile-email"><?= esc($user->email) ?></p>
                </div>
            </div>

            <hr class="my-4" style="border-color: var(--border-color);">

            <!-- Display Feedback Messages -->
            <?php if (session()->get('success')): ?> <div class="alert alert-success"><?= session('success') ?></div> <?php endif; ?>
            <?php if (session()->get('error')): ?> <div class="alert alert-danger"><?= session('error') ?></div> <?php endif; ?>
            <?php if (session()->get('errors')): ?>
                <div class="alert alert-danger">
                    <?php foreach (session('errors') as $error) : ?><p class="mb-0"><?= esc($error) ?></p><?php endforeach ?>
                </div>
            <?php endif; ?>

            <form action="/my-profile/update" method="post">
                <?= csrf_field() ?>

                <h4 class="mb-3 text-white" style="font-family: 'Playfair Display', serif;">Personal Information</h4>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="nama" class="form-label">Full Name</label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-user"></i>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= old('nama', $user->nama) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-envelope"></i>
                            <input type="email" class="form-control" name="email" id="email" value="<?= old('email', $user->email) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="no_telpon" class="form-label">Phone Number</label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-phone"></i>
                            <input type="tel" class="form-control" name="no_telpon" id="no_telpon" value="<?= old('no_telpon', $user->no_telpon) ?>">
                        </div>
                    </div>
                </div>

                <hr class="my-4" style="border-color: var(--border-color);">

                <h4 class="mb-3 text-white" style="font-family: 'Playfair Display', serif;">Change Password</h4>
                <p class="password-info-text mb-3">Leave these fields blank if you don't want to change your password.</p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-lock"></i>
                            <input type="password" class="form-control" name="password" id="password">
                            <i class="password-toggle fas fa-eye" onclick="togglePassword('password')"></i>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="pass_confirm" class="form-label">Confirm New Password</label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-lock"></i>
                            <input type="password" class="form-control" name="pass_confirm" id="pass_confirm">
                            <i class="password-toggle fas fa-eye" onclick="togglePassword('pass_confirm')"></i>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>
                    Update Profile
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Password visibility toggle
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
</script>

<?= $this->endSection() ?>