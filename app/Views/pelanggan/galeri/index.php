<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Blog & Berita
<?= $this->endSection() ?>
<?= $this->section('page_header') ?>
GALLERY
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .blog-section {
        padding: 80px 0;
        background-color: #000;
        /* Latar belakang hitam pekat */
    }

    .section-header {
        margin-bottom: 50px;
    }

    .section-header .sub-title {
        color: #c59d5f;
        /* Warna emas */
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
        background-color: #111;
        /* Sedikit kontras dari background */
        border: none;
        margin-bottom: 30px;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .blog-card:hover {
        transform: translateY(-10px);
        background-color: #1a1a1a;
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
        margin-top: 15px;
        display: inline-block;
    }

    .blog-card .read-more:hover {
        color: #fff;
    }

    /* Gaya Paginasi */
    .pagination .page-item .page-link {
        background-color: #111;
        border: 1px solid #c59d5f;
        color: #c59d5f;
        margin: 0 5px;
        border-radius: 0;
    }

    .pagination .page-item.active .page-link {
        background-color: #c59d5f;
        border-color: #c59d5f;
        color: #000;
    }

    .pagination .page-item:not(.active) .page-link:hover {
        background-color: #333;
    }

    .pagination .page-item.disabled .page-link {
        background-color: #111;
        border-color: #444;
        color: #444;
    }
</style>

<div class="blog-section">
    <div class="container">
        <!-- Header Section -->
        <div class="row">
            <div class="col-lg-12 text-center section-header">
                <p class="sub-title">OUR GALLERY</p>
                <h1 class="main-title">LATEST NEWS</h1>
            </div>
        </div>

        <!-- Grid Blog/Galeri -->
        <div class="row">
            <?php if (!empty($galeri)): ?>
                <?php foreach ($galeri as $item): ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card blog-card h-100">
                            <img src="/uploads/galeri/<?= esc($item->url_gambar) ?>" class="card-img-top blog-card-img" alt="<?= esc($item->judul) ?>">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= esc($item->judul) ?></h5>
                                <p class="card-text">
                                    <?php
                                    $deskripsi = esc($item->deskripsi);
                                    echo strlen($deskripsi) > 80 ? substr($deskripsi, 0, 80) . '...' : $deskripsi;
                                    ?>
                                </p>
                                <a href="/galeri/<?= $item->id ?>" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-white-50">Belum ada berita atau artikel yang dipublikasikan.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Paginasi (Contoh Statis) -->
        <div class="row mt-5">
            <div class="col-lg-12 d-flex justify-content-center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">&gt;</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>