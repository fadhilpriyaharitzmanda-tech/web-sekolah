<?php
require_once 'data-produk.php';
$mesinProducts = array_filter($PRODUCTS_LIST, function($p) {
  return $p['jurusan'] === 'mesin';
});
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk &amp; Jasa Mesin | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="stylesheet" href="../css/transaksi.css?v=4">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap">
  <style>
    :root {
      --page-accent: #2563eb;
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
          <span class="material-symbols-outlined" style="font-size: 13px;">settings</span>
          Teaching Factory Teknik Mesin
        </span>
        <h1>PRODUK MANUFAKTUR &amp; BENGKEL MESIN</h1>
        <p>Suku cadang presisi permesinan bubut &amp; CNC, ornamen logam stainless steel tahan karat, serta jasa pengerjaan las fabrikasi dan servis mesin perkakas industri.</p>
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
            <a href="produk-mesin.php" class="switcher-link active">Mesin (Manufaktur)</a>
            <a href="produk-ototronik.php" class="switcher-link">Ototronik (Servis)</a>
          </div>
        </div>

        <!-- ALUR TRANSAKSI 3-BOX BERDAMPINGAN DENGAN GAP SEDIKIT (SESUAI REQUEST) -->
        <div class="trx-3box-wrap" data-animate>
          <div class="trx-single-box">
            <div class="trx-box-top">
              <span class="trx-box-num">01</span>
              <span class="material-symbols-outlined trx-box-ico">category</span>
            </div>
            <h4 class="trx-box-title">Pilih Produk atau Jasa</h4>
            <p class="trx-box-desc">Pilih suku cadang kuningan/baja, ornamen cutting stainless, atau konsultasi kebutuhan jasa bubut &amp; las.</p>
          </div>

          <div class="trx-single-box">
            <div class="trx-box-top">
              <span class="trx-box-num">02</span>
              <span class="material-symbols-outlined trx-box-ico">local_shipping</span>
            </div>
            <h4 class="trx-box-title">Opsi Pengiriman / Bengkel</h4>
            <p class="trx-box-desc">Produk fisik dikirim kurir/ekspedisi atau diambil di TeFa. Jasa servis dijadwalkan langsung di workshop.</p>
          </div>

          <div class="trx-single-box">
            <div class="trx-box-top">
              <span class="trx-box-num">03</span>
              <span class="material-symbols-outlined trx-box-ico">receipt_long</span>
            </div>
            <h4 class="trx-box-title">Penerbitan Resi &amp; Invoice</h4>
            <p class="trx-box-desc">Dapatkan invoice resmi (TEFA-TRX-XXXX). Untuk jasa bengkel, bayar di kasir setelah pengerjaan selesai.</p>
          </div>
        </div>

        <!-- HEADER DAFTAR PRODUK -->
        <div class="section-header-compact">
          <div>
            <h2>Katalog Produk &amp; Layanan Teknik Mesin</h2>
            <p>Pilih produk untuk melihat rincian detail atau memesan secara langsung.</p>
          </div>
          <span style="font-size: 13px; color: var(--secondary); font-weight: 600;">Menampilkan <?= count($mesinProducts) ?> Produk</span>
        </div>

        <!-- BOX PRODUK LEBIH SIMPLE & BERSIH -->
        <div class="simple-prod-grid" data-animate>
          <?php foreach ($mesinProducts as $p): ?>
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
                      <span><?= $p['flow_type'] === 'booking' ? 'Booking' : 'Pesan' ?></span>
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
  <script src="../js/transaksi.js?v=4"></script>
  <script>
    initPage();
  </script>
</body>
</html>
