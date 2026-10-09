<?php
/**
 * Kelola Hero & Banner Landing Page - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola Hero & Banner - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-hero';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Kelola Hero, Banner &amp; Statistik</h1>
      <p class="page-subtitle">Atur konten slide banner utama, statistik angka, dan teks CTA yang tampil di landing page website.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../index.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Preview Landing Page
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="alert('Perubahan hero carousel berhasil disimpan!')">
        <i class="bi bi-check2-circle"></i> Simpan Semua
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- NAV TABS -->
  <ul class="nav nav-pills mb-4" id="heroTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="slides-tab" data-bs-toggle="pill" data-bs-target="#tab-slides" type="button" role="tab">
        <i class="bi bi-images me-1"></i> Slide Carousel (3 Slide)
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="stats-tab" data-bs-toggle="pill" data-bs-target="#tab-stats" type="button" role="tab">
        <i class="bi bi-bar-chart-fill me-1"></i> Angka Statistik Landing Page
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="cta-tab" data-bs-toggle="pill" data-bs-target="#tab-cta" type="button" role="tab">
        <i class="bi bi-megaphone-fill me-1"></i> Banner Call-To-Action (CTA)
      </button>
    </li>
  </ul>

  <div class="tab-content" id="heroTabContent">
    <!-- TAB 1: SLIDES CAROUSEL -->
    <div class="tab-pane fade show active" id="tab-slides" role="tabpanel">
      <div class="row g-4">
        <!-- Slide 1 Card -->
        <div class="col-lg-4">
          <div class="card h-100 shadow-sm border-0">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
              <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill fw-bold">Slide #1 (Utama)</span>
              <div class="form-check form-switch m-0">
                <input class="form-check-input" type="checkbox" id="switch-s1" checked>
                <label class="form-check-label fs-xs" for="switch-s1">Aktif</label>
              </div>
            </div>
            <div class="mb-3 position-relative rounded overflow-hidden" style="height: 140px; background: #072f1f;">
              <img src="https://lh3.googleusercontent.com/aida/AP1WRLvevxdfR6XhlXMEbZsdNFg10EUtUpgrltceK3RxVnLUp4je9-02tpF3KxuC3_lR99RDkzIFrCtl9gtDzZsUxtiXJ2gRJZrzQfIXDQeJr01oC09gcuwlzpf7_icfVnrxiwqIM4tNwHV4haL6_qaADuG3Tixo9rWsjHiV107oBe-djyjj5fpl30PhtbVne_-_hz5dbYgA33qFDs3Z3wM_cFYn3jnaRUrCheQVAOcB9uUdAcBdvEC_oYf-G_Q" alt="Preview Slide 1" class="w-100 h-100 object-fit-cover opacity-75">
              <div class="position-absolute bottom-0 start-0 p-2 text-white fs-xs bg-dark bg-opacity-50 w-100">Gedung SMKN 2 Kra</div>
            </div>
            <form>
              <div class="mb-2">
                <label class="form-label fs-xs fw-bold text-muted mb-1">Tagline Label</label>
                <input type="text" class="form-control form-control-sm" value="Growth & Precision">
              </div>
              <div class="mb-2">
                <label class="form-label fs-xs fw-bold text-muted mb-1">Judul Utama Slide</label>
                <input type="text" class="form-control form-control-sm fw-bold" value="Pusat Unggulan Pendidikan Vokasi">
              </div>
              <div class="mb-2">
                <label class="form-label fs-xs fw-bold text-muted mb-1">Deskripsi Singkat</label>
                <textarea class="form-control form-control-sm" rows="3">Membentuk tenaga kerja profesional, kompeten, dan siap bersaing di era industri global melalui kurikulum berbasis teknologi.</textarea>
              </div>
              <div class="row g-2 mb-2">
                <div class="col-6">
                  <label class="form-label fs-xs fw-bold text-muted mb-1">Teks Tombol 1</label>
                  <input type="text" class="form-control form-control-sm" value="Explore Programs">
                </div>
                <div class="col-6">
                  <label class="form-label fs-xs fw-bold text-muted mb-1">Teks Tombol 2</label>
                  <input type="text" class="form-control form-control-sm" value="About Us">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label fs-xs fw-bold text-muted mb-1">URL Background Image</label>
                <input type="text" class="form-control form-control-sm text-truncate" value="https://lh3.googleusercontent.com/aida/AP1WRLvevxdfR6XhlXMEbZsdNFg10EUtUpgrltceK3RxVnLUp4je9-02tpF3KxuC3_lR99RDkzIFrCtl9gtDzZsUxtiXJ2gRJZrzQfIXDQeJr01oC09gcuwlzpf7_icfVnrxiwqIM4tNwHV4haL6_qaADuG3Tixo9rWsjHiV107oBe-djyjj5fpl30PhtbVne_-_hz5dbYgA33qFDs3Z3wM_cFYn3jnaRUrCheQVAOcB9uUdAcBdvEC_oYf-G_Q">
              </div>
              <button type="button" class="btn btn-outline-success btn-sm w-100" onclick="alert('Slide 1 diperbarui!')">
                <i class="bi bi-save me-1"></i> Perbarui Slide 1
              </button>
            </form>
          </div>
        </div>

        <!-- Slide 2 Card -->
        <div class="col-lg-4">
          <div class="card h-100 shadow-sm border-0">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
              <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-bold">Slide #2</span>
              <div class="form-check form-switch m-0">
                <input class="form-check-input" type="checkbox" id="switch-s2" checked>
                <label class="form-check-label fs-xs" for="switch-s2">Aktif</label>
              </div>
            </div>
            <div class="mb-3 position-relative rounded overflow-hidden" style="height: 140px; background: #072f1f;">
              <img src="https://lh3.googleusercontent.com/aida/AP1WRLvNjZjTymzvjomDhdvzZwEZWcHKGVE7MfQ3adcAHODMKesKkoLCzIcV1FGJ-8-UiGtaDUoyoG8crqqIslaCGaqOrh95g7fRMHq2YxyQdc0AkfT5Gd6J6yqwj45D1KwqVOQK4-6uJK5P_A7rEDi0SnDZj0FhkclJPWGqH5QnTj3Ek1cb585I7_NCKwPAOqRFjDpAEPobwDwTJbDX0iXPH148pX8O5y47_m4VBx7KPdqkXj7uQUnGs7W0Ag" alt="Preview Slide 2" class="w-100 h-100 object-fit-cover opacity-75">
              <div class="position-absolute bottom-0 start-0 p-2 text-white fs-xs bg-dark bg-opacity-50 w-100">Workshop & Bengkel</div>
            </div>
            <form>
              <div class="mb-2">
                <label class="form-label fs-xs fw-bold text-muted mb-1">Tagline Label</label>
                <input type="text" class="form-control form-control-sm" value="Link & Match">
              </div>
              <div class="mb-2">
                <label class="form-label fs-xs fw-bold text-muted mb-1">Judul Utama Slide</label>
                <input type="text" class="form-control form-control-sm fw-bold" value="Pembelajaran Berbasis Industri">
              </div>
              <div class="mb-2">
                <label class="form-label fs-xs fw-bold text-muted mb-1">Deskripsi Singkat</label>
                <textarea class="form-control form-control-sm" rows="3">Kurikulum yang dirancang bersama mitra industri terkemuka untuk memastikan lulusan siap kerja dan berdaya saing global.</textarea>
              </div>
              <div class="row g-2 mb-2">
                <div class="col-6">
                  <label class="form-label fs-xs fw-bold text-muted mb-1">Teks Tombol 1</label>
                  <input type="text" class="form-control form-control-sm" value="Lihat Program">
                </div>
                <div class="col-6">
                  <label class="form-label fs-xs fw-bold text-muted mb-1">Teks Tombol 2</label>
                  <input type="text" class="form-control form-control-sm" value="Mitra Industri">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label fs-xs fw-bold text-muted mb-1">URL Background Image</label>
                <input type="text" class="form-control form-control-sm text-truncate" value="https://lh3.googleusercontent.com/aida/AP1WRLvNjZjTymzvjomDhdvzZwEZWcHKGVE7MfQ3adcAHODMKesKkoLCzIcV1FGJ-8-UiGtaDUoyoG8crqqIslaCGaqOrh95g7fRMHq2YxyQdc0AkfT5Gd6J6yqwj45D1KwqVOQK4-6uJK5P_A7rEDi0SnDZj0FhkclJPWGqH5QnTj3Ek1cb585I7_NCKwPAOqRFjDpAEPobwDwTJbDX0iXPH148pX8O5y47_m4VBx7KPdqkXj7uQUnGs7W0Ag">
              </div>
              <button type="button" class="btn btn-outline-success btn-sm w-100" onclick="alert('Slide 2 diperbarui!')">
                <i class="bi bi-save me-1"></i> Perbarui Slide 2
              </button>
            </form>
          </div>
        </div>

        <!-- Slide 3 Card -->
        <div class="col-lg-4">
          <div class="card h-100 shadow-sm border-0">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
              <span class="badge bg-warning-subtle text-warning px-3 py-2 rounded-pill fw-bold">Slide #3</span>
              <div class="form-check form-switch m-0">
                <input class="form-check-input" type="checkbox" id="switch-s3" checked>
                <label class="form-check-label fs-xs" for="switch-s3">Aktif</label>
              </div>
            </div>
            <div class="mb-3 position-relative rounded overflow-hidden" style="height: 140px; background: #072f1f;">
              <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1oQITlQxReSzB_iV4d4_8TBuxQ-GZNqW_LJJjMb_ludZiWGYQuAMtmFGechN-618UO8F3DFV6DcXRbgUvE-AnSJQnbZDfzclQ94bXkvN_3t7lu8TUhGv55Xu_CsZ_Ar0Vw6clauRRop2rUJrgG-VTc7TO6_82q_kpoZOOEqAcPzBkeEJH0XbCwWYblItMIRtd7q-3Nv0W8JNn_HKY_qbW_CTlPqmTo2GMs6Crt0mEt2A-jlIe7TQ8ARPYrLJoPajF0a56BpFTX8M" alt="Preview Slide 3" class="w-100 h-100 object-fit-cover opacity-75">
              <div class="position-absolute bottom-0 start-0 p-2 text-white fs-xs bg-dark bg-opacity-50 w-100">Prestasi Siswa</div>
            </div>
            <form>
              <div class="mb-2">
                <label class="form-label fs-xs fw-bold text-muted mb-1">Tagline Label</label>
                <input type="text" class="form-control form-control-sm" value="Prestasi">
              </div>
              <div class="mb-2">
                <label class="form-label fs-xs fw-bold text-muted mb-1">Judul Utama Slide</label>
                <input type="text" class="form-control form-control-sm fw-bold" value="Raih Prestasi Bersama Kami">
              </div>
              <div class="mb-2">
                <label class="form-label fs-xs fw-bold text-muted mb-1">Deskripsi Singkat</label>
                <textarea class="form-control form-control-sm" rows="3">Bergabunglah dengan ribuan siswa berprestasi yang telah mengharumkan nama sekolah di kancah nasional dan internasional.</textarea>
              </div>
              <div class="row g-2 mb-2">
                <div class="col-6">
                  <label class="form-label fs-xs fw-bold text-muted mb-1">Teks Tombol 1</label>
                  <input type="text" class="form-control form-control-sm" value="Daftar SPMB">
                </div>
                <div class="col-6">
                  <label class="form-label fs-xs fw-bold text-muted mb-1">Teks Tombol 2</label>
                  <input type="text" class="form-control form-control-sm" value="Galeri Prestasi">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label fs-xs fw-bold text-muted mb-1">URL Background Image</label>
                <input type="text" class="form-control form-control-sm text-truncate" value="https://lh3.googleusercontent.com/aida-public/AB6AXuB1oQITlQxReSzB_iV4d4_8TBuxQ-GZNqW_LJJjMb_ludZiWGYQuAMtmFGechN-618UO8F3DFV6DcXRbgUvE-AnSJQnbZDfzclQ94bXkvN_3t7lu8TUhGv55Xu_CsZ_Ar0Vw6clauRRop2rUJrgG-VTc7TO6_82q_kpoZOOEqAcPzBkeEJH0XbCwWYblItMIRtd7q-3Nv0W8JNn_HKY_qbW_CTlPqmTo2GMs6Crt0mEt2A-jlIe7TQ8ARPYrLJoPajF0a56BpFTX8M">
              </div>
              <button type="button" class="btn btn-outline-success btn-sm w-100" onclick="alert('Slide 3 diperbarui!')">
                <i class="bi bi-save me-1"></i> Perbarui Slide 3
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- TAB 2: STATISTIK COUNTER -->
    <div class="tab-pane fade" id="tab-stats" role="tabpanel">
      <div class="card p-4 shadow-sm border-0 mb-4" id="section-stats">
        <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
          <div>
            <h5 class="fw-bold mb-1">Angka Counter Statistik Sekolah</h5>
            <p class="text-muted fs-xs mb-0">Angka ini langsung ditampilkan pada baris counter setelah slider banner di halaman depan (Home).</p>
          </div>
          <div class="d-flex gap-2">
            <a href="kelola-statistik.php" class="btn btn-outline-success btn-sm">
              <i class="bi bi-box-arrow-up-right me-1"></i> Panel Statistik Lengkap
            </a>
            <button type="button" class="btn btn-success btn-sm" onclick="alert('Statistik diperbarui!')">
              <i class="bi bi-save me-1"></i> Simpan
            </button>
          </div>
        </div>

        <div class="row g-4">
          <!-- Stat 1 -->
          <div class="col-md-3">
            <div class="p-3 rounded border bg-light bg-opacity-50">
              <label class="form-label fs-xs fw-bold text-muted mb-1">Statistik 1 (Jumlah Siswa)</label>
              <input type="text" class="form-control fw-bold fs-5 text-success mb-2" value="2500+">
              <label class="form-label fs-xs text-muted mb-1">Label Keterangan</label>
              <input type="text" class="form-control form-control-sm" value="Siswa Aktif">
            </div>
          </div>
          <!-- Stat 2 -->
          <div class="col-md-3">
            <div class="p-3 rounded border bg-light bg-opacity-50">
              <label class="form-label fs-xs fw-bold text-muted mb-1">Statistik 2 (Mitra Industri)</label>
              <input type="text" class="form-control fw-bold fs-5 text-success mb-2" value="45+">
              <label class="form-label fs-xs text-muted mb-1">Label Keterangan</label>
              <input type="text" class="form-control form-control-sm" value="Partner Industri">
            </div>
          </div>
          <!-- Stat 3 -->
          <div class="col-md-3">
            <div class="p-3 rounded border bg-light bg-opacity-50">
              <label class="form-label fs-xs fw-bold text-muted mb-1">Statistik 3 (Kurikulum)</label>
              <input type="text" class="form-control fw-bold fs-5 text-success mb-2" value="100%">
              <label class="form-label fs-xs text-muted mb-1">Label Keterangan</label>
              <input type="text" class="form-control form-control-sm" value="Kurikulum Industri">
            </div>
          </div>
          <!-- Stat 4 -->
          <div class="col-md-3">
            <div class="p-3 rounded border bg-light bg-opacity-50">
              <label class="form-label fs-xs fw-bold text-muted mb-1">Statistik 4 (Ekstrakurikuler)</label>
              <input type="text" class="form-control fw-bold fs-5 text-success mb-2" value="7+">
              <label class="form-label fs-xs text-muted mb-1">Label Keterangan</label>
              <input type="text" class="form-control form-control-sm" value="Eskul Prestasi">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- TAB 3: CTA SECTION -->
    <div class="tab-pane fade" id="tab-cta" role="tabpanel">
      <div class="card p-4 shadow-sm border-0">
        <h5 class="fw-bold mb-3">Pengaturan Banner Call-To-Action (Bagian Bawah Landing Page)</h5>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label fs-xs fw-bold text-muted mb-1">Judul Banner CTA</label>
            <input type="text" class="form-control" value="Siap Meniti Karir Masa Depan?">
          </div>
          <div class="col-md-6">
            <label class="form-label fs-xs fw-bold text-muted mb-1">Label Tombol Utama</label>
            <input type="text" class="form-control" value="Daftar SPMB 2026/2027">
          </div>
          <div class="col-12">
            <label class="form-label fs-xs fw-bold text-muted mb-1">Deskripsi Kalimat Ajakan</label>
            <textarea class="form-control" rows="2">Daftarkan diri Anda sekarang dan bergabunglah dengan ribuan alumni sukses yang telah berkarir di berbagai industri nasional dan internasional.</textarea>
          </div>
          <div class="col-md-6">
            <label class="form-label fs-xs fw-bold text-muted mb-1">Label Tombol Sekunder</label>
            <input type="text" class="form-control" value="Download Brosur">
          </div>
          <div class="col-md-6">
            <label class="form-label fs-xs fw-bold text-muted mb-1">Link Target Brosur (PDF)</label>
            <input type="text" class="form-control" value="../assets/brosur-smkn2kra.pdf">
          </div>
          <div class="col-12 mt-3">
            <button type="button" class="btn btn-success" onclick="alert('Banner CTA landing page berhasil diperbarui!')">
              <i class="bi bi-save me-1"></i> Simpan Banner CTA
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/components/footer.php'; ?>
