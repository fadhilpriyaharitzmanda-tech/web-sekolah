/* ============================================================
   PPDB SMKN 2 KARANGANYAR — Stage-based flow
   ============================================================ */

var currentStage = 1;
var completedStages = {};
var isInitialLoad = true;

/* ─── Init ─── */
document.addEventListener('DOMContentLoaded', function () {
  updateTimelineUI();
  showContent(1, true);

  var syaratCheck = document.getElementById('du_syarat');
  var submitBtn = document.getElementById('duSubmit');
  if (syaratCheck && submitBtn) {
    syaratCheck.addEventListener('change', function () {
      submitBtn.disabled = !this.checked;
    });
  }

  isInitialLoad = false;
});

/* ─── Stage navigation ─── */
function selectStage(stage) {
  var maxUnlocked = getMaxUnlockedStage();
  if (stage > maxUnlocked) return;

  currentStage = stage;
  updateTimelineUI();
  showContent(stage);
}

function getMaxUnlockedStage() {
  var max = 1;
  for (var i = 1; i <= 6; i++) {
    if (i === 1 || completedStages[i - 1]) {
      max = i;
    } else {
      break;
    }
  }
  return max;
}

function updateTimelineUI() {
  var cards = document.querySelectorAll('.ppdb-stage-card');
  var maxUnlocked = getMaxUnlockedStage();

  cards.forEach(function (card) {
    var stage = parseInt(card.getAttribute('data-stage'));
    card.classList.remove('active', 'completed', 'locked');

    if (completedStages[stage]) {
      card.classList.add('completed');
    } else if (stage === currentStage) {
      card.classList.add('active');
    } else if (stage > maxUnlocked) {
      card.classList.add('locked');
    }
  });
}

function showContent(stage, isInit) {
  var contents = document.querySelectorAll('.ppdb-stage-content');
  contents.forEach(function (c) {
    c.classList.remove('active');
  });
  var target = document.querySelector('.ppdb-stage-content[data-content="' + stage + '"]');
  if (target) target.classList.add('active');

  if (!isInit) {
    var contentSection = document.getElementById('ppdbContent');
    if (contentSection) {
      setTimeout(function () {
        contentSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }, 100);
    }
  }
}

/* ─── Complete stage ─── */
function completeStage(stage) {
  completedStages[stage] = true;
  updateTimelineUI();

  if (stage < 6) {
    selectStage(stage + 1);
  } else {
    showContent(stage);
  }
}

/* ─── Stage 1: Pengajuan Akun ─── */
function submitStage1(e) {
  e.preventDefault();
  var form = e.target;
  var inputs = form.querySelectorAll('input[required], select[required]');
  var valid = true;

  inputs.forEach(function (input) {
    if (!input.value.trim()) {
      input.classList.add('error');
      valid = false;
    } else {
      input.classList.remove('error');
    }
  });

  if (!valid) {
    alert('Harap lengkapi semua field yang wajib diisi.');
    return false;
  }

  alert('Pengajuan akun berhasil! Silakan lanjut ke tahap Verifikasi Akun.');
  completeStage(1);
  return false;
}

/* ─── Stage 3: Aktivasi Akun ─── */
function submitStage3(e) {
  e.preventDefault();
  var nisn = document.getElementById('aktivasi_nisn');
  var token = document.getElementById('token');
  var pass = document.getElementById('password');
  var passConfirm = document.getElementById('password_confirm');

  if (!nisn.value.trim() || !token.value.trim() || !pass.value.trim() || !passConfirm.value.trim()) {
    alert('Harap lengkapi semua field.');
    return false;
  }

  if (pass.value.length < 8) {
    alert('Password minimal 8 karakter.');
    return false;
  }

  if (pass.value !== passConfirm.value) {
    alert('Konfirmasi password tidak sesuai.');
    return false;
  }

  alert('Akun berhasil diaktivasi! Silakan lanjut ke tahap Daftar Sekolah.');
  completeStage(3);
  return false;
}

/* ─── Stage 4: Daftar Sekolah ─── */
function selectJurusan(el) {
  var grid = document.getElementById('jurusanGrid');
  grid.querySelectorAll('.ppdb-jurusan-card').forEach(function (c) {
    c.classList.remove('selected');
  });
  el.classList.add('selected');
}

