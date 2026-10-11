<?php
/**
 * Kelola Jurusan Unggulan - Admin SMKN 2 Karanganyar
 */
require_once __DIR__ . '/../config/database.php';
$pdo = getDbConnection();

$uploadDir = __DIR__ . '/../uploads/jurusan/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

function uploadJurusanImage($fileInputName, $existingPath = '') {
    if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]['error'] === UPLOAD_ERR_NO_FILE) {
        return $existingPath;
    }
    $file = $_FILES[$fileInputName];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("Gagal mengunggah file. Kode error: " . $file['error']);
    }
    $allowedMimes = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];
    $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($fileInfo, $file['tmp_name']);
    finfo_close($fileInfo);
    if (!in_array($mimeType, $allowedMimes)) {
        throw new Exception("Format gambar harus JPG, PNG, atau WEBP.");
    }
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $newFileName = 'jurusan_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    $targetPath = __DIR__ . '/../uploads/jurusan/' . $newFileName;
    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        throw new Exception("Gagal menyimpan file gambar.");
    }
    return 'uploads/jurusan/' . $newFileName;
}

function resolveJurusanImg($path) {
    if (empty($path)) return '../images/3d-rpl.png';
    if (strpos($path, 'http://') === 0 || strpos($path, 'https://') === 0) return $path;
    return '../' . ltrim($path, '/');
}

