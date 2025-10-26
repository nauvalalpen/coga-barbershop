<div class="modal-header" style="border-bottom: 1px solid var(--border-color);">
    <h5 class="modal-title">Edit Kapster: <?= esc($kapster->nama) ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="/admin/kapsters/update/<?= $kapster->id ?>" method="post" enctype="multipart/form-data">
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
                <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama', $kapster->nama) ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= old('email', $kapster->email) ?>" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password Baru (Kosongkan jika tidak diubah)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="spesialisasi" class="form-label">Spesialisasi</label>
                <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="<?= old('spesialisasi', $kapster->spesialisasi) ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="aktif" <?= old('status', $kapster->status) == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                    <option value="tidak_aktif" <?= old('status', $kapster->status) == 'tidak_aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="foto_profil" class="form-label">Ganti Foto Profil (Kosongkan jika tidak diubah)</label>
            <input type="file" class="form-control" id="foto_profil" name="foto_profil">
        </div>
        <div class="text-center">
            <img src="/uploads/kapsters/<?= esc($kapster->foto_profil) ?>" alt="<?= esc($kapster->nama) ?>" height="100" class="rounded-circle">
        </div>
    </div>
    <div class="modal-footer" style="border-top: 1px solid var(--border-color);">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning">Update Kapster</button>
    </div>
</form>