<?php
/**
 * Tables Component Page - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Tabel Data - Admin SMKN 2 Karanganyar';
$currentPage = 'tables';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Tabel Data &amp; Registrasi</h1>
      <p class="page-subtitle">Komponen tabel interaktif untuk manajemen pendaftaran siswa, data guru, dan inventaris.</p>
    </div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted-green">Dashboard</a></li>
        <li class="breadcrumb-item text-muted-green">Komponen UI</li>
        <li class="breadcrumb-item active text-main" aria-current="page">Tabel Data</li>
      </ol>
    </nav>
  </div>
  <!-- END: Page Header Banner -->

  <!-- START: Basic Table Card Container -->
  <div class="table-card-custom">
    <!-- Header Controls -->
    <div class="table-header-control">
      <!-- Search bar -->
      <div class="table-search-box">
        <i class="bi bi-search table-search-icon"></i>
        <input type="text" class="table-search-input" placeholder="Cari nama, NISN, atau jurusan...">
      </div>
      <!-- Action buttons / Filter options -->
      <div class="table-filter-group">
        <div class="dropdown">
          <button class="btn-table-action dropdown-toggle" type="button" id="dropdownFilterStatus"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-funnel"></i> Status Verifikasi
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownFilterStatus">
            <li><a class="dropdown-item" href="#">Semua Status</a></li>
            <li><a class="dropdown-item" href="#">Terverifikasi</a></li>
            <li><a class="dropdown-item" href="#">Menunggu Berkas</a></li>
            <li><a class="dropdown-item" href="#">Ditolak</a></li>
          </ul>
        </div>
        <button class="btn-table-action" type="button">
          <i class="bi bi-file-earmark-arrow-down"></i> Unduh Excel
        </button>
      </div>
    </div>

    <!-- Responsive Table Wrapper -->
    <div class="table-responsive">
      <table class="table-custom">
        <thead>
          <tr>
            <th>No. Pendaftaran</th>
            <th>Nama Calon Siswa</th>
            <th>Pilihan Jurusan</th>
            <th>Asal SMP/MTs</th>
            <th>Nilai Rata-rata</th>
            <th>Tanggal Daftar</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Row 1 -->
          <tr>
            <td class="table-order-id">#PPDB-2026-001</td>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_1.jpg" alt="Eleanor Pena" class="table-user-avatar"
                  onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Eleanor Putri</div>
                  <div class="table-user-sub">eleanor.putri@gmail.com</div>
                </div>
              </div>
            </td>
            <td class="table-product-name">Rekayasa Perangkat Lunak (RPL)</td>
            <td>SMPN 1 Karanganyar</td>
            <td class="table-amount">89.50</td>
            <td>09 Okt 2026</td>
            <td><span class="badge-table success">Terverifikasi</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <a href="#" class="table-btn-action" title="Lihat rincian"><i class="bi bi-eye"></i></a>
                <a href="#" class="table-btn-action" title="Edit data"><i class="bi bi-pencil"></i></a>
                <a href="#" class="table-btn-action delete" title="Hapus"><i class="bi bi-trash"></i></a>
              </div>
            </td>
          </tr>
          <!-- Row 2 -->
          <tr>
            <td class="table-order-id">#PPDB-2026-002</td>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_2.jpg" alt="Wade Warren" class="table-user-avatar"
                  onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Wade Pratama</div>
                  <div class="table-user-sub">wade.pratama@gmail.com</div>
                </div>
              </div>
            </td>
            <td class="table-product-name">Teknik Mesin (TM)</td>
            <td>SMPN 2 Karanganyar</td>
            <td class="table-amount">87.20</td>
            <td>08 Okt 2026</td>
            <td><span class="badge-table pending">Verifikasi Berkas</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <a href="#" class="table-btn-action" title="Lihat rincian"><i class="bi bi-eye"></i></a>
                <a href="#" class="table-btn-action" title="Edit data"><i class="bi bi-pencil"></i></a>
                <a href="#" class="table-btn-action delete" title="Hapus"><i class="bi bi-trash"></i></a>
              </div>
            </td>
          </tr>
          <!-- Row 3 -->
          <tr>
            <td class="table-order-id">#PPDB-2026-003</td>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_3.jpg" alt="Esther Howard" class="table-user-avatar"
                  onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Esther Kusuma</div>
                  <div class="table-user-sub">esther.kusuma@gmail.com</div>
                </div>
              </div>
            </td>
            <td class="table-product-name">Teknik Otomotif (TKRO)</td>
            <td>SMPN 3 Tasikmadu</td>
            <td class="table-amount">91.00</td>
            <td>08 Okt 2026</td>
            <td><span class="badge-table success">Terverifikasi</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <a href="#" class="table-btn-action" title="Lihat rincian"><i class="bi bi-eye"></i></a>
                <a href="#" class="table-btn-action" title="Edit data"><i class="bi bi-pencil"></i></a>
                <a href="#" class="table-btn-action delete" title="Hapus"><i class="bi bi-trash"></i></a>
              </div>
            </td>
          </tr>
          <!-- Row 4 -->
          <tr>
            <td class="table-order-id">#PPDB-2026-004</td>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_4.jpg" alt="Jenny Wilson" class="table-user-avatar"
                  onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Jenny Wilson</div>
                  <div class="table-user-sub">jenny.wilson@gmail.com</div>
                </div>
              </div>
            </td>
            <td class="table-product-name">Tata Busana (TB)</td>
            <td>SMPN 1 Jaten</td>
            <td class="table-amount">84.50</td>
            <td>07 Okt 2026</td>
            <td><span class="badge-table failed">Berkas Tidak Lengkap</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <a href="#" class="table-btn-action" title="Lihat rincian"><i class="bi bi-eye"></i></a>
                <a href="#" class="table-btn-action" title="Edit data"><i class="bi bi-pencil"></i></a>
                <a href="#" class="table-btn-action delete" title="Hapus"><i class="bi bi-trash"></i></a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Footer Controls / Pagination -->
    <div class="table-footer-control">
      <span class="table-pagination-info">Menampilkan 1 sampai 4 dari 50 data</span>
      <nav aria-label="Page navigation">
        <ul class="pagination mb-0 gap-1">
          <li class="page-item disabled"><a class="page-link border-0" href="#"><i class="bi bi-chevron-left"></i></a></li>
          <li class="page-item active"><a class="page-link border-0" href="#">1</a></li>
          <li class="page-item"><a class="page-link border-0" href="#">2</a></li>
          <li class="page-item"><a class="page-link border-0" href="#">3</a></li>
          <li class="page-item"><a class="page-link border-0" href="#"><i class="bi bi-chevron-right"></i></a></li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- END: Basic Table Card Container -->

  <?php include __DIR__ . '/components/footer.php'; ?>
