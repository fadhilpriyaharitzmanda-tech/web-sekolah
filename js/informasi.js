// === BERITA ===
function filterKategori(btn, kategori) {
  document.querySelectorAll('#kategoriFilter button').forEach(function(b) {
    b.classList.remove('active');
  });
  btn.classList.add('active');
  var cards = document.querySelectorAll('#beritaGrid .news-card');
  cards.forEach(function(card) {
    if (kategori === 'all' || card.getAttribute('data-kategori') === kategori) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
    }
  });
}

function filterBerita() {
  var input = document.getElementById('searchInput').value.toLowerCase();
  var cards = document.querySelectorAll('#beritaGrid .news-card');
  cards.forEach(function(card) {
    var title = card.querySelector('.news-card-title').textContent.toLowerCase();
    var desc = card.querySelector('.news-card-desc').textContent.toLowerCase();
    var tag = card.querySelector('.news-card-tag').textContent.toLowerCase();
    if (title.includes(input) || desc.includes(input) || tag.includes(input)) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
    }
  });
}

// === PENGUMUMAN ===
function filterPeng(btn, kategori) {
  document.querySelectorAll('#pengFilter button').forEach(function(b) { b.classList.remove('active'); });
  btn.classList.add('active');
  applyPengFilters(kategori, document.getElementById('pengSearch').value.toLowerCase());
}

function filterPengBySearch() {
  var aktif = document.querySelector('#pengFilter button.active');
  var kategori = aktif ? aktif.getAttribute('data-kategori') : 'all';
  applyPengFilters(kategori, document.getElementById('pengSearch').value.toLowerCase());
}

function applyPengFilters(kategori, search) {
  var cards = document.querySelectorAll('#pengGrid .peng-card');
  var visible = 0;
  cards.forEach(function(card) {
    var matchKat = kategori === 'all' || card.getAttribute('data-kategori') === kategori;
    var matchSearch = card.querySelector('h3').textContent.toLowerCase().includes(search) ||
                      card.querySelector('p').textContent.toLowerCase().includes(search);
    if (matchKat && matchSearch) {
      card.style.display = '';
      visible++;
    } else {
      card.style.display = 'none';
    }
  });
  document.getElementById('pengEmpty').style.display = visible > 0 ? 'none' : 'block';
}
