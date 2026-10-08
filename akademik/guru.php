<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guru &amp; Staff | SMKN 2 Karanganyar</title>
  <link rel="stylesheet" href="../css/style.css?v=3">
  <style>.guru-toolbar{display:flex;flex-direction:column;gap:1rem;background:#fff;border-radius:20px;padding:1.5rem 2rem;box-shadow:0 4px 16px rgba(0,0,0,0.05),0 1px 3px rgba(0,0,0,0.04);margin-bottom:2.5rem}@media(min-width:768px){.guru-toolbar{flex-direction:row;align-items:center;justify-content:space-between;padding:1.25rem 2rem}}.guru-toolbar select{padding:11px 16px;border:1.5px solid #e2e8e2;border-radius:12px;background:#f4f7f4;font-family:var(--font-body);font-size:14px;color:var(--on-surface);outline:none;cursor:pointer;min-width:180px;transition:all .2s;appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%235d5f5f' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 1rem center;padding-right:2.5rem}.guru-toolbar select:focus{border-color:var(--primary-dark);background:#fff;box-shadow:0 0 0 3px rgba(0,110,47,0.08)}.guru-grid{display:grid;grid-template-columns:1fr;gap:1rem;margin-top:2.5rem}@media(min-width:640px){.guru-grid{grid-template-columns:repeat(2,1fr)}}@media(min-width:1024px){.guru-grid{grid-template-columns:repeat(3,1fr)}}.guru-card{background:#fff;border-radius:16px;border:1px solid #e8f0e8;overflow:hidden;transition:all .3s;cursor:pointer}.guru-card:hover{box-shadow:0 8px 24px rgba(0,110,47,0.06)}.guru-card-header{display:flex;align-items:center;gap:1rem;padding:1.25rem;transition:background .2s}.guru-card-header:hover{background:rgba(34,197,94,0.02)}.guru-avatar{width:48px;height:48px;border-radius:50%;background:var(--surface-container);display:flex;align-items:center;justify-content:center;font-size:1.25rem;color:var(--primary-dark);flex-shrink:0;font-weight:700;font-family:var(--font-heading)}.guru-card-info{flex:1;min-width:0}.guru-card-info h3{font-family:var(--font-heading);font-size:.95rem;font-weight:700;color:var(--on-surface);margin-bottom:.125rem}.guru-card-info .kompetensi{font-size:.8rem;color:var(--secondary)}.guru-card-chevron{color:var(--secondary);font-size:1.25rem;transition:transform .3s;flex-shrink:0}.guru-card.open .guru-card-chevron{transform:rotate(180deg)}.guru-card-body{max-height:0;overflow:hidden;transition:max-height .35s ease}.guru-detail{padding:0 1.25rem 1.25rem;border-top:1px solid #e8f0e8;margin-top:0}.guru-detail-item{display:flex;gap:.75rem;padding:.75rem 0;border-bottom:1px solid #f0f4f0}.guru-detail-item:last-child{border-bottom:none}.guru-detail-item .label{font-size:.8rem;color:var(--secondary);min-width:90px;flex-shrink:0}.guru-detail-item .value{font-size:.9rem;color:var(--on-surface);font-weight:500}.guru-empty{text-align:center;padding:4rem 2rem;color:var(--secondary);display:none}.guru-empty .material-symbols-outlined{font-size:3rem;margin-bottom:1rem;color:var(--outline)}.guru-empty h3{font-family:var(--font-heading);font-size:1.125rem;color:var(--on-surface);margin-bottom:.5rem}
  </style>
</head>
<body>

  <?php $baseNav = '../'; include '../components/navbar.php'; ?>

  <main>
    <section class="section pt-24">
      <div class="container">
        <div class="guru-toolbar">
          <div>
            <select id="kompetensiFilter" onchange="filterGuru()">
              <option value="all">Semua Kompetensi</option>
              <option value="RPL">Rekayasa Perangkat Lunak</option>
              <option value="Mesin">Mesin</option>
              <option value="Teknik Ototronik">Teknik Ototronik</option>
              <option value="Tekstil">Tekstil</option>
              <option value="Matematika">Matematika</option>
              <option value="Bahasa Indonesia">Bahasa Indonesia</option>
              <option value="Bahasa Inggris">Bahasa Inggris</option>
              <option value="Pendidikan Agama">Pendidikan Agama</option>
              <option value="PKN">PKN</option>
              <option value="Penjas">Penjas</option>
              <option value="Seni Budaya">Seni Budaya</option>
            </select>
          </div>
          <div class="toolbar-search">
            <span class="material-symbols-outlined toolbar-search-icon">search</span>
            <input type="text" id="searchGuru" placeholder="Cari nama guru..." oninput="filterGuru()">
          </div>
        </div>

        <div class="guru-grid" id="guruGrid">
          <!-- RPL -->
          <div class="guru-card" data-kompetensi="RPL">
            <div class="guru-card-header" onclick="toggleGuru(this)">
              <div class="guru-avatar">AS</div>
              <div class="guru-card-info">
                <h3>Ahmad Syukri, S.Kom.</h3>
                <span class="kompetensi">Rekayasa Perangkat Lunak</span>
              </div>
              <span class="material-symbols-outlined guru-card-chevron">expand_more</span>
            </div>
            <div class="guru-card-body">
                <div class="guru-detail">
                  <div class="guru-detail-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">Ahmad Syukri, S.Kom.</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Jenis Kelamin</span>
                    <span class="value">Laki-laki</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Kompetensi</span>
                    <span class="value">Rekayasa Perangkat Lunak</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Mata Pelajaran</span>
                    <span class="value">Pemrograman Web, Basis Data, UI/UX</span>
                  </div>
                </div>
            </div>
          </div>

          <div class="guru-card" data-kompetensi="RPL">
            <div class="guru-card-header" onclick="toggleGuru(this)">
              <div class="guru-avatar">DN</div>
              <div class="guru-card-info">
                <h3>Dewi Nurhayati, M.Kom.</h3>
                <span class="kompetensi">Rekayasa Perangkat Lunak</span>
              </div>
              <span class="material-symbols-outlined guru-card-chevron">expand_more</span>
            </div>
            <div class="guru-card-body">
                <div class="guru-detail">
                  <div class="guru-detail-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">Dewi Nurhayati, M.Kom.</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Jenis Kelamin</span>
                    <span class="value">Perempuan</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Kompetensi</span>
                    <span class="value">Rekayasa Perangkat Lunak</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Mata Pelajaran</span>
                    <span class="value">Algoritma, Mobile Programming, Project IT</span>
                  </div>
                </div>
            </div>
          </div>

          <div class="guru-card" data-kompetensi="RPL">
            <div class="guru-card-header" onclick="toggleGuru(this)">
              <div class="guru-avatar">RF</div>
              <div class="guru-card-info">
                <h3>Rizky Firmansyah, S.T.</h3>
                <span class="kompetensi">Rekayasa Perangkat Lunak</span>
              </div>
              <span class="material-symbols-outlined guru-card-chevron">expand_more</span>
            </div>
            <div class="guru-card-body">
                <div class="guru-detail">
                  <div class="guru-detail-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">Rizky Firmansyah, S.T.</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Jenis Kelamin</span>
                    <span class="value">Laki-laki</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Kompetensi</span>
                    <span class="value">Rekayasa Perangkat Lunak</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Mata Pelajaran</span>
                    <span class="value">Jaringan Komputer, Cyber Security, IoT</span>
                  </div>
                </div>
            </div>
          </div>

          <!-- Mesin -->
          <div class="guru-card" data-kompetensi="Mesin">
            <div class="guru-card-header" onclick="toggleGuru(this)">
              <div class="guru-avatar">BH</div>
              <div class="guru-card-info">
                <h3>Bambang Haryanto, S.T.</h3>
                <span class="kompetensi">Mesin</span>
              </div>
              <span class="material-symbols-outlined guru-card-chevron">expand_more</span>
            </div>
            <div class="guru-card-body">
                <div class="guru-detail">
                  <div class="guru-detail-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">Bambang Haryanto, S.T.</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Jenis Kelamin</span>
                    <span class="value">Laki-laki</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Kompetensi</span>
                    <span class="value">Mesin</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Mata Pelajaran</span>
                    <span class="value">Gambar Teknik, CNC, Proses Produksi</span>
                  </div>
                </div>
            </div>
          </div>

          <div class="guru-card" data-kompetensi="Mesin">
            <div class="guru-card-header" onclick="toggleGuru(this)">
              <div class="guru-avatar">SW</div>
              <div class="guru-card-info">
                <h3>Sarwo Widodo, S.T.</h3>
                <span class="kompetensi">Mesin</span>
              </div>
              <span class="material-symbols-outlined guru-card-chevron">expand_more</span>
            </div>
            <div class="guru-card-body">
                <div class="guru-detail">
                  <div class="guru-detail-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">Sarwo Widodo, S.T.</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Jenis Kelamin</span>
                    <span class="value">Laki-laki</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Kompetensi</span>
                    <span class="value">Mesin</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Mata Pelajaran</span>
                    <span class="value">Menggambar Mesin, CAD/CAM, Pengukuran</span>
                  </div>
                </div>
            </div>
          </div>

          <!-- Teknik Ototronik -->
          <div class="guru-card" data-kompetensi="Teknik Ototronik">
            <div class="guru-card-header" onclick="toggleGuru(this)">
              <div class="guru-avatar">HS</div>
              <div class="guru-card-info">
                <h3>Hery Susanto, S.T.</h3>
                <span class="kompetensi">Teknik Ototronik</span>
              </div>
              <span class="material-symbols-outlined guru-card-chevron">expand_more</span>
            </div>
            <div class="guru-card-body">
                <div class="guru-detail">
                  <div class="guru-detail-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">Hery Susanto, S.T.</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Jenis Kelamin</span>
                    <span class="value">Laki-laki</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Kompetensi</span>
                    <span class="value">Teknik Ototronik</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Mata Pelajaran</span>
                    <span class="value">Sensor &amp; Aktuator, Sistem Kontrol, PLC</span>
                  </div>
                </div>
            </div>
          </div>

          <div class="guru-card" data-kompetensi="Teknik Ototronik">
            <div class="guru-card-header" onclick="toggleGuru(this)">
              <div class="guru-avatar">AN</div>
              <div class="guru-card-info">
                <h3>Andi Nugroho, S.ST.</h3>
                <span class="kompetensi">Teknik Ototronik</span>
              </div>
              <span class="material-symbols-outlined guru-card-chevron">expand_more</span>
            </div>
            <div class="guru-card-body">
                <div class="guru-detail">
                  <div class="guru-detail-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">Andi Nugroho, S.ST.</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Jenis Kelamin</span>
                    <span class="value">Laki-laki</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Kompetensi</span>
                    <span class="value">Teknik Ototronik</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Mata Pelajaran</span>
                    <span class="value">Elektronika Dasar, Mikrokontroler, Otomotif</span>
                  </div>
                </div>
            </div>
          </div>

          <!-- Tekstil -->
          <div class="guru-card" data-kompetensi="Tekstil">
            <div class="guru-card-header" onclick="toggleGuru(this)">
              <div class="guru-avatar">SP</div>
              <div class="guru-card-info">
                <h3>Suprapto, S.T.</h3>
                <span class="kompetensi">Tekstil</span>
              </div>
              <span class="material-symbols-outlined guru-card-chevron">expand_more</span>
            </div>
            <div class="guru-card-body">
                <div class="guru-detail">
                  <div class="guru-detail-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">Suprapto, S.T.</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Jenis Kelamin</span>
                    <span class="value">Laki-laki</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Kompetensi</span>
                    <span class="value">Tekstil</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Mata Pelajaran</span>
                    <span class="value">Teknologi Serat, Pertenunan, Pencelupan</span>
                  </div>
                </div>
            </div>
          </div>

          <!-- Matematika -->
          <div class="guru-card" data-kompetensi="Matematika">
            <div class="guru-card-header" onclick="toggleGuru(this)">
              <div class="guru-avatar">SU</div>
              <div class="guru-card-info">
                <h3>Dra. Siti Umami</h3>
                <span class="kompetensi">Matematika</span>
              </div>
              <span class="material-symbols-outlined guru-card-chevron">expand_more</span>
            </div>
            <div class="guru-card-body">
                <div class="guru-detail">
                  <div class="guru-detail-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">Dra. Siti Umami</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Jenis Kelamin</span>
                    <span class="value">Perempuan</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Kompetensi</span>
                    <span class="value">Matematika</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Mata Pelajaran</span>
                    <span class="value">Matematika Wajib, Matematika Peminatan</span>
                  </div>
                </div>
            </div>
          </div>

          <!-- Bhs Indonesia -->
          <div class="guru-card" data-kompetensi="Bahasa Indonesia">
            <div class="guru-card-header" onclick="toggleGuru(this)">
              <div class="guru-avatar">NK</div>
              <div class="guru-card-info">
                <h3>Nurul Kusuma, S.Pd.</h3>
                <span class="kompetensi">Bahasa Indonesia</span>
              </div>
              <span class="material-symbols-outlined guru-card-chevron">expand_more</span>
            </div>
            <div class="guru-card-body">
                <div class="guru-detail">
                  <div class="guru-detail-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">Nurul Kusuma, S.Pd.</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Jenis Kelamin</span>
                    <span class="value">Perempuan</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Kompetensi</span>
                    <span class="value">Bahasa Indonesia</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Mata Pelajaran</span>
                    <span class="value">Bahasa Indonesia Wajib, Keterampilan Berbahasa</span>
                  </div>
                </div>
            </div>
          </div>

          <!-- Bhs Inggris -->
          <div class="guru-card" data-kompetensi="Bahasa Inggris">
            <div class="guru-card-header" onclick="toggleGuru(this)">
              <div class="guru-avatar">LW</div>
              <div class="guru-card-info">
                <h3>Linda Wahyuni, S.Pd., M.Hum.</h3>
                <span class="kompetensi">Bahasa Inggris</span>
              </div>
              <span class="material-symbols-outlined guru-card-chevron">expand_more</span>
            </div>
            <div class="guru-card-body">
                <div class="guru-detail">
                  <div class="guru-detail-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">Linda Wahyuni, S.Pd., M.Hum.</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Jenis Kelamin</span>
                    <span class="value">Perempuan</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Kompetensi</span>
                    <span class="value">Bahasa Inggris</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Mata Pelajaran</span>
                    <span class="value">Bahasa Inggris Wajib, English Conversation</span>
                  </div>
                </div>
            </div>
          </div>

          <!-- Pend Agama -->
          <div class="guru-card" data-kompetensi="Pendidikan Agama">
            <div class="guru-card-header" onclick="toggleGuru(this)">
              <div class="guru-avatar">AH</div>
              <div class="guru-card-info">
                <h3>Ahmad Hidayat, S.Ag.</h3>
                <span class="kompetensi">Pendidikan Agama</span>
              </div>
              <span class="material-symbols-outlined guru-card-chevron">expand_more</span>
            </div>
            <div class="guru-card-body">
                <div class="guru-detail">
                  <div class="guru-detail-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">Ahmad Hidayat, S.Ag.</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Jenis Kelamin</span>
                    <span class="value">Laki-laki</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Kompetensi</span>
                    <span class="value">Pendidikan Agama Islam</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Mata Pelajaran</span>
                    <span class="value">Pendidikan Agama Islam, BTQ, Akidah Akhlak</span>
                  </div>
                </div>
            </div>
          </div>

          <!-- PKN -->
          <div class="guru-card" data-kompetensi="PKN">
            <div class="guru-card-header" onclick="toggleGuru(this)">
              <div class="guru-avatar">SP</div>
              <div class="guru-card-info">
                <h3>Drs. Slamet Prayitno</h3>
                <span class="kompetensi">PKN</span>
              </div>
              <span class="material-symbols-outlined guru-card-chevron">expand_more</span>
            </div>
            <div class="guru-card-body">
                <div class="guru-detail">
                  <div class="guru-detail-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">Drs. Slamet Prayitno</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Jenis Kelamin</span>
                    <span class="value">Laki-laki</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Kompetensi</span>
                    <span class="value">PKN</span>
                  </div>
                  <div class="guru-detail-item">
                    <span class="label">Mata Pelajaran</span>
                    <span class="value">PKN Wajib, Kewarganegaraan</span>
                  </div>
                </div>
            </div>
          </div>
        </div>

        <div class="guru-empty" id="guruEmpty">
          <span class="material-symbols-outlined">search_off</span>
          <h3>Tidak ditemukan</h3>
          <p>Tidak ada guru yang sesuai dengan pencarian atau filter yang dipilih.</p>
        </div>
      </div>
    </section>
  </main>

  <?php $baseFooter = '../'; include '../components/footer.php'; ?>
  <?php include '../components/backtotop.html'; ?>

  <script src="../js/include.js?v=2"></script>
  <script src="../js/akademik.js?v=1"></script>
  <script>initPage();</script>
</body>
</html>
