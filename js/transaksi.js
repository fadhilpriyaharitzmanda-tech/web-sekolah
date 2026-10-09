/* ========================================================
   JAVASCRIPT TRANSAKSI & TEFA MARKETPLACE
   SMK NEGERI 2 KARANGANYAR
   ======================================================== */

// Data Produk & Jasa Seluruh Jurusan
const PRODUCTS_DATA = [
  // --- RPL (PRODUK DIGITAL: Download Otomatis & Lisensi) ---
  {
    id: 'rpl-1',
    jurusan: 'rpl',
    jurusanName: 'Rekayasa Perangkat Lunak',
    flowType: 'digital',
    flowLabel: 'Download & Lisensi Otomatis',
    badgeClass: 'badge-digital',
    color: '#16a34a',
    title: 'Aplikasi E-Arsip Dokumen Sekolah v2.0',
    category: 'Software & Web App',
    desc: 'Sistem manajemen arsip surat masuk/keluar, disposisi digital, dan repositori dokumen sekolah berbasis Web PHP & MySQL.',
    specs: ['Full Source Code', 'Database SQL', 'Dokumentasi & Video Panduan', 'Update 1 Tahun'],
    price: 350000,
    priceFormatted: 'Rp 350.000',
    icon: 'terminal',
    image: '../images/3d-rpl.png',
    fileName: 'SMKN2KRA_E-Arsip_v2.0_FullPackage.zip',
    isService: false
  },
  {
    id: 'rpl-2',
    jurusan: 'rpl',
    jurusanName: 'Rekayasa Perangkat Lunak',
    flowType: 'digital',
    flowLabel: 'Download & Lisensi Otomatis',
    badgeClass: 'badge-digital',
    color: '#16a34a',
    title: 'Template Web Portofolio & Dashboard Modern',
    category: 'Website Template',
    desc: 'Template responsive berbasis modern CSS/Tailwind dengan dark mode, animasi micro-interaction, dan komponen reusable.',
    specs: ['HTML5 & CSS3', '5 Varian Layout', 'Figma File Included', 'Siap Pakai'],
    price: 125000,
    priceFormatted: 'Rp 125.000',
    icon: 'web',
    image: '../images/3d-rpl.png',
    fileName: 'SMKN2KRA_Modern_Portfolio_Template.zip',
    isService: false
  },
  {
    id: 'rpl-3',
    jurusan: 'rpl',
    jurusanName: 'Rekayasa Perangkat Lunak',
    flowType: 'digital',
    flowLabel: 'Download & Lisensi Otomatis',
    badgeClass: 'badge-digital',
    color: '#16a34a',
    title: 'Master UI/UX Kit & Desain Grafis Sekolah',
    category: 'Design Asset & UI Kit',
    desc: 'Bundle aset desain grafis, poster event sekolah, maskot vektor, dan komponen UI aplikasi mobile format Figma & SVG.',
    specs: ['Figma Component Library', 'Vector Assets (.SVG)', '100+ Icon Pack', 'Lisensi Komersial'],
    price: 90000,
    priceFormatted: 'Rp 90.000',
    icon: 'palette',
    image: '../images/3d-rpl.png',
    fileName: 'SMKN2KRA_UIUX_Kit_DesignAssets.zip',
    isService: false
  },
  {
    id: 'rpl-4',
    jurusan: 'rpl',
    jurusanName: 'Rekayasa Perangkat Lunak',
    flowType: 'digital',
    flowLabel: 'Download & Lisensi Otomatis',
    badgeClass: 'badge-digital',
    color: '#16a34a',
    title: 'Jasa Pembuatan Web Profil / Landing Page Custom',
    category: 'Jasa Software TeFa',
    desc: 'Layanan pembuatan website profil perusahaan, UMKM, atau portofolio instansi yang dikerjakan langsung oleh tim TeFa RPL.',
    specs: ['Responsive Mobile Friendly', 'SEO Dasar', 'Hosting 1 Tahun', 'Lisensi & Kontrak Resmi'],
    price: 750000,
    priceFormatted: 'Rp 750.000',
    icon: 'laptop_mac',
    image: '../images/3d-rpl.png',
    fileName: 'SMKN2KRA_Kontrak_Proyek_Web.pdf',
    isService: true
  },

  // --- PRODUK FISIK TEKSTIL (Siap Stok / PO: Kurir / Ekspedisi / Ambil di TeFa) ---
  {
    id: 'tekstil-1',
    jurusan: 'tekstil',
    jurusanName: 'Teknik Pembuatan Kain',
    flowType: 'fisik',
    flowLabel: 'Pengiriman / Ambil di TeFa',
    badgeClass: 'badge-fisik',
    color: '#ea580c',
    title: 'Seragam Praktik / Wearpack Standar Industri',
    category: 'Tekstil & Fashion',
    desc: 'Wearpack baju praktik berbahan American Drill tebal, adem, jahitan rantai ganda kuat, dengan bordir komputer presisi.',
    specs: ['Bahan American Drill', 'Ukuran S, M, L, XL, XXL', 'Ready Stock', 'Bordir Komputer'],
    price: 185000,
    priceFormatted: 'Rp 185.000',
    icon: 'checkroom',
    image: '../images/3d-tekstil.png',
    isService: false
  },
  {
    id: 'tekstil-2',
    jurusan: 'tekstil',
    jurusanName: 'Teknik Pembuatan Kain',
    flowType: 'fisik',
    flowLabel: 'Pengiriman / Ambil di TeFa',
    badgeClass: 'badge-fisik',
    color: '#ea580c',
    title: 'Tas Totebag Tenun Etnik Motif Lawu',
    category: 'Aksesoris Kain',
    desc: 'Totebag fungsional dengan kombinasi kain tenun mesin ATBM / Rapier khas teaching factory SMKN 2 Karanganyar.',
    specs: ['Kain Tenun Asli', 'Lapisan Furing Dalam', 'Resleting YKK', 'Kapasitas Laptop 14"'],
    price: 65000,
    priceFormatted: 'Rp 65.000',
    icon: 'shopping_bag',
    image: '../images/3d-tekstil.png',
    isService: false
  },
  {
    id: 'tekstil-3',
    jurusan: 'tekstil',
    jurusanName: 'Teknik Pembuatan Kain',
    flowType: 'fisik',
    flowLabel: 'Pengiriman / Ambil di TeFa',
    badgeClass: 'badge-fisik',
    color: '#ea580c',
    title: 'Syal & Hijab Printing Motif Khas Karanganyar',
    category: 'Kain & Printing',
    desc: 'Produk tekstil finishing printing digital dengan serat kain voal premium halus dan motif orisinil karya siswa.',
    specs: ['Ukuran 115 x 115 cm', 'Bahan Voal Premium', 'Laser Cut Edge', 'Kemasan Box Eksklusif'],
    price: 45000,
    priceFormatted: 'Rp 45.000',
    icon: 'texture',
    image: '../images/3d-tekstil.png',
    isService: false
  },

  {
    id: 'tekstil-4',
    jurusan: 'tekstil',
    jurusanName: 'Teknik Pembuatan Kain',
    flowType: 'fisik',
    flowLabel: 'Pengiriman / Ambil di TeFa',
    badgeClass: 'badge-fisik',
    color: '#ea580c',
    title: 'Pouch & Dompet Tenun Serbaguna',
    category: 'Souvenir & Kerajinan',
    desc: 'Pouch multifungsi untuk menyimpan alat tulis sekolah, kosmetik, kabel charger, maupun gadget kecil, diproduksi dari kain tenun berkualitas dengan bantalan busa pelindung.',
    specs: ['Dimensi 22 x 14 cm', 'Kain Tenun Asli', 'Inner Busa Pelindung', 'Resleting YKK'],
    price: 30000,
    priceFormatted: 'Rp 30.000',
    icon: 'shopping_bag',
    image: '../images/3d-tekstil.png',
    isService: false
  },

  // --- PRODUK FISIK MESIN (Suku Cadang & Ornamen: Kurir / Ekspedisi / Ambil di TeFa) ---
  {
    id: 'mesin-1',
    jurusan: 'mesin',
    jurusanName: 'Teknik Mesin',
    flowType: 'fisik',
    flowLabel: 'Pengiriman / Ambil di TeFa',
    badgeClass: 'badge-fisik',
    color: '#2563eb',
    title: 'Suku Cadang Presisi Bushing & Flange Kuningan',
    category: 'Manufaktur & Sparepart',
    desc: 'Komponen permesinan presisi hasil pengerjaan mesin bubut konvensional & CNC dengan toleransi ukuran standar ISO.',
    specs: ['Material Kuningan / Baja St42', 'Toleransi Mikro', 'Ready Stock / Batch', 'Uji QC Dimensi'],
    price: 55000,
    priceFormatted: 'Rp 55.000',
    icon: 'settings',
    image: '../images/3d-mesin.png',
    isService: false
  },
  {
    id: 'mesin-2',
    jurusan: 'mesin',
    jurusanName: 'Teknik Mesin',
    flowType: 'fisik',
    flowLabel: 'Pengiriman / Ambil di TeFa',
    badgeClass: 'badge-fisik',
    color: '#2563eb',
    title: 'Ornamen Papan Nama Stainless Metal Cutting',
    category: 'Ornamen Logam & Dekorasi',
    desc: 'Papan nama kantor/meja, hiasan dinding logam, dan plakat stainless tahan karat diproses dengan cutting presisi.',
    specs: ['Stainless Steel 304', 'Custom Nama / Logo', 'Pre-Order 3 Hari', 'Anti Karat'],
    price: 150000,
    priceFormatted: 'Rp 150.000',
    icon: 'shield',
    image: '../images/3d-mesin.png',
    isService: false
  },
  {
    id: 'mesin-3',
    jurusan: 'mesin',
    jurusanName: 'Teknik Mesin',
    flowType: 'booking',
    flowLabel: 'Booking Jadwal (Bayar Selesai Servis)',
    badgeClass: 'badge-booking',
    color: '#2563eb',
    title: 'Jasa Bubut & Fabrikasi Las Kustom Gambar Kerja',
    category: 'Jasa Bengkel & Permesinan',
    desc: 'Layanan pengerjaan pembubutan poros as, perbaikan ulir draad rusak, dan perakitan rangka besi/baja dengan teknik las TIG, MIG, dan SMAW sesuai cetak biru pesanan pelanggan.',
    specs: ['Bubut Konvensional/CNC', 'Las TIG & MIG', 'Sesuai Blueprint', 'Konsultasi Desain'],
    price: 75000,
    priceFormatted: 'Rp 75.000 (Mulai)',
    icon: 'build',
    image: '../images/3d-mesin.png',
    isService: true
  },
  {
    id: 'mesin-4',
    jurusan: 'mesin',
    jurusanName: 'Teknik Mesin',
    flowType: 'booking',
    flowLabel: 'Booking Jadwal (Bayar Selesai Servis)',
    badgeClass: 'badge-booking',
    color: '#2563eb',
    title: 'Jasa Servis & Rekondisi Mesin Perkakas Bengkel',
    category: 'Pemeliharaan & Rekondisi',
    desc: 'Layanan servis perbaikan mesin perkakas, alignment spindle, penggantian bearing mesin bubut/milling, dan kalibrasi.',
    specs: ['Peralatan Bengkel Standar', 'Teknisi Guru & Siswa TeFa', 'Inspeksi Awal Gratis', 'Estimasi Sesuai Kasus'],
    price: 200000,
    priceFormatted: 'Rp 200.000 (Mulai)',
    icon: 'build',
    image: '../images/3d-mesin.png',
    isService: true
  },

  // --- JASA LAYANAN / SERVIS OTOMOTIF & MESIN (Sistem Booking Jadwal / Appointment) ---
  {
    id: 'oto-1',
    jurusan: 'ototronik',
    jurusanName: 'Teknik Ototronik',
    flowType: 'booking',
    flowLabel: 'Booking Jadwal (Bayar Selesai Servis)',
    badgeClass: 'badge-booking',
    color: '#dc2626',
    title: 'Servis Berkala & Tune-Up Injeksi Sepeda Motor',
    category: 'Bengkel Servis TeFa',
    desc: 'Pemeriksaan sistem bahan bakar injeksi, pembersihan throttle body, cek busi, filter udara, dan ganti oli mesin.',
    specs: ['Pembersihan Throttle Body', 'Reset ECU Injeksi', 'Pengecekan Rem & Rantai', 'Estimasi 45 Menit'],
    price: 45000,
    priceFormatted: 'Rp 45.000',
    icon: 'two_wheeler',
    image: '../images/3d-oto.png',
    isService: true
  },
  {
    id: 'oto-2',
    jurusan: 'ototronik',
    jurusanName: 'Teknik Ototronik',
    flowType: 'booking',
    flowLabel: 'Booking Jadwal (Bayar Selesai Servis)',
    badgeClass: 'badge-booking',
    color: '#dc2626',
    title: 'Scan ECU Komputer Mobil & Diagnostik OBD-II',
    category: 'Bengkel Ototronik Mobil',
    desc: 'Deteksi sensor rusak, pembacaan live data engine, penghapusan kode error (DTC), dan kalibrasi sistem kontrol mobil cerdas.',
    specs: ['Scanner OBD-II Mutakhir', 'Cek Sensor & Aktuator', 'Printout Hasil Scan', 'Estimasi 60 Menit'],
    price: 120000,
    priceFormatted: 'Rp 120.000',
    icon: 'directions_car',
    image: '../images/3d-oto.png',
    isService: true
  },
  {
    id: 'oto-3',
    jurusan: 'ototronik',
    jurusanName: 'Teknik Ototronik',
    flowType: 'booking',
    flowLabel: 'Booking Jadwal (Bayar Selesai Servis)',
    badgeClass: 'badge-booking',
    color: '#dc2626',
    title: 'Servis AC Mobil & Penggantian Freon Otomatis',
    category: 'Bengkel AC Mobil',
    desc: 'Pengecekan kebocoran sistem pendingin, kuras oli kompresor dengan mesin recovery otomatis, dan penggantian filter kabin.',
    specs: ['Mesin Recovery Freon', 'Uji Suhu Evaporator', 'Oli Kompresor Baru', 'Estimasi 60 Menit'],
    price: 150000,
    priceFormatted: 'Rp 150.000',
    icon: 'ac_unit',
    image: '../images/3d-oto.png',
    isService: true
  },
  {
    id: 'oto-4',
    jurusan: 'ototronik',
    jurusanName: 'Teknik Ototronik',
    flowType: 'booking',
    flowLabel: 'Booking Jadwal (Bayar Selesai Servis)',
    badgeClass: 'badge-booking',
    color: '#dc2626',
    title: 'Perawatan Kelistrikan Bodi & Cek Baterai Aki',
    category: 'Kelistrikan Bodi & Baterai',
    desc: 'Pemeriksaan kondisi kesehatan baterai aki dengan digital conductance tester, pengecekan pengisian dinamo alternator, pembersihan kutub baterai, dan perbaikan instalasi sistem lampu serta klakson.',
    specs: ['Digital Battery Health', 'Cek Alternator Dinamo', 'Relay & Fuse Check', 'Estimasi 30 Menit'],
    price: 35000,
    priceFormatted: 'Rp 35.000',
    icon: 'battery_charging_full',
    image: '../images/3d-oto.png',
    isService: true
  }
];

