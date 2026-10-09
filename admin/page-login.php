<?php
/**
 * Login Screen - Admin SMKN 2 Karanganyar
 */
$pageTitle = 'Login Administrator - SMKN 2 Karanganyar';
$assetsPath = 'assets/';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?= $assetsPath ?>images/favicon.ico">

  <!-- Local Third-Party Libraries -->
  <link rel="stylesheet" href="<?= $assetsPath ?>libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $assetsPath ?>libs/bootstrap-icons/bootstrap-icons.css">

  <!-- Main Design System & Custom Stylesheet -->
  <link rel="stylesheet" href="<?= $assetsPath ?>css/main.css">
</head>

<body>

  <!-- ==========================================
       START: Authentication Container & Login Card
       ========================================== -->
  <div class="login-wrapper">
    <!-- Glowing background shapes for modern visual appearance -->
    <div class="login-bg-shape login-bg-shape-1"></div>
    <div class="login-bg-shape login-bg-shape-2"></div>

    <!-- Main centered login card -->
    <div class="login-card">

      <!-- Brand Identity -->
      <a href="index.php" class="login-brand text-decoration-none d-flex align-items-center justify-content-center gap-2">
        <img src="<?= $assetsPath ?>images/smkn2kra.png" alt="SMKN 2 Karanganyar" style="width: 36px; height: 36px; object-fit: contain;" onerror="this.src='../logo/smkn2kra.png'">
        <span>SMKN 2 Karanganyar</span>
      </a>

      <p class="login-subtitle">Masuk ke Panel Administrasi &amp; Pengelolaan Sekolah</p>

      <!-- Login Form -->
      <form action="index.php" method="GET" id="loginForm" class="needs-validation" novalidate>

        <!-- Email Input Group -->
        <div class="login-form-group">
          <label for="email" class="login-form-label">Alamat Email / NIP</label>
          <div class="login-input-group">
            <i class="bi bi-envelope input-icon"></i>
            <input type="email" id="email" class="login-input" placeholder="admin@smkn2kra.sch.id" required>
          </div>
        </div>

        <!-- Password Input Group -->
        <div class="login-form-group">
          <label for="password" class="login-form-label">Kata Sandi</label>
          <div class="login-input-group">
            <i class="bi bi-shield-lock input-icon"></i>
            <input type="password" id="password" class="login-input login-input-password" placeholder="••••••••" required>
            <button type="button" class="password-toggle-btn" id="toggle-password" aria-label="Show password">
              <i class="bi bi-eye"></i>
            </button>
          </div>
        </div>

        <!-- Options (Remember me & Forgot Password) -->
        <div class="login-options">
          <label class="custom-control-label">
            <input type="checkbox" class="custom-checkbox-input" id="rememberMe">
            <span>Ingat Saya</span>
          </label>
          <a href="#" class="forgot-password-link">Lupa Password?</a>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-login" id="btn-submit">
          <span>Masuk ke Dashboard</span>
          <i class="bi bi-arrow-right"></i>
        </button>

      </form>

      <!-- Divider -->
      <div class="login-divider">Atau kembali ke</div>

      <!-- Website Link -->
      <div class="text-center mt-3">
        <a href="../index.php" class="btn-social text-decoration-none w-100 justify-content-center">
          <i class="bi bi-globe2 text-success"></i>
          <span>Website Utama SMKN 2 Karanganyar</span>
        </a>
      </div>

    </div>
  </div>
  <!-- END: Authentication Container -->

  <!-- Local Bootstrap bundle -->
  <script src="<?= $assetsPath ?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom Authentication interactions script -->
  <script src="<?= $assetsPath ?>js/auth.js"></script>
</body>

</html>
