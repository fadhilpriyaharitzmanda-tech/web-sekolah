<?php
/**
 * Kelola Guru & Tenaga Kependidikan - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola Guru & Staff - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-guru';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Guru &amp; Tenaga Kependidikan</h1>
      <p class="page-subtitle">Kelola profil guru, bidang studi pengajaran, NIP, status kepegawaian, dan tenaga staf yang tampil di website sekolah.</p>
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

  <!-- STATS GURU / REKAPITULASI -->
  <div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Guru &amp; Staff</span>
          <div class="stat-icon-circle bg-success-subtle text-success">
            <i class="bi bi-people-fill"></i>
          </div>
        </div>
        <div class="stat-value text-success">132 Orang</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span>Aktif Mengajar &amp; Dinas</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Guru Bersertifikasi</span>
          <div class="stat-icon-circle bg-primary-subtle text-primary">
            <i class="bi bi-award-fill"></i>
          </div>
        </div>
        <div class="stat-value text-primary">100% Pendidik</div>
        <div class="trend-badge text-primary">
          <i class="bi bi-shield-check"></i>
          <span>Sertifikat Pendidik Nasional</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Guru Kejuruan</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-book-half"></i>
          </div>
        </div>
        <div class="stat-value text-warning">76 Pengajar</div>
        <div class="trend-badge text-warning">
          <i class="bi bi-gear-fill"></i>
          <span>4 Program Keahlian</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Tenaga Kependidikan</span>
          <div class="stat-icon-circle bg-info-subtle text-info">
            <i class="bi bi-briefcase-fill"></i>
          </div>
        </div>
        <div class="stat-value text-info">24 Staf TU</div>
        <div class="trend-badge text-info">
          <i class="bi bi-building-fill-check"></i>
          <span>Tata Usaha &amp; Teknisi</span>
        </div>
      </div>
    </div>
  </div>

  <!-- TABLE CONTAINER -->
  <div class="table-card-custom mb-4">
    <div class="table-header-control">
      <div class="table-search-box">
        <i class="bi bi-search table-search-icon"></i>
        <input type="text" class="table-search-input" id="searchGuruInput" placeholder="Cari nama guru, NIP, atau mata pelajaran..." onkeyup="filterGuruTable()">
      </div>
      <div class="table-filter-group">
        <select class="form-select form-select-sm" id="filterBidangSelect" onchange="filterGuruTable()" style="width: auto;">
          <option value="" selected>Semua Bidang / Kejuruan</option>
          <option value="RPL">Produktif RPL</option>
          <option value="Mesin">Produktif Mesin</option>
          <option value="Tekstil">Produktif Tekstil</option>
          <option value="Ototronik">Produktif Ototronik</option>
          <option value="Normatif">Normatif &amp; Adaptif</option>
        </select>
        <button class="btn-table-action" type="button" onclick="alert('Data guru berhasil diekspor ke format Excel!')">
          <i class="bi bi-file-earmark-arrow-down"></i> Unduh Excel
        </button>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table-custom" id="tableGuruList">
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
          <!-- Guru 1 -->
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
                <button type="button" class="table-btn-action" title="Edit Guru" onclick="editGuru('Eko Prasetyo, S.Kom., M.Cs.', '19850412 201001 1 015', 'PNS', 'Produktif RPL', 'Ketua Program Keahlian RPL', 'S2 Ilmu Komputer', 'eko.prasetyo@smkn2kra.sch.id')">
                  <i class="bi bi-pencil"></i>
                </button>
                <button type="button" class="table-btn-action delete" title="Hapus Guru" onclick="hapusGuru(this, 'Eko Prasetyo, S.Kom., M.Cs.')">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Guru 2 -->
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
                <button type="button" class="table-btn-action" title="Edit Guru" onclick="editGuru('Bambang Sutrisno, S.T., M.T.', '19790823 200501 1 008', 'PNS', 'Teknik Mesin & CNC', 'Ketua Program Keahlian TPM', 'S2 Teknik Mesin', 'bambang.s@smkn2kra.sch.id')">
                  <i class="bi bi-pencil"></i>
                </button>
                <button type="button" class="table-btn-action delete" title="Hapus Guru" onclick="hapusGuru(this, 'Bambang Sutrisno, S.T., M.T.')">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Guru 3 -->
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
                <button type="button" class="table-btn-action" title="Edit Guru" onclick="editGuru('Ibu Sri Wahyuni, S.T.', '19821104 200801 2 012', 'PNS', 'Teknologi Tekstil (TPK)', 'Ketua Program Keahlian TPK', 'S1 Teknik Tekstil', 'sri.wahyuni@smkn2kra.sch.id')">
                  <i class="bi bi-pencil"></i>
                </button>
                <button type="button" class="table-btn-action delete" title="Hapus Guru" onclick="hapusGuru(this, 'Ibu Sri Wahyuni, S.T.')">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Guru 4 -->
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
                <button type="button" class="table-btn-action" title="Edit Guru" onclick="editGuru('Hendra Gunawan, S.Pd.', '19910515 201903 1 004', 'PPPK', 'Ototronik Kendaraan', 'Ketua Program Keahlian TOT', 'S1 Pendidikan Teknik Otomotif', 'hendra.g@smkn2kra.sch.id')">
                  <i class="bi bi-pencil"></i>
                </button>
                <button type="button" class="table-btn-action delete" title="Hapus Guru" onclick="hapusGuru(this, 'Hendra Gunawan, S.Pd.')">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="table-footer-control">
      <div class="table-pagination-info">
        Menampilkan <strong>1 - 4</strong> dari <strong>132</strong> Guru &amp; Staff Pendidik
      </div>
      <div class="table-pagination-nav">
        <button class="btn-pagination-nav" disabled><i class="bi bi-chevron-left"></i></button>
        <button class="btn-pagination-nav active">1</button>
        <button class="btn-pagination-nav">2</button>
        <button class="btn-pagination-nav">3</button>
        <button class="btn-pagination-nav"><i class="bi bi-chevron-right"></i></button>
      </div>
    </div>
  </div>
  <!-- END: table-card-custom -->

</div>
<!-- END: .main-wrapper -->

<!-- Modal Tambah Guru -->
<div class="modal fade" id="modalTambahGuru" tabindex="-1" aria-labelledby="modalTambahGuruLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTambahGuruLabel">
          <i class="bi bi-person-plus-fill text-success"></i> Tambah Data Guru &amp; Staff
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahGuru">
          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="tambahNamaGuru">Nama Lengkap &amp; Gelar</label>
              <input type="text" class="form-control-custom" id="tambahNamaGuru" placeholder="Contoh: Budi Susanto, S.Pd., M.Kom" required>
              <div class="form-text-custom">Gunakan nama lengkap beserta gelar akademik resmi.</div>
            </div>
            <div class="col-md-5">
              <label class="form-label-custom" for="tambahNipGuru">NIP / NUPTK</label>
              <input type="text" class="form-control-custom" id="tambahNipGuru" placeholder="19870315 201101 1 002" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahStatusGuru">Status Kepegawaian</label>
              <select class="form-select-custom" id="tambahStatusGuru">
                <option value="PNS" selected>PNS (Pegawai Negeri Sipil)</option>
                <option value="PPPK">PPPK (P3K Kemendikbud)</option>
                <option value="GTT / PTT">GTT / PTT (Guru Tidak Tetap)</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahMapelGuru">Mata Pelajaran / Bidang Pengajaran</label>
              <input type="text" class="form-control-custom" id="tambahMapelGuru" placeholder="Pemrograman Web &amp; Perangkat Bergerak" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahJabatanGuru">Jabatan Tambahan (Opsional)</label>
              <input type="text" class="form-control-custom" id="tambahJabatanGuru" placeholder="Waka Kurikulum / Kaprodi RPL / Wali Kelas">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahEmailGuru">Email Institusi Resmi</label>
              <input type="email" class="form-control-custom" id="tambahEmailGuru" placeholder="nama@smkn2kra.sch.id">
              <div class="form-text-custom">Email domain sekolah untuk koordinasi dinas.</div>
            </div>

            <div class="col-12">
              <label class="form-label-custom">Foto Profil Resmi (Format JPG/PNG)</label>
              <input type="file" class="form-control-custom" accept="image/*">
              <div class="form-text-custom">Rekomendasi rasio pas foto 3x4 atau 1:1 resolusi minimal 500x500px.</div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanTambahGuru()">
          <i class="bi bi-check-circle-fill"></i> Simpan Data Guru
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Guru -->
<div class="modal fade" id="modalEditGuru" tabindex="-1" aria-labelledby="modalEditGuruLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalEditGuruLabel">
          <i class="bi bi-pencil-square text-success"></i> Edit Data Guru &amp; Staff
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditGuru">
          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="editNamaGuru">Nama Lengkap &amp; Gelar</label>
              <input type="text" class="form-control-custom" id="editNamaGuru" required>
            </div>
            <div class="col-md-5">
              <label class="form-label-custom" for="editNipGuru">NIP / NUPTK</label>
              <input type="text" class="form-control-custom" id="editNipGuru" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="editStatusGuru">Status Kepegawaian</label>
              <select class="form-select-custom" id="editStatusGuru">
                <option value="PNS">PNS (Pegawai Negeri Sipil)</option>
                <option value="PPPK">PPPK (P3K Kemendikbud)</option>
                <option value="GTT / PTT">GTT / PTT (Guru Tidak Tetap)</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editMapelGuru">Mata Pelajaran / Bidang</label>
              <input type="text" class="form-control-custom" id="editMapelGuru" required>
            </div>

            <div class="col-md-4">
              <label class="form-label-custom" for="editJabatanGuru">Jabatan Tambahan</label>
              <input type="text" class="form-control-custom" id="editJabatanGuru">
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="editPendidikanGuru">Pendidikan Terakhir</label>
              <input type="text" class="form-control-custom" id="editPendidikanGuru">
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="editEmailGuru">Email Institusi</label>
              <input type="email" class="form-control-custom" id="editEmailGuru">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanEditGuru()">
          <i class="bi bi-save-fill"></i> Perbarui Data Guru
        </button>
      </div>
    </div>
  </div>
</div>

<script>
function editGuru(nama, nip, status, mapel, jabatan, pendidikan, email) {
  document.getElementById('editNamaGuru').value = nama;
  document.getElementById('editNipGuru').value = nip;
  document.getElementById('editStatusGuru').value = status;
  document.getElementById('editMapelGuru').value = mapel;
  document.getElementById('editJabatanGuru').value = jabatan;
  document.getElementById('editPendidikanGuru').value = pendidikan;
  document.getElementById('editEmailGuru').value = email;

  const modalEl = document.getElementById('modalEditGuru');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function simpanTambahGuru() {
  const nama = document.getElementById('tambahNamaGuru').value;
  if (!nama) {
    alert('Silakan masukkan nama guru!');
    return;
  }
  const modalEl = document.getElementById('modalTambahGuru');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  alert('Data guru "' + nama + '" berhasil disimpan ke database!');
}

function simpanEditGuru() {
  const nama = document.getElementById('editNamaGuru').value;
  const modalEl = document.getElementById('modalEditGuru');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  alert('Perubahan data guru "' + nama + '" berhasil diperbarui!');
}

function hapusGuru(btn, nama) {
  if (confirm('Apakah Anda yakin ingin menghapus data guru: ' + nama + '?')) {
    const row = btn.closest('tr');
    if (row) {
      row.style.opacity = '0.3';
      setTimeout(() => {
        row.remove();
        alert('Data guru "' + nama + '" telah berhasil dihapus.');
      }, 250);
    }
  }
}

function filterGuruTable() {
  const query = (document.getElementById('searchGuruInput').value || '').toLowerCase();
  const filter = (document.getElementById('filterBidangSelect').value || '').toLowerCase();
  const rows = document.querySelectorAll('#tableGuruList tbody tr');

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
