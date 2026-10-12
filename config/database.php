<?php
/**
 * Database Configuration & Initialization
 * SMKN 2 Karanganyar Web Management System
 */

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_smkn2kra');
define('DB_CHARSET', 'utf8mb4');

function getDbConnection() {
    static $pdo = null;
    if ($pdo !== null) {
        return $pdo;
    }

    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        // If database does not exist, initialize it
        if ($e->getCode() == 1049) {
            initDatabase();
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } else {
            throw $e;
        }
    }

    return $pdo;
}

function initDatabase() {
    try {
        $rootPdo = new PDO("mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        
        // 1. Create Database
        $rootPdo->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        $rootPdo->exec("USE `" . DB_NAME . "`");

        // 2. Table: users / admin
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `users` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `username` VARCHAR(50) NOT NULL UNIQUE,
            `password` VARCHAR(255) NOT NULL,
            `nama_lengkap` VARCHAR(100) NOT NULL,
            `email` VARCHAR(100) NOT NULL UNIQUE,
            `foto` VARCHAR(255) DEFAULT 'assets/images/avatar.png',
            `role` VARCHAR(20) DEFAULT 'admin',
            `last_login` DATETIME NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 3. Table: hero_banners
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `hero_banners` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `judul` VARCHAR(255) NOT NULL,
            `tagline` VARCHAR(100) DEFAULT NULL,
            `deskripsi` TEXT NOT NULL,
            `gambar` VARCHAR(500) NOT NULL,
            `tombol1_teks` VARCHAR(100) DEFAULT NULL,
            `tombol1_link` VARCHAR(255) DEFAULT NULL,
            `tombol2_teks` VARCHAR(100) DEFAULT NULL,
            `tombol2_link` VARCHAR(255) DEFAULT NULL,
            `urutan` INT DEFAULT 1,
            `status` ENUM('Aktif', 'Nonaktif') DEFAULT 'Aktif',
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 4. Table: cta_banners
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `cta_banners` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `judul` VARCHAR(255) NOT NULL,
            `deskripsi` TEXT NOT NULL,
            `tombol1_teks` VARCHAR(100) DEFAULT NULL,
            `tombol1_link` VARCHAR(255) DEFAULT NULL,
            `tombol2_teks` VARCHAR(100) DEFAULT NULL,
            `tombol2_link` VARCHAR(255) DEFAULT NULL,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 5. Table: statistik_sekolah
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `statistik_sekolah` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `kode` VARCHAR(50) DEFAULT NULL UNIQUE,
            `label` VARCHAR(100) NOT NULL,
            `nilai` VARCHAR(50) NOT NULL,
            `keterangan` VARCHAR(255) DEFAULT NULL,
            `icon` VARCHAR(50) DEFAULT NULL,
            `urutan` INT DEFAULT 1,
            `status` ENUM('Aktif', 'Nonaktif') DEFAULT 'Aktif',
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 6. Table: jurusan
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `jurusan` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `kode` VARCHAR(20) NOT NULL,
            `nama` VARCHAR(150) NOT NULL,
            `singkatan` VARCHAR(50) DEFAULT NULL,
            `slug` VARCHAR(100) DEFAULT NULL,
            `akreditasi` VARCHAR(10) DEFAULT 'A',
            `kaprodi` VARCHAR(100) DEFAULT NULL,
            `kuota` VARCHAR(100) DEFAULT '72 Siswa (2 Rombel)',
            `deskripsi` TEXT DEFAULT NULL,
            `kompetensi` TEXT DEFAULT NULL,
            `gambar` VARCHAR(500) DEFAULT NULL,
            `warna` VARCHAR(30) DEFAULT '#22c55e',
            `warna_aksen` VARCHAR(20) DEFAULT NULL,
            `prospek_karir` TEXT DEFAULT NULL,
            `keunggulan` TEXT DEFAULT NULL,
            `status` ENUM('Aktif', 'Nonaktif') DEFAULT 'Aktif',
            `urutan` INT DEFAULT 1,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 7. Table: testimoni
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `testimoni` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `nama` VARCHAR(100) NOT NULL,
            `jurusan` VARCHAR(100) DEFAULT NULL,
            `tahun_lulus` INT DEFAULT NULL,
            `jurusan_tahun` VARCHAR(100) DEFAULT NULL,
            `pekerjaan` VARCHAR(150) DEFAULT NULL,
            `profesi` VARCHAR(150) DEFAULT NULL,
            `perusahaan` VARCHAR(150) DEFAULT NULL,
            `testimoni` TEXT NOT NULL,
            `foto` VARCHAR(500) DEFAULT NULL,
            `rating` INT DEFAULT 5,
            `status` ENUM('Aktif', 'Nonaktif') DEFAULT 'Aktif',
            `tampil_landing` TINYINT DEFAULT 1,
            `urutan` INT DEFAULT 1,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 8. Table: mitra_industri
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `mitra_industri` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `nama_perusahaan` VARCHAR(150) DEFAULT NULL,
            `nama_mitra` VARCHAR(150) DEFAULT NULL,
            `bidang_usaha` VARCHAR(100) DEFAULT NULL,
            `bidang_industri` VARCHAR(100) DEFAULT NULL,
            `jurusan_terkait` VARCHAR(100) DEFAULT 'Semua Jurusan',
            `kuota_pkl` INT DEFAULT 25,
            `mou_mulai` DATE DEFAULT NULL,
            `mou_selesai` DATE DEFAULT NULL,
            `kerjasama` VARCHAR(255) DEFAULT NULL,
            `logo` VARCHAR(500) DEFAULT NULL,
            `website` VARCHAR(255) DEFAULT NULL,
            `alamat` TEXT DEFAULT NULL,
            `status` ENUM('Aktif', 'Nonaktif') DEFAULT 'Aktif',
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 9. Table: guru_staff
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `guru_staff` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `nip` VARCHAR(50) DEFAULT NULL,
            `bidang_studi` VARCHAR(150) DEFAULT NULL,
            `nama` VARCHAR(150) NOT NULL,
            `jenis_kelamin` ENUM('Laki-laki', 'Perempuan') DEFAULT 'Laki-laki',
            `jabatan` VARCHAR(100) DEFAULT NULL,
            `pendidikan_terakhir` VARCHAR(50) DEFAULT 'S1 Pendidikan',
            `status_kepegawaian` VARCHAR(50) DEFAULT 'PNS',
            `email` VARCHAR(100) DEFAULT NULL,
            `kompetensi` VARCHAR(100) DEFAULT NULL,
            `mata_pelajaran` VARCHAR(255) DEFAULT NULL,
            `foto` VARCHAR(500) DEFAULT 'assets/images/avatar.png',
            `status` ENUM('Aktif', 'Nonaktif') DEFAULT 'Aktif',
            `kategori` VARCHAR(50) DEFAULT 'Guru',
            `urutan` INT DEFAULT 1,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 10. Table: prestasi
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `prestasi` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `judul` VARCHAR(255) DEFAULT NULL,
            `nama_lomba` VARCHAR(255) DEFAULT NULL,
            `tingkat` VARCHAR(50) DEFAULT 'Provinsi',
            `peringkat` VARCHAR(100) DEFAULT 'Juara 1',
            `nama_peraih` VARCHAR(150) DEFAULT NULL,
            `nama_siswa` VARCHAR(150) DEFAULT NULL,
            `kelas_jurusan` VARCHAR(50) DEFAULT NULL,
            `kelas` VARCHAR(50) DEFAULT NULL,
            `tahun` VARCHAR(10) DEFAULT '2026',
            `penyelenggara` VARCHAR(150) DEFAULT 'Kemendikbudristek',
            `foto` VARCHAR(500) DEFAULT NULL,
            `status` ENUM('Publikasi', 'Draf') DEFAULT 'Publikasi',
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 11. Table: ekstrakurikuler
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `ekstrakurikuler` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `nama_ekskul` VARCHAR(100) DEFAULT NULL,
            `nama` VARCHAR(100) DEFAULT NULL,
            `kategori` VARCHAR(50) DEFAULT 'Umum',
            `deskripsi` TEXT DEFAULT NULL,
            `pembina` VARCHAR(100) DEFAULT NULL,
            `jumlah_anggota` VARCHAR(50) DEFAULT '35 Siswa',
            `hari_jadwal` VARCHAR(100) DEFAULT 'Sabtu',
            `jadwal` VARCHAR(100) DEFAULT 'Sabtu',
            `icon` VARCHAR(50) DEFAULT 'bi-stars',
            `warna_bg` VARCHAR(20) DEFAULT NULL,
            `warna_teks` VARCHAR(20) DEFAULT NULL,
            `foto` VARCHAR(500) DEFAULT NULL,
            `status` ENUM('Aktif', 'Nonaktif') DEFAULT 'Aktif',
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 12. Table: galeri
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `galeri` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `judul` VARCHAR(255) NOT NULL,
            `kategori` VARCHAR(50) NOT NULL,
            `gambar` VARCHAR(500) NOT NULL,
            `deskripsi` TEXT DEFAULT NULL,
            `tanggal` DATE NOT NULL,
            `tampil_landing` TINYINT(1) DEFAULT 1,
            `status` ENUM('Aktif', 'Nonaktif') DEFAULT 'Aktif',
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 13. Table: pengaduan
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `pengaduan` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `no_tiket` VARCHAR(50) DEFAULT NULL,
            `nama_pelapor` VARCHAR(100) NOT NULL,
            `email_pelapor` VARCHAR(100) NOT NULL,
            `no_telepon` VARCHAR(30) DEFAULT NULL,
            `no_hp` VARCHAR(30) DEFAULT NULL,
            `kategori` VARCHAR(50) NOT NULL,
            `subjek` VARCHAR(255) NOT NULL,
            `isi_pengaduan` TEXT NOT NULL,
            `status` VARCHAR(50) DEFAULT 'Menunggu Respon',
            `tanggapan` TEXT DEFAULT NULL,
            `tanggal_lapor` DATETIME DEFAULT CURRENT_TIMESTAMP,
            `tanggal_selesai` DATETIME DEFAULT NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 14. Table: ppdb_pendaftar
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `ppdb_pendaftar` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `no_pendaftaran` VARCHAR(50) NOT NULL,
            `nama_lengkap` VARCHAR(150) NOT NULL,
            `nisn` VARCHAR(30) NOT NULL,
            `asal_sekolah` VARCHAR(150) NOT NULL,
            `nilai_rata_rata` DECIMAL(5,2) DEFAULT 0.00,
            `pilihan_jurusan` VARCHAR(100) NOT NULL,
            `jalur_pendaftaran` VARCHAR(50) NOT NULL,
            `no_hp` VARCHAR(30) NOT NULL,
            `email` VARCHAR(100) DEFAULT NULL,
            `alamat` TEXT NOT NULL,
            `status` VARCHAR(50) DEFAULT 'Menunggu Verifikasi',
            `status_verifikasi` VARCHAR(50) DEFAULT 'Menunggu Berkas',
            `status_berkas` VARCHAR(50) DEFAULT 'Menunggu Verifikasi',
            `catatan` TEXT DEFAULT NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 15. Table: berita
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `berita` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `judul` VARCHAR(255) NOT NULL,
            `slug` VARCHAR(255) NOT NULL,
            `kategori` VARCHAR(50) NOT NULL,
            `ringkasan` TEXT NOT NULL,
            `konten` LONGTEXT NOT NULL,
            `gambar` VARCHAR(500) NOT NULL,
            `penulis` VARCHAR(100) DEFAULT 'Admin Humas',
            `tanggal` DATE NOT NULL,
            `tampil_landing` VARCHAR(20) DEFAULT '1',
            `status` VARCHAR(50) DEFAULT 'Publikasi',
            `views` INT DEFAULT 0,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 16. Table: pengumuman
        $rootPdo->exec("CREATE TABLE IF NOT EXISTS `pengumuman` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `judul` VARCHAR(255) NOT NULL,
            `slug` VARCHAR(255) NOT NULL,
            `nomor_surat` VARCHAR(100) DEFAULT NULL,
            `kategori` VARCHAR(50) NOT NULL,
            `ringkasan` TEXT NOT NULL,
            `isi` LONGTEXT NOT NULL,
            `file_lampiran` VARCHAR(500) DEFAULT NULL,
            `tanggal` DATE NOT NULL,
            `status` ENUM('Aktif', 'Nonaktif') DEFAULT 'Aktif',
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // 17. Seed Default User if table is empty
        $checkUser = $rootPdo->query("SELECT COUNT(*) FROM `users`")->fetchColumn();
        if ($checkUser == 0) {
            $defaultPassword = password_hash('admin123', PASSWORD_DEFAULT);
            $stmt = $rootPdo->prepare("INSERT INTO `users` (username, password, nama_lengkap, email, role) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute(['admin', $defaultPassword, 'Administrator Utama', 'admin@smkn2kra.sch.id', 'admin']);
        }

        // 6. Seed Default Hero Banners if table is empty
        $checkBanner = $rootPdo->query("SELECT COUNT(*) FROM `hero_banners`")->fetchColumn();
        if ($checkBanner == 0) {
            $stmt = $rootPdo->prepare("INSERT INTO `hero_banners` (judul, tagline, deskripsi, gambar, tombol1_teks, tombol1_link, tombol2_teks, tombol2_link, urutan, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            $stmt->execute([
                'Pusat Unggulan Pendidikan Vokasi',
                'Growth & Precision',
                'Membentuk tenaga kerja profesional, kompeten, dan siap bersaing di era industri global melalui kurikulum berbasis teknologi.',
                'images/gedung.jpg',
                'Explore Programs',
                '#program',
                'About Us',
                '#profil',
                1,
                'Aktif'
            ]);

            $stmt->execute([
                'Pembelajaran Berbasis Industri',
                'Link & Match',
                'Kurikulum yang dirancang bersama mitra industri terkemuka untuk memastikan lulusan siap kerja dan berdaya saing global.',
                'images/gedung.jpg',
                'Lihat Program',
                '#program',
                'Mitra Industri',
                '#mitra',
                2,
                'Aktif'
            ]);

            $stmt->execute([
                'Raih Prestasi Bersama Kami',
                'Prestasi Siswa',
                'Bergabunglah dengan ribuan siswa berprestasi yang telah mengharumkan nama sekolah di kancah nasional dan internasional.',
                'images/gedung.jpg',
                'Daftar SPMB',
                '#spmb',
                'Galeri Prestasi',
                '#prestasi',
                3,
                'Aktif'
            ]);
        }

        // 7. Seed Default CTA Banner if empty
        $checkCta = $rootPdo->query("SELECT COUNT(*) FROM `cta_banners`")->fetchColumn();
        if ($checkCta == 0) {
            $stmt = $rootPdo->prepare("INSERT INTO `cta_banners` (judul, deskripsi, tombol1_teks, tombol1_link, tombol2_teks, tombol2_link) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                'Siap Meniti Karir Masa Depan?',
                'Daftarkan diri Anda sekarang dan bergabunglah dengan ribuan alumni sukses yang telah berkarir di berbagai industri nasional dan internasional.',
                'Daftar SPMB 2026/2027',
                'layanan/ppdb.php',
                'Download Brosur',
                'assets/brosur-smkn2kra.pdf'
            ]);
        }

        return true;
    } catch (PDOException $e) {
        throw new Exception("Gagal inisialisasi database: " . $e->getMessage());
    }
}
