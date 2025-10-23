<!-- app/Views/layouts/pelanggan_layout.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?> - Coga Barbershop</title>
    <!-- Add your CSS, JS, etc. here -->
    <style>
        /* Basic Styling */
        body {
            font-family: sans-serif;
            margin: 0;
        }

        header {
            background: #333;
            color: white;
            padding: 1rem;
        }

        main {
            padding: 1rem;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 0 1rem;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <a href="/" class="brand">Coga Barbershop</a>
            <div>
                <a href="/">Home</a>
                <a href="/layanan">Layanan</a>
                <a href="/galeri">Galeri</a>
                <a href="/kapsters">Tim Kami</a>
                <?php if (session()->get('isLoggedIn')): ?>
                    <a href="/my-bookings">Reservasi Saya</a>
                    <a href="/logout">Logout (<?= esc(session()->get('nama')) ?>)</a>
                <?php else: ?>
                    <a href="/login">Login</a>
                    <a href="/register">Register</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <footer>
        <!-- Your footer content here -->
    </footer>
</body>

</html>