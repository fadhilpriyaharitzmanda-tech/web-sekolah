<?php
require_once __DIR__ . '/../config/database.php';
$alumniList = [];
try {
    $pdo = getDbConnection();
    $stmt = $pdo->query("SELECT * FROM testimoni WHERE status = 'Aktif' ORDER BY urutan ASC, id DESC");
    $alumniList = $stmt->fetchAll();
} catch (Exception $e) {
    //
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alumni | SMKN 2 Karanganyar</title>
  <!-- Favicon Logo SMKN 2 Karanganyar -->
  <link rel="icon" type="image/png" href="../logo/smkn2kra.png">
  <link rel="shortcut icon" href="../logo/smkn2kra.png">
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <style>
    .container {
      font-family: 'Inter', sans-serif;
    }

    .alumni-hero {
      padding: 8rem 0 3rem;
      text-align: center;
      background: linear-gradient(180deg, var(--surface) 0%, rgba(34,197,94,0.04) 100%);
    }
    .alumni-hero h1 {
      font-family: var(--font-heading);
      font-size: 2.25rem;
      font-weight: 800;
      color: var(--primary-dark);
      margin-bottom: 0.5rem;
    }
    .alumni-hero p {
      color: var(--secondary);
      font-size: 1rem;
    }

    .alumni-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 1.5rem;
      padding: 3rem 0 5rem;
    }
    .alumni-card {
      background: #fff;
      border-radius: 16px;
      padding: 2rem 1.5rem;
      border: 1px solid #eef5ee;
      box-shadow: 0 4px 16px rgba(0,0,0,0.02);
      text-align: left;
      transition: all 0.25s;
    }
    .alumni-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 32px rgba(0,110,47,0.06);
      border-color: rgba(34,197,94,0.15);
    }
    .alumni-header {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1rem;
    }
    .alumni-header img {
      width: 72px;
      height: 72px;
      border-radius: 50%;
      object-fit: cover;
      flex-shrink: 0;
    }
    .alumni-info h3 {
      margin: 0 0 0.25rem;
    }
    .alumni-info .angkatan {
      margin: 0;
    }
    .alumni-card h3 {
      font-size: 1.05rem;
      font-weight: 700;
      margin: 0 0 0.25rem;
      color: var(--on-surface);
    }
    .alumni-card .angkatan {
      font-size: 0.8rem;
      color: var(--primary-dark);
      font-weight: 600;
      background: rgba(34,197,94,0.08);
      display: inline-block;
      padding: 0.2rem 0.75rem;
      border-radius: 999px;
      margin-bottom: 0.75rem;
    }
    .alumni-card .posisi {
      font-size: 0.85rem;
      color: var(--secondary);
      margin-bottom: 0.75rem;
    }
    .alumni-card .testi {
      font-size: 0.875rem;
      color: var(--on-surface-variant);
      line-height: 1.6;
      font-style: italic;
      border-top: 1px solid #eef5ee;
      padding-top: 0.75rem;
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>
    <section class="alumni-hero">
      <div class="container">
        <h1>ALUMNI SMKN 2 KARANGANYAR</h1>
        <p>Mereka yang telah menempuh perjalanan dan kini sukses di berbagai bidang. Inspirasi bagi generasi berikutnya.</p>
      </div>
    </section>

    <section class="container">
      <div class="alumni-grid" data-animate>
        <?php if (!empty($alumniList)): ?>
          <?php foreach ($alumniList as $a): 
            $fotoUrl = !empty($a['foto']) ? (str_starts_with($a['foto'], 'http') ? $a['foto'] : '../' . $a['foto']) : 'https://ui-avatars.com/api/?name=' . urlencode($a['nama']) . '&background=4ade80&color=fff&size=80';
            $pekerjaan = !empty($a['profesi']) ? $a['profesi'] . (!empty($a['perusahaan']) ? ' di ' . $a['perusahaan'] : '') : ($a['pekerjaan'] ?? ($a['perusahaan'] ?? ''));
            $jurusanTeks = !empty($a['jurusan']) ? $a['jurusan'] : (!empty($a['jurusan_tahun']) ? $a['jurusan_tahun'] : 'Alumni');
            $tahunTeks = !empty($a['tahun_lulus']) ? ' - ' . $a['tahun_lulus'] : '';
          ?>
            <div class="alumni-card">
              <div class="alumni-header">
                <img src="<?= htmlspecialchars($fotoUrl) ?>" alt="<?= htmlspecialchars($a['nama'] ?? '') ?>">
                <div class="alumni-info">
                  <h3><?= htmlspecialchars($a['nama'] ?? '') ?></h3>
                  <span class="angkatan"><?= htmlspecialchars($jurusanTeks . $tahunTeks) ?></span>
                </div>
              </div>
              <?php if (!empty($pekerjaan)): ?>
                <p class="posisi"><?= htmlspecialchars($pekerjaan) ?></p>
              <?php endif; ?>
              <p class="testi">"<?= htmlspecialchars($a['testimoni'] ?? '') ?>"</p>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="alumni-card">
            <div class="alumni-header">
              <img src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=4ade80&color=fff&size=80" alt="Ahmad Fauzi">
              <div class="alumni-info">
                <h3>Ahmad Fauzi</h3>
                <span class="angkatan">RPL - 2020</span>
              </div>
            </div>
            <p class="posisi">Fullstack Developer di PT. Tech Innovasi</p>
            <p class="testi">"Ilmu yang saya dapat di SMKN 2 Karanganyar benar-benar menjadi fondasi karir saya di dunia teknologi."</p>
          </div>
        <?php endif; ?>
      </div>
    </section>
  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/tentang.js?v=1"></script>
  <script>initPage();</script>
</body>
</html>
