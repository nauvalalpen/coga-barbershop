<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Riwayat Booking Saya
<?= $this->endSection() ?>

<!-- This section provides the NEW, rich content for the 'hero' slot in the layout -->
<?= $this->section('hero') ?>
<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Bookings</li>
                </ol>
            </nav>
            <h1 class="hero-title">My Bookings</h1>
            <p class="hero-subtitle">
                Review your past and upcoming appointments with Coga Barbershop.
            </p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<style>
    /* Root Variables & Animations */
    :root {
        --gold-color: #d4af37;
        --dark-bg: #0a0a0a;
        --light-dark-bg: #1a1a1a;
        --transition-smooth: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Main Section */
    .booking-history-section {
        padding: 100px 0;
        background: linear-gradient(180deg, var(--dark-bg) 0%, #050505 100%);
        position: relative;
    }

    /* Section Header */
    .section-header {
        margin-bottom: 60px;
        text-align: center;
        animation: fadeInUp 0.8s ease-out backwards;
    }

    .section-header .sub-title {
        color: var(--gold-color);
        text-transform: uppercase;
        letter-spacing: 4px;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .section-header .main-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        color: #fff;
        font-weight: 700;
        margin-top: 15px;
    }

    /* Table Wrapper & Styling */
    .table-wrapper {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        padding: 40px;
        border: 2px solid #222;
        border-radius: 10px;
        animation: fadeInUp 1s ease-out 0.2s backwards;
    }

    .booking-table {
        color: #c0c0c0;
        border-color: #333;
    }

    .booking-table thead th {
        color: var(--gold-color);
        border-bottom: 2px solid var(--gold-color);
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
        padding: 1rem;
    }

    .booking-table tbody tr {
        transition: background-color 0.3s;
    }

    .booking-table tbody tr:hover {
        background-color: rgba(212, 175, 55, 0.05);
    }

    .booking-table td {
        vertical-align: middle;
        padding: 1.25rem 1rem;
    }

    /* Status Badges */
    .status-badge {
        padding: 0.5em 1em;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
    }

    .status-pending {
        background-color: rgba(255, 193, 7, 0.2);
        color: #ffc107;
    }

    .status-selesai {
        background-color: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .status-dibatalkan {
        background-color: rgba(220, 53, 69, 0.2);
        color: #dc3545;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 2px solid #222;
        border-radius: 10px;
        animation: fadeInUp 1s ease-out 0.2s backwards;
    }

    .empty-state .icon {
        font-size: 5rem;
        margin-bottom: 25px;
        color: var(--gold-color);
        opacity: 0.5;
    }

    .empty-state h3 {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: #fff;
        margin-bottom: 15px;
    }

    .empty-state p {
        color: #888;
        max-width: 450px;
        margin: 0 auto 30px auto;
    }

    .btn-book-now {
        background: var(--gold-color);
        color: #000;
        border: 2px solid var(--gold-color);
        padding: 0.8rem 2rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-decoration: none;
        transition: var(--transition-smooth);
    }

    .btn-book-now:hover {
        background: transparent;
        color: var(--gold-color);
        transform: translateY(-3px);
    }
</style>

<div class="booking-history-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <p class="sub-title">Your Appointments</p>
            <h1 class="main-title">Booking History</h1>
        </div>

        <?php if (session()->get('success')): ?>
            <div class="alert alert-success mb-5" style="background-color: rgba(40, 167, 69, 0.1); border-left: 4px solid #28a745; color: #28a745; border-radius:0;">
                <?= session('success') ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($bookings)): ?>
            <div class="table-wrapper">
                <div class="table-responsive">
                    <table class="table booking-table">
                        <thead>
                            <tr>
                                <th>Date & Time</th>
                                <th>Stylist</th>
                                <th>Service</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bookings as $b): ?>
                                <tr>
                                    <td><?= date('d M Y', strtotime($b->tanggal_booking)) ?>, <?= date('H:i', strtotime($b->jam_booking)) ?></td>
                                    <td><?= esc($b->nama_kapster) ?></td>
                                    <td><?= esc($b->nama_layanan) ?></td>
                                    <td>
                                        <?php
                                        $statusClass = 'status-pending'; // default
                                        if (strtolower($b->status) == 'selesai') $statusClass = 'status-selesai';
                                        if (strtolower($b->status) == 'dibatalkan') $statusClass = 'status-dibatalkan';
                                        ?>
                                        <span class="badge rounded-pill status-badge <?= $statusClass ?>"><?= esc($b->status) ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <div class="icon"><i class="fas fa-calendar-times"></i></div>
                <h3>No Bookings Found</h3>
                <p>You haven't made any appointments yet. Let's change that!</p>
                <a href="/booking/new" class="btn-book-now">Book Now</a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>