<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?> Tambah Catatan Cukur <?= $this->endSection() ?>

<?= $this->section('page_title') ?> Tambah Catatan Cukur <?= $this->endSection() ?>

<?= $this->section('content') ?>
<form action="/admin/catatan-cukur/create" method="post">
    <?= csrf_field() ?>
    <div>
        <label>Pilih Layanan yang Diberikan:</label>
        <select name="layanan_id" required>
            <option value="">-- Pilih Layanan --</option>
            <?php foreach ($layanan as $item): ?>
                <option value="<?= $item->id ?>"><?= esc($item->nama_layanan) ?> - Rp <?= number_format($item->harga, 0) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit">Simpan Catatan</button>
</form>
<?= $this->endSection() ?>