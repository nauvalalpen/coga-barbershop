<?= $this->extend('layouts/pelanggan_layout') ?>
<?= $this->section('title') ?>Reset Password Baru<?= $this->endSection() ?>
<?= $this->section('page_header') ?>SET NEW PASSWORD<?= $this->endSection() ?>
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
</style>
<div class="auth-section">
    <div class="container">
        <div class="auth-form-container">
            <h2>Buat Password Baru</h2>
            <?php if (session()->get('errors')): ?>
                <div class="alert alert-danger">
                    <?php foreach (session('errors') as $error): ?><p class="mb-0"><?= esc($error) ?></p><?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form action="/reset-password" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="token" value="<?= esc($token) ?>">
                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-4">
                    <label for="pass_confirm" class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" name="pass_confirm" id="pass_confirm" required>
                </div>
                <button type="submit" class="btn btn-submit">Reset Password</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>