// State variables
let currentFilter = 'all';
let currentSearch = '';
let selectedProduct = null;
let selectedShippingCost = 0;
let selectedShippingName = 'Ambil di TeFa SMKN 2 Karanganyar';
let selectedSlot = '08:30 - 10:00 WIB';

// Inisialisasi Halaman
function initTransaksiPage() {
  renderProducts();
  setupFilterTabs();
  setupSearchInput();
  checkUrlParams();
  setupModalEvents();
}

// Render Products Grid
function renderProducts() {
  const container = document.getElementById('trxProductsContainer');
  if (!container) return;

  const filtered = PRODUCTS_DATA.filter(item => {
    // Filter kategori
    const matchCategory = (
      currentFilter === 'all' ||
      (currentFilter === 'digital' && item.flowType === 'digital') ||
      (currentFilter === 'fisik' && item.flowType === 'fisik') ||
      (currentFilter === 'booking' && item.flowType === 'booking') ||
      (currentFilter === item.jurusan)
    );

    // Filter pencarian
    const q = currentSearch.toLowerCase().trim();
    const matchSearch = !q || (
      item.title.toLowerCase().includes(q) ||
      item.desc.toLowerCase().includes(q) ||
      item.jurusanName.toLowerCase().includes(q) ||
      item.category.toLowerCase().includes(q)
    );

    return matchCategory && matchSearch;
  });

  if (filtered.length === 0) {
    container.innerHTML = `
      <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 1rem; background: #fff; border-radius: 20px; border: 1px dashed var(--outline-variant);">
        <span class="material-symbols-outlined" style="font-size: 3.5rem; color: var(--secondary); opacity: 0.5;">search_off</span>
        <h3 style="font-family: var(--font-heading); margin-top: 1rem; color: var(--on-surface);">Tidak Ada Produk Ditemukan</h3>
        <p style="color: var(--secondary); font-size: 0.9rem; margin-top: 0.5rem;">Coba sesuaikan kata kunci pencarian atau ubah filter kategori jurusan di atas.</p>
        <button onclick="resetFilters()" class="btn-primary" style="margin-top: 1.25rem;">Tampilkan Semua Produk</button>
      </div>
    `;
    return;
  }

  container.innerHTML = filtered.map(item => {
    let actionBtnText = 'Transaksi Sekarang';
    let actionIcon = 'arrow_forward';

    if (item.flowType === 'digital') {
      actionBtnText = 'Download & Lisensi';
      actionIcon = 'download';
    } else if (item.flowType === 'fisik') {
      actionBtnText = 'Beli / Pesan Fisik';
      actionIcon = 'local_shipping';
    } else if (item.flowType === 'booking') {
      actionBtnText = 'Booking Jadwal';
      actionIcon = 'event';
    }

    return `
      <article class="trx-prod-card" style="--prod-color: ${item.color};">
        <div class="trx-prod-thumb">
          <div class="trx-prod-badges">
            <span class="badge-jur">${item.jurusan.toUpperCase()}</span>
            <span class="badge-mode">
              <span class="material-symbols-outlined" style="font-size: 14px;">${actionIcon}</span>
              ${item.flowLabel.split(' ')[0]}
            </span>
          </div>
          ${item.image ? `<img src="${item.image}" alt="${item.title}" class="trx-prod-img-photo">` : `<span class="material-symbols-outlined trx-prod-img-icon">${item.icon}</span>`}
        </div>

        <div class="trx-prod-body">
          <div class="trx-prod-category">${item.category} • ${item.jurusanName}</div>
          <h3 class="trx-prod-title">${item.title}</h3>
          <p class="trx-prod-desc">${item.desc}</p>

          <div class="trx-prod-specs">
            ${item.specs.map(s => `<span class="spec-pill">${s}</span>`).join('')}
          </div>

          <div class="trx-prod-footer">
            <div class="trx-price-block">
              <span class="trx-price-lbl">${item.flowType === 'booking' ? 'Estimasi Biaya' : 'Harga Produk'}</span>
              <span class="trx-price-val">${item.priceFormatted}</span>
            </div>
            <button class="trx-btn-action" onclick="openTransactionModal('${item.id}')">
              <span>${actionBtnText}</span>
              <span class="material-symbols-outlined" style="font-size: 1.1rem;">${actionIcon}</span>
            </button>
          </div>
        </div>
      </article>
    `;
  }).join('');
}

