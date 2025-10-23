<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Tambah Kapster Baru
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Tambah Kapster Baru
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Display validation errors -->
<?php if (session()->get('errors')): ?>
    <div style="color: red; margin-bottom: 20px;">
        <strong>Error:</strong>
        <ul>
            <?php foreach (session()->get('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<form action="/admin/kapsters/create" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div>
        <label>Nama Lengkap</label>
        <input type="text" name="nama" value="<?= old('nama') ?>" required>
    </div>
    <div style="margin-top:15px;">
        <label>Email</label>
        <input type="email" name="email" value="<?= old('email') ?>" required>
    </div>
    <div style="margin-top:15px;">
        <label>Password</label>
        <input type="password" name="password" required>
    </div>
    <div style="margin-top:15px;">
        <label>Spesialisasi</label>
        <input type="text" name="spesialisasi" value="<?= old('spesialisasi') ?>">
    </div>
    <div style="margin-top:15px;">
        <label>Foto Profil</label>
        <input type="file" name="foto_profil" required>
    </div>
    <button type="submit" style="margin-top:20px;">Simpan Kapster</button>
</form>
<?= $this->endSection() ?>