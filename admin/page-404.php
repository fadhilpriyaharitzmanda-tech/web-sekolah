<?php
/**
 * 404 Error Page - Admin SMKN 2 Karanganyar
 */
$pageTitle = '404 - Halaman Tidak Ditemukan';
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
       START: 404 Error Page Container & Card
       ========================================== -->
  <div class="login-wrapper">
    <!-- Glowing background shapes matching theme aesthetic -->
    <div class="login-bg-shape login-bg-shape-1"></div>
    <div class="login-bg-shape login-bg-shape-2"></div>

    <!-- Main centered error card layout -->
    <div class="login-card text-center">

      <!-- Brand Identity -->
      <a href="index.php" class="login-brand text-decoration-none">
        <i class="bi bi-mortarboard-fill text-lime"></i>
        <span>SMKN 2 Karanganyar</span>
      </a>

      <!-- Giant 404 header with spinning asterisk Zero -->
      <div class="error-title-huge">
        <span>4</span>
        <i class="bi bi-asterisk"></i>
        <span>4</span>
      </div>

      <h2 class="error-subtitle">Halaman Tidak Ditemukan</h2>
      <p class="error-desc">
        Halaman yang Anda tuju mungkin telah dipindahkan, dihapus, atau sedang dalam tahap pemeliharaan.
      </p>

      <div class="error-actions-group">
        <a href="index.php" class="btn-custom btn-custom-primary">
          <i class="bi bi-house"></i> Kembali ke Dashboard
        </a>
      </div>

    </div>
  </div>
  <!-- END: 404 Error Page Container -->

  <!-- Local Third-Party Libraries Script dependencies -->
  <script src="<?= $assetsPath ?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
