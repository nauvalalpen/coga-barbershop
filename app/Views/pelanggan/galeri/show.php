<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
<?= esc($item->judul) ?>
<?= $this->endSection() ?>

<!-- We override the default hero section from the layout with an empty one -->
<?= $this->section('main_hero') ?>
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

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.95);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Article Hero Section */
    .article-hero {
        height: 80vh;
        min-height: 600px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        overflow: hidden;
    }

    .article-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.7), rgba(10, 10, 10, 0.5));
        z-index: 1;
    }

    .article-hero-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        filter: brightness(0.5) grayscale(30%);
        z-index: 0;
        animation: scaleIn 1.5s ease-out;
    }

    .article-hero-overlay {
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 30% 50%, rgba(212, 175, 55, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 70% 50%, rgba(212, 175, 55, 0.1) 0%, transparent 50%);
        z-index: 1;
    }

    .article-hero-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        padding: 0 30px;
        animation: fadeInUp 1s ease-out 0.3s backwards;
    }

    /* Category Badge */
    .article-category {
        display: inline-block;
        background: var(--gold-color);
        color: #000;
        padding: 8px 25px;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 25px;
        animation: slideDown 1s ease-out 0.5s backwards;
    }

    .article-hero-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.5rem, 6vw, 5.5rem);
        line-height: 1.1;
        margin-bottom: 30px;
        font-weight: 700;
        text-shadow: 3px 3px 15px rgba(0, 0, 0, 0.8);
        animation: fadeInUp 1s ease-out 0.6s backwards;
    }

    .article-hero-meta {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 30px;
        color: #b0b0b0;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 500;
        animation: fadeInUp 1s ease-out 0.8s backwards;
        flex-wrap: wrap;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .meta-item i {
        color: var(--gold-color);
        font-size: 1.1rem;
    }

    .meta-divider {
        width: 2px;
        height: 15px;
        background: var(--gold-color);
        opacity: 0.5;
    }

    /* Scroll Indicator */
    .scroll-indicator {
        position: absolute;
        bottom: 40px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 3;
        animation: fadeIn 2s ease-out 1.5s backwards;
    }

    .scroll-indicator .mouse {
        width: 30px;
        height: 50px;
        border: 2px solid var(--gold-color);
        border-radius: 15px;
        position: relative;
        opacity: 0.7;
    }

    .scroll-indicator .wheel {
        width: 4px;
        height: 10px;
        background: var(--gold-color);
        border-radius: 2px;
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        animation: scroll 2s infinite;
    }

    @keyframes scroll {
        0% {
            opacity: 1;
            top: 10px;
        }

        100% {
            opacity: 0;
            top: 30px;
        }
    }

    /* Article Body */
    .article-body {
        padding: 120px 0;
        background: linear-gradient(180deg, var(--dark-bg) 0%, #050505 100%);
        position: relative;
    }

    .article-body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--gold-color), transparent);
    }

    /* Decorative Quote Marks */
    .article-body::after {
        content: '"';
        position: absolute;
        font-size: 25rem;
        font-family: 'Playfair Display', serif;
        color: var(--gold-color);
        opacity: 0.02;
        top: 10%;
        right: 5%;
        line-height: 1;
        pointer-events: none;
    }

    /* Article Container */
    .article-container {
        max-width: 850px;
        margin: 0 auto;
    }

    /* Featured Image */
    .article-featured-img {
        width: 100%;
        max-width: 100%;
        border: 3px solid #222;
        margin-bottom: 60px;
        position: relative;
        overflow: hidden;
    }

    .article-featured-img::before {
        content: '';
        position: absolute;
        inset: -3px;
        background: linear-gradient(135deg, var(--gold-color), transparent);
        opacity: 0;
        transition: var(--transition-smooth);
    }

    .article-featured-img:hover::before {
        opacity: 1;
    }

    .article-featured-img img {
        width: 100%;
        height: auto;
        display: block;
        transition: var(--transition-smooth);
    }

    .article-featured-img:hover img {
        transform: scale(1.05);
    }

    /* Article Content */
    .article-content {
        color: #c0c0c0;
        line-height: 1.9;
        font-size: 1.15rem;
        position: relative;
    }

    .article-content::before {
        content: '';
        position: absolute;
        left: -40px;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(to bottom, var(--gold-color), transparent);
    }

    .article-content p {
        margin-bottom: 2rem;
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.8s ease, transform 0.8s ease;
        text-align: justify;
    }

    .article-content p.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* First Letter Drop Cap */
    .article-content p:first-of-type::first-letter {
        font-size: 5rem;
        font-weight: 700;
        color: var(--gold-color);
        float: left;
        line-height: 0.85;
        margin: 8px 15px 0 0;
        font-family: 'Playfair Display', serif;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    /* Pull Quote */
    .pull-quote {
        border-left: 4px solid var(--gold-color);
        padding: 30px 40px;
        margin: 50px 0;
        background: rgba(212, 175, 55, 0.05);
        font-style: italic;
        font-size: 1.3rem;
        color: #fff;
        font-family: 'Playfair Display', serif;
        position: relative;
    }

    .pull-quote::before {
        content: '"';
        position: absolute;
        top: -20px;
        left: 20px;
        font-size: 5rem;
        color: var(--gold-color);
        opacity: 0.3;
        font-family: 'Playfair Display', serif;
    }

    /* Article Stats */
    .article-stats {
        display: flex;
        justify-content: center;
        gap: 40px;
        margin: 60px 0;
        padding: 40px;
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 2px solid #222;
        border-radius: 10px;
    }

    .stat-item {
        text-align: center;
    }

    .stat-item .icon {
        font-size: 2rem;
        color: var(--gold-color);
        margin-bottom: 10px;
    }

    .stat-item .number {
        font-size: 2rem;
        font-weight: 700;
        color: var(--gold-color);
        font-family: 'Playfair Display', serif;
        margin-bottom: 5px;
    }

    .stat-item .label {
        color: #888;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Share Section */
    .share-section {
        margin: 60px 0;
        padding: 40px;
        background: rgba(212, 175, 55, 0.05);
        border: 2px solid #222;
        text-align: center;
        border-radius: 10px;
    }

    .share-section h4 {
        color: #fff;
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        margin-bottom: 25px;
    }

    .share-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .share-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        border: 2px solid var(--gold-color);
        color: var(--gold-color);
        text-decoration: none;
        transition: var(--transition-smooth);
        font-size: 1.2rem;
    }

    .share-btn:hover {
        background: var(--gold-color);
        color: #000;
        transform: translateY(-5px) rotate(5deg);
    }

    /* Back Link */
    .back-link-wrapper {
        text-align: center;
        margin-top: 80px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        border: 2px solid var(--gold-color);
        color: var(--gold-color);
        padding: 1rem 3rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 700;
        text-decoration: none;
        transition: var(--transition-smooth);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .back-link::before {
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

    .back-link:hover::before {
        left: 0;
    }

    .back-link:hover {
        color: #000;
        transform: scale(1.05);
    }

    .back-link i {
        transition: var(--transition-smooth);
    }

    .back-link:hover i {
        transform: translateX(-5px);
    }

    /* Tags */
    .article-tags {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin: 50px 0;
        padding: 30px;
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 2px solid #222;
        border-radius: 10px;
    }

    .tag-label {
        color: var(--gold-color);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
    }

    .tag {
        padding: 8px 20px;
        background: transparent;
        border: 1px solid #444;
        color: #b0b0b0;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: var(--transition-smooth);
    }

    .tag:hover {
        border-color: var(--gold-color);
        color: var(--gold-color);
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .article-hero {
            height: 70vh;
            min-height: 500px;
        }

        .article-hero-title {
            font-size: clamp(2rem, 5vw, 4rem);
        }

        .article-body {
            padding: 80px 0;
        }

        .article-content::before {
            display: none;
        }

        .article-stats {
            gap: 25px;
            padding: 30px 20px;
        }
    }

    @media (max-width: 768px) {
        .article-hero {
            height: 60vh;
            min-height: 450px;
        }

        .article-hero-meta {
            flex-direction: column;
            gap: 15px;
        }

        .meta-divider {
            display: none;
        }

        .article-body {
            padding: 60px 0;
        }

        .article-content {
            font-size: 1.05rem;
        }

        .article-content p:first-of-type::first-letter {
            font-size: 3.5rem;
            margin: 5px 10px 0 0;
        }

        .pull-quote {
            padding: 20px 25px;
            font-size: 1.1rem;
        }

        .article-stats {
            flex-direction: column;
            gap: 20px;
        }

        .share-section {
            padding: 30px 20px;
        }

        .back-link {
            padding: 0.85rem 2rem;
        }
    }

    /* Smooth Scrolling */
    html {
        scroll-behavior: smooth;
    }
</style>

<!-- Hero Section -->
<div class="article-hero">
    <div class="article-hero-bg"
        style="background-image: url('/uploads/galeri/<?= esc($item->url_gambar) ?>');"
        onError="this.style.backgroundImage='url(https://via.placeholder.com/1920x1080/1a1a1a/d4af37?text=Gallery+Image)';">
    </div>
    <div class="article-hero-overlay"></div>

    <div class="article-hero-content">
        <div class="article-category">Gallery Feature</div>
        <h1 class="article-hero-title"><?= esc($item->judul) ?></h1>
        <div class="article-hero-meta">
            <div class="meta-item">
                <i class="fas fa-calendar-alt"></i>
                <span><?= date('F d, Y', strtotime($item->created_at)) ?></span>
            </div>
            <div class="meta-divider"></div>
            <div class="meta-item">
                <i class="fas fa-eye"></i>
                <span><?= rand(150, 800) ?> Views</span>
            </div>
            <div class="meta-divider"></div>
            <div class="meta-item">
                <i class="fas fa-clock"></i>
                <span>5 min read</span>
            </div>
        </div>
    </div>

    <div class="scroll-indicator">
        <div class="mouse">
            <div class="wheel"></div>
        </div>
    </div>
</div>

<!-- Article Body -->
<div class="article-body">
    <div class="container">
        <div class="article-container">

            <!-- Featured Image (Optional - if you want to show image again) -->
            <!-- <div class="article-featured-img">
                <img src="/uploads/galeri/<?= esc($item->url_gambar) ?>" alt="<?= esc($item->judul) ?>">
            </div> -->

            <!-- Article Stats -->
            <div class="article-stats">
                <div class="stat-item">
                    <div class="icon">❤️</div>
                    <div class="number"><?= rand(50, 200) ?></div>
                    <div class="label">Likes</div>
                </div>
                <div class="stat-item">
                    <div class="icon">💬</div>
                    <div class="number"><?= rand(10, 50) ?></div>
                    <div class="label">Comments</div>
                </div>
                <div class="stat-item">
                    <div class="icon">🔖</div>
                    <div class="number"><?= rand(20, 100) ?></div>
                    <div class="label">Saves</div>
                </div>
            </div>

            <!-- Article Content -->
            <div class="article-content">
                <p><?= nl2br(esc($item->deskripsi)) ?></p>

                <!-- Optional Pull Quote -->
                <?php if (strlen($item->deskripsi) > 200): ?>
                    <div class="pull-quote">
                        "Every haircut is a work of art, every style tells a story, and every client leaves with confidence."
                    </div>
                <?php endif; ?>
            </div>

            <!-- Tags -->
            <div class="article-tags">
                <span class="tag-label">Tags:</span>
                <span class="tag">Barbering</span>
                <span class="tag">Style</span>
                <span class="tag">Grooming</span>
                <span class="tag">Trends</span>
            </div>

            <!-- Share Section -->
            <div class="share-section">
                <h4>Share This Gallery</h4>
                <div class="share-buttons">
                    <a href="#" class="share-btn" aria-label="Share on Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="share-btn" aria-label="Share on Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="share-btn" aria-label="Share on Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="share-btn" aria-label="Share on WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="#" class="share-btn" aria-label="Share on LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Back Link -->
            <div class="back-link-wrapper">
                <a href="/galeri" class="back-link">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Gallery</span>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Paragraph reveal animation on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.3,
            rootMargin: '0px 0px -50px 0px'
        });

        // Observe all paragraphs
        const paragraphs = document.querySelectorAll('.article-content p');
        paragraphs.forEach((p, index) => {
            p.style.transitionDelay = `${index * 150}ms`;
            observer.observe(p);
        });

        // Parallax effect for hero background
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    const scrolled = window.pageYOffset;
                    const hero = document.querySelector('.article-hero-bg');
                    if (hero && scrolled < window.innerHeight) {
                        hero.style.transform = `translateY(${scrolled * 0.5}px)`;
                    }
                    ticking = false;
                });
                ticking = true;
            }
        });

        // Hide scroll indicator after scrolling
        window.addEventListener('scroll', function() {
            const scrollIndicator = document.querySelector('.scroll-indicator');
            if (scrollIndicator) {
                if (window.pageYOffset > 100) {
                    scrollIndicator.style.opacity = '0';
                } else {
                    scrollIndicator.style.opacity = '1';
                }
            }
        });

        // Animate stats on view
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const numbers = entry.target.querySelectorAll('.number');
                    numbers.forEach(num => {
                        const target = parseInt(num.textContent);
                        animateNumber(num, 0, target, 2000);
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        const statsSection = document.querySelector('.article-stats');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }

        // Number animation function
        function animateNumber(element, start, end, duration) {
            const range = end - start;
            const increment = range / (duration / 16);
            let current = start;

            const timer = setInterval(() => {
                current += increment;
                if (current >= end) {
                    element.textContent = end;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current);
                }
            }, 16);
        }

        // Share button functionality
        const shareButtons = document.querySelectorAll('.share-btn');
        shareButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                // Add your share functionality here
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 200);
            });
        });
    });
</script>

<?= $this->endSection() ?>