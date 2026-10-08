<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PPDB | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="stylesheet" href="../css/ppdb.css">
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>

    <!-- HERO -->
    <section class="ppdb-hero" id="ppdbHero">
      <div class="container">
        <h1 class="ppdb-hero-title">Penerimaan Murid Baru</h1>
        <p class="ppdb-hero-sub">SMKN 2 Karanganyar — Ikuti setiap tahapan secara berurutan untuk menyelesaikan pendaftaran.</p>
      </div>
    </section>

    <!-- TIMELINE STAGES -->
    <section class="ppdb-timeline-section">
      <div class="container">
        <div class="ppdb-timeline" id="ppdbTimeline">

          <a href="ppdb-aju-akun.php" class="ppdb-stage-card active">
            <div class="ppdb-stage-icon">
              <span class="material-symbols-outlined">person_add</span>
            </div>
            <div class="ppdb-stage-status">
              <span class="material-symbols-outlined stage-check">check_circle</span>
              <span class="material-symbols-outlined stage-lock">lock</span>
              <span class="stage-num">1</span>
            </div>
            <h3 class="ppdb-stage-title">Pengajuan Akun</h3>
            <p class="ppdb-stage-date">03 &ndash; 12 Juni 2026</p>
            <p class="ppdb-stage-desc">Isi data diri dan unggah dokumen persyaratan</p>
          </a>

          <a href="ppdb-verifikasi.php" class="ppdb-stage-card">
            <div class="ppdb-stage-icon">
              <span class="material-symbols-outlined">verified_user</span>
            </div>
            <div class="ppdb-stage-status">
              <span class="material-symbols-outlined stage-check">check_circle</span>
              <span class="material-symbols-outlined stage-lock">lock</span>
              <span class="stage-num">2</span>
            </div>
            <h3 class="ppdb-stage-title">Verifikasi Akun</h3>
            <p class="ppdb-stage-date">04 &ndash; 13 Juni 2026</p>
            <p class="ppdb-stage-desc">Verifikasi dokumen oleh operator sekolah</p>
          </a>

          <a href="ppdb-aktivasi.php" class="ppdb-stage-card">
            <div class="ppdb-stage-icon">
              <span class="material-symbols-outlined">key</span>
            </div>
            <div class="ppdb-stage-status">
              <span class="material-symbols-outlined stage-check">check_circle</span>
              <span class="material-symbols-outlined stage-lock">lock</span>
              <span class="stage-num">3</span>
            </div>
            <h3 class="ppdb-stage-title">Aktivasi Akun</h3>
            <p class="ppdb-stage-date">04 &ndash; 13 Juni 2026</p>
            <p class="ppdb-stage-desc">Aktivasi akun dengan token dari sekolah</p>
          </a>

          <a href="ppdb-daftar-sekolah.php" class="ppdb-stage-card">
            <div class="ppdb-stage-icon">
              <span class="material-symbols-outlined">school</span>
            </div>
            <div class="ppdb-stage-status">
              <span class="material-symbols-outlined stage-check">check_circle</span>
              <span class="material-symbols-outlined stage-lock">lock</span>
              <span class="stage-num">4</span>
            </div>
            <h3 class="ppdb-stage-title">Daftar Sekolah</h3>
            <p class="ppdb-stage-date">15 &ndash; 18 Juni 2026</p>
            <p class="ppdb-stage-desc">Pilih kompetensi keahlian dan jalur</p>
          </a>

          <a href="ppdb-hasil.php" class="ppdb-stage-card">
            <div class="ppdb-stage-icon">
              <span class="material-symbols-outlined">campaign</span>
            </div>
            <div class="ppdb-stage-status">
              <span class="material-symbols-outlined stage-check">check_circle</span>
              <span class="material-symbols-outlined stage-lock">lock</span>
              <span class="stage-num">5</span>
            </div>
            <h3 class="ppdb-stage-title">Hasil Seleksi</h3>
            <p class="ppdb-stage-date">21 Juni 2026</p>
            <p class="ppdb-stage-desc">Pengumuman hasil seleksi PPDB</p>
          </a>

          <a href="ppdb-daftar-ulang.php" class="ppdb-stage-card">
            <div class="ppdb-stage-icon">
              <span class="material-symbols-outlined">how_to_reg</span>
            </div>
            <div class="ppdb-stage-status">
              <span class="material-symbols-outlined stage-check">check_circle</span>
              <span class="material-symbols-outlined stage-lock">lock</span>
              <span class="stage-num">6</span>
            </div>
            <h3 class="ppdb-stage-title">Daftar Ulang</h3>
            <p class="ppdb-stage-date">22 &ndash; 25 Juni 2026</p>
            <p class="ppdb-stage-desc">Konfirmasi daftar ulang bagi yang lolos</p>
          </a>

        </div>
      </div>
    </section>

    <!-- JALUR PENDAFTARAN -->
    <section class="ppdb-section-white">
      <div class="container">
        <div class="section-header" style="text-align:left;">
          <div>
            <h2 class="section-title">Jalur Pendaftaran</h2>
            <p class="section-subtitle">Tersedia tiga jalur pendaftaran untuk masuk SMKN 2 Karanganyar</p>
          </div>
        </div>

        <div class="ppdb-info-grid">
          <div class="ppdb-info-card">
            <div class="icon">
              <span class="material-symbols-outlined">home</span>
            </div>
            <h4>Domisili</h4>
            <p>Bagi calon murid yang berdomisili di sekitar sekolah. Kuota <strong>10%</strong> dari total daya tampung.</p>
          </div>
          <div class="ppdb-info-card">
            <div class="icon">
              <span class="material-symbols-outlined">favorite</span>
            </div>
            <h4>Afirmasi</h4>
            <p>Bagi calon murid dari keluarga tidak mampu / pemegang KIP. Kuota minimal <strong>15%</strong>.</p>
          </div>
          <div class="ppdb-info-card">
            <div class="icon">
              <span class="material-symbols-outlined">emoji_events</span>
            </div>
            <h4>Prestasi</h4>
            <p>Bagi calon murid dengan prestasi akademik / non-akademik. Kuota minimal <strong>75%</strong>.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- STATISTIK -->
    <section class="ppdb-section-gray">
      <div class="container">
        <div class="section-header" style="text-align:left;">
          <div>
            <h2 class="section-title">Statistik PPDB</h2>
            <p class="section-subtitle">Data real-time penerimaan murid baru SMKN 2 Karanganyar</p>
          </div>
        </div>

        <div class="ppdb-info-grid-4">
          <div class="ppdb-info-card">
            <div class="ppdb-big-num">180</div>
            <h4>Total Kuota</h4>
            <p>Daya tampung keseluruhan 6 kompetensi keahlian</p>
          </div>
          <div class="ppdb-info-card">
            <div class="ppdb-big-num">186</div>
            <h4>Total Pendaftar</h4>
            <p>Jumlah calon murid yang sudah mendaftar</p>
          </div>
          <div class="ppdb-info-card">
            <div class="ppdb-big-num">6</div>
            <h4>Kompetensi Keahlian</h4>
            <p>AKL, MPLB, PPLG, TJKT, TE, DKV</p>
          </div>
          <div class="ppdb-info-card">
            <div class="ppdb-big-num">3</div>
            <h4>Jalur Pendaftaran</h4>
            <p>Domisili, Afirmasi, dan Prestasi</p>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="ppdb-faq-section" id="ppdbFaq">
      <div class="container">
        <div class="section-header" style="text-align:left;">
          <div>
            <h2 class="section-title">Pertanyaan Umum (FAQ)</h2>
            <p class="section-subtitle">Informasi tambahan seputar PPDB SMKN 2 Karanganyar</p>
          </div>
        </div>

        <div class="ppdb-faq-list">
          <div class="ppdb-faq-item">
            <button class="ppdb-faq-question" onclick="toggleFaq(this)">
              <span>Apa saja jalur pendaftaran yang tersedia?</span>
              <span class="material-symbols-outlined faq-chevron">expand_more</span>
            </button>
            <div class="ppdb-faq-answer">
              <p>Terdapat tiga jalur pendaftaran: <strong>Domisili</strong> (kuota 10%), <strong>Afirmasi</strong> (kuota minimal 15%), dan <strong>Prestasi</strong> (kuota minimal 75%). Setiap jalur memiliki persyaratan dan ketentuan yang berbeda.</p>
            </div>
          </div>

          <div class="ppdb-faq-item">
            <button class="ppdb-faq-question" onclick="toggleFaq(this)">
              <span>Bagaimana cara mendapatkan token aktivasi?</span>
              <span class="material-symbols-outlined faq-chevron">expand_more</span>
            </button>
            <div class="ppdb-faq-answer">
              <p>Token aktivasi diberikan oleh petugas setelah kamu melakukan verifikasi berkas secara langsung (offline) di SMKN 2 Karanganyar atau sekolah negeri terdekat yang ditunjuk sebagai posko verifikasi.</p>
            </div>
          </div>

          <div class="ppdb-faq-item">
            <button class="ppdb-faq-question" onclick="toggleFaq(this)">
              <span>Apakah bisa mengubah pilihan jurusan setelah mendaftar?</span>
              <span class="material-symbols-outlined faq-chevron">expand_more</span>
            </button>
            <div class="ppdb-faq-answer">
              <p>Selama masa pendaftaran sekolah (15&ndash;18 Juni 2026), kamu masih dapat mengubah pilihan jurusan maupun jalur pendaftaran. Setelah masa pendaftaran ditutup, pilihan tidak dapat diubah lagi.</p>
            </div>
          </div>

          <div class="ppdb-faq-item">
            <button class="ppdb-faq-question" onclick="toggleFaq(this)">
              <span>Berapa ukuran maksimal file dokumen yang diupload?</span>
              <span class="material-symbols-outlined faq-chevron">expand_more</span>
            </button>
            <div class="ppdb-faq-answer">
              <p>Ukuran maksimal setiap file adalah <strong>2 MB</strong> dengan format PDF, JPEG, atau PNG. Pastikan dokumen terbaca dengan jelas sebelum diupload.</p>
            </div>
          </div>

          <div class="ppdb-faq-item">
            <button class="ppdb-faq-question" onclick="toggleFaq(this)">
              <span>Kapan pengumuman hasil seleksi?</span>
              <span class="material-symbols-outlined faq-chevron">expand_more</span>
            </button>
            <div class="ppdb-faq-answer">
              <p>Hasil seleksi PPDB akan diumumkan pada <strong>21 Juni 2026</strong> melalui website ini dan papan pengumuman SMKN 2 Karanganyar.</p>
            </div>
          </div>

          <div class="ppdb-faq-item">
            <button class="ppdb-faq-question" onclick="toggleFaq(this)">
              <span>Apa yang harus dilakukan jika lupa password?</span>
              <span class="material-symbols-outlined faq-chevron">expand_more</span>
            </button>
            <div class="ppdb-faq-answer">
              <p>Saat ini fitur reset password masih dalam pengembangan. Silakan hubungi panitia PPDB di sekolah untuk mendapatkan bantuan pengaturan ulang password.</p>
            </div>
          </div>

          <div class="ppdb-faq-item">
            <button class="ppdb-faq-question" onclick="toggleFaq(this)">
              <span>Apakah pendaftaran PPDB dipungut biaya?</span>
              <span class="material-symbols-outlined faq-chevron">expand_more</span>
            </button>
            <div class="ppdb-faq-answer">
              <p>Pendaftaran PPDB SMKN 2 Karanganyar <strong>tidak dipungut biaya (gratis)</strong>. Hati-hati terhadap oknum yang meminta sejumlah uang dengan iming-iming kelulusan.</p>
            </div>
          </div>
        </div>
      </div>
    </section>



  </main>

  <!-- CHATBOT WIDGET -->
  <div class="ppdb-chatbot" id="ppdbChatbot">
    <div class="ppdb-chatbot-box" id="ppdbChatbox">
      <div class="ppdb-chatbot-header">
        <div class="ppdb-chatbot-header-left">
          <div class="ppdb-chatbot-avatar">
            <span class="material-symbols-outlined">support_agent</span>
          </div>
          <div>
            <div class="ppdb-chatbot-name">Asisten PPDB</div>
            <div class="ppdb-chatbot-status">Online</div>
          </div>
        </div>
        <button class="ppdb-chatbot-close" onclick="toggleChatbot()">
          <span class="material-symbols-outlined">close</span>
        </button>
      </div>
      <div class="ppdb-chatbot-msgs" id="ppdbChatMsgs">
        <div class="ppdb-chat-msg ppdb-chat-bot">
          <div class="ppdb-chat-bubble">Halo! Ada yang bisa saya bantu seputar PPDB SMKN 2 Karanganyar?</div>
        </div>
        <div class="ppdb-chat-msg ppdb-chat-bot">
          <div class="ppdb-chat-bubble">Coba tanya: <em>jadwal, jalur, syarat dokumen</em></div>
        </div>
      </div>
      <div class="ppdb-chatbot-input">
        <input type="text" id="ppdbChatInput" placeholder="Ketik pesan..." onkeydown="if(event.key==='Enter') sendChat()">
        <button onclick="sendChat()">
          <span class="material-symbols-outlined">send</span>
        </button>
      </div>
    </div>
    <button class="ppdb-chatbot-btn" id="ppdbChatBtn" onclick="toggleChatbot()">
      <span class="material-symbols-outlined">support_agent</span>
    </button>
  </div>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/ppdb.js?v=2"></script>
  <script>initPage();</script>
</body>
</html>
