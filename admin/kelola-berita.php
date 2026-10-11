<?php
/**
 * Kelola Warta & Berita Sekolah - Admin SMKN 2 Karanganyar
 */
require_once __DIR__ . '/../config/database.php';
$pdo = getDbConnection();

$uploadDir = __DIR__ . '/../uploads/berita/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

function uploadBeritaImage($fileInputName, $existingPath = '') {
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
    $newFileName = 'berita_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    $targetPath = __DIR__ . '/../uploads/berita/' . $newFileName;
    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        throw new Exception("Gagal menyimpan file gambar.");
    }
    return 'uploads/berita/' . $newFileName;
}

function resolveBeritaImg($path) {
    if (empty($path)) return '../images/gedung.jpg';
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
            $judul = trim($_POST['judul'] ?? '');
            $kategori = trim($_POST['kategori'] ?? 'Prestasi');
            $tanggal = trim($_POST['tanggal'] ?? date('Y-m-d'));
            $ringkasan = trim($_POST['ringkasan'] ?? '');
            $konten = trim($_POST['konten'] ?? '');
            $tampilLanding = isset($_POST['tampil_landing']) && $_POST['tampil_landing'] == '1' ? 1 : 0;
            $status = trim($_POST['status'] ?? 'Publikasi');
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul), '-'));

            if (empty($judul)) {
                echo json_encode(['success' => false, 'message' => 'Judul berita wajib diisi!']);
                exit;
            }

            $urlGambarInput = trim($_POST['url_gambar'] ?? '');
            $gambarPath = $urlGambarInput ?: 'images/gedung.jpg';
            if (isset($_FILES['gambar_file']) && $_FILES['gambar_file']['error'] === UPLOAD_ERR_OK) {
                $gambarPath = uploadBeritaImage('gambar_file', $gambarPath);
            }

            $stmt = $pdo->prepare("INSERT INTO berita (judul, slug, kategori, gambar, ringkasan, konten, penulis, tanggal, tampil_landing, status) VALUES (?, ?, ?, ?, ?, ?, 'Admin SMKN 2', ?, ?, ?)");
            $stmt->execute([$judul, $slug, $kategori, $gambarPath, $ringkasan, $konten, $tanggal, $tampilLanding, $status]);

            echo json_encode(['success' => true, 'message' => 'Berita berhasil dipublikasikan!']);
            exit;
        }

        if ($action === 'edit') {
            $id = intval($_POST['id'] ?? 0);
            $judul = trim($_POST['judul'] ?? '');
            $kategori = trim($_POST['kategori'] ?? 'Prestasi');
            $tanggal = trim($_POST['tanggal'] ?? date('Y-m-d'));
            $ringkasan = trim($_POST['ringkasan'] ?? '');
            $konten = trim($_POST['konten'] ?? '');
            $tampilLanding = isset($_POST['tampil_landing']) && $_POST['tampil_landing'] == '1' ? 1 : 0;
            $status = trim($_POST['status'] ?? 'Publikasi');
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul), '-'));

            $stmtExist = $pdo->prepare("SELECT gambar FROM berita WHERE id = ?");
            $stmtExist->execute([$id]);
            $existingImg = $stmtExist->fetchColumn() ?: 'images/gedung.jpg';

            $urlGambarInput = trim($_POST['url_gambar'] ?? '');
            $gambarPath = $urlGambarInput ?: $existingImg;
            if (isset($_FILES['gambar_file']) && $_FILES['gambar_file']['error'] === UPLOAD_ERR_OK) {
                $gambarPath = uploadBeritaImage('gambar_file', $gambarPath);
            }

            $stmt = $pdo->prepare("UPDATE berita SET judul = ?, slug = ?, kategori = ?, gambar = ?, ringkasan = ?, konten = ?, tanggal = ?, tampil_landing = ?, status = ? WHERE id = ?");
            $stmt->execute([$judul, $slug, $kategori, $gambarPath, $ringkasan, $konten, $tanggal, $tampilLanding, $status, $id]);

            echo json_encode(['success' => true, 'message' => 'Berita berhasil diperbarui!']);
            exit;
        }

        if ($action === 'hapus') {
            $id = intval($_POST['id'] ?? 0);
            $stmt = $pdo->prepare("DELETE FROM berita WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Berita berhasil dihapus!']);
            exit;
        }

        if ($action === 'toggle_landing') {
            $id = intval($_POST['id'] ?? 0);
            $stmt = $pdo->prepare("UPDATE berita SET tampil_landing = IF(tampil_landing = 1, 0, 1) WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Status tayang landing page diubah!']);
            exit;
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        exit;
    }
}

// Fetch berita data
$beritaList = $pdo->query("SELECT * FROM berita ORDER BY tanggal DESC, id DESC")->fetchAll(PDO::FETCH_ASSOC);
$totalArtikel = count($beritaList);
$totalLanding = count(array_filter($beritaList, fn($b) => $b['tampil_landing'] == 1));
$totalPrestasi = count(array_filter($beritaList, fn($b) => strtolower($b['kategori']) === 'prestasi'));
$totalKerjasama = count(array_filter($beritaList, fn($b) => strtolower($b['kategori']) === 'kerjasama'));

$pageTitle = 'Kelola Berita & Warta - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-berita';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Kelola Berita &amp; Warta Sekolah</h1>
      <p class="page-subtitle">Publikasi warta prestasi, liputan kerjasama industri DUDI, agenda kegiatan, dan pengumuman resmi sekolah.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../informasi/berita.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Lihat Berita Web
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalTambahBerita">
        <i class="bi bi-plus-lg"></i> Tulis Berita Baru
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- QUICK STATS BAR -->
  <div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Artikel Berita</span>
          <div class="stat-icon-circle bg-success-subtle text-success">
            <i class="bi bi-newspaper"></i>
          </div>
        </div>
        <div class="stat-value text-success"><?= $totalArtikel ?> Artikel</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span>Terbit Sepanjang Tahun</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Tayang di Landing Page</span>
          <div class="stat-icon-circle bg-primary-subtle text-primary">
            <i class="bi bi-broadcast"></i>
          </div>
        </div>
        <div class="stat-value text-primary"><?= $totalLanding ?> Warta Utama</div>
        <div class="trend-badge text-primary">
          <i class="bi bi-star-fill"></i>
          <span>Highlight Beranda</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Liputan Prestasi</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-trophy-fill"></i>
          </div>
        </div>
        <div class="stat-value text-warning"><?= $totalPrestasi ?> Liputan</div>
        <div class="trend-badge text-warning">
          <i class="bi bi-award-fill"></i>
          <span>Kejuaraan Siswa &amp; Guru</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Warta Kemitraan DUDI</span>
          <div class="stat-icon-circle bg-info-subtle text-info">
            <i class="bi bi-buildings-fill"></i>
          </div>
        </div>
        <div class="stat-value text-info"><?= $totalKerjasama ?> Rilis Pers</div>
        <div class="trend-badge text-info">
          <i class="bi bi-hand-thumbs-up-fill"></i>
          <span>Link &amp; Match Industri</span>
        </div>
      </div>
    </div>
  </div>

  <!-- TABLE & LIST CARD -->
  <div class="table-card-custom mb-4">
    <!-- Header Control Bar -->
    <div class="table-header-control">
      <div class="table-search-box">
        <i class="bi bi-search table-search-icon"></i>
        <input type="text" class="table-search-input" id="searchBeritaInput" placeholder="Cari judul berita, kategori, atau topik..." onkeyup="filterBeritaTable()">
      </div>
      <div class="table-filter-group">
        <select class="form-select form-select-sm" id="filterKategoriSelect" onchange="filterBeritaTable()" style="width: auto;">
          <option value="" selected>Semua Kategori</option>
          <option value="PRESTASI">Prestasi</option>
          <option value="KERJASAMA">Kerjasama Industri</option>
          <option value="EVENT">Event &amp; Kegiatan</option>
          <option value="PENGUMUMAN">Pengumuman</option>
        </select>
        <button class="btn-table-action" type="button" onclick="filterBeritaTable()">
          <i class="bi bi-arrow-clockwise"></i> Segarkan
        </button>
      </div>
    </div>

    <!-- Table Responsive Wrapper -->
    <div class="table-responsive">
      <table class="table-custom" id="tableBeritaList">
        <thead>
          <tr>
            <th style="width: 80px;">Thumbnail</th>
            <th>Judul Berita &amp; Cuplikan Ringkas</th>
            <th>Kategori</th>
            <th>Tanggal Terbit</th>
            <th>Tayang Landing Page</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($beritaList)): ?>
            <?php foreach ($beritaList as $b): 
              $thumb = resolveBeritaImg($b['gambar']);
              $tglFormat = !empty($b['tanggal']) ? date('d F Y', strtotime($b['tanggal'])) : '-';
              $katClass = match(strtolower($b['kategori'])) {
                'prestasi' => 'bg-success-subtle text-success',
                'kerjasama' => 'bg-primary-subtle text-primary',
                'event' => 'bg-warning-subtle text-warning',
                default => 'bg-info-subtle text-info',
              };
            ?>
              <tr>
                <td style="width: 80px;">
                  <img src="<?= htmlspecialchars($thumb) ?>" alt="Thumbnail" class="rounded object-fit-cover border" style="width: 68px; height: 46px;" onerror="this.src='../images/gedung.jpg'">
                </td>
                <td class="table-cell-title text-wrap-cell">
                  <div class="fw-bold text-main mb-1"><?= htmlspecialchars($b['judul']) ?></div>
                  <div class="text-muted fs-xs" style="line-height: 1.45;"><?= htmlspecialchars($b['ringkasan']) ?></div>
                </td>
                <td><span class="badge <?= $katClass ?> fw-bold"><?= strtoupper(htmlspecialchars($b['kategori'])) ?></span></td>
                <td><?= htmlspecialchars($tglFormat) ?></td>
                <td>
                  <button type="button" class="btn btn-sm <?= $b['tampil_landing'] == 1 ? 'btn-success' : 'btn-outline-secondary' ?>" style="font-size:0.75rem; padding: 2px 8px;" onclick="toggleLandingBerita(<?= $b['id'] ?>)">
                    <i class="bi <?= $b['tampil_landing'] == 1 ? 'bi-check-circle me-1' : 'bi-dash-circle me-1' ?>"></i> <?= $b['tampil_landing'] == 1 ? 'Tampil' : 'Tidak' ?>
                  </button>
                </td>
                <td><span class="badge-table <?= $b['status'] === 'Publikasi' ? 'success' : 'warning' ?>"><?= htmlspecialchars($b['status']) ?></span></td>
                <td>
                  <div class="d-flex justify-content-center gap-1">
                    <a href="../informasi/berita.php" target="_blank" class="table-btn-action" title="Pratinjau"><i class="bi bi-eye"></i></a>
                    <button type="button" class="table-btn-action" title="Edit Berita" onclick='bukaEditBerita(<?= json_encode($b) ?>)'>
                      <i class="bi bi-pencil"></i>
                    </button>
                    <button type="button" class="table-btn-action delete" title="Hapus Berita" onclick="hapusBerita(<?= $b['id'] ?>, '<?= htmlspecialchars(addslashes($b['judul'])) ?>')">
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="7" class="text-center py-4 text-muted">Belum ada artikel berita yang tersedia.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- Table Pagination -->
    <div class="table-footer-control">
      <div class="table-pagination-info">
        Total <strong><?= $totalArtikel ?></strong> Artikel Berita Terdaftar di Database
      </div>
    </div>
  </div>
  <!-- END: table-card-custom -->

