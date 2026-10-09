<?php
/**
 * Buttons & Alerts Component Page - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Tombol & Alert - Admin SMKN 2 Karanganyar';
$currentPage = 'buttons';
$assetsPath = 'assets/';

include 'components/header.php';
include 'components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include 'components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Tombol &amp; Komponen Alert</h1>
      <p class="page-subtitle">Koleksi varian tombol tindakan dan kotak pesan notifikasi sistem.</p>
    </div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted-green">Dashboard</a></li>
        <li class="breadcrumb-item text-muted-green">Komponen UI</li>
        <li class="breadcrumb-item active text-main" aria-current="page">Tombol &amp; Alert</li>
      </ol>
    </nav>
  </div>
  <!-- END: Page Header Banner -->

  <!-- START: Main Components Grid Layout -->
  <div class="row g-4 mb-4">

    <!-- Column 1: Buttons -->
    <div class="col-12 col-lg-6">
      <div class="card border-light shadow-sm p-4 h-100">
        <h5 class="card-title mb-4">Varian Tombol (Buttons)</h5>

        <h6 class="mb-3">Solid Color Buttons</h6>
        <div class="d-flex flex-wrap gap-2 mb-4">
          <button class="btn-custom btn-custom-primary" type="button">Primary Button</button>
          <button class="btn-custom btn-custom-secondary" type="button">Secondary Button</button>
          <button class="btn-custom btn-custom-light" type="button">Light Button</button>
          <button class="btn-custom btn-custom-danger" type="button">Danger Button</button>
          <button class="btn-custom btn-custom-warning" type="button">Warning Button</button>
        </div>

        <h6 class="mb-3">Outline Buttons</h6>
        <div class="d-flex flex-wrap gap-2 mb-4">
          <button class="btn-custom btn-custom-outline-primary" type="button">Outline Primary</button>
          <button class="btn-custom btn-custom-outline-secondary" type="button">Outline Secondary</button>
          <button class="btn-custom btn-custom-outline-danger" type="button">Outline Danger</button>
        </div>

        <h6 class="mb-3">Buttons dengan Ikon</h6>
        <div class="d-flex flex-wrap gap-2 mb-4">
          <button class="btn-custom btn-custom-primary" type="button">
            <i class="bi bi-search"></i> Cari Data
          </button>
          <button class="btn-custom btn-custom-secondary" type="button">
            <i class="bi bi-file-earmark-arrow-down"></i> Unduh Laporan
          </button>
          <button class="btn-custom btn-custom-light" type="button">
            <i class="bi bi-gear"></i> Pengaturan
          </button>
        </div>

        <h6 class="mb-3">Ukuran Tombol</h6>
        <div class="d-flex flex-wrap align-items-center gap-2">
          <button class="btn-custom btn-custom-primary btn-custom-lg" type="button">Large Action</button>
          <button class="btn-custom btn-custom-primary" type="button">Default Size</button>
          <button class="btn-custom btn-custom-primary btn-custom-sm" type="button">Small Action</button>
        </div>
      </div>
    </div>

    <!-- Column 2: Reusable Alerts -->
    <div class="col-12 col-lg-6">
      <div class="card border-light shadow-sm p-4 h-100">
        <h5 class="card-title mb-4">Notifikasi &amp; Alert</h5>

        <!-- Alert Primary -->
        <div class="alert-custom alert-custom-primary">
          <i class="bi bi-info-circle-fill alert-custom-icon"></i>
          <div class="alert-custom-content">
            <strong>Informasi:</strong> Portal PPDB telah dibuka secara resmi untuk periode ajaran baru.
          </div>
        </div>

        <!-- Alert Success -->
        <div class="alert-custom alert-custom-success">
          <i class="bi bi-check-circle-fill alert-custom-icon"></i>
          <div class="alert-custom-content">
            <strong>Berhasil:</strong> Data siswa berhasil disimpan dan diverifikasi oleh sistem!
          </div>
          <button class="alert-custom-close" type="button" aria-label="Close" onclick="this.parentElement.remove();">
            <i class="bi bi-x-lg"></i>
          </button>
        </div>

        <!-- Alert Danger -->
        <div class="alert-custom alert-custom-danger">
          <i class="bi bi-exclamation-triangle-fill alert-custom-icon"></i>
          <div class="alert-custom-content">
            <strong>Peringatan Error:</strong> Berkas dokumen yang diunggah melebihi batas maksimum 5MB.
          </div>
          <button class="alert-custom-close" type="button" aria-label="Close" onclick="this.parentElement.remove();">
            <i class="bi bi-x-lg"></i>
          </button>
        </div>

        <!-- Alert Warning -->
        <div class="alert-custom alert-custom-warning">
          <i class="bi bi-exclamation-circle-fill alert-custom-icon"></i>
          <div class="alert-custom-content">
            <strong>Perhatian:</strong> Silakan lakukan pencadangan (backup) basis data secara berkala.
          </div>
        </div>

        <!-- Alert Info -->
        <div class="alert-custom alert-custom-info">
          <i class="bi bi-lightbulb-fill alert-custom-icon"></i>
          <div class="alert-custom-content">
            <strong>Tips:</strong> Anda dapat meminimalkan sidebar menu navigasi dengan tombol toggle di kiri atas.
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- END: Main Components Grid Layout -->

  <?php include 'components/footer.php'; ?>
