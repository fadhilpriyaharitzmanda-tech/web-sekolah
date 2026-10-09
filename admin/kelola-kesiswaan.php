<?php
/**
 * Kelola Prestasi & Ekstrakurikuler Kesiswaan - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola Kesiswaan - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-prestasi';
$assetsPath = 'assets/';
$activeTab = $_GET['tab'] ?? 'prestasi';

include 'components/header.php';
include 'components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include 'components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Kesiswaan: Prestasi &amp; Ekstrakurikuler</h1>
      <p class="page-subtitle">Kelola daftar torehan prestasi kejuaraan siswa serta data kegiatan ekstrakurikuler SMKN 2 Karanganyar.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../kesiswaan/kesiswaan.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Halaman Kesiswaan
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="alert('Data kesiswaan tersimpan!')">
        <i class="bi bi-plus-lg"></i> Tambah Data Baru
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- TABS -->
  <ul class="nav nav-pills mb-4" id="kesiswaanTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link <?= ($activeTab === 'prestasi') ? 'active' : '' ?>" id="prestasi-tab" data-bs-toggle="pill" data-bs-target="#tab-prestasi" type="button" role="tab">
        <i class="bi bi-trophy-fill me-1"></i> Prestasi Siswa &amp; Kejuaraan
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link <?= ($activeTab === 'ekskul') ? 'active' : '' ?>" id="ekskul-tab" data-bs-toggle="pill" data-bs-target="#tab-ekskul" type="button" role="tab">
        <i class="bi bi-stars me-1"></i> Ekstrakurikuler (7+ Eskul Unggulan)
      </button>
    </li>
  </ul>

  <div class="tab-content" id="kesiswaanTabContent">
    <!-- TAB PRESTASI -->
    <div class="tab-pane fade <?= ($activeTab === 'prestasi') ? 'show active' : '' ?>" id="tab-prestasi" role="tabpanel">
      <div class="table-card-custom mb-4">
        <div class="table-header-control">
          <div class="table-search-box">
            <i class="bi bi-search table-search-icon"></i>
            <input type="text" class="table-search-input" placeholder="Cari nama lomba atau nama siswa...">
          </div>
        </div>
        <div class="table-responsive">
          <table class="table-custom">
            <thead>
              <tr>
                <th>Nama Prestasi / Kejuaraan</th>
                <th>Tingkat</th>
                <th>Peringkat</th>
                <th>Siswa &amp; Jurusan</th>
                <th>Tahun</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="fw-bold">Lomba Kompetensi Siswa (LKS) Bidang Robotika</td>
                <td><span class="badge bg-primary-subtle text-primary">Provinsi</span></td>
                <td><span class="badge bg-success">Juara 1</span></td>
                <td>Rizki Pratama (XII TOT)</td>
                <td>2024</td>
                <td class="text-center">
                  <button class="table-btn-action"><i class="bi bi-pencil"></i></button>
                  <button class="table-btn-action delete"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td class="fw-bold">Web Technologies Skill Competition</td>
                <td><span class="badge bg-warning-subtle text-warning">Nasional</span></td>
                <td><span class="badge bg-info text-dark">Juara 2</span></td>
                <td>Aditya Nugroho (XII RPL)</td>
                <td>2024</td>
                <td class="text-center">
                  <button class="table-btn-action"><i class="bi bi-pencil"></i></button>
                  <button class="table-btn-action delete"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td class="fw-bold">CNC Milling Competition Jawa Tengah</td>
                <td><span class="badge bg-primary-subtle text-primary">Provinsi</span></td>
                <td><span class="badge bg-success">Juara 1</span></td>
                <td>Deni Kurnia (XII TPM)</td>
                <td>2023</td>
                <td class="text-center">
                  <button class="table-btn-action"><i class="bi bi-pencil"></i></button>
                  <button class="table-btn-action delete"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- TAB EKSKUL -->
    <div class="tab-pane fade <?= ($activeTab === 'ekskul') ? 'show active' : '' ?>" id="tab-ekskul" role="tabpanel">
      <div class="row g-4 mb-4">
        <!-- Eskul 1 -->
        <div class="col-md-4">
          <div class="card p-3 shadow-sm border-0 h-100">
            <div class="d-flex align-items-center gap-3 mb-2">
              <div class="rounded-circle bg-success-subtle text-success p-3 fs-4"><i class="bi bi-cpu"></i></div>
              <div>
                <h6 class="fw-bold mb-0">Robotik &amp; IoT Club</h6>
                <div class="text-muted fs-xs">Pembina: Eko Prasetyo, S.Kom</div>
              </div>
            </div>
            <p class="text-muted fs-xs mb-3">Wadah inovasi teknologi robotika, mikrokontroler Arduino/ESP32, dan otomasi industri.</p>
            <div class="d-flex justify-content-between align-items-center pt-2 border-top fs-xs">
              <span>Anggota: <strong>48 Siswa</strong></span>
              <span class="badge bg-success">Aktif</span>
            </div>
          </div>
        </div>
        <!-- Eskul 2 -->
        <div class="col-md-4">
          <div class="card p-3 shadow-sm border-0 h-100">
            <div class="d-flex align-items-center gap-3 mb-2">
              <div class="rounded-circle bg-danger-subtle text-danger p-3 fs-4"><i class="bi bi-heart-pulse"></i></div>
              <div>
                <h6 class="fw-bold mb-0">PMR Wira (Palang Merah)</h6>
                <div class="text-muted fs-xs">Pembina: Dra. Haryati</div>
              </div>
            </div>
            <p class="text-muted fs-xs mb-3">Kegiatan pertolongan pertama, donor darah, mitigasi bencana, dan kemanusiaan.</p>
            <div class="d-flex justify-content-between align-items-center pt-2 border-top fs-xs">
              <span>Anggota: <strong>65 Siswa</strong></span>
              <span class="badge bg-success">Aktif</span>
            </div>
          </div>
        </div>
        <!-- Eskul 3 -->
        <div class="col-md-4">
          <div class="card p-3 shadow-sm border-0 h-100">
            <div class="d-flex align-items-center gap-3 mb-2">
              <div class="rounded-circle bg-primary-subtle text-primary p-3 fs-4"><i class="bi bi-flag"></i></div>
              <div>
                <h6 class="fw-bold mb-0">Paskibraka Sekolah</h6>
                <div class="text-muted fs-xs">Pembina: Hendra Gunawan, S.Pd</div>
              </div>
            </div>
            <p class="text-muted fs-xs mb-3">Pembinaan baris-berbaris, kedisiplinan, kepemimpinan, dan upacara kenegaraan.</p>
            <div class="d-flex justify-content-between align-items-center pt-2 border-top fs-xs">
              <span>Anggota: <strong>55 Siswa</strong></span>
              <span class="badge bg-success">Aktif</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/components/footer.php'; ?>
