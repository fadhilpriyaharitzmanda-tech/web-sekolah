<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengumuman | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <style>
    .container {
      font-family: 'Inter', sans-serif;
    }
    .peng-page{padding:6rem 0 4rem;position:relative;overflow:hidden;background:var(--surface)}.peng-page-bg{position:absolute;inset:0;z-index:0;background-image:radial-gradient(circle at 2px 2px,rgba(0,110,47,0.06) 1px,transparent 0);background-size:28px 28px}.peng-container{position:relative;z-index:2;max-width:1120px;margin:0 auto;padding:0 1.5rem;width:100%}.peng-header{text-align:center;margin-bottom:3rem}.peng-header h1{font-family:var(--font-heading);font-size:2.25rem;font-weight:800;color:var(--primary-dark);margin-bottom:.5rem}.peng-header p{color:var(--secondary);font-size:1rem;line-height:1.6;max-width:32rem;margin:0 auto}.peng-toolbar{display:flex;flex-direction:column;gap:1rem;background:#fff;border-radius:20px;padding:1.5rem 2rem;box-shadow:0 4px 16px rgba(0,0,0,0.05),0 1px 3px rgba(0,0,0,0.04);margin-bottom:2.5rem;animation:fadeUp .6s ease-out both;animation-play-state:paused}@media(min-width:768px){.peng-toolbar{flex-direction:row;align-items:center;justify-content:space-between;padding:1.25rem 2rem}}.peng-filter{display:flex;flex-wrap:wrap;gap:6px}.peng-filter button{padding:8px 18px;border-radius:10px;border:1px solid transparent;background:transparent;color:var(--secondary);font-family:var(--font-body);font-size:13px;font-weight:500;cursor:pointer;transition:all .2s;white-space:nowrap}.peng-filter button:hover{background:rgba(0,110,47,0.05);color:var(--primary-dark)}.peng-filter button.active{background:rgba(0,110,47,0.08);color:var(--primary-dark);font-weight:600}.peng-grid{display:grid;grid-template-columns:1fr;gap:1rem}@media(min-width:640px){.peng-grid{grid-template-columns:repeat(2,1fr)}}@media(min-width:1024px){.peng-grid{grid-template-columns:repeat(3,1fr)}}.peng-card{background:#fff;border-radius:16px;border:1px solid #e8f0e8;padding:1.5rem;transition:all .3s;display:flex;flex-direction:column;gap:.75rem}.peng-card:hover{box-shadow:0 8px 24px rgba(0,110,47,0.06);border-color:#d0e0d0}.peng-card-tag{display:inline-block;width:fit-content;padding:.25rem .75rem;border-radius:999px;font-size:.7rem;font-weight:700;letter-spacing:.03em;text-transform:uppercase}.peng-card-tag.akademik{background:#e8f0fe;color:#1a73e8}.peng-card-tag.beasiswa{background:#fef3e2;color:#e67e22}.peng-card-tag.lowongan{background:#e8f8e8;color:#27ae60}.peng-card-tag.kegiatan{background:#f3e8ff;color:#8e44ad}.peng-card-date{font-size:.8rem;color:var(--secondary);display:flex;align-items:center;gap:.375rem}.peng-card-date .material-symbols-outlined{font-size:.875rem}.peng-card h3{font-family:var(--font-heading);font-size:1rem;font-weight:700;color:var(--on-surface);line-height:1.4}.peng-card p{font-size:.85rem;color:var(--secondary);line-height:1.6;flex:1}.peng-card-link{font-size:.85rem;font-weight:600;color:var(--primary-dark);text-decoration:none;display:inline-flex;align-items:center;gap:.375rem;width:fit-content}.peng-card-link:hover{text-decoration:underline}.peng-empty{grid-column:1/-1;text-align:center;padding:4rem 2rem;color:var(--secondary);display:none}
.peng-page.visible .peng-toolbar{animation-play-state:running}.peng-empty .material-symbols-outlined{font-size:3rem;color:var(--outline);margin-bottom:1rem}.peng-empty h3{font-family:var(--font-heading);font-size:1.125rem;color:var(--on-surface);margin-bottom:.5rem}
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>
    <section class="peng-page">
      <div class="peng-page-bg"></div>
      <div class="peng-container">
        <div class="peng-header hero-entrance">
          <h1>PENGUMUMAN</h1>
          <p>Informasi terbaru seputar akademik, beasiswa, lowongan, dan kegiatan sekolah.</p>
        </div>

        <div class="peng-toolbar">
          <div class="peng-filter" id="pengFilter">
            <button class="active" data-kategori="all" onclick="filterPeng(this,'all')">Semua</button>
            <button data-kategori="akademik" onclick="filterPeng(this,'akademik')">Akademik</button>
            <button data-kategori="beasiswa" onclick="filterPeng(this,'beasiswa')">Beasiswa</button>
            <button data-kategori="lowongan" onclick="filterPeng(this,'lowongan')">Lowongan</button>
            <button data-kategori="kegiatan" onclick="filterPeng(this,'kegiatan')">Kegiatan</button>
          </div>
          <div class="toolbar-search max-w-300">
            <span class="material-symbols-outlined toolbar-search-icon">search</span>
            <input type="text" id="pengSearch" placeholder="Cari pengumuman..." oninput="filterPengBySearch()">
          </div>
        </div>

        <div class="peng-grid" id="pengGrid" data-animate>
          <!-- Akademik -->
          <div class="peng-card" data-kategori="akademik">
            <span class="peng-card-tag akademik">Akademik</span>
            <div class="peng-card-date">
              <span class="material-symbols-outlined">calendar_today</span> 15 Juni 2026
            </div>
            <h3>Jadwal Ujian Akhir Semester Genap 2025/2026</h3>
            <p>Ujian Akhir Semester Genap akan dilaksanakan pada 1–10 Juli 2026. Pastikan siswa menyiapkan diri dengan belajar sungguh-sungguh.</p>
            <a class="peng-card-link" href="#">
              Selengkapnya <span class="material-symbols-outlined icon-sm">chevron_right</span>
            </a>
          </div>

          <div class="peng-card" data-kategori="akademik">
            <span class="peng-card-tag akademik">Akademik</span>
            <div class="peng-card-date">
              <span class="material-symbols-outlined">calendar_today</span> 10 Juni 2026
            </div>
            <h3>Pengumuman Kelulusan Kelas XII</h3>
            <p>Pengumuman kelulusan siswa kelas XII akan disampaikan pada 20 Juni 2026 melalui website dan papan pengumuman sekolah.</p>
            <a class="peng-card-link" href="#">
              Selengkapnya <span class="material-symbols-outlined icon-sm">chevron_right</span>
            </a>
          </div>

          <div class="peng-card" data-kategori="akademik">
            <span class="peng-card-tag akademik">Akademik</span>
            <div class="peng-card-date">
              <span class="material-symbols-outlined">calendar_today</span> 5 Juni 2026
            </div>
            <h3>Pembagian Raport Semester Genap</h3>
            <p>Pembagian raport akan dilaksanakan pada 15 Juli 2026 setelah seluruh proses penilaian selesai diproses oleh wali kelas.</p>
            <a class="peng-card-link" href="#">
              Selengkapnya <span class="material-symbols-outlined icon-sm">chevron_right</span>
            </a>
          </div>

          <!-- Beasiswa -->
          <div class="peng-card" data-kategori="beasiswa">
            <span class="peng-card-tag beasiswa">Beasiswa</span>
            <div class="peng-card-date">
              <span class="material-symbols-outlined">calendar_today</span> 12 Juni 2026
            </div>
            <h3>Beasiswa Prestasi Akademik 2026</h3>
            <p>Pendaftaran beasiswa bagi siswa berprestasi akademik dengan nilai rata-rata ≥ 85. Beasiswa mencakup SPP 1 tahun.</p>
            <a class="peng-card-link" href="#">
              Selengkapnya <span class="material-symbols-outlined icon-sm">chevron_right</span>
            </a>
          </div>

          <div class="peng-card" data-kategori="beasiswa">
            <span class="peng-card-tag beasiswa">Beasiswa</span>
            <div class="peng-card-date">
              <span class="material-symbols-outlined">calendar_today</span> 8 Juni 2026
            </div>
            <h3>Beasiswa Siswa Kurang Mampu (BSM)</h3>
            <p>Bantuan bagi siswa dari keluarga kurang mampu. Pendaftaran dibuka hingga 30 Juni 2026. Lengkapi persyaratan yang ditentukan.</p>
            <a class="peng-card-link" href="#">
              Selengkapnya <span class="material-symbols-outlined icon-sm">chevron_right</span>
            </a>
          </div>

          <div class="peng-card" data-kategori="beasiswa">
            <span class="peng-card-tag beasiswa">Beasiswa</span>
            <div class="peng-card-date">
              <span class="material-symbols-outlined">calendar_today</span> 3 Juni 2026
            </div>
            <h3>Beasiswa Tahfidz Quran</h3>
            <p>Beasiswa bagi siswa penghafal Al-Quran minimal 5 juz. Program ini merupakan kerjasama dengan Yayasan Pendidikan Islam.</p>
            <a class="peng-card-link" href="#">
              Selengkapnya <span class="material-symbols-outlined icon-sm">chevron_right</span>
            </a>
          </div>

          <!-- Lowongan -->
          <div class="peng-card" data-kategori="lowongan">
            <span class="peng-card-tag lowongan">Lowongan</span>
            <div class="peng-card-date">
              <span class="material-symbols-outlined">calendar_today</span> 14 Juni 2026
            </div>
            <h3>Lowongan Guru Honorer Kompetensi RPL</h3>
            <p>Dibutuhkan guru honorer untuk kompetensi Rekayasa Perangkat Lunak. Kualifikasi S1 Pendidikan Informatika/Teknik Informatika.</p>
            <a class="peng-card-link" href="#">
              Selengkapnya <span class="material-symbols-outlined icon-sm">chevron_right</span>
            </a>
          </div>

          <div class="peng-card" data-kategori="lowongan">
            <span class="peng-card-tag lowongan">Lowongan</span>
            <div class="peng-card-date">
              <span class="material-symbols-outlined">calendar_today</span> 10 Juni 2026
            </div>
            <h3>Rekrutmen Staff Tata Usaha</h3>
            <p>Dibutuhkan staff administrasi untuk membantu operasional sekolah. Syarat: D3 semua jurusan, mampu mengoperasikan komputer.</p>
            <a class="peng-card-link" href="#">
              Selengkapnya <span class="material-symbols-outlined icon-sm">chevron_right</span>
            </a>
          </div>

          <!-- Kegiatan -->
          <div class="peng-card" data-kategori="kegiatan">
            <span class="peng-card-tag kegiatan">Kegiatan</span>
            <div class="peng-card-date">
              <span class="material-symbols-outlined">calendar_today</span> 13 Juni 2026
            </div>
            <h3>Kegiatan Class Meeting Semester Genap</h3>
            <p>Class meeting akan diadakan pada 12–16 Juli 2026. Berbagai lomba menarik antar kelas akan memperebutkan piala bergilir.</p>
            <a class="peng-card-link" href="#">
              Selengkapnya <span class="material-symbols-outlined icon-sm">chevron_right</span>
            </a>
          </div>

          <div class="peng-card" data-kategori="kegiatan">
            <span class="peng-card-tag kegiatan">Kegiatan</span>
            <div class="peng-card-date">
              <span class="material-symbols-outlined">calendar_today</span> 7 Juni 2026
            </div>
            <h3>Kunjungan Industri ke PT Teknologi Maju</h3>
            <p>Kunjungan industri bagi siswa kelas XI akan dilaksanakan pada 25 Juli 2026. Biaya ditanggung sekolah dan mitra industri.</p>
            <a class="peng-card-link" href="#">
              Selengkapnya <span class="material-symbols-outlined icon-sm">chevron_right</span>
            </a>
          </div>

          <div class="peng-card" data-kategori="kegiatan">
            <span class="peng-card-tag kegiatan">Kegiatan</span>
            <div class="peng-card-date">
              <span class="material-symbols-outlined">calendar_today</span> 5 Juni 2026
            </div>
            <h3>Peringatan Hari Kemerdekaan ke-81</h3>
            <p>Lomba dan upacara bendera dalam rangka HUT RI ke-81 akan digelar pada 17 Agustus 2026. Seluruh siswa wajib hadir.</p>
            <a class="peng-card-link" href="#">
              Selengkapnya <span class="material-symbols-outlined icon-sm">chevron_right</span>
            </a>
          </div>
        </div>

        <div class="peng-empty" id="pengEmpty">
          <span class="material-symbols-outlined">search_off</span>
          <h3>Tidak ditemukan</h3>
          <p>Tidak ada pengumuman yang sesuai dengan filter atau pencarian.</p>
        </div>
      </div>
    </section>
  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/informasi.js?v=1"></script>
  <script>initPage();</script>
</body>
</html>