// Setup Filter Tabs
function setupFilterTabs() {
  const tabs = document.querySelectorAll('.trx-tab-btn');
  tabs.forEach(tab => {
    tab.addEventListener('click', function() {
      tabs.forEach(t => t.classList.remove('active'));
      this.classList.add('active');
      currentFilter = this.getAttribute('data-filter') || 'all';
      renderProducts();
    });
  });
}

// Setup Search
function setupSearchInput() {
  const input = document.getElementById('trxSearchInput');
  if (!input) return;
  input.addEventListener('input', function(e) {
    currentSearch = e.target.value;
    renderProducts();
  });
}

function resetFilters() {
  currentFilter = 'all';
  currentSearch = '';
  const searchInput = document.getElementById('trxSearchInput');
  if (searchInput) searchInput.value = '';
  const tabs = document.querySelectorAll('.trx-tab-btn');
  tabs.forEach(t => {
    if (t.getAttribute('data-filter') === 'all') t.classList.add('active');
    else t.classList.remove('active');
  });
  renderProducts();
}

// Periksa URL Parameter
function checkUrlParams() {
  const params = new URLSearchParams(window.location.search);
  const kategori = params.get('kategori');
  const jurusan = params.get('jurusan');
  const item = params.get('item');

  if (kategori) {
    currentFilter = kategori;
    setActiveTab(kategori);
  } else if (jurusan) {
    currentFilter = jurusan;
    setActiveTab(jurusan);
  }

  renderProducts();

  if (item) {
    setTimeout(() => {
      openTransactionModal(item);
    }, 300);
  }
}

function setActiveTab(filterVal) {
  const tabs = document.querySelectorAll('.trx-tab-btn');
  tabs.forEach(t => {
    if (t.getAttribute('data-filter') === filterVal) {
      t.classList.add('active');
    } else {
      t.classList.remove('active');
    }
  });
}

