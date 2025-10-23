<!-- app/Views/admin/layanan/edit.php -->
<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Edit Layanan
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Edit Layanan: <?= esc($layanan->nama_layanan) ?>
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

<form action="/admin/layanan/update/<?= $layanan->id ?>" method="post">
    <?= csrf_field() ?>

    <div style="margin-bottom:15px;">
        <label>Nama Layanan</label>
        <input type="text" name="nama_layanan" value="<?= old('nama_layanan', $layanan->nama_layanan) ?>" required style="width:100%; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label>Harga (contoh: 50000)</label>
        <input type="number" name="harga" value="<?= old('harga', $layanan->harga) ?>" required style="width:100%; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label>Durasi (dalam menit)</label>
        <input type="number" name="durasi_menit" value="<?= old('durasi_menit', $layanan->durasi_menit) ?>" required style="width:100%; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label>Deskripsi (Opsional)</label>
        <textarea name="deskripsi" style="width:100%; height:80px; padding:8px;"><?= old('deskripsi', $layanan->deskripsi) ?></textarea>
    </div>

    <button type="submit" style="margin-top:20px;">Update Layanan</button>
</form>
<?= $this->endSection() ?>