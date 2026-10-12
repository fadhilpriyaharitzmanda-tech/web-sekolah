<?php
/**
 * Kelola Galeri Dokumentasi & Foto - Admin SMKN 2 Karanganyar
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
            $judul = trim($_POST['judul'] ?? '');
            $kategori = trim($_POST['kategori'] ?? 'kegiatan');
            $deskripsi = trim($_POST['deskripsi'] ?? '');
            $tanggal = !empty($_POST['tanggal']) ? $_POST['tanggal'] : date('Y-m-d');
            $tampil_landing = isset($_POST['tampil_landing']) && ($_POST['tampil_landing'] == '1' || $_POST['tampil_landing'] == 'on') ? 1 : 0;

            if (empty($judul)) {
                echo json_encode(['success' => false, 'message' => 'Judul dokumentasi foto wajib diisi!']);
                exit;
            }

            // Handle file upload
            $gambarPath = null;
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../uploads/galeri/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
                if (in_array($ext, $allowed)) {
                    $newFileName = 'galeri_' . time() . '_' . rand(100, 999) . '.' . $ext;
                    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadDir . $newFileName)) {
                        $gambarPath = 'uploads/galeri/' . $newFileName;
                    }
                }
            } elseif (!empty($_POST['gambar_url'])) {
                $gambarPath = trim($_POST['gambar_url']);
            }

            if ($action === 'tambah') {
                if (!$gambarPath) {
                    $gambarPath = 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=600&auto=format&fit=crop';
                }
                $stmt = $pdo->prepare("INSERT INTO galeri (judul, kategori, deskripsi, gambar, tanggal, tampil_landing, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
                $stmt->execute([$judul, $kategori, $deskripsi, $gambarPath, $tanggal, $tampil_landing]);
                echo json_encode(['success' => true, 'message' => 'Foto dokumentasi berhasil ditambahkan!']);
                exit;
            } else {
                if ($gambarPath) {
                    $stmt = $pdo->prepare("UPDATE galeri SET judul = ?, kategori = ?, deskripsi = ?, gambar = ?, tanggal = ?, tampil_landing = ? WHERE id = ?");
                    $stmt->execute([$judul, $kategori, $deskripsi, $gambarPath, $tanggal, $tampil_landing, $id]);
                } else {
                    $stmt = $pdo->prepare("UPDATE galeri SET judul = ?, kategori = ?, deskripsi = ?, tanggal = ?, tampil_landing = ? WHERE id = ?");
                    $stmt->execute([$judul, $kategori, $deskripsi, $tanggal, $tampil_landing, $id]);
                }
                echo json_encode(['success' => true, 'message' => 'Data dokumentasi berhasil diperbarui!']);
                exit;
            }
        }

        if ($action === 'hapus') {
            $id = (int)($_POST['id'] ?? 0);
            $stmt = $pdo->prepare("DELETE FROM galeri WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Foto dokumentasi berhasil dihapus!']);
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
$galeriList = [];
try {
    $stmt = $pdo->query("SELECT * FROM galeri ORDER BY tanggal DESC, id DESC");
    $galeriList = $stmt->fetchAll();
} catch (Exception $e) {
    //
}

$totalFoto = count($galeriList);
$uniqueKategori = count(array_unique(array_column($galeriList, 'kategori')));
$totalPrestasi = count(array_filter($galeriList, fn($g) => ($g['kategori'] ?? '') === 'prestasi' || ($g['kategori'] ?? '') === 'lks'));
$totalLanding = count(array_filter($galeriList, fn($g) => !empty($g['tampil_landing'])));

$pageTitle = 'Kelola Galeri - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-galeri';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Galeri Dokumentasi &amp; Foto</h1>
      <p class="page-subtitle">Unggah dokumentasi aktivitas belajar mengajar, workshop industri, perlombaan LKS, dan fasilitas sekolah.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../galeri/galeri.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Galeri Web
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalTambahGaleri">
        <i class="bi bi-plus-lg"></i> Tambah Foto &amp; Dokumentasi
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- REKAPITULASI QUICK STATS BAR -->
  <div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Foto Dokumentasi</span>
          <div class="stat-icon-circle bg-success-subtle text-success">
            <i class="bi bi-images"></i>
          </div>
        </div>
        <div class="stat-value text-success"><?= $totalFoto ?> Foto</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span>Tersimpan di Sistem</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Kategori Album</span>
          <div class="stat-icon-circle bg-primary-subtle text-primary">
            <i class="bi bi-collection-fill"></i>
          </div>
        </div>
        <div class="stat-value text-primary"><?= $uniqueKategori ?> Album</div>
        <div class="trend-badge text-primary">
          <i class="bi bi-folder-fill"></i>
          <span>Kategori Arsip Aktif</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Momen Prestasi LKS</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-trophy-fill"></i>
          </div>
        </div>
        <div class="stat-value text-warning"><?= $totalPrestasi ?> Arsip</div>
        <div class="trend-badge text-warning">
          <i class="bi bi-award-fill"></i>
          <span>Dokumentasi Kejuaraan</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Tampil di Landing Page</span>
          <div class="stat-icon-circle bg-info-subtle text-info">
            <i class="bi bi-eye-fill"></i>
          </div>
        </div>
        <div class="stat-value text-info"><?= $totalLanding ?> Foto</div>
        <div class="trend-badge text-info">
          <i class="bi bi-star-fill"></i>
          <span>Sorotan Utama Web</span>
        </div>
      </div>
    </div>
  </div>

  <!-- ALBUM FILTER BAR -->
  <div class="table-card-custom mb-4 p-3 d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div class="d-flex gap-2 flex-wrap" id="albumFilterGroup">
      <button type="button" class="btn btn-sm btn-success" onclick="filterGaleri('all', this)">Semua Album</button>
      <button type="button" class="btn btn-sm btn-outline-secondary" onclick="filterGaleri('akademik', this)">Akademik</button>
      <button type="button" class="btn btn-sm btn-outline-secondary" onclick="filterGaleri('prestasi', this)">Prestasi &amp; LKS</button>
      <button type="button" class="btn btn-sm btn-outline-secondary" onclick="filterGaleri('kegiatan', this)">Kegiatan &amp; Workshop</button>
      <button type="button" class="btn btn-sm btn-outline-secondary" onclick="filterGaleri('ekskul', this)">Ekstrakurikuler</button>
      <button type="button" class="btn btn-sm btn-outline-secondary" onclick="filterGaleri('fasilitas', this)">Fasilitas &amp; Lab</button>
    </div>
    <div class="table-search-box" style="max-width: 320px;">
      <i class="bi bi-search table-search-icon"></i>
      <input type="text" class="table-search-input" id="searchGaleriInput" placeholder="Cari judul dokumentasi..." onkeyup="searchGaleriCards()">
    </div>
  </div>

  <!-- GALLERY GRID -->
  <div class="row g-4 mb-4" id="galeriGridContainer">
    <?php if (!empty($galeriList)): ?>
      <?php foreach ($galeriList as $g): 
        $imgSrc = !empty($g['gambar']) ? (str_starts_with($g['gambar'], 'http') ? $g['gambar'] : '../' . $g['gambar']) : 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=600&auto=format&fit=crop';
        $tglFmt = !empty($g['tanggal']) ? date('d M Y', strtotime($g['tanggal'])) : '-';
        $kat = strtolower($g['kategori'] ?? 'kegiatan');
      ?>
      <div class="col-md-6 col-lg-4 galeri-card-item" data-category="<?= htmlspecialchars($kat) ?>" data-id="<?= $g['id'] ?>">
        <div class="card p-3 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.08) !important;">
          <div>
            <div class="rounded-3 overflow-hidden position-relative mb-3 border" style="height: 200px; background: #072f1f;">
              <img src="<?= htmlspecialchars($imgSrc) ?>" alt="<?= htmlspecialchars($g['judul']) ?>" class="w-100 h-100 object-fit-cover galeri-img" onerror="this.src='https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=600&auto=format&fit=crop'">
              <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-2 fw-semibold galeri-badge"><?= htmlspecialchars(ucfirst($g['kategori'])) ?></span>
            </div>
            <h6 class="fw-bold mb-1 text-main galeri-title" style="font-size: 1rem; line-height: 1.4;"><?= htmlspecialchars($g['judul']) ?></h6>
            <p class="text-muted fs-xs mb-3 galeri-desc"><?= htmlspecialchars($g['deskripsi'] ?? '') ?></p>
          </div>
          <div class="pt-3 border-top d-flex justify-content-between align-items-center">
            <span class="fs-xs text-muted galeri-date-display"><i class="bi bi-calendar3 me-1"></i> <?= $tglFmt ?></span>
            <div class="d-flex gap-2">
              <button type="button" class="btn btn-sm btn-outline-success d-flex align-items-center gap-1" onclick="editGaleri(<?= htmlspecialchars(json_encode($g)) ?>)">
                <i class="bi bi-pencil-square"></i> Edit
              </button>
              <button type="button" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1" onclick="hapusGaleri(<?= $g['id'] ?>, '<?= htmlspecialchars(addslashes($g['judul'])) ?>')">
                <i class="bi bi-trash3"></i> Hapus
              </button>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12 text-center py-5 text-muted">
        <i class="bi bi-images display-4 d-block mb-3 text-secondary"></i>
        <h5>Belum ada foto dokumentasi tersimpan</h5>
        <p>Klik tombol "Tambah Foto & Dokumentasi" di atas untuk menambahkan dokumentasi baru.</p>
      </div>
    <?php endif; ?>
  </div>

<!-- Modal Tambah Galeri -->
<div class="modal fade" id="modalTambahGaleri" tabindex="-1" aria-labelledby="modalTambahGaleriLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTambahGaleriLabel">
          <i class="bi bi-images text-success"></i> Tambah Foto &amp; Dokumentasi
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahGaleri" enctype="multipart/form-data">
          <input type="hidden" name="action" value="tambah">
          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label-custom">Judul Dokumentasi Foto</label>
              <input type="text" class="form-control-custom" name="judul" placeholder="Contoh: Praktik Pemesinan CNC Mahir Siswa TPM" required>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom">Kategori Album</label>
              <select class="form-select-custom" name="kategori">
                <option value="akademik">Akademik</option>
                <option value="prestasi">Prestasi &amp; LKS</option>
                <option value="kegiatan" selected>Kegiatan &amp; Workshop</option>
                <option value="ekskul">Ekstrakurikuler</option>
                <option value="fasilitas">Fasilitas &amp; Lab</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom">Unggah File Foto</label>
              <input type="file" class="form-control-custom" name="gambar" accept="image/*">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom">Atau Gunakan URL Gambar</label>
              <input type="url" class="form-control-custom" name="gambar_url" placeholder="https://...">
            </div>

            <div class="col-md-6">
              <label class="form-label-custom">Tanggal Dokumentasi</label>
              <input type="date" class="form-control-custom" name="tanggal" value="<?= date('Y-m-d') ?>">
            </div>
            <div class="col-md-6 d-flex align-items-center pt-3">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="tampil_landing" value="1" id="checkLandingGaleri" checked>
                <label class="form-check-label ms-2 fw-semibold" for="checkLandingGaleri">Tampilkan di Sorotan Landing Page</label>
              </div>
            </div>

            <div class="col-12">
              <label class="form-label-custom">Deskripsi Singkat / Keterangan</label>
              <textarea class="form-control-custom" name="deskripsi" rows="3" placeholder="Keterangan singkat momen dokumentasi..."></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanTambahGaleri()">
          <i class="bi bi-check-circle-fill"></i> Simpan Dokumentasi
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Galeri -->
<div class="modal fade" id="modalEditGaleri" tabindex="-1" aria-labelledby="modalEditGaleriLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalEditGaleriLabel">
          <i class="bi bi-pencil-square text-success"></i> Edit Foto Dokumentasi
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditGaleri" enctype="multipart/form-data">
          <input type="hidden" name="action" value="edit">
          <input type="hidden" name="id" id="editIdGaleri">
          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label-custom">Judul Dokumentasi Foto</label>
              <input type="text" class="form-control-custom" name="judul" id="editJudulGaleri" required>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom">Kategori Album</label>
              <select class="form-select-custom" name="kategori" id="editKategoriGaleri">
                <option value="akademik">Akademik</option>
                <option value="prestasi">Prestasi &amp; LKS</option>
                <option value="kegiatan">Kegiatan &amp; Workshop</option>
                <option value="ekskul">Ekstrakurikuler</option>
                <option value="fasilitas">Fasilitas &amp; Lab</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom">Ganti File Foto (Kosongkan jika tetap)</label>
              <input type="file" class="form-control-custom" name="gambar" accept="image/*">
            </div>
            <div class="col-md-6">
              <label class="form-label-custom">Atau Ganti URL Gambar</label>
              <input type="url" class="form-control-custom" name="gambar_url" id="editUrlGaleri">
            </div>

            <div class="col-md-6">
              <label class="form-label-custom">Tanggal Dokumentasi</label>
              <input type="date" class="form-control-custom" name="tanggal" id="editTanggalGaleri">
            </div>
            <div class="col-md-6 d-flex align-items-center pt-3">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="tampil_landing" value="1" id="editCheckLandingGaleri">
                <label class="form-check-label ms-2 fw-semibold" for="editCheckLandingGaleri">Tampilkan di Sorotan Landing Page</label>
              </div>
            </div>

            <div class="col-12">
              <label class="form-label-custom">Deskripsi Singkat</label>
              <textarea class="form-control-custom" name="deskripsi" id="editDeskripsiGaleri" rows="3"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanEditGaleri()">
          <i class="bi bi-save-fill"></i> Perbarui Dokumentasi
        </button>
      </div>
    </div>
  </div>
</div>

<script>
function editGaleri(data) {
  document.getElementById('editIdGaleri').value = data.id || '';
  document.getElementById('editJudulGaleri').value = data.judul || '';
  document.getElementById('editKategoriGaleri').value = data.kategori || 'kegiatan';
  document.getElementById('editTanggalGaleri').value = data.tanggal || '';
  document.getElementById('editDeskripsiGaleri').value = data.deskripsi || '';
  document.getElementById('editUrlGaleri').value = (data.gambar && data.gambar.startsWith('http')) ? data.gambar : '';
  document.getElementById('editCheckLandingGaleri').checked = (data.tampil_landing == 1);

  const modalEl = document.getElementById('modalEditGaleri');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function simpanTambahGaleri() {
  const form = document.getElementById('formTambahGaleri');
  if (!form.judul.value.trim()) {
    swalWarning('Judul dokumentasi wajib diisi!');
    return;
  }

  const formData = new FormData(form);
  fetch('kelola-galeri.php', { method: 'POST', body: formData })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      swalSuccess(data.message).then(() => location.reload());
    } else {
      swalError(data.message || 'Gagal menambahkan dokumentasi');
    }
  })
  .catch(err => swalError('Terjadi kesalahan jaringan: ' + err.message));
}

function simpanEditGaleri() {
  const form = document.getElementById('formEditGaleri');
  if (!form.judul.value.trim()) {
    swalWarning('Judul dokumentasi wajib diisi!');
    return;
  }

  const formData = new FormData(form);
  fetch('kelola-galeri.php', { method: 'POST', body: formData })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      swalSuccess(data.message).then(() => location.reload());
    } else {
      swalError(data.message || 'Gagal memperbarui dokumentasi');
    }
  })
  .catch(err => swalError('Terjadi kesalahan jaringan: ' + err.message));
}

function hapusGaleri(id, judul) {
  swalConfirm({
    title: 'Hapus Dokumentasi?',
    text: 'Apakah Anda yakin ingin menghapus foto dokumentasi "' + judul + '"? Tindakan ini tidak dapat dibatalkan.',
    confirmText: 'Iya, Hapus',
    cancelText: 'Tidak, Batal',
    isDanger: true
  }, () => {
    const formData = new FormData();
    formData.append('action', 'hapus');
    formData.append('id', id);

    fetch('kelola-galeri.php', { method: 'POST', body: formData })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        swalSuccess(data.message).then(() => location.reload());
      } else {
        swalError(data.message);
      }
    })
    .catch(() => swalError('Terjadi kesalahan jaringan.'));
  });
}

function filterGaleri(category, btn) {
  const buttons = document.querySelectorAll('#albumFilterGroup button');
  buttons.forEach(b => {
    b.classList.remove('btn-success');
    b.classList.add('btn-outline-secondary');
  });
  btn.classList.remove('btn-outline-secondary');
  btn.classList.add('btn-success');

  const cards = document.querySelectorAll('.galeri-card-item');
  cards.forEach(card => {
    const cat = (card.getAttribute('data-category') || '').toLowerCase();
    if (category === 'all' || cat === category) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
    }
  });
}

function searchGaleriCards() {
  const query = (document.getElementById('searchGaleriInput').value || '').toLowerCase();
  const cards = document.querySelectorAll('.galeri-card-item');

  cards.forEach(card => {
    const text = card.textContent.toLowerCase();
    if (!query || text.includes(query)) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
    }
  });
}
</script>

<?php include __DIR__ . '/components/footer.php'; ?>
