<?php
/**
 * Kelola Galeri Dokumentasi & Foto - Admin SMKN 2 Karanganyar
 * Manajemen arsip foto kegiatan sekolah, praktikum lab, kejuaraan LKS, dan kunjungan industri.
 */
$pageTitle = 'Kelola Galeri - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-galeri';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Galeri Dokumentasi &amp; Foto</h1>
      <p class="page-subtitle">Unggah dokumentasi aktivitas belajar mengajar, workshop industri, perlombaan LKS, dan fasilitas sekolah.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../galeri/galeri.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Galeri Web
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="bukaModalTambahGaleri()">
        <i class="bi bi-plus-lg"></i> Tambah Foto &amp; Dokumentasi
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- REKAPITULASI QUICK STATS BAR -->
  <div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Foto Dokumentasi</span>
          <div class="stat-icon-circle bg-success-subtle text-success">
            <i class="bi bi-images"></i>
          </div>
        </div>
        <div class="stat-value text-success">124 Foto</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span>Resolusi HD Optimal</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Album Terbit</span>
          <div class="stat-icon-circle bg-primary-subtle text-primary">
            <i class="bi bi-collection-fill"></i>
          </div>
        </div>
        <div class="stat-value text-primary">8 Album</div>
        <div class="trend-badge text-primary">
          <i class="bi bi-folder-fill"></i>
          <span>4 Kategori Kegiatan</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Momen Prestasi LKS</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-trophy-fill"></i>
          </div>
        </div>
        <div class="stat-value text-warning">34 Arsip</div>
        <div class="trend-badge text-warning">
          <i class="bi bi-award-fill"></i>
          <span>Kejuaraan Provinsi &amp; Nas</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Tayangan</span>
          <div class="stat-icon-circle bg-info-subtle text-info">
            <i class="bi bi-eye-fill"></i>
          </div>
        </div>
        <div class="stat-value text-info">18.4K View</div>
        <div class="trend-badge text-info">
          <i class="bi bi-graph-up-arrow"></i>
          <span>Interaksi Pengunjung</span>
        </div>
      </div>
    </div>
  </div>

  <!-- ALBUM FILTER BAR -->
  <div class="table-card-custom mb-4 p-3 d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div class="d-flex gap-2 flex-wrap" id="albumFilterGroup">
      <button type="button" class="btn btn-sm btn-success" onclick="filterGaleri('all', this)">Semua Album</button>
      <button type="button" class="btn btn-sm btn-outline-secondary" onclick="filterGaleri('lab', this)">Praktik Bengkel &amp; Lab</button>
      <button type="button" class="btn btn-sm btn-outline-secondary" onclick="filterGaleri('lks', this)">Perlombaan LKS</button>
      <button type="button" class="btn btn-sm btn-outline-secondary" onclick="filterGaleri('industri', this)">Kunjungan Industri</button>
      <button type="button" class="btn btn-sm btn-outline-secondary" onclick="filterGaleri('eskul', this)">Kegiatan Eskul</button>
    </div>
    <div class="table-search-box" style="max-width: 320px;">
      <i class="bi bi-search table-search-icon"></i>
      <input type="text" class="table-search-input" id="searchGaleriInput" placeholder="Cari judul dokumentasi..." onkeyup="searchGaleriCards()">
    </div>
  </div>

  <!-- GALLERY GRID -->
  <div class="row g-4 mb-4" id="galeriGridContainer">
    <!-- Item 1: LKS -->
    <div class="col-md-6 col-lg-4 galeri-card-item" id="galeri-card-1"
         data-category="lks"
         data-judul="Dokumentasi Juara 1 LKS Tingkat Provinsi"
         data-badge="Prestasi LKS"
         data-tanggal="12 Okt 2024"
         data-raw-date="2024-10-12"
         data-image="https://lh3.googleusercontent.com/aida-public/AB6AXuB1oQITlQxReSzB_iV4d4_8TBuxQ-GZNqW_LJJjMb_ludZiWGYQuAMtmFGechN-618UO8F3DFV6DcXRbgUvE-AnSJQnbZDfzclQ94bXkvN_3t7lu8TUhGv55Xu_CsZ_Ar0Vw6clauRRop2rUJrgG-VTc7TO6_82q_kpoZOOEqAcPzBkeEJH0XbCwWYblItMIRtd7q-3Nv0W8JNn_HKY_qbW_CTlPqmTo2GMs6Crt0mEt2A-jlIe7TQ8ARPYrLJoPajF0a56BpFTX8M"
         data-desc="Foto penyerahan piala dan sertifikat kompetensi kejuaraan bidang Robotika di Semarang.">
      <div class="card p-3 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.08) !important;">
        <div>
          <div class="rounded-3 overflow-hidden position-relative mb-3 border" style="height: 200px; background: #072f1f;">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1oQITlQxReSzB_iV4d4_8TBuxQ-GZNqW_LJJjMb_ludZiWGYQuAMtmFGechN-618UO8F3DFV6DcXRbgUvE-AnSJQnbZDfzclQ94bXkvN_3t7lu8TUhGv55Xu_CsZ_Ar0Vw6clauRRop2rUJrgG-VTc7TO6_82q_kpoZOOEqAcPzBkeEJH0XbCwWYblItMIRtd7q-3Nv0W8JNn_HKY_qbW_CTlPqmTo2GMs6Crt0mEt2A-jlIe7TQ8ARPYrLJoPajF0a56BpFTX8M"
                 alt="Dokumentasi Juara 1 LKS"
                 class="w-100 h-100 object-fit-cover galeri-img"
                 onerror="this.src='https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=600&auto=format&fit=crop'">
            <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-2 fw-semibold galeri-badge">Prestasi LKS</span>
          </div>
          <h6 class="fw-bold mb-1 text-main galeri-title" style="font-size: 1rem; line-height: 1.4;">Dokumentasi Juara 1 LKS Tingkat Provinsi</h6>
          <p class="text-muted fs-xs mb-3 galeri-desc">Foto penyerahan piala dan sertifikat kompetensi kejuaraan bidang Robotika di Semarang.</p>
        </div>
        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
          <span class="fs-xs text-muted galeri-date-display"><i class="bi bi-calendar3 me-1"></i> 12 Okt 2024</span>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-sm btn-outline-success d-flex align-items-center gap-1" onclick="bukaModalEditGaleri('galeri-card-1')">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
            <button type="button" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1" onclick="bukaModalHapusGaleri('galeri-card-1')">
              <i class="bi bi-trash3"></i> Hapus
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Item 2: Lab / Mesin -->
    <div class="col-md-6 col-lg-4 galeri-card-item" id="galeri-card-2"
         data-category="lab"
         data-judul="Praktik Pemesinan CNC Mahir Siswa TPM"
         data-badge="Bengkel Mesin"
         data-tanggal="08 Okt 2024"
         data-raw-date="2024-10-08"
         data-image="https://lh3.googleusercontent.com/aida/AP1WRLvNjZjTymzvjomDhdvzZwEZWcHKGVE7MfQ3adcAHODMKesKkoLCzIcV1FGJ-8-UiGtaDUoyoG8crqqIslaCGaqOrh95g7fRMHq2YxyQdc0AkfT5Gd6J6yqwj45D1KwqVOQK4-6uJK5P_A7rEDi0SnDZj0FhkclJPWGqH5QnTj3Ek1cb585I7_NCKwPAOqRFjDpAEPobwDwTJbDX0iXPH148pX8O5y47_m4VBx7KPdqkXj7uQUnGs7W0Ag"
         data-desc="Siswa tingkat XII praktik mandiri pembuatan komponen presisi menggunakan unit CNC Milling.">
      <div class="card p-3 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.08) !important;">
        <div>
          <div class="rounded-3 overflow-hidden position-relative mb-3 border" style="height: 200px; background: #072f1f;">
            <img src="https://lh3.googleusercontent.com/aida/AP1WRLvNjZjTymzvjomDhdvzZwEZWcHKGVE7MfQ3adcAHODMKesKkoLCzIcV1FGJ-8-UiGtaDUoyoG8crqqIslaCGaqOrh95g7fRMHq2YxyQdc0AkfT5Gd6J6yqwj45D1KwqVOQK4-6uJK5P_A7rEDi0SnDZj0FhkclJPWGqH5QnTj3Ek1cb585I7_NCKwPAOqRFjDpAEPobwDwTJbDX0iXPH148pX8O5y47_m4VBx7KPdqkXj7uQUnGs7W0Ag"
                 alt="Praktik CNC Mahir"
                 class="w-100 h-100 object-fit-cover galeri-img"
                 onerror="this.src='https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=600&auto=format&fit=crop'">
            <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-2 fw-semibold galeri-badge">Bengkel Mesin</span>
          </div>
          <h6 class="fw-bold mb-1 text-main galeri-title" style="font-size: 1rem; line-height: 1.4;">Praktik Pemesinan CNC Mahir Siswa TPM</h6>
          <p class="text-muted fs-xs mb-3 galeri-desc">Siswa tingkat XII praktik mandiri pembuatan komponen presisi menggunakan unit CNC Milling.</p>
        </div>
        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
          <span class="fs-xs text-muted galeri-date-display"><i class="bi bi-calendar3 me-1"></i> 08 Okt 2024</span>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-sm btn-outline-success d-flex align-items-center gap-1" onclick="bukaModalEditGaleri('galeri-card-2')">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
            <button type="button" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1" onclick="bukaModalHapusGaleri('galeri-card-2')">
              <i class="bi bi-trash3"></i> Hapus
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Item 3: Industri -->
    <div class="col-md-6 col-lg-4 galeri-card-item" id="galeri-card-3"
         data-category="industri"
         data-judul="Penandatanganan Kerjasama Mitra Astra"
         data-badge="Industri DUDI"
         data-tanggal="04 Okt 2024"
         data-raw-date="2024-10-04"
         data-image="https://lh3.googleusercontent.com/aida-public/AB6AXuAR6u9lB4fwZ1GSdURK-YFBsWlOlcol9arlvZp64eAHYjdMp88kK8UnK6vg4AJxyV1HqsCTvsR_9pmFTgwmz6xm2wd7zadqLJRajyQziTajNEnv6yxPcT7oSuXLKIubghNObb0IX8CZrPM5KZ-YBgEk64E3Z_UGplcSFXeeQnqag_4FFovAx2r5CVNDIuj38wTXu9VSvXsHubWi318mTGNmUcQWXcffb6iJc8_uWszQLuAY-FbB0sU4LQILmzzjC46a1H6-wpbNW-8"
         data-desc="Momen penandatanganan nota kesepahaman kelas industri bersama jajaran pimpinan Astra.">
      <div class="card p-3 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.08) !important;">
        <div>
          <div class="rounded-3 overflow-hidden position-relative mb-3 border" style="height: 200px; background: #072f1f;">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAR6u9lB4fwZ1GSdURK-YFBsWlOlcol9arlvZp64eAHYjdMp88kK8UnK6vg4AJxyV1HqsCTvsR_9pmFTgwmz6xm2wd7zadqLJRajyQziTajNEnv6yxPcT7oSuXLKIubghNObb0IX8CZrPM5KZ-YBgEk64E3Z_UGplcSFXeeQnqag_4FFovAx2r5CVNDIuj38wTXu9VSvXsHubWi318mTGNmUcQWXcffb6iJc8_uWszQLuAY-FbB0sU4LQILmzzjC46a1H6-wpbNW-8"
                 alt="Kerjasama Mitra Astra"
                 class="w-100 h-100 object-fit-cover galeri-img"
                 onerror="this.src='https://images.unsplash.com/photo-1557804506-669a67965ba0?q=80&w=600&auto=format&fit=crop'">
            <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-2 fw-semibold galeri-badge">Industri DUDI</span>
          </div>
          <h6 class="fw-bold mb-1 text-main galeri-title" style="font-size: 1rem; line-height: 1.4;">Penandatanganan Kerjasama Mitra Astra</h6>
          <p class="text-muted fs-xs mb-3 galeri-desc">Momen penandatanganan nota kesepahaman kelas industri bersama jajaran pimpinan Astra.</p>
        </div>
        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
          <span class="fs-xs text-muted galeri-date-display"><i class="bi bi-calendar3 me-1"></i> 04 Okt 2024</span>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-sm btn-outline-success d-flex align-items-center gap-1" onclick="bukaModalEditGaleri('galeri-card-3')">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
            <button type="button" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1" onclick="bukaModalHapusGaleri('galeri-card-3')">
              <i class="bi bi-trash3"></i> Hapus
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Item 4: Eskul -->
    <div class="col-md-6 col-lg-4 galeri-card-item" id="galeri-card-4"
         data-category="eskul"
         data-judul="Latihan Gabungan Baris-Berbaris Paskibraka"
         data-badge="Kegiatan Eskul"
         data-tanggal="28 Sep 2024"
         data-raw-date="2024-09-28"
         data-image="https://images.unsplash.com/photo-1526772662000-3f88f10405ff?q=80&w=800&auto=format&fit=crop"
         data-desc="Persiapan intensif formasi baris-berbaris jelang peringatan upacara hari besar nasional.">
      <div class="card p-3 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.08) !important;">
        <div>
          <div class="rounded-3 overflow-hidden position-relative mb-3 border" style="height: 200px; background: #072f1f;">
            <img src="https://images.unsplash.com/photo-1526772662000-3f88f10405ff?q=80&w=800&auto=format&fit=crop"
                 alt="Paskibraka SMKN 2 Kra"
                 class="w-100 h-100 object-fit-cover galeri-img"
                 onerror="this.src='https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=600&auto=format&fit=crop'">
            <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-2 fw-semibold galeri-badge">Kegiatan Eskul</span>
          </div>
          <h6 class="fw-bold mb-1 text-main galeri-title" style="font-size: 1rem; line-height: 1.4;">Latihan Gabungan Baris-Berbaris Paskibraka</h6>
          <p class="text-muted fs-xs mb-3 galeri-desc">Persiapan intensif formasi baris-berbaris jelang peringatan upacara hari besar nasional.</p>
        </div>
        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
          <span class="fs-xs text-muted galeri-date-display"><i class="bi bi-calendar3 me-1"></i> 28 Sep 2024</span>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-sm btn-outline-success d-flex align-items-center gap-1" onclick="bukaModalEditGaleri('galeri-card-4')">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
            <button type="button" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1" onclick="bukaModalHapusGaleri('galeri-card-4')">
              <i class="bi bi-trash3"></i> Hapus
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- END: .main-wrapper -->

