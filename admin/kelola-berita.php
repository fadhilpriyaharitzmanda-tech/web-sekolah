<?php
/**
 * Kelola Warta & Berita Sekolah - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Kelola Berita & Warta - Admin SMKN 2 Karanganyar';
$currentPage = 'kelola-berita';
$assetsPath = 'assets/';

include 'components/header.php';
include 'components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include 'components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Kelola Berita &amp; Warta Sekolah</h1>
      <p class="page-subtitle">Publikasi warta berita, liputan prestasi, kerjasama industri, dan pengumuman yang tayang di landing page.</p>
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

  <!-- TABLE & LIST CARD -->
  <div class="table-card-custom mb-4">
    <!-- Header Control Bar -->
    <div class="table-header-control">
      <div class="table-search-box">
        <i class="bi bi-search table-search-icon"></i>
        <input type="text" class="table-search-input" placeholder="Cari judul berita atau kategori...">
      </div>
      <div class="table-filter-group">
        <select class="form-select form-select-sm" style="width: auto;">
          <option selected>Semua Kategori</option>
          <option>Prestasi</option>
          <option>Kerjasama</option>
          <option>Event</option>
          <option>Pengumuman</option>
        </select>
        <button class="btn btn-sm btn-outline-secondary" type="button">
          <i class="bi bi-arrow-clockwise"></i> Segarkan
        </button>
      </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">
      <table class="table-custom">
        <thead>
          <tr>
            <th>Gambar</th>
            <th>Judul Berita &amp; Cuplikan</th>
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
              <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1oQITlQxReSzB_iV4d4_8TBuxQ-GZNqW_LJJjMb_ludZiWGYQuAMtmFGechN-618UO8F3DFV6DcXRbgUvE-AnSJQnbZDfzclQ94bXkvN_3t7lu8TUhGv55Xu_CsZ_Ar0Vw6clauRRop2rUJrgG-VTc7TO6_82q_kpoZOOEqAcPzBkeEJH0XbCwWYblItMIRtd7q-3Nv0W8JNn_HKY_qbW_CTlPqmTo2GMs6Crt0mEt2A-jlIe7TQ8ARPYrLJoPajF0a56BpFTX8M" alt="Thumbnail" class="rounded object-fit-cover" style="width: 70px; height: 48px;">
            </td>
            <td>
              <div class="fw-bold text-main">Juara 1 Lomba Kompetensi Siswa (LKS) Tingkat Provinsi</div>
              <div class="text-muted fs-xs text-truncate" style="max-width: 380px;">Siswa SMKN 2 Karanganyar kembali menorehkan prestasi membanggakan di bidang Robotika dan Otomasi Industri tingkat wilayah...</div>
            </td>
            <td><span class="badge bg-success-subtle text-success">PRESTASI</span></td>
            <td>12 Oktober 2024</td>
            <td><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Tampil</span></td>
            <td><span class="badge-table success">Terbit</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <a href="#" class="table-btn-action" title="Lihat"><i class="bi bi-eye"></i></a>
                <a href="#" class="table-btn-action" title="Edit"><i class="bi bi-pencil"></i></a>
                <a href="#" class="table-btn-action delete" title="Hapus"><i class="bi bi-trash"></i></a>
              </div>
            </td>
          </tr>

          <!-- Item 2 (Kerjasama) -->
          <tr>
            <td style="width: 80px;">
              <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAR6u9lB4fwZ1GSdURK-YFBsWlOlcol9arlvZp64eAHYjdMp88kK8UnK6vg4AJxyV1HqsCTvsR_9pmFTgwmz6xm2wd7zadqLJRajyQziTajNEnv6yxPcT7oSuXLKIubghNObb0IX8CZrPM5KZ-YBgEk64E3Z_UGplcSFXeeQnqag_4FFovAx2r5CVNDIuj38wTXu9VSvXsHubWi318mTGNmUcQWXcffb6iJc8_uWszQLuAY-FbB0sU4LQILmzzjC46a1H6-wpbNW-8" alt="Thumbnail" class="rounded object-fit-cover" style="width: 70px; height: 48px;">
            </td>
            <td>
              <div class="fw-bold text-main">MoU Baru Bersama PT. Astra International Tbk</div>
              <div class="text-muted fs-xs text-truncate" style="max-width: 380px;">Peningkatan kualitas lulusan melalui program link and match kelas industri dan sertifikasi internasional bagi para pengajar...</div>
            </td>
            <td><span class="badge bg-primary-subtle text-primary">KERJASAMA</span></td>
            <td>08 Oktober 2024</td>
            <td><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Tampil</span></td>
            <td><span class="badge-table success">Terbit</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <a href="#" class="table-btn-action" title="Lihat"><i class="bi bi-eye"></i></a>
                <a href="#" class="table-btn-action" title="Edit"><i class="bi bi-pencil"></i></a>
                <a href="#" class="table-btn-action delete" title="Hapus"><i class="bi bi-trash"></i></a>
              </div>
            </td>
          </tr>

          <!-- Item 3 (Event) -->
          <tr>
            <td style="width: 80px;">
              <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3_aUhUZkEJ9ijlY6KCG87Z7SUfq4-IRaNqNP95zosXcQaSGJF_KFJCp_jJB3EjHKGWm8QrU7IM7Q3d3RXqe0Ku8G407h5lV5jljQTYgD1wn3Tz_y6LeyVlTFQ6AfvYpU8F-pL0h-wcXyC83wkTibzzXMB7DycGWa0RKlVrgpztiKVutAAM05V_gSVhkfwhTbsICB3iN9tI4FS1LsdLDrrQ7vg4a498iLmmByBp3JdDsfnl2oAMJOrQIbqIIQUPoQmN4ghmver2V0" alt="Thumbnail" class="rounded object-fit-cover" style="width: 70px; height: 48px;">
            </td>
            <td>
              <div class="fw-bold text-main">Workshop Transformasi Digital 4.0 Bagi Guru Vokasi</div>
              <div class="text-muted fs-xs text-truncate" style="max-width: 380px;">Mengintegrasikan teknologi Internet of Things (IoT) ke dalam modul pembelajaran praktik di semua program keahlian teknik...</div>
            </td>
            <td><span class="badge bg-warning-subtle text-warning">EVENT</span></td>
            <td>05 Oktober 2024</td>
            <td><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Tampil</span></td>
            <td><span class="badge-table success">Terbit</span></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <a href="#" class="table-btn-action" title="Lihat"><i class="bi bi-eye"></i></a>
                <a href="#" class="table-btn-action" title="Edit"><i class="bi bi-pencil"></i></a>
                <a href="#" class="table-btn-action delete" title="Hapus"><i class="bi bi-trash"></i></a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

<!-- Modal Tambah Berita -->
<div class="modal fade" id="modalTambahBerita" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Tulis Publikasi Berita / Warta Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Judul Berita</label>
            <input type="text" class="form-control" placeholder="Masukkan judul berita yang menarik...">
          </div>
          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label fs-xs fw-bold">Kategori</label>
              <select class="form-select">
                <option value="Prestasi">Prestasi</option>
                <option value="Kerjasama">Kerjasama Industri</option>
                <option value="Event">Event & Kegiatan</option>
                <option value="Pengumuman">Pengumuman Resmi</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fs-xs fw-bold">Tanggal Publikasi</label>
              <input type="date" class="form-control" value="<?= date('Y-m-d') ?>">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">URL Gambar Utama / Foto Liputan</label>
            <input type="text" class="form-control" placeholder="https://...">
          </div>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Ringkasan Singkat (Muncul di Kartu Landing Page)</label>
            <textarea class="form-control" rows="2" placeholder="Ringkasan 1-2 kalimat untuk preview di landing page..."></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label fs-xs fw-bold">Isi Konten Lengkap</label>
            <textarea class="form-control" rows="5" placeholder="Tulis artikel lengkap di sini..."></textarea>
          </div>
          <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" id="checkLandingBerita" checked>
            <label class="form-check-label fs-xs" for="checkLandingBerita">Tampilkan sebagai Top 3 di Landing Page</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success btn-sm" onclick="alert('Berita berhasil diterbitkan!');" data-bs-dismiss="modal">Publikasikan Berita</button>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/components/footer.php'; ?>
