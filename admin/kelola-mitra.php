<?php
/**
 * Kelola Mitra Industri (DUDI) & PKL - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola Mitra Industri & PKL - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-mitra';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

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

  <!-- REKAPITULASI QUICK STATS BAR -->
  <div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Mitra DUDI</span>
          <div class="stat-icon-circle bg-success-subtle text-success">
            <i class="bi bi-buildings-fill"></i>
          </div>
        </div>
        <div class="stat-value text-success">84 Mitra</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span>Perusahaan Bersertifikat</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">MoU Aktif Berjalan</span>
          <div class="stat-icon-circle bg-primary-subtle text-primary">
            <i class="bi bi-file-earmark-check-fill"></i>
          </div>
        </div>
        <div class="stat-value text-primary">78 Kerjasama</div>
        <div class="trend-badge text-primary">
          <i class="bi bi-shield-check"></i>
          <span>Berlaku 3 - 5 Tahun</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Siswa Sedang PKL</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-person-workspace"></i>
          </div>
        </div>
        <div class="stat-value text-warning">482 Siswa</div>
        <div class="trend-badge text-warning">
          <i class="bi bi-geo-alt-fill"></i>
          <span>Solo Raya &amp; Jakarta</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Serapan Kerja Alumni</span>
          <div class="stat-icon-circle bg-info-subtle text-info">
            <i class="bi bi-graph-up-arrow"></i>
          </div>
        </div>
        <div class="stat-value text-info">89% Lulusan</div>
        <div class="trend-badge text-info">
          <i class="bi bi-star-fill"></i>
          <span>Rekrutmen Langsung DUDI</span>
        </div>
      </div>
    </div>
  </div>

  <!-- TABLE CONTAINER -->
  <div class="table-card-custom mb-4">
    <div class="table-header-control">
      <div class="table-search-box">
        <i class="bi bi-search table-search-icon"></i>
        <input type="text" class="table-search-input" id="searchMitraInput" placeholder="Cari nama perusahaan atau bidang usaha..." onkeyup="filterMitraTable()">
      </div>
      <div class="table-filter-group">
        <select class="form-select form-select-sm" id="filterBidangMitra" onchange="filterMitraTable()" style="width: auto;">
          <option value="" selected>Semua Bidang Industri</option>
          <option value="Otomotif">Otomotif &amp; Manufaktur</option>
          <option value="Software">Teknologi &amp; Software</option>
          <option value="Tekstil">Tekstil &amp; Garmen</option>
          <option value="Pemesinan">Permesinan Presisi</option>
        </select>
        <button class="btn-table-action" type="button" onclick="alert('Data kemitraan industri berhasil diekspor ke Excel!')">
          <i class="bi bi-file-earmark-excel"></i> Unduh Excel
        </button>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table-custom" id="tableMitraList">
        <thead>
          <tr>
            <th style="width: 70px;">Logo</th>
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
          <!-- Mitra 1 -->
          <tr>
            <td style="width: 70px;">
              <div class="rounded-3 bg-light d-flex align-items-center justify-content-center fw-bold text-success border" style="width: 46px; height: 46px; font-size: 0.82rem; letter-spacing: 0.05em;">
                AHM
              </div>
            </td>
            <td>
              <div class="fw-bold text-main">PT. Astra Honda Motor</div>
              <div class="text-muted fs-xs">Jakarta &amp; Karawang &bull; Manufaktur Otomotif</div>
            </td>
            <td>Kelas Industri &amp; PKL</td>
            <td><span class="badge bg-danger-subtle text-danger fw-bold">Ototronik &amp; Mesin</span></td>
            <td><strong>40 Siswa / Tahun</strong></td>
            <td>2024 - 2029 (Aktif)</td>
            <td><span class="badge-table success">MoU Aktif</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button type="button" class="table-btn-action" title="Edit Mitra" onclick="editMitra('PT. Astra Honda Motor', 'Jakarta & Karawang', 'Ototronik & Mesin', '40', '2024-01-01', '2029-12-31')">
                  <i class="bi bi-pencil"></i>
                </button>
                <button type="button" class="table-btn-action" title="Data Siswa PKL" onclick="lihatSiswaPKL('PT. Astra Honda Motor', '40 Siswa')">
                  <i class="bi bi-people"></i>
                </button>
                <button type="button" class="table-btn-action delete" title="Hapus Mitra" onclick="hapusMitra(this, 'PT. Astra Honda Motor')">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Mitra 2 -->
          <tr>
            <td style="width: 70px;">
              <div class="rounded-3 bg-light d-flex align-items-center justify-content-center fw-bold text-primary border" style="width: 46px; height: 46px; font-size: 0.82rem; letter-spacing: 0.05em;">
                SRI
              </div>
            </td>
            <td>
              <div class="fw-bold text-main">PT. Sri Rejeki Isman Tbk (Sritex)</div>
              <div class="text-muted fs-xs">Sukoharjo &bull; Tekstil &amp; Produk Tekstil</div>
            </td>
            <td>Perekrutan &amp; Prakerin</td>
            <td><span class="badge bg-warning-subtle text-warning fw-bold">Teknik Tekstil (TPK)</span></td>
            <td><strong>60 Siswa / Tahun</strong></td>
            <td>2023 - 2028 (Aktif)</td>
            <td><span class="badge-table success">MoU Aktif</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button type="button" class="table-btn-action" title="Edit Mitra" onclick="editMitra('PT. Sri Rejeki Isman Tbk (Sritex)', 'Sukoharjo', 'Teknik Tekstil (TPK)', '60', '2023-05-10', '2028-05-10')">
                  <i class="bi bi-pencil"></i>
                </button>
                <button type="button" class="table-btn-action" title="Data Siswa PKL" onclick="lihatSiswaPKL('PT. Sri Rejeki Isman Tbk', '58 Siswa')">
                  <i class="bi bi-people"></i>
                </button>
                <button type="button" class="table-btn-action delete" title="Hapus Mitra" onclick="hapusMitra(this, 'PT. Sritex')">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Mitra 3 -->
          <tr>
            <td style="width: 70px;">
              <div class="rounded-3 bg-light d-flex align-items-center justify-content-center fw-bold text-success border" style="width: 46px; height: 46px; font-size: 0.82rem; letter-spacing: 0.05em;">
                GTL
              </div>
            </td>
            <td>
              <div class="fw-bold text-main">PT. Gothika Teknologi Nusantara</div>
              <div class="text-muted fs-xs">Surakarta &bull; Software &amp; Cloud Development</div>
            </td>
            <td>Magang Industri &amp; Mentoring</td>
            <td><span class="badge bg-success-subtle text-success fw-bold">RPL</span></td>
            <td><strong>25 Siswa / Tahun</strong></td>
            <td>2025 - 2028 (Aktif)</td>
            <td><span class="badge-table success">MoU Aktif</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button type="button" class="table-btn-action" title="Edit Mitra" onclick="editMitra('PT. Gothika Teknologi Nusantara', 'Surakarta', 'RPL', '25', '2025-01-01', '2028-01-01')">
                  <i class="bi bi-pencil"></i>
                </button>
                <button type="button" class="table-btn-action" title="Data Siswa PKL" onclick="lihatSiswaPKL('PT. Gothika Teknologi Nusantara', '24 Siswa')">
                  <i class="bi bi-people"></i>
                </button>
                <button type="button" class="table-btn-action delete" title="Hapus Mitra" onclick="hapusMitra(this, 'PT. Gothika Teknologi')">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Table Pagination -->
    <div class="table-footer-control">
      <div class="table-pagination-info">
        Menampilkan <strong>1 - 3</strong> dari <strong>84</strong> Mitra Industri Terikat
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

<!-- Modal Tambah Mitra -->
<div class="modal fade" id="modalTambahMitra" tabindex="-1" aria-labelledby="modalTambahMitraLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTambahMitraLabel">
          <i class="bi bi-buildings-fill text-success"></i> Tambah Mitra Industri (DUDI)
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahMitra">
          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="tambahNamaMitra">Nama Perusahaan / Lembaga Industri</label>
              <input type="text" class="form-control-custom" id="tambahNamaMitra" placeholder="Contoh: PT. Komatsu Indonesia" required>
              <div class="form-text-custom">Nama resmi mitra BUMN/Swasta/Multinasional bersertifikat.</div>
            </div>
            <div class="col-md-5">
              <label class="form-label-custom" for="tambahLokasiMitra">Kawasan / Kota Industri</label>
              <input type="text" class="form-control-custom" id="tambahLokasiMitra" placeholder="Cikarang, Bekasi / Solo Raya" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahJurusanMitra">Program Keahlian Terkait</label>
              <select class="form-select-custom" id="tambahJurusanMitra">
                <option value="RPL">Rekayasa Perangkat Lunak (RPL)</option>
                <option value="TPM">Teknik Pemesinan (TPM)</option>
                <option value="TPK">Teknik Pembuatan Kain (TPK)</option>
                <option value="TOT">Teknik Ototronik (TOT)</option>
                <option value="Semua">Semua Program Keahlian</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahKuotaMitra">Kapasitas Kuota PKL Siswa / Tahun</label>
              <input type="number" class="form-control-custom" id="tambahKuotaMitra" placeholder="25" value="25">
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahMulaiMou">Tanggal Mulai Berlaku MoU</label>
              <input type="date" class="form-control-custom" id="tambahMulaiMou" value="<?= date('Y-m-d') ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahSelesaiMou">Tanggal Berakhir Masa MoU</label>
              <input type="date" class="form-control-custom" id="tambahSelesaiMou" value="<?= date('Y-m-d', strtotime('+3 years')) ?>">
              <div class="form-text-custom">Standar periode kerjasama DUDI adalah 3 s/d 5 tahun.</div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanTambahMitra()">
          <i class="bi bi-check-circle-fill"></i> Simpan Mitra
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Mitra -->
<div class="modal fade" id="modalEditMitra" tabindex="-1" aria-labelledby="modalEditMitraLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalEditMitraLabel">
          <i class="bi bi-pencil-square text-success"></i> Edit Kemitraan Industri
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditMitra">
          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="editNamaMitra">Nama Perusahaan</label>
              <input type="text" class="form-control-custom" id="editNamaMitra" required>
            </div>
            <div class="col-md-5">
              <label class="form-label-custom" for="editLokasiMitra">Lokasi / Alamat</label>
              <input type="text" class="form-control-custom" id="editLokasiMitra" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="editJurusanMitra">Program Terkait</label>
              <input type="text" class="form-control-custom" id="editJurusanMitra">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editKuotaMitra">Kuota PKL Tahunan</label>
              <input type="number" class="form-control-custom" id="editKuotaMitra">
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="editMulaiMou">Mulai MoU</label>
              <input type="date" class="form-control-custom" id="editMulaiMou">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editSelesaiMou">Berakhir MoU</label>
              <input type="date" class="form-control-custom" id="editSelesaiMou">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanEditMitra()">
          <i class="bi bi-save-fill"></i> Perbarui Mitra
        </button>
      </div>
    </div>
  </div>
</div>

<script>
function editMitra(nama, lokasi, jurusan, kuota, mulai, selesai) {
  document.getElementById('editNamaMitra').value = nama;
  document.getElementById('editLokasiMitra').value = lokasi;
  document.getElementById('editJurusanMitra').value = jurusan;
  document.getElementById('editKuotaMitra').value = kuota;
  document.getElementById('editMulaiMou').value = mulai;
  document.getElementById('editSelesaiMou').value = selesai;

  const modalEl = document.getElementById('modalEditMitra');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function lihatSiswaPKL(perusahaan, jumlah) {
  alert('Data Penempatan PKL:\nPerusahaan: ' + perusahaan + '\nTotal Siswa Aktif: ' + jumlah + '\nStatus: Seluruh siswa telah dilengkapi asuransi kerja dan surat tugas resmi.');
}

function simpanTambahMitra() {
  const nama = document.getElementById('tambahNamaMitra').value;
  if (!nama) {
    alert('Silakan masukkan nama mitra industri!');
    return;
  }
  const modalEl = document.getElementById('modalTambahMitra');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  alert('Mitra industri "' + nama + '" berhasil disimpan ke database!');
}

function simpanEditMitra() {
  const nama = document.getElementById('editNamaMitra').value;
  const modalEl = document.getElementById('modalEditMitra');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  alert('Data mitra "' + nama + '" berhasil diperbarui!');
}

function hapusMitra(btn, nama) {
  if (confirm('Hapus data kemitraan dengan ' + nama + '?')) {
    const row = btn.closest('tr');
    if (row) {
      row.style.opacity = '0.3';
      setTimeout(() => {
        row.remove();
        alert('Mitra industri ' + nama + ' berhasil dihapus.');
      }, 250);
    }
  }
}

function filterMitraTable() {
  const query = (document.getElementById('searchMitraInput').value || '').toLowerCase();
  const filter = (document.getElementById('filterBidangMitra').value || '').toLowerCase();
  const rows = document.querySelectorAll('#tableMitraList tbody tr');

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