<!-- ==========================================
     MODALS GALERI DOKUMENTASI & FOTO
     ========================================== -->

<!-- 1. MODAL TAMBAH GALERI (Design serasi dengan modal lainnya) -->
<div class="modal fade" id="modalTambahGaleri" tabindex="-1" aria-labelledby="modalTambahGaleriLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTambahGaleriLabel">
          <i class="bi bi-images text-success"></i> Tambah Foto &amp; Dokumentasi Baru
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahGaleri">
          <!-- Thumbnail Live Preview -->
          <div class="mb-3 p-2 border rounded-3 bg-light text-center">
            <div class="position-relative overflow-hidden rounded-2 mb-2" style="height: 160px; background: #072F1F;">
              <img id="tambahGaleriPreviewThumb" src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop" alt="Preview Foto" class="w-100 h-100 object-fit-cover" onerror="this.src='https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop'">
            </div>
            <div class="fs-xs text-muted">Pratinjau Foto Dokumentasi</div>
          </div>

          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="tambahJudulFoto">Judul Momen / Nama Dokumentasi</label>
              <input type="text" class="form-control-custom fw-bold" id="tambahJudulFoto" placeholder="Contoh: Upacara Peringatan Hari Pendidikan Nasional" required>
            </div>
            <div class="col-md-5">
              <label class="form-label-custom" for="tambahKategoriFoto">Kategori Album</label>
              <select class="form-select-custom" id="tambahKategoriFoto" onchange="autoSetBadgeTambah(this.value)">
                <option value="lks" selected>Perlombaan LKS &amp; Prestasi Siswa</option>
                <option value="lab">Praktik Bengkel &amp; Laboratorium</option>
                <option value="industri">Kunjungan Industri &amp; PKL</option>
                <option value="eskul">Kegiatan Ekstrakurikuler &amp; OSIS</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahBadgeFoto">Label Badge Foto (Teks Singkat)</label>
              <input type="text" class="form-control-custom" id="tambahBadgeFoto" value="Prestasi LKS" placeholder="Contoh: Prestasi LKS / Bengkel Mesin">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahTanggalFoto">Tanggal Dokumentasi</label>
              <input type="date" class="form-control-custom" id="tambahTanggalFoto" value="<?= date('Y-m-d') ?>" required>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahUrlFoto">URL Gambar / Foto Dokumentasi</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="bi bi-link-45deg"></i></span>
                <input type="text" class="form-control" id="tambahUrlFoto" placeholder="https://..." value="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop" oninput="updateTambahGaleriThumb(this.value)" required>
              </div>
              <div class="form-text fs-xs text-muted">Gunakan tautan gambar resolusi tinggi (JPG, PNG, atau WebP).</div>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahDeskripsiFoto">Keterangan / Narasi Singkat</label>
              <textarea class="form-control-custom" id="tambahDeskripsiFoto" rows="3" placeholder="Tuliskan keterangan tempat, pihak yang terlibat, atau deskripsi singkat momen ini..." required></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanTambahGaleri()">
          <i class="bi bi-cloud-arrow-up-fill"></i> Simpan Dokumentasi
        </button>
      </div>
    </div>
  </div>
