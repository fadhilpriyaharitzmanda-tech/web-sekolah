<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alumni | SMKN 2 Karanganyar</title>
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
        <div class="alumni-card">
          <div class="alumni-header">
            <img src="https://ui-avatars.com/api/?name=Dewi+Sartika&background=60a5fa&color=fff&size=80" alt="Dewi Sartika">
            <div class="alumni-info">
              <h3>Dewi Sartika</h3>
              <span class="angkatan">M - 2019</span>
            </div>
          </div>
          <p class="posisi">Teknisi Mesin CNC di PT. Astra Honda</p>
          <p class="testi">"Praktik langsung dengan mesin industri membuat saya tidak kaget saat terjun ke dunia kerja."</p>
        </div>
        <div class="alumni-card">
          <div class="alumni-header">
            <img src="https://ui-avatars.com/api/?name=Rizky+Ramadhan&background=fb923c&color=fff&size=80" alt="Rizky Ramadhan">
            <div class="alumni-info">
              <h3>Rizky Ramadhan</h3>
              <span class="angkatan">TL - 2021</span>
            </div>
          </div>
          <p class="posisi">Supervisor Produksi di PT. Sritex</p>
          <p class="testi">"Dari SMKN 2 saya belajar disiplin dan ketelitian yang sangat berguna di industri tekstil."</p>
        </div>
        <div class="alumni-card">
          <div class="alumni-header">
            <img src="https://ui-avatars.com/api/?name=Putri+Indah&background=f87171&color=fff&size=80" alt="Putri Indah">
            <div class="alumni-info">
              <h3>Putri Indah</h3>
              <span class="angkatan">TO - 2020</span>
            </div>
          </div>
          <p class="posisi">Teknisi Otomotif di Bengkel Resmi Toyota</p>
          <p class="testi">"Guru-guru sangat berpengalaman dan membimbing saya hingga mampu bersaing di industri otomotif."</p>
        </div>
        <div class="alumni-card">
          <div class="alumni-header">
            <img src="https://ui-avatars.com/api/?name=Bagas+Pratama&background=a78bfa&color=fff&size=80" alt="Bagas Pratama">
            <div class="alumni-info">
              <h3>Bagas Pratama</h3>
              <span class="angkatan">RPL - 2019</span>
            </div>
          </div>
          <p class="posisi">Mobile Developer di Gojek</p>
          <p class="testi">"Berkat dasar pemrograman yang kuat dari SMK, saya bisa melanjutkan ke jenjang karir impian."</p>
        </div>
        <div class="alumni-card">
          <div class="alumni-header">
            <img src="https://ui-avatars.com/api/?name=Sinta+Dewi&background=34d399&color=fff&size=80" alt="Sinta Dewi">
            <div class="alumni-info">
              <h3>Sinta Dewi</h3>
              <span class="angkatan">M - 2018</span>
            </div>
          </div>
          <p class="posisi">Quality Control di PT. Pindad</p>
          <p class="testi">"Pengalaman praktik industri yang diberikan sekolah sangat membangun mental kerja saya."</p>
        </div>
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
