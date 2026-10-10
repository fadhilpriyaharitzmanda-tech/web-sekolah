<?php
/**
 * Kelola Prestasi & Ekstrakurikuler Kesiswaan - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola Kesiswaan - Admin SMKN 2 Karanganyar';
$activeTab = $_GET['tab'] ?? 'prestasi';
$currentPage = ($activeTab === 'ekskul') ? 'kelola-ekskul' : 'kelola-prestasi';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Kesiswaan: Prestasi &amp; Ekstrakurikuler</h1>
      <p class="page-subtitle">Kelola daftar torehan prestasi kejuaraan siswa, kejuaraan LKS, olimpiade vokasi, dan data kegiatan ekstrakurikuler.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../kesiswaan/kesiswaan.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Halaman Kesiswaan Web
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="bukaModalTambahKesiswaan()">
        <i class="bi bi-plus-lg"></i> Tambah Data Baru
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- REKAPITULASI QUICK STATS BAR -->
  <div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Prestasi Juara</span>
          <div class="stat-icon-circle bg-success-subtle text-success">
            <i class="bi bi-trophy-fill"></i>
          </div>
        </div>
        <div class="stat-value text-success">36 Gelar</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span>2023 - 2026 Terkini</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Tingkat Nasional</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-award-fill"></i>
          </div>
        </div>
        <div class="stat-value text-warning">14 Kejuaraan</div>
        <div class="trend-badge text-warning">
          <i class="bi bi-star-fill"></i>
          <span>LKS &amp; Vokasi Nasional</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Ekstrakurikuler Aktif</span>
          <div class="stat-icon-circle bg-primary-subtle text-primary">
            <i class="bi bi-stars"></i>
          </div>
        </div>
        <div class="stat-value text-primary">12 Cabang</div>
        <div class="trend-badge text-primary">
          <i class="bi bi-people-fill"></i>
          <span>7 Eskul Unggulan Utama</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Partisipasi Siswa</span>
          <div class="stat-icon-circle bg-info-subtle text-info">
            <i class="bi bi-person-check-fill"></i>
          </div>
        </div>
        <div class="stat-value text-info">1,420 Siswa</div>
        <div class="trend-badge text-info">
          <i class="bi bi-shield-check"></i>
          <span>Aktif Berorganisasi</span>
        </div>
      </div>
    </div>
  </div>

  <!-- TABS NAV -->
  <ul class="nav nav-pills mb-4" id="kesiswaanTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link <?= ($activeTab === 'prestasi') ? 'active' : '' ?>" id="prestasi-tab" data-bs-toggle="pill" data-bs-target="#tab-prestasi" type="button" role="tab">
        <i class="bi bi-trophy-fill me-1"></i> Prestasi Siswa &amp; Kejuaraan
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link <?= ($activeTab === 'ekskul') ? 'active' : '' ?>" id="ekskul-tab" data-bs-toggle="pill" data-bs-target="#tab-ekskul" type="button" role="tab">
        <i class="bi bi-stars me-1"></i> Ekstrakurikuler Sekolah
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
            <input type="text" class="table-search-input" id="searchPrestasiInput" placeholder="Cari nama lomba, peraih, atau kejuaraan..." onkeyup="filterPrestasiTable()">
          </div>
          <div class="table-filter-group">
            <select class="form-select form-select-sm" id="filterTingkatSelect" onchange="filterPrestasiTable()" style="width: auto;">
              <option value="" selected>Semua Tingkat Kejuaraan</option>
              <option value="Nasional">Tingkat Nasional</option>
              <option value="Provinsi">Tingkat Provinsi</option>
              <option value="Kabupaten">Tingkat Kabupaten</option>
            </select>
            <button class="btn-table-action" type="button" onclick="alert('Data prestasi siswa berhasil diekspor ke Excel!')">
              <i class="bi bi-file-earmark-excel"></i> Unduh Excel
            </button>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table-custom" id="tablePrestasiList">
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
              <!-- Row 1 -->
              <tr>
                <td>
                  <div class="fw-bold text-main">Lomba Kompetensi Siswa (LKS) Bidang Robotika</div>
                  <div class="text-muted fs-xs">Diselenggarakan oleh BPTI Kemendikbudristek</div>
                </td>
                <td><span class="badge bg-primary-subtle text-primary fw-bold">Provinsi</span></td>
                <td><span class="badge bg-success fw-bold"><i class="bi bi-trophy me-1"></i> Juara 1</span></td>
                <td>
                  <div class="fw-bold text-main">Rizki Pratama</div>
                  <div class="text-muted fs-xs">Kelas XII TOT</div>
                </td>
                <td><span class="badge bg-light text-dark border">2024</span></td>
                <td>
                  <div class="d-flex justify-content-center gap-1">
                    <button type="button" class="table-btn-action" title="Edit Prestasi" onclick="editPrestasi('Lomba Kompetensi Siswa (LKS) Bidang Robotika', 'Provinsi', 'Juara 1', 'Rizki Pratama', 'XII TOT', '2024')">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <button type="button" class="table-btn-action delete" title="Hapus Prestasi" onclick="hapusPrestasi(this, 'LKS Robotika')">
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <!-- Row 2 -->
              <tr>
                <td>
                  <div class="fw-bold text-main">Web Technologies Skill Competition</div>
                  <div class="text-muted fs-xs">Kompetisi Front-End &amp; Back-End Nasional</div>
                </td>
                <td><span class="badge bg-warning-subtle text-warning fw-bold">Nasional</span></td>
                <td><span class="badge bg-primary fw-bold"><i class="bi bi-award me-1"></i> Juara 2</span></td>
                <td>
                  <div class="fw-bold text-main">Aditya Nugroho</div>
                  <div class="text-muted fs-xs">Kelas XII RPL</div>
                </td>
                <td><span class="badge bg-light text-dark border">2024</span></td>
                <td>
                  <div class="d-flex justify-content-center gap-1">
                    <button type="button" class="table-btn-action" title="Edit Prestasi" onclick="editPrestasi('Web Technologies Skill Competition', 'Nasional', 'Juara 2', 'Aditya Nugroho', 'XII RPL', '2024')">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <button type="button" class="table-btn-action delete" title="Hapus Prestasi" onclick="hapusPrestasi(this, 'Web Technologies Competition')">
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <!-- Row 3 -->
              <tr>
                <td>
                  <div class="fw-bold text-main">CNC Milling Competition Jawa Tengah</div>
                  <div class="text-muted fs-xs">Kejuaraan Presisi Pemesinan Vokasi</div>
                </td>
                <td><span class="badge bg-primary-subtle text-primary fw-bold">Provinsi</span></td>
                <td><span class="badge bg-success fw-bold"><i class="bi bi-trophy me-1"></i> Juara 1</span></td>
                <td>
                  <div class="fw-bold text-main">Deni Kurnia</div>
                  <div class="text-muted fs-xs">Kelas XII TPM</div>
                </td>
                <td><span class="badge bg-light text-dark border">2023</span></td>
                <td>
                  <div class="d-flex justify-content-center gap-1">
                    <button type="button" class="table-btn-action" title="Edit Prestasi" onclick="editPrestasi('CNC Milling Competition Jawa Tengah', 'Provinsi', 'Juara 1', 'Deni Kurnia', 'XII TPM', '2023')">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <button type="button" class="table-btn-action delete" title="Hapus Prestasi" onclick="hapusPrestasi(this, 'CNC Milling Competition')">
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- TAB EKSKUL -->
    <div class="tab-pane fade <?= ($activeTab === 'ekskul') ? 'show active' : '' ?>" id="tab-ekskul" role="tabpanel">
      <div class="row g-4 mb-4" id="ekskulGridContainer">
        <!-- Eskul 1: Robotik -->
        <div class="col-md-4 ekskul-card-col" id="ekskul-card-1">
          <div class="card p-4 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
            <div>
              <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="d-flex align-items-center gap-3">
                  <div class="rounded-3 bg-success-subtle text-success p-3 fs-3 ekskul-icon-box" style="width: 52px; height: 52px; display:flex; align-items:center; justify-content:center;">
                    <i class="bi bi-cpu"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold mb-0 text-main ekskul-title">Robotik &amp; IoT Club</h6>
                    <div class="text-muted fs-xs ekskul-pembina">Pembina: Eko Prasetyo, S.Kom</div>
                  </div>
                </div>
                <button type="button" class="btn btn-sm py-1 px-2.5 rounded-pill fw-bold border-0 btn-status-ekskul bg-success-subtle text-success" onclick="toggleStatusEkskul(this, 'Robotik &amp; IoT Club')" title="Klik untuk beralih status Aktif / Nonaktif">
                  <i class="bi bi-check-circle-fill me-1"></i> <span class="status-label">Aktif</span>
                </button>
              </div>
              <p class="text-muted fs-sm mb-3 ekskul-desc" style="line-height: 1.55;">Wadah inovasi teknologi robotika, mikrokontroler Arduino/ESP32, dan otomasi industri.</p>
            </div>
            <div class="pt-3 border-top">
              <div class="d-flex justify-content-between align-items-center mb-3 fs-xs text-muted">
                <span>Anggota: <strong class="text-main ekskul-anggota">48 Siswa</strong></span>
                <span>Jadwal: <strong class="text-main ekskul-jadwal">Rabu &amp; Jumat</strong></span>
              </div>
              <div class="d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="bukaModalEditEkskul('ekskul-card-1', 'Robotik &amp; IoT Club', 'Eko Prasetyo, S.Kom', '48 Siswa', 'Rabu &amp; Jumat', 'Wadah inovasi teknologi robotika, mikrokontroler Arduino/ESP32, dan otomasi industri.', 'bi-cpu', 'Aktif')">
                  <i class="bi bi-pencil me-1"></i> Edit
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="bukaModalHapusEkskul('ekskul-card-1', 'Robotik &amp; IoT Club')">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Eskul 2: PMR -->
        <div class="col-md-4 ekskul-card-col" id="ekskul-card-2">
          <div class="card p-4 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
            <div>
              <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="d-flex align-items-center gap-3">
                  <div class="rounded-3 bg-danger-subtle text-danger p-3 fs-3 ekskul-icon-box" style="width: 52px; height: 52px; display:flex; align-items:center; justify-content:center;">
                    <i class="bi bi-heart-pulse"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold mb-0 text-main ekskul-title">PMR Wira (Palang Merah)</h6>
                    <div class="text-muted fs-xs ekskul-pembina">Pembina: Dra. Haryati</div>
                  </div>
                </div>
                <button type="button" class="btn btn-sm py-1 px-2.5 rounded-pill fw-bold border-0 btn-status-ekskul bg-success-subtle text-success" onclick="toggleStatusEkskul(this, 'PMR Wira (Palang Merah)')" title="Klik untuk beralih status Aktif / Nonaktif">
                  <i class="bi bi-check-circle-fill me-1"></i> <span class="status-label">Aktif</span>
                </button>
              </div>
              <p class="text-muted fs-sm mb-3 ekskul-desc" style="line-height: 1.55;">Kegiatan pertolongan pertama, donor darah sukarela, mitigasi bencana, dan bakti sosial kemanusiaan.</p>
            </div>
            <div class="pt-3 border-top">
              <div class="d-flex justify-content-between align-items-center mb-3 fs-xs text-muted">
                <span>Anggota: <strong class="text-main ekskul-anggota">65 Siswa</strong></span>
                <span>Jadwal: <strong class="text-main ekskul-jadwal">Kamis</strong></span>
              </div>
              <div class="d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="bukaModalEditEkskul('ekskul-card-2', 'PMR Wira (Palang Merah)', 'Dra. Haryati', '65 Siswa', 'Kamis', 'Kegiatan pertolongan pertama, donor darah sukarela, mitigasi bencana, dan bakti sosial kemanusiaan.', 'bi-heart-pulse', 'Aktif')">
                  <i class="bi bi-pencil me-1"></i> Edit
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="bukaModalHapusEkskul('ekskul-card-2', 'PMR Wira (Palang Merah)')">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Eskul 3: Paskibraka -->
        <div class="col-md-4 ekskul-card-col" id="ekskul-card-3">
          <div class="card p-4 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
            <div>
              <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="d-flex align-items-center gap-3">
                  <div class="rounded-3 bg-primary-subtle text-primary p-3 fs-3 ekskul-icon-box" style="width: 52px; height: 52px; display:flex; align-items:center; justify-content:center;">
                    <i class="bi bi-flag"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold mb-0 text-main ekskul-title">Paskibraka Sekolah</h6>
                    <div class="text-muted fs-xs ekskul-pembina">Pembina: Hendra Gunawan, S.Pd</div>
                  </div>
                </div>
                <button type="button" class="btn btn-sm py-1 px-2.5 rounded-pill fw-bold border-0 btn-status-ekskul bg-success-subtle text-success" onclick="toggleStatusEkskul(this, 'Paskibraka Sekolah')" title="Klik untuk beralih status Aktif / Nonaktif">
                  <i class="bi bi-check-circle-fill me-1"></i> <span class="status-label">Aktif</span>
                </button>
              </div>
              <p class="text-muted fs-sm mb-3 ekskul-desc" style="line-height: 1.55;">Pembinaan baris-berbaris presisi, kedisiplinan mental, kepemimpinan karakter, dan upacara kenegaraan.</p>
            </div>
            <div class="pt-3 border-top">
              <div class="d-flex justify-content-between align-items-center mb-3 fs-xs text-muted">
                <span>Anggota: <strong class="text-main ekskul-anggota">55 Siswa</strong></span>
                <span>Jadwal: <strong class="text-main ekskul-jadwal">Selasa &amp; Sabtu</strong></span>
              </div>
              <div class="d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="bukaModalEditEkskul('ekskul-card-3', 'Paskibraka Sekolah', 'Hendra Gunawan, S.Pd', '55 Siswa', 'Selasa &amp; Sabtu', 'Pembinaan baris-berbaris presisi, kedisiplinan mental, kepemimpinan karakter, dan upacara kenegaraan.', 'bi-flag', 'Aktif')">
                  <i class="bi bi-pencil me-1"></i> Edit
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="bukaModalHapusEkskul('ekskul-card-3', 'Paskibraka Sekolah')">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- END: .main-wrapper -->

<!-- Modal Tambah Prestasi -->
<div class="modal fade" id="modalTambahPrestasi" tabindex="-1" aria-labelledby="modalTambahPrestasiLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTambahPrestasiLabel">
          <i class="bi bi-trophy-fill text-success"></i> Tambah Torehan Prestasi Siswa
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahPrestasi">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label-custom" for="tambahNamaLomba">Nama Prestasi / Perlombaan / Kejuaraan</label>
              <input type="text" class="form-control-custom" id="tambahNamaLomba" placeholder="Contoh: Lomba Kompetensi Siswa (LKS) Bidang IT Network Systems" required>
              <div class="form-text-custom">Tuliskan nama ajang kejuaraan resmi yang diselenggarakan.</div>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahTingkatLomba">Tingkat Kejuaraan</label>
              <select class="form-select-custom" id="tambahTingkatLomba">
                <option value="Nasional">Tingkat Nasional (Kemendikbud)</option>
                <option value="Provinsi" selected>Tingkat Provinsi Jawa Tengah</option>
                <option value="Kabupaten">Tingkat Kabupaten / Karesidenan</option>
                <option value="Internasional">Tingkat Internasional</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahPeringkatLomba">Peringkat / Medali</label>
              <input type="text" class="form-control-custom" id="tambahPeringkatLomba" placeholder="Juara 1 / Medali Emas" value="Juara 1">
            </div>

            <div class="col-md-7">
              <label class="form-label-custom" for="tambahNamaSiswaLomba">Nama Siswa Peraih Prestasi</label>
              <input type="text" class="form-control-custom" id="tambahNamaSiswaLomba" placeholder="Contoh: Ahmad Fauzan" required>
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="tambahKelasSiswaLomba">Kelas &amp; Jurusan</label>
              <input type="text" class="form-control-custom" id="tambahKelasSiswaLomba" placeholder="XII RPL 1">
            </div>
            <div class="col-md-2">
              <label class="form-label-custom" for="tambahTahunLomba">Tahun</label>
              <input type="number" class="form-control-custom" id="tambahTahunLomba" value="<?= date('Y') ?>">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanTambahPrestasi()">
          <i class="bi bi-check-circle-fill"></i> Simpan Prestasi
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Prestasi -->
<div class="modal fade" id="modalEditPrestasi" tabindex="-1" aria-labelledby="modalEditPrestasiLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalEditPrestasiLabel">
          <i class="bi bi-pencil-square text-success"></i> Edit Data Prestasi Siswa
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditPrestasi">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label-custom" for="editNamaLomba">Nama Kejuaraan</label>
              <input type="text" class="form-control-custom" id="editNamaLomba" required>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editTingkatLomba">Tingkat</label>
              <select class="form-select-custom" id="editTingkatLomba">
                <option value="Nasional">Tingkat Nasional</option>
                <option value="Provinsi">Tingkat Provinsi</option>
                <option value="Kabupaten">Tingkat Kabupaten</option>
                <option value="Internasional">Tingkat Internasional</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editPeringkatLomba">Peringkat / Medali</label>
              <input type="text" class="form-control-custom" id="editPeringkatLomba">
            </div>
            <div class="col-md-7">
              <label class="form-label-custom" for="editNamaSiswaLomba">Nama Siswa</label>
              <input type="text" class="form-control-custom" id="editNamaSiswaLomba">
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="editKelasSiswaLomba">Kelas</label>
              <input type="text" class="form-control-custom" id="editKelasSiswaLomba">
            </div>
            <div class="col-md-2">
              <label class="form-label-custom" for="editTahunLomba">Tahun</label>
              <input type="number" class="form-control-custom" id="editTahunLomba">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanEditPrestasi()">
          <i class="bi bi-save-fill"></i> Perbarui Prestasi
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Ekstrakurikuler -->
<div class="modal fade" id="modalTambahEkskul" tabindex="-1" aria-labelledby="modalTambahEkskulLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTambahEkskulLabel">
          <i class="bi bi-stars text-success"></i> Tambah Ekstrakurikuler Baru
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahEkskul">
          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label-custom" for="tambahNamaEkskul">Nama Ekstrakurikuler</label>
              <input type="text" class="form-control-custom" id="tambahNamaEkskul" placeholder="Contoh: English Conversation Club" required>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="tambahStatusEkskul">Status Awal</label>
              <select class="form-select-custom" id="tambahStatusEkskul">
                <option value="Aktif" selected>Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahPembinaEkskul">Guru Pembina</label>
              <input type="text" class="form-control-custom" id="tambahPembinaEkskul" placeholder="Contoh: Dra. Sri Wahyuni" required>
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="tambahAnggotaEkskul">Jumlah Anggota</label>
              <input type="text" class="form-control-custom" id="tambahAnggotaEkskul" placeholder="Contoh: 35 Siswa" value="30 Siswa">
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="tambahJadwalEkskul">Jadwal Latihan</label>
              <input type="text" class="form-control-custom" id="tambahJadwalEkskul" placeholder="Contoh: Jumat Sore" value="Sabtu Pagi">
            </div>
            <div class="col-12">
              <label class="form-label-custom" for="tambahDeskripsiEkskul">Deskripsi Kegiatan</label>
              <textarea class="form-control-custom" id="tambahDeskripsiEkskul" rows="3" placeholder="Tulis deskripsi visi, fokus kegiatan, dan capaian ekstrakurikuler..."></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanTambahEkskul()">
          <i class="bi bi-check-circle-fill"></i> Simpan Ekstrakurikuler
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Ekstrakurikuler -->
<div class="modal fade" id="modalEditEkskul" tabindex="-1" aria-labelledby="modalEditEkskulLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalEditEkskulLabel">
          <i class="bi bi-pencil-square text-success"></i> Edit Data Ekstrakurikuler
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditEkskul">
          <input type="hidden" id="editEkskulTargetCardId">
          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label-custom" for="editNamaEkskul">Nama Ekstrakurikuler</label>
              <input type="text" class="form-control-custom" id="editNamaEkskul" required>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="editStatusEkskul">Status</label>
              <select class="form-select-custom" id="editStatusEkskul">
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editPembinaEkskul">Guru Pembina</label>
              <input type="text" class="form-control-custom" id="editPembinaEkskul" required>
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="editAnggotaEkskul">Jumlah Anggota</label>
              <input type="text" class="form-control-custom" id="editAnggotaEkskul">
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="editJadwalEkskul">Jadwal Latihan</label>
              <input type="text" class="form-control-custom" id="editJadwalEkskul">
            </div>
            <div class="col-12">
              <label class="form-label-custom" for="editDeskripsiEkskul">Deskripsi Kegiatan</label>
              <textarea class="form-control-custom" id="editDeskripsiEkskul" rows="3"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanEditEkskul()">
          <i class="bi bi-save-fill"></i> Perbarui Ekstrakurikuler
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus Ekstrakurikuler -->
<div class="modal fade" id="modalHapusEkskul" tabindex="-1" aria-labelledby="modalHapusEkskulLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-danger" id="modalHapusEkskulLabel">
          <i class="bi bi-exclamation-triangle-fill me-2"></i> Konfirmasi Hapus
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-3">
        <input type="hidden" id="hapusEkskulTargetCardId">
        <p class="mb-1">Apakah Anda yakin ingin menghapus ekstrakurikuler <strong id="hapusEkskulNamaText"></strong>?</p>
        <div class="text-muted fs-xs">Data kegiatan dan keanggotaan ekstrakurikuler ini akan dihapus dari sistem.</div>
      </div>
      <div class="modal-footer border-0 pt-0">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger btn-sm" onclick="konfirmasiHapusEkskul()">
          <i class="bi bi-trash-fill me-1"></i> Hapus Ekstrakurikuler
        </button>
      </div>
    </div>
  </div>
</div>

<script>
// Tab sync with sidebar & URL
document.addEventListener('DOMContentLoaded', function() {
  const ekskulTabBtn = document.getElementById('ekskul-tab');
  const prestasiTabBtn = document.getElementById('prestasi-tab');
  const menuEkskul = document.getElementById('menu-ekskul');
  const menuPrestasi = document.getElementById('menu-prestasi');

  if (ekskulTabBtn) {
    ekskulTabBtn.addEventListener('shown.bs.tab', function () {
      if (menuPrestasi) menuPrestasi.classList.remove('active');
      if (menuEkskul) menuEkskul.classList.add('active');
      window.history.replaceState(null, null, '?tab=ekskul');
    });
  }

  if (prestasiTabBtn) {
    prestasiTabBtn.addEventListener('shown.bs.tab', function () {
      if (menuEkskul) menuEkskul.classList.remove('active');
      if (menuPrestasi) menuPrestasi.classList.add('active');
      window.history.replaceState(null, null, '?tab=prestasi');
    });
  }
});

// Toggle Status button on Ekskul card (Aktif / Nonaktif)
function toggleStatusEkskul(btn, nama) {
  const isAktif = btn.classList.contains('bg-success-subtle');
  const statusLabel = btn.querySelector('.status-label');
  const icon = btn.querySelector('i');

  if (isAktif) {
    btn.classList.remove('bg-success-subtle', 'text-success');
    btn.classList.add('bg-secondary-subtle', 'text-secondary');
    if (statusLabel) statusLabel.textContent = 'Nonaktif';
    if (icon) {
      icon.className = 'bi bi-slash-circle me-1';
    }
    alert('Status ' + nama + ' diubah menjadi Nonaktif.');
  } else {
    btn.classList.remove('bg-secondary-subtle', 'text-secondary');
    btn.classList.add('bg-success-subtle', 'text-success');
    if (statusLabel) statusLabel.textContent = 'Aktif';
    if (icon) {
      icon.className = 'bi bi-check-circle-fill me-1';
    }
    alert('Status ' + nama + ' diubah menjadi Aktif.');
  }
}

// Open modal tambah depending on active tab
function bukaModalTambahKesiswaan() {
  const isEkskul = document.getElementById('tab-ekskul').classList.contains('active');
  if (isEkskul) {
    const modalEl = document.getElementById('modalTambahEkskul');
    const modal = new bootstrap.Modal(modalEl);
    modal.show();
  } else {
    const modalEl = document.getElementById('modalTambahPrestasi');
    const modal = new bootstrap.Modal(modalEl);
    modal.show();
  }
}

// Ekskul Edit Modal
function bukaModalEditEkskul(cardId, nama, pembina, anggota, jadwal, deskripsi, status) {
  document.getElementById('editEkskulTargetCardId').value = cardId;
  document.getElementById('editNamaEkskul').value = nama;
  document.getElementById('editPembinaEkskul').value = pembina.replace('Pembina: ', '');
  document.getElementById('editAnggotaEkskul').value = anggota;
  document.getElementById('editJadwalEkskul').value = jadwal;
  document.getElementById('editDeskripsiEkskul').value = deskripsi;
  document.getElementById('editStatusEkskul').value = status;

  const modalEl = document.getElementById('modalEditEkskul');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function simpanEditEkskul() {
  const cardId = document.getElementById('editEkskulTargetCardId').value;
  const nama = document.getElementById('editNamaEkskul').value.trim();
  const pembina = document.getElementById('editPembinaEkskul').value.trim();
  const anggota = document.getElementById('editAnggotaEkskul').value.trim();
  const jadwal = document.getElementById('editJadwalEkskul').value.trim();
  const deskripsi = document.getElementById('editDeskripsiEkskul').value.trim();
  const status = document.getElementById('editStatusEkskul').value;

  if (!nama) {
    alert('Nama ekstrakurikuler wajib diisi!');
    return;
  }

  const card = document.getElementById(cardId);
  if (card) {
    const titleEl = card.querySelector('.ekskul-title');
    const pembinaEl = card.querySelector('.ekskul-pembina');
    const descEl = card.querySelector('.ekskul-desc');
    const anggotaEl = card.querySelector('.ekskul-anggota');
    const jadwalEl = card.querySelector('.ekskul-jadwal');
    const statusBtn = card.querySelector('.btn-status-ekskul');

    if (titleEl) titleEl.textContent = nama;
    if (pembinaEl) pembinaEl.textContent = 'Pembina: ' + pembina;
    if (descEl) descEl.textContent = deskripsi;
    if (anggotaEl) anggotaEl.textContent = anggota;
    if (jadwalEl) jadwalEl.textContent = jadwal;

    if (statusBtn) {
      const statusLabel = statusBtn.querySelector('.status-label');
      const icon = statusBtn.querySelector('i');
      if (status === 'Aktif') {
        statusBtn.className = 'btn btn-sm py-1 px-2.5 rounded-pill fw-bold border-0 btn-status-ekskul bg-success-subtle text-success';
        if (statusLabel) statusLabel.textContent = 'Aktif';
        if (icon) icon.className = 'bi bi-check-circle-fill me-1';
      } else {
        statusBtn.className = 'btn btn-sm py-1 px-2.5 rounded-pill fw-bold border-0 btn-status-ekskul bg-secondary-subtle text-secondary';
        if (statusLabel) statusLabel.textContent = 'Nonaktif';
        if (icon) icon.className = 'bi bi-slash-circle me-1';
      }
    }
  }

  const modalEl = document.getElementById('modalEditEkskul');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  alert('Ekstrakurikuler "' + nama + '" berhasil diperbarui!');
}

// Ekskul Tambah Modal
function simpanTambahEkskul() {
  const nama = document.getElementById('tambahNamaEkskul').value.trim();
  const pembina = document.getElementById('tambahPembinaEkskul').value.trim();
  const anggota = document.getElementById('tambahAnggotaEkskul').value.trim() || '25 Siswa';
  const jadwal = document.getElementById('tambahJadwalEkskul').value.trim() || 'Sabtu';
  const deskripsi = document.getElementById('tambahDeskripsiEkskul').value.trim() || 'Kegiatan ekstrakurikuler pengembangan bakat minat siswa.';
  const status = document.getElementById('tambahStatusEkskul').value;

  if (!nama || !pembina) {
    alert('Nama ekstrakurikuler dan guru pembina wajib diisi!');
    return;
  }

  const container = document.getElementById('ekskulGridContainer');
  const newId = 'ekskul-card-' + Date.now();
  const isAktif = status === 'Aktif';

  const col = document.createElement('div');
  col.className = 'col-md-4 ekskul-card-col';
  col.id = newId;
  col.innerHTML = `
    <div class="card p-4 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
      <div>
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div class="d-flex align-items-center gap-3">
            <div class="rounded-3 bg-primary-subtle text-primary p-3 fs-3 ekskul-icon-box" style="width: 52px; height: 52px; display:flex; align-items:center; justify-content:center;">
              <i class="bi bi-star-fill"></i>
            </div>
            <div>
              <h6 class="fw-bold mb-0 text-main ekskul-title">${nama}</h6>
              <div class="text-muted fs-xs ekskul-pembina">Pembina: ${pembina}</div>
            </div>
          </div>
          <button type="button" class="btn btn-sm py-1 px-2.5 rounded-pill fw-bold border-0 btn-status-ekskul ${isAktif ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary'}" onclick="toggleStatusEkskul(this, '${nama}')" title="Klik untuk beralih status Aktif / Nonaktif">
            <i class="bi ${isAktif ? 'bi-check-circle-fill' : 'bi-slash-circle'} me-1"></i> <span class="status-label">${status}</span>
          </button>
        </div>
        <p class="text-muted fs-sm mb-3 ekskul-desc" style="line-height: 1.55;">${deskripsi}</p>
      </div>
      <div class="pt-3 border-top">
        <div class="d-flex justify-content-between align-items-center mb-3 fs-xs text-muted">
          <span>Anggota: <strong class="text-main ekskul-anggota">${anggota}</strong></span>
          <span>Jadwal: <strong class="text-main ekskul-jadwal">${jadwal}</strong></span>
        </div>
        <div class="d-flex justify-content-end gap-2">
          <button type="button" class="btn btn-sm btn-outline-secondary" onclick="bukaModalEditEkskul('${newId}', '${nama}', '${pembina}', '${anggota}', '${jadwal}', '${deskripsi}', '${status}')">
            <i class="bi bi-pencil me-1"></i> Edit
          </button>
          <button type="button" class="btn btn-sm btn-outline-danger" onclick="bukaModalHapusEkskul('${newId}', '${nama}')">
            <i class="bi bi-trash"></i>
          </button>
        </div>
      </div>
    </div>
  `;

  container.prepend(col);

  const modalEl = document.getElementById('modalTambahEkskul');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  document.getElementById('formTambahEkskul').reset();
  alert('Ekstrakurikuler "' + nama + '" berhasil ditambahkan!');
}

// Ekskul Hapus Modal
function bukaModalHapusEkskul(cardId, nama) {
  document.getElementById('hapusEkskulTargetCardId').value = cardId;
  document.getElementById('hapusEkskulNamaText').textContent = nama;
  const modalEl = document.getElementById('modalHapusEkskul');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function konfirmasiHapusEkskul() {
  const cardId = document.getElementById('hapusEkskulTargetCardId').value;
  const nama = document.getElementById('hapusEkskulNamaText').textContent;
  const modalEl = document.getElementById('modalHapusEkskul');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();

  const card = document.getElementById(cardId);
  if (card) {
    card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
    card.style.opacity = '0';
    card.style.transform = 'scale(0.95)';
    setTimeout(() => {
      card.remove();
      alert('Ekstrakurikuler "' + nama + '" berhasil dihapus.');
    }, 300);
  }
}

// Prestasi functions
function editPrestasi(lomba, tingkat, peringkat, siswa, kelas, tahun) {
  document.getElementById('editNamaLomba').value = lomba;
  document.getElementById('editTingkatLomba').value = tingkat;
  document.getElementById('editPeringkatLomba').value = peringkat;
  document.getElementById('editNamaSiswaLomba').value = siswa;
  document.getElementById('editKelasSiswaLomba').value = kelas;
  document.getElementById('editTahunLomba').value = tahun;

  const modalEl = document.getElementById('modalEditPrestasi');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function simpanTambahPrestasi() {
  const lomba = document.getElementById('tambahNamaLomba').value;
  if (!lomba) {
    alert('Silakan masukkan nama kejuaraan!');
    return;
  }
  const modalEl = document.getElementById('modalTambahPrestasi');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  alert('Prestasi "' + lomba + '" berhasil disimpan ke rekapitulasi sekolah!');
}

function simpanEditPrestasi() {
  const lomba = document.getElementById('editNamaLomba').value;
  const modalEl = document.getElementById('modalEditPrestasi');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  alert('Data prestasi "' + lomba + '" berhasil diperbarui!');
}

function hapusPrestasi(btn, lomba) {
  if (confirm('Hapus torehan prestasi: ' + lomba + '?')) {
    const row = btn.closest('tr');
    if (row) {
      row.style.opacity = '0.3';
      setTimeout(() => {
        row.remove();
        alert('Prestasi ' + lomba + ' berhasil dihapus.');
      }, 250);
    }
  }
}

function filterPrestasiTable() {
  const query = (document.getElementById('searchPrestasiInput').value || '').toLowerCase();
  const filter = (document.getElementById('filterTingkatSelect').value || '').toLowerCase();
  const rows = document.querySelectorAll('#tablePrestasiList tbody tr');

  rows.forEach(row => {
    const text = row.textContent.toLowerCase();
    const matchQuery = !query || text.includes(query);
    const matchFilter = !filter || text.includes(filter);
    if (matchQuery && matchFilter) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
}
</script>

<?php include __DIR__ . '/components/footer.php'; ?>
