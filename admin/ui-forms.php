<?php
/**
 * Forms & Input Component Page - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Form & Input - Admin SMKN 2 Karanganyar';
$currentPage = 'forms';
$assetsPath = 'assets/';

include 'components/header.php';
include 'components/sidebar.php';
?>

<div class="main-wrapper">
  <?php include 'components/topbar.php'; ?>

  <!-- START: Page Header Banner -->
  <div class="page-header">
    <div>
      <h1 class="page-title">Formulir &amp; Input Data</h1>
      <p class="page-subtitle">Komponen form interaktif untuk entri data master siswa, guru, berita, dan pengaturan sistem.</p>
    </div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted-green">Dashboard</a></li>
        <li class="breadcrumb-item text-muted-green">Komponen UI</li>
        <li class="breadcrumb-item active text-main" aria-current="page">Form &amp; Input</li>
      </ol>
    </nav>
  </div>
  <!-- END: Page Header Banner -->

  <!-- START: Form Component Row Grid Layout -->
  <div class="row g-4 mb-4">

    <!-- Column 1: Basic controls -->
    <div class="col-12 col-lg-6">
      <div class="card border-light shadow-sm p-4 h-100">
        <h5 class="card-title mb-4">Input Dasar</h5>

        <!-- Text input -->
        <div class="mb-3">
          <label for="basicText" class="form-label-custom">Nama Lengkap / Username</label>
          <input type="text" class="form-control-custom" id="basicText" placeholder="Masukkan nama lengkap">
        </div>

        <!-- Email input -->
        <div class="mb-3">
          <label for="basicEmail" class="form-label-custom">Alamat Email</label>
          <input type="email" class="form-control-custom" id="basicEmail" placeholder="nama@smkn2kra.sch.id">
          <span class="text-muted small">Email resmi akan digunakan untuk notifikasi sistem.</span>
        </div>

        <!-- Password input -->
        <div class="mb-3">
          <label for="basicPassword" class="form-label-custom">Kata Sandi</label>
          <input type="password" class="form-control-custom" id="basicPassword"
            placeholder="Masukkan kata sandi aman">
        </div>

        <!-- Disabled State -->
        <div class="mb-3">
          <label for="basicDisabled" class="form-label-custom">Bidang Nonaktif (Disabled)</label>
          <input type="text" class="form-control-custom" id="basicDisabled" value="Field ini dinonaktifkan sistem" disabled>
        </div>

        <!-- Readonly State -->
        <div class="mb-0">
          <label for="basicReadonly" class="form-label-custom">Hanya Baca (Read-only)</label>
          <input type="text" class="form-control-custom" id="basicReadonly" value="KODE-REG-2026-SKLH" readonly>
        </div>
      </div>
    </div>

    <!-- Column 2: Selection & Validation -->
    <div class="col-12 col-lg-6">
      <div class="card border-light shadow-sm p-4 h-100">
        <h5 class="card-title mb-4">Pilihan &amp; Validasi</h5>

        <!-- Custom dropdown select -->
        <div class="mb-3">
          <label for="selectControl" class="form-label-custom">Pilihan Jurusan</label>
          <select class="form-select-custom" id="selectControl">
            <option selected disabled>Pilih kompetensi keahlian...</option>
            <option value="rpl">Rekayasa Perangkat Lunak (RPL)</option>
            <option value="tm">Teknik Pemesinan (TM)</option>
            <option value="tkro">Teknik Kendaraan Ringan Otomotif (TKRO)</option>
            <option value="tb">Tata Busana (TB)</option>
            <option value="tekstil">Teknik Tekstil</option>
          </select>
        </div>

        <!-- Textarea layout -->
        <div class="mb-3">
          <label for="textareaControl" class="form-label-custom">Deskripsi / Catatan Tambahan</label>
          <textarea class="form-control-custom" id="textareaControl" rows="3"
            placeholder="Tuliskan keterangan detail atau ringkasan..."></textarea>
        </div>

        <!-- Valid feedback block -->
        <div class="mb-3">
          <label for="validInput" class="form-label-custom">Status Valid</label>
          <input type="text" class="form-control-custom is-valid-custom" id="validInput" value="NISN_3313028821">
          <div class="form-feedback-custom valid-custom">
            <i class="bi bi-check-circle-fill"></i> NISN valid dan terdaftar di Dapodik!
          </div>
        </div>

        <!-- Invalid feedback block -->
        <div class="mb-0">
          <label for="invalidInput" class="form-label-custom">Status Belum Valid</label>
          <input type="email" class="form-control-custom is-invalid-custom" id="invalidInput"
            value="format-email-salah">
          <div class="form-feedback-custom invalid-custom">
            <i class="bi bi-exclamation-circle-fill"></i> Masukkan format email yang valid.
          </div>
        </div>
      </div>
    </div>

    <!-- Column 3: Sizing & Groups -->
    <div class="col-12 col-lg-6">
      <div class="card border-light shadow-sm p-4 h-100">
        <h5 class="card-title mb-4">Ukuran &amp; Input Group</h5>

        <!-- Sizing examples -->
        <div class="mb-4">
          <div class="mb-2">
            <label class="form-label-custom">Ukuran Besar (Large)</label>
            <input type="text" class="form-control-custom form-control-custom-lg" placeholder="Input teks ukuran besar">
          </div>
          <div class="mb-2">
            <label class="form-label-custom">Ukuran Standar</label>
            <input type="text" class="form-control-custom" placeholder="Input teks ukuran standar">
          </div>
          <div>
            <label class="form-label-custom">Ukuran Kecil (Small)</label>
            <input type="text" class="form-control-custom form-control-custom-sm" placeholder="Input teks ukuran ringkas">
          </div>
        </div>

        <h6 class="mb-3">Input Groups</h6>

        <!-- Prepend group -->
        <div class="mb-3">
          <div class="input-group-custom">
            <span class="input-group-text-custom">@</span>
            <input type="text" class="form-control-custom" placeholder="Username portal">
          </div>
        </div>

        <!-- Append group -->
        <div class="mb-3">
          <div class="input-group-custom">
            <input type="text" class="form-control-custom" placeholder="Nama Akun">
            <span class="input-group-text-custom">@smkn2kra.sch.id</span>
          </div>
        </div>

        <!-- Prepend + Append Icon group -->
        <div class="mb-0">
          <div class="input-group-custom">
            <span class="input-group-text-custom"><i class="bi bi-currency-dollar"></i></span>
            <input type="text" class="form-control-custom" placeholder="Biaya Pendaftaran / SPP">
            <span class="input-group-text-custom">IDR</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Column 4: Checkboxes, Radios & iOS Switches -->
    <div class="col-12 col-lg-6">
      <div class="card border-light shadow-sm p-4 h-100">
        <h5 class="card-title mb-4">Pilihan Checkbox, Radio &amp; Switch</h5>

        <h6 class="mb-3">Pilihan Checkbox</h6>
        <div class="mb-4">
          <div class="form-check-custom">
            <input class="form-check-input-custom" type="checkbox" id="checkActive" checked>
            <label class="form-check-label" for="checkActive">Kirim notifikasi WhatsApp ke calon siswa</label>
          </div>
          <div class="form-check-custom">
            <input class="form-check-input-custom" type="checkbox" id="checkInactive">
            <label class="form-check-label" for="checkInactive">Sertakan berkas piagam penghargaan</label>
          </div>
          <div class="form-check-custom">
            <input class="form-check-input-custom" type="checkbox" id="checkDisabled" disabled checked>
            <label class="form-check-label" for="checkDisabled">Konfirmasi syarat wajib (Terkunci)</label>
          </div>
        </div>

        <h6 class="mb-3">Pilihan Radio (Gender / Jalur)</h6>
        <div class="mb-4">
          <div class="form-check-custom">
            <input class="form-check-input-custom" type="radio" name="radioGroup" id="radioOne" checked>
            <label class="form-check-label" for="radioOne">Jalur Prestasi Akademik &amp; Non-Akademik</label>
          </div>
          <div class="form-check-custom">
            <input class="form-check-input-custom" type="radio" name="radioGroup" id="radioTwo">
            <label class="form-check-label" for="radioTwo">Jalur Afirmasi / Domisili Zonasi</label>
          </div>
        </div>

        <h6 class="mb-3">Switch Kontrol Modern (iOS Style)</h6>
        <div>
          <div class="form-switch-custom">
            <input class="form-switch-input-custom" type="checkbox" id="switchOne" checked>
            <label class="form-switch-label" for="switchOne">Aktifkan portal pendaftaran PPDB</label>
          </div>
          <div class="form-switch-custom">
            <input class="form-switch-input-custom" type="checkbox" id="switchTwo">
            <label class="form-switch-label" for="switchTwo">Mode pemeliharaan sistem (Maintenance)</label>
          </div>
          <div class="form-switch-custom">
            <input class="form-switch-input-custom" type="checkbox" id="switchThree" disabled>
            <label class="form-switch-label" for="switchThree">Sinkronisasi otomatis basis data Dapodik (Otomatis)</label>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- END: Form Component Row Grid Layout -->

  <?php include 'components/footer.php'; ?>