</div>

<!-- 2. MODAL EDIT GALERI (Isi Menyesuaikan Data Kartu) -->
<div class="modal fade" id="modalEditGaleri" tabindex="-1" aria-labelledby="modalEditGaleriLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalEditGaleriLabel">
          <i class="bi bi-pencil-square text-success"></i> Edit Data Dokumentasi Galeri
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditGaleri">
          <input type="hidden" id="editGaleriTargetCardId">

          <!-- Thumbnail Live Preview -->
          <div class="mb-3 p-2 border rounded-3 bg-light text-center">
            <div class="position-relative overflow-hidden rounded-2 mb-2" style="height: 160px; background: #072F1F;">
              <img id="editGaleriPreviewThumb" src="" alt="Preview Foto" class="w-100 h-100 object-fit-cover" onerror="this.src='https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop'">
            </div>
            <div class="fs-xs text-muted">Pratinjau Foto Dokumentasi</div>
          </div>

          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="editJudulFoto">Judul Momen / Nama Dokumentasi</label>
              <input type="text" class="form-control-custom fw-bold" id="editJudulFoto" required>
            </div>
            <div class="col-md-5">
              <label class="form-label-custom" for="editKategoriFoto">Kategori Album</label>
              <select class="form-select-custom" id="editKategoriFoto">
                <option value="lks">Perlombaan LKS &amp; Prestasi Siswa</option>
                <option value="lab">Praktik Bengkel &amp; Laboratorium</option>
                <option value="industri">Kunjungan Industri &amp; PKL</option>
                <option value="eskul">Kegiatan Ekstrakurikuler &amp; OSIS</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="editBadgeFoto">Label Badge Foto (Teks Singkat)</label>
              <input type="text" class="form-control-custom" id="editBadgeFoto">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editTanggalFoto">Tanggal Dokumentasi</label>
              <input type="date" class="form-control-custom" id="editTanggalFoto" required>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editUrlFoto">URL Gambar / Foto Dokumentasi</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="bi bi-link-45deg"></i></span>
                <input type="text" class="form-control" id="editUrlFoto" oninput="updateEditGaleriThumb(this.value)" required>
              </div>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editDeskripsiFoto">Keterangan / Narasi Singkat</label>
              <textarea class="form-control-custom" id="editDeskripsiFoto" rows="3" required></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanEditGaleri()">
          <i class="bi bi-check-circle-fill"></i> Simpan Perubahan
        </button>
      </div>
    </div>
  </div>
