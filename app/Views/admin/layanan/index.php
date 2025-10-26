<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Manajemen Layanan
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Manajemen Layanan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card" style="background-color: var(--light-dark-bg); border: 1px solid var(--border-color); border-radius:0;">
    <div class="card-header d-flex justify-content-between align-items-center" style="border-bottom: 1px solid var(--border-color);">
        <h5 class="mb-0">Daftar Layanan</h5>
        <!-- Tombol ini sekarang akan memuat konten dari /admin/layanan/new ke dalam modal -->
        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#formModal" data-url="/admin/layanan/new">
            <i class="fas fa-plus"></i> Tambah Layanan Baru
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
                        <th scope="col">Nama Layanan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Durasi</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($layanan)): ?>
                        <?php foreach ($layanan as $item): ?>
                            <tr>
                                <td><?= esc($item->nama_layanan) ?></td>
                                <td>Rp <?= number_format($item->harga, 0, ',', '.') ?></td>
                                <td><?= esc($item->durasi_menit) ?> Menit</td>
                                <td><?= esc($item->deskripsi) ?></td>
                                <td class="text-end">
                                    <!-- Tombol ini akan memuat konten dari /admin/layanan/edit/{id} ke dalam modal -->
                                    <button type="button" class="btn btn-sm btn-outline-light" data-bs-toggle="modal" data-bs-target="#formModal" data-url="/admin/layanan/edit/<?= $item->id ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="/admin/layanan/delete/<?= $item->id ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data layanan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- =============================================================================================== -->
<!-- MODAL KOSONG UNTUK FORM (CREATE & EDIT) -->
<!-- =============================================================================================== -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: var(--light-dark-bg); border: 1px solid var(--border-color);">
            <div class="modal-body">
                <!-- Konten form dari create.php atau edit.php akan dimuat di sini oleh JavaScript -->
                <div class="text-center">
                    <div class="spinner-border text-warning" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
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

        // Listener saat modal akan ditampilkan
        document.getElementById('formModal').addEventListener('show.bs.modal', function(event) {
            // Tombol yang memicu modal
            const button = event.relatedTarget;
            // URL untuk mengambil konten form
            const url = button.getAttribute('data-url');

            // Tampilkan spinner loading
            modalBody.innerHTML = '<div class="text-center p-5"><div class="spinner-border text-warning" role="status"><span class="visually-hidden">Loading...</span></div></div>';

            // Ambil konten form dari URL menggunakan Fetch API (AJAX)
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    // Masukkan HTML form ke dalam body modal
                    modalBody.innerHTML = html;
                })
                .catch(error => {
                    modalBody.innerHTML = '<div class="alert alert-danger">Gagal memuat form.</div>';
                });
        });
    });
</script>
<?= $this->endSection() ?>