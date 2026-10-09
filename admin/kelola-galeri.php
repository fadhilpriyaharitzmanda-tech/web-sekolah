<?php
/**
 * Kelola Galeri Dokumentasi - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola Galeri - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-galeri';
$assetsPath = 'assets/';

include 'components/header.php';
include 'components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include 'components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Galeri Dokumentasi &amp; Foto</h1>
      <p class="page-subtitle">Unggah dokumentasi aktivitas belajar mengajar, workshop industri, perlombaan, dan fasilitas sekolah.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../galeri/galeri.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Galeri Web
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalUploadFoto">
        <i class="bi bi-cloud-upload"></i> Unggah Dokumentasi
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- ALBUM FILTER -->
  <div class="d-flex gap-2 mb-4 flex-wrap">
    <button class="btn btn-sm btn-success rounded-pill px-3">Semua Album</button>
    <button class="btn btn-sm btn-outline-secondary rounded-pill px-3">Praktik Bengkel &amp; Lab</button>
    <button class="btn btn-sm btn-outline-secondary rounded-pill px-3">Perlombaan LKS</button>
    <button class="btn btn-sm btn-outline-secondary rounded-pill px-3">Kunjungan Industri</button>
    <button class="btn btn-sm btn-outline-secondary rounded-pill px-3">Kegiatan Eskul</button>
  </div>

  <!-- GALLERY GRID -->
  <div class="row g-4 mb-4">
    <!-- Item 1 -->
    <div class="col-md-4 col-sm-6">
      <div class="card p-2 shadow-sm border-0 h-100">
        <div class="rounded overflow-hidden position-relative mb-2" style="height: 200px;">
          <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1oQITlQxReSzB_iV4d4_8TBuxQ-GZNqW_LJJjMb_ludZiWGYQuAMtmFGechN-618UO8F3DFV6DcXRbgUvE-AnSJQnbZDfzclQ94bXkvN_3t7lu8TUhGv55Xu_CsZ_Ar0Vw6clauRRop2rUJrgG-VTc7TO6_82q_kpoZOOEqAcPzBkeEJH0XbCwWYblItMIRtd7q-3Nv0W8JNn_HKY_qbW_CTlPqmTo2GMs6Crt0mEt2A-jlIe7TQ8ARPYrLJoPajF0a56BpFTX8M" alt="LKS" class="w-100 h-100 object-fit-cover">
          <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-2">Prestasi LKS</span>
        </div>
        <div class="p-2">
          <h6 class="fw-bold mb-1">Dokumentasi Juara 1 LKS Tingkat Provinsi</h6>
          <div class="text-muted fs-xs d-flex justify-content-between align-items-center">
            <span>12 Okt 2024</span>
            <div class="d-flex gap-2">
              <button class="btn btn-link p-0 text-muted fs-sm"><i class="bi bi-pencil"></i></button>
              <button class="btn btn-link p-0 text-danger fs-sm"><i class="bi bi-trash"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Item 2 -->
    <div class="col-md-4 col-sm-6">
      <div class="card p-2 shadow-sm border-0 h-100">
        <div class="rounded overflow-hidden position-relative mb-2" style="height: 200px;">
          <img src="https://lh3.googleusercontent.com/aida/AP1WRLvNjZjTymzvjomDhdvzZwEZWcHKGVE7MfQ3adcAHODMKesKkoLCzIcV1FGJ-8-UiGtaDUoyoG8crqqIslaCGaqOrh95g7fRMHq2YxyQdc0AkfT5Gd6J6yqwj45D1KwqVOQK4-6uJK5P_A7rEDi0SnDZj0FhkclJPWGqH5QnTj3Ek1cb585I7_NCKwPAOqRFjDpAEPobwDwTJbDX0iXPH148pX8O5y47_m4VBx7KPdqkXj7uQUnGs7W0Ag" alt="Workshop" class="w-100 h-100 object-fit-cover">
          <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-2">Bengkel Mesin</span>
        </div>
        <div class="p-2">
          <h6 class="fw-bold mb-1">Praktik Pemesinan CNC Mahir Siswa TPM</h6>
          <div class="text-muted fs-xs d-flex justify-content-between align-items-center">
            <span>08 Okt 2024</span>
            <div class="d-flex gap-2">
              <button class="btn btn-link p-0 text-muted fs-sm"><i class="bi bi-pencil"></i></button>
              <button class="btn btn-link p-0 text-danger fs-sm"><i class="bi bi-trash"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Item 3 -->
    <div class="col-md-4 col-sm-6">
      <div class="card p-2 shadow-sm border-0 h-100">
        <div class="rounded overflow-hidden position-relative mb-2" style="height: 200px;">
          <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAR6u9lB4fwZ1GSdURK-YFBsWlOlcol9arlvZp64eAHYjdMp88kK8UnK6vg4AJxyV1HqsCTvsR_9pmFTgwmz6xm2wd7zadqLJRajyQziTajNEnv6yxPcT7oSuXLKIubghNObb0IX8CZrPM5KZ-YBgEk64E3Z_UGplcSFXeeQnqag_4FFovAx2r5CVNDIuj38wTXu9VSvXsHubWi318mTGNmUcQWXcffb6iJc8_uWszQLuAY-FbB0sU4LQILmzzjC46a1H6-wpbNW-8" alt="MoU" class="w-100 h-100 object-fit-cover">
          <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-2">Industri</span>
        </div>
        <div class="p-2">
          <h6 class="fw-bold mb-1">Penandatanganan Kerjasama Mitra Astra</h6>
          <div class="text-muted fs-xs d-flex justify-content-between align-items-center">
            <span>04 Okt 2024</span>
            <div class="d-flex gap-2">
              <button class="btn btn-link p-0 text-muted fs-sm"><i class="bi bi-pencil"></i></button>
              <button class="btn btn-link p-0 text-danger fs-sm"><i class="bi bi-trash"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Upload -->
<div class="modal fade" id="modalUploadFoto" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Unggah Foto Galeri Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Judul Foto / Kegiatan</label>
            <input type="text" class="form-control" placeholder="Contoh: Upacara Hari Pahlawan 2026">
          </div>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Kategori Album</label>
            <select class="form-select">
              <option>Praktik Bengkel &amp; Lab</option>
              <option>Perlombaan LKS &amp; Prestasi</option>
              <option>Kunjungan Industri &amp; PKL</option>
              <option>Kegiatan Ekstrakurikuler</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">File Gambar</label>
            <input type="file" class="form-control" accept="image/*">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm" onclick="alert('Foto berhasil diunggah!');" data-bs-dismiss="modal">Unggah Sekarang</button>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/components/footer.php'; ?>
