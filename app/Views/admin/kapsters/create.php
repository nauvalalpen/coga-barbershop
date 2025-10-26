<div class="modal-header" style="border-bottom: 1px solid var(--border-color);">
    <h5 class="modal-title">Tambah Kapster Baru</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="/admin/kapsters/create" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <?= csrf_field() ?>
        <?php if (session()->get('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->get('errors') as $error) : ?><p class="mb-0"><?= esc($error) ?></p><?php endforeach ?>
            </div>
        <?php endif ?>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama') ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email (untuk login)</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password Awal</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="spesialisasi" class="form-label">Spesialisasi (Contoh: Fade, Classic Cut)</label>
            <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="<?= old('spesialisasi') ?>">
        </div>
        <div class="mb-3">
            <label for="foto_profil" class="form-label">Foto Profil</label>
            <input type="file" class="form-control" id="foto_profil" name="foto_profil" required>
        </div>
    </div>
    <div class="modal-footer" style="border-top: 1px solid var(--border-color);">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning">Simpan Kapster</button>
    </div>
</form>