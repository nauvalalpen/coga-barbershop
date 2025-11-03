<?= $this->extend('layouts/pelanggan_layout') ?>
<?= $this->section('title') ?>Riwayat Booking Saya<?= $this->endSection() ?>
<?= $this->section('page_header') ?>MY BOOKINGS<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container py-5">
    <?php if (session()->get('success')): ?><div class="alert alert-success"><?= session('success') ?></div><?php endif; ?>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal & Jam</th>
                            <th>Kapster</th>
                            <th>Layanan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bookings as $b): ?>
                            <tr>
                                <td><?= date('d M Y', strtotime($b->tanggal_booking)) ?>, <?= date('H:i', strtotime($b->jam_booking)) ?></td>
                                <td><?= esc($b->nama_kapster) ?></td>
                                <td><?= esc($b->nama_layanan) ?></td>
                                <td><span class="badge bg-warning"><?= esc($b->status) ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>