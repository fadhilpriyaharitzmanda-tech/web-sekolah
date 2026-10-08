<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeri | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <style>
    .galeri-filter {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      justify-content: center;
      margin-bottom: 2.5rem;
    }
    .galeri-filter button {
      padding: 0.5rem 1.25rem;
      border-radius: 999px;
      border: 1px solid #e0e7e0;
      background: #fff;
      color: var(--on-surface-variant);
      font-family: var(--font-body);
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s;
    }
    .galeri-filter button:hover {
      border-color: var(--primary);
      color: var(--primary-dark);
    }
    .galeri-filter button.active {
      background: var(--primary-dark);
      border-color: var(--primary-dark);
      color: #fff;
    }
    .galeri-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1rem;
    }
    @media (min-width: 640px) {
      .galeri-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    @media (min-width: 1024px) {
      .galeri-grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }
    .galeri-item {
      position: relative;
      border-radius: 16px;
      overflow: hidden;
      cursor: pointer;
      aspect-ratio: 4 / 3;
    }
    .galeri-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s;
    }
    .galeri-item:hover img {
      transform: scale(1.1);
    }
    .galeri-item-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 60%);
      opacity: 0;
      transition: opacity 0.3s;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 1.5rem;
    }
    .galeri-item:hover .galeri-item-overlay {
      opacity: 1;
    }
    .galeri-item-overlay span {
      color: #fff;
      font-weight: 600;
      font-size: 0.9rem;
    }
    .galeri-item-overlay small {
      color: rgba(255,255,255,0.7);
      font-size: 0.8rem;
    }
    .galeri-tag {
      position: absolute;
      top: 0.75rem;
      left: 0.75rem;
      padding: 0.25rem 0.75rem;
      border-radius: 999px;
      background: rgba(255,255,255,0.9);
      backdrop-filter: blur(8px);
      font-size: 0.7rem;
      font-weight: 700;
      color: var(--primary-dark);
      z-index: 2;
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>
    <section class="section pt-24">
      <div class="container">
        <div class="galeri-filter" id="galeriFilter">
          <button class="active" data-kategori="all" onclick="filterGaleri(this,'all')">Semua</button>
          <button data-kategori="akademik" onclick="filterGaleri(this,'akademik')">Akademik</button>
          <button data-kategori="prestasi" onclick="filterGaleri(this,'prestasi')">Prestasi</button>
          <button data-kategori="kegiatan" onclick="filterGaleri(this,'kegiatan')">Kegiatan</button>
          <button data-kategori="ekskul" onclick="filterGaleri(this,'ekskul')">Ekskul</button>
          <button data-kategori="fasilitas" onclick="filterGaleri(this,'fasilitas')">Fasilitas</button>
        </div>

        <div class="galeri-grid" id="galeriGrid">
          <div class="galeri-item" data-kategori="akademik">
            <span class="galeri-tag">Akademik</span>
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_SXYPcGmyuDDk27y1MY2vNOUJUXjLe0GaVZXZQg228B_uZmwgt-UA0fqW0AQ2W_cNG1hPAelMnQ2Qv-VuxQ1EgsEyotraqSTQnS1Tc10wrrnH1oF-Ke2D7CIgBIoejjMFqsVWwBYLUkkVfNfOSrBZf8OxvvpW33_FSPb5ys4NTsFGvNAx7PNUi74zwtwr2m0wmuuUIX66-NecZFn3fQxiUqx32IFSWMKRvhrtvPa3jO8SOsBiomNJ5brpOZetll7Hqog5uP9AoAA" alt="Kegiatan Belajar">
            <div class="galeri-item-overlay">
              <span>Kegiatan Belajar Mengajar</span>
              <small>Laboratorium Komputer</small>
            </div>
          </div>
          <div class="galeri-item" data-kategori="prestasi">
            <span class="galeri-tag">Prestasi</span>
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1oQITlQxReSzB_iV4d4_8TBuxQ-GZNqW_LJJjMb_ludZiWGYQuAMtmFGechN-618UO8F3DFV6DcXRbgUvE-AnSJQnbZDfzclQ94bXkvN_3t7lu8TUhGv55Xu_CsZ_Ar0Vw6clauRRop2rUJrgG-VTc7TO6_82q_kpoZOOEqAcPzBkeEJH0XbCwWYblItMIRtd7q-3Nv0W8JNn_HKY_qbW_CTlPqmTo2GMs6Crt0mEt2A-jlIe7TQ8ARPYrLJoPajF0a56BpFTX8M" alt="Prestasi">
            <div class="galeri-item-overlay">
              <span>Juara LKS Tingkat Provinsi</span>
              <small>Robotika &amp; Otomasi Industri</small>
            </div>
          </div>
          <div class="galeri-item" data-kategori="kegiatan">
            <span class="galeri-tag">Kegiatan</span>
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3_aUhUZkEJ9ijlY6KCG87Z7SUfq4-IRaNqNP95zosXcQaSGJF_KFJCp_jJB3EjHKGWm8QrU7IM7Q3d3RXqe0Ku8G407h5lV5jljQTYgD1wn3Tz_y6LeyVlTFQ6AfvYpU8F-pL0h-wcXyC83wkTibzzXMB7DycGWa0RKlVrgpztiKVutAAM05V_gSVhkfwhTbsICB3iN9tI4FS1LsdLDrrQ7vg4a498iLmmByBp3JdDsfnl2oAMJOrQIbqIIQUPoQmN4ghmver2V0" alt="Workshop">
            <div class="galeri-item-overlay">
              <span>Workshop Transformasi Digital</span>
              <small>Pelatihan IoT bagi Guru</small>
            </div>
          </div>
          <div class="galeri-item" data-kategori="ekskul">
            <span class="galeri-tag">Ekskul</span>
            <img src="https://lh3.googleusercontent.com/aida/public/AB6AXuBi9pqVTYZxdoF_GiuAy7NYZJ8leR6lhtXLqDIq0CFw38PuSvpKwv4ohfSlFPjxwoMzpaA-yk2g3CYQ3FadAJO1IOkfbnkHDs5-d4CR1lw6mB7x4JPY8gKWOKESYroSdYJLQwLAZMvK-BsVc19X9eyEdlLfYBRdMGHHbRlkJazHVwsk4Z7RBbeSblnU9L3iSThZh_29XsBT6-0tNf5iAqwR-I2-w4Z30dpFX1o3kKablUp4xtGTlLZoIDisjoTIEh_VBXYYTW0wsV4" alt="Ekskul">
            <div class="galeri-item-overlay">
              <span>Gelar Karya Ekskul</span>
              <small>Penampilan Seni &amp; Budaya</small>
            </div>
          </div>
          <div class="galeri-item" data-kategori="fasilitas">
            <span class="galeri-tag">Fasilitas</span>
            <img src="https://lh3.googleusercontent.com/aida/AP1WRLvNjZjTymzvjomDhdvzZwEZWcHKGVE7MfQ3adcAHODMKesKkoLCzIcV1FGJ-8-UiGtaDUoyoG8crqqIslaCGaqOrh95g7fRMHq2YxyQdc0AkfT5Gd6J6yqwj45D1KwqVOQK4-6uJK5P_A7rEDi0SnDZj0FhkclJPWGqH5QnTj3Ek1cb585I7_NCKwPAOqRFjDpAEPobwDwTJbDX0iXPH148pX8O5y47_m4VBx7KPdqkXj7uQUnGs7W0Ag" alt="Lab Komputer">
            <div class="galeri-item-overlay">
              <span>Laboratorium Komputer</span>
              <small>Fasilitas Praktik RPL</small>
            </div>
          </div>
          <div class="galeri-item" data-kategori="akademik">
            <span class="galeri-tag">Akademik</span>
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmOxjGHf9fVTfNVGMb_-5Zg0_wNdDJErJo3WY-SIDSLqXGmUEwxH_lweYGi9OHqBEusCYeno7Z7I-xbo2Ihg90N0jOJf5liGSpdKZDXA4e_oUM26vsscb1SnkPyLxmHqSPtX_1XYNuKQdhXVBBej0iDf3_y0lJGgJcOaYj7iS-XWq_B9pGeq3Jgd2yUKEB6k35nfOtqRbNEgrZPjywp6BsmNcVfgc20epHBYJAw1taWEXhPB-cHpSiS5zBsgbOh6MPNWI25omxSF0" alt="Praktik Siswa">
            <div class="galeri-item-overlay">
              <span>Praktik Mesin</span>
              <small>Workshop CNC</small>
            </div>
          </div>
          <div class="galeri-item" data-kategori="prestasi">
            <span class="galeri-tag">Prestasi</span>
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAR6u9lB4fwZ1GSdURK-YFBsWlOlcol9arlvZp64eAHYjdMp88kK8UnK6vg4AJxyV1HqsCTvsR_9pmFTgwmz6xm2wd7zadqLJRajyQziTajNEnv6yxPcT7oSuXLKIubghNObb0IX8CZrPM5KZ-YBgEk64E3Z_UGplcSFXeeQnqag_4FFovAx2r5CVNDIuj38wTXu9VSvXsHubWi318mTGNmUcQWXcffb6iJc8_uWszQLuAY-FbB0sU4LQILmzzjC46a1H6-wpbNW-8" alt="Kerjasama">
            <div class="galeri-item-overlay">
              <span>Penandatanganan MoU</span>
              <small>Mitra Industri</small>
            </div>
          </div>
          <div class="galeri-item" data-kategori="kegiatan">
            <span class="galeri-tag">Kegiatan</span>
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAiysdXLkfH_pwudnN8iFSXFC0qsFoNkYMD7XDoLQDs2NoBl_1LfbVBsfK7blRbwddEvb5Sy1FaKPGJUUDO4xO3MMMfhk5QtnFSIWdkPaTyTh6DJQT1ga7w-UsrbDftfmQfJq9YGYHAuYzCaTUezqDbu90kRDijmJTDCP-FVxXul8Bb0szYvSj_w7NPQRax60MmLjW_837oEBQqs0mmS_lqpRctG0pOoZZzeFL3d3ktFBLnrYCQmIZjQL8tgnJ7Ot1i2MweD6p81Dw" alt="Kunjungan Industri">
            <div class="galeri-item-overlay">
              <span>Kunjungan Industri</span>
              <small>PT Toyota Astra Motor</small>
            </div>
          </div>
          <div class="galeri-item" data-kategori="fasilitas">
            <span class="galeri-tag">Fasilitas</span>
            <img src="https://lh3.googleusercontent.com/aida/AP1WRLvaAfAPNVUduCFWYAzWClNTD8-GkzFB-pvuNN5DjPKIaHs4h6rpqfg3zK84Itmx7WAe7PcmNwois24J8p0OJg2a7oh66ZIx6cJUBcbXXy93ZPrxaUuZhZQd_KVPmhlobv7vWsWOGaeiXp87HsJXlx29UaKDUjrXeaxK99fNHU7cSWOIofL0Yowf3HZuiOZubMskFApI-uj7VHWixw41FgtAvnJKDJUB1C7FhNKJ2uZvwC9spG0Yi79xkmI" alt="Workshop Ototronik">
            <div class="galeri-item-overlay">
              <span>Workshop Teknik Ototronik</span>
              <small>Laboratorium Terpadu</small>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/galeri.js?v=1"></script>
  <script>initPage();</script>
</body>
</html>
