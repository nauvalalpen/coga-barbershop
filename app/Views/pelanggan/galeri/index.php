<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Gallery
<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
OUR GALLERY
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
            <h1 class="hero-title">GALLERY</h1>
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

    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }

        100% {
            background-position: 1000px 0;
        }
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
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

    /* Gallery Section */
    .gallery-section {
        padding: 100px 0;
        background: linear-gradient(180deg, var(--dark-bg) 0%, #050505 100%);
        position: relative;
        overflow: hidden;
    }

    .gallery-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--gold-color), transparent);
    }

    /* Decorative Background Elements */
    .gallery-section::after {
        content: '📸';
        position: absolute;
        font-size: 20rem;
        opacity: 0.02;
        top: 20%;
        right: -5%;
        transform: rotate(15deg);
        pointer-events: none;
        animation: float 8s ease-in-out infinite;
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

    /* Gallery Grid */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 35px;
        margin-top: 50px;
    }

    /* Gallery Card */
    .gallery-card {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        text-decoration: none;
        display: block;
        position: relative;
        overflow: hidden;
        border: 2px solid #222;
        transform: translateY(30px);
        opacity: 0;
        transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        height: 450px;
    }

    .gallery-card::before {
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

    .gallery-card.is-visible {
        transform: translateY(0);
        opacity: 1;
    }

    .gallery-card:hover::before {
        opacity: 1;
    }

    .gallery-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 50px rgba(212, 175, 55, 0.3);
    }

    /* Image Wrapper */
    .gallery-img-wrapper {
        height: 100%;
        overflow: hidden;
        position: relative;
    }

    .gallery-img-wrapper::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.3) 50%, transparent 100%);
        z-index: 1;
        transition: var(--transition-smooth);
    }

    .gallery-card:hover .gallery-img-wrapper::before {
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 20%, rgba(0, 0, 0, 0.5) 60%, transparent 100%);
    }

    /* Shimmer Effect */
    .gallery-img-wrapper::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 50%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        z-index: 2;
        transition: var(--transition-smooth);
    }

    .gallery-card:hover .gallery-img-wrapper::after {
        animation: shimmer 1.5s ease-in-out;
    }

    /* Gallery Image */
    .gallery-card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
        filter: grayscale(50%) brightness(0.8);
    }

    .gallery-card:hover .gallery-card-img {
        transform: scale(1.15);
        filter: grayscale(0%) brightness(1);
    }

    /* Card Content */
    .gallery-card .card-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 35px 30px;
        z-index: 2;
        color: #fff;
    }

    /* Category Badge */
    .category-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: var(--gold-color);
        color: #000;
        padding: 6px 15px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        z-index: 3;
        opacity: 0;
        transform: translateX(-20px);
        transition: var(--transition-smooth);
    }

    .gallery-card:hover .category-badge {
        opacity: 1;
        transform: translateX(0);
    }

    /* Date Badge */
    .date-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(0, 0, 0, 0.8);
        border: 1px solid var(--gold-color);
        color: var(--gold-color);
        padding: 8px 12px;
        font-size: 0.75rem;
        font-weight: 600;
        z-index: 3;
        opacity: 0;
        transform: translateX(20px);
        transition: var(--transition-smooth);
        text-align: center;
        line-height: 1.2;
    }

    .gallery-card:hover .date-badge {
        opacity: 1;
        transform: translateX(0);
        transition-delay: 0.1s;
    }

    .date-badge .day {
        display: block;
        font-size: 1.2rem;
        font-weight: 700;
    }

    /* Card Title */
    .card-content .card-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        margin-bottom: 12px;
        font-weight: 700;
        line-height: 1.3;
        transform: translateY(10px);
        transition: var(--transition-smooth);
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .gallery-card:hover .card-title {
        color: var(--gold-color);
        transform: translateY(0);
    }

    /* Card Excerpt */
    .card-content .card-excerpt {
        color: #b0b0b0;
        font-size: 0.95rem;
        line-height: 1.7;
        opacity: 0;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease, opacity 0.5s ease, margin-top 0.5s ease;
    }

    .gallery-card:hover .card-excerpt {
        opacity: 1;
        max-height: 150px;
        margin-top: 12px;
    }

    /* View Count */
    .view-count {
        position: absolute;
        bottom: 30px;
        left: 30px;
        color: var(--gold-color);
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 8px;
        opacity: 0;
        transform: translateY(10px);
        transition: var(--transition-smooth);
        z-index: 3;
    }

    .gallery-card:hover .view-count {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.2s;
    }

    /* Read More Arrow */
    .read-more-arrow {
        position: absolute;
        bottom: 30px;
        right: 30px;
        color: var(--gold-color);
        font-size: 1.8rem;
        transform: translateX(-20px);
        opacity: 0;
        transition: var(--transition-smooth);
        z-index: 3;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        border: 2px solid var(--gold-color);
        border-radius: 50%;
    }

    .gallery-card:hover .read-more-arrow {
        transform: translateX(0);
        opacity: 1;
        transition-delay: 0.3s;
        background: var(--gold-color);
        color: #000;
    }

    .read-more-arrow i {
        transition: var(--transition-smooth);
    }

    .gallery-card:hover .read-more-arrow i {
        transform: translateX(3px);
    }

    /* Empty State */
    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 100px 20px;
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
        font-size: 2.5rem;
        margin-bottom: 15px;
    }

    .empty-state p {
        font-size: 1.1rem;
        color: #888;
        max-width: 500px;
        margin: 0 auto;
    }

    /* Pagination */
    .pagination-wrapper {
        margin-top: 80px;
        display: flex;
        justify-content: center;
    }

    .pagination {
        display: flex;
        gap: 10px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination li {
        display: inline-block;
    }

    .pagination a,
    .pagination span {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 45px;
        height: 45px;
        padding: 0 15px;
        border: 2px solid #333;
        color: #fff;
        text-decoration: none;
        transition: var(--transition-smooth);
        font-weight: 600;
    }

    .pagination a:hover {
        border-color: var(--gold-color);
        color: var(--gold-color);
        transform: translateY(-3px);
    }

    .pagination .active span {
        background: var(--gold-color);
        border-color: var(--gold-color);
        color: #000;
    }

    .pagination .disabled span {
        opacity: 0.3;
        cursor: not-allowed;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .section-header .main-title {
            font-size: 3rem;
        }

        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .gallery-card {
            height: 400px;
        }
    }

    @media (max-width: 768px) {
        .gallery-section {
            padding: 60px 0;
        }

        .section-header .main-title {
            font-size: 2.5rem;
        }

        .gallery-grid {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .gallery-card {
            height: 450px;
        }

        .card-content .card-title {
            font-size: 1.5rem;
        }
    }

    /* Smooth Scrolling */
    html {
        scroll-behavior: smooth;
    }
</style>

<div class="gallery-section">
    <div class="container">
        <!-- Header Section -->
        <div class="section-header scroll-reveal">
            <p class="sub-title">INSPIRATION & STORIES</p>
            <h1 class="main-title">OUR GALLERY</h1>
            <p class="section-description">
                Explore our collection of latest styles, transformations, and barbering artistry.
                Each image tells a story of craftsmanship and dedication.
            </p>
        </div>

        <!-- Grid Galeri -->
        <div class="gallery-grid">
            <?php if (!empty($galeri)): ?>
                <?php foreach ($galeri as $item): ?>
                    <a href="/galeri/<?= $item->id ?>" class="gallery-card">
                        <div class="category-badge">Featured</div>
                        <div class="date-badge">
                            <span class="day"><?= date('d', strtotime($item->created_at)) ?></span>
                            <span class="month"><?= date('M', strtotime($item->created_at)) ?></span>
                        </div>

                        <div class="gallery-img-wrapper">
                            <img src="/uploads/galeri/<?= esc($item->url_gambar) ?>"
                                class="gallery-card-img"
                                alt="<?= esc($item->judul) ?>"
                                loading="lazy"
                                onerror="this.src='https://via.placeholder.com/400x450/1a1a1a/d4af37?text=<?= urlencode($item->judul) ?>'">
                        </div>

                        <div class="card-content">
                            <h5 class="card-title"><?= esc($item->judul) ?></h5>
                            <p class="card-excerpt">
                                <?php
                                $deskripsi = esc($item->deskripsi);
                                echo strlen($deskripsi) > 120 ? substr($deskripsi, 0, 120) . '...' : $deskripsi;
                                ?>
                            </p>
                        </div>

                        <div class="view-count">
                            <i class="fas fa-eye"></i>
                            <span><?= rand(50, 500) ?> views</span>
                        </div>

                        <div class="read-more-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty-state">
                    <div class="icon">📸</div>
                    <h3>Coming Soon</h3>
                    <p>Our gallery is being curated with stunning transformations and styles. Check back soon for inspiration!</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if (!empty($galeri)): ?>
            <div class="pagination-wrapper">
                <nav>
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <span class="page-link">«</span>
                        </li>
                        <li class="page-item active">
                            <span class="page-link">1</span>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">»</a>
                        </li>
                    </ul>
                </nav>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Staggered Scroll Reveal Animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        const cards = document.querySelectorAll('.gallery-card');
        cards.forEach((card, index) => {
            card.style.transitionDelay = `${index * 100}ms`;
            observer.observe(card);
        });

        // Header reveal
        const header = document.querySelector('.section-header');
        if (header) {
            observer.observe(header);
        }

        // Parallax effect on scroll
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    const scrolled = window.pageYOffset;
                    const gallerySection = document.querySelector('.gallery-section');
                    if (gallerySection) {
                        const afterElement = window.getComputedStyle(gallerySection, '::after');
                        // Subtle parallax movement
                        gallerySection.style.setProperty('--scroll-y', `${scrolled * 0.3}px`);
                    }
                    ticking = false;
                });
                ticking = true;
            }
        });

        // Add loading animation to images
        const images = document.querySelectorAll('.gallery-card-img');
        images.forEach(img => {
            img.addEventListener('load', function() {
                this.style.opacity = '0';
                setTimeout(() => {
                    this.style.transition = 'opacity 0.5s ease-in-out';
                    this.style.opacity = '1';
                }, 100);
            });
        });
    });
</script>

<?= $this->endSection() ?>