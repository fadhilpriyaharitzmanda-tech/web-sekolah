<?php
require_once __DIR__ . '/../config/database.php';
try {
    $pdo = getDbConnection();
    $jurusanList = $pdo->query("SELECT * FROM jurusan WHERE status = 'Aktif' ORDER BY urutan ASC, id ASC")->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $jurusanList = [];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jurusan | SMKN 2 Karanganyar</title>
  <!-- Favicon Logo SMKN 2 Karanganyar -->
  <link rel="icon" type="image/png" href="../logo/smkn2kra.png">
  <link rel="shortcut icon" href="../logo/smkn2kra.png">
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <style>
    .container {
      font-family: 'Inter', sans-serif;
    }

    .jurusan-hero{padding:8rem 0 4rem;text-align:center;background:linear-gradient(180deg,var(--surface) 0%,rgba(34,197,94,0.04) 100%)}
    .jurusan-hero h1{font-family:var(--font-heading);font-size:2.5rem;font-weight:800;color:var(--primary-dark);margin-bottom:.75rem}
    .jurusan-hero p{color:var(--secondary);max-width:36rem;margin:0 auto;font-size:1.05rem;line-height:1.7}
    .jur-grid{display:grid;grid-template-columns:1fr;gap:1.5rem}
    @media(min-width:640px){.jur-grid{grid-template-columns:repeat(2,1fr)}}
    @media(min-width:1024px){.jur-grid{grid-template-columns:repeat(3,1fr)}}
    .jur-card{background:#fff;border-radius:20px;border:1px solid var(--outline-variant);overflow:hidden;transition:all .3s;position:relative}
    .jur-card:hover{transform:translateY(-4px);box-shadow:0 16px 40px -8px rgba(0,0,0,0.1)}
    .jur-banner{grid-column:1/-1;display:flex;flex-direction:column;border-radius:20px;overflow:hidden;position:relative;border:1.5px solid var(--mc,var(--outline-variant));transition:all .3s}
    .jur-banner:hover{transform:translateY(-4px);box-shadow:0 16px 40px -8px rgba(0,0,0,0.1)}
    @media(min-width:768px){.jur-banner{flex-direction:row}}
    .jur-banner-img{width:100%;display:flex;align-items:center;justify-content:center;padding:2rem;background:color-mix(in srgb,var(--mc,var(--primary)) 8%,#fafafa);min-height:180px}
    @media(min-width:768px){.jur-banner-img{width:40%;min-height:240px}}
    .jur-banner-img img{width:80%;max-width:200px;height:auto;object-fit:contain;transition:transform .5s;filter:drop-shadow(0 4px 12px rgba(0,0,0,0.1))}
    .jur-banner:hover .jur-banner-img img{transform:scale(1.08) translateY(-4px)}
    .jur-banner-body{flex:1;padding:1.75rem 2rem;display:flex;flex-direction:column;justify-content:center}
    .jur-badge{display:inline-block;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:.25rem .7rem;border-radius:999px;background:color-mix(in srgb,var(--mc,var(--primary)) 15%,transparent);color:var(--mc,var(--primary-dark));margin-bottom:.6rem;align-self:flex-start}
    .jur-banner-body h3{font-family:var(--font-heading);font-size:1.35rem;font-weight:700;color:var(--on-surface);margin-bottom:.5rem}
    .jur-banner-body p{color:var(--secondary);font-size:.92rem;line-height:1.7;margin-bottom:.75rem}
    .jur-list{display:flex;flex-wrap:wrap;gap:.4rem .75rem;list-style:none;padding:0;margin:0}
    .jur-list li{font-size:.82rem;color:var(--mc,var(--primary-dark));font-weight:600;display:flex;align-items:center;gap:.3rem}
    .jur-list li::before{content:'▸';font-weight:700}
    .jurusan-keunggulan{background:var(--surface-container-low);padding:5rem 0}
    .keunggulan-grid{display:grid;grid-template-columns:1fr;gap:1.5rem}
    @media(min-width:640px){.keunggulan-grid{grid-template-columns:repeat(2,1fr)}}
    @media(min-width:1024px){.keunggulan-grid{grid-template-columns:repeat(4,1fr)}}
    .keunggulan-item{text-align:center;padding:2rem 1.5rem;background:#fff;border-radius:16px;border:1px solid var(--outline-variant);transition:all .3s}
    .keunggulan-item:hover{transform:translateY(-4px);box-shadow:0 12px 32px rgba(0,0,0,0.06)}
    .keunggulan-item .material-symbols-outlined{font-size:2.5rem;color:var(--primary-dark);margin-bottom:1rem;font-variation-settings:'FILL'1,'wght'400,'GRAD'0,'opsz'24}
    .keunggulan-item h4{font-family:var(--font-heading);font-size:1.1rem;font-weight:700;color:var(--on-surface);margin-bottom:.5rem}
    .keunggulan-item p{color:var(--secondary);font-size:.85rem;line-height:1.6}
    @media(max-width:639px){.jur-banner-img img{max-width:150px}}

    /* TeFa Transaction Section in Jurusan */
    .jur-tefa-box {
      margin-top: 1.25rem;
      padding-top: 1rem;
      border-top: 1px dashed var(--outline-variant);
      display: flex;
      flex-direction: column;
      gap: 0.6rem;
    }
    .jur-tefa-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 0.5rem;
    }
    .jur-tefa-tag {
      font-size: 11px;
      font-weight: 700;
      color: var(--mc, var(--primary-dark));
      display: inline-flex;
      align-items: center;
      gap: 0.35rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    .jur-tefa-method {
      font-size: 11px;
      background: color-mix(in srgb, var(--mc, var(--primary)) 12%, #f8f8f8);
      color: var(--on-surface-variant);
      padding: 0.2rem 0.65rem;
      border-radius: 999px;
      font-weight: 600;
      border: 1px solid color-mix(in srgb, var(--mc, var(--primary)) 20%, transparent);
    }
    .jur-tefa-prods {
      font-size: 0.86rem;
      color: var(--secondary);
      line-height: 1.5;
    }
    .jur-btn-action {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      padding: 0.65rem 1.25rem;
      border-radius: var(--radius-lg);
      font-size: 0.86rem;
      font-weight: 700;
      background: var(--mc, var(--primary-dark));
      color: #fff;
      text-decoration: none;
      transition: all 0.2s;
      align-self: flex-start;
      margin-top: 0.4rem;
      box-shadow: 0 4px 12px color-mix(in srgb, var(--mc, var(--primary)) 30%, transparent);
    }
    .jur-btn-action:hover {
      transform: translateY(-2px);
      filter: brightness(0.92);
      color: #fff;
      box-shadow: 0 6px 16px color-mix(in srgb, var(--mc, var(--primary)) 40%, transparent);
    }
    @media(max-width:639px){
      .jur-btn-action { width: 100%; }
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>

    <!-- HERO -->
    <section class="jurusan-hero">
      <div class="container">
        <h1>PILIHAN JURUSAN UNGGULAN</h1>
        <p>Temukan program keahlian yang sesuai dengan minat dan bakatmu. Setiap jurusan dirancang dengan kurikulum berbasis industri untuk mencetak lulusan yang siap kerja.</p>
      </div>
    </section>

    <!-- JURUSAN -->
    <section class="section">
      <div class="container">
        <div class="jur-grid" data-animate>
          <?php if (!empty($jurusanList)): ?>
            <?php foreach ($jurusanList as $jur): 
              $warnaJur = !empty($jur['warna']) ? $jur['warna'] : (!empty($jur['warna_aksen']) ? $jur['warna_aksen'] : '#16a34a');
              $imgJur = !empty($jur['gambar']) ? $jur['gambar'] : 'images/3d-rpl.png';
              if (strpos($imgJur, 'http://') !== 0 && strpos($imgJur, 'https://') !== 0) {
                $imgJur = '../' . ltrim($imgJur, '/');
              }
              $singkatanJur = !empty($jur['singkatan']) ? $jur['singkatan'] : (!empty($jur['kode']) ? $jur['kode'] : 'JUR');
              $kompList = array_filter(array_map('trim', explode(',', $jur['kompetensi'] ?? ($jur['keunggulan'] ?? ''))));
              $tefaPage = 'produk-' . strtolower($singkatanJur) . '.php';
            ?>
              <div class="jur-banner" style="--mc:<?= htmlspecialchars($warnaJur) ?>">
                <div class="jur-banner-img">
                  <img src="<?= htmlspecialchars($imgJur) ?>" alt="<?= htmlspecialchars($jur['nama'] ?? '') ?>" onerror="this.src='../images/3d-rpl.png'">
                </div>
                <div class="jur-banner-body">
                  <span class="jur-badge"><?= htmlspecialchars($singkatanJur) ?></span>
                  <h3><?= htmlspecialchars($jur['nama'] ?? '') ?></h3>
                  <p><?= htmlspecialchars($jur['deskripsi'] ?? '') ?></p>
                  <ul class="jur-list">
                    <?php if (!empty($kompList)): ?>
                      <?php foreach ($kompList as $kp): ?>
                        <li><?= htmlspecialchars($kp) ?></li>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <li>Kurikulum Standar Industri</li>
                      <li>Praktik Kejuruan Terpadu</li>
                    <?php endif; ?>
                  </ul>
                  
                  <?php if (file_exists(__DIR__ . '/' . $tefaPage)): ?>
                    <div class="jur-tefa-box">
                      <div class="jur-tefa-header">
                        <span class="jur-tefa-tag">
                          <span class="material-symbols-outlined" style="font-size:14px;">terminal</span>
                          Teaching Factory (TeFa) <?= htmlspecialchars($singkatanJur) ?>
                        </span>
                      </div>
                      <a href="<?= htmlspecialchars($tefaPage) ?>" class="jur-btn-action">
                        <span>Lihat Produk &amp; Transaksi <?= htmlspecialchars($singkatanJur) ?></span>
                        <span class="material-symbols-outlined" style="font-size:16px;">arrow_forward</span>
                      </a>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <!-- TEFA & MARKETPLACE PORTAL CALLOUT -->
    <section class="section" style="background: linear-gradient(180deg, rgba(34,197,94,0.03) 0%, var(--surface-container-low) 100%); padding: 4.5rem 0; border-top: 1px solid var(--outline-variant); border-bottom: 1px solid var(--outline-variant);">
      <div class="container">
        <div style="text-align: center; max-width: 44rem; margin: 0 auto 3rem;">
          <span class="jur-badge" style="margin: 0 auto 0.75rem auto; background: rgba(34,197,94,0.15); color: var(--primary-dark);">Teaching Factory (TeFa)</span>
          <h2 style="font-family: var(--font-heading); font-size: 2rem; font-weight: 800; color: var(--primary-dark); margin-bottom: 0.75rem;">Marketplace &amp; Transaksi Karya Siswa</h2>
          <p style="color: var(--secondary); font-size: 1rem; line-height: 1.7;">Setiap jurusan memiliki lini produksi dan mekanisme transaksi tersendiri untuk memenuhi kebutuhan masyarakat dan industri secara profesional.</p>
        </div>

        <div class="keunggulan-grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;" data-animate>
          <div class="keunggulan-item" style="text-align: left; display: flex; flex-direction: column;">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
              <span class="material-symbols-outlined" style="color: #16a34a; font-size: 2rem; margin-bottom: 0;">terminal</span>
              <h4 style="margin-bottom: 0;">Produk RPL</h4>
            </div>
            <p style="margin-bottom: 1.25rem; flex-grow: 1;">Aplikasi siap pakai, template website, dan UI Kit dengan konfirmasi instan, download otomatis, dan sertifikat lisensi resmi via email.</p>
            <a href="produk-rpl.php" class="btn-nav-outline" style="justify-content: center; font-size: 0.84rem;">
              <span>Katalog RPL &amp; Download</span>
              <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_forward</span>
            </a>
          </div>

          <div class="keunggulan-item" style="text-align: left; display: flex; flex-direction: column;">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
              <span class="material-symbols-outlined" style="color: #ea580c; font-size: 2rem; margin-bottom: 0;">inventory_2</span>
              <h4 style="margin-bottom: 0;">Produk Tekstil</h4>
            </div>
            <p style="margin-bottom: 1.25rem; flex-grow: 1;">Wearpack praktik, tas totebag tenun etnik, dan syal printing dengan opsi Kurir Lokal, Ekspedisi, atau diambil langsung di kampus TeFa Gedung B.</p>
            <a href="produk-tekstil.php" class="btn-nav-outline" style="justify-content: center; font-size: 0.84rem;">
              <span>Belanja Produk Tekstil</span>
              <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_forward</span>
            </a>
          </div>

          <div class="keunggulan-item" style="text-align: left; display: flex; flex-direction: column;">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
              <span class="material-symbols-outlined" style="color: #2563eb; font-size: 2rem; margin-bottom: 0;">precision_manufacturing</span>
              <h4 style="margin-bottom: 0;">Produk &amp; Jasa Mesin</h4>
            </div>
            <p style="margin-bottom: 1.25rem; flex-grow: 1;">Suku cadang bushing/flange kuningan presisi CNC, ornamen stainless cutting, serta jasa bubut las dan perbaikan mesin perkakas.</p>
            <a href="produk-mesin.php" class="btn-nav-outline" style="justify-content: center; font-size: 0.84rem;">
              <span>Produk &amp; Jasa Mesin</span>
              <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_forward</span>
            </a>
          </div>

          <div class="keunggulan-item" style="text-align: left; display: flex; flex-direction: column;">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
              <span class="material-symbols-outlined" style="color: #dc2626; font-size: 2rem; margin-bottom: 0;">calendar_month</span>
              <h4 style="margin-bottom: 0;">Servis Ototronik</h4>
            </div>
            <p style="margin-bottom: 1.25rem; flex-grow: 1;">Sistem booking jadwal temu (appointment) servis motor, mobil, dan AC secara online. Pembayaran dilakukan di kasir bengkel setelah servis selesai.</p>
            <a href="produk-ototronik.php" class="btn-nav-outline" style="justify-content: center; font-size: 0.84rem;">
              <span>Booking Servis Bengkel</span>
              <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_forward</span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- KEUNGGULAN -->
    <section class="jurusan-keunggulan">
      <div class="container">
        <div class="section-header mb-12">
          <div>
            <h2 class="section-title">Mengapa Memilih Jurusan Ini?</h2>
            <p class="section-subtitle">Fasilitas dan dukungan terbaik untuk setiap program keahlian.</p>
          </div>
        </div>
        <div class="keunggulan-grid" data-animate>
          <div class="keunggulan-item">
            <span class="material-symbols-outlined">handshake</span>
            <h4>Link &amp; Match</h4>
            <p>Kurikulum disusun bersama mitra industri terkemuka sesuai kebutuhan dunia kerja.</p>
          </div>
          <div class="keunggulan-item">
            <span class="material-symbols-outlined">badge</span>
            <h4>Sertifikasi</h4>
            <p>Siswa berkesempatan mendapat sertifikasi nasional dan internasional.</p>
          </div>
          <div class="keunggulan-item">
            <span class="material-symbols-outlined">precision_manufacturing</span>
            <h4>Laboratorium Modern</h4>
            <p>Fasilitas praktik lengkap dengan peralatan standar industri terkini.</p>
          </div>
          <div class="keunggulan-item">
            <span class="material-symbols-outlined">work</span>
            <h4>Peluang Kerja</h4>
            <p>Jaringan luas dengan perusahaan nasional untuk penyaluran lulusan.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
      <div class="cta-glow-1"></div>
      <div class="cta-glow-2"></div>
      <div class="cta-content">
        <h2 class="cta-title">Siap Bergabung?</h2>
        <p class="cta-desc">Daftarkan dirimu sekarang dan temukan jurusan yang paling sesuai dengan passionmu.</p>
        <div class="cta-actions">
          <button class="btn-white">Daftar SPMB 2026/2027</button>
          <button class="btn-outline-white">Download Brosur</button>
        </div>
      </div>
    </section>

  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/akademik.js?v=1"></script>
  <script>initPage();</script>
</body>
</html>
