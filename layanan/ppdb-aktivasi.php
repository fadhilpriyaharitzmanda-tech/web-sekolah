<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aktivasi Akun | PPDB SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="stylesheet" href="../css/ppdb.css?v=4">
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>
    <div class="ppdb-reg-wrapper">
      <?php $currentStep = 3; include '../components/ppdb-stepper.php'; ?>

      <div class="ppdb-reg-card">
        <div class="ppdb-card-header">
          <h2>Aktivasi Akun</h2>
          <p>Aktivasi akun dengan token dari sekolah</p>
        </div>

        <form class="ppdb-form" onsubmit="return submitStage3(event)">

          <div class="ppdb-alert ppdb-alert-info">
            <span class="material-symbols-outlined">info</span>
            <span>Token aktivasi diperoleh setelah verifikasi dokumen di sekolah. Jika belum memiliki token, selesaikan verifikasi terlebih dahulu.</span>
          </div>

          <div class="ppdb-field">
            <label>NISN <span class="required">*</span></label>
            <input type="text" id="aktivasi_nisn" class="ppdb-input" placeholder="Masukkan NISN" required>
          </div>

          <div class="ppdb-field">
            <label>Token Aktivasi <span class="required">*</span></label>
            <input type="text" id="token" class="ppdb-input" placeholder="Masukkan token dari petugas" required>
            <span class="ppdb-hint">Token terdiri dari 6 digit angka / huruf yang diberikan oleh petugas verifikasi.</span>
          </div>

          <hr class="ppdb-divider-full">

          <div class="ppdb-field">
            <label>Buat Password <span class="required">*</span></label>
            <input type="password" id="password" class="ppdb-input" placeholder="Minimal 8 karakter" required>
          </div>

          <div class="ppdb-field">
            <label>Konfirmasi Password <span class="required">*</span></label>
            <input type="password" id="password_confirm" class="ppdb-input" placeholder="Ketik ulang password" required>
          </div>

          <button type="submit" class="ppdb-btn ppdb-btn-primary ppdb-btn-lg ppdb-btn-block">
            <span class="material-symbols-outlined">key</span>
            Aktivasi Akun
          </button>
        </form>
      </div>
    </div>
  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/ppdb.js?v=2"></script>
</body>
</html>
