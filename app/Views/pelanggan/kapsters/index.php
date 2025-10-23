<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Our Barbers
<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
OUR BARBERS
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .team-section {
        padding: 80px 0;
        background-color: #000;
    }

    .section-header {
        margin-bottom: 50px;
    }

    .section-header .sub-title {
        color: var(--gold-color);
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

    /* Kartu Tim/Kapster */
    .team-card {
        position: relative;
        overflow: hidden;
        margin-bottom: 30px;
    }

    .team-card-img {
        width: 100%;
        height: 450px;
        /* Tinggi gambar yang konsisten */
        object-fit: cover;
        transition: transform 0.5s ease;
        filter: grayscale(100%);
        /* Efek hitam-putih */
    }

    .team-card:hover .team-card-img {
        transform: scale(1.1);
        filter: grayscale(0%);
        /* Warna kembali saat di-hover */
    }

    .team-card-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.95), rgba(0, 0, 0, 0));
        padding: 50px 20px 20px 20px;
        text-align: center;
        transition: all 0.4s ease;
    }

    .team-card h4 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        text-transform: uppercase;
        margin-bottom: 10px;
        letter-spacing: 1px;
    }

    .team-social-icons a {
        color: var(--gold-color);
        margin: 0 8px;
        font-size: 1rem;
        transition: color 0.3s;
    }

    .team-social-icons a:hover {
        color: #fff;
    }

    .btn-book-kapster {
        border: 2px solid var(--gold-color);
        color: var(--gold-color);
        background-color: transparent;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 0.5rem 2rem;
        transition: background-color 0.3s, color 0.3s;
        border-radius: 0;
        margin-top: 20px;
        opacity: 0;
        /* Sembunyikan tombol secara default */
        transform: translateY(20px);
    }

    .team-card:hover .btn-book-kapster {
        opacity: 1;
        /* Tampilkan tombol saat di-hover */
        transform: translateY(0);
        transition-delay: 0.2s;
        /* Tambahkan sedikit delay */
    }

    .btn-book-kapster:hover {
        background-color: var(--gold-color);
        color: var(--dark-bg);
    }
</style>

<div class="team-section">
    <div class="container">
        <!-- Header Section -->
        <div class="row">
            <div class="col-lg-12 text-center section-header">
                <p class="sub-title">MEET THE FAMILY</p>
                <h1 class="main-title">OUR BARBERS</h1>
            </div>
        </div>

        <!-- Grid Kapster -->
        <div class="row">
            <?php if (!empty($kapsters)): ?>
                <?php foreach ($kapsters as $kapster): ?>
                    <?php if ($kapster->status === 'aktif'): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="team-card">
                                <img src="/uploads/kapsters/<?= esc($kapster->foto_profil) ?>" class="team-card-img" alt="<?= esc($kapster->nama) ?>">
                                <div class="team-card-overlay">
                                    <h4><?= esc($kapster->nama) ?></h4>
                                    <!-- Contoh ikon sosial media -->
                                    <div class="team-social-icons">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    <a href="/login" class="btn btn-book-kapster">Book</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-white-50">Tim kami akan segera diperbarui.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>