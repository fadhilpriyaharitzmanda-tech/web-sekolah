<?php
/**
 * Admin Dashboard - SMKN 2 Karanganyar
 * Modular implementation utilizing header, sidebar, topbar, and footer components.
 * Native PHP Implementation (PDO)
 */
require_once __DIR__ . '/../config/database.php';

try {
    $pdo = getDbConnection();

    // Landing Page Hero
    $heroCountActive = (int) $pdo->query("SELECT COUNT(*) FROM hero_banners WHERE status = 'Aktif'")->fetchColumn();
    $heroCountTotal = (int) $pdo->query("SELECT COUNT(*) FROM hero_banners")->fetchColumn();

    // PPDB Online
    $ppdbCount = (int) $pdo->query("SELECT COUNT(*) FROM ppdb_pendaftar")->fetchColumn();
    $ppdbVerif = (int) $pdo->query("SELECT COUNT(*) FROM ppdb_pendaftar WHERE status_berkas = 'Terverifikasi'")->fetchColumn();
    $ppdbPending = (int) $pdo->query("SELECT COUNT(*) FROM ppdb_pendaftar WHERE status_berkas = 'Menunggu Verifikasi'")->fetchColumn();

    // Guru & Staff
    $guruCount = (int) $pdo->query("SELECT COUNT(*) FROM guru_staff WHERE status = 'Aktif'")->fetchColumn();

    // Mitra Industri
    $mitraCount = (int) $pdo->query("SELECT COUNT(*) FROM mitra_industri WHERE status = 'Aktif'")->fetchColumn();

    // Jurusan
    $jurusanCount = (int) $pdo->query("SELECT COUNT(*) FROM jurusan WHERE status = 'Aktif'")->fetchColumn();

    // Berita
    $beritaCount = (int) $pdo->query("SELECT COUNT(*) FROM berita WHERE status = 'Publish'")->fetchColumn();

    // Pengaduan
    $pengaduanPending = (int) $pdo->query("SELECT COUNT(*) FROM pengaduan WHERE status = 'Menunggu'")->fetchColumn();
    $pengaduanTotal = (int) $pdo->query("SELECT COUNT(*) FROM pengaduan")->fetchColumn();

    // Galeri & Prestasi
    $galeriCount = (int) $pdo->query("SELECT COUNT(*) FROM galeri")->fetchColumn();
    $prestasiCount = (int) $pdo->query("SELECT COUNT(*) FROM prestasi WHERE status = 'Aktif'")->fetchColumn();

    // Recent Activity Queries
    $recentPpdb = $pdo->query("SELECT nama_lengkap, jurusan_pilihan, created_at, status_berkas FROM ppdb_pendaftar ORDER BY id DESC LIMIT 2")->fetchAll(PDO::FETCH_ASSOC);
    $recentBerita = $pdo->query("SELECT judul, created_at, status FROM berita ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    $recentPengaduan = $pdo->query("SELECT nama_pelapor, perihal, created_at, status FROM pengaduan ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    $heroCountActive = 0; $heroCountTotal = 0;
    $ppdbCount = 0; $ppdbVerif = 0; $ppdbPending = 0;
    $guruCount = 0; $mitraCount = 0; $jurusanCount = 0;
    $beritaCount = 0; $pengaduanPending = 0; $pengaduanTotal = 0;
    $galeriCount = 0; $prestasiCount = 0;
    $recentPpdb = []; $recentBerita = null; $recentPengaduan = null;
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
                    <li><a class="dropdown-item" href="kelola-ppdb.php"><i class="bi bi-check2-circle"></i> Verifikasi Berkas</a></li>
                  </ul>
                </div>
              </div>
              <div class="stat-value"><?= number_format($ppdbCount, 0, ',', '.') ?> Calon</div>
              <div class="trend-badge trend-up">
                <i class="bi bi-check-circle-fill"></i>
                <span><?= $ppdbVerif ?> Terverifikasi &bull; <?= $ppdbPending ?> Menunggu</span>
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
                    <li><a class="dropdown-item" href="kelola-jurusan.php"><i class="bi bi-cpu"></i> Kelola Jurusan</a></li>
                  </ul>
                </div>
              </div>
              <a href="kelola-guru.php" class="text-decoration-none d-block">
                <div class="stat-value text-main"><?= $guruCount ?></div>
                <div class="trend-badge trend-up">
                  <i class="bi bi-mortarboard-fill"></i>
                  <span><?= $jurusanCount ?> Program Keahlian Unggulan</span>
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
              <h2 class="card-title">Statistik Aktivitas &amp; Layanan Sekolah</h2>
              <!-- Custom Static Legends -->
              <div class="d-flex gap-3 align-items-center">
                <div class="chart-legend-item">
                  <span class="legend-dot bg-forest-medium"></span>
                  <span class="chart-legend-label">Pengunjung Web</span>
                </div>
                <div class="chart-legend-item">
                  <span class="legend-dot bg-lime-accent"></span>
                  <span class="chart-legend-label">Layanan PPDB</span>
                </div>
              </div>
            </div>
            <div class="d-flex align-items-baseline gap-2 mb-3">
              <span class="stat-value-amount">24.500</span>
              <span class="trend-badge trend-up fs-xs">+35% interaksi portal bulan ini</span>
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
                  <li><a class="dropdown-item" href="kelola-ppdb.php"><i class="bi bi-funnel"></i> Data PPDB</a></li>
                  <li><a class="dropdown-item" href="kelola-pengaduan.php"><i class="bi bi-chat-dots"></i> Data Pengaduan</a></li>
                </ul>
              </div>
            </div>

            <!-- Transaction Items List -->
            <div class="transaction-list">
              <?php if (!empty($recentPpdb)): ?>
                <?php foreach ($recentPpdb as $rp): ?>
                  <a href="kelola-ppdb.php" class="transaction-item text-decoration-none">
                    <div class="transaction-icon bg-forest-light text-lime">
                      <i class="bi bi-person-plus"></i>
                    </div>
                    <div class="transaction-info">
                      <div class="transaction-name">Pendaftaran PPDB: <?= htmlspecialchars($rp['nama_lengkap']) ?></div>
                      <div class="transaction-date"><?= htmlspecialchars($rp['jurusan_pilihan']) ?> &bull; <?= date('d M Y', strtotime($rp['created_at'])) ?></div>
                    </div>
                    <div class="transaction-amount <?= $rp['status_berkas'] === 'Terverifikasi' ? 'text-success' : 'text-warning' ?>">
                      <?= htmlspecialchars($rp['status_berkas']) ?>
                    </div>
                  </a>
                <?php endforeach; ?>
              <?php else: ?>
                <a href="kelola-ppdb.php" class="transaction-item text-decoration-none">
                  <div class="transaction-icon bg-forest-light text-lime"><i class="bi bi-person-plus"></i></div>
                  <div class="transaction-info">
                    <div class="transaction-name">Belum ada pendaftar baru</div>
                    <div class="transaction-date">Menunggu pengajuan formulir</div>
                  </div>
                  <div class="transaction-amount text-muted">-</div>
                </a>
              <?php endif; ?>

              <?php if (!empty($recentBerita)): ?>
                <a href="kelola-berita.php" class="transaction-item text-decoration-none">
                  <div class="transaction-icon bg-forest-light text-lime">
                    <i class="bi bi-file-earmark-text"></i>
                  </div>
                  <div class="transaction-info">
                    <div class="transaction-name">Warta: <?= htmlspecialchars(mb_strimwidth($recentBerita['judul'], 0, 32, '...')) ?></div>
                    <div class="transaction-date"><?= date('d M Y', strtotime($recentBerita['created_at'])) ?></div>
                  </div>
                  <div class="transaction-amount text-main"><?= htmlspecialchars($recentBerita['status']) ?></div>
                </a>
              <?php endif; ?>

              <?php if (!empty($recentPengaduan)): ?>
                <a href="kelola-pengaduan.php" class="transaction-item text-decoration-none">
                  <div class="transaction-icon bg-forest-light text-lime">
                    <i class="bi bi-chat-dots"></i>
                  </div>
                  <div class="transaction-info">
                    <div class="transaction-name">Pengaduan: <?= htmlspecialchars(mb_strimwidth($recentPengaduan['perihal'], 0, 30, '...')) ?></div>
                    <div class="transaction-date"><?= htmlspecialchars($recentPengaduan['nama_pelapor']) ?> &bull; <?= date('d M Y', strtotime($recentPengaduan['created_at'])) ?></div>
                  </div>
                  <div class="transaction-amount <?= $recentPengaduan['status'] === 'Selesai' ? 'text-success' : 'text-warning' ?>">
                    <?= htmlspecialchars($recentPengaduan['status']) ?>
                  </div>
                </a>
              <?php endif; ?>

              <a href="kelola-galeri.php" class="transaction-item text-decoration-none">
                <div class="transaction-icon bg-forest-light text-lime">
                  <i class="bi bi-images"></i>
                </div>
                <div class="transaction-info">
                  <div class="transaction-name">Galeri Dokumentasi Sekolah</div>
                  <div class="transaction-date">Terakhir disinkronkan &bull; Update Foto Terkini</div>
                </div>
                <div class="transaction-amount text-main"><?= $galeriCount ?> Foto</div>
              </a>
            </div>

          </div>
        </div>

        <!-- Column: Capaian & Program Sekolah -->
        <div class="col-md-5 d-flex flex-column">
          <div class="card h-100 flex-grow-1">
            <div class="card-header">
              <h2 class="card-title">Ringkasan Data &amp; Jejaring</h2>
              <div class="dropdown">
                <button class="card-more-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                  aria-label="More Options" id="btn-more-products">
                  <i class="bi bi-three-dots"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                  <li><a class="dropdown-item" href="kelola-mitra.php"><i class="bi bi-buildings"></i> Kelola Mitra DUDI</a></li>
                  <li><a class="dropdown-item" href="kelola-jurusan.php"><i class="bi bi-cpu"></i> Kelola Jurusan</a></li>
                </ul>
              </div>
            </div>

            <div class="progress-container">
              <div class="progress-label-row">
                <span class="progress-label">Mitra Industri (DUDI)</span>
                <span class="progress-value"><?= $mitraCount ?> Perusahaan</span>
              </div>
              <div class="progress" role="progressbar" aria-label="Mitra Industri" aria-valuenow="85"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-lime-accent w-85"></div>
              </div>
            </div>

            <div class="progress-container">
              <div class="progress-label-row">
                <span class="progress-label">Program &amp; Konsentrasi Keahlian</span>
                <span class="progress-value"><?= $jurusanCount ?> Jurusan Aktif</span>
              </div>
              <div class="progress" role="progressbar" aria-label="Jurusan" aria-valuenow="100"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-lime-accent" style="width: 100%;"></div>
              </div>
            </div>

            <div class="progress-container">
              <div class="progress-label-row">
                <span class="progress-label">Prestasi Siswa &amp; Sekolah</span>
                <span class="progress-value"><?= $prestasiCount ?> Kejuaraan</span>
              </div>
              <div class="progress" role="progressbar" aria-label="Prestasi" aria-valuenow="90"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-lime-accent" style="width: 90%;"></div>
              </div>
            </div>

            <div class="progress-container">
              <div class="progress-label-row">
                <span class="progress-label">Berita &amp; Publikasi Warta</span>
                <span class="progress-value"><?= $beritaCount ?> Artikel Publish</span>
              </div>
              <div class="progress" role="progressbar" aria-label="Berita" aria-valuenow="75"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-brand-orange" style="width: 75%;"></div>
              </div>
            </div>

            <div class="progress-container">
              <div class="progress-label-row">
                <span class="progress-label">Kotak Pengaduan Masuk</span>
                <span class="progress-value"><?= $pengaduanPending ?> Perlu Ditanggapi</span>
              </div>
              <div class="progress" role="progressbar" aria-label="Pengaduan" aria-valuenow="50"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar <?= $pengaduanPending > 0 ? 'bg-brand-orange' : 'bg-lime-accent' ?>" style="width: <?= $pengaduanPending > 0 ? '60%' : '15%' ?>;"></div>
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
              <span class="text-muted-green">Layanan &amp; Warta</span>
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
