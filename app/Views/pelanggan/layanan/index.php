<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Layanan Kami
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .services-section {
        padding: 80px 0;
        background-color: #000;
        /* Latar belakang hitam pekat */
    }

    .section-title {
        font-size: 3rem;
        margin-bottom: 50px;
        color: #fff;
        letter-spacing: 2px;
    }

    /* Style untuk kartu ikon */
    .service-card {
        background-color: #111;
        /* Sedikit kontras dari background */
        border: 1px solid #c59d5f;
        /* Border emas */
        border-radius: 0;
        padding: 30px;
        text-align: center;
        transition: transform 0.3s ease, background-color 0.3s ease;
        height: 100%;
    }

    .service-card:hover {
        transform: translateY(-10px);
        background-color: #1a1a1a;
    }

    .service-card .icon {
        font-size: 3rem;
        color: #c59d5f;
        /* Ikon emas */
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

    /* Style untuk daftar harga */
    .price-list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px dashed #444;
        /* Garis pemisah lebih soft */
        padding: 25px 0;
    }

    .price-list-item:last-child {
        border-bottom: none;
    }

    .price-list-item .service-name h4 {
        margin: 0;
        color: #fff;
        font-size: 1.2rem;
        font-family: 'Playfair Display', serif;
    }

    .price-list-item .service-name p {
        margin: 5px 0 0;
        color: #a0a0a0;
        font-size: 0.9rem;
    }

    .price-list-item .service-price {
        color: #c59d5f;
        /* Harga emas */
        font-size: 1.5rem;
        font-weight: bold;
        font-family: 'Playfair Display', serif;
    }

    /* Banner diskon */
    .discount-banner {
        background-color: #c59d5f;
        /* Latar emas */
        color: #000;
        /* Teks hitam */
        padding: 50px;
        margin-top: 80px;
    }
</style>

<div class="container services-section">
    <div class="text-center">
        <h1 class="section-title playfair-display">SERVICES</h1>
    </div>

    <!-- Bagian 1: Grid Ikon Statis (Contoh dari Figma) -->
    <div class="row g-4 mb-5 justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="service-card">
                <div class="icon">✂️</div> <!-- Ganti dengan ikon dari library jika ada -->
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
    </div>

    <!-- Bagian 2: Daftar Harga Dinamis dari Database -->
    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-lg-10">
            <?php if (!empty($layanan)): ?>
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
            <?php else: ?>
                <p class="text-center text-white-50">Daftar layanan akan segera tersedia.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bagian 3: Banner Diskon Statis -->
    <div class="discount-banner text-center">
        <h5 class="text-uppercase">This Week's New Product</h5>
        <h2 class="display-4 playfair-display">25% DISCOUNT</h2>
        <p class="lead">Curabitur vulputate arcu odio, ac facilisis diam accumsan ut. Ut imperdiet et leo in vulputate.</p>
        <a href="#" class="btn btn-dark btn-lg mt-3">BUY NOW</a>
    </div>

</div>
<?= $this->endSection() ?>