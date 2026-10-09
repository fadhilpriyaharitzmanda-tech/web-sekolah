<?php
/**
 * Kelola Testimoni Alumni - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola Testimoni Alumni - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-testimoni';
$assetsPath = 'assets/';

include 'components/header.php';
include 'components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include 'components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Kelola Testimoni Alumni</h1>
      <p class="page-subtitle">Kelola ulasan dan kisah sukses alumni yang ditampilkan pada bagian 'Apa Kata Alumni?' di landing page.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../tentang/alumni.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Halaman Alumni
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalTambahTesti">
        <i class="bi bi-plus-lg"></i> Tambah Testimoni
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- TESTIMONI CARDS -->
  <div class="row g-4 mb-4">
    <!-- Testimoni 1 -->
    <div class="col-lg-4">
      <div class="card h-100 shadow-sm border-0 d-flex flex-column justify-content-between">
        <div>
          <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
            <span class="badge bg-success-subtle text-success">Landing Page #1</span>
            <div class="form-check form-switch m-0">
              <input class="form-check-input" type="checkbox" id="testi-1" checked>
              <label class="form-check-label fs-xs" for="testi-1">Aktif</label>
            </div>
          </div>
          <div class="d-flex align-items-center gap-3 mb-3">
            <img src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=4ade80&color=fff&size=80" alt="Ahmad Fauzi" class="rounded-circle border" style="width: 54px; height: 54px;">
            <div>
              <h6 class="fw-bold mb-0">Ahmad Fauzi</h6>
              <div class="text-success fs-xs fw-semibold">RPL - 2020</div>
              <div class="text-muted fs-xs">Fullstack Developer di Tech Agency</div>
            </div>
          </div>
          <blockquote class="text-muted fs-sm fst-italic border-start border-3 border-success ps-3 my-3">
            "Ilmu yang saya dapat di SMKN 2 Karanganyar benar-benar menjadi fondasi karir saya di dunia teknologi. Praktik langsung dengan kurikulum industri membuat saya siap kerja."
          </blockquote>
        </div>
        <div class="d-flex justify-content-end gap-2 pt-3 border-top">
          <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil me-1"></i> Edit</button>
          <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
        </div>
      </div>
    </div>

    <!-- Testimoni 2 -->
    <div class="col-lg-4">
      <div class="card h-100 shadow-sm border-0 d-flex flex-column justify-content-between">
        <div>
          <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
            <span class="badge bg-primary-subtle text-primary">Landing Page #2</span>
            <div class="form-check form-switch m-0">
              <input class="form-check-input" type="checkbox" id="testi-2" checked>
              <label class="form-check-label fs-xs" for="testi-2">Aktif</label>
            </div>
          </div>
          <div class="d-flex align-items-center gap-3 mb-3">
            <img src="https://ui-avatars.com/api/?name=Dewi+Sartika&background=60a5fa&color=fff&size=80" alt="Dewi Sartika" class="rounded-circle border" style="width: 54px; height: 54px;">
            <div>
              <h6 class="fw-bold mb-0">Dewi Sartika</h6>
              <div class="text-primary fs-xs fw-semibold">Mesin (TPM) - 2019</div>
              <div class="text-muted fs-xs">Teknisi CNC di PT. Astra Honda Motor</div>
            </div>
          </div>
          <blockquote class="text-muted fs-sm fst-italic border-start border-3 border-primary ps-3 my-3">
            "Praktik langsung dengan mesin industri membuat saya tidak kaget saat terjun ke dunia kerja. Guru-guru membimbing dengan sabar hingga saya benar-benar kompeten."
          </blockquote>
        </div>
        <div class="d-flex justify-content-end gap-2 pt-3 border-top">
          <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil me-1"></i> Edit</button>
          <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
        </div>
      </div>
    </div>

    <!-- Testimoni 3 -->
    <div class="col-lg-4">
      <div class="card h-100 shadow-sm border-0 d-flex flex-column justify-content-between">
        <div>
          <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
            <span class="badge bg-warning-subtle text-warning">Landing Page #3</span>
            <div class="form-check form-switch m-0">
              <input class="form-check-input" type="checkbox" id="testi-3" checked>
              <label class="form-check-label fs-xs" for="testi-3">Aktif</label>
            </div>
          </div>
          <div class="d-flex align-items-center gap-3 mb-3">
            <img src="https://ui-avatars.com/api/?name=Rizky+Ramadhan&background=fb923c&color=fff&size=80" alt="Rizky Ramadhan" class="rounded-circle border" style="width: 54px; height: 54px;">
            <div>
              <h6 class="fw-bold mb-0">Rizky Ramadhan</h6>
              <div class="text-warning fs-xs fw-semibold">Tekstil (TPK) - 2021</div>
              <div class="text-muted fs-xs">Supervisor Produksi di PT. Sritex</div>
            </div>
          </div>
          <blockquote class="text-muted fs-sm fst-italic border-start border-3 border-warning ps-3 my-3">
            "Dari SMKN 2 saya belajar disiplin dan ketelitian yang sangat berguna di industri tekstil. Bekal soft skill yang diajarkan benar-benar membedakan saya di tempat kerja."
          </blockquote>
        </div>
        <div class="d-flex justify-content-end gap-2 pt-3 border-top">
          <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil me-1"></i> Edit</button>
          <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Tambah Testimoni -->
<div class="modal fade" id="modalTambahTesti" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Tambah Testimoni Alumni</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Nama Lengkap Alumni</label>
            <input type="text" class="form-control" placeholder="Contoh: Muhammad Farhan">
          </div>
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label fs-xs fw-bold">Jurusan</label>
              <select class="form-select">
                <option>RPL</option>
                <option>Teknik Pemesinan</option>
                <option>Teknik Pembuatan Kain</option>
                <option>Teknik Ototronik</option>
              </select>
            </div>
            <div class="col-6">
              <label class="form-label fs-xs fw-bold">Tahun Lulus / Angkatan</label>
              <input type="text" class="form-control" placeholder="2022">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Pekerjaan / Perusahaan Sekarang</label>
            <input type="text" class="form-control" placeholder="Contoh: Automation Engineer di PT Toyota">
          </div>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Isi Testimoni / Pengalaman</label>
            <textarea class="form-control" rows="3" placeholder="Ceritakan bagaimana SMKN 2 Karanganyar membantu kesuksesan karir..."></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Foto Profil (URL atau File)</label>
            <input type="text" class="form-control" placeholder="https://ui-avatars.com/api/?name=Farhan">
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="checkTampilTesti" checked>
            <label class="form-check-label fs-xs" for="checkTampilTesti">Tampilkan pada Landing Page Home</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm" onclick="alert('Testimoni berhasil ditambahkan!');" data-bs-dismiss="modal">Simpan Testimoni</button>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/components/footer.php'; ?>
