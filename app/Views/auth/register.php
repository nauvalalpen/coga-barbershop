<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Register
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    /* Page-specific styles */
    .container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    button {
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
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
</style>

<div class="container">
    <h2>Registrasi Akun Baru</h2>

    <!-- Display validation errors -->
    <?php if (session()->get('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->get('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <form action="/register" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" value="<?= old('nama') ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= old('email') ?>" required>
        </div>
        <div class="form-group">
            <label for="no_telpon">Nomor Telepon (Opsional)</label>
            <input type="tel" name="no_telpon" id="no_telpon" value="<?= old('no_telpon') ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label for="pass_confirm">Konfirmasi Password</label>
            <input type="password" name="pass_confirm" id="pass_confirm" required>
        </div>
        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="/login">Login di sini</a></p>
</div>
<?= $this->endSection() ?>