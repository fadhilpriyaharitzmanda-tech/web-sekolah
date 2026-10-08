<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Sekolah | PPDB SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="stylesheet" href="../css/ppdb.css?v=4">
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>
    <div class="ppdb-reg-wrapper">
      <?php $currentStep = 4; include '../components/ppdb-stepper.php'; ?>

      <div class="ppdb-reg-card">
        <div class="ppdb-card-header">
          <h2>Daftar Sekolah</h2>
          <p>Pilih kompetensi keahlian dan jalur pendaftaran</p>
        </div>

        <div class="ppdb-alert ppdb-alert-info">
          <span class="material-symbols-outlined">info</span>
          <span>Pilih satu kompetensi keahlian dan satu jalur pendaftaran. Pilihan tidak dapat diubah setelah masa pendaftaran ditutup.</span>
        </div>

        <!-- JURUSAN -->
        <div class="ppdb-field">
          <label>Kompetensi Keahlian <span class="required">*</span></label>
          <div class="ppdb-jurusan-grid" id="jurusanGrid">
            <div class="ppdb-jurusan-card" onclick="selectJurusan(this)" data-value="RPL">
              <div class="j-icon" style="background:#dcfce7;color:#16a34a;">RP</div>
              <div class="j-info">
                <h4>Rekayasa Perangkat Lunak</h4>
                <p>RPL</p>
              </div>
            </div>
            <div class="ppdb-jurusan-card" onclick="selectJurusan(this)" data-value="Mesin">
              <div class="j-icon" style="background:#dbeafe;color:#2563eb;">MS</div>
              <div class="j-info">
                <h4>Teknik Mesin</h4>
                <p>Mesin</p>
              </div>
            </div>
            <div class="ppdb-jurusan-card" onclick="selectJurusan(this)" data-value="Tekstil">
              <div class="j-icon" style="background:#fff7ed;color:#ea580c;">TK</div>
              <div class="j-info">
                <h4>Teknik Pembuatan Kain</h4>
                <p>Tekstil</p>
              </div>
            </div>
            <div class="ppdb-jurusan-card" onclick="selectJurusan(this)" data-value="Ototronik">
              <div class="j-icon" style="background:#fce4ec;color:#e11d48;">OT</div>
              <div class="j-info">
                <h4>Teknik Ototronik</h4>
                <p>Ototronik</p>
              </div>
            </div>
          </div>
        </div>

        <hr class="ppdb-divider-full">

        <!-- JALUR -->
        <div class="ppdb-field">
          <label>Jalur Pendaftaran <span class="required">*</span></label>
          <div class="ppdb-check-group">
            <label class="ppdb-check-label" onclick="selectJalur(this, 'domisili')">
              <div class="ppdb-check-text">
                <h4>Domisili</h4>
                <p>Bagi calon murid yang berdomisili di sekitar sekolah. Kuota 10%.</p>
                <span class="ppdb-kuota">Sisa kuota: 18 kursi</span>
              </div>
            </label>
            <label class="ppdb-check-label" onclick="selectJalur(this, 'afirmasi')">
              <div class="ppdb-check-text">
                <h4>Afirmasi</h4>
                <p>Bagi calon murid dari keluarga tidak mampu / pemegang KIP. Kuota minimal 15%.</p>
                <span class="ppdb-kuota">Sisa kuota: 27 kursi</span>
              </div>
            </label>
            <label class="ppdb-check-label" onclick="selectJalur(this, 'prestasi')">
              <div class="ppdb-check-text">
                <h4>Prestasi</h4>
                <p>Bagi calon murid dengan prestasi akademik / non-akademik. Kuota minimal 75%.</p>
                <span class="ppdb-kuota">Sisa kuota: 135 kursi</span>
              </div>
            </label>
          </div>
        </div>

        <button type="button" class="ppdb-btn ppdb-btn-primary ppdb-btn-lg ppdb-btn-block" onclick="lanjutKeModul()">
          <span class="material-symbols-outlined">arrow_forward</span>
          Lanjut
        </button>

        <div class="ppdb-jurnal-akses" style="text-align:center;margin-top:1rem;">
          <a href="ppdb-jurnal.php" style="font-size:0.85rem;color:var(--primary-dark);text-decoration:none;display:inline-flex;align-items:center;gap:0.4rem;">
            <span class="material-symbols-outlined" style="font-size:1rem;">monitoring</span>
            Lihat Jurnal Seleksi (Peringkat Real-time)
          </a>
        </div>
      </div>
    </div>
  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>

  <script src="../js/include.js?v=3"></script>
  <script src="../js/ppdb.js?v=3"></script>
</body>
</html>
