<?php
/**
 * Kelola Kotak Pengaduan & Aspirasi - Admin SMKN 2 Karanganyar
 * Native PHP Implementation (PDO)
 */
require_once __DIR__ . '/../config/database.php';
$pdo = getDbConnection();

// HANDLE AJAX POST REQUESTS
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    $action = $_POST['action'] ?? '';

    try {
        if ($action === 'respon') {
            $id = (int)($_POST['id'] ?? 0);
            $status = trim($_POST['status'] ?? 'Proses');
            $tanggapan = trim($_POST['tanggapan'] ?? '');
            
            $stmt = $pdo->prepare("UPDATE pengaduan SET status = ?, tanggapan = ?, tanggal_selesai = IF(? = 'Selesai', NOW(), tanggal_selesai) WHERE id = ?");
            $stmt->execute([$status, $tanggapan, $status, $id]);
            echo json_encode(['success' => true, 'message' => 'Tanggapan dan status pengaduan berhasil diperbarui!']);
            exit;
        }

        if ($action === 'selesai') {
            $id = (int)($_POST['id'] ?? 0);
            $stmt = $pdo->prepare("UPDATE pengaduan SET status = 'Selesai', tanggal_selesai = NOW() WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Tiket pengaduan berhasil ditandai selesai!']);
            exit;
        }

        if ($action === 'hapus') {
            $id = (int)($_POST['id'] ?? 0);
            $stmt = $pdo->prepare("DELETE FROM pengaduan WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Data pengaduan berhasil dihapus!']);
            exit;
        }

        echo json_encode(['success' => false, 'message' => 'Aksi tidak valid!']);
        exit;
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
        exit;
    }
}

// FETCH DATA
$pengaduanList = [];
try {
    $stmt = $pdo->query("SELECT * FROM pengaduan ORDER BY id DESC");
    $pengaduanList = $stmt->fetchAll();
} catch (Exception $e) {
    //
}

$totalLaporan = count($pengaduanList);
$totalMenunggu = count(array_filter($pengaduanList, fn($p) => ($p['status'] ?? '') === 'Menunggu Respon'));
$totalProses = count(array_filter($pengaduanList, fn($p) => ($p['status'] ?? '') === 'Proses'));
$totalSelesai = count(array_filter($pengaduanList, fn($p) => ($p['status'] ?? '') === 'Selesai'));

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
      <a href="../layanan/pengaduan.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Form Aduan Website
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="alert('Laporan pengaduan berhasil diekspor!')">
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
        <div class="stat-value text-primary"><?= $totalLaporan ?> Laporan</div>
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
        <div class="stat-value text-warning"><?= $totalMenunggu ?> Laporan</div>
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
        <div class="stat-value text-info"><?= $totalProses ?> Laporan</div>
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
        <div class="stat-value text-success"><?= $totalSelesai ?> Laporan</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-all"></i>
          <span>Telah Diberikan Respon</span>
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
          <option value="Bullying">Bullying / Perundungan</option>
        </select>
        <button class="btn-table-action" type="button" onclick="location.reload()">
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
          <?php if (!empty($pengaduanList)): ?>
            <?php foreach ($pengaduanList as $p): 
              $badgeClass = match($p['status'] ?? 'Menunggu Respon') {
                'Selesai' => 'success',
                'Proses' => 'info',
                default => 'warning'
              };
              $tglLapor = !empty($p['tanggal_lapor']) ? date('d M Y', strtotime($p['tanggal_lapor'])) : '-';
            ?>
            <tr data-id="<?= $p['id'] ?>">
              <td class="table-order-id" style="width: 130px;"><?= htmlspecialchars($p['no_tiket'] ?? '#ADU-'.$p['id']) ?></td>
              <td>
                <div class="fw-bold text-main"><?= htmlspecialchars($p['nama_pelapor']) ?></div>
                <div class="text-muted fs-xs"><?= htmlspecialchars($p['no_hp'] ?? $p['email'] ?? '-') ?></div>
              </td>
              <td class="table-cell-title text-wrap-cell" style="max-width: 300px;">
                <div class="fw-bold text-main mb-1"><?= htmlspecialchars($p['subjek']) ?></div>
                <div class="text-muted fs-xs text-truncate"><?= htmlspecialchars(substr($p['isi_pengaduan'], 0, 100)) ?>...</div>
              </td>
              <td><span class="badge bg-warning-subtle text-warning fw-bold"><?= htmlspecialchars($p['kategori']) ?></span></td>
              <td><?= $tglLapor ?></td>
              <td><span class="badge-table <?= $badgeClass ?>"><?= htmlspecialchars($p['status'] ?? 'Menunggu Respon') ?></span></td>
              <td>
                <div class="d-flex justify-content-center gap-1">
                  <button type="button" class="table-btn-action" title="Tindak Lanjuti" onclick="tindakLanjutiAduan(<?= htmlspecialchars(json_encode($p)) ?>)">
                    <i class="bi bi-reply-fill"></i>
                  </button>
                  <button type="button" class="table-btn-action" title="Tandai Selesai" onclick="selesaikanAduan(<?= $p['id'] ?>, '<?= htmlspecialchars(addslashes($p['no_tiket'] ?? '')) ?>')">
                    <i class="bi bi-check-lg"></i>
                  </button>
                  <button type="button" class="table-btn-action delete" title="Hapus Laporan" onclick="hapusPengaduan(<?= $p['id'] ?>, '<?= htmlspecialchars(addslashes($p['no_tiket'] ?? '')) ?>')">
                    <i class="bi bi-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="7" class="text-center py-4 text-muted">Belum ada pengaduan atau aspirasi masuk.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- Table Pagination -->
    <div class="table-footer-control">
      <div class="table-pagination-info">
        Menampilkan <strong><?= count($pengaduanList) ?></strong> Tiket Aspirasi &amp; Pengaduan
      </div>
      <div class="table-pagination-nav">
        <button class="btn-pagination-nav" disabled><i class="bi bi-chevron-left"></i></button>
        <button class="btn-pagination-nav active">1</button>
        <button class="btn-pagination-nav" disabled><i class="bi bi-chevron-right"></i></button>
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
          <input type="hidden" name="action" value="respon">
          <input type="hidden" name="id" id="modalId">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label-custom">Nomor Tiket Aduan</label>
              <input type="text" class="form-control-custom" id="modalTiketId" readonly>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom">Nama Pelapor</label>
              <input type="text" class="form-control-custom" id="modalNamaPelapor" readonly>
            </div>

            <div class="col-12">
              <label class="form-label-custom">Isi Laporan Pengaduan</label>
              <textarea class="form-control-custom" id="modalIsiAduan" rows="3" readonly style="background:#f8f9fa;"></textarea>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom">Pembaruan Status Penanganan</label>
              <select class="form-select-custom" name="status" id="modalStatusAduan">
                <option value="Proses">Sedang Dalam Penanganan Tim Terkait</option>
                <option value="Selesai">Selesai Ditindaklanjuti Paripurna</option>
                <option value="Menunggu Respon">Menunggu Respon</option>
                <option value="Tolak">Diarsipkan (Laporan Tidak Relevan)</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom">Unit Penanggung Jawab</label>
              <input type="text" class="form-control-custom" value="Tim Kesiswaan / Sarpras SMKN 2" readonly>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="modalCatatanRespon">Catatan Tanggapan &amp; Tindakan Riil</label>
              <textarea class="form-control-custom" name="tanggapan" id="modalCatatanRespon" rows="4" placeholder="Tuliskan keterangan tindakan perbaikan yang telah dilakukan oleh tim sekolah..." required></textarea>
              <div class="form-text-custom">Pesan tanggapan ini tersimpan di sistem pelaporan resmi.</div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="kirimResponAduan()">
          <i class="bi bi-send-fill"></i> Simpan Tindak Lanjut
        </button>
      </div>
    </div>
  </div>
</div>

<script>
function tindakLanjutiAduan(data) {
  document.getElementById('modalId').value = data.id || '';
  document.getElementById('modalTiketId').value = data.no_tiket || ('#ADU-' + data.id);
  document.getElementById('modalNamaPelapor').value = data.nama_pelapor || '';
  document.getElementById('modalIsiAduan').value = (data.subjek ? (data.subjek + '\n\n') : '') + (data.isi_pengaduan || '');
  document.getElementById('modalStatusAduan').value = data.status || 'Proses';
  document.getElementById('modalCatatanRespon').value = data.tanggapan || 'Laporan telah kami terima dan tim terkait telah melakukan peninjauan lapangan serta perbaikan yang dibutuhkan.';

  const modalEl = document.getElementById('modalTindakLanjutPengaduan');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function kirimResponAduan() {
  const form = document.getElementById('formResponPengaduan');
  const formData = new FormData(form);

  fetch('kelola-pengaduan.php', { method: 'POST', body: formData })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      alert(data.message);
      location.reload();
    } else {
      alert('Gagal: ' + data.message);
    }
  })
  .catch(() => alert('Terjadi kesalahan jaringan.'));
}

function selesaikanAduan(id, tiket) {
  if (confirm('Tandai tiket ' + tiket + ' sebagai SELESAI ditindaklanjuti?')) {
    const formData = new FormData();
    formData.append('action', 'selesai');
    formData.append('id', id);

    fetch('kelola-pengaduan.php', { method: 'POST', body: formData })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        alert(data.message);
        location.reload();
      } else {
        alert('Gagal: ' + data.message);
      }
    })
    .catch(() => alert('Terjadi kesalahan jaringan.'));
  }
}

function hapusPengaduan(id, tiket) {
  if (confirm('Hapus laporan tiket ' + tiket + '?')) {
    const formData = new FormData();
    formData.append('action', 'hapus');
    formData.append('id', id);

    fetch('kelola-pengaduan.php', { method: 'POST', body: formData })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        alert(data.message);
        location.reload();
      } else {
        alert('Gagal: ' + data.message);
      }
    })
    .catch(() => alert('Terjadi kesalahan jaringan.'));
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
