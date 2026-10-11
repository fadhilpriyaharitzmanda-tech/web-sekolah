<?php
/**
 * Kelola Prestasi & Ekstrakurikuler Kesiswaan - Admin SMKN 2 Karanganyar
 * Native PHP Implementation (PDO)
 */
require_once __DIR__ . '/../config/database.php';
$pdo = getDbConnection();

// HANDLE AJAX POST REQUESTS
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    $action = $_POST['action'] ?? '';

    try {
        // --- PRESTASI ACTIONS ---
        if ($action === 'tambah_prestasi' || $action === 'edit_prestasi') {
            $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
            $judul = trim($_POST['judul'] ?? '');
            $tingkat = trim($_POST['tingkat'] ?? 'Provinsi');
            $peringkat = trim($_POST['peringkat'] ?? 'Juara 1');
            $nama_peraih = trim($_POST['nama_peraih'] ?? '');
            $kelas_jurusan = trim($_POST['kelas_jurusan'] ?? '');
            $tahun = !empty($_POST['tahun']) ? (int)$_POST['tahun'] : (int)date('Y');
            $penyelenggara = trim($_POST['penyelenggara'] ?? 'Kemendikbudristek');

            if (empty($judul) || empty($nama_peraih)) {
                echo json_encode(['success' => false, 'message' => 'Nama kejuaraan dan siswa peraih wajib diisi!']);
                exit;
            }

            if ($action === 'tambah_prestasi') {
                $stmt = $pdo->prepare("INSERT INTO prestasi (judul, tingkat, peringkat, nama_peraih, kelas_jurusan, tahun, penyelenggara, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, 'Publikasi', NOW())");
                $stmt->execute([$judul, $tingkat, $peringkat, $nama_peraih, $kelas_jurusan, $tahun, $penyelenggara]);
                echo json_encode(['success' => true, 'message' => 'Prestasi berhasil ditambahkan!']);
                exit;
            } else {
                $stmt = $pdo->prepare("UPDATE prestasi SET judul = ?, tingkat = ?, peringkat = ?, nama_peraih = ?, kelas_jurusan = ?, tahun = ?, penyelenggara = ? WHERE id = ?");
                $stmt->execute([$judul, $tingkat, $peringkat, $nama_peraih, $kelas_jurusan, $tahun, $penyelenggara, $id]);
                echo json_encode(['success' => true, 'message' => 'Data prestasi berhasil diperbarui!']);
                exit;
            }
        }

        if ($action === 'hapus_prestasi') {
            $id = (int)($_POST['id'] ?? 0);
            $stmt = $pdo->prepare("DELETE FROM prestasi WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Prestasi berhasil dihapus!']);
            exit;
        }

        // --- EKSKUL ACTIONS ---
        if ($action === 'tambah_ekskul' || $action === 'edit_ekskul') {
            $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
            $nama_ekskul = trim($_POST['nama_ekskul'] ?? '');
            $pembina = trim($_POST['pembina'] ?? '');
            $jumlah_anggota = trim($_POST['jumlah_anggota'] ?? '30 Siswa');
            $hari_jadwal = trim($_POST['hari_jadwal'] ?? 'Sabtu');
            $deskripsi = trim($_POST['deskripsi'] ?? '');
            $status = trim($_POST['status'] ?? 'Aktif');

            if (empty($nama_ekskul)) {
                echo json_encode(['success' => false, 'message' => 'Nama ekstrakurikuler wajib diisi!']);
                exit;
            }

            if ($action === 'tambah_ekskul') {
                $stmt = $pdo->prepare("INSERT INTO ekstrakurikuler (nama_ekskul, pembina, jumlah_anggota, hari_jadwal, deskripsi, status, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
                $stmt->execute([$nama_ekskul, $pembina, $jumlah_anggota, $hari_jadwal, $deskripsi, $status]);
                echo json_encode(['success' => true, 'message' => 'Ekstrakurikuler berhasil ditambahkan!']);
                exit;
            } else {
                $stmt = $pdo->prepare("UPDATE ekstrakurikuler SET nama_ekskul = ?, pembina = ?, jumlah_anggota = ?, hari_jadwal = ?, deskripsi = ?, status = ? WHERE id = ?");
                $stmt->execute([$nama_ekskul, $pembina, $jumlah_anggota, $hari_jadwal, $deskripsi, $status, $id]);
                echo json_encode(['success' => true, 'message' => 'Ekstrakurikuler berhasil diperbarui!']);
                exit;
            }
        }

        if ($action === 'hapus_ekskul') {
            $id = (int)($_POST['id'] ?? 0);
            $stmt = $pdo->prepare("DELETE FROM ekstrakurikuler WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'Ekstrakurikuler berhasil dihapus!']);
            exit;
        }

        if ($action === 'toggle_status_ekskul') {
            $id = (int)($_POST['id'] ?? 0);
            $status = $_POST['status'] === 'Aktif' ? 'Aktif' : 'Nonaktif';
            $stmt = $pdo->prepare("UPDATE ekstrakurikuler SET status = ? WHERE id = ?");
            $stmt->execute([$status, $id]);
            echo json_encode(['success' => true, 'message' => 'Status ekstrakurikuler berhasil diubah!']);
            exit;
        }

        echo json_encode(['success' => false, 'message' => 'Aksi tidak dikenal!']);
        exit;
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
        exit;
    }
}

// FETCH DATA
$prestasiList = [];
$ekskulList = [];
try {
    $stmt1 = $pdo->query("SELECT * FROM prestasi ORDER BY tahun DESC, id DESC");
    $prestasiList = $stmt1->fetchAll();

    $stmt2 = $pdo->query("SELECT * FROM ekstrakurikuler ORDER BY id ASC");
    $ekskulList = $stmt2->fetchAll();
} catch (Exception $e) {
    //
}

$totalPrestasi = count($prestasiList);
$totalNasional = count(array_filter($prestasiList, fn($p) => ($p['tingkat'] ?? '') === 'Nasional'));
$totalEkskulAktif = count(array_filter($ekskulList, fn($e) => ($e['status'] ?? 'Aktif') === 'Aktif'));

$pageTitle = 'Kelola Kesiswaan - Admin SMKN 2 Karanganyar';
$activeTab = $_GET['tab'] ?? 'prestasi';
$currentPage = ($activeTab === 'ekskul') ? 'kelola-ekskul' : 'kelola-prestasi';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Kesiswaan: Prestasi &amp; Ekstrakurikuler</h1>
      <p class="page-subtitle">Kelola daftar torehan prestasi kejuaraan siswa, kejuaraan LKS, olimpiade vokasi, dan data kegiatan ekstrakurikuler.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../kesiswaan/prestasi.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Web Prestasi
      </a>
      <a href="../kesiswaan/ekstrakurikuler.php" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Web Ekskul
      </a>
      <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="bukaModalTambahKesiswaan()">
        <i class="bi bi-plus-lg"></i> Tambah Data Baru
      </button>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- REKAPITULASI QUICK STATS BAR -->
  <div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Prestasi Juara</span>
          <div class="stat-icon-circle bg-success-subtle text-success">
            <i class="bi bi-trophy-fill"></i>
          </div>
        </div>
        <div class="stat-value text-success"><?= $totalPrestasi ?> Gelar</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span>Tercatat Resmi Sekolah</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Tingkat Nasional</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-award-fill"></i>
          </div>
        </div>
        <div class="stat-value text-warning"><?= $totalNasional ?> Kejuaraan</div>
        <div class="trend-badge text-warning">
          <i class="bi bi-star-fill"></i>
          <span>LKS &amp; Vokasi Nasional</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Ekstrakurikuler Aktif</span>
          <div class="stat-icon-circle bg-primary-subtle text-primary">
            <i class="bi bi-stars"></i>
          </div>
        </div>
        <div class="stat-value text-primary"><?= $totalEkskulAktif ?> Cabang</div>
        <div class="trend-badge text-primary">
          <i class="bi bi-people-fill"></i>
          <span>Pengembangan Minat Siswa</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Partisipasi Siswa</span>
          <div class="stat-icon-circle bg-info-subtle text-info">
            <i class="bi bi-person-check-fill"></i>
          </div>
        </div>
        <div class="stat-value text-info">100% Aktif</div>
        <div class="trend-badge text-info">
          <i class="bi bi-shield-check"></i>
          <span>Wajib &amp; Pilihan Minat</span>
        </div>
      </div>
    </div>
  </div>

  <!-- TABS NAV -->
  <ul class="nav nav-pills mb-4" id="kesiswaanTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link <?= ($activeTab === 'prestasi') ? 'active' : '' ?>" id="prestasi-tab" data-bs-toggle="pill" data-bs-target="#tab-prestasi" type="button" role="tab">
        <i class="bi bi-trophy-fill me-1"></i> Prestasi Siswa &amp; Kejuaraan (<?= count($prestasiList) ?>)
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link <?= ($activeTab === 'ekskul') ? 'active' : '' ?>" id="ekskul-tab" data-bs-toggle="pill" data-bs-target="#tab-ekskul" type="button" role="tab">
        <i class="bi bi-stars me-1"></i> Ekstrakurikuler Sekolah (<?= count($ekskulList) ?>)
      </button>
    </li>
  </ul>

  <div class="tab-content" id="kesiswaanTabContent">
    <!-- TAB PRESTASI -->
    <div class="tab-pane fade <?= ($activeTab === 'prestasi') ? 'show active' : '' ?>" id="tab-prestasi" role="tabpanel">
      <div class="table-card-custom mb-4">
        <div class="table-header-control">
          <div class="table-search-box">
            <i class="bi bi-search table-search-icon"></i>
            <input type="text" class="table-search-input" id="searchPrestasiInput" placeholder="Cari nama lomba, peraih, atau kejuaraan..." onkeyup="filterPrestasiTable()">
          </div>
          <div class="table-filter-group">
            <select class="form-select form-select-sm" id="filterTingkatSelect" onchange="filterPrestasiTable()" style="width: auto;">
              <option value="" selected>Semua Tingkat Kejuaraan</option>
              <option value="Nasional">Tingkat Nasional</option>
              <option value="Provinsi">Tingkat Provinsi</option>
              <option value="Kabupaten">Tingkat Kabupaten</option>
            </select>
            <button class="btn-table-action" type="button" onclick="alert('Data prestasi siswa berhasil diekspor ke Excel!')">
              <i class="bi bi-file-earmark-excel"></i> Unduh Excel
            </button>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table-custom" id="tablePrestasiList">
            <thead>
              <tr>
                <th>Nama Prestasi / Kejuaraan</th>
                <th>Tingkat</th>
                <th>Peringkat</th>
                <th>Siswa &amp; Jurusan</th>
                <th>Tahun</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($prestasiList)): ?>
                <?php foreach ($prestasiList as $p): 
                  $tingkatBadge = match($p['tingkat'] ?? '') {
                    'Nasional' => 'warning',
                    'Provinsi' => 'primary',
                    default => 'info'
                  };
                ?>
                <tr data-id="<?= $p['id'] ?>">
                  <td>
                    <div class="fw-bold text-main"><?= htmlspecialchars($p['judul']) ?></div>
                    <div class="text-muted fs-xs"><?= htmlspecialchars($p['penyelenggara'] ?? 'Penyelenggara Resmi') ?></div>
                  </td>
                  <td><span class="badge bg-<?= $tingkatBadge ?>-subtle text-<?= $tingkatBadge ?> fw-bold"><?= htmlspecialchars($p['tingkat']) ?></span></td>
                  <td><span class="badge bg-success fw-bold"><i class="bi bi-trophy me-1"></i> <?= htmlspecialchars($p['peringkat']) ?></span></td>
                  <td>
                    <div class="fw-bold text-main"><?= htmlspecialchars($p['nama_peraih']) ?></div>
                    <div class="text-muted fs-xs"><?= htmlspecialchars($p['kelas_jurusan'] ?? '-') ?></div>
                  </td>
                  <td><span class="badge bg-light text-dark border"><?= htmlspecialchars($p['tahun']) ?></span></td>
                  <td>
                    <div class="d-flex justify-content-center gap-1">
                      <button type="button" class="table-btn-action" title="Edit Prestasi" onclick="editPrestasi(<?= htmlspecialchars(json_encode($p)) ?>)">
                        <i class="bi bi-pencil"></i>
                      </button>
                      <button type="button" class="table-btn-action delete" title="Hapus Prestasi" onclick="hapusPrestasi(<?= $p['id'] ?>, '<?= htmlspecialchars(addslashes($p['judul'])) ?>')">
                        <i class="bi bi-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6" class="text-center py-4 text-muted">Belum ada torehan prestasi siswa tersimpan.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- TAB EKSKUL -->
    <div class="tab-pane fade <?= ($activeTab === 'ekskul') ? 'show active' : '' ?>" id="tab-ekskul" role="tabpanel">
      <div class="row g-4 mb-4" id="ekskulGridContainer">
        <?php if (!empty($ekskulList)): ?>
          <?php foreach ($ekskulList as $e): 
            $isAktif = ($e['status'] ?? 'Aktif') === 'Aktif';
          ?>
          <div class="col-md-4 ekskul-card-col" data-id="<?= $e['id'] ?>">
            <div class="card p-4 shadow-sm border-0 h-100 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
              <div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-success-subtle text-success p-3 fs-3 ekskul-icon-box" style="width: 52px; height: 52px; display:flex; align-items:center; justify-content:center;">
                      <i class="bi bi-stars"></i>
                    </div>
                    <div>
                      <h6 class="fw-bold mb-0 text-main ekskul-title"><?= htmlspecialchars($e['nama_ekskul']) ?></h6>
                      <div class="text-muted fs-xs ekskul-pembina">Pembina: <?= htmlspecialchars($e['pembina'] ?? '-') ?></div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-sm py-1 px-2.5 rounded-pill fw-bold border-0 btn-status-ekskul <?= $isAktif ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' ?>" onclick="toggleStatusEkskul(<?= $e['id'] ?>, '<?= $isAktif ? 'Nonaktif' : 'Aktif' ?>', '<?= htmlspecialchars(addslashes($e['nama_ekskul'])) ?>')">
                    <i class="bi <?= $isAktif ? 'bi-check-circle-fill' : 'bi-slash-circle' ?> me-1"></i> <span class="status-label"><?= $isAktif ? 'Aktif' : 'Nonaktif' ?></span>
                  </button>
                </div>
                <p class="text-muted fs-sm mb-3 ekskul-desc" style="line-height: 1.55;"><?= htmlspecialchars($e['deskripsi'] ?? 'Kegiatan pembinaan kesiswaan SMKN 2 Karanganyar.') ?></p>
              </div>
              <div class="pt-3 border-top">
                <div class="d-flex justify-content-between align-items-center mb-3 fs-xs text-muted">
                  <span>Anggota: <strong class="text-main ekskul-anggota"><?= htmlspecialchars($e['jumlah_anggota'] ?? '-') ?></strong></span>
                  <span>Jadwal: <strong class="text-main ekskul-jadwal"><?= htmlspecialchars($e['hari_jadwal'] ?? '-') ?></strong></span>
                </div>
                <div class="d-flex justify-content-end gap-2">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="editEkskul(<?= htmlspecialchars(json_encode($e)) ?>)">
                    <i class="bi bi-pencil me-1"></i> Edit
                  </button>
                  <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusEkskul(<?= $e['id'] ?>, '<?= htmlspecialchars(addslashes($e['nama_ekskul'])) ?>')">
                    <i class="bi bi-trash"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 text-center py-5 text-muted">Belum ada kegiatan ekstrakurikuler tersimpan.</div>
        <?php endif; ?>
      </div>
    </div>
  </div>

</div>
<!-- END: .main-wrapper -->

<!-- Modal Tambah Prestasi -->
<div class="modal fade" id="modalTambahPrestasi" tabindex="-1" aria-labelledby="modalTambahPrestasiLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTambahPrestasiLabel">
          <i class="bi bi-trophy-fill text-success"></i> Tambah Torehan Prestasi Siswa
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahPrestasi">
          <input type="hidden" name="action" value="tambah_prestasi">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label-custom" for="tambahNamaLomba">Nama Prestasi / Perlombaan / Kejuaraan</label>
              <input type="text" class="form-control-custom" name="judul" id="tambahNamaLomba" placeholder="Contoh: Lomba Kompetensi Siswa (LKS) Bidang Robotika" required>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahTingkatLomba">Tingkat Kejuaraan</label>
              <select class="form-select-custom" name="tingkat" id="tambahTingkatLomba">
                <option value="Nasional">Tingkat Nasional</option>
                <option value="Provinsi" selected>Tingkat Provinsi</option>
                <option value="Kabupaten">Tingkat Kabupaten</option>
                <option value="Internasional">Tingkat Internasional</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahPeringkatLomba">Peringkat / Medali</label>
              <input type="text" class="form-control-custom" name="peringkat" id="tambahPeringkatLomba" value="Juara 1" required>
            </div>

            <div class="col-md-7">
              <label class="form-label-custom" for="tambahNamaSiswaLomba">Nama Siswa Peraih Prestasi</label>
              <input type="text" class="form-control-custom" name="nama_peraih" id="tambahNamaSiswaLomba" placeholder="Contoh: Ahmad Rizki Pratama" required>
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="tambahKelasSiswaLomba">Kelas &amp; Jurusan</label>
              <input type="text" class="form-control-custom" name="kelas_jurusan" id="tambahKelasSiswaLomba" placeholder="XII RPL 1">
            </div>
            <div class="col-md-2">
              <label class="form-label-custom" for="tambahTahunLomba">Tahun</label>
              <input type="number" class="form-control-custom" name="tahun" id="tambahTahunLomba" value="<?= date('Y') ?>">
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahPenyelenggaraLomba">Penyelenggara Lomba</label>
              <input type="text" class="form-control-custom" name="penyelenggara" id="tambahPenyelenggaraLomba" placeholder="Contoh: Kemendikbudristek & BPTI">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanTambahPrestasi()">
          <i class="bi bi-check-circle-fill"></i> Simpan Prestasi
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Prestasi -->
<div class="modal fade" id="modalEditPrestasi" tabindex="-1" aria-labelledby="modalEditPrestasiLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalEditPrestasiLabel">
          <i class="bi bi-pencil-square text-success"></i> Edit Data Prestasi Siswa
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditPrestasi">
          <input type="hidden" name="action" value="edit_prestasi">
          <input type="hidden" name="id" id="editIdPrestasi">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label-custom" for="editNamaLomba">Nama Kejuaraan</label>
              <input type="text" class="form-control-custom" name="judul" id="editNamaLomba" required>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editTingkatLomba">Tingkat</label>
              <select class="form-select-custom" name="tingkat" id="editTingkatLomba">
                <option value="Nasional">Tingkat Nasional</option>
                <option value="Provinsi">Tingkat Provinsi</option>
                <option value="Kabupaten">Tingkat Kabupaten</option>
                <option value="Internasional">Tingkat Internasional</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editPeringkatLomba">Peringkat / Medali</label>
              <input type="text" class="form-control-custom" name="peringkat" id="editPeringkatLomba" required>
            </div>
            <div class="col-md-7">
              <label class="form-label-custom" for="editNamaSiswaLomba">Nama Siswa</label>
              <input type="text" class="form-control-custom" name="nama_peraih" id="editNamaSiswaLomba" required>
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="editKelasSiswaLomba">Kelas</label>
              <input type="text" class="form-control-custom" name="kelas_jurusan" id="editKelasSiswaLomba">
            </div>
            <div class="col-md-2">
              <label class="form-label-custom" for="editTahunLomba">Tahun</label>
              <input type="number" class="form-control-custom" name="tahun" id="editTahunLomba">
            </div>
            <div class="col-12">
              <label class="form-label-custom" for="editPenyelenggaraLomba">Penyelenggara</label>
              <input type="text" class="form-control-custom" name="penyelenggara" id="editPenyelenggaraLomba">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanEditPrestasi()">
          <i class="bi bi-save-fill"></i> Perbarui Prestasi
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Ekstrakurikuler -->
<div class="modal fade" id="modalTambahEkskul" tabindex="-1" aria-labelledby="modalTambahEkskulLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTambahEkskulLabel">
          <i class="bi bi-stars text-success"></i> Tambah Ekstrakurikuler Baru
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formTambahEkskul">
          <input type="hidden" name="action" value="tambah_ekskul">
          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label-custom" for="tambahNamaEkskul">Nama Ekstrakurikuler</label>
              <input type="text" class="form-control-custom" name="nama_ekskul" id="tambahNamaEkskul" placeholder="Contoh: English Conversation Club" required>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="tambahStatusEkskul">Status</label>
              <select class="form-select-custom" name="status" id="tambahStatusEkskul">
                <option value="Aktif" selected>Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahPembinaEkskul">Guru Pembina</label>
              <input type="text" class="form-control-custom" name="pembina" id="tambahPembinaEkskul" placeholder="Contoh: Dra. Sri Wahyuni" required>
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="tambahAnggotaEkskul">Jumlah Anggota</label>
              <input type="text" class="form-control-custom" name="jumlah_anggota" id="tambahAnggotaEkskul" value="35 Siswa">
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="tambahJadwalEkskul">Jadwal Latihan</label>
              <input type="text" class="form-control-custom" name="hari_jadwal" id="tambahJadwalEkskul" value="Sabtu Pagi">
            </div>
            <div class="col-12">
              <label class="form-label-custom" for="tambahDeskripsiEkskul">Deskripsi Kegiatan</label>
              <textarea class="form-control-custom" name="deskripsi" id="tambahDeskripsiEkskul" rows="3" placeholder="Tulis deskripsi fokus kegiatan dan capaian ekstrakurikuler..."></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanTambahEkskul()">
          <i class="bi bi-check-circle-fill"></i> Simpan Ekstrakurikuler
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Ekstrakurikuler -->
<div class="modal fade" id="modalEditEkskul" tabindex="-1" aria-labelledby="modalEditEkskulLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalEditEkskulLabel">
          <i class="bi bi-pencil-square text-success"></i> Edit Data Ekstrakurikuler
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditEkskul">
          <input type="hidden" name="action" value="edit_ekskul">
          <input type="hidden" name="id" id="editIdEkskul">
          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label-custom" for="editNamaEkskul">Nama Ekstrakurikuler</label>
              <input type="text" class="form-control-custom" name="nama_ekskul" id="editNamaEkskul" required>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom" for="editStatusEkskul">Status</label>
              <select class="form-select-custom" name="status" id="editStatusEkskul">
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editPembinaEkskul">Guru Pembina</label>
              <input type="text" class="form-control-custom" name="pembina" id="editPembinaEkskul" required>
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="editAnggotaEkskul">Jumlah Anggota</label>
              <input type="text" class="form-control-custom" name="jumlah_anggota" id="editAnggotaEkskul">
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="editJadwalEkskul">Jadwal Latihan</label>
              <input type="text" class="form-control-custom" name="hari_jadwal" id="editJadwalEkskul">
            </div>
            <div class="col-12">
              <label class="form-label-custom" for="editDeskripsiEkskul">Deskripsi Kegiatan</label>
              <textarea class="form-control-custom" name="deskripsi" id="editDeskripsiEkskul" rows="3"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2" onclick="simpanEditEkskul()">
          <i class="bi bi-save-fill"></i> Perbarui Ekstrakurikuler
        </button>
      </div>
    </div>
  </div>
</div>

<script>
// Open modal tambah depending on active tab
function bukaModalTambahKesiswaan() {
  const isEkskul = document.getElementById('tab-ekskul').classList.contains('active');
  if (isEkskul) {
    const modalEl = document.getElementById('modalTambahEkskul');
    const modal = new bootstrap.Modal(modalEl);
    modal.show();
  } else {
    const modalEl = document.getElementById('modalTambahPrestasi');
    const modal = new bootstrap.Modal(modalEl);
    modal.show();
  }
}

// PRESTASI FUNCTIONS
function editPrestasi(data) {
  document.getElementById('editIdPrestasi').value = data.id || '';
  document.getElementById('editNamaLomba').value = data.judul || '';
  document.getElementById('editTingkatLomba').value = data.tingkat || 'Provinsi';
  document.getElementById('editPeringkatLomba').value = data.peringkat || 'Juara 1';
  document.getElementById('editNamaSiswaLomba').value = data.nama_peraih || '';
  document.getElementById('editKelasSiswaLomba').value = data.kelas_jurusan || '';
  document.getElementById('editTahunLomba').value = data.tahun || new Date().getFullYear();
  document.getElementById('editPenyelenggaraLomba').value = data.penyelenggara || '';

  const modalEl = document.getElementById('modalEditPrestasi');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function simpanTambahPrestasi() {
  const form = document.getElementById('formTambahPrestasi');
  if (!form.judul.value.trim() || !form.nama_peraih.value.trim()) {
    alert('Nama perlombaan dan siswa peraih wajib diisi!');
    return;
  }

  const formData = new FormData(form);
  fetch('kelola-kesiswaan.php', { method: 'POST', body: formData })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      alert(data.message);
      location.href = 'kelola-kesiswaan.php?tab=prestasi';
    } else {
      alert('Gagal: ' + data.message);
    }
  })
  .catch(() => alert('Terjadi kesalahan jaringan.'));
}

