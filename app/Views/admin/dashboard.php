<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Dashboard Overview
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .stat-card {
        background-color: var(--light-dark-bg);
        border: 1px solid var(--border-color);
        border-left-width: 5px;
        border-radius: 0;
        transition: border-color 0.3s ease;
    }

    .stat-card:hover {
        border-color: var(--gold-color) !important;
    }

    .stat-card .card-body {
        padding: 1.5rem;
    }

    .stat-card-icon {
        font-size: 3rem;
        opacity: 0.2;
        transition: opacity 0.3s ease;
    }

    .stat-card:hover .stat-card-icon {
        opacity: 0.5;
    }

    .stat-card .h2 {
        font-family: 'Playfair Display', serif;
    }

    .stat-card.card-gold {
        border-left-color: var(--gold-color);
    }

    .stat-card.card-light {
        border-left-color: #eee;
    }
</style>

<!-- Baris Kartu Statistik -->
<div class="row g-4">
    <div class="col-lg-3 col-md-6">
        <div class="card stat-card card-gold">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="text-uppercase text-muted mb-2">Total Pendapatan</h6>
                        <span class="h2 mb-0">Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></span>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign stat-card-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card stat-card card-light">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="text-uppercase text-muted mb-2">Total Transaksi</h6>
                        <span class="h2 mb-0"><?= $jumlah_transaksi ?></span>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-receipt stat-card-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card stat-card card-light">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="text-uppercase text-muted mb-2">Jumlah Pelanggan</h6>
                        <span class="h2 mb-0"><?= $jumlah_pelanggan ?></span>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-friends stat-card-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card stat-card card-light">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="text-uppercase text-muted mb-2">Jumlah Kapster</h6>
                        <span class="h2 mb-0"><?= $jumlah_kapster ?></span>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cut stat-card-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="my-4" style="border-color: var(--border-color);">

<!-- Kartu Sambutan -->
<div class="row">
    <div class="col-12">
        <div class="card" style="background-color: var(--light-dark-bg); border: 1px solid var(--border-color); border-radius:0;">
            <div class="card-header" style="border-bottom: 1px solid var(--border-color);">
                <h5>Selamat Datang di Panel Admin</h5>
            </div>
            <div class="card-body">
                <p>Gunakan menu navigasi di sebelah kiri untuk mengelola konten dan operasional Coga Barbershop.</p>
                <p>Peran Anda saat ini: <strong style="color: var(--gold-color);"><?= esc(session()->get('role')) ?></strong></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>