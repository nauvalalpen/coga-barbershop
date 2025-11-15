<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Services Management
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Services Management
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
    .services-card {
        background: linear-gradient(145deg, var(--card-bg), var(--light-dark-bg));
        border: 1px solid var(--border-color);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .services-card-header {
        background: linear-gradient(135deg, var(--light-dark-bg) 0%, var(--dark-bg) 100%);
        border-bottom: 1px solid var(--border-color);
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .services-card-header h5 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin: 0;
        color: #fff;
        font-weight: 700;
    }

    .btn-add-service {
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

    .btn-add-service:hover {
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

    /* Service Name with Icon */
    .service-name {
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 600;
        font-size: 1.05rem;
        color: #fbf9f9ff;
    }

    .service-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--gold-color), #f4d983);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    /* Price Badge */
    .price-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(212, 175, 55, 0.15);
        border: 2px solid var(--gold-color);
        color: var(--gold-color);
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 1.05rem;
        font-family: 'Playfair Display', serif;
    }

    /* Duration Badge */
    .duration-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(74, 158, 255, 0.15);
        border: 1px solid rgba(74, 158, 255, 0.3);
        color: #4a9eff;
        padding: 6px 14px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    /* Description */
    .service-description {
        max-width: 350px;
        line-height: 1.6;
        color: #b0b0b0;
        font-size: 0.95rem;
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
        .services-card-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .btn-add-service {
            width: 100%;
            justify-content: center;
        }

        .service-name {
            flex-direction: column;
            align-items: flex-start;
        }

        .service-description {
            max-width: 100%;
        }
    }
</style>

<div class="services-card">
    <div class="services-card-header">
        <h5>Service List</h5>
        <button type="button" class="btn-add-service" data-bs-toggle="modal" data-bs-target="#formModal" data-url="/admin/layanan/new">
            <i class="fas fa-plus-circle"></i>
            Add New Service
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
                        <th style="width: 30%;">Service Name</th>
                        <th style="width: 15%;">Price</th>
                        <th style="width: 12%;">Duration</th>
                        <th>Description</th>
                        <th style="width: 18%;" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($layanan)): ?>
                        <?php foreach ($layanan as $item): ?>
                            <tr>
                                <td>
                                    <div class="service-name">
                                        <div class="service-icon">
                                            <i class="fas fa-cut"></i>
                                        </div>
                                        <span><?= esc($item->nama_layanan) ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="price-badge">
                                        <i class="fas fa-tag"></i>
                                        Rp <?= number_format($item->harga, 0, ',', '.') ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="duration-badge">
                                        <i class="far fa-clock"></i>
                                        <?= esc($item->durasi_menit) ?> min
                                    </div>
                                </td>
                                <td>
                                    <div class="service-description">
                                        <?= esc($item->deskripsi) ?>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <button type="button"
                                        class="btn-action btn-edit"
                                        data-bs-toggle="modal"
                                        data-bs-target="#formModal"
                                        data-url="/admin/layanan/edit/<?= $item->id ?>">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>

                                    <form action="/admin/layanan/delete/<?= $item->id ?>"
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
                            <td colspan="5">
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-cut"></i>
                                    </div>
                                    <h3 class="empty-state-title">No Services Yet</h3>
                                    <p class="empty-state-text">Start by adding your first service to the list</p>
                                    <button type="button" class="btn-add-service" data-bs-toggle="modal" data-bs-target="#formModal" data-url="/admin/layanan/new">
                                        <i class="fas fa-plus-circle"></i>
                                        Add First Service
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
        return confirm('Are you sure you want to delete this service? This action cannot be undone.');
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