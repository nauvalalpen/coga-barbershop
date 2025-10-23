<!-- app/Views/pelanggan/layanan/index.php -->
<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Layanan Kami
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .services-section {
        padding: 60px 0;
    }

    .section-title {
        font-size: 3rem;
        margin-bottom: 40px;
        color: #fff;
        letter-spacing: 2px;
    }

    /* Style for the icon cards */
    .service-card {
        background-color: #1a1a1a;
        border: 1px solid #c59d5f;
        /* Gold border */
        border-radius: 0;
        padding: 30px;
        text-align: center;
        transition: transform 0.3s ease;
        height: 100%;
    }

    .service-card:hover {
        transform: translateY(-10px);
    }

    .service-card .icon {
        font-size: 3rem;
        color: #c59d5f;
        /* Gold icon */
        margin-bottom: 20px;
    }

    .service-card h5 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .service-card p {
        font-size: 0.9rem;
        color: #a0a0a0;
    }

    /* Style for the price list */
    .price-list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px dashed #555;
        padding: 20px 0;
    }

    .price-list-item .service-name h4 {
        margin: 0;
        color: #fff;
        font-size: 1.2rem;
    }

    .price-list-item .service-name p {
        margin: 5px 0 0;
        color: #a0a0a0;
        font-size: 0.9rem;
    }

    .price-list-item .service-price {
        color: #c59d5f;
        /* Gold price */
        font-size: 1.5rem;
        font-weight: bold;
    }

    /* Discount banner */
    .discount-banner {
        background-color: #c59d5f;
        /* Gold background */
        color: #121212;
        /* Dark text */
        padding: 50px;
        margin-top: 60px;
    }
</style>

<div class="container services-section">
    <div class="text-center">
        <h1 class="section-title playfair-display">SERVICES</h1>
    </div>

    <!-- Section 1: Icon Grid (Example, you can link this to your data if you have icons) -->
    <div class="row g-4 mb-5">
        <!-- You can loop through your services here if you add an 'icon' field to your database -->
        <!-- For now, this is a static example based on your Figma -->
        <div class="col-md-6 col-lg-4">
            <div class="service-card">
                <div class="icon">✂️</div> <!-- Replace with actual icon library like Font Awesome if desired -->
                <h5>Haircut & Beard Trim</h5>
                <p>A precision haircut followed by a detailed beard trim and shape-up.</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="service-card">
                <div class="icon">💈</div>
                <h5>Shaves & Haircut</h5>
                <p>The complete classic experience with a hot towel shave and stylish haircut.</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="service-card">
                <div class="icon">🧔</div>
                <h5>Facial & Shave</h5>
                <p>Rejuvenate your skin with our signature facial and a clean shave.</p>
            </div>
        </div>
        <!-- Add more static cards as needed -->
    </div>

    <!-- Section 2: Dynamic Price List from your Database -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <?php foreach ($layanan as $item): ?>
                <div class="price-list-item">
                    <div class="service-name">
                        <h4><?= esc($item->nama_layanan) ?></h4>
                        <p><?= esc($item->deskripsi) ?> (Estimasi: <?= esc($item->durasi_menit) ?> Menit)</p>
                    </div>
                    <div class="service-price">
                        Rp<?= number_format($item->harga, 0, ',', '.') ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Section 3: Discount Banner -->
    <div class="discount-banner text-center">
        <h5 class="text-uppercase">This Week's New Product</h5>
        <h2 class="display-4 playfair-display">25% DISCOUNT</h2>
        <p class="lead">Curabitur vulputate arcu odio, ac facilisis diam accumsan ut. Ut imperdiet et leo in vulputate.</p>
        <a href="#" class="btn btn-dark btn-lg mt-3">BUY NOW</a>
    </div>

</div>
<?= $this->endSection() ?>