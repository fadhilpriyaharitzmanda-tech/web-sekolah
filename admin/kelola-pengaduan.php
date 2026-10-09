<?php
/**
 * Kelola Pengaduan Layanan - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kotak Pengaduan - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-pengaduan';
$assetsPath = 'assets/';

include 'components/header.php';
include 'components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include 'components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Kotak Pengaduan &amp; Aspirasi</h1>
      <p class="page-subtitle">Pusat tindak lanjut pengaduan, kritik, dan saran masyarakat melalui formulir pengaduan website resmi.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../layanan/pengaduan.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Form Pengaduan Web
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="alert('Laporan pengaduan diekspor!')">
        <i class="bi bi-download"></i> Unduh Laporan
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- STATS PENGADUAN -->
  <div class="row g-3 mb-4">
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-primary-subtle text-primary fs-4">
          <i class="bi bi-inbox-fill"></i>
        </div>
        <div>
          <div class="text-muted fs-xs fw-bold">Total Laporan Masuk</div>
          <div class="fs-4 fw-bold">28 Laporan</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-warning-subtle text-warning fs-4">
          <i class="bi bi-hourglass-split"></i>
        </div>
        <div>
          <div class="text-muted fs-xs fw-bold">Menunggu Respon</div>
          <div class="fs-4 fw-bold">3 Laporan</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-info-subtle text-info fs-4">
          <i class="bi bi-arrow-repeat"></i>
        </div>
        <div>
          <div class="text-muted fs-xs fw-bold">Dalam Penanganan</div>
          <div class="fs-4 fw-bold">5 Laporan</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-success-subtle text-success fs-4">
          <i class="bi bi-check-circle-fill"></i>
        </div>
        <div>
          <div class="text-muted fs-xs fw-bold">Selesai Ditindaklanjuti</div>
          <div class="fs-4 fw-bold">20 Laporan</div>
        </div>
      </div>
    </div>
  </div>

  <!-- TABLE CONTAINER -->
  <div class="table-card-custom mb-4">
    <div class="table-header-control">
      <div class="table-search-box">
        <i class="bi bi-search table-search-icon"></i>
        <input type="text" class="table-search-input" placeholder="Cari nama pelapor, tiket aduan, atau topik...">
      </div>
      <div class="table-filter-group">
        <select class="form-select form-select-sm" style="width: auto;">
          <option selected>Semua Kategori</option>
          <option>Sarana &amp; Prasarana</option>
          <option>Pelayanan Administrasi</option>
          <option>Akademik &amp; Kesiswaan</option>
          <option>Keamanan &amp; Ketertiban</option>
        </select>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table-custom">
        <thead>
          <tr>
            <th>No. Tiket</th>
            <th>Nama Pelapor</th>
            <th>Topik Pengaduan &amp; Isi</th>
            <th>Kategori</th>
            <th>Tanggal Lapor</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="table-order-id">#ADU-2026-028</td>
            <td>
              <div class="fw-bold">Budi Santoso</div>
              <div class="text-muted fs-xs">Wali Murid &bull; 08139281029</div>
            </td>
            <td>
              <div class="fw-bold text-main">Penerangan Akses Parkir Gerbang Selatan</div>
              <div class="text-muted fs-xs text-truncate" style="max-width: 320px;">Lampu penerangan di area parkir motor siswa gerbang selatan padam saat kegiatan ekstrakurikuler sore hari...</div>
            </td>
            <td><span class="badge bg-warning-subtle text-warning">Sarpras</span></td>
            <td>08 Okt 2026</td>
            <td><span class="badge-table warning">Menunggu Respon</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button class="table-btn-action" title="Tindak Lanjuti"><i class="bi bi-reply-fill"></i></button>
                <button class="table-btn-action" title="Tandai Selesai"><i class="bi bi-check-lg"></i></button>
              </div>
            </td>
          </tr>

          <tr>
            <td class="table-order-id">#ADU-2026-027</td>
            <td>
              <div class="fw-bold">Rina Wulandari</div>
              <div class="text-muted fs-xs">Siswa Kelas XI RPL 2</div>
            </td>
            <td>
              <div class="fw-bold text-main">Pendingin AC Lab Komputer 3 Kurang Dingin</div>
              <div class="text-muted fs-xs text-truncate" style="max-width: 320px;">Unit pendingin ruangan di lab software nomor 3 sering mati otomatis saat dipakai praktik rendering...</div>
            </td>
            <td><span class="badge bg-info-subtle text-info">Fasilitas Lab</span></td>
            <td>07 Okt 2026</td>
            <td><span class="badge-table info">Proses Servis</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button class="table-btn-action" title="Tindak Lanjuti"><i class="bi bi-reply-fill"></i></button>
                <button class="table-btn-action" title="Tandai Selesai"><i class="bi bi-check-lg"></i></button>
              </div>
            </td>
          </tr>

          <tr>
            <td class="table-order-id">#ADU-2026-026</td>
            <td>
              <div class="fw-bold">Dra. Haryati</div>
              <div class="text-muted fs-xs">Masyarakat Sekitar</div>
            </td>
            <td>
              <div class="fw-bold text-main">Apresiasi Kebersihan Trotoar Depan Sekolah</div>
              <div class="text-muted fs-xs text-truncate" style="max-width: 320px;">Terima kasih atas kepedulian tim kebersihan sekolah yang rutin membersihkan saluran air depan gerbang...</div>
            </td>
            <td><span class="badge bg-success-subtle text-success">Apresiasi Publik</span></td>
            <td>04 Okt 2026</td>
            <td><span class="badge-table success">Selesai</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button class="table-btn-action" title="Lihat"><i class="bi bi-eye"></i></button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <?php include __DIR__ . '/components/footer.php'; ?>
