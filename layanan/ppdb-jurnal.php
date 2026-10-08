<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jurnal Seleksi | PPDB SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="stylesheet" href="../css/ppdb.css?v=4">
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <?php
  $jurusanList = ['RPL', 'Mesin', 'Tekstil', 'Ototronik'];
  $jalurList   = ['Domisili', 'Afirmasi', 'Prestasi'];

  $nama = [
    'Ahmad Fauzi', 'Budi Santoso', 'Citra Dewi', 'Dian Prasetyo', 'Eka Putri',
    'Fajar Rahman', 'Gita Permata', 'Hendra Gunawan', 'Indah Kusuma', 'Joko Susilo',
    'Kartika Sari', 'Lutfi Hakim', 'Maya Anggraini', 'Nanda Pratama', 'Oktavia Sari',
    'Putra Wijaya', 'Rina Marlina', 'Satria Nugraha', 'Tari Utami', 'Umar Hidayat',
    'Vina Rahmawati', 'Wahyu Saputra', 'Yoga Pratama', 'Zahra Aulia', 'Agus Wijaya',
    'Bella Safira', 'Candra Kusuma', 'Dewi Lestari', 'Eko Prasetyo', 'Fitri Handayani',
    'Gilang Ramadhan', 'Hana Safitri', 'Irfan Maulana', 'Jasmine Putri', 'Krisna Adi',
    'Laras Ayu', 'Miftahudin', 'Nadia Rahma', 'Oki Setiawan', 'Puspita Dewi',
  ];

  srand(crc32('smkn2krg-2026'));
  $peserta = [];
  for ($i = 0; $i < count($nama); $i++) {
    $skor = round(max(0, 100 - $i * 1.8 + (rand(-5, 5) / 10)), 2);
    $peserta[] = [
      'nisn'    => '00' . str_pad(1234 + $i * 199, 6, '0', STR_PAD_LEFT),
      'nama'    => $nama[$i],
      'jurusan' => $jurusanList[$i % 4],
      'jalur'   => $jalurList[$i % 3],
      'skor'    => $skor,
    ];
  }
  usort($peserta, function ($a, $b) { return $b['skor'] <=> $a['skor']; });
  foreach ($peserta as $i => &$p) $p['rank'] = $i + 1;
  unset($p);

  $currentNisn = isset($_GET['nisn']) ? htmlspecialchars($_GET['nisn']) : '';
  $currentRank = '';
  $currentSkor = '';
  $totalPeserta = count($peserta);
  if ($currentNisn) {
    foreach ($peserta as $p) {
      if ($p['nisn'] === $currentNisn) {
        $currentRank = $p['rank'];
        $currentSkor = $p['skor'];
        break;
      }
    }
  }
  ?>

  <main>
    <div class="ppdb-reg-wrapper">
      <?php $currentStep = 4; include '../components/ppdb-stepper.php'; ?>

      <div class="ppdb-reg-card">
        <div class="ppdb-card-header">
          <h2>Jurnal Seleksi</h2>
          <p>Pantau peringkat kamu secara langsung</p>
        </div>

        <div class="ppdb-alert ppdb-alert-info">
          <span class="material-symbols-outlined">monitoring</span>
          <span>
            Jurnal ini menampilkan peringkat semua pendaftar secara <strong>real-time</strong>.
            Posisi dapat berubah setiap ada peserta baru mendaftar dengan skor lebih tinggi.
            Pantau secara berkala selama masa pendaftaran masih dibuka.
          </span>
        </div>

        <?php if ($currentNisn): ?>
        <div class="ppdb-jurnal-ringkasan">
          <div class="ppdb-jurnal-ringkasan-item">
            <span class="ppdb-jurnal-ringkasan-label">NISN</span>
            <span class="ppdb-jurnal-ringkasan-value"><?= $currentNisn ?></span>
          </div>
          <div class="ppdb-jurnal-ringkasan-item">
            <span class="ppdb-jurnal-ringkasan-label">Peringkat</span>
            <span class="ppdb-jurnal-ringkasan-value"><?= $currentRank ?: '-' ?></span>
          </div>
          <div class="ppdb-jurnal-ringkasan-item">
            <span class="ppdb-jurnal-ringkasan-label">Skor</span>
            <span class="ppdb-jurnal-ringkasan-value"><?= $currentSkor ?: '-' ?></span>
          </div>
          <div class="ppdb-jurnal-ringkasan-item">
            <span class="ppdb-jurnal-ringkasan-label">Total Peserta</span>
            <span class="ppdb-jurnal-ringkasan-value"><?= $totalPeserta ?></span>
          </div>
        </div>

        <?php if ($currentRank && $currentRank <= 18): ?>
        <div class="ppdb-alert ppdb-alert-success">
          <span class="material-symbols-outlined">check_circle</span>
          <span>Kamu berada di <strong>zona aman</strong> (peringkat <?= $currentRank ?> dari <?= $totalPeserta ?> peserta). Pantau terus jurnal ini.</span>
        </div>
        <?php elseif ($currentRank && $currentRank <= 25): ?>
        <div class="ppdb-alert ppdb-alert-warning">
          <span class="material-symbols-outlined">warning</span>
          <span>Kamu berada di <strong>zona waspada</strong> (peringkat <?= $currentRank ?> dari <?= $totalPeserta ?> peserta). Posisi kamu rawan tergeser.</span>
        </div>
        <?php elseif ($currentRank): ?>
        <div class="ppdb-alert ppdb-alert-error">
          <span class="material-symbols-outlined">error</span>
          <span>Kamu berada di <strong>zona merah</strong> (peringkat <?= $currentRank ?> dari <?= $totalPeserta ?> peserta). Pertimbangkan untuk mengubah pilihan sekolah.</span>
        </div>
        <?php endif; ?>
        <?php endif; ?>

        <!-- Cari NISN -->
        <div class="ppdb-jurnal-cari">
          <div class="ppdb-jurnal-cari-box">
            <span class="material-symbols-outlined">badge</span>
            <input type="text" id="cariNisnJurnal" class="ppdb-input" placeholder="Cari NISN kamu" value="<?= $currentNisn ?>" style="border:none;box-shadow:none;">
            <button class="ppdb-btn ppdb-btn-primary" onclick="cariJurnal()">
              <span class="material-symbols-outlined">search</span>
              Cari
            </button>
          </div>
          <p class="ppdb-jurnal-cari-hint">Masukkan NISN untuk mengetahui posisi peringkat kamu.</p>
        </div>

        <!-- Tabel Peringkat -->
        <div class="ppdb-jurnal-table-wrap">
          <table class="ppdb-jurnal-table">
            <thead>
              <tr>
                <th>#</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Jalur</th>
                <th>Skor</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($peserta as $p):
                $highlight = $currentNisn && $p['nisn'] === $currentNisn;
              ?>
              <tr class="<?= $highlight ? 'jurnal-highlight' : '' ?>">
                <td><?= $p['rank'] ?></td>
                <td class="jurnal-nisn"><?= substr($p['nisn'], 0, 5) . '•••' ?></td>
                <td><?= $highlight ? '<strong>' . $p['nama'] . '</strong>' : $p['nama'] ?></td>
                <td><?= $p['jurusan'] ?></td>
                <td><?= $p['jalur'] ?></td>
                <td class="jurnal-skor"><?= number_format($p['skor'], 2) ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="ppdb-jurnal-footer">
          <a href="ppdb-hasil.php" class="ppdb-btn ppdb-btn-primary ppdb-btn-lg">
            <span class="material-symbols-outlined">campaign</span>
            Lihat Hasil Seleksi
          </a>
          <p class="ppdb-jurnal-cari-hint" style="margin:0.75rem 0 0;">Hasil seleksi final akan diumumkan pada <strong>21 Juni 2026</strong>.</p>
        </div>
      </div>
    </div>
  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/ppdb.js?v=2"></script>
  <script>
  function cariJurnal() {
    var nisn = document.getElementById('cariNisnJurnal').value.trim();
    if (!nisn) {
      alert('Masukkan NISN.');
      return;
    }
    location.href = 'ppdb-jurnal.php?nisn=' + encodeURIComponent(nisn);
  }
  </script>
</body>
</html>