function simpanEditPrestasi() {
  const form = document.getElementById('formEditPrestasi');
  if (!form.judul.value.trim() || !form.nama_peraih.value.trim()) {
    alert('Nama perlombaan dan siswa peraih wajib diisi!');
    return;
  }

  const formData = new FormData(form);
  fetch('kelola-kesiswaan.php', { method: 'POST', body: formData })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      alert(data.message);
      location.href = 'kelola-kesiswaan.php?tab=prestasi';
    } else {
      alert('Gagal: ' + data.message);
    }
  })
  .catch(() => alert('Terjadi kesalahan jaringan.'));
}

function hapusPrestasi(id, nama) {
  if (confirm('Hapus torehan prestasi ' + nama + '?')) {
    const formData = new FormData();
    formData.append('action', 'hapus_prestasi');
    formData.append('id', id);

    fetch('kelola-kesiswaan.php', { method: 'POST', body: formData })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        alert(data.message);
        location.href = 'kelola-kesiswaan.php?tab=prestasi';
      } else {
        alert('Gagal: ' + data.message);
      }
    })
    .catch(() => alert('Terjadi kesalahan jaringan.'));
  }
}

function filterPrestasiTable() {
  const query = (document.getElementById('searchPrestasiInput').value || '').toLowerCase();
  const filter = (document.getElementById('filterTingkatSelect').value || '').toLowerCase();
  const rows = document.querySelectorAll('#tablePrestasiList tbody tr');

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

// EKSKUL FUNCTIONS
function editEkskul(data) {
  document.getElementById('editIdEkskul').value = data.id || '';
  document.getElementById('editNamaEkskul').value = data.nama_ekskul || '';
  document.getElementById('editStatusEkskul').value = data.status || 'Aktif';
  document.getElementById('editPembinaEkskul').value = data.pembina || '';
  document.getElementById('editAnggotaEkskul').value = data.jumlah_anggota || '';
  document.getElementById('editJadwalEkskul').value = data.hari_jadwal || '';
  document.getElementById('editDeskripsiEkskul').value = data.deskripsi || '';

  const modalEl = document.getElementById('modalEditEkskul');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function simpanTambahEkskul() {
  const form = document.getElementById('formTambahEkskul');
  if (!form.nama_ekskul.value.trim()) {
    alert('Nama ekstrakurikuler wajib diisi!');
    return;
  }

  const formData = new FormData(form);
  fetch('kelola-kesiswaan.php', { method: 'POST', body: formData })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      alert(data.message);
      location.href = 'kelola-kesiswaan.php?tab=ekskul';
    } else {
      alert('Gagal: ' + data.message);
    }
  })
  .catch(() => alert('Terjadi kesalahan jaringan.'));
}

