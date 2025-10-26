<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Manajemen Kapster
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Manajemen Kapster
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card" style="background-color: var(--light-dark-bg); border: 1px solid var(--border-color); border-radius:0;">
    <div class="card-header d-flex justify-content-between align-items-center" style="border-bottom: 1px solid var(--border-color);">
        <h5 class="mb-0">Daftar Kapster</h5>
        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#formModal" data-url="/admin/kapsters/new">
            <i class="fas fa-plus"></i> Tambah Kapster Baru
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
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Spesialisasi</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($kapsters)): ?>
                        <?php foreach ($kapsters as $kapster): ?>
                            <tr>
                                <td><img src="/uploads/kapsters/<?= esc($kapster->foto_profil) ?>" alt="<?= esc($kapster->nama) ?>" width="50" height="50" class="rounded-circle" style="object-fit: cover;"></td>
                                <td><?= esc($kapster->nama) ?></td>
                                <td><?= esc($kapster->email) ?></td>
                                <td><?= esc($kapster->spesialisasi) ?></td>
                                <td>
                                    <span class="badge <?= $kapster->status == 'aktif' ? 'bg-success' : 'bg-danger' ?>">
                                        <?= esc($kapster->status) ?>
                                    </span>
                                </td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm btn-outline-light" data-bs-toggle="modal" data-bs-target="#formModal" data-url="/admin/kapsters/edit/<?= $kapster->id ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="/admin/kapsters/delete/<?= $kapster->id ?>" method="post" class="d-inline" onsubmit="return confirm('Menghapus kapster juga akan menghapus akun user terkait. Lanjutkan?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data kapster.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL KOSONG UNTUK FORM (CREATE & EDIT) -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Menggunakan modal-lg untuk form yang lebih lebar -->
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