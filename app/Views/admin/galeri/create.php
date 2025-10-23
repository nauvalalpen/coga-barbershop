<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Tambah Gambar Galeri
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Tambah Gambar Baru ke Galeri
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

<form action="/admin/galeri/create" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div style="margin-bottom:15px;">
        <label>Judul Gambar</label>
        <input type="text" name="judul" value="<?= old('judul') ?>" required style="width:100%; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label>Deskripsi (Opsional)</label>
        <textarea name="deskripsi" style="width:100%; height:80px; padding:8px;"><?= old('deskripsi') ?></textarea>
    </div>

    <div style="margin-bottom:15px;">
        <label>Pilih File Gambar</label>
        <input type="file" name="gambar" required>
    </div>

    <button type="submit" style="margin-top:20px;">Upload Gambar</button>
</form>
<?= $this->endSection() ?>