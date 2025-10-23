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
        }

        body {
            background-color: var(--dark-bg);
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
        }

        /* --- Navigation Bar --- */
        .navbar {
            background-color: transparent;
            padding: 1.5rem 0;
            transition: background-color 0.4s ease-in-out, padding 0.4s ease-in-out;
            font-family: 'Roboto', sans-serif;
        }

        .navbar.scrolled {
            background-color: var(--dark-bg);
            padding: 1rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--gold-color) !important;
        }

        .navbar .nav-link {
            color: #ffffff;
            text-transform: uppercase;
            font-weight: 400;
            letter-spacing: 1px;
            font-size: 0.9rem;
            transition: color 0.3s;
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
            transition: background-color 0.3s, color 0.3s;
            border-radius: 0;
        }

        .btn-book:hover {
            background-color: var(--gold-color);
            color: var(--dark-bg);
        }

        /* --- Hero Section --- */
        .hero-section {
            height: 60vh;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.9)), url('https://images.unsplash.com/photo-1599305445671-ac291c95aaa9?q=80&w=2069&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 4.5rem;
            color: #ffffff;
            text-transform: uppercase;
        }

        /* --- Footer --- */
        .footer {
            background-color: var(--light-dark-bg);
            padding: 40px 0;
            margin-top: 80px;
            color: #a0a0a0;
            text-align: center;
        }
    </style>
</head>

<body data-bs-theme="dark">

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
                            <a class="nav-link <?= (uri_string() == '/') ? 'active' : '' ?>" href="/">Home</a>
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
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Profil Saya</a></li>
                                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="/login" class="btn btn-book">Book Appointment</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="hero-section">
        <h1 class="hero-title"><?= $this->renderSection('page_header', true) ?? strtoupper($this->renderSection('title')) ?></h1>
    </div>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> Coga Barbershop. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript for sticky navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>