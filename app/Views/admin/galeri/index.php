<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Manajemen Galeri
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Manajemen Galeri
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<a href="/admin/galeri/new" style="margin-bottom: 20px; display: inline-block; padding: 10px; background: #007bff; color: white; text-decoration: none;">+ Tambah Gambar Baru</a>

<div style="display: flex; flex-wrap: wrap; gap: 20px;">
    <?php foreach ($galeri as $item): ?>
        <div style="border: 1px solid #ccc; padding: 10px; text-align: center;">
            <img src="/uploads/galeri/<?= esc($item->url_gambar) ?>" alt="<?= esc($item->judul) ?>" width="150" height="150" style="object-fit: cover;">
            <p><strong><?= esc($item->judul) ?></strong></p>
            <a href="/admin/galeri/edit/<?= $item->id ?>">Edit</a> |
            <form action="/admin/galeri/delete/<?= $item->id ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar ini?');">
                <?= csrf_field() ?>
                <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">Delete</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>