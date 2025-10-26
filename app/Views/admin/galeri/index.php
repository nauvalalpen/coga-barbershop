<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Manajemen Galeri
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Manajemen Galeri
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card" style="background-color: var(--light-dark-bg); border: 1px solid var(--border-color); border-radius:0;">
    <div class="card-header d-flex justify-content-between align-items-center" style="border-bottom: 1px solid var(--border-color);">
        <h5 class="mb-0">Daftar Gambar Galeri</h5>
        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#formModal" data-url="/admin/galeri/new">
            <i class="fas fa-plus"></i> Tambah Gambar Baru
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
                        <th scope="col" style="width: 15%;">Gambar</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($galeri)): ?>
                        <?php foreach ($galeri as $item): ?>
                            <tr>
                                <td><img src="/uploads/galeri/<?= esc($item->url_gambar) ?>" alt="<?= esc($item->judul) ?>" width="100" style="object-fit: cover;"></td>
                                <td><?= esc($item->judul) ?></td>
                                <td><?= esc($item->deskripsi) ?></td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm btn-outline-light" data-bs-toggle="modal" data-bs-target="#formModal" data-url="/admin/galeri/edit/<?= $item->id ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="/admin/galeri/delete/<?= $item->id ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Belum ada gambar di galeri.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL KOSONG UNTUK FORM -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: var(--light-dark-bg); border: 1px solid var(--border-color);">
            <div class="modal-body p-0">
                <!-- Konten form akan dimuat di sini -->
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
        const formModal = new bootstrap.Modal(document.getElementById('formModal'));
        const modalBody = document.querySelector('#formModal .modal-body');

        document.getElementById('formModal').addEventListener('show.bs.modal', function(event) {
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