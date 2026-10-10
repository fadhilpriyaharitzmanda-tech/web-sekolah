<?php
/**
 * Kelola Hero & Banner Landing Page - Admin SMKN 2 Karanganyar
 * Manajemen slide carousel hero dan banner Call-To-Action (CTA) landing page.
 * Terintegrasi penuh dengan upload file local storage (`uploads/hero/`) dan MySQL.
 */
require_once __DIR__ . '/../config/database.php';
$pdo = getDbConnection();

// Pastikan folder uploads/hero/ tersedia
$uploadDir = __DIR__ . '/../uploads/hero/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Helper upload file gambar ke local storage
function uploadHeroImage($fileInputName, $existingPath = '') {
    if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]['error'] === UPLOAD_ERR_NO_FILE) {
        return $existingPath;
    }

    $file = $_FILES[$fileInputName];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("Gagal mengunggah file. Kode error: " . $file['error']);
    }

    // Validasi tipe mime
    $allowedMimes = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];
    $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($fileInfo, $file['tmp_name']);
    finfo_close($fileInfo);

    if (!in_array($mimeType, $allowedMimes)) {
        throw new Exception("Format file gambar tidak didukung! Harap unggah format JPG, PNG, atau WEBP.");
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $newFileName = 'hero_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    $targetPath = __DIR__ . '/../uploads/hero/' . $newFileName;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        throw new Exception("Gagal menyimpan file gambar ke server lokal.");
    }

    return 'uploads/hero/' . $newFileName;
}

// Helper resolusi URL gambar untuk tampilan Admin
function resolveAdminImg($path) {
    if (empty($path)) {
        return 'https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=600&auto=format&fit=crop';
    }
    if (strpos($path, 'http://') === 0 || strpos($path, 'https://') === 0) {
        return $path;
    }
    return '../' . ltrim($path, '/');
}

