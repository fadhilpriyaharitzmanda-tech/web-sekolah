<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visi &amp; Misi | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <style>
    .container {
      font-family: 'Inter', sans-serif;
    }

    .page-hero {
      padding: 8rem 0 3rem;
      text-align: center;
      background: linear-gradient(180deg, var(--surface) 0%, rgba(34,197,94,0.04) 100%);
    }
    .page-hero h1 {
      font-family: var(--font-heading);
      font-size: 2.25rem;
      font-weight: 800;
      color: var(--primary-dark);
      margin-bottom: 0.5rem;
    }
    .page-hero p {
      color: var(--secondary);
      font-size: 1rem;
    }
    .page-box {
      max-width: 48rem;
      margin: 2rem auto 4rem;
      background: #fff;
      border-radius: 20px;
      padding: 2.5rem;
      box-shadow: 0 4px 20px rgba(0,0,0,0.04);
      border: 1px solid #e8f0e8;
    }
    .vm-visi {
      background: var(--primary-dark);
      color: #fff;
      padding: 2rem;
      border-radius: 16px;
      margin-bottom: 2rem;
    }
    .vm-visi h3 {
      font-family: var(--font-heading);
      font-size: 1.25rem;
      font-weight: 700;
      margin-bottom: 0.75rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .vm-visi p {
      color: rgba(255,255,255,0.9);
      font-style: italic;
      font-size: 1.05rem;
      line-height: 1.7;
      margin: 0;
    }
    .vm-misi-title {
      font-family: var(--font-heading);
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--primary-dark);
      margin-bottom: 1.25rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .vm-list {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    .vm-item {
      display: flex;
      gap: 1rem;
      padding: 1.25rem;
      background: var(--surface);
      border-radius: 12px;
      border: 1px solid #e8f0e8;
    }
    .vm-item-icon {
      color: var(--primary);
      font-size: 1.5rem;
      flex-shrink: 0;
      margin-top: 2px;
    }
    .vm-item h4 {
      font-family: var(--font-heading);
      font-size: 0.95rem;
      font-weight: 700;
      color: var(--on-surface);
      margin-bottom: 0.25rem;
    }
    .vm-item p {
      color: var(--secondary);
      font-size: 0.85rem;
      line-height: 1.5;
      margin: 0;
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>
    <section class="page-hero">
      <div class="container">
        <h1>VISI &amp; MISI</h1>
        <p>Fondasi utama dalam setiap langkah transformasi kami</p>
      </div>
    </section>

    <section class="container fade-in">
      <div class="page-box" data-animate>
        <div class="vm-visi">
          <h3>
            <span class="material-symbols-outlined icon-fill">visibility</span>
            VISI
          </h3>
          <p>&ldquo;Menjadi lembaga pendidikan kejuruan yang religius, unggul dalam prestasi, dan berwawasan lingkungan menuju persaingan global.&rdquo;</p>
        </div>

        <div class="vm-misi-title">
          <span class="material-symbols-outlined icon-fill">rocket_launch</span>
          MISI KAMI
        </div>
        <div class="vm-list">
          <div class="vm-item">
            <span class="material-symbols-outlined vm-item-icon">check_circle</span>
            <div>
              <h4>Keimanan &amp; Ketakwaan</h4>
              <p>Menumbuhkembangkan keimanan dan ketaqwaan kepada Tuhan Yang Maha Esa.</p>
            </div>
          </div>
          <div class="vm-item">
            <span class="material-symbols-outlined vm-item-icon">check_circle</span>
            <div>
              <h4>Mutu Pendidikan</h4>
              <p>Meningkatkan mutu pendidikan yang berorientasi pada kebutuhan pasar kerja.</p>
            </div>
          </div>
          <div class="vm-item">
            <span class="material-symbols-outlined vm-item-icon">check_circle</span>
            <div>
              <h4>Lingkungan Asri</h4>
              <p>Mewujudkan lingkungan sekolah yang bersih, sehat, dan asri.</p>
            </div>
          </div>
          <div class="vm-item">
            <span class="material-symbols-outlined vm-item-icon">check_circle</span>
            <div>
              <h4>Kemitraan Strategis</h4>
              <p>Membangun kemitraan strategis dengan Dunia Usaha dan Dunia Industri (DUDI).</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/profil.js?v=1"></script>
  <script>initPage();</script>
</body>
</html>
