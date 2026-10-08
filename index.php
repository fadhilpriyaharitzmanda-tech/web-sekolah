<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="css/style.css?v=3">
  <style>
    .testi-section {
      padding: 5rem 0;
      background: linear-gradient(135deg, #f8fcf8 0%, #f0f7f0 100%);
    }
    .testi-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 1.5rem;
      margin-top: 2.5rem;
    }
    .testi-card {
      background: #fff;
      border-radius: 16px;
      padding: 2rem 1.5rem;
      border: 1px solid #eef5ee;
      box-shadow: 0 4px 16px rgba(0,0,0,0.02);
      transition: all 0.25s;
    }
    .testi-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 32px rgba(0,110,47,0.06);
      border-color: rgba(34,197,94,0.15);
    }
    .testi-header {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1rem;
    }
    .testi-header img {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid rgba(34,197,94,0.12);
    }
    .testi-name {
      font-weight: 700;
      font-size: 0.95rem;
      color: var(--on-surface);
    }
    .testi-info {
      font-size: 0.8rem;
      color: var(--primary-dark);
      font-weight: 600;
    }
    .testi-card blockquote {
      margin: 0;
      font-size: 0.9rem;
      line-height: 1.7;
      color: var(--secondary);
      font-style: italic;
      position: relative;
      padding-left: 1.25rem;
      border-left: 3px solid rgba(34,197,94,0.2);
    }
    .testi-card blockquote::before {
      content: '\201C';
      font-size: 2rem;
      color: rgba(34,197,94,0.15);
      position: absolute;
      top: -0.5rem;
      left: 0.25rem;
    }
  </style>
</head>

