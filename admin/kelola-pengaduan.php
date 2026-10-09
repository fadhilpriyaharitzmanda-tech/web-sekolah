<?php
/**
 * Kelola Kotak Pengaduan & Aspirasi - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola Pengaduan & Aspirasi - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-pengaduan';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Kotak Pengaduan &amp; Layanan Aspirasi</h1>
      <p class="page-subtitle">Tindaklanjuti keluhan sarana prasarana, kritik, saran, serta aspirasi dari siswa, wali murid, dan masyarakat.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../informasi/kontak.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Form Aduan Website
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="alert('Laporan pengaduan berhasil diekspor ke PDF!')">
        <i class="bi bi-download"></i> Unduh Laporan
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- REKAPITULASI STATS PENGADUAN -->
  <div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Laporan Masuk</span>
          <div class="stat-icon-circle bg-primary-subtle text-primary">
            <i class="bi bi-inbox-fill"></i>
          </div>
        </div>
        <div class="stat-value text-primary">28 Laporan</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-arrow-up-right"></i>
          <span>Periode Tahun Berjalan</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Menunggu Respon</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-hourglass-split"></i>
          </div>
        </div>
        <div class="stat-value text-warning">3 Laporan</div>
        <div class="trend-badge text-warning">
          <i class="bi bi-clock-fill"></i>
          <span>Perlu Tindakan Cepat</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Dalam Penanganan</span>
          <div class="stat-icon-circle bg-info-subtle text-info">
            <i class="bi bi-arrow-repeat"></i>
          </div>
        </div>
        <div class="stat-value text-info">5 Laporan</div>
        <div class="trend-badge text-info">
          <i class="bi bi-gear-fill"></i>
          <span>Sedang Diproses Tim Terkait</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Selesai Ditindaklanjuti</span>
          <div class="stat-icon-circle bg-success-subtle text-success">
            <i class="bi bi-check-circle-fill"></i>
          </div>
        </div>
        <div class="stat-value text-success">20 Laporan</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-all"></i>
          <span>71% Tingkat Penyelesaian</span>
        </div>
      </div>
    </div>
  </div>

  <!-- TABLE CONTAINER -->
  <div class="table-card-custom mb-4">
    <div class="table-header-control">
      <div class="table-search-box">
        <i class="bi bi-search table-search-icon"></i>
        <input type="text" class="table-search-input" id="searchPengaduanInput" placeholder="Cari nama pelapor, tiket aduan, atau topik..." onkeyup="filterPengaduanTable()">
      </div>
      <div class="table-filter-group">
        <select class="form-select form-select-sm" id="filterKategoriPengaduan" onchange="filterPengaduanTable()" style="width: auto;">
          <option value="" selected>Semua Kategori</option>
          <option value="Sarpras">Sarana &amp; Prasarana</option>
          <option value="Fasilitas">Fasilitas Lab</option>
          <option value="Apresiasi">Apresiasi Publik</option>
        </select>
        <button class="btn-table-action" type="button" onclick="filterPengaduanTable()">
          <i class="bi bi-arrow-clockwise"></i> Segarkan
        </button>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table-custom" id="tablePengaduanList">
        <thead>
          <tr>
            <th style="width: 130px;">No. Tiket</th>
            <th>Nama Pelapor</th>
            <th>Topik Pengaduan &amp; Isi</th>
            <th>Kategori</th>
            <th>Tanggal Lapor</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Row 1 -->
          <tr>
            <td class="table-order-id" style="width: 130px;">#ADU-2026-028</td>
            <td>
              <div class="fw-bold text-main">Budi Santoso</div>
              <div class="text-muted fs-xs">Wali Murid &bull; 08139281029</div>
            </td>
            <td class="table-cell-title text-wrap-cell">
              <div class="fw-bold text-main mb-1">Penerangan Akses Parkir Gerbang Selatan</div>
              <div class="text-muted fs-xs">Lampu penerangan di area parkir motor siswa gerbang selatan padam saat kegiatan ekstrakurikuler sore hari...</div>
            </td>
            <td><span class="badge bg-warning-subtle text-warning fw-bold">Sarpras</span></td>
            <td>08 Okt 2026</td>
            <td><span class="badge-table warning">Menunggu Respon</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button type="button" class="table-btn-action" title="Tindak Lanjuti" onclick="tindakLanjutiAduan('#ADU-2026-028', 'Budi Santoso')"><i class="bi bi-reply-fill"></i></button>
                <button type="button" class="table-btn-action" title="Tandai Selesai" onclick="selesaikanAduan(this, '#ADU-2026-028')"><i class="bi bi-check-lg"></i></button>
              </div>
            </td>
          </tr>

          <!-- Row 2 -->
          <tr>
            <td class="table-order-id" style="width: 130px;">#ADU-2026-027</td>
            <td>
              <div class="fw-bold text-main">Rina Wulandari</div>
              <div class="text-muted fs-xs">Siswa Kelas XI RPL 2</div>
            </td>
            <td class="table-cell-title text-wrap-cell">
              <div class="fw-bold text-main mb-1">Pendingin AC Lab Komputer 3 Kurang Dingin</div>
              <div class="text-muted fs-xs">Unit pendingin ruangan di lab software nomor 3 sering mati otomatis saat dipakai praktik rendering aplikasi...</div>
            </td>
            <td><span class="badge bg-info-subtle text-info fw-bold">Fasilitas Lab</span></td>
            <td>07 Okt 2026</td>
            <td><span class="badge-table info">Proses Servis</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button type="button" class="table-btn-action" title="Tindak Lanjuti" onclick="tindakLanjutiAduan('#ADU-2026-027', 'Rina Wulandari')"><i class="bi bi-reply-fill"></i></button>
                <button type="button" class="table-btn-action" title="Tandai Selesai" onclick="selesaikanAduan(this, '#ADU-2026-027')"><i class="bi bi-check-lg"></i></button>
              </div>
            </td>
          </tr>

          <!-- Row 3 -->
          <tr>
            <td class="table-order-id" style="width: 130px;">#ADU-2026-026</td>
            <td>
              <div class="fw-bold text-main">Dra. Haryati</div>
              <div class="text-muted fs-xs">Masyarakat Sekitar</div>
            </td>
            <td class="table-cell-title text-wrap-cell">
              <div class="fw-bold text-main mb-1">Apresiasi Kebersihan Trotoar Depan Sekolah</div>
              <div class="text-muted fs-xs">Terima kasih atas kepedulian tim kebersihan sekolah yang rutin membersihkan saluran air depan gerbang...</div>
            </td>
            <td><span class="badge bg-success-subtle text-success fw-bold">Apresiasi Publik</span></td>
            <td>04 Okt 2026</td>
            <td><span class="badge-table success">Selesai</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button type="button" class="table-btn-action" title="Lihat Detail" onclick="alert('Tiket #ADU-2026-026 telah selesai dan telah diarsipkan.')"><i class="bi bi-eye"></i></button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Table Pagination -->
    <div class="table-footer-control">
      <div class="table-pagination-info">
        Menampilkan <strong>1 - 3</strong> dari <strong>28</strong> Tiket Aspirasi &amp; Pengaduan
      </div>
      <div class="table-pagination-nav">
        <button class="btn-pagination-nav" disabled><i class="bi bi-chevron-left"></i></button>
        <button class="btn-pagination-nav active">1</button>
        <button class="btn-pagination-nav">2</button>
        <button class="btn-pagination-nav"><i class="bi bi-chevron-right"></i></button>
      </div>
    </div>
  </div>
  <!-- END: table-card-custom -->

</div>
<!-- END: .main-wrapper -->

<!-- Modal Tindak Lanjut Pengaduan -->
<div class="modal fade" id="modalTindakLanjutPengaduan" tabindex="-1" aria-labelledby="modalTindakLanjutLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTindakLanjutLabel">
          <i class="bi bi-chat-left-text-fill text-success"></i> Respon &amp; Tindak Lanjut Aspirasi
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formResponPengaduan">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label-custom" for="modalTiketId">Nomor Tiket Aduan</label>
              <input type="text" class="form-control-custom" id="modalTiketId" readonly>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="modalNamaPelapor">Nama Pelapor</label>
              <input type="text" class="form-control-custom" id="modalNamaPelapor" readonly>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="modalStatusAduan">Pembaruan Status Penanganan</label>
              <select class="form-select-custom" id="modalStatusAduan">
                <option value="Proses">Sedang Dalam Penanganan Tim Terkait</option>
                <option value="Selesai" selected>Selesai Ditindaklanjuti Paripurna</option>
                <option value="Tolak">Diarsipkan (Laporan Tidak Relevan)</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="modalUnitTerkait">Unit / Penanggung Jawab Terkait</label>
              <select class="form-select-custom" id="modalUnitTerkait">
                <option value="Sarpras" selected>Waka Sarana &amp; Prasarana</option>
                <option value="Kurikulum">Waka Kurikulum &amp; Pembelajaran</option>
                <option value="Kesiswaan">Waka Kesiswaan &amp; BK</option>
                <option value="Humas">Humas &amp; Hubungan Industri</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="modalCatatanRespon">Catatan Tanggapan &amp; Tindakan Riil</label>
              <textarea class="form-control-custom" id="modalCatatanRespon" rows="4" placeholder="Tuliskan keterangan tindakan perbaikan yang telah dilakukan oleh tim sekolah..." required></textarea>
              <div class="form-text-custom">Pesan tanggapan ini akan dikirimkan secara otomatis kepada nomor kontak pelapor.</div>
            </div>

            <div class="col-12">
              <div class="form-switch-custom">
                <input class="form-switch-input-custom" type="checkbox" id="checkNotifWa" checked>
                <label class="form-label-custom mb-0" for="checkNotifWa">Kirimkan notifikasi pembaharuan langsung via SMS / WhatsApp Pelapor</label>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="kirimResponAduan()">
          <i class="bi bi-send-fill"></i> Kirim Tindak Lanjut
        </button>
      </div>
    </div>
  </div>
</div>

<script>
let currentTiketBtn = null;

function tindakLanjutiAduan(tiket, pelapor) {
  document.getElementById('modalTiketId').value = tiket;
  document.getElementById('modalNamaPelapor').value = pelapor;
  document.getElementById('modalCatatanRespon').value = 'Laporan telah kami terima dan tim terkait telah melakukan peninjauan lapangan serta perbaikan yang dibutuhkan.';

  const modalEl = document.getElementById('modalTindakLanjutPengaduan');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function kirimResponAduan() {
  const tiket = document.getElementById('modalTiketId').value;
  const status = document.getElementById('modalStatusAduan').value;
  alert('Tanggapan untuk tiket ' + tiket + ' berhasil dikirim ke pelapor dengan status: ' + status + '!');
  
  const modalEl = document.getElementById('modalTindakLanjutPengaduan');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
}

function selesaikanAduan(btn, tiket) {
  if (confirm('Tandai tiket ' + tiket + ' sebagai SELESAI ditindaklanjuti?')) {
    const row = btn.closest('tr');
    if (row) {
      const badge = row.querySelector('.badge-table');
      if (badge) {
        badge.className = 'badge-table success';
        badge.textContent = 'Selesai';
      }
      alert('Tiket ' + tiket + ' telah berhasil ditandai selesai.');
    }
  }
}

function filterPengaduanTable() {
  const query = (document.getElementById('searchPengaduanInput').value || '').toLowerCase();
  const kat = (document.getElementById('filterKategoriPengaduan').value || '').toLowerCase();
  const rows = document.querySelectorAll('#tablePengaduanList tbody tr');

  rows.forEach(row => {
    const text = row.textContent.toLowerCase();
    const matchQuery = !query || text.includes(query);
    const matchKat = !kat || text.includes(kat);
    if (matchQuery && matchKat) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
}
</script>

<?php include __DIR__ . '/components/footer.php'; ?>
