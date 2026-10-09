<?php
/**
 * Blank Page - Starter Template Admin
 */
$pageTitle = 'Blank Page - Admin SMKN 2 Karanganyar';
$currentPage = 'blank';
$assetsPath = 'assets/';

include 'components/header.php';
include 'components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include 'components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Halaman Kosong (Starter)</h1>
      <p class="page-subtitle">Template dasar untuk menambahkan modul atau fitur baru di panel admin.</p>
    </div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted-green">Dashboard</a></li>
        <li class="breadcrumb-item active text-main" aria-current="page">Halaman Kosong</li>
      </ol>
    </nav>
  </div>
  <!-- END: Page Header Banner -->

  <!-- START: Blank Page Content Area -->
  <div class="card p-5 border-light shadow-sm text-center">
    <div>
      <div class="mb-4 text-lime empty-state-icon" style="font-size: 3rem;">
        <i class="bi bi-file-earmark-code"></i>
      </div>
      <h3 class="mb-2">Konten Modul Baru Dimulai di Sini</h3>
      <p class="text-muted-green mb-4">Gunakan struktur modular ini untuk membuat fitur pengelolaan data baru seperti PPDB, Data Guru, Informasi Jurusan, atau Pengaduan.</p>
      <a href="index.php" class="btn btn-outline-success">Kembali ke Dashboard</a>
    </div>
  </div>
  <!-- END: Blank Page Content Area -->

  <?php include 'components/footer.php'; ?>
