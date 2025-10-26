<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?> - Coga Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --gold-color: #c59d5f;
            --dark-bg: #000000;
            --light-dark-bg: #111111;
            --sidebar-bg: #1a1a1a;
            --text-muted: #a0a0a0;
            --border-color: #333;
        }

        body {
            background-color: var(--dark-bg);
            color: #fff;
            font-family: 'Roboto', sans-serif;
        }

        .wrapper {
            display: flex;
        }

        .sidebar {
            width: 250px;
            background: var(--sidebar-bg);
            min-height: 100vh;
            border-right: 1px solid var(--border-color);
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--gold-color);
            border-bottom: 1px solid var(--border-color);
        }

        .sidebar-menu {
            padding: 15px 0;
        }

        .sidebar a {
            color: var(--text-muted);
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .sidebar a i {
            margin-right: 10px;
            width: 20px;
            /* Align icons */
            text-align: center;
        }

        .sidebar a:hover {
            background: var(--light-dark-bg);
            color: #fff;
        }

        .sidebar a.active {
            background: var(--dark-bg);
            color: var(--gold-color);
            border-left: 3px solid var(--gold-color);
        }

        .main-content {
            flex-grow: 1;
        }

        .main-header {
            padding: 1rem 1.5rem;
            background: var(--light-dark-bg);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-header .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: #fff;
        }
    </style>
</head>

<body data-bs-theme="dark"> <!-- Keep Bootstrap dark theme for components -->
    <div class="wrapper">
        <nav class="sidebar">
            <div class="sidebar-header">
                <h3>COGA</h3>
            </div>
            <ul class="list-unstyled sidebar-menu">
                <li><a href="/dashboard" class="<?= (strpos(uri_string(), 'dashboard') !== false) ? 'active' : '' ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="/admin/bookings" class="<?= (strpos(uri_string(), 'bookings') !== false) ? 'active' : '' ?>"><i class="fas fa-calendar-alt"></i> Booking</a></li>
                <li><a href="/admin/layanan" class="<?= (strpos(uri_string(), 'layanan') !== false) ? 'active' : '' ?>"><i class="fas fa-cut"></i> Layanan</a></li>
                <li><a href="/admin/galeri" class="<?= (strpos(uri_string(), 'galeri') !== false) ? 'active' : '' ?>"><i class="fas fa-images"></i> Galeri</a></li>

                <?php if (session()->get('role') === 'admin'): ?>
                    <li><a href="/admin/kapsters" class="<?= (strpos(uri_string(), 'kapsters') !== false) ? 'active' : '' ?>"><i class="fas fa-users"></i> Kapster</a></li>
                    <li><a href="/admin/laporan-cukur" class="<?= (strpos(uri_string(), 'laporan') !== false) ? 'active' : '' ?>"><i class="fas fa-chart-line"></i> Laporan</a></li>
                <?php endif; ?>

                <?php if (session()->get('role') === 'kapster'): ?>
                    <li><a href="/admin/catatan-cukur" class="<?= (strpos(uri_string(), 'catatan-cukur') !== false) ? 'active' : '' ?>"><i class="fas fa-book"></i> Catatan Cukur</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <div class="main-content">
            <header class="main-header">
                <h2 class="page-title mb-0"><?= $this->renderSection('page_title') ?></h2>
                <div>
                    <span class="me-3">Selamat datang, <?= esc(session()->get('nama')) ?>!</span>
                    <a href="/logout" class="btn btn-outline-warning btn-sm">Logout</a>
                </div>
            </header>

            <main class="p-4">
                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>