// ==========================================
// HANDLE BACKEND POST REQUESTS (AJAX CRUD)
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    $action = $_POST['action'] ?? '';

    try {
        if ($action === 'tambah') {
            $nama = trim($_POST['nama'] ?? '');
            $singkatan = trim($_POST['singkatan'] ?? '');
            $kode = strtolower($singkatan);
            $kaprodi = trim($_POST['kaprodi'] ?? '');
            $kuota = trim($_POST['kuota'] ?? '72 Siswa (2 Rombel)');
            $akreditasi = trim($_POST['akreditasi'] ?? 'A');
            $deskripsi = trim($_POST['deskripsi'] ?? '');
            $kompetensi = trim($_POST['kompetensi'] ?? '');
            $warna = trim($_POST['warna'] ?? '#22c55e');
            $status = isset($_POST['status']) && $_POST['status'] === '0' ? 'Nonaktif' : 'Aktif';

            if (empty($nama) || empty($singkatan)) {
                echo json_encode(['success' => false, 'message' => 'Nama dan singkatan jurusan wajib diisi!']);
                exit;
            }

            $gambarPath = uploadJurusanImage('gambar_file', 'images/3d-rpl.png');

            $maxUrutan = (int) $pdo->query("SELECT COALESCE(MAX(urutan), 0) FROM jurusan")->fetchColumn();
            $stmt = $pdo->prepare("INSERT INTO jurusan (kode, nama, singkatan, deskripsi, kompetensi, gambar, warna, kuota, kaprodi, akreditasi, status, urutan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$kode, $nama, $singkatan, $deskripsi, $kompetensi, $gambarPath, $warna, $kuota, $kaprodi, $akreditasi, $status, $maxUrutan + 1]);

            echo json_encode(['success' => true, 'message' => 'Jurusan "' . $nama . '" berhasil ditambahkan!']);
            exit;
        }

        if ($action === 'edit') {
            $id = intval($_POST['id'] ?? 0);
            $nama = trim($_POST['nama'] ?? '');
            $singkatan = trim($_POST['singkatan'] ?? '');
            $kode = strtolower($singkatan);
            $kaprodi = trim($_POST['kaprodi'] ?? '');
            $kuota = trim($_POST['kuota'] ?? '');
            $akreditasi = trim($_POST['akreditasi'] ?? 'A');
            $deskripsi = trim($_POST['deskripsi'] ?? '');
            $kompetensi = trim($_POST['kompetensi'] ?? '');
            $warna = trim($_POST['warna'] ?? '#22c55e');
            $status = ($_POST['status'] ?? '1') === '0' ? 'Nonaktif' : 'Aktif';

            $stmtExist = $pdo->prepare("SELECT gambar FROM jurusan WHERE id = ?");
            $stmtExist->execute([$id]);
            $existingImg = $stmtExist->fetchColumn() ?: 'images/3d-rpl.png';

            $gambarPath = uploadJurusanImage('gambar_file', $existingImg);

            $stmt = $pdo->prepare("UPDATE jurusan SET nama = ?, singkatan = ?, kode = ?, kaprodi = ?, kuota = ?, akreditasi = ?, deskripsi = ?, kompetensi = ?, gambar = ?, warna = ?, status = ? WHERE id = ?");
            $stmt->execute([$nama, $singkatan, $kode, $kaprodi, $kuota, $akreditasi, $deskripsi, $kompetensi, $gambarPath, $warna, $status, $id]);

            echo json_encode(['success' => true, 'message' => 'Data jurusan "' . $nama . '" berhasil diperbarui!']);
            exit;
        }

        if ($action === 'hapus') {
            $id = intval($_POST['id'] ?? 0);
            $stmt = $pdo->prepare("DELETE FROM jurusan WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Jurusan berhasil dihapus!']);
            exit;
        }

        if ($action === 'toggle_status') {
            $id = intval($_POST['id'] ?? 0);
            $stmt = $pdo->prepare("UPDATE jurusan SET status = IF(status = 'Aktif', 'Nonaktif', 'Aktif') WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Status jurusan berhasil diubah!']);
            exit;
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        exit;
    }
}

// Fetch all jurusan
$jurusanList = $pdo->query("SELECT * FROM jurusan ORDER BY urutan ASC, id ASC")->fetchAll(PDO::FETCH_ASSOC);
$totalJurusan = count($jurusanList);
$totalSiswaKuota = 0;
foreach ($jurusanList as $j) {
    if (preg_match('/(\d+)/', $j['kuota'] ?? '', $m)) {
        $totalSiswaKuota += intval($m[1]);
    }
}

$pageTitle = 'Kelola Jurusan Unggulan - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-jurusan';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Kelola Jurusan Unggulan</h1>
      <p class="page-subtitle">Manajemen kompetensi keahlian vokasi, kurikulum industri, kuota siswa baru, dan kartu ilustrasi 3D di website.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../akademik/jurusan.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Lihat Halaman Jurusan
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalTambahJurusan">
        <i class="bi bi-plus-lg"></i> Tambah Jurusan
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- REKAPITULASI QUICK STATS BAR -->
  <div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Jurusan Aktif</span>
          <div class="stat-icon-circle bg-success-subtle text-success">
            <i class="bi bi-cpu-fill"></i>
          </div>
        </div>
        <div class="stat-value text-success"><?= $totalJurusan ?> Program</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span>100% Terakreditasi A</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Kuota Baru</span>
          <div class="stat-icon-circle bg-primary-subtle text-primary">
            <i class="bi bi-people-fill"></i>
          </div>
        </div>
        <div class="stat-value text-primary"><?= $totalSiswaKuota ?> Siswa</div>
        <div class="trend-badge text-primary">
          <i class="bi bi-grid-fill"></i>
          <span>11 Rombel Total</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Akreditasi BAN-SM</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-patch-check-fill"></i>
          </div>
        </div>
        <div class="stat-value text-warning">Predikat A</div>
        <div class="trend-badge text-warning">
          <i class="bi bi-star-fill"></i>
          <span>Skor Unggul Paripurna</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Mitra Industri Terikat</span>
          <div class="stat-icon-circle bg-info-subtle text-info">
            <i class="bi bi-building-check"></i>
          </div>
        </div>
        <div class="stat-value text-info">45+ DUDI</div>
        <div class="trend-badge text-info">
          <i class="bi bi-shield-check"></i>
          <span>Kelas Industri &amp; PKL</span>
        </div>
      </div>
    </div>
  </div>

  <!-- CONTROL SEARCH BAR -->
  <div class="table-card-custom mb-4 p-3 d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div class="table-search-box flex-grow-1" style="max-width: 480px;">
      <i class="bi bi-search table-search-icon"></i>
      <input type="text" class="table-search-input" id="searchJurusanInput" placeholder="Cari nama jurusan, singkatan, atau kaprodi..." onkeyup="filterJurusanCards()">
    </div>
    <div class="d-flex align-items-center gap-2">
      <span class="fs-xs text-muted-green fw-semibold"><i class="bi bi-grid me-1"></i> Terdata: <?= $totalJurusan ?> Jurusan Unggulan</span>
    </div>
  </div>

  <!-- JURUSAN GRID LIST -->
  <div class="row g-4 mb-4" id="jurusanCardContainer">
    <?php if (!empty($jurusanList)): ?>
      <?php foreach ($jurusanList as $jur): 
        $w = !empty($jur['warna']) ? $jur['warna'] : '#22c55e';
        $img = resolveJurusanImg($jur['gambar']);
        $kompArr = array_filter(array_map('trim', explode(',', $jur['kompetensi'] ?? '')));
      ?>
        <div class="col-xl-6 jurusan-item">
          <div class="card p-4 h-100 shadow-sm border-0 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
            <div>
              <!-- Header Card -->
              <div class="d-flex align-items-start justify-content-between mb-3 pb-3 border-bottom">
                <div class="d-flex align-items-center gap-3">
                  <div class="rounded-3 p-2" style="background: <?= htmlspecialchars($w) ?>22; width: 62px; height: 62px; display: flex; align-items: center; justify-content: center; border: 1px solid <?= htmlspecialchars($w) ?>55;">
                    <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($jur['singkatan']) ?>" style="max-width: 46px; max-height: 46px; object-fit: contain;" onerror="this.src='../images/3d-rpl.png'">
                  </div>
                  <div>
                    <span class="badge bg-success-subtle text-success mb-1" style="font-size: 0.72rem; letter-spacing: 0.03em;"><?= htmlspecialchars($jur['singkatan']) ?> &bull; TERAKREDITASI <?= htmlspecialchars($jur['akreditasi']) ?></span>
                    <h5 class="fw-bold mb-1 text-main" style="font-size: 1.15rem;"><?= htmlspecialchars($jur['nama']) ?></h5>
                    <div class="text-muted fs-xs d-flex align-items-center gap-1">
                      <i class="bi bi-person-badge text-success"></i> Kaprodi: <strong><?= htmlspecialchars($jur['kaprodi'] ?: 'Belum ditentukan') ?></strong>
                    </div>
                  </div>
                </div>
                <div class="dropdown">
                  <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 34px; height: 34px; padding: 0;">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    <li><a class="dropdown-item" href="javascript:void(0)" onclick='bukaEditJurusan(<?= json_encode($jur) ?>)'><i class="bi bi-pencil me-2 text-primary"></i> Edit Jurusan</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="toggleStatusJurusan(<?= $jur['id'] ?>)"><i class="bi bi-arrow-repeat me-2 text-warning"></i> Ubah Status (<?= $jur['status'] === 'Aktif' ? 'Nonaktifkan' : 'Aktifkan' ?>)</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="hapusJurusan(<?= $jur['id'] ?>, '<?= htmlspecialchars(addslashes($jur['nama'])) ?>')"><i class="bi bi-trash me-2"></i> Hapus</a></li>
                  </ul>
                </div>
              </div>

              <!-- Description -->
              <p class="text-muted fs-sm mb-3" style="line-height: 1.6; min-height: 48px;">
                <?= htmlspecialchars($jur['deskripsi']) ?>
              </p>

              <!-- Competencies pills -->
              <div class="d-flex flex-wrap gap-1 mb-3">
                <?php if (!empty($kompArr)): ?>
                  <?php foreach ($kompArr as $kp): ?>
                    <span class="badge bg-light text-dark border fs-xs"><?= htmlspecialchars($kp) ?></span>
                  <?php endforeach; ?>
                <?php else: ?>
                  <span class="badge bg-light text-muted border fs-xs">Kurikulum Vokasi Industri</span>
                <?php endif; ?>
              </div>
            </div>

            <!-- Footer Card -->
            <div class="pt-3 border-top">
              <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2 fs-xs">
                <div><span class="text-muted">Kuota Penerimaan:</span> <strong class="text-main"><?= htmlspecialchars($jur['kuota']) ?></strong></div>
                <div class="d-flex align-items-center gap-1">
                  <span class="text-muted">Aksen Warna:</span>
                  <span class="badge d-inline-flex align-items-center gap-1" style="background:<?= htmlspecialchars($w) ?>; color:#072F1F; font-weight:700;">
                    <span style="display:inline-block; width:8px; height:8px; background:#072F1F; border-radius:50%;"></span> <?= htmlspecialchars($w) ?>
                  </span>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center pt-2">
                <span class="badge <?= $jur['status'] === 'Aktif' ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' ?> d-inline-flex align-items-center gap-1">
                  <i class="bi <?= $jur['status'] === 'Aktif' ? 'bi-check-circle-fill' : 'bi-dash-circle' ?>"></i> <?= $jur['status'] === 'Aktif' ? 'Tampil di Website' : 'Nonaktif' ?>
                </span>
                <div class="d-flex gap-2">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick='bukaEditJurusan(<?= json_encode($jur) ?>)'>
                    <i class="bi bi-pencil me-1"></i> Edit
                  </button>
                  <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusJurusan(<?= $jur['id'] ?>, '<?= htmlspecialchars(addslashes($jur['nama'])) ?>')">
                    <i class="bi bi-trash"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12 text-center py-5">
        <p class="text-muted">Belum ada jurusan yang ditambahkan.</p>
      </div>
    <?php endif; ?>
  </div>

</div>
<!-- END: .main-wrapper -->

<!-- Modal Tambah Jurusan -->
<div class="modal fade" id="modalTambahJurusan" tabindex="-1" aria-labelledby="modalTambahJurusanLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTambahJurusanLabel">
          <i class="bi bi-cpu-fill text-success"></i> Tambah Program Keahlian / Jurusan
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahJurusan" enctype="multipart/form-data">
          <input type="hidden" name="action" value="tambah">
          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label-custom" for="tambahNamaJurusan">Nama Lengkap Program Keahlian <span class="text-danger">*</span></label>
              <input type="text" class="form-control-custom" id="tambahNamaJurusan" name="nama" placeholder="Contoh: Rekayasa Perangkat Lunak" required>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="tambahKodeJurusan">Singkatan / Kode <span class="text-danger">*</span></label>
              <input type="text" class="form-control-custom" id="tambahKodeJurusan" name="singkatan" placeholder="RPL" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahKaprodiJurusan">Nama Ketua Program Keahlian (Kaprodi)</label>
              <input type="text" class="form-control-custom" id="tambahKaprodiJurusan" name="kaprodi" placeholder="Contoh: Bpk. Eko Prasetyo, S.Kom., M.Cs.">
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="tambahKuotaJurusan">Kuota Siswa Baru</label>
              <input type="text" class="form-control-custom" id="tambahKuotaJurusan" name="kuota" value="108 Siswa (3 Rombel)">
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="tambahAkreditasiJurusan">Akreditasi</label>
              <select class="form-select-custom" id="tambahAkreditasiJurusan" name="akreditasi">
                <option value="A" selected>Terakreditasi A</option>
                <option value="B">Terakreditasi B</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahDeskripsiJurusan">Deskripsi Ringkas Kompetensi</label>
              <textarea class="form-control-custom" id="tambahDeskripsiJurusan" name="deskripsi" rows="3" placeholder="Jelaskan fokus keahlian, teknologi yang dipelajari, dan prospek karir lulusan..."></textarea>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahKompetensiJurusan">Kompetensi Utama (Pisahkan dengan koma)</label>
              <input type="text" class="form-control-custom" id="tambahKompetensiJurusan" name="kompetensi" placeholder="Web Dev, Mobile Apps, Cloud Computing, UI/UX Design">
            </div>

            <div class="col-md-8">
              <label class="form-label-custom" for="tambahGambarJurusan">File Gambar / Ilustrasi 3D</label>
              <input type="file" class="form-control-custom" id="tambahGambarJurusan" name="gambar_file" accept="image/*">
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="tambahWarnaJurusan">Aksen Warna Tema</label>
              <input type="color" class="form-control-custom w-100 p-1" id="tambahWarnaJurusan" name="warna" value="#22c55e" style="height: 42px;">
            </div>

            <div class="col-12">
              <div class="form-switch-custom">
                <input class="form-switch-input-custom" type="checkbox" id="checkTampil" name="status" value="1" checked>
                <label class="form-label-custom mb-0" for="checkTampil">Tampilkan langsung pada Website</label>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanTambahJurusan()">
          <i class="bi bi-check-circle-fill"></i> Simpan Jurusan
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Jurusan -->
<div class="modal fade" id="modalEditJurusan" tabindex="-1" aria-labelledby="modalEditJurusanLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalEditJurusanLabel">
          <i class="bi bi-pencil-square text-success"></i> Edit Program Keahlian / Jurusan
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditJurusan" enctype="multipart/form-data">
          <input type="hidden" name="action" value="edit">
          <input type="hidden" id="editIdJurusan" name="id">
          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label-custom" for="editNamaJurusan">Nama Lengkap Jurusan <span class="text-danger">*</span></label>
              <input type="text" class="form-control-custom" id="editNamaJurusan" name="nama" required>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="editKodeJurusan">Singkatan / Kode <span class="text-danger">*</span></label>
              <input type="text" class="form-control-custom" id="editKodeJurusan" name="singkatan" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="editKaprodiJurusan">Nama Ketua Program (Kaprodi)</label>
              <input type="text" class="form-control-custom" id="editKaprodiJurusan" name="kaprodi">
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="editKuotaJurusan">Kuota Siswa Baru</label>
              <input type="text" class="form-control-custom" id="editKuotaJurusan" name="kuota">
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="editAkreditasiJurusan">Akreditasi</label>
              <select class="form-select-custom" id="editAkreditasiJurusan" name="akreditasi">
                <option value="A">Terakreditasi A</option>
                <option value="B">Terakreditasi B</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editDeskripsiJurusan">Deskripsi Ringkas</label>
              <textarea class="form-control-custom" id="editDeskripsiJurusan" name="deskripsi" rows="3"></textarea>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editKompetensiJurusan">Kompetensi Utama (Pisahkan koma)</label>
              <input type="text" class="form-control-custom" id="editKompetensiJurusan" name="kompetensi">
            </div>

            <div class="col-md-8">
              <label class="form-label-custom" for="editGambarJurusan">Ganti Gambar / Ilustrasi 3D (Kosongkan bila tidak diubah)</label>
              <input type="file" class="form-control-custom" id="editGambarJurusan" name="gambar_file" accept="image/*">
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="editWarnaJurusan">Aksen Warna Tema</label>
              <input type="color" class="form-control-custom w-100 p-1" id="editWarnaJurusan" name="warna" style="height: 42px;">
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editStatusTayang">Status Publikasi</label>
              <select class="form-select-custom" id="editStatusTayang" name="status">
                <option value="1">Aktif (Tampil di Website)</option>
                <option value="0">Nonaktif (Sembunyikan)</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanEditJurusan()">
          <i class="bi bi-save-fill"></i> Perbarui Jurusan
        </button>
      </div>
    </div>
  </div>
</div>

<script>
function bukaEditJurusan(data) {
  document.getElementById('editIdJurusan').value = data.id || '';
  document.getElementById('editNamaJurusan').value = data.nama || '';
  document.getElementById('editKodeJurusan').value = data.singkatan || '';
  document.getElementById('editKaprodiJurusan').value = data.kaprodi || '';
  document.getElementById('editKuotaJurusan').value = data.kuota || '';
  document.getElementById('editAkreditasiJurusan').value = data.akreditasi || 'A';
  document.getElementById('editDeskripsiJurusan').value = data.deskripsi || '';
  document.getElementById('editKompetensiJurusan').value = data.kompetensi || '';
  document.getElementById('editWarnaJurusan').value = data.warna || '#22c55e';
  document.getElementById('editStatusTayang').value = (data.status === 'Aktif') ? '1' : '0';

  const modalEl = document.getElementById('modalEditJurusan');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function simpanTambahJurusan() {
  const form = document.getElementById('formTambahJurusan');
  if (!form.nama.value.trim() || !form.singkatan.value.trim()) {
    alert('Nama dan singkatan jurusan wajib diisi!');
    return;
  }
  const fd = new FormData(form);
  fetch('kelola-jurusan.php', { method: 'POST', body: fd })
    .then(r => r.json())
    .then(data => {
      if (data.success) {
        alert(data.message);
        window.location.reload();
      } else {
        alert('Gagal: ' + data.message);
      }
    })
    .catch(err => alert('Error: ' + err.message));
}

function simpanEditJurusan() {
  const form = document.getElementById('formEditJurusan');
  if (!form.nama.value.trim() || !form.singkatan.value.trim()) {
    alert('Nama dan singkatan jurusan wajib diisi!');
    return;
  }
  const fd = new FormData(form);
  fetch('kelola-jurusan.php', { method: 'POST', body: fd })
    .then(r => r.json())
    .then(data => {
      if (data.success) {
        alert(data.message);
        window.location.reload();
      } else {
        alert('Gagal: ' + data.message);
      }
    })
    .catch(err => alert('Error: ' + err.message));
}

function hapusJurusan(id, nama) {
  if (confirm('Yakin ingin menghapus jurusan "' + nama + '"?')) {
    const fd = new FormData();
    fd.append('action', 'hapus');
    fd.append('id', id);
    fetch('kelola-jurusan.php', { method: 'POST', body: fd })
      .then(r => r.json())
      .then(data => {
        if (data.success) {
          alert(data.message);
          window.location.reload();
        } else {
          alert('Gagal: ' + data.message);
        }
      })
      .catch(err => alert('Error: ' + err.message));
  }
}

function toggleStatusJurusan(id) {
  const fd = new FormData();
  fd.append('action', 'toggle_status');
  fd.append('id', id);
  fetch('kelola-jurusan.php', { method: 'POST', body: fd })
    .then(r => r.json())
    .then(data => {
      if (data.success) {
        window.location.reload();
      } else {
        alert('Gagal: ' + data.message);
      }
    })
    .catch(err => alert('Error: ' + err.message));
}

function filterJurusanCards() {
  const query = (document.getElementById('searchJurusanInput').value || '').toLowerCase();
  const items = document.querySelectorAll('.jurusan-item');
  items.forEach(item => {
    const text = item.textContent.toLowerCase();
    if (!query || text.includes(query)) {
      item.style.display = '';
    } else {
      item.style.display = 'none';
    }
  });
}
</script>

<?php include __DIR__ . '/components/footer.php'; ?>
