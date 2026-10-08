<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ekstrakurikuler | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <style>
    .container {
      font-family: 'Inter', sans-serif;
    }

    .page-hero {
      padding: 8rem 0 5rem;
      position: relative;
      overflow: hidden;
      background-color: var(--surface);
    }
    .page-hero-bg {
      position: absolute; inset: 0; z-index: 0;
      background-image: radial-gradient(circle at 2px 2px, rgba(0,110,47,0.07) 1px, transparent 0);
      background-size: 28px 28px;
    }
    .page-hero-glow {
      position: absolute; border-radius: 50%; filter: blur(100px); pointer-events: none; z-index: 0;
    }
    .page-hero-glow-1 {
      width: 500px; height: 500px;
      background: rgba(34,197,94,0.08);
      top: -200px; right: -100px;
    }
    .page-hero-glow-2 {
      width: 400px; height: 400px;
      background: rgba(34,197,94,0.05);
      bottom: -150px; left: -80px;
    }
    .page-hero-inner {
      position: relative; z-index: 2; text-align: center;
    }
    .page-hero-inner h1 {
      font-family: var(--font-heading);
      font-size: 2.5rem;
      font-weight: 800;
      color: var(--primary-dark);
      margin-bottom: 0.75rem;
    }
    .page-hero-inner p {
      color: var(--secondary);
      max-width: 36rem;
      margin: 0 auto;
      font-size: 1.05rem;
      line-height: 1.7;
    }
    .eks-card-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
      margin-top: 2rem;
    }
    @media (min-width: 640px) {
      .eks-card-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    @media (min-width: 1024px) {
      .eks-card-grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }
    .eks-card {
      background: #fff;
      border-radius: 18px;
      padding: 2rem;
      border: 1px solid #e8f0e8;
      transition: all 0.3s;
    }
    .eks-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 32px rgba(0,110,47,0.08);
    }
    .eks-icon {
      width: 56px;
      height: 56px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1.25rem;
      font-size: 1.75rem;
    }
    .eks-card h3 {
      font-family: var(--font-heading);
      font-size: 1.1rem;
      font-weight: 700;
      color: var(--on-surface);
      margin-bottom: 0.5rem;
    }
    .eks-card p {
      color: var(--secondary);
      font-size: 0.9rem;
      line-height: 1.7;
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>
    <section class="page-hero">
      <div class="page-hero-bg"></div>
      <div class="page-hero-glow page-hero-glow-1"></div>
      <div class="page-hero-glow page-hero-glow-2"></div>
      <div class="container">
        <div class="page-hero-inner hero-entrance">
          <h1>EKSTRAKURIKULER</h1>
          <p>Berbagai kegiatan ekstrakurikuler untuk mengembangkan minat, bakat, kreativitas, dan karakter kepemimpinan siswa di luar akademik.</p>
        </div>
      </div>
    </section>

    <section class="section pt-4">
      <div class="container">
        <div class="eks-card-grid" data-animate>
          <div class="eks-card">
            <div class="eks-icon" style="background:#e8f5e9;color:#2e7d32;">
              <span class="material-symbols-outlined icon-fill">groups</span>
            </div>
            <h3>OSIS</h3>
            <p>Organisasi intra sekolah yang menjadi wadah pengembangan jiwa kepemimpinan, organisasi, dan demokrasi siswa.</p>
          </div>
          <div class="eks-card">
            <div class="eks-icon" style="background:#fff3e0;color:#e65100;">
              <span class="material-symbols-outlined icon-fill">medical_services</span>
            </div>
            <h3>PMR</h3>
            <p>Palang Merah Remaja yang melatih kepedulian sosial, pertolongan pertama, dan kesiapsiagaan bencana.</p>
          </div>
          <div class="eks-card">
            <div class="eks-icon" style="background:#e3f2fd;color:#1565c0;">
              <span class="material-symbols-outlined icon-fill">flag</span>
            </div>
            <h3>Paskibra</h3>
            <p>Pasukan pengibar bendera yang membentuk karakter disiplin, tanggung jawab, dan semangat nasionalisme.</p>
          </div>
          <div class="eks-card">
            <div class="eks-icon" style="background:#fce4ec;color:#c62828;">
              <span class="material-symbols-outlined icon-fill">forest</span>
            </div>
            <h3>Ambalan</h3>
            <p>Kegiatan kepramukaan tingkat penegak yang mengembangkan kemandirian, kepemimpinan, dan kecintaan alam.</p>
          </div>
          <div class="eks-card">
            <div class="eks-icon" style="background:#f3e5f5;color:#7b1fa2;">
              <span class="material-symbols-outlined icon-fill">mosque</span>
            </div>
            <h3>Rohis</h3>
            <p>Rohani Islam sebagai wadah pengembangan keimanan, akhlak mulia, dan kegiatan keagamaan siswa muslim.</p>
          </div>
          <div class="eks-card">
            <div class="eks-icon" style="background:#e0f7fa;color:#00838f;">
              <span class="material-symbols-outlined icon-fill">newspaper</span>
            </div>
            <h3>Jurnalistik</h3>
            <p>Mengembangkan kemampuan menulis, reportase, dan publikasi berita sekolah melalui media cetak dan digital.</p>
          </div>
          <div class="eks-card">
            <div class="eks-icon" style="background:#fff8e1;color:#f57f17;">
              <span class="material-symbols-outlined icon-fill">hiking</span>
            </div>
            <h3>IMAPA</h3>
            <p>Ikatan Pelajar Pecinta Alam yang menyalurkan minat di bidang pencinta alam, konservasi, dan petualangan.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/kesiswaan.js?v=1"></script>
  <script>initPage();</script>
</body>
</html>