function selectJalur(el, value) {
  var group = el.parentNode;
  group.querySelectorAll('.ppdb-check-label').forEach(function (l) {
    l.classList.remove('selected');
  });
  el.classList.add('selected');
}

function getSelectedJurusan() {
  var sel = document.querySelector('#jurusanGrid .ppdb-jurusan-card.selected');
  return sel ? sel.getAttribute('data-value') : null;
}

function getSelectedJalur() {
  var sel = document.querySelector('.ppdb-check-label.selected');
  if (!sel) return null;
  var onclick = sel.getAttribute('onclick');
  var match = onclick && onclick.match(/selectJalur\(this,\s*'(\w+)'\)/);
  return match ? match[1] : null;
}

function lanjutKeModul() {
  var jurusan = getSelectedJurusan();
  if (!jurusan) {
    alert('Pilih kompetensi keahlian terlebih dahulu.');
    return;
  }
  var jalur = getSelectedJalur();
  if (!jalur) {
    alert('Pilih jalur pendaftaran terlebih dahulu.');
    return;
  }
  location.href = 'ppdb-lengkapi-jalur.php?jurusan=' + encodeURIComponent(jurusan) + '&jalur=' + encodeURIComponent(jalur);
}

function getJalur() {
  var m = location.search.match(/jalur=([^&]+)/);
  return m ? decodeURIComponent(m[1]) : '';
}

function submitModul(e) {
  e.preventDefault();
  var jalur = getJalur();

  if (jalur === 'domisili') {
    var lat = document.getElementById('domLat').value;
    var lng = document.getElementById('domLng').value;
    if (!lat || !lng || lat === '-7.595') {
      showToast('Tandai lokasi tempat tinggal kamu di peta terlebih dahulu.', 'error');
      return false;
    }
  } else if (jalur === 'prestasi') {
    var prestasiNama = document.getElementById('prestasiNama');
    if (!prestasiNama.value || !prestasiNama.value.trim()) {
      showToast('Isi Nama Prestasi terlebih dahulu.', 'error');
      return false;
    }
    var sertif = document.getElementById('prestasi_file_sertif');
    if (!sertif.files || !sertif.files.length) {
      showToast('Upload Sertifikat / Piagam terlebih dahulu.', 'error');
      return false;
    }
    var inputs = document.querySelectorAll('.ppdb-mapel-input');
    var lengkap = true;
    inputs.forEach(function (input) {
      var val = parseFloat(input.value);
      if (isNaN(val) || val < 0 || val > 100) lengkap = false;
    });
    if (!lengkap) {
      showToast('Lengkapi seluruh nilai tiap mapel (semester 1\u20135) dengan angka 0 sampai 100.', 'error');
      return false;
    }
    var tkaInputs = document.querySelectorAll('.ppdb-tka-input');
    var tkaLengkap = true;
    tkaInputs.forEach(function (input) {
      var val = parseFloat(input.value);
      if (isNaN(val) || val < 0 || val > 100) tkaLengkap = false;
    });
    if (!tkaLengkap) {
      showToast('Lengkapi seluruh nilai TKA (7 mapel utama: PAI, PPKn, B. Indonesia, MTK, IPA, IPS, B. Inggris) dengan angka 0 sampai 100.', 'error');
      return false;
    }
  } else if (jalur === 'afirmasi') {
    if (!selectedAfirmasi) {
      showToast('Pilih jenis afirmasi terlebih dahulu.', 'error');
      return false;
    }

    if (selectedAfirmasi === 'kip') {
      var noKip = document.getElementById('afirmasi_no_kip');
      var noKks = document.getElementById('afirmasi_no_kks');
      if (!noKip.value.trim() || !noKks.value.trim()) {
        showToast('Upload Kartu KIP lalu isi No. KIP dan No. KKS / SKTM terlebih dahulu.', 'error');
        return false;
      }
      var kipFile = document.getElementById('afirmasi_file_kip');
      var listrikFile = document.getElementById('afirmasi_file_listrik');
      var airFile = document.getElementById('afirmasi_file_air');
      if (!kipFile.files || !kipFile.files.length || !listrikFile.files || !listrikFile.files.length || !airFile.files || !airFile.files.length) {
        showToast('Upload semua dokumen (Kartu KIP, Tagihan Listrik, Tagihan Air).', 'error');
        return false;
      }
    } else if (selectedAfirmasi === 'panti') {
      var alamatPanti = document.getElementById('afirmasi_alamat_panti');
      if (!alamatPanti.value.trim()) {
        showToast('Isi Alamat Panti Asuhan terlebih dahulu.', 'error');
        return false;
      }
      var suratPanti = document.getElementById('afirmasi_file_surat_panti');
      if (!suratPanti.files || !suratPanti.files.length) {
        showToast('Upload Surat dari Panti terlebih dahulu.', 'error');
        return false;
      }
    } else if (selectedAfirmasi === 'disabilitas') {
      var suratDokter = document.getElementById('afirmasi_file_surat_dokter');
      if (!suratDokter.files || !suratDokter.files.length) {
        showToast('Upload Surat Keterangan Dokter terlebih dahulu.', 'error');
        return false;
      }
    }
  }

  alert('Data berhasil disimpan! Silakan pantau peringkat kamu di Jurnal Seleksi.');
  completeStage(4);
  location.href = 'ppdb-jurnal.php';
  return false;
}

