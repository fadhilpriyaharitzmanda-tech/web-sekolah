<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengajuan Akun | PPDB SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="stylesheet" href="../css/ppdb.css?v=4">
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>
    <div class="ppdb-reg-wrapper">
      <?php $currentStep = 1; include '../components/ppdb-stepper.php'; ?>

      <div class="ppdb-reg-card">
        <div class="ppdb-card-header">
          <h2>Data Diri</h2>
          <p>Isi data diri sesuai dokumen resmi</p>
        </div>

        <form class="ppdb-form">

          <div class="ppdb-alert ppdb-alert-info">
            <span class="material-symbols-outlined">info</span>
            <span>Pastikan data yang dimasukkan sesuai dengan dokumen resmi. Data yang salah akan menghambat proses verifikasi.</span>
          </div>

          <div class="ppdb-field-row">
            <div class="ppdb-field">
              <label>NISN <span class="required">*</span></label>
              <input type="text" class="ppdb-input" placeholder="Masukkan NISN" required>
            </div>
            <div class="ppdb-field">
              <label>NIK <span class="required">*</span></label>
              <input type="text" class="ppdb-input" placeholder="Masukkan NIK" required>
            </div>
          </div>

          <div class="ppdb-field">
              <label>Nama Lengkap <span class="required">*</span></label>
              <input type="text" class="ppdb-input" placeholder="Sesuai dengan ijazah / akta lahir" required>
          </div>

          <div class="ppdb-field-row">
            <div class="ppdb-field">
              <label>Tempat Lahir <span class="required">*</span></label>
              <input type="text" class="ppdb-input" placeholder="Kota / Kabupaten" required>
            </div>
            <div class="ppdb-field">
              <label>Tanggal Lahir <span class="required">*</span></label>
              <input type="date" class="ppdb-input" required>
            </div>
          </div>

          <div class="ppdb-field-row">
            <div class="ppdb-field">
              <label>Jenis Kelamin <span class="required">*</span></label>
              <select class="ppdb-select" required>
                <option value="">— Pilih —</option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
              </select>
            </div>
            <div class="ppdb-field">
              <label>Agama <span class="required">*</span></label>
              <select class="ppdb-select" required>
                <option value="">— Pilih —</option>
                <option>Islam</option>
                <option>Kristen</option>
                <option>Katolik</option>
                <option>Hindu</option>
                <option>Buddha</option>
                <option>Konghucu</option>
              </select>
            </div>
          </div>

          <div class="ppdb-field">
            <label>Alamat Lengkap <span class="required">*</span></label>
            <input type="text" class="ppdb-input" placeholder="Jalan, RT/RW, Kelurahan, Kecamatan" required>
          </div>

          <div class="ppdb-field-row">
            <div class="ppdb-field">
              <label>Provinsi <span class="required">*</span></label>
              <select class="ppdb-select" required>
                <option value="">— Pilih —</option>
                <option>Jawa Tengah</option>
              </select>
            </div>
            <div class="ppdb-field">
              <label>Kabupaten / Kota <span class="required">*</span></label>
              <select class="ppdb-select" required>
                <option value="">— Pilih —</option>
                <option>Karanganyar</option>
              </select>
            </div>
          </div>

          <div class="ppdb-field-row">
            <div class="ppdb-field">
              <label>Kecamatan <span class="required">*</span></label>
              <input type="text" class="ppdb-input" placeholder="Kecamatan" required>
            </div>
            <div class="ppdb-field">
              <label>Desa / Kelurahan <span class="required">*</span></label>
              <input type="text" class="ppdb-input" placeholder="Desa / Kelurahan" required>
            </div>
          </div>

          <div class="ppdb-field-row">
            <div class="ppdb-field">
              <label>Nomor HP / WA <span class="required">*</span></label>
              <input type="tel" class="ppdb-input" placeholder="08xxxxxxxxxx" required>
            </div>
            <div class="ppdb-field">
              <label>Email</label>
              <input type="email" class="ppdb-input" placeholder="contoh@email.com">
            </div>
          </div>

          <div style="text-align:right;margin-top:1rem;">
            <a href="ppdb-upload-berkas.php" class="ppdb-btn ppdb-btn-primary ppdb-btn-sm">
              Next <span class="material-symbols-outlined" style="font-size:1rem;">arrow_forward</span>
            </a>
          </div>
        </form>
      </div>
    </div>
  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/ppdb.js?v=2"></script>
</body>
</html>
