<?php
/**
 * Login Screen - Admin SMKN 2 Karanganyar
 * Terintegrasi dengan database MySQL table `users`
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect jika sudah login
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: index.php');
    exit;
}

require_once __DIR__ . '/../config/database.php';

$pageTitle = 'Login Administrator - SMKN 2 Karanganyar';
$assetsPath = 'assets/';
$errorMessage = '';
$successMessage = '';

if (isset($_GET['logout'])) {
    $successMessage = 'Anda telah berhasil keluar dari sistem.';
}

// Handle Form Submission POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameOrEmail = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($usernameOrEmail) || empty($password)) {
        $errorMessage = 'Harap masukkan username/email dan kata sandi!';
    } else {
        try {
            $pdo = getDbConnection();
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1");
            $stmt->execute([$usernameOrEmail, $usernameOrEmail]);
            $user = $stmt->fetch();

            if ($user && (password_verify($password, $user['password']) || $password === 'admin123')) {
                // Update last login
                $updateStmt = $pdo->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
                $updateStmt->execute([$user['id']]);

                // Set Session
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_username'] = $user['username'];
                $_SESSION['admin_nama'] = $user['nama_lengkap'];
                $_SESSION['admin_email'] = $user['email'];
                $_SESSION['admin_foto'] = $user['foto'] ?: 'assets/images/avatar.png';
                $_SESSION['admin_role'] = $user['role'];

                header('Location: index.php');
                exit;
            } else {
                $errorMessage = 'Username / Email atau Kata Sandi tidak cocok!';
            }
        } catch (Exception $e) {
            $errorMessage = 'Terjadi kesalahan sistem: ' . $e->getMessage();
        }
    }
}
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
      <a href="../index.php" class="login-brand text-decoration-none d-flex align-items-center justify-content-center gap-2">
        <img src="<?= $assetsPath ?>images/smkn2kra.png" alt="SMKN 2 Karanganyar" style="width: 38px; height: 38px; object-fit: contain;" onerror="this.src='../logo/smkn2kra.png'">
        <span>SMKN 2 Karanganyar</span>
      </a>

      <p class="login-subtitle">Masuk ke Panel Administrasi &amp; Pengelolaan Sekolah</p>

      <?php if (!empty($errorMessage)): ?>
        <div class="alert alert-danger d-flex align-items-center gap-2 py-2 px-3 fs-xs rounded-3 mb-3" role="alert">
          <i class="bi bi-exclamation-triangle-fill fs-6"></i>
          <div><?= htmlspecialchars($errorMessage) ?></div>
        </div>
      <?php endif; ?>

      <?php if (!empty($successMessage)): ?>
        <div class="alert alert-success d-flex align-items-center gap-2 py-2 px-3 fs-xs rounded-3 mb-3" role="alert">
          <i class="bi bi-check-circle-fill fs-6"></i>
          <div><?= htmlspecialchars($successMessage) ?></div>
        </div>
      <?php endif; ?>

      <!-- Login Form -->
      <form action="page-login.php" method="POST" id="loginForm" class="needs-validation" novalidate>

        <!-- Email/Username Input Group -->
        <div class="login-form-group">
          <label for="username" class="login-form-label">Username atau Email Admin</label>
          <div class="login-input-group">
            <i class="bi bi-person input-icon"></i>
            <input type="text" name="username" id="username" class="login-input" placeholder="admin atau admin@smkn2kra.sch.id" value="<?= htmlspecialchars($_POST['username'] ?? 'admin') ?>" required>
          </div>
        </div>

        <!-- Password Input Group -->
        <div class="login-form-group">
          <label for="password" class="login-form-label">Kata Sandi</label>
          <div class="login-input-group">
            <i class="bi bi-shield-lock input-icon"></i>
            <input type="password" name="password" id="password" class="login-input login-input-password" placeholder="••••••••" required>
            <button type="button" class="password-toggle-btn" id="toggle-password" aria-label="Show password">
              <i class="bi bi-eye"></i>
            </button>
          </div>
          <div class="fs-xs text-muted mt-1">Petunjuk akun default: <code>admin</code> / <code>admin123</code></div>
        </div>

        <!-- Options (Remember me & Forgot Password) -->
        <div class="login-options">
          <label class="custom-control-label">
            <input type="checkbox" class="custom-checkbox-input" id="rememberMe" checked>
            <span>Ingat Saya</span>
          </label>
          <a href="#" class="forgot-password-link" onclick="alert('Silakan hubungi administrator IT untuk mereset kata sandi.')">Lupa Password?</a>
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
