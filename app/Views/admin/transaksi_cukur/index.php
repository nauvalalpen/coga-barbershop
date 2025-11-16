<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
My Work Log
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
My Work Log
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

    /* Stats Summary */
    .stats-summary {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: linear-gradient(145deg, var(--card-bg), var(--light-dark-bg));
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(135deg, var(--gold-color), transparent);
        opacity: 0;
        transition: all 0.3s ease;
        z-index: 0;
        border-radius: 12px;
    }

    .stat-card:hover::before {
        opacity: 0.3;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(212, 175, 55, 0.2);
    }

    .stat-card-content {
        position: relative;
        z-index: 1;
    }

    .stat-label {
        color: #888;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        color: var(--gold-color);
    }

    .stat-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 3rem;
        opacity: 0.1;
    }

    /* Worklog Card */
    .worklog-card {
        background: linear-gradient(145deg, var(--card-bg), var(--light-dark-bg));
        border: 1px solid var(--border-color);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .worklog-card-header {
        background: linear-gradient(135deg, var(--light-dark-bg) 0%, var(--dark-bg) 100%);
        border-bottom: 1px solid var(--border-color);
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .worklog-card-header h5 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin: 0;
        color: #fff;
        font-weight: 700;
    }

    .btn-add-log {
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

    .btn-add-log:hover {
        background: #f4d983;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
        color: #000;
    }

    /* Alert */
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

    /* Table */
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

    /* Date Display */
    .date-badge {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .date-display {
        font-weight: 600;
        color: #fff;
        font-size: 0.95rem;
    }

    .time-display {
        font-size: 0.85rem;
        color: var(--gold-color);
        display: flex;
        align-items: center;
        gap: 4px;
    }

    /* Service Badge */
    .service-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(212, 175, 55, 0.15);
        border: 1px solid rgba(212, 175, 55, 0.3);
        color: var(--gold-color);
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    /* Price Display */
    .price-display {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--gold-color);
        font-family: 'Playfair Display', serif;
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

    /* Modal */
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
        .worklog-card-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .btn-add-log {
            width: 100%;
            justify-content: center;
        }

        .stats-summary {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Stats Summary -->
<div class="stats-summary">
    <div class="stat-card">
        <div class="stat-card-content">
            <div class="stat-label">Total Services</div>
            <div class="stat-value"><?= count($transaksi) ?></div>
        </div>
        <i class="fas fa-cut stat-icon"></i>
    </div>
    <div class="stat-card">
        <div class="stat-card-content">
            <div class="stat-label">Total Earnings</div>
            <div class="stat-value">Rp <?= number_format(array_sum(array_column($transaksi, 'harga_saat_transaksi')), 0, ',', '.') ?></div>
        </div>
        <i class="fas fa-coins stat-icon"></i>
    </div>
    <div class="stat-card">
        <div class="stat-card-content">
            <div class="stat-label">This Month</div>
            <div class="stat-value">
                <?= count(array_filter($transaksi, fn($t) => date('Y-m', strtotime($t->created_at)) === date('Y-m'))) ?>
            </div>
        </div>
        <i class="fas fa-calendar-check stat-icon"></i>
    </div>
</div>

<div class="worklog-card">
    <div class="worklog-card-header">
        <h5>Transaction History</h5>
        <button type="button" class="btn-add-log" data-bs-toggle="modal" data-bs-target="#formModal" data-url="/admin/catatan-cukur/new">
            <i class="fas fa-plus-circle"></i>
            Add New Log
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
                        <th style="width: 20%;">Date & Time</th>
                        <th style="width: 40%;">Service</th>
                        <th style="width: 20%;">Price</th>
                        <th style="width: 20%;" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($transaksi)): ?>
                        <?php foreach ($transaksi as $item): ?>
                            <tr>
                                <td>
                                    <div class="date-badge">
                                        <div class="date-display">
                                            <i class="far fa-calendar me-1"></i>
                                            <?= date('d M Y', strtotime($item->created_at)) ?>
                                        </div>
                                        <div class="time-display">
                                            <i class="far fa-clock"></i>
                                            <?= date('H:i', strtotime($item->created_at)) ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="service-badge">
                                        <i class="fas fa-cut"></i>
                                        <?= esc($item->nama_layanan) ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="price-display">
                                        Rp <?= number_format($item->harga_saat_transaksi, 0, ',', '.') ?>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <button type="button"
                                        class="btn-action btn-edit"
                                        data-bs-toggle="modal"
                                        data-bs-target="#formModal"
                                        data-url="/admin/catatan-cukur/edit/<?= $item->id ?>">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>

                                    <form action="/admin/catatan-cukur/delete/<?= $item->id ?>"
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
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <h3 class="empty-state-title">No Work Logs Yet</h3>
                                    <p class="empty-state-text">Start recording your work by adding your first service log</p>
                                    <button type="button" class="btn-add-log" data-bs-toggle="modal" data-bs-target="#formModal" data-url="/admin/catatan-cukur/new">
                                        <i class="fas fa-plus-circle"></i>
                                        Add First Log
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0" id="modalContent">
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
        return confirm('Are you sure you want to delete this work log? This action cannot be undone.');
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