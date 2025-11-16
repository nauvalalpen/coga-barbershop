<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Coga Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --gold-color: #d4af37;
            --gold-hover: #f4d983;
            --dark-bg: #0a0a0a;
            --light-dark-bg: #141414;
            --sidebar-bg: #0f0f0f;
            --card-bg: #1a1a1a;
            --text-muted: #a0a0a0;
            --border-color: #2a2a2a;
            --hover-bg: #1f1f1f;
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--dark-bg);
            color: #fff;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--dark-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gold-color);
        }

        /* Layout */
        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--sidebar-bg) 0%, #0a0a0a 100%);
            min-height: 100vh;
            border-right: 1px solid var(--border-color);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: var(--transition-smooth);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.5);
        }

        .sidebar-header {
            padding: 30px 25px;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
            /* cursor: pointer; */
        }

        .sidebar-header::before {
            content: '✂️';
            position: absolute;
            font-size: 8rem;
            opacity: 0.03;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-15deg);
        }

        .sidebar-logo {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: var(--gold-color);
            font-weight: 800;
            letter-spacing: 3px;
            margin-bottom: 5px;
            text-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
            position: relative;
        }

        .sidebar-subtitle {
            color: var(--text-muted);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 500;
        }

        /* Sidebar Menu */
        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-section {
            margin-bottom: 30px;
        }

        .menu-section-title {
            color: var(--text-muted);
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 0 25px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .sidebar a {
            color: #b0b0b0;
            display: flex;
            align-items: center;
            padding: 14px 25px;
            text-decoration: none;
            transition: var(--transition-smooth);
            border-left: 3px solid transparent;
            position: relative;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .sidebar a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 0;
            background: rgba(212, 175, 55, 0.1);
            transition: var(--transition-smooth);
        }

        .sidebar a:hover::before {
            width: 100%;
        }

        .sidebar a i {
            margin-right: 15px;
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
            transition: var(--transition-smooth);
        }

        .sidebar a:hover {
            color: #fff;
            background: var(--hover-bg);
            padding-left: 30px;
        }

        .sidebar a:hover i {
            color: var(--gold-color);
            transform: scale(1.1);
        }

        .sidebar a.active {
            background: linear-gradient(90deg, rgba(212, 175, 55, 0.2) 0%, transparent 100%);
            color: var(--gold-color);
            border-left: 3px solid var(--gold-color);
            font-weight: 600;
        }

        .sidebar a.active i {
            color: var(--gold-color);
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            margin-left: 280px;
            transition: var(--transition-smooth);
        }

        /* Main Header */
        .main-header {
            padding: 1.25rem 2rem;
            background: linear-gradient(135deg, var(--light-dark-bg) 0%, var(--dark-bg) 100%);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: #fff;
            margin: 0;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .page-title::before {
            content: '';
            width: 4px;
            height: 30px;
            background: var(--gold-color);
            border-radius: 2px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 15px;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 50px;
            transition: var(--transition-smooth);
        }

        .user-info:hover {
            border-color: var(--gold-color);
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.2);
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold-color), var(--gold-hover));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #000;
            font-size: 0.9rem;
        }

        .user-name {
            color: #fff;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .user-role {
            color: var(--text-muted);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-logout {
            background: transparent;
            color: var(--gold-color);
            border: 2px solid var(--gold-color);
            padding: 8px 20px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: var(--transition-smooth);
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-logout:hover {
            background: var(--gold-color);
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        /* Main Content Area */
        main {
            padding: 2rem;
            min-height: calc(100vh - 80px);
            background: var(--dark-bg);
        }

        /* Mobile Sidebar Toggle */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: var(--gold-color);
            color: #000;
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .sidebar-toggle:hover {
            transform: scale(1.1);
        }

        .unstyled-link {
            all: unset;
        }

        .unstyled-link:visited,
        .unstyled-link:hover,
        .unstyled-link:active {
            color: inherit;
            /* Takes the color of its parent */
            text-decoration: none;
            /* Removes the underline */
            cursor: text;
            /* Optional: Shows a text cursor instead of a pointer */
        }

        .link-box {
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .page-title {
                font-size: 1.5rem;
                margin-left: 60px;
            }

            .user-info {
                display: none;
            }

            .main-header {
                padding: 1rem 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .page-title::before {
                display: none;
            }

            .page-title {
                font-size: 1.3rem;
            }

            main {
                padding: 1.5rem 1rem;
            }

            .header-actions {
                gap: 10px;
            }

            .btn-logout span {
                display: none;
            }
        }

        /* Custom Bootstrap Dark Theme Overrides */
        .card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
        }

        .card-header {
            background-color: var(--light-dark-bg);
            border-bottom: 1px solid var(--border-color);
        }

        .table {
            color: #fff;
        }

        .table-dark {
            --bs-table-bg: var(--card-bg);
            --bs-table-border-color: var(--border-color);
        }

        .btn-primary {
            background-color: var(--gold-color);
            border-color: var(--gold-color);
            color: #000;
        }

        .btn-primary:hover {
            background-color: var(--gold-hover);
            border-color: var(--gold-hover);
        }

        /* Loading Animation */
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }

            100% {
                background-position: 1000px 0;
            }
        }
    </style>
</head>

<body>
    <!-- Mobile Sidebar Toggle -->
    <button class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-header link-box" onclick="location.href='/'">
                <h3 class="sidebar-logo">COGA</h3>
                <p class="sidebar-subtitle">Admin Panel</p>
            </div>

            <ul class="list-unstyled sidebar-menu">
                <li class="menu-section">
                    <div class="menu-section-title">Main Menu</div>
                    <a href="/dashboard" class="<?= (strpos(uri_string(), 'dashboard') !== false) ? 'active' : '' ?>">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="/admin/bookings" class="<?= (strpos(uri_string(), 'bookings') !== false) ? 'active' : '' ?>">
                        <i class="fas fa-calendar-check"></i>
                        <span>Bookings</span>
                    </a>
                    <a href="/admin/layanan" class="<?= (strpos(uri_string(), 'layanan') !== false) ? 'active' : '' ?>">
                        <i class="fas fa-cut"></i>
                        <span>Services</span>
                    </a>
                    <a href="/admin/galeri" class="<?= (strpos(uri_string(), 'galeri') !== false) ? 'active' : '' ?>">
                        <i class="fas fa-images"></i>
                        <span>Gallery</span>
                    </a>
                </li>

                <?php if (session()->get('role') === 'admin'): ?>
                    <li class="menu-section">
                        <div class="menu-section-title">Management</div>
                        <a href="/admin/kapsters" class="<?= (strpos(uri_string(), 'kapsters') !== false) ? 'active' : '' ?>">
                            <i class="fas fa-user-tie"></i>
                            <span>Barbers</span>
                        </a>
                        <a href="/admin/laporan-cukur" class="<?= (strpos(uri_string(), 'laporan') !== false) ? 'active' : '' ?>">
                            <i class="fas fa-chart-line"></i>
                            <span>Reports</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (session()->get('role') === 'kapster'): ?>
                    <li class="menu-section">
                        <div class="menu-section-title">My Work</div>
                        <a href="/admin/catatan-cukur" class="<?= (strpos(uri_string(), 'catatan-cukur') !== false) ? 'active' : '' ?>">
                            <i class="fas fa-clipboard-list"></i>
                            <span>Work Log</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header class="main-header">
                <h2 class="page-title"><?= $this->renderSection('page_title') ?></h2>

                <div class="header-actions">
                    <div class="user-info">
                        <div class="user-avatar">
                            <?= strtoupper(substr(session()->get('nama'), 0, 1)) ?>
                        </div>
                        <div>
                            <div class="user-name"><?= esc(session()->get('nama')) ?></div>
                            <div class="user-role"><?= esc(session()->get('role')) ?></div>
                        </div>
                    </div>

                    <a href="/logout" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </header>

            <main>
                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle Sidebar for Mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.sidebar-toggle');

            if (window.innerWidth <= 992) {
                if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });

        // Active menu highlight
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const menuLinks = document.querySelectorAll('.sidebar a');

            menuLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>

</html>