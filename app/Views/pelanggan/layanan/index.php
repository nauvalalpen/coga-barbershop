<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Layanan Kami
<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
SERVICES
<?= $this->endSection() ?>
<?= $this->section('hero') ?>
<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
            <h1 class="hero-title">LAYANAN</h1>
            <p class="hero-subtitle">
                Have a question or want to book an appointment? We'd love to hear from you.
            </p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    /* Root Variables */
    :root {
        --gold-color: #d4af37;
        --dark-bg: #0a0a0a;
        --light-dark-bg: #1a1a1a;
        --transition-smooth: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Animations */
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

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-40px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(40px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
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

    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }

        100% {
            background-position: 1000px 0;
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    /* Scroll Reveal */
    .scroll-reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: var(--transition-smooth);
    }

    .scroll-reveal.revealed {
        opacity: 1;
        transform: translateY(0);
    }

    .scroll-reveal-left {
        opacity: 0;
        transform: translateX(-40px);
        transition: var(--transition-smooth);
    }

    .scroll-reveal-left.revealed {
        opacity: 1;
        transform: translateX(0);
    }

    .scroll-reveal-right {
        opacity: 0;
        transform: translateX(40px);
        transition: var(--transition-smooth);
    }

    .scroll-reveal-right.revealed {
        opacity: 1;
        transform: translateX(0);
    }

    /* Services Section */
    .services-section {
        padding: 100px 0;
        background: linear-gradient(180deg, var(--dark-bg) 0%, #050505 100%);
        position: relative;
        overflow: hidden;
    }

    .services-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--gold-color), transparent);
    }

    /* Section Title */
    .section-title-wrapper {
        text-align: center;
        margin-bottom: 80px;
        position: relative;
    }

    .section-subtitle {
        color: var(--gold-color);
        text-transform: uppercase;
        letter-spacing: 4px;
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .section-subtitle::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 2px;
        background: var(--gold-color);
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 4rem;
        color: #fff;
        font-weight: 700;
        margin-top: 20px;
        letter-spacing: 3px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .section-description {
        color: #a0a0a0;
        font-size: 1.1rem;
        max-width: 700px;
        margin: 25px auto 0;
        line-height: 1.8;
    }

    /* Service Cards Grid */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 40px;
        margin-bottom: 100px;
    }

    .service-card {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 2px solid #222;
        padding: 50px 35px;
        text-align: center;
        transition: var(--transition-smooth);
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.1), transparent);
        transition: var(--transition-smooth);
    }

    .service-card::after {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(135deg, var(--gold-color), transparent);
        opacity: 0;
        transition: var(--transition-smooth);
        z-index: -1;
    }

    .service-card:hover::before {
        left: 100%;
    }

    .service-card:hover::after {
        opacity: 1;
    }

    .service-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 25px 50px rgba(212, 175, 55, 0.3);
    }

    .service-card .icon {
        font-size: 4.5rem;
        margin-bottom: 30px;
        display: inline-block;
        transition: var(--transition-smooth);
        filter: drop-shadow(0 0 10px rgba(212, 175, 55, 0.3));
    }

    .service-card:hover .icon {
        transform: scale(1.2) rotate(5deg);
        animation: float 3s ease-in-out infinite;
    }

    .service-card h5 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 1.4rem;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .service-card p {
        font-size: 1rem;
        color: #b0b0b0;
        line-height: 1.7;
        margin: 0;
    }

    .service-card .card-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--gold-color);
        color: #000;
        padding: 5px 15px;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    /* Price List Section */
    .price-list-section {
        background: linear-gradient(135deg, #1a1a1a 0%, #0a0a0a 100%);
        padding: 80px 40px;
        border: 2px solid #222;
        border-radius: 10px;
        position: relative;
        overflow: hidden;
        margin-bottom: 100px;
    }

    .price-list-section::before {
        content: '✂️';
        position: absolute;
        font-size: 25rem;
        opacity: 0.02;
        top: 50%;
        left: -10%;
        transform: translateY(-50%) rotate(-15deg);
        pointer-events: none;
    }

    .price-list-section::after {
        content: '💈';
        position: absolute;
        font-size: 25rem;
        opacity: 0.02;
        top: 50%;
        right: -10%;
        transform: translateY(-50%) rotate(15deg);
        pointer-events: none;
    }

    .price-list-header {
        text-align: center;
        margin-bottom: 60px;
        position: relative;
    }

    .price-list-header h2 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .price-list-header p {
        color: #a0a0a0;
        font-size: 1.1rem;
    }

    .price-list-header::after {
        content: '';
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 3px;
        background: linear-gradient(90deg, transparent, var(--gold-color), transparent);
    }

    /* Price List Items */
    .price-list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px dashed #333;
        padding: 35px 20px;
        transition: var(--transition-smooth);
        position: relative;
        background: transparent;
    }

    .price-list-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 0;
        background: var(--gold-color);
        transition: var(--transition-smooth);
    }

    .price-list-item:hover::before {
        height: 100%;
    }

    .price-list-item:last-child {
        border-bottom: none;
    }

    .price-list-item:hover {
        background: rgba(212, 175, 55, 0.05);
        padding-left: 30px;
    }

    .service-name h4 {
        margin: 0 0 10px 0;
        color: #fff;
        font-size: 1.5rem;
        font-family: 'Playfair Display', serif;
        font-weight: 600;
        transition: var(--transition-smooth);
    }

    .price-list-item:hover .service-name h4 {
        color: var(--gold-color);
    }

    .service-name p {
        margin: 0;
        color: #a0a0a0;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .service-duration {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        color: var(--gold-color);
        font-size: 0.9rem;
        margin-top: 8px;
        font-weight: 500;
    }

    .service-duration::before {
        content: '⏱';
        font-size: 1rem;
    }

    .service-price {
        color: var(--gold-color);
        font-size: 2rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        white-space: nowrap;
        margin-left: 30px;
        text-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
        transition: var(--transition-smooth);
    }

    .price-list-item:hover .service-price {
        transform: scale(1.1);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        color: #666;
    }

    .empty-state .icon {
        font-size: 5rem;
        margin-bottom: 20px;
        opacity: 0.3;
    }

    .empty-state p {
        font-size: 1.2rem;
        color: #888;
    }

    /* Discount Banner */
    .discount-banner {
        background: linear-gradient(135deg, var(--gold-color) 0%, #f4e5a1 100%);
        color: #000;
        padding: 100px 50px;
        text-align: center;
        position: relative;
        overflow: hidden;
        border-radius: 10px;
    }

    .discount-banner::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.2) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(0, 0, 0, 0.1) 0%, transparent 50%);
    }

    .discount-banner-content {
        position: relative;
        z-index: 1;
    }

    .discount-banner h5 {
        text-transform: uppercase;
        letter-spacing: 3px;
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 15px;
        opacity: 0.8;
    }

    .discount-banner h2 {
        font-family: 'Playfair Display', serif;
        font-size: 4.5rem;
        font-weight: 700;
        margin: 20px 0;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .discount-banner .lead {
        font-size: 1.2rem;
        line-height: 1.8;
        max-width: 700px;
        margin: 25px auto;
        opacity: 0.9;
    }

    .discount-banner .btn-dark {
        background: #000;
        border: 3px solid #000;
        color: #fff;
        padding: 1rem 3.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 700;
        margin-top: 30px;
        transition: var(--transition-smooth);
        font-size: 1.1rem;
    }

    .discount-banner .btn-dark:hover {
        background: transparent;
        color: #000;
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    /* Decorative Elements */
    .decorative-scissors {
        position: absolute;
        font-size: 8rem;
        opacity: 0.05;
        animation: float 6s ease-in-out infinite;
    }

    .decorative-scissors.left {
        top: 10%;
        left: 5%;
        transform: rotate(-20deg);
    }

    .decorative-scissors.right {
        bottom: 10%;
        right: 5%;
        transform: rotate(20deg);
        animation-delay: 3s;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .section-title {
            font-size: 3rem;
        }

        .services-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .price-list-section {
            padding: 60px 30px;
        }

        .price-list-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .service-price {
            margin-left: 0;
            font-size: 1.8rem;
        }

        .discount-banner h2 {
            font-size: 3rem;
        }
    }

    @media (max-width: 768px) {
        .services-section {
            padding: 60px 0;
        }

        .section-title {
            font-size: 2.5rem;
        }

        .services-grid {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .service-card {
            padding: 40px 25px;
        }

        .price-list-header h2 {
            font-size: 2.5rem;
        }

        .discount-banner {
            padding: 60px 30px;
        }

        .discount-banner h2 {
            font-size: 2.5rem;
        }
    }

    /* Smooth Scrolling */
    html {
        scroll-behavior: smooth;
    }
</style>

<div class="container services-section">
    <!-- Section Title -->
    <div class="section-title-wrapper scroll-reveal">
        <p class="section-subtitle">OUR EXPERTISE</p>
        <h1 class="section-title">PREMIUM SERVICES</h1>
        <p class="section-description">
            Experience the art of traditional barbering combined with modern grooming techniques.
            Each service is crafted to perfection by our master barbers.
        </p>
    </div>

    <!-- Featured Services Grid -->
    <div class="services-grid">
        <div class="service-card scroll-reveal">
            <div class="card-badge">Popular</div>
            <div class="icon">✂️</div>
            <h5>Haircut & Beard Trim</h5>
            <p>A precision haircut followed by a detailed beard trim and shape-up. Perfect for the modern gentleman who values style and grooming.</p>
        </div>
        <div class="service-card scroll-reveal">
            <div class="card-badge">Premium</div>
            <div class="icon">💈</div>
            <h5>Shaves & Haircut</h5>
            <p>The complete classic experience with a hot towel shave and stylish haircut. Traditional barbering at its finest.</p>
        </div>
        <div class="service-card scroll-reveal">
            <div class="card-badge">Luxury</div>
            <div class="icon">🧔</div>
            <h5>Facial & Shave</h5>
            <p>Rejuvenate your skin with our signature facial treatment and a clean, smooth shave. Ultimate relaxation and grooming.</p>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="decorative-scissors left">✂️</div>
    <div class="decorative-scissors right">💈</div>

    <!-- Price List Section -->
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="price-list-section scroll-reveal">
                <div class="price-list-header">
                    <h2>Complete Price List</h2>
                    <p>Transparent pricing for all our premium services</p>
                </div>

                <?php if (!empty($layanan)): ?>
                    <?php foreach ($layanan as $index => $item): ?>
                        <div class="price-list-item scroll-reveal-left" style="transition-delay: <?= $index * 0.1 ?>s">
                            <div class="service-name">
                                <h4><?= esc($item->nama_layanan) ?></h4>
                                <p><?= esc($item->deskripsi) ?></p>
                                <span class="service-duration"><?= esc($item->durasi_menit) ?> Minutes</span>
                            </div>
                            <div class="service-price">
                                Rp<?= number_format($item->harga, 0, ',', '.') ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-state">
                        <div class="icon">📋</div>
                        <p>Our service menu is being updated. Please check back soon or contact us for more information.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Discount Banner -->
    <div class="discount-banner scroll-reveal">
        <div class="discount-banner-content">
            <h5>Limited Time Offer</h5>
            <h2>25% DISCOUNT</h2>
            <p class="lead">
                Don't miss out on this exclusive offer! Book your appointment this week and experience
                premium barbering services at an unbeatable price. Available for new and returning clients.
            </p>
            <a href="/booking" class="btn btn-dark btn-lg">BOOK NOW</a>
        </div>
    </div>
</div>

<script>
    // Scroll Reveal Animation
    function revealOnScroll() {
        const reveals = document.querySelectorAll('.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right');

        reveals.forEach((element) => {
            const windowHeight = window.innerHeight;
            const elementTop = element.getBoundingClientRect().top;
            const revealPoint = 100;

            if (elementTop < windowHeight - revealPoint) {
                element.classList.add('revealed');
            }
        });
    }

    // Parallax effect for decorative elements
    function parallaxScroll() {
        const scrolled = window.pageYOffset;
        const decoratives = document.querySelectorAll('.decorative-scissors');

        decoratives.forEach((element, index) => {
            const speed = index === 0 ? 0.3 : -0.3;
            element.style.transform = `translateY(${scrolled * speed}px) rotate(${index === 0 ? -20 : 20}deg)`;
        });
    }

    // Service card click effect
    function initServiceCards() {
        const cards = document.querySelectorAll('.service-card');

        cards.forEach(card => {
            card.addEventListener('click', function() {
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 200);
            });
        });
    }

    // Price list hover sound effect (visual feedback)
    function initPriceListItems() {
        const items = document.querySelectorAll('.price-list-item');

        items.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            });
        });
    }

    // Initialize all animations and effects
    document.addEventListener('DOMContentLoaded', () => {
        revealOnScroll();
        initServiceCards();
        initPriceListItems();
    });

    // Run on scroll
    window.addEventListener('scroll', () => {
        revealOnScroll();
        parallaxScroll();
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add stagger animation to price list items
    window.addEventListener('load', () => {
        const items = document.querySelectorAll('.price-list-item');
        items.forEach((item, index) => {
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'translateX(0)';
            }, index * 100);
        });
    });
</script>

<?= $this->endSection() ?>