</div>

<!-- 3. MODAL HAPUS GALERI (Konfirmasi Hapus) -->
<div class="modal fade" id="modalHapusGaleri" tabindex="-1" aria-labelledby="modalHapusGaleriLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-danger" id="modalHapusGaleriLabel">
          <i class="bi bi-exclamation-triangle-fill me-2"></i> Konfirmasi Hapus Dokumentasi
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-3">
        <input type="hidden" id="hapusGaleriTargetCardId">
        <p class="mb-1">Apakah Anda yakin ingin menghapus dokumentasi <strong id="hapusGaleriJudulText"></strong>?</p>
        <div class="text-muted fs-xs">Foto dokumentasi ini akan dihapus dari album galeri publik.</div>
      </div>
      <div class="modal-footer border-0 pt-0">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger btn-sm" onclick="konfirmasiHapusGaleri()">
          <i class="bi bi-trash3-fill me-1"></i> Hapus Foto
        </button>
      </div>
    </div>
  </div>
</div>

<script>
// Filter galeri berdasarkan kategori album
function filterGaleri(category, btn) {
  const buttons = document.querySelectorAll('#albumFilterGroup .btn');
  buttons.forEach(b => {
    b.className = 'btn btn-sm btn-outline-secondary';
  });
  btn.className = 'btn btn-sm btn-success';

  const items = document.querySelectorAll('.galeri-card-item');
  items.forEach(item => {
    if (category === 'all' || item.getAttribute('data-category') === category) {
      item.style.display = '';
    } else {
      item.style.display = 'none';
    }
  });
}

