<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Bookings Management
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Bookings Management
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
    .bookings-card {
        background: linear-gradient(145deg, var(--card-bg), var(--light-dark-bg));
        border: 1px solid var(--border-color);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .bookings-card-header {
        background: linear-gradient(135deg, var(--light-dark-bg) 0%, var(--dark-bg) 100%);
        border-bottom: 1px solid var(--border-color);
        padding: 1.5rem;
    }

    .bookings-card-header h5 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin: 0;
        color: #fff;
        font-weight: 700;
    }

    /* Filter Section */
    .filter-section {
        padding: 1.5rem;
        background: rgba(0, 0, 0, 0.2);
        border-bottom: 1px solid var(--border-color);
        display: flex;
        gap: 15px;
        align-items: center;
        flex-wrap: wrap;
    }

    .filter-label {
        color: #b0b0b0;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .filter-select {
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid #333;
        color: #fff;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .filter-select:focus {
        border-color: var(--gold-color);
        outline: none;
        box-shadow: 0 0 15px rgba(212, 175, 55, 0.2);
    }

    /* Alert Styling */
    .alert-success {
        background: rgba(40, 167, 69, 0.15);
        border: 1px solid rgba(40, 167, 69, 0.3);
        border-left: 4px solid #28a745;
        color: #28a745;
        border-radius: 8px;
        padding: 1rem 1.25rem;
        margin-bottom: 0;
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
        margin-bottom: 0;
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

    /* Date & Time Display */
    .datetime-badge {
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

    /* Customer Info */
    .customer-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .customer-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--gold-color), #f4d983);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: #000;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .customer-name {
        font-weight: 600;
        color: #f9f5f5ff;
    }

    /* Barber Info */
    .barber-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(74, 158, 255, 0.15);
        border: 1px solid rgba(74, 158, 255, 0.3);
        color: #4a9eff;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* Service Info */
    .service-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(212, 175, 55, 0.15);
        border: 1px solid rgba(212, 175, 55, 0.3);
        color: var(--gold-color);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* Status Badges */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        border: 2px solid;
    }

    .status-pending {
        background: rgba(255, 193, 7, 0.15);
        border-color: #ffc107;
        color: #ffc107;
    }

    .status-confirmed {
        background: rgba(74, 158, 255, 0.15);
        border-color: #4a9eff;
        color: #4a9eff;
    }

    .status-completed {
        background: rgba(40, 167, 69, 0.15);
        border-color: #28a745;
        color: #28a745;
    }

    .status-cancelled {
        background: rgba(220, 53, 69, 0.15);
        border-color: #dc3545;
        color: #dc3545;
    }

    /* Action Controls */
    .action-controls {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .status-select {
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid #333;
        color: #fff;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 600;
        min-width: 130px;
        transition: all 0.3s ease;
    }

    .status-select:focus {
        border-color: var(--gold-color);
        outline: none;
        box-shadow: 0 0 15px rgba(212, 175, 55, 0.2);
    }

    .status-select option {
        background: #1a1a1a;
        color: #fff;
    }

    .btn-update {
        background: var(--gold-color);
        border: 2px solid var(--gold-color);
        color: #000;
        padding: 8px 20px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-update:hover {
        background: #f4d983;
        border-color: #f4d983;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
        color: #000;
    }

    .btn-details {
        background: transparent;
        border: 2px solid #4a9eff;
        color: #4a9eff;
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.3s ease;
    }

    .btn-details:hover {
        background: #4a9eff;
        color: #000;
        transform: translateY(-2px);
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
    }

    /* Stats Summary */
    .stats-summary {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        padding: 1.5rem;
        background: rgba(0, 0, 0, 0.2);
        border-bottom: 1px solid var(--border-color);
    }

    .stat-item {
        text-align: center;
        padding: 15px;
        background: var(--card-bg);
        border-radius: 8px;
        border: 1px solid var(--border-color);
    }

    .stat-label {
        font-size: 0.75rem;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .action-controls {
            flex-direction: column;
            width: 100%;
        }

        .status-select,
        .btn-update {
            width: 100%;
        }

        .filter-section {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-select {
            width: 100%;
        }
    }
</style>

<div class="bookings-card">
    <div class="bookings-card-header">
        <h5>Booking Management</h5>
    </div>

    <!-- Stats Summary -->
    <div class="stats-summary">
        <div class="stat-item">
            <div class="stat-label">Total Bookings</div>
            <div class="stat-value" style="color: var(--gold-color);"><?= count($bookings) ?></div>
        </div>
        <div class="stat-item">
            <div class="stat-label">Pending</div>
            <div class="stat-value" style="color: #ffc107;">
                <?= count(array_filter($bookings, fn($b) => $b->status === 'pending')) ?>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-label">Confirmed</div>
            <div class="stat-value" style="color: #4a9eff;">
                <?= count(array_filter($bookings, fn($b) => $b->status === 'confirmed')) ?>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-label">Completed</div>
            <div class="stat-value" style="color: #28a745;">
                <?= count(array_filter($bookings, fn($b) => $b->status === 'completed')) ?>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="filter-section">
        <span class="filter-label">Filter by Status:</span>
        <select class="filter-select" id="statusFilter" onchange="filterBookings()">
            <option value="">All Bookings</option>
            <option value="pending">Pending</option>
            <option value="confirmed">Confirmed</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
        </select>
    </div>

    <?php if (session()->get('success')): ?>
        <div class="p-4 pb-0">
            <div class="alert-success">
                <i class="fas fa-check-circle me-2"></i>
                <?= session('success') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th style="width: 15%;">Date & Time</th>
                        <th style="width: 18%;">Customer</th>
                        <?php if (session()->get('role') === 'admin'): ?>
                            <th style="width: 15%;">Barber</th>
                        <?php endif; ?>
                        <th style="width: 18%;">Service</th>
                        <th style="width: 12%;">Status</th>
                        <th style="width: 22%;">Actions</th>
                    </tr>
                </thead>
                <tbody id="bookingsTable">
                    <?php if (!empty($bookings)): ?>
                        <?php foreach ($bookings as $b): ?>
                            <tr data-status="<?= esc($b->status) ?>">
                                <td>
                                    <div class="datetime-badge">
                                        <div class="date-display">
                                            <i class="far fa-calendar me-1"></i>
                                            <?= date('d M Y', strtotime($b->tanggal_booking)) ?>
                                        </div>
                                        <div class="time-display">
                                            <i class="far fa-clock"></i>
                                            <?= date('H:i', strtotime($b->jam_booking)) ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="customer-info">
                                        <div class="customer-avatar">
                                            <?= strtoupper(substr($b->nama_pelanggan, 0, 1)) ?>
                                        </div>
                                        <div class="customer-name"><?= esc($b->nama_pelanggan) ?></div>
                                    </div>
                                </td>
                                <?php if (session()->get('role') === 'admin'): ?>
                                    <td>
                                        <div class="barber-badge">
                                            <i class="fas fa-user-tie"></i>
                                            <?= esc($b->nama_kapster) ?>
                                        </div>
                                    </td>
                                <?php endif; ?>
                                <td>
                                    <div class="service-badge">
                                        <i class="fas fa-cut"></i>
                                        <?= esc($b->nama_layanan) ?>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge status-<?= esc($b->status) ?>">
                                        <?php
                                        $icons = [
                                            'pending' => 'fa-clock',
                                            'confirmed' => 'fa-check-circle',
                                            'completed' => 'fa-check-double',
                                            'cancelled' => 'fa-times-circle'
                                        ];
                                        ?>
                                        <i class="fas <?= $icons[$b->status] ?? 'fa-circle' ?>"></i>
                                        <?= ucfirst(esc($b->status)) ?>
                                    </span>
                                </td>
                                <td>
                                    <form action="/admin/bookings/update-status/<?= $b->id ?>" method="post" class="action-controls">
                                        <?= csrf_field() ?>
                                        <select name="status" class="status-select">
                                            <option value="pending" <?= $b->status == 'pending' ? 'selected' : '' ?>>Pending</option>
                                            <option value="confirmed" <?= $b->status == 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                            <option value="completed" <?= $b->status == 'completed' ? 'selected' : '' ?>>Completed</option>
                                            <?php if (session()->get('role') === 'admin'): ?>
                                                <option value="cancelled" <?= $b->status == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                            <?php endif; ?>
                                        </select>
                                        <button type="submit" class="btn-update">
                                            <i class="fas fa-sync-alt"></i>
                                            Update
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="<?= session()->get('role') === 'admin' ? '6' : '5' ?>">
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-calendar-times"></i>
                                    </div>
                                    <h3 class="empty-state-title">No Bookings Yet</h3>
                                    <p class="empty-state-text">Bookings will appear here once customers make appointments</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Filter bookings by status
    function filterBookings() {
        const filter = document.getElementById('statusFilter').value.toLowerCase();
        const rows = document.querySelectorAll('#bookingsTable tr[data-status]');

        rows.forEach(row => {
            const status = row.getAttribute('data-status').toLowerCase();
            if (filter === '' || status === filter) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
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

    // Confirm status update
    document.querySelectorAll('.action-controls').forEach(form => {
        form.addEventListener('submit', function(e) {
            const select = this.querySelector('select[name="status"]');
            const newStatus = select.value;
            const currentStatus = select.options[select.selectedIndex].getAttribute('data-current');

            if (newStatus === 'cancelled') {
                if (!confirm('Are you sure you want to cancel this booking? This action cannot be undone.')) {
                    e.preventDefault();
                }
            }
        });
    });
</script>

<?= $this->endSection() ?>