<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk & Transaksi Jurusan | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="stylesheet" href="../css/transaksi.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap">
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>

    <!-- HERO -->
    <section class="trx-hero">
      <div class="container">
        <span class="trx-hero-badge">
          <span class="material-symbols-outlined" style="font-size: 1rem;">storefront</span>
          Teaching Factory &amp; Unit Produksi Sekolah
        </span>
        <h1>PRODUK &amp; TRANSAKSI JURUSAN</h1>
        <p>Eksplorasi karya nyata siswa SMKN 2 Karanganyar. Setiap jurusan memiliki produk unggulan dengan alur transaksi yang disesuaikan secara khusus demi kemudahan dan kenyamanan Anda.</p>
      </div>
    </section>

    <!-- 3 ALUR TRANSAKSI OVERVIEW -->
    <section class="section" style="padding-top: 0; padding-bottom: 2rem;">
      <div class="container">
        <div class="trx-flows-grid" data-animate>

          <!-- 1. Alur Digital (RPL) -->
          <div class="flow-card" style="--flow-color: #16a34a;">
            <div class="flow-card-head">
              <div class="flow-icon">
                <span class="material-symbols-outlined">devices</span>
              </div>
              <div>
                <span class="flow-tag">Jurusan RPL</span>
                <h3 class="flow-title">Produk &amp; Jasa Digital</h3>
              </div>
            </div>
            <p class="flow-desc">Aplikasi, source code, template web, desain grafis, hingga jasa pembuatan software custom.</p>
            <ul class="flow-steps">
              <li class="flow-step-item">
                <span class="flow-step-num">1</span>
                <span>Pilih aplikasi atau aset digital yang dibutuhkan.</span>
              </li>
              <li class="flow-step-item">
                <span class="flow-step-num">2</span>
                <span>Pembayaran instan online via QRIS, VA, atau E-Wallet.</span>
              </li>
              <li class="flow-step-item">
                <span class="flow-step-num">3</span>
                <span><strong>Download otomatis</strong> langsung aktif &amp; <strong>Kode Lisensi resmi</strong> dikirim ke email.</span>
              </li>
            </ul>
            <button class="flow-footer-btn" onclick="filterByFlow('digital')">
              <span>Lihat Produk Digital</span>
              <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_forward</span>
            </button>
          </div>

          <!-- 2. Alur Fisik (Tekstil & Mesin) -->
          <div class="flow-card" style="--flow-color: #ea580c;">
            <div class="flow-card-head">
              <div class="flow-icon">
                <span class="material-symbols-outlined">inventory_2</span>
              </div>
              <div>
                <span class="flow-tag">Tekstil &amp; Mesin</span>
                <h3 class="flow-title">Produk Fisik Siap Stok / PO</h3>
              </div>
            </div>
            <p class="flow-desc">Seragam wearpack, tas tenun, aksesoris kain, suku cadang presisi mesin, dan ornamen logam stainless.</p>
            <ul class="flow-steps">
              <li class="flow-step-item">
                <span class="flow-step-num">1</span>
                <span>Pilih produk fisik, varian ukuran, dan spesifikasi.</span>
              </li>
              <li class="flow-step-item">
                <span class="flow-step-num">2</span>
                <span>Pilih metode: <strong>Kurir Lokal</strong>, <strong>Ekspedisi JNE/J&amp;T</strong>, atau <strong>Ambil di TeFa</strong>.</span>
              </li>
              <li class="flow-step-item">
                <span class="flow-step-num">3</span>
                <span>Checkout, penerbitan invoice resi, dan pengiriman atau pengambilan di TeFa Gedung B.</span>
              </li>
            </ul>
            <button class="flow-footer-btn" onclick="filterByFlow('fisik')">
              <span>Lihat Produk Fisik</span>
              <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_forward</span>
            </button>
          </div>

          <!-- 3. Alur Servis (Ototronik & Mesin) -->
          <div class="flow-card" style="--flow-color: #dc2626;">
            <div class="flow-card-head">
              <div class="flow-icon">
                <span class="material-symbols-outlined">build_circle</span>
              </div>
              <div>
                <span class="flow-tag">Ototronik &amp; Mesin</span>
                <h3 class="flow-title">Jasa Servis &amp; Bengkel</h3>
              </div>
            </div>
            <p class="flow-desc">Servis berkala motor/mobil, scan ECU komputer, servis AC mobil, dan rekondisi mesin perkakas bengkel.</p>
            <ul class="flow-steps">
              <li class="flow-step-item">
                <span class="flow-step-num">1</span>
                <span>Pilih jenis layanan servis yang dibutuhkan.</span>
              </li>
              <li class="flow-step-item">
                <span class="flow-step-num">2</span>
                <span>Pilih <strong>slot tanggal &amp; sesi jam kedatangan</strong> (Appointment).</span>
              </li>
              <li class="flow-step-item">
                <span class="flow-step-num">3</span>
                <span>Dapatkan E-Tiket, datang ke sekolah, lalu <strong>bayar setelah servis selesai</strong> di bengkel TeFa.</span>
              </li>
            </ul>
            <button class="flow-footer-btn" onclick="filterByFlow('booking')">
              <span>Booking Servis Bengkel</span>
              <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_forward</span>
            </button>
          </div>

        </div>
      </div>
    </section>

    <!-- KATALOG PRODUK & KONTROL FILTER -->
    <section class="section" style="padding-top: 1rem;">
      <div class="container">

        <!-- Controls Bar: Tabs & Search -->
        <div class="trx-controls-bar">
          <div class="trx-tabs">
            <button class="trx-tab-btn active" data-filter="all">
              <span class="material-symbols-outlined" style="font-size: 1.1rem;">apps</span>
              Semua Produk &amp; Jasa
            </button>
            <button class="trx-tab-btn" data-filter="digital">
              <span class="material-symbols-outlined" style="font-size: 1.1rem;">code</span>
              RPL (Produk Digital)
            </button>
            <button class="trx-tab-btn" data-filter="fisik">
              <span class="material-symbols-outlined" style="font-size: 1.1rem;">shopping_bag</span>
              Tekstil &amp; Mesin (Produk Fisik)
            </button>
            <button class="trx-tab-btn" data-filter="booking">
              <span class="material-symbols-outlined" style="font-size: 1.1rem;">car_repair</span>
              Ototronik &amp; Mesin (Servis)
            </button>
          </div>

          <div class="trx-search-wrap">
            <span class="material-symbols-outlined trx-search-icon">search</span>
            <input type="text" id="trxSearchInput" class="trx-search-input" placeholder="Cari produk atau layanan jurusan...">
          </div>
        </div>

        <!-- Products Grid Container -->
        <div class="trx-products-grid" id="trxProductsContainer">
          <!-- Rendered dynamically by JavaScript -->
        </div>

      </div>
    </section>

    <!-- CTA SECTION KEMITRAAN & CUSTOM ORDER -->
    <section class="cta-section" style="margin-top: 5rem;">
      <div class="cta-glow-1"></div>
      <div class="cta-glow-2"></div>
      <div class="cta-content">
        <h2 class="cta-title">Butuh Pesanan Khusus atau Kerjasama Industri?</h2>
        <p class="cta-desc">Teaching Factory SMKN 2 Karanganyar siap menerima pesanan partai besar untuk seragam, software kustom, fabrikasi komponen permesinan, maupun kerjasama fleet servis kendaraan.</p>
        <div class="cta-actions">
          <a href="https://wa.me/6281234567890?text=Halo%20SMKN%202%20Karanganyar,%20saya%20tertarik%20dengan%20produk/jasa%20Teaching%20Factory" target="_blank" class="btn-white" style="display:inline-flex; align-items:center; gap:0.5rem; text-decoration:none;">
            <span class="material-symbols-outlined" style="font-size:1.2rem;">chat</span>
            <span>Konsultasi Pemesanan TeFa</span>
          </a>
          <a href="jurusan.php" class="btn-outline-white" style="display:inline-flex; align-items:center; gap:0.5rem; text-decoration:none;">
            <span class="material-symbols-outlined" style="font-size:1.2rem;">school</span>
            <span>Kembali ke Halaman Jurusan</span>
          </a>
        </div>
      </div>
    </section>

  </main>

  <!-- MODAL TRANSAKSI INTERAKTIF -->
  <div class="trx-modal-overlay" id="trxModalOverlay">
    <div class="trx-modal" id="trxModalContent">
      <!-- Diisi secara dinamis sesuai alur transaksi yang dipilih -->
    </div>
  </div>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/transaksi.js?v=1"></script>
  <script>
    initPage();

    function filterByFlow(flow) {
      const tabs = document.querySelectorAll('.trx-tab-btn');
      tabs.forEach(t => {
        if (t.getAttribute('data-filter') === flow) {
          t.click();
        }
      });
      // Scroll smoothly to products grid
      const container = document.getElementById('trxProductsContainer');
      if (container) {
        container.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }
  </script>
</body>
</html>
