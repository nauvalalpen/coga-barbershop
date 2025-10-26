<div class="modal-header" style="border-bottom: 1px solid var(--border-color);">
    <h5 class="modal-title">Tambah Catatan Cukur</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="/admin/catatan-cukur/create" method="post">
    <div class="modal-body">
        <?= csrf_field() ?>
        <?php if (session()->get('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->get('errors') as $error) : ?><p class="mb-0"><?= esc($error) ?></p><?php endforeach ?>
            </div>
        <?php endif ?>

        <div class="mb-3">
            <label for="layanan_id" class="form-label">Pilih Layanan yang Diberikan</label>
            <select class="form-select" name="layanan_id" id="layanan_id" required>
                <option value="">-- Pilih Layanan --</option>
                <?php foreach ($layanan as $item): ?>
                    <option value="<?= $item->id ?>"><?= esc($item->nama_layanan) ?> - Rp <?= number_format($item->harga, 0, ',', '.') ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="modal-footer" style="border-top: 1px solid var(--border-color);">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning">Simpan Catatan</button>
    </div>
</form>