/* ─── Modul helpers (Domisili / Afirmasi / Prestasi) ─── */
var selectedAfirmasi = '';
var AFIRMASI_LABEL = {
  kip: 'KIP / PIP / PKH',
  panti: 'Panti Asuhan',
  disabilitas: 'Disabilitas'
};

function pilihAfirmasi(el, value) {
  var grid = el.parentNode;
  grid.querySelectorAll('.ppdb-modul-radio').forEach(function (r) {
    r.classList.remove('selected');
  });
  el.classList.add('selected');
  selectedAfirmasi = value;

  var sections = { kip: 'afirmasiSectionKip', panti: 'afirmasiSectionPanti', disabilitas: 'afirmasiSectionDisabilitas' };
  Object.keys(sections).forEach(function (k) {
    var sec = document.getElementById(sections[k]);
    if (sec) sec.style.display = k === value ? 'block' : 'none';
  });

  var status = document.getElementById('afirmasiJenisStatus');
  if (status) {
    status.textContent = AFIRMASI_LABEL[value] || value;
    status.className = 'ppdb-modul-status ppdb-status-aman';
  }
}

function aktifkanNoProgram(input) {
  var hasFile = !!(input.files && input.files.length);
  var fields = ['afirmasi_no_kip', 'afirmasi_no_kks'];
  fields.forEach(function (id) {
    var field = document.getElementById(id);
    if (field) field.disabled = !hasFile;
  });
  var preview = document.getElementById('afirmasi_preview_kip');
  if (!hasFile && preview) preview.style.display = 'none';
}

/* ─── Peta Interaktif Domisili ─── */
var domMap, domMarker, domMapInitialized = false;
var SCHOOL_LAT = -7.595;
var SCHOOL_LNG = 110.945;

function initDomMap() {
  if (domMapInitialized) return;
  domMapInitialized = true;

  domMap = L.map('domMap', {
    center: [SCHOOL_LAT, SCHOOL_LNG],
    zoom: 14,
    dragging: false,
    scrollWheelZoom: false,
    touchZoom: false,
    doubleClickZoom: false,
    keyboard: false
  });

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap',
    maxZoom: 19
  }).addTo(domMap);

  L.marker([SCHOOL_LAT, SCHOOL_LNG], {
    icon: L.divIcon({
      className: 'ppdb-map-school',
      html: '<span class="material-symbols-outlined" style="font-size:1.5rem;color:#006e2f;background:#fff;border-radius:50%;padding:4px;box-shadow:0 2px 8px rgba(0,0,0,0.15);">school</span>',
      iconSize: [32, 32],
      iconAnchor: [16, 16]
    })
  }).addTo(domMap).bindPopup('<strong>SMKN 2 Karanganyar</strong>');
}

