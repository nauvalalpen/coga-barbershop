<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
<?= isset($layanan) ? 'Edit Layanan' : 'Tambah Layanan Baru' ?>
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
<?= isset($layanan) ? 'Edit Layanan' : 'Tambah Layanan Baru' ?>
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

<form action="<?= isset($layanan) ? "/admin/layanan/update/{$layanan->id}" : "/admin/layanan/create" ?>" method="post">
    <?= csrf_field() ?>
    <div>
        <label>Nama Layanan</label>
        <input type="text" name="nama_layanan" value="<?= old('nama_layanan', $layanan->nama_layanan ?? '') ?>" required>
    </div>
    <div style="margin-top:15px;">
        <label>Harga (contoh: 50000)</label>
        <input type="number" name="harga" value="<?= old('harga', $layanan->harga ?? '') ?>" required>
    </div>
    <div style="margin-top:15px;">
        <label>Durasi (dalam menit)</label>
        <input type="number" name="durasi_menit" value="<?= old('durasi_menit', $layanan->durasi_menit ?? '') ?>" required>
    </div>
    <div style="margin-top:15px;">
        <label>Deskripsi (Opsional)</label>
        <textarea name="deskripsi"><?= old('deskripsi', $layanan->deskripsi ?? '') ?></textarea>
    </div>
    <button type="submit" style="margin-top:20px;"><?= isset($layanan) ? 'Update Layanan' : 'Simpan Layanan' ?></button>
</form>
<?= $this->endSection() ?>