<?php
/**
 * Kelola Jurusan Unggulan - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola Jurusan Unggulan - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-jurusan';
$assetsPath = 'assets/';

include 'components/header.php';
include 'components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include 'components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Kelola Jurusan Unggulan</h1>
      <p class="page-subtitle">Manajemen kompetensi keahlian yang ditampilkan pada bagian kartu 3D di landing page dan menu akademik.</p>
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

  <!-- QUICK STATS -->
  <div class="row g-3 mb-4">
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-success-subtle text-success fs-4">
          <i class="bi bi-cpu"></i>
        </div>
        <div>
          <div class="text-muted fs-xs fw-bold">Total Jurusan Aktif</div>
          <div class="fs-4 fw-bold">4 Program</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-primary-subtle text-primary fs-4">
          <i class="bi bi-people"></i>
        </div>
        <div>
          <div class="text-muted fs-xs fw-bold">Total Kuota Penerimaan</div>
          <div class="fs-4 fw-bold">396 Siswa</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-warning-subtle text-warning fs-4">
          <i class="bi bi-patch-check"></i>
        </div>
        <div>
          <div class="text-muted fs-xs fw-bold">Akreditasi</div>
          <div class="fs-4 fw-bold">100% Terakreditasi A</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-info-subtle text-info fs-4">
          <i class="bi bi-building-check"></i>
        </div>
        <div>
          <div class="text-muted fs-xs fw-bold">Mitra Industri</div>
          <div class="fs-4 fw-bold">45+ Perusahaan</div>
        </div>
      </div>
    </div>
  </div>

  <!-- JURUSAN GRID LIST -->
  <div class="row g-4 mb-4">
    <!-- Card 1: RPL -->
    <div class="col-lg-6">
      <div class="card h-100 shadow-sm border-0">
        <div class="d-flex align-items-start justify-content-between mb-3">
          <div class="d-flex align-items-center gap-3">
            <div class="p-2 rounded-3" style="background: rgba(74, 222, 128, 0.15); width: 64px; height: 64px; display: flex; align-items: center; justify-content: center;">
              <img src="../images/3d-rpl.png" alt="RPL" style="max-width: 48px; max-height: 48px;" onerror="this.src='../logo/smkn2kra.png'">
            </div>
            <div>
              <span class="badge bg-success-subtle text-success mb-1">RPL &bull; Terakreditasi A</span>
              <h5 class="fw-bold mb-0">Rekayasa Perangkat Lunak</h5>
              <div class="text-muted fs-xs">Kaprodi: Bpk. Eko Prasetyo, S.Kom</div>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn btn-sm btn-light rounded-circle" type="button" data-bs-toggle="dropdown">
              <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i> Edit Jurusan</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-image me-2"></i> Ganti Ilustrasi 3D</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i> Nonaktifkan</a></li>
            </ul>
          </div>
        </div>
        <p class="text-muted fs-sm mb-3">Mempelajari tentang pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, dan manajemen organisasi berbasis web dan mobile.</p>
        <div class="d-flex justify-content-between align-items-center pt-3 border-top fs-xs">
          <div><span class="text-muted">Kuota:</span> <strong>108 Siswa</strong> (3 Rombel)</div>
          <div><span class="text-muted">Aksen Warna:</span> <span class="badge" style="background:#4ade80; color:#000;">#4ADE80</span></div>
          <div><span class="badge bg-success">Tampil di Landing Page</span></div>
        </div>
      </div>
    </div>

    <!-- Card 2: Mesin -->
    <div class="col-lg-6">
      <div class="card h-100 shadow-sm border-0">
        <div class="d-flex align-items-start justify-content-between mb-3">
          <div class="d-flex align-items-center gap-3">
            <div class="p-2 rounded-3" style="background: rgba(96, 165, 250, 0.15); width: 64px; height: 64px; display: flex; align-items: center; justify-content: center;">
              <img src="../images/3d-mesin.png" alt="Mesin" style="max-width: 48px; max-height: 48px;" onerror="this.src='../logo/smkn2kra.png'">
            </div>
            <div>
              <span class="badge bg-primary-subtle text-primary mb-1">TPM &bull; Terakreditasi A</span>
              <h5 class="fw-bold mb-0">Teknik Pemesinan</h5>
              <div class="text-muted fs-xs">Kaprodi: Bpk. Bambang Sutrisno, M.T.</div>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn btn-sm btn-light rounded-circle" type="button" data-bs-toggle="dropdown">
              <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i> Edit Jurusan</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-image me-2"></i> Ganti Ilustrasi 3D</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i> Nonaktifkan</a></li>
            </ul>
          </div>
        </div>
        <p class="text-muted fs-sm mb-3">Mempelajari tentang cara memproduksi barang teknik dan menggunakan mesin konvensional maupun CNC tingkat lanjut sesuai standar industri permesinan modern.</p>
        <div class="d-flex justify-content-between align-items-center pt-3 border-top fs-xs">
          <div><span class="text-muted">Kuota:</span> <strong>144 Siswa</strong> (4 Rombel)</div>
          <div><span class="text-muted">Aksen Warna:</span> <span class="badge" style="background:#60a5fa; color:#000;">#60A5FA</span></div>
          <div><span class="badge bg-success">Tampil di Landing Page</span></div>
        </div>
      </div>
    </div>

    <!-- Card 3: Tekstil -->
    <div class="col-lg-6">
      <div class="card h-100 shadow-sm border-0">
        <div class="d-flex align-items-start justify-content-between mb-3">
          <div class="d-flex align-items-center gap-3">
            <div class="p-2 rounded-3" style="background: rgba(251, 146, 60, 0.15); width: 64px; height: 64px; display: flex; align-items: center; justify-content: center;">
              <img src="../images/3d-tekstil.png" alt="Tekstil" style="max-width: 48px; max-height: 48px;" onerror="this.src='../logo/smkn2kra.png'">
            </div>
            <div>
              <span class="badge bg-warning-subtle text-warning mb-1">TPK &bull; Terakreditasi A</span>
              <h5 class="fw-bold mb-0">Teknik Pembuatan Kain</h5>
              <div class="text-muted fs-xs">Kaprodi: Ibu Sri Wahyuni, S.T.</div>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn btn-sm btn-light rounded-circle" type="button" data-bs-toggle="dropdown">
              <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i> Edit Jurusan</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-image me-2"></i> Ganti Ilustrasi 3D</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i> Nonaktifkan</a></li>
            </ul>
          </div>
        </div>
        <p class="text-muted fs-sm mb-3">Mempelajari tentang desain tenun, mesin pembuatan kain otomatis, pemeliharaan, perawatan, dan pengendalian mutu tekstil skala ekspor.</p>
        <div class="d-flex justify-content-between align-items-center pt-3 border-top fs-xs">
          <div><span class="text-muted">Kuota:</span> <strong>72 Siswa</strong> (2 Rombel)</div>
          <div><span class="text-muted">Aksen Warna:</span> <span class="badge" style="background:#fb923c; color:#000;">#FB923C</span></div>
          <div><span class="badge bg-success">Tampil di Landing Page</span></div>
        </div>
      </div>
    </div>

    <!-- Card 4: Ototronik -->
    <div class="col-lg-6">
      <div class="card h-100 shadow-sm border-0">
        <div class="d-flex align-items-start justify-content-between mb-3">
          <div class="d-flex align-items-center gap-3">
            <div class="p-2 rounded-3" style="background: rgba(248, 113, 113, 0.15); width: 64px; height: 64px; display: flex; align-items: center; justify-content: center;">
              <img src="../images/3d-oto.png" alt="Ototronik" style="max-width: 48px; max-height: 48px;" onerror="this.src='../logo/smkn2kra.png'">
            </div>
            <div>
              <span class="badge bg-danger-subtle text-danger mb-1">TOT &bull; Terakreditasi A</span>
              <h5 class="fw-bold mb-0">Teknik Ototronik</h5>
              <div class="text-muted fs-xs">Kaprodi: Bpk. Hendra Gunawan, S.Pd</div>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn btn-sm btn-light rounded-circle" type="button" data-bs-toggle="dropdown">
              <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i> Edit Jurusan</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-image me-2"></i> Ganti Ilustrasi 3D</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i> Nonaktifkan</a></li>
            </ul>
          </div>
        </div>
        <p class="text-muted fs-sm mb-3">Mempelajari teknologi otomotif mutakhir dengan penguasaan sistem elektronik, kontrol ECU, diagnosa komputer, dan sistem kendaraan listrik ramah lingkungan.</p>
        <div class="d-flex justify-content-between align-items-center pt-3 border-top fs-xs">
          <div><span class="text-muted">Kuota:</span> <strong>72 Siswa</strong> (2 Rombel)</div>
          <div><span class="text-muted">Aksen Warna:</span> <span class="badge" style="background:#f87171; color:#000;">#F87171</span></div>
          <div><span class="badge bg-success">Tampil di Landing Page</span></div>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Tambah Jurusan -->
<div class="modal fade" id="modalTambahJurusan" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Tambah Program Keahlian / Jurusan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Nama Lengkap Jurusan</label>
            <input type="text" class="form-control" placeholder="Contoh: Teknik Komputer dan Jaringan">
          </div>
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label fs-xs fw-bold">Singkatan / Kode</label>
              <input type="text" class="form-control" placeholder="TKJ">
            </div>
            <div class="col-6">
              <label class="form-label fs-xs fw-bold">Aksen Warna HEX</label>
              <input type="color" class="form-control form-control-color w-100" value="#4ade80">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Deskripsi Ringkas</label>
            <textarea class="form-control" rows="3" placeholder="Deskripsi kurikulum dan kompetensi jurusan..."></textarea>
          </div>
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label fs-xs fw-bold">Kuota Siswa Baru</label>
              <input type="number" class="form-control" value="72">
            </div>
            <div class="col-6">
              <label class="form-label fs-xs fw-bold">Akreditasi</label>
              <select class="form-select">
                <option value="A" selected>Terakreditasi A</option>
                <option value="B">Terakreditasi B</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">File Gambar Ilustrasi 3D</label>
            <input type="file" class="form-control form-control-sm">
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="checkTampil" checked>
            <label class="form-check-label fs-xs" for="checkTampil">Tampilkan langsung pada Landing Page</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm" onclick="alert('Jurusan berhasil disimpan!');" data-bs-dismiss="modal">Simpan Jurusan</button>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/components/footer.php'; ?>
