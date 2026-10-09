<?php
/**
 * Kelola Testimoni Alumni - Admin SMKN 2 Karanganyar
 */
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
        <div class="stat-value text-success">28 Alumni</div>
        <div class="trend-badge trend-up">
          <i class="bi bi-check-circle-fill"></i>
          <span>Terverifikasi Alumni Asli</span>
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
        <div class="stat-value text-primary">3 Utama</div>
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
    <!-- Testimoni 1: RPL -->
    <div class="col-lg-4 col-md-6 testi-item">
      <div class="card p-4 h-100 shadow-sm border-0 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
        <div>
          <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
            <span class="badge bg-success-subtle text-success fw-bold" style="font-size: 0.72rem; letter-spacing: 0.03em;">Landing Page #1</span>
            <div class="form-check form-switch m-0 d-flex align-items-center gap-1">
              <input class="form-check-input" type="checkbox" id="testi-1" checked onchange="toggleTestiStatus(this, 'Ahmad Fauzi')">
              <label class="form-check-label fs-xs fw-semibold text-muted" for="testi-1">Aktif</label>
            </div>
          </div>
          <div class="d-flex align-items-center gap-3 mb-3">
            <img src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=4ade80&color=072f1f&size=80&bold=true" alt="Ahmad Fauzi" class="rounded-circle border" style="width: 52px; height: 52px; object-fit: cover; flex-shrink: 0;">
            <div>
              <h6 class="fw-bold mb-0 text-main testi-name">Ahmad Fauzi</h6>
              <div class="text-success fs-xs fw-bold testi-jurusan">RPL &bull; Lulusan 2020</div>
              <div class="text-muted fs-xs testi-job">Fullstack Developer di Tech Agency</div>
            </div>
          </div>
          <blockquote class="text-muted fs-sm fst-italic border-start border-3 border-success ps-3 my-3" style="line-height: 1.6; min-height: 68px;">
            "Ilmu yang saya dapat di SMKN 2 Karanganyar benar-benar menjadi fondasi karir saya di dunia teknologi. Praktik langsung dengan kurikulum industri membuat saya siap kerja sejak hari pertama."
          </blockquote>
        </div>
        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
          <span class="badge bg-light text-muted border fs-xs"><i class="bi bi-clock me-1"></i> Ditambahkan 2024</span>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="editTestimoni('Ahmad Fauzi', 'RPL', '2020', 'Fullstack Developer di Tech Agency', 'Ilmu yang saya dapat di SMKN 2 Karanganyar benar-benar menjadi fondasi karir saya di dunia teknologi. Praktik langsung dengan kurikulum industri membuat saya siap kerja.')">
              <i class="bi bi-pencil me-1"></i> Edit
            </button>
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusTestimoni(this, 'Ahmad Fauzi')">
              <i class="bi bi-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Testimoni 2: Mesin -->
    <div class="col-lg-4 col-md-6 testi-item">
      <div class="card p-4 h-100 shadow-sm border-0 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
        <div>
          <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
            <span class="badge bg-primary-subtle text-primary fw-bold" style="font-size: 0.72rem; letter-spacing: 0.03em;">Landing Page #2</span>
            <div class="form-check form-switch m-0 d-flex align-items-center gap-1">
              <input class="form-check-input" type="checkbox" id="testi-2" checked onchange="toggleTestiStatus(this, 'Dewi Sartika')">
              <label class="form-check-label fs-xs fw-semibold text-muted" for="testi-2">Aktif</label>
            </div>
          </div>
          <div class="d-flex align-items-center gap-3 mb-3">
            <img src="https://ui-avatars.com/api/?name=Dewi+Sartika&background=60a5fa&color=0b130f&size=80&bold=true" alt="Dewi Sartika" class="rounded-circle border" style="width: 52px; height: 52px; object-fit: cover; flex-shrink: 0;">
            <div>
              <h6 class="fw-bold mb-0 text-main testi-name">Dewi Sartika</h6>
              <div class="text-primary fs-xs fw-bold testi-jurusan">Mesin (TPM) &bull; Lulusan 2019</div>
              <div class="text-muted fs-xs testi-job">Teknisi CNC di PT. Astra Honda Motor</div>
            </div>
          </div>
          <blockquote class="text-muted fs-sm fst-italic border-start border-3 border-primary ps-3 my-3" style="line-height: 1.6; min-height: 68px;">
            "Praktik langsung dengan mesin industri membuat saya tidak canggung saat terjun ke dunia kerja. Guru-guru membimbing dengan telaten hingga saya benar-benar menguasai mesin perkakas CNC."
          </blockquote>
        </div>
        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
          <span class="badge bg-light text-muted border fs-xs"><i class="bi bi-clock me-1"></i> Ditambahkan 2024</span>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="editTestimoni('Dewi Sartika', 'TPM', '2019', 'Teknisi CNC di PT. Astra Honda Motor', 'Praktik langsung dengan mesin industri membuat saya tidak kaget saat terjun ke dunia kerja. Guru-guru membimbing dengan sabar hingga saya benar-benar kompeten.')">
              <i class="bi bi-pencil me-1"></i> Edit
            </button>
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusTestimoni(this, 'Dewi Sartika')">
              <i class="bi bi-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Testimoni 3: Tekstil -->
    <div class="col-lg-4 col-md-6 testi-item">
      <div class="card p-4 h-100 shadow-sm border-0 d-flex flex-column justify-content-between" style="border-radius: var(--radius-xl); border: 1px solid rgba(11, 19, 15, 0.06) !important;">
        <div>
          <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
            <span class="badge bg-warning-subtle text-warning fw-bold" style="font-size: 0.72rem; letter-spacing: 0.03em;">Landing Page #3</span>
            <div class="form-check form-switch m-0 d-flex align-items-center gap-1">
              <input class="form-check-input" type="checkbox" id="testi-3" checked onchange="toggleTestiStatus(this, 'Rizky Ramadhan')">
              <label class="form-check-label fs-xs fw-semibold text-muted" for="testi-3">Aktif</label>
            </div>
          </div>
          <div class="d-flex align-items-center gap-3 mb-3">
            <img src="https://ui-avatars.com/api/?name=Rizky+Ramadhan&background=fb923c&color=0b130f&size=80&bold=true" alt="Rizky Ramadhan" class="rounded-circle border" style="width: 52px; height: 52px; object-fit: cover; flex-shrink: 0;">
            <div>
              <h6 class="fw-bold mb-0 text-main testi-name">Rizky Ramadhan</h6>
              <div class="text-warning fs-xs fw-bold testi-jurusan">Tekstil (TPK) &bull; Lulusan 2021</div>
              <div class="text-muted fs-xs testi-job">Supervisor Produksi di PT. Sritex</div>
            </div>
          </div>
          <blockquote class="text-muted fs-sm fst-italic border-start border-3 border-warning ps-3 my-3" style="line-height: 1.6; min-height: 68px;">
            "Dari SMKN 2 saya belajar disiplin tinggi dan ketelitian yang sangat berguna di industri tekstil. Bekal soft skill dan mentalitas kerja benar-benar membedakan saya di pabrik modern."
          </blockquote>
        </div>
        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
          <span class="badge bg-light text-muted border fs-xs"><i class="bi bi-clock me-1"></i> Ditambahkan 2024</span>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="editTestimoni('Rizky Ramadhan', 'TPK', '2021', 'Supervisor Produksi di PT. Sritex', 'Dari SMKN 2 saya belajar disiplin dan ketelitian yang sangat berguna di industri tekstil. Bekal soft skill yang diajarkan benar-benar membedakan saya di tempat kerja.')">
              <i class="bi bi-pencil me-1"></i> Edit
            </button>
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusTestimoni(this, 'Rizky Ramadhan')">
              <i class="bi bi-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
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
        <form id="formTambahTesti">
          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="tambahNamaTesti">Nama Lengkap Alumni</label>
              <input type="text" class="form-control-custom" id="tambahNamaTesti" placeholder="Contoh: Muhammad Farhan Pratama" required>
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="tambahJurusanTesti">Jurusan Alumni</label>
              <select class="form-select-custom" id="tambahJurusanTesti">
                <option value="RPL" selected>Rekayasa Perangkat Lunak (RPL)</option>
                <option value="TPM">Teknik Pemesinan (TPM)</option>
                <option value="TPK">Teknik Pembuatan Kain (TPK)</option>
                <option value="TOT">Teknik Ototronik (TOT)</option>
              </select>
            </div>
            <div class="col-md-2">
              <label class="form-label-custom" for="tambahTahunTesti">Tahun Lulus</label>
              <input type="number" class="form-control-custom" id="tambahTahunTesti" value="2022">
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahPekerjaanTesti">Pekerjaan &amp; Instansi / Perusahaan Saat Ini</label>
              <input type="text" class="form-control-custom" id="tambahPekerjaanTesti" placeholder="Contoh: Frontend Software Engineer di PT. Astra International Tbk">
              <div class="form-text-custom">Informasi karir atau perguruan tinggi tempat studi lanjut alumni.</div>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahPesanTesti">Pesan Ulasan / Testimoni Lengkap</label>
              <textarea class="form-control-custom" id="tambahPesanTesti" rows="4" placeholder="Tuliskan pengalaman berharga, ilmu praktis, dan kesan mendalam selama menempuh pendidikan di SMKN 2 Karanganyar..."></textarea>
            </div>

            <div class="col-12">
              <div class="form-switch-custom">
                <input class="form-switch-input-custom" type="checkbox" id="checkTayangTesti" checked>
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
        <form id="formEditTesti">
          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label-custom" for="editNamaTesti">Nama Lengkap Alumni</label>
              <input type="text" class="form-control-custom" id="editNamaTesti" required>
            </div>
            <div class="col-md-3">
              <label class="form-label-custom" for="editJurusanTesti">Jurusan Alumni</label>
              <select class="form-select-custom" id="editJurusanTesti">
                <option value="RPL">Rekayasa Perangkat Lunak</option>
                <option value="TPM">Teknik Pemesinan</option>
                <option value="TPK">Teknik Pembuatan Kain</option>
                <option value="TOT">Teknik Ototronik</option>
              </select>
            </div>
            <div class="col-md-2">
              <label class="form-label-custom" for="editTahunTesti">Tahun Lulus</label>
              <input type="number" class="form-control-custom" id="editTahunTesti">
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editPekerjaanTesti">Pekerjaan &amp; Perusahaan</label>
              <input type="text" class="form-control-custom" id="editPekerjaanTesti">
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="editPesanTesti">Ulasan Testimoni</label>
              <textarea class="form-control-custom" id="editPesanTesti" rows="4"></textarea>
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
function editTestimoni(nama, jurusan, tahun, pekerjaan, pesan) {
  document.getElementById('editNamaTesti').value = nama;
  document.getElementById('editJurusanTesti').value = jurusan;
  document.getElementById('editTahunTesti').value = tahun;
  document.getElementById('editPekerjaanTesti').value = pekerjaan;
  document.getElementById('editPesanTesti').value = pesan;

  const modalEl = document.getElementById('modalEditTesti');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function simpanTambahTesti() {
  const nama = document.getElementById('tambahNamaTesti').value;
  if (!nama) {
    alert('Silakan masukkan nama alumni!');
    return;
  }
  const modalEl = document.getElementById('modalTambahTesti');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  alert('Testimoni alumni "' + nama + '" berhasil disimpan!');
}

function simpanEditTesti() {
  const nama = document.getElementById('editNamaTesti').value;
  const modalEl = document.getElementById('modalEditTesti');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  alert('Perubahan testimoni alumni "' + nama + '" berhasil disimpan!');
}

function hapusTestimoni(btn, nama) {
  if (confirm('Apakah Anda yakin ingin menghapus testimoni dari ' + nama + '?')) {
    const cardCol = btn.closest('.testi-item');
    if (cardCol) {
      cardCol.style.opacity = '0.3';
      setTimeout(() => {
        cardCol.remove();
        alert('Testimoni ' + nama + ' berhasil dihapus.');
      }, 250);
    }
  }
}

function toggleTestiStatus(checkbox, nama) {
  const status = checkbox.checked ? 'diaktifkan' : 'dinonaktifkan';
  alert('Status penayangan testimoni ' + nama + ' berhasil ' + status + '.');
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
