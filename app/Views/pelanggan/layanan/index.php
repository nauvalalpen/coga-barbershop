<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Daftar Layanan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Layanan & Harga Kami</h1>
<div style="max-width: 800px; margin: auto;">
    <?php foreach ($layanan as $item): ?>
        <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; display: flex; justify-content: space-between;">
            <div>
                <h3><?= esc($item->nama_layanan) ?></h3>
                <p><?= esc($item->deskripsi) ?></p>
                <small>Estimasi: <?= esc($item->durasi_menit) ?> Menit</small>
            </div>
            <div style="text-align: right;">
                <h4>Rp <?= number_format($item->harga, 0, ',', '.') ?></h4>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>