// Pencarian galeri secara live
function searchGaleriCards() {
  const query = (document.getElementById('searchGaleriInput').value || '').toLowerCase();
  const items = document.querySelectorAll('.galeri-card-item');
  items.forEach(item => {
    const text = item.textContent.toLowerCase();
    if (!query || text.includes(query)) {
      item.style.display = '';
    } else {
      item.style.display = 'none';
    }
  });
}

// Live thumbnail preview helper
function updateTambahGaleriThumb(url) {
  const img = document.getElementById('tambahGaleriPreviewThumb');
  if (img && url) img.src = url;
}

function updateEditGaleriThumb(url) {
  const img = document.getElementById('editGaleriPreviewThumb');
  if (img && url) img.src = url;
}

function autoSetBadgeTambah(category) {
  const badgeInput = document.getElementById('tambahBadgeFoto');
  if (!badgeInput) return;
  const badges = {
    'lks': 'Prestasi LKS',
    'lab': 'Bengkel Mesin',
    'industri': 'Industri DUDI',
    'eskul': 'Kegiatan Eskul'
  };
  badgeInput.value = badges[category] || 'Dokumentasi';
}

// Format date YYYY-MM-DD -> DD Bln YYYY
function formatTglIndo(tglStr) {
  if (!tglStr) return '';
  const bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
  const parts = tglStr.split('-');
  if (parts.length === 3) {
    const y = parts[0];
    const m = parseInt(parts[1], 10) - 1;
    const d = parts[2];
    return d + ' ' + (bulan[m] || '') + ' ' + y;
  }
  return tglStr;
}

