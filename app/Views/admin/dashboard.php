<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Dashboard Overview
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    :root {
        --gold-color: #d4af37;
        --gold-hover: #f4d983;
        --dark-bg: #0a0a0a;
        --light-dark-bg: #141414;
        --card-bg: #1a1a1a;
        --text-muted: #a0a0a0;
        --border-color: #2a2a2a;
        --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    @keyframes countUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Stat Cards */
    .stat-card {
        background: linear-gradient(145deg, var(--card-bg), var(--light-dark-bg));
        border: 1px solid var(--border-color);
        border-left-width: 4px;
        border-radius: 12px;
        transition: var(--transition-smooth);
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.6s ease-out;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 150px;
        height: 150px;
        background: radial-gradient(circle, rgba(212, 175, 55, 0.05) 0%, transparent 70%);
        border-radius: 50%;
        transform: translate(30%, -30%);
        transition: var(--transition-smooth);
    }

    .stat-card:hover::before {
        transform: translate(30%, -30%) scale(1.5);
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(212, 175, 55, 0.2);
        border-left-color: var(--gold-color);
    }

    .stat-card .card-body {
        padding: 1.75rem;
        position: relative;
        z-index: 1;
    }

    .stat-card-icon {
        font-size: 3.5rem;
        opacity: 0.15;
        transition: var(--transition-smooth);
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
    }

    .stat-card:hover .stat-card-icon {
        opacity: 0.25;
        transform: translateY(-50%) scale(1.1) rotate(5deg);
    }

    .stat-card .stat-label {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: var(--text-muted);
        font-weight: 600;
        margin-bottom: 12px;
    }

    .stat-card .stat-value {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 8px;
        line-height: 1;
        animation: countUp 0.8s ease-out;
    }

    .stat-card .stat-change {
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 10px;
        border-radius: 20px;
        font-weight: 500;
    }

    .stat-change.positive {
        color: #28a745;
        background: rgba(40, 167, 69, 0.1);
    }

    .stat-change.negative {
        color: #dc3545;
        background: rgba(220, 53, 69, 0.1);
    }

    /* Card Variants */
    .stat-card.card-gold {
        border-left-color: var(--gold-color);
    }

    .stat-card.card-gold .stat-value {
        color: var(--gold-color);
    }

    .stat-card.card-primary {
        border-left-color: #4a9eff;
    }

    .stat-card.card-primary .stat-value {
        color: #4a9eff;
    }

    .stat-card.card-success {
        border-left-color: #28a745;
    }

    .stat-card.card-success .stat-value {
        color: #28a745;
    }

    .stat-card.card-info {
        border-left-color: #17a2b8;
    }

    .stat-card.card-info .stat-value {
        color: #17a2b8;
    }

    /* Welcome Card */
    .welcome-card {
        background: linear-gradient(135deg, var(--card-bg) 0%, var(--light-dark-bg) 100%);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 2.5rem;
        position: relative;
        overflow: hidden;
        animation: scaleIn 0.6s ease-out;
    }

    .welcome-card::before {
        content: '✂️';
        position: absolute;
        font-size: 15rem;
        opacity: 0.02;
        top: 50%;
        right: -5%;
        transform: translateY(-50%) rotate(-15deg);
    }

    .welcome-card-content {
        position: relative;
        z-index: 1;
    }

    .welcome-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #fff;
    }

    .welcome-title::after {
        content: '';
        display: block;
        width: 80px;
        height: 3px;
        background: var(--gold-color);
        margin-top: 15px;
    }

    .welcome-text {
        color: var(--text-muted);
        font-size: 1.05rem;
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(212, 175, 55, 0.1);
        border: 1px solid var(--gold-color);
        color: var(--gold-color);
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
    }

    /* Quick Actions */
    .quick-actions {
        margin-top: 2rem;
    }

    .quick-action-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: transparent;
        border: 2px solid var(--border-color);
        color: #fff;
        padding: 12px 24px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition-smooth);
        margin-right: 12px;
        margin-bottom: 12px;
    }

    .quick-action-btn:hover {
        border-color: var(--gold-color);
        color: var(--gold-color);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(212, 175, 55, 0.2);
    }

    /* Recent Activity Section */
    .activity-section {
        margin-top: 2rem;
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #fff;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .section-title::before {
        content: '';
        width: 4px;
        height: 30px;
        background: var(--gold-color);
        border-radius: 2px;
    }

    .activity-card {
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        transition: var(--transition-smooth);
        animation: slideInRight 0.6s ease-out;
    }

    .activity-card:hover {
        border-color: var(--gold-color);
        transform: translateX(5px);
        box-shadow: 0 5px 20px rgba(212, 175, 55, 0.1);
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-icon {
        width: 45px;
        height: 45px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
    }

    .activity-icon.booking {
        background: rgba(74, 158, 255, 0.1);
        color: #4a9eff;
    }

    .activity-icon.payment {
        background: rgba(212, 175, 55, 0.1);
        color: var(--gold-color);
    }

    .activity-icon.user {
        background: rgba(40, 167, 69, 0.1);
        color: #28a745;
    }

    .activity-details {
        flex-grow: 1;
    }

    .activity-title {
        color: #fff;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .activity-time {
        color: var(--text-muted);
        font-size: 0.85rem;
    }

    /* Charts Section */
    .chart-card {
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1.5rem;
        height: 100%;
    }

    .chart-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #fff;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .stat-card .stat-value {
            font-size: 2rem;
        }

        .welcome-card {
            padding: 1.5rem;
        }

        .welcome-title {
            font-size: 1.5rem;
        }

        .quick-action-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<!-- Stats Row -->
