<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('title') ?>Manajemen Booking<?= $this->endSection() ?>
<?= $this->section('page_title') ?>Manajemen Booking<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="card" style="background-color: var(--light-dark-bg); border: 1px solid var(--border-color);">
    <div class="card-body">
        <?php if (session()->get('success')): ?><div class="alert alert-success"><?= session('success') ?></div><?php endif; ?>
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Tanggal & Jam</th>
                        <th>Pelanggan</th><?php if (session()->get('role') === 'admin'): ?><th>Kapster</th><?php endif; ?><th>Layanan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $b): ?>
                        <tr>
                            <td><?= date('d M Y', strtotime($b->tanggal_booking)) ?>, <?= date('H:i', strtotime($b->jam_booking)) ?></td>
                            <td><?= esc($b->nama_pelanggan) ?></td>
                            <?php if (session()->get('role') === 'admin'): ?><td><?= esc($b->nama_kapster) ?></td><?php endif; ?>
                            <td><?= esc($b->nama_layanan) ?></td>
                            <td><span class="badge bg-warning"><?= esc($b->status) ?></span></td>
                            <td>
                                <form action="/admin/bookings/update-status/<?= $b->id ?>" method="post">
                                    <?= csrf_field() ?>
                                    <select name="status" class="form-select form-select-sm d-inline w-auto">
                                        <option value="confirmed" <?= $b->status == 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                        <option value="completed" <?= $b->status == 'completed' ? 'selected' : '' ?>>Completed</option>
                                        <?php if (session()->get('role') === 'admin'): ?><option value="cancelled" <?= $b->status == 'cancelled' ? 'selected' : '' ?>>Cancelled</option><?php endif; ?>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>