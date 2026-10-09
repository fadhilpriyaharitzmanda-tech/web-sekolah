<?php
/**
 * Kelola Mitra Industri (DUDI) & PKL - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola Mitra Industri & PKL - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-mitra';
$assetsPath = 'assets/';

include 'components/header.php';
include 'components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include 'components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Mitra Industri (DUDI) &amp; PKL</h1>
      <p class="page-subtitle">Kelola kemitraan industri, program kelas industri, MoU resmi, dan data penempatan Praktik Kerja Lapangan (PKL).</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../pkl/index.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Halaman PKL Web
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalTambahMitra">
        <i class="bi bi-plus-lg"></i> Tambah Mitra Industri
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- STATS KEMITRAAN -->
  <div class="row g-3 mb-4">
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-success-subtle text-success fs-4"><i class="bi bi-building"></i></div>
        <div>
          <div class="text-muted fs-xs fw-bold">Total Mitra DUDI</div>
          <div class="fs-4 fw-bold">84 Perusahaan</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-primary-subtle text-primary fs-4"><i class="bi bi-file-earmark-check"></i></div>
        <div>
          <div class="text-muted fs-xs fw-bold">MoU Aktif Berjalan</div>
          <div class="fs-4 fw-bold">78 Kerjasama</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-warning-subtle text-warning fs-4"><i class="bi bi-person-workspace"></i></div>
        <div>
          <div class="text-muted fs-xs fw-bold">Siswa Sedang PKL</div>
          <div class="fs-4 fw-bold">482 Siswa</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-info-subtle text-info fs-4"><i class="bi bi-briefcase"></i></div>
        <div>
          <div class="text-muted fs-xs fw-bold">Serapan Kerja Alumni</div>
          <div class="fs-4 fw-bold">89% Lulusan</div>
        </div>
      </div>
    </div>
  </div>

  <!-- TABLE CONTAINER -->
  <div class="table-card-custom mb-4">
    <div class="table-header-control">
      <div class="table-search-box">
        <i class="bi bi-search table-search-icon"></i>
        <input type="text" class="table-search-input" placeholder="Cari nama perusahaan atau bidang usaha...">
      </div>
      <div class="table-filter-group">
        <select class="form-select form-select-sm" style="width: auto;">
          <option selected>Semua Bidang Industri</option>
          <option>Otomotif &amp; Manufaktur</option>
          <option>Teknologi Informasi &amp; Software</option>
          <option>Tekstil &amp; Garmen</option>
          <option>Permesinan &amp; Alat Berat</option>
        </select>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table-custom">
        <thead>
          <tr>
            <th>Logo</th>
            <th>Nama Perusahaan / Industri</th>
            <th>Bidang Kerjasama</th>
            <th>Program Terikat</th>
            <th>Kapasitas PKL</th>
            <th>Masa Berlaku MoU</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="rounded-circle bg-light d-flex align-items-center justify-content-center fw-bold text-success border" style="width: 44px; height: 44px;">
                AHM
              </div>
            </td>
            <td>
              <div class="fw-bold text-main">PT. Astra Honda Motor</div>
              <div class="text-muted fs-xs">Jakarta &amp; Karawang &bull; Manufaktur Otomotif</div>
            </td>
            <td>Kelas Industri &amp; PKL</td>
            <td><span class="badge bg-danger-subtle text-danger">Ototronik &amp; Mesin</span></td>
            <td><strong>40 Siswa / Tahun</strong></td>
            <td>2024 - 2029 (Aktif)</td>
            <td><span class="badge-table success">MoU Aktif</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button class="table-btn-action" title="Edit"><i class="bi bi-pencil"></i></button>
                <button class="table-btn-action" title="Data Siswa PKL"><i class="bi bi-people"></i></button>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="rounded-circle bg-light d-flex align-items-center justify-content-center fw-bold text-primary border" style="width: 44px; height: 44px;">
                SRI
              </div>
            </td>
            <td>
              <div class="fw-bold text-main">PT. Sri Rejeki Isman Tbk (Sritex)</div>
              <div class="text-muted fs-xs">Sukoharjo &bull; Tekstil &amp; Produk Tekstil</div>
            </td>
            <td>Perekrutan &amp; Prakerin</td>
            <td><span class="badge bg-warning-subtle text-warning">Teknik Tekstil (TPK)</span></td>
            <td><strong>60 Siswa / Tahun</strong></td>
            <td>2023 - 2028 (Aktif)</td>
            <td><span class="badge-table success">MoU Aktif</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button class="table-btn-action" title="Edit"><i class="bi bi-pencil"></i></button>
                <button class="table-btn-action" title="Data Siswa PKL"><i class="bi bi-people"></i></button>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="rounded-circle bg-light d-flex align-items-center justify-content-center fw-bold text-success border" style="width: 44px; height: 44px;">
                GTL
              </div>
            </td>
            <td>
              <div class="fw-bold text-main">PT. Gothika Teknologi Nusantara</div>
              <div class="text-muted fs-xs">Surakarta &bull; Software &amp; Cloud Development</div>
            </td>
            <td>Magang Industri &amp; Mentoring</td>
            <td><span class="badge bg-success-subtle text-success">RPL</span></td>
            <td><strong>25 Siswa / Tahun</strong></td>
            <td>2025 - 2028 (Aktif)</td>
            <td><span class="badge-table success">MoU Aktif</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button class="table-btn-action" title="Edit"><i class="bi bi-pencil"></i></button>
                <button class="table-btn-action" title="Data Siswa PKL"><i class="bi bi-people"></i></button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

<!-- Modal Tambah Mitra -->
<div class="modal fade" id="modalTambahMitra" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Tambah Mitra Industri (DUDI)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Nama Perusahaan / Lembaga</label>
            <input type="text" class="form-control" placeholder="Contoh: PT. Komatsu Indonesia">
          </div>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Lokasi / Alamat Singkat</label>
            <input type="text" class="form-control" placeholder="Kota / Kawasan Industri">
          </div>
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label fs-xs fw-bold">Program Keahlian Terkait</label>
              <select class="form-select">
                <option>Rekayasa Perangkat Lunak</option>
                <option>Teknik Pemesinan</option>
                <option>Teknik Pembuatan Kain</option>
                <option>Teknik Ototronik</option>
                <option>Semua Jurusan</option>
              </select>
            </div>
            <div class="col-6">
              <label class="form-label fs-xs fw-bold">Kapasitas Kuota PKL</label>
              <input type="number" class="form-control" placeholder="20">
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label fs-xs fw-bold">Mulai MoU</label>
              <input type="date" class="form-control">
            </div>
            <div class="col-6">
              <label class="form-label fs-xs fw-bold">Berakhir MoU</label>
              <input type="date" class="form-control">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm" onclick="alert('Mitra industri tersimpan!');" data-bs-dismiss="modal">Simpan Mitra</button>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/components/footer.php'; ?>
