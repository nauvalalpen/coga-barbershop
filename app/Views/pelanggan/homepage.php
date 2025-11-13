<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Home
<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
COGA BARBERSHOP
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
            <h1 class="hero-title">COGA BARBERSHOP</h1>
            <p class="hero-subtitle">
                Have a question or want to book an appointment? We'd love to hear from you.
            </p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<!-- Section khusus untuk hero di homepage yang berbeda dari halaman lain -->
<?= $this->section('hero_content') ?>
<div class="hero-logo-wrapper">
    <div class="hero-logo-icon animate-fade-in">✂️</div>
    <h1 class="hero-main-title animate-slide-up">BARBERSHOP</h1>
    <div class="hero-logo-badge animate-slide-up-delayed">
        <span class="line"></span>
        <span class="text">shaves & trims</span>
        <span class="line"></span>
    </div>
    <div class="hero-logo-est animate-fade-in-delayed">
        <span>EST.</span><span>2024</span>
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
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(40px);
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

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    .animate-fade-in {
        animation: fadeIn 1s ease-out;
    }

    .animate-slide-up {
        animation: slideUp 1s ease-out 0.2s backwards;
    }

    .animate-slide-up-delayed {
        animation: slideUp 1s ease-out 0.4s backwards;
    }

    .animate-fade-in-delayed {
        animation: fadeIn 1s ease-out 0.6s backwards;
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

    /* Section Styling */
    .section {
        padding: 120px 0;
        position: relative;
        overflow: hidden;
    }

    .section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        width: 1px;
        height: 100%;
        background: linear-gradient(to bottom, transparent, var(--gold-color), transparent);
        opacity: 0.2;
    }

    .section-header {
        margin-bottom: 70px;
        text-align: center;
        position: relative;
    }

    .section-header .sub-title {
        color: var(--gold-color);
        text-transform: uppercase;
        letter-spacing: 4px;
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .section-header .sub-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 2px;
        background: var(--gold-color);
    }

    .section-header .main-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        color: #fff;
        font-weight: 700;
        margin-top: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    /* Services Section */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        margin-top: 50px;
    }

    .service-item {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 2px solid #222;
        padding: 50px 30px;
        text-align: center;
        transition: var(--transition-smooth);
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .service-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.1), transparent);
        transition: var(--transition-smooth);
    }

    .service-item:hover::before {
        left: 100%;
    }

    .service-item:hover {
        border-color: var(--gold-color);
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(212, 175, 55, 0.2);
    }

    .service-item .icon {
        font-size: 4rem;
        margin-bottom: 25px;
        transition: var(--transition-smooth);
        display: inline-block;
    }

    .service-item:hover .icon {
        transform: scale(1.2) rotate(5deg);
    }

    .service-item h5 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        font-size: 1.5rem;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .service-item p {
        color: #a0a0a0;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .btn-explore {
        border: 2px solid var(--gold-color);
        background: transparent;
        color: var(--gold-color);
        padding: 1rem 3rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 600;
        margin-top: 50px;
        position: relative;
        overflow: hidden;
        transition: var(--transition-smooth);
        cursor: pointer;
    }

    .btn-explore::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--gold-color);
        transition: var(--transition-smooth);
        z-index: -1;
    }

    .btn-explore:hover::before {
        left: 0;
    }

    .btn-explore:hover {
        color: var(--dark-bg);
        transform: scale(1.05);
    }

    /* Stats Section */
    .stats-section {
        background: linear-gradient(135deg, #1a1a1a 0%, #0a0a0a 100%);
        position: relative;
    }

    .stats-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 50%, rgba(212, 175, 55, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 80% 50%, rgba(212, 175, 55, 0.05) 0%, transparent 50%);
    }

    .stat-item {
        text-align: center;
        color: #fff;
        padding: 40px 20px;
        position: relative;
        transition: var(--transition-smooth);
    }

    .stat-item:hover {
        transform: translateY(-10px);
    }

    .stat-item .icon {
        font-size: 3.5rem;
        margin-bottom: 20px;
        display: inline-block;
        transition: var(--transition-smooth);
    }

    .stat-item:hover .icon {
        animation: pulse 1s ease-in-out infinite;
    }

    .stat-item .number {
        font-family: 'Playfair Display', serif;
        font-size: 4.5rem;
        font-weight: 700;
        margin: 15px 0;
        background: linear-gradient(135deg, var(--gold-color), #f4e5a1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stat-item .text {
        text-transform: uppercase;
        letter-spacing: 3px;
        color: #a0a0a0;
        font-size: 0.9rem;
        font-weight: 500;
    }

    /* Discount Banner */
    .discount-banner {
        background: linear-gradient(135deg, var(--gold-color) 0%, #f4e5a1 100%);
        color: #000;
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }

    .discount-banner::before {
        content: '✂️';
        position: absolute;
        font-size: 20rem;
        opacity: 0.05;
        top: 50%;
        left: 10%;
        transform: translateY(-50%) rotate(-15deg);
    }

    .discount-banner::after {
        content: '💈';
        position: absolute;
        font-size: 20rem;
        opacity: 0.05;
        top: 50%;
        right: 10%;
        transform: translateY(-50%) rotate(15deg);
    }

    .discount-banner h2 {
        font-family: 'Playfair Display', serif;
        font-size: 4rem;
        font-weight: 700;
        margin-bottom: 30px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .discount-banner .lead {
        font-size: 1.2rem;
        line-height: 1.8;
        max-width: 700px;
        margin: 0 auto;
    }

    .discount-banner .btn-dark {
        background: #000;
        border: 2px solid #000;
        padding: 1rem 3rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 600;
        margin-top: 30px;
        transition: var(--transition-smooth);
    }

    .discount-banner .btn-dark:hover {
        background: transparent;
        color: #000;
        transform: scale(1.05);
    }

    /* Reviews Section */
    .review-item {
        text-align: center;
        padding: 40px 30px;
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 2px solid #222;
        border-radius: 10px;
        transition: var(--transition-smooth);
        height: 100%;
    }

    .review-item:hover {
        border-color: var(--gold-color);
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(212, 175, 55, 0.2);
    }

    .review-item img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 25px;
        border: 3px solid var(--gold-color);
        filter: grayscale(100%);
        transition: var(--transition-smooth);
    }

    .review-item:hover img {
        filter: grayscale(0%);
        transform: scale(1.1);
    }

    .review-item p {
        color: #c0c0c0;
        font-style: italic;
        line-height: 1.8;
        margin-bottom: 25px;
        font-size: 1rem;
    }

    .review-item .stars {
        color: var(--gold-color);
        font-size: 1.2rem;
        margin-bottom: 15px;
    }

    .review-item .author {
        color: var(--gold-color);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-top: 20px;
        font-size: 0.9rem;
    }

    /* Brands Section */
    .brands-section {
        background: linear-gradient(135deg, #1a1a1a 0%, #0a0a0a 100%);
        padding: 120px 0;
    }

    .brands-content {
        border-left: 4px solid var(--gold-color);
        padding-left: 50px;
        position: relative;
    }

    .brands-content::before {
        content: '';
        position: absolute;
        left: -6px;
        top: 0;
        width: 8px;
        height: 60px;
        background: var(--gold-color);
        box-shadow: 0 0 20px var(--gold-color);
    }

    .brands-content h2 {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        color: #fff;
        margin-bottom: 25px;
        font-weight: 700;
    }

    .brands-content p {
        color: #a0a0a0;
        line-height: 1.8;
        font-size: 1.05rem;
    }

    .brand-gallery {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .brand-gallery-item {
        aspect-ratio: 1;
        background: #0f0f0f;
        border: 2px solid #222;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition-smooth);
        overflow: hidden;
        position: relative;
    }

    .brand-gallery-item::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, transparent, rgba(212, 175, 55, 0.1));
        opacity: 0;
        transition: var(--transition-smooth);
    }

    .brand-gallery-item:hover::before {
        opacity: 1;
    }

    .brand-gallery-item:hover {
        border-color: var(--gold-color);
        transform: scale(1.05);
    }

    .brand-gallery-item img {
        width: 70%;
        height: 70%;
        object-fit: contain;
        filter: brightness(0.5) grayscale(100%);
        transition: var(--transition-smooth);
    }

    .brand-gallery-item:hover img {
        filter: brightness(1) grayscale(0%);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .section {
            padding: 80px 0;
        }

        .section-header .main-title {
            font-size: 2.5rem;
        }

        .services-grid {
            grid-template-columns: 1fr;
        }

        .stat-item .number {
            font-size: 3rem;
        }

        .discount-banner h2 {
            font-size: 2.5rem;
        }

        .brand-gallery {
            grid-template-columns: repeat(2, 1fr);
        }

        .brands-content {
            padding-left: 30px;
            margin-bottom: 40px;
        }
    }

    /* Smooth Scrolling */
    html {
        scroll-behavior: smooth;
    }
</style>


<!-- 1. Services Section -->
<div class="section">
    <div class="container">
        <div class="section-header scroll-reveal">
            <p class="sub-title">OUR TREATMENT</p>
            <h2 class="main-title">SERVICES</h2>
        </div>
        <div class="services-grid">
            <div class="service-item scroll-reveal">
                <div class="icon">✂️</div>
                <h5>Haircut & Beard Trim</h5>
                <p>Expert styling and grooming for the modern gentleman. Precision cuts tailored to your style.</p>
            </div>
            <div class="service-item scroll-reveal">
                <div class="icon">💈</div>
                <h5>Shaves & Haircut</h5>
                <p>Classic barbering techniques combined with contemporary styles for a fresh look.</p>
            </div>
            <div class="service-item scroll-reveal">
                <div class="icon">🧔</div>
                <h5>Facial & Shave</h5>
                <p>Luxurious hot towel shave with premium grooming products for ultimate relaxation.</p>
            </div>
            <div class="service-item scroll-reveal">
                <div class="icon">🎉</div>
                <h5>The Big Day</h5>
                <p>Special occasion grooming packages to make you look your absolute best.</p>
            </div>
        </div>
        <div class="text-center scroll-reveal">
            <a href="/layanan" class="btn btn-explore">Explore Now</a>
        </div>
    </div>
</div>

<!-- 2. Stats Section -->
<div class="section stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="stat-item scroll-reveal">
                    <div class="icon">💈</div>
                    <div class="number" data-target="2500">0</div>
                    <div class="text">Shaves</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item scroll-reveal">
                    <div class="icon">✂️</div>
                    <div class="number" data-target="4500">0</div>
                    <div class="text">Haircuts</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item scroll-reveal">
                    <div class="icon">🏠</div>
                    <div class="number" data-target="23">0</div>
                    <div class="text">Open Shops</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 3. Discount Banner -->
<div class="discount-banner scroll-reveal">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="display-4">25% DISCOUNT</h2>
                <p class="lead my-4">Experience premium barbering at an unbeatable price. Book your appointment today and discover the art of traditional grooming with a modern twist.</p>
                <a href="#" class="btn btn-dark btn-lg">Book Now</a>
            </div>
        </div>
    </div>
</div>

<!-- 4. Client Reviews Section -->
<div class="section">
    <div class="container">
        <div class="section-header scroll-reveal">
            <p class="sub-title">WHAT PEOPLE SAY ABOUT US</p>
            <h2 class="main-title">CLIENTS REVIEWS</h2>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="review-item scroll-reveal">
                    <img src="https://i.pravatar.cc/150?img=12" alt="Client">
                    <div class="stars">★★★★★</div>
                    <p>"Best barbershop experience I've ever had! The attention to detail and professionalism is outstanding. Highly recommended!"</p>
                    <div class="author">Glen Sparkle, Miami</div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="review-item scroll-reveal">
                    <img src="https://i.pravatar.cc/150?img=33" alt="Client">
                    <div class="stars">★★★★★</div>
                    <p>"Incredible service and atmosphere. The barbers are true artists. I always leave looking sharp and feeling confident."</p>
                    <div class="author">Michael Richards, California</div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="review-item scroll-reveal">
                    <img src="https://i.pravatar.cc/150?img=51" alt="Client">
                    <div class="stars">★★★★★</div>
                    <p>"Perfect blend of traditional barbering and modern style. Been coming here for years and never disappointed!"</p>
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
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="brands-content scroll-reveal">
                    <h2 class="main-title">BRANDS WE CARRY</h2>
                    <p class="mt-4">We use only the finest grooming products from premium brands. Quality products ensure exceptional results and the best experience for our valued clients.</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="brand-gallery scroll-reveal">
                    <div class="brand-gallery-item">
                        <img src="https://via.placeholder.com/150x150/1a1a1a/d4af37?text=Brand+1" alt="Brand 1">
                    </div>
                    <div class="brand-gallery-item">
                        <img src="https://via.placeholder.com/150x150/1a1a1a/d4af37?text=Brand+2" alt="Brand 2">
                    </div>
                    <div class="brand-gallery-item">
                        <img src="https://via.placeholder.com/150x150/1a1a1a/d4af37?text=Brand+3" alt="Brand 3">
                    </div>
                    <div class="brand-gallery-item">
                        <img src="https://via.placeholder.com/150x150/1a1a1a/d4af37?text=Brand+4" alt="Brand 4">
                    </div>
                    <div class="brand-gallery-item">
                        <img src="https://via.placeholder.com/150x150/1a1a1a/d4af37?text=Brand+5" alt="Brand 5">
                    </div>
                    <div class="brand-gallery-item">
                        <img src="https://via.placeholder.com/150x150/1a1a1a/d4af37?text=Brand+6" alt="Brand 6">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Scroll Reveal Animation
    function revealOnScroll() {
        const reveals = document.querySelectorAll('.scroll-reveal');

        reveals.forEach((element, index) => {
            const windowHeight = window.innerHeight;
            const elementTop = element.getBoundingClientRect().top;
            const revealPoint = 100;

            if (elementTop < windowHeight - revealPoint) {
                setTimeout(() => {
                    element.classList.add('revealed');
                }, index * 100);
            }
        });
    }

    // Counter Animation for Stats
    function animateCounters() {
        const counters = document.querySelectorAll('.stat-item .number');

        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;

            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    counter.textContent = Math.floor(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };

            // Check if element is in viewport
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && counter.textContent === '0') {
                        updateCounter();
                    }
                });
            }, {
                threshold: 0.5
            });

            observer.observe(counter);
        });
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', () => {
        revealOnScroll();
        animateCounters();
    });

    // Run on scroll
    window.addEventListener('scroll', revealOnScroll);

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
</script>

<?= $this->endSection() ?>