<!-- app/Views/auth/verify_email.php -->
<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Verifikasi Email
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-align: center;
    }

    input {
        width: 100%;
        padding: 12px;
        font-size: 24px;
        text-align: center;
        letter-spacing: 10px;
        margin: 20px 0;
        box-sizing: border-box;
    }

    button {
        padding: 10px 20px;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }

    .alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }
</style>

<div class="container">
    <h2>Masukkan Kode Verifikasi</h2>
    <p>Kami telah mengirimkan kode 6 digit ke email <strong><?= esc(session()->get('email_for_verification')) ?></strong>.</p>

    <!-- Display feedback messages -->
    <?php if (session()->get('success')): ?>
        <div class="alert alert-success"><?= session()->get('success') ?></div>
    <?php endif; ?>
    <?php if (session()->get('error')): ?>
        <div class="alert alert-danger"><?= session()->get('error') ?></div>
    <?php endif; ?>

    <form action="/verify-email" method="post">
        <?= csrf_field() ?>

        <div>
            <label for="verification_code">Kode Verifikasi</label>
            <input type="text" name="verification_code" id="verification_code" maxlength="6" required>
        </div>

        <button type="submit">Verifikasi</button>
    </form>
</div>
<?= $this->endSection() ?>