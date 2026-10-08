<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kepala Sekolah | SMKN 2 Karanganyar</title>
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
    .kepsek-profile {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      margin-bottom: 2rem;
      padding-bottom: 2rem;
      border-bottom: 1px solid #e8f0e8;
    }
    .kepsek-photo {
      width: 180px;
      height: 180px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid var(--surface);
      box-shadow: 0 8px 24px rgba(0,0,0,0.08);
      margin-bottom: 1.25rem;
    }
    .kepsek-profile h2 {
      font-family: var(--font-heading);
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--on-surface);
      margin-bottom: 0.25rem;
    }
    .kepsek-profile .jabatan {
      color: var(--primary-dark);
      font-weight: 700;
      font-size: 0.9rem;
      letter-spacing: 0.05em;
      text-transform: uppercase;
    }
    .kepsek-sambutan h3 {
      font-family: var(--font-heading);
      font-size: 1.125rem;
      font-weight: 700;
      color: var(--on-surface);
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .kepsek-sambutan p {
      color: var(--secondary);
      line-height: 1.8;
      margin-bottom: 1rem;
      font-size: 1rem;
    }
    .kepsek-sambutan p:last-child {
      margin-bottom: 0;
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>
    <section class="page-hero">
      <div class="container">
        <h1>KEPALA SEKOLAH</h1>
        <p>Profil dan sambutan hangat dari kepala sekolah</p>
      </div>
    </section>

    <section class="container fade-in">
      <div class="page-box" data-animate>
        <div class="kepsek-profile">
          <img class="kepsek-photo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAe3_YhiI3OauIB7gqWCgk2k1d6SmrvlDJnppGb-fsXJsDpWFC6Jr7X9-Uu9EfH6MWCm3A_rzyh1yvxtxCDOPmm7MTwye1NIXOd0ksV7egfc2KPpyUNFbgb6gD1SkqJEbDO2g00S2MUN67uzoPMBEUzhWAYOuMn9YUaDPaiXdLrOjARQ2t3gHCrQf687DGufExpnsMmQ4W2VAfwgktbH9p6txn08q0PzSDFAOYaDh4VbFN6ZIpbYNvPjtyDAsP_4Vg94eB-X7sn-YQ" alt="Kepala Sekolah SMKN 2 Karanganyar">
          <h2>Drs. H. Sukiman, M.Pd.</h2>
          <p class="jabatan">Kepala Sekolah</p>
        </div>
        <div class="kepsek-sambutan">
          <h3>
            <span class="material-symbols-outlined icon-fill text-primary">format_quote</span>
            Sambutan Hangat
          </h3>
          <p>&ldquo;Selamat datang di portal informasi resmi SMKN 2 Karanganyar. Sebagai garda terdepan pendidikan vokasi, kami berkomitmen untuk tidak sekadar mentransfer ilmu pengetahuan, tetapi membentuk karakter dan mentalitas pemenang bagi setiap peserta didik kami.&rdquo;</p>
          <p>&ldquo;Di era digital yang bergerak sangat dinamis ini, kami terus berinovasi untuk memastikan lulusan kami tidak hanya siap kerja, namun juga siap berkarya dan menjadi pionir di bidangnya masing-masing. Pendidikan adalah investasi terbaik untuk masa depan bangsa.&rdquo;</p>
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
