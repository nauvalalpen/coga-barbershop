<!-- app/Views/admin/transaksi_cukur/edit.php -->
<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Edit Catatan Cukur
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Edit Catatan Cukur (Tanggal: <?= date('d M Y', strtotime($transaksi->created_at)) ?>)
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<form action="/admin/catatan-cukur/update/<?= $transaksi->id ?>" method="post">
    <?= csrf_field() ?>

    <div style="margin-bottom:15px;">
        <label>Pilih Layanan yang Diberikan:</label>
        <select name="layanan_id" required>
            <option value="">-- Pilih Layanan --</option>
            <?php foreach ($layanan as $item): ?>
                <option value="<?= $item->id ?>" <?= ($item->id == old('layanan_id', $transaksi->layanan_id)) ? 'selected' : '' ?>>
                    <?= esc($item->nama_layanan) ?> - Rp <?= number_format($item->harga, 0, ',', '.') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" style="margin-top:20px;">Update Catatan</button>
</form>
<?= $this->endSection() ?>