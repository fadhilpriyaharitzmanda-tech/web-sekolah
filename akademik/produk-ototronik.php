<?php
require_once 'data-produk.php';
$otoProducts = array_filter($PRODUCTS_LIST, function($p) {
  return $p['jurusan'] === 'ototronik';
});
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Layanan Servis Ototronik | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="stylesheet" href="../css/transaksi.css?v=2">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap">
  <style>
    :root {
      --page-accent: #dc2626;
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>

    <!-- HERO -->
    <section class="trx-page-hero">
      <div class="container">
        <span class="trx-hero-badge">
          <span class="material-symbols-outlined" style="font-size: 13px;">car_repair</span>
          Teaching Factory Teknik Ototronik
        </span>
        <h1>BENGKEL SERVIS &amp; LAYANAN OTOTRONIK</h1>
        <p>Layanan perawatan berkala motor injeksi, scan diagnostik komputer mobil cerdas OBD-II, dan pemeliharaan AC kendaraan berstandar bengkel resmi di SMKN 2 Karanganyar.</p>
      </div>
    </section>

    <!-- SECTION KONTEN UTAMA -->
    <section class="section pt-0">
      <div class="container">

        <!-- SWITCHER JURUSAN LAIN -->
        <div style="display: flex; justify-content: center;">
          <div class="trx-jurusan-switcher">
            <span style="font-size: 12px; font-weight: 700; color: var(--secondary); display: flex; align-items: center; padding: 0 0.5rem;">PILIH JURUSAN:</span>
            <a href="produk-rpl.php" class="switcher-link">RPL (Digital)</a>
            <a href="produk-tekstil.php" class="switcher-link">Tekstil (Fisik)</a>
            <a href="produk-mesin.php" class="switcher-link">Mesin (Manufaktur)</a>
            <a href="produk-ototronik.php" class="switcher-link active">Ototronik (Servis)</a>
          </div>
        </div>

        <!-- ALUR TRANSAKSI 3-BOX BERDAMPINGAN DENGAN GAP SEDIKIT -->
        <div class="trx-3box-wrap" data-animate>
          <div class="trx-single-box">
            <div class="trx-box-top">
              <span class="trx-box-num">01</span>
              <span class="material-symbols-outlined trx-box-ico">calendar_month</span>
            </div>
            <h4 class="trx-box-title">Pilih Servis &amp; Jadwal</h4>
            <p class="trx-box-desc">Pilih jenis servis motor atau mobil. Tentukan tanggal kedatangan dan slot jam kunjungan secara online.</p>
          </div>

          <div class="trx-single-box">
            <div class="trx-box-top">
              <span class="trx-box-num">02</span>
              <span class="material-symbols-outlined trx-box-ico">directions_car</span>
            </div>
            <h4 class="trx-box-title">Isi Data Kendaraan &amp; Tiket</h4>
            <p class="trx-box-desc">Masukkan tipe kendaraan, plat nomor, dan keluhan mesin. Sistem menerbitkan E-Tiket Booking resmi.</p>
          </div>

          <div class="trx-single-box">
            <div class="trx-box-top">
              <span class="trx-box-num">03</span>
              <span class="material-symbols-outlined trx-box-ico">handshake</span>
            </div>
            <h4 class="trx-box-title">Datang &amp; Bayar di Bengkel</h4>
            <p class="trx-box-desc">Datang sesuai jadwal tiket Anda, dan lakukan pembayaran di kasir setelah servis selesai (Tanpa biaya di muka).</p>
          </div>
        </div>

        <!-- HEADER DAFTAR PRODUK -->
        <div class="section-header-compact">
          <div>
            <h2>Katalog Layanan Bengkel TeFa Ototronik</h2>
            <p>Pilih layanan untuk melihat rincian detail atau booking slot jadwal kunjungan.</p>
          </div>
          <span style="font-size: 13px; color: var(--secondary); font-weight: 600;">Menampilkan <?= count($otoProducts) ?> Layanan</span>
        </div>

        <!-- BOX PRODUK LEBIH SIMPLE & BERSIH -->
        <div class="simple-prod-grid" data-animate>
          <?php foreach ($otoProducts as $p): ?>
            <article class="simple-prod-card">
              <div class="simple-prod-thumb">
                <span class="simple-prod-badge"><?= htmlspecialchars($p['badge']) ?></span>
                <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>">
              </div>
              <div class="simple-prod-body">
                <span class="simple-prod-category"><?= htmlspecialchars($p['category']) ?></span>
                <h3 class="simple-prod-title"><?= htmlspecialchars($p['title']) ?></h3>
                <p class="simple-prod-desc"><?= htmlspecialchars($p['desc']) ?></p>
                <div class="simple-prod-footer">
                  <span class="simple-prod-price"><?= htmlspecialchars($p['price_formatted']) ?></span>
                  <div class="simple-prod-actions">
                    <a href="detail-produk.php?id=<?= $p['id'] ?>" class="btn-card-detail">
                      <span>Detail</span>
                      <span class="material-symbols-outlined" style="font-size: 14px;">arrow_forward</span>
                    </a>
                    <button class="btn-card-order" onclick="openTransactionModal('<?= $p['id'] ?>')">
                      <span>Booking</span>
                    </button>
                  </div>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>

      </div>
    </section>

  </main>

  <!-- MODAL TRANSAKSI INTERAKTIF -->
  <div class="trx-modal-overlay" id="trxModalOverlay">
    <div class="trx-modal" id="trxModalContent"></div>
  </div>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/transaksi.js?v=2"></script>
  <script>
    initPage();
  </script>
</body>
</html>
