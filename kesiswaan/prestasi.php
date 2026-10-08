<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prestasi | SMKN 2 Karanganyar</title>
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
    .prestasi-toolbar {
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      gap: 0.75rem;
      margin-bottom: 1.5rem;
      background: #fff;
      padding: 0.75rem 1.25rem;
      border-radius: 16px;
      border: 1px solid #e8f0e8;
      box-shadow: 0 2px 12px rgba(0,0,0,0.03);
    }
    .prestasi-toolbar .search-wrap {
      display: flex;
      align-items: center;
      gap: 0.625rem;
      flex: 1;
      min-width: 180px;
    }
    .prestasi-toolbar .search-wrap .material-symbols-outlined {
      font-size: 1.25rem;
      color: var(--outline);
      flex-shrink: 0;
    }
    .prestasi-toolbar .search-wrap input {
      flex: 1;
      border: none;
      outline: none;
      background: transparent;
      font-family: var(--font-body);
      font-size: 0.9rem;
      color: var(--on-surface);
    }
    .prestasi-toolbar .search-wrap input::placeholder {
      color: var(--outline);
    }
    .prestasi-toolbar .divider {
      width: 1px;
      height: 28px;
      background: #e8f0e8;
      flex-shrink: 0;
    }
    .prestasi-toolbar .filter-wrap {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .prestasi-toolbar .filter-wrap label {
      font-size: 0.8rem;
      font-weight: 600;
      color: var(--secondary);
      white-space: nowrap;
    }
    .prestasi-toolbar .filter-wrap select {
      padding: 0.5rem 2rem 0.5rem 0.75rem;
      border: 1.5px solid #e8f0e8;
      border-radius: 10px;
      background: #f8fbf8;
      font-family: var(--font-body);
      font-size: 0.85rem;
      color: var(--on-surface);
      outline: none;
      cursor: pointer;
      transition: all 0.2s;
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%235d5f5f' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 0.625rem center;
    }
    .prestasi-toolbar .filter-wrap select:focus {
      border-color: var(--primary);
      background: #fff;
    }
    .prestasi-table-wrap {
      overflow-x: auto;
      background: #fff;
      border-radius: 20px;
      border: 1px solid #e8f0e8;
      box-shadow: 0 4px 16px rgba(0,0,0,0.03);
    }
    .prestasi-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.875rem;
      min-width: 700px;
    }
    .prestasi-table thead {
      background: linear-gradient(135deg, #f0fdf4, #dcfce7);
    }
    .prestasi-table thead th {
      padding: 1rem 1.25rem;
      text-align: left;
      font-weight: 700;
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 0.04em;
      color: var(--primary-dark);
      border-bottom: 2px solid rgba(34,197,94,0.15);
      white-space: nowrap;
    }
    .prestasi-table thead th:first-child {
      width: 3.5rem;
      text-align: center;
    }
    .prestasi-table tbody tr {
      transition: background 0.2s;
    }
    .prestasi-table tbody tr:nth-child(even) {
      background: #fafdfa;
    }
    .prestasi-table tbody tr:hover {
      background: #f0fdf4;
    }
    .prestasi-table tbody td {
      padding: 1rem 1.25rem;
      border-bottom: 1px solid #edf5ed;
      color: var(--secondary);
      line-height: 1.5;
    }
    .prestasi-table tbody td:first-child {
      text-align: center;
      font-weight: 700;
      color: var(--primary-dark);
    }
    .prestasi-table tbody td:nth-child(2) {
      font-weight: 600;
      color: var(--on-surface);
    }
    .prestasi-table .prestasi-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.25rem;
      padding: 0.2rem 0.625rem;
      border-radius: 999px;
      font-size: 0.75rem;
      font-weight: 700;
      white-space: nowrap;
    }
    .prestasi-badge.emas { background: #fff8e1; color: #f57f17; }
    .prestasi-badge.perak { background: #f3f4f6; color: #616161; }
    .prestasi-badge.perunggu { background: #fce4ec; color: #c62828; }
    .prestasi-badge.juara { background: #e8f5e9; color: #2e7d32; }
    .prestasi-table .material-symbols-outlined {
      font-size: 1rem;
    }
    @media (max-width: 640px) {
      .prestasi-table-wrap {
        border-radius: 14px;
        margin-top: 1.5rem;
      }
      .prestasi-table thead th,
      .prestasi-table tbody td {
        padding: 0.75rem 1rem;
      }
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
          <h1>PRESTASI SISWA</h1>
          <p>Pencapaian membanggakan yang telah ditorehkan oleh siswa-siswi SMKN 2 Karanganyar di berbagai ajang.</p>
        </div>
      </div>
    </section>

    <section class="section pt-4">
      <div class="container">
        <div class="prestasi-toolbar" data-animate>
          <div class="search-wrap">
            <span class="material-symbols-outlined">search</span>
            <input type="text" id="searchPrestasi" placeholder="Cari lomba, siswa, atau keterangan..." oninput="filterPrestasi()">
          </div>
          <div class="divider"></div>
          <div class="filter-wrap">
            <label>Tingkat</label>
            <select id="filterTingkat" onchange="filterPrestasi()">
              <option value="all">Semua</option>
              <option value="Kabupaten">Kabupaten</option>
              <option value="Provinsi">Provinsi</option>
              <option value="Nasional">Nasional</option>
            </select>
          </div>
        </div>
        <div class="prestasi-table-wrap" data-animate>
          <table class="prestasi-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lomba</th>
                <th>Tingkat</th>
                <th>Tahun</th>
                <th>Siswa</th>
                <th>Kelas</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>LKS Robotika &amp; Otomasi Industri</td>
                <td><span class="prestasi-badge emas">Provinsi</span></td>
                <td>2023</td>
                <td>Ahmad Rizki</td>
                <td>XII TO</td>
                <td>Juara 1</td>
              </tr>
              <tr>
                <td>2</td>
                <td>LKS CNC Tingkat Nasional</td>
                <td><span class="prestasi-badge juara">Nasional</span></td>
                <td>2023</td>
                <td>Dimas Prasetyo</td>
                <td>XII Mesin</td>
                <td>Juara 2</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Kontes Robotika Indonesia</td>
                <td><span class="prestasi-badge perak">Nasional</span></td>
                <td>2023</td>
                <td>Tim Robotik</td>
                <td>XII TO</td>
                <td>Juara 3</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Olimpiade Sains Nasional</td>
                <td><span class="prestasi-badge juara">Provinsi</span></td>
                <td>2023</td>
                <td>Siti Nurhayati</td>
                <td>XI RPL</td>
                <td>Finalis</td>
              </tr>
              <tr>
                <td>5</td>
                <td>LKS Web Technologies</td>
                <td><span class="prestasi-badge emas">Kabupaten</span></td>
                <td>2024</td>
                <td>Budi Santoso</td>
                <td>XI RPL</td>
                <td>Juara 1</td>
              </tr>
              <tr>
                <td>6</td>
                <td>PORSENI SMK Tingkat Provinsi</td>
                <td><span class="prestasi-badge perak">Provinsi</span></td>
                <td>2024</td>
                <td>Ani Rahmawati</td>
                <td>XII Tekstil</td>
                <td>Juara 3</td>
              </tr>
              <tr>
                <td>7</td>
                <td>Olimpiade Matematika Vokasi</td>
                <td><span class="prestasi-badge emas">Nasional</span></td>
                <td>2024</td>
                <td>Agus Wijaya</td>
                <td>XII RPL</td>
                <td>Juara 1</td>
              </tr>
            </tbody>
          </table>
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
