<?php
/**
 * Admin Dashboard - SMKN 2 Karanganyar
 * Modular implementation utilizing header, sidebar, topbar, and footer components.
 */
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
      <p class="page-subtitle">Panel Pengelolaan & Administrasi SMKN 2 Karanganyar.</p>
    </div>
    <button class="btn-date-picker" type="button" id="date-picker-trigger">
      <i class="bi bi-calendar4-event"></i>
      <span id="selected-date-range">January 12, 2026 - January 23, 2026</span>
      <i class="bi bi-chevron-down ms-1"></i>
    </button>
  </div>
  <!-- END: Dashboard Header Banner -->

  <!-- START: Main Layout Grid (2 Columns: Dashboard + Performance Pane) -->
  <div class="row g-4">

    <!-- TOP AREA: Quick Info Stat Cards Row (Full Width) -->
    <div class="col-12">
      <div class="row g-4">
        <!-- Stat Card 1: Green Alert Banner -->
        <div class="col-md-4">
          <div class="card alert-green-card">
            <div class="position-relative z-index-2">
              <span class="alert-green-badge">Pembaruan Landing Page</span>
              <div class="alert-green-date">Tahun Ajaran 2026/2027</div>
              <div class="alert-green-text">Pendaftaran PPDB online meningkat 40% &bull; 642 calon siswa terdaftar</div>
            </div>
            <a href="kelola-ppdb.php" class="alert-green-link z-index-2" id="alert-link-statistics">
              <span>Kelola PPDB Online</span>
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

        <!-- Stat Card 3: Total Return / Guru & Tenaga Pendidik -->
        <div class="col-md-4">
          <div class="card card-stat d-flex flex-column justify-content-between">
            <div>
              <div class="card-header">
                <span class="stat-label">Guru &amp; Tenaga Pendidik</span>
                <div class="dropdown">
                  <button class="card-more-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                    aria-label="More Options" id="btn-more-return">
                    <i class="bi bi-three-dots"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                    <li><a class="dropdown-item" href="kelola-guru.php"><i class="bi bi-people"></i> Kelola Guru</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-arrow-down"></i> Ekspor Data</a></li>
                  </ul>
                </div>
              </div>
              <div class="stat-value">132</div>
              <div class="trend-badge trend-up">
                <i class="bi bi-arrow-up-right"></i>
                <span>100% Sertifikasi Kompetensi</span>
              </div>
            </div>
            <div class="sparkline-container sparkline-card-footer">
              <div id="return-sparkline"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- PUSAT KONTROL LANDING PAGE SECTION -->
    <div class="col-12">
      <div class="card mb-0 shadow-sm border-0">
        <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom flex-wrap gap-2">
          <div>
            <h2 class="card-title d-flex align-items-center gap-2 mb-1">
              <i class="bi bi-sliders text-success"></i> Pusat Kontrol Landing Page
            </h2>
            <p class="text-muted-green fs-xs mb-0">Kelola semua elemen visual, teks, dan data dinamis yang tampil di halaman utama (Home) website.</p>
          </div>
          <a href="../index.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
            <i class="bi bi-globe2"></i> Pratinjau Website Langsung
          </a>
        </div>

        <div class="row g-3">
          <!-- Modul 1: Hero Carousel -->
          <div class="col-xl-4 col-md-6">
            <div class="p-3 rounded-3 border bg-light bg-opacity-50 h-100 d-flex flex-column justify-content-between">
              <div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle p-2 bg-success text-white" style="width:32px; height:32px; display:flex; align-items:center; justify-content:center;"><i class="bi bi-aspect-ratio fs-xs"></i></div>
                    <span class="fw-bold fs-sm">Hero &amp; Banner Slider</span>
                  </div>
                  <span class="badge bg-success-subtle text-success fs-xs">3 Slide Aktif</span>
                </div>
                <p class="text-muted fs-xs mb-3">Kelola teks judul, slogan, foto latar belakang, dan tombol aksi pada banner utama slider.</p>
              </div>
              <a href="kelola-hero.php" class="btn btn-sm btn-outline-success w-100 d-flex align-items-center justify-content-center gap-1">
                <span>Kelola Slider Hero</span> <i class="bi bi-arrow-right fs-xs"></i>
              </a>
            </div>
          </div>

          <!-- Modul 2: Statistik Counter -->
          <div class="col-xl-4 col-md-6">
            <div class="p-3 rounded-3 border bg-light bg-opacity-50 h-100 d-flex flex-column justify-content-between">
              <div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle p-2 bg-primary text-white" style="width:32px; height:32px; display:flex; align-items:center; justify-content:center;"><i class="bi bi-bar-chart-fill fs-xs"></i></div>
                    <span class="fw-bold fs-sm">Angka &amp; Statistik Capaian</span>
                  </div>
                  <span class="badge bg-primary-subtle text-primary fs-xs">4 Indikator</span>
                </div>
                <p class="text-muted fs-xs mb-3">2500+ Siswa Aktif, 45+ Partner Industri, 100% Kurikulum Industri, dan 7+ Eskul Prestasi.</p>
              </div>
              <a href="kelola-hero.php#section-stats" class="btn btn-sm btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-1">
                <span>Ubah Angka Statistik</span> <i class="bi bi-arrow-right fs-xs"></i>
              </a>
            </div>
          </div>

          <!-- Modul 3: Jurusan Unggulan -->
          <div class="col-xl-4 col-md-6">
            <div class="p-3 rounded-3 border bg-light bg-opacity-50 h-100 d-flex flex-column justify-content-between">
              <div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle p-2 bg-warning text-dark" style="width:32px; height:32px; display:flex; align-items:center; justify-content:center;"><i class="bi bi-cpu fs-xs"></i></div>
                    <span class="fw-bold fs-sm">Jurusan Unggulan (3D)</span>
                  </div>
                  <span class="badge bg-warning-subtle text-warning fs-xs">4 Program</span>
                </div>
                <p class="text-muted fs-xs mb-3">RPL, Teknik Pemesinan, Teknik Pembuatan Kain, dan Teknik Ototronik (Akreditasi &amp; Kuota).</p>
              </div>
              <a href="kelola-jurusan.php" class="btn btn-sm btn-outline-warning w-100 d-flex align-items-center justify-content-center gap-1 text-dark">
                <span>Kelola Data Jurusan</span> <i class="bi bi-arrow-right fs-xs"></i>
              </a>
            </div>
          </div>

          <!-- Modul 4: Warta & Berita -->
          <div class="col-xl-4 col-md-6">
            <div class="p-3 rounded-3 border bg-light bg-opacity-50 h-100 d-flex flex-column justify-content-between">
              <div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle p-2 bg-info text-white" style="width:32px; height:32px; display:flex; align-items:center; justify-content:center;"><i class="bi bi-newspaper fs-xs"></i></div>
                    <span class="fw-bold fs-sm">Warta &amp; Berita Terbaru</span>
                  </div>
                  <span class="badge bg-info-subtle text-info fs-xs">3 Berita Tayang</span>
                </div>
                <p class="text-muted fs-xs mb-3">Update informasi kejuaraan LKS, nota kesepahaman MoU industri, dan agenda workshop guru.</p>
              </div>
              <a href="kelola-berita.php" class="btn btn-sm btn-outline-info w-100 d-flex align-items-center justify-content-center gap-1">
                <span>Kelola Warta Berita</span> <i class="bi bi-arrow-right fs-xs"></i>
              </a>
            </div>
          </div>

          <!-- Modul 5: Testimoni Alumni -->
          <div class="col-xl-4 col-md-6">
            <div class="p-3 rounded-3 border bg-light bg-opacity-50 h-100 d-flex flex-column justify-content-between">
              <div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle p-2 bg-danger text-white" style="width:32px; height:32px; display:flex; align-items:center; justify-content:center;"><i class="bi bi-chat-heart-fill fs-xs"></i></div>
                    <span class="fw-bold fs-sm">Testimoni Alumni</span>
                  </div>
                  <span class="badge bg-danger-subtle text-danger fs-xs">3 Ulasan Aktif</span>
                </div>
                <p class="text-muted fs-xs mb-3">Ulasan alumni sukses di industri teknologi, otomotif Astra, dan manufaktur tekstil Sritex.</p>
              </div>
              <a href="kelola-testimoni.php" class="btn btn-sm btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-1">
                <span>Kelola Testimoni</span> <i class="bi bi-arrow-right fs-xs"></i>
              </a>
            </div>
          </div>

          <!-- Modul 6: Layanan PPDB Online -->
          <div class="col-xl-4 col-md-6">
            <div class="p-3 rounded-3 border bg-light bg-opacity-50 h-100 d-flex flex-column justify-content-between">
              <div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle p-2 bg-dark text-lime" style="width:32px; height:32px; display:flex; align-items:center; justify-content:center;"><i class="bi bi-mortarboard-fill fs-xs"></i></div>
                    <span class="fw-bold fs-sm">PPDB Online &amp; CTA</span>
                  </div>
                  <span class="badge bg-success fs-xs">Pendaftaran Buka</span>
                </div>
                <p class="text-muted fs-xs mb-3">Pantau calon siswa pendaftar baru dari tombol CTA landing page dan verifikasi kelengkapan berkas.</p>
              </div>
              <a href="kelola-ppdb.php" class="btn btn-sm btn-dark w-100 d-flex align-items-center justify-content-center gap-1 text-lime">
                <span>Buka Panel PPDB</span> <i class="bi bi-arrow-right fs-xs"></i>
              </a>
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
