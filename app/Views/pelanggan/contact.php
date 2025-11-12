<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Contact Us
<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
CONTACT US
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .contact-section {
        padding: 80px 0;
        background-color: #000;
    }

    .contact-info h2,
    .contact-form-wrap h2 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        font-size: 2.5rem;
        margin-bottom: 30px;
    }

    .info-item {
        margin-bottom: 30px;
    }

    .info-item h4 {
        color: var(--gold-color);
        font-weight: bold;
        text-transform: uppercase;
        font-size: 1rem;
        letter-spacing: 1px;
    }

    .info-item p {
        color: #a0a0a0;
        line-height: 1.8;
        margin: 0;
    }

    /* Form Styles */
    .contact-form-wrap {
        background-color: #1a1a1a;
        padding: 40px;
    }

    .form-control {
        background-color: #fff;
        border: none;
        border-radius: 0;
        padding: 1rem;
        color: #000;
    }

    .form-control::placeholder {
        color: #888;
    }

    .form-label {
        color: #a0a0a0;
        text-transform: uppercase;
        font-size: 0.8rem;
        margin-bottom: 0.5rem;
    }

    .btn-submit {
        background-color: var(--gold-color);
        color: #000;
        border: none;
        border-radius: 0;
        padding: 1rem 2rem;
        font-weight: bold;
        text-transform: uppercase;
        width: 100%;
        transition: background-color 0.3s;
    }

    .btn-submit:hover {
        background-color: #fff;
    }

    .alert {
        text-align: left;
    }
</style>

<div class="contact-section">
    <div class="container">
        <div class="row g-5">
            <!-- Kolom Kiri: Informasi Kontak -->
            <div class="col-lg-6">
                <div class="contact-info">
                    <h2>Come Visit Us</h2>

                    <div class="info-item">
                        <h4>Office</h4>
                        <p>304 North Cardinal St. Dorchester</p>
                        <p>Center, MA 02124</p>
                    </div>

                    <div class="info-item">
                        <h4>Contact</h4>
                        <p>info@company.com</p>
                        <p>contact@company.com</p>
                    </div>

                    <div class="info-item">
                        <h4>Working Hours</h4>
                        <p>Monday-Saturday 9am - 6pm</p>
                        <p>Sunday 10am - 17pm</p>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Formulir Kontak -->
            <div class="col-lg-6">
                <div class="contact-form-wrap">
                    <!-- Display Feedback Messages -->
                    <?php if (session()->get('success')): ?>
                        <div class="alert alert-success"><?= session()->get('success') ?></div>
                    <?php endif; ?>
                    <?php if (session()->get('error')): ?>
                        <div class="alert alert-danger"><?= session()->get('error') ?></div>
                    <?php endif; ?>
                    <?php if (session()->get('errors')): ?>
                        <div class="alert alert-danger">
                            <!-- Mengubah dari <ul> menjadi paragraf agar lebih rapi -->
                            <?php foreach (session()->get('errors') as $error) : ?>
                                <p class="mb-0"><?= esc($error) ?></p>
                            <?php endforeach ?>
                        </div>
                    <?php endif; ?>

                    <form action="/contact/send" method="post">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Your name</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?= old('name') ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Your email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= old('email') ?>" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" value="<?= old('subject') ?>" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="message" class="form-label">Your message</label>
                                <textarea name="message" id="message" class="form-control" rows="5" required><?= old('message') ?></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-submit">Book Appointment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>