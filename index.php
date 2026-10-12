<?php
require_once __DIR__ . '/config/database.php';
try {
    $pdo = getDbConnection();
    $heroSlides = $pdo->query("SELECT * FROM hero_banners WHERE status = 'Aktif' ORDER BY urutan ASC, id ASC")->fetchAll(PDO::FETCH_ASSOC);
    $ctaBanner = $pdo->query("SELECT * FROM cta_banners LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    $statsList = $pdo->query("SELECT * FROM statistik_sekolah ORDER BY urutan ASC, id ASC")->fetchAll(PDO::FETCH_ASSOC);
    $jurusanList = $pdo->query("SELECT * FROM jurusan WHERE status = 'Aktif' ORDER BY urutan ASC, id ASC")->fetchAll(PDO::FETCH_ASSOC);
    $beritaList = $pdo->query("SELECT * FROM berita WHERE status = 'Publikasi' AND tampil_landing = 1 ORDER BY tanggal DESC, id DESC LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
    $testiList = $pdo->query("SELECT * FROM testimoni WHERE status = 'Aktif' ORDER BY urutan ASC, id DESC LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $heroSlides = [];
    $ctaBanner = null;
    $statsList = [];
    $jurusanList = [];
    $beritaList = [];
    $testiList = [];
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMKN 2 Karanganyar</title>
  <!-- Favicon Logo SMKN 2 Karanganyar -->
  <link rel="icon" type="image/png" href="logo/smkn2kra.png">
  <link rel="shortcut icon" href="logo/smkn2kra.png">
  <link rel="stylesheet" href="css/style.css?v=<?= time() ?>">
  <script src="js/sweetalert2.all.min.js"></script>
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
        <?php if (!empty($heroSlides)): ?>
          <?php foreach ($heroSlides as $idx => $slide): ?>
            <div class="hero-slide <?= ($idx === 0) ? 'active' : '' ?>" data-slide-index="<?= $idx ?>" data-urutan="<?= htmlspecialchars($slide['urutan']) ?>">
              <div class="hero-bg">
                <?php 
                  $imgSrc = $slide['gambar'];
                  if (empty($imgSrc)) {
                    $imgSrc = 'images/gedung.jpg';
                  } elseif (strpos($imgSrc, 'http://') !== 0 && strpos($imgSrc, 'https://') !== 0) {
                    $imgSrc = ltrim($imgSrc, '/');
                  }
                ?>
                <img src="<?= htmlspecialchars($imgSrc) ?>" alt="<?= htmlspecialchars($slide['judul']) ?>" onerror="this.onerror=null; this.src='images/gedung.jpg'">
              </div>
              <div class="hero-content">
                <div class="hero-text">
                  <?php if (!empty($slide['tagline'])): ?>
                    <span class="hero-tag"><?= htmlspecialchars($slide['tagline']) ?></span>
                  <?php endif; ?>
                  <h1 class="hero-title"><?= htmlspecialchars($slide['judul']) ?></h1>
                  <p class="hero-desc"><?= htmlspecialchars($slide['deskripsi']) ?></p>
                  <div class="hero-actions">
                    <?php if (!empty($slide['tombol1_teks'])): ?>
                      <a href="<?= htmlspecialchars(!empty($slide['tombol1_link']) ? $slide['tombol1_link'] : '#program') ?>" class="btn-primary text-decoration-none">
                        <?= htmlspecialchars($slide['tombol1_teks']) ?>
                        <span class="material-symbols-outlined icon-sm">arrow_forward</span>
                      </a>
                    <?php else: ?>
                      <a href="#program" class="btn-primary text-decoration-none">
                        Explore Programs
                        <span class="material-symbols-outlined icon-sm">arrow_forward</span>
                      </a>
                    <?php endif; ?>

                    <?php if (!empty($slide['tombol2_teks'])): ?>
                      <a href="<?= htmlspecialchars(!empty($slide['tombol2_link']) ? $slide['tombol2_link'] : '#profil') ?>" class="btn-outline-light text-decoration-none">
                        <?= htmlspecialchars($slide['tombol2_teks']) ?>
                      </a>
                    <?php else: ?>
                      <a href="#profil" class="btn-outline-light text-decoration-none">
                        About Us
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <!-- Fallback Slide 1 -->
          <div class="hero-slide active" data-slide-index="0" data-urutan="1">
            <div class="hero-bg">
              <img src="https://lh3.googleusercontent.com/aida/AP1WRLvevxdfR6XhlXMEbZsdNFg10EUtUpgrltceK3RxVnLUp4je9-02tpF3KxuC3_lR99RDkzIFrCtl9gtDzZsUxtiXJ2gRJZrzQfIXDQeJr01oC09gcuwlzpf7_icfVnrxiwqIM4tNwHV4haL6_qaADuG3Tixo9rWsjHiV107oBe-djyjj5fpl30PhtbVne_-_hz5dbYgA33qFDs3Z3wM_cFYn3jnaRUrCheQVAOcB9uUdAcBdvEC_oYf-G_Q" alt="Gedung SMKN 2 Karanganyar">
            </div>
            <div class="hero-content">
              <div class="hero-text">
                <span class="hero-tag">Growth &amp; Precision</span>
                <h1 class="hero-title">Pusat Unggulan Pendidikan Vokasi</h1>
                <p class="hero-desc">Membentuk tenaga kerja profesional, kompeten, dan siap bersaing di era industri global melalui kurikulum berbasis teknologi.</p>
                <div class="hero-actions">
                  <a href="#program" class="btn-primary text-decoration-none">
                    Explore Programs
                    <span class="material-symbols-outlined icon-sm">arrow_forward</span>
                  </a>
                  <a href="#profil" class="btn-outline-light text-decoration-none">
                    About Us
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>

      <!-- Carousel Controls -->
      <button class="hero-arrow hero-arrow-left" aria-label="Previous slide" title="Slide Sebelumnya">
        <span class="material-symbols-outlined">chevron_left</span>
      </button>
      <button class="hero-arrow hero-arrow-right" aria-label="Next slide" title="Slide Berikutnya">
        <span class="material-symbols-outlined">chevron_right</span>
      </button>

      <div class="hero-dots">
        <?php 
          $slideCount = !empty($heroSlides) ? count($heroSlides) : 1;
          for ($d = 0; $d < $slideCount; $d++): 
        ?>
          <button class="hero-dot <?= ($d === 0) ? 'active' : '' ?>" aria-label="Slide <?= $d + 1 ?>" data-slide-target="<?= $d ?>"></button>
        <?php endfor; ?>
      </div>
    </section>

    <!-- STATS SECTION -->
    <section class="stats-section">
      <div class="container">
        <div class="stats-grid">
          <?php if (!empty($statsList)): ?>
            <?php foreach ($statsList as $st): ?>
              <div class="stat-item">
                <p class="stat-number"><?= htmlspecialchars($st['nilai']) ?></p>
                <p class="stat-label"><?= htmlspecialchars($st['label']) ?></p>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="stat-item"><p class="stat-number">2500+</p><p class="stat-label">Siswa Aktif</p></div>
            <div class="stat-item"><p class="stat-number">45+</p><p class="stat-label">Partner Industri</p></div>
            <div class="stat-item"><p class="stat-number">100%</p><p class="stat-label">Kurikulum Industri</p></div>
            <div class="stat-item"><p class="stat-number">7+</p><p class="stat-label">Eskul Prestasi</p></div>
          <?php endif; ?>
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
        <?php if (!empty($jurusanList)): ?>
          <?php foreach ($jurusanList as $jur): 
            $warnaJur = !empty($jur['warna']) ? $jur['warna'] : '#4ade80';
            $imgJur = !empty($jur['gambar']) ? $jur['gambar'] : 'images/3d-rpl.png';
            if (strpos($imgJur, 'http://') !== 0 && strpos($imgJur, 'https://') !== 0) {
              $imgJur = ltrim($imgJur, '/');
            }
          ?>
            <a class="major-card" href="akademik/jurusan.php" style="--mc: <?= htmlspecialchars($warnaJur) ?>;">
              <div class="mc-img">
                <img src="<?= htmlspecialchars($imgJur) ?>" alt="<?= htmlspecialchars($jur['nama']) ?>" onerror="this.src='images/3d-rpl.png'">
              </div>
              <div class="mc-body">
                <h3><?= htmlspecialchars($jur['nama']) ?></h3>
                <p><?= htmlspecialchars($jur['deskripsi']) ?></p>
              </div>
            </a>
          <?php endforeach; ?>
        <?php else: ?>
          <a class="major-card" href="akademik/jurusan.php" style="--mc: #4ade80;">
            <div class="mc-img"><img src="images/3d-rpl.png" alt="Rekayasa Perangkat Lunak"></div>
            <div class="mc-body"><h3>Rekayasa Perangkat Lunak</h3><p>Mempelajari pengembangan aplikasi web modern, mobile, dan sistem industri.</p></div>
          </a>
        <?php endif; ?>
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
          <?php if (!empty($beritaList)): ?>
            <?php foreach ($beritaList as $b): 
              $bImg = !empty($b['gambar']) ? $b['gambar'] : 'images/gedung.jpg';
              if (strpos($bImg, 'http://') !== 0 && strpos($bImg, 'https://') !== 0) {
                $bImg = ltrim($bImg, '/');
              }
              $bDateFormatted = !empty($b['tanggal']) ? date('d F Y', strtotime($b['tanggal'])) : '';
            ?>
              <article class="news-card" data-kategori="<?= htmlspecialchars($b['kategori']) ?>">
                <div class="news-card-img-wrap">
                  <img class="news-card-img" src="<?= htmlspecialchars($bImg) ?>" alt="<?= htmlspecialchars($b['judul']) ?>" onerror="this.src='images/gedung.jpg'">
                  <span class="news-card-tag"><?= strtoupper(htmlspecialchars($b['kategori'])) ?></span>
                </div>
                <div class="news-card-body">
                  <time class="news-date"><?= htmlspecialchars($bDateFormatted) ?></time>
                  <h3 class="news-card-title"><?= htmlspecialchars($b['judul']) ?></h3>
                  <p class="news-card-desc"><?= htmlspecialchars($b['ringkasan']) ?></p>
                  <a class="news-card-link" href="informasi/berita.php">
                    Baca Selengkapnya
                    <span class="material-symbols-outlined icon-sm">arrow_forward</span>
                  </a>
                </div>
              </article>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="text-center text-muted">Belum ada berita yang dipublikasikan.</p>
          <?php endif; ?>
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
          <?php if (!empty($testiList)): ?>
            <?php foreach ($testiList as $t): 
              $tFoto = !empty($t['foto']) ? $t['foto'] : ('https://ui-avatars.com/api/?name=' . urlencode($t['nama']) . '&background=4ade80&color=fff&size=80');
              if (strpos($tFoto, 'http://') !== 0 && strpos($tFoto, 'https://') !== 0) {
                $tFoto = ltrim($tFoto, '/');
              }
            ?>
              <div class="testi-card">
                <div class="testi-header">
                  <img src="<?= htmlspecialchars($tFoto) ?>" alt="<?= htmlspecialchars($t['nama']) ?>" onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($t['nama']) ?>&background=4ade80&color=fff&size=80'">
                  <div>
                    <div class="testi-name"><?= htmlspecialchars($t['nama'] ?? '') ?></div>
                    <?php
                      $tJurusan = !empty($t['jurusan']) ? $t['jurusan'] : (!empty($t['jurusan_tahun']) ? $t['jurusan_tahun'] : 'Alumni');
                      $tAngkatan = !empty($t['tahun_lulus']) ? $t['tahun_lulus'] : ($t['angkatan'] ?? '');
                      $tPekerjaan = !empty($t['profesi']) ? $t['profesi'] : ($t['pekerjaan'] ?? '');
                      $tPerusahaan = !empty($t['perusahaan']) ? $t['perusahaan'] : '';
                    ?>
                    <div class="testi-info"><?= htmlspecialchars($tJurusan) ?><?= !empty($tAngkatan) ? ' - ' . htmlspecialchars($tAngkatan) : '' ?><?= !empty($tPekerjaan) ? ' | ' . htmlspecialchars($tPekerjaan) : '' ?><?= !empty($tPerusahaan) ? ' di ' . htmlspecialchars($tPerusahaan) : '' ?></div>
                  </div>
                </div>
                <blockquote><?= htmlspecialchars($t['testimoni'] ?? '') ?></blockquote>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="text-center text-muted">Belum ada testimoni alumni.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <!-- CTA SECTION -->
    <section class="cta-section">
      <div class="cta-glow-1"></div>
      <div class="cta-glow-2"></div>
      <div class="cta-content">
        <h2 class="cta-title"><?= htmlspecialchars($ctaBanner['judul'] ?? 'Siap Meniti Karir Masa Depan?') ?></h2>
        <p class="cta-desc"><?= htmlspecialchars($ctaBanner['deskripsi'] ?? 'Daftarkan diri Anda sekarang dan bergabunglah dengan ribuan alumni sukses yang telah berkarir di berbagai industri nasional dan internasional.') ?></p>
        <div class="cta-actions">
          <a href="<?= htmlspecialchars($ctaBanner['tombol1_link'] ?? 'layanan/ppdb.php') ?>" class="btn-white text-decoration-none">
            <?= htmlspecialchars($ctaBanner['tombol1_teks'] ?? 'Daftar SPMB 2026/2027') ?>
          </a>
          <a href="<?= htmlspecialchars($ctaBanner['tombol2_link'] ?? 'assets/brosur-smkn2kra.pdf') ?>" class="btn-outline-white text-decoration-none" target="_blank">
            <?= htmlspecialchars($ctaBanner['tombol2_teks'] ?? 'Download Brosur') ?>
          </a>
        </div>
      </div>
    </section>

  </main>

  <?php $baseFooter = '';
  include 'components/footer.php'; ?>
  <?php include 'components/backtotop.html'; ?>

  <script src="js/include.js?v=2"></script>
  <script src="js/index.js?v=<?= time() ?>"></script>
  <script>initPage('index');</script>
</body>

</html>