<?php
/**
 * Kelola Guru & Tenaga Kependidikan - Admin SMKN 2 Karanganyar
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
            $nama = trim($_POST['nama'] ?? '');
            $nip = trim($_POST['nip'] ?? '');
            $status_kepegawaian = trim($_POST['status_kepegawaian'] ?? 'PNS');
            $bidang_studi = trim($_POST['bidang_studi'] ?? '');
            $jabatan = trim($_POST['jabatan'] ?? '');
            $pendidikan_terakhir = trim($_POST['pendidikan_terakhir'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $kategori = trim($_POST['kategori'] ?? 'Guru');

            if (empty($nama)) {
                echo json_encode(['success' => false, 'message' => 'Nama guru wajib diisi!']);
                exit;
            }

            // Handle file upload
            $fotoPath = null;
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../uploads/guru/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'webp'];
                if (in_array($ext, $allowed)) {
                    $newFileName = 'guru_' . time() . '_' . rand(100, 999) . '.' . $ext;
                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadDir . $newFileName)) {
                        $fotoPath = 'uploads/guru/' . $newFileName;
                    }
                }
            }

            if ($action === 'tambah') {
                if (!$fotoPath) {
                    $fotoPath = 'assets/images/avatar.png';
                }
                $stmt = $pdo->prepare("INSERT INTO guru_staff (nama, nip, bidang_studi, jabatan, pendidikan_terakhir, status_kepegawaian, email, foto, kategori, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
                $stmt->execute([$nama, $nip, $bidang_studi, $jabatan, $pendidikan_terakhir, $status_kepegawaian, $email, $fotoPath, $kategori]);
                echo json_encode(['success' => true, 'message' => 'Data guru/staff berhasil ditambahkan!']);
                exit;
            } else {
                if ($fotoPath) {
                    $stmt = $pdo->prepare("UPDATE guru_staff SET nama = ?, nip = ?, bidang_studi = ?, jabatan = ?, pendidikan_terakhir = ?, status_kepegawaian = ?, email = ?, foto = ?, kategori = ? WHERE id = ?");
                    $stmt->execute([$nama, $nip, $bidang_studi, $jabatan, $pendidikan_terakhir, $status_kepegawaian, $email, $fotoPath, $kategori, $id]);
                } else {
                    $stmt = $pdo->prepare("UPDATE guru_staff SET nama = ?, nip = ?, bidang_studi = ?, jabatan = ?, pendidikan_terakhir = ?, status_kepegawaian = ?, email = ?, kategori = ? WHERE id = ?");
                    $stmt->execute([$nama, $nip, $bidang_studi, $jabatan, $pendidikan_terakhir, $status_kepegawaian, $email, $kategori, $id]);
                }
                echo json_encode(['success' => true, 'message' => 'Data guru/staff berhasil diperbarui!']);
                exit;
            }
        }

        if ($action === 'hapus') {
            $id = (int)($_POST['id'] ?? 0);
            $stmt = $pdo->prepare("DELETE FROM guru_staff WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Data guru berhasil dihapus!']);
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
$guruList = [];
try {
    $stmt = $pdo->query("SELECT * FROM guru_staff ORDER BY id ASC");
    $guruList = $stmt->fetchAll();
} catch (Exception $e) {
    //
}

$totalGuru = count($guruList);
$totalPns = count(array_filter($guruList, fn($g) => in_array($g['status_kepegawaian'] ?? '', ['PNS', 'PPPK'])));
$totalKejuruan = count(array_filter($guruList, fn($g) => ($g['kategori'] ?? '') === 'Guru'));
$totalStaff = count(array_filter($guruList, fn($g) => ($g['kategori'] ?? '') === 'Staff'));

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
        <div class="stat-value text-success"><?= $totalGuru ?> Orang</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span>Aktif Mengajar &amp; Dinas</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">ASN (PNS &amp; PPPK)</span>
          <div class="stat-icon-circle bg-primary-subtle text-primary">
            <i class="bi bi-award-fill"></i>
          </div>
        </div>
        <div class="stat-value text-primary"><?= $totalPns ?> Pendidik</div>
        <div class="trend-badge text-primary">
          <i class="bi bi-shield-check"></i>
          <span>Status Kepegawaian Negara</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Tenaga Pengajar</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-book-half"></i>
          </div>
        </div>
        <div class="stat-value text-warning"><?= $totalKejuruan ?> Guru</div>
        <div class="trend-badge text-warning">
          <i class="bi bi-gear-fill"></i>
          <span>Kompetensi Kejuruan</span>
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
        <div class="stat-value text-info"><?= $totalStaff ?> Staf TU</div>
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
          <option value="PNS">Pegawai PNS</option>
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
          <?php if (!empty($guruList)): ?>
            <?php foreach ($guruList as $g): 
              $fotoUrl = !empty($g['foto']) ? (str_starts_with($g['foto'], 'http') || str_starts_with($g['foto'], 'assets') ? $g['foto'] : '../' . $g['foto']) : 'assets/images/avatar.png';
              $statusBadgeClass = match($g['status_kepegawaian'] ?? 'PNS') {
                'PNS' => 'success',
                'PPPK' => 'info',
                default => 'warning'
              };
            ?>
            <tr data-id="<?= $g['id'] ?>">
              <td>
                <div class="table-user-cell">
                  <img src="<?= htmlspecialchars($fotoUrl) ?>" alt="<?= htmlspecialchars($g['nama']) ?>" class="table-user-avatar" onerror="this.src='assets/images/avatar.png'">
                  <div>
                    <div class="table-user-name"><?= htmlspecialchars($g['nama']) ?></div>
                    <div class="table-user-sub"><?= htmlspecialchars($g['email'] ?? '-') ?></div>
                  </div>
                </div>
              </td>
              <td><?= htmlspecialchars($g['nip'] ?? '-') ?></td>
              <td><span class="badge bg-success-subtle text-success"><?= htmlspecialchars($g['bidang_studi']) ?></span></td>
              <td><?= htmlspecialchars($g['jabatan'] ?? '-') ?></td>
              <td><?= htmlspecialchars($g['pendidikan_terakhir'] ?? '-') ?></td>
              <td><span class="badge-table <?= $statusBadgeClass ?>"><?= htmlspecialchars($g['status_kepegawaian']) ?></span></td>
              <td>
                <div class="d-flex justify-content-center gap-1">
                  <button type="button" class="table-btn-action" title="Edit Guru" onclick="editGuru(<?= htmlspecialchars(json_encode($g)) ?>)">
                    <i class="bi bi-pencil"></i>
                  </button>
                  <button type="button" class="table-btn-action delete" title="Hapus Guru" onclick="hapusGuru(<?= $g['id'] ?>, '<?= htmlspecialchars(addslashes($g['nama'])) ?>')">
                    <i class="bi bi-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="7" class="text-center py-4 text-muted">Belum ada data guru tersimpan.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="table-footer-control">
      <div class="table-pagination-info">
        Menampilkan <strong><?= count($guruList) ?></strong> Guru &amp; Staff Pendidik
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
        <form id="formTambahGuru" enctype="multipart/form-data">
          <input type="hidden" name="action" value="tambah">
          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="tambahNamaGuru">Nama Lengkap &amp; Gelar</label>
              <input type="text" class="form-control-custom" name="nama" id="tambahNamaGuru" placeholder="Contoh: Budi Susanto, S.Pd., M.Kom" required>
              <div class="form-text-custom">Gunakan nama lengkap beserta gelar akademik resmi.</div>
            </div>
            <div class="col-md-5">
              <label class="form-label-custom" for="tambahNipGuru">NIP / NUPTK</label>
              <input type="text" class="form-control-custom" name="nip" id="tambahNipGuru" placeholder="19870315 201101 1 002" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahStatusGuru">Status Kepegawaian</label>
              <select class="form-select-custom" name="status_kepegawaian" id="tambahStatusGuru">
                <option value="PNS" selected>PNS (Pegawai Negeri Sipil)</option>
                <option value="PPPK">PPPK (P3K Kemendikbud)</option>
                <option value="GTT / PTT">GTT / PTT (Guru Tidak Tetap)</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahMapelGuru">Mata Pelajaran / Bidang Pengajaran</label>
              <input type="text" class="form-control-custom" name="bidang_studi" id="tambahMapelGuru" placeholder="Pemrograman Web &amp; Perangkat Bergerak" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahJabatanGuru">Jabatan Tambahan (Opsional)</label>
              <input type="text" class="form-control-custom" name="jabatan" id="tambahJabatanGuru" placeholder="Waka Kurikulum / Kaprodi RPL / Wali Kelas">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahPendidikanGuru">Pendidikan Terakhir</label>
              <input type="text" class="form-control-custom" name="pendidikan_terakhir" id="tambahPendidikanGuru" placeholder="S1 Teknik Informatika / S2 Komputer">
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahEmailGuru">Email Institusi Resmi</label>
              <input type="email" class="form-control-custom" name="email" id="tambahEmailGuru" placeholder="nama@smkn2kra.sch.id">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahKategoriGuru">Kategori Tenaga</label>
              <select class="form-select-custom" name="kategori" id="tambahKategoriGuru">
                <option value="Guru" selected>Guru / Pendidik</option>
                <option value="Staff">Tenaga Kependidikan / TU</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahFotoGuru">Foto Profil Resmi (Format JPG/PNG)</label>
              <input type="file" class="form-control-custom" name="foto" id="tambahFotoGuru" accept="image/*">
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
        <form id="formEditGuru" enctype="multipart/form-data">
          <input type="hidden" name="action" value="edit">
          <input type="hidden" name="id" id="editIdGuru">
          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="editNamaGuru">Nama Lengkap &amp; Gelar</label>
              <input type="text" class="form-control-custom" name="nama" id="editNamaGuru" required>
            </div>
            <div class="col-md-5">
              <label class="form-label-custom" for="editNipGuru">NIP / NUPTK</label>
              <input type="text" class="form-control-custom" name="nip" id="editNipGuru" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="editStatusGuru">Status Kepegawaian</label>
              <select class="form-select-custom" name="status_kepegawaian" id="editStatusGuru">
                <option value="PNS">PNS (Pegawai Negeri Sipil)</option>
                <option value="PPPK">PPPK (P3K Kemendikbud)</option>
                <option value="GTT / PTT">GTT / PTT (Guru Tidak Tetap)</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editMapelGuru">Mata Pelajaran / Bidang</label>
              <input type="text" class="form-control-custom" name="bidang_studi" id="editMapelGuru" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="editJabatanGuru">Jabatan Tambahan</label>
              <input type="text" class="form-control-custom" name="jabatan" id="editJabatanGuru">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editPendidikanGuru">Pendidikan Terakhir</label>
              <input type="text" class="form-control-custom" name="pendidikan_terakhir" id="editPendidikanGuru">
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="editEmailGuru">Email Institusi</label>
              <input type="email" class="form-control-custom" name="email" id="editEmailGuru">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editKategoriGuru">Kategori Tenaga</label>
              <select class="form-select-custom" name="kategori" id="editKategoriGuru">
                <option value="Guru">Guru / Pendidik</option>
                <option value="Staff">Tenaga Kependidikan / TU</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editFotoGuru">Ganti Foto Profil (Kosongkan jika tetap)</label>
              <input type="file" class="form-control-custom" name="foto" id="editFotoGuru" accept="image/*">
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
function editGuru(data) {
  document.getElementById('editIdGuru').value = data.id || '';
  document.getElementById('editNamaGuru').value = data.nama || '';
  document.getElementById('editNipGuru').value = data.nip || '';
  document.getElementById('editStatusGuru').value = data.status_kepegawaian || 'PNS';
  document.getElementById('editMapelGuru').value = data.bidang_studi || '';
  document.getElementById('editJabatanGuru').value = data.jabatan || '';
  document.getElementById('editPendidikanGuru').value = data.pendidikan_terakhir || '';
  document.getElementById('editEmailGuru').value = data.email || '';
  document.getElementById('editKategoriGuru').value = data.kategori || 'Guru';

  const modalEl = document.getElementById('modalEditGuru');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function simpanTambahGuru() {
  const form = document.getElementById('formTambahGuru');
  if (!form.nama.value.trim()) {
    alert('Silakan masukkan nama guru!');
    return;
  }

  const formData = new FormData(form);
  fetch('kelola-guru.php', {
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

function simpanEditGuru() {
  const form = document.getElementById('formEditGuru');
  if (!form.nama.value.trim()) {
    alert('Silakan masukkan nama guru!');
    return;
  }

  const formData = new FormData(form);
  fetch('kelola-guru.php', {
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

function hapusGuru(id, nama) {
  if (confirm('Apakah Anda yakin ingin menghapus data guru: ' + nama + '?')) {
    const formData = new FormData();
    formData.append('action', 'hapus');
    formData.append('id', id);

    fetch('kelola-guru.php', {
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
