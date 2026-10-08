<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verifikasi Akun | PPDB SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="stylesheet" href="../css/ppdb.css?v=4">
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>
    <div class="ppdb-reg-wrapper">
      <?php $currentStep = 2; include '../components/ppdb-stepper.php'; ?>

      <div class="ppdb-reg-card">
        <div class="ppdb-card-header">
          <h2>Verifikasi Akun</h2>
          <p>Verifikasi dokumen oleh operator sekolah</p>
        </div>

        <div class="ppdb-alert ppdb-alert-info ppdb-verifikasi-info">
          <span class="material-symbols-outlined">info</span>
          <span>Setelah mengajukan pendaftaran, kamu wajib datang ke sekolah untuk verifikasi dokumen secara langsung (offline).</span>
        </div>

        <div class="ppdb-verifikasi-steps">
          <div class="ppdb-verif-step">
            <div class="ppdb-verif-num">1</div>
            <div class="ppdb-verif-text">
              <h4>Datang ke Sekolah</h4>
              <p>Datang ke SMKN 2 Karanganyar atau sekolah negeri terdekat yang ditunjuk sebagai posko verifikasi.</p>
            </div>
          </div>

          <div class="ppdb-verif-step">
            <div class="ppdb-verif-num">2</div>
            <div class="ppdb-verif-text">
              <h4>Tunjukkan Dokumen Asli</h4>
              <p>Tunjukkan dokumen asli (Ijazah, Akta Lahir, KK, KIP/KKS, Pas Foto, Rapor) beserta fotokopi kepada petugas.</p>
            </div>
          </div>

          <div class="ppdb-verif-step">
            <div class="ppdb-verif-num">3</div>
            <div class="ppdb-verif-text">
              <h4>Terima Token Aktivasi</h4>
              <p>Setelah dokumen dinyatakan valid, petugas akan memberikan <strong>token aktivasi</strong> yang digunakan untuk mengaktifkan akun PPDB kamu.</p>
            </div>
          </div>
        </div>

        <div class="ppdb-verif-confirm">
          <p class="ppdb-verif-confirm-text">
            <span class="material-symbols-outlined">verified_user</span>
            Dokumen sudah diverifikasi?
          </p>
          <p style="font-size:0.85rem;color:var(--secondary);margin:0 0 1rem;">
            Klik tombol di bawah jika kamu sudah mendapatkan token aktivasi dari petugas.
          </p>
          <a href="ppdb-aktivasi.php" class="ppdb-btn ppdb-btn-primary ppdb-btn-lg">
            <span class="material-symbols-outlined">key</span>
            Saya Sudah Punya Token &mdash; Aktivasi Akun
          </a>
        </div>
      </div>
    </div>
  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/ppdb.js?v=2"></script>
</body>
</html>
