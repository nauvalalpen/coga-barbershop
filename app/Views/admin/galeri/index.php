<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Gallery Management
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Gallery Management
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    :root {
        --gold-color: #d4af37;
        --dark-bg: #0a0a0a;
        --light-dark-bg: #141414;
        --card-bg: #1a1a1a;
        --border-color: #2a2a2a;
        --hover-bg: #1f1f1f;
    }

    /* Card Styling */
    .gallery-card {
        background: linear-gradient(145deg, var(--card-bg), var(--light-dark-bg));
        border: 1px solid var(--border-color);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .gallery-card-header {
        background: linear-gradient(135deg, var(--light-dark-bg) 0%, var(--dark-bg) 100%);
        border-bottom: 1px solid var(--border-color);
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .gallery-card-header h5 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin: 0;
        color: #fff;
        font-weight: 700;
    }

    .btn-add-new {
        background: var(--gold-color);
        border: none;
        color: #000;
        padding: 10px 24px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
        border-radius: 6px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-add-new:hover {
        background: #f4d983;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
        color: #000;
    }

    /* Alert Styling */
    .alert-success {
        background: rgba(40, 167, 69, 0.15);
        border: 1px solid rgba(40, 167, 69, 0.3);
        border-left: 4px solid #28a745;
        color: #28a745;
        border-radius: 8px;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
        animation: slideInRight 0.4s ease-out;
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Table Styling */
    .table-modern {
        background: transparent;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-modern thead th {
        background: var(--light-dark-bg);
        color: var(--gold-color);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
        padding: 1.25rem 1rem;
        border: none;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .table-modern tbody tr {
        background: var(--card-bg);
        border-bottom: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .table-modern tbody tr:hover {
        background: var(--hover-bg);
        transform: scale(1.01);
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.1);
    }

    .table-modern tbody td {
        padding: 1.25rem 1rem;
        vertical-align: middle;
        border: none;
        background: rgba(0, 0, 0, 0.2);
    }

    /* Gallery Image Styling */
    .gallery-thumbnail {
        width: 100px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid var(--border-color);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .gallery-thumbnail:hover {
        border-color: var(--gold-color);
        transform: scale(1.1);
        box-shadow: 0 5px 20px rgba(212, 175, 55, 0.3);
    }

    /* Title Styling */
    .gallery-title {
        font-weight: 600;
        color: #fdfcfcff;
        font-size: 1rem;
        margin-bottom: 5px;
    }

    .gallery-date {
        font-size: 0.8rem;
        color: var(--gold-color);
        font-weight: 500;
    }

    /* Description Column */
    .table-description {
        max-width: 350px;
        line-height: 1.6;
        color: #b0b0b0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .description-full {
        display: none;
        color: #fff;
        background: var(--hover-bg);
        padding: 15px;
        border-radius: 8px;
        margin-top: 10px;
        border-left: 3px solid var(--gold-color);
        line-height: 1.7;
    }

    /* Action Buttons */
    .btn-action {
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 600;
        transition: all 0.3s ease;
        border: 2px solid;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-edit {
        background: transparent;
        border-color: #4a9eff;
        color: #4a9eff;
    }

    .btn-edit:hover {
        background: #4a9eff;
        color: #000;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(74, 158, 255, 0.4);
    }

    .btn-delete {
        background: transparent;
        border-color: #dc3545;
        color: #dc3545;
    }

    .btn-delete:hover {
        background: #dc3545;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
    }

    .empty-state-icon {
        font-size: 5rem;
        color: var(--border-color);
        margin-bottom: 1.5rem;
        opacity: 0.5;
    }

    .empty-state-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: #fff;
        margin-bottom: 1rem;
    }

    .empty-state-text {
        color: var(--text-muted);
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }

    /* Modal Styling */
    .modal-content {
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: 12px;
    }

    .modal-header {
        background: var(--light-dark-bg);
        border-bottom: 1px solid var(--border-color);
        padding: 1.5rem;
    }

    .modal-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        color: var(--gold-color);
        font-weight: 700;
    }

    .modal-body {
        padding: 2rem;
    }

    .modal-footer {
        border-top: 1px solid var(--border-color);
        padding: 1.25rem 2rem;
    }

    /* Loading Spinner */
    .loading-spinner {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 3rem;
    }

    .spinner-border-custom {
        width: 3rem;
        height: 3rem;
        border: 4px solid rgba(212, 175, 55, 0.1);
        border-top-color: var(--gold-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .loading-text {
        margin-top: 1rem;
        color: var(--gold-color);
        font-weight: 600;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .gallery-card-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .btn-add-new {
            width: 100%;
            justify-content: center;
        }

        .table-description {
            max-width: 200px;
        }

        .gallery-thumbnail {
            width: 80px;
            height: 64px;
        }
    }
</style>

<div class="gallery-card">
    <div class="gallery-card-header">
        <h5>Gallery Images</h5>
        <button type="button" class="btn-add-new" data-bs-toggle="modal" data-bs-target="#formModal" data-url="/admin/galeri/new">
            <i class="fas fa-plus-circle"></i>
            Add New Image
        </button>
    </div>

    <div class="card-body p-0">
        <?php if (session()->get('success')): ?>
            <div class="alert-success m-4">
                <i class="fas fa-check-circle me-2"></i>
                <?= session()->get('success') ?>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th style="width: 12%;">Image</th>
                        <th style="width: 22%;">Title</th>
                        <th>Description</th>
                        <th style="width: 18%;" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($galeri)): ?>
                        <?php foreach ($galeri as $item): ?>
                            <tr>
                                <td>
                                    <img src="/uploads/galeri/<?= esc($item->url_gambar) ?>"
                                        alt="<?= esc($item->judul) ?>"
                                        class="gallery-thumbnail"
                                        onclick="openImagePreview(this.src)"
                                        onerror="this.src='https://via.placeholder.com/100x80/1a1a1a/d4af37?text=No+Image'">
                                </td>
                                <td>
                                    <div class="gallery-title"><?= esc($item->judul) ?></div>
                                    <div class="gallery-date">
                                        <i class="far fa-calendar-alt me-1"></i>
                                        <?= date('M d, Y', strtotime($item->created_at)) ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="table-description" title="<?= esc($item->deskripsi) ?>">
                                        <?= esc($item->deskripsi) ?>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <button type="button"
                                        class="btn-action btn-edit"
                                        data-bs-toggle="modal"
                                        data-bs-target="#formModal"
                                        data-url="/admin/galeri/edit/<?= $item->id ?>">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>

                                    <form action="/admin/galeri/delete/<?= $item->id ?>"
                                        method="post"
                                        class="d-inline"
                                        onsubmit="return confirmDelete();">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn-action btn-delete">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-images"></i>
                                    </div>
                                    <h3 class="empty-state-title">No Images Yet</h3>
                                    <p class="empty-state-text">Start building your gallery by adding your first image</p>
                                    <button type="button" class="btn-add-new" data-bs-toggle="modal" data-bs-target="#formModal" data-url="/admin/galeri/new">
                                        <i class="fas fa-plus-circle"></i>
                                        Add First Image
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body" id="modalContent">
                <div class="loading-spinner">
                    <div class="spinner-border-custom"></div>
                    <div class="loading-text">Loading...</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Preview Modal -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content" style="background: transparent; border: none;">
            <div class="modal-body p-0">
                <img id="previewImage" src="" alt="Preview" style="width: 100%; height: auto; border-radius: 12px;">
            </div>
        </div>
    </div>
</div>

<script>
    // Load modal content
    document.addEventListener('DOMContentLoaded', function() {
        const formModal = document.getElementById('formModal');
        const modalContent = document.getElementById('modalContent');

        formModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const url = button.getAttribute('data-url');

            modalContent.innerHTML = `
                <div class="loading-spinner">
                    <div class="spinner-border-custom"></div>
                    <div class="loading-text">Loading...</div>
                </div>
            `;

            fetch(url)
                .then(response => response.text())
                .then(html => {
                    modalContent.innerHTML = html;
                })
                .catch(error => {
                    modalContent.innerHTML = `
                        <div class="alert alert-danger m-3">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            Failed to load form. Please try again.
                        </div>
                    `;
                });
        });

        // Reset modal on hide
        formModal.addEventListener('hidden.bs.modal', function() {
            modalContent.innerHTML = `
                <div class="loading-spinner">
                    <div class="spinner-border-custom"></div>
                    <div class="loading-text">Loading...</div>
                </div>
            `;
        });
    });

    // Confirm delete
    function confirmDelete() {
        return confirm('Are you sure you want to delete this image? This action cannot be undone.');
    }

    // Image preview
    function openImagePreview(src) {
        document.getElementById('previewImage').src = src;
        const imagePreviewModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
        imagePreviewModal.show();
    }

    // Auto-hide success message
    setTimeout(() => {
        const alert = document.querySelector('.alert-success');
        if (alert) {
            alert.style.opacity = '0';
            alert.style.transform = 'translateX(20px)';
            setTimeout(() => alert.remove(), 400);
        }
    }, 5000);
</script>

<?= $this->endSection() ?>