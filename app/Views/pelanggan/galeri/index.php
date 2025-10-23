<!-- app/Views/pelanggan/galeri/index.php -->
<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Blog & Berita
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .blog-section {
        padding: 60px 0;
        background-color: #121212;
    }

    .section-header {
        margin-bottom: 50px;
    }

    .section-header .sub-title {
        color: #c59d5f;
        /* Gold color */
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: bold;
        font-size: 0.9rem;
    }

    .section-header .main-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        color: #fff;
    }

    .blog-card {
        background-color: #1a1a1a;
        border: none;
        margin-bottom: 30px;
        transition: transform 0.3s ease;
    }

    .blog-card:hover {
        transform: translateY(-10px);
    }

    .blog-card-img {
        height: 250px;
        object-fit: cover;
    }

    .blog-card .card-body {
        padding: 25px;
    }

    .blog-card .card-title {
        font-family: 'Playfair Display', serif;
        color: #fff;
        font-size: 1.5rem;
        margin-bottom: 15px;
    }

    .blog-card .card-text {
        color: #a0a0a0;
        font-size: 0.9rem;
        line-height: 1.6;
    }

    .blog-card .read-more {
        color: #c59d5f;
        text-decoration: none;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 0.8rem;
        letter-spacing: 1px;
        transition: color 0.3s ease;
    }

    .blog-card .read-more:hover {
        color: #fff;
    }

    /* Pagination Styles */
    .pagination .page-item .page-link {
        background-color: #1a1a1a;
        border: 1px solid #c59d5f;
        color: #c59d5f;
    }

    .pagination .page-item.active .page-link {
        background-color: #c59d5f;
        border-color: #c59d5f;
        color: #121212;
    }

    .pagination .page-item:not(.active) .page-link:hover {
        background-color: #333;
    }
</style>

<div class="blog-section">
    <div class="container">
        <!-- Section Header -->
        <div class="row">
            <div class="col-lg-12 text-center section-header">
                <p class="sub-title">OUR BLOG</p>
                <h1 class="main-title">LATEST NEWS</h1>
            </div>
        </div>

        <!-- Blog Grid -->
        <div class="row">
            <?php if (!empty($galeri)): ?>
                <?php foreach ($galeri as $item): ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card blog-card">
                            <img src="/uploads/galeri/<?= esc($item->url_gambar) ?>" class="card-img-top blog-card-img" alt="<?= esc($item->judul) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($item->judul) ?></h5>
                                <p class="card-text">
                                    <?php
                                    // Truncate description for a neat preview
                                    $deskripsi = esc($item->deskripsi);
                                    echo strlen($deskripsi) > 100 ? substr($deskripsi, 0, 100) . '...' : $deskripsi;
                                    ?>
                                </p>
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-white">Belum ada berita atau artikel yang dipublikasikan.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination (Static Example) -->
        <div class="row mt-5">
            <div class="col-lg-12 d-flex justify-content-center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>