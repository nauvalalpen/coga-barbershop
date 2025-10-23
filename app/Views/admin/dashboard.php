<!-- app/Views/admin/dashboard.php -->
<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Dashboard Overview
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<p>Ini adalah halaman utama dashboard untuk Admin dan Kapster.</p>
<p>Peran Anda: <strong><?= esc(session()->get('role')) ?></strong></p>
<!-- Add dashboard widgets, charts, etc. here -->
<?= $this->endSection() ?>