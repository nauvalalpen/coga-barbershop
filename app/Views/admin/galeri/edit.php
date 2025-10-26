<div class="modal-header" style="border-bottom: 1px solid var(--border-color);">
    <h5 class="modal-title">Edit Informasi Gambar</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="/admin/galeri/update/<?= $item->id ?>" method="post">
    <div class="modal-body">
        <?= csrf_field() ?>
        <?php if (session()->get('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->get('errors') as $error) : ?><p class="mb-0"><?= esc($error) ?></p><?php endforeach ?>
            </div>
        <?php endif ?>

        <div class="text-center mb-3">
            <img src="/uploads/galeri/<?= esc($item->url_gambar) ?>" alt="<?= esc($item->judul) ?>" style="max-width: 200px;">
        </div>

        <div class="mb-3"><label for="judul" class="form-label">Judul Gambar</label><input type="text" class="form-control" name="judul" value="<?= old('judul', $item->judul) ?>" required></div>
        <div class="mb-3"><label for="deskripsi" class="form-label">Deskripsi</label><textarea class="form-control" name="deskripsi" rows="3"><?= old('deskripsi', $item->deskripsi) ?></textarea></div>
    </div>
    <div class="modal-footer" style="border-top: 1px solid var(--border-color);">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning">Update Informasi</button>
    </div>
</form>