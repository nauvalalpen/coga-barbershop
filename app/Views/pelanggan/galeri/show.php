<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
<?= esc($item->judul) ?>
<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
OUR GALLERY
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .article-section {
        padding: 80px 0;
        background-color: #000;
    }

    .article-header .article-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        color: #fff;
        margin-bottom: 20px;
    }

    .article-meta {
        color: var(--gold-color);
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 40px;
    }

    .article-image {
        width: 100%;
        max-width: 450px;
        /* Batasi lebar maksimum gambar menjadi 700px */
        height: auto;
        margin: 0 auto 40px auto;
        /* Atur margin agar gambar berada di tengah (atas 0, kiri/kanan auto, bawah 40px) */
        display: block;
        /* Diperlukan agar margin auto bekerja dengan benar */
        border-radius: 5px;
        /* Tambahkan sedikit sudut melengkung agar lebih soft */
    }

    .article-content {
        color: #a0a0a0;
        line-height: 1.8;
        font-size: 1.1rem;
    }

    .back-link {
        display: inline-block;
        margin-top: 50px;
        color: var(--gold-color);
        text-decoration: none;
        font-weight: bold;
    }

    .back-link:hover {
        color: #fff;
    }
</style>

<div class="article-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="article-header text-center">
                    <!-- Judul Artikel/Galeri -->
                    <h1 class="article-title"><?= esc($item->judul) ?></h1>
                    <!-- Meta Data: Tanggal dibuat -->
                    <p class="article-meta">
                        Published on <?= date('F d, Y', strtotime($item->created_at)) ?>
                    </p>
                </div>

                <!-- Gambar Utama -->
                <img src="/uploads/galeri/<?= esc($item->url_gambar) ?>" alt="<?= esc($item->judul) ?>" class="img-fluid article-image">

                <!-- Konten / Deskripsi Lengkap -->
                <div class="article-content">
                    <p><?= esc($item->deskripsi) ?></p>
                </div>

                <a href="/galeri" class="back-link"><i class="fas fa-arrow-left"></i> Back to Gallery</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>