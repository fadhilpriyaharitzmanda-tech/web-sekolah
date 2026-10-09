<?php
/**
 * Sidebar Component - Admin SMKN 2 Karanganyar
 * Sticky navigation with active page state indicator.
 */
$currentPage = $currentPage ?? 'dashboard';
$assetsPath = $assetsPath ?? 'assets/';
?>
<!-- ==========================================
     START: Sidebar Component
     Highly polished, dark-green sticky navigation
     ========================================== -->
<div class="sidebar-wrapper" id="sidebar">
  <!-- Brand Logo / Identity -->
  <a href="index.php" class="sidebar-brand">
    <i class="bi bi-mortarboard-fill text-lime"></i>
    <span>SMKN 2 Kra</span>
  </a>

  <!-- Navigation Menu -->
  <div class="flex-grow-1 overflow-y-auto">
    <!-- Group: Menu Utama -->
    <div class="sidebar-menu-section">
      <div class="sidebar-menu-title">Menu Utama</div>
      <ul class="sidebar-menu-list">
        <li class="sidebar-menu-item">
          <a href="index.php" class="sidebar-menu-link <?= ($currentPage === 'dashboard') ? 'active' : '' ?>" id="menu-overview" title="Dashboard">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Group: Komponen & UI Template -->
    <div class="sidebar-menu-section">
      <div class="sidebar-menu-title">Komponen UI</div>
      <ul class="sidebar-menu-list">
        <li class="sidebar-menu-item">
          <a href="tables-basic.php" class="sidebar-menu-link <?= ($currentPage === 'tables') ? 'active' : '' ?>" id="menu-basictables" title="Basic Tables">
            <i class="bi bi-table"></i>
            <span>Tabel Data</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="ui-forms.php" class="sidebar-menu-link <?= ($currentPage === 'forms') ? 'active' : '' ?>" id="menu-uiforms" title="Forms and Input">
            <i class="bi bi-input-cursor-text"></i>
            <span>Form &amp; Input</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="ui-buttons.php" class="sidebar-menu-link <?= ($currentPage === 'buttons') ? 'active' : '' ?>" id="menu-uibuttons" title="Buttons">
            <i class="bi bi-menu-button-wide-fill"></i>
            <span>Tombol &amp; Alert</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Group: Halaman -->
    <div class="sidebar-menu-section">
      <div class="sidebar-menu-title">Halaman</div>
      <ul class="sidebar-menu-list">
        <li class="sidebar-menu-item">
          <a href="page-blank.php" class="sidebar-menu-link <?= ($currentPage === 'blank') ? 'active' : '' ?>" id="menu-blankpage" title="Blank Page">
            <i class="bi bi-file-earmark"></i>
            <span>Halaman Kosong</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="page-login.php" class="sidebar-menu-link <?= ($currentPage === 'login') ? 'active' : '' ?>" id="menu-loginpage" title="Login Page">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Halaman Login</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="../index.php" target="_blank" class="sidebar-menu-link" id="menu-website" title="Lihat Website">
            <i class="bi bi-globe2"></i>
            <span>Lihat Website</span>
            <i class="bi bi-box-arrow-up-right ms-auto fs-xs text-muted"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <!-- Sidebar Profile Card (Dynamic Footer) -->
  <div class="sidebar-profile">
    <img src="<?= $assetsPath ?>images/avatar.png" alt="Administrator" class="sidebar-profile-img"
      onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=256&auto=format&fit=crop'">
    <div class="sidebar-profile-info">
      <div class="sidebar-profile-name">Administrator</div>
      <div class="sidebar-profile-email">admin@smkn2kra.sch.id</div>
    </div>
  </div>
</div>
<!-- ==========================================
     END: Sidebar Component
     ========================================== -->
