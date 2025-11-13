<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Our Kapsters
<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
KAPSTERS
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

    @keyframes slideInScale {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes shine {
        0% {
            left: -100%;
        }

        50%,
        100% {
            left: 100%;
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
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

    /* Team Section */
    .team-section {
        padding: 100px 0;
        background: linear-gradient(180deg, var(--dark-bg) 0%, #050505 100%);
        position: relative;
        overflow: hidden;
    }

    .team-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--gold-color), transparent);
    }

    /* Section Header */
    .section-header {
        margin-bottom: 80px;
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
        font-size: 4rem;
        color: #fff;
        font-weight: 700;
        margin-top: 20px;
        letter-spacing: 3px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .section-header .section-description {
        color: #a0a0a0;
        font-size: 1.1rem;
        max-width: 700px;
        margin: 25px auto 0;
        line-height: 1.8;
    }

    /* Team Card Container */
    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 40px;
        margin-top: 50px;
    }

    /* Team Card */
    .team-card {
        position: relative;
        overflow: hidden;
        border: 2px solid #222;
        background: #0f0f0f;
        transition: var(--transition-smooth);
        cursor: pointer;
        height: 550px;
    }

    .team-card::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(135deg, var(--gold-color), transparent);
        opacity: 0;
        transition: var(--transition-smooth);
        z-index: 0;
    }

    .team-card:hover::before {
        opacity: 1;
    }

    .team-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 50px rgba(212, 175, 55, 0.3);
    }

    /* Team Card Image Wrapper */
    .team-card-img-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .team-card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition-smooth);
        filter: grayscale(100%) brightness(0.6);
    }

    .team-card:hover .team-card-img {
        transform: scale(1.15);
        filter: grayscale(0%) brightness(1);
    }

    /* Shine Effect */
    .team-card-img-wrapper::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 50%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: var(--transition-smooth);
    }

    .team-card:hover .team-card-img-wrapper::after {
        animation: shine 1.5s ease-in-out;
    }

    /* Team Card Overlay */
    .team-card-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.98) 0%, rgba(0, 0, 0, 0.8) 50%, transparent 100%);
        padding: 60px 30px 30px;
        text-align: center;
        transition: var(--transition-smooth);
        z-index: 1;
    }

    .team-card:hover .team-card-overlay {
        background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 20%, rgba(0, 0, 0, 0.7) 70%, transparent 100%);
        padding-bottom: 40px;
    }

    /* Kapster Badge */
    .kapster-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--gold-color);
        color: #000;
        padding: 8px 20px;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        z-index: 2;
        opacity: 0;
        transform: translateX(20px);
        transition: var(--transition-smooth);
    }

    .team-card:hover .kapster-badge {
        opacity: 1;
        transform: translateX(0);
    }

    /* Experience Badge */
    .experience-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: rgba(0, 0, 0, 0.8);
        border: 1px solid var(--gold-color);
        color: var(--gold-color);
        padding: 8px 15px;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 1px;
        z-index: 2;
        opacity: 0;
        transform: translateX(-20px);
        transition: var(--transition-smooth);
    }

    .team-card:hover .experience-badge {
        opacity: 1;
        transform: translateX(0);
        transition-delay: 0.1s;
    }

    /* Team Card Content */
    .team-card h4 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        text-transform: uppercase;
        margin-bottom: 10px;
        letter-spacing: 2px;
        font-size: 1.8rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        transition: var(--transition-smooth);
    }

    .team-card:hover h4 {
        color: var(--gold-color);
        transform: translateY(-5px);
    }

    .team-card .specialty {
        color: #a0a0a0;
        font-size: 0.95rem;
        letter-spacing: 1px;
        margin-bottom: 20px;
        text-transform: uppercase;
        font-weight: 500;
    }

    /* Rating Stars */
    .rating-stars {
        color: var(--gold-color);
        font-size: 1.1rem;
        margin-bottom: 20px;
        opacity: 0;
        transform: scale(0.8);
        transition: var(--transition-smooth);
    }

    .team-card:hover .rating-stars {
        opacity: 1;
        transform: scale(1);
        transition-delay: 0.2s;
    }

    /* Social Icons */
    .team-social-icons {
        margin: 20px 0;
        opacity: 0;
        transform: translateY(10px);
        transition: var(--transition-smooth);
    }

    .team-card:hover .team-social-icons {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.3s;
    }

    .team-social-icons a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        color: var(--gold-color);
        border: 1px solid var(--gold-color);
        margin: 0 5px;
        font-size: 1rem;
        transition: var(--transition-smooth);
        background: transparent;
    }

    .team-social-icons a:hover {
        background: var(--gold-color);
        color: #000;
        transform: translateY(-3px) rotate(5deg);
    }

    /* Book Button */
    .btn-book-kapster {
        border: 2px solid var(--gold-color);
        color: var(--gold-color);
        background-color: transparent;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        padding: 0.75rem 2.5rem;
        transition: var(--transition-smooth);
        border-radius: 0;
        margin-top: 20px;
        opacity: 0;
        transform: translateY(20px);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .btn-book-kapster::before {
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

    .team-card:hover .btn-book-kapster {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.4s;
    }

    .btn-book-kapster:hover {
        color: var(--dark-bg);
    }

    .btn-book-kapster:hover::before {
        left: 0;
    }

    /* Stats Container */
    .kapster-stats {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 15px 0;
        opacity: 0;
        transform: translateY(10px);
        transition: var(--transition-smooth);
    }

    .team-card:hover .kapster-stats {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.25s;
    }

    .stat-item {
        text-align: center;
    }

    .stat-item .number {
        color: var(--gold-color);
        font-size: 1.5rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
    }

    .stat-item .label {
        color: #888;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 100px 20px;
        grid-column: 1 / -1;
    }

    .empty-state .icon {
        font-size: 6rem;
        margin-bottom: 30px;
        opacity: 0.3;
        animation: float 3s ease-in-out infinite;
    }

    .empty-state h3 {
        color: #fff;
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        margin-bottom: 15px;
    }

    .empty-state p {
        font-size: 1.1rem;
        color: #888;
        max-width: 500px;
        margin: 0 auto;
    }

    /* Info Banner */
    .info-banner {
        background: linear-gradient(135deg, #1a1a1a 0%, #0a0a0a 100%);
        border: 2px solid #222;
        border-radius: 10px;
        padding: 60px 40px;
        margin-top: 80px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .info-banner::before {
        content: '✂️';
        position: absolute;
        font-size: 15rem;
        opacity: 0.03;
        top: 50%;
        left: -5%;
        transform: translateY(-50%) rotate(-15deg);
    }

    .info-banner::after {
        content: '💈';
        position: absolute;
        font-size: 15rem;
        opacity: 0.03;
        top: 50%;
        right: -5%;
        transform: translateY(-50%) rotate(15deg);
    }

    .info-banner-content {
        position: relative;
        z-index: 1;
    }

    .info-banner h3 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    .info-banner p {
        color: #a0a0a0;
        font-size: 1.1rem;
        line-height: 1.8;
        max-width: 800px;
        margin: 0 auto;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .section-header .main-title {
            font-size: 3rem;
        }

        .team-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .team-card {
            height: 500px;
        }
    }

    @media (max-width: 768px) {
        .team-section {
            padding: 60px 0;
        }

        .section-header .main-title {
            font-size: 2.5rem;
        }

        .team-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .team-card {
            height: 550px;
        }

        .info-banner {
            padding: 40px 25px;
        }

        .info-banner h3 {
            font-size: 2rem;
        }
    }

    /* Smooth Scrolling */
    html {
        scroll-behavior: smooth;
    }
</style>

<div class="team-section">
    <div class="container">
        <!-- Header Section -->
        <div class="section-header scroll-reveal">
            <p class="sub-title">MEET THE FAMILY</p>
            <h1 class="main-title">OUR MASTER BARBERS</h1>
            <p class="section-description">
                Skilled professionals dedicated to the art of grooming. Each barber brings
                years of experience and a passion for their craft.
            </p>
        </div>

        <!-- Grid Kapster -->
        <div class="team-grid">
            <?php if (!empty($kapsters)): ?>
                <?php
                $hasActiveKapsters = false;
                foreach ($kapsters as $index => $kapster):
                    if ($kapster->status === 'aktif'):
                        $hasActiveKapsters = true;
                ?>
                        <div class="team-card scroll-reveal" style="transition-delay: <?= $index * 0.1 ?>s">
                            <div class="team-card-img-wrapper">
                                <img src="/uploads/kapsters/<?= esc($kapster->foto_profil) ?>"
                                    class="team-card-img"
                                    alt="<?= esc($kapster->nama) ?>"
                                    onerror="this.src='https://via.placeholder.com/400x550/1a1a1a/d4af37?text=<?= urlencode($kapster->nama) ?>'">
                            </div>

                            <div class="kapster-badge">Master Barber</div>
                            <div class="experience-badge">5+ Years</div>

                            <div class="team-card-overlay">
                                <h4><?= esc($kapster->nama) ?></h4>
                                <p class="specialty">Premium Grooming Specialist</p>

                                <div class="rating-stars">
                                    ★★★★★
                                </div>

                                <div class="kapster-stats">
                                    <div class="stat-item">
                                        <div class="number">500+</div>
                                        <div class="label">Clients</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="number">5</div>
                                        <div class="label">Years</div>
                                    </div>
                                </div>

                                <div class="team-social-icons">
                                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                                </div>

                                <a href="/booking/new?kapster_id=<?= $kapster->id ?>" class="btn btn-book-kapster">
                                    Book Appointment
                                </a>
                            </div>
                        </div>
                    <?php
                    endif;
                endforeach;

                if (!$hasActiveKapsters):
                    ?>
                    <div class="empty-state">
                        <div class="icon">👔</div>
                        <h3>Our Team is Growing</h3>
                        <p>We're currently updating our team roster. Check back soon to meet our talented barbers or contact us directly to book an appointment.</p>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="empty-state">
                    <div class="icon">✂️</div>
                    <h3>Coming Soon</h3>
                    <p>Our exceptional team of master barbers will be featured here soon. Stay tuned!</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Info Banner -->
        <div class="info-banner scroll-reveal">
            <div class="info-banner-content">
                <h3>Why Choose Our Barbers?</h3>
                <p>
                    Every member of our team is a certified professional with years of experience in
                    traditional and modern barbering techniques. We're committed to providing you with
                    the finest grooming experience, personalized service, and exceptional attention to detail.
                    Book with any of our master barbers and discover the difference that true expertise makes.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    // Scroll Reveal Animation
    function revealOnScroll() {
        const reveals = document.querySelectorAll('.scroll-reveal');

        reveals.forEach((element) => {
            const windowHeight = window.innerHeight;
            const elementTop = element.getBoundingClientRect().top;
            const revealPoint = 100;

            if (elementTop < windowHeight - revealPoint) {
                element.classList.add('revealed');
            }
        });
    }

    // Card 3D Tilt Effect
    function init3DTilt() {
        const cards = document.querySelectorAll('.team-card');

        cards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;

                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-15px)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });
    }

    // Lazy Loading Images
    function lazyLoadImages() {
        const images = document.querySelectorAll('.team-card-img');

        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.style.opacity = '0';
                    setTimeout(() => {
                        img.style.transition = 'opacity 0.5s ease-in-out';
                        img.style.opacity = '1';
                    }, 100);
                    imageObserver.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));
    }

    // Randomize Stats (for demo purposes)
    function randomizeStats() {
        const statNumbers = document.querySelectorAll('.stat-item .number');
        const clients = [350, 400, 450, 500, 550, 600];
        const years = [3, 4, 5, 6, 7, 8];

        statNumbers.forEach((stat, index) => {
            if (index % 2 === 0) {
                stat.textContent = clients[Math.floor(Math.random() * clients.length)] + '+';
            } else {
                stat.textContent = years[Math.floor(Math.random() * years.length)];
            }
        });
    }

    // Initialize all functions
    document.addEventListener('DOMContentLoaded', () => {
        revealOnScroll();
        init3DTilt();
        lazyLoadImages();
        randomizeStats();
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

    // Add stagger animation delay
    window.addEventListener('load', () => {
        const cards = document.querySelectorAll('.team-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
        });
    });
</script>

<?= $this->endSection() ?>