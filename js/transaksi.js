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
        <div class="trx-modal-icon" style="background: rgba(34, 197, 94, 0.12); color: #006e2f;">
          <span class="material-symbols-outlined">download_done</span>
        </div>
        <div>
          <h3 class="trx-modal-title">Transaksi Produk Digital</h3>
          <p class="trx-modal-subtitle">${selectedProduct.jurusanName} (RPL)</p>
        </div>
      </div>
      <button class="trx-modal-close" onclick="closeTransactionModal()">
        <span class="material-symbols-outlined">close</span>
      </button>
    </div>

    <form id="digitalForm" onsubmit="handleDigitalSubmit(event)">
      <div class="trx-modal-body">
        <div class="trx-alert trx-alert-info">
          <span class="material-symbols-outlined">verified</span>
          <div>
            <strong>Metode Otomatis RPL:</strong> File source code/template akan langsung di-download otomatis setelah pembayaran terverifikasi, dan Serial License Key resmi dikirimkan ke email Anda.
          </div>
        </div>

        <!-- Detail Produk Ringkas -->
        <div style="background: var(--surface-container-low); padding: 1rem 1.25rem; border-radius: 16px; border: 1px solid var(--outline-variant); display: flex; justify-content: space-between; align-items: center;">
          <div>
            <h4 style="font-size: 1rem; color: var(--on-surface); font-family: var(--font-heading); margin-bottom: 0.2rem;">${selectedProduct.title}</h4>
            <span style="font-size: 0.8rem; color: var(--secondary);">${selectedProduct.category}</span>
          </div>
          <div style="font-size: 1.2rem; font-weight: 800; color: var(--primary-dark);">
            ${selectedProduct.priceFormatted}
          </div>
        </div>

        <div class="trx-grid-2">
          <div class="trx-field">
            <label class="trx-label">Nama Lengkap <span style="color:var(--error)">*</span></label>
            <input type="text" class="trx-input" id="digName" placeholder="Contoh: Budi Santoso" required>
          </div>
          <div class="trx-field">
            <label class="trx-label">Nomor WhatsApp <span style="color:var(--error)">*</span></label>
            <input type="tel" class="trx-input" id="digPhone" placeholder="0812xxxxxxxx" required>
          </div>
        </div>

        <div class="trx-field">
          <label class="trx-label">Alamat Email (Pengiriman Lisensi) <span style="color:var(--error)">*</span></label>
          <input type="email" class="trx-input" id="digEmail" placeholder="nama@email.com" required>
          <small style="color: var(--secondary); font-size: 0.78rem;">Sistem akan mengirimkan sertifikat lisensi dan link unduhan cadangan ke email ini.</small>
        </div>

        <div class="trx-field">
          <label class="trx-label">Pilih Metode Pembayaran Cepat</label>
          <div class="trx-tile-group cols-3">
            <label class="trx-tile selected" onclick="selectPayTile(this)">
              <input type="radio" name="payMethod" value="qris" checked>
              <div class="trx-tile-content">
                <span class="trx-tile-title">QRIS Instan</span>
                <span class="trx-tile-sub">Semua E-Wallet/Bank</span>
              </div>
            </label>
            <label class="trx-tile" onclick="selectPayTile(this)">
              <input type="radio" name="payMethod" value="va">
              <div class="trx-tile-content">
                <span class="trx-tile-title">Virtual Account</span>
                <span class="trx-tile-sub">BCA / Mandiri / BRI</span>
              </div>
            </label>
            <label class="trx-tile" onclick="selectPayTile(this)">
              <input type="radio" name="payMethod" value="ewallet">
              <div class="trx-tile-content">
                <span class="trx-tile-title">E-Wallet</span>
                <span class="trx-tile-sub">GoPay / ShopeePay</span>
              </div>
            </label>
          </div>
        </div>

        <div class="trx-summary-box">
          <div class="trx-summary-row">
            <span>Harga Produk</span>
            <span>${selectedProduct.priceFormatted}</span>
          </div>
          <div class="trx-summary-row">
            <span>Biaya Layanan & Download</span>
            <span style="color: var(--primary-dark); font-weight: 600;">GRATIS</span>
          </div>
          <div class="trx-summary-row total">
            <span>Total Pembayaran</span>
            <span style="color: var(--primary-dark);">${selectedProduct.priceFormatted}</span>
          </div>
        </div>
      </div>

      <div class="trx-modal-footer">
        <button type="button" class="btn-nav-outline" onclick="closeTransactionModal()">Batal</button>
        <button type="submit" class="btn-primary" id="btnPayDigital">
          <span>Konfirmasi &amp; Bayar</span>
          <span class="material-symbols-outlined" style="font-size: 1.1rem;">arrow_forward</span>
        </button>
      </div>
    </form>
  `;
}

function handleDigitalSubmit(e) {
  e.preventDefault();
  const name = document.getElementById('digName').value;
  const email = document.getElementById('digEmail').value;
  const btn = document.getElementById('btnPayDigital');

  btn.disabled = true;
  btn.innerHTML = `<span class="material-symbols-outlined" style="animation: spin 1s linear infinite;">sync</span> <span>Memproses Pembayaran...</span>`;

  // Simulasi verifikasi instan
  setTimeout(() => {
    showDigitalSuccess(name, email);
  }, 1200);
}

function showDigitalSuccess(name, email) {
  const container = document.getElementById('trxModalContent');
  const licenseKey = 'SMK2-RPL-' + Math.random().toString(36).substring(2, 6).toUpperCase() + '-' + Math.random().toString(36).substring(2, 6).toUpperCase() + '-2026';
  const orderId = 'INV-RPL-' + Math.floor(100000 + Math.random() * 900000);

  container.innerHTML = `
    <div class="trx-modal-header">
      <div class="trx-modal-title-wrap">
        <div class="trx-modal-icon" style="background: rgba(34, 197, 94, 0.15); color: #006e2f;">
          <span class="material-symbols-outlined">check_circle</span>
        </div>
        <div>
          <h3 class="trx-modal-title">Pembayaran Sukses!</h3>
          <p class="trx-modal-subtitle">${orderId}</p>
        </div>
      </div>
      <button class="trx-modal-close" onclick="closeTransactionModal()">
        <span class="material-symbols-outlined">close</span>
      </button>
    </div>

    <div class="trx-modal-body">
      <div class="trx-success-wrap">
        <div class="trx-success-icon">
          <span class="material-symbols-outlined">verified</span>
        </div>
        <h3 style="font-family: var(--font-heading); font-size: 1.35rem; color: var(--on-surface);">Terima Kasih, ${name}!</h3>
        <p style="color: var(--secondary); font-size: 0.9rem; max-width: 440px; margin-top: 0.35rem;">
          Pembayaran Anda telah dikonfirmasi secara otomatis. File siap diunduh dan lisensi resmi Anda telah diterbitkan.
        </p>

        <div class="trx-ticket-card">
          <div class="trx-ticket-row">
            <span style="color: var(--secondary);">Nama Produk</span>
            <strong>${selectedProduct.title}</strong>
          </div>
          <div class="trx-ticket-row">
            <span style="color: var(--secondary);">Status Transaksi</span>
            <span style="color: #006e2f; font-weight: 700;">Lunas (Verified)</span>
          </div>
          <div class="trx-ticket-row">
            <span style="color: var(--secondary);">Email Pengiriman</span>
            <span>${email}</span>
          </div>
          <div style="margin-top: 1rem;">
            <span style="font-size: 0.78rem; color: var(--secondary); font-weight: 600; text-transform: uppercase;">Kode Lisensi Resmi (License Key):</span>
            <div class="trx-code-box">
              <span id="licenseCodeText">${licenseKey}</span>
              <button class="trx-copy-btn" onclick="copyText('licenseCodeText', this)" title="Salin Lisensi">
                <span class="material-symbols-outlined" style="font-size: 1.15rem;">content_copy</span>
              </button>
            </div>
            <small style="color: var(--secondary); font-size: 0.78rem;">Salinan lisensi dan link cadangan telah otomatis dikirim ke <strong>${email}</strong>.</small>
          </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 0.75rem; width: 100%;">
          <button class="btn-primary" style="width: 100%; justify-content: center;" onclick="triggerFileDownload('${selectedProduct.fileName}')">
            <span class="material-symbols-outlined">download</span>
            <span>Download File Sekarang (${selectedProduct.fileName})</span>
          </button>
          <button class="btn-nav-outline" style="width: 100%; justify-content: center;" onclick="window.print()">
            <span class="material-symbols-outlined">receipt_long</span>
            <span>Cetak Bukti Pembayaran Digital</span>
          </button>
        </div>
      </div>
    </div>
  `;

  // Auto trigger download dalam 2 detik
  setTimeout(() => {
    triggerFileDownload(selectedProduct.fileName);
  }, 2000);
}

// -------------------------------------------------------------
// 2. FLOW FISIK: TEKSTIL & MESIN (KURIR / EKSPEDISI / AMBIL TEFA)
// -------------------------------------------------------------
function renderFisikFlow(container) {
  selectedShippingCost = 0;
  selectedShippingName = 'Ambil Langsung di TeFa (Gedung B)';

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
      <button class="trx-modal-close" onclick="closeTransactionModal()">
        <span class="material-symbols-outlined">close</span>
      </button>
    </div>

    <form id="fisikForm" onsubmit="handleFisikSubmit(event)">
      <div class="trx-modal-body">
        <div class="trx-alert trx-alert-info">
          <span class="material-symbols-outlined">local_shipping</span>
          <div>
            <strong>Metode Pengiriman TeFa:</strong> Anda dapat memilih dikirim via Kurir Lokal, Ekspedisi Reguler (JNE/J&T), atau diambil langsung di Teaching Factory SMKN 2 Karanganyar.
          </div>
        </div>

        <div style="background: var(--surface-container-low); padding: 1rem 1.25rem; border-radius: 16px; border: 1px solid var(--outline-variant); display: flex; justify-content: space-between; align-items: center;">
          <div>
            <h4 style="font-size: 1rem; color: var(--on-surface); font-family: var(--font-heading); margin-bottom: 0.2rem;">${selectedProduct.title}</h4>
            <span style="font-size: 0.8rem; color: var(--secondary);">${selectedProduct.category}</span>
          </div>
          <div style="font-size: 1.2rem; font-weight: 800; color: var(--primary-dark);" id="itemBasePrice">
            ${selectedProduct.priceFormatted}
          </div>
        </div>

        <div class="trx-grid-2">
          <div class="trx-field">
            <label class="trx-label">Pilihan Varian / Ukuran / Spek</label>
            <select class="trx-select" id="fisikVariant">
              <option value="Standar">Varian Standar / All Size</option>
              <option value="S">Ukuran S (Small)</option>
              <option value="M" selected>Ukuran M (Medium)</option>
              <option value="L">Ukuran L (Large)</option>
              <option value="XL">Ukuran XL (Extra Large)</option>
              <option value="Custom">Kustom Spesifikasi Teknis</option>
            </select>
          </div>
          <div class="trx-field">
            <label class="trx-label">Jumlah (Qty)</label>
            <input type="number" class="trx-input" id="fisikQty" value="1" min="1" max="100" onchange="updateFisikTotal()" required>
          </div>
        </div>

        <div class="trx-field">
          <label class="trx-label">Pilihan Pengiriman / Pemenuhan <span style="color:var(--error)">*</span></label>
          <div class="trx-tile-group">
            <label class="trx-tile selected" onclick="selectShippingTile(this, 0, 'Ambil Langsung di TeFa SMKN 2 Karanganyar (Gedung B)')">
              <input type="radio" name="shippingMethod" value="tefa" checked>
              <div class="trx-tile-content">
                <span class="trx-tile-title">Ambil Langsung di Teaching Factory (TeFa)</span>
                <span class="trx-tile-sub">SMKN 2 Karanganyar Gedung B • Jam 08.00 - 15.30 WIB</span>
                <span class="trx-tile-price">GRATIS (Rp 0)</span>
              </div>
            </label>

            <label class="trx-tile" onclick="selectShippingTile(this, 15000, 'Kurir Lokal Karanganyar - Solo Raya')">
              <input type="radio" name="shippingMethod" value="lokal">
              <div class="trx-tile-content">
                <span class="trx-tile-title">Kurir Lokal (Wilayah Karanganyar - Solo)</span>
                <span class="trx-tile-sub">Pengiriman cepat sampai di hari yang sama/berikutnya</span>
                <span class="trx-tile-price">+ Rp 15.000</span>
              </div>
            </label>

            <label class="trx-tile" onclick="selectShippingTile(this, 25000, 'Ekspedisi Reguler (JNE / J&T / SiCepat)')">
              <input type="radio" name="shippingMethod" value="ekspedisi">
              <div class="trx-tile-content">
                <span class="trx-tile-title">Ekspedisi Nasional (JNE / J&T / SiCepat)</span>
                <span class="trx-tile-sub">Pengiriman ke seluruh Indonesia dengan nomor resi online</span>
                <span class="trx-tile-price">+ Rp 25.000</span>
              </div>
            </label>
          </div>
        </div>

        <div class="trx-grid-2">
          <div class="trx-field">
            <label class="trx-label">Nama Lengkap Penerima <span style="color:var(--error)">*</span></label>
            <input type="text" class="trx-input" id="fisikName" placeholder="Nama Anda" required>
          </div>
          <div class="trx-field">
            <label class="trx-label">Nomor WhatsApp / HP <span style="color:var(--error)">*</span></label>
            <input type="tel" class="trx-input" id="fisikPhone" placeholder="08xxxxxxxxxx" required>
          </div>
        </div>

        <div class="trx-field" id="addressFieldWrap" style="display: none;">
          <label class="trx-label">Alamat Lengkap Pengiriman <span style="color:var(--error)">*</span></label>
          <textarea class="trx-textarea" id="fisikAddress" rows="2" placeholder="Jalan, RT/RW, Kelurahan, Kecamatan, Kabupaten/Kota, Kode Pos"></textarea>
        </div>

        <div class="trx-field">
          <label class="trx-label">Catatan Tambahan / Kustomisasi (Opsional)</label>
          <input type="text" class="trx-input" id="fisikNotes" placeholder="Contoh: Bordir nama, toleransi ukuran baut, dll">
        </div>

        <div class="trx-summary-box">
          <div class="trx-summary-row">
            <span>Subtotal Produk (<span id="summaryQty">1</span> item)</span>
            <span id="summarySubtotal">${selectedProduct.priceFormatted}</span>
          </div>
          <div class="trx-summary-row">
            <span>Metode Pemenuhan</span>
            <span id="summaryShippingName" style="font-weight: 600;">Ambil di TeFa (Rp 0)</span>
          </div>
          <div class="trx-summary-row total">
            <span>Total Akhir</span>
            <span id="summaryTotal" style="color: var(--primary-dark);">${selectedProduct.priceFormatted}</span>
          </div>
        </div>
      </div>

      <div class="trx-modal-footer">
        <button type="button" class="btn-nav-outline" onclick="closeTransactionModal()">Batal</button>
        <button type="submit" class="btn-primary" id="btnFisikPay">
          <span>Checkout &amp; Pesan Produk</span>
          <span class="material-symbols-outlined" style="font-size: 1.1rem;">arrow_forward</span>
        </button>
      </div>
    </form>
  `;
}

