<div class="modal-header" style="border-bottom: 1px solid var(--border-color);">
    <h5 class="modal-title">Edit Catatan Cukur</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="/admin/transaksi_cukur/update/<?= $transaksi->id ?>" method="post">
    <div class="modal-body">
        <?= csrf_field() ?>
        <p class="text-muted">Mengedit transaksi untuk tanggal: <?= date('d M Y, H:i', strtotime($transaksi->created_at)) ?></p>
        <?php if (session()->get('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->get('errors') as $error) : ?><p class="mb-0"><?= esc($error) ?></p><?php endforeach ?>
            </div>
        <?php endif ?>

        <div class="mb-3">
            <label for="layanan_id_edit" class="form-label">Pilih Layanan yang Diberikan</label>
            <select class="form-select" name="layanan_id" id="layanan_id_edit" required>
                <option value="">-- Pilih Layanan --</option>
                <?php foreach ($layanan as $item): ?>
                    <option value="<?= $item->id ?>" <?= ($item->id == old('layanan_id', $transaksi->layanan_id)) ? 'selected' : '' ?>>
                        <?= esc($item->nama_layanan) ?> - Rp <?= number_format($item->harga, 0, ',', '.') ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="modal-footer" style="border-top: 1px solid var(--border-color);">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning">Update Catatan</button>
    </div>
</form>