<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Manajemen Kapster
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Manajemen Kapster
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<a href="/admin/kapsters/new" style="margin-bottom: 20px; display: inline-block; padding: 10px; background: #007bff; color: white; text-decoration: none;">+ Tambah Kapster Baru</a>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Spesialisasi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kapsters as $kapster): ?>
            <tr>
                <td><img src="/uploads/kapsters/<?= esc($kapster->foto_profil) ?>" alt="<?= esc($kapster->nama) ?>" width="50"></td>
                <td><?= esc($kapster->nama) ?></td>
                <td><?= esc($kapster->email) ?></td>
                <td><?= esc($kapster->spesialisasi) ?></td>
                <td><?= esc($kapster->status) ?></td>
                <td>
                    <a href="/admin/kapsters/edit/<?= $kapster->id ?>">Edit</a> |
                    <form action="/admin/kapsters/delete/<?= $kapster->id ?>" method="post" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin?');">
                        <?= csrf_field() ?>
                        <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>