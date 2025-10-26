<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Register
<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
CREATE ACCOUNT
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    /* Menggunakan style yang sama dengan halaman login */
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
        transition: background-color 0.3s;
    }

    .btn-submit:hover {
        background-color: #fff;
    }

    .auth-link {
        text-align: center;
        margin-top: 20px;
        color: #a0a0a0;
    }

    .auth-link a {
        color: var(--gold-color);
        text-decoration: none;
    }
</style>

<div class="auth-section">
    <div class="container">
        <div class="auth-form-container">
            <h2>Registrasi Akun</h2>

            <!-- Display validation errors -->
            <?php if (session()->get('errors')): ?>
                <div class="alert alert-danger">
                    <?php foreach (session()->get('errors') as $error) : ?>
                        <p class="mb-0"><?= esc($error) ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>

            <form action="/register" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= old('nama') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= old('email') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="no_telpon" class="form-label">Nomor Telepon (Opsional)</label>
                    <input type="tel" class="form-control" name="no_telpon" id="no_telpon" value="<?= old('no_telpon') ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-4">
                    <label for="pass_confirm" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="pass_confirm" id="pass_confirm" required>
                </div>
                <button type="submit" class="btn btn-submit">Daftar</button>
            </form>
            <p class="auth-link">Sudah punya akun? <a href="/login">Login di sini</a></p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>