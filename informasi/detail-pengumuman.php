<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Pengumuman | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <style>
    .dp-hero {
      padding: 10rem 0 3rem;
      position: relative;
      overflow: hidden;
      background-color: var(--surface);
    }
    .dp-hero-bg {
      position: absolute; inset: 0; z-index: 0;
      background-image: radial-gradient(circle at 2px 2px, rgba(0,110,47,0.06) 1px, transparent 0);
      background-size: 28px 28px;
    }
    .dp-hero-inner {
      position: relative; z-index: 2;
      max-width: 800px;
      margin: 0 auto;
      text-align: center;
    }
    .dp-kategori {
      display: inline-flex;
      align-items: center;
      gap: 0.375rem;
      padding: 0.375rem 1rem;
      border-radius: 999px;
      font-size: 0.8rem;
      font-weight: 700;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      margin-bottom: 1.25rem;
    }
    .dp-kategori.akademik { background: #e8f0fe; color: #1a73e8; }
    .dp-kategori.beasiswa { background: #fef3e2; color: #e67e22; }
    .dp-kategori.lowongan { background: #e8f8e8; color: #27ae60; }
    .dp-kategori.kegiatan { background: #f3e8ff; color: #8e44ad; }

    .dp-hero-inner h1 {
      font-family: var(--font-heading);
      font-size: 2.25rem;
      font-weight: 800;
      line-height: 1.2;
      letter-spacing: -0.02em;
      color: var(--on-surface);
      margin-bottom: 1.25rem;
    }
    .dp-meta {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 1.5rem;
      flex-wrap: wrap;
      color: var(--secondary);
      font-size: 0.9rem;
    }
    .dp-meta span {
      display: inline-flex;
      align-items: center;
      gap: 0.375rem;
    }
    .dp-meta .material-symbols-outlined {
      font-size: 1.125rem;
      color: var(--primary);
    }

    .dp-body {
      max-width: 720px;
      margin: 0 auto;
      padding: 3rem 0 4rem;
    }
    .dp-body .dp-info-box {
      background: var(--surface-container-low);
      border-radius: 16px;
      padding: 2rem;
      margin-bottom: 2.5rem;
      border: 1px solid var(--outline-variant);
    }
    .dp-body .dp-info-box .dp-info-row {
      display: flex;
      gap: 0.75rem;
      padding: 0.75rem 0;
      border-bottom: 1px solid rgba(0,0,0,0.04);
    }
    .dp-body .dp-info-box .dp-info-row:last-child {
      border-bottom: none;
    }
    .dp-body .dp-info-box .dp-info-label {
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--on-surface-variant);
      min-width: 110px;
    }
    .dp-body .dp-info-box .dp-info-value {
      font-size: 0.9rem;
      color: var(--on-surface);
    }
    .dp-body h2 {
      font-family: var(--font-heading);
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--primary-dark);
      margin: 2.5rem 0 1rem;
    }
    .dp-body h3 {
      font-family: var(--font-heading);
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--on-surface);
      margin: 2rem 0 0.75rem;
    }
    .dp-body p {
      font-size: 1.05rem;
      line-height: 1.85;
      color: var(--on-surface);
      margin-bottom: 1.5rem;
    }
    .dp-body ul, .dp-body ol {
      margin: 1rem 0 1.5rem 1.5rem;
      line-height: 1.85;
    }
    .dp-body li { margin-bottom: 0.5rem; }
    .dp-body .dp-syarat {
      background: #fff;
      border-radius: 14px;
      padding: 1.5rem 2rem;
      border: 1px solid var(--outline-variant);
      margin: 1.5rem 0;
    }
    .dp-body .dp-syarat h4 {
      font-family: var(--font-heading);
      font-size: 1rem;
      font-weight: 700;
      color: var(--primary-dark);
      margin-bottom: 0.75rem;
    }
    .dp-body .dp-syarat li {
      font-size: 0.95rem;
    }
    .dp-body .dp-cta {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.875rem 2rem;
      background: var(--primary-dark);
      color: #fff;
      border-radius: 10px;
      font-weight: 700;
      font-size: 0.95rem;
      border: none;
      cursor: pointer;
      transition: all 0.25s;
      text-decoration: none;
    }
    .dp-body .dp-cta:hover {
      background: #005a26;
      transform: translateY(-1px);
      box-shadow: 0 6px 24px rgba(0,110,47,0.25);
    }

    .dp-nav {
      display: flex;
      justify-content: space-between;
      max-width: 720px;
      margin: 0 auto;
      padding: 2rem 0 4rem;
      border-top: 1px solid var(--outline-variant);
      gap: 1rem;
    }
    .dp-nav a {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.75rem 1.5rem;
      border-radius: 10px;
      font-weight: 600;
      font-size: 0.9rem;
      color: var(--on-surface);
      border: 1px solid var(--outline-variant);
      transition: all 0.25s;
    }
    .dp-nav a:hover {
      border-color: var(--primary);
      color: var(--primary-dark);
      background: rgba(34,197,94,0.04);
    }
    .dp-nav .next { margin-left: auto; }

    @media (max-width: 768px) {
      .dp-hero-inner h1 { font-size: 1.65rem; }
      .dp-body { padding: 2rem 0 3rem; }
      .dp-body p { font-size: 1rem; }
      .dp-nav { flex-direction: column; }
      .dp-nav .next { margin-left: 0; }
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>

    <!-- HERO -->
    <section class="dp-hero">
      <div class="dp-hero-bg"></div>
      <div class="container">
        <div class="dp-hero-inner hero-entrance">
          <span class="dp-kategori akademik">
            <span class="material-symbols-outlined icon-sm">school</span>
            Akademik
          </span>
          <h1>Jadwal Ujian Akhir Semester Genap Tahun Ajaran 2025/2026</h1>
          <div class="dp-meta">
            <span>
              <span class="material-symbols-outlined">calendar_today</span>
              15 Juni 2026
            </span>
            <span>
              <span class="material-symbols-outlined">person</span>
              Bidang Akademik
            </span>
            <span>
              <span class="material-symbols-outlined">visibility</span>
              892 dilihat
            </span>
          </div>
        </div>
      </div>
    </section>

    <!-- KONTEN -->
    <section class="dp-body container">

      <div class="dp-info-box">
        <div class="dp-info-row">
          <span class="dp-info-label">Kategori</span>
          <span class="dp-info-value">Akademik</span>
        </div>
        <div class="dp-info-row">
          <span class="dp-info-label">Tanggal</span>
          <span class="dp-info-value">15 Juni 2026</span>
        </div>
        <div class="dp-info-row">
          <span class="dp-info-label">Pelaksanaan</span>
          <span class="dp-info-value">1–10 Juli 2026</span>
        </div>
        <div class="dp-info-row">
          <span class="dp-info-label">Sasaran</span>
          <span class="dp-info-value">Seluruh siswa kelas X, XI, XII</span>
        </div>
      </div>

      <p>Sehubungan dengan berakhirnya kegiatan pembelajaran semester genap tahun ajaran 2025/2026, dengan ini kami sampaikan jadwal pelaksanaan Ujian Akhir Semester (UAS) Genap yang akan dilaksanakan pada tanggal <strong>1 hingga 10 Juli 2026</strong>.</p>

      <p>Ujian ini bertujuan untuk mengukur capaian kompetensi siswa selama satu semester penuh. Seluruh siswa diwajibkan mengikuti ujian sesuai dengan jadwal yang telah ditentukan. Ketidakhadiran tanpa keterangan yang sah akan berdampak pada nilai akhir.</p>

      <h2>Ketentuan Ujian</h2>

      <div class="dp-syarat">
        <h4>Ketentuan Peserta Ujian:</h4>
        <ul>
          <li>Hadir 15 menit sebelum ujian dimulai</li>
          <li>Membawa kartu ujian dan identitas diri (Kartu Pelajar)</li>
          <li>Mengenakan seragam sekolah lengkap dan rapi</li>
          <li>Dilarang membawa perangkat elektronik kecuali yang diizinkan</li>
          <li>Tidak diperkenankan meminjam alat tulis selama ujian berlangsung</li>
        </ul>
      </div>

      <h2>Jadwal Ujian</h2>

      <p>Berikut adalah rincian jadwal ujian untuk setiap kompetensi keahlian. Siswa harap memeriksa jadwal masing-masing jurusan yang telah ditempel di papan pengumuman dan diunggah di portal siswa.</p>

      <h3>Kelompok Mata Pelajaran Umum</h3>
      <ul>
        <li>Senin, 1 Juli 2026 — Pendidikan Agama &amp; Budi Pekerti</li>
        <li>Selasa, 2 Juli 2026 — Pendidikan Pancasila &amp; Kewarganegaraan</li>
        <li>Rabu, 3 Juli 2026 — Bahasa Indonesia</li>
        <li>Kamis, 4 Juli 2026 — Matematika</li>
        <li>Jumat, 5 Juli 2026 — Bahasa Inggris</li>
      </ul>

      <h3>Kelompok Mata Pelajaran Kejuruan</h3>
      <ul>
        <li>Senin, 8 Juli 2026 — Produk Kreatif &amp; Kewirausahaan (PKK)</li>
        <li>Selasa, 9 Juli 2026 — Kompetensi Keahlian (Teori)</li>
        <li>Rabu, 10 Juli 2026 — Kompetensi Keahlian (Praktik)</li>
      </ul>

      <p>Demikian pengumuman ini disampaikan. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih. Tetap semangat belajar dan raih hasil terbaik!</p>

      <div class="flex-wrap mt-10">
        <a href="#" class="dp-cta">
          <span class="material-symbols-outlined icon-md">download</span>
          Download Jadwal PDF
        </a>
        <a href="#" class="dp-cta" style="background:transparent;color:var(--primary-dark);border:1.5px solid var(--primary-dark);">
          <span class="material-symbols-outlined icon-md">print</span>
          Cetak
        </a>
      </div>
    </section>

    <!-- NAVIGASI -->
    <div class="container">
      <div class="dp-nav">
        <a href="pengumuman.php">
          <span class="material-symbols-outlined">chevron_left</span>
          Kembali ke Pengumuman
        </a>
        <a href="#" class="next">
          Pengumuman Selanjutnya
          <span class="material-symbols-outlined">chevron_right</span>
        </a>
      </div>
    </div>

  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/informasi.js?v=1"></script>
  <script>initPage();</script>
</body>
</html>
