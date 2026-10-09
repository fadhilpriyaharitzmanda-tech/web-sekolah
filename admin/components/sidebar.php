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
  <!-- Brand Logo / Identity with SMKN 2 Karanganyar Logo -->
  <a href="index.php" class="sidebar-brand" title="SMKN 2 Karanganyar Admin">
    <img src="<?= $assetsPath ?>images/smkn2kra.png" alt="SMKN 2 Karanganyar" class="sidebar-brand-img"
      onerror="this.src='../logo/smkn2kra.png'">
    <div class="sidebar-brand-text">
      <span class="sidebar-brand-title">SMKN 2 Karanganyar</span>
      <span class="sidebar-brand-sub">Admin Portal</span>
    </div>
  </a>

  <!-- Navigation Menu with Slim Smooth Scrollbar -->
  <div class="sidebar-nav-scroll">
    <!-- Group: Utama -->
    <div class="sidebar-menu-section">
      <div class="sidebar-menu-title">Utama</div>
      <ul class="sidebar-menu-list">
        <li class="sidebar-menu-item">
          <a href="index.php" class="sidebar-menu-link <?= ($currentPage === 'dashboard') ? 'active' : '' ?>" id="menu-overview" title="Dashboard">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Group: Kelola Landing Page -->
    <div class="sidebar-menu-section">
      <div class="sidebar-menu-title">Kelola Landing Page</div>
      <ul class="sidebar-menu-list">
        <li class="sidebar-menu-item">
          <a href="kelola-hero.php" class="sidebar-menu-link <?= ($currentPage === 'kelola-hero') ? 'active' : '' ?>" id="menu-hero" title="Hero & Banner Slider">
            <i class="bi bi-aspect-ratio-fill"></i>
            <span>Hero &amp; Banner</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="kelola-statistik.php" class="sidebar-menu-link <?= ($currentPage === 'kelola-stats') ? 'active' : '' ?>" id="menu-stats" title="Statistik & Counter Landing Page">
            <i class="bi bi-bar-chart-fill"></i>
            <span>Statistik Sekolah</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="kelola-jurusan.php" class="sidebar-menu-link <?= ($currentPage === 'kelola-jurusan') ? 'active' : '' ?>" id="menu-jurusan" title="Kelola Jurusan Unggulan">
            <i class="bi bi-cpu-fill"></i>
            <span>Jurusan Unggulan</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="kelola-berita.php" class="sidebar-menu-link <?= ($currentPage === 'kelola-berita') ? 'active' : '' ?>" id="menu-berita" title="Warta & Berita Terbaru">
            <i class="bi bi-newspaper"></i>
            <span>Berita &amp; Warta</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="kelola-testimoni.php" class="sidebar-menu-link <?= ($currentPage === 'kelola-testimoni') ? 'active' : '' ?>" id="menu-testimoni" title="Testimoni Alumni">
            <i class="bi bi-chat-heart-fill"></i>
            <span>Testimoni Alumni</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="kelola-mitra.php" class="sidebar-menu-link <?= ($currentPage === 'kelola-mitra') ? 'active' : '' ?>" id="menu-mitra" title="Mitra Industri DUDI">
            <i class="bi bi-buildings-fill"></i>
            <span>Mitra Industri &amp; PKL</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Group: Akademik & Kesiswaan -->
    <div class="sidebar-menu-section">
      <div class="sidebar-menu-title">Akademik &amp; Kesiswaan</div>
      <ul class="sidebar-menu-list">
        <li class="sidebar-menu-item">
          <a href="kelola-guru.php" class="sidebar-menu-link <?= ($currentPage === 'kelola-guru') ? 'active' : '' ?>" id="menu-guru" title="Guru & Tenaga Kependidikan">
            <i class="bi bi-people-fill"></i>
            <span>Guru &amp; Staff</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="kelola-kesiswaan.php?tab=prestasi" class="sidebar-menu-link <?= ($currentPage === 'kelola-prestasi') ? 'active' : '' ?>" id="menu-prestasi" title="Prestasi Siswa">
            <i class="bi bi-trophy-fill"></i>
            <span>Prestasi Siswa</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="kelola-kesiswaan.php?tab=ekskul" class="sidebar-menu-link <?= ($currentPage === 'kelola-ekskul') ? 'active' : '' ?>" id="menu-ekskul" title="Ekstrakurikuler">
            <i class="bi bi-stars"></i>
            <span>Ekstrakurikuler</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Group: Layanan & Informasi -->
    <div class="sidebar-menu-section">
      <div class="sidebar-menu-title">Layanan &amp; Informasi</div>
      <ul class="sidebar-menu-list">
        <li class="sidebar-menu-item">
          <a href="kelola-ppdb.php" class="sidebar-menu-link <?= ($currentPage === 'kelola-ppdb') ? 'active' : '' ?>" id="menu-ppdb" title="Pendaftaran Siswa Baru">
            <i class="bi bi-person-badge-fill"></i>
            <span>PPDB Online</span>
            <span class="sidebar-menu-badge">Baru</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="kelola-pengaduan.php" class="sidebar-menu-link <?= ($currentPage === 'kelola-pengaduan') ? 'active' : '' ?>" id="menu-pengaduan" title="Kotak Pengaduan">
            <i class="bi bi-shield-check"></i>
            <span>Pengaduan</span>
            <span class="sidebar-menu-badge">3</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="kelola-galeri.php" class="sidebar-menu-link <?= ($currentPage === 'kelola-galeri') ? 'active' : '' ?>" id="menu-galeri" title="Galeri Dokumentasi">
            <i class="bi bi-images"></i>
            <span>Galeri Foto</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Group: UI Template & Referensi -->
    <div class="sidebar-menu-section">
      <div class="sidebar-menu-title">Template &amp; Tautan</div>
      <ul class="sidebar-menu-list">
        <li class="sidebar-menu-item">
          <a href="tables-basic.php" class="sidebar-menu-link <?= ($currentPage === 'tables') ? 'active' : '' ?>" id="menu-basictables" title="Contoh Tabel">
            <i class="bi bi-table"></i>
            <span>Tabel Data</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="ui-forms.php" class="sidebar-menu-link <?= ($currentPage === 'forms') ? 'active' : '' ?>" id="menu-uiforms" title="Contoh Form">
            <i class="bi bi-input-cursor-text"></i>
            <span>Form &amp; Input</span>
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="../index.php" target="_blank" class="sidebar-menu-link" id="menu-website" title="Kunjungi Website Utama">
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
