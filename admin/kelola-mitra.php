<?php
/**
 * Kelola Mitra Industri (DUDI) & PKL - Admin SMKN 2 Karanganyar
 * Native PHP Implementation (PDO)
 */
require_once __DIR__ . '/../config/database.php';
$pdo = getDbConnection();

// HANDLE AJAX POST REQUESTS
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    $action = $_POST['action'] ?? '';

    try {
        if ($action === 'tambah' || $action === 'edit') {
            $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
            $nama_perusahaan = trim($_POST['nama_perusahaan'] ?? '');
            $alamat = trim($_POST['alamat'] ?? '');
            $bidang_usaha = trim($_POST['bidang_usaha'] ?? '');
            $jurusan_terkait = trim($_POST['jurusan_terkait'] ?? '');
            $kuota_pkl = !empty($_POST['kuota_pkl']) ? (int)$_POST['kuota_pkl'] : 25;
            $mou_mulai = !empty($_POST['mou_mulai']) ? $_POST['mou_mulai'] : date('Y-m-d');
            $mou_selesai = !empty($_POST['mou_selesai']) ? $_POST['mou_selesai'] : date('Y-m-d', strtotime('+3 years'));
            $status = !empty($_POST['status']) ? $_POST['status'] : 'Aktif';

            if (empty($nama_perusahaan)) {
                echo json_encode(['success' => false, 'message' => 'Nama perusahaan wajib diisi!']);
                exit;
            }

            if ($action === 'tambah') {
                $stmt = $pdo->prepare("INSERT INTO mitra_industri (nama_perusahaan, bidang_usaha, alamat, jurusan_terkait, kuota_pkl, mou_mulai, mou_selesai, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
                $stmt->execute([$nama_perusahaan, $bidang_usaha, $alamat, $jurusan_terkait, $kuota_pkl, $mou_mulai, $mou_selesai, $status]);
                echo json_encode(['success' => true, 'message' => 'Mitra industri berhasil ditambahkan!']);
                exit;
            } else {
                $stmt = $pdo->prepare("UPDATE mitra_industri SET nama_perusahaan = ?, bidang_usaha = ?, alamat = ?, jurusan_terkait = ?, kuota_pkl = ?, mou_mulai = ?, mou_selesai = ?, status = ? WHERE id = ?");
                $stmt->execute([$nama_perusahaan, $bidang_usaha, $alamat, $jurusan_terkait, $kuota_pkl, $mou_mulai, $mou_selesai, $status, $id]);
                echo json_encode(['success' => true, 'message' => 'Data mitra industri berhasil diperbarui!']);
                exit;
            }
        }

        if ($action === 'hapus') {
            $id = (int)($_POST['id'] ?? 0);
            $stmt = $pdo->prepare("DELETE FROM mitra_industri WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Mitra industri berhasil dihapus!']);
            exit;
        }

        if ($action === 'toggle_status') {
            $id = (int)($_POST['id'] ?? 0);
            $status = $_POST['status'] === 'Aktif' ? 'Aktif' : 'Nonaktif';
            $stmt = $pdo->prepare("UPDATE mitra_industri SET status = ? WHERE id = ?");
            $stmt->execute([$status, $id]);
            echo json_encode(['success' => true, 'message' => 'Status mitra berhasil diubah!']);
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
$mitraList = [];
try {
    $stmt = $pdo->query("SELECT * FROM mitra_industri ORDER BY id DESC");
    $mitraList = $stmt->fetchAll();
} catch (Exception $e) {
    //
}

$totalMitra = count($mitraList);
$mouAktif = count(array_filter($mitraList, fn($m) => ($m['status'] ?? 'Aktif') === 'Aktif'));
$totalKuota = array_sum(array_column($mitraList, 'kuota_pkl'));

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
        <div class="stat-value text-success"><?= $totalMitra ?> Mitra</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span>Perusahaan Terverifikasi</span>
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
        <div class="stat-value text-primary"><?= $mouAktif ?> Kerjasama</div>
        <div class="trend-badge text-primary">
          <i class="bi bi-shield-check"></i>
          <span>Berlaku 3 - 5 Tahun</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Kapasitas Kuota PKL</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-person-workspace"></i>
          </div>
        </div>
        <div class="stat-value text-warning"><?= $totalKuota ?> Siswa/Thn</div>
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
          <option value="Mesin">Permesinan Presisi</option>
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
          <?php if (!empty($mitraList)): ?>
            <?php foreach ($mitraList as $m): 
              $words = explode(' ', trim($m['nama_perusahaan']));
              $init = '';
              foreach (array_slice($words, 0, 3) as $w) {
                if (!empty($w)) $init .= strtoupper($w[0]);
              }
              $isAktif = ($m['status'] ?? 'Aktif') === 'Aktif';
              $mouMulai = !empty($m['mou_mulai']) ? date('Y', strtotime($m['mou_mulai'])) : '-';
              $mouSelesai = !empty($m['mou_selesai']) ? date('Y', strtotime($m['mou_selesai'])) : '-';
            ?>
            <tr data-id="<?= $m['id'] ?>">
              <td style="width: 70px;">
                <div class="rounded-3 bg-light d-flex align-items-center justify-content-center fw-bold text-success border" style="width: 46px; height: 46px; font-size: 0.82rem; letter-spacing: 0.05em;">
                  <?= htmlspecialchars(substr($init, 0, 3)) ?>
                </div>
              </td>
              <td>
                <div class="fw-bold text-main"><?= htmlspecialchars($m['nama_perusahaan']) ?></div>
                <div class="text-muted fs-xs"><?= htmlspecialchars($m['alamat'] ?? '-') ?></div>
              </td>
              <td><?= htmlspecialchars($m['bidang_usaha'] ?? 'Kemitraan DUDI') ?></td>
              <td>
                <span class="badge bg-success-subtle text-success fw-bold"><?= htmlspecialchars($m['jurusan_terkait'] ?? 'Semua') ?></span>
              </td>
              <td><strong><?= (int)($m['kuota_pkl'] ?? 0) ?> Siswa / Thn</strong></td>
              <td><?= $mouMulai ?> - <?= $mouSelesai ?> (<?= $isAktif ? 'Aktif' : 'Berakhir' ?>)</td>
              <td>
                <span class="badge-table <?= $isAktif ? 'success' : 'secondary' ?>">
                  <?= $isAktif ? 'MoU Aktif' : 'Nonaktif' ?>
                </span>
              </td>
              <td>
                <div class="d-flex justify-content-center gap-1">
                  <button type="button" class="table-btn-action" title="Edit Mitra" onclick="editMitra(<?= htmlspecialchars(json_encode($m)) ?>)">
                    <i class="bi bi-pencil"></i>
                  </button>
                  <button type="button" class="table-btn-action" title="Data Siswa PKL" onclick="lihatSiswaPKL('<?= htmlspecialchars(addslashes($m['nama_perusahaan'])) ?>', '<?= (int)$m['kuota_pkl'] ?> Siswa')">
                    <i class="bi bi-people"></i>
                  </button>
                  <button type="button" class="table-btn-action delete" title="Hapus Mitra" onclick="hapusMitra(<?= $m['id'] ?>, '<?= htmlspecialchars(addslashes($m['nama_perusahaan'])) ?>')">
                    <i class="bi bi-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="8" class="text-center py-4 text-muted">Belum ada data mitra industri tersimpan.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- Table Pagination -->
    <div class="table-footer-control">
      <div class="table-pagination-info">
        Menampilkan <strong><?= count($mitraList) ?></strong> Mitra Industri Terikat
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
          <input type="hidden" name="action" value="tambah">
          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="tambahNamaMitra">Nama Perusahaan / Lembaga Industri</label>
              <input type="text" class="form-control-custom" name="nama_perusahaan" id="tambahNamaMitra" placeholder="Contoh: PT. Komatsu Indonesia" required>
              <div class="form-text-custom">Nama resmi mitra BUMN/Swasta/Multinasional bersertifikat.</div>
            </div>
            <div class="col-md-5">
              <label class="form-label-custom" for="tambahLokasiMitra">Kawasan / Kota Industri</label>
              <input type="text" class="form-control-custom" name="alamat" id="tambahLokasiMitra" placeholder="Cikarang, Bekasi / Solo Raya" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahBidangMitra">Bidang Usaha / Kerjasama</label>
              <input type="text" class="form-control-custom" name="bidang_usaha" id="tambahBidangMitra" placeholder="Manufaktur Otomotif / Software House" required>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahJurusanMitra">Program Keahlian Terkait</label>
              <select class="form-select-custom" name="jurusan_terkait" id="tambahJurusanMitra">
                <option value="RPL">Rekayasa Perangkat Lunak (RPL)</option>
                <option value="Teknik Pemesinan">Teknik Pemesinan (TPM)</option>
                <option value="Teknik Tekstil">Teknik Tekstil (TPK)</option>
                <option value="Teknik Ototronik">Teknik Ototronik (TOT)</option>
                <option value="Semua Program" selected>Semua Program Keahlian</option>
              </select>
            </div>

            <div class="col-md-4">
              <label class="form-label-custom" for="tambahKuotaMitra">Kapasitas Kuota PKL / Thn</label>
              <input type="number" class="form-control-custom" name="kuota_pkl" id="tambahKuotaMitra" placeholder="25" value="25">
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="tambahMulaiMou">Mulai MoU</label>
              <input type="date" class="form-control-custom" name="mou_mulai" id="tambahMulaiMou" value="<?= date('Y-m-d') ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="tambahSelesaiMou">Berakhir MoU</label>
              <input type="date" class="form-control-custom" name="mou_selesai" id="tambahSelesaiMou" value="<?= date('Y-m-d', strtotime('+3 years')) ?>">
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
          <input type="hidden" name="action" value="edit">
          <input type="hidden" name="id" id="editIdMitra">
          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="editNamaMitra">Nama Perusahaan</label>
              <input type="text" class="form-control-custom" name="nama_perusahaan" id="editNamaMitra" required>
            </div>
            <div class="col-md-5">
              <label class="form-label-custom" for="editLokasiMitra">Lokasi / Alamat</label>
              <input type="text" class="form-control-custom" name="alamat" id="editLokasiMitra" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="editBidangMitra">Bidang Usaha</label>
              <input type="text" class="form-control-custom" name="bidang_usaha" id="editBidangMitra">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editJurusanMitra">Program Terkait</label>
              <input type="text" class="form-control-custom" name="jurusan_terkait" id="editJurusanMitra">
            </div>

            <div class="col-md-4">
              <label class="form-label-custom" for="editKuotaMitra">Kuota PKL Tahunan</label>
              <input type="number" class="form-control-custom" name="kuota_pkl" id="editKuotaMitra">
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="editMulaiMou">Mulai MoU</label>
              <input type="date" class="form-control-custom" name="mou_mulai" id="editMulaiMou">
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="editSelesaiMou">Berakhir MoU</label>
              <input type="date" class="form-control-custom" name="mou_selesai" id="editSelesaiMou">
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
function editMitra(data) {
  document.getElementById('editIdMitra').value = data.id || '';
  document.getElementById('editNamaMitra').value = data.nama_perusahaan || '';
  document.getElementById('editLokasiMitra').value = data.alamat || '';
  document.getElementById('editBidangMitra').value = data.bidang_usaha || '';
  document.getElementById('editJurusanMitra').value = data.jurusan_terkait || '';
  document.getElementById('editKuotaMitra').value = data.kuota_pkl || 25;
  document.getElementById('editMulaiMou').value = data.mou_mulai || '';
  document.getElementById('editSelesaiMou').value = data.mou_selesai || '';

  const modalEl = document.getElementById('modalEditMitra');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function lihatSiswaPKL(perusahaan, jumlah) {
  alert('Data Penempatan PKL:\nPerusahaan: ' + perusahaan + '\nTotal Kuota Siswa: ' + jumlah + '\nStatus: Kerjasama resmi MoU terverifikasi.');
}

function simpanTambahMitra() {
  const form = document.getElementById('formTambahMitra');
  if (!form.nama_perusahaan.value.trim()) {
    alert('Silakan masukkan nama mitra industri!');
    return;
  }

  const formData = new FormData(form);
  fetch('kelola-mitra.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      alert(data.message);
      location.reload();
    } else {
      alert('Gagal: ' + data.message);
    }
  })
  .catch(err => {
    alert('Terjadi kesalahan jaringan.');
  });
}

function simpanEditMitra() {
  const form = document.getElementById('formEditMitra');
  if (!form.nama_perusahaan.value.trim()) {
    alert('Silakan masukkan nama mitra industri!');
    return;
  }

  const formData = new FormData(form);
  fetch('kelola-mitra.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      alert(data.message);
      location.reload();
    } else {
      alert('Gagal: ' + data.message);
    }
  })
  .catch(err => {
    alert('Terjadi kesalahan jaringan.');
  });
}

function hapusMitra(id, nama) {
  if (confirm('Hapus data kemitraan dengan ' + nama + '?')) {
    const formData = new FormData();
    formData.append('action', 'hapus');
    formData.append('id', id);

    fetch('kelola-mitra.php', {
      method: 'POST',
      body: formData
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        alert(data.message);
        location.reload();
      } else {
        alert('Gagal: ' + data.message);
      }
    })
    .catch(err => {
      alert('Terjadi kesalahan jaringan.');
    });
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