// Modal Logic
function openTransactionModal(productId) {
  selectedProduct = PRODUCTS_DATA.find(p => p.id === productId);
  if (!selectedProduct) return;

  const overlay = document.getElementById('trxModalOverlay');
  const modalContainer = document.getElementById('trxModalContent');
  if (!overlay || !modalContainer) return;

  if (selectedProduct.flowType === 'digital') {
    renderDigitalFlow(modalContainer);
  } else if (selectedProduct.flowType === 'fisik') {
    renderFisikFlow(modalContainer);
  } else if (selectedProduct.flowType === 'booking') {
    renderBookingFlow(modalContainer);
  }

  overlay.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeTransactionModal() {
  const overlay = document.getElementById('trxModalOverlay');
  if (!overlay) return;
  overlay.classList.remove('open');
  document.body.style.overflow = '';
}

function setupModalEvents() {
  const overlay = document.getElementById('trxModalOverlay');
  if (!overlay) return;
  overlay.addEventListener('click', function(e) {
    if (e.target === overlay) {
      closeTransactionModal();
    }
  });
}

// -------------------------------------------------------------
// 1. FLOW DIGITAL: RPL (DOWNLOAD OTOMATIS & LISENSI EMAIL/WEB)
// -------------------------------------------------------------
function renderDigitalFlow(container) {
  container.innerHTML = `
    <div class="trx-modal-header">
      <div class="trx-modal-title-wrap">
        <div class="trx-modal-icon">
          <span class="material-symbols-outlined">download_done</span>
        </div>
        <div>
          <h3 class="trx-modal-title">Transaksi Produk Digital</h3>
          <p class="trx-modal-subtitle">TeFa Rekayasa Perangkat Lunak</p>
        </div>
      </div>
      <button type="button" class="trx-modal-close" onclick="closeTransactionModal()" title="Tutup">
        <span class="material-symbols-outlined" style="font-size: 1.15rem;">close</span>
      </button>
    </div>

    <form id="digitalForm" onsubmit="handleDigitalSubmit(event)">
      <div class="trx-modal-body">
        <div class="trx-alert trx-alert-info">
          <span class="material-symbols-outlined">bolt</span>
          <div>
            File langsung terunduh otomatis &amp; lisensi resmi dikirim ke email.
          </div>
        </div>

        <!-- Detail Produk Ringkas -->
        <div class="trx-prod-preview-compact">
          <div class="trx-pp-info">
            <span class="trx-pp-cat">${selectedProduct.category}</span>
            <h4 class="trx-pp-name">${selectedProduct.title}</h4>
            <span class="trx-pp-sub">${selectedProduct.fileName || 'Paket Source Code & Template (.zip)'}</span>
          </div>
          <div class="trx-pp-price">${selectedProduct.priceFormatted}</div>
        </div>

        <div class="trx-grid-2">
          <div class="trx-field">
            <label class="trx-label">Nama Lengkap <span style="color:var(--error)">*</span></label>
            <input type="text" class="trx-input" id="digName" placeholder="Nama Anda" required>
          </div>
          <div class="trx-field">
            <label class="trx-label">Nomor WhatsApp <span style="color:var(--error)">*</span></label>
            <input type="tel" class="trx-input" id="digPhone" placeholder="08xxxxxxxxxx" required>
          </div>
        </div>

        <div class="trx-field">
          <label class="trx-label">Email Penerima Lisensi <span style="color:var(--error)">*</span></label>
          <input type="email" class="trx-input" id="digEmail" placeholder="nama@email.com" required>
          <small class="trx-field-hint">Untuk pengiriman kode lisensi resmi &amp; link cadangan.</small>
        </div>

        <!-- DROPDOWN PILIHAN PENGIRIMAN -->
        <div class="trx-field">
          <label class="trx-label">Metode Pengiriman <span style="color:var(--error)">*</span></label>
          <select class="trx-select" id="digShippingMethod" onchange="updateDigitalSummary()" required>
            <option value="Unduh Langsung &amp; Email (Instan)" selected>Unduh Langsung &amp; Email (Instan)</option>
            <option value="Kirim via Email Saja">Kirim via Email Saja</option>
            <option value="Kirim via WhatsApp &amp; Email">Kirim via WhatsApp &amp; Email</option>
            <option value="Google Drive Link (Email)">Google Drive Link via Email</option>
            <option value="Akses GitHub Repo (Email)">Akses GitHub Repo via Email</option>
          </select>
        </div>

        <!-- DROPDOWN METODE PEMBAYARAN -->
        <div class="trx-field">
          <label class="trx-label">Metode Pembayaran <span style="color:var(--error)">*</span></label>
          <select class="trx-select" id="digPayMethod" onchange="updateDigitalSummary()" required>
            <optgroup label="QRIS &amp; E-Wallet">
              <option value="QRIS Instan" selected>QRIS Instan (Semua E-Wallet / Bank)</option>
              <option value="GoPay">GoPay</option>
              <option value="ShopeePay">ShopeePay</option>
              <option value="DANA">DANA</option>
              <option value="OVO">OVO</option>
            </optgroup>
            <optgroup label="Virtual Account">
              <option value="BCA Virtual Account">BCA Virtual Account</option>
              <option value="Mandiri Virtual Account">Mandiri Virtual Account</option>
              <option value="BRI Virtual Account">BRI Virtual Account</option>
              <option value="BNI Virtual Account">BNI Virtual Account</option>
            </optgroup>
            <optgroup label="Transfer Bank">
              <option value="Transfer Bank TeFa SMKN 2">Transfer Rekening Sekolah TeFa SMKN 2</option>
            </optgroup>
          </select>
        </div>

        <div class="trx-summary-box">
          <div class="trx-summary-row">
            <span>Harga</span>
            <span class="trx-summary-val">${selectedProduct.priceFormatted}</span>
          </div>
          <div class="trx-summary-row">
            <span>Pengiriman</span>
            <span class="trx-summary-val" id="digSummaryShipping" style="color: var(--primary-dark); font-weight: 600;">Unduh &amp; Email (Gratis)</span>
          </div>
          <div class="trx-summary-row">
            <span>Pembayaran</span>
            <span class="trx-summary-val" id="digSummaryPay" style="font-weight: 600;">QRIS Instan</span>
          </div>
          <div class="trx-summary-row total">
            <span>Total</span>
            <span class="trx-summary-total">${selectedProduct.priceFormatted}</span>
          </div>
        </div>
      </div>

      <div class="trx-modal-footer">
        <button type="button" class="trx-btn-cancel" onclick="closeTransactionModal()">Batal</button>
        <button type="submit" class="trx-btn-submit" id="btnPayDigital">
          <span>Bayar Sekarang</span>
          <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_forward</span>
        </button>
      </div>
    </form>
  `;

  updateDigitalSummary();
}

function updateDigitalSummary() {
  const shippingSelect = document.getElementById('digShippingMethod');
  const paySelect = document.getElementById('digPayMethod');
  const summaryShipping = document.getElementById('digSummaryShipping');
  const summaryPay = document.getElementById('digSummaryPay');

  if (shippingSelect && summaryShipping) {
    const val = shippingSelect.value;
    summaryShipping.innerText = val.length > 25 ? val.substring(0, 23) + '...' : val;
    summaryShipping.title = val;
  }
  if (paySelect && summaryPay) {
    const val = paySelect.value;
    summaryPay.innerText = val.length > 25 ? val.substring(0, 23) + '...' : val;
    summaryPay.title = val;
  }
}

function handleDigitalSubmit(e) {
  e.preventDefault();
  const name = document.getElementById('digName').value;
  const email = document.getElementById('digEmail').value;
  const shippingMethod = document.getElementById('digShippingMethod').value;
  const payMethod = document.getElementById('digPayMethod').value;
  const btn = document.getElementById('btnPayDigital');

  btn.disabled = true;
  btn.innerHTML = `<span class="material-symbols-outlined" style="animation: spin 1s linear infinite; font-size: 1rem;">sync</span> <span>Memproses...</span>`;

  setTimeout(() => {
    showDigitalSuccess(name, email, shippingMethod, payMethod);
  }, 900);
}

function showDigitalSuccess(name, email, shippingMethod, payMethod) {
  const container = document.getElementById('trxModalContent');
  const licenseKey = 'SMK2-RPL-' + Math.random().toString(36).substring(2, 6).toUpperCase() + '-' + Math.random().toString(36).substring(2, 6).toUpperCase() + '-2026';
  const orderId = 'INV-RPL-' + Math.floor(100000 + Math.random() * 900000);

  container.innerHTML = `
    <div class="trx-modal-header">
      <div class="trx-modal-title-wrap">
        <div class="trx-modal-icon">
          <span class="material-symbols-outlined">check_circle</span>
        </div>
        <div>
          <h3 class="trx-modal-title">Pembayaran Berhasil!</h3>
          <p class="trx-modal-subtitle">${orderId}</p>
        </div>
      </div>
      <button type="button" class="trx-modal-close" onclick="closeTransactionModal()" title="Tutup">
        <span class="material-symbols-outlined" style="font-size: 1.15rem;">close</span>
      </button>
    </div>

    <div class="trx-modal-body">
      <div class="trx-success-wrap">
        <div class="trx-success-icon">
          <span class="material-symbols-outlined">verified</span>
        </div>
        <h3 class="trx-success-title">Terima Kasih, ${name}!</h3>
        <p class="trx-success-desc">
          Pembayaran terkonfirmasi. Lisensi resmi Anda telah aktif.
        </p>

        <div class="trx-ticket-card">
          <div class="trx-ticket-row">
            <span>Produk</span>
            <strong>${selectedProduct.title}</strong>
          </div>
          <div class="trx-ticket-row">
            <span>Status</span>
            <span style="color: #006e2f; font-weight: 700;">Lunas (Verified)</span>
          </div>
          <div class="trx-ticket-row">
            <span>Pengiriman</span>
            <span>${shippingMethod || 'Unduh Langsung & Email'}</span>
          </div>
          <div class="trx-ticket-row">
            <span>Pembayaran</span>
            <span>${payMethod || 'QRIS Instan'}</span>
          </div>
          <div class="trx-ticket-row">
            <span>Email</span>
            <span>${email}</span>
          </div>
          <div style="margin-top: 0.35rem; border-top: 1px dashed var(--outline-variant); padding-top: 0.35rem;">
            <span style="font-size: 0.72rem; color: var(--secondary); font-weight: 700; text-transform: uppercase;">Kode Lisensi Resmi:</span>
            <div class="trx-code-box">
              <span id="licenseCodeText">${licenseKey}</span>
              <button type="button" class="trx-copy-btn" onclick="copyText('licenseCodeText', this)" title="Salin Lisensi">
                <span class="material-symbols-outlined" style="font-size: 1rem;">content_copy</span>
              </button>
            </div>
            <small class="trx-field-hint" style="margin-top: 0.25rem;">Salinan lisensi juga dikirim ke <strong>${email}</strong>.</small>
          </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 0.5rem; width: 100%;">
          <button type="button" class="trx-btn-submit" style="width: 100%; justify-content: center;" onclick="triggerFileDownload('${selectedProduct.fileName || 'source-code.zip'}')">
            <span class="material-symbols-outlined" style="font-size: 1rem;">download</span>
            <span>Unduh File Sekarang (${selectedProduct.fileName || 'source-code.zip'})</span>
          </button>
          <button type="button" class="trx-btn-cancel" style="width: 100%; justify-content: center;" onclick="window.print()">
            <span class="material-symbols-outlined" style="font-size: 1rem; margin-right: 0.25rem;">receipt_long</span>
            <span>Cetak Bukti Transaksi</span>
          </button>
        </div>
      </div>
    </div>
  `;

  setTimeout(() => {
    triggerFileDownload(selectedProduct.fileName || 'source-code.zip');
  }, 1600);
}

// -------------------------------------------------------------
// 2. FLOW FISIK: TEKSTIL & MESIN (KURIR / EKSPEDISI / AMBIL TEFA)
// -------------------------------------------------------------
function renderFisikFlow(container) {
  selectedShippingCost = 0;
  selectedShippingName = 'Ambil di TeFa SMKN 2 (Gedung B)';

  container.innerHTML = `
    <div class="trx-modal-header">
      <div class="trx-modal-title-wrap">
        <div class="trx-modal-icon" style="background: rgba(234, 88, 12, 0.12); color: #c2410c;">
          <span class="material-symbols-outlined">inventory_2</span>
        </div>
        <div>
          <h3 class="trx-modal-title">Pembelian Produk Fisik</h3>
          <p class="trx-modal-subtitle">Teaching Factory ${selectedProduct.jurusanName}</p>
        </div>
      </div>
      <button type="button" class="trx-modal-close" onclick="closeTransactionModal()" title="Tutup">
        <span class="material-symbols-outlined" style="font-size: 1.15rem;">close</span>
      </button>
    </div>

    <form id="fisikForm" onsubmit="handleFisikSubmit(event)">
      <div class="trx-modal-body">
        <div class="trx-alert trx-alert-info">
          <span class="material-symbols-outlined">local_shipping</span>
          <div>
            Pilih ambil di TeFa (Gratis), Kurir Lokal Solo Raya, atau Ekspedisi Reguler.
          </div>
        </div>

        <div class="trx-prod-preview-compact">
          <div class="trx-pp-info">
            <span class="trx-pp-cat">${selectedProduct.category}</span>
            <h4 class="trx-pp-name">${selectedProduct.title}</h4>
            <span class="trx-pp-sub">Produk Fisik TeFa</span>
          </div>
          <div class="trx-pp-price" id="itemBasePrice">${selectedProduct.priceFormatted}</div>
        </div>

        <div class="trx-grid-2">
          <div class="trx-field">
            <label class="trx-label">Pilihan Varian</label>
            <select class="trx-select" id="fisikVariant">
              <option value="Standar">Varian Standar / All Size</option>
              <option value="S">Ukuran S (Small)</option>
              <option value="M" selected>Ukuran M (Medium)</option>
              <option value="L">Ukuran L (Large)</option>
              <option value="XL">Ukuran XL (Extra Large)</option>
              <option value="Custom">Kustom Spesifikasi</option>
            </select>
          </div>
          <div class="trx-field">
            <label class="trx-label">Jumlah (Qty)</label>
            <input type="number" class="trx-input" id="fisikQty" value="1" min="1" max="100" onchange="updateFisikTotal()" required>
          </div>
        </div>

        <!-- DROPDOWN PILIHAN PENGIRIMAN FISIK -->
        <div class="trx-field">
          <label class="trx-label">Metode Pengiriman <span style="color:var(--error)">*</span></label>
          <select class="trx-select" id="fisikShippingSelect" onchange="handleShippingDropdownChange(this)" required>
            <option value="tefa" data-cost="0" data-name="Ambil di TeFa SMKN 2 (Gedung B)" selected>Ambil di TeFa SMKN 2 (Gratis - Rp 0)</option>
            <option value="lokal" data-cost="15000" data-name="Kurir Lokal Solo Raya">Kurir Lokal Solo Raya (+ Rp 15.000)</option>
            <option value="ekspedisi" data-cost="25000" data-name="Ekspedisi Reguler Nasional">Ekspedisi Reguler Nasional (+ Rp 25.000)</option>
          </select>
        </div>

        <!-- DROPDOWN METODE PEMBAYARAN FISIK -->
        <div class="trx-field">
          <label class="trx-label">Metode Pembayaran <span style="color:var(--error)">*</span></label>
          <select class="trx-select" id="fisikPayMethod" required>
            <optgroup label="Online Otomatis">
              <option value="QRIS Instan" selected>QRIS Instan (Semua E-Wallet &amp; Bank)</option>
              <option value="Virtual Account">Virtual Account (BCA / Mandiri / BRI / BNI)</option>
            </optgroup>
            <optgroup label="Langsung &amp; Transfer">
              <option value="Bayar di TeFa (COD / Kasir)">Bayar di Tempat (Kasir TeFa / COD)</option>
              <option value="Transfer Bank TeFa">Transfer Bank Rekening Sekolah</option>
            </optgroup>
          </select>
        </div>

        <div class="trx-grid-2">
          <div class="trx-field">
            <label class="trx-label">Nama Penerima <span style="color:var(--error)">*</span></label>
            <input type="text" class="trx-input" id="fisikName" placeholder="Nama Anda" required>
          </div>
          <div class="trx-field">
            <label class="trx-label">Nomor WhatsApp <span style="color:var(--error)">*</span></label>
            <input type="tel" class="trx-input" id="fisikPhone" placeholder="08xxxxxxxxxx" required>
          </div>
        </div>

        <div class="trx-field" id="addressFieldWrap" style="display: none;">
          <label class="trx-label">Alamat Pengiriman <span style="color:var(--error)">*</span></label>
          <textarea class="trx-textarea" id="fisikAddress" rows="2" placeholder="Alamat lengkap tujuan pengiriman"></textarea>
        </div>

        <div class="trx-field">
          <label class="trx-label">Catatan (Opsional)</label>
          <input type="text" class="trx-input" id="fisikNotes" placeholder="Catatan pesanan / kustomisasi (opsional)">
        </div>

        <div class="trx-summary-box">
          <div class="trx-summary-row">
            <span>Subtotal (<span id="summaryQty">1</span> item)</span>
            <span id="summarySubtotal" class="trx-summary-val">${selectedProduct.priceFormatted}</span>
          </div>
          <div class="trx-summary-row">
            <span>Ongkir</span>
            <span id="summaryShippingName" class="trx-summary-val" style="font-weight: 600;">Ambil di TeFa (Rp 0)</span>
          </div>
          <div class="trx-summary-row total">
            <span>Total</span>
            <span id="summaryTotal" class="trx-summary-total">${selectedProduct.priceFormatted}</span>
          </div>
        </div>
      </div>

      <div class="trx-modal-footer">
        <button type="button" class="trx-btn-cancel" onclick="closeTransactionModal()">Batal</button>
        <button type="submit" class="trx-btn-submit" id="btnFisikPay">
          <span>Pesan Sekarang</span>
          <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_forward</span>
        </button>
      </div>
    </form>
  `;
}

function handleShippingDropdownChange(select) {
  const selectedOption = select.options[select.selectedIndex];
  const cost = parseInt(selectedOption.getAttribute('data-cost')) || 0;
  const name = selectedOption.getAttribute('data-name') || selectedOption.text;

  selectedShippingCost = cost;
  selectedShippingName = name;

  const addressWrap = document.getElementById('addressFieldWrap');
  const addressInput = document.getElementById('fisikAddress');
  if (cost > 0) {
    if (addressWrap) addressWrap.style.display = 'flex';
    if (addressInput) addressInput.required = true;
  } else {
    if (addressWrap) addressWrap.style.display = 'none';
    if (addressInput) addressInput.required = false;
  }

  updateFisikTotal();
}

function updateFisikTotal() {
  const qtyInput = document.getElementById('fisikQty');
  const qty = parseInt(qtyInput ? qtyInput.value : 1) || 1;
  const subtotal = selectedProduct.price * qty;
  const total = subtotal + selectedShippingCost;

  const summaryQty = document.getElementById('summaryQty');
  const summarySubtotal = document.getElementById('summarySubtotal');
  const summaryShippingName = document.getElementById('summaryShippingName');
  const summaryTotal = document.getElementById('summaryTotal');

  if (summaryQty) summaryQty.innerText = qty;
  if (summarySubtotal) summarySubtotal.innerText = 'Rp ' + subtotal.toLocaleString('id-ID');
  if (summaryShippingName) {
    summaryShippingName.innerText = selectedShippingCost === 0
      ? 'Ambil di TeFa (Gratis)'
      : `${selectedShippingName} (+ Rp ${selectedShippingCost.toLocaleString('id-ID')})`;
  }
  if (summaryTotal) summaryTotal.innerText = 'Rp ' + total.toLocaleString('id-ID');
}

function handleFisikSubmit(e) {
  e.preventDefault();
  const name = document.getElementById('fisikName').value;
  const phone = document.getElementById('fisikPhone').value;
  const qty = document.getElementById('fisikQty').value;
  const variant = document.getElementById('fisikVariant').value;
  const payMethod = document.getElementById('fisikPayMethod').value;
  const btn = document.getElementById('btnFisikPay');

  btn.disabled = true;
  btn.innerHTML = `<span class="material-symbols-outlined" style="animation: spin 1s linear infinite; font-size: 1rem;">sync</span> <span>Memproses...</span>`;

  setTimeout(() => {
    showFisikSuccess(name, phone, qty, variant, payMethod);
  }, 900);
}

function showFisikSuccess(name, phone, qty, variant, payMethod) {
  const container = document.getElementById('trxModalContent');
  const trxCode = 'TEFA-TRX-' + Math.floor(100000 + Math.random() * 900000);
  const subtotal = selectedProduct.price * parseInt(qty);
  const total = subtotal + selectedShippingCost;

  container.innerHTML = `
    <div class="trx-modal-header">
      <div class="trx-modal-title-wrap">
        <div class="trx-modal-icon" style="background: rgba(34, 197, 94, 0.15); color: #006e2f;">
          <span class="material-symbols-outlined">receipt</span>
        </div>
        <div>
          <h3 class="trx-modal-title">Pesanan Diterima!</h3>
          <p class="trx-modal-subtitle">${trxCode}</p>
        </div>
      </div>
      <button type="button" class="trx-modal-close" onclick="closeTransactionModal()" title="Tutup">
        <span class="material-symbols-outlined" style="font-size: 1.15rem;">close</span>
      </button>
    </div>

    <div class="trx-modal-body">
      <div class="trx-success-wrap">
        <div class="trx-success-icon">
          <span class="material-symbols-outlined">check_circle</span>
        </div>
        <h3 class="trx-success-title">Pesanan Dikonfirmasi!</h3>
        <p class="trx-success-desc">
          Terima kasih <strong>${name}</strong>, pesanan Anda telah masuk ke sistem TeFa SMKN 2 Karanganyar.
        </p>

        <div class="trx-ticket-card">
          <div class="trx-ticket-row">
            <span>No. Pesanan</span>
            <strong>${trxCode}</strong>
          </div>
          <div class="trx-ticket-row">
            <span>Produk</span>
            <span>${selectedProduct.title} (${variant}, ${qty} pcs)</span>
          </div>
          <div class="trx-ticket-row">
            <span>Pengiriman</span>
            <span style="font-weight: 700; color: var(--primary-dark);">${selectedShippingName}</span>
          </div>
          <div class="trx-ticket-row">
            <span>Pembayaran</span>
            <span>${payMethod || 'QRIS Instan'}</span>
          </div>
          <div class="trx-ticket-row">
            <span>Total</span>
            <strong style="color: var(--primary-dark); font-size: 0.95rem;">Rp ${total.toLocaleString('id-ID')}</strong>
          </div>
          <div style="margin-top: 0.35rem; border-top: 1px dashed var(--outline-variant); padding-top: 0.35rem;">
            <span style="font-size: 0.72rem; color: var(--secondary); font-weight: 700; text-transform: uppercase;">Kode Pengambilan / Resi:</span>
            <div class="trx-code-box">
              <span id="trxResiCode">${trxCode}</span>
              <button type="button" class="trx-copy-btn" onclick="copyText('trxResiCode', this)" title="Salin Kode">
                <span class="material-symbols-outlined" style="font-size: 1rem;">content_copy</span>
              </button>
            </div>
            ${selectedShippingCost === 0 ? `
              <div class="trx-alert trx-alert-success" style="margin-top: 0.45rem;">
                <span class="material-symbols-outlined">storefront</span>
                <div>
                  Tunjukkan kode ini di Kasir TeFa Gedung B (08.00 - 15.30 WIB).
                </div>
              </div>
            ` : `
              <div class="trx-alert trx-alert-info" style="margin-top: 0.45rem;">
                <span class="material-symbols-outlined">local_shipping</span>
                <div>
                  Pesanan segera dikemas. Update resi dikirim via WhatsApp ke <strong>${phone}</strong>.
                </div>
              </div>
            `}
          </div>
        </div>

        <div style="display: flex; gap: 0.5rem; width: 100%;">
          <button type="button" class="trx-btn-submit" style="flex: 1; justify-content: center;" onclick="window.print()">
            <span class="material-symbols-outlined" style="font-size: 1rem;">print</span>
            <span>Cetak Invoice</span>
          </button>
          <button type="button" class="trx-btn-cancel" style="flex: 1; justify-content: center;" onclick="closeTransactionModal()">
            <span>Selesai</span>
          </button>
        </div>
      </div>
    </div>
  `;
}

// -------------------------------------------------------------
// 3. FLOW BOOKING SERVIS: OTOTRONIK & MESIN (APPOINTMENT & BAYAR DI TEMPAT)
// -------------------------------------------------------------
function renderBookingFlow(container) {
  const today = new Date();
  today.setDate(today.getDate() + 1);
  const minDate = today.toISOString().split('T')[0];

  container.innerHTML = `
    <div class="trx-modal-header">
      <div class="trx-modal-title-wrap">
        <div class="trx-modal-icon" style="background: rgba(220, 38, 38, 0.12); color: #dc2626;">
          <span class="material-symbols-outlined">calendar_month</span>
        </div>
        <div>
          <h3 class="trx-modal-title">Booking Servis Bengkel</h3>
          <p class="trx-modal-subtitle">${selectedProduct.jurusanName}</p>
        </div>
      </div>
      <button type="button" class="trx-modal-close" onclick="closeTransactionModal()" title="Tutup">
        <span class="material-symbols-outlined" style="font-size: 1.15rem;">close</span>
      </button>
    </div>

    <form id="bookingForm" onsubmit="handleBookingSubmit(event)">
      <div class="trx-modal-body">
        <div class="trx-alert trx-alert-warning">
          <span class="material-symbols-outlined">payments</span>
          <div>
            Tanpa biaya di muka. Pembayaran dilakukan di kasir setelah servis selesai.
          </div>
        </div>

        <div class="trx-prod-preview-compact">
          <div class="trx-pp-info">
            <span class="trx-pp-cat">${selectedProduct.category}</span>
            <h4 class="trx-pp-name">${selectedProduct.title}</h4>
            <span class="trx-pp-sub">Jasa Servis TeFa</span>
          </div>
          <div class="trx-pp-price">${selectedProduct.priceFormatted}</div>
        </div>

        <div class="trx-field">
          <label class="trx-label">Tanggal Booking <span style="color:var(--error)">*</span></label>
          <input type="date" class="trx-input" id="bookDate" min="${minDate}" value="${minDate}" required>
        </div>

        <div class="trx-field">
          <label class="trx-label">Sesi Kedatangan <span style="color:var(--error)">*</span></label>
          <div class="trx-slots-grid">
            <button type="button" class="trx-slot-btn selected" onclick="selectSlotBtn(this, '08:30 - 10:00 WIB')">
              08:30 - 10:00 WIB<br><small style="color:inherit; opacity:0.8;">(Pagi 1)</small>
            </button>
            <button type="button" class="trx-slot-btn" onclick="selectSlotBtn(this, '10:30 - 12:00 WIB')">
              10:30 - 12:00 WIB<br><small style="color:inherit; opacity:0.8;">(Pagi 2)</small>
            </button>
            <button type="button" class="trx-slot-btn" onclick="selectSlotBtn(this, '13:00 - 14:30 WIB')">
              13:00 - 14:30 WIB<br><small style="color:inherit; opacity:0.8;">(Siang)</small>
            </button>
            <button type="button" class="trx-slot-btn" onclick="selectSlotBtn(this, '14:30 - 16:00 WIB')">
              14:30 - 16:00 WIB<br><small style="color:inherit; opacity:0.8;">(Sore)</small>
            </button>
          </div>
        </div>

        <div class="trx-grid-2">
          <div class="trx-field">
            <label class="trx-label">Kendaraan / Mesin <span style="color:var(--error)">*</span></label>
            <input type="text" class="trx-input" id="bookVehicle" placeholder="Cth: Vario 160 / Avanza" required>
          </div>
          <div class="trx-field">
            <label class="trx-label">Plat Nomor / Seri <span style="color:var(--error)">*</span></label>
            <input type="text" class="trx-input" id="bookPlate" placeholder="Cth: AD 1234 BZ" required>
          </div>
        </div>

        <div class="trx-grid-2">
          <div class="trx-field">
            <label class="trx-label">Nama Pemesan <span style="color:var(--error)">*</span></label>
            <input type="text" class="trx-input" id="bookCustomer" placeholder="Nama Anda" required>
          </div>
          <div class="trx-field">
            <label class="trx-label">Nomor WhatsApp <span style="color:var(--error)">*</span></label>
            <input type="tel" class="trx-input" id="bookPhone" placeholder="08xxxxxxxxxx" required>
          </div>
        </div>

        <div class="trx-field">
          <label class="trx-label">Keluhan Singkat (Opsional)</label>
          <input type="text" class="trx-input" id="bookComplaint" placeholder="Keluhan atau perbaikan yang diinginkan (opsional)">
        </div>

        <div class="trx-summary-box">
          <div class="trx-summary-row">
            <span>Estimasi Biaya Servis</span>
            <span class="trx-summary-val">${selectedProduct.priceFormatted}</span>
          </div>
          <div class="trx-summary-row">
            <span>Metode Bayar</span>
            <span class="trx-summary-val" style="font-weight: 600; color: #006e2f;">Bayar Selesai Servis di Bengkel</span>
          </div>
          <div class="trx-summary-row total">
            <span>Biaya Booking Online</span>
            <span class="trx-summary-total" style="font-size: 0.95rem;">GRATIS (Rp 0)</span>
          </div>
        </div>
      </div>

      <div class="trx-modal-footer">
        <button type="button" class="trx-btn-cancel" onclick="closeTransactionModal()">Batal</button>
        <button type="submit" class="trx-btn-submit" id="btnBookSubmit" style="background: #dc2626; color: #ffffff;">
          <span>Konfirmasi Booking</span>
          <span class="material-symbols-outlined" style="font-size: 1rem;">event_available</span>
        </button>
      </div>
    </form>
  `;
}

function selectSlotBtn(btn, slotText) {
  const parent = btn.parentElement;
  parent.querySelectorAll('.trx-slot-btn').forEach(b => b.classList.remove('selected'));
  btn.classList.add('selected');
  selectedSlot = slotText;
}

function handleBookingSubmit(e) {
  e.preventDefault();
  const customer = document.getElementById('bookCustomer').value;
  const phone = document.getElementById('bookPhone').value;
  const vehicle = document.getElementById('bookVehicle').value;
  const plate = document.getElementById('bookPlate').value;
  const date = document.getElementById('bookDate').value;
  const btn = document.getElementById('btnBookSubmit');

  btn.disabled = true;
  btn.innerHTML = `<span class="material-symbols-outlined" style="animation: spin 1s linear infinite; font-size: 1rem;">sync</span> <span>Memproses...</span>`;

  setTimeout(() => {
    showBookingSuccess(customer, phone, vehicle, plate, date);
  }, 900);
}

function showBookingSuccess(customer, phone, vehicle, plate, date) {
  const container = document.getElementById('trxModalContent');
  const bookingCode = 'BOOK-OTO-' + Math.floor(100000 + Math.random() * 900000);

  const dObj = new Date(date);
  const dateFormatted = dObj.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });

  container.innerHTML = `
    <div class="trx-modal-header">
      <div class="trx-modal-title-wrap">
        <div class="trx-modal-icon" style="background: rgba(34, 197, 94, 0.15); color: #006e2f;">
          <span class="material-symbols-outlined">confirmation_number</span>
        </div>
        <div>
          <h3 class="trx-modal-title">E-Tiket Booking Terbit!</h3>
          <p class="trx-modal-subtitle">${bookingCode}</p>
        </div>
      </div>
      <button type="button" class="trx-modal-close" onclick="closeTransactionModal()" title="Tutup">
        <span class="material-symbols-outlined" style="font-size: 1.15rem;">close</span>
      </button>
    </div>

    <div class="trx-modal-body">
      <div class="trx-success-wrap">
        <div class="trx-success-icon" style="background: rgba(34, 197, 94, 0.15); color: #006e2f;">
          <span class="material-symbols-outlined">event_available</span>
        </div>
        <h3 class="trx-success-title">Jadwal Servis Dikonfirmasi!</h3>
        <p class="trx-success-desc">
          Halo <strong>${customer}</strong>, jadwal servis Anda telah terdaftar di Bengkel TeFa SMKN 2 Karanganyar.
        </p>

        <div class="trx-ticket-card">
          <div class="trx-ticket-row">
            <span>Kode Booking</span>
            <strong style="color: var(--primary-dark);">${bookingCode}</strong>
          </div>
          <div class="trx-ticket-row">
            <span>Layanan</span>
            <span>${selectedProduct.title}</span>
          </div>
          <div class="trx-ticket-row">
            <span>Jadwal</span>
            <strong style="color: var(--on-surface);">${dateFormatted}</strong>
          </div>
          <div class="trx-ticket-row">
            <span>Sesi Kedatangan</span>
            <span style="font-weight: 700; color: #dc2626;">${selectedSlot}</span>
          </div>
          <div class="trx-ticket-row">
            <span>Kendaraan</span>
            <span>${vehicle} (${plate})</span>
          </div>
          <div class="trx-ticket-row">
            <span>Pembayaran</span>
            <span style="font-weight: 700; color: #006e2f;">Bayar Selesai Servis</span>
          </div>

          <div style="margin-top: 0.35rem; border-top: 1px dashed var(--outline-variant); padding-top: 0.35rem;">
            <div class="trx-alert trx-alert-info">
              <span class="material-symbols-outlined">pin_drop</span>
              <div>
                Datang 10 menit sebelum jadwal ke Bengkel TeFa dan tunjukkan kode booking ini.
              </div>
            </div>
          </div>
        </div>

        <div style="display: flex; gap: 0.5rem; width: 100%;">
          <button type="button" class="trx-btn-submit" style="flex: 1; justify-content: center;" onclick="window.print()">
            <span class="material-symbols-outlined" style="font-size: 1rem;">print</span>
            <span>Cetak E-Tiket</span>
          </button>
          <button type="button" class="trx-btn-cancel" style="flex: 1; justify-content: center;" onclick="closeTransactionModal()">
            <span>Selesai</span>
          </button>
        </div>
      </div>
    </div>
  `;
}

