<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Laporan Cukur
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Laporan Pendapatan Cukur
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Filter Card -->
<div class="card mb-4" style="background-color: var(--light-dark-bg); border: 1px solid var(--border-color); border-radius:0;">
    <div class="card-body">
        <form method="get" action="/admin/laporan-cukur">
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="kapster_id" class="form-label">Filter Kapster</label>
                    <select name="kapster_id" id="kapster_id" class="form-select">
                        <option value="">Semua Kapster</option>
                        <?php foreach ($kapsters as $kapster): ?>
                            <option value="<?= $kapster->id ?>" <?= ($filters['kapster_id'] ?? '') == $kapster->id ? 'selected' : '' ?>>
                                <?= esc($kapster->nama) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="start_date" class="form-label">Dari Tanggal</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="<?= $filters['start_date'] ?? '' ?>">
                </div>
                <div class="col-md-3">
                    <label for="end_date" class="form-label">Sampai Tanggal</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="<?= $filters['end_date'] ?? '' ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-warning w-100">Filter</button>
                    <a href="/admin/laporan-cukur" class="btn btn-outline-secondary w-100 mt-2">Reset</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Report Table Card -->
<div class="card" style="background-color: var(--light-dark-bg); border: 1px solid var(--border-color); border-radius:0;">
    <div class="card-header" style="border-bottom: 1px solid var(--border-color);">
        <h5 class="mb-0">Hasil Laporan</h5>

        <div>
            <a href="<?= site_url('admin/laporan-cukur/export/pdf?' . http_build_query($filters)) ?>" class="btn btn-danger btn-sm">
                <i class="fas fa-file-pdf"></i> Ekspor PDF
            </a>
            <a href="<?= site_url('admin/laporan-cukur/export/excel?' . http_build_query($filters)) ?>" class="btn btn-success btn-sm">
                <i class="fas fa-file-excel"></i> Ekspor Excel
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Kapster</th>
                        <th scope="col">Layanan</th>
                        <th scope="col" class="text-end">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php if (!empty($transaksi)): ?>
                        <?php foreach ($transaksi as $item): ?>
                            <tr>
                                <td><?= date('d M Y, H:i', strtotime($item->created_at)) ?></td>
                                <td><?= esc($item->nama_kapster) ?></td>
                                <td><?= esc($item->nama_layanan) ?></td>
                                <td class="text-end">Rp <?= number_format($item->harga_saat_transaksi, 0, ',', '.') ?></td>
                            </tr>
                            <?php $total += $item->harga_saat_transaksi; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data untuk filter yang dipilih.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr class="table-light" style="color: var(--dark-bg);">
                        <th colspan="3" class="text-end">Total Pendapatan</th>
                        <th class="text-end">Rp <?= number_format($total, 0, ',', '.') ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>