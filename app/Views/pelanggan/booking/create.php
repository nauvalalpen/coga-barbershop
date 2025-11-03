<?= $this->extend('layouts/pelanggan_layout') ?>
<?= $this->section('title') ?>Buat Booking Baru<?= $this->endSection() ?>
<?= $this->section('page_header') ?>RESERVASI<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card bg-dark text-white">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4">Pilih Layanan & Jadwal</h2>
                    <?php if (session()->get('errors')): ?>
                        <div class="alert alert-danger"><?= implode('<br>', session('errors')) ?></div>
                    <?php endif; ?>
                    <form action="/booking/create" method="post">
                        <?= csrf_field() ?>
                        <div class="mb-3"><label class="form-label">Pilih Layanan</label><select name="layanan_id" class="form-select"><?php foreach ($layanans as $l): ?><option value="<?= $l->id ?>"><?= esc($l->nama_layanan) ?> (Rp<?= number_format($l->harga) ?>)</option><?php endforeach; ?></select></div>
                        <div class="mb-3"><label class="form-label">Pilih Kapster</label><select name="kapster_id" class="form-select"><?php foreach ($kapsters as $k): ?><option value="<?= $k->id ?>"><?= esc($k->nama) ?></option><?php endforeach; ?></select></div>
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Tanggal Booking</label><input type="date" name="tanggal_booking" class="form-control"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Jam Booking</label><input type="time" name="jam_booking" class="form-control"></div>
                        </div>
                        <button type="submit" class="btn btn-warning w-100 mt-3">Buat Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>