function selectShippingTile(tile, cost, name) {
  const group = tile.closest('.trx-tile-group');
  group.querySelectorAll('.trx-tile').forEach(t => t.classList.remove('selected'));
  tile.classList.add('selected');
  tile.querySelector('input[type="radio"]').checked = true;

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
      ? 'Ambil Langsung di TeFa (Gratis)'
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
  const btn = document.getElementById('btnFisikPay');

  btn.disabled = true;
  btn.innerHTML = `<span class="material-symbols-outlined" style="animation: spin 1s linear infinite;">sync</span> <span>Membuat Pesanan TeFa...</span>`;

  setTimeout(() => {
    showFisikSuccess(name, phone, qty, variant);
  }, 1200);
}

function showFisikSuccess(name, phone, qty, variant) {
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
          <h3 class="trx-modal-title">Pesanan TeFa Berhasil!</h3>
          <p class="trx-modal-subtitle">${trxCode}</p>
        </div>
      </div>
      <button class="trx-modal-close" onclick="closeTransactionModal()">
        <span class="material-symbols-outlined">close</span>
      </button>
    </div>

    <div class="trx-modal-body">
      <div class="trx-success-wrap">
        <div class="trx-success-icon">
          <span class="material-symbols-outlined">check_circle</span>
        </div>
        <h3 style="font-family: var(--font-heading); font-size: 1.35rem; color: var(--on-surface);">Pesanan Dikonfirmasi!</h3>
        <p style="color: var(--secondary); font-size: 0.9rem; max-width: 440px; margin-top: 0.35rem;">
          Terima kasih <strong>${name}</strong>, pesanan produk fisik Anda telah masuk ke sistem Teaching Factory SMKN 2 Karanganyar.
        </p>

        <div class="trx-ticket-card">
          <div class="trx-ticket-row">
            <span style="color: var(--secondary);">Nomor Pesanan</span>
            <strong>${trxCode}</strong>
          </div>
          <div class="trx-ticket-row">
            <span style="color: var(--secondary);">Produk & Varian</span>
            <span>${selectedProduct.title} (${variant}, ${qty} pcs)</span>
          </div>
          <div class="trx-ticket-row">
            <span style="color: var(--secondary);">Opsi Pemenuhan</span>
            <span style="font-weight: 700; color: var(--primary-dark);">${selectedShippingName}</span>
          </div>
          <div class="trx-ticket-row">
            <span style="color: var(--secondary);">Total Pembayaran</span>
            <strong style="color: var(--primary-dark); font-size: 1.05rem;">Rp ${total.toLocaleString('id-ID')}</strong>
          </div>
          <div style="margin-top: 1rem;">
            <span style="font-size: 0.78rem; color: var(--secondary); font-weight: 600; text-transform: uppercase;">Kode Pengambilan / Lacak Resi:</span>
            <div class="trx-code-box">
              <span id="trxResiCode">${trxCode}</span>
              <button class="trx-copy-btn" onclick="copyText('trxResiCode', this)" title="Salin Kode">
                <span class="material-symbols-outlined" style="font-size: 1.15rem;">content_copy</span>
              </button>
            </div>
            ${selectedShippingCost === 0 ? `
              <div class="trx-alert trx-alert-success" style="margin-top: 0.75rem;">
                <span class="material-symbols-outlined">storefront</span>
                <div>
                  <strong>Lokasi Pengambilan:</strong> Tunjukkan kode pesanan ini di Kasir/Unit Produksi Teaching Factory SMKN 2 Karanganyar (Gedung B) pada jam operasional sekolah (08.00 - 15.30 WIB).
                </div>
              </div>
            ` : `
              <div class="trx-alert trx-alert-info" style="margin-top: 0.75rem;">
                <span class="material-symbols-outlined">local_shipping</span>
                <div>
                  Pesanan akan segera dikemas dan dikirimkan ke alamat Anda. Konfirmasi resi pengiriman juga dikirim via WhatsApp ke <strong>${phone}</strong>.
                </div>
              </div>
            `}
          </div>
        </div>

        <div style="display: flex; gap: 0.75rem; width: 100%;">
          <button class="btn-primary" style="flex: 1; justify-content: center;" onclick="window.print()">
            <span class="material-symbols-outlined">print</span>
            <span>Cetak Invoice / Bukti Ambil</span>
          </button>
          <button class="btn-nav-outline" style="flex: 1; justify-content: center;" onclick="closeTransactionModal()">
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
  // Hitung tanggal besok sebagai tanggal default minimal
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
          <h3 class="trx-modal-title">Booking Jadwal Servis Bengkel</h3>
          <p class="trx-modal-subtitle">${selectedProduct.jurusanName}</p>
        </div>
      </div>
      <button class="trx-modal-close" onclick="closeTransactionModal()">
        <span class="material-symbols-outlined">close</span>
      </button>
    </div>

    <form id="bookingForm" onsubmit="handleBookingSubmit(event)">
      <div class="trx-modal-body">
        <div class="trx-alert trx-alert-warning">
          <span class="material-symbols-outlined">payments</span>
          <div>
            <strong>Alur Pembayaran Servis:</strong> Tanpa biaya di muka! Pelanggan memesan slot jadwal online, datang ke bengkel sekolah sesuai jadwal, lalu <strong>melakukan pembayaran di kasir TeFa setelah servis selesai</strong>.
          </div>
        </div>

        <div style="background: var(--surface-container-low); padding: 1rem 1.25rem; border-radius: 16px; border: 1px solid var(--outline-variant); display: flex; justify-content: space-between; align-items: center;">
          <div>
            <h4 style="font-size: 1rem; color: var(--on-surface); font-family: var(--font-heading); margin-bottom: 0.2rem;">${selectedProduct.title}</h4>
            <span style="font-size: 0.8rem; color: var(--secondary);">${selectedProduct.category}</span>
          </div>
          <div style="font-size: 1.15rem; font-weight: 800; color: var(--primary-dark);">
            ${selectedProduct.priceFormatted}
          </div>
        </div>

        <!-- Pemilihan Jadwal -->
        <div class="trx-field">
          <label class="trx-label">Pilih Tanggal Booking <span style="color:var(--error)">*</span></label>
          <input type="date" class="trx-input" id="bookDate" min="${minDate}" value="${minDate}" required>
        </div>

        <div class="trx-field">
          <label class="trx-label">Pilih Sesi Jam / Slot Waktu Kedatangan <span style="color:var(--error)">*</span></label>
          <div class="trx-slots-grid">
            <button type="button" class="trx-slot-btn selected" onclick="selectSlotBtn(this, '08:30 - 10:00 WIB')">
              08:30 - 10:00 WIB<br><small style="color:inherit; opacity:0.8;">(Sesi Pagi 1)</small>
            </button>
            <button type="button" class="trx-slot-btn" onclick="selectSlotBtn(this, '10:30 - 12:00 WIB')">
              10:30 - 12:00 WIB<br><small style="color:inherit; opacity:0.8;">(Sesi Pagi 2)</small>
            </button>
            <button type="button" class="trx-slot-btn" onclick="selectSlotBtn(this, '13:00 - 14:30 WIB')">
              13:00 - 14:30 WIB<br><small style="color:inherit; opacity:0.8;">(Sesi Siang)</small>
            </button>
            <button type="button" class="trx-slot-btn" onclick="selectSlotBtn(this, '14:30 - 16:00 WIB')">
              14:30 - 16:00 WIB<br><small style="color:inherit; opacity:0.8;">(Sesi Sore)</small>
            </button>
          </div>
        </div>

        <!-- Data Kendaraan / Alat -->
        <div class="trx-grid-2">
          <div class="trx-field">
            <label class="trx-label">Tipe Kendaraan / Mesin <span style="color:var(--error)">*</span></label>
            <input type="text" class="trx-input" id="bookVehicle" placeholder="Cth: Honda Vario 160 / Avanza 2021" required>
          </div>
          <div class="trx-field">
            <label class="trx-label">Nomor Polisi / Seri Alat <span style="color:var(--error)">*</span></label>
            <input type="text" class="trx-input" id="bookPlate" placeholder="Cth: AD 5678 BZ" required>
          </div>
        </div>

        <!-- Data Pelanggan -->
        <div class="trx-grid-2">
          <div class="trx-field">
            <label class="trx-label">Nama Pemilik / Pelanggan <span style="color:var(--error)">*</span></label>
            <input type="text" class="trx-input" id="bookCustomer" placeholder="Nama Anda" required>
          </div>
          <div class="trx-field">
            <label class="trx-label">Nomor WhatsApp <span style="color:var(--error)">*</span></label>
            <input type="tel" class="trx-input" id="bookPhone" placeholder="08xxxxxxxxxx" required>
          </div>
        </div>

        <div class="trx-field">
          <label class="trx-label">Keluhan atau Catatan Tambahan</label>
          <textarea class="trx-textarea" id="bookComplaint" rows="2" placeholder="Cth: Tarikan motor tersendat di RPM rendah, AC kurang dingin, dll"></textarea>
        </div>

        <div class="trx-summary-box">
          <div class="trx-summary-row">
            <span>Estimasi Biaya Jasa Servis</span>
            <span>${selectedProduct.priceFormatted}</span>
          </div>
          <div class="trx-summary-row">
            <span>Metode Pembayaran</span>
            <span style="font-weight: 700; color: #006e2f;">Bayar Setelah Servis Selesai di Bengkel</span>
          </div>
          <div class="trx-summary-row total">
            <span>Biaya Booking Online</span>
            <span style="color: var(--primary-dark); font-weight: 800;">GRATIS (Rp 0)</span>
          </div>
        </div>
      </div>

      <div class="trx-modal-footer">
        <button type="button" class="btn-nav-outline" onclick="closeTransactionModal()">Batal</button>
        <button type="submit" class="btn-primary" id="btnBookSubmit" style="background: #dc2626;">
          <span>Konfirmasi Booking Jadwal</span>
          <span class="material-symbols-outlined" style="font-size: 1.1rem;">event_available</span>
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
  btn.innerHTML = `<span class="material-symbols-outlined" style="animation: spin 1s linear infinite;">sync</span> <span>Menerbitkan E-Tiket Booking...</span>`;

  setTimeout(() => {
    showBookingSuccess(customer, phone, vehicle, plate, date);
  }, 1200);
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
      <button class="trx-modal-close" onclick="closeTransactionModal()">
        <span class="material-symbols-outlined">close</span>
      </button>
    </div>

    <div class="trx-modal-body">
      <div class="trx-success-wrap">
        <div class="trx-success-icon" style="background: rgba(34, 197, 94, 0.15); color: #006e2f;">
          <span class="material-symbols-outlined">event_available</span>
        </div>
        <h3 style="font-family: var(--font-heading); font-size: 1.35rem; color: var(--on-surface);">Jadwal Servis Dikonfirmasi!</h3>
        <p style="color: var(--secondary); font-size: 0.9rem; max-width: 440px; margin-top: 0.35rem;">
          Halo <strong>${customer}</strong>, jadwal servis Anda telah terdaftar pada sistem Bengkel TeFa SMKN 2 Karanganyar.
        </p>

        <div class="trx-ticket-card">
          <div class="trx-ticket-row">
            <span style="color: var(--secondary);">Kode Booking</span>
            <strong style="color: var(--primary-dark);">${bookingCode}</strong>
          </div>
          <div class="trx-ticket-row">
            <span style="color: var(--secondary);">Layanan Servis</span>
            <span>${selectedProduct.title}</span>
          </div>
          <div class="trx-ticket-row">
            <span style="color: var(--secondary);">Hari &amp; Tanggal</span>
            <strong style="color: var(--on-surface);">${dateFormatted}</strong>
          </div>
          <div class="trx-ticket-row">
            <span style="color: var(--secondary);">Slot Jam Kedatangan</span>
            <span style="font-weight: 700; color: #dc2626;">${selectedSlot}</span>
          </div>
          <div class="trx-ticket-row">
            <span style="color: var(--secondary);">Kendaraan / Plat No</span>
            <span>${vehicle} (${plate})</span>
          </div>
          <div class="trx-ticket-row">
            <span style="color: var(--secondary);">Status Pembayaran</span>
            <span style="font-weight: 700; color: #006e2f;">Bayar di Bengkel Selesai Servis</span>
          </div>

          <div style="margin-top: 1rem;">
            <div class="trx-alert trx-alert-info">
              <span class="material-symbols-outlined">pin_drop</span>
              <div>
                <strong>Petunjuk Kedatangan:</strong> Datang 10 menit sebelum slot waktu ke Bengkel Teaching Factory SMKN 2 Karanganyar (Jl. Raya Karanganyar No. 123). Tunjukkan E-Tiket ini kepada petugas service advisor.
              </div>
            </div>
          </div>
        </div>

        <div style="display: flex; gap: 0.75rem; width: 100%;">
          <button class="btn-primary" style="flex: 1; justify-content: center;" onclick="window.print()">
            <span class="material-symbols-outlined">print</span>
            <span>Cetak / Simpan E-Tiket</span>
          </button>
          <button class="btn-nav-outline" style="flex: 1; justify-content: center;" onclick="closeTransactionModal()">
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
