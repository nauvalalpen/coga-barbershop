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

    .image-preview-container {
        text-align: center;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: rgba(212, 175, 55, 0.03);
        border: 2px solid #333;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .image-preview-container:hover {
        border-color: #d4af37;
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.15);
    }

    .image-preview {
        max-width: 100%;
        max-height: 300px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .image-preview:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
    }

    .image-info {
        margin-top: 1rem;
        padding: 12px;
        background: rgba(0, 0, 0, 0.3);
        border-radius: 6px;
        font-size: 0.85rem;
        color: #b0b0b0;
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
        min-height: 120px;
    }

    /* Alert Styling */
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

    /* Info Badge */
    .info-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(74, 158, 255, 0.1);
        border: 1px solid rgba(74, 158, 255, 0.3);
        color: #4a9eff;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    /* Button Styling */
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

    .btn-update {
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

    .btn-update:hover {
        background: #f4d983;
        border-color: #f4d983;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
    }

    .btn-update:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    /* Character Counter */
    .char-counter {
        text-align: right;
        font-size: 0.8rem;
        color: #666;
        margin-top: 4px;
    }

    .char-counter.warning {
        color: #ffc107;
    }

    .char-counter.danger {
        color: #dc3545;
    }
</style>

<div class="modal-header-custom">
    <h5 class="modal-title-custom">
        <i class="fas fa-edit"></i>
        Edit Gallery Information
    </h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form action="/admin/galeri/update/<?= $item->id ?>" method="post" id="editForm">
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
            <span>Editing image details only. To change the image file, please delete and upload a new one.</span>
        </div>

        <!-- Image Preview -->
        <div class="image-preview-container">
            <img src="/uploads/galeri/<?= esc($item->url_gambar) ?>"
                alt="<?= esc($item->judul) ?>"
                class="image-preview"
                onerror="this.src='https://via.placeholder.com/400x300/1a1a1a/d4af37?text=Image+Not+Found'">
            <div class="image-info">
                <i class="fas fa-file-image me-2"></i>
                Current Image: <strong><?= esc($item->url_gambar) ?></strong>
            </div>
        </div>

        <!-- Title Field -->
        <div class="mb-4">
            <label for="judul" class="form-label-custom">
                <i class="fas fa-heading"></i>
                Image Title
            </label>
            <input type="text"
                class="form-control-custom"
                name="judul"
                id="judul"
                value="<?= old('judul', $item->judul) ?>"
                placeholder="Enter a catchy title for your image"
                maxlength="100"
                required
                oninput="updateCharCount('judul', 100)">
            <div class="char-counter" id="judulCounter">
                <?= strlen($item->judul) ?> / 100 characters
            </div>
        </div>

        <!-- Description Field -->
        <div class="mb-4">
            <label for="deskripsi" class="form-label-custom">
                <i class="fas fa-align-left"></i>
                Description
            </label>
            <textarea class="form-control-custom"
                name="deskripsi"
                id="deskripsi"
                rows="5"
                maxlength="500"
                placeholder="Describe your image, style, or story behind it..."
                oninput="updateCharCount('deskripsi', 500)"><?= old('deskripsi', $item->deskripsi) ?></textarea>
            <div class="char-counter" id="deskripsiCounter">
                <?= strlen($item->deskripsi) ?> / 500 characters
            </div>
        </div>

        <!-- Metadata Display -->
        <div class="row">
            <div class="col-md-6">
                <div style="padding: 12px; background: rgba(0, 0, 0, 0.3); border-radius: 6px; margin-bottom: 1rem;">
                    <small style="color: #666; display: block; margin-bottom: 4px;">Created</small>
                    <strong style="color: #d4af37;">
                        <i class="far fa-calendar-plus me-1"></i>
                        <?= date('M d, Y - H:i', strtotime($item->created_at)) ?>
                    </strong>
                </div>
            </div>
            <div class="col-md-6">
                <div style="padding: 12px; background: rgba(0, 0, 0, 0.3); border-radius: 6px; margin-bottom: 1rem;">
                    <small style="color: #666; display: block; margin-bottom: 4px;">Last Updated</small>
                    <strong style="color: #4a9eff;">
                        <i class="far fa-calendar-check me-1"></i>
                        <?= date('M d, Y - H:i', strtotime($item->updated_at)) ?>
                    </strong>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer-custom">
        <button type="button" class="btn-cancel" data-bs-dismiss="modal">
            <i class="fas fa-times me-1"></i>
            Cancel
        </button>
        <button type="submit" class="btn-update" id="updateBtn">
            <i class="fas fa-save"></i>
            Update Information
        </button>
    </div>
</form>

<script>
    // Character counter function
    function updateCharCount(fieldId, maxLength) {
        const field = document.getElementById(fieldId);
        const counter = document.getElementById(fieldId + 'Counter');
        const currentLength = field.value.length;

        counter.textContent = currentLength + ' / ' + maxLength + ' characters';

        // Update counter color based on length
        counter.classList.remove('warning', 'danger');
        if (currentLength > maxLength * 0.9) {
            counter.classList.add('danger');
        } else if (currentLength > maxLength * 0.75) {
            counter.classList.add('warning');
        }
    }

    // Form submission handling
    document.getElementById('editForm').addEventListener('submit', function() {
        const updateBtn = document.getElementById('updateBtn');
        updateBtn.disabled = true;
        updateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
    });

    // Initialize character counters
    document.addEventListener('DOMContentLoaded', function() {
        updateCharCount('judul', 100);
        updateCharCount('deskripsi', 500);
    });

    // Image preview zoom on click
    document.querySelector('.image-preview').addEventListener('click', function() {
        const img = this;
        if (img.style.maxHeight === 'none') {
            img.style.maxHeight = '300px';
        } else {
            img.style.maxHeight = 'none';
        }
    });
</script>