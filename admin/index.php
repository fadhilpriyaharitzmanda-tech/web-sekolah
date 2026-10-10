<?php
/**
 * Admin Dashboard - SMKN 2 Karanganyar
 * Modular implementation utilizing header, sidebar, topbar, and footer components.
 */
require_once __DIR__ . '/../config/database.php';
try {
    $pdo = getDbConnection();
    $heroCountActive = (int) $pdo->query("SELECT COUNT(*) FROM hero_banners WHERE status = 'Aktif'")->fetchColumn();
    $heroCountTotal = (int) $pdo->query("SELECT COUNT(*) FROM hero_banners")->fetchColumn();
} catch (Exception $e) {
    $heroCountActive = 0;
    $heroCountTotal = 0;
}

$pageTitle = 'Dashboard - Admin SMKN 2 Karanganyar';
$currentPage = 'dashboard';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<!-- ==========================================
     START: Main Content Area
     ========================================== -->
<div class="main-wrapper">

  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Dashboard Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Dashboard</h1>
      <p class="page-subtitle">Selamat datang kembali, <strong><?= htmlspecialchars($_SESSION['admin_nama'] ?? 'Administrator') ?></strong>! Panel Pengelolaan &amp; Administrasi SMKN 2 Karanganyar.</p>
    </div>
    <div class="d-flex align-items-center gap-2">
      <a href="../index.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-1.5">
        <i class="bi bi-globe2"></i> <span>Lihat Website</span>
      </a>
      <button class="btn-date-picker" type="button" id="date-picker-trigger">
        <i class="bi bi-calendar4-event"></i>
        <span id="selected-date-range"><?= date('d F Y') ?></span>
      </button>
    </div>
  </div>
  <!-- END: Dashboard Header Banner -->

  <!-- START: Main Layout Grid (2 Columns: Dashboard + Performance Pane) -->
  <div class="row g-4">

    <!-- TOP AREA: Quick Info Stat Cards Row (Full Width) -->
    <div class="col-12">
      <div class="row g-4">
        <!-- Stat Card 1: Green Alert Banner (Hero & Banner Landing Page) -->
        <div class="col-md-4">
          <div class="card alert-green-card">
            <div class="position-relative z-index-2">
              <span class="alert-green-badge">Status Landing Page</span>
              <div class="alert-green-date"><?= $heroCountActive ?> Banner Aktif Tayang</div>
              <div class="alert-green-text">Carousel beranda utama terhubung &bull; <?= $heroCountTotal ?> total slide banner</div>
            </div>
            <a href="kelola-hero.php" class="alert-green-link z-index-2" id="alert-link-statistics">
              <span>Kelola Hero &amp; Banner</span>
              <i class="bi bi-arrow-right"></i>
            </a>

            <!-- Inline SVG geometric decoration -->
            <svg class="alert-green-bg-shape" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g transform="translate(50,50)">
                <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" />
                <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" transform="rotate(60)" />
                <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" transform="rotate(120)" />
              </g>
            </svg>
          </div>
        </div>

        <!-- Stat Card 2: Pendaftar PPDB Online -->
        <div class="col-md-4">
          <div class="card card-stat d-flex flex-column justify-content-between">
            <div>
              <div class="card-header">
                <span class="stat-label">Pendaftar PPDB Masuk</span>
                <div class="dropdown">
                  <button class="card-more-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                    aria-label="More Options" id="btn-more-income">
                    <i class="bi bi-three-dots"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                    <li><a class="dropdown-item" href="kelola-ppdb.php"><i class="bi bi-eye"></i> Lihat Data PPDB</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-arrow-down"></i> Ekspor Laporan</a></li>
                  </ul>
                </div>
              </div>
              <div class="stat-value">642 Calon</div>
              <div class="trend-badge trend-up">
                <i class="bi bi-arrow-up-right"></i>
                <span>+40% dibanding minggu lalu</span>
              </div>
            </div>
            <div class="sparkline-container sparkline-card-footer">
              <div id="income-sparkline"></div>
            </div>
          </div>
        </div>

        <!-- Stat Card 3: Guru & Tenaga Pendidik -->
        <div class="col-md-4">
          <div class="card card-stat d-flex flex-column justify-content-between position-relative">
            <div>
              <div class="card-header">
                <a href="kelola-guru.php" class="text-decoration-none text-muted-green">
                  <span class="stat-label">Guru &amp; Tenaga Pendidik</span>
                </a>
                <div class="dropdown" style="z-index: 5;">
                  <button class="card-more-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                    aria-label="More Options" id="btn-more-return">
                    <i class="bi bi-three-dots"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                    <li><a class="dropdown-item" href="kelola-guru.php"><i class="bi bi-people"></i> Kelola Guru &amp; Staff</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-arrow-down"></i> Ekspor Data</a></li>
                  </ul>
                </div>
              </div>
              <a href="kelola-guru.php" class="text-decoration-none d-block">
                <div class="stat-value text-main">132</div>
                <div class="trend-badge trend-up">
                  <i class="bi bi-arrow-up-right"></i>
                  <span>100% Sertifikasi Kompetensi</span>
                </div>
              </a>
            </div>
            <div class="sparkline-container sparkline-card-footer">
              <div id="return-sparkline"></div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- END: TOP AREA -->

    <!-- LEFT AREA: Primary Dashboard Stats & Tables -->
    <div class="col-xl-9 col-lg-8">

      <!-- START: Details Area (Transactions + Performance Charts) -->
      <div class="row g-4">
        <!-- Column: Revenue Chart (Full Width / Wider) -->
        <div class="col-12">
          <div class="card mb-0">
            <div class="card-header mb-2">
              <h2 class="card-title">Statistik Kunjungan &amp; Layanan Web</h2>
              <!-- Custom Static Legends -->
              <div class="d-flex gap-3 align-items-center">
                <div class="chart-legend-item">
                  <span class="legend-dot bg-forest-medium"></span>
                  <span class="chart-legend-label">Pengunjung Web</span>
                </div>
                <div class="chart-legend-item">
                  <span class="legend-dot bg-lime-accent"></span>
                  <span class="chart-legend-label">Layanan Online</span>
                </div>
              </div>
            </div>
            <div class="d-flex align-items-baseline gap-2 mb-3">
              <span class="stat-value-amount">24.500</span>
              <span class="trend-badge trend-up fs-xs">+35% pengunjung bulan ini</span>
            </div>
            <div id="revenue-chart"></div>
          </div>
        </div>

        <!-- Column: Transaction / Aktivitas Terbaru List -->
        <div class="col-md-7 d-flex flex-column">
          <div class="card h-100 flex-grow-1">
            <div class="card-header">
              <h2 class="card-title">Aktivitas &amp; Log Masuk</h2>
              <div class="dropdown">
                <button class="card-more-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                  aria-label="More Options" id="btn-more-transaction">
                  <i class="bi bi-three-dots"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                  <li><a class="dropdown-item" href="#"><i class="bi bi-funnel"></i> Filter Status</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-arrow-down"></i> Ekspor CSV</a></li>
                </ul>
              </div>
            </div>

            <!-- Transaction Items List -->
            <div class="transaction-list">
              <a href="kelola-ppdb.php" class="transaction-item text-decoration-none">
                <div class="transaction-icon bg-forest-light text-lime">
                  <i class="bi bi-person-plus"></i>
                </div>
                <div class="transaction-info">
                  <div class="transaction-name">Pendaftaran PPDB Baru: Ahmad Farhan</div>
                  <div class="transaction-date">Hari ini • 12:40 WIB</div>
                </div>
                <div class="transaction-amount text-success">Verifikasi OK</div>
              </a>

              <a href="kelola-berita.php" class="transaction-item text-decoration-none">
                <div class="transaction-icon bg-forest-light text-lime">
                  <i class="bi bi-file-earmark-text"></i>
                </div>
                <div class="transaction-info">
                  <div class="transaction-name">Publikasi Warta: Juara 1 LKS Robotika</div>
                  <div class="transaction-date">Kemarin • 08:15 WIB</div>
                </div>
                <div class="transaction-amount text-main">Diterbitkan</div>
              </a>

              <a href="kelola-pengaduan.php" class="transaction-item text-decoration-none">
                <div class="transaction-icon bg-forest-light text-lime">
                  <i class="bi bi-chat-dots"></i>
                </div>
                <div class="transaction-info">
                  <div class="transaction-name">Pengaduan Layanan: Penerangan Parkir</div>
                  <div class="transaction-date">08 Okt 2026 • 16:30 WIB</div>
                </div>
                <div class="transaction-amount text-warning">Menunggu Respon</div>
              </a>

              <a href="kelola-galeri.php" class="transaction-item text-decoration-none">
                <div class="transaction-icon bg-forest-light text-lime">
                  <i class="bi bi-images"></i>
                </div>
                <div class="transaction-info">
                  <div class="transaction-name">Upload Galeri: Wisuda &amp; Expo Industri</div>
                  <div class="transaction-date">07 Okt 2026 • 09:20 WIB</div>
                </div>
                <div class="transaction-amount text-main">12 Foto Baru</div>
              </a>
            </div>

          </div>
        </div>

        <!-- Column: Capaian & Program Sekolah -->
        <div class="col-md-5 d-flex flex-column">
          <div class="card h-100 flex-grow-1">
            <div class="card-header">
              <h2 class="card-title">Ringkasan Jurusan &amp; PKL</h2>
              <div class="dropdown">
                <button class="card-more-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                  aria-label="More Options" id="btn-more-products">
                  <i class="bi bi-three-dots"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                  <li><a class="dropdown-item" href="#"><i class="bi bi-plus-lg"></i> Tambah Program</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Kelola</a></li>
                </ul>
              </div>
            </div>

            <div class="progress-container">
              <div class="progress-label-row">
                <span class="progress-label">Siswa Sedang PKL</span>
                <span class="progress-value">482 / 500</span>
              </div>
              <div class="progress" role="progressbar" aria-label="Siswa PKL" aria-valuenow="85"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-lime-accent w-85"></div>
              </div>
            </div>

            <div class="progress-container">
              <div class="progress-label-row">
                <span class="progress-label">Mitra Industri (DUDI)</span>
                <span class="progress-value">84 Perusahaan</span>
              </div>
              <div class="progress" role="progressbar" aria-label="Mitra Industri" aria-valuenow="75"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-lime-accent w-75"></div>
              </div>
            </div>

            <div class="progress-container">
              <div class="progress-label-row">
                <span class="progress-label">Kelulusan Uji Sertifikasi</span>
                <span class="progress-value">98% Lulus</span>
              </div>
              <div class="progress" role="progressbar" aria-label="Sertifikasi" aria-valuenow="98"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-lime-accent w-95"></div>
              </div>
            </div>

            <div class="progress-container">
              <div class="progress-label-row">
                <span class="progress-label">Tingkat Serapan Kerja Alumni</span>
                <span class="progress-value">89% Bekerja</span>
              </div>
              <div class="progress" role="progressbar" aria-label="Serapan Alumni" aria-valuenow="89"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-brand-orange w-85"></div>
              </div>
            </div>

            <div class="progress-container">
              <div class="progress-label-row">
                <span class="progress-label">Program Kewirausahaan (SPW)</span>
                <span class="progress-value">120 Siswa</span>
              </div>
              <div class="progress" role="progressbar" aria-label="SPW Siswa" aria-valuenow="65"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-lime-accent w-65"></div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- END: Details Area -->

    </div>

    <!-- RIGHT AREA: Performance Details Sidebar Panel -->
    <div class="col-xl-3 col-lg-4">
      <div class="right-panel-wrapper d-flex flex-column gap-4 h-100">

        <!-- Performance Donut Chart card -->
        <div class="card flex-grow-1 d-flex flex-column justify-content-between mb-0">
          <div class="card-header mb-1">
            <h2 class="card-title">Kategori Kunjungan</h2>
          </div>

          <div id="views-chart"></div>

          <!-- Custom Legends below the chart -->
          <div class="chart-legends-container">
            <div class="chart-legend-item">
              <span class="legend-dot bg-lime-accent"></span>
              <span class="text-muted-green">Informasi PPDB</span>
            </div>
            <div class="chart-legend-item">
              <span class="legend-dot bg-forest-medium"></span>
              <span class="text-muted-green">Profil Jurusan</span>
            </div>
            <div class="chart-legend-item">
              <span class="legend-dot bg-brand-orange"></span>
              <span class="text-muted-green">Layanan &amp; Nilai</span>
            </div>
          </div>
        </div>

        <!-- Level Up Promotion CTA banner -->
        <div class="promo-banner-card">
          <!-- Inline SVG geometric decoration -->
          <svg class="promo-banner-bg-shape" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(50,50)">
              <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" />
              <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" transform="rotate(60)" />
              <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" transform="rotate(120)" />
            </g>
          </svg>

          <h3 class="promo-title">Tingkatkan efisiensi administrasi sekolah secara digital.</h3>
          <p class="promo-desc">Kelola data guru, siswa, pengumuman, dan materi dengan mudah dan cepat.</p>
          <a href="../index.php" target="_blank" class="btn-promo text-decoration-none text-center" id="btn-promo-action">Kunjungi Website Utama</a>
        </div>
      </div>
    </div>
    <!-- END: RIGHT AREA -->

  </div>
  <!-- END: Main Layout Grid -->

  <?php include __DIR__ . '/components/footer.php'; ?>
