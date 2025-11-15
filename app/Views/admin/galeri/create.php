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
        min-height: 120px;
    }

    /* File Upload Styling */
    .file-upload-wrapper {
        position: relative;
        overflow: hidden;
        border: 2px dashed #333;
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        background: rgba(212, 175, 55, 0.03);
    }

    .file-upload-wrapper:hover {
        border-color: #d4af37;
        background: rgba(212, 175, 55, 0.08);
    }

    .file-upload-wrapper input[type="file"] {
        position: absolute;
        left: -9999px;
    }

    .file-upload-label {
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
    }

    .file-upload-icon {
        font-size: 3rem;
        color: #d4af37;
        opacity: 0.5;
    }

    .file-upload-text {
        color: #b0b0b0;
        font-size: 1rem;
    }

    .file-upload-hint {
        color: #666;
        font-size: 0.85rem;
        margin-top: 8px;
    }

    .file-name-display {
        margin-top: 12px;
        padding: 10px 16px;
        background: rgba(212, 175, 55, 0.1);
        border: 1px solid #d4af37;
        border-radius: 6px;
        color: #d4af37;
        font-size: 0.9rem;
        display: none;
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
        <i class="fas fa-image"></i>
        Add New Gallery Image
    </h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form action="/admin/galeri/create" method="post" enctype="multipart/form-data" id="createForm">
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
            <label for="judul" class="form-label-custom">
                <i class="fas fa-heading"></i>
                Image Title
            </label>
            <input type="text"
                class="form-control-custom"
                name="judul"
                id="judul"
                value="<?= old('judul') ?>"
                placeholder="Enter a catchy title for your image"
                required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="form-label-custom">
                <i class="fas fa-align-left"></i>
                Description
            </label>
            <textarea class="form-control-custom"
                name="deskripsi"
                id="deskripsi"
                rows="4"
                placeholder="Describe your image, style, or story behind it..."><?= old('deskripsi') ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label-custom">
                <i class="fas fa-cloud-upload-alt"></i>
                Select Image File
            </label>
            <div class="file-upload-wrapper" id="fileUploadWrapper">
                <label for="gambar" class="file-upload-label">
                    <div class="file-upload-icon">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="file-upload-text">
                        <strong>Click to browse</strong> or drag and drop
                    </div>
                    <div class="file-upload-hint">
                        Supported formats: JPG, PNG, GIF (Max 5MB)
                    </div>
                </label>
                <input type="file"
                    class="form-control"
                    name="gambar"
                    id="gambar"
                    accept="image/*"
                    required
                    onchange="handleFileSelect(this)">
                <div class="file-name-display" id="fileNameDisplay">
                    <i class="fas fa-file-image me-2"></i>
                    <span id="fileName"></span>
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
            <i class="fas fa-upload"></i>
            Upload Image
        </button>
    </div>
</form>

<script>
    function handleFileSelect(input) {
        const fileNameDisplay = document.getElementById('fileNameDisplay');
        const fileName = document.getElementById('fileName');
        const wrapper = document.getElementById('fileUploadWrapper');

        if (input.files && input.files[0]) {
            const file = input.files[0];
            fileName.textContent = file.name;
            fileNameDisplay.style.display = 'block';
            wrapper.style.borderColor = '#d4af37';
            wrapper.style.background = 'rgba(212, 175, 55, 0.08)';

            // Validate file size
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be less than 5MB');
                input.value = '';
                fileNameDisplay.style.display = 'none';
                wrapper.style.borderColor = '#333';
                return;
            }

            // Preview image (optional)
            const reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.file-upload-icon i').className = 'fas fa-check-circle';
            };
            reader.readAsDataURL(file);
        }
    }

    // Form submission handling
    document.getElementById('createForm').addEventListener('submit', function() {
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Uploading...';
    });
</script>