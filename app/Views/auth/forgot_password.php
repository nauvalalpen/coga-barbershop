<?= $this->extend('layouts/pelanggan_layout') ?>
<?= $this->section('title') ?>Lupa Password<?= $this->endSection() ?>
<?= $this->section('page_header') ?>RESET PASSWORD<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
    .auth-section {
        padding: 80px 0;
        background-color: #000;
    }

    .auth-form-container {
        max-width: 450px;
        margin: auto;
        background-color: var(--light-dark-bg);
        padding: 40px;
        border: 1px solid #222;
    }

    .auth-form-container h2 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        text-align: center;
        margin-bottom: 20px;
    }

    .auth-form-container p {
        color: #a0a0a0;
        text-align: center;
        margin-bottom: 30px;
    }

    .form-control {
        background-color: #333;
        border: 1px solid #555;
        border-radius: 0;
        padding: 0.75rem 1rem;
        color: #fff;
    }

    .form-control:focus {
        background-color: #444;
        border-color: var(--gold-color);
        box-shadow: none;
        color: #fff;
    }

    .btn-submit {
        background-color: var(--gold-color);
        color: #000;
        border: none;
        border-radius: 0;
        padding: 0.75rem;
        font-weight: bold;
        text-transform: uppercase;
        width: 100%;
        transition: all 0.3s;
    }

    .btn-submit:hover {
        background-color: #fff;
    }

    .auth-link {
        text-align: center;
        margin-top: 20px;
    }

    .auth-link a {
        color: var(--gold-color);
        text-decoration: none;
    }
</style>
<div class="auth-section">
    <div class="container">
        <div class="auth-form-container">
            <h2>Lupa Password</h2>
            <p>Masukkan alamat email Anda dan kami akan mengirimkan link untuk mereset password Anda.</p>
            <?php if (session()->get('success')): ?><div class="alert alert-success"><?= session('success') ?></div><?php endif; ?>
            <?php if (session()->get('error')): ?><div class="alert alert-danger"><?= session('error') ?></div><?php endif; ?>
            <form action="/forgot-password" method="post">
                <?= csrf_field() ?>
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= old('email') ?>" required>
                </div>
                <button type="submit" class="btn btn-submit">Kirim Link Reset</button>
            </form>
            <p class="auth-link"><a href="/login">Kembali ke Login</a></p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>