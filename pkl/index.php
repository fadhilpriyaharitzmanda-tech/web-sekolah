<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PKL | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <style>
    .pkl-hero {
      padding: 8rem 0 3rem;
      text-align: center;
      background: linear-gradient(180deg, var(--surface) 0%, rgba(34,197,94,0.04) 100%);
    }
    .pkl-hero h1 {
      font-family: var(--font-heading);
      font-size: 2.25rem;
      font-weight: 800;
      color: var(--primary-dark);
      margin-bottom: 0.5rem;
    }
    .pkl-hero p {
      color: var(--secondary);
      font-size: 1rem;
    }

    .pkl-section {
      padding: 5rem 0;
    }
    .pkl-section:nth-child(even) {
      background: linear-gradient(180deg, #f8fcf8 0%, #f0f7f0 100%);
    }

    .pkl-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 1.5rem;
      margin-top: 2.5rem;
    }
    .pkl-card {
      background: #fff;
      border-radius: 16px;
      padding: 2rem 1.5rem;
      border: 1px solid #eef5ee;
      box-shadow: 0 4px 16px rgba(0,0,0,0.02);
      transition: all 0.25s;
    }
    .pkl-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 32px rgba(0,110,47,0.06);
      border-color: rgba(34,197,94,0.15);
    }
    .pkl-card .pkl-card-icon {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1rem;
      font-size: 1.5rem;
    }
    .pkl-card h3 {
      font-size: 1.05rem;
      font-weight: 700;
      margin: 0 0 0.5rem;
      color: var(--on-surface);
    }
    .pkl-card p {
      font-size: 0.875rem;
      color: var(--secondary);
      line-height: 1.6;
      margin: 0;
    }

    .pkl-doc-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 0.75rem;
      margin-top: 2.5rem;
    }
    .pkl-doc-list li {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      background: #fff;
      border-radius: 12px;
      padding: 1rem 1.25rem;
      border: 1px solid #eef5ee;
      box-shadow: 0 2px 8px rgba(0,0,0,0.02);
      font-size: 0.9rem;
      color: var(--on-surface);
    }
    .pkl-doc-list li .material-symbols-outlined {
      color: var(--primary-dark);
      font-size: 1.25rem;
    }

    .pkl-partner-item {
      display: flex;
      align-items: center;
      gap: 1.25rem;
      background: #fff;
      border-radius: 12px;
      padding: 1.25rem 1.5rem;
      border: 1px solid #eef5ee;
      box-shadow: 0 2px 8px rgba(0,0,0,0.02);
      transition: all 0.25s;
    }
    .pkl-partner-item:hover {
      transform: translateX(4px);
      border-color: rgba(34,197,94,0.15);
      box-shadow: 0 8px 24px rgba(0,110,47,0.06);
    }
    .pkl-partner-item .partner-icon {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .pkl-partner-item .partner-info h4 {
      margin: 0 0 0.2rem;
      font-size: 0.95rem;
      font-weight: 700;
      color: var(--on-surface);
    }
    .pkl-partner-item .partner-info p {
      margin: 0;
      font-size: 0.8rem;
      color: var(--secondary);
    }

    .pkl-placement-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 1.5rem;
      margin-top: 2.5rem;
    }
    .pkl-placement-card {
      background: #fff;
      border-radius: 16px;
      padding: 2rem 1.5rem;
      border: 1px solid #eef5ee;
      box-shadow: 0 4px 16px rgba(0,0,0,0.02);
      text-align: center;
      transition: all 0.25s;
    }
    .pkl-placement-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 32px rgba(0,110,47,0.06);
      border-color: rgba(34,197,94,0.15);
    }
    .pkl-placement-card .plc-icon {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
    }
    .pkl-placement-card h4 {
      font-size: 1rem;
      font-weight: 700;
      margin: 0 0 0.5rem;
      color: var(--on-surface);
    }
    .pkl-placement-card p {
      font-size: 0.85rem;
      color: var(--secondary);
      line-height: 1.6;
      margin: 0;
    }

    .pkl-subtitle {
      font-size: 1rem;
      color: var(--secondary);
      text-align: center;
      max-width: 600px;
      margin: 0.5rem auto 0;
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>

    <!-- HERO -->
    <section class="pkl-hero">
      <div class="container">
        <h1>INFORMASI PKL</h1>
        <p>Praktik Kerja Lapangan SMKN 2 Karanganyar</p>
      </div>
    </section>

    <!-- 1. INFORMASI UMUM -->
    <section class="pkl-section" id="informasi-umum">
      <div class="container">
        <div class="section-header">
          <div>
            <h2 class="section-title">Informasi Umum</h2>
            <p class="section-subtitle">Panduan lengkap mengenai Praktik Kerja Lapangan di SMKN 2 Karanganyar</p>
          </div>
        </div>

        <div class="pkl-grid">
          <div class="pkl-card">
            <div class="pkl-card-icon" style="background:rgba(34,197,94,0.08);color:var(--primary-dark);">
              <span class="material-symbols-outlined">description</span>
            </div>
            <h3>Apa itu PKL?</h3>
            <p>Praktik Kerja Lapangan (PKL) adalah kegiatan pembelajaran yang dilaksanakan di dunia usaha atau dunia industri (DUDI) dalam rangka mengimplementasikan kompetensi yang telah diperoleh peserta didik di sekolah.</p>
          </div>

          <div class="pkl-card">
            <div class="pkl-card-icon" style="background:rgba(96,165,250,0.08);color:#2563eb;">
              <span class="material-symbols-outlined">track_changes</span>
            </div>
            <h3>Tujuan PKL</h3>
            <p>Meningkatkan kompetensi siswa sesuai bidang keahlian, menumbuhkan etos kerja, serta membangun jejaring dengan dunia industri sebagai persiapan memasuki dunia kerja.</p>
          </div>

          <div class="pkl-card">
            <div class="pkl-card-icon" style="background:rgba(251,146,60,0.08);color:#ea580c;">
              <span class="material-symbols-outlined">calendar_month</span>
            </div>
            <h3>Durasi PKL</h3>
            <p>PKL dilaksanakan selama 3&ndash;6 bulan (setara dengan 600&ndash;1200 jam pelajaran) sesuai dengan kebutuhan kompetensi masing-masing program keahlian.</p>
          </div>

          <div class="pkl-card">
            <div class="pkl-card-icon" style="background:rgba(168,85,247,0.08);color:#7c3aed;">
              <span class="material-symbols-outlined">group</span>
            </div>
            <h3>Siapa yang Wajib PKL?</h3>
            <p>Seluruh peserta didik kelas XI dan XII diwajibkan mengikuti PKL sebagai salah satu syarat kelulusan dan penerapan langsung kompetensi keahlian masing-masing.</p>
          </div>

          <div class="pkl-card">
            <div class="pkl-card-icon" style="background:rgba(239,68,68,0.08);color:#dc2626;">
              <span class="material-symbols-outlined">assignment</span>
            </div>
            <h3>Sistem Penilaian</h3>
            <p>Penilaian PKL meliputi aspek teknis (kompetensi), sikap dan perilaku, kedisiplinan, serta laporan akhir yang dievaluasi oleh pembimbing sekolah dan pembimbing industri.</p>
          </div>

          <div class="pkl-card">
            <div class="pkl-card-icon" style="background:rgba(52,211,153,0.08);color:#059669;">
              <span class="material-symbols-outlined">sync_alt</span>
            </div>
            <h3>Mekanisme PKL</h3>
            <p>Pembekalan &rarr; Penempatan &rarr; Pelaksanaan &rarr; Monitoring &rarr; Ujian PKL &rarr; Pelaporan &rarr; Sertifikasi. Setiap tahapan dikoordinasikan oleh guru pembimbing dan pihak DUDI.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- 2. ADMINISTRASI & DOKUMEN PENTING -->
    <section class="pkl-section" id="administrasi">
      <div class="container">
        <div class="section-header">
          <div>
            <h2 class="section-title">Administrasi &amp; Dokumen Penting</h2>
            <p class="section-subtitle">Persyaratan administrasi yang harus disiapkan sebelum melaksanakan PKL</p>
          </div>
        </div>

        <ul class="pkl-doc-list">
          <li>
            <span class="material-symbols-outlined">check_circle</span>
            Fotokopi Kartu Tanda Pelajar (KTP/Siswa)
          </li>
          <li>
            <span class="material-symbols-outlined">check_circle</span>
            Fotokopi Kartu Keluarga (KK)
          </li>
          <li>
            <span class="material-symbols-outlined">check_circle</span>
            Pas Foto 3x4 sebanyak 4 lembar (background merah)
          </li>
          <li>
            <span class="material-symbols-outlined">check_circle</span>
            Surat Pengajuan PKL dari Sekolah
          </li>
          <li>
            <span class="material-symbols-outlined">check_circle</span>
            Surat Keterangan Sehat dari Puskesmas/Dokter
          </li>
          <li>
            <span class="material-symbols-outlined">check_circle</span>
            Formulir Pendaftaran PKL (diisi lengkap)
          </li>
          <li>
            <span class="material-symbols-outlined">check_circle</span>
            Surat Pernyataan Kesediaan Mengikuti PKL (bermaterai)
          </li>
          <li>
            <span class="material-symbols-outlined">check_circle</span>
            Surat Izin Orang Tua / Wali
          </li>
          <li>
            <span class="material-symbols-outlined">check_circle</span>
            Curriculum Vitae (CV) / Daftar Riwayat Hidup
          </li>
          <li>
            <span class="material-symbols-outlined">check_circle</span>
            Fotokopi rapor semester 1&ndash;4 (legalisir)
          </li>
          <li>
            <span class="material-symbols-outlined">check_circle</span>
            Sertifikat atau piagam prestasi (jika ada)
          </li>
          <li>
            <span class="material-symbols-outlined">check_circle</span>
            Buku Jurnal / Logbook PKL (dari sekolah)
          </li>
        </ul>
      </div>
    </section>

    <!-- 3. BASIS DATA MITRA (DUDI) -->
    <section class="pkl-section" id="mitra">
      <div class="container">
        <div class="section-header">
          <div>
            <h2 class="section-title">Basis Data Mitra (DUDI)</h2>
            <p class="section-subtitle">Perusahaan dan industri yang telah bekerja sama dengan SMKN 2 Karanganyar</p>
          </div>
        </div>

        <div style="display:flex;flex-direction:column;gap:1rem;margin-top:2.5rem;">
          <div class="pkl-partner-item">
            <div class="partner-icon" style="background:rgba(34,197,94,0.08);color:var(--primary-dark);">
              <span class="material-symbols-outlined">precision_manufacturing</span>
            </div>
            <div class="partner-info">
              <h4>PT. Astra International Tbk</h4>
              <p>Teknik Ototronik &bull; Teknik Pemesinan &bull; RPL</p>
            </div>
          </div>

          <div class="pkl-partner-item">
            <div class="partner-icon" style="background:rgba(96,165,250,0.08);color:#2563eb;">
              <span class="material-symbols-outlined">texture</span>
            </div>
            <div class="partner-info">
              <h4>PT. Sritex</h4>
              <p>Teknik Pembuatan Kain &bull; Teknik Pemesinan</p>
            </div>
          </div>

          <div class="pkl-partner-item">
            <div class="partner-icon" style="background:rgba(251,146,60,0.08);color:#ea580c;">
              <span class="material-symbols-outlined">computer</span>
            </div>
            <div class="partner-info">
              <h4>PT. Tech Innovasi Solusindo</h4>
              <p>Rekayasa Perangkat Lunak &bull; Multimedia</p>
            </div>
          </div>

          <div class="pkl-partner-item">
            <div class="partner-icon" style="background:rgba(239,68,68,0.08);color:#dc2626;">
              <span class="material-symbols-outlined">directions_car</span>
            </div>
            <div class="partner-info">
              <h4>PT. Toyota Motor Manufacturing</h4>
              <p>Teknik Ototronik &bull; Teknik Pemesinan</p>
            </div>
          </div>

          <div class="pkl-partner-item">
            <div class="partner-icon" style="background:rgba(168,85,247,0.08);color:#7c3aed;">
              <span class="material-symbols-outlined">manufacturing</span>
            </div>
            <div class="partner-info">
              <h4>PT. Pindad (Persero)</h4>
              <p>Teknik Pemesinan &bull; Teknik Ototronik</p>
            </div>
          </div>

          <div class="pkl-partner-item">
            <div class="partner-icon" style="background:rgba(52,211,153,0.08);color:#059669;">
              <span class="material-symbols-outlined">electrical_services</span>
            </div>
            <div class="partner-info">
              <h4>PT. PLN (Persero)</h4>
              <p>Teknik Pemesinan &bull; RPL &bull; Multimedia</p>
            </div>
          </div>

          <div class="pkl-partner-item">
            <div class="partner-icon" style="background:rgba(244,63,94,0.08);color:#e11d48;">
              <span class="material-symbols-outlined">smartphone</span>
            </div>
            <div class="partner-info">
              <h4>Gojek Indonesia</h4>
              <p>Rekayasa Perangkat Lunak &bull; Multimedia</p>
            </div>
          </div>

          <div class="pkl-partner-item">
            <div class="partner-icon" style="background:rgba(14,165,233,0.08);color:#0284c7;">
              <span class="material-symbols-outlined">handyman</span>
            </div>
            <div class="partner-info">
              <h4>Bengkel Resmi Toyota &amp; Astra Honda</h4>
              <p>Teknik Ototronik &bull; Teknik Pemesinan</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 4. INFORMASI PENEMPATAN & PEMBIMBING -->
    <section class="pkl-section" id="penempatan">
      <div class="container">
        <div class="section-header">
          <div>
            <h2 class="section-title">Informasi Penempatan &amp; Pembimbing</h2>
            <p class="section-subtitle">Prosedur penempatan PKL dan peran pembimbing sekolah &amp; industri</p>
          </div>
        </div>

        <div class="pkl-placement-grid">
          <div class="pkl-placement-card">
            <div class="plc-icon" style="background:rgba(34,197,94,0.08);color:var(--primary-dark);">
              <span class="material-symbols-outlined" style="font-size:1.75rem;">how_to_reg</span>
            </div>
            <h4>Prosedur Penempatan</h4>
            <p>Siswa mengajukan permohonan penempatan melalui tim BKK &amp; Hubin. Penempatan disesuaikan dengan program keahlian, minat, serta ketersediaan kuota mitra DUDI.</p>
          </div>

          <div class="pkl-placement-card">
            <div class="plc-icon" style="background:rgba(96,165,250,0.08);color:#2563eb;">
              <span class="material-symbols-outlined" style="font-size:1.75rem;">school</span>
            </div>
            <h4>Pembimbing Sekolah</h4>
            <p>Guru pembimbing sekolah bertugas memonitoring perkembangan, memberikan arahan teknis, mengevaluasi laporan, serta menjadi penghubung antara sekolah dan pihak industri.</p>
          </div>

          <div class="pkl-placement-card">
            <div class="plc-icon" style="background:rgba(251,146,60,0.08);color:#ea580c;">
              <span class="material-symbols-outlined" style="font-size:1.75rem;">badge</span>
            </div>
            <h4>Pembimbing Industri</h4>
            <p>Pembimbing dari pihak DUDI bertugas mendampingi siswa selama PKL, memberikan instruksi praktik, menilai kinerja harian, serta memberikan feedback ke sekolah.</p>
          </div>

          <div class="pkl-placement-card">
            <div class="plc-icon" style="background:rgba(52,211,153,0.08);color:#059669;">
              <span class="material-symbols-outlined" style="font-size:1.75rem;">monitoring</span>
            </div>
            <h4>Monitoring &amp; Evaluasi</h4>
            <p>Monitoring dilakukan secara berkala melalui kunjungan langsung, komunikasi daring, serta laporan mingguan siswa. Evaluasi akhir mencakup penilaian teknis dan non-teknis.</p>
          </div>

          <div class="pkl-placement-card">
            <div class="plc-icon" style="background:rgba(168,85,247,0.08);color:#7c3aed;">
              <span class="material-symbols-outlined" style="font-size:1.75rem;">assignment_turned_in</span>
            </div>
            <h4>Laporan PKL</h4>
            <p>Setiap siswa wajib menyusun laporan PKL sebagai dokumentasi kegiatan. Laporan disusun dengan bimbingan guru pembimbing dan diujikan pada sidang PKL.</p>
          </div>

          <div class="pkl-placement-card">
            <div class="plc-icon" style="background:rgba(239,68,68,0.08);color:#dc2626;">
              <span class="material-symbols-outlined" style="font-size:1.75rem;">verified</span>
            </div>
            <h4>Sertifikasi PKL</h4>
            <p>Setelah menyelesaikan PKL, siswa memperoleh sertifikat dari mitra DUDI dan sekolah sebagai bukti kompetensi yang dapat digunakan untuk melamar pekerjaan.</p>
          </div>
        </div>
      </div>
    </section>

  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script>initPage();</script>
</body>
</html>