function cariLokasi() {
  var kecamatan = document.getElementById('domKec').value;
  var desa = document.getElementById('domDesa').value.trim();
  var alamat = document.getElementById('domAlamat').value.trim();

  if (!kecamatan) {
    showToast('Pilih Kecamatan terlebih dahulu.', 'error');
    return;
  }
  if (!desa) {
    showToast('Isi Kelurahan / Desa terlebih dahulu.', 'error');
    return;
  }

  var btn = document.getElementById('btnCariLokasi');
  btn.disabled = true;
  btn.innerHTML = '<span class="material-symbols-outlined" style="animation:ppdbSpin 1s linear infinite;">radar</span> Mencari...';

  var query = alamat ? desa + ', ' + kecamatan + ', ' + alamat : desa + ', ' + kecamatan + ', Karanganyar, Indonesia';
  var url = 'https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(query) + '&limit=1';

  ambilDataKecamatan(function (mapKec) {
    fetch(url)
      .then(function (res) { return res.json(); })
      .then(function (data) {
        if (data && data.length > 0) {
          var lat = parseFloat(data[0].lat);
          var lng = parseFloat(data[0].lon);
          tempatkanMarker(lat, lng);
        } else {
          fallbackKecamatan(kecamatan, mapKec);
        }
      })
      .catch(function () {
        fallbackKecamatan(kecamatan, mapKec);
      })
      .finally(function () {
        btn.disabled = false;
        btn.innerHTML = '<span class="material-symbols-outlined">search</span> Cari & Tandai di Peta';
      });
  });
}

function ambilDataKecamatan(callback) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', '../assets/koordinat-kecamatan.json?_=' + Date.now(), true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      callback(JSON.parse(xhr.responseText));
    } else {
      callback(null);
    }
  };
  xhr.onerror = function () { callback(null); };
  xhr.send();
}

function fallbackKecamatan(kecamatan, mapKec) {
  if (mapKec && mapKec[kecamatan]) {
    var koord = mapKec[kecamatan];
    tempatkanMarker(koord[0], koord[1]);
    showToast('Lokasi tepat tidak ditemukan. Peta diarahkan ke Kecamatan ' + kecamatan + '. Klik peta untuk menyesuaikan.', 'error');
  } else {
    showToast('Klik pada peta untuk menandai lokasi kamu.', 'error');
  }
}

function tempatkanMarker(lat, lng) {
  var latFmt = lat.toFixed(6);
  var lngFmt = lng.toFixed(6);

  document.getElementById('domLat').value = latFmt;
  document.getElementById('domLng').value = lngFmt;

  domMap.flyTo([lat, lng], 15, { duration: 1.2 });

  if (domMarker) {
    domMarker.setLatLng([lat, lng]);
  } else {
    domMarker = L.marker([lat, lng], {
      icon: L.divIcon({
        className: 'ppdb-map-marker',
        html: '<span class="material-symbols-outlined" style="font-size:2rem;color:#dc2626;filter:drop-shadow(0 2px 4px rgba(0,0,0,0.3));">location_on</span>',
        iconSize: [32, 40],
        iconAnchor: [16, 40]
      })
    }).addTo(domMap);

    domMap.on('click', function (e) {
      tempatkanMarker(e.latlng.lat, e.latlng.lng);
    });
  }

  document.getElementById('mapStatus').textContent = 'Tertandai';
  document.getElementById('mapStatus').className = 'ppdb-modul-status ppdb-status-aman';

  var kecamatan = document.getElementById('domKec').value || 'Kecamatan terpilih';
  updateDomisiliResult(lat, lng, kecamatan);
  showToast('Lokasi ditemukan: ' + latFmt + ', ' + lngFmt, 'success');
}

function updateDomisiliResult(lat, lng, kecamatan) {
  var jarak = hitungJarak(lat, lng, SCHOOL_LAT, SCHOOL_LNG);
  var jarakBulat = Math.round(jarak);

  var gpsStatus = document.getElementById('validasiGpsStatus');
  var gpsIcon = document.getElementById('validasiGpsIcon');
  var gpsIconBig = document.getElementById('validasiGpsIconBig');
  var gpsText = document.getElementById('validasiGpsText');
  var jarakStatus = document.getElementById('jarakStatus');
  var jarakAngka = document.getElementById('jarakAngka');
  var deteksiStatus = document.getElementById('deteksiStatus');

  gpsStatus.className = 'ppdb-modul-status ppdb-status-aman';
  gpsStatus.textContent = 'Sesuai';
  gpsIcon.textContent = 'check_circle';
  gpsIconBig.textContent = 'check_circle';
  gpsText.textContent = 'Koordinat sesuai wilayah ' + kecamatan;

  jarakStatus.textContent = 'Dihitung';
  jarakStatus.className = 'ppdb-modul-status ppdb-status-aman';
  jarakAngka.textContent = jarakBulat.toLocaleString('id-ID');

  document.getElementById('cekVpn').querySelector('.material-symbols-outlined').style.color = '#22c55e';
  document.getElementById('cekVpn').querySelector('.material-symbols-outlined').textContent = 'check_circle';
  document.getElementById('cekGps').querySelector('.material-symbols-outlined').style.color = '#22c55e';
  document.getElementById('cekGps').querySelector('.material-symbols-outlined').textContent = 'check_circle';
  document.getElementById('cekIp').querySelector('.material-symbols-outlined').style.color = '#22c55e';
  document.getElementById('cekIp').querySelector('.material-symbols-outlined').textContent = 'check_circle';
  deteksiStatus.className = 'ppdb-modul-status ppdb-status-aman';
  deteksiStatus.textContent = 'Aman';
}

