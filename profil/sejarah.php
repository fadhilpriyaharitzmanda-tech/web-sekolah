<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sejarah | SMKN 2 Karanganyar</title>
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
      background: linear-gradient(180deg, var(--surface) 0%, rgba(34, 197, 94, 0.04) 100%);
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
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
      border: 1px solid #e8f0e8;
    }

    .page-box p {
      color: var(--secondary);
      line-height: 1.8;
      margin-bottom: 1rem;
      font-size: 1rem;
    }

    .page-box .page-img {
      width: 100%;
      height: 280px;
      object-fit: cover;
      border-radius: 12px;
      margin-bottom: 2rem;
    }

    @media (min-width: 768px) {
      .page-box .page-img {
        height: 360px;
      }
    }
  </style>
</head>

<body>

  <?php $baseNav = '../';
  include '../components/navbar.php'; ?>

  <main>
    <section class="page-hero">
      <div class="container">
        <h1>SEJARAH SINGKAT</h1>
        <p>Perjalanan SMKN 2 Karanganyar dalam mencetak generasi unggulan</p>
      </div>
    </section>

    <section class="container fade-in">
      <div class="page-box" data-animate>
        <img class="page-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_SXYPcGmyuDDk27y1MY2vNOUJUXjLe0GaVZXZQg228B_uZmwgt-UA0fqW0AQ2W_cNG1hPAelMnQ2Qv-VuxQ1EgsEyotraqSTQnS1Tc10wrrnH1oF-Ke2D7CIgBIoejjMFqsVWwBYLUkkVfNfOSrBZf8OxvvpW33_FSPb5ys4NTsFGvNAx7PNUi74zwtwr2m0wmuuUIX66-NecZFn3fQxiUqx32IFSWMKRvhrtvPa3jO8SOsBiomNJ5brpOZetll7Hqog5uP9AoAA" alt="Sejarah SMKN 2 Karanganyar">
        <p>SMKN 2 Karanganyar berdiri sebagai wujud komitmen pemerintah dalam memperluas akses pendidikan kejuruan yang berkualitas di wilayah Kabupaten Karanganyar. Sejak awal pendiriannya, sekolah ini telah berfokus pada pengembangan keterampilan teknis yang selaras dengan kebutuhan industri.</p>
        <p>Dari tahun ke tahun, sekolah ini terus bertransformasi, mulai dari peningkatan sarana prasarana hingga penyesuaian kurikulum yang dinamis. Prestasi demi prestasi telah ditorehkan, menjadikan SMKN 2 Karanganyar sebagai salah satu institusi pendidikan rujukan di Jawa Tengah.</p>
        <p>Kini, dengan dukungan tenaga pendidik yang profesional dan fasilitas modern, kami terus bergerak maju untuk melampaui batas standar pendidikan tradisional.</p>
      </div>
    </section>
  </main>

  <?php $baseFooter = '../';
  include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/profil.js?v=1"></script>
  <script>
    initPage();
  </script>
</body>

</html>