</div>
<!-- END: .main-wrapper -->

<!-- Modal Tambah Berita -->
<div class="modal fade" id="modalTambahBerita" tabindex="-1" aria-labelledby="modalTambahBeritaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTambahBeritaLabel">
          <i class="bi bi-newspaper text-success"></i> Tulis Publikasi Berita / Warta Baru
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahBerita" enctype="multipart/form-data">
          <input type="hidden" name="action" value="tambah">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label-custom" for="tambahJudulBerita">Judul Artikel Berita <span class="text-danger">*</span></label>
              <input type="text" class="form-control-custom" id="tambahJudulBerita" name="judul" placeholder="Contoh: Siswa SMKN 2 Karanganyar Raih Medali Emas LKS Tingkat Nasional 2026" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahKategoriBerita">Kategori Warta</label>
              <select class="form-select-custom" id="tambahKategoriBerita" name="kategori">
                <option value="Prestasi" selected>Prestasi &amp; Kejuaraan</option>
                <option value="Kerjasama">Kerjasama Industri (DUDI)</option>
                <option value="Event">Event &amp; Kegiatan Sekolah</option>
                <option value="Akademik">Akademik</option>
                <option value="Pengumuman">Pengumuman Resmi Sekolah</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahTanggalBerita">Tanggal Publikasi</label>
              <input type="date" class="form-control-custom" id="tambahTanggalBerita" name="tanggal" value="<?= date('Y-m-d') ?>">
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahGambarFile">Unggah File Gambar</label>
              <input type="file" class="form-control-custom" id="tambahGambarFile" name="gambar_file" accept="image/*">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahUrlGambar">Atau URL Gambar Web</label>
              <input type="text" class="form-control-custom" id="tambahUrlGambar" name="url_gambar" placeholder="https://...">
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahRingkasanBerita">Ringkasan Cuplikan (Lead/Snippet)</label>
              <textarea class="form-control-custom" id="tambahRingkasanBerita" name="ringkasan" rows="2" placeholder="Ringkasan 1-2 kalimat pengantar..."></textarea>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahKontenBerita">Isi Konten Artikel Lengkap</label>
              <textarea class="form-control-custom" id="tambahKontenBerita" name="konten" rows="5" placeholder="Tulis narasi berita lengkap, dokumentasi acara, kutipan narasumber..."></textarea>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahStatusBerita">Status Publikasi</label>
              <select class="form-select-custom" id="tambahStatusBerita" name="status">
                <option value="Publikasi" selected>Publikasi Langsung</option>
                <option value="Draft">Simpan Draft</option>
              </select>
            </div>

            <div class="col-md-6 d-flex align-items-center pt-3">
              <div class="form-switch-custom">
                <input class="form-switch-input-custom" type="checkbox" id="checkLandingBerita" name="tampil_landing" value="1" checked>
                <label class="form-label-custom mb-0" for="checkLandingBerita">Tampilkan di Highlight Landing Page</label>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanTambahBerita()">
          <i class="bi bi-send-fill"></i> Publikasikan Berita
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Berita -->
<div class="modal fade" id="modalEditBerita" tabindex="-1" aria-labelledby="modalEditBeritaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalEditBeritaLabel">
          <i class="bi bi-pencil-square text-success"></i> Edit Publikasi Berita
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditBerita" enctype="multipart/form-data">
          <input type="hidden" name="action" value="edit">
          <input type="hidden" id="editIdBerita" name="id">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label-custom" for="editJudulBerita">Judul Artikel Berita <span class="text-danger">*</span></label>
              <input type="text" class="form-control-custom" id="editJudulBerita" name="judul" required>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editKategoriBerita">Kategori Warta</label>
              <select class="form-select-custom" id="editKategoriBerita" name="kategori">
                <option value="Prestasi">Prestasi &amp; Kejuaraan</option>
                <option value="Kerjasama">Kerjasama Industri (DUDI)</option>
                <option value="Event">Event &amp; Kegiatan Sekolah</option>
                <option value="Akademik">Akademik</option>
                <option value="Pengumuman">Pengumuman Resmi Sekolah</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editTanggalBerita">Tanggal Publikasi</label>
              <input type="date" class="form-control-custom" id="editTanggalBerita" name="tanggal">
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="editGambarFile">Ganti File Gambar</label>
              <input type="file" class="form-control-custom" id="editGambarFile" name="gambar_file" accept="image/*">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editUrlGambar">Atau URL Gambar Web</label>
              <input type="text" class="form-control-custom" id="editUrlGambar" name="url_gambar">
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editRingkasanBerita">Ringkasan Cuplikan</label>
              <textarea class="form-control-custom" id="editRingkasanBerita" name="ringkasan" rows="3"></textarea>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editKontenBerita">Konten Artikel Lengkap</label>
              <textarea class="form-control-custom" id="editKontenBerita" name="konten" rows="5"></textarea>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="editStatusBerita">Status Publikasi</label>
              <select class="form-select-custom" id="editStatusBerita" name="status">
                <option value="Publikasi">Publikasi</option>
                <option value="Draft">Draft</option>
              </select>
            </div>

            <div class="col-md-6 d-flex align-items-center pt-3">
              <div class="form-switch-custom">
                <input class="form-switch-input-custom" type="checkbox" id="editCheckLandingBerita" name="tampil_landing" value="1">
                <label class="form-label-custom mb-0" for="editCheckLandingBerita">Tampilkan di Highlight Landing Page</label>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanEditBerita()">
          <i class="bi bi-save-fill"></i> Perbarui Berita
        </button>
      </div>
    </div>
  </div>
