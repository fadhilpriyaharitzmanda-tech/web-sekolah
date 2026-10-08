<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Berkas | PPDB SMKN 2 Karanganyar</title>
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
          <h2>Upload Dokumen Persyaratan</h2>
          <p>Unggah dokumen dalam format PDF / JPEG / PNG (maks. 2 MB per file)</p>
        </div>

        <form class="ppdb-form" onsubmit="return submitStage1(event)">

          <div class="ppdb-alert ppdb-alert-info">
            <span class="material-symbols-outlined">info</span>
            <span>Pastikan dokumen yang diupload terbaca dengan jelas. Dokumen yang buram akan ditolak saat verifikasi.</span>
          </div>

          <div class="ppdb-upload-grid">
            <div class="ppdb-upload-item">
              <h4>Ijazah / SKL <span class="required">*</span></h4>
              <p>Ijazah SD/MI atau surat keterangan lulus</p>
              <div class="ppdb-upload-box" onclick="document.getElementById('file_ijazah').click()">
                <span class="material-symbols-outlined mat-icon-big">cloud_upload</span>
                <p><strong>Klik untuk upload</strong></p>
                <small>PDF / JPEG, maks 2 MB</small>
              </div>
              <input type="file" id="file_ijazah" class="ppdb-upload-input" accept=".pdf,.jpg,.jpeg,.png" onchange="handleUpload(this,'preview_ijazah')">
              <div class="ppdb-upload-preview" id="preview_ijazah" style="display:none;"></div>
            </div>

            <div class="ppdb-upload-item">
              <h4>Akta Kelahiran <span class="required">*</span></h4>
              <p>Akta kelahiran dari Disdukcapil</p>
              <div class="ppdb-upload-box" onclick="document.getElementById('file_akta').click()">
                <span class="material-symbols-outlined mat-icon-big">cloud_upload</span>
                <p><strong>Klik untuk upload</strong></p>
                <small>PDF / JPEG, maks 2 MB</small>
              </div>
              <input type="file" id="file_akta" class="ppdb-upload-input" accept=".pdf,.jpg,.jpeg,.png" onchange="handleUpload(this,'preview_akta')">
              <div class="ppdb-upload-preview" id="preview_akta" style="display:none;"></div>
            </div>

            <div class="ppdb-upload-item">
              <h4>Kartu Keluarga <span class="required">*</span></h4>
              <p>Kartu Keluarga terbaru</p>
              <div class="ppdb-upload-box" onclick="document.getElementById('file_kk').click()">
                <span class="material-symbols-outlined mat-icon-big">cloud_upload</span>
                <p><strong>Klik untuk upload</strong></p>
                <small>PDF / JPEG, maks 2 MB</small>
              </div>
              <input type="file" id="file_kk" class="ppdb-upload-input" accept=".pdf,.jpg,.jpeg,.png" onchange="handleUpload(this,'preview_kk')">
              <div class="ppdb-upload-preview" id="preview_kk" style="display:none;"></div>
            </div>

            <div class="ppdb-upload-item">
              <h4>KIP / KKS <span class="required">*</span></h4>
              <p>Kartu Indonesia Pintar / KKS (jika ada)</p>
              <div class="ppdb-upload-box" onclick="document.getElementById('file_kip').click()">
                <span class="material-symbols-outlined mat-icon-big">cloud_upload</span>
                <p><strong>Klik untuk upload</strong></p>
                <small>PDF / JPEG, maks 2 MB</small>
              </div>
              <input type="file" id="file_kip" class="ppdb-upload-input" accept=".pdf,.jpg,.jpeg,.png" onchange="handleUpload(this,'preview_kip')">
              <div class="ppdb-upload-preview" id="preview_kip" style="display:none;"></div>
            </div>

            <div class="ppdb-upload-item">
              <h4>Pas Foto <span class="required">*</span></h4>
              <p>Pas foto ukuran 3x4 dengan latar merah</p>
              <div class="ppdb-upload-box" onclick="document.getElementById('file_foto').click()">
                <span class="material-symbols-outlined mat-icon-big">cloud_upload</span>
                <p><strong>Klik untuk upload</strong></p>
                <small>JPEG / PNG, maks 2 MB</small>
              </div>
              <input type="file" id="file_foto" class="ppdb-upload-input" accept=".jpg,.jpeg,.png" onchange="handleUpload(this,'preview_foto')">
              <div class="ppdb-upload-preview" id="preview_foto" style="display:none;"></div>
            </div>

            <div class="ppdb-upload-item">
              <h4>Rapor <span class="required">*</span></h4>
              <p>Rapor semester 1&ndash;5 SD/MI</p>
              <div class="ppdb-upload-box" onclick="document.getElementById('file_rapor').click()">
                <span class="material-symbols-outlined mat-icon-big">cloud_upload</span>
                <p><strong>Klik untuk upload</strong></p>
                <small>PDF, maks 2 MB</small>
              </div>
              <input type="file" id="file_rapor" class="ppdb-upload-input" accept=".pdf" onchange="handleUpload(this,'preview_rapor')">
              <div class="ppdb-upload-preview" id="preview_rapor" style="display:none;"></div>
            </div>
          </div>

          <button type="submit" class="ppdb-btn ppdb-btn-primary ppdb-btn-lg ppdb-btn-block">
            <span class="material-symbols-outlined">send</span>
            Ajukan Pendaftaran
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
