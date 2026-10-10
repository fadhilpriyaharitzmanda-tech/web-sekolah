<?php
/**
 * Topbar Component - Admin SMKN 2 Karanganyar
 * Top header containing toggles, search, notifications, and profile menu.
 */
$assetsPath = $assetsPath ?? 'assets/';
?>
<!-- START: Top Navbar Component -->
<header class="navbar-custom">
  <div class="navbar-left">
    <!-- Desktop sidebar toggle (visible on large screens only) -->
    <button class="btn-desktop-toggle d-none d-xl-flex align-items-center justify-content-center me-3"
      id="desktop-sidebar-toggle" aria-label="Minimize Sidebar">
      <i class="bi bi-chevron-bar-left"></i>
    </button>
    <!-- Mobile sidebar toggle -->
    <button class="sidebar-toggle-btn me-2" id="sidebar-toggle" aria-label="Toggle Navigation">
      <i class="bi bi-list"></i>
    </button>

    <!-- Quick Actions Dropdown -->
    <div class="dropdown ms-2">
      <button class="btn-quick-action dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
        id="quick-actions-dropdown">
        <i class="bi bi-plus-lg"></i>
        <span>Tambah</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-quick-action" aria-labelledby="quick-actions-dropdown">
        <li class="dropdown-header">Aksi Cepat Admin</li>
        <li><a class="dropdown-item" href="kelola-hero.php"><i class="bi bi-aspect-ratio"></i> Kelola Banner Hero</a></li>
        <li><a class="dropdown-item" href="kelola-berita.php"><i class="bi bi-newspaper"></i> Tulis Berita Baru</a></li>
        <li><a class="dropdown-item" href="kelola-jurusan.php"><i class="bi bi-cpu"></i> Kelola Jurusan</a></li>
        <li><a class="dropdown-item" href="kelola-testimoni.php"><i class="bi bi-chat-heart"></i> Testimoni Alumni</a></li>
        <li><a class="dropdown-item" href="kelola-ppdb.php"><i class="bi bi-person-check"></i> Verifikasi PPDB</a></li>
        <li><a class="dropdown-item" href="kelola-galeri.php"><i class="bi bi-images"></i> Unggah Galeri</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="../index.php" target="_blank"><i class="bi bi-globe2"></i> Ke Website Utama</a></li>
      </ul>
    </div>
  </div>

  <!-- Mid navbar: search pill -->
  <div class="navbar-search-wrapper">
    <input type="text" class="navbar-search-input" placeholder="Cari data, menu, atau informasi..." id="main-search">
    <button class="navbar-search-btn" aria-label="Search">
      <i class="bi bi-search"></i>
    </button>
  </div>

  <!-- Right actions -->
  <div class="navbar-actions">
    <!-- Fullscreen Toggle -->
    <button class="navbar-action-btn me-1" aria-label="Toggle Fullscreen" id="btn-fullscreen">
      <i class="bi bi-arrows-fullscreen"></i>
    </button>

    <!-- Notification Dropdown -->
    <div class="dropdown">
      <button class="navbar-action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
        aria-expanded="false" id="btn-notifications" data-bs-auto-close="outside">
        <i class="bi bi-bell"></i>
        <span class="navbar-action-badge"></span>
      </button>
      <div class="dropdown-menu dropdown-menu-end dropdown-menu-notification p-0"
        aria-labelledby="btn-notifications">
        <div class="notification-header">
          <h6 class="notification-title">Notifikasi Sistem</h6>
          <button class="btn-clear-all" type="button">Tandai telah dibaca</button>
        </div>
        <div class="notification-list">
          <!-- Notification 1 -->
          <a href="#" class="notification-item">
            <div class="notification-icon bg-success text-white">
              <i class="bi bi-person-check-fill"></i>
            </div>
            <div class="notification-content">
              <p class="notification-text">Pendaftaran PPDB Baru: <strong>Ahmad Farhan</strong></p>
              <span class="notification-time">5 menit yang lalu</span>
            </div>
            <span class="notification-unread-dot"></span>
          </a>
          <!-- Notification 2 -->
          <a href="#" class="notification-item">
            <div class="notification-icon bg-primary text-white">
              <i class="bi bi-chat-left-dots-fill"></i>
            </div>
            <div class="notification-content">
              <p class="notification-text">Pengaduan baru masuk pada form layanan</p>
              <span class="notification-time">1 jam yang lalu</span>
            </div>
            <span class="notification-unread-dot"></span>
          </a>
          <!-- Notification 3 -->
          <a href="#" class="notification-item">
            <div class="notification-icon bg-warning text-dark">
              <i class="bi bi-shield-exclamation"></i>
            </div>
            <div class="notification-content">
              <p class="notification-text">Pembaruan sistem keamanan tersedia</p>
              <span class="notification-time">1 hari yang lalu</span>
            </div>
          </a>
        </div>
        <a href="#" class="notification-footer">Lihat Semua Notifikasi</a>
      </div>
    </div>

    <!-- Profile Dropdown -->
    <div class="dropdown ms-2">
      <button class="navbar-profile-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
        aria-expanded="false" id="profile-dropdown">
        <img src="<?= $assetsPath ?>images/avatar.png" alt="Profile Image" class="navbar-profile-img"
          onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=256&auto=format&fit=crop'">
        <span class="navbar-profile-name d-none d-md-inline"><?= htmlspecialchars($_SESSION['admin_nama'] ?? 'Administrator') ?></span>
        <i class="bi bi-chevron-down navbar-profile-caret"></i>
      </button>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-profile" aria-labelledby="profile-dropdown">
        <li class="dropdown-header">Selamat Datang, <?= htmlspecialchars($_SESSION['admin_username'] ?? 'Admin') ?>!</li>
        <li><a class="dropdown-item" href="index.php"><i class="bi bi-person"></i> Akun Saya</a></li>
        <li><a class="dropdown-item" href="../index.php" target="_blank"><i class="bi bi-globe2"></i> Ke Website</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Keluar</a></li>
      </ul>
    </div>
  </div>
</header>
<!-- END: Top Navbar Component -->
