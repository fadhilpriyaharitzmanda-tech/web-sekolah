<?php
/**
 * Kelola Statistik Sekolah - Admin SMKN 2 Karanganyar
 * Manajemen counter landing page, rincian siswa, guru, sarpras, dan data statistik akademik.
 */
require_once __DIR__ . '/../config/database.php';
$pdo = getDbConnection();

// ==========================================
// HANDLE BACKEND POST REQUESTS (AJAX CRUD)
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    $action = $_POST['action'] ?? '';

    if ($action === 'simpan_counter') {
        $stats = [
            'stat_1' => ['label' => trim($_POST['label_1'] ?? 'Siswa Aktif'), 'nilai' => trim($_POST['nilai_1'] ?? '2500+')],
            'stat_2' => ['label' => trim($_POST['label_2'] ?? 'Partner Industri'), 'nilai' => trim($_POST['nilai_2'] ?? '45+')],
            'stat_3' => ['label' => trim($_POST['label_3'] ?? 'Kurikulum Industri'), 'nilai' => trim($_POST['nilai_3'] ?? '100%')],
            'stat_4' => ['label' => trim($_POST['label_4'] ?? 'Eskul Prestasi'), 'nilai' => trim($_POST['nilai_4'] ?? '7+')],
        ];

        $stmt = $pdo->prepare("INSERT INTO statistik_sekolah (kode, label, nilai, urutan) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE label = VALUES(label), nilai = VALUES(nilai)");
        $order = 1;
        foreach ($stats as $kode => $val) {
            $stmt->execute([$kode, $val['label'], $val['nilai'], $order++]);
        }

        echo json_encode(['success' => true, 'message' => 'Angka counter landing page berhasil diperbarui ke database!']);
        exit;
    }
}

// Fetch stats dari database
$statRows = $pdo->query("SELECT * FROM statistik_sekolah ORDER BY urutan ASC, id ASC")->fetchAll(PDO::FETCH_ASSOC);
$stats = [];
foreach ($statRows as $idx => $row) {
    $k = !empty($row['kode']) ? $row['kode'] : ('stat_' . ($row['urutan'] ?? ($idx + 1)));
    $stats[$k] = $row;
}
$s1_val = $stats['stat_1']['nilai'] ?? ($statRows[0]['nilai'] ?? '2500+');
$s1_lbl = $stats['stat_1']['label'] ?? ($statRows[0]['label'] ?? 'Siswa Aktif');
$s2_val = $stats['stat_2']['nilai'] ?? ($statRows[1]['nilai'] ?? '45+');
$s2_lbl = $stats['stat_2']['label'] ?? ($statRows[1]['label'] ?? 'Partner Industri');
$s3_val = $stats['stat_3']['nilai'] ?? ($statRows[2]['nilai'] ?? '100%');
$s3_lbl = $stats['stat_3']['label'] ?? ($statRows[2]['label'] ?? 'Kurikulum Industri');
$s4_val = $stats['stat_4']['nilai'] ?? ($statRows[3]['nilai'] ?? '7+');
$s4_lbl = $stats['stat_4']['label'] ?? ($statRows[3]['label'] ?? 'Eskul Prestasi');

