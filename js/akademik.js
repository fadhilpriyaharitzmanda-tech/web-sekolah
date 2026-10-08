function toggleGuru(header) {
  var card = header.closest('.guru-card');
  var body = card.querySelector('.guru-card-body');
  var isOpen = card.classList.contains('open');
  document.querySelectorAll('#guruGrid .guru-card.open').forEach(function(c) {
    c.classList.remove('open');
    c.querySelector('.guru-card-body').style.maxHeight = '0px';
  });
  if (!isOpen) {
    card.classList.add('open');
    body.style.maxHeight = body.scrollHeight + 'px';
  }
}

function filterGuru() {
  var input = document.getElementById('searchGuru').value.toLowerCase();
  var kompetensi = document.getElementById('kompetensiFilter').value;
  var cards = document.querySelectorAll('#guruGrid .guru-card');
  var visible = 0;
  cards.forEach(function(card) {
    var nama = card.querySelector('h3').textContent.toLowerCase();
    var kompetensiCard = card.getAttribute('data-kompetensi');
    var matchSearch = nama.includes(input);
    var matchKompetensi = kompetensi === 'all' || kompetensiCard === kompetensi;
    if (matchSearch && matchKompetensi) {
      card.style.display = '';
      visible++;
    } else {
      card.style.display = 'none';
    }
  });
  document.getElementById('guruEmpty').style.display = visible > 0 ? 'none' : 'block';
}
