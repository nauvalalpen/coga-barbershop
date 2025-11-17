<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Contact Us
<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
CONTACT US
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
            <h1 class="hero-title">Contact Us</h1>
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

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-15px);
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

    /* Contact Section */
    .contact-section {
        padding: 100px 0;
        background: linear-gradient(180deg, var(--dark-bg) 0%, #050505 100%);
        position: relative;
        overflow: hidden;
    }

    .contact-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--gold-color), transparent);
    }

    /* Decorative Elements */
    .contact-section::after {
        content: '📞';
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

    /* Contact Info Section */
    .contact-info {
        padding: 50px 40px;
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        border: 2px solid #222;
        border-radius: 10px;
        position: relative;
        overflow: hidden;
        height: 100%;
    }

    .contact-info::before {
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

    .contact-info:hover::before {
        opacity: 0.3;
    }

    .contact-info>* {
        position: relative;
        z-index: 1;
    }

    .contact-info h2 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        font-size: 2.8rem;
        margin-bottom: 40px;
        font-weight: 700;
    }

    .contact-info h2::after {
        content: '';
        display: block;
        width: 80px;
        height: 3px;
        background: var(--gold-color);
        margin-top: 20px;
    }

    /* Info Item */
    .info-item {
        margin-bottom: 45px;
        padding: 30px;
        background: rgba(0, 0, 0, 0.3);
        border-left: 4px solid var(--gold-color);
        transition: var(--transition-smooth);
        position: relative;
    }

    .info-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 0;
        height: 100%;
        background: rgba(212, 175, 55, 0.1);
        transition: var(--transition-smooth);
    }

    .info-item:hover::before {
        width: 100%;
    }

    .info-item:hover {
        transform: translateX(10px);
        background: rgba(212, 175, 55, 0.05);
    }

    .info-item-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
    }

    .info-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--gold-color);
        color: #000;
        font-size: 1.5rem;
        border-radius: 50%;
        transition: var(--transition-smooth);
    }

    .info-item:hover .info-icon {
        animation: pulse 2s ease-in-out infinite;
    }

    .info-item h4 {
        color: var(--gold-color);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 1.1rem;
        letter-spacing: 2px;
        margin: 0;
    }

    .info-item p {
        color: #b0b0b0;
        line-height: 1.8;
        margin: 5px 0;
        font-size: 1rem;
        padding-left: 65px;
    }

    .info-item a {
        color: #b0b0b0;
        text-decoration: none;
        transition: var(--transition-smooth);
    }

    .info-item a:hover {
        color: var(--gold-color);
    }

    /* Social Links */
    .social-links {
        display: flex;
        gap: 15px;
        margin-top: 40px;
        padding-left: 30px;
    }

    .social-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        border: 2px solid var(--gold-color);
        color: var(--gold-color);
        font-size: 1.2rem;
        text-decoration: none;
        transition: var(--transition-smooth);
        position: relative;
        overflow: hidden;
    }

    .social-link::before {
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

    .social-link:hover::before {
        left: 0;
    }

    .social-link:hover {
        color: #000;
        transform: translateY(-5px) rotate(5deg);
    }

    /* Contact Form Wrapper */
    .contact-form-wrap {
        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        padding: 50px 40px;
        border: 2px solid #222;
        border-radius: 10px;
        position: relative;
        overflow: hidden;
    }

    .contact-form-wrap::before {
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

    .contact-form-wrap:hover::before {
        opacity: 0.3;
    }

    .contact-form-wrap>* {
        position: relative;
        z-index: 1;
    }

    .contact-form-wrap h2 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        font-size: 2.8rem;
        margin-bottom: 40px;
        font-weight: 700;
    }

    .contact-form-wrap h2::after {
        content: '';
        display: block;
        width: 80px;
        height: 3px;
        background: var(--gold-color);
        margin-top: 20px;
    }

    /* Form Styles */
    .form-label {
        color: #a0a0a0;
        text-transform: uppercase;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 1px;
        margin-bottom: 10px;
        display: block;
    }

    .form-control {
        background-color: rgba(255, 255, 255, 0.05);
        border: 2px solid #333;
        border-radius: 0;
        padding: 1rem 1.25rem;
        color: #fff;
        font-size: 1rem;
        transition: var(--transition-smooth);
    }

    .form-control:focus {
        background-color: rgba(255, 255, 255, 0.08);
        border-color: var(--gold-color);
        box-shadow: 0 0 20px rgba(212, 175, 55, 0.2);
        color: #fff;
        outline: none;
    }

    .form-control::placeholder {
        color: #666;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 150px;
    }

    /* Submit Button */
    .btn-submit {
        background: var(--gold-color);
        color: #000;
        border: 2px solid var(--gold-color);
        border-radius: 0;
        padding: 1rem 2.5rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        width: 100%;
        transition: var(--transition-smooth);
        position: relative;
        overflow: hidden;
        z-index: 1;
        margin-top: 20px;
    }

    .btn-submit::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: #000;
        transition: var(--transition-smooth);
        z-index: -1;
    }

    .btn-submit:hover::before {
        left: 0;
    }

    .btn-submit:hover {
        color: var(--gold-color);
        border-color: var(--gold-color);
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
    }

    /* Alert Messages */
    .alert {
        border-radius: 0;
        border: none;
        padding: 1.25rem 1.5rem;
        margin-bottom: 30px;
        animation: slideInRight 0.5s ease-out;
        position: relative;
        overflow: hidden;
    }

    .alert::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
    }

    .alert-success {
        background: rgba(40, 167, 69, 0.1);
        color: #28a745;
        border-left: 4px solid #28a745;
    }

    .alert-success::before {
        background: #28a745;
    }

    .alert-danger {
        background: rgba(220, 53, 69, 0.1);
        color: #dc3545;
        border-left: 4px solid #dc3545;
    }

    .alert-danger::before {
        background: #dc3545;
    }

    .alert p {
        margin: 0;
        padding: 5px 0;
    }

    /* Map Section */
    .map-section {
        margin-top: 100px;
        border: 3px solid #222;
        position: relative;
        overflow: hidden;
    }

    .map-section::before {
        content: '';
        position: absolute;
        inset: -3px;
        background: linear-gradient(135deg, var(--gold-color), transparent);
        opacity: 0;
        transition: var(--transition-smooth);
        z-index: 1;
        pointer-events: none;
    }

    .map-section:hover::before {
        opacity: 0.3;
    }

    .map-section iframe {
        width: 100%;
        height: 450px;
        display: block;
        filter: grayscale(100%) brightness(0.7);
        transition: var(--transition-smooth);
    }

    .map-section:hover iframe {
        filter: grayscale(0%) brightness(1);
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .section-header .main-title {
            font-size: 3rem;
        }

        .contact-info,
        .contact-form-wrap {
            padding: 40px 30px;
        }

        .contact-info h2,
        .contact-form-wrap h2 {
            font-size: 2.3rem;
        }

        .info-item p {
            padding-left: 0;
            margin-top: 10px;
        }
    }

    @media (max-width: 768px) {
        .contact-section {
            padding: 60px 0;
        }

        .section-header .main-title {
            font-size: 2.5rem;
        }

        .section-header {
            margin-bottom: 60px;
        }

        .contact-info,
        .contact-form-wrap {
            padding: 30px 20px;
            margin-bottom: 30px;
        }

        .contact-info h2,
        .contact-form-wrap h2 {
            font-size: 2rem;
        }

        .info-item {
            padding: 20px;
            margin-bottom: 30px;
        }

        .info-item-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .social-links {
            padding-left: 0;
        }

        .map-section {
            margin-top: 60px;
        }

        .map-section iframe {
            height: 350px;
        }
    }

    /* Smooth Scrolling */
    html {
        scroll-behavior: smooth;
    }
