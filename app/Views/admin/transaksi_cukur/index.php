<!-- app/Views/admin/transaksi_cukur/index.php -->
<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Catatan Cukur Saya
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Catatan Cukur Saya
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<a href="/admin/catatan-cukur/new" style="margin-bottom: 20px; display: inline-block; padding: 10px; background: #007bff; color: white; text-decoration: none;">+ Tambah Catatan</a>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Layanan</th>
            <th>Harga</th>
            <th>Aksi</th> <!-- ADD THIS COLUMN HEADER -->
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($transaksi)): ?>
            <?php foreach ($transaksi as $item): ?>
                <tr>
                    <td><?= date('d M Y, H:i', strtotime($item->created_at)) ?></td>
                    <td><?= esc($item->nama_layanan) ?></td>
                    <td>Rp <?= number_format($item->harga_saat_transaksi, 0, ',', '.') ?></td>
                    <td>
                        <!-- ADD THIS EDIT LINK -->
                        <a href="/admin/catatan-cukur/edit/<?= $item->id ?>">Edit</a>
                        <form action="/admin/catatan-cukur/delete/<?= $item->id ?>" method="post" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus catatan ini?');">
                            <?= csrf_field() ?>
                            <button type="submit" style="color:red; background:none; border:none; padding:0; cursor:pointer; font-family: sans-serif; font-size: 1em;">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Belum ada catatan transaksi.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?= $this->endSection() ?>