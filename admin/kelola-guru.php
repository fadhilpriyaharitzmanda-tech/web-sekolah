<?php
/**
 * Kelola Guru & Tenaga Kependidikan - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola Guru & Staff - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-guru';
$assetsPath = 'assets/';

include 'components/header.php';
include 'components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include 'components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Guru &amp; Tenaga Kependidikan</h1>
      <p class="page-subtitle">Kelola profil guru, bidang studi pengajaran, NIP, dan staf pendidik yang ditampilkan di website sekolah.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../akademik/guru.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Halaman Guru Web
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalTambahGuru">
        <i class="bi bi-person-plus"></i> Tambah Data Guru
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- STATS GURU -->
  <div class="row g-3 mb-4">
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-success-subtle text-success fs-4"><i class="bi bi-people"></i></div>
        <div>
          <div class="text-muted fs-xs fw-bold">Total Guru &amp; Staff</div>
          <div class="fs-4 fw-bold">132 Orang</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-primary-subtle text-primary fs-4"><i class="bi bi-award"></i></div>
        <div>
          <div class="text-muted fs-xs fw-bold">Guru Bersertifikasi</div>
          <div class="fs-4 fw-bold">100% Pendidik</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-warning-subtle text-warning fs-4"><i class="bi bi-book"></i></div>
        <div>
          <div class="text-muted fs-xs fw-bold">Guru Produktif Kejuruan</div>
          <div class="fs-4 fw-bold">76 Pengajar</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 mb-0 shadow-sm border-0 d-flex flex-row align-items-center gap-3">
        <div class="rounded-circle p-3 bg-info-subtle text-info fs-4"><i class="bi bi-briefcase"></i></div>
        <div>
          <div class="text-muted fs-xs fw-bold">Tenaga Tata Usaha</div>
          <div class="fs-4 fw-bold">24 Staf</div>
        </div>
      </div>
    </div>
  </div>

  <!-- TABLE CONTAINER -->
  <div class="table-card-custom mb-4">
    <div class="table-header-control">
      <div class="table-search-box">
        <i class="bi bi-search table-search-icon"></i>
        <input type="text" class="table-search-input" placeholder="Cari nama guru, NIP, atau mata pelajaran...">
      </div>
      <div class="table-filter-group">
        <select class="form-select form-select-sm" style="width: auto;">
          <option selected>Semua Bidang / Kejuruan</option>
          <option>Produktif RPL</option>
          <option>Produktif Mesin</option>
          <option>Produktif Tekstil</option>
          <option>Produktif Ototronik</option>
          <option>Normatif &amp; Adaptif</option>
        </select>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table-custom">
        <thead>
          <tr>
            <th>Guru / Tenaga Pendidik</th>
            <th>NIP / NUPTK</th>
            <th>Mata Pelajaran / Bidang</th>
            <th>Jabatan Tambahan</th>
            <th>Pendidikan Terakhir</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_5.jpg" alt="Eko" class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Eko Prasetyo, S.Kom., M.Cs.</div>
                  <div class="table-user-sub">eko.prasetyo@smkn2kra.sch.id</div>
                </div>
              </div>
            </td>
            <td>19850412 201001 1 015</td>
            <td><span class="badge bg-success-subtle text-success">Produktif RPL</span></td>
            <td>Ketua Program Keahlian RPL</td>
            <td>S2 Ilmu Komputer</td>
            <td><span class="badge-table success">PNS</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button class="table-btn-action" title="Edit"><i class="bi bi-pencil"></i></button>
                <button class="table-btn-action delete" title="Hapus"><i class="bi bi-trash"></i></button>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_6.jpg" alt="Bambang" class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Bambang Sutrisno, S.T., M.T.</div>
                  <div class="table-user-sub">bambang.s@smkn2kra.sch.id</div>
                </div>
              </div>
            </td>
            <td>19790823 200501 1 008</td>
            <td><span class="badge bg-primary-subtle text-primary">Teknik Mesin &amp; CNC</span></td>
            <td>Ketua Program Keahlian TPM</td>
            <td>S2 Teknik Mesin</td>
            <td><span class="badge-table success">PNS</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button class="table-btn-action" title="Edit"><i class="bi bi-pencil"></i></button>
                <button class="table-btn-action delete" title="Hapus"><i class="bi bi-trash"></i></button>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_7.jpg" alt="Sri" class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Ibu Sri Wahyuni, S.T.</div>
                  <div class="table-user-sub">sri.wahyuni@smkn2kra.sch.id</div>
                </div>
              </div>
            </td>
            <td>19821104 200801 2 012</td>
            <td><span class="badge bg-warning-subtle text-warning">Teknologi Tekstil (TPK)</span></td>
            <td>Ketua Program Keahlian TPK</td>
            <td>S1 Teknik Tekstil</td>
            <td><span class="badge-table success">PNS</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button class="table-btn-action" title="Edit"><i class="bi bi-pencil"></i></button>
                <button class="table-btn-action delete" title="Hapus"><i class="bi bi-trash"></i></button>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_8.jpg" alt="Hendra" class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Hendra Gunawan, S.Pd.</div>
                  <div class="table-user-sub">hendra.g@smkn2kra.sch.id</div>
                </div>
              </div>
            </td>
            <td>19910515 201903 1 004</td>
            <td><span class="badge bg-danger-subtle text-danger">Ototronik Kendaraan</span></td>
            <td>Ketua Program Keahlian TOT</td>
            <td>S1 Pendidikan Teknik Otomotif</td>
            <td><span class="badge-table info">PPPK</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button class="table-btn-action" title="Edit"><i class="bi bi-pencil"></i></button>
                <button class="table-btn-action delete" title="Hapus"><i class="bi bi-trash"></i></button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
<!-- Modal Tambah Guru -->
<div class="modal fade" id="modalTambahGuru" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Tambah Data Guru &amp; Staff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Nama Lengkap &amp; Gelar</label>
            <input type="text" class="form-control" placeholder="Contoh: Budi Susanto, S.Pd., M.Kom">
          </div>
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label fs-xs fw-bold">NIP / NUPTK</label>
              <input type="text" class="form-control" placeholder="1987...">
            </div>
            <div class="col-6">
              <label class="form-label fs-xs fw-bold">Status Kepegawaian</label>
              <select class="form-select">
                <option>PNS</option>
                <option>PPPK</option>
                <option>GTT / PTT</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Mata Pelajaran / Bidang Pengajaran</label>
            <input type="text" class="form-control" placeholder="Pemrograman Web & Perangkat Bergerak">
          </div>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Email Institusi</label>
            <input type="email" class="form-control" placeholder="nama@smkn2kra.sch.id">
          </div>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Foto Profil Pengajar</label>
            <input type="file" class="form-control form-control-sm">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm" onclick="alert('Data guru berhasil ditambahkan!');" data-bs-dismiss="modal">Simpan Guru</button>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/components/footer.php'; ?>
