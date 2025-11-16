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

    .info-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(74, 158, 255, 0.1);
        border: 1px solid rgba(74, 158, 255, 0.3);
        color: #4a9eff;
        padding: 10px 16px;
        border-radius: 8px;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
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

    .form-select-custom {
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid #333;
        border-radius: 8px;
        padding: 12px 16px;
        color: #fff;
        font-size: 1rem;
        transition: all 0.3s ease;
        width: 100%;
    }

    .form-select-custom:focus {
        background: rgba(255, 255, 255, 0.08);
        border-color: #d4af37;
        box-shadow: 0 0 20px rgba(212, 175, 55, 0.2);
        color: #fff;
        outline: none;
    }

    .form-select-custom option {
        background: #1a1a1a;
        color: #fff;
        padding: 10px;
    }

    .form-select-custom option:hover {
        background: #2a2a2a;
    }

    .form-helper {
        font-size: 0.8rem;
        color: #666;
        margin-top: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .form-helper i {
        color: #4a9eff;
    }

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

    .service-option {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
    }
</style>

<div class="modal-header-custom">
    <h5 class="modal-title-custom">
        <i class="fas fa-plus-circle"></i>
        Add Work Log
    </h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form action="/admin/catatan-cukur/create" method="post" id="createForm">
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

        <div class="info-badge">
            <i class="fas fa-info-circle"></i>
            <span>Record a service you've completed</span>
        </div>

        <div class="mb-4">
            <label for="layanan_id" class="form-label-custom">
                <i class="fas fa-cut"></i>
                Select Service Provided
            </label>
            <select class="form-select-custom" name="layanan_id" id="layanan_id" required>
                <option value="">-- Choose Service --</option>
                <?php foreach ($layanan as $item): ?>
                    <option value="<?= $item->id ?>" data-price="<?= $item->harga ?>">
                        <?= esc($item->nama_layanan) ?> - Rp <?= number_format($item->harga, 0, ',', '.') ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="form-helper">
                <i class="fas fa-info-circle"></i>
                <span>Select the service you provided to the customer</span>
            </div>
        </div>

        <div id="servicePreview" style="display: none; margin-top: 1.5rem; padding: 1rem; background: rgba(212, 175, 55, 0.1); border: 1px solid rgba(212, 175, 55, 0.3); border-radius: 8px;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <div style="color: #888; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Selected Service</div>
                    <div style="color: #fff; font-size: 1.1rem; font-weight: 600;" id="previewServiceName"></div>
                </div>
                <div style="text-align: right;">
                    <div style="color: #888; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Earning</div>
                    <div style="color: #d4af37; font-size: 1.5rem; font-weight: 700; font-family: 'Playfair Display', serif;" id="previewPrice"></div>
                </div>
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
            Save Log
        </button>
    </div>
</form>

<script>
    // Show service preview when selected
    document.getElementById('layanan_id').addEventListener('change', function() {
        const preview = document.getElementById('servicePreview');
        const serviceName = document.getElementById('previewServiceName');
        const price = document.getElementById('previewPrice');

        if (this.value) {
            const selectedOption = this.options[this.selectedIndex];
            const serviceText = selectedOption.text.split(' - ')[0];
            const priceValue = selectedOption.getAttribute('data-price');

            serviceName.textContent = serviceText;
            price.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(priceValue);
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    });

    // Form submission handling
    document.getElementById('createForm').addEventListener('submit', function() {
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
    });
</script>