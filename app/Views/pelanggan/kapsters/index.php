<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Tim Kami
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Tim Kapster Profesional Kami</h1>
<div style="display: flex; flex-wrap: wrap; gap: 20px;">
    <?php foreach ($kapsters as $kapster): ?>
        <?php if ($kapster->status === 'aktif'): ?>
            <div style="border: 1px solid #ccc; padding: 15px; text-align: center;">
                <img src="/uploads/kapsters/<?= esc($kapster->foto_profil) ?>" alt="<?= esc($kapster->nama) ?>" width="150" height="150" style="object-fit: cover; border-radius: 50%;">
                <h3><?= esc($kapster->nama) ?></h3>
                <p><?= esc($kapster->spesialisasi) ?></p>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>