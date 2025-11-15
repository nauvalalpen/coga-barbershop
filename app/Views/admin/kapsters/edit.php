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

    .barber-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(212, 175, 55, 0.15);
        border: 1px solid var(--gold-color);
        color: var(--gold-color);
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
    }

    .current-photo-container {
        text-align: center;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: rgba(212, 175, 55, 0.03);
        border: 2px solid #333;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .current-photo-container:hover {
        border-color: #d4af37;
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.15);
    }

    .current-photo {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #d4af37;
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
        transition: all 0.3s ease;
    }

    .current-photo:hover {
        transform: scale(1.1);
    }

    .photo-info {
        margin-top: 1rem;
        padding: 10px;
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

    .form-control-custom,
    .form-select-custom {
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid #333;
        border-radius: 8px;
        padding: 12px 16px;
        color: #fff;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control-custom:focus,
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
    }

    .form-control-custom::placeholder {
        color: #666;
    }

    /* File Upload */
    .file-upload-wrapper-compact {
        border: 2px dashed #333;
        border-radius: 8px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
        background: rgba(212, 175, 55, 0.03);
    }

    .file-upload-wrapper-compact:hover {
        border-color: #d4af37;
        background: rgba(212, 175, 55, 0.08);
    }

    .file-upload-wrapper-compact input[type="file"] {
        position: absolute;
        left: -9999px;
    }

    .file-upload-label-compact {
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }

    .file-upload-text-compact {
        color: #b0b0b0;
        font-size: 0.9rem;
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

    /* Buttons */
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
</style>

<div class="modal-header-custom">
    <h5 class="modal-title-custom">
        <i class="fas fa-user-edit"></i>
        Edit Barber
    </h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form action="/admin/kapsters/update/<?= $kapster->id ?>" method="post" enctype="multipart/form-data" id="editForm">
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

        <div class="barber-badge">
            <i class="fas fa-user-tie"></i>
            <span>Editing: <strong><?= esc($kapster->nama) ?></strong></span>
        </div>

        <!-- Current Photo -->
        <div class="current-photo-container">
            <img src="/uploads/kapsters/<?= esc($kapster->foto_profil) ?>"
                alt="<?= esc($kapster->nama) ?>"
                class="current-photo"
                onerror="this.src='https://via.placeholder.com/120/1a1a1a/d4af37?text=<?= urlencode(substr($kapster->nama, 0, 1)) ?>'">
            <div class="photo-info">
                <i class="fas fa-image me-1"></i>
                Current Photo
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="nama" class="form-label-custom">
                    <i class="fas fa-user"></i>
                    Full Name
                </label>
                <input type="text"
                    class="form-control-custom"
                    id="nama"
                    name="nama"
                    value="<?= old('nama', $kapster->nama) ?>"
                    required>
            </div>

            <div class="col-md-6 mb-4">
                <label for="email" class="form-label-custom">
                    <i class="fas fa-envelope"></i>
                    Email Address
                </label>
                <input type="email"
                    class="form-control-custom"
                    id="email"
                    name="email"
                    value="<?= old('email', $kapster->email) ?>"
                    required>
            </div>
        </div>

        <div class="mb-4">
            <label for="password" class="form-label-custom">
                <i class="fas fa-lock"></i>
                New Password
            </label>
            <input type="password"
                class="form-control-custom"
                id="password"
                name="password"
                placeholder="Leave blank to keep current password">
            <div class="form-helper">
                <i class="fas fa-info-circle"></i>
                <span>Only fill if you want to change the password</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="spesialisasi" class="form-label-custom">
                    <i class="fas fa-award"></i>
                    Specialization
                </label>
                <input type="text"
                    class="form-control-custom"
                    id="spesialisasi"
                    name="spesialisasi"
                    value="<?= old('spesialisasi', $kapster->spesialisasi) ?>"
                    placeholder="e.g., Fade, Classic Cut">
            </div>

            <div class="col-md-6 mb-4">
                <label for="status" class="form-label-custom">
                    <i class="fas fa-toggle-on"></i>
                    Status
                </label>
                <select name="status" id="status" class="form-select-custom">
                    <option value="aktif" <?= old('status', $kapster->status) == 'aktif' ? 'selected' : '' ?>>
                        Active
                    </option>
                    <option value="tidak_aktif" <?= old('status', $kapster->status) == 'tidak_aktif' ? 'selected' : '' ?>>
                        Inactive
                    </option>
                </select>
                <div class="form-helper">
                    <i class="fas fa-info-circle"></i>
                    <span>Set to Inactive to temporarily disable login</span>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label-custom">
                <i class="fas fa-camera"></i>
                Change Profile Photo
            </label>
            <div class="file-upload-wrapper-compact">
                <label for="foto_profil" class="file-upload-label-compact">
                    <i class="fas fa-cloud-upload-alt" style="font-size: 2rem; color: #d4af37; opacity: 0.5;"></i>
                    <div class="file-upload-text-compact">
                        <strong>Click to change photo</strong> or leave empty to keep current
                    </div>
                </label>
                <input type="file"
                    class="form-control"
                    id="foto_profil"
                    name="foto_profil"
                    accept="image/*"
                    onchange="handleFileChange(this)">
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
            Update Barber
        </button>
    </div>
</form>

<script>
    function handleFileChange(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];

            // Validate file size
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be less than 5MB');
                input.value = '';
                return;
            }

            // Visual feedback
            const wrapper = input.closest('.file-upload-wrapper-compact');
            wrapper.style.borderColor = '#d4af37';
            wrapper.style.background = 'rgba(212, 175, 55, 0.08)';

            const label = wrapper.querySelector('.file-upload-label-compact');
            label.innerHTML = `
                <i class="fas fa-check-circle" style="font-size: 2rem; color: #28a745;"></i>
                <div class="file-upload-text-compact">
                    <strong style="color: #28a745;">${file.name}</strong> selected
                </div>
            `;
        }
    }

    // Form submission handling
    document.getElementById('editForm').addEventListener('submit', function() {
        const updateBtn = document.getElementById('updateBtn');
        updateBtn.disabled = true;
        updateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
    });
</script>