// ==========================================
// HANDLE BACKEND POST REQUESTS (AJAX CRUD)
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    $action = $_POST['action'] ?? '';

    try {
        // 1. TAMBAH SLIDE BARU (DENGAN FILE UPLOAD LOKAL)
        if ($action === 'tambah_slide') {
            $judul = trim($_POST['judul'] ?? '');
            $tagline = trim($_POST['tagline'] ?? '');
            $deskripsi = trim($_POST['deskripsi'] ?? '');
            $status = ($_POST['status'] ?? 'Aktif') === 'Nonaktif' ? 'Nonaktif' : 'Aktif';

            if (empty($judul) || empty($deskripsi)) {
                echo json_encode(['success' => false, 'message' => 'Judul dan deskripsi banner wajib diisi!']);
                exit;
            }

            if (!isset($_FILES['gambar_file']) || $_FILES['gambar_file']['error'] === UPLOAD_ERR_NO_FILE) {
                echo json_encode(['success' => false, 'message' => 'Harap pilih file gambar banner dari perangkat Anda!']);
                exit;
            }

            // Simpan gambar ke local storage
            $gambarPath = uploadHeroImage('gambar_file');

            // Default bawaan untuk tombol
            $tombol1_teks = 'Explore Programs';
            $tombol1_link = '#program';
            $tombol2_teks = 'About Us';
            $tombol2_link = '#profil';

            $maxUrutan = (int) $pdo->query("SELECT COALESCE(MAX(urutan), 0) FROM hero_banners")->fetchColumn();
            $urutan = $maxUrutan + 1;

            $stmt = $pdo->prepare("INSERT INTO hero_banners (judul, tagline, deskripsi, gambar, tombol1_teks, tombol1_link, tombol2_teks, tombol2_link, urutan, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$judul, $tagline, $deskripsi, $gambarPath, $tombol1_teks, $tombol1_link, $tombol2_teks, $tombol2_link, $urutan, $status]);

            echo json_encode([
                'success' => true,
                'message' => 'Slide baru berhasil disimpan dengan gambar lokal!',
                'id' => $pdo->lastInsertId()
            ]);
            exit;
        }

        // 2. EDIT SLIDE (UPLOAD FILE BARU ATAU PERTAHANKAN GAMBAR LAMA)
        if ($action === 'edit_slide') {
            $id = intval($_POST['id'] ?? 0);
            $judul = trim($_POST['judul'] ?? '');
            $tagline = trim($_POST['tagline'] ?? '');
            $deskripsi = trim($_POST['deskripsi'] ?? '');
            $existingGambar = trim($_POST['existing_gambar'] ?? '');
            $status = ($_POST['status'] ?? 'Aktif') === 'Nonaktif' ? 'Nonaktif' : 'Aktif';

            if (!$id || empty($judul) || empty($deskripsi)) {
                echo json_encode(['success' => false, 'message' => 'Judul dan deskripsi banner wajib diisi!']);
                exit;
            }

            // Jika ada file baru diupload, gunakan file baru; jika tidak, pakai file lama
            $gambarPath = uploadHeroImage('gambar_file', $existingGambar);

            $stmt = $pdo->prepare("UPDATE hero_banners SET judul = ?, tagline = ?, deskripsi = ?, gambar = ?, status = ? WHERE id = ?");
            $stmt->execute([$judul, $tagline, $deskripsi, $gambarPath, $status, $id]);

            echo json_encode([
                'success' => true,
                'message' => 'Slide banner berhasil diperbarui di database!'
            ]);
            exit;
        }

        // 3. HAPUS SLIDE
        if ($action === 'hapus_slide') {
            $id = intval($_POST['id'] ?? 0);
            if (!$id) {
                echo json_encode(['success' => false, 'message' => 'ID slide tidak valid!']);
                exit;
            }

            // Ambil path gambar jika ingin dibersihkan dari local storage
            $stmtGet = $pdo->prepare("SELECT gambar FROM hero_banners WHERE id = ?");
            $stmtGet->execute([$id]);
            $gambarPath = $stmtGet->fetchColumn();

            if ($gambarPath && strpos($gambarPath, 'uploads/hero/') === 0) {
                $realFilePath = __DIR__ . '/../' . $gambarPath;
                if (file_exists($realFilePath)) {
                    @unlink($realFilePath);
                }
            }

            $stmt = $pdo->prepare("DELETE FROM hero_banners WHERE id = ?");
            $stmt->execute([$id]);

            echo json_encode([
                'success' => true,
                'message' => 'Slide banner berhasil dihapus dari database!'
            ]);
            exit;
        }

        // 4. EDIT CTA BANNER
        if ($action === 'edit_cta') {
            $judul = trim($_POST['judul'] ?? '');
            $deskripsi = trim($_POST['deskripsi'] ?? '');
            $tombol1_teks = trim($_POST['tombol1_teks'] ?? '');
            $tombol1_link = trim($_POST['tombol1_link'] ?? '');
            $tombol2_teks = trim($_POST['tombol2_teks'] ?? '');
            $tombol2_link = trim($_POST['tombol2_link'] ?? '');

            if (empty($judul) || empty($deskripsi)) {
                echo json_encode(['success' => false, 'message' => 'Judul dan deskripsi banner CTA wajib diisi!']);
                exit;
            }

            $existingId = $pdo->query("SELECT id FROM cta_banners LIMIT 1")->fetchColumn();
            if ($existingId) {
                $stmt = $pdo->prepare("UPDATE cta_banners SET judul = ?, deskripsi = ?, tombol1_teks = ?, tombol1_link = ?, tombol2_teks = ?, tombol2_link = ? WHERE id = ?");
                $stmt->execute([$judul, $deskripsi, $tombol1_teks, $tombol1_link, $tombol2_teks, $tombol2_link, $existingId]);
            } else {
                $stmt = $pdo->prepare("INSERT INTO cta_banners (judul, deskripsi, tombol1_teks, tombol1_link, tombol2_teks, tombol2_link) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$judul, $deskripsi, $tombol1_teks, $tombol1_link, $tombol2_teks, $tombol2_link]);
            }

            echo json_encode([
                'success' => true,
                'message' => 'Konten Banner Call-To-Action (CTA) berhasil disimpan!'
            ]);
            exit;
        }

        echo json_encode(['success' => false, 'message' => 'Aksi tidak dikenali!']);
        exit;

    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        exit;
    }
}

// ==========================================
// GET DATA FOR PAGE DISPLAY
// ==========================================
try {
    $slides = $pdo->query("SELECT * FROM hero_banners ORDER BY urutan ASC, id ASC")->fetchAll(PDO::FETCH_ASSOC);
    $cta = $pdo->query("SELECT * FROM cta_banners LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    if (!$cta) {
        $cta = [
            'judul' => 'Siap Meniti Karir Masa Depan?',
            'deskripsi' => 'Daftarkan diri Anda sekarang dan bergabunglah dengan ribuan alumni sukses yang telah berkarir di berbagai industri nasional dan internasional.',
            'tombol1_teks' => 'Daftar SPMB 2026/2027',
            'tombol1_link' => 'layanan/ppdb.php',
            'tombol2_teks' => 'Download Brosur',
            'tombol2_link' => 'assets/brosur-smkn2kra.pdf'
        ];
    }
} catch (Exception $e) {
    $slides = [];
    $cta = null;
}

$pageTitle = 'Kelola Hero & Banner - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-hero';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Kelola Hero &amp; Banner</h1>
      <p class="page-subtitle">Atur konten slide banner utama dan teks CTA yang tampil di landing page website.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../index.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Preview Landing Page
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="bukaModalTambahSlide()">
        <i class="bi bi-plus-lg"></i> Tambah Slide Baru
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- NAV TABS -->
  <ul class="nav nav-pills mb-4" id="heroTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="slides-tab" data-bs-toggle="pill" data-bs-target="#tab-slides" type="button" role="tab">
        <i class="bi bi-images me-1"></i> Slide Carousel Banner (<?= count($slides) ?>)
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="cta-tab" data-bs-toggle="pill" data-bs-target="#tab-cta" type="button" role="tab">
        <i class="bi bi-megaphone-fill me-1"></i> Banner Call-To-Action (CTA)
      </button>
    </li>
  </ul>

  <div class="tab-content" id="heroTabContent">
    <!-- TAB 1: SLIDES CAROUSEL -->
    <div class="tab-pane fade show active" id="tab-slides" role="tabpanel">
      <div class="mb-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
          <h5 class="fw-bold mb-1">Daftar Banner Slider (Hero Carousel)</h5>
          <p class="text-muted fs-xs mb-0">Foto banner tersimpan di server lokal. Tombol aksi beranda menggunakan default bawaan tema.</p>
        </div>
      </div>

      <div class="row g-4" id="slidesGridContainer">
        <?php if (!empty($slides)): ?>
          <?php foreach ($slides as $index => $slide): 
            $slideNum = $index + 1;
            $isMain = ($index === 0);
            $isAktif = ($slide['status'] === 'Aktif');
            $adminImgSrc = resolveAdminImg($slide['gambar']);
          ?>
          <!-- Slide Card Box -->
          <div class="col-md-6 col-lg-4 slide-card-col" id="slide-box-<?= $slide['id'] ?>"
               data-id="<?= $slide['id'] ?>"
               data-slide-id="<?= $slideNum ?>"
               data-badge="Slide #<?= $slideNum ?><?= $isMain ? ' (Utama)' : '' ?>"
               data-tagline="<?= htmlspecialchars($slide['tagline'] ?? '') ?>"
               data-judul="<?= htmlspecialchars($slide['judul']) ?>"
               data-deskripsi="<?= htmlspecialchars($slide['deskripsi']) ?>"
               data-image="<?= htmlspecialchars($slide['gambar']) ?>"
               data-image-preview="<?= htmlspecialchars($adminImgSrc) ?>"
               data-status="<?= htmlspecialchars($slide['status']) ?>">
            <div class="card p-3 p-md-4 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.08) !important;">
              <!-- FOTO IMAGE -->
              <div class="position-relative rounded-3 overflow-hidden mb-3" style="height: 210px; background: #072f1f;">
                <img src="<?= htmlspecialchars($adminImgSrc) ?>"
                     alt="<?= htmlspecialchars($slide['judul']) ?>"
                     class="w-100 h-100 object-fit-cover slide-preview-img"
                     onerror="this.onerror=null; this.src='../images/gedung.jpg'">
                <span class="badge bg-dark bg-opacity-75 position-absolute top-0 start-0 m-3 fw-semibold slide-badge-pill">Slide #<?= $slideNum ?><?= $isMain ? ' (Utama)' : '' ?></span>
                <span class="badge <?= $isAktif ? 'bg-success' : 'bg-secondary' ?> position-absolute top-0 end-0 m-3 fw-semibold slide-status-pill">
                  <i class="bi <?= $isAktif ? 'bi-check-circle-fill' : 'bi-slash-circle' ?> me-1"></i> <?= htmlspecialchars($slide['status']) ?>
                </span>
                <?php if (!empty($slide['tagline'])): ?>
                <div class="position-absolute bottom-0 start-0 p-2.5 px-3 text-white fs-xs w-100" style="background: linear-gradient(180deg, transparent, rgba(0,0,0,0.85));">
                  <i class="bi bi-tag-fill me-1 text-warning"></i> <span class="slide-tagline-text"><?= htmlspecialchars($slide['tagline']) ?></span>
                </div>
                <?php endif; ?>
              </div>

              <!-- JUDUL & DESKRIPSI -->
              <div class="d-flex flex-column justify-content-between flex-grow-1">
                <div class="mb-3">
                  <h5 class="fw-bold mb-2 text-main slide-judul-text" style="font-size: 1.15rem; line-height: 1.4;"><?= htmlspecialchars($slide['judul']) ?></h5>
                  <p class="text-muted fs-sm mb-0 slide-deskripsi-text" style="line-height: 1.6;"><?= htmlspecialchars($slide['deskripsi']) ?></p>
                </div>

                <!-- EDIT & HAPUS MODAL TRIGGER BUTTONS -->
                <div class="pt-3 border-top d-flex justify-content-between align-items-center gap-2">
                  <span class="fs-xs text-muted"><i class="bi bi-images me-1"></i> Hero Banner</span>
                  <div class="d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-outline-success d-flex align-items-center gap-1.5 px-3" onclick="bukaModalEditSlide('slide-box-<?= $slide['id'] ?>')">
                      <i class="bi bi-pencil-square"></i> Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1.5 px-3" onclick="bukaModalHapusSlide('slide-box-<?= $slide['id'] ?>')">
                      <i class="bi bi-trash3"></i> Hapus
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 text-center py-5">
            <div class="text-muted fs-5 mb-3">Belum ada slide banner di database.</div>
            <button class="btn btn-success btn-sm" onclick="bukaModalTambahSlide()"><i class="bi bi-plus-lg me-1"></i> Tambah Slide Pertama</button>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- TAB 2: CTA SECTION -->
    <div class="tab-pane fade" id="tab-cta" role="tabpanel">
      <div class="card p-4 shadow-sm border-0" style="border-radius: var(--radius-xl);">
        <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom flex-wrap gap-2">
          <div>
            <h5 class="fw-bold mb-1">Banner Call-To-Action (Bagian Bawah Landing Page)</h5>
            <p class="text-muted fs-xs mb-0">Banner penutup di beranda untuk mengajak calon siswa mendaftar atau mengunduh brosur informasi.</p>
          </div>
          <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-1" onclick="bukaModalEditCta()">
            <i class="bi bi-pencil-square"></i> Edit Banner CTA
          </button>
        </div>

        <!-- Preview Box CTA -->
        <div class="p-4 rounded-3 text-white" id="cta-preview-box" style="background: linear-gradient(135deg, #072F1F 0%, #0D4E35 100%);">
          <div class="row align-items-center g-3">
            <div class="col-lg-8">
              <span class="badge bg-warning text-dark fw-bold mb-2">AJAKAN PENDAFTARAN</span>
              <h4 class="fw-bold mb-2 text-white" id="cta-display-judul"><?= htmlspecialchars($cta['judul'] ?? 'Siap Meniti Karir Masa Depan?') ?></h4>
              <p class="text-white-50 mb-0 fs-sm" id="cta-display-desc"><?= htmlspecialchars($cta['deskripsi'] ?? 'Daftarkan diri Anda sekarang dan bergabunglah dengan ribuan alumni sukses yang telah berkarir di berbagai industri nasional dan internasional.') ?></p>
            </div>
            <div class="col-lg-4 d-flex flex-column flex-sm-row gap-2 justify-content-lg-end">
              <button class="btn btn-light fw-bold btn-sm px-3" id="cta-display-btn1"><?= htmlspecialchars($cta['tombol1_teks'] ?? 'Daftar SPMB 2026/2027') ?></button>
              <button class="btn btn-outline-light btn-sm px-3" id="cta-display-btn2"><?= htmlspecialchars($cta['tombol2_teks'] ?? 'Download Brosur') ?></button>
            </div>
          </div>
        </div>

        <input type="hidden" id="cta-val-btn1-link" value="<?= htmlspecialchars($cta['tombol1_link'] ?? 'layanan/ppdb.php') ?>">
        <input type="hidden" id="cta-val-btn2-link" value="<?= htmlspecialchars($cta['tombol2_link'] ?? 'assets/brosur-smkn2kra.pdf') ?>">
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/components/footer.php'; ?>
</div>

<!-- ==========================================
     MODALS SECTION
     ========================================== -->

<!-- 1. MODAL EDIT SLIDE (UPLOAD FILE LOKAL) -->
<div class="modal fade" id="modalEditSlide" tabindex="-1" aria-labelledby="modalEditSlideLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalEditSlideLabel">
          <i class="bi bi-pencil-square text-success"></i> Edit Slide Hero / Banner
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditSlide" enctype="multipart/form-data">
          <input type="hidden" id="editSlideId">
          <input type="hidden" id="editSlideTargetCardId">
          <input type="hidden" id="editSlideExistingImage">

          <!-- Thumbnail Image Preview -->
          <div class="mb-3 p-2 border rounded-3 bg-light text-center">
            <div class="position-relative overflow-hidden rounded-2 mb-2" style="height: 180px; background: #072F1F;">
              <img id="editSlidePreviewThumb" src="" alt="Preview" class="w-100 h-100 object-fit-cover" onerror="this.onerror=null; this.src='../images/gedung.jpg'">
            </div>
            <div class="fs-xs text-muted" id="editSlideImageStatusText">Pratinjau Foto Banner Saat Ini</div>
          </div>

          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label-custom" for="editSlideJudul">Judul Utama Slide</label>
              <input type="text" class="form-control-custom fw-bold" id="editSlideJudul" required>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="editSlideStatus">Status Slide</label>
              <select class="form-select-custom" id="editSlideStatus">
                <option value="Aktif">Aktif (Tampil di Beranda)</option>
                <option value="Nonaktif">Nonaktif (Disembunyikan)</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editSlideTagline">Tagline Label (Sub-Heading)</label>
              <input type="text" class="form-control-custom" id="editSlideTagline" placeholder="Contoh: Growth & Precision">
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editSlideDeskripsi">Deskripsi Singkat</label>
              <textarea class="form-control-custom" id="editSlideDeskripsi" rows="3" required></textarea>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editSlideFile">Upload Foto Banner Baru (Local Storage)</label>
              <div class="input-group">
                <input type="file" class="form-control" id="editSlideFile" name="gambar_file" accept="image/png, image/jpeg, image/webp" onchange="previewUpload(this, 'editSlidePreviewThumb', 'editSlideImageStatusText')">
                <button type="button" class="btn btn-outline-secondary" onclick="resetEditFilePreview()">Batal Pilih</button>
              </div>
              <div class="form-text fs-xs text-muted">Biarkan kosong jika tidak ingin mengganti foto banner saat ini. Format: JPG, PNG, WEBP (rasio 16:9 disarankan).</div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" id="btnSimpanEditSlide" onclick="simpanEditSlide()">
          <i class="bi bi-check-circle-fill"></i> Simpan Perubahan
        </button>
      </div>
    </div>
  </div>
</div>

<!-- 2. MODAL TAMBAH SLIDE (UPLOAD FILE LOKAL) -->
<div class="modal fade" id="modalTambahSlide" tabindex="-1" aria-labelledby="modalTambahSlideLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTambahSlideLabel">
          <i class="bi bi-plus-circle-fill text-success"></i> Tambah Slide Banner Baru
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahSlide" enctype="multipart/form-data">
          <!-- Thumbnail Image Preview -->
          <div class="mb-3 p-2 border rounded-3 bg-light text-center" id="tambahSlidePreviewBox" style="display: none;">
            <div class="position-relative overflow-hidden rounded-2 mb-2" style="height: 180px; background: #072F1F;">
              <img id="tambahSlidePreview" src="" alt="Preview Upload" class="w-100 h-100 object-fit-cover">
            </div>
            <div class="fs-xs text-success fw-semibold"><i class="bi bi-check-circle me-1"></i> File foto siap diunggah</div>
          </div>

          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label-custom" for="tambahSlideJudul">Judul Utama Slide</label>
              <input type="text" class="form-control-custom fw-bold" id="tambahSlideJudul" placeholder="Contoh: Sambut Generasi Digital Masa Depan" required>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="tambahSlideStatus">Status</label>
              <select class="form-select-custom" id="tambahSlideStatus">
                <option value="Aktif" selected>Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahSlideTagline">Tagline Label (Sub-Heading)</label>
              <input type="text" class="form-control-custom" id="tambahSlideTagline" placeholder="Contoh: Unggul, Mandiri, Berkarakter">
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahSlideDeskripsi">Deskripsi Singkat</label>
              <textarea class="form-control-custom" id="tambahSlideDeskripsi" rows="3" placeholder="Tulis deskripsi 1-2 kalimat pengantar pada banner hero..." required></textarea>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahSlideFile">Upload Foto Banner (Pilih dari Perangkat)</label>
              <input type="file" class="form-control" id="tambahSlideFile" name="gambar_file" accept="image/png, image/jpeg, image/webp" onchange="previewTambahUpload(this)" required>
              <div class="form-text fs-xs text-muted">File akan disimpan otomatis ke local storage (<code>uploads/hero/</code>). Format didukung: JPG, PNG, WEBP.</div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" id="btnSimpanTambahSlide" onclick="simpanTambahSlide()">
          <i class="bi bi-check-circle-fill"></i> Tambahkan Slide
        </button>
      </div>
    </div>
  </div>
</div>

<!-- 3. MODAL HAPUS SLIDE -->
<div class="modal fade" id="modalHapusSlide" tabindex="-1" aria-labelledby="modalHapusSlideLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-danger" id="modalHapusSlideLabel">
          <i class="bi bi-exclamation-triangle-fill me-2"></i> Konfirmasi Hapus Slide
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-3">
        <input type="hidden" id="hapusSlideId">
        <input type="hidden" id="hapusSlideTargetCardId">
        <p class="mb-1">Apakah Anda yakin ingin menghapus slide <strong id="hapusSlideJudulText"></strong> dari Carousel Banner?</p>
        <div class="text-muted fs-xs">Slide dan file gambarnya akan dihapus dari server dan database.</div>
      </div>
      <div class="modal-footer border-0 pt-0">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger btn-sm" id="btnKonfirmasiHapusSlide" onclick="konfirmasiHapusSlide()">
          <i class="bi bi-trash3-fill me-1"></i> Hapus Slide
        </button>
      </div>
    </div>
  </div>
</div>

<!-- 4. MODAL EDIT CTA BANNER -->
<div class="modal fade" id="modalEditCta" tabindex="-1" aria-labelledby="modalEditCtaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalEditCtaLabel">
          <i class="bi bi-pencil-square text-success"></i> Edit Banner Call-To-Action (CTA)
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditCta">
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label-custom" for="editCtaJudul">Judul Banner CTA</label>
              <input type="text" class="form-control-custom fw-bold" id="editCtaJudul" value="<?= htmlspecialchars($cta['judul'] ?? 'Siap Meniti Karir Masa Depan?') ?>" required>
            </div>
            <div class="col-12">
              <label class="form-label-custom" for="editCtaDeskripsi">Deskripsi Kalimat Ajakan</label>
              <textarea class="form-control-custom" id="editCtaDeskripsi" rows="3" required><?= htmlspecialchars($cta['deskripsi'] ?? '') ?></textarea>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editCtaBtn1Text">Label Tombol Utama</label>
              <input type="text" class="form-control-custom" id="editCtaBtn1Text" value="<?= htmlspecialchars($cta['tombol1_teks'] ?? 'Daftar SPMB 2026/2027') ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editCtaBtn1Link">Link Tombol Utama</label>
              <input type="text" class="form-control-custom" id="editCtaBtn1Link" value="<?= htmlspecialchars($cta['tombol1_link'] ?? 'layanan/ppdb.php') ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editCtaBtn2Text">Label Tombol Sekunder</label>
              <input type="text" class="form-control-custom" id="editCtaBtn2Text" value="<?= htmlspecialchars($cta['tombol2_teks'] ?? 'Download Brosur') ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editCtaBtn2Link">Target File / Link Brosur</label>
              <input type="text" class="form-control-custom" id="editCtaBtn2Link" value="<?= htmlspecialchars($cta['tombol2_link'] ?? 'assets/brosur-smkn2kra.pdf') ?>">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm" id="btnSimpanCta" onclick="simpanEditCta()">
          <i class="bi bi-check-circle-fill"></i> Simpan Banner CTA
        </button>
      </div>
    </div>
  </div>
</div>

<script>
// Preview Upload Helper
function previewUpload(input, imgElementId, statusTextId) {
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById(imgElementId).src = e.target.result;
      if (statusTextId) {
        document.getElementById(statusTextId).innerHTML = '<span class="text-success fw-bold"><i class="bi bi-check-circle me-1"></i> File baru terpilih (' + input.files[0].name + ')</span>';
      }
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function resetEditFilePreview() {
  const fileInput = document.getElementById('editSlideFile');
  fileInput.value = '';
  const currentSrc = document.getElementById('editSlideExistingImage').dataset.preview || '';
  document.getElementById('editSlidePreviewThumb').src = currentSrc;
  document.getElementById('editSlideImageStatusText').textContent = 'Pratinjau Foto Banner Saat Ini';
}

function previewTambahUpload(input) {
  const box = document.getElementById('tambahSlidePreviewBox');
  if (input.files && input.files[0]) {
    box.style.display = 'block';
    previewUpload(input, 'tambahSlidePreview');
  } else {
    box.style.display = 'none';
  }
}

// Buka Modal Edit Slide
function bukaModalEditSlide(cardId) {
  const card = document.getElementById(cardId);
  if (!card) return;

  const dataset = card.dataset;
  document.getElementById('editSlideId').value = dataset.id || '';
  document.getElementById('editSlideTargetCardId').value = cardId;
  document.getElementById('editSlideJudul').value = dataset.judul || '';
  document.getElementById('editSlideTagline').value = dataset.tagline || '';
  document.getElementById('editSlideDeskripsi').value = dataset.deskripsi || '';
  document.getElementById('editSlideStatus').value = dataset.status || 'Aktif';

  const previewSrc = dataset.imagePreview || dataset.image || '';
  document.getElementById('editSlideExistingImage').value = dataset.image || '';
  document.getElementById('editSlideExistingImage').dataset.preview = previewSrc;
  document.getElementById('editSlidePreviewThumb').src = previewSrc;
  document.getElementById('editSlideFile').value = '';
  document.getElementById('editSlideImageStatusText').textContent = 'Pratinjau Foto Banner Saat Ini';

  const modalEl = document.getElementById('modalEditSlide');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

// Simpan Perubahan Edit Slide via AJAX POST
function simpanEditSlide() {
  const slideId = document.getElementById('editSlideId').value;
  const judul = document.getElementById('editSlideJudul').value.trim();
  const tagline = document.getElementById('editSlideTagline').value.trim();
  const deskripsi = document.getElementById('editSlideDeskripsi').value.trim();
  const existingGambar = document.getElementById('editSlideExistingImage').value.trim();
  const status = document.getElementById('editSlideStatus').value;
  const fileInput = document.getElementById('editSlideFile');

  if (!judul || !deskripsi) {
    alert('Judul dan deskripsi banner wajib diisi!');
    return;
  }

  const btn = document.getElementById('btnSimpanEditSlide');
  btn.disabled = true;
  btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Menyimpan...';

  const formData = new FormData();
  formData.append('action', 'edit_slide');
  formData.append('id', slideId);
  formData.append('judul', judul);
  formData.append('tagline', tagline);
  formData.append('deskripsi', deskripsi);
  formData.append('existing_gambar', existingGambar);
  formData.append('status', status);

  if (fileInput.files && fileInput.files[0]) {
    formData.append('gambar_file', fileInput.files[0]);
  }

  fetch('kelola-hero.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    btn.disabled = false;
    btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Simpan Perubahan';
    if (data.success) {
      alert(data.message);
      location.reload();
    } else {
      alert(data.message || 'Gagal menyimpan perubahan');
    }
  })
  .catch(err => {
    btn.disabled = false;
    btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Simpan Perubahan';
    alert('Terjadi kesalahan koneksi server: ' + err.message);
  });
}

// Buka Modal Hapus Slide
function bukaModalHapusSlide(cardId) {
  const card = document.getElementById(cardId);
  if (!card) return;

  const dataset = card.dataset;
  const judul = dataset.judul || 'Slide Banner';
  document.getElementById('hapusSlideId').value = dataset.id || '';
  document.getElementById('hapusSlideTargetCardId').value = cardId;
  document.getElementById('hapusSlideJudulText').textContent = judul;

  const modalEl = document.getElementById('modalHapusSlide');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

// Konfirmasi Hapus Slide via AJAX POST
function konfirmasiHapusSlide() {
  const slideId = document.getElementById('hapusSlideId').value;
  const btn = document.getElementById('btnKonfirmasiHapusSlide');
  btn.disabled = true;
  btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Menghapus...';

  const formData = new FormData();
  formData.append('action', 'hapus_slide');
  formData.append('id', slideId);

  fetch('kelola-hero.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    btn.disabled = false;
    btn.innerHTML = '<i class="bi bi-trash3-fill me-1"></i> Hapus Slide';
    if (data.success) {
      const modalEl = document.getElementById('modalHapusSlide');
      const modal = bootstrap.Modal.getInstance(modalEl);
      if (modal) modal.hide();
      alert(data.message);
      location.reload();
    } else {
      alert(data.message || 'Gagal menghapus slide');
    }
  })
  .catch(err => {
    btn.disabled = false;
    btn.innerHTML = '<i class="bi bi-trash3-fill me-1"></i> Hapus Slide';
    alert('Terjadi kesalahan: ' + err.message);
  });
}

// Buka Modal Tambah Slide
function bukaModalTambahSlide() {
  document.getElementById('formTambahSlide').reset();
  document.getElementById('tambahSlidePreviewBox').style.display = 'none';
  const modalEl = document.getElementById('modalTambahSlide');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

// Simpan Tambah Slide Baru via AJAX POST
function simpanTambahSlide() {
  const judul = document.getElementById('tambahSlideJudul').value.trim();
  const tagline = document.getElementById('tambahSlideTagline').value.trim() || 'SMKN 2 Karanganyar';
  const deskripsi = document.getElementById('tambahSlideDeskripsi').value.trim();
  const status = document.getElementById('tambahSlideStatus').value;
  const fileInput = document.getElementById('tambahSlideFile');

  if (!judul || !deskripsi) {
    alert('Judul dan deskripsi banner wajib diisi!');
    return;
  }

  if (!fileInput.files || !fileInput.files[0]) {
    alert('Harap pilih file foto banner dari perangkat Anda!');
    return;
  }

  const btn = document.getElementById('btnSimpanTambahSlide');
  btn.disabled = true;
  btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Mengunggah...';

  const formData = new FormData();
  formData.append('action', 'tambah_slide');
  formData.append('judul', judul);
  formData.append('tagline', tagline);
  formData.append('deskripsi', deskripsi);
  formData.append('status', status);
  formData.append('gambar_file', fileInput.files[0]);

  fetch('kelola-hero.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    btn.disabled = false;
    btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Tambahkan Slide';
    if (data.success) {
      alert(data.message);
      location.reload();
    } else {
      alert(data.message || 'Gagal menambahkan slide');
    }
  })
  .catch(err => {
    btn.disabled = false;
    btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Tambahkan Slide';
    alert('Terjadi kesalahan: ' + err.message);
  });
}

// Buka Modal Edit CTA
function bukaModalEditCta() {
  const currentJudul = document.getElementById('cta-display-judul').textContent.trim();
  const currentDesc = document.getElementById('cta-display-desc').textContent.trim();
  const currentBtn1 = document.getElementById('cta-display-btn1').textContent.trim();
  const currentBtn2 = document.getElementById('cta-display-btn2').textContent.trim();
  const currentBtn1Link = document.getElementById('cta-val-btn1-link').value.trim();
  const currentBtn2Link = document.getElementById('cta-val-btn2-link').value.trim();

  document.getElementById('editCtaJudul').value = currentJudul;
  document.getElementById('editCtaDeskripsi').value = currentDesc;
  document.getElementById('editCtaBtn1Text').value = currentBtn1;
  document.getElementById('editCtaBtn1Link').value = currentBtn1Link;
  document.getElementById('editCtaBtn2Text').value = currentBtn2;
  document.getElementById('editCtaBtn2Link').value = currentBtn2Link;

  const modalEl = document.getElementById('modalEditCta');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

// Simpan Edit CTA via AJAX POST
function simpanEditCta() {
  const judul = document.getElementById('editCtaJudul').value.trim();
  const desc = document.getElementById('editCtaDeskripsi').value.trim();
  const btn1 = document.getElementById('editCtaBtn1Text').value.trim();
  const btn1Link = document.getElementById('editCtaBtn1Link').value.trim();
  const btn2 = document.getElementById('editCtaBtn2Text').value.trim();
  const btn2Link = document.getElementById('editCtaBtn2Link').value.trim();

  if (!judul || !desc) {
    alert('Judul banner dan deskripsi kalimat ajakan wajib diisi!');
    return;
  }

  const btn = document.getElementById('btnSimpanCta');
  btn.disabled = true;
  btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Menyimpan...';

  const formData = new FormData();
  formData.append('action', 'edit_cta');
  formData.append('judul', judul);
  formData.append('deskripsi', desc);
  formData.append('tombol1_teks', btn1);
  formData.append('tombol1_link', btn1Link);
  formData.append('tombol2_teks', btn2);
  formData.append('tombol2_link', btn2Link);

  fetch('kelola-hero.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    btn.disabled = false;
    btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Simpan Banner CTA';
    if (data.success) {
      alert(data.message);
      location.reload();
    } else {
      alert(data.message || 'Gagal menyimpan CTA');
    }
  })
  .catch(err => {
    btn.disabled = false;
    btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Simpan Banner CTA';
    alert('Terjadi kesalahan: ' + err.message);
  });
}
</script>