<!-- Stats Row -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card card-gold">
            <div class="card-body">
                <div class="stat-label">Revenue (<?= $nama_bulan ?>)</div> <!-- Label dinamis -->
                <div class="stat-value">Rp <?= number_format($pendapatan_bulan_ini, 0, ',', '.') ?></div>
                <div class="stat-change positive">
                    <i class="fas fa-calendar-day"></i>
                    <span>This Month</span>
                </div>
                <i class="fas fa-coins stat-card-icon"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card card-primary">
            <div class="card-body">
                <div class="stat-label">Transactions (<?= $nama_bulan ?>)</div>
                <div class="stat-value"><?= $transaksi_bulan_ini ?></div>
                <div class="stat-change positive">
                    <i class="fas fa-calendar-day"></i>
                    <span>This Month</span>
                </div>
                <i class="fas fa-receipt stat-card-icon"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card card-success">
            <div class="card-body">
                <div class="stat-label">New Customers</div>
                <div class="stat-value"><?= $pelanggan_baru_bulan_ini ?></div>
                <div class="stat-change positive">
                    <i class="fas fa-user-plus"></i>
                    <span>Joined this month</span>
                </div>
                <i class="fas fa-users stat-card-icon"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card card-info">
            <div class="card-body">
                <div class="stat-label">Active Barbers</div>
                <div class="stat-value"><?= $jumlah_kapster ?></div>
                <div class="stat-change positive">
                    <i class="fas fa-check-circle"></i>
                    <span>Currently Active</span>
                </div>
                <i class="fas fa-cut stat-card-icon"></i>
            </div>
        </div>
    </div>
</div>

<!-- Welcome Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="welcome-card">
            <div class="welcome-card-content">
                <h2 class="welcome-title">Welcome to COGA Admin Panel</h2>
                <p class="welcome-text">
                    Manage your barbershop operations efficiently. Use the navigation menu to access different
                    sections and manage bookings, services, gallery, and more.
                </p>
                <div class="mb-3">
                    <div class="role-badge">
                        <i class="fas fa-user-shield"></i>
                        <span><?= esc(session()->get('role')) ?></span>
                    </div>
                </div>

                <div class="quick-actions">
                    <a href="/admin/bookings" class="quick-action-btn">
                        <i class="fas fa-calendar-plus"></i>
                        <span>New Booking</span>
                    </a>
                    <a href="/admin/layanan" class="quick-action-btn">
                        <i class="fas fa-plus-circle"></i>
                        <span>Add Service</span>
                    </a>
                    <a href="/admin/galeri" class="quick-action-btn">
                        <i class="fas fa-image"></i>
                        <span>Upload Gallery</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Activity Section -->
<!-- Activity Section -->
<div class="activity-section">
    <h3 class="section-title">Recent Activity</h3>

    <div class="row g-4">
        <!-- Kolom Kiri: Recent Activity List -->
        <div class="col-lg-6">
            <div class="activity-card">
                <?php if (!empty($recent_activities)): ?>
                    <?php foreach ($recent_activities as $activity): ?>
                        <div class="activity-item">
                            <div class="activity-icon <?= $activity['color'] ?>">
                                <i class="<?= $activity['icon'] ?>"></i>
                            </div>
                            <div class="activity-details">
                                <div class="activity-title"><?= $activity['title'] ?></div>
                                <div class="text-muted small"><?= $activity['desc'] ?></div>
                                <div class="activity-time">
                                    <?php
                                    // Menggunakan fitur Time CodeIgniter untuk format "ago"
                                    try {
                                        echo \CodeIgniter\I18n\Time::parse($activity['time'])->humanize();
                                    } catch (\Exception $e) {
                                        echo $activity['time'];
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="p-4 text-center text-muted">Belum ada aktivitas terbaru.</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Kolom Kanan: Quick Stats -->
        <div class="col-lg-6">
            <div class="chart-card">
                <h4 class="chart-title">Quick Stats</h4>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-3 rounded" style="background: rgba(212, 175, 55, 0.1); border: 1px solid rgba(212, 175, 55, 0.2);">
                            <div style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 5px;">Today's Bookings</div>
                            <div style="font-size: 1.8rem; font-weight: 700; color: var(--gold-color);">
                                <?= $today_bookings ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 rounded" style="background: rgba(74, 158, 255, 0.1); border: 1px solid rgba(74, 158, 255, 0.2);">
                            <div style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 5px;">This Week</div>
                            <div style="font-size: 1.8rem; font-weight: 700; color: #4a9eff;">
                                <?= $week_bookings ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 rounded" style="background: rgba(40, 167, 69, 0.1); border: 1px solid rgba(40, 167, 69, 0.2);">
                            <div style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 5px;">Completed</div>
                            <div style="font-size: 1.8rem; font-weight: 700; color: #28a745;">
                                <?= $completed_total ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 rounded" style="background: rgba(220, 53, 69, 0.1); border: 1px solid rgba(220, 53, 69, 0.2);">
                            <div style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 5px;">Pending (Confirmed)</div>
                            <div style="font-size: 1.8rem; font-weight: 700; color: #dc3545;">
                                <?= $pending_total ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate numbers on load
        const statValues = document.querySelectorAll('.stat-value');
        statValues.forEach((stat, index) => {
            stat.style.animationDelay = `${index * 0.1}s`;
        });

        // Stagger card animations
        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
        });
    });
</script>

<?= $this->endSection() ?>