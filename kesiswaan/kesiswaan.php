<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kesiswaan | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <style>
    .ks-hero {
      padding: 8rem 0 5rem;
      position: relative;
      overflow: hidden;
      background-color: var(--surface);
    }
    .ks-hero-bg {
      position: absolute;
      inset: 0;
      z-index: 0;
      background-image: radial-gradient(circle at 2px 2px, rgba(0,110,47,0.07) 1px, transparent 0);
      background-size: 28px 28px;
    }
    .ks-hero-glow {
      position: absolute;
      border-radius: 50%;
      filter: blur(100px);
      pointer-events: none;
      z-index: 0;
    }
    .ks-hero-glow-1 {
      width: 500px; height: 500px;
      background: rgba(34,197,94,0.08);
      top: -200px; right: -100px;
    }
    .ks-hero-glow-2 {
      width: 400px; height: 400px;
      background: rgba(34,197,94,0.05);
      bottom: -150px; left: -80px;
    }
    .ks-hero-inner {
      position: relative;
      z-index: 2;
      display: grid;
      grid-template-columns: 1fr;
      gap: 3rem;
      align-items: center;
    }
    @media (min-width: 768px) {
      .ks-hero-inner {
        grid-template-columns: 1fr 1fr;
      }
    }
    .ks-hero-text {
      display: flex;
      flex-direction: column;
      gap: 1.25rem;
    }
    .ks-hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      width: fit-content;
      padding: 0.375rem 1rem;
      border-radius: 999px;
      border: 1px solid rgba(34,197,94,0.25);
      background: rgba(34,197,94,0.08);
      color: var(--primary-dark);
      font-size: 0.8125rem;
      font-weight: 700;
      letter-spacing: 0.05em;
      text-transform: uppercase;
    }
    .ks-hero-text h1 {
      font-family: var(--font-heading);
      font-size: 2.75rem;
      font-weight: 800;
      line-height: 1.15;
      letter-spacing: -0.02em;
      color: var(--on-surface);
    }
    .ks-hero-text h1 span {
      color: var(--primary-dark);
      position: relative;
    }
    .ks-hero-text h1 span::after {
      content: '';
      position: absolute;
      bottom: 4px;
      left: 0;
      right: 0;
      height: 6px;
      background: rgba(34,197,94,0.2);
      border-radius: 3px;
      z-index: -1;
    }
    .ks-hero-text p {
      color: var(--secondary);
      font-size: 1.05rem;
      line-height: 1.7;
      max-width: 36rem;
    }
    .ks-hero-stats {
      display: flex;
      gap: 2rem;
      margin-top: 0.5rem;
    }
    .ks-hero-stat {
      display: flex;
      flex-direction: column;
      gap: 0.125rem;
    }
    .ks-hero-stat-num {
      font-family: var(--font-heading);
      font-size: 1.5rem;
      font-weight: 800;
      color: var(--primary-dark);
      line-height: 1;
    }
    .ks-hero-stat-label {
      font-size: 0.8rem;
      color: var(--secondary);
    }
    .ks-hero-visual {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
      position: relative;
    }
    .ks-hero-visual-card {
      background: #fff;
      border-radius: 16px;
      padding: 1.5rem;
      border: 1px solid #e8f0e8;
      box-shadow: 0 4px 16px rgba(0,0,0,0.03);
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      gap: 0.5rem;
      transition: all 0.3s;
    }
    .ks-hero-visual-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 32px rgba(0,110,47,0.08);
    }
    .ks-hero-visual-card .icon {
      width: 48px;
      height: 48px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
    }
    .ks-hero-visual-card .label {
      font-weight: 700;
      font-size: 0.9rem;
      color: var(--on-surface);
    }
    .ks-hero-visual-card .count {
      font-size: 0.8rem;
      color: var(--secondary);
    }
    .ks-section {
      padding: 5rem 0;
    }
    .ks-section-alt {
      background: var(--surface-container-low);
    }
    .ks-card-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
      margin-top: 3rem;
    }
    @media (min-width: 640px) {
      .ks-card-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    .ks-card {
      background: #fff;
      border-radius: 18px;
      padding: 2rem;
      border: 1px solid #e8f0e8;
      transition: all 0.3s;
    }
    .ks-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 32px rgba(0,110,47,0.08);
    }
    .ks-card-img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 12px;
      margin-bottom: 1.25rem;
    }
    .ks-card h3 {
      font-family: var(--font-heading);
      font-size: 1.1rem;
      font-weight: 700;
      color: var(--on-surface);
      margin-bottom: 0.5rem;
    }
    .ks-card p {
      color: var(--secondary);
      font-size: 0.9rem;
      line-height: 1.7;
    }
    .ks-prestasi-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.375rem;
      padding: 0.25rem 0.75rem;
      border-radius: 999px;
      font-size: 0.75rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }
    .badge-emas { background: #fff8e1; color: #f57f17; }
    .badge-perak { background: #f5f5f5; color: #616161; }
    .badge-perunggu { background: #fce4ec; color: #c62828; }
    .badge-juara { background: #e8f5e9; color: #2e7d32; }
    .eks-icon {
      width: 48px;
      height: 48px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1rem;
      font-size: 1.5rem;
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>

    <!-- HERO -->
    <section class="ks-hero">
      <div class="ks-hero-bg"></div>
      <div class="ks-hero-glow ks-hero-glow-1"></div>
      <div class="ks-hero-glow ks-hero-glow-2"></div>
      <div class="container">
        <div class="ks-hero-inner">
          <div class="ks-hero-text hero-entrance">
            <div class="ks-hero-badge">
              <span class="material-symbols-outlined icon-sm">groups</span>
              Pembinaan Siswa
            </div>
            <h1>Wadah Pengembangan <span>Minat &amp; Bakat</span> Siswa</h1>
            <p>Berbagai program kesiswaan dirancang untuk mengembangkan potensi akademik, minat, bakat, dan karakter kepemimpinan siswa SMKN 2 Karanganyar.</p>
            <div class="ks-hero-stats">
              <div class="ks-hero-stat">
                <span class="ks-hero-stat-num">7+</span>
                <span class="ks-hero-stat-label">Ekskul Aktif</span>
              </div>
              <div class="ks-hero-stat">
                <span class="ks-hero-stat-num">50+</span>
                <span class="ks-hero-stat-label">Prestasi</span>
              </div>
              <div class="ks-hero-stat">
                <span class="ks-hero-stat-num">100%</span>
                <span class="ks-hero-stat-label">Partisipasi</span>
              </div>
            </div>
          </div>
          <div class="ks-hero-visual" data-animate>
            <div class="ks-hero-visual-card">
              <div class="icon" style="background:#e8f5e9;color:#2e7d32;">
                <span class="material-symbols-outlined icon-fill">emoji_events</span>
              </div>
              <span class="label">Prestasi</span>
              <span class="count">Raih juara &amp; penghargaan</span>
            </div>
            <div class="ks-hero-visual-card">
              <div class="icon" style="background:#e3f2fd;color:#1565c0;">
                <span class="material-symbols-outlined icon-fill">sports_esports</span>
              </div>
              <span class="label">Ekstrakurikuler</span>
              <span class="count">7+ pilihan kegiatan</span>
            </div>
            <div class="ks-hero-visual-card">
              <div class="icon" style="background:#fff3e0;color:#e65100;">
                <span class="material-symbols-outlined icon-fill">groups</span>
              </div>
              <span class="label">Organisasi</span>
              <span class="count">OSIS &amp; MPK</span>
            </div>
            <div class="ks-hero-visual-card">
              <div class="icon" style="background:#fce4ec;color:#c62828;">
                <span class="material-symbols-outlined icon-fill">favorite</span>
              </div>
              <span class="label">Bakat</span>
              <span class="count">Pengembangan diri</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- PRESTASI -->
    <section class="ks-section">
      <div class="container">
        <div class="section-header">
          <div>
            <h2 class="section-title">Prestasi Siswa</h2>
            <p class="section-subtitle">Berbagai pencapaian membanggakan yang telah ditorehkan oleh siswa-siswi SMKN 2 Karanganyar.</p>
          </div>
          <a href="prestasi.php" class="section-link">
            Lihat Semua
            <span class="material-symbols-outlined icon-lg">east</span>
          </a>
        </div>
        <div class="ks-card-grid" data-animate>
          <div class="ks-card">
            <img class="ks-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1oQITlQxReSzB_iV4d4_8TBuxQ-GZNqW_LJJjMb_ludZiWGYQuAMtmFGechN-618UO8F3DFV6DcXRbgUvE-AnSJQnbZDfzclQ94bXkvN_3t7lu8TUhGv55Xu_CsZ_Ar0Vw6clauRRop2rUJrgG-VTc7TO6_82q_kpoZOOEqAcPzBkeEJH0XbCwWYblItMIRtd7q-3Nv0W8JNn_HKY_qbW_CTlPqmTo2GMs6Crt0mEt2A-jlIe7TQ8ARPYrLJoPajF0a56BpFTX8M" alt="Prestasi LKS">
            <div class="ks-prestasi-badge badge-emas">
              <span class="material-symbols-outlined icon-xs">emoji_events</span> Juara 1
            </div>
            <h3>Lomba Kompetensi Siswa (LKS) Tingkat Provinsi</h3>
            <p>Siswa jurusan Teknik Ototronik berhasil meraih juara 1 pada ajang LKS tingkat Jawa Tengah bidang Robotika dan Otomasi Industri.</p>
          </div>
          <div class="ks-card">
            <img class="ks-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmOxjGHf9fVTfNVGMb_-5Zg0_wNdDJErJo3WY-SIDSLqXGmUEwxH_lweYGi9OHqBEusCYeno7Z7I-xbo2Ihg90N0jOJf5liGSpdKZDXA4e_oUM26vsscb1SnkPyLxmHqSPtX_1XYNuKQdhXVBBej0iDf3_y0lJGgJcOaYj7iS-XWq_B9pGeq3Jgd2yUKEB6k35nfOtqRbNEgrZPjywp6BsmNcVfgc20epHBYJAw1taWEXhPB-cHpSiS5zBsgbOh6MPNWI25omxSF0" alt="Prestasi LKS Nasional">
            <div class="ks-prestasi-badge badge-juara">
              <span class="material-symbols-outlined icon-xs">emoji_events</span> Juara 2
            </div>
            <h3>LKS Tingkat Nasional Bidang CNC</h3>
            <p>Mesin mengharumkan nama sekolah dengan meraih medali perak pada LKS Nasional 2023 di bidang Computer Numerical Control.</p>
          </div>
          <div class="ks-card">
            <img class="ks-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3_aUhUZkEJ9ijlY6KCG87Z7SUfq4-IRaNqNP95zosXcQaSGJF_KFJCp_jJB3EjHKGWm8QrU7IM7Q3d3RXqe0Ku8G407h5lV5jljQTYgD1wn3Tz_y6LeyVlTFQ6AfvYpU8F-pL0h-wcXyC83wkTibzzXMB7DycGWa0RKlVrgpztiKVutAAM05V_gSVhkfwhTbsICB3iN9tI4FS1LsdLDrrQ7vg4a498iLmmByBp3JdDsfnl2oAMJOrQIbqIIQUPoQmN4ghmver2V0" alt="Prestasi Robotik">
            <div class="ks-prestasi-badge badge-perak">
              <span class="material-symbols-outlined icon-xs">emoji_events</span> Juara 3
            </div>
            <h3>Kontes Robotika Indonesia</h3>
            <p>Tim robotik SMKN 2 Karanganyar berhasil masuk babak final dan meraih juara 3 pada Kontes Robotika tingkat nasional.</p>
          </div>
          <div class="ks-card">
            <img class="ks-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAR6u9lB4fwZ1GSdURK-YFBsWlOlcol9arlvZp64eAHYjdMp88kK8UnK6vg4AJxyV1HqsCTvsR_9pmFTgwmz6xm2wd7zadqLJRajyQziTajNEnv6yxPcT7oSuXLKIubghNObb0IX8CZrPM5KZ-YBgEk64E3Z_UGplcSFXeeQnqag_4FFovAx2r5CVNDIuj38wTXu9VSvXsHubWi318mTGNmUcQWXcffb6iJc8_uWszQLuAY-FbB0sU4LQILmzzjC46a1H6-wpbNW-8" alt="Prestasi OSN">
            <div class="ks-prestasi-badge badge-juara">
              <span class="material-symbols-outlined icon-xs">emoji_events</span> Finalis
            </div>
            <h3>Olimpiade Sains Nasional 2023</h3>
            <p>Dua siswa SMKN 2 Karanganyar lolos sebagai finalis OSN bidang Matematika dan Fisika tingkat provinsi.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- EKSTRAKURIKULER -->
    <section class="ks-section ks-section-alt">
      <div class="container">
        <div class="section-header">
          <div>
            <h2 class="section-title">Ekstrakurikuler</h2>
            <p class="section-subtitle">Berbagai kegiatan ekstrakurikuler untuk mengembangkan minat dan bakat siswa di luar akademik.</p>
          </div>
          <a href="ekstrakurikuler.php" class="section-link">
            Lihat Semua
            <span class="material-symbols-outlined icon-lg">east</span>
          </a>
        </div>
        <div class="ks-card-grid" data-animate>
          <div class="ks-card">
            <div class="eks-icon" style="background:#e8f5e9;color:#2e7d32;">
              <span class="material-symbols-outlined icon-fill">groups</span>
            </div>
            <h3>OSIS</h3>
            <p>Organisasi intra sekolah yang menjadi wadah pengembangan jiwa kepemimpinan, organisasi, dan demokrasi siswa.</p>
          </div>
          <div class="ks-card">
            <div class="eks-icon" style="background:#fff3e0;color:#e65100;">
              <span class="material-symbols-outlined icon-fill">medical_services</span>
            </div>
            <h3>PMR</h3>
            <p>Palang Merah Remaja yang melatih kepedulian sosial, pertolongan pertama, dan kesiapsiagaan bencana.</p>
          </div>
          <div class="ks-card">
            <div class="eks-icon" style="background:#e3f2fd;color:#1565c0;">
              <span class="material-symbols-outlined icon-fill">flag</span>
            </div>
            <h3>Paskibra</h3>
            <p>Pasukan pengibar bendera yang membentuk karakter disiplin, tanggung jawab, dan semangat nasionalisme.</p>
          </div>
          <div class="ks-card">
            <div class="eks-icon" style="background:#fce4ec;color:#c62828;">
              <span class="material-symbols-outlined icon-fill">forest</span>
            </div>
            <h3>Ambalan</h3>
            <p>Kegiatan kepramukaan tingkat penegak yang mengembangkan kemandirian, kepemimpinan, dan kecintaan alam.</p>
          </div>
          <div class="ks-card">
            <div class="eks-icon" style="background:#f3e5f5;color:#7b1fa2;">
              <span class="material-symbols-outlined icon-fill">mosque</span>
            </div>
            <h3>Rohis</h3>
            <p>Rohani Islam sebagai wadah pengembangan keimanan, akhlak mulia, dan kegiatan keagamaan siswa muslim.</p>
          </div>
          <div class="ks-card">
            <div class="eks-icon" style="background:#e0f7fa;color:#00838f;">
              <span class="material-symbols-outlined icon-fill">newspaper</span>
            </div>
            <h3>Jurnalistik</h3>
            <p>Mengembangkan kemampuan menulis, reportase, dan publikasi berita sekolah melalui media cetak dan digital.</p>
          </div>
        </div>
      </div>
    </section>

  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/kesiswaan.js?v=1"></script>
  <script>initPage();</script>
</body>
</html>