function simpanEditEkskul() {
  const form = document.getElementById('formEditEkskul');
  if (!form.nama_ekskul.value.trim()) {
    alert('Nama ekstrakurikuler wajib diisi!');
    return;
  }

  const formData = new FormData(form);
  fetch('kelola-kesiswaan.php', { method: 'POST', body: formData })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      alert(data.message);
      location.href = 'kelola-kesiswaan.php?tab=ekskul';
    } else {
      alert('Gagal: ' + data.message);
    }
  })
  .catch(() => alert('Terjadi kesalahan jaringan.'));
}

function hapusEkskul(id, nama) {
  if (confirm('Hapus ekstrakurikuler ' + nama + '?')) {
    const formData = new FormData();
    formData.append('action', 'hapus_ekskul');
    formData.append('id', id);

    fetch('kelola-kesiswaan.php', { method: 'POST', body: formData })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        alert(data.message);
        location.href = 'kelola-kesiswaan.php?tab=ekskul';
      } else {
        alert('Gagal: ' + data.message);
      }
    })
    .catch(() => alert('Terjadi kesalahan jaringan.'));
  }
}

function toggleStatusEkskul(id, status, nama) {
  const formData = new FormData();
  formData.append('action', 'toggle_status_ekskul');
  formData.append('id', id);
  formData.append('status', status);

  fetch('kelola-kesiswaan.php', { method: 'POST', body: formData })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      location.href = 'kelola-kesiswaan.php?tab=ekskul';
    } else {
      alert('Gagal: ' + data.message);
    }
  })
  .catch(() => alert('Terjadi kesalahan jaringan.'));
}
</script>

<?php include __DIR__ . '/components/footer.php'; ?>
