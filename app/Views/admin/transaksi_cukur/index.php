<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Catatan Cukur Saya
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Catatan Cukur Saya
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card" style="background-color: var(--light-dark-bg); border: 1px solid var(--border-color); border-radius:0;">
    <div class="card-header d-flex justify-content-between align-items-center" style="border-bottom: 1px solid var(--border-color);">
        <h5 class="mb-0">Riwayat Transaksi Saya</h5>
        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#formModal" data-url="/admin/catatan-cukur/new">
            <i class="fas fa-plus"></i> Tambah Catatan
        </button>
    </div>
    <div class="card-body">
        <?php if (session()->get('success')): ?>
            <div class="alert alert-success"><?= session()->get('success') ?></div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Layanan</th>
                        <th scope="col">Harga</th>
                        <th scope="col" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($transaksi)): ?>
                        <?php foreach ($transaksi as $item): ?>
                            <tr>
                                <td><?= date('d M Y, H:i', strtotime($item->created_at)) ?></td>
                                <td><?= esc($item->nama_layanan) ?></td>
                                <td>Rp <?= number_format($item->harga_saat_transaksi, 0, ',', '.') ?></td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm btn-outline-light" data-bs-toggle="modal" data-bs-target="#formModal" data-url="/admin/catatan-cukur/edit/<?= $item->id ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="/admin/catatan-cukur/delete/<?= $item->id ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Belum ada catatan transaksi.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL KOSONG UNTUK FORM (CREATE & EDIT) -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: var(--light-dark-bg); border: 1px solid var(--border-color);">
            <div class="modal-body p-0">
                <div class="text-center p-5">
                    <div class="spinner-border text-warning" role="status"><span class="visually-hidden">Loading...</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk memuat konten ke dalam modal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formModalEl = document.getElementById('formModal');
        const formModal = new bootstrap.Modal(formModalEl);
        const modalBody = formModalEl.querySelector('.modal-body');

        formModalEl.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const url = button.getAttribute('data-url');
            modalBody.innerHTML = '<div class="text-center p-5"><div class="spinner-border text-warning" role="status"><span class="visually-hidden">Loading...</span></div></div>';
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    modalBody.innerHTML = html;
                })
                .catch(error => {
                    modalBody.innerHTML = '<div class="alert alert-danger m-3">Gagal memuat form.</div>';
                });
        });
    });
</script>
<?= $this->endSection() ?>