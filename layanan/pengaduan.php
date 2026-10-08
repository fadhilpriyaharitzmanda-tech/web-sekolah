<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaduan | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    .adu-page {
      min-height: 100vh;
      display: flex;
      align-items: center;
      position: relative;
      overflow: hidden;
      padding: 6rem 0;
      background: #fff;
    }

    /* === DECORATIVE BG === */
    .adu-page::before {
      content: '';
      position: absolute;
      top: -40%; right: -20%;
      width: 800px; height: 800px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(34,197,94,0.06) 0%, transparent 70%);
      pointer-events: none;
    }
    .adu-page::after {
      content: '';
      position: absolute;
      bottom: -30%; left: -15%;
      width: 600px; height: 600px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(0,110,47,0.04) 0%, transparent 70%);
      pointer-events: none;
    }
    .adu-shape-1 {
      position: absolute; top: 10%; right: 5%;
      width: 120px; height: 120px;
      border-radius: 30px;
      background: rgba(34,197,94,0.03);
      transform: rotate(25deg);
      pointer-events: none;
    }
    .adu-shape-2 {
      position: absolute; bottom: 15%; left: 3%;
      width: 80px; height: 80px;
      border-radius: 50%;
      background: rgba(0,110,47,0.03);
      pointer-events: none;
    }
    .adu-shape-3 {
      position: absolute; top: 40%; left: 50%;
      width: 200px; height: 200px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(34,197,94,0.02) 0%, transparent 70%);
      pointer-events: none;
    }

    .adu-container {
      position: relative; z-index: 2;
      max-width: 1200px; margin: 0 auto;
      padding: 0 2rem;
      width: 100%;
    }

    .adu-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 3rem;
      align-items: center;
    }
    @media (min-width: 1024px) {
      .adu-grid {
        grid-template-columns: 420px 1fr;
        gap: 5rem;
      }
    }

    /* === LEFT SIDE === */
    .adu-left {
      display: flex;
      flex-direction: column;
      gap: 1.75rem;
    }
    .adu-badge {
      display: inline-flex; align-items: center; gap: 0.625rem;
      width: fit-content;
      padding: 0.625rem 1.25rem;
      border-radius: 999px;
      background: #fff;
      color: #006e2f;
      font-size: 0.8rem; font-weight: 700;
      letter-spacing: 0.02em;
      border: 1px solid rgba(34,197,94,0.12);
      box-shadow: 0 2px 8px rgba(0,110,47,0.03);
    }
    .adu-badge .material-symbols-outlined {
      font-size: 1rem; color: #006e2f;
    }
    .adu-left h1 {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 2.75rem; font-weight: 900;
      line-height: 1.1; letter-spacing: -0.03em;
      color: #1a1a2e;
      margin: 0;
    }
    .adu-left h1 span {
      background: linear-gradient(135deg, #006e2f, #22c55e);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .adu-left > p {
      color: #5d5f5f;
      font-size: 1rem; line-height: 1.8;
      margin: 0;
      max-width: 28rem;
    }
    .adu-contact {
      display: flex;
      gap: 0.75rem;
      flex-wrap: wrap;
      margin-top: 0.5rem;
    }
    .adu-contact a {
      display: inline-flex; align-items: center; gap: 0.625rem;
      padding: 0.75rem 1.25rem;
      border-radius: 12px;
      background: #fff;
      border: 1px solid #e8f0e8;
      color: #5d5f5f;
      font-size: 0.85rem;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s;
      box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    }
    .adu-contact a:hover {
      border-color: #22c55e;
      color: #006e2f;
      box-shadow: 0 4px 12px rgba(34,197,94,0.06);
      transform: translateY(-1px);
    }
    .adu-contact a .material-symbols-outlined {
      font-size: 1.125rem;
      color: #006e2f;
    }

    /* === RIGHT - FORM CARD === */
    .adu-card {
      background: #fff;
      border-radius: 32px;
      padding: 2.5rem;
      box-shadow:
        0 30px 80px rgba(0,0,0,0.03),
        0 10px 30px rgba(0,0,0,0.02);
      border: 1px solid #edf5ed;
      position: relative;
    }
    @media (min-width: 640px) {
      .adu-card { padding: 3rem; }
    }

    .adu-card-head {
      margin-bottom: 2rem;
      padding-bottom: 1.5rem;
      border-bottom: 1px solid #edf5ed;
    }
    .adu-card-title {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 1.375rem;
      font-weight: 800;
      color: #1a1a2e;
      margin-bottom: 0.375rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }
    .adu-card-title .material-symbols-outlined {
      font-size: 1.5rem;
      color: #006e2f;
      background: rgba(34,197,94,0.08);
      padding: 0.375rem;
      border-radius: 10px;
    }
    .adu-card-sub {
      font-size: 0.875rem;
      color: #5d5f5f;
      line-height: 1.6;
    }

    .adu-form { display: flex; flex-direction: column; gap: 1.5rem; }

    .adu-row {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1rem;
    }
    @media (min-width: 640px) {
      .adu-row { grid-template-columns: 1fr 1fr; gap: 1.5rem; }
    }

    .adu-field { display: flex; flex-direction: column; gap: 0.5rem; }
    .adu-field label {
      font-size: 0.825rem; font-weight: 700;
      color: #1a1a2e;
      letter-spacing: 0.01em;
    }
    .adu-field label .req {
      color: #e53935;
      margin-left: 2px;
    }

    .adu-field input,
    .adu-field select,
    .adu-field textarea {
      padding: 0.875rem 1.125rem;
      border: 2px solid #e4ede4;
      border-radius: 14px;
      background: #f8fbf8;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 14px;
      color: #1a1a2e;
      outline: none;
      transition: all 0.2s;
    }
    .adu-field input:hover,
    .adu-field select:hover,
    .adu-field textarea:hover {
      border-color: #b8d0b8;
    }
    .adu-field input:focus,
    .adu-field select:focus,
    .adu-field textarea:focus {
      border-color: #006e2f;
      background: #fff;
      box-shadow: 0 0 0 4px rgba(0,110,47,0.06);
    }
    .adu-field input::placeholder,
    .adu-field textarea::placeholder {
      color: #a0b8a0;
      font-weight: 500;
    }
    .adu-field textarea {
      resize: vertical;
      min-height: 120px;
      line-height: 1.7;
    }
    .adu-field select {
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%23006e2f' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 1rem center;
      padding-right: 2.75rem;
    }

    .adu-btn {
      padding: 1rem 1.5rem;
      border-radius: 14px;
      background: #006e2f;
      color: #fff;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 15px;
      font-weight: 800;
      border: none;
      cursor: pointer;
      transition: all 0.25s;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.625rem;
      width: 100%;
      letter-spacing: 0.01em;
    }
    .adu-btn:hover {
      background: #005a26;
      box-shadow: 0 8px 24px rgba(0,110,47,0.2);
      transform: translateY(-1px);
    }
    .adu-btn:active {
      transform: translateY(0);
    }
    .adu-btn .material-symbols-outlined {
      font-size: 1.125rem;
    }

    .adu-success {
      display: none;
      flex-direction: column;
      align-items: center;
      text-align: center;
      padding: 3rem 1rem;
    }
    .adu-success.show { display: flex; }
    .adu-success-icon {
      width: 80px; height: 80px;
      border-radius: 50%;
      background: linear-gradient(135deg, rgba(34,197,94,0.08), rgba(0,110,47,0.04));
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 1.5rem;
      border: 1px solid rgba(34,197,94,0.08);
    }
    .adu-success-icon .material-symbols-outlined {
      font-size: 2.5rem; color: #006e2f;
    }
    .adu-success h3 {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 1.5rem; font-weight: 800;
      color: #1a1a2e;
      margin-bottom: 0.5rem;
    }
    .adu-success p {
      color: #5d5f5f;
      font-size: 0.9rem;
      max-width: 22rem;
      margin-bottom: 2rem;
      line-height: 1.7;
    }

    @media (max-width: 1024px) {
      .adu-left h1 { font-size: 2.25rem; }
      .adu-page { padding: 5rem 0; }
    }
    @media (max-width: 640px) {
      .adu-left h1 { font-size: 1.75rem; }
      .adu-card { padding: 1.5rem; border-radius: 24px; }
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>
    <section class="adu-page">
      <div class="adu-shape-1"></div>
      <div class="adu-shape-2"></div>
      <div class="adu-shape-3"></div>

      <div class="adu-container">
        <div class="adu-grid">

          <!-- LEFT -->
          <div class="adu-left hero-entrance">
            <div class="adu-badge">
              <span class="material-symbols-outlined">lock</span>
              Pengaduan Masalah
            </div>
            <h1>Sampaikan <span>Pengaduan</span> atau Curhatanmu</h1>
            <p>Setiap suara berarti. Tim BK siap mendengar dan membantu menyelesaikan masalahmu dengan penuh empati dan kerahasiaan.</p>
            <div class="adu-contact">
              <a href="mailto:bk@smkn2kra.sch.id">
                <span class="material-symbols-outlined">mail</span>
                bk@smkn2kra.sch.id
              </a>
              <a href="#">
                <span class="material-symbols-outlined">call</span>
                (0271) 1234567
              </a>
            </div>
          </div>

          <!-- RIGHT -->
          <div>
            <div class="adu-card" id="aduCard" data-animate>
              <div id="aduFormContent">
                <div class="adu-card-head">
                  <div class="adu-card-title">
                    <span class="material-symbols-outlined">edit_note</span>
                    Form Pengaduan
                  </div>
                  <p class="adu-card-sub">Isi data dan ceritakan masalahmu. Tim BK akan menindaklanjuti dengan penuh tanggung jawab.</p>
                </div>

                <form class="adu-form" id="aduForm" onsubmit="submitAduan(event)">
                  <div class="adu-row">
                    <div class="adu-field">
                      <label>Nama <span class="req">*</span></label>
                      <input type="text" required placeholder="Nama lengkapmu">
                    </div>
                    <div class="adu-field">
                      <label>Email</label>
                      <input type="email" placeholder="contoh@email.com">
                    </div>
                  </div>
                  <div class="adu-row">
                    <div class="adu-field">
                      <label>Kelas <span class="req">*</span></label>
                      <select required>
                        <option value="">Pilih</option>
                        <option>X RPL</option><option>XI RPL</option><option>XII RPL</option>
                        <option>X M</option><option>XI M</option><option>XII M</option>
                        <option>X TO</option><option>XI TO</option><option>XII TO</option>
                        <option>X TL</option><option>XI TL</option><option>XII TL</option>
                      </select>
                    </div>
                    <div class="adu-field">
                      <label>Jenis Pengaduan <span class="req">*</span></label>
                      <select required>
                        <option value="">Pilih jenis</option>
                        <option>Bullying / Perundungan</option>
                        <option>Pelecehan / Kekerasan</option>
                        <option>Pelanggaran Tata Tertib</option>
                        <option>Konseling Pribadi</option>
                        <option>Masalah Akademik</option>
                        <option>Lainnya</option>
                      </select>
                    </div>
                  </div>

                  <div class="adu-field">
                    <label>Ceritakan <span class="req">*</span></label>
                    <textarea required placeholder="Jelaskan kronologi, kapan dan dimana kejadiannya..."></textarea>
                  </div>

                  <button type="submit" class="adu-btn">
                    Kirim Pengaduan
                    <span class="material-symbols-outlined">arrow_forward</span>
                  </button>
                </form>
              </div>

              <!-- SUCCESS -->
              <div class="adu-success" id="aduSuccess">
                <div class="adu-success-icon">
                  <span class="material-symbols-outlined">check_circle</span>
                </div>
                <h3>Pengaduan Terkirim!</h3>
                <p>Terima kasih, laporanmu sudah kami terima. Tim BK akan menindaklanjuti maksimal 3 hari kerja.</p>
                <button class="adu-btn" onclick="resetAduan()" style="width:auto;padding:1rem 3rem;">Kirim Lagi</button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/layanan.js?v=1"></script>
  <script>initPage();</script>
</body>
</html>
