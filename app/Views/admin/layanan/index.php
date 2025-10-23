<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Manajemen Layanan
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Manajemen Layanan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<a href="/admin/layanan/new" style="margin-bottom: 20px; display: inline-block; padding: 10px; background: #007bff; color: white; text-decoration: none;">+ Tambah Layanan Baru</a>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nama Layanan</th>
            <th>Harga</th>
            <th>Durasi (Menit)</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($layanan as $item): ?>
            <tr>
                <td><?= esc($item->nama_layanan) ?></td>
                <td>Rp <?= number_format($item->harga, 0, ',', '.') ?></td>
                <td><?= esc($item->durasi_menit) ?> Menit</td>
                <td><?= esc($item->deskripsi) ?></td>
                <td>
                    <a href="/admin/layanan/edit/<?= $item->id ?>">Edit</a> |
                    <form action="/admin/layanan/delete/<?= $item->id ?>" method="post" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                        <?= csrf_field() ?>
                        <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>