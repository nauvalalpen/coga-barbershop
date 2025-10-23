<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Edit Kapster
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Edit Kapster: <?= esc($kapster->nama) ?>
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

<form action="/admin/kapsters/update/<?= $kapster->id ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div>
        <label>Nama Lengkap</label>
        <input type="text" name="nama" value="<?= old('nama', $kapster->nama) ?>" required>
    </div>
    <div style="margin-top:15px;">
        <label>Email</label>
        <input type="email" name="email" value="<?= old('email', $kapster->email) ?>" required>
    </div>
    <div style="margin-top:15px;">
        <label>Password (Kosongkan jika tidak ingin diubah)</label>
        <input type="password" name="password">
    </div>
    <div style="margin-top:15px;">
        <label>Spesialisasi</label>
        <input type="text" name="spesialisasi" value="<?= old('spesialisasi', $kapster->spesialisasi) ?>">
    </div>
    <div style="margin-top:15px;">
        <label>Status</label>
        <select name="status">
            <option value="aktif" <?= old('status', $kapster->status) == 'aktif' ? 'selected' : '' ?>>Aktif</option>
            <option value="tidak_aktif" <?= old('status', $kapster->status) == 'tidak_aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
        </select>
    </div>
    <div style="margin-top:15px;">
        <label>Foto Profil (Kosongkan jika tidak ingin diubah)</label>
        <input type="file" name="foto_profil">
        <br>
        <img src="/uploads/kapsters/<?= esc($kapster->foto_profil) ?>" alt="<?= esc($kapster->nama) ?>" width="100" style="margin-top:10px;">
    </div>
    <button type="submit" style="margin-top:20px;">Update Kapster</button>
</form>
<?= $this->endSection() ?>