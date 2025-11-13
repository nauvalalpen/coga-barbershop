<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Buat Booking Baru
<?= $this->endSection() ?>

<!-- This section provides the NEW, rich content for the 'hero' slot in the layout -->
<?= $this->section('hero') ?>
<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">New Booking</li>
                </ol>
            </nav>
            <h1 class="hero-title">Book an Appointment</h1>
            <p class="hero-subtitle">
                Select your preferred service, stylist, and time to secure your spot.
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
    .booking-form-section {
        padding: 100px 0;
        background: linear-gradient(180deg, var(--dark-bg) 0%, #050505 100%);
    }

    /* Form Wrapper */
    .form-wrapper {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        padding: 50px 40px;
        border: 2px solid #222;
        border-radius: 10px;
        animation: fadeInUp 1s ease-out backwards;
    }

    .form-wrapper h2 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        font-size: 2.5rem;
        margin-bottom: 30px;
        font-weight: 700;
        text-align: center;
    }

    .form-wrapper h2::after {
        content: '';
        display: block;
        width: 80px;
        height: 3px;
        background: var(--gold-color);
        margin: 15px auto 0;
    }

    /* Form Styles */
    .form-label {
        color: #a0a0a0;
        text-transform: uppercase;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }

    .form-control,
    .form-select {
        background-color: rgba(0, 0, 0, 0.3);
        border: 2px solid #333;
        border-radius: 5px;
        /* Softer edges */
        padding: 0.9rem 1.25rem;
        color: #fff;
        transition: var(--transition-smooth);
    }

    .form-control:focus,
    .form-select:focus {
        background-color: rgba(0, 0, 0, 0.4);
        border-color: var(--gold-color);
        box-shadow: 0 0 15px rgba(212, 175, 55, 0.2);
        color: #fff;
    }

    .form-control::placeholder {
        color: #666;
    }

    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23c59d5f' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
    }

    /* Submit Button */
    .btn-submit {
        background: var(--gold-color);
        color: #000;
        border: 2px solid var(--gold-color);
        padding: 1rem 2.5rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        width: 100%;
        transition: var(--transition-smooth);
        margin-top: 20px;
        border-radius: 5px;
    }

    .btn-submit:hover {
        background: transparent;
        color: var(--gold-color);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(212, 175, 55, 0.2);
    }

    /* Alert Messages */
    .alert {
        border-radius: 5px;
        border-left-width: 4px;
    }

    .alert-danger {
        background-color: rgba(220, 53, 69, 0.1);
        color: #dc3545;
        border-color: #dc3545;
    }
</style>

<div class="booking-form-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-wrapper">
                    <h2>Book Your Slot</h2>

                    <?php if (session()->get('error')): ?>
                        <div class="alert alert-danger"><?= session('error') ?></div>
                    <?php endif; ?>

                    <?php if (session()->get('errors')): ?>
                        <div class="alert alert-danger"><?= implode('<br>', session('errors')) ?></div>
                    <?php endif; ?>

                    <form action="/booking/create" method="post" class="mt-4">
                        <?= csrf_field() ?>

                        <div class="mb-4">
                            <label for="layanan_id" class="form-label">Choose Service</label>
                            <select name="layanan_id" id="layanan_id" class="form-select">
                                <?php foreach ($layanans as $l): ?>
                                    <option value="<?= $l->id ?>"><?= esc($l->nama_layanan) ?> (Rp<?= number_format($l->harga) ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="kapster_id" class="form-label">Choose Stylist</label>
                            <select name="kapster_id" id="kapster_id" class="form-select">
                                <option value="">-- Any Available Stylist --</option>
                                <?php foreach ($kapsters as $k): ?>
                                    <option value="<?= $k->id ?>" <?= ($selected_kapster_id == $k->id) ? 'selected' : '' ?>>
                                        <?= esc($k->nama) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="tanggal_booking" class="form-label">Booking Date</label>
                                <input type="date" name="tanggal_booking" id="tanggal_booking" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="jam_booking" class="form-label">Booking Time</label>
                                <input type="time" name="jam_booking" id="jam_booking" class="form-control" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-submit">
                            <i class="fas fa-calendar-check me-2"></i>
                            Create Booking
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>c