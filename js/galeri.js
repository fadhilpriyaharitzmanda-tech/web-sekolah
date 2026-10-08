function filterGaleri(btn, kategori) {
  document.querySelectorAll('#galeriFilter button').forEach(function(b) {
    b.classList.remove('active');
  });
  btn.classList.add('active');
  document.querySelectorAll('#galeriGrid .galeri-item').forEach(function(item) {
    if (kategori === 'all' || item.getAttribute('data-kategori') === kategori) {
      item.style.display = '';
    } else {
      item.style.display = 'none';
    }
  });
}