</style>

<div class="contact-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header scroll-reveal">
            <p class="sub-title">GET IN TOUCH</p>
        </div>

        <div class="row g-5">
            <!-- Contact Information Column -->
            <div class="col-lg-6">
                <div class="contact-info scroll-reveal">
                    <h2>Visit Our Shop</h2>

                    <div class="info-item">
                        <div class="info-item-header">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h4>Address</h4>
                        </div>
                        <p>Jln Dr M. Hatta 1D, RT IV No.01, Kota Padang</p>
                        <p>Sumatera Barat 25127</p>
                    </div>

                    <div class="info-item">
                        <div class="info-item-header">
                            <div class="info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h4>Email</h4>
                        </div>
                        <p><a href="mailto:cogabarbershop@gmail.com">cogabarbershop@gmail.com</a></p>
                        <p><a href="mailto:contact@cogabarbershop.com">contact@cogabarbershop.com</a></p>
                    </div>

                    <div class="info-item">
                        <div class="info-item-header">
                            <div class="info-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <h4>Phone</h4>
                        </div>
                        <p><a href="tel:+1234567890">+1 (234) 567-890</a></p>
                        <p><a href="tel:+1234567891">+1 (234) 567-891</a></p>
                    </div>

                    <div class="info-item">
                        <div class="info-item-header">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h4>Working Hours</h4>
                        </div>
                        <p>Monday - Saturday: 11:00 AM - 10:00 PM</p>
                        <p>Sunday: 10:00 AM - 11:00 PM</p>
                    </div>

                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form Column -->
            <div class="col-lg-6">
                <div class="contact-form-wrap scroll-reveal">
                    <h2>Send Message</h2>

                    <!-- Display Feedback Messages -->
                    <?php if (session()->get('success')): ?>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            <?= session()->get('success') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->get('error')): ?>
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <?= session()->get('error') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->get('errors')): ?>
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <?php foreach (session()->get('errors') as $error) : ?>
                                <p class="mb-1"><?= esc($error) ?></p>
                            <?php endforeach ?>
                        </div>
                    <?php endif; ?>

                    <form action="/contact/send" method="post">
                        <?= csrf_field() ?>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="name" class="form-label">Your Name *</label>
                                <input type="text"
                                    class="form-control"
                                    name="name"
                                    id="name"
                                    value="<?= old('name') ?>"
                                    placeholder="John Doe"
                                    required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="email" class="form-label">Your Email *</label>
                                <input type="email"
                                    class="form-control"
                                    name="email"
                                    id="email"
                                    value="<?= old('email') ?>"
                                    placeholder="john@example.com"
                                    required>
                            </div>

                            <div class="col-12 mb-4">
                                <label for="subject" class="form-label">Subject *</label>
                                <input type="text"
                                    class="form-control"
                                    name="subject"
                                    id="subject"
                                    value="<?= old('subject') ?>"
                                    placeholder="How can we help you?"
                                    required>
                            </div>

                            <div class="col-12 mb-4">
                                <label for="message" class="form-label">Your Message *</label>
                                <textarea name="message"
                                    id="message"
                                    class="form-control"
                                    rows="6"
                                    placeholder="Tell us more about your inquiry..."
                                    required><?= old('message') ?></textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-submit">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-section scroll-reveal">
            <iframe
                src="https://maps.google.com/maps?width=600&height=400&hl=en&q=Coga%20Barbershop&t=p&z=15&ie=UTF8&iwloc=B&output=embed"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scroll Reveal Animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        // Observe all scroll reveal elements
        const reveals = document.querySelectorAll('.scroll-reveal');
        reveals.forEach((element, index) => {
            element.style.transitionDelay = `${index * 0.15}s`;
            observer.observe(element);
        });

        // Form validation and animation
        const form = document.querySelector('form');
        const inputs = form.querySelectorAll('.form-control');

        inputs.forEach(input => {
            // Add floating label effect
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                if (this.value === '') {
                    this.parentElement.classList.remove('focused');
                }
            });

            // Check if field has value on load
            if (input.value !== '') {
                input.parentElement.classList.add('focused');
            }
        });

        // Submit button animation
        const submitBtn = document.querySelector('.btn-submit');
        form.addEventListener('submit', function(e) {
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Sending...';
            submitBtn.disabled = true;
        });

        // Auto-hide alerts after 5 seconds
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                alert.style.transform = 'translateX(100px)';
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 400);
            }, 5000);
        });

        // Social link click animation
        const socialLinks = document.querySelectorAll('.social-link');
        socialLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                this.style.transform = 'scale(0.9)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 200);
            });
        });

        // Parallax effect for decorative elements
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    const scrolled = window.pageYOffset;
                    const contactSection = document.querySelector('.contact-section');
                    if (contactSection) {
                        const afterElement = window.getComputedStyle(contactSection, '::after');
                        contactSection.style.setProperty('--scroll-y', `${scrolled * 0.3}px`);
                    }
                    ticking = false;
                });
                ticking = true;
            }
        });
    });
</script>

<?= $this->endSection() ?>