<?php
require_once 'data-produk.php';

$id = $_GET['id'] ?? 'rpl-1';
$prod = $PRODUCTS_LIST[$id] ?? $PRODUCTS_LIST['rpl-1'];
$accentColor = $prod['accent'];

// Ambil produk terkait dari jurusan yang sama
$relatedProducts = array_filter($PRODUCTS_LIST, function($p) use ($prod) {
  return $p['jurusan'] === $prod['jurusan'] && $p['id'] !== $prod['id'];
});
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($prod['title']) ?> | TeFa SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="stylesheet" href="../css/transaksi.css?v=2">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap">
  <style>
    :root {
      --page-accent: <?= $accentColor ?>;
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main style="padding-top: 7rem; padding-bottom: 5rem;">
    <div class="container">

      <!-- BREADCRUMB & BACK BUTTON -->
      <div class="detail-breadcrumb">
        <a href="../index.php">Beranda</a>
        <span class="material-symbols-outlined" style="font-size: 14px;">chevron_right</span>
        <a href="jurusan.php">Jurusan</a>
        <span class="material-symbols-outlined" style="font-size: 14px;">chevron_right</span>
        <a href="<?= htmlspecialchars($prod['jurusan_link']) ?>"><?= htmlspecialchars($prod['jurusan_name']) ?></a>
        <span class="material-symbols-outlined" style="font-size: 14px;">chevron_right</span>
        <span style="color: var(--on-surface); font-weight: 600;"><?= htmlspecialchars($prod['title']) ?></span>
      </div>

      <!-- MAIN DETAIL GRID -->
      <div class="detail-grid" data-animate>

        <!-- KOLOM KIRI: GAMBAR & METADATA -->
        <div class="detail-left">
          <div class="detail-img-box">
            <img src="<?= htmlspecialchars($prod['image']) ?>" alt="<?= htmlspecialchars($prod['title']) ?>">
          </div>

          <div class="detail-meta-box">
            <div class="detail-meta-row">
              <span>Unit Produksi:</span>
              <strong>Teaching Factory <?= htmlspecialchars($prod['jurusan_name']) ?></strong>
            </div>
            <div class="detail-meta-row">
              <span>Status Ketersediaan:</span>
              <strong style="color: var(--primary-dark);"><?= htmlspecialchars($prod['status']) ?></strong>
            </div>
            <div class="detail-meta-row">
              <span>Kategori Produk:</span>
              <strong><?= htmlspecialchars($prod['category']) ?></strong>
            </div>
            <div class="detail-meta-row">
              <span>Lokasi Pelayanan:</span>
              <strong>Kampus SMKN 2 Karanganyar</strong>
            </div>
          </div>
        </div>

        <!-- KOLOM KANAN: RINCIAN & AKSI TRANSAKSI -->
        <div class="detail-right">
          <span class="detail-cat-pill"><?= htmlspecialchars($prod['badge']) ?></span>
          <h1 class="detail-title"><?= htmlspecialchars($prod['title']) ?></h1>

          <div class="detail-price-box">
            <span style="font-size: 12px; color: var(--secondary); font-weight: 600; text-transform: uppercase;">
              <?= $prod['flow_type'] === 'booking' ? 'Estimasi Biaya' : 'Harga Produk' ?>:
            </span>
            <span class="detail-price-val"><?= htmlspecialchars($prod['price_formatted']) ?></span>
          </div>

          <!-- KOTAK ALUR TRANSAKSI KHUSUS -->
          <div class="detail-flow-alert">
            <span class="material-symbols-outlined" style="color: var(--page-accent); font-size: 1.5rem; flex-shrink: 0;">info</span>
            <div>
              <strong style="color: var(--on-surface);">Alur &amp; Metode Transaksi:</strong>
              <div style="color: var(--secondary); font-size: 0.86rem; margin-top: 0.2rem;">
                <?= htmlspecialchars($prod['flow_note']) ?>
              </div>
            </div>
          </div>

          <!-- DESKRIPSI LENGKAP -->
          <div class="detail-desc-block">
            <h3>Deskripsi Produk / Layanan</h3>
            <p><?= nl2br(htmlspecialchars($prod['full_desc'])) ?></p>
          </div>

          <!-- SPESIFIKASI / FITUR UTAMA -->
          <div class="detail-specs-box">
            <h4>Spesifikasi &amp; Fitur Keunggulan</h4>
            <ul class="detail-specs-list">
              <?php foreach ($prod['specs'] as $spec): ?>
                <li class="detail-specs-item">
                  <span class="material-symbols-outlined icon">check_circle</span>
                  <span><?= htmlspecialchars($spec) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <!-- ACTION BAR TRANSAKSI -->
          <div class="detail-action-bar">
            <?php
              $btnText = 'Beli & Transaksi Sekarang';
              $btnIcon = 'shopping_cart';
              if ($prod['flow_type'] === 'digital') {
                $btnText = 'Download & Dapatkan Lisensi';
                $btnIcon = 'download';
              } elseif ($prod['flow_type'] === 'booking') {
                $btnText = 'Booking Jadwal Servis';
                $btnIcon = 'event';
              }
            ?>
            <button class="btn-detail-order" onclick="openTransactionModal('<?= $prod['id'] ?>')">
              <span class="material-symbols-outlined"><?= $btnIcon ?></span>
              <span><?= $btnText ?></span>
            </button>

            <a href="https://wa.me/6281234567890?text=Halo%20TeFa%20SMKN%202%20Karanganyar,%20saya%20ingin%20bertanya%20tentang%20produk:%20<?= urlencode($prod['title']) ?>" target="_blank" class="btn-detail-wa">
              <span class="material-symbols-outlined" style="color: #25d366;">chat</span>
              <span>Konsultasi via WhatsApp</span>
            </a>
          </div>

        </div>

      </div>

      <!-- REKOMENDASI PRODUK LAINNYA DARI JURUSAN INI -->
      <?php if (!empty($relatedProducts)): ?>
        <div style="margin-top: 4rem; padding-top: 2.5rem; border-top: 1px solid var(--outline-variant);" data-animate>
          <div class="section-header-compact">
            <div>
              <h2>Produk Lainnya dari <?= htmlspecialchars($prod['jurusan_name']) ?></h2>
              <p>Eksplorasi karya inovasi lainnya dari unit produksi jurusan ini.</p>
            </div>
            <a href="<?= htmlspecialchars($prod['jurusan_link']) ?>" class="btn-card-detail">
              <span>Lihat Semua</span>
              <span class="material-symbols-outlined" style="font-size: 15px;">arrow_forward</span>
            </a>
          </div>

          <div class="simple-prod-grid">
            <?php foreach (array_slice($relatedProducts, 0, 3) as $rp): ?>
              <article class="simple-prod-card" style="--page-accent: <?= $rp['accent'] ?>;">
                <div class="simple-prod-thumb">
                  <span class="simple-prod-badge"><?= htmlspecialchars($rp['badge']) ?></span>
                  <img src="<?= htmlspecialchars($rp['image']) ?>" alt="<?= htmlspecialchars($rp['title']) ?>">
                </div>
                <div class="simple-prod-body">
                  <span class="simple-prod-category"><?= htmlspecialchars($rp['category']) ?></span>
                  <h3 class="simple-prod-title"><?= htmlspecialchars($rp['title']) ?></h3>
                  <p class="simple-prod-desc"><?= htmlspecialchars($rp['desc']) ?></p>
                  <div class="simple-prod-footer">
                    <span class="simple-prod-price"><?= htmlspecialchars($rp['price_formatted']) ?></span>
                    <div class="simple-prod-actions">
                      <a href="detail-produk.php?id=<?= $rp['id'] ?>" class="btn-card-detail">Detail</a>
                      <button class="btn-card-order" onclick="openTransactionModal('<?= $rp['id'] ?>')">Pesan</button>
                    </div>
                  </div>
                </div>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

    </div>
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