<body>

  <?php $baseNav = '';
  include 'components/navbar.php'; ?>

  <!-- MAIN -->
  <main class="pt-16">

    <!-- HERO CAROUSEL -->
    <section class="hero" id="heroCarousel">
      <div class="hero-slides">
        <!-- Slide 1 -->
        <div class="hero-slide active">
          <div class="hero-bg">
            <img src="https://lh3.googleusercontent.com/aida/AP1WRLvevxdfR6XhlXMEbZsdNFg10EUtUpgrltceK3RxVnLUp4je9-02tpF3KxuC3_lR99RDkzIFrCtl9gtDzZsUxtiXJ2gRJZrzQfIXDQeJr01oC09gcuwlzpf7_icfVnrxiwqIM4tNwHV4haL6_qaADuG3Tixo9rWsjHiV107oBe-djyjj5fpl30PhtbVne_-_hz5dbYgA33qFDs3Z3wM_cFYn3jnaRUrCheQVAOcB9uUdAcBdvEC_oYf-G_Q" alt="Gedung SMKN 2 Karanganyar">
          </div>
          <div class="hero-content">
            <div class="hero-text">
              <span class="hero-tag">Growth &amp; Precision</span>
              <h1 class="hero-title">Pusat Unggulan Pendidikan Vokasi</h1>
              <p class="hero-desc">Membentuk tenaga kerja profesional, kompeten, dan siap bersaing di era industri global melalui kurikulum berbasis teknologi.</p>
              <div class="hero-actions">
                <button class="btn-primary">
                  Explore Programs
                  <span class="material-symbols-outlined icon-sm">arrow_forward</span>
                </button>
                <button class="btn-outline-light">About Us</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="hero-slide">
          <div class="hero-bg">
            <img src="https://lh3.googleusercontent.com/aida/AP1WRLvNjZjTymzvjomDhdvzZwEZWcHKGVE7MfQ3adcAHODMKesKkoLCzIcV1FGJ-8-UiGtaDUoyoG8crqqIslaCGaqOrh95g7fRMHq2YxyQdc0AkfT5Gd6J6yqwj45D1KwqVOQK4-6uJK5P_A7rEDi0SnDZj0FhkclJPWGqH5QnTj3Ek1cb585I7_NCKwPAOqRFjDpAEPobwDwTJbDX0iXPH148pX8O5y47_m4VBx7KPdqkXj7uQUnGs7W0Ag" alt="Workshop SMKN 2 Karanganyar">
          </div>
          <div class="hero-content">
            <div class="hero-text">
              <span class="hero-tag">Link &amp; Match</span>
              <h1 class="hero-title">Pembelajaran Berbasis Industri</h1>
              <p class="hero-desc">Kurikulum yang dirancang bersama mitra industri terkemuka untuk memastikan lulusan siap kerja dan berdaya saing global.</p>
              <div class="hero-actions">
                <button class="btn-primary">Lihat Program</button>
                <button class="btn-outline-light">Mitra Industri</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="hero-slide">
          <div class="hero-bg">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1oQITlQxReSzB_iV4d4_8TBuxQ-GZNqW_LJJjMb_ludZiWGYQuAMtmFGechN-618UO8F3DFV6DcXRbgUvE-AnSJQnbZDfzclQ94bXkvN_3t7lu8TUhGv55Xu_CsZ_Ar0Vw6clauRRop2rUJrgG-VTc7TO6_82q_kpoZOOEqAcPzBkeEJH0XbCwWYblItMIRtd7q-3Nv0W8JNn_HKY_qbW_CTlPqmTo2GMs6Crt0mEt2A-jlIe7TQ8ARPYrLJoPajF0a56BpFTX8M" alt="Prestasi SMKN 2 Karanganyar">
          </div>
          <div class="hero-content">
            <div class="hero-text">
              <span class="hero-tag">Prestasi</span>
              <h1 class="hero-title">Raih Prestasi Bersama Kami</h1>
              <p class="hero-desc">Bergabunglah dengan ribuan siswa berprestasi yang telah mengharumkan nama sekolah di kancah nasional dan internasional.</p>
              <div class="hero-actions">
                <button class="btn-primary">Daftar SPMB</button>
                <button class="btn-outline-light">Galeri Prestasi</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Carousel Controls -->
      <button class="hero-arrow hero-arrow-left" aria-label="Previous slide">
        <span class="material-symbols-outlined">chevron_left</span>
      </button>
      <button class="hero-arrow hero-arrow-right" aria-label="Next slide">
        <span class="material-symbols-outlined">chevron_right</span>
      </button>

      <div class="hero-dots">
        <button class="hero-dot active" aria-label="Slide 1"></button>
        <button class="hero-dot" aria-label="Slide 2"></button>
        <button class="hero-dot" aria-label="Slide 3"></button>
      </div>
    </section>

    <!-- STATS SECTION -->
    <section class="stats-section">
      <div class="container">
        <div class="stats-grid">
          <div class="stat-item">
            <p class="stat-number">2500+</p>
            <p class="stat-label">Siswa Aktif</p>
          </div>
          <div class="stat-item">
            <p class="stat-number">45+</p>
            <p class="stat-label">Partner Industri</p>
          </div>
          <div class="stat-item">
            <p class="stat-number">100%</p>
            <p class="stat-label">Kurikulum Industri</p>
          </div>
          <div class="stat-item">
            <p class="stat-number">7+</p>
            <p class="stat-label">Eskul Prestasi</p>
          </div>
        </div>
      </div>
    </section>

    <!-- MAJORS 3D SECTION -->
    <section class="section container">
      <div class="section-header">
        <div>
          <h2 class="section-title">Pilihan Jurusan Unggulan</h2>
          <p class="section-subtitle">Kurikulum kami dirancang khusus bersama mitra industri untuk menjamin lulusan memiliki skill yang relevan dan mutakhir.</p>
        </div>
        <a href="akademik/jurusan.php" class="section-link">
          Lihat Semua Jurusan
          <span class="material-symbols-outlined icon-lg">east</span>
        </a>
      </div>

      <div class="majors-grid">
        <a class="major-card" href="#" style="--mc: #4ade80;">
          <div class="mc-img">
            <img src="images/3d-rpl.png" alt="Rekayasa Perangkat Lunak">
          </div>
          <div class="mc-body">
            <h3>Rekayasa Perangkat Lunak</h3>
            <p>Mempelajari tentang pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, dan manajemen organisasi.</p>
          </div>
        </a>
        <a class="major-card" href="#" style="--mc: #60a5fa;">
          <div class="mc-img">
            <img src="images/3d-mesin.png" alt="Teknik Pemesinan">
          </div>
          <div class="mc-body">
            <h3>Teknik Pemesinan</h3>
            <p>Mempelajari tentang cara memproduksi barang teknik dan menggunakan mesin konvensional maupun CNC.</p>
          </div>
        </a>
        <a class="major-card" href="#" style="--mc: #fb923c;">
          <div class="mc-img">
            <img src="images/3d-tekstil.png" alt="Teknik Pembuatan Kain">
          </div>
          <div class="mc-body">
            <h3>Teknik Pembuatan Kain</h3>
            <p>Mempelajari tentang desain tenun, mesin pembuatan kain, pemeliharaan, perawatan, dan pengendalian mutunya.</p>
          </div>
        </a>
        <a class="major-card" href="#" style="--mc: #f87171;">
          <div class="mc-img">
            <img src="images/3d-oto.png" alt="Teknik Ototronik">
          </div>
          <div class="mc-body">
            <h3>Teknik Ototronik</h3>
            <p>Mempelajari tentang otomotif dalam penguasaan teknologi elektronik dan kontrol pada kendaraan bermotor.</p>
          </div>
        </a>
      </div>
    </section>

    <!-- NEWS SECTION -->
    <section class="news-section">
      <div class="container">
        <div class="news-center">
          <p class="news-tag">Warta Sekolah</p>
          <h2 class="section-title mt-2">Update &amp; Berita Terbaru</h2>
        </div>
        <div class="news-grid" data-animate>
          <article class="news-card" data-kategori="Prestasi">
            <div class="news-card-img-wrap">
              <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1oQITlQxReSzB_iV4d4_8TBuxQ-GZNqW_LJJjMb_ludZiWGYQuAMtmFGechN-618UO8F3DFV6DcXRbgUvE-AnSJQnbZDfzclQ94bXkvN_3t7lu8TUhGv55Xu_CsZ_Ar0Vw6clauRRop2rUJrgG-VTc7TO6_82q_kpoZOOEqAcPzBkeEJH0XbCwWYblItMIRtd7q-3Nv0W8JNn_HKY_qbW_CTlPqmTo2GMs6Crt0mEt2A-jlIe7TQ8ARPYrLJoPajF0a56BpFTX8M" alt="Prestasi">
              <span class="news-card-tag">PRESTASI</span>
            </div>
            <div class="news-card-body">
              <time class="news-date">12 Oktober 2024</time>
              <h3 class="news-card-title">Juara 1 Lomba Kompetensi Siswa (LKS) Tingkat Provinsi</h3>
              <p class="news-card-desc">Siswa SMKN 2 Karanganyar kembali menorehkan prestasi membanggakan di bidang Robotika dan Otomasi Industri tingkat wilayah...</p>
              <a class="news-card-link" href="#">
                Baca Selengkapnya
                <span class="material-symbols-outlined icon-sm">arrow_forward</span>
              </a>
            </div>
          </article>

          <article class="news-card" data-kategori="Kerjasama">
            <div class="news-card-img-wrap">
              <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAR6u9lB4fwZ1GSdURK-YFBsWlOlcol9arlvZp64eAHYjdMp88kK8UnK6vg4AJxyV1HqsCTvsR_9pmFTgwmz6xm2wd7zadqLJRajyQziTajNEnv6yxPcT7oSuXLKIubghNObb0IX8CZrPM5KZ-YBgEk64E3Z_UGplcSFXeeQnqag_4FFovAx2r5CVNDIuj38wTXu9VSvXsHubWi318mTGNmUcQWXcffb6iJc8_uWszQLuAY-FbB0sU4LQILmzzjC46a1H6-wpbNW-8" alt="Kerjasama">
              <span class="news-card-tag">KERJASAMA</span>
            </div>
            <div class="news-card-body">
              <time class="news-date">08 Oktober 2024</time>
              <h3 class="news-card-title">MoU Baru Bersama PT. Astra International Tbk</h3>
              <p class="news-card-desc">Peningkatan kualitas lulusan melalui program link and match kelas industri dan sertifikasi internasional bagi para pengajar...</p>
              <a class="news-card-link" href="#">
                Baca Selengkapnya
                <span class="material-symbols-outlined icon-sm">arrow_forward</span>
              </a>
            </div>
          </article>

          <article class="news-card" data-kategori="Event">
            <div class="news-card-img-wrap">
              <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3_aUhUZkEJ9ijlY6KCG87Z7SUfq4-IRaNqNP95zosXcQaSGJF_KFJCp_jJB3EjHKGWm8QrU7IM7Q3d3RXqe0Ku8G407h5lV5jljQTYgD1wn3Tz_y6LeyVlTFQ6AfvYpU8F-pL0h-wcXyC83wkTibzzXMB7DycGWa0RKlVrgpztiKVutAAM05V_gSVhkfwhTbsICB3iN9tI4FS1LsdLDrrQ7vg4a498iLmmByBp3JdDsfnl2oAMJOrQIbqIIQUPoQmN4ghmver2V0" alt="Workshop">
              <span class="news-card-tag">EVENT</span>
            </div>
            <div class="news-card-body">
              <time class="news-date">05 Oktober 2024</time>
              <h3 class="news-card-title">Workshop Transformasi Digital 4.0 Bagi Guru Vokasi</h3>
              <p class="news-card-desc">Mengintegrasikan teknologi Internet of Things (IoT) ke dalam modul pembelajaran praktik di semua program keahlian teknik...</p>
              <a class="news-card-link" href="#">
                Baca Selengkapnya
                <span class="material-symbols-outlined icon-sm">arrow_forward</span>
              </a>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- ALUMNI TESTIMONIALS SECTION -->
    <section class="testi-section">
      <div class="container">
        <div class="section-header">
          <div>
            <h2 class="section-title">Apa Kata Alumni?</h2>
            <p class="section-subtitle">Cerita sukses dan pengalaman berharga dari para alumni SMKN 2 Karanganyar.</p>
          </div>
          <a href="tentang/alumni.php" class="section-link">
            Lihat Semua Alumni
            <span class="material-symbols-outlined icon-lg">east</span>
          </a>
        </div>
        <div class="testi-grid">
          <div class="testi-card">
            <div class="testi-header">
              <img src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=4ade80&color=fff&size=80" alt="Ahmad Fauzi">
              <div>
                <div class="testi-name">Ahmad Fauzi</div>
                <div class="testi-info">RPL - 2020 | Fullstack Developer</div>
              </div>
            </div>
            <blockquote>Ilmu yang saya dapat di SMKN 2 Karanganyar benar-benar menjadi fondasi karir saya di dunia teknologi. Praktik langsung dengan kurikulum industri membuat saya siap kerja.</blockquote>
          </div>
          <div class="testi-card">
            <div class="testi-header">
              <img src="https://ui-avatars.com/api/?name=Dewi+Sartika&background=60a5fa&color=fff&size=80" alt="Dewi Sartika">
              <div>
                <div class="testi-name">Dewi Sartika</div>
                <div class="testi-info">M - 2019 | Teknisi CNC di Astra Honda</div>
              </div>
            </div>
            <blockquote>Praktik langsung dengan mesin industri membuat saya tidak kaget saat terjun ke dunia kerja. Guru-guru membimbing dengan sabar hingga saya benar-benar kompeten.</blockquote>
          </div>
          <div class="testi-card">
            <div class="testi-header">
              <img src="https://ui-avatars.com/api/?name=Rizky+Ramadhan&background=fb923c&color=fff&size=80" alt="Rizky Ramadhan">
              <div>
                <div class="testi-name">Rizky Ramadhan</div>
                <div class="testi-info">TL - 2021 | Supervisor Produksi di PT. Sritex</div>
              </div>
            </div>
            <blockquote>Dari SMKN 2 saya belajar disiplin dan ketelitian yang sangat berguna di industri tekstil. Bekal soft skill yang diajarkan benar-benar membedakan saya di tempat kerja.</blockquote>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA SECTION -->
    <section class="cta-section">
      <div class="cta-glow-1"></div>
      <div class="cta-glow-2"></div>
      <div class="cta-content">
        <h2 class="cta-title">Siap Meniti Karir Masa Depan?</h2>
        <p class="cta-desc">Daftarkan diri Anda sekarang dan bergabunglah dengan ribuan alumni sukses yang telah berkarir di berbagai industri nasional dan internasional.</p>
        <div class="cta-actions">
          <button class="btn-white">Daftar SPMB 2026/2027</button>
          <button class="btn-outline-white">Download Brosur</button>
        </div>
      </div>
    </section>

  </main>

  <?php $baseFooter = '';
  include 'components/footer.php'; ?>
  <?php include 'components/backtotop.html'; ?>

  <script src="js/include.js?v=2"></script>
  <script src="js/index.js?v=1"></script>
  <script>initPage('index');</script>
</body>

</html>