<!-- app/Views/admin/galeri/edit.php -->
<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Edit Item Galeri
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Edit Item Galeri
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

<form action="/admin/galeri/update/<?= $item->id ?>" method="post">
    <?= csrf_field() ?>

    <div style="margin-bottom:20px;">
        <p>Gambar Saat Ini:</p>
        <img src="/uploads/galeri/<?= esc($item->url_gambar) ?>" alt="<?= esc($item->judul) ?>" width="200" style="border: 1px solid #ccc; padding: 5px;">
    </div>

    <div style="margin-bottom:15px;">
        <label>Judul Gambar</label>
        <input type="text" name="judul" value="<?= old('judul', $item->judul) ?>" required style="width:100%; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label>Deskripsi (Opsional)</label>
        <textarea name="deskripsi" style="width:100%; height:80px; padding:8px;"><?= old('deskripsi', $item->deskripsi) ?></textarea>
    </div>

    <button type="submit" style="margin-top:20px;">Update Informasi</button>
</form>
<?= $this->endSection() ?>