<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Coga Barbershop</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        :root {
            --gold-color: #c59d5f;
            --dark-bg: #000000;
            --light-dark-bg: #111111;
            --border-color: #333;
            --transition-smooth: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--dark-bg);
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
            overflow-x: hidden;
        }

        /* --- Animations --- */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
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

        /* --- Navigation Bar --- */
        .navbar {
            background-color: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            transition: all 0.3s ease;
            font-family: 'Roboto', sans-serif;
        }

        .navbar.scrolled {
            background-color: rgba(0, 0, 0, 0.95);
            padding: 0.75rem 0;
            box-shadow: 0 2px 20px rgba(197, 157, 95, 0.1);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--gold-color) !important;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .navbar .nav-link {
            color: #ffffff;
            text-transform: uppercase;
            font-weight: 400;
            letter-spacing: 1px;
            font-size: 0.9rem;
            margin: 0 0.5rem;
            padding: 0.5rem 1rem;
            position: relative;
            transition: color 0.3s;
        }

        .navbar .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background-color: var(--gold-color);
            transition: width 0.3s ease;
        }

        .navbar .nav-link:hover::after,
        .navbar .nav-link.active::after {
            width: 80%;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: var(--gold-color);
        }

        .btn-book {
            border: 2px solid var(--gold-color);
            color: var(--gold-color);
            background-color: transparent;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
            border-radius: 0;
        }

        .btn-book:hover {
            background-color: var(--gold-color);
            color: var(--dark-bg);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(197, 157, 95, 0.3);
        }

        /* Dropdown Menu Styling */
        .dropdown-menu {
            background-color: var(--light-dark-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.5rem 0;
            margin-top: 0.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
        }

        .dropdown-item {
            color: #ffffff;
            padding: 0.75rem 1.5rem;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: var(--gold-color);
            color: var(--dark-bg);
        }

        .dropdown-divider {
            border-color: var(--border-color);
        }

        .dropdown-toggle::after {
            margin-left: 0.5rem;
        }

        /* --- Hero Section --- */
        .hero-section {
            padding: 140px 0 100px 0;
            min-height: 50vh;
            background-color: var(--dark-bg);
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.85)),
                url('https://images.unsplash.com/photo-1599305445671-ac291c95aaa9?q=80&w=2069&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at center, transparent 0%, rgba(0, 0, 0, 0.5) 100%);
            pointer-events: none;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold-color), transparent);
            opacity: 0.6;
        }

        .hero-content {
            animation: fadeInUp 1s ease-out forwards;
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            color: #ffffff;
            text-transform: uppercase;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
            margin: 20px 0;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .hero-subtitle {
            color: #c0c0c0;
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
            font-weight: 300;
        }

        /* Breadcrumbs styling */
        .breadcrumb {
            justify-content: center;
            margin-bottom: 1.5rem;
            background: transparent;
            padding: 0;
        }

        .breadcrumb-item {
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1.5px;
        }

        .breadcrumb-item a {
            color: #a0a0a0;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: var(--gold-color);
        }

        .breadcrumb-item.active {
            color: #ffffff;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: var(--gold-color);
            content: "›";
            padding: 0 0.5rem;
        }

        /* --- Main Content Area --- */
        main {
            min-height: 50vh;
            padding: 3rem 0;
        }

        /* --- Footer --- */
        .footer {
            background-color: #ffffff;
            padding: 80px 0 40px 0;
            color: #555;
            margin-top: 4rem;
        }

        .footer h4 {
            color: #000;
            font-family: 'Playfair Display', serif;
            margin-bottom: 25px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .footer .footer-intro p {
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .footer .footer-contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .footer .footer-contact-item .icon {
            font-size: 1.2rem;
            color: var(--gold-color);
            margin-right: 15px;
            margin-top: 5px;
            min-width: 25px;
        }

        .footer .footer-contact-item h5 {
            color: #000;
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .footer .footer-contact-item p {
            margin: 0;
            line-height: 1.6;
        }

        .footer .copyright {
            text-align: center;
            padding-top: 30px;
            margin-top: 40px;
            border-top: 1px solid #ddd;
            font-size: 0.9rem;
            color: #888;
        }

        /* --- Chatbot Styles --- */
        .chatbot-toggler {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: var(--gold-color);
            color: #000;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            cursor: pointer;
            z-index: 999;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(197, 157, 95, 0.3);
        }

        .chatbot-toggler:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(197, 157, 95, 0.5);
        }

        .chatbot-window {
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 420px;
            max-width: calc(100vw - 60px);
            height: 600px;
            max-height: calc(100vh - 150px);
            background: var(--light-dark-bg);
            border: 1px solid var(--border-color);
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            z-index: 1000;
            transform: scale(0);
            opacity: 0;
            pointer-events: none;
            transform-origin: bottom right;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            display: flex;
            flex-direction: column;
        }

        .chatbot-window.show {
            transform: scale(1);
            opacity: 1;
            pointer-events: auto;
        }

        .chatbot-header {
            background: linear-gradient(135deg, var(--gold-color), #d4a574);
            padding: 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .chatbot-header h5 {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.25rem;
            flex-grow: 1;
            text-align: center;
        }

        .chatbot-close-btn {
            background: rgba(0, 0, 0, 0.1);
            border: none;
            color: #000;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s ease;
        }

        .chatbot-close-btn:hover {
            background: rgba(0, 0, 0, 0.2);
            transform: rotate(90deg);
        }

        .chat-area {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            background: var(--dark-bg);
        }

        .chat-area::-webkit-scrollbar {
            width: 6px;
        }

        .chat-area::-webkit-scrollbar-track {
            background: var(--light-dark-bg);
        }

        .chat-area::-webkit-scrollbar-thumb {
            background: var(--gold-color);
            border-radius: 3px;
        }

        .chat-message {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            animation: fadeIn 0.3s ease;
        }

        .chat-message.outgoing {
            justify-content: flex-end;
        }

        .chat-message .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--gold-color);
            color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
            font-size: 0.9rem;
        }

        .chat-message.incoming .avatar {
            background: #2a2a2a;
            color: var(--gold-color);
            border: 2px solid var(--gold-color);
        }

        .chat-message p,
        .chat-message>div:not(.avatar) {
            background: #2a2a2a;
            color: #fff;
            padding: 12px 16px;
            border-radius: 15px;
            margin: 0;
            max-width: 75%;
            word-break: break-word;
            overflow-wrap: break-word;
            line-height: 1.6;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .chat-message.outgoing p,
        .chat-message.outgoing>div:not(.avatar) {
            background: var(--gold-color);
            color: #000;
            border-top-right-radius: 4px;
        }

        .chat-message.incoming p,
        .chat-message.incoming>div:not(.avatar) {
            border-top-left-radius: 4px;
        }

        .chat-input {
            display: flex;
            gap: 10px;
            padding: 15px 20px;
            border-top: 1px solid var(--border-color);
            background: var(--light-dark-bg);
        }

        .chat-input textarea {
            flex-grow: 1;
            background: var(--dark-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            color: #fff;
            resize: none;
            min-height: 45px;
            max-height: 120px;
            padding: 12px 15px;
            font-size: 0.95rem;
            transition: border-color 0.3s ease;
        }

        .chat-input textarea:focus {
            outline: none;
            border-color: var(--gold-color);
        }

        .chat-input textarea::placeholder {
            color: #777;
        }

        .chat-input button {
            background: var(--gold-color);
            color: #000;
            border: none;
            min-width: 45px;
            height: 45px;
            border-radius: 8px;
            font-size: 1.25rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chat-input button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(197, 157, 95, 0.4);
        }

        .chat-input button:active {
            transform: translateY(0);
        }

        /* Markdown styling in chat messages */
        .chat-message h1,
        .chat-message h2,
        .chat-message h3,
        .chat-message h4 {
            margin: 10px 0 8px 0;
            font-weight: bold;
        }

        .chat-message h1 {
            font-size: 1.3em;
        }

        .chat-message h2 {
            font-size: 1.2em;
        }

        .chat-message h3 {
            font-size: 1.1em;
        }

        .chat-message h4 {
            font-size: 1em;
        }

        .chat-message ul,
        .chat-message ol {
            margin: 10px 0;
            padding-left: 25px;
        }

        .chat-message li {
            margin: 6px 0;
        }

        .chat-message strong {
            font-weight: bold;
        }

        .chat-message em {
            font-style: italic;
        }

        .chat-message code {
            background: rgba(255, 165, 0, 0.1);
            color: #ffa500;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
        }

        .chat-message pre {
            background: #1a1a1a;
            color: #fff;
            padding: 12px;
            border-radius: 6px;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
            font-size: 0.85em;
            margin: 10px 0;
            border-left: 3px solid var(--gold-color);
        }

        .chat-message a {
            color: var(--gold-color);
            text-decoration: underline;
        }

        .chat-message a:hover {
            color: #d4a574;
        }

        .chat-message blockquote {
            border-left: 3px solid var(--gold-color);
            padding-left: 12px;
            margin: 10px 0;
            color: #ccc;
            font-style: italic;
        }

        .chat-message hr {
            border: none;
            border-top: 1px solid #444;
            margin: 12px 0;
        }

        /* Loading indicator */
        .loading-dots {
            display: inline-flex;
            gap: 4px;
            align-items: center;
        }

        .loading-dots span {
            width: 6px;
            height: 6px;
            background: #888;
            border-radius: 50%;
            animation: loadingDots 1.4s infinite ease-in-out both;
        }

        .loading-dots span:nth-child(1) {
            animation-delay: -0.32s;
        }

        .loading-dots span:nth-child(2) {
            animation-delay: -0.16s;
        }

        @keyframes loadingDots {

            0%,
            80%,
            100% {
                transform: scale(0);
                opacity: 0.5;
            }

            40% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.25rem;
            }

            .hero-section {
                padding: 120px 0 80px 0;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .chatbot-window {
                width: calc(100vw - 40px);
                right: 20px;
                bottom: 90px;
            }

            .chatbot-toggler {
                right: 20px;
                bottom: 20px;
            }

            .footer {
                padding: 60px 0 30px 0;
            }

            .navbar .nav-link {
                margin: 0.25rem 0;
            }
        }

        @media (max-width: 576px) {
            .chatbot-window {
                width: calc(100vw - 20px);
                right: 10px;
                bottom: 80px;
                height: calc(100vh - 150px);
            }

            .chat-message p,
            .chat-message>div:not(.avatar) {
                max-width: 85%;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/">COGA BARBERSHOP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link <?= (uri_string() == '/' || uri_string() == '') ? 'active' : '' ?>" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (strpos(uri_string(), 'layanan') !== false) ? 'active' : '' ?>" href="/layanan">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (strpos(uri_string(), 'kapsters') !== false) ? 'active' : '' ?>" href="/kapsters">Our Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (strpos(uri_string(), 'galeri') !== false) ? 'active' : '' ?>" href="/galeri">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (strpos(uri_string(), 'contact') !== false) ? 'active' : '' ?>" href="/contact">Contact Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <?php if (session()->get('isLoggedIn')): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i> <?= esc(session()->get('nama')) ?>
                                </a>
                                <?php if (session()->get('role') == 'pelanggan'): ?>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="/my-bookings"><i class="fas fa-calendar-check me-2"></i>My Bookings</a></li>
                                        <li><a class="dropdown-item" href="/profile"><i class="fas fa-user-circle me-2"></i>My Profile</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                                    </ul>
                                <?php else: ?>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="/booking/new" class="btn btn-book">Book Appointment</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <?= $this->renderSection('hero') ?>

    <!-- Main Content -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 footer-intro">
                    <h4>Contact Us</h4>
                    <p>Experience premium grooming services at Coga Barbershop. Our expert barbers are dedicated to providing you with the best haircut and styling experience in town.</p>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-contact-item">
                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div>
                                    <h5>Address</h5>
                                    <p>Jln Dr M. Hatta 1D, RT IV No.01<br>Kota Padang, Sumatera Barat 25127</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-contact-item">
                                <div class="icon"><i class="fas fa-envelope"></i></div>
                                <div>
                                    <h5>Email</h5>
                                    <p>cogabarbershop@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-contact-item">
                                <div class="icon"><i class="fas fa-phone"></i></div>
                                <div>
                                    <h5>Phone</h5>
                                    <p>081234565656</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-contact-item">
                                <div class="icon"><i class="fas fa-clock"></i></div>
                                <div>
                                    <h5>Working Hours</h5>
                                    <p>Mon - Fri: 11am - 10pm<br>Sat - Sun: 10am - 11pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                &copy; <?= date('Y') ?> Coga Barbershop. All Rights Reserved.
            </div>
        </div>
    </footer>

    <!-- Chatbot Toggle Button -->
    <button class="chatbot-toggler" aria-label="Toggle chatbot">
        <i class="fas fa-comment-dots"></i>
    </button>

    <!-- Chatbot Window -->
    <div class="chatbot-window" role="dialog" aria-labelledby="chatbot-title">
        <div class="chatbot-header">
            <h5 id="chatbot-title">Coga Assistant</h5>
            <button class="chatbot-close-btn" id="chatbotCloseBtn" aria-label="Close chatbot">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="chat-area" id="chatArea">
            <div class="chat-message incoming">
                <div class="avatar">C</div>
                <p>Halo! Selamat datang di Coga Barbershop. Ada yang bisa saya bantu?</p>
            </div>
            <div class="chat-message incoming">
                <div class="avatar">C</div>
                <p>Anda bisa menanyakan tentang layanan, harga, atau cara booking.</p>
            </div>
        </div>
        <div class="chat-input">
            <textarea id="chatInput" placeholder="Ketik pesan Anda..." rows="1" aria-label="Chat message input"></textarea>
            <button id="sendBtn" aria-label="Send message"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dompurify/dist/purify.min.js"></script>

    <script>
        // Sticky Navbar on Scroll
        let lastScroll = 0;
        const navbar = document.querySelector('.navbar');

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;

            if (currentScroll > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            lastScroll = currentScroll;
        });

        // Chatbot Functionality
        document.addEventListener('DOMContentLoaded', () => {
            const chatbotToggler = document.querySelector('.chatbot-toggler');
            const chatbotWindow = document.querySelector('.chatbot-window');
            const chatbotCloseBtn = document.getElementById('chatbotCloseBtn');
            const sendBtn = document.getElementById('sendBtn');
            const chatInput = document.getElementById('chatInput');
            const chatArea = document.getElementById('chatArea');

            // Toggle chatbot window
            chatbotToggler.addEventListener('click', () => {
                chatbotWindow.classList.toggle('show');
                if (chatbotWindow.classList.contains('show')) {
                    chatInput.focus();
                }
            });

            // Close chatbot window
            chatbotCloseBtn.addEventListener('click', () => {
                chatbotWindow.classList.remove('show');
            });

            // Close chatbot when clicking outside
            document.addEventListener('click', (e) => {
                if (!chatbotWindow.contains(e.target) && !chatbotToggler.contains(e.target)) {
                    chatbotWindow.classList.remove('show');
                }
            });

            // Send message on button click
            sendBtn.addEventListener('click', sendMessage);

            // Send message on Enter key (Shift+Enter for new line)
            chatInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    sendMessage();
                }
            });

            // Auto-adjust textarea height
            chatInput.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = Math.min(this.scrollHeight, 120) + 'px';
            });

            // Send message function
            function sendMessage() {
                const message = chatInput.value.trim();

                if (message === '') return;

                // Display user message
                const userMessageDiv = document.createElement('div');
                userMessageDiv.className = 'chat-message outgoing';
                userMessageDiv.innerHTML = `<p>${escapeHtml(message)}</p>`;
                chatArea.appendChild(userMessageDiv);

                // Clear input and reset height
                chatInput.value = '';
                chatInput.style.height = 'auto';

                // Scroll to bottom
                scrollToBottom();

                // Show loading indicator
                const loadingDiv = document.createElement('div');
                loadingDiv.className = 'chat-message incoming loading-message';
                loadingDiv.innerHTML = `
                    <div class="avatar">C</div>
                    <p style="background: #2a2a2a; color: #888;">
                        <span class="loading-dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        Memproses...
                    </p>
                `;
                chatArea.appendChild(loadingDiv);
                scrollToBottom();

                // Send message to backend
                fetch('/api/chatbot/message', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({
                            message: message
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Remove loading indicator
                        loadingDiv.remove();

                        if (data.success && data.message) {
                            const botMessageDiv = document.createElement('div');
                            botMessageDiv.className = 'chat-message incoming';

                            // Parse markdown and sanitize HTML
                            let renderedContent = marked.parse(data.message);
                            renderedContent = DOMPurify.sanitize(renderedContent, {
                                ALLOWED_TAGS: ['p', 'br', 'strong', 'em', 'u', 'a', 'ul', 'ol', 'li', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'code', 'pre', 'blockquote', 'hr'],
                                ALLOWED_ATTR: ['href', 'target', 'rel']
                            });

                            botMessageDiv.innerHTML = `
                            <div class="avatar">C</div>
                            <div style="background: #2a2a2a; color: #fff; padding: 12px 16px; border-radius: 15px; border-top-left-radius: 4px; max-width: 75%; word-break: break-word; overflow-wrap: break-word; line-height: 1.6;">
                                ${renderedContent}
                            </div>
                        `;
                            chatArea.appendChild(botMessageDiv);
                        } else {
                            showErrorMessage('Maaf, terjadi kesalahan. Silakan coba lagi.');
                        }

                        scrollToBottom();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        loadingDiv.remove();
                        showErrorMessage('Maaf, terjadi kesalahan jaringan. Silakan coba lagi.');
                        scrollToBottom();
                    });
            }

            // Helper function to show error message
            function showErrorMessage(message) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'chat-message incoming';
                errorDiv.innerHTML = `
                    <div class="avatar">C</div>
                    <p style="background: #d32f2f; color: #fff;">${escapeHtml(message)}</p>
                `;
                chatArea.appendChild(errorDiv);
            }

            // Helper function to escape HTML
            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }

            // Helper function to scroll chat to bottom
            function scrollToBottom() {
                chatArea.scrollTop = chatArea.scrollHeight;
            }

            // Add smooth scroll behavior
            chatArea.style.scrollBehavior = 'smooth';
        });
    </script>
</body>