<?php
/**
 * Kelola Warta & Berita Sekolah - Admin SMKN 2 Karanganyar
 */
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
        <div class="stat-value text-success">48 Artikel</div>
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
        <div class="stat-value text-primary">3 Warta Utama</div>
        <div class="trend-badge text-primary">
          <i class="bi bi-star-fill"></i>
          <span>Berita Terhangat</span>
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
        <div class="stat-value text-warning">22 Liputan</div>
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
        <div class="stat-value text-info">16 Rilis Pers</div>
        <div class="trend-badge text-info">
          <i class="bi bi-hand-thumbs-up-fill"></i>
          <span>Link &amp; Match Industri</span>
        </div>
      </div>
    </div>
  </div>

  <!-- TABLE & LIST CARD (NO OVERFLOW-X) -->
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
          <!-- Item 1 (Prestasi) -->
          <tr>
            <td style="width: 80px;">
              <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1oQITlQxReSzB_iV4d4_8TBuxQ-GZNqW_LJJjMb_ludZiWGYQuAMtmFGechN-618UO8F3DFV6DcXRbgUvE-AnSJQnbZDfzclQ94bXkvN_3t7lu8TUhGv55Xu_CsZ_Ar0Vw6clauRRop2rUJrgG-VTc7TO6_82q_kpoZOOEqAcPzBkeEJH0XbCwWYblItMIRtd7q-3Nv0W8JNn_HKY_qbW_CTlPqmTo2GMs6Crt0mEt2A-jlIe7TQ8ARPYrLJoPajF0a56BpFTX8M" alt="Thumbnail" class="rounded object-fit-cover border" style="width: 68px; height: 46px;" onerror="this.src='../images/logo-placeholder.png'">
            </td>
            <td class="table-cell-title text-wrap-cell">
              <div class="fw-bold text-main mb-1">Juara 1 Lomba Kompetensi Siswa (LKS) Tingkat Provinsi</div>
              <div class="text-muted fs-xs" style="line-height: 1.45;">Siswa SMKN 2 Karanganyar kembali menorehkan prestasi membanggakan di bidang Robotika dan Otomasi Industri tingkat wilayah Jawa Tengah...</div>
            </td>
            <td><span class="badge bg-success-subtle text-success fw-bold">PRESTASI</span></td>
            <td>12 Oktober 2024</td>
            <td><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Tampil</span></td>
            <td><span class="badge-table success">Terbit</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <a href="../informasi/berita.php" target="_blank" class="table-btn-action" title="Pratinjau"><i class="bi bi-eye"></i></a>
                <button type="button" class="table-btn-action" title="Edit Berita" onclick="editBerita('Juara 1 Lomba Kompetensi Siswa (LKS) Tingkat Provinsi', 'Prestasi', '2024-10-12', 'Siswa SMKN 2 Karanganyar kembali menorehkan prestasi membanggakan di bidang Robotika dan Otomasi Industri tingkat wilayah...')">
                  <i class="bi bi-pencil"></i>
                </button>
                <button type="button" class="table-btn-action delete" title="Hapus Berita" onclick="hapusBerita(this, 'Juara 1 LKS Tingkat Provinsi')">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Item 2 (Kerjasama) -->
          <tr>
            <td style="width: 80px;">
              <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAR6u9lB4fwZ1GSdURK-YFBsWlOlcol9arlvZp64eAHYjdMp88kK8UnK6vg4AJxyV1HqsCTvsR_9pmFTgwmz6xm2wd7zadqLJRajyQziTajNEnv6yxPcT7oSuXLKIubghNObb0IX8CZrPM5KZ-YBgEk64E3Z_UGplcSFXeeQnqag_4FFovAx2r5CVNDIuj38wTXu9VSvXsHubWi318mTGNmUcQWXcffb6iJc8_uWszQLuAY-FbB0sU4LQILmzzjC46a1H6-wpbNW-8" alt="Thumbnail" class="rounded object-fit-cover border" style="width: 68px; height: 46px;" onerror="this.src='../images/logo-placeholder.png'">
            </td>
            <td class="table-cell-title text-wrap-cell">
              <div class="fw-bold text-main mb-1">MoU Baru Bersama PT. Astra International Tbk</div>
              <div class="text-muted fs-xs" style="line-height: 1.45;">Peningkatan kualitas lulusan melalui program link and match kelas industri dan sertifikasi internasional bagi para pengajar vokasi...</div>
            </td>
            <td><span class="badge bg-primary-subtle text-primary fw-bold">KERJASAMA</span></td>
            <td>08 Oktober 2024</td>
            <td><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Tampil</span></td>
            <td><span class="badge-table success">Terbit</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <a href="../informasi/berita.php" target="_blank" class="table-btn-action" title="Pratinjau"><i class="bi bi-eye"></i></a>
                <button type="button" class="table-btn-action" title="Edit Berita" onclick="editBerita('MoU Baru Bersama PT. Astra International Tbk', 'Kerjasama', '2024-10-08', 'Peningkatan kualitas lulusan melalui program link and match kelas industri dan sertifikasi internasional...')">
                  <i class="bi bi-pencil"></i>
                </button>
                <button type="button" class="table-btn-action delete" title="Hapus Berita" onclick="hapusBerita(this, 'MoU Baru Bersama PT. Astra')">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Item 3 (Event) -->
          <tr>
            <td style="width: 80px;">
              <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3_aUhUZkEJ9ijlY6KCG87Z7SUfq4-IRaNqNP95zosXcQaSGJF_KFJCp_jJB3EjHKGWm8QrU7IM7Q3d3RXqe0Ku8G407h5lV5jljQTYgD1wn3Tz_y6LeyVlTFQ6AfvYpU8F-pL0h-wcXyC83wkTibzzXMB7DycGWa0RKlVrgpztiKVutAAM05V_gSVhkfwhTbsICB3iN9tI4FS1LsdLDrrQ7vg4a498iLmmByBp3JdDsfnl2oAMJOrQIbqIIQUPoQmN4ghmver2V0" alt="Thumbnail" class="rounded object-fit-cover border" style="width: 68px; height: 46px;" onerror="this.src='../images/logo-placeholder.png'">
            </td>
            <td class="table-cell-title text-wrap-cell">
              <div class="fw-bold text-main mb-1">Workshop Transformasi Digital 4.0 Bagi Guru Vokasi</div>
              <div class="text-muted fs-xs" style="line-height: 1.45;">Mengintegrasikan teknologi Internet of Things (IoT) ke dalam modul pembelajaran praktik di semua program keahlian teknik...</div>
            </td>
            <td><span class="badge bg-warning-subtle text-warning fw-bold">EVENT</span></td>
            <td>05 Oktober 2024</td>
            <td><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Tampil</span></td>
            <td><span class="badge-table success">Terbit</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <a href="../informasi/berita.php" target="_blank" class="table-btn-action" title="Pratinjau"><i class="bi bi-eye"></i></a>
                <button type="button" class="table-btn-action" title="Edit Berita" onclick="editBerita('Workshop Transformasi Digital 4.0 Bagi Guru Vokasi', 'Event', '2024-10-05', 'Mengintegrasikan teknologi Internet of Things (IoT) ke dalam modul pembelajaran praktik di semua program keahlian...')">
                  <i class="bi bi-pencil"></i>
                </button>
                <button type="button" class="table-btn-action delete" title="Hapus Berita" onclick="hapusBerita(this, 'Workshop Transformasi Digital 4.0')">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Table Pagination -->
    <div class="table-footer-control">
      <div class="table-pagination-info">
        Menampilkan <strong>1 - 3</strong> dari <strong>48</strong> Publikasi Berita Sekolah
      </div>
      <div class="table-pagination-nav">
        <button class="btn-pagination-nav" disabled><i class="bi bi-chevron-left"></i></button>
        <button class="btn-pagination-nav active">1</button>
        <button class="btn-pagination-nav">2</button>
        <button class="btn-pagination-nav">3</button>
        <button class="btn-pagination-nav"><i class="bi bi-chevron-right"></i></button>
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
        <form id="formTambahBerita">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label-custom" for="tambahJudulBerita">Judul Artikel Berita</label>
              <input type="text" class="form-control-custom" id="tambahJudulBerita" placeholder="Contoh: Siswa SMKN 2 Karanganyar Raih Medali Emas LKS Tingkat Nasional 2026" required>
              <div class="form-text-custom">Buat judul yang informatif, menarik, dan mencerminkan esensi warta kegiatan.</div>
            </div>

            <div class="col-md-6">
              <label class="form-label-custom" for="tambahKategoriBerita">Kategori Warta</label>
              <select class="form-select-custom" id="tambahKategoriBerita">
                <option value="Prestasi" selected>Prestasi &amp; Kejuaraan</option>
                <option value="Kerjasama">Kerjasama Industri (DUDI)</option>
                <option value="Event">Event &amp; Kegiatan Sekolah</option>
                <option value="Pengumuman">Pengumuman Resmi Akademik</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="tambahTanggalBerita">Tanggal Publikasi</label>
              <input type="date" class="form-control-custom" id="tambahTanggalBerita" value="<?= date('Y-m-d') ?>">
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahUrlGambar">URL Gambar Utama / Foto Liputan</label>
              <input type="text" class="form-control-custom" id="tambahUrlGambar" placeholder="https://..." value="https://lh3.googleusercontent.com/d/1BfS1eR1M3P5Qz7V8W0XyZ9AbCdEfGhIj">
              <div class="form-text-custom">Gunakan link gambar Google Drive / Web publik dengan rasio 16:9.</div>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahRingkasanBerita">Ringkasan Cuplikan (Lead/Snippet)</label>
              <textarea class="form-control-custom" id="tambahRingkasanBerita" rows="2" placeholder="Ringkasan 1-2 kalimat pengantar yang akan tampil pada preview kartu di landing page..."></textarea>
            </div>

            <div class="col-12">
              <label class="form-label-custom" for="tambahKontenBerita">Isi Konten Artikel Lengkap</label>
              <textarea class="form-control-custom" id="tambahKontenBerita" rows="5" placeholder="Tulis narasi berita lengkap, dokumentasi acara, kutipan narasumber, dan informasi penutup..."></textarea>
            </div>

            <div class="col-12">
              <div class="form-switch-custom">
                <input class="form-switch-input-custom" type="checkbox" id="checkLandingBerita" checked>
                <label class="form-label-custom mb-0" for="checkLandingBerita">Tampilkan sebagai Top 3 Highlight di Landing Page</label>
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
        <form id="formEditBerita">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label-custom" for="editJudulBerita">Judul Artikel Berita</label>
              <input type="text" class="form-control-custom" id="editJudulBerita" required>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editKategoriBerita">Kategori Warta</label>
              <select class="form-select-custom" id="editKategoriBerita">
                <option value="Prestasi">Prestasi &amp; Kejuaraan</option>
                <option value="Kerjasama">Kerjasama Industri (DUDI)</option>
                <option value="Event">Event &amp; Kegiatan Sekolah</option>
                <option value="Pengumuman">Pengumuman Resmi Akademik</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom" for="editTanggalBerita">Tanggal Publikasi</label>
              <input type="date" class="form-control-custom" id="editTanggalBerita">
            </div>
            <div class="col-12">
              <label class="form-label-custom" for="editRingkasanBerita">Ringkasan Cuplikan</label>
              <textarea class="form-control-custom" id="editRingkasanBerita" rows="3"></textarea>
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
function editBerita(judul, kategori, tanggal, ringkasan) {
  document.getElementById('editJudulBerita').value = judul;
  document.getElementById('editKategoriBerita').value = kategori;
  document.getElementById('editTanggalBerita').value = tanggal;
  document.getElementById('editRingkasanBerita').value = ringkasan;

  const modalEl = document.getElementById('modalEditBerita');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

function simpanTambahBerita() {
  const judul = document.getElementById('tambahJudulBerita').value;
  if (!judul) {
    alert('Silakan isi judul berita!');
    return;
  }
  const modalEl = document.getElementById('modalTambahBerita');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  alert('Berita "' + judul + '" berhasil diterbitkan ke website!');
}

function simpanEditBerita() {
  const judul = document.getElementById('editJudulBerita').value;
  const modalEl = document.getElementById('modalEditBerita');
  const modal = bootstrap.Modal.getInstance(modalEl);
  if (modal) modal.hide();
  alert('Berita "' + judul + '" berhasil diperbarui!');
}

function hapusBerita(btn, judul) {
  if (confirm('Hapus publikasi warta berita: "' + judul + '"?')) {
    const row = btn.closest('tr');
    if (row) {
      row.style.opacity = '0.3';
      setTimeout(() => {
        row.remove();
        alert('Berita berhasil dihapus.');
      }, 250);
    }
  }
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
