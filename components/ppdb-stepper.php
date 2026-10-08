<?php
$cs = $currentStep ?? 1;
$stages = [
  1 => ['label' => 'Pengajuan Akun', 'link' => 'ppdb-aju-akun.php', 'icon' => 'person_add', 'date' => '3–12 Jun'],
  2 => ['label' => 'Verifikasi Akun', 'link' => 'ppdb-verifikasi.php', 'icon' => 'verified_user', 'date' => '4–13 Jun'],
  3 => ['label' => 'Aktivasi Akun', 'link' => 'ppdb-aktivasi.php', 'icon' => 'key', 'date' => '4–13 Jun'],
  4 => ['label' => 'Daftar Sekolah', 'link' => 'ppdb-daftar-sekolah.php', 'icon' => 'school', 'date' => '15–18 Jun'],
  5 => ['label' => 'Hasil Seleksi', 'link' => 'ppdb-hasil.php', 'icon' => 'campaign', 'date' => '21 Jun'],
  6 => ['label' => 'Daftar Ulang', 'link' => 'ppdb-daftar-ulang.php', 'icon' => 'how_to_reg', 'date' => '22–25 Jun'],
];
?>
<div class="pstepper">
  <a href="ppdb.php" class="pstepper-back" title="Kembali ke beranda PPDB">
    <span class="material-symbols-outlined">arrow_back</span>
  </a>
  <div class="pstepper-steps">
    <?php foreach ($stages as $num => $s): ?>
      <?php
      $isDone = $num < $cs;
      $isActive = $num == $cs;
      $isNext = $num > $cs;
      $cls = $isDone ? 'done' : ($isActive ? 'active' : '');
      ?>
      <a href="<?= $s['link'] ?>" class="pstepper-step <?= $cls ?>">
        <span class="pstepper-circle">
          <?php if ($isDone): ?>
            <span class="material-symbols-outlined">check</span>
          <?php else: ?>
            <span class="material-symbols-outlined"><?= $s['icon'] ?></span>
          <?php endif; ?>
        </span>
        <span class="pstepper-label"><?= $s['label'] ?></span>
        <span class="pstepper-date"><?= $s['date'] ?></span>
      </a>
      <?php if ($num < 6): ?>
        <span class="pstepper-line"></span>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>
