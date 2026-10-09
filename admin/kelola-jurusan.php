<?php
/**
 * Kelola Jurusan Unggulan - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola Jurusan Unggulan - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-jurusan';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Kelola Jurusan Unggulan</h1>
      <p class="page-subtitle">Manajemen kompetensi keahlian vokasi, kurikulum industri, kuota siswa baru, dan kartu ilustrasi 3D di landing page.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../akademik/jurusan.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Lihat Halaman Jurusan
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalTambahJurusan">
        <i class="bi bi-plus-lg"></i> Tambah Jurusan
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- REKAPITULASI QUICK STATS BAR -->
  <div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Jurusan Aktif</span>
          <div class="stat-icon-circle bg-success-subtle text-success">
            <i class="bi bi-cpu-fill"></i>
          </div>
        </div>
        <div class="stat-value text-success">4 Program</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span>100% Terakreditasi A</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Kuota Baru</span>
          <div class="stat-icon-circle bg-primary-subtle text-primary">
            <i class="bi bi-people-fill"></i>
          </div>
        </div>
        <div class="stat-value text-primary">396 Siswa</div>
        <div class="trend-badge text-primary">
          <i class="bi bi-grid-fill"></i>
          <span>11 Rombel Total</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Akreditasi BAN-SM</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-patch-check-fill"></i>
          </div>
        </div>
        <div class="stat-value text-warning">Predikat A</div>
        <div class="trend-badge text-warning">
          <i class="bi bi-star-fill"></i>
          <span>Skor Unggul Paripurna</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Mitra Industri Terikat</span>
          <div class="stat-icon-circle bg-info-subtle text-info">
            <i class="bi bi-building-check"></i>
          </div>
        </div>
        <div class="stat-value text-info">45+ DUDI</div>
        <div class="trend-badge text-info">
          <i class="bi bi-shield-check"></i>
          <span>Kelas Industri &amp; PKL</span>
        </div>
      </div>
    </div>
  </div>

  <!-- CONTROL SEARCH BAR -->
  <div class="table-card-custom mb-4 p-3 d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div class="table-search-box flex-grow-1" style="max-width: 480px;">
      <i class="bi bi-search table-search-icon"></i>
      <input type="text" class="table-search-input" id="searchJurusanInput" placeholder="Cari nama jurusan, singkatan, atau kaprodi..." onkeyup="filterJurusanCards()">
    </div>
    <div class="d-flex align-items-center gap-2">
      <span class="fs-xs text-muted-green fw-semibold"><i class="bi bi-grid me-1"></i> Tampilan: 4 Jurusan Unggulan</span>
    </div>
  </div>

  <!-- JURUSAN GRID LIST -->
  <div class="row g-4 mb-4" id="jurusanCardContainer">
    <!-- Card 1: RPL -->
    <div class="col-xl-6 jurusan-item">
      <div class="card p-4 h-100 shadow-sm border-0 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
        <div>
          <!-- Header Card -->
          <div class="d-flex align-items-start justify-content-between mb-3 pb-3 border-bottom">
            <div class="d-flex align-items-center gap-3">
              <div class="rounded-3 p-2" style="background: rgba(74, 222, 128, 0.15); width: 62px; height: 62px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(74, 222, 128, 0.3);">
                <img src="../images/3d-rpl.png" alt="RPL" style="max-width: 46px; max-height: 46px; object-fit: contain;" onerror="this.src='../logo/smkn2kra.png'">
              </div>
              <div>
                <span class="badge bg-success-subtle text-success mb-1" style="font-size: 0.72rem; letter-spacing: 0.03em;">RPL &bull; TERAKREDITASI A</span>
                <h5 class="fw-bold mb-1 text-main" style="font-size: 1.15rem;">Rekayasa Perangkat Lunak</h5>
                <div class="text-muted fs-xs d-flex align-items-center gap-1">
                  <i class="bi bi-person-badge text-success"></i> Kaprodi: <strong>Bpk. Eko Prasetyo, S.Kom., M.Cs.</strong>
                </div>
              </div>
            </div>
            <div class="dropdown">
              <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 34px; height: 34px; padding: 0;">
                <i class="bi bi-three-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="editJurusan('Rekayasa Perangkat Lunak', 'RPL', '#4ADE80', '108', 'Bpk. Eko Prasetyo, S.Kom., M.Cs.', 'Mempelajari pengembangan aplikasi web modern, pemrograman perangkat bergerak (mobile apps), database arsitektur, dan sistem informasi perusahaan.')"><i class="bi bi-pencil me-2 text-primary"></i> Edit Jurusan</a></li>
                <li><a class="dropdown-item" href="../akademik/jurusan.php" target="_blank"><i class="bi bi-eye me-2 text-success"></i> Lihat di Website</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="nonaktifkanJurusan('Rekayasa Perangkat Lunak')"><i class="bi bi-slash-circle me-2"></i> Nonaktifkan</a></li>
              </ul>
            </div>
          </div>

          <!-- Description -->
          <p class="text-muted fs-sm mb-3" style="line-height: 1.6; min-height: 48px;">
            Mempelajari tentang siklus lengkap rekayasa perangkat lunak modern, pengembangan aplikasi web fullstack, mobile apps Android/iOS, basis data relasional, dan integrasi IoT skala industri.
          </p>

          <!-- Competencies pills -->
          <div class="d-flex flex-wrap gap-1 mb-3">
            <span class="badge bg-light text-dark border fs-xs">Web Dev</span>
            <span class="badge bg-light text-dark border fs-xs">Mobile Flutter</span>
            <span class="badge bg-light text-dark border fs-xs">Cloud Computing</span>
            <span class="badge bg-light text-dark border fs-xs">UI/UX Design</span>
          </div>
        </div>

        <!-- Footer Card -->
        <div class="pt-3 border-top">
          <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2 fs-xs">
            <div><span class="text-muted">Kuota Penerimaan:</span> <strong class="text-main">108 Siswa</strong> <span class="text-muted">(3 Rombel)</span></div>
            <div class="d-flex align-items-center gap-1">
              <span class="text-muted">Aksen Warna:</span>
              <span class="badge d-inline-flex align-items-center gap-1" style="background:#4ade80; color:#072F1F; font-weight:700;">
                <span style="display:inline-block; width:8px; height:8px; background:#072F1F; border-radius:50%;"></span> #4ADE80
              </span>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center pt-2">
            <span class="badge bg-success-subtle text-success d-inline-flex align-items-center gap-1">
              <i class="bi bi-check-circle-fill"></i> Tampil di Landing Page
            </span>
            <div class="d-flex gap-2">
              <button type="button" class="btn btn-sm btn-outline-secondary" onclick="editJurusan('Rekayasa Perangkat Lunak', 'RPL', '#4ADE80', '108', 'Bpk. Eko Prasetyo, S.Kom., M.Cs.', 'Mempelajari pengembangan aplikasi web modern, pemrograman perangkat bergerak (mobile apps), database arsitektur, dan sistem informasi perusahaan.')">
                <i class="bi bi-pencil me-1"></i> Edit
              </button>
              <a href="../akademik/jurusan.php" target="_blank" class="btn btn-sm btn-outline-success">
                <i class="bi bi-eye"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2: Mesin -->
    <div class="col-xl-6 jurusan-item">
      <div class="card p-4 h-100 shadow-sm border-0 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
        <div>
          <!-- Header Card -->
          <div class="d-flex align-items-start justify-content-between mb-3 pb-3 border-bottom">
            <div class="d-flex align-items-center gap-3">
              <div class="rounded-3 p-2" style="background: rgba(96, 165, 250, 0.15); width: 62px; height: 62px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(96, 165, 250, 0.3);">
                <img src="../images/3d-mesin.png" alt="Mesin" style="max-width: 46px; max-height: 46px; object-fit: contain;" onerror="this.src='../logo/smkn2kra.png'">
              </div>
              <div>
                <span class="badge bg-primary-subtle text-primary mb-1" style="font-size: 0.72rem; letter-spacing: 0.03em;">TPM &bull; TERAKREDITASI A</span>
                <h5 class="fw-bold mb-1 text-main" style="font-size: 1.15rem;">Teknik Pemesinan</h5>
                <div class="text-muted fs-xs d-flex align-items-center gap-1">
                  <i class="bi bi-person-badge text-primary"></i> Kaprodi: <strong>Bpk. Bambang Sutrisno, S.T., M.T.</strong>
                </div>
              </div>
            </div>
            <div class="dropdown">
              <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 34px; height: 34px; padding: 0;">
                <i class="bi bi-three-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="editJurusan('Teknik Pemesinan', 'TPM', '#60A5FA', '144', 'Bpk. Bambang Sutrisno, S.T., M.T.', 'Mempelajari fabrikasi logam presisi, permesinan konvensional (bubut, frais, gerinda), serta pemrograman mesin CNC modern berstandar industri internasional.')"><i class="bi bi-pencil me-2 text-primary"></i> Edit Jurusan</a></li>
                <li><a class="dropdown-item" href="../akademik/jurusan.php" target="_blank"><i class="bi bi-eye me-2 text-success"></i> Lihat di Website</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="nonaktifkanJurusan('Teknik Pemesinan')"><i class="bi bi-slash-circle me-2"></i> Nonaktifkan</a></li>
              </ul>
            </div>
          </div>

          <!-- Description -->
          <p class="text-muted fs-sm mb-3" style="line-height: 1.6; min-height: 48px;">
            Mempelajari tentang cara memproduksi komponen manufaktur teknik menggunakan mesin perkakas konvensional maupun CNC Computer Numerical Control canggih sesuai standar manufaktur global.
          </p>

          <!-- Competencies pills -->
          <div class="d-flex flex-wrap gap-1 mb-3">
            <span class="badge bg-light text-dark border fs-xs">CNC Milling</span>
            <span class="badge bg-light text-dark border fs-xs">Bubut Presisi</span>
            <span class="badge bg-light text-dark border fs-xs">CAD / CAM SolidWorks</span>
            <span class="badge bg-light text-dark border fs-xs">Quality Inspection</span>
          </div>
        </div>

        <!-- Footer Card -->
        <div class="pt-3 border-top">
          <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2 fs-xs">
            <div><span class="text-muted">Kuota Penerimaan:</span> <strong class="text-main">144 Siswa</strong> <span class="text-muted">(4 Rombel)</span></div>
            <div class="d-flex align-items-center gap-1">
              <span class="text-muted">Aksen Warna:</span>
              <span class="badge d-inline-flex align-items-center gap-1" style="background:#60a5fa; color:#0B130F; font-weight:700;">
                <span style="display:inline-block; width:8px; height:8px; background:#0B130F; border-radius:50%;"></span> #60A5FA
              </span>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center pt-2">
            <span class="badge bg-success-subtle text-success d-inline-flex align-items-center gap-1">
              <i class="bi bi-check-circle-fill"></i> Tampil di Landing Page
            </span>
            <div class="d-flex gap-2">
              <button type="button" class="btn btn-sm btn-outline-secondary" onclick="editJurusan('Teknik Pemesinan', 'TPM', '#60A5FA', '144', 'Bpk. Bambang Sutrisno, S.T., M.T.', 'Mempelajari fabrikasi logam presisi, permesinan konvensional (bubut, frais, gerinda), serta pemrograman mesin CNC modern berstandar industri internasional.')">
                <i class="bi bi-pencil me-1"></i> Edit
              </button>
              <a href="../akademik/jurusan.php" target="_blank" class="btn btn-sm btn-outline-success">
                <i class="bi bi-eye"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 3: Tekstil -->
    <div class="col-xl-6 jurusan-item">
      <div class="card p-4 h-100 shadow-sm border-0 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
        <div>
          <!-- Header Card -->
          <div class="d-flex align-items-start justify-content-between mb-3 pb-3 border-bottom">
            <div class="d-flex align-items-center gap-3">
              <div class="rounded-3 p-2" style="background: rgba(251, 146, 60, 0.15); width: 62px; height: 62px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(251, 146, 60, 0.3);">
                <img src="../images/3d-tekstil.png" alt="Tekstil" style="max-width: 46px; max-height: 46px; object-fit: contain;" onerror="this.src='../logo/smkn2kra.png'">
              </div>
              <div>
                <span class="badge bg-warning-subtle text-warning mb-1" style="font-size: 0.72rem; letter-spacing: 0.03em;">TPK &bull; TERAKREDITASI A</span>
                <h5 class="fw-bold mb-1 text-main" style="font-size: 1.15rem;">Teknik Pembuatan Kain</h5>
                <div class="text-muted fs-xs d-flex align-items-center gap-1">
                  <i class="bi bi-person-badge text-warning"></i> Kaprodi: <strong>Ibu Sri Wahyuni, S.T.</strong>
                </div>
              </div>
            </div>
            <div class="dropdown">
              <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 34px; height: 34px; padding: 0;">
                <i class="bi bi-three-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="editJurusan('Teknik Pembuatan Kain', 'TPK', '#FB923C', '72', 'Ibu Sri Wahyuni, S.T.', 'Mempelajari konstruksi dan desain tenun, operasional mesin tenun berkecepatan tinggi, proses finishing kain, dan laboratorium uji standar mutu tekstil ekspor.')"><i class="bi bi-pencil me-2 text-primary"></i> Edit Jurusan</a></li>
                <li><a class="dropdown-item" href="../akademik/jurusan.php" target="_blank"><i class="bi bi-eye me-2 text-success"></i> Lihat di Website</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="nonaktifkanJurusan('Teknik Pembuatan Kain')"><i class="bi bi-slash-circle me-2"></i> Nonaktifkan</a></li>
              </ul>
            </div>
          </div>

          <!-- Description -->
          <p class="text-muted fs-sm mb-3" style="line-height: 1.6; min-height: 48px;">
            Mempelajari tentang desain tenun tekstil modern, mesin pembuatan kain shuttleless otomatis, perawatan preventif mesin industri tekstil, dan jaminan mutu kain kualitas ekspor.
          </p>

          <!-- Competencies pills -->
          <div class="d-flex flex-wrap gap-1 mb-3">
            <span class="badge bg-light text-dark border fs-xs">Desain Tenun</span>
            <span class="badge bg-light text-dark border fs-xs">Mesin Air Jet Loom</span>
            <span class="badge bg-light text-dark border fs-xs">Quality Control Kain</span>
            <span class="badge bg-light text-dark border fs-xs">Manajemen Garmen</span>
          </div>
        </div>

        <!-- Footer Card -->
        <div class="pt-3 border-top">
          <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2 fs-xs">
            <div><span class="text-muted">Kuota Penerimaan:</span> <strong class="text-main">72 Siswa</strong> <span class="text-muted">(2 Rombel)</span></div>
            <div class="d-flex align-items-center gap-1">
              <span class="text-muted">Aksen Warna:</span>
              <span class="badge d-inline-flex align-items-center gap-1" style="background:#fb923c; color:#0B130F; font-weight:700;">
                <span style="display:inline-block; width:8px; height:8px; background:#0B130F; border-radius:50%;"></span> #FB923C
              </span>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center pt-2">
            <span class="badge bg-success-subtle text-success d-inline-flex align-items-center gap-1">
              <i class="bi bi-check-circle-fill"></i> Tampil di Landing Page
            </span>
            <div class="d-flex gap-2">
              <button type="button" class="btn btn-sm btn-outline-secondary" onclick="editJurusan('Teknik Pembuatan Kain', 'TPK', '#FB923C', '72', 'Ibu Sri Wahyuni, S.T.', 'Mempelajari konstruksi dan desain tenun, operasional mesin tenun berkecepatan tinggi, proses finishing kain, dan laboratorium uji standar mutu tekstil ekspor.')">
                <i class="bi bi-pencil me-1"></i> Edit
              </button>
              <a href="../akademik/jurusan.php" target="_blank" class="btn btn-sm btn-outline-success">
                <i class="bi bi-eye"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 4: Ototronik -->
    <div class="col-xl-6 jurusan-item">
      <div class="card p-4 h-100 shadow-sm border-0 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
        <div>
          <!-- Header Card -->
          <div class="d-flex align-items-start justify-content-between mb-3 pb-3 border-bottom">
            <div class="d-flex align-items-center gap-3">
              <div class="rounded-3 p-2" style="background: rgba(248, 113, 113, 0.15); width: 62px; height: 62px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(248, 113, 113, 0.3);">
                <img src="../images/3d-oto.png" alt="Ototronik" style="max-width: 46px; max-height: 46px; object-fit: contain;" onerror="this.src='../logo/smkn2kra.png'">
              </div>
              <div>
                <span class="badge bg-danger-subtle text-danger mb-1" style="font-size: 0.72rem; letter-spacing: 0.03em;">TOT &bull; TERAKREDITASI A</span>
                <h5 class="fw-bold mb-1 text-main" style="font-size: 1.15rem;">Teknik Ototronik</h5>
                <div class="text-muted fs-xs d-flex align-items-center gap-1">
                  <i class="bi bi-person-badge text-danger"></i> Kaprodi: <strong>Bpk. Hendra Gunawan, S.Pd.</strong>
                </div>
              </div>
            </div>
            <div class="dropdown">
              <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 34px; height: 34px; padding: 0;">
                <i class="bi bi-three-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="editJurusan('Teknik Ototronik', 'TOT', '#F87171', '72', 'Bpk. Hendra Gunawan, S.Pd.', 'Mempelajari diagnosa kelistrikan otomotif berbasis ECU, engine management system, scanner diagnosa OBD-II, dan teknologi mutakhir kendaraan listrik (EV).')"><i class="bi bi-pencil me-2 text-primary"></i> Edit Jurusan</a></li>
                <li><a class="dropdown-item" href="../akademik/jurusan.php" target="_blank"><i class="bi bi-eye me-2 text-success"></i> Lihat di Website</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="nonaktifkanJurusan('Teknik Ototronik')"><i class="bi bi-slash-circle me-2"></i> Nonaktifkan</a></li>
              </ul>
            </div>
          </div>

          <!-- Description -->
          <p class="text-muted fs-sm mb-3" style="line-height: 1.6; min-height: 48px;">
            Mempelajari teknologi otomotif mutakhir dengan penguasaan sistem elektronik, kontrol modul ECU, diagnosa scanner komputer OBD-II, dan sistem baterai kendaraan listrik modern.
          </p>

          <!-- Competencies pills -->
          <div class="d-flex flex-wrap gap-1 mb-3">
            <span class="badge bg-light text-dark border fs-xs">ECU Diagnostik</span>
            <span class="badge bg-light text-dark border fs-xs">Sistem Injeksi EFI</span>
            <span class="badge bg-light text-dark border fs-xs">Kendaraan Listrik EV</span>
            <span class="badge bg-light text-dark border fs-xs">Kelistrikan Body Otomotif</span>
          </div>
        </div>

        <!-- Footer Card -->
        <div class="pt-3 border-top">
          <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2 fs-xs">
            <div><span class="text-muted">Kuota Penerimaan:</span> <strong class="text-main">72 Siswa</strong> <span class="text-muted">(2 Rombel)</span></div>
            <div class="d-flex align-items-center gap-1">
              <span class="text-muted">Aksen Warna:</span>
              <span class="badge d-inline-flex align-items-center gap-1" style="background:#f87171; color:#0B130F; font-weight:700;">
                <span style="display:inline-block; width:8px; height:8px; background:#0B130F; border-radius:50%;"></span> #F87171
              </span>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center pt-2">
            <span class="badge bg-success-subtle text-success d-inline-flex align-items-center gap-1">
              <i class="bi bi-check-circle-fill"></i> Tampil di Landing Page
            </span>
            <div class="d-flex gap-2">
              <button type="button" class="btn btn-sm btn-outline-secondary" onclick="editJurusan('Teknik Ototronik', 'TOT', '#F87171', '72', 'Bpk. Hendra Gunawan, S.Pd.', 'Mempelajari diagnosa kelistrikan otomotif berbasis ECU, engine management system, scanner diagnosa OBD-II, dan teknologi mutakhir kendaraan listrik (EV).')">
                <i class="bi bi-pencil me-1"></i> Edit
              </button>
              <a href="../akademik/jurusan.php" target="_blank" class="btn btn-sm btn-outline-success">
                <i class="bi bi-eye"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- END: .main-wrapper -->

<!-- Modal Tambah Jurusan -->
<div class="modal fade" id="modalTambahJurusan" tabindex="-1" aria-labelledby="modalTambahJurusanLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTambahJurusanLabel">
          <i class="bi bi-cpu-fill text-success"></i> Tambah Program Keahlian / Jurusan
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahJurusan">
          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label-custom" for="tambahNamaJurusan">Nama Lengkap Program Keahlian</label>
              <input type="text" class="form-control-custom" id="tambahNamaJurusan" placeholder="Contoh: Rekayasa Perangkat Lunak" required>
              <div class="form-text-custom">Nama resmi kurikulum vokasi SMK Pusat Keunggulan.</div>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="tambahKodeJurusan">Singkatan / Kode</label>
              <input type="text" class="form-control-custom" id="tambahKodeJurusan" placeholder="RPL" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahKaprodiJurusan">Nama Ketua Program Keahlian (Kaprodi)</label>
              <input type="text" class="form-control-custom" id="tambahKaprodiJurusan" placeholder="Contoh: Budi Santoso, M.Kom">
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="tambahKuotaJurusan">Kuota Siswa Baru</label>
              <input type="number" class="form-control-custom" id="tambahKuotaJurusan" value="72">
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="tambahAkreditasiJurusan">Akreditasi</label>
              <select class="form-select-custom" id="tambahAkreditasiJurusan">
                <option value="A" selected>Terakreditasi A</option>
                <option value="B">Terakreditasi B</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahDeskripsiJurusan">Deskripsi Ringkas Kompetensi</label>
              <textarea class="form-control-custom" id="tambahDeskripsiJurusan" rows="3" placeholder="Jelaskan fokus keahlian, teknologi yang dipelajari, dan prospek karir lulusan..."></textarea>
            </div>

            <div class="col-md-8">
              <label class="form-label-custom">File Gambar Ilustrasi / Banner Jurusan</label>
              <input type="file" class="form-control-custom" accept="image/*">
              <div class="form-text-custom">Format JPG, PNG atau WebP (Rasio 16:9 direkomendasikan).</div>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="tambahWarnaJurusan">Aksen Warna Tema</label>
              <input type="color" class="form-control-custom w-100 p-1" id="tambahWarnaJurusan" value="#22c55e" style="height: 42px;">
            </div>

            <div class="col-12">
              <div class="form-switch-custom">
                <input class="form-switch-input-custom" type="checkbox" id="checkTampil" checked>
                <label class="form-label-custom mb-0" for="checkTampil">Tampilkan langsung pada Landing Page Website</label>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanTambahJurusan()">
          <i class="bi bi-check-circle-fill"></i> Simpan Jurusan
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Jurusan -->
<div class="modal fade" id="modalEditJurusan" tabindex="-1" aria-labelledby="modalEditJurusanLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalEditJurusanLabel">
          <i class="bi bi-pencil-square text-success"></i> Edit Program Keahlian / Jurusan
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditJurusan">
          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label-custom" for="editNamaJurusan">Nama Lengkap Jurusan</label>
              <input type="text" class="form-control-custom" id="editNamaJurusan" required>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="editKodeJurusan">Singkatan / Kode</label>
              <input type="text" class="form-control-custom" id="editKodeJurusan" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="editKaprodiJurusan">Nama Ketua Program (Kaprodi)</label>
              <input type="text" class="form-control-custom" id="editKaprodiJurusan">
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="editKuotaJurusan">Kuota Siswa Baru</label>
              <input type="number" class="form-control-custom" id="editKuotaJurusan">
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="editStatusTayang">Status Publikasi</label>
              <select class="form-select-custom" id="editStatusTayang">
                <option value="1" selected>Tampil di Home</option>
                <option value="0">Sembunyikan</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editDeskripsiJurusan">Deskripsi Ringkas</label>
              <textarea class="form-control-custom" id="editDeskripsiJurusan" rows="3"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanEditJurusan()">
          <i class="bi bi-save-fill"></i> Perbarui Jurusan
        </button>
      </div>
    </div>
  </div>
</div>

<script>
function editJurusan(nama, kode, warna, kuota, kaprodi, deskripsi) {
  document.getElementById('editNamaJurusan').value = nama;
  document.getElementById('editKodeJurusan').value = kode;
  document.getElementById('editWarnaJurusan').value = warna;
  document.getElementById('editKuotaJurusan').value = kuota;
  document.getElementById('editKaprodiJurusan').value = kaprodi;
  document.getElementById('editDeskripsiJurusan').value = deskripsi;

  const modalEl = document.getElementById('modalEditJurusan');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function simpanTambahJurusan() {
  const nama = document.getElementById('tambahNamaJurusan').value;
  if (!nama) {
    alert('Silakan masukkan nama jurusan!');
    return;
  }
  const modalEl = document.getElementById('modalTambahJurusan');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  alert('Jurusan "' + nama + '" berhasil disimpan!');
}

function simpanEditJurusan() {
  const nama = document.getElementById('editNamaJurusan').value;
  const modalEl = document.getElementById('modalEditJurusan');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  alert('Perubahan data jurusan "' + nama + '" berhasil diperbarui!');
}

function nonaktifkanJurusan(nama) {
  if (confirm('Nonaktifkan jurusan ' + nama + ' dari landing page?')) {
    alert('Jurusan ' + nama + ' berhasil dinonaktifkan.');
  }
}

function filterJurusanCards() {
  const query = (document.getElementById('searchJurusanInput').value || '').toLowerCase();
  const items = document.querySelectorAll('.jurusan-item');
  items.forEach(item => {
    const text = item.textContent.toLowerCase();
    if (!query || text.includes(query)) {
      item.style.display = '';
    } else {
      item.style.display = 'none';
    }
  });
}
</script>

<?php include __DIR__ . '/components/footer.php'; ?>
