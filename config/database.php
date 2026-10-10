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

        // 5. Seed Default User if table is empty
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
