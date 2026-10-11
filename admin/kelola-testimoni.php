<?php
/**
 * Kelola Testimoni Alumni - Admin SMKN 2 Karanganyar
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
            $jurusan = trim($_POST['jurusan'] ?? '');
            $tahun_lulus = !empty($_POST['tahun_lulus']) ? (int)$_POST['tahun_lulus'] : date('Y');
            $pekerjaan = trim($_POST['pekerjaan'] ?? '');
            $testimoni = trim($_POST['testimoni'] ?? '');
            $rating = !empty($_POST['rating']) ? (int)$_POST['rating'] : 5;
            $tampil_landing = isset($_POST['tampil_landing']) && ($_POST['tampil_landing'] == '1' || $_POST['tampil_landing'] == 'on') ? 1 : 0;
            $status = !empty($_POST['status']) ? $_POST['status'] : 'Aktif';

            if (empty($nama) || empty($testimoni)) {
                echo json_encode(['success' => false, 'message' => 'Nama dan ulasan testimoni wajib diisi!']);
                exit;
            }

            // Handle file upload if any
            $fotoPath = null;
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../uploads/testimoni/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'webp'];
                if (in_array($ext, $allowed)) {
                    $newFileName = 'alumni_' . time() . '_' . rand(100, 999) . '.' . $ext;
                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadDir . $newFileName)) {
                        $fotoPath = 'uploads/testimoni/' . $newFileName;
                    }
                }
            }

            if ($action === 'tambah') {
                if (!$fotoPath) {
                    $fotoPath = 'https://ui-avatars.com/api/?name=' . urlencode($nama) . '&background=4ade80&color=072f1f&size=80&bold=true';
                }
                $stmt = $pdo->prepare("INSERT INTO testimoni (nama, jurusan, tahun_lulus, profesi, perusahaan, testimoni, foto, rating, status, tampil_landing, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
                $stmt->execute([$nama, $jurusan, $tahun_lulus, $pekerjaan, $pekerjaan, $testimoni, $fotoPath, $rating, $status, $tampil_landing]);
                echo json_encode(['success' => true, 'message' => 'Testimoni alumni berhasil ditambahkan!']);
                exit;
            } else {
                // EDIT
                if ($fotoPath) {
                    $stmt = $pdo->prepare("UPDATE testimoni SET nama = ?, jurusan = ?, tahun_lulus = ?, profesi = ?, perusahaan = ?, testimoni = ?, foto = ?, rating = ?, status = ?, tampil_landing = ? WHERE id = ?");
                    $stmt->execute([$nama, $jurusan, $tahun_lulus, $pekerjaan, $pekerjaan, $testimoni, $fotoPath, $rating, $status, $tampil_landing, $id]);
                } else {
                    $stmt = $pdo->prepare("UPDATE testimoni SET nama = ?, jurusan = ?, tahun_lulus = ?, profesi = ?, perusahaan = ?, testimoni = ?, rating = ?, status = ?, tampil_landing = ? WHERE id = ?");
                    $stmt->execute([$nama, $jurusan, $tahun_lulus, $pekerjaan, $pekerjaan, $testimoni, $rating, $status, $tampil_landing, $id]);
                }
                echo json_encode(['success' => true, 'message' => 'Testimoni alumni berhasil diperbarui!']);
                exit;
            }
        }

        if ($action === 'hapus') {
            $id = (int)($_POST['id'] ?? 0);
            $stmt = $pdo->prepare("DELETE FROM testimoni WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Testimoni berhasil dihapus!']);
            exit;
        }

        if ($action === 'toggle_status') {
            $id = (int)($_POST['id'] ?? 0);
            $status = $_POST['status'] === 'Aktif' ? 'Aktif' : 'Nonaktif';
            $stmt = $pdo->prepare("UPDATE testimoni SET status = ? WHERE id = ?");
            $stmt->execute([$status, $id]);
            echo json_encode(['success' => true, 'message' => 'Status testimoni berhasil diubah!']);
            exit;
        }

        if ($action === 'toggle_landing') {
            $id = (int)($_POST['id'] ?? 0);
            $val = (int)($_POST['tampil_landing'] ?? 0);
            $stmt = $pdo->prepare("UPDATE testimoni SET tampil_landing = ? WHERE id = ?");
            $stmt->execute([$val, $id]);
            echo json_encode(['success' => true, 'message' => 'Penayangan landing page berhasil diubah!']);
            exit;
        }

        echo json_encode(['success' => false, 'message' => 'Aksi tidak dikenal!']);
        exit;
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
        exit;
    }
}

// FETCH DATA FOR DISPLAY
$testimoniList = [];
try {
    $stmt = $pdo->query("SELECT * FROM testimoni ORDER BY id DESC");
    $testimoniList = $stmt->fetchAll();
} catch (Exception $e) {
    //
}

$totalTesti = count($testimoniList);
$totalLanding = count(array_filter($testimoniList, fn($t) => !empty($t['tampil_landing'])));
$totalAktif = count(array_filter($testimoniList, fn($t) => ($t['status'] ?? 'Aktif') === 'Aktif'));

$pageTitle = 'Kelola Testimoni Alumni - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-testimoni';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Kelola Testimoni Alumni</h1>
      <p class="page-subtitle">Kelola ulasan kisah sukses lulusan yang ditampilkan pada section 'Apa Kata Alumni?' di landing page dan halaman profil.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../tentang/alumni.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Halaman Alumni Web
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalTambahTesti">
        <i class="bi bi-plus-lg"></i> Tambah Testimoni
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- REKAPITULASI QUICK STATS BAR -->
  <div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Testimoni</span>
          <div class="stat-icon-circle bg-success-subtle text-success">
            <i class="bi bi-chat-quote-fill"></i>
          </div>
        </div>
        <div class="stat-value text-success"><?= $totalTesti ?> Alumni</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span><?= $totalAktif ?> Status Aktif</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Tampil di Home</span>
          <div class="stat-icon-circle bg-primary-subtle text-primary">
            <i class="bi bi-display"></i>
          </div>
        </div>
        <div class="stat-value text-primary"><?= $totalLanding ?> Utama</div>
        <div class="trend-badge text-primary">
          <i class="bi bi-star-fill"></i>
          <span>Highlight Landing Page</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Serapan Industri</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-briefcase-fill"></i>
          </div>
        </div>
        <div class="stat-value text-warning">92% Bekerja</div>
        <div class="trend-badge text-warning">
          <i class="bi bi-building"></i>
          <span>Perusahaan Nasional &amp; MNC</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Lanjut Studi (PTN)</span>
          <div class="stat-icon-circle bg-info-subtle text-info">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
        </div>
        <div class="stat-value text-info">8% Kuliah</div>
        <div class="trend-badge text-info">
          <i class="bi bi-journal-check"></i>
          <span>Beasiswa Vokasi Mandiri</span>
        </div>
      </div>
    </div>
  </div>

  <!-- CONTROL SEARCH BAR -->
  <div class="table-card-custom mb-4 p-3 d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div class="table-search-box flex-grow-1" style="max-width: 460px;">
      <i class="bi bi-search table-search-icon"></i>
      <input type="text" class="table-search-input" id="searchTestiInput" placeholder="Cari nama alumni, jurusan, atau tempat kerja..." onkeyup="filterTestimoniCards()">
    </div>
    <div class="table-filter-group">
      <select class="form-select form-select-sm" id="filterJurusanTesti" onchange="filterTestimoniCards()" style="width: auto;">
        <option value="" selected>Semua Jurusan Alumni</option>
        <option value="RPL">RPL</option>
        <option value="Mesin">Mesin (TPM)</option>
        <option value="Tekstil">Tekstil (TPK)</option>
        <option value="Ototronik">Ototronik (TOT)</option>
      </select>
    </div>
  </div>

  <!-- TESTIMONI CARDS -->
  <div class="row g-4 mb-4" id="testimoniGrid">
    <?php if (!empty($testimoniList)): ?>
      <?php foreach ($testimoniList as $t): 
        $fotoUrl = !empty($t['foto']) ? (str_starts_with($t['foto'], 'http') ? $t['foto'] : '../' . $t['foto']) : 'https://ui-avatars.com/api/?name=' . urlencode($t['nama']) . '&background=4ade80&color=072f1f&size=80&bold=true';
        $isLanding = !empty($t['tampil_landing']);
        $isAktif = ($t['status'] ?? 'Aktif') === 'Aktif';
        $pekerjaan = $t['profesi'] ?? $t['perusahaan'] ?? '';
      ?>
      <div class="col-lg-4 col-md-6 testi-item" data-id="<?= $t['id'] ?>">
        <div class="card p-4 h-100 shadow-sm border-0 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
          <div>
            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
              <div>
                <?php if ($isLanding): ?>
                  <span class="badge bg-success-subtle text-success fw-bold" style="font-size: 0.72rem; letter-spacing: 0.03em;">Landing Page</span>
                <?php else: ?>
                  <span class="badge bg-secondary-subtle text-secondary fw-bold" style="font-size: 0.72rem; letter-spacing: 0.03em;">Profil Alumni</span>
                <?php endif; ?>
              </div>
              <div class="form-check form-switch m-0 d-flex align-items-center gap-1">
                <input class="form-check-input" type="checkbox" id="testi-<?= $t['id'] ?>" <?= $isAktif ? 'checked' : '' ?> onchange="toggleTestiStatus(<?= $t['id'] ?>, this.checked, '<?= htmlspecialchars(addslashes($t['nama'])) ?>')">
                <label class="form-check-label fs-xs fw-semibold text-muted" for="testi-<?= $t['id'] ?>"><?= $isAktif ? 'Aktif' : 'Nonaktif' ?></label>
              </div>
            </div>
            <div class="d-flex align-items-center gap-3 mb-3">
              <img src="<?= htmlspecialchars($fotoUrl) ?>" alt="<?= htmlspecialchars($t['nama']) ?>" class="rounded-circle border" style="width: 52px; height: 52px; object-fit: cover; flex-shrink: 0;">
              <div>
                <h6 class="fw-bold mb-0 text-main testi-name"><?= htmlspecialchars($t['nama']) ?></h6>
                <div class="text-success fs-xs fw-bold testi-jurusan"><?= htmlspecialchars($t['jurusan']) ?> &bull; Lulusan <?= htmlspecialchars($t['tahun_lulus']) ?></div>
                <div class="text-muted fs-xs testi-job"><?= htmlspecialchars($pekerjaan) ?></div>
              </div>
            </div>
            <blockquote class="text-muted fs-sm fst-italic border-start border-3 border-success ps-3 my-3" style="line-height: 1.6; min-height: 68px;">
              "<?= htmlspecialchars($t['testimoni']) ?>"
            </blockquote>
          </div>
          <div class="d-flex justify-content-between align-items-center pt-3 border-top">
            <span class="badge bg-light text-muted border fs-xs">
              <i class="bi bi-clock me-1"></i> <?= !empty($t['created_at']) ? date('d M Y', strtotime($t['created_at'])) : 'Alumni' ?>
            </span>
            <div class="d-flex gap-2">
              <button type="button" class="btn btn-sm btn-outline-secondary" onclick="editTestimoni(<?= htmlspecialchars(json_encode($t)) ?>)">
                <i class="bi bi-pencil me-1"></i> Edit
              </button>
              <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusTestimoni(<?= $t['id'] ?>, '<?= htmlspecialchars(addslashes($t['nama'])) ?>')">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12 text-center py-5 text-muted">
        <i class="bi bi-chat-quote display-4 d-block mb-3 text-secondary"></i>
        <h5>Belum ada testimoni alumni tersimpan</h5>
        <p>Klik tombol "Tambah Testimoni" di atas untuk menambahkan testimoni baru.</p>
      </div>
    <?php endif; ?>
  </div>

</div>
<!-- END: .main-wrapper -->

<!-- Modal Tambah Testimoni -->
<div class="modal fade" id="modalTambahTesti" tabindex="-1" aria-labelledby="modalTambahTestiLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTambahTestiLabel">
          <i class="bi bi-chat-quote-fill text-success"></i> Tambah Testimoni Alumni
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahTesti" enctype="multipart/form-data">
          <input type="hidden" name="action" value="tambah">
          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="tambahNamaTesti">Nama Lengkap Alumni</label>
              <input type="text" class="form-control-custom" name="nama" id="tambahNamaTesti" placeholder="Contoh: Muhammad Farhan Pratama" required>
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="tambahJurusanTesti">Jurusan Alumni</label>
              <select class="form-select-custom" name="jurusan" id="tambahJurusanTesti">
                <option value="RPL" selected>Rekayasa Perangkat Lunak (RPL)</option>
                <option value="Teknik Pemesinan">Teknik Pemesinan (TPM)</option>
                <option value="Teknik Tekstil">Teknik Tekstil (TPK)</option>
                <option value="Teknik Ototronik">Teknik Ototronik (TOT)</option>
              </select>
            </div>
            <div class="col-md-2">
              <label class="form-label-custom" for="tambahTahunTesti">Tahun Lulus</label>
              <input type="number" class="form-control-custom" name="tahun_lulus" id="tambahTahunTesti" value="<?= date('Y') - 2 ?>">
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahPekerjaanTesti">Pekerjaan &amp; Instansi / Perusahaan Saat Ini</label>
              <input type="text" class="form-control-custom" name="pekerjaan" id="tambahPekerjaanTesti" placeholder="Contoh: Frontend Software Engineer di PT. Astra International Tbk">
              <div class="form-text-custom">Informasi karir atau perguruan tinggi tempat studi lanjut alumni.</div>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahFotoTesti">Foto Profil Alumni (Opsional)</label>
              <input type="file" class="form-control-custom" name="foto" id="tambahFotoTesti" accept="image/*">
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahRatingTesti">Rating Kepuasan (1-5)</label>
              <select class="form-select-custom" name="rating" id="tambahRatingTesti">
                <option value="5" selected>⭐⭐⭐⭐⭐ (5 Bintang)</option>
                <option value="4">⭐⭐⭐⭐ (4 Bintang)</option>
                <option value="3">⭐⭐⭐ (3 Bintang)</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahPesanTesti">Pesan Ulasan / Testimoni Lengkap</label>
              <textarea class="form-control-custom" name="testimoni" id="tambahPesanTesti" rows="4" placeholder="Tuliskan pengalaman berharga, ilmu praktis, dan kesan mendalam selama menempuh pendidikan di SMKN 2 Karanganyar..." required></textarea>
            </div>

            <div class="col-12">
              <div class="form-switch-custom">
                <input class="form-switch-input-custom" type="checkbox" name="tampil_landing" value="1" id="checkTayangTesti" checked>
                <label class="form-label-custom mb-0" for="checkTayangTesti">Tampilkan langsung pada Landing Page Website</label>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanTambahTesti()">
          <i class="bi bi-check-circle-fill"></i> Simpan Testimoni
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Testimoni -->
<div class="modal fade" id="modalEditTesti" tabindex="-1" aria-labelledby="modalEditTestiLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalEditTestiLabel">
          <i class="bi bi-pencil-square text-success"></i> Edit Testimoni Alumni
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditTesti" enctype="multipart/form-data">
          <input type="hidden" name="action" value="edit">
          <input type="hidden" name="id" id="editIdTesti">
          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="editNamaTesti">Nama Lengkap Alumni</label>
              <input type="text" class="form-control-custom" name="nama" id="editNamaTesti" required>
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="editJurusanTesti">Jurusan Alumni</label>
              <select class="form-select-custom" name="jurusan" id="editJurusanTesti">
                <option value="RPL">Rekayasa Perangkat Lunak</option>
                <option value="Teknik Pemesinan">Teknik Pemesinan</option>
                <option value="Teknik Tekstil">Teknik Tekstil</option>
                <option value="Teknik Ototronik">Teknik Ototronik</option>
              </select>
            </div>
            <div class="col-md-2">
              <label class="form-label-custom" for="editTahunTesti">Tahun Lulus</label>
              <input type="number" class="form-control-custom" name="tahun_lulus" id="editTahunTesti">
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editPekerjaanTesti">Pekerjaan &amp; Perusahaan</label>
              <input type="text" class="form-control-custom" name="pekerjaan" id="editPekerjaanTesti">
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="editFotoTesti">Ganti Foto (Kosongkan jika tetap)</label>
              <input type="file" class="form-control-custom" name="foto" id="editFotoTesti" accept="image/*">
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="editRatingTesti">Rating Kepuasan</label>
              <select class="form-select-custom" name="rating" id="editRatingTesti">
                <option value="5">⭐⭐⭐⭐⭐ (5 Bintang)</option>
                <option value="4">⭐⭐⭐⭐ (4 Bintang)</option>
                <option value="3">⭐⭐⭐ (3 Bintang)</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editPesanTesti">Ulasan Testimoni</label>
              <textarea class="form-control-custom" name="testimoni" id="editPesanTesti" rows="4" required></textarea>
            </div>

            <div class="col-12">
              <div class="form-switch-custom">
                <input class="form-switch-input-custom" type="checkbox" name="tampil_landing" value="1" id="editCheckTayangTesti">
                <label class="form-label-custom mb-0" for="editCheckTayangTesti">Tampilkan pada Landing Page Website</label>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanEditTesti()">
          <i class="bi bi-save-fill"></i> Perbarui Testimoni
        </button>
      </div>
    </div>
  </div>
</div>

<script>
function editTestimoni(data) {
  document.getElementById('editIdTesti').value = data.id || '';
  document.getElementById('editNamaTesti').value = data.nama || '';
  document.getElementById('editJurusanTesti').value = data.jurusan || 'RPL';
  document.getElementById('editTahunTesti').value = data.tahun_lulus || '';
  document.getElementById('editPekerjaanTesti').value = data.profesi || data.perusahaan || '';
  document.getElementById('editRatingTesti').value = data.rating || 5;
  document.getElementById('editPesanTesti').value = data.testimoni || '';
  document.getElementById('editCheckTayangTesti').checked = (data.tampil_landing == 1);

  const modalEl = document.getElementById('modalEditTesti');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function simpanTambahTesti() {
  const form = document.getElementById('formTambahTesti');
  if (!form.nama.value.trim() || !form.testimoni.value.trim()) {
    alert('Nama alumni dan ulasan testimoni wajib diisi!');
    return;
  }

  const formData = new FormData(form);
  fetch('kelola-testimoni.php', {
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

function simpanEditTesti() {
  const form = document.getElementById('formEditTesti');
  if (!form.nama.value.trim() || !form.testimoni.value.trim()) {
    alert('Nama alumni dan ulasan testimoni wajib diisi!');
    return;
  }

  const formData = new FormData(form);
  fetch('kelola-testimoni.php', {
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

function hapusTestimoni(id, nama) {
  if (confirm('Apakah Anda yakin ingin menghapus testimoni dari ' + nama + '?')) {
    const formData = new FormData();
    formData.append('action', 'hapus');
    formData.append('id', id);

    fetch('kelola-testimoni.php', {
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

function toggleTestiStatus(id, isChecked, nama) {
  const status = isChecked ? 'Aktif' : 'Nonaktif';
  const formData = new FormData();
  formData.append('action', 'toggle_status');
  formData.append('id', id);
  formData.append('status', status);

  fetch('kelola-testimoni.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (!data.success) {
      alert('Gagal memperbarui status: ' + data.message);
      location.reload();
    }
  })
  .catch(err => {
    alert('Terjadi kesalahan jaringan.');
    location.reload();
  });
}

function filterTestimoniCards() {
  const query = (document.getElementById('searchTestiInput').value || '').toLowerCase();
  const filter = (document.getElementById('filterJurusanTesti').value || '').toLowerCase();
  const items = document.querySelectorAll('.testi-item');

  items.forEach(item => {
    const text = item.textContent.toLowerCase();
    const matchQuery = !query || text.includes(query);
    const matchFilter = !filter || text.includes(filter);
    if (matchQuery && matchFilter) {
      item.style.display = '';
    } else {
      item.style.display = 'none';
    }
  });
}
</script>

<?php include __DIR__ . '/components/footer.php'; ?>
