<?php
/**
 * Header Component - Admin SMKN 2 Karanganyar
 * Contains DOCTYPE, meta tags, and stylesheet imports.
 */
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

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?= $assetsPath ?>images/favicon.ico">

  <!-- Local Third-Party Libraries (100% Offline Compatible) -->
  <link rel="stylesheet" href="<?= $assetsPath ?>libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $assetsPath ?>libs/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= $assetsPath ?>libs/apexcharts/apexcharts.css">
  <link rel="stylesheet" href="<?= $assetsPath ?>libs/flatpickr/flatpickr.min.css">

  <!-- Main Design System & Custom Stylesheet -->
  <link rel="stylesheet" href="<?= $assetsPath ?>css/main.css">
  
  <?php if (!empty($extraCss)): ?>
    <?= $extraCss ?>
  <?php endif; ?>
</head>

<body>
