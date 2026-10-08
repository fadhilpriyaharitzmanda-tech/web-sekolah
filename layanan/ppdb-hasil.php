<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil Seleksi | PPDB SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="stylesheet" href="../css/ppdb.css?v=4">
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>
    <div class="ppdb-reg-wrapper">
      <?php $currentStep = 5; include '../components/ppdb-stepper.php'; ?>

      <div class="ppdb-reg-card">
        <div class="ppdb-card-header">
          <h2>Hasil Seleksi</h2>
          <p>Pengumuman hasil seleksi PPDB</p>
        </div>

        <div class="ppdb-alert ppdb-alert-warning">
          <span class="material-symbols-outlined">schedule</span>
          <span>Hasil seleksi akan diumumkan pada <strong>21 Juni 2026</strong>. Masukkan NISN untuk melihat hasil.</span>
        </div>

        <div class="ppdb-hasil-search">
          <div class="ppdb-alert ppdb-alert-info" style="margin-bottom:1rem;">
            <span class="material-symbols-outlined">search</span>
            <span>Masukkan NISN untuk mengecek hasil seleksi.</span>
          </div>

          <div class="ppdb-hasil-search-box">
            <span class="material-symbols-outlined">badge</span>
            <input type="text" id="cariNisn" class="ppdb-input" placeholder="Masukkan NISN" style="border:none;box-shadow:none;">
            <button class="ppdb-btn ppdb-btn-primary" onclick="cekHasil()">
              <span class="material-symbols-outlined">search</span>
              Cek
            </button>
          </div>
        </div>

        <div id="hasilContainer" style="display:none;">
          <div class="ppdb-hasil-card" style="margin:0 auto;">
            <div class="ppdb-hasil-card-inner">
              <div class="ppdb-status-icon lolos">
                <span class="material-symbols-outlined">check_circle</span>
              </div>
              <h3>Selamat!</h3>
              <p class="ppdb-hasil-detail">
                Berdasarkan hasil seleksi PPDB SMKN 2 Karanganyar tahun ajaran 2026/2027, kamu dinyatakan <strong>LOLOS</strong> pada jalur Domisili.
              </p>
              <div class="ppdb-hasil-info">
                <span><strong>NISN:</strong> <span id="hasilNisn">-</span></span>
                <span><strong>Nama:</strong> Muhammad Fathan Al-Ghifari</span>
                <span><strong>Jurusan:</strong> Pengembangan Perangkat Lunak & Gim (PPLG)</span>
              </div>
              <a href="ppdb-daftar-ulang.php" class="ppdb-btn ppdb-btn-primary ppdb-btn-lg" style="margin-top:1rem;width:100%;">
                <span class="material-symbols-outlined">how_to_reg</span>
                Lanjut ke Daftar Ulang
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/ppdb.js?v=2"></script>
</body>
</html>
