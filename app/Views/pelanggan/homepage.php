<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Home
<?= $this->endSection() ?>
<?= $this->section('page_header') ?>
COGA BARBERSHOP
<?= $this->endSection() ?>

<!-- Section khusus untuk hero di homepage yang berbeda dari halaman lain -->
<?= $this->section('hero_content') ?>
<div class="hero-logo-wrapper">
    <div class="hero-logo-icon">✂️</div>
    <h1 class="hero-main-title">BARBERSHOP</h1>
    <div class="hero-logo-badge">
        <span class="line"></span>
        <span class="text">shaves & trims</span>
        <span class="line"></span>
    </div>
    <div class="hero-logo-est">
        <span>EST.</span><span>2024</span>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<style>
    /* Homepage Specific Styles */
    .section {
        padding: 100px 0;
    }

    .section-header {
        margin-bottom: 50px;
        text-align: center;
    }

    .section-header .sub-title {
        color: var(--gold-color);
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: bold;
        font-size: 0.9rem;
    }

    .section-header .main-title {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        color: #fff;
    }

    /* Services Section */
    .services-grid .service-item {
        background-color: var(--light-dark-bg);
        border: 2px solid #222;
        padding: 40px;
        text-align: center;
        transition: border-color 0.3s ease;
    }

    .services-grid .service-item:hover {
        border-color: var(--gold-color);
    }

    .services-grid .icon {
        font-size: 3rem;
        color: var(--gold-color);
        margin-bottom: 20px;
    }

    .services-grid h5 {
        font-family: 'Playfair Display', serif;
        color: #fff;
    }

    .services-grid p {
        color: #a0a0a0;
        font-size: 0.9rem;
    }

    .btn-explore {
        border: 2px solid var(--gold-color);
        color: var(--gold-color);
        padding: 0.75rem 2.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 40px;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-explore:hover {
        background-color: var(--gold-color);
        color: var(--dark-bg);
    }

    /* Stats Section */
    .stats-section {
        background-color: #1a1a1a;
    }

    .stat-item {
        text-align: center;
        color: #fff;
    }

    .stat-item .icon {
        font-size: 2.5rem;
        color: var(--gold-color);
    }

    .stat-item .number {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 700;
        margin: 10px 0;
    }

    .stat-item .text {
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #a0a0a0;
    }

    /* Discount Banner */
    .discount-banner {
        background-color: var(--gold-color);
        color: #000;
        padding: 80px 0;
    }

    .discount-banner h2 {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
    }

    /* Reviews Section */
    .review-item {
        text-align: center;
    }

    .review-item img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-bottom: 20px;
        filter: grayscale(100%);
    }

    .review-item p {
        color: #a0a0a0;
        font-style: italic;
    }

    .review-item .author {
        color: var(--gold-color);
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 20px;
    }

    /* Brands Section */
    .brands-section {
        background-color: #1a1a1a;
        padding: 100px 0;
    }

    .brands-content {
        border-left: 2px solid var(--gold-color);
        padding-left: 40px;
    }

    .brand-gallery {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .brand-gallery img {
        width: 100%;
        filter: brightness(0.5);
    }
</style>

<!-- 1. Services Section -->
<div class="section">
    <div class="container">
        <div class="section-header">
            <p class="sub-title">OUR TREATMENT</p>
            <h2 class="main-title">SERVICES</h2>
        </div>
        <div class="row services-grid">
            <div class="col-lg-3 col-md-6">
                <div class="service-item">
                    <div class="icon">✂️</div>
                    <h5>Haircut & Beard Trim</h5>
                    <p>Duis porta, ligula rhoncus euismod pretium, nisi tellus.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="service-item">
                    <div class="icon">💈</div>
                    <h5>Shaves & Haircut</h5>
                    <p>Duis porta, ligula rhoncus euismod pretium, nisi tellus.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="service-item">
                    <div class="icon">🧔</div>
                    <h5>Facial & Shave</h5>
                    <p>Duis porta, ligula rhoncus euismod pretium, nisi tellus.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="service-item">
                    <div class="icon">🎉</div>
                    <h5>The Big Day</h5>
                    <p>Duis porta, ligula rhoncus euismod pretium, nisi tellus.</p>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="/layanan" class="btn btn-explore">Explore Now</a>
        </div>
    </div>
</div>

<!-- 2. Stats Section -->
<div class="section stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="stat-item">
                    <div class="icon">💈</div>
                    <div class="number">2500</div>
                    <div class="text">Shaves</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <div class="icon">✂️</div>
                    <div class="number">4500</div>
                    <div class="text">Haircuts</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">🏠</div>
                <div class="number">23</div>
                <div class="text">Open Shops</div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- 3. Discount Banner -->
<div class="discount-banner">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="display-4">25% DISCOUNT</h2>
                <p class="lead my-4">Curabitur vulputate arcu odio, ac facilisis diam accumsan ut. Ut imperdiet et leo in vulputate. Sed eleifend lacus eu sapien sagittis imperdiet.</p>
                <a href="#" class="btn btn-dark btn-lg">Book Now</a>
            </div>
        </div>
    </div>
</div>

<!-- 4. Client Reviews Section -->
<div class="section">
    <div class="container">
        <div class="section-header">
            <p class="sub-title">WHAT PEOPLE SAY ABOUT US</p>
            <h2 class="main-title">CLIENTS REVIEWS</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="review-item"><img src="https://via.placeholder.com/80" alt="Client">
                    <p>"Vestibulum commodo sapien non elit porttitor, vitae volutpat nibh mollis. Nulla porta risus id neque."</p>
                    <div class="author">Glen Sparkle, Miami</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-item"><img src="https://via.placeholder.com/80" alt="Client">
                    <p>"Vestibulum commodo sapien non elit porttitor, vitae volutpat nibh mollis. Nulla porta risus id neque."</p>
                    <div class="author">Michael Richards, California</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-item"><img src="https://via.placeholder.com/80" alt="Client">
                    <p>"Vestibulum commodo sapien non elit porttitor, vitae volutpat nibh mollis. Nulla porta risus id neque."</p>
                    <div class="author">John Hood, NY</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 5. Brands We Carry Section -->
<div class="brands-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="brands-content">
                    <h2 class="main-title">BRANDS WE CARRY</h2>
                    <p class="text-white-50 mt-3">Vestibulum gravida enim, vel maximus ligula fermentum a. Sed rhoncus eget ex id egestas. Nam nec nisl placerat, tempus erat a, condimentum metusurabitur nulla nisl.</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="brand-gallery">
                    <img src="https://via.placeholder.com/150" alt="Brand">
                    <img src="https://via.placeholder.com/150" alt="Brand">
                    <img src="https://via.placeholder.com/150" alt="Brand">
                    <img src="https://via.placeholder.com/150" alt="Brand">
                    <img src="https://via.placeholder.com/150" alt="Brand">
                    <img src="https://via.placeholder.com/150" alt="Brand">
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>