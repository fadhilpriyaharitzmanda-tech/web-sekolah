<?php
/**
 * Kelola Galeri Dokumentasi - Admin SMKN 2 Karanganyar
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
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalUploadFoto">
        <i class="bi bi-cloud-upload"></i> Unggah Dokumentasi
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
    <!-- Item 1 -->
    <div class="col-md-4 col-sm-6 galeri-card-item" data-category="lks">
      <div class="card p-3 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
        <div>
          <div class="rounded-3 overflow-hidden position-relative mb-3 border" style="height: 190px;">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1oQITlQxReSzB_iV4d4_8TBuxQ-GZNqW_LJJjMb_ludZiWGYQuAMtmFGechN-618UO8F3DFV6DcXRbgUvE-AnSJQnbZDfzclQ94bXkvN_3t7lu8TUhGv55Xu_CsZ_Ar0Vw6clauRRop2rUJrgG-VTc7TO6_82q_kpoZOOEqAcPzBkeEJH0XbCwWYblItMIRtd7q-3Nv0W8JNn_HKY_qbW_CTlPqmTo2GMs6Crt0mEt2A-jlIe7TQ8ARPYrLJoPajF0a56BpFTX8M" alt="LKS" class="w-100 h-100 object-fit-cover">
            <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-2 fw-semibold">Prestasi LKS</span>
          </div>
          <h6 class="fw-bold mb-1 text-main galeri-title" style="font-size: 0.95rem;">Dokumentasi Juara 1 LKS Tingkat Provinsi</h6>
          <p class="text-muted fs-xs mb-3">Foto penyerahan piala dan sertifikat kompetensi kejuaraan bidang Robotika di Semarang.</p>
        </div>
        <div class="pt-2 border-top d-flex justify-content-between align-items-center fs-xs text-muted">
          <span><i class="bi bi-calendar3 me-1"></i> 12 Okt 2024</span>
          <div class="d-flex gap-1">
            <button type="button" class="table-btn-action" title="Edit Dokumentasi" onclick="editGaleri('Dokumentasi Juara 1 LKS Tingkat Provinsi')">
              <i class="bi bi-pencil"></i>
            </button>
            <button type="button" class="table-btn-action delete" title="Hapus Foto" onclick="hapusGaleri(this, 'Juara 1 LKS')">
              <i class="bi bi-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Item 2 -->
    <div class="col-md-4 col-sm-6 galeri-card-item" data-category="lab">
      <div class="card p-3 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
        <div>
          <div class="rounded-3 overflow-hidden position-relative mb-3 border" style="height: 190px;">
            <img src="https://lh3.googleusercontent.com/aida/AP1WRLvNjZjTymzvjomDhdvzZwEZWcHKGVE7MfQ3adcAHODMKesKkoLCzIcV1FGJ-8-UiGtaDUoyoG8crqqIslaCGaqOrh95g7fRMHq2YxyQdc0AkfT5Gd6J6yqwj45D1KwqVOQK4-6uJK5P_A7rEDi0SnDZj0FhkclJPWGqH5QnTj3Ek1cb585I7_NCKwPAOqRFjDpAEPobwDwTJbDX0iXPH148pX8O5y47_m4VBx7KPdqkXj7uQUnGs7W0Ag" alt="Workshop" class="w-100 h-100 object-fit-cover">
            <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-2 fw-semibold">Bengkel Mesin</span>
          </div>
          <h6 class="fw-bold mb-1 text-main galeri-title" style="font-size: 0.95rem;">Praktik Pemesinan CNC Mahir Siswa TPM</h6>
          <p class="text-muted fs-xs mb-3">Siswa tingkat XII praktik mandiri pembuatan komponen presisi menggunakan unit CNC Milling.</p>
        </div>
        <div class="pt-2 border-top d-flex justify-content-between align-items-center fs-xs text-muted">
          <span><i class="bi bi-calendar3 me-1"></i> 08 Okt 2024</span>
          <div class="d-flex gap-1">
            <button type="button" class="table-btn-action" title="Edit Dokumentasi" onclick="editGaleri('Praktik Pemesinan CNC Mahir Siswa TPM')">
              <i class="bi bi-pencil"></i>
            </button>
            <button type="button" class="table-btn-action delete" title="Hapus Foto" onclick="hapusGaleri(this, 'Praktik CNC')">
              <i class="bi bi-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Item 3 -->
    <div class="col-md-4 col-sm-6 galeri-card-item" data-category="industri">
      <div class="card p-3 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
        <div>
          <div class="rounded-3 overflow-hidden position-relative mb-3 border" style="height: 190px;">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAR6u9lB4fwZ1GSdURK-YFBsWlOlcol9arlvZp64eAHYjdMp88kK8UnK6vg4AJxyV1HqsCTvsR_9pmFTgwmz6xm2wd7zadqLJRajyQziTajNEnv6yxPcT7oSuXLKIubghNObb0IX8CZrPM5KZ-YBgEk64E3Z_UGplcSFXeeQnqag_4FFovAx2r5CVNDIuj38wTXu9VSvXsHubWi318mTGNmUcQWXcffb6iJc8_uWszQLuAY-FbB0sU4LQILmzzjC46a1H6-wpbNW-8" alt="MoU" class="w-100 h-100 object-fit-cover">
            <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-2 fw-semibold">Industri</span>
          </div>
          <h6 class="fw-bold mb-1 text-main galeri-title" style="font-size: 0.95rem;">Penandatanganan Kerjasama Mitra Astra</h6>
          <p class="text-muted fs-xs mb-3">Momen penandatanganan nota kesepahaman kelas industri bersama jajaran pimpinan Astra.</p>
        </div>
        <div class="pt-2 border-top d-flex justify-content-between align-items-center fs-xs text-muted">
          <span><i class="bi bi-calendar3 me-1"></i> 04 Okt 2024</span>
          <div class="d-flex gap-1">
            <button type="button" class="table-btn-action" title="Edit Dokumentasi" onclick="editGaleri('Penandatanganan Kerjasama Mitra Astra')">
              <i class="bi bi-pencil"></i>
            </button>
            <button type="button" class="table-btn-action delete" title="Hapus Foto" onclick="hapusGaleri(this, 'Kerjasama Astra')">
              <i class="bi bi-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- END: .main-wrapper -->

<!-- Modal Upload Foto -->
<div class="modal fade" id="modalUploadFoto" tabindex="-1" aria-labelledby="modalUploadFotoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalUploadFotoLabel">
          <i class="bi bi-images text-success"></i> Unggah Dokumentasi Galeri Baru
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formUploadGaleri">
          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="uploadJudulFoto">Judul Momen / Nama Kegiatan</label>
              <input type="text" class="form-control-custom" id="uploadJudulFoto" placeholder="Contoh: Upacara Peringatan Hari Pahlawan 2026" required>
              <div class="form-text-custom">Berikan nama dokumentasi yang representatif.</div>
            </div>
            <div class="col-md-5">
              <label class="form-label-custom" for="uploadKategoriFoto">Kategori Album Galeri</label>
              <select class="form-select-custom" id="uploadKategoriFoto">
                <option value="lks" selected>Perlombaan LKS &amp; Prestasi Siswa</option>
                <option value="lab">Praktik Bengkel &amp; Laboratorium</option>
                <option value="industri">Kunjungan Industri &amp; Magang PKL</option>
                <option value="eskul">Kegiatan Ekstrakurikuler &amp; OSIS</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="uploadKeteranganFoto">Keterangan / Narasi Singkat</label>
              <textarea class="form-control-custom" id="uploadKeteranganFoto" rows="3" placeholder="Deskripsikan momen dokumentasi, tanggal kegiatan, dan lokasi pelaksanaan..."></textarea>
            </div>

            <div class="col-12">
              <label class="form-label-custom">Pilih Berkas Gambar (Format JPG / PNG / WebP)</label>
              <input type="file" class="form-control-custom" accept="image/*" required>
              <div class="form-text-custom">Rekomendasi ukuran file maksimal 5MB dengan resolusi tajam.</div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanUploadFoto()">
          <i class="bi bi-cloud-arrow-up-fill"></i> Unggah Sekarang
        </button>
      </div>
    </div>
  </div>
</div>

<script>
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

function editGaleri(judul) {
  const judulBaru = prompt('Edit judul dokumentasi:', judul);
  if (judulBaru) {
    alert('Dokumentasi "' + judulBaru + '" berhasil diperbarui.');
  }
}

function hapusGaleri(btn, judul) {
  if (confirm('Hapus foto dokumentasi: ' + judul + '?')) {
    const col = btn.closest('.galeri-card-item');
    if (col) {
      col.style.opacity = '0.3';
      setTimeout(() => {
        col.remove();
        alert('Foto dokumentasi telah dihapus.');
      }, 250);
    }
  }
}

function simpanUploadFoto() {
  const judul = document.getElementById('uploadJudulFoto').value;
  if (!judul) {
    alert('Silakan masukkan judul kegiatan/foto!');
    return;
  }
  const modalEl = document.getElementById('modalUploadFoto');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  alert('Foto "' + judul + '" berhasil diunggah ke galeri sekolah!');
}
</script>

<?php include __DIR__ . '/components/footer.php'; ?>
