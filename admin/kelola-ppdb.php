<?php
/**
 * Kelola PPDB Online - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola PPDB Online - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-ppdb';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Penerimaan Peserta Didik Baru (PPDB)</h1>
      <p class="page-subtitle">Verifikasi pendaftaran calon siswa baru, cek kelengkapan berkas NISN, raport, dan pengumuman seleksi mandiri online.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../layanan/ppdb.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Form PPDB Website
      </a>

      <button type="button" class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-2" onclick="alert('Data pendaftar PPDB berhasil diekspor ke Excel!')">
        <i class="bi bi-file-earmark-excel"></i> Ekspor Excel
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- STATS PPDB -->
  <div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Pendaftar</span>
          <div class="stat-icon-circle bg-primary-subtle text-primary">
            <i class="bi bi-person-lines-fill"></i>
          </div>
        </div>
        <div class="stat-value text-primary">642 Calon</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-arrow-up-right"></i>
          <span>+40% dari Kuota Total</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Berkas Terverifikasi</span>
          <div class="stat-icon-circle bg-success-subtle text-success">
            <i class="bi bi-check2-all"></i>
          </div>
        </div>
        <div class="stat-value text-success">489 Lolos</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span>Siap Tahap Pemetaan</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Menunggu Verifikasi</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-clock-history"></i>
          </div>
        </div>
        <div class="stat-value text-warning">128 Berkas</div>
        <div class="trend-badge text-warning">
          <i class="bi bi-hourglass-split"></i>
          <span>Antrean Verifikator</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Perlu Perbaikan</span>
          <div class="stat-icon-circle bg-danger-subtle text-danger">
            <i class="bi bi-exclamation-circle"></i>
          </div>
        </div>
        <div class="stat-value text-danger">25 Siswa</div>
        <div class="trend-badge text-danger">
          <i class="bi bi-info-circle"></i>
          <span>Foto/Raport Tidak Jelas</span>
        </div>
      </div>
    </div>
  </div>

  <!-- TABLE CONTAINER -->
  <div class="table-card-custom mb-4">
    <div class="table-header-control">
      <div class="table-search-box">
        <i class="bi bi-search table-search-icon"></i>
        <input type="text" class="table-search-input" id="searchPpdbInput" placeholder="Cari nama siswa, NISN, atau asal sekolah..." onkeyup="filterPpdbTable()">
      </div>
      <div class="table-filter-group">
        <select class="form-select form-select-sm" id="filterJurusanPpdb" onchange="filterPpdbTable()" style="width: auto;">
          <option value="" selected>Semua Jurusan Pilihan</option>
          <option value="RPL">Rekayasa Perangkat Lunak</option>
          <option value="TPM">Teknik Pemesinan</option>
          <option value="TPK">Teknik Pembuatan Kain</option>
          <option value="TOT">Teknik Ototronik</option>
        </select>
        <select class="form-select form-select-sm" id="filterStatusPpdb" onchange="filterPpdbTable()" style="width: auto;">
          <option value="" selected>Semua Status</option>
          <option value="Terverifikasi">Terverifikasi</option>
          <option value="Menunggu Berkas">Menunggu Berkas</option>
          <option value="Perlu Perbaikan">Perlu Perbaikan</option>
        </select>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table-custom" id="tablePpdbList">
        <thead>
          <tr>
            <th>No. Reg</th>
            <th>Nama Calon Siswa</th>
            <th>Pilihan Jurusan</th>
            <th>Asal Sekolah</th>
            <th>Rata-rata Nilai</th>
            <th>Tgl Daftar</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Row 1 -->
          <tr>
            <td class="table-order-id">#PPDB-2026-001</td>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_1.jpg" alt="Ahmad" class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Ahmad Farhan Pratama</div>
                  <div class="table-user-sub">NISN: 0072381920 &bull; 08123456789</div>
                </div>
              </div>
            </td>
            <td><span class="badge bg-success-subtle text-success fw-bold">RPL</span></td>
            <td>SMPN 1 Karanganyar</td>
            <td class="table-amount">89.40</td>
            <td>Hari ini, 09:15</td>
            <td><span class="badge-table success">Terverifikasi</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button type="button" class="table-btn-action" title="Detail Siswa" onclick="detailPpdb('Ahmad Farhan Pratama', '#PPDB-2026-001', 'RPL', 'SMPN 1 Karanganyar', '89.40', 'Terverifikasi')"><i class="bi bi-eye"></i></button>
                <button type="button" class="table-btn-action" title="Cetak Bukti Pendaftaran" onclick="alert('Mencetak kartu verifikasi untuk Ahmad Farhan Pratama...')"><i class="bi bi-printer"></i></button>
              </div>
            </td>
          </tr>

          <!-- Row 2 -->
          <tr>
            <td class="table-order-id">#PPDB-2026-002</td>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_2.jpg" alt="Dina" class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Dina Rahmawati</div>
                  <div class="table-user-sub">NISN: 0081923019 &bull; 08567812903</div>
                </div>
              </div>
            </td>
            <td><span class="badge bg-primary-subtle text-primary fw-bold">TPM (Mesin)</span></td>
            <td>SMPN 2 Tasikmadu</td>
            <td class="table-amount">87.80</td>
            <td>Hari ini, 10:20</td>
            <td><span class="badge-table warning">Menunggu Berkas</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button type="button" class="table-btn-action" title="Detail Siswa" onclick="detailPpdb('Dina Rahmawati', '#PPDB-2026-002', 'TPM', 'SMPN 2 Tasikmadu', '87.80', 'Menunggu Berkas')"><i class="bi bi-eye"></i></button>
                <button type="button" class="table-btn-action" title="Cetak Bukti Pendaftaran" onclick="alert('Mencetak kartu verifikasi untuk Dina Rahmawati...')"><i class="bi bi-printer"></i></button>
              </div>
            </td>
          </tr>

          <!-- Row 3 -->
          <tr>
            <td class="table-order-id">#PPDB-2026-003</td>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_3.jpg" alt="Bagas" class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Bagas Kurniawan</div>
                  <div class="table-user-sub">NISN: 0071982731 &bull; 08912389102</div>
                </div>
              </div>
            </td>
            <td><span class="badge bg-danger-subtle text-danger fw-bold">TOT (Ototronik)</span></td>
            <td>SMPN 3 Karanganyar</td>
            <td class="table-amount">85.60</td>
            <td>Kemarin, 14:10</td>
            <td><span class="badge-table success">Terverifikasi</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button type="button" class="table-btn-action" title="Detail Siswa" onclick="detailPpdb('Bagas Kurniawan', '#PPDB-2026-003', 'TOT', 'SMPN 3 Karanganyar', '85.60', 'Terverifikasi')"><i class="bi bi-eye"></i></button>
                <button type="button" class="table-btn-action" title="Cetak Bukti Pendaftaran" onclick="alert('Mencetak kartu verifikasi untuk Bagas Kurniawan...')"><i class="bi bi-printer"></i></button>
              </div>
            </td>
          </tr>

          <!-- Row 4 -->
          <tr>
            <td class="table-order-id">#PPDB-2026-004</td>
            <td>
              <div class="table-user-cell">
                <img src="assets/images/user_4.jpg" alt="Siti" class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
                <div>
                  <div class="table-user-name">Siti Nurhaliza</div>
                  <div class="table-user-sub">NISN: 0089201923 &bull; 08129812903</div>
                </div>
              </div>
            </td>
            <td><span class="badge bg-warning-subtle text-warning fw-bold">TPK (Tekstil)</span></td>
            <td>SMPN 1 Kebakkramat</td>
            <td class="table-amount">88.20</td>
            <td>07 Okt 2026</td>
            <td><span class="badge-table success">Terverifikasi</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button type="button" class="table-btn-action" title="Detail Siswa" onclick="detailPpdb('Siti Nurhaliza', '#PPDB-2026-004', 'TPK', 'SMPN 1 Kebakkramat', '88.20', 'Terverifikasi')"><i class="bi bi-eye"></i></button>
                <button type="button" class="table-btn-action" title="Cetak Bukti Pendaftaran" onclick="alert('Mencetak kartu verifikasi untuk Siti Nurhaliza...')"><i class="bi bi-printer"></i></button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Table Pagination -->
    <div class="table-footer-control">
      <div class="table-pagination-info">
        Menampilkan <strong>1 - 4</strong> dari <strong>642</strong> Calon Siswa Baru
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



<!-- Modal Detail Calon Siswa -->
<div class="modal fade" id="modalDetailPpdb" tabindex="-1" aria-labelledby="modalDetailPpdbLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalDetailPpdbLabel">
          <i class="bi bi-person-bounding-box text-success"></i> Berkas Lengkap Calon Siswa Baru
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label-custom">No. Pendaftaran</label>
            <input type="text" class="form-control-custom" id="detailNoreg" readonly>
          </div>
          <div class="col-md-6">
            <label class="form-label-custom">Nama Lengkap</label>
            <input type="text" class="form-control-custom" id="detailNama" readonly>
          </div>
          <div class="col-md-4">
            <label class="form-label-custom">Pilihan Jurusan</label>
            <input type="text" class="form-control-custom" id="detailJurusan" readonly>
          </div>
          <div class="col-md-4">
            <label class="form-label-custom">Asal SMP / MTs</label>
            <input type="text" class="form-control-custom" id="detailSmp" readonly>
          </div>
          <div class="col-md-4">
            <label class="form-label-custom">Nilai Rata-rata</label>
            <input type="text" class="form-control-custom" id="detailNilai" readonly>
          </div>
          <div class="col-12">
            <label class="form-label-custom">Status Verifikasi Saat Ini</label>
            <div class="p-3 rounded-3 bg-light border d-flex align-items-center justify-content-between">
              <span class="fw-bold text-main" id="detailStatusText">Terverifikasi</span>
              <button type="button" class="btn btn-sm btn-outline-success" onclick="alert('Berkas digital siswa berhasil diunduh.')">
                <i class="bi bi-file-earmark-arrow-down"></i> Unduh Lampiran Berkas
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="alert('Status verifikasi berhasil diperbarui!')">
          <i class="bi bi-check2-all"></i> Simpan Verifikasi
        </button>
      </div>
    </div>
  </div>
</div>

<script>
function detailPpdb(nama, noreg, jurusan, smp, nilai, status) {
  document.getElementById('detailNoreg').value = noreg;
  document.getElementById('detailNama').value = nama;
  document.getElementById('detailJurusan').value = jurusan;
  document.getElementById('detailSmp').value = smp;
  document.getElementById('detailNilai').value = nilai;
  document.getElementById('detailStatusText').textContent = status;

  const modalEl = document.getElementById('modalDetailPpdb');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}



function filterPpdbTable() {
  const query = (document.getElementById('searchPpdbInput').value || '').toLowerCase();
  const jur = (document.getElementById('filterJurusanPpdb').value || '').toLowerCase();
  const stat = (document.getElementById('filterStatusPpdb').value || '').toLowerCase();
  const rows = document.querySelectorAll('#tablePpdbList tbody tr');

  rows.forEach(row => {
    const text = row.textContent.toLowerCase();
    const matchQuery = !query || text.includes(query);
    const matchJur = !jur || text.includes(jur);
    const matchStat = !stat || text.includes(stat);
    if (matchQuery && matchJur && matchStat) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
}
</script>

<?php include __DIR__ . '/components/footer.php'; ?>