$pageTitle = 'Kelola Statistik Sekolah - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-stats';
$assetsPath = 'assets/';

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include __DIR__ . '/components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Statistik &amp; Counter Sekolah</h1>
      <p class="page-subtitle">Kelola metrik pencapaian, angka counter landing page, data jumlah siswa aktif, dan rekapitulasi sekolah terpadu.</p>
    </div>
    <div class="d-flex gap-2">
      <a href="../index.php#statistik" target="_blank" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2">
        <i class="bi bi-eye"></i> Pratinjau di Website
      </a>
    </div>
  </div>
  <!-- END: Page Header Banner -->

  <!-- REKAPITULASI QUICK STATS BAR -->
  <div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Total Siswa Aktif</span>
          <div class="stat-icon-circle bg-success-subtle text-success">
            <i class="bi bi-people-fill"></i>
          </div>
        </div>
        <div class="stat-value text-success" id="badgeTotalSiswa">2,500+</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span>72 Rombel Terdaftar</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Mitra Industri</span>
          <div class="stat-icon-circle bg-primary-subtle text-primary">
            <i class="bi bi-buildings-fill"></i>
          </div>
        </div>
        <div class="stat-value text-primary" id="badgeMitra">45+ DUDI</div>
        <div class="trend-badge text-primary">
          <i class="bi bi-shield-check"></i>
          <span>Kerjasama MoU Aktif</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Kurikulum Industri</span>
          <div class="stat-icon-circle bg-warning-subtle text-warning">
            <i class="bi bi-award-fill"></i>
          </div>
        </div>
        <div class="stat-value text-warning">100% Standar</div>
        <div class="trend-badge text-warning">
          <i class="bi bi-star-fill"></i>
          <span>Link &amp; Match Terverifikasi</span>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-stat">
        <div class="card-header">
          <span class="stat-label">Eskul &amp; Prestasi</span>
          <div class="stat-icon-circle bg-info-subtle text-info">
            <i class="bi bi-trophy-fill"></i>
          </div>
        </div>
        <div class="stat-value text-info">7+ Eskul</div>
        <div class="trend-badge text-info">
          <i class="bi bi-lightning-charge-fill"></i>
          <span>Juara Tingkat Nasional</span>
        </div>
      </div>
    </div>
  </div>

  <!-- TABS NAV -->
  <ul class="nav nav-pills mb-4" id="statTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="tab-landing-btn" data-bs-toggle="pill" data-bs-target="#tab-landing" type="button" role="tab">
        <i class="bi bi-display me-1"></i> Counter Landing Page (Home)
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="tab-siswa-btn" data-bs-toggle="pill" data-bs-target="#tab-siswa" type="button" role="tab">
        <i class="bi bi-mortarboard-fill me-1"></i> Data Siswa per Jurusan
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="tab-sarpras-btn" data-bs-toggle="pill" data-bs-target="#tab-sarpras" type="button" role="tab">
        <i class="bi bi-gear-wide-connected me-1"></i> Fasilitas &amp; Laboratorium
      </button>
    </li>
  </ul>

  <!-- TAB CONTENT -->
  <div class="tab-content" id="statTabsContent">
    <!-- TAB 1: COUNTER LANDING PAGE -->
    <div class="tab-pane fade show active" id="tab-landing" role="tabpanel">
      <!-- Live Preview Banner -->
      <div class="card p-4 shadow-sm border-0 mb-4" style="background: linear-gradient(135deg, #072F1F 0%, #051C12 100%); color: #FFFFFF; border-radius: var(--radius-xl);">
        <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-secondary border-opacity-25 flex-wrap gap-2">
          <div>
            <span class="badge bg-lime text-dark fw-bold mb-1" style="background-color: var(--brand-lime); color: #072F1F;">LIVE PREVIEW</span>
            <h5 class="fw-bold mb-0 text-white">Tampilan Bar Counter di Halaman Depan Website</h5>
          </div>
          <span class="fs-xs text-white-50"><i class="bi bi-info-circle me-1"></i> Perubahan angka di bawah akan langsung menyesuaikan preview ini</span>
        </div>
        <div class="row g-3 text-center py-2">
          <div class="col-6 col-md-3 border-end border-secondary border-opacity-25">
            <div class="display-6 fw-bold text-lime" id="pv-stat-1" style="color: var(--brand-lime);"><?= htmlspecialchars($s1_val) ?></div>
            <div class="fs-xs text-white-50 fw-semibold text-uppercase tracking-wider" id="pv-label-1"><?= htmlspecialchars($s1_lbl) ?></div>
          </div>
          <div class="col-6 col-md-3 border-end border-secondary border-opacity-25">
            <div class="display-6 fw-bold text-lime" id="pv-stat-2" style="color: var(--brand-lime);"><?= htmlspecialchars($s2_val) ?></div>
            <div class="fs-xs text-white-50 fw-semibold text-uppercase tracking-wider" id="pv-label-2"><?= htmlspecialchars($s2_lbl) ?></div>
          </div>
          <div class="col-6 col-md-3 border-end border-secondary border-opacity-25">
            <div class="display-6 fw-bold text-lime" id="pv-stat-3" style="color: var(--brand-lime);"><?= htmlspecialchars($s3_val) ?></div>
            <div class="fs-xs text-white-50 fw-semibold text-uppercase tracking-wider" id="pv-label-3"><?= htmlspecialchars($s3_lbl) ?></div>
          </div>
          <div class="col-6 col-md-3">
            <div class="display-6 fw-bold text-lime" id="pv-stat-4" style="color: var(--brand-lime);"><?= htmlspecialchars($s4_val) ?></div>
            <div class="fs-xs text-white-50 fw-semibold text-uppercase tracking-wider" id="pv-label-4"><?= htmlspecialchars($s4_lbl) ?></div>
          </div>
        </div>
      </div>

      <!-- Form Edit Counter -->
      <div class="card p-4 shadow-sm border-0 mb-4" style="border-radius: var(--radius-xl);">
        <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
          <div>
            <h5 class="fw-bold mb-1">Form Pengaturan Angka Counter</h5>
            <p class="text-muted fs-xs mb-0">Ubah nominal angka, format simbol (+/%), dan label keterangan yang tampil di landing page.</p>
          </div>
          <button type="button" class="btn btn-outline-secondary btn-sm" onclick="resetDefaultCounter()">
            <i class="bi bi-arrow-counterclockwise me-1"></i> Pulihkan Standar
          </button>
        </div>

        <form id="formCounterLanding">
          <div class="row g-4 mb-4">
            <!-- Stat 1 -->
            <div class="col-md-6 col-xl-3">
              <div class="p-3 border rounded-3 bg-light bg-opacity-50 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <span class="badge bg-success-subtle text-success fw-bold">Kotak Counter 1</span>
                  <i class="bi bi-people text-success fs-5"></i>
                </div>
                <div class="mb-3">
                  <label class="form-label fs-xs fw-bold text-muted mb-1">Angka Counter (Nominal)</label>
                  <input type="text" class="form-control fw-bold fs-5 text-success" id="input-stat-1" value="<?= htmlspecialchars($s1_val) ?>" oninput="updateLivePreview()">
                </div>
                <div>
                  <label class="form-label fs-xs text-muted mb-1">Label Keterangan</label>
                  <input type="text" class="form-control form-control-sm" id="input-label-1" value="<?= htmlspecialchars($s1_lbl) ?>" oninput="updateLivePreview()">
                </div>
              </div>
            </div>

            <!-- Stat 2 -->
            <div class="col-md-6 col-xl-3">
              <div class="p-3 border rounded-3 bg-light bg-opacity-50 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <span class="badge bg-primary-subtle text-primary fw-bold">Kotak Counter 2</span>
                  <i class="bi bi-building text-primary fs-5"></i>
                </div>
                <div class="mb-3">
                  <label class="form-label fs-xs fw-bold text-muted mb-1">Angka Counter (Nominal)</label>
                  <input type="text" class="form-control fw-bold fs-5 text-primary" id="input-stat-2" value="<?= htmlspecialchars($s2_val) ?>" oninput="updateLivePreview()">
                </div>
                <div>
                  <label class="form-label fs-xs text-muted mb-1">Label Keterangan</label>
                  <input type="text" class="form-control form-control-sm" id="input-label-2" value="<?= htmlspecialchars($s2_lbl) ?>" oninput="updateLivePreview()">
                </div>
              </div>
            </div>

            <!-- Stat 3 -->
            <div class="col-md-6 col-xl-3">
              <div class="p-3 border rounded-3 bg-light bg-opacity-50 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <span class="badge bg-warning-subtle text-warning fw-bold">Kotak Counter 3</span>
                  <i class="bi bi-patch-check text-warning fs-5"></i>
                </div>
                <div class="mb-3">
                  <label class="form-label fs-xs fw-bold text-muted mb-1">Angka Counter (Nominal)</label>
                  <input type="text" class="form-control fw-bold fs-5 text-warning" id="input-stat-3" value="<?= htmlspecialchars($s3_val) ?>" oninput="updateLivePreview()">
                </div>
                <div>
                  <label class="form-label fs-xs text-muted mb-1">Label Keterangan</label>
                  <input type="text" class="form-control form-control-sm" id="input-label-3" value="<?= htmlspecialchars($s3_lbl) ?>" oninput="updateLivePreview()">
                </div>
              </div>
            </div>

            <!-- Stat 4 -->
            <div class="col-md-6 col-xl-3">
              <div class="p-3 border rounded-3 bg-light bg-opacity-50 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <span class="badge bg-info-subtle text-info fw-bold">Kotak Counter 4</span>
                  <i class="bi bi-stars text-info fs-5"></i>
                </div>
                <div class="mb-3">
                  <label class="form-label fs-xs fw-bold text-muted mb-1">Angka Counter (Nominal)</label>
                  <input type="text" class="form-control fw-bold fs-5 text-info" id="input-stat-4" value="<?= htmlspecialchars($s4_val) ?>" oninput="updateLivePreview()">
                </div>
                <div>
                  <label class="form-label fs-xs text-muted mb-1">Label Keterangan</label>
                  <input type="text" class="form-control form-control-sm" id="input-label-4" value="<?= htmlspecialchars($s4_lbl) ?>" oninput="updateLivePreview()">
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex justify-content-end gap-2 pt-3 border-top">
            <button type="button" class="btn btn-success" onclick="simpanStatistikGlobal()">
              <i class="bi bi-save me-1"></i> Simpan Counter Landing Page
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- TAB 2: DATA SISWA PER JURUSAN -->
    <div class="tab-pane fade" id="tab-siswa" role="tabpanel">
      <div class="table-card-custom mb-4">
        <div class="table-header-control">
          <div class="table-search-box">
            <i class="bi bi-search table-search-icon"></i>
            <input type="text" class="table-search-input" placeholder="Cari data rombel atau jurusan...">
          </div>
          <div class="table-filter-group">
            <select class="form-select form-select-sm" style="width: auto;">
              <option selected>Tahun Ajaran 2026/2027</option>
              <option>Tahun Ajaran 2025/2026</option>
            </select>
            <button class="btn-table-action" type="button" onclick="showToast('Data statistik berhasil diekspor!', 'success')">
              <i class="bi bi-file-earmark-excel"></i> Ekspor Excel
            </button>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table-custom">
            <thead>
              <tr>
                <th>Program Keahlian</th>
                <th>Tingkat X</th>
                <th>Tingkat XI</th>
                <th>Tingkat XII</th>
                <th>Total Siswa</th>
                <th>Rasio L/P</th>
                <th>Status Rombel</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-success-subtle text-success fw-bold">RPL</span>
                    <strong>Rekayasa Perangkat Lunak</strong>
                  </div>
                </td>
                <td>108 Siswa (3 Rombel)</td>
                <td>107 Siswa (3 Rombel)</td>
                <td>106 Siswa (3 Rombel)</td>
                <td><strong class="text-success">321 Siswa</strong></td>
                <td>65% L / 35% P</td>
                <td><span class="badge-table success">Penuh</span></td>
                <td>
                  <div class="d-flex justify-content-center gap-1">
                    <button class="table-btn-action" title="Edit Data"><i class="bi bi-pencil"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary-subtle text-primary fw-bold">TPM</span>
                    <strong>Teknik Pemesinan</strong>
                  </div>
                </td>
                <td>144 Siswa (4 Rombel)</td>
                <td>142 Siswa (4 Rombel)</td>
                <td>140 Siswa (4 Rombel)</td>
                <td><strong class="text-primary">426 Siswa</strong></td>
                <td>98% L / 2% P</td>
                <td><span class="badge-table success">Penuh</span></td>
                <td>
                  <div class="d-flex justify-content-center gap-1">
                    <button class="table-btn-action" title="Edit Data"><i class="bi bi-pencil"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-warning-subtle text-warning fw-bold">TPK</span>
                    <strong>Teknik Pembuatan Kain (Tekstil)</strong>
                  </div>
                </td>
                <td>72 Siswa (2 Rombel)</td>
                <td>70 Siswa (2 Rombel)</td>
                <td>71 Siswa (2 Rombel)</td>
                <td><strong class="text-warning">213 Siswa</strong></td>
                <td>40% L / 60% P</td>
                <td><span class="badge-table success">Penuh</span></td>
                <td>
                  <div class="d-flex justify-content-center gap-1">
                    <button class="table-btn-action" title="Edit Data"><i class="bi bi-pencil"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-danger-subtle text-danger fw-bold">TOT</span>
                    <strong>Teknik Ototronik</strong>
                  </div>
                </td>
                <td>72 Siswa (2 Rombel)</td>
                <td>71 Siswa (2 Rombel)</td>
                <td>70 Siswa (2 Rombel)</td>
                <td><strong class="text-danger">213 Siswa</strong></td>
                <td>95% L / 5% P</td>
                <td><span class="badge-table success">Penuh</span></td>
                <td>
                  <div class="d-flex justify-content-center gap-1">
                    <button class="table-btn-action" title="Edit Data"><i class="bi bi-pencil"></i></button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- TAB 3: SARANA PRASARANA -->
    <div class="tab-pane fade" id="tab-sarpras" role="tabpanel">
      <div class="row g-4 mb-4">
        <div class="col-md-6 col-xl-3">
          <div class="card p-3 shadow-sm border-0 h-100" style="border-radius: var(--radius-xl);">
            <div class="d-flex align-items-center gap-3 mb-3">
              <div class="rounded-3 bg-success-subtle text-success p-3 fs-3" style="width: 52px; height: 52px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-pc-display"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-0">Lab Komputer RPL</h6>
                <span class="badge bg-success">4 Ruang Lab</span>
              </div>
            </div>
            <p class="text-muted fs-xs mb-3">Dilengkapi 160 unit PC Core i7, koneksi fiber optik gigabit, dan perangkat simulasi IoT.</p>
            <div class="pt-2 border-top d-flex justify-content-between align-items-center fs-xs">
              <span class="text-muted">Kapasitas:</span>
              <strong>160 Siswa</strong>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xl-3">
          <div class="card p-3 shadow-sm border-0 h-100" style="border-radius: var(--radius-xl);">
            <div class="d-flex align-items-center gap-3 mb-3">
              <div class="rounded-3 bg-primary-subtle text-primary p-3 fs-3" style="width: 52px; height: 52px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-tools"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-0">Bengkel CNC &amp; Mesin</h6>
                <span class="badge bg-primary">3 Workshop</span>
              </div>
            </div>
            <p class="text-muted fs-xs mb-3">Mesin bubut manual, milling, mesin CNC 3-axis, dan ruang pengelasan standar industri manufaktur.</p>
            <div class="pt-2 border-top d-flex justify-content-between align-items-center fs-xs">
              <span class="text-muted">Kapasitas:</span>
              <strong>120 Siswa</strong>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xl-3">
          <div class="card p-3 shadow-sm border-0 h-100" style="border-radius: var(--radius-xl);">
            <div class="d-flex align-items-center gap-3 mb-3">
              <div class="rounded-3 bg-danger-subtle text-danger p-3 fs-3" style="width: 52px; height: 52px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-car-front"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-0">Bengkel Ototronik</h6>
                <span class="badge bg-danger">2 Workshop</span>
              </div>
            </div>
            <p class="text-muted fs-xs mb-3">Scanner ECU mobil injeksi, engine stand modern, lift hidrolik, dan trainer sistem kelistrikan kendaraan listrik.</p>
            <div class="pt-2 border-top d-flex justify-content-between align-items-center fs-xs">
              <span class="text-muted">Kapasitas:</span>
              <strong>80 Siswa</strong>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xl-3">
          <div class="card p-3 shadow-sm border-0 h-100" style="border-radius: var(--radius-xl);">
            <div class="d-flex align-items-center gap-3 mb-3">
              <div class="rounded-3 bg-warning-subtle text-warning p-3 fs-3" style="width: 52px; height: 52px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-scissors"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-0">Workshop Tekstil</h6>
                <span class="badge bg-warning text-dark">2 Unit Produksi</span>
              </div>
            </div>
            <p class="text-muted fs-xs mb-3">Alat tenun bukan mesin (ATBM), mesin tenun shuttle modern, dan laboratorium uji serat tekstil.</p>
            <div class="pt-2 border-top d-flex justify-content-between align-items-center fs-xs">
              <span class="text-muted">Kapasitas:</span>
              <strong>80 Siswa</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- JavaScript Logic for Live Preview and Save Toast -->
