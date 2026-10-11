<?php
/**
 * Kelola PPDB Online - Admin SMKN 2 Karanganyar
 * Native PHP Implementation (PDO)
 */
require_once __DIR__ . '/../config/database.php';
$pdo = getDbConnection();

// HANDLE AJAX POST REQUESTS
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    $action = $_POST['action'] ?? '';

    try {
        if ($action === 'verifikasi') {
            $id = (int)($_POST['id'] ?? 0);
            $status = trim($_POST['status_verifikasi'] ?? 'Terverifikasi');
            $catatan = trim($_POST['catatan'] ?? '');

            $stmt = $pdo->prepare("UPDATE ppdb_pendaftar SET status_verifikasi = ?, catatan = ? WHERE id = ?");
            $stmt->execute([$status, $catatan, $id]);
            echo json_encode(['success' => true, 'message' => 'Status verifikasi berkas berhasil diperbarui!']);
            exit;
        }

        if ($action === 'hapus') {
            $id = (int)($_POST['id'] ?? 0);
            $stmt = $pdo->prepare("DELETE FROM ppdb_pendaftar WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Data pendaftar berhasil dihapus!']);
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
$ppdbList = [];
try {
    $stmt = $pdo->query("SELECT * FROM ppdb_pendaftar ORDER BY id DESC");
    $ppdbList = $stmt->fetchAll();
} catch (Exception $e) {
    //
}

$totalCalon = count($ppdbList);
$totalLolos = count(array_filter($ppdbList, fn($p) => ($p['status_verifikasi'] ?? '') === 'Terverifikasi'));
$totalMenunggu = count(array_filter($ppdbList, fn($p) => ($p['status_verifikasi'] ?? '') === 'Menunggu Berkas'));
$totalPerbaikan = count(array_filter($ppdbList, fn($p) => ($p['status_verifikasi'] ?? '') === 'Perlu Perbaikan'));

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
      <a href="../layanan/ppdb-aju-akun.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Form PPDB Website
      </a>
      <button type="button" class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-2" onclick="alert('Data pendaftar PPDB diekspor!')">
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
        <div class="stat-value text-primary"><?= $totalCalon ?> Calon</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-arrow-up-right"></i>
          <span>Berkas Terdata</span>
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
        <div class="stat-value text-success"><?= $totalLolos ?> Lolos</div>
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
        <div class="stat-value text-warning"><?= $totalMenunggu ?> Berkas</div>
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
        <div class="stat-value text-danger"><?= $totalPerbaikan ?> Siswa</div>
        <div class="trend-badge text-danger">
          <i class="bi bi-info-circle"></i>
          <span>Perlu Konfirmasi Ulang</span>
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
          <?php if (!empty($ppdbList)): ?>
            <?php foreach ($ppdbList as $p): 
              $statusBadge = match($p['status_verifikasi'] ?? 'Menunggu Berkas') {
                'Terverifikasi' => 'success',
                'Perlu Perbaikan' => 'danger',
                default => 'warning'
              };
              $tglDaftar = !empty($p['created_at']) ? date('d M Y, H:i', strtotime($p['created_at'])) : '-';
            ?>
            <tr data-id="<?= $p['id'] ?>">
              <td class="table-order-id"><?= htmlspecialchars($p['no_pendaftaran'] ?? '#PPDB-'.$p['id']) ?></td>
              <td>
                <div class="table-user-cell">
                  <div class="rounded-circle bg-light d-flex align-items-center justify-content-center fw-bold text-success border" style="width: 38px; height: 38px; font-size: 0.8rem; flex-shrink: 0;">
                    <?= strtoupper(substr($p['nama_lengkap'], 0, 1)) ?>
                  </div>
                  <div>
                    <div class="table-user-name"><?= htmlspecialchars($p['nama_lengkap']) ?></div>
                    <div class="table-user-sub">NISN: <?= htmlspecialchars($p['nisn'] ?? '-') ?> &bull; <?= htmlspecialchars($p['no_hp'] ?? '-') ?></div>
                  </div>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success fw-bold"><?= htmlspecialchars($p['pilihan_jurusan']) ?></span></td>
              <td><?= htmlspecialchars($p['asal_sekolah'] ?? '-') ?></td>
              <td class="table-amount"><?= number_format((float)($p['nilai_rata_rata'] ?? 0), 2) ?></td>
              <td><?= $tglDaftar ?></td>
              <td><span class="badge-table <?= $statusBadge ?>"><?= htmlspecialchars($p['status_verifikasi'] ?? 'Menunggu Berkas') ?></span></td>
              <td>
                <div class="d-flex justify-content-center gap-1">
                  <button type="button" class="table-btn-action" title="Detail Siswa & Verifikasi" onclick="detailPpdb(<?= htmlspecialchars(json_encode($p)) ?>)">
                    <i class="bi bi-eye"></i>
                  </button>
                  <button type="button" class="table-btn-action delete" title="Hapus Pendaftar" onclick="hapusPpdb(<?= $p['id'] ?>, '<?= htmlspecialchars(addslashes($p['nama_lengkap'])) ?>')">
                    <i class="bi bi-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="8" class="text-center py-4 text-muted">Belum ada calon pendaftar PPDB.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- Table Pagination -->
    <div class="table-footer-control">
      <div class="table-pagination-info">
        Menampilkan <strong><?= count($ppdbList) ?></strong> Calon Siswa Baru
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

<!-- Modal Detail & Verifikasi Calon Siswa -->
<div class="modal fade" id="modalDetailPpdb" tabindex="-1" aria-labelledby="modalDetailPpdbLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalDetailPpdbLabel">
          <i class="bi bi-person-bounding-box text-success"></i> Berkas &amp; Verifikasi Calon Siswa
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formVerifikasiPpdb">
          <input type="hidden" name="action" value="verifikasi">
          <input type="hidden" name="id" id="detailId">
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

            <div class="col-md-6">
              <label class="form-label-custom">Status Verifikasi</label>
              <select class="form-select-custom" name="status_verifikasi" id="detailStatusSelect">
                <option value="Terverifikasi">Terverifikasi (Lolos)</option>
                <option value="Menunggu Berkas">Menunggu Berkas Lengkap</option>
                <option value="Perlu Perbaikan">Perlu Perbaikan Berkas</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom">Catatan Verifikator</label>
              <input type="text" class="form-control-custom" name="catatan" id="detailCatatan" placeholder="Catatan berkas...">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanVerifikasi()">
          <i class="bi bi-check2-all"></i> Simpan Verifikasi
        </button>
      </div>
    </div>
  </div>
</div>

<script>
function detailPpdb(data) {
  document.getElementById('detailId').value = data.id || '';
  document.getElementById('detailNoreg').value = data.no_pendaftaran || ('#PPDB-' + data.id);
  document.getElementById('detailNama').value = data.nama_lengkap || '';
  document.getElementById('detailJurusan').value = data.pilihan_jurusan || '';
  document.getElementById('detailSmp').value = data.asal_sekolah || '';
  document.getElementById('detailNilai').value = Number(data.nilai_rata_rata || 0).toFixed(2);
  document.getElementById('detailStatusSelect').value = data.status_verifikasi || 'Menunggu Berkas';
  document.getElementById('detailCatatan').value = data.catatan || '';

  const modalEl = document.getElementById('modalDetailPpdb');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function simpanVerifikasi() {
  const form = document.getElementById('formVerifikasiPpdb');
  const formData = new FormData(form);

  fetch('kelola-ppdb.php', { method: 'POST', body: formData })
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

function hapusPpdb(id, nama) {
  if (confirm('Apakah Anda yakin ingin menghapus data pendaftar ' + nama + '?')) {
    const formData = new FormData();
    formData.append('action', 'hapus');
    formData.append('id', id);

    fetch('kelola-ppdb.php', { method: 'POST', body: formData })
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