</div>

<script>
function bukaEditBerita(data) {
  document.getElementById('editIdBerita').value = data.id || '';
  document.getElementById('editJudulBerita').value = data.judul || '';
  document.getElementById('editKategoriBerita').value = data.kategori || 'Prestasi';
  document.getElementById('editTanggalBerita').value = data.tanggal || '';
  document.getElementById('editUrlGambar').value = (data.gambar && data.gambar.startsWith('http')) ? data.gambar : '';
  document.getElementById('editRingkasanBerita').value = data.ringkasan || '';
  document.getElementById('editKontenBerita').value = data.konten || '';
  document.getElementById('editStatusBerita').value = data.status || 'Publikasi';
  document.getElementById('editCheckLandingBerita').checked = (data.tampil_landing == 1);

  const modalEl = document.getElementById('modalEditBerita');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function simpanTambahBerita() {
  const form = document.getElementById('formTambahBerita');
  if (!form.judul.value.trim()) {
    alert('Silakan isi judul berita!');
    return;
  }
  const fd = new FormData(form);
  fetch('kelola-berita.php', { method: 'POST', body: fd })
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

function simpanEditBerita() {
  const form = document.getElementById('formEditBerita');
  if (!form.judul.value.trim()) {
    alert('Silakan isi judul berita!');
    return;
  }
  const fd = new FormData(form);
  fetch('kelola-berita.php', { method: 'POST', body: fd })
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

function hapusBerita(id, judul) {
  if (confirm('Hapus warta berita: "' + judul + '"?')) {
    const fd = new FormData();
    fd.append('action', 'hapus');
    fd.append('id', id);
    fetch('kelola-berita.php', { method: 'POST', body: fd })
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

function toggleLandingBerita(id) {
  const fd = new FormData();
  fd.append('action', 'toggle_landing');
  fd.append('id', id);
  fetch('kelola-berita.php', { method: 'POST', body: fd })
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

function filterBeritaTable() {
  const query = (document.getElementById('searchBeritaInput').value || '').toLowerCase();
  const filter = (document.getElementById('filterKategoriSelect').value || '').toLowerCase();
  const rows = document.querySelectorAll('#tableBeritaList tbody tr');

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
