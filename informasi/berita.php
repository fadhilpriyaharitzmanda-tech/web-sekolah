<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Berita | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <style>
    .container {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main style="padding-top: 6rem;">

    <!-- FILTER & SEARCH -->
    <div class="container">
      <div class="toolbar-berita">
        <div class="toolbar-filter" id="kategoriFilter">
          <button class="active" data-kategori="all" onclick="filterKategori(this, 'all')">
            <span class="material-symbols-outlined">apps</span> Semua
          </button>
          <button data-kategori="Prestasi" onclick="filterKategori(this, 'Prestasi')">
            <span class="material-symbols-outlined">emoji_events</span> Prestasi
          </button>
          <button data-kategori="Kerjasama" onclick="filterKategori(this, 'Kerjasama')">
            <span class="material-symbols-outlined">handshake</span> Kerjasama
          </button>
          <button data-kategori="Event" onclick="filterKategori(this, 'Event')">
            <span class="material-symbols-outlined">event</span> Event
          </button>
          <button data-kategori="Akademik" onclick="filterKategori(this, 'Akademik')">
            <span class="material-symbols-outlined">school</span> Akademik
          </button>
          <button data-kategori="Kegiatan" onclick="filterKategori(this, 'Kegiatan')">
            <span class="material-symbols-outlined">celebration</span> Kegiatan
          </button>
        </div>
        <div class="toolbar-search">
          <span class="material-symbols-outlined toolbar-search-icon">search</span>
          <input type="text" id="searchInput" placeholder="Cari berita..." oninput="filterBerita()">
        </div>
      </div>
    </div>

    <!-- NEWS GRID -->
    <section class="section pt-0">
    <div class="container pt-4">
        <div class="news-grid" id="beritaGrid" data-animate>

          <article class="news-card" data-kategori="Prestasi">
            <div class="news-card-img-wrap">
              <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1oQITlQxReSzB_iV4d4_8TBuxQ-GZNqW_LJJjMb_ludZiWGYQuAMtmFGechN-618UO8F3DFV6DcXRbgUvE-AnSJQnbZDfzclQ94bXkvN_3t7lu8TUhGv55Xu_CsZ_Ar0Vw6clauRRop2rUJrgG-VTc7TO6_82q_kpoZOOEqAcPzBkeEJH0XbCwWYblItMIRtd7q-3Nv0W8JNn_HKY_qbW_CTlPqmTo2GMs6Crt0mEt2A-jlIe7TQ8ARPYrLJoPajF0a56BpFTX8M" alt="Prestasi">
              <span class="news-card-tag">PRESTASI</span>
            </div>
            <div class="news-card-body">
              <time class="news-date">12 Oktober 2024</time>
              <h3 class="news-card-title">Juara 1 Lomba Kompetensi Siswa (LKS) Tingkat Provinsi</h3>
              <p class="news-card-desc">Siswa SMKN 2 Karanganyar kembali menorehkan prestasi membanggakan di bidang Robotika dan Otomasi Industri tingkat wilayah...</p>
              <a class="news-card-link" href="#">
                Baca Selengkapnya
                <span class="material-symbols-outlined icon-sm">arrow_forward</span>
              </a>
            </div>
          </article>

          <article class="news-card" data-kategori="Kerjasama">
            <div class="news-card-img-wrap">
              <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAR6u9lB4fwZ1GSdURK-YFBsWlOlcol9arlvZp64eAHYjdMp88kK8UnK6vg4AJxyV1HqsCTvsR_9pmFTgwmz6xm2wd7zadqLJRajyQziTajNEnv6yxPcT7oSuXLKIubghNObb0IX8CZrPM5KZ-YBgEk64E3Z_UGplcSFXeeQnqag_4FFovAx2r5CVNDIuj38wTXu9VSvXsHubWi318mTGNmUcQWXcffb6iJc8_uWszQLuAY-FbB0sU4LQILmzzjC46a1H6-wpbNW-8" alt="Kerjasama">
              <span class="news-card-tag">KERJASAMA</span>
            </div>
            <div class="news-card-body">
              <time class="news-date">08 Oktober 2024</time>
              <h3 class="news-card-title">MoU Baru Bersama PT. Astra International Tbk</h3>
              <p class="news-card-desc">Peningkatan kualitas lulusan melalui program link and match kelas industri dan sertifikasi internasional bagi para pengajar...</p>
              <a class="news-card-link" href="#">
                Baca Selengkapnya
                <span class="material-symbols-outlined icon-sm">arrow_forward</span>
              </a>
            </div>
          </article>

          <article class="news-card" data-kategori="Event">
            <div class="news-card-img-wrap">
              <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3_aUhUZkEJ9ijlY6KCG87Z7SUfq4-IRaNqNP95zosXcQaSGJF_KFJCp_jJB3EjHKGWm8QrU7IM7Q3d3RXqe0Ku8G407h5lV5jljQTYgD1wn3Tz_y6LeyVlTFQ6AfvYpU8F-pL0h-wcXyC83wkTibzzXMB7DycGWa0RKlVrgpztiKVutAAM05V_gSVhkfwhTbsICB3iN9tI4FS1LsdLDrrQ7vg4a498iLmmByBp3JdDsfnl2oAMJOrQIbqIIQUPoQmN4ghmver2V0" alt="Workshop">
              <span class="news-card-tag">EVENT</span>
            </div>
            <div class="news-card-body">
              <time class="news-date">05 Oktober 2024</time>
              <h3 class="news-card-title">Workshop Transformasi Digital 4.0 Bagi Guru Vokasi</h3>
              <p class="news-card-desc">Mengintegrasikan teknologi Internet of Things (IoT) ke dalam modul pembelajaran praktik di semua program keahlian teknik...</p>
              <a class="news-card-link" href="#">
                Baca Selengkapnya
                <span class="material-symbols-outlined icon-sm">arrow_forward</span>
              </a>
            </div>
          </article>

          <article class="news-card" data-kategori="Prestasi">
            <div class="news-card-img-wrap">
              <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmOxjGHf9fVTfNVGMb_-5Zg0_wNdDJErJo3WY-SIDSLqXGmUEwxH_lweYGi9OHqBEusCYeno7Z7I-xbo2Ihg90N0jOJf5liGSpdKZDXA4e_oUM26vsscb1SnkPyLxmHqSPtX_1XYNuKQdhXVBBej0iDf3_y0lJGgJcOaYj7iS-XWq_B9pGeq3Jgd2yUKEB6k35nfOtqRbNEgrZPjywp6BsmNcVfgc20epHBYJAw1taWEXhPB-cHpSiS5zBsgbOh6MPNWI25omxSF0" alt="Akademik">
              <span class="news-card-tag">PRESTASI</span>
            </div>
            <div class="news-card-body">
              <time class="news-date">12 Oktober 2023</time>
              <h3 class="news-card-title">Juara LKS Tingkat Nasional 2023</h3>
              <p class="news-card-desc">Siswa jurusan Mesin berhasil meraih medali emas dalam ajang Lomba Kompetensi Siswa (LKS) tingkat nasional...</p>
              <a class="news-card-link" href="#">
                Baca Selengkapnya
                <span class="material-symbols-outlined icon-sm">arrow_forward</span>
              </a>
            </div>
          </article>

          <article class="news-card" data-kategori="Kerjasama">
            <div class="news-card-img-wrap">
              <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAiysdXLkfH_pwudnN8iFSXFC0qsFoNkYMD7XDoLQDs2NoBl_1LfbVBsfK7blRbwddEvb5Sy1FaKPGJUUDO4xO3MMMfhk5QtnFSIWdkPaTyTh6DJQT1ga7w-UsrbDftfmQfJq9YGYHAuYzCaTUezqDbu90kRDijmJTDCP-FVxXul8Bb0szYvSj_w7NPQRax60MmLjW_837oEBQqs0mmS_lqpRctG0pOoZZzeFL3d3ktFBLnrYCQmIZjQL8tgnJ7Ot1i2MweD6p81Dw" alt="Industri">
              <span class="news-card-tag">KERJASAMA</span>
            </div>
            <div class="news-card-body">
              <time class="news-date">08 Oktober 2023</time>
              <h3 class="news-card-title">Kerjasama Baru dengan Toyota Astra</h3>
              <p class="news-card-desc">Memperkuat sinkronisasi kurikulum, sekolah secara resmi menandatangani MoU dengan PT Toyota Astra Motor...</p>
              <a class="news-card-link" href="#">
                Baca Selengkapnya
                <span class="material-symbols-outlined icon-sm">arrow_forward</span>
              </a>
            </div>
          </article>

          <article class="news-card" data-kategori="Kegiatan">
            <div class="news-card-img-wrap">
              <img class="news-card-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBi9pqVTYZxdoF_GiuAy7NYZJ8leR6lhtXLqDIq0CFw38PuSvpKwv4ohfSlFPjxwoMzpaA-yk2g3CYQ3FadAJO1IOkfbnkHDs5-d4CR1lw6mB7x4JPY8gKWOKESYroSdYJLQwLAZMvK-BsVc19X9eyEdlLfYBRdMGHHbRlkJazHVwsk4Z7RBbeSblnU9L3iSThZh_29XsBT6-0tNf5iAqwR-I2-w4Z30dpFX1o3kKablUp4xtGTlLZoIDisjoTIEh_VBXYYTW0wsV4" alt="Kegiatan">
              <span class="news-card-tag">KEGIATAN</span>
            </div>
            <div class="news-card-body">
              <time class="news-date">05 Oktober 2023</time>
              <h3 class="news-card-title">Malam Keakraban &amp; Gelar Karya</h3>
              <p class="news-card-desc">Penampilan kreativitas siswa dari berbagai ekstrakurikuler dalam memeriahkan hari jadi sekolah ke-20...</p>
              <a class="news-card-link" href="#">
                Baca Selengkapnya
                <span class="material-symbols-outlined icon-sm">arrow_forward</span>
              </a>
            </div>
          </article>

        </div>
      </div>
    </section>

  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/informasi.js?v=1"></script>
  <script>initPage('berita');</script>
</body>
</html>
