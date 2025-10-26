<!-- TIDAK ADA extend() ATAU section() LAGI -->
<div class="modal-header" style="border-bottom: 1px solid var(--border-color);">
    <h5 class="modal-title">Edit Layanan: <?= esc($layanan->nama_layanan) ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="/admin/layanan/update/<?= $layanan->id ?>" method="post">
    <div class="modal-body">
        <?= csrf_field() ?>
        <?php if (session()->get('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->get('errors') as $error) : ?><p class="mb-0"><?= esc($error) ?></p><?php endforeach ?>
            </div>
        <?php endif ?>

        <div class="mb-3"><label for="nama_layanan" class="form-label">Nama Layanan</label><input type="text" class="form-control" name="nama_layanan" value="<?= old('nama_layanan', $layanan->nama_layanan) ?>" required></div>
        <div class="row">
            <div class="col-md-6 mb-3"><label for="harga" class="form-label">Harga</label>
                <div class="input-group"><span class="input-group-text">Rp</span><input type="number" class="form-control" name="harga" value="<?= old('harga', $layanan->harga) ?>" required></div>
            </div>
            <div class="col-md-6 mb-3"><label for="durasi_menit" class="form-label">Durasi (menit)</label>
                <div class="input-group"><input type="number" class="form-control" name="durasi_menit" value="<?= old('durasi_menit', $layanan->durasi_menit) ?>" required><span class="input-group-text">Menit</span></div>
            </div>
        </div>
        <div class="mb-3"><label for="deskripsi" class="form-label">Deskripsi</label><textarea class="form-control" name="deskripsi" rows="3"><?= old('deskripsi', $layanan->deskripsi) ?></textarea></div>
    </div>
    <div class="modal-footer" style="border-top: 1px solid var(--border-color);">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning">Update Layanan</button>
    </div>
</form>