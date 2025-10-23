<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?> Laporan Cukur <?= $this->endSection() ?>

<?= $this->section('page_title') ?> Laporan Pendapatan Cukur <?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Filter Form -->
<form method="get" action="/admin/laporan-cukur">
    <select name="kapster_id">
        <option value="">Semua Kapster</option>
        <?php foreach ($kapsters as $kapster): ?>
            <option value="<?= $kapster->id ?>" <?= ($filters['kapster_id'] ?? '') == $kapster->id ? 'selected' : '' ?>>
                <?= esc($kapster->nama) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="date" name="start_date" value="<?= $filters['start_date'] ?? '' ?>">
    <input type="date" name="end_date" value="<?= $filters['end_date'] ?? '' ?>">
    <button type="submit">Filter</button>
    <a href="/admin/laporan-cukur">Reset</a>
</form>

<hr>

<!-- Report Table -->
<table border="1">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Kapster</th>
            <th>Layanan</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0; ?>
        <?php foreach ($transaksi as $item): ?>
            <tr>
                <td><?= date('d M Y, H:i', strtotime($item->created_at)) ?></td>
                <td><?= esc($item->nama_kapster) ?></td>
                <td><?= esc($item->nama_layanan) ?></td>
                <td>Rp <?= number_format($item->harga_saat_transaksi, 0) ?></td>
            </tr>
            <?php $total += $item->harga_saat_transaksi; ?>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total Pendapatan</th>
            <th>Rp <?= number_format($total, 0) ?></th>
        </tr>
    </tfoot>
</table>
<?= $this->endSection() ?>