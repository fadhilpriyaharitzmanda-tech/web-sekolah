<?php
/**
 * Kelola PPDB Online - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola PPDB Online - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-ppdb';
$assetsPath = 'assets/';

include 'components/header.php';
include 'components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include 'components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Penerimaan Peserta Didik Baru (PPDB)</h1>
      <p class="page-subtitle">Verifikasi pendaftaran calon siswa baru, cek berkas NISN, raport, dan kelulusan jalur seleksi online.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../layanan/ppdb.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Form PPDB Website
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="alert('Data pendaftar berhasil diekspor!')">
        <i class="bi bi-file-earmark-excel"></i> Ekspor Excel
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- STATS PPDB -->
  <div class="row g-3 mb-4">
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-primary-subtle text-primary fs-4">
          <i class="bi bi-person-lines-fill"></i>
        </div>
        <div>
          <div class="text-muted fs-xs fw-bold">Total Pendaftar</div>
          <div class="fs-4 fw-bold">642 Calon</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-success-subtle text-success fs-4">
          <i class="bi bi-check2-all"></i>
        </div>
        <div>
          <div class="text-muted fs-xs fw-bold">Berkas Terverifikasi</div>
          <div class="fs-4 fw-bold">489 Lolos</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-warning-subtle text-warning fs-4">
          <i class="bi bi-clock-history"></i>
        </div>
        <div>
          <div class="text-muted fs-xs fw-bold">Menunggu Verifikasi</div>
          <div class="fs-4 fw-bold">128 Berkas</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-danger-subtle text-danger fs-4">
          <i class="bi bi-x-circle"></i>
        </div>
        <div>
          <div class="text-muted fs-xs fw-bold">Perlu Perbaikan</div>
          <div class="fs-4 fw-bold">25 Siswa</div>
        </div>
      </div>
    </div>
  </div>

  <!-- TABLE CONTAINER -->
  <div class="table-card-custom mb-4">
    <div class="table-header-control">
      <div class="table-search-box">
        <i class="bi bi-search table-search-icon"></i>
        <input type="text" class="table-search-input" placeholder="Cari nama siswa, NISN, atau asal sekolah...">
      </div>
      <div class="table-filter-group">
        <select class="form-select form-select-sm" style="width: auto;">
          <option selected>Semua Jurusan Pilihan</option>
          <option>Rekayasa Perangkat Lunak</option>
          <option>Teknik Pemesinan</option>
          <option>Teknik Pembuatan Kain</option>
          <option>Teknik Ototronik</option>
        </select>
        <select class="form-select form-select-sm" style="width: auto;">
          <option selected>Semua Status</option>
          <option>Terverifikasi</option>
          <option>Menunggu Berkas</option>
          <option>Perlu Perbaikan</option>
        </select>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table-custom">
        <thead>
          <tr>
            <th>No. Reg</th>
            <th>Nama Calon Siswa</th>
            <th>Pilihan Jurusan</th>
            <th>Asal Sekolah</th>
            <th>Rata-rata Nilai</th>
            <th>Tgl Daftar</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="table-order-id">#PPDB-2026-001</td>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_1.jpg" alt="Ahmad" class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Ahmad Farhan Pratama</div>
                  <div class="table-user-sub">NISN: 0072381920 &bull; 08123456789</div>
                </div>
              </div>
            </td>
            <td><span class="badge bg-success-subtle text-success">RPL</span></td>
            <td>SMPN 1 Karanganyar</td>
            <td class="table-amount">89.40</td>
            <td>Hari ini, 09:15</td>
            <td><span class="badge-table success">Terverifikasi</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button class="table-btn-action" title="Detail"><i class="bi bi-eye"></i></button>
                <button class="table-btn-action" title="Cetak Kartu"><i class="bi bi-printer"></i></button>
              </div>
            </td>
          </tr>

          <tr>
            <td class="table-order-id">#PPDB-2026-002</td>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_2.jpg" alt="Dina" class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Dina Rahmawati</div>
                  <div class="table-user-sub">NISN: 0081923019 &bull; 08567812903</div>
                </div>
              </div>
            </td>
            <td><span class="badge bg-primary-subtle text-primary">TPM (Mesin)</span></td>
            <td>SMPN 2 Tasikmadu</td>
            <td class="table-amount">87.80</td>
            <td>Hari ini, 10:20</td>
            <td><span class="badge-table warning">Menunggu Berkas</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button class="table-btn-action" title="Detail"><i class="bi bi-eye"></i></button>
                <button class="table-btn-action" title="Cetak Kartu"><i class="bi bi-printer"></i></button>
              </div>
            </td>
          </tr>

          <tr>
            <td class="table-order-id">#PPDB-2026-003</td>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_3.jpg" alt="Bagas" class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Bagas Kurniawan</div>
                  <div class="table-user-sub">NISN: 0071982731 &bull; 08912389102</div>
                </div>
              </div>
            </td>
            <td><span class="badge bg-danger-subtle text-danger">TOT (Ototronik)</span></td>
            <td>SMPN 3 Karanganyar</td>
            <td class="table-amount">85.60</td>
            <td>Kemarin, 14:10</td>
            <td><span class="badge-table success">Terverifikasi</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button class="table-btn-action" title="Detail"><i class="bi bi-eye"></i></button>
                <button class="table-btn-action" title="Cetak Kartu"><i class="bi bi-printer"></i></button>
              </div>
            </td>
          </tr>

          <tr>
            <td class="table-order-id">#PPDB-2026-004</td>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_4.jpg" alt="Siti" class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Siti Nurhaliza</div>
                  <div class="table-user-sub">NISN: 0089201923 &bull; 08129812903</div>
                </div>
              </div>
            </td>
            <td><span class="badge bg-warning-subtle text-warning">TPK (Tekstil)</span></td>
            <td>SMPN 1 Kebakkramat</td>
            <td class="table-amount">88.20</td>
            <td>07 Okt 2026</td>
            <td><span class="badge-table success">Terverifikasi</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button class="table-btn-action" title="Detail"><i class="bi bi-eye"></i></button>
                <button class="table-btn-action" title="Cetak Kartu"><i class="bi bi-printer"></i></button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <?php include __DIR__ . '/components/footer.php'; ?>