function hitungJarak(lat1, lng1, lat2, lng2) {
  var R = 6371000;
  var dLat = (lat2 - lat1) * Math.PI / 180;
  var dLng = (lng2 - lng1) * Math.PI / 180;
  var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
          Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
          Math.sin(dLng / 2) * Math.sin(dLng / 2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  return R * c;
}

document.addEventListener('DOMContentLoaded', function () {
  var domMapEl = document.getElementById('domMap');
  if (domMapEl) initDomMap();
});

function showToast(message, type) {
  var container = document.getElementById('ppdbToast');
  var icons = { error: 'warning', success: 'check_circle' };
  var toast = document.createElement('div');
  toast.className = 'ppdb-toast-item ppdb-toast-' + type;
  toast.innerHTML =
    '<span class="material-symbols-outlined">' + (icons[type] || 'info') + '</span>' +
    '<span>' + message + '</span>';
  container.appendChild(toast);

  setTimeout(function () {
    toast.classList.add('ppdb-toast-out');
    setTimeout(function () {
      if (toast.parentNode) toast.remove();
    }, 300);
  }, 5000);
}

/* ─── Nilai Akademik per Mapel (Jalur Prestasi) ─── */
var poinPrestasiFinal = null;
var poinSertifikatFinal = null;

document.addEventListener('input', function (e) {
  if (e.target.classList && (e.target.classList.contains('ppdb-mapel-input') || e.target.classList.contains('ppdb-tka-input'))) {
    hitungNilaiAkademik();
  }
});

function hitungNilaiAkademik() {
  var perSmt = [0, 0, 0, 0, 0];
  var countSmt = [0, 0, 0, 0, 0];
  var terisi = 0;

  var inputs = document.querySelectorAll('.ppdb-mapel-input');
  inputs.forEach(function (input) {
    var smt = parseInt(input.getAttribute('data-semester'), 10) - 1;
    var val = parseFloat(input.value);
    if (isNaN(val) || val < 0 || val > 100) return;
    perSmt[smt] += val;
    countSmt[smt]++;
    terisi++;
  });

  var total = 0;
  var count = 0;
  for (var s = 0; s < 5; s++) {
    var avg = countSmt[s] ? (perSmt[s] / countSmt[s]).toFixed(2) : 0;
    document.getElementById('smtAvg' + (s + 1)).textContent = avg;
    if (countSmt[s]) {
      total += parseFloat(avg);
      count++;
    }
  }

  var rata = count ? (total / count).toFixed(2) : 0;
  document.getElementById('rataRapor').textContent = rata;
  document.getElementById('poinRapor').textContent = rata;

  var tkaTerisi = 0;
  var tkaTotal = 0;
  document.querySelectorAll('.ppdb-tka-input').forEach(function (input) {
    var val = parseFloat(input.value);
    if (isNaN(val) || val < 0 || val > 100) return;
    tkaTotal += val;
    tkaTerisi++;
  });

  var tka = tkaTerisi ? (tkaTotal / tkaTerisi).toFixed(2) : 0;
  document.getElementById('tkaAvg').textContent = tka;
  document.getElementById('poinTka').textContent = tka;
  document.getElementById('hasilRataTka').style.display = tkaTerisi > 0 ? 'block' : 'none';

  if (terisi > 0 || tkaTerisi > 0) {
    document.getElementById('hasilRataRapor').style.display = 'block';

    if (poinPrestasiFinal === null) {
      poinPrestasiFinal = Math.floor(Math.random() * 40 + 10);
      poinSertifikatFinal = Math.floor(Math.random() * 20 + 5);
    }
    document.getElementById('poinPrestasi').textContent = poinPrestasiFinal;
    document.getElementById('poinSertifikat').textContent = poinSertifikatFinal;
    document.getElementById('poinTotal').textContent = (parseFloat(rata) * 0.5 + parseFloat(tka) * 0.5 + poinPrestasiFinal + poinSertifikatFinal).toFixed(2);
  } else {
    document.getElementById('hasilRataRapor').style.display = 'none';
  }
}

/* ─── Stage 5: Hasil Seleksi ─── */
function cekHasil() {
  var nisn = document.getElementById('cariNisn').value.trim();
  if (!nisn || nisn.length < 5) {
    alert('Masukkan NISN yang valid (minimal 5 digit).');
    return;
  }

  document.getElementById('hasilNisn').textContent = nisn;
  var container = document.getElementById('hasilContainer');
  container.style.display = 'block';
  setTimeout(function () {
    container.scrollIntoView({ behavior: 'smooth', block: 'center' });
  }, 100);
}

/* ─── Stage 6: Daftar Ulang ─── */
function submitStage6(e) {
  e.preventDefault();
  var nisn = document.getElementById('du_nisn');
  var nama = document.getElementById('du_nama');
  var hp = document.getElementById('du_no_hp');
  var syarat = document.getElementById('du_syarat');

  if (!nisn.value.trim() || !nama.value.trim() || !hp.value.trim()) {
    alert('Harap lengkapi data diri.');
    return false;
  }

  if (!syarat.checked) {
    alert('Centang pernyataan di atas untuk melanjutkan.');
    return false;
  }

  alert('Daftar ulang berhasil! Selamat bergabung di SMKN 2 Karanganyar.');
  completeStage(6);
  return false;
}

/* ─── File upload handler ─── */
function handleUpload(input, previewId) {
  var preview = document.getElementById(previewId);
  if (!input.files || !input.files.length) {
    preview.style.display = 'none';
    return;
  }

  var file = input.files[0];
  var maxSize = 2 * 1024 * 1024;

  if (file.size > maxSize) {
    alert('Ukuran file maksimal 2 MB. File kamu terlalu besar.');
    input.value = '';
    preview.style.display = 'none';
    return;
  }

  var sizeStr = file.size < 1024 * 1024
    ? Math.round(file.size / 1024) + ' KB'
    : (file.size / (1024 * 1024)).toFixed(1) + ' MB';

  preview.style.display = 'flex';
  preview.innerHTML =
    '<span class="material-symbols-outlined" style="font-size:1.5rem;color:var(--primary-dark);flex-shrink:0;">description</span>' +
    '<div class="file-info">' +
      '<div class="file-name">' + file.name + '</div>' +
      '<div class="file-size">' + sizeStr + '</div>' +
    '</div>' +
    '<button type="button" class="file-remove" onclick="removeFile(\'' + input.id + '\', \'' + previewId + '\')">' +
      '<span class="material-symbols-outlined" style="font-size:1rem;">close</span>' +
    '</button>';
}

function removeFile(inputId, previewId) {
  var input = document.getElementById(inputId);
  var preview = document.getElementById(previewId);
  input.value = '';
  preview.style.display = 'none';
}

/* ─── FAQ toggle ─── */
function toggleFaq(btn) {
  var item = btn.parentNode;
  var isOpen = item.classList.contains('open');

  document.querySelectorAll('.ppdb-faq-item.open').forEach(function (el) {
    if (el !== item) el.classList.remove('open');
  });

  if (isOpen) {
    item.classList.remove('open');
  } else {
    item.classList.add('open');
  }
}

/* ─── Chatbot ─── */
function toggleChatbot() {
  var widget = document.getElementById('ppdbChatbot');
  widget.classList.toggle('open');
  if (widget.classList.contains('open')) {
    setTimeout(function () {
      document.getElementById('ppdbChatInput').focus();
    }, 200);
  }
}

function sendChat() {
  var input = document.getElementById('ppdbChatInput');
  var msg = input.value.trim();
  if (!msg) return;

  addChatMsg(msg, 'user');
  input.value = '';

  showTyping();

  setTimeout(function () {
    hideTyping();
    var reply = getReply(msg);
    addChatMsg(reply, 'bot');
  }, 600 + Math.random() * 600);
}

function addChatMsg(text, sender) {
  var container = document.getElementById('ppdbChatMsgs');
  var div = document.createElement('div');
  div.className = 'ppdb-chat-msg ppdb-chat-' + sender;
  div.innerHTML = '<div class="ppdb-chat-bubble">' + text + '</div>';
  container.appendChild(div);
  container.scrollTop = container.scrollHeight;
}

function showTyping() {
  var container = document.getElementById('ppdbChatMsgs');
  var div = document.createElement('div');
  div.className = 'ppdb-chat-msg ppdb-chat-bot';
  div.id = 'ppdbChatTyping';
  div.innerHTML = '<div class="ppdb-chat-bubble ppdb-chat-typing"><span></span><span></span><span></span></div>';
  container.appendChild(div);
  container.scrollTop = container.scrollHeight;
}

function hideTyping() {
  var el = document.getElementById('ppdbChatTyping');
  if (el) el.remove();
}

function getReply(msg) {
  var m = msg.toLowerCase();

  if (m.includes('jadwal') || m.includes('kapan') || m.includes('tanggal') || m.includes('waktu')) {
    return 'Berikut jadwal PPDB SMKN 2 Karanganyar 2026:<br><br>1. Pengajuan Akun: 3&ndash;12 Juni<br>2. Verifikasi Akun: 4&ndash;13 Juni<br>3. Aktivasi Akun: 4&ndash;13 Juni<br>4. Daftar Sekolah: 15&ndash;18 Juni<br>5. Hasil Seleksi: 21 Juni<br>6. Daftar Ulang: 22&ndash;25 Juni';
  }

  if (m.includes('jalur') || m.includes('domisili') || m.includes('afirmasi') || m.includes('prestasi')) {
    return 'Tersedia 3 jalur pendaftaran:<br><br>• <strong>Domisili</strong> (kuota 10%) — bagi yg berdomisili di sekitar sekolah<br>• <strong>Afirmasi</strong> (kuota min 15%) — pemegang KIP/KKS<br>• <strong>Prestasi</strong> (kuota min 75%) — prestasi akademik/non-akademik';
  }

  if (m.includes('syarat') || m.includes('dokumen') || m.includes('berkas') || m.includes('upload')) {
    return 'Dokumen yang perlu disiapkan:<br><br>1. Ijazah / SKL SD/MI<br>2. Akta Kelahiran<br>3. Kartu Keluarga<br>4. KIP / KKS (jika ada)<br>5. Pas foto 3x4 latar merah<br>6. Rapor semester 1&ndash;5<br><br>Format PDF/JPEG/PNG, maks 2 MB per file.';
  }

  if (m.includes('biaya') || m.includes('gratis') || m.includes('mahal') || m.includes('bayar')) {
    return 'Pendaftaran PPDB SMKN 2 Karanganyar <strong>GRATIS</strong> tidak dipungut biaya. Hati-hati terhadap oknum yang meminta uang.';
  }

  if (m.includes('hasil') || m.includes('pengumuman') || m.includes('lolos')) {
    return 'Hasil seleksi akan diumumkan pada <strong>21 Juni 2026</strong> melalui website ini dan papan pengumuman sekolah.';
  }

  if (m.includes('token') || m.includes('aktivasi')) {
    return 'Token aktivasi didapatkan setelah verifikasi dokumen langsung di sekolah. Datang ke SMKN 2 Karanganyar dengan dokumen asli dan fotokopi.';
  }

  if (m.includes('password') || m.includes('lupa')) {
    return 'Fitur reset password masih dalam pengembangan. Silakan hubungi panitia PPDB di sekolah untuk bantuan pengaturan ulang password.';
  }

  if (m.includes('daftar ulang') || m.includes('ulang')) {
    return 'Daftar ulang dilaksanakan pada <strong>22&ndash;25 Juni 2026</strong> bagi yang lolos seleksi. Jangan lewatkan batas waktu atau kelulusan akan dibatalkan.';
  }

  return 'Maaf, saya belum bisa menjawab pertanyaan itu. Silakan hubungi panitia PPDB di sekolah atau cek bagian FAQ di halaman ini.';
}