// BUKA MODAL TAMBAH GALERI
function bukaModalTambahGaleri() {
  document.getElementById('formTambahGaleri').reset();
  document.getElementById('tambahTanggalFoto').value = new Date().toISOString().split('T')[0];
  document.getElementById('tambahUrlFoto').value = 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop';
  updateTambahGaleriThumb('https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop');
  autoSetBadgeTambah(document.getElementById('tambahKategoriFoto').value);

  const modalEl = document.getElementById('modalTambahGaleri');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

// SIMPAN TAMBAH GALERI BARU
function simpanTambahGaleri() {
  const judul = document.getElementById('tambahJudulFoto').value.trim();
  const kategori = document.getElementById('tambahKategoriFoto').value;
  const badge = document.getElementById('tambahBadgeFoto').value.trim() || 'Dokumentasi';
  const tglRaw = document.getElementById('tambahTanggalFoto').value;
  const url = document.getElementById('tambahUrlFoto').value.trim();
  const desc = document.getElementById('tambahDeskripsiFoto').value.trim();

  if (!judul || !url || !desc) {
    alert('Judul, tautan foto gambar, dan keterangan wajib diisi!');
    return;
  }

  const tglDisplay = formatTglIndo(tglRaw);
  const container = document.getElementById('galeriGridContainer');
  const newId = 'galeri-card-' + Date.now();

  const col = document.createElement('div');
  col.className = 'col-md-6 col-lg-4 galeri-card-item';
  col.id = newId;
  col.setAttribute('data-category', kategori);
  col.setAttribute('data-judul', judul);
  col.setAttribute('data-badge', badge);
  col.setAttribute('data-tanggal', tglDisplay);
  col.setAttribute('data-raw-date', tglRaw);
  col.setAttribute('data-image', url);
  col.setAttribute('data-desc', desc);

  col.innerHTML = `
    <div class="card p-3 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.08) !important;">
      <div>
        <div class="rounded-3 overflow-hidden position-relative mb-3 border" style="height: 200px; background: #072f1f;">
          <img src="${url}" alt="${judul}" class="w-100 h-100 object-fit-cover galeri-img" onerror="this.src='https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=600&auto=format&fit=crop'">
          <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-2 fw-semibold galeri-badge">${badge}</span>
        </div>
        <h6 class="fw-bold mb-1 text-main galeri-title" style="font-size: 1rem; line-height: 1.4;">${judul}</h6>
        <p class="text-muted fs-xs mb-3 galeri-desc">${desc}</p>
      </div>
      <div class="pt-3 border-top d-flex justify-content-between align-items-center">
        <span class="fs-xs text-muted galeri-date-display"><i class="bi bi-calendar3 me-1"></i> ${tglDisplay}</span>
        <div class="d-flex gap-2">
          <button type="button" class="btn btn-sm btn-outline-success d-flex align-items-center gap-1" onclick="bukaModalEditGaleri('${newId}')">
            <i class="bi bi-pencil-square"></i> Edit
          </button>
          <button type="button" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1" onclick="bukaModalHapusGaleri('${newId}')">
            <i class="bi bi-trash3"></i> Hapus
          </button>
        </div>
      </div>
    </div>
  `;

  container.prepend(col);

  const modalEl = document.getElementById('modalTambahGaleri');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();

  alert('Foto dokumentasi "' + judul + '" berhasil ditambahkan ke galeri!');
}

// BUKA MODAL EDIT GALERI (Data menyesuaikan)
function bukaModalEditGaleri(cardId) {
  const card = document.getElementById(cardId);
  if (!card) return;

  const dataset = card.dataset;
  document.getElementById('editGaleriTargetCardId').value = cardId;
  document.getElementById('editJudulFoto').value = dataset.judul || '';
  document.getElementById('editKategoriFoto').value = dataset.category || 'lks';
  document.getElementById('editBadgeFoto').value = dataset.badge || '';
  document.getElementById('editTanggalFoto').value = dataset.rawDate || new Date().toISOString().split('T')[0];
  document.getElementById('editUrlFoto').value = dataset.image || '';
  document.getElementById('editDeskripsiFoto').value = dataset.desc || '';

  const previewImg = document.getElementById('editGaleriPreviewThumb');
  if (previewImg) previewImg.src = dataset.image || '';

  const modalEl = document.getElementById('modalEditGaleri');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

// SIMPAN EDIT GALERI
function simpanEditGaleri() {
  const cardId = document.getElementById('editGaleriTargetCardId').value;
  const card = document.getElementById(cardId);
  if (!card) return;

  const judul = document.getElementById('editJudulFoto').value.trim();
  const kategori = document.getElementById('editKategoriFoto').value;
  const badge = document.getElementById('editBadgeFoto').value.trim() || 'Dokumentasi';
  const tglRaw = document.getElementById('editTanggalFoto').value;
  const url = document.getElementById('editUrlFoto').value.trim();
  const desc = document.getElementById('editDeskripsiFoto').value.trim();

  if (!judul || !url || !desc) {
    alert('Judul, tautan foto gambar, dan keterangan wajib diisi!');
    return;
  }

  const tglDisplay = formatTglIndo(tglRaw);

  // Update dataset
  card.setAttribute('data-category', kategori);
  card.setAttribute('data-judul', judul);
  card.setAttribute('data-badge', badge);
  card.setAttribute('data-tanggal', tglDisplay);
  card.setAttribute('data-raw-date', tglRaw);
  card.setAttribute('data-image', url);
  card.setAttribute('data-desc', desc);

  // Update UI di card
  const imgEl = card.querySelector('.galeri-img');
  const badgeEl = card.querySelector('.galeri-badge');
  const titleEl = card.querySelector('.galeri-title');
  const descEl = card.querySelector('.galeri-desc');
  const dateEl = card.querySelector('.galeri-date-display');

  if (imgEl) imgEl.src = url;
  if (badgeEl) badgeEl.textContent = badge;
  if (titleEl) titleEl.textContent = judul;
  if (descEl) descEl.textContent = desc;
  if (dateEl) dateEl.innerHTML = '<i class="bi bi-calendar3 me-1"></i> ' + tglDisplay;

  const modalEl = document.getElementById('modalEditGaleri');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();

  alert('Dokumentasi "' + judul + '" berhasil diperbarui!');
}

// BUKA MODAL HAPUS GALERI
function bukaModalHapusGaleri(cardId) {
  const card = document.getElementById(cardId);
  if (!card) return;

  const judul = card.getAttribute('data-judul') || 'Dokumentasi Foto';
  document.getElementById('hapusGaleriTargetCardId').value = cardId;
  document.getElementById('hapusGaleriJudulText').textContent = judul;

  const modalEl = document.getElementById('modalHapusGaleri');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

// KONFIRMASI HAPUS GALERI
function konfirmasiHapusGaleri() {
  const cardId = document.getElementById('hapusGaleriTargetCardId').value;
  const judul = document.getElementById('hapusGaleriJudulText').textContent;

  const modalEl = document.getElementById('modalHapusGaleri');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();

  const card = document.getElementById(cardId);
  if (card) {
    card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
    card.style.opacity = '0';
    card.style.transform = 'scale(0.9)';
    setTimeout(() => {
      card.remove();
      alert('Dokumentasi foto "' + judul + '" berhasil dihapus.');
    }, 300);
  }
}
</script>

<?php include __DIR__ . '/components/footer.php'; ?>
