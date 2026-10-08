<?php $bn = $baseNav ?? ''; ?>
<header class="header" id="header">
  <div class="header-inner container">
    <div class="logo">
      <img src="<?= $bn ?>logo/smkn2kra.png" alt="SMKN 2 Karanganyar" class="logo-img">
      <div class="logo-text">
        <span>SMK NEGERI 2</span>
        <span>Karanganyar</span>
      </div>
    </div>
    <nav class="nav">
      <div class="nav-dropdown">
        <a href="<?= $bn ?>index.php" class="nav-link nav-dropdown-toggle" data-page="index">
          Home
          <span class="nav-chevron material-symbols-outlined">expand_more</span>
        </a>
        <div class="nav-dropdown-menu">
          <a href="<?= $bn ?>akademik/jurusan.php" class="nav-dropdown-item">Jurusan</a>
          <a href="<?= $bn ?>informasi/berita.php" class="nav-dropdown-item">Berita</a>
          <a href="<?= $bn ?>informasi/pengumuman.php" class="nav-dropdown-item">Pengumuman</a>
          <a href="<?= $bn ?>tentang/alumni.php" class="nav-dropdown-item">Alumni</a>
          <a href="<?= $bn ?>pkl/index.php" class="nav-dropdown-item">PKL</a>
        </div>
      </div>
      <div class="nav-dropdown">
        <a href="<?= $bn ?>profil/profil.php" class="nav-link nav-dropdown-toggle" data-page="profil">
          Profil
          <span class="nav-chevron material-symbols-outlined">expand_more</span>
        </a>
        <div class="nav-dropdown-menu">
          <a href="<?= $bn ?>profil/sejarah.php" class="nav-dropdown-item">Sejarah</a>
          <a href="<?= $bn ?>profil/visi-misi.php" class="nav-dropdown-item">Visi Misi</a>
          <a href="<?= $bn ?>profil/kepsek.php" class="nav-dropdown-item">Kepala Sekolah</a>
        </div>
      </div>
      <div class="nav-dropdown">
        <a href="<?= $bn ?>kesiswaan/kesiswaan.php" class="nav-link nav-dropdown-toggle">
          Kesiswaan
          <span class="nav-chevron material-symbols-outlined">expand_more</span>
        </a>
        <div class="nav-dropdown-menu">
          <a href="<?= $bn ?>kesiswaan/prestasi.php" class="nav-dropdown-item">Prestasi</a>
          <a href="<?= $bn ?>kesiswaan/ekstrakurikuler.php" class="nav-dropdown-item">Ekstrakurikuler</a>
        </div>
      </div>
      <a href="<?= $bn ?>akademik/guru.php" class="nav-link">Guru &amp; Staff</a>
      <a href="<?= $bn ?>galeri/galeri.php" class="nav-link">Galeri</a>
    </nav>
    <a href="<?= $bn ?>layanan/pengaduan.php" class="btn-nav-outline">
      <span class="material-symbols-outlined" style="font-size:1rem;">shield</span> Pengaduan
    </a>
    <a href="<?= $bn ?>layanan/ppdb.php" class="nav-link btn-nav">PPDB</a>
    <button class="menu-toggle" onclick="toggleDrawer()" aria-label="Menu">
      <span class="material-symbols-outlined">menu</span>
    </button>
  </div>
</header>

<div class="drawer-overlay" id="drawerOverlay" onclick="toggleDrawer()"></div>
<aside class="drawer" id="drawer">
  <div class="drawer-header">
    <span class="drawer-title">Menu</span>
    <button class="drawer-close" onclick="toggleDrawer()" aria-label="Tutup">
      <span class="material-symbols-outlined">close</span>
    </button>
  </div>
  <nav class="drawer-nav">
    <div class="drawer-subnav">
      <button class="drawer-link drawer-subnav-toggle" onclick="toggleDrawerSubnav(this)">
        <span class="material-symbols-outlined">home</span> Home
        <span class="material-symbols-outlined drawer-chevron">expand_more</span>
      </button>
      <div class="drawer-subnav-menu">
        <div>
          <a href="<?= $bn ?>index.php" class="drawer-subnav-link">Beranda</a>
          <a href="<?= $bn ?>akademik/jurusan.php" class="drawer-subnav-link">Jurusan</a>
          <a href="<?= $bn ?>informasi/berita.php" class="drawer-subnav-link">Berita</a>
          <a href="<?= $bn ?>informasi/pengumuman.php" class="drawer-subnav-link">Pengumuman</a>
          <a href="<?= $bn ?>tentang/alumni.php" class="drawer-subnav-link">Alumni</a>
          <a href="<?= $bn ?>pkl/index.php" class="drawer-subnav-link">PKL</a>
        </div>
      </div>
    </div>
    <div class="drawer-subnav">
      <button class="drawer-link drawer-subnav-toggle" onclick="toggleDrawerSubnav(this)">
        <span class="material-symbols-outlined">account_balance</span> Profil
        <span class="material-symbols-outlined drawer-chevron">expand_more</span>
      </button>
      <div class="drawer-subnav-menu">
        <div>
          <a href="<?= $bn ?>profil/profil.php" class="drawer-subnav-link">Profil</a>
          <a href="<?= $bn ?>profil/sejarah.php" class="drawer-subnav-link">Sejarah</a>
          <a href="<?= $bn ?>profil/visi-misi.php" class="drawer-subnav-link">Visi Misi</a>
          <a href="<?= $bn ?>profil/kepsek.php" class="drawer-subnav-link">Kepala Sekolah</a>
        </div>
      </div>
    </div>
    <div class="drawer-subnav">
      <button class="drawer-link drawer-subnav-toggle" onclick="toggleDrawerSubnav(this)">
        <span class="material-symbols-outlined">groups</span> Kesiswaan
        <span class="material-symbols-outlined drawer-chevron">expand_more</span>
      </button>
      <div class="drawer-subnav-menu">
        <div>
          <a href="<?= $bn ?>kesiswaan/kesiswaan.php" class="drawer-subnav-link">Kesiswaan</a>
          <a href="<?= $bn ?>kesiswaan/prestasi.php" class="drawer-subnav-link">Prestasi</a>
          <a href="<?= $bn ?>kesiswaan/ekstrakurikuler.php" class="drawer-subnav-link">Ekstrakurikuler</a>
        </div>
      </div>
    </div>
    <a href="<?= $bn ?>akademik/guru.php" class="drawer-link">
      <span class="material-symbols-outlined">school</span> Guru &amp; Staff
    </a>
    <a href="<?= $bn ?>galeri/galeri.php" class="drawer-link">
      <span class="material-symbols-outlined">photo_library</span> Galeri
    </a>
    <a href="<?= $bn ?>layanan/pengaduan.php" class="drawer-link">
      <span class="material-symbols-outlined">shield</span> Pengaduan
    </a>
    <a href="<?= $bn ?>layanan/ppdb.php" class="drawer-link">
      <span class="material-symbols-outlined">assignment_ind</span> PPDB
    </a>
  </nav>
</aside>