function selectSlotBtn(btn, slotText) {
  const parent = btn.parentElement;
  parent.querySelectorAll('.trx-slot-btn').forEach(b => b.classList.remove('selected'));
  btn.classList.add('selected');
  selectedSlot = slotText;
}

function handleBookingSubmit(e) {
  e.preventDefault();
  const customer = document.getElementById('bookCustomer').value;
  const phone = document.getElementById('bookPhone').value;
  const vehicle = document.getElementById('bookVehicle').value;
  const plate = document.getElementById('bookPlate').value;
  const date = document.getElementById('bookDate').value;
  const btn = document.getElementById('btnBookSubmit');

  btn.disabled = true;
  btn.innerHTML = `<span class="material-symbols-outlined" style="animation: spin 1s linear infinite; font-size: 1.05rem;">sync</span> <span>Menerbitkan E-Tiket...</span>`;

  setTimeout(() => {
    showBookingSuccess(customer, phone, vehicle, plate, date);
  }, 1000);
}

function showBookingSuccess(customer, phone, vehicle, plate, date) {
  const container = document.getElementById('trxModalContent');
  const bookingCode = 'BOOK-OTO-' + Math.floor(100000 + Math.random() * 900000);

  // Format tanggal ke format lokal
  const dObj = new Date(date);
  const dateFormatted = dObj.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });

  container.innerHTML = `
    <div class="trx-modal-header">
      <div class="trx-modal-title-wrap">
        <div class="trx-modal-icon" style="background: rgba(34, 197, 94, 0.15); color: #006e2f;">
          <span class="material-symbols-outlined">confirmation_number</span>
        </div>
        <div>
          <h3 class="trx-modal-title">E-Tiket Booking Terbit!</h3>
          <p class="trx-modal-subtitle">${bookingCode}</p>
        </div>
      </div>
      <button type="button" class="trx-modal-close" onclick="closeTransactionModal()" title="Tutup">
        <span class="material-symbols-outlined" style="font-size: 1.15rem;">close</span>
      </button>
    </div>

    <div class="trx-modal-body">
      <div class="trx-success-wrap">
        <div class="trx-success-icon" style="background: rgba(34, 197, 94, 0.15); color: #006e2f;">
          <span class="material-symbols-outlined">event_available</span>
        </div>
        <h3 class="trx-success-title">Jadwal Servis Dikonfirmasi!</h3>
        <p class="trx-success-desc">
          Halo <strong>${customer}</strong>, jadwal servis Anda telah terdaftar di Bengkel TeFa SMKN 2 Karanganyar.
        </p>

        <div class="trx-ticket-card">
          <div class="trx-ticket-row">
            <span>Kode Booking</span>
            <strong style="color: var(--primary-dark);">${bookingCode}</strong>
          </div>
          <div class="trx-ticket-row">
            <span>Layanan Servis</span>
            <span>${selectedProduct.title}</span>
          </div>
          <div class="trx-ticket-row">
            <span>Hari &amp; Tanggal</span>
            <strong style="color: var(--on-surface);">${dateFormatted}</strong>
          </div>
          <div class="trx-ticket-row">
            <span>Slot Jam Kedatangan</span>
            <span style="font-weight: 700; color: #dc2626;">${selectedSlot}</span>
          </div>
          <div class="trx-ticket-row">
            <span>Kendaraan</span>
            <span>${vehicle} (${plate})</span>
          </div>
          <div class="trx-ticket-row">
            <span>Status Bayar</span>
            <span style="font-weight: 700; color: #006e2f;">Bayar Selesai Servis</span>
          </div>

          <div style="margin-top: 0.4rem; border-top: 1px dashed var(--outline-variant); padding-top: 0.4rem;">
            <div class="trx-alert trx-alert-info">
              <span class="material-symbols-outlined">pin_drop</span>
              <div>
                <strong>Petunjuk:</strong> Datang 10 menit sebelum jadwal ke Bengkel TeFa SMKN 2 Karanganyar dan tunjukkan kode booking ini.
              </div>
            </div>
          </div>
        </div>

        <div style="display: flex; gap: 0.5rem; width: 100%;">
          <button type="button" class="trx-btn-submit" style="flex: 1; justify-content: center;" onclick="window.print()">
            <span class="material-symbols-outlined" style="font-size: 1.05rem;">print</span>
            <span>Cetak E-Tiket</span>
          </button>
          <button type="button" class="trx-btn-cancel" style="flex: 1; justify-content: center;" onclick="closeTransactionModal()">
            <span>Selesai</span>
          </button>
        </div>
      </div>
    </div>
  `;
}

