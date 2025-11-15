<style>
    .modal-header-custom {
        background: linear-gradient(135deg, #1a1a1a 0%, #0f0f0f 100%);
        border-bottom: 1px solid #2a2a2a;
        padding: 1.5rem;
    }

    .modal-title-custom {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        color: #d4af37;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .form-label-custom {
        color: #b0b0b0;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label-custom i {
        color: #d4af37;
    }

    .form-control-custom {
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid #333;
        border-radius: 8px;
        padding: 12px 16px;
        color: #fff;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control-custom:focus {
        background: rgba(255, 255, 255, 0.08);
        border-color: #d4af37;
        box-shadow: 0 0 20px rgba(212, 175, 55, 0.2);
        color: #fff;
        outline: none;
    }

    .form-control-custom::placeholder {
        color: #666;
    }

    textarea.form-control-custom {
        resize: vertical;
        min-height: 100px;
    }

    /* Input Group Custom */
    .input-group-custom {
        display: flex;
        align-items: stretch;
        border: 2px solid #333;
        border-radius: 8px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }

    .input-group-custom:focus-within {
        border-color: #d4af37;
        box-shadow: 0 0 20px rgba(212, 175, 55, 0.2);
    }

    .input-group-text-custom {
        background: rgba(212, 175, 55, 0.15);
        border: none;
        color: #d4af37;
        padding: 12px 16px;
        font-weight: 700;
        font-size: 1rem;
        display: flex;
        align-items: center;
        min-width: 60px;
        justify-content: center;
    }

    .input-group-custom input {
        flex: 1;
        border: none;
        background: transparent;
        color: #fff;
        padding: 12px 16px;
        font-size: 1rem;
        outline: none;
    }

    .input-group-custom input:focus {
        background: transparent;
    }

    /* Alert Custom */
    .alert-custom {
        background: rgba(220, 53, 69, 0.1);
        border: 1px solid rgba(220, 53, 69, 0.3);
        border-left: 4px solid #dc3545;
        color: #dc3545;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    .alert-custom p {
        margin: 5px 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Helper Text */
    .form-helper {
        font-size: 0.8rem;
        color: #666;
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .form-helper i {
        color: #4a9eff;
    }

    /* Modal Footer */
    .modal-footer-custom {
        border-top: 1px solid #2a2a2a;
        padding: 1.25rem 1.5rem;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .btn-cancel {
        background: transparent;
        border: 2px solid #666;
        color: #b0b0b0;
        padding: 10px 24px;
        border-radius: 6px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
        transition: all 0.3s ease;
    }

    .btn-cancel:hover {
        border-color: #999;
        color: #fff;
        background: rgba(255, 255, 255, 0.05);
    }

    .btn-submit {
        background: #d4af37;
        border: 2px solid #d4af37;
        color: #000;
        padding: 10px 28px;
        border-radius: 6px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-submit:hover {
        background: #f4d983;
        border-color: #f4d983;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
    }

    .btn-submit:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }
</style>

<div class="modal-header-custom">
    <h5 class="modal-title-custom">
        <i class="fas fa-plus-circle"></i>
        Add New Service
    </h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form action="/admin/layanan/create" method="post" id="createForm">
    <div class="modal-body" style="padding: 2rem;">
        <?= csrf_field() ?>

        <?php if (session()->get('errors')): ?>
            <div class="alert-custom">
                <strong><i class="fas fa-exclamation-triangle"></i> Please fix the following errors:</strong>
                <?php foreach (session()->get('errors') as $error) : ?>
                    <p><i class="fas fa-circle" style="font-size: 0.4rem;"></i> <?= esc($error) ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <div class="mb-4">
            <label for="nama_layanan" class="form-label-custom">
                <i class="fas fa-cut"></i>
                Service Name
            </label>
            <input type="text"
                class="form-control-custom"
                name="nama_layanan"
                id="nama_layanan"
                value="<?= old('nama_layanan') ?>"
                placeholder="e.g., Premium Haircut, Beard Styling"
                required>
            <div class="form-helper">
                <i class="fas fa-info-circle"></i>
                <span>Enter a descriptive name for your service</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="harga" class="form-label-custom">
                    <i class="fas fa-tag"></i>
                    Price
                </label>
                <div class="input-group-custom">
                    <span class="input-group-text-custom">Rp</span>
                    <input type="number"
                        name="harga"
                        id="harga"
                        value="<?= old('harga') ?>"
                        placeholder="50000"
                        min="0"
                        step="1000"
                        required>
                </div>
                <div class="form-helper">
                    <i class="fas fa-info-circle"></i>
                    <span>Set the service price in Rupiah</span>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <label for="durasi_menit" class="form-label-custom">
                    <i class="far fa-clock"></i>
                    Duration
                </label>
                <div class="input-group-custom">
                    <input type="number"
                        name="durasi_menit"
                        id="durasi_menit"
                        value="<?= old('durasi_menit') ?>"
                        placeholder="30"
                        min="5"
                        max="240"
                        required>
                    <span class="input-group-text-custom">min</span>
                </div>
                <div class="form-helper">
                    <i class="fas fa-info-circle"></i>
                    <span>Estimated time in minutes</span>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label-custom">
                <i class="fas fa-align-left"></i>
                Description
            </label>
            <textarea class="form-control-custom"
                name="deskripsi"
                id="deskripsi"
                rows="4"
                placeholder="Describe what's included in this service..."><?= old('deskripsi') ?></textarea>
            <div class="form-helper">
                <i class="fas fa-info-circle"></i>
                <span>Provide details about the service (optional)</span>
            </div>
        </div>
    </div>

    <div class="modal-footer-custom">
        <button type="button" class="btn-cancel" data-bs-dismiss="modal">
            <i class="fas fa-times me-1"></i>
            Cancel
        </button>
        <button type="submit" class="btn-submit" id="submitBtn">
            <i class="fas fa-save"></i>
            Save Service
        </button>
    </div>
</form>

<script>
    // Form submission handling
    document.getElementById('createForm').addEventListener('submit', function() {
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
    });

    // Number input validation
    document.getElementById('harga').addEventListener('input', function() {
        if (this.value < 0) this.value = 0;
    });

    document.getElementById('durasi_menit').addEventListener('input', function() {
        if (this.value < 5) this.value = 5;
        if (this.value > 240) this.value = 240;
    });

    // Auto-format currency on blur
    document.getElementById('harga').addEventListener('blur', function() {
        if (this.value && this.value % 1000 !== 0) {
            this.value = Math.round(this.value / 1000) * 1000;
        }
    });
</script>