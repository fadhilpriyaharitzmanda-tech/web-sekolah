<?php
/**
 * Footer Component - Admin SMKN 2 Karanganyar
 * Footer information, closes layout containers, and loads script dependencies.
 */
$assetsPath = $assetsPath ?? 'assets/';
$loadDashboardJs = $loadDashboardJs ?? true;
?>
    <!-- START: Footer Component -->
    <footer class="footer-custom">
      <div class="footer-left">
        <span class="footer-logo d-flex align-items-center gap-2">
          <img src="<?= $assetsPath ?>images/smkn2kra.png" alt="SMKN 2 Kra" style="width: 20px; height: 20px; object-fit: contain;" onerror="this.src='../logo/smkn2kra.png'"> SMKN 2 Karanganyar
        </span>
        <span class="footer-separator">|</span>
        <span class="footer-copy">&copy; <?= date('Y') ?> Panel Administrasi Sekolah &bull; All Rights Reserved</span>
      </div>
      <div class="footer-right">
        <ul class="footer-links">
          <li><a href="index.php" class="footer-link">Dashboard</a></li>
          <li><a href="../index.php" target="_blank" class="footer-link">Website Sekolah</a></li>
          <li><a href="#" class="footer-link">Bantuan</a></li>
          <li><a href="#" class="footer-link">Status Sistem <span class="status-dot"></span></a></li>
        </ul>
      </div>
    </footer>
    <!-- END: Footer Component -->

  </div>
  <!-- ==========================================
       END: Main Content Area (.main-wrapper)
       ========================================== -->

  <!-- Local Third-Party Libraries Script dependencies -->
  <script src="<?= $assetsPath ?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= $assetsPath ?>libs/apexcharts/apexcharts.min.js"></script>
  <script src="<?= $assetsPath ?>libs/flatpickr/flatpickr.min.js"></script>

  <!-- Local dashboard interactions controller -->
  <?php if ($loadDashboardJs): ?>
  <script src="<?= $assetsPath ?>js/dashboard.js"></script>
  <?php endif; ?>

  <?php if (!empty($extraJs)): ?>
    <?= $extraJs ?>
  <?php endif; ?>
</body>

</html>
