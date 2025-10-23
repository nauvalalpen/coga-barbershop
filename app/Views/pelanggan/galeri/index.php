<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Galeri
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Galeri Hasil Cukur</h1>
<p>Lihat beberapa hasil kerja terbaik dari tim kami.</p>
<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px;">
    <?php foreach ($galeri as $item): ?>
        <div>
            <img src="/uploads/galeri/<?= esc($item->url_gambar) ?>" alt="<?= esc($item->judul) ?>" style="width: 100%; height: 250px; object-fit: cover; border-radius: 5px;">
            <h4 style="margin-top: 10px;"><?= esc($item->judul) ?></h4>
            <p><?= esc($item->deskripsi) ?></p>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>