<script>
function updateLivePreview() {
  document.getElementById('pv-stat-1').textContent = document.getElementById('input-stat-1').value || '0';
  document.getElementById('pv-label-1').textContent = document.getElementById('input-label-1').value || 'Label';
  
  document.getElementById('pv-stat-2').textContent = document.getElementById('input-stat-2').value || '0';
  document.getElementById('pv-label-2').textContent = document.getElementById('input-label-2').value || 'Label';
  
  document.getElementById('pv-stat-3').textContent = document.getElementById('input-stat-3').value || '0';
  document.getElementById('pv-label-3').textContent = document.getElementById('input-label-3').value || 'Label';
  
  document.getElementById('pv-stat-4').textContent = document.getElementById('input-stat-4').value || '0';
  document.getElementById('pv-label-4').textContent = document.getElementById('input-label-4').value || 'Label';

  document.getElementById('badgeTotalSiswa').textContent = document.getElementById('input-stat-1').value;
  document.getElementById('badgeMitra').textContent = document.getElementById('input-stat-2').value + ' DUDI';
}

function resetDefaultCounter() {
  swalConfirm({
    title: 'Reset Angka Counter?',
    text: 'Apakah Anda ingin mengembalikan nilai seluruh counter landing page ke default sekolah?',
    confirmText: 'Iya, Reset',
    cancelText: 'Tidak, Batal',
    isDanger: false,
    icon: 'question'
  }, () => {
    document.getElementById('input-stat-1').value = '2500+';
    document.getElementById('input-label-1').value = 'Siswa Aktif';
    document.getElementById('input-stat-2').value = '45+';
    document.getElementById('input-label-2').value = 'Partner Industri';
    document.getElementById('input-stat-3').value = '100%';
    document.getElementById('input-label-3').value = 'Kurikulum Industri';
    document.getElementById('input-stat-4').value = '7+';
    document.getElementById('input-label-4').value = 'Eskul Prestasi';
    updateLivePreview();
    swalSuccess('Counter dikembalikan ke nilai default sekolah.');
  });
}

function simpanStatistikGlobal() {
  const fd = new FormData();
  fd.append('action', 'simpan_counter');
  fd.append('nilai_1', document.getElementById('input-stat-1').value);
  fd.append('label_1', document.getElementById('input-label-1').value);
  fd.append('nilai_2', document.getElementById('input-stat-2').value);
  fd.append('label_2', document.getElementById('input-label-2').value);
  fd.append('nilai_3', document.getElementById('input-stat-3').value);
  fd.append('label_3', document.getElementById('input-label-3').value);
  fd.append('nilai_4', document.getElementById('input-stat-4').value);
  fd.append('label_4', document.getElementById('input-label-4').value);

  fetch('kelola-statistik.php', {
    method: 'POST',
    body: fd
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      swalSuccess(data.message);
    } else {
      swalError(data.message || 'Terjadi kesalahan');
    }
  })
  .catch(err => {
    swalError('Terjadi kesalahan jaringan: ' + err.message);
  });
}
</script>

<?php include __DIR__ . '/components/footer.php'; ?>
