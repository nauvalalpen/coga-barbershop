<!-- app/Views/layouts/admin_layout.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?> - Admin Panel</title>
    <style>
        /* Basic Admin Styling */
        body {
            display: flex;
            margin: 0;
            font-family: sans-serif;
        }

        .sidebar {
            width: 250px;
            background: #2c3e50;
            color: white;
            min-height: 100vh;
            padding: 20px;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
            border-radius: 4px;
        }

        .sidebar a:hover {
            background: #34495e;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <h3>Admin Menu</h3>
        <nav>
            <a href="/dashboard">Dashboard</a>
            <a href="/admin/bookings">Manajemen Booking</a>
            <a href="/admin/layanan">Manajemen Layanan</a>
            <a href="/admin/galeri">Manajemen Galeri</a>
            <?php if (session()->get('role') === 'admin'): ?>
                <a href="/admin/kapsters">Manajemen Kapster</a>
                <a href="/admin/laporan-cukur">Laporan Cukur</a>
            <?php endif; ?>
            <?php if (session()->get('role') === 'kapster'): ?>
                <a href="/admin/catatan-cukur">Catatan Cukur Saya</a> <!-- For Kapster -->
            <?php endif; ?>
        </nav>
    </aside>

    <div class="main-content">
        <header class="header">
            <h2><?= $this->renderSection('page_title') ?></h2>
            <div>
                Selamat datang, <?= esc(session()->get('nama')) ?>!
                <a href="/logout" style="margin-left: 20px;">Logout</a>
            </div>
        </header>

        <section style="margin-top: 20px;">
            <?= $this->renderSection('content') ?>
        </section>
    </div>
</body>

</html>