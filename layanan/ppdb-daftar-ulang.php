<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Ulang | PPDB SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="stylesheet" href="../css/ppdb.css?v=4">
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>
    <div class="ppdb-reg-wrapper">
      <?php $currentStep = 6; include '../components/ppdb-stepper.php'; ?>

      <div class="ppdb-reg-card">
        <div class="ppdb-card-header">
          <h2>Daftar Ulang</h2>
          <p>Konfirmasi daftar ulang bagi yang lolos seleksi</p>
        </div>

        <form class="ppdb-form" onsubmit="return submitStage6(event)">

          <div class="ppdb-alert ppdb-alert-success">
            <span class="material-symbols-outlined">celebration</span>
            <span>Selamat telah lolos seleksi! Selesaikan daftar ulang untuk mengkonfirmasi tempatmu di SMKN 2 Karanganyar.</span>
          </div>

          <div class="ppdb-alert ppdb-alert-warning">
            <span class="material-symbols-outlined">timer</span>
            <span>Masa daftar ulang: <strong>22 &ndash; 25 Juni 2026</strong>. Jika tidak melakukan daftar ulang dalam batas waktu yang ditentukan, kelulusan akan dibatalkan.</span>
          </div>

          <div class="ppdb-field-row">
            <div class="ppdb-field">
              <label>NISN <span class="required">*</span></label>
              <input type="text" id="du_nisn" class="ppdb-input" placeholder="Masukkan NISN" required>
            </div>
            <div class="ppdb-field">
              <label>Nama Lengkap <span class="required">*</span></label>
              <input type="text" id="du_nama" class="ppdb-input" placeholder="Sesuai ijazah" required>
            </div>
          </div>

          <div class="ppdb-field">
            <label>Nomor HP / WA Aktif <span class="required">*</span></label>
            <input type="tel" id="du_no_hp" class="ppdb-input" placeholder="08xxxxxxxxxx" required>
          </div>

          <hr class="ppdb-divider-full">

          <label class="ppdb-check-label" style="border-radius:var(--radius);">
            <input type="checkbox" id="du_syarat">
            <div class="ppdb-check-text">
              <h4>Pernyataan</h4>
              <p>Saya menyatakan bahwa data yang saya isi adalah benar dan bersedia mengikuti seluruh ketentuan yang berlaku di SMKN 2 Karanganyar.</p>
            </div>
          </label>

          <button type="submit" class="ppdb-btn ppdb-btn-primary ppdb-btn-lg ppdb-btn-block" id="duSubmit" disabled>
            <span class="material-symbols-outlined">how_to_reg</span>
            Konfirmasi Daftar Ulang
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
