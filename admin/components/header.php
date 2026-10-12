<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Proteksi Autentikasi Admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: page-login.php');
    exit;
}

$pageTitle = $pageTitle ?? 'Admin Panel - SMKN 2 Karanganyar';
$assetsPath = $assetsPath ?? 'assets/';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>

  <!-- SEO Optimization -->
  <meta name="description" content="Admin Panel SMKN 2 Karanganyar - Manajemen Sistem Sekolah Modern">
  <meta name="author" content="SMKN 2 Karanganyar">

  <!-- Favicon Logo SMKN 2 Karanganyar -->
  <link rel="icon" type="image/png" href="<?= $assetsPath ?>images/smkn2kra.png">
  <link rel="shortcut icon" href="<?= $assetsPath ?>images/smkn2kra.png">

  <!-- Local Third-Party Libraries (100% Offline Compatible) -->
  <link rel="stylesheet" href="<?= $assetsPath ?>libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $assetsPath ?>libs/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= $assetsPath ?>libs/apexcharts/apexcharts.css">
  <link rel="stylesheet" href="<?= $assetsPath ?>libs/flatpickr/flatpickr.min.css">
  <script src="<?= $assetsPath ?>libs/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="<?= $assetsPath ?>js/swal-helper.js"></script>

  <!-- Main Design System & Custom Stylesheet -->
  <link rel="stylesheet" href="<?= $assetsPath ?>css/main.css">
  
  <?php if (!empty($extraCss)): ?>
    <?= $extraCss ?>
  <?php endif; ?>
</head>

<body>
