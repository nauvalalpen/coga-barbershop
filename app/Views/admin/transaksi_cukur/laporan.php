<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Revenue Reports
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Revenue Reports
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    :root {
        --gold-color: #d4af37;
        --dark-bg: #0a0a0a;
        --light-dark-bg: #141414;
        --card-bg: #1a1a1a;
        --border-color: #2a2a2a;
        --hover-bg: #1f1f1f;
    }

    /* Filter Card */
    .filter-card {
        background: linear-gradient(145deg, var(--card-bg), var(--light-dark-bg));
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .filter-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        color: var(--gold-color);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-label {
        color: #b0b0b0;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid #333;
        border-radius: 8px;
        padding: 10px 14px;
        color: #fff;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        background: rgba(255, 255, 255, 0.08);
        border-color: var(--gold-color);
        box-shadow: 0 0 15px rgba(212, 175, 55, 0.2);
        color: #fff;
        outline: none;
    }

    .form-select option {
        background: #1a1a1a;
        color: #fff;
    }

    .btn-filter {
        background: var(--gold-color);
        border: none;
        color: #000;
        padding: 10px 24px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-filter:hover {
        background: #f4d983;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
        color: #000;
    }

    .btn-reset {
        background: transparent;
        border: 2px solid #666;
        color: #b0b0b0;
        padding: 10px 24px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-reset:hover {
        border-color: #999;
        color: #fff;
        background: rgba(255, 255, 255, 0.05);
    }

    /* Report Card */
    .report-card {
        background: linear-gradient(145deg, var(--card-bg), var(--light-dark-bg));
        border: 1px solid var(--border-color);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .report-card-header {
        background: linear-gradient(135deg, var(--light-dark-bg) 0%, var(--dark-bg) 100%);
        border-bottom: 1px solid var(--border-color);
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .report-card-header h5 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin: 0;
        color: #fff;
        font-weight: 700;
    }

    .export-buttons {
        display: flex;
        gap: 10px;
    }

    .btn-export {
        padding: 8px 20px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        border: 2px solid;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-export-pdf {
        background: #ae2819ff;
        border-color: #dc3545;
        color: #fff;
    }

    .btn-export-pdf:hover {
        background: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(220, 53, 69, 0.4);
        color: #fff;
    }

    .btn-export-excel {
        background: #137a2bff;
        border-color: #28a745;
        color: #fff;
    }

    .btn-export-excel:hover {
        background: #218838;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(40, 167, 69, 0.4);
        color: #fff;
    }

    /* Table */
    .table-modern {
        background: transparent;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-modern thead th {
        background: var(--light-dark-bg);
        color: var(--gold-color);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
        padding: 1.25rem 1rem;
        border: none;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .table-modern tbody tr {
        background: var(--card-bg);
        border-bottom: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .table-modern tbody tr:hover {
        background: var(--hover-bg);
        transform: scale(1.01);
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.1);
    }

    .table-modern tbody td {
        padding: 1.25rem 1rem;
        vertical-align: middle;
        border: none;
        background: rgba(0, 0, 0, 0.2);
    }

    .table-modern tfoot {
        background: linear-gradient(135deg, var(--gold-color), #f4d983);
        font-weight: 700;
    }

    .table-modern tfoot th {
        color: #000 !important;
        padding: 1.25rem 1rem;
        border: none;
        font-size: 1.1rem;
    }

    /* Override any Bootstrap default styles */
    .table-modern tfoot tr {
        background: linear-gradient(135deg, var(--gold-color), #f4d983);
    }

    .table-modern tfoot tr th {
        color: #000 !important;
        background: transparent !important;
    }

    /* Date Badge */
    .date-badge {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .date-display {
        font-weight: 600;
        color: #fff;
    }

    .time-display {
        font-size: 0.85rem;
        color: var(--gold-color);
    }

    /* Barber Badge */
    .barber-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(74, 158, 255, 0.15);
        border: 1px solid rgba(74, 158, 255, 0.3);
        color: #4a9eff;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* Service Badge */
    .service-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(212, 175, 55, 0.15);
        border: 1px solid rgba(212, 175, 55, 0.3);
        color: var(--gold-color);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* Price Display */
    .price-display {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--gold-color);
        font-family: 'Playfair Display', serif;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
    }

    .empty-state-icon {
        font-size: 5rem;
        color: var(--border-color);
        margin-bottom: 1.5rem;
        opacity: 0.5;
    }

    .empty-state-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: #fff;
        margin-bottom: 1rem;
    }

    .empty-state-text {
        color: #888;
        font-size: 1.1rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .report-card-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .export-buttons {
            width: 100%;
            flex-direction: column;
        }

        .btn-export {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<!-- Filter Card -->
<div class="filter-card">
    <h5 class="filter-title">
        <i class="fas fa-filter"></i>
        Filter Reports
    </h5>
    <form method="get" action="/admin/laporan-cukur">
        <div class="row g-3">
            <div class="col-md-4">
                <label for="kapster_id" class="form-label">
                    <i class="fas fa-user-tie me-1"></i> Barber
                </label>
                <select name="kapster_id" id="kapster_id" class="form-select">
                    <option value="">All Barbers</option>
                    <?php foreach ($kapsters as $kapster): ?>
                        <option value="<?= $kapster->id ?>" <?= ($filters['kapster_id'] ?? '') == $kapster->id ? 'selected' : '' ?>>
                            <?= esc($kapster->nama) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="start_date" class="form-label">
                    <i class="far fa-calendar me-1"></i> From Date
                </label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="<?= $filters['start_date'] ?? '' ?>">
            </div>
            <div class="col-md-3">
                <label for="end_date" class="form-label">
                    <i class="far fa-calendar-check me-1"></i> To Date
                </label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="<?= $filters['end_date'] ?? '' ?>">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <div class="w-100">
                    <button type="submit" class="btn-filter w-100">
                        <i class="fas fa-search me-2"></i> Filter
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <a href="/admin/laporan-cukur" class="btn-reset">
                    <i class="fas fa-redo me-2"></i> Reset Filters
                </a>
            </div>
        </div>
    </form>
</div>

<!-- Report Card -->
<div class="report-card">
    <div class="report-card-header">
        <h5>Report Results</h5>
        <div class="export-buttons">
            <a href="<?= site_url('admin/laporan-cukur/export/pdf?' . http_build_query($filters)) ?>" class="btn-export btn-export-pdf">
                <i class="fas fa-file-pdf"></i>
                Export PDF
            </a>
            <a href="<?= site_url('admin/laporan-cukur/export/excel?' . http_build_query($filters)) ?>" class="btn-export btn-export-excel">
                <i class="fas fa-file-excel"></i>
                Export Excel
            </a>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th style="width: 20%;">Date & Time</th>
                        <th style="width: 25%;">Barber</th>
                        <th style="width: 30%;">Service</th>
                        <th style="width: 25%;" class="text-end">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php if (!empty($transaksi)): ?>
                        <?php foreach ($transaksi as $item): ?>
                            <tr>
                                <td>
                                    <div class="date-badge">
                                        <div class="date-display">
                                            <i class="far fa-calendar me-1"></i>
                                            <?= date('d M Y', strtotime($item->created_at)) ?>
                                        </div>
                                        <div class="time-display">
                                            <i class="far fa-clock me-1"></i>
                                            <?= date('H:i', strtotime($item->created_at)) ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="barber-badge">
                                        <i class="fas fa-user-tie"></i>
                                        <?= esc($item->nama_kapster) ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="service-badge">
                                        <i class="fas fa-cut"></i>
                                        <?= esc($item->nama_layanan) ?>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <div class="price-display">
                                        Rp <?= number_format($item->harga_saat_transaksi, 0, ',', '.') ?>
                                    </div>
                                </td>
                            </tr>
                            <?php $total += $item->harga_saat_transaksi; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <h3 class="empty-state-title">No Data Available</h3>
                                    <p class="empty-state-text">No transactions found for the selected filters</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <?php if (!empty($transaksi)): ?>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end" style="font-size: 1.2rem;">
                                <i class="fas fa-coins me-2"></i>
                                TOTAL REVENUE
                            </th>
                            <th class="text-end" style="font-size: 1.5rem; font-family: 'Playfair Display', serif;">
                                Rp <?= number_format($total, 0, ',', '.') ?>
                            </th>
                        </tr>
                    </tfoot>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>