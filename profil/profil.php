<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Sekolah | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <style>
    .hero-profil-logo {
      width: 140px;
      height: 140px;
      object-fit: contain;
      filter: drop-shadow(0 2px 8px rgba(0,0,0,0.06));
    }
    @media (max-width: 1024px) {
      .hero-profil-logo { width: 100px; height: 100px; }
    }
    @media (max-width: 640px) {
      .hero-profil-logo { width: 80px; height: 80px; }
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <!-- MAIN -->
  <main>

    <!-- HERO PROFIL -->
    <section class="hero-profil">
      <div class="hero-profil-bg">
        <div class="hero-profil-glow hero-profil-glow-1"></div>
        <div class="hero-profil-glow hero-profil-glow-2"></div>
      </div>
      <div class="container hero-profil-inner">
        <div class="hero-profil-content hero-entrance">
          <div class="hero-profil-tag">Tentang SMKN 2 Karanganyar</div>
          <h1 class="hero-profil-title">
            Lebih dari Sekadar <br/>
            <span>Sekolah Kejuruan</span>
          </h1>
          <p class="hero-profil-desc">
            Kami adalah rumah bagi para inovator muda yang siap menaklukkan tantangan industri global. Dengan kurikulum berbasis teknologi dan mitra industri terkemuka, setiap siswa ditempa untuk menjadi pemimpin masa depan.
          </p>
          <div class="hero-profil-actions">
            <div class="hero-profil-stat">
              <span class="hero-profil-stat-num">2500+</span>
              <span class="hero-profil-stat-label">Siswa Aktif</span>
            </div>
            <div class="hero-profil-stat">
              <span class="hero-profil-stat-num">45+</span>
              <span class="hero-profil-stat-label">Mitra Industri</span>
            </div>
            <div class="hero-profil-stat">
              <span class="hero-profil-stat-num">12</span>
              <span class="hero-profil-stat-label">Program Unggulan</span>
            </div>
          </div>
        </div>
        <div class="hero-profil-visual" data-animate>
          <div class="hero-profil-card hero-profil-card-1">
            <span class="material-symbols-outlined">school</span>
            <span>Akreditasi A</span>
          </div>
          <div class="hero-profil-card hero-profil-card-2">
            <span class="material-symbols-outlined">emoji_events</span>
            <span>Juara Nasional</span>
          </div>
          <div class="hero-profil-card hero-profil-card-3">
            <span class="material-symbols-outlined">handshake</span>
            <span>Link &amp; Match</span>
          </div>
          <div class="hero-profil-circle">
            <img src="../logo/smkn2kra.png" alt="Logo SMKN 2 Karanganyar" class="hero-profil-logo">
          </div>
        </div>
      </div>
    </section>

    <!-- SEJARAH SINGKAT -->
    <section class="section container">
      <div class="sejarah-grid">
        <div class="sejarah-content">
          <h2 class="sejarah-title">Sejarah Singkat</h2>
          <div class="sejarah-text">
            <p>SMKN 2 Karanganyar berdiri sebagai wujud komitmen pemerintah dalam memperluas akses pendidikan kejuruan yang berkualitas di wilayah Kabupaten Karanganyar. Sejak awal pendiriannya, sekolah ini telah berfokus pada pengembangan keterampilan teknis yang selaras dengan kebutuhan industri.</p>
            <p>Dari tahun ke tahun, sekolah ini terus bertransformasi, mulai dari peningkatan sarana prasarana hingga penyesuaian kurikulum yang dinamis. Prestasi demi prestasi telah ditorehkan, menjadikan SMKN 2 Karanganyar sebagai salah satu institusi pendidikan rujukan di Jawa Tengah.</p>
            <p>Kini, dengan dukungan tenaga pendidik yang profesional dan fasilitas modern, kami terus bergerak maju untuk melampaui batas standar pendidikan tradisional.</p>
          </div>
        </div>
        <div class="sejarah-image-wrap">
          <div class="sejarah-border"></div>
          <img class="sejarah-image" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_SXYPcGmyuDDk27y1MY2vNOUJUXjLe0GaVZXZQg228B_uZmwgt-UA0fqW0AQ2W_cNG1hPAelMnQ2Qv-VuxQ1EgsEyotraqSTQnS1Tc10wrrnH1oF-Ke2D7CIgBIoejjMFqsVWwBYLUkkVfNfOSrBZf8OxvvpW33_FSPb5ys4NTsFGvNAx7PNUi74zwtwr2m0wmuuUIX66-NecZFn3fQxiUqx32IFSWMKRvhrtvPa3jO8SOsBiomNJ5brpOZetll7Hqog5uP9AoAA" alt="Sejarah SMKN 2 Karanganyar">
        </div>
      </div>
    </section>

    <!-- VISI & MISI -->
    <section class="section visi-misi">
      <div class="container">
        <div class="visi-misi-center">
          <h2 class="section-title">Visi &amp; Misi</h2>
          <p class="section-subtitle mt-2">Fondasi utama dalam setiap langkah transformasi kami.</p>
        </div>
        <div class="visi-misi-grid">
          <!-- Visi -->
          <div class="visi-card">
            <div class="visi-card-icon">
              <span class="material-symbols-outlined">visibility</span>
            </div>
            <h3 class="visi-card-title">Visi</h3>
            <p class="visi-card-text">&ldquo;Menjadi lembaga pendidikan kejuruan yang religius, unggul dalam prestasi, dan berwawasan lingkungan menuju persaingan global.&rdquo;</p>
          </div>
          <!-- Misi -->
          <div class="misi-card">
            <div class="misi-card-header">
              <span class="misi-card-header-icon material-symbols-outlined">rocket_launch</span>
              <h3 class="misi-card-title">Misi Kami</h3>
            </div>
            <div class="misi-grid">
              <div class="misi-item">
                <div class="misi-item-icon">
                  <span class="material-symbols-outlined">check_circle</span>
                </div>
                <div class="misi-item-body">
                  <h4 class="misi-item-title">Keimanan &amp; Ketakwaan</h4>
                  <p class="misi-item-desc">Menumbuhkembangkan keimanan dan ketaqwaan kepada Tuhan Yang Maha Esa.</p>
                </div>
              </div>
              <div class="misi-item">
                <div class="misi-item-icon">
                  <span class="material-symbols-outlined">check_circle</span>
                </div>
                <div class="misi-item-body">
                  <h4 class="misi-item-title">Mutu Pendidikan</h4>
                  <p class="misi-item-desc">Meningkatkan mutu pendidikan yang berorientasi pada kebutuhan pasar kerja.</p>
                </div>
              </div>
              <div class="misi-item">
                <div class="misi-item-icon">
                  <span class="material-symbols-outlined">check_circle</span>
                </div>
                <div class="misi-item-body">
                  <h4 class="misi-item-title">Lingkungan Asri</h4>
                  <p class="misi-item-desc">Mewujudkan lingkungan sekolah yang bersih, sehat, dan asri.</p>
                </div>
              </div>
              <div class="misi-item">
                <div class="misi-item-icon">
                  <span class="material-symbols-outlined">check_circle</span>
                </div>
                <div class="misi-item-body">
                  <h4 class="misi-item-title">Kemitraan Strategis</h4>
                  <p class="misi-item-desc">Membangun kemitraan strategis dengan Dunia Usaha dan Dunia Industri (DUDI).</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SAMBUTAN KEPALA SEKOLAH -->
    <section class="section container">
      <div class="sambutan-wrap">
        <div class="sambutan-quote-bg">
          <span class="material-symbols-outlined">format_quote</span>
        </div>
        <div class="sambutan-inner">
          <div class="sambutan-photo-wrap">
            <div class="sambutan-photo-inner">
              <div class="sambutan-glow"></div>
              <img class="sambutan-photo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAe3_YhiI3OauIB7gqWCgk2k1d6SmrvlDJnppGb-fsXJsDpWFC6Jr7X9-Uu9EfH6MWCm3A_rzyh1yvxtxCDOPmm7MTwye1NIXOd0ksV7egfc2KPpyUNFbgb6gD1SkqJEbDO2g00S2MUN67uzoPMBEUzhWAYOuMn9YUaDPaiXdLrOjARQ2t3gHCrQf687DGufExpnsMmQ4W2VAfwgktbH9p6txn08q0PzSDFAOYaDh4VbFN6ZIpbYNvPjtyDAsP_4Vg94eB-X7sn-YQ" alt="Kepala Sekolah SMKN 2 Karanganyar">
            </div>
            <div class="sambutan-name">
              <h4>Drs. H. Sukiman, M.Pd.</h4>
              <p class="sambutan-role">Kepala Sekolah</p>
            </div>
          </div>
          <div class="sambutan-text">
            <div class="sambutan-label">
              <span class="sambutan-label-icon material-symbols-outlined">format_quote</span>
              <span class="sambutan-label-text">Sambutan Hangat</span>
            </div>
            <h2 class="sambutan-title">Bersama Mencetak <span>Masa Depan</span> Gemilang</h2>
            <div class="sambutan-quotes">
              <p>&ldquo;Selamat datang di portal informasi resmi SMKN 2 Karanganyar. Sebagai garda terdepan pendidikan vokasi, kami berkomitmen untuk tidak sekadar mentransfer ilmu pengetahuan, tetapi membentuk karakter dan mentalitas pemenang bagi setiap peserta didik kami.&rdquo;</p>
              <p>&ldquo;Di era digital yang bergerak sangat dinamis ini, kami terus berinovasi untuk memastikan lulusan kami tidak hanya siap kerja, namun juga siap berkarya dan menjadi pionir di bidangnya masing-masing. Pendidikan adalah investasi terbaik untuk masa depan bangsa.&rdquo;</p>
            </div>
            <div class="mt-10">
              <button class="btn-primary">
                Baca Selengkapnya
                <span class="material-symbols-outlined icon-xs">arrow_forward</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- NEWS TEASER -->
    <section class="section container">
      <div class="section-header">
        <div>
          <h2 class="section-title">Berita Terbaru</h2>
          <p class="section-subtitle">Update terkini kegiatan dan prestasi sekolah.</p>
        </div>
        <a href="#" class="section-link">
          Semua Berita
          <span class="material-symbols-outlined icon-lg">chevron_right</span>
        </a>
      </div>
      <div class="news-grid" data-animate>
        <article class="news-card">
          <div class="news-card-img-wrap">
            <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmOxjGHf9fVTfNVGMb_-5Zg0_wNdDJErJo3WY-SIDSLqXGmUEwxH_lweYGi9OHqBEusCYeno7Z7I-xbo2Ihg90N0jOJf5liGSpdKZDXA4e_oUM26vsscb1SnkPyLxmHqSPtX_1XYNuKQdhXVBBej0iDf3_y0lJGgJcOaYj7iS-XWq_B9pGeq3Jgd2yUKEB6k35nfOtqRbNEgrZPjywp6BsmNcVfgc20epHBYJAw1taWEXhPB-cHpSiS5zBsgbOh6MPNWI25omxSF0" alt="Akademik">
            <span class="news-card-tag">AKADEMIK</span>
          </div>
          <div class="news-card-body">
            <time class="news-date">12 Oktober 2023</time>
            <h4 class="news-card-title">Juara LKS Tingkat Nasional 2023</h4>
            <p class="news-card-desc">Siswa jurusan Mesin berhasil meraih medali emas dalam ajang Lomba Kompetensi Siswa (LKS) tingkat nasional...</p>
            <a class="news-card-link" href="#">
              Baca Selengkapnya
              <span class="material-symbols-outlined icon-sm">arrow_forward</span>
            </a>
          </div>
        </article>
        <article class="news-card">
          <div class="news-card-img-wrap">
            <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAiysdXLkfH_pwudnN8iFSXFC0qsFoNkYMD7XDoLQDs2NoBl_1LfbVBsfK7blRbwddEvb5Sy1FaKPGJUUDO4xO3MMMfhk5QtnFSIWdkPaTyTh6DJQT1ga7w-UsrbDftfmQfJq9YGYHAuYzCaTUezqDbu90kRDijmJTDCP-FVxXul8Bb0szYvSj_w7NPQRax60MmLjW_837oEBQqs0mmS_lqpRctG0pOoZZzeFL3d3ktFBLnrYCQmIZjQL8tgnJ7Ot1i2MweD6p81Dw" alt="Industri">
            <span class="news-card-tag">KERJASAMA</span>
          </div>
          <div class="news-card-body">
            <time class="news-date">08 Oktober 2023</time>
            <h4 class="news-card-title">Kerjasama Baru dengan Toyota Astra</h4>
            <p class="news-card-desc">Memperkuat sinkronisasi kurikulum, sekolah secara resmi menandatangani MoU dengan PT Toyota Astra Motor...</p>
            <a class="news-card-link" href="#">
              Baca Selengkapnya
              <span class="material-symbols-outlined icon-sm">arrow_forward</span>
            </a>
          </div>
        </article>
        <article class="news-card">
          <div class="news-card-img-wrap">
            <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBi9pqVTYZxdoF_GiuAy7NYZJ8leR6lhtXLqDIq0CFw38PuSvpKwv4ohfSlFPjxwoMzpaA-yk2g3CYQ3FadAJO1IOkfbnkHDs5-d4CR1lw6mB7x4JPY8gKWOKESYroSdYJLQwLAZMvK-BsVc19X9eyEdlLfYBRdMGHHbRlkJazHVwsk4Z7RBbeSblnU9L3iSThZh_29XsBT6-0tNf5iAqwR-I2-w4Z30dpFX1o3kKablUp4xtGTlLZoIDisjoTIEh_VBXYYTW0wsV4" alt="Kegiatan">
            <span class="news-card-tag">KEGIATAN</span>
          </div>
          <div class="news-card-body">
            <time class="news-date">05 Oktober 2023</time>
            <h4 class="news-card-title">Malam Keakraban &amp; Gelar Karya</h4>
            <p class="news-card-desc">Penampilan kreativitas siswa dari berbagai ekstrakurikuler dalam memeriahkan hari jadi sekolah ke-20...</p>
            <a class="news-card-link" href="#">
              Baca Selengkapnya
              <span class="material-symbols-outlined icon-sm">arrow_forward</span>
            </a>
          </div>
        </article>
      </div>
    </section>

  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/profil.js?v=1"></script>
  <script>initPage('profil');</script>
</body>
</html>
