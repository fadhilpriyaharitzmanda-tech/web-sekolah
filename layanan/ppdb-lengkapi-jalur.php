<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lengkapi Data Jalur | PPDB SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="stylesheet" href="../css/ppdb.css?v=5">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
</head>
<body>

  <?php
  $baseNav = '../';
  include '../components/navbar.php';

  $jurusan = isset($_GET['jurusan']) ? htmlspecialchars($_GET['jurusan']) : '';
  $jalur   = isset($_GET['jalur'])   ? htmlspecialchars($_GET['jalur'])   : '';
  $labelJalur = [
    'domisili'  => 'Domisili',
    'afirmasi'  => 'Afirmasi',
    'prestasi'  => 'Prestasi',
  ];
  $labelJurusan = [
    'RPL'      => 'Rekayasa Perangkat Lunak',
    'Mesin'    => 'Teknik Mesin',
    'Tekstil'  => 'Teknik Pembuatan Kain',
    'Ototronik'=> 'Teknik Ototronik',
  ];

  if (!$jurusan || !$jalur || !isset($labelJalur[$jalur])) {
    echo '<main><div class="ppdb-reg-wrapper"><div class="ppdb-reg-card"><p style="padding:2rem;text-align:center;">Pilihan tidak valid. <a href="ppdb-daftar-sekolah.php">Kembali</a></p></div></div></main>';
    include '../components/footer.php';
    exit;
  }
  ?>

  <main>
    <div class="ppdb-reg-wrapper">
      <?php $currentStep = 4; include '../components/ppdb-stepper.php'; ?>

      <div class="ppdb-reg-card">
        <div class="ppdb-card-header">
          <h2>Lengkapi Data <?= $labelJalur[$jalur] ?></h2>
          <p>
            Jurusan:
            <strong><?= $labelJurusan[$jurusan] ?? $jurusan ?></strong>
            &mdash; Jalur:
            <strong><?= $labelJalur[$jalur] ?></strong>
          </p>
        </div>

        <form class="ppdb-form" onsubmit="return submitModul(event)">

          <div class="ppdb-alert ppdb-alert-info">
            <span class="material-symbols-outlined">info</span>
            <span>Lengkapi data sesuai jalur yang kamu pilih. Data yang sudah disimpan tidak dapat diubah.</span>
          </div>

          <!-- ══════════════════════════════
               MODUL DOMISILI
               ══════════════════════════════ -->
          <?php if ($jalur === 'domisili'): ?>

          <div class="ppdb-modul-badge">MODUL DOMISILI</div>

          <div class="ppdb-modul-card">
            <div class="ppdb-modul-header">
              <span class="material-symbols-outlined">edit_note</span>
              <span>Input Alamat</span>
              <span class="ppdb-modul-status ppdb-status-belum">Belum diisi</span>
            </div>
            <div class="ppdb-modul-body">
              <div class="ppdb-field-row">
                <div class="ppdb-field">
                  <label>Kecamatan <span class="required">*</span></label>
                  <select class="ppdb-select" id="domKec">
                    <option value="">— Pilih —</option>
                    <option>Colomadu</option><option>Gondangrejo</option><option>Jaten</option>
                    <option>Jatipuro</option><option>Jatiyoso</option><option>Jenawi</option>
                    <option>Jumantono</option><option>Jumapolo</option><option>Karanganyar</option>
                    <option>Kebakkramat</option><option>Kerjo</option><option>Matesih</option>
                    <option>Mojogedang</option><option>Ngargoyoso</option><option>Tasikmadu</option>
                    <option>Tawangmangu</option>
                  </select>
                </div>
                <div class="ppdb-field">
                  <label>Kelurahan / Desa <span class="required">*</span></label>
                  <input type="text" class="ppdb-input" id="domDesa" placeholder="Nama desa / kelurahan">
                </div>
              </div>
              <div class="ppdb-field">
                <label>Alamat Lengkap <span class="required">*</span></label>
                <input type="text" class="ppdb-input" id="domAlamat" placeholder="Jalan, RT/RW, dusun, kode pos">
              </div>
              <button type="button" class="ppdb-btn ppdb-btn-primary ppdb-btn-sm" onclick="cariLokasi()" id="btnCariLokasi" style="margin-top:0.5rem;">
                <span class="material-symbols-outlined">search</span>
                Cari &amp; Tandai di Peta
              </button>
            </div>
          </div>

          <div class="ppdb-modul-card">
            <div class="ppdb-modul-header">
              <span class="material-symbols-outlined">pin_drop</span>
              <span>Titik Lokasi (Peta Interaktif)</span>
              <span class="ppdb-modul-status ppdb-status-belum" id="mapStatus">Klik peta</span>
            </div>
            <div class="ppdb-modul-body">
              <div class="ppdb-field-row">
                <div class="ppdb-field">
                  <label>Latitude</label>
                  <input type="text" class="ppdb-input" id="domLat" placeholder="-7.595" readonly style="background:var(--surface);">
                </div>
                <div class="ppdb-field">
                  <label>Longitude</label>
                  <input type="text" class="ppdb-input" id="domLng" placeholder="110.945" readonly style="background:var(--surface);">
                </div>
              </div>
              <div id="domMap" class="ppdb-modul-map" style="height:260px;"></div>
              <p style="font-size:0.75rem;color:var(--secondary);margin:0.5rem 0 0;">Klik pada peta untuk menandai lokasi tempat tinggal kamu.</p>
            </div>
          </div>

          <div class="ppdb-modul-row">
            <div class="ppdb-modul-card" id="validasiGpsCard">
              <div class="ppdb-modul-header">
                <span class="material-symbols-outlined" id="validasiGpsIcon">satellite_alt</span>
                <span>Validasi GPS</span>
                <span class="ppdb-modul-status ppdb-status-belum" id="validasiGpsStatus">Menunggu</span>
              </div>
              <div class="ppdb-modul-body" style="text-align:center;padding:1.25rem;">
                <span class="material-symbols-outlined ppdb-gps-icon" id="validasiGpsIconBig">gps_fixed</span>
                <p class="ppdb-gps-text" id="validasiGpsText">Klik peta untuk menandai lokasi tempat tinggal.</p>
              </div>
            </div>
            <div class="ppdb-modul-card" id="jarakCard">
              <div class="ppdb-modul-header">
                <span class="material-symbols-outlined">straighten</span>
                <span>Jarak ke Sekolah</span>
                <span class="ppdb-modul-status ppdb-status-belum" id="jarakStatus">-</span>
              </div>
              <div class="ppdb-modul-body" style="text-align:center;padding:1.25rem;">
                <span class="ppdb-jarak-angka" id="jarakAngka">0</span>
                <span class="ppdb-jarak-satuan">meter</span>
                <p style="font-size:0.75rem;color:var(--secondary);margin:0.5rem 0 0;">Jarak tempuh dari titik lokasi ke sekolah.</p>
              </div>
            </div>
          </div>

        <div class="ppdb-modul-card" id="deteksiCard">
          <div class="ppdb-modul-header">
            <span class="material-symbols-outlined">security</span>
            <span>Deteksi Manipulasi Lokasi</span>
            <span class="ppdb-modul-status ppdb-status-aman" id="deteksiStatus">Aman</span>
          </div>
          <div class="ppdb-modul-body">
            <div class="ppdb-modul-ceklist" id="cekVpn">
              <span class="material-symbols-outlined" style="color:#22c55e;">check_circle</span>
              <span>VPN / Proxy tidak terdeteksi</span>
            </div>
            <div class="ppdb-modul-ceklist" id="cekGps">
              <span class="material-symbols-outlined" style="color:#22c55e;">check_circle</span>
              <span>GPS tidak dalam mode emulasi</span>
            </div>
            <div class="ppdb-modul-ceklist" id="cekIp">
              <span class="material-symbols-outlined" style="color:#22c55e;">check_circle</span>
              <span>IP Address sesuai dengan wilayah domisili</span>
            </div>
          </div>
        </div>

        <div class="ppdb-modul-card">
          <div class="ppdb-modul-header">
            <span class="material-symbols-outlined">verified</span>
            <span>Status Verifikasi</span>
            <span class="ppdb-modul-status ppdb-status-menunggu">Menunggu verifikasi</span>
          </div>
          <div class="ppdb-modul-body">
            <div class="ppdb-modul-timeline">
              <div class="ppdb-modul-tl-item ppdb-tl-done">
                <div class="ppdb-tl-dot"><span class="material-symbols-outlined">check</span></div>
                <div class="ppdb-tl-text">
                  <h4>Input Data Domisili</h4>
                  <p>Data alamat dan titik koordinat telah diisi</p>
                </div>
              </div>
              <div class="ppdb-modul-tl-item ppdb-tl-active">
                <div class="ppdb-tl-dot"><span class="material-symbols-outlined">more_horiz</span></div>
                <div class="ppdb-tl-text">
                  <h4>Verifikasi Petugas</h4>
                  <p>Menunggu verifikasi oleh operator sekolah</p>
                </div>
              </div>
              <div class="ppdb-modul-tl-item ppdb-tl-pending">
                <div class="ppdb-tl-dot"><span class="material-symbols-outlined">radio_button_unchecked</span></div>
                <div class="ppdb-tl-text">
                  <h4>Validasi Akhir</h4>
                  <p>Konfirmasi kesesuaian domisili oleh kepala sekolah</p>
                </div>
              </div>
            </div>
          </div>
        </div>

          <!-- ══════════════════════════════
               MODUL AFIRMASI
               ══════════════════════════════ -->
          <?php elseif ($jalur === 'afirmasi'): ?>

          <div class="ppdb-modul-badge">MODUL AFIRMASI</div>

          <div class="ppdb-modul-card">
            <div class="ppdb-modul-header">
              <span class="material-symbols-outlined">category</span>
              <span>Jenis Afirmasi</span>
              <span class="ppdb-modul-status ppdb-status-belum" id="afirmasiJenisStatus">Belum dipilih</span>
            </div>
            <div class="ppdb-modul-body">
              <div class="ppdb-modul-radio-grid">
                <label class="ppdb-modul-radio" onclick="pilihAfirmasi(this, 'kip')">
                  <div class="ppdb-modul-radio-text">
                    <h4>KIP / PIP / PKH</h4>
                    <p>Pemegang Kartu Indonesia Pintar, PIP, atau PKH</p>
                  </div>
                </label>
                <label class="ppdb-modul-radio" onclick="pilihAfirmasi(this, 'panti')">
                  <div class="ppdb-modul-radio-text">
                    <h4>Panti Asuhan</h4>
                    <p>Anak dari panti asuhan / lembaga kesejahteraan sosial</p>
                  </div>
                </label>
                <label class="ppdb-modul-radio" onclick="pilihAfirmasi(this, 'disabilitas')">
                  <div class="ppdb-modul-radio-text">
                    <h4>Disabilitas</h4>
                    <p>Anak berkebutuhan khusus (disabilitas) dengan surat keterangan dokter</p>
                  </div>
                </label>
              </div>
            </div>
          </div>

          <div class="ppdb-modul-card">
            <div class="ppdb-modul-header">
              <span class="material-symbols-outlined">folder_open</span>
              <span>Upload Dokumen</span>
              <span class="ppdb-modul-status ppdb-status-belum" id="afirmasiUploadStatus">Belum upload</span>
            </div>
            <div class="ppdb-modul-body">

              <!-- ── SECTION KIP / PIP / PKH ── -->
              <div id="afirmasiSectionKip" style="display:none;">
                <div class="ppdb-alert ppdb-alert-info" style="margin-bottom:1rem;">
                  <span class="material-symbols-outlined">info</span>
                  <span>Upload dulu Kartu KIP / bukti keikutsertaan program, lalu isi No. KIP dan No. KKS/SKTM sesuai dokumen yang kamu upload.</span>
                </div>
                <div class="ppdb-upload-grid">
                  <div class="ppdb-upload-item">
                    <h4>Kartu KIP / Bukti Keikutsertaan <span class="required">*</span></h4>
                    <p>Scan kartu KIP atau bukti keikutsertaan program penanganan keluarga ekonomi tidak mampu</p>
                    <div class="ppdb-upload-box" onclick="document.getElementById('afirmasi_file_kip').click()">
                      <span class="material-symbols-outlined mat-icon-big">badge</span>
                      <p><strong>Klik untuk upload</strong></p>
                      <small>PDF / JPEG, maks 2 MB</small>
                    </div>
                    <input type="file" id="afirmasi_file_kip" class="ppdb-upload-input" accept=".pdf,.jpg,.jpeg,.png" onchange="handleUpload(this,'afirmasi_preview_kip'); aktifkanNoProgram(this)">
                    <div class="ppdb-upload-preview" id="afirmasi_preview_kip" style="display:none;"></div>
                  </div>
                  <div class="ppdb-upload-item">
                    <h4>Riwayat Tagihan Listrik <span class="required">*</span></h4>
                    <p>Bukti pembayaran listrik 3 bulan terakhir</p>
                    <div class="ppdb-upload-box" onclick="document.getElementById('afirmasi_file_listrik').click()">
                      <span class="material-symbols-outlined mat-icon-big">bolt</span>
                      <p><strong>Klik untuk upload</strong></p>
                      <small>PDF / JPEG, maks 2 MB</small>
                    </div>
                    <input type="file" id="afirmasi_file_listrik" class="ppdb-upload-input" accept=".pdf,.jpg,.jpeg,.png" onchange="handleUpload(this,'afirmasi_preview_listrik')">
                    <div class="ppdb-upload-preview" id="afirmasi_preview_listrik" style="display:none;"></div>
                  </div>
                  <div class="ppdb-upload-item">
                    <h4>Riwayat Tagihan Air <span class="required">*</span></h4>
                    <p>Bukti pembayaran air 3 bulan terakhir</p>
                    <div class="ppdb-upload-box" onclick="document.getElementById('afirmasi_file_air').click()">
                      <span class="material-symbols-outlined mat-icon-big">water_drop</span>
                      <p><strong>Klik untuk upload</strong></p>
                      <small>PDF / JPEG, maks 2 MB</small>
                    </div>
                    <input type="file" id="afirmasi_file_air" class="ppdb-upload-input" accept=".pdf,.jpg,.jpeg,.png" onchange="handleUpload(this,'afirmasi_preview_air')">
                    <div class="ppdb-upload-preview" id="afirmasi_preview_air" style="display:none;"></div>
                  </div>
                </div>
                <div class="ppdb-field-row" style="margin-top:1rem;">
                  <div class="ppdb-field">
                    <label>No. KIP <span class="required">*</span></label>
                    <input type="text" class="ppdb-input" id="afirmasi_no_kip" placeholder="Nomor KIP (Kartu Indonesia Pintar)" disabled>
                  </div>
                  <div class="ppdb-field">
                    <label>No. KKS / SKTM <span class="required">*</span></label>
                    <input type="text" class="ppdb-input" id="afirmasi_no_kks" placeholder="Nomor KKS / SKTM" disabled>
                  </div>
                </div>
                <p style="font-size:0.75rem;color:var(--secondary);margin:0.35rem 0 0;">Field ini aktif setelah Kartu KIP / bukti keikutsertaan diupload. Isi sesuai nomor pada dokumen.</p>
              </div>

              <!-- ── SECTION PANTI ASUHAN ── -->
              <div id="afirmasiSectionPanti" style="display:none;">
                <div class="ppdb-alert ppdb-alert-info" style="margin-bottom:1rem;">
                  <span class="material-symbols-outlined">info</span>
                  <span>Lengkapi data panti asuhan / lembaga kesejahteraan sosial tempat kamu tinggal.</span>
                </div>
                <div class="ppdb-field">
                  <label>Alamat Panti Asuhan <span class="required">*</span></label>
                  <input type="text" class="ppdb-input" id="afirmasi_alamat_panti" placeholder="Jalan, RT/RW, kelurahan, kecamatan">
                </div>
                <div class="ppdb-upload-grid" style="margin-top:1rem;">
                  <div class="ppdb-upload-item">
                    <h4>Surat dari Panti <span class="required">*</span></h4>
                    <p>Surat keterangan resmi dari panti asuhan / lembaga kesejahteraan sosial</p>
                    <div class="ppdb-upload-box" onclick="document.getElementById('afirmasi_file_surat_panti').click()">
                      <span class="material-symbols-outlined mat-icon-big">home_work</span>
                      <p><strong>Klik untuk upload</strong></p>
                      <small>PDF / JPEG, maks 2 MB</small>
                    </div>
                    <input type="file" id="afirmasi_file_surat_panti" class="ppdb-upload-input" accept=".pdf,.jpg,.jpeg,.png" onchange="handleUpload(this,'afirmasi_preview_surat_panti')">
                    <div class="ppdb-upload-preview" id="afirmasi_preview_surat_panti" style="display:none;"></div>
                  </div>
                </div>
              </div>

              <!-- ── SECTION DISABILITAS ── -->
              <div id="afirmasiSectionDisabilitas" style="display:none;">
                <div class="ppdb-alert ppdb-alert-info" style="margin-bottom:1rem;">
                  <span class="material-symbols-outlined">info</span>
                  <span>Upload surat keterangan dokter sebagai bukti kondisi disabilitas kamu.</span>
                </div>
                <div class="ppdb-upload-grid">
                  <div class="ppdb-upload-item">
                    <h4>Surat Keterangan Dokter <span class="required">*</span></h4>
                    <p>Surat keterangan dokter / rumah sakit tentang kondisi disabilitas</p>
                    <div class="ppdb-upload-box" onclick="document.getElementById('afirmasi_file_surat_dokter').click()">
                      <span class="material-symbols-outlined mat-icon-big">medical_services</span>
                      <p><strong>Klik untuk upload</strong></p>
                      <small>PDF / JPEG, maks 2 MB</small>
                    </div>
                    <input type="file" id="afirmasi_file_surat_dokter" class="ppdb-upload-input" accept=".pdf,.jpg,.jpeg,.png" onchange="handleUpload(this,'afirmasi_preview_surat_dokter')">
                    <div class="ppdb-upload-preview" id="afirmasi_preview_surat_dokter" style="display:none;"></div>
                  </div>
                </div>
              </div>

            </div>
          </div>


          <div class="ppdb-modul-card">
            <div class="ppdb-modul-header">
              <span class="material-symbols-outlined">verified</span>
              <span>Status Verifikasi</span>
              <span class="ppdb-modul-status ppdb-status-menunggu">Menunggu verifikasi</span>
            </div>
            <div class="ppdb-modul-body">
              <div class="ppdb-modul-timeline">
                <div class="ppdb-modul-tl-item ppdb-tl-done">
                  <div class="ppdb-tl-dot"><span class="material-symbols-outlined">check</span></div>
                  <div class="ppdb-tl-text">
                    <h4>Dokumen Terupload</h4>
                    <p>Dokumen afirmasi telah diupload oleh pendaftar</p>
                  </div>
                </div>
                <div class="ppdb-modul-tl-item ppdb-tl-active">
                  <div class="ppdb-tl-dot"><span class="material-symbols-outlined">more_horiz</span></div>
                  <div class="ppdb-tl-text">
                    <h4>Verifikasi Operator</h4>
                    <p>Menunggu operator memverifikasi dokumen</p>
                  </div>
                </div>
                <div class="ppdb-modul-tl-item ppdb-tl-pending">
                  <div class="ppdb-tl-dot"><span class="material-symbols-outlined">radio_button_unchecked</span></div>
                  <div class="ppdb-tl-text">
                    <h4>Penetapan Status</h4>
                    <p>Status afirmasi ditetapkan oleh tim PPDB</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- ══════════════════════════════
               MODUL PRESTASI
               ══════════════════════════════ -->
          <?php elseif ($jalur === 'prestasi'): ?>

          <div class="ppdb-modul-badge">MODUL PRESTASI</div>

          <div class="ppdb-modul-card">
            <div class="ppdb-modul-header">
              <span class="material-symbols-outlined">emoji_events</span>
              <span>Input Prestasi</span>
              <span class="ppdb-modul-status ppdb-status-belum">Belum diisi</span>
            </div>
            <div class="ppdb-modul-body">
              <div class="ppdb-field-row">
                <div class="ppdb-field">
                  <label>Jenis Prestasi <span class="required">*</span></label>
                  <select class="ppdb-select" id="prestasiJenis">
                    <option value="">— Pilih —</option>
                    <option>Akademik (Olimpiade Sains, OSN, dll)</option>
                    <option>Non-Akademik (Olahraga, Kesenian)</option>
                    <option>Kejuaraan Lomba Kompetensi Siswa</option>
                    <option>Prestasi Bahasa Asing</option>
                    <option>Prestasi Organisasi / Kepemimpinan</option>
                    <option>Lainnya</option>
                  </select>
                </div>
                <div class="ppdb-field">
                  <label>Tingkat <span class="required">*</span></label>
                  <select class="ppdb-select" id="prestasiTingkat">
                    <option value="">— Pilih —</option>
                    <option>Kecamatan</option>
                    <option>Kabupaten / Kota</option>
                    <option>Provinsi</option>
                    <option>Nasional</option>
                    <option>Internasional</option>
                  </select>
                </div>
              </div>
              <div class="ppdb-field-row">
                <div class="ppdb-field">
                  <label>Nama Prestasi <span class="required">*</span></label>
                  <input type="text" class="ppdb-input" id="prestasiNama" placeholder="Misal: Juara 1 OSN Matematika">
                </div>
                <div class="ppdb-field">
                  <label>Tahun <span class="required">*</span></label>
                  <select class="ppdb-select" id="prestasiTahun">
                    <option value="">— Pilih —</option>
                    <option>2026</option><option>2025</option><option>2024</option><option>2023</option><option>2022</option><option>2021</option>
                  </select>
                </div>
              </div>
              <div class="ppdb-field">
                <label>Penyelenggara</label>
                <input type="text" class="ppdb-input" id="prestasiPenyelenggara" placeholder="Nama institusi penyelenggara">
              </div>
            </div>
          </div>

          <div class="ppdb-modul-card">
            <div class="ppdb-modul-header">
              <span class="material-symbols-outlined">verified</span>
              <span>Upload Sertifikat / Piagam</span>
              <span class="ppdb-modul-status ppdb-status-belum">Belum upload</span>
            </div>
            <div class="ppdb-modul-body">
              <div class="ppdb-upload-grid">
                <div class="ppdb-upload-item">
                  <h4>Sertifikat / Piagam <span class="required">*</span></h4>
                  <p>Scan sertifikat atau piagam prestasi</p>
                  <div class="ppdb-upload-box" onclick="document.getElementById('prestasi_file_sertif').click()">
                    <span class="material-symbols-outlined mat-icon-big">trophy</span>
                    <p><strong>Klik untuk upload</strong></p>
                    <small>PDF / JPEG, maks 2 MB</small>
                  </div>
                  <input type="file" id="prestasi_file_sertif" class="ppdb-upload-input" accept=".pdf,.jpg,.jpeg,.png" onchange="handleUpload(this,'prestasi_preview_sertif')">
                  <div class="ppdb-upload-preview" id="prestasi_preview_sertif" style="display:none;"></div>
                </div>
                <div class="ppdb-upload-item">
                  <h4>Foto / Dokumentasi</h4>
                  <p>Foto saat menerima penghargaan (jika ada)</p>
                  <div class="ppdb-upload-box" onclick="document.getElementById('prestasi_file_foto').click()">
                    <span class="material-symbols-outlined mat-icon-big">photo_camera</span>
                    <p><strong>Klik untuk upload</strong></p>
                    <small>JPEG / PNG, maks 2 MB</small>
                  </div>
                  <input type="file" id="prestasi_file_foto" class="ppdb-upload-input" accept=".jpg,.jpeg,.png" onchange="handleUpload(this,'prestasi_preview_foto')">
                  <div class="ppdb-upload-preview" id="prestasi_preview_foto" style="display:none;"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="ppdb-modul-card">
            <div class="ppdb-modul-header">
              <span class="material-symbols-outlined">menu_book</span>
              <span>Nilai Akademik per Mapel</span>
              <span class="ppdb-modul-status ppdb-status-belum">Belum diisi</span>
            </div>
            <div class="ppdb-modul-body">
              <div class="ppdb-alert ppdb-alert-info" style="margin-bottom:1rem;">
                <span class="material-symbols-outlined">info</span>
                <span>Ketik nilai setiap mata pelajaran pada rapor kamu, mulai dari semester 1 sampai 5. Nilai rata-rata akan dihitung otomatis oleh sistem, jadi kamu tidak perlu menghitungnya sendiri.</span>
              </div>
              <?php
              $mapelAkademik = [
                1  => 'Pendidikan Agama &amp; Budi Pekerti',
                2  => 'PPKn',
                3  => 'Bahasa Indonesia',
                4  => 'Matematika',
                5  => 'Ilmu Pengetahuan Alam',
                6  => 'Ilmu Pengetahuan Sosial',
                7  => 'Bahasa Inggris',
                8  => 'Seni Budaya',
                9  => 'PJOK',
                10 => 'Informatika',
                11 => 'Prakarya',
              ];
              ?>
              <div class="ppdb-mapel-wrap">
                <table class="ppdb-mapel-table">
                  <thead>
                    <tr>
                      <th>Mapel</th>
                      <?php for ($s = 1; $s <= 5; $s++): ?>
                      <th>Smt <?= $s ?></th>
                      <?php endfor; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($mapelAkademik as $m => $label): ?>
                    <tr>
                      <td><?= $label ?></td>
                      <?php for ($s = 1; $s <= 5; $s++): ?>
                      <td><input type="number" class="ppdb-input ppdb-mapel-input" data-mapel="<?= $m ?>" data-semester="<?= $s ?>" placeholder="0" min="0" max="100" step="0.01"></td>
                      <?php endfor; ?>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Rata-rata Semester</th>
                      <?php for ($s = 1; $s <= 5; $s++): ?>
                      <th id="smtAvg<?= $s ?>">0</th>
                      <?php endfor; ?>
                    </tr>
                  </tfoot>
                </table>
              </div>

              <div id="hasilRataRapor" style="display:none;margin-top:0.75rem;padding:0.75rem 1rem;background:rgba(34,197,94,0.06);border-radius:var(--radius);border:1px solid rgba(34,197,94,0.12);">
                <span style="font-size:0.82rem;color:var(--secondary);">Nilai Akademik (rata-rata 5 semester, dihitung sistem):</span>
                <strong style="font-size:1.25rem;color:var(--primary-dark);" id="rataRapor">0</strong>
              </div>
            </div>
          </div>

          <div class="ppdb-modul-card">
            <div class="ppdb-modul-header">
              <span class="material-symbols-outlined">quiz</span>
              <span>Nilai TKA (Tes Kemampuan Akademik)</span>
              <span class="ppdb-modul-status ppdb-status-belum">Belum diisi</span>
            </div>
            <div class="ppdb-modul-body">
              <div class="ppdb-alert ppdb-alert-info" style="margin-bottom:1rem;">
                <span class="material-symbols-outlined">info</span>
                <span>Masukkan nilai TKA kamu pada 7 mata pelajaran utama (skala 0&ndash;100). Rata-rata TKA dihitung otomatis oleh sistem.</span>
              </div>
              <div class="ppdb-tka-grid">
                <div class="ppdb-field">
                  <label>Pend. Agama &amp; BP <span class="required">*</span></label>
                  <input type="number" class="ppdb-input ppdb-tka-input" data-mapel="pai" placeholder="0" min="0" max="100" step="0.01">
                </div>
                <div class="ppdb-field">
                  <label>PPKn <span class="required">*</span></label>
                  <input type="number" class="ppdb-input ppdb-tka-input" data-mapel="ppkn" placeholder="0" min="0" max="100" step="0.01">
                </div>
                <div class="ppdb-field">
                  <label>Bahasa Indonesia <span class="required">*</span></label>
                  <input type="number" class="ppdb-input ppdb-tka-input" data-mapel="bind" placeholder="0" min="0" max="100" step="0.01">
                </div>
                <div class="ppdb-field">
                  <label>Matematika <span class="required">*</span></label>
                  <input type="number" class="ppdb-input ppdb-tka-input" data-mapel="mtk" placeholder="0" min="0" max="100" step="0.01">
                </div>
                <div class="ppdb-field">
                  <label>IPA <span class="required">*</span></label>
                  <input type="number" class="ppdb-input ppdb-tka-input" data-mapel="ipa" placeholder="0" min="0" max="100" step="0.01">
                </div>
                <div class="ppdb-field">
                  <label>IPS <span class="required">*</span></label>
                  <input type="number" class="ppdb-input ppdb-tka-input" data-mapel="ips" placeholder="0" min="0" max="100" step="0.01">
                </div>
                <div class="ppdb-field">
                  <label>Bahasa Inggris <span class="required">*</span></label>
                  <input type="number" class="ppdb-input ppdb-tka-input" data-mapel="bing" placeholder="0" min="0" max="100" step="0.01">
                </div>
              </div>
              <div id="hasilRataTka" style="display:none;margin-top:0.75rem;padding:0.75rem 1rem;background:rgba(34,197,94,0.06);border-radius:var(--radius);border:1px solid rgba(34,197,94,0.12);">
                <span style="font-size:0.82rem;color:var(--secondary);">Nilai TKA (rata-rata 7 mapel utama, dihitung sistem):</span>
                <strong style="font-size:1.25rem;color:var(--primary-dark);" id="tkaAvg">0</strong>
              </div>
            </div>
          </div>

          <div class="ppdb-modul-card">
            <div class="ppdb-modul-header">
              <span class="material-symbols-outlined">score</span>
              <span>Perhitungan Poin</span>
              <span class="ppdb-modul-status ppdb-status-aman">Siap</span>
            </div>
            <div class="ppdb-modul-body">
              <div class="ppdb-poin-grid">
                <div class="ppdb-poin-item">
                  <span class="ppdb-poin-label">Nilai Rapor</span>
                  <span class="ppdb-poin-nilai" id="poinRapor">0</span>
                </div>
                <div class="ppdb-poin-item">
                  <span class="ppdb-poin-label">Nilai TKA</span>
                  <span class="ppdb-poin-nilai" id="poinTka">0</span>
                </div>
                <div class="ppdb-poin-item">
                  <span class="ppdb-poin-label">Prestasi</span>
                  <span class="ppdb-poin-nilai" id="poinPrestasi">0</span>
                </div>
                <div class="ppdb-poin-item">
                  <span class="ppdb-poin-label">Sertifikat</span>
                  <span class="ppdb-poin-nilai" id="poinSertifikat">0</span>
                </div>
                <div class="ppdb-poin-item ppdb-poin-total">
                  <span class="ppdb-poin-label">Total Poin</span>
                  <span class="ppdb-poin-nilai" id="poinTotal">0</span>
                </div>
              </div>
              <p style="font-size:0.75rem;color:var(--secondary);margin:0.75rem 0 0;">Nilai Akhir = (50% &times; Rata-rata Rapor) + (50% &times; Rata-rata TKA) + Poin Prestasi + Poin Sertifikat.</p>
            </div>
          </div>


          <div class="ppdb-modul-card">
            <div class="ppdb-modul-header">
              <span class="material-symbols-outlined">flag</span>
              <span>Status Prestasi</span>
              <span class="ppdb-modul-status ppdb-status-menunggu">Menunggu validasi</span>
            </div>
            <div class="ppdb-modul-body">
              <div class="ppdb-modul-timeline">
                <div class="ppdb-modul-tl-item ppdb-tl-done">
                  <div class="ppdb-tl-dot"><span class="material-symbols-outlined">check</span></div>
                  <div class="ppdb-tl-text">
                    <h4>Prestasi Dicatat</h4>
                    <p>Data prestasi berhasil disimpan dalam sistem</p>
                  </div>
                </div>
                <div class="ppdb-modul-tl-item ppdb-tl-active">
                  <div class="ppdb-tl-dot"><span class="material-symbols-outlined">more_horiz</span></div>
                  <div class="ppdb-tl-text">
                    <h4>Validasi Sertifikat</h4>
                    <p>Menunggu validasi sertifikat oleh tim verifikator</p>
                  </div>
                </div>
                <div class="ppdb-modul-tl-item ppdb-tl-pending">
                  <div class="ppdb-tl-dot"><span class="material-symbols-outlined">radio_button_unchecked</span></div>
                  <div class="ppdb-tl-text">
                    <h4>Penetapan Poin</h4>
                    <p>Poin prestasi ditetapkan berdasarkan hasil verifikasi</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php endif; ?>

          <div class="ppdb-btn-row" style="display:flex;gap:0.75rem;margin-top:1.5rem;">
            <a href="ppdb-daftar-sekolah.php" class="ppdb-btn ppdb-btn-outline ppdb-btn-lg" style="flex:1;text-decoration:none;text-align:center;">
              <span class="material-symbols-outlined">arrow_back</span>
              Kembali
            </a>
            <button type="submit" class="ppdb-btn ppdb-btn-primary ppdb-btn-lg" style="flex:2;" id="simpanBtn">
              <span class="material-symbols-outlined">save</span>
              Simpan
            </button>
          </div>

          <div style="text-align:center;margin-top:0.75rem;">
            <a href="ppdb-jurnal.php" style="font-size:0.82rem;color:var(--primary-dark);text-decoration:none;display:inline-flex;align-items:center;gap:0.35rem;">
              <span class="material-symbols-outlined" style="font-size:1rem;">monitoring</span>
              Lihat Jurnal Seleksi
            </a>
          </div>
        </form>
      </div>
    </div>
  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>

  <div id="ppdbToast" class="ppdb-toast"></div>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script src="../js/include.js?v=3"></script>
  <script src="../js/ppdb.js?v=9"></script>
</body>
</html>
