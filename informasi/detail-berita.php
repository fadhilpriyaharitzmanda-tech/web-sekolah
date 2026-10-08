<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Berita | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <style>
    .detail-hero {
      padding: 10rem 0 3rem;
      position: relative;
      overflow: hidden;
      background-color: var(--surface);
    }
    .detail-hero-bg {
      position: absolute; inset: 0; z-index: 0;
      background-image: radial-gradient(circle at 2px 2px, rgba(0,110,47,0.06) 1px, transparent 0);
      background-size: 28px 28px;
    }
    .detail-hero-inner {
      position: relative; z-index: 2;
      max-width: 800px;
      margin: 0 auto;
      text-align: center;
    }
    .detail-kategori {
      display: inline-flex;
      align-items: center;
      gap: 0.375rem;
      padding: 0.375rem 1rem;
      border-radius: 999px;
      background: rgba(34,197,94,0.1);
      color: var(--primary-dark);
      font-size: 0.8rem;
      font-weight: 700;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      margin-bottom: 1.25rem;
    }
    .detail-hero-inner h1 {
      font-family: var(--font-heading);
      font-size: 2.25rem;
      font-weight: 800;
      line-height: 1.2;
      letter-spacing: -0.02em;
      color: var(--on-surface);
      margin-bottom: 1.25rem;
    }
    .detail-meta {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 1.5rem;
      flex-wrap: wrap;
      color: var(--secondary);
      font-size: 0.9rem;
    }
    .detail-meta span {
      display: inline-flex;
      align-items: center;
      gap: 0.375rem;
    }
    .detail-meta .material-symbols-outlined {
      font-size: 1.125rem;
      color: var(--primary);
    }

    .detail-gambar {
      margin-top: 2.5rem;
      border-radius: 20px;
      overflow: hidden;
      max-height: 480px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.06);
    }
    .detail-gambar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .detail-body {
      max-width: 720px;
      margin: 0 auto;
      padding: 3rem 0 4rem;
    }
    .detail-body p {
      font-size: 1.05rem;
      line-height: 1.85;
      color: var(--on-surface);
      margin-bottom: 1.5rem;
    }
    .detail-body h2 {
      font-family: var(--font-heading);
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--primary-dark);
      margin: 2.5rem 0 1rem;
    }
    .detail-body h3 {
      font-family: var(--font-heading);
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--on-surface);
      margin: 2rem 0 0.75rem;
    }
    .detail-body blockquote {
      border-left: 4px solid var(--primary);
      padding: 1rem 1.5rem;
      margin: 2rem 0;
      background: var(--surface-container-low);
      border-radius: 0 12px 12px 0;
      font-style: italic;
      color: var(--secondary);
      font-size: 1rem;
    }
    .detail-body ul, .detail-body ol {
      margin: 1rem 0 1.5rem 1.5rem;
      line-height: 1.85;
    }
    .detail-body li {
      margin-bottom: 0.5rem;
    }
    .detail-body img {
      border-radius: 14px;
      margin: 2rem 0;
      width: 100%;
    }

    .detail-nav {
      display: flex;
      justify-content: space-between;
      max-width: 720px;
      margin: 0 auto;
      padding: 2rem 0 4rem;
      border-top: 1px solid var(--outline-variant);
      gap: 1rem;
    }
    .detail-nav a {
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
    .detail-nav a:hover {
      border-color: var(--primary);
      color: var(--primary-dark);
      background: rgba(34,197,94,0.04);
    }
    .detail-nav .next {
      margin-left: auto;
    }

    .related-section {
      background: var(--surface-container-low);
      padding: 4rem 0;
    }
    .related-section .section-title {
      text-align: center;
      margin-bottom: 3rem;
    }
    .related-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }
    @media (min-width: 640px) {
      .related-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    @media (min-width: 1024px) {
      .related-grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }

    @media (max-width: 768px) {
      .detail-hero-inner h1 { font-size: 1.65rem; }
      .detail-body { padding: 2rem 0 3rem; }
      .detail-body p { font-size: 1rem; }
      .detail-nav { flex-direction: column; }
      .detail-nav .next { margin-left: 0; }
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>

    <!-- HERO -->
    <section class="detail-hero">
      <div class="detail-hero-bg"></div>
      <div class="container">
        <div class="detail-hero-inner hero-entrance">
          <span class="detail-kategori">
            <span class="material-symbols-outlined icon-sm">emoji_events</span>
            Prestasi
          </span>
          <h1>Juara 1 Lomba Kompetensi Siswa (LKS) Tingkat Provinsi Jawa Tengah</h1>
          <div class="detail-meta">
            <span>
              <span class="material-symbols-outlined">calendar_today</span>
              12 Oktober 2024
            </span>
            <span>
              <span class="material-symbols-outlined">person</span>
              Tim Redaksi
            </span>
            <span>
              <span class="material-symbols-outlined">visibility</span>
              1.234 dilihat
            </span>
          </div>
        </div>
      </div>
    </section>

    <!-- GAMBAR -->
    <section>
      <div class="container max-w-880">
        <div class="detail-gambar">
          <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1oQITlQxReSzB_iV4d4_8TBuxQ-GZNqW_LJJjMb_ludZiWGYQuAMtmFGechN-618UO8F3DFV6DcXRbgUvE-AnSJQnbZDfzclQ94bXkvN_3t7lu8TUhGv55Xu_CsZ_Ar0Vw6clauRRop2rUJrgG-VTc7TO6_82q_kpoZOOEqAcPzBkeEJH0XbCwWYblItMIRtd7q-3Nv0W8JNn_HKY_qbW_CTlPqmTo2GMs6Crt0mEt2A-jlIe7TQ8ARPYrLJoPajF0a56BpFTX8M" alt="Juara LKS">
        </div>
      </div>
    </section>

    <!-- KONTEN -->
    <section class="detail-body container">
      <p>SMKN 2 Karanganyar kembali menorehkan prestasi membanggakan di kancah pendidikan vokasi Jawa Tengah. Tim Robotika dan Otomasi Industri yang terdiri dari tiga siswa jurusan Teknik Ototronik berhasil meraih juara 1 pada ajang Lomba Kompetensi Siswa (LKS) tingkat Provinsi Jawa Tengah yang diselenggarakan di Semarang pada 10-12 Oktober 2024.</p>

      <p>Kompetisi bergengsi ini diikuti oleh puluhan sekolah menengah kejuruan dari seluruh Jawa Tengah. SMKN 2 Karanganyar berhasil unggul setelah melalui serangkaian tahapan seleksi yang ketat, mulai dari penyisihan teori, praktik perakitan sistem otomasi, hingga presentasi inovasi di hadapan dewan juri yang berasal dari praktisi industri dan akademisi.</p>

      <h2>Proses Kompetisi</h2>

      <p>Dalam perlombaan tersebut, tim SMKN 2 Karanganyar ditantang untuk merancang dan membangun sistem otomasi industri berbasis PLC (Programmable Logic Controller) yang terintegrasi dengan sensor dan aktuator. Mereka harus menyelesaikan studi kasus nyata yang sering dihadapi di dunia industri manufaktur.</p>

      <blockquote>
        "Kami sangat bangga dengan pencapaian ini. Persiapan selama tiga bulan penuh dengan latihan intensif, bimbingan dari guru pembimbing, dan dukungan dari sekolah benar-benar membuahkan hasil yang maksimal."
        <br><br>
        <strong>&mdash; Ahmad Syukri, S.Kom.</strong>, Pembimbing Tim Robotika
      </blockquote>

      <p>Ketua tim, Dimas Ardiansyah, mengungkapkan bahwa tantangan terbesar dalam kompetisi ini adalah penguasaan integrasi sistem antara perangkat keras dan perangkat lunak. "Kami harus memastikan bahwa setiap komponen bekerja secara sinkron. Kesalahan kecil pada wiring bisa menyebabkan seluruh sistem tidak berfungsi," jelasnya.</p>

      <h2>Dukungan Sekolah</h2>

      <p>Kepala SMKN 2 Karanganyar, Drs. H. Sukiman, M.Pd., menyampaikan apresiasi setinggi-tingginya atas prestasi yang diraih. Menurutnya, kemenangan ini merupakan bukti nyata dari implementasi kurikulum berbasis industri yang diterapkan di sekolah. "Kami terus berupaya meningkatkan kualitas pembelajaran praktik dan memperkuat kolaborasi dengan mitra industri agar lulusan kami benar-benar siap kerja," ujarnya.</p>

      <p>Keberhasilan ini menambah panjang daftar prestasi SMKN 2 Karanganyar di tingkat provinsi maupun nasional. Sekolah berkomitmen untuk terus mendorong siswa-siswinya agar berprestasi tidak hanya di bidang akademik, tetapi juga di bidang keterampilan vokasi yang relevan dengan kebutuhan dunia industri.</p>

      <h3>Prestasi Lain yang Pernah Diraih</h3>
      <ul>
        <li>Juara 2 LKS Tingkat Nasional Bidang CNC (2023)</li>
        <li>Juara 3 Kontes Robotika Indonesia (2023)</li>
        <li>Finalis Olimpiade Sains Nasional Bidang Matematika (2023)</li>
        <li>Juara 1 LKS Tingkat Provinsi Bidang Otomasi Industri (2024)</li>
      </ul>

      <p>Dengan semangat pantang menyerah dan kerja keras, SMKN 2 Karanganyar terus membuktikan diri sebagai salah satu sekolah vokasi terdepan di Jawa Tengah yang mampu melahirkan generasi muda yang kompeten, inovatif, dan berdaya saing global.</p>
    </section>

    <!-- NAVIGASI -->
    <div class="container">
      <div class="detail-nav">
        <a href="berita.php">
          <span class="material-symbols-outlined">chevron_left</span>
          Kembali ke Berita
        </a>
        <a href="#" class="next">
          Berita Selanjutnya
          <span class="material-symbols-outlined">chevron_right</span>
        </a>
      </div>
    </div>

    <!-- BERITA TERKAIT -->
    <section class="related-section">
      <div class="container">
        <h2 class="section-title text-center mb-12">Berita Terkait</h2>
        <div class="related-grid" data-animate>

          <article class="news-card">
            <div class="news-card-img-wrap">
              <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAR6u9lB4fwZ1GSdURK-YFBsWlOlcol9arlvZp64eAHYjdMp88kK8UnK6vg4AJxyV1HqsCTvsR_9pmFTgwmz6xm2wd7zadqLJRajyQziTajNEnv6yxPcT7oSuXLKIubghNObb0IX8CZrPM5KZ-YBgEk64E3Z_UGplcSFXeeQnqag_4FFovAx2r5CVNDIuj38wTXu9VSvXsHubWi318mTGNmUcQWXcffb6iJc8_uWszQLuAY-FbB0sU4LQILmzzjC46a1H6-wpbNW-8" alt="Kerjasama">
              <span class="news-card-tag">KERJASAMA</span>
            </div>
            <div class="news-card-body">
              <time class="news-date">08 Oktober 2024</time>
              <h3 class="news-card-title">MoU Baru Bersama PT. Astra International Tbk</h3>
              <p class="news-card-desc">Peningkatan kualitas lulusan melalui program link and match kelas industri...</p>
              <a class="news-card-link" href="#">
                Baca Selengkapnya
                <span class="material-symbols-outlined icon-sm">arrow_forward</span>
              </a>
            </div>
          </article>

          <article class="news-card">
            <div class="news-card-img-wrap">
              <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3_aUhUZkEJ9ijlY6KCG87Z7SUfq4-IRaNqNP95zosXcQaSGJF_KFJCp_jJB3EjHKGWm8QrU7IM7Q3d3RXqe0Ku8G407h5lV5jljQTYgD1wn3Tz_y6LeyVlTFQ6AfvYpU8F-pL0h-wcXyC83wkTibzzXMB7DycGWa0RKlVrgpztiKVutAAM05V_gSVhkfwhTbsICB3iN9tI4FS1LsdLDrrQ7vg4a498iLmmByBp3JdDsfnl2oAMJOrQIbqIIQUPoQmN4ghmver2V0" alt="Workshop">
              <span class="news-card-tag">EVENT</span>
            </div>
            <div class="news-card-body">
              <time class="news-date">05 Oktober 2024</time>
              <h3 class="news-card-title">Workshop Transformasi Digital 4.0 Bagi Guru Vokasi</h3>
              <p class="news-card-desc">Mengintegrasikan teknologi IoT ke dalam modul pembelajaran praktik...</p>
              <a class="news-card-link" href="#">
                Baca Selengkapnya
                <span class="material-symbols-outlined icon-sm">arrow_forward</span>
              </a>
            </div>
          </article>

          <article class="news-card">
            <div class="news-card-img-wrap">
              <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmOxjGHf9fVTfNVGMb_-5Zg0_wNdDJErJo3WY-SIDSLqXGmUEwxH_lweYGi9OHqBEusCYeno7Z7I-xbo2Ihg90N0jOJf5liGSpdKZDXA4e_oUM26vsscb1SnkPyLxmHqSPtX_1XYNuKQdhXVBBej0iDf3_y0lJGgJcOaYj7iS-XWq_B9pGeq3Jgd2yUKEB6k35nfOtqRbNEgrZPjywp6BsmNcVfgc20epHBYJAw1taWEXhPB-cHpSiS5zBsgbOh6MPNWI25omxSF0" alt="Prestasi">
              <span class="news-card-tag">PRESTASI</span>
            </div>
            <div class="news-card-body">
              <time class="news-date">12 Oktober 2023</time>
              <h3 class="news-card-title">Juara LKS Tingkat Nasional 2023</h3>
              <p class="news-card-desc">Siswa jurusan Mesin berhasil meraih medali emas dalam ajang LKS tingkat nasional...</p>
              <a class="news-card-link" href="#">
                Baca Selengkapnya
                <span class="material-symbols-outlined icon-sm">arrow_forward</span>
              </a>
            </div>
          </article>

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