// -------------------------------------------------------------
// HELPER FUNCTIONS
// -------------------------------------------------------------
function selectPayTile(tile) {
  const group = tile.closest('.trx-tile-group');
  group.querySelectorAll('.trx-tile').forEach(t => t.classList.remove('selected'));
  tile.classList.add('selected');
  tile.querySelector('input[type="radio"]').checked = true;
}

function copyText(elementId, btn) {
  const el = document.getElementById(elementId);
  if (!el) return;
  const text = el.innerText;
  navigator.clipboard.writeText(text).then(() => {
    const originalIcon = btn.innerHTML;
    btn.innerHTML = `<span class="material-symbols-outlined" style="font-size: 1.15rem; color: #006e2f;">check</span>`;
    setTimeout(() => {
      btn.innerHTML = originalIcon;
    }, 2000);
  });
}

function triggerFileDownload(fileName) {
  // Simulasi unduh file teks/zip resmi
  const dummyContent = `SMK NEGERI 2 KARANGANYAR - TEACHING FACTORY REKAYASA PERANGKAT LUNAK (RPL)
Paket Unduhan: ${fileName}
Tanggal: ${new Date().toLocaleString('id-ID')}
Status Lisensi: Aktif & Terverifikasi
Website Resmi: https://smkn2karanganyar.sch.id
Terima kasih telah mendukung inovasi Teaching Factory SMKN 2 Karanganyar!`;

  const blob = new Blob([dummyContent], { type: 'application/octet-stream' });
  const url = URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.href = url;
  a.download = fileName;
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
  URL.revokeObjectURL(url);
}

// Jalankan ketika DOM siap
document.addEventListener('DOMContentLoaded', initTransaksiPage);
