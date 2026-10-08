function filterPrestasi() {
  var input = document.getElementById('searchPrestasi').value.toLowerCase();
  var tingkat = document.getElementById('filterTingkat').value;
  var rows = document.querySelectorAll('.prestasi-table tbody tr');
  rows.forEach(function(row) {
    var matchSearch = false;
    row.querySelectorAll('td').forEach(function(td) {
      if (td.textContent.toLowerCase().includes(input)) matchSearch = true;
    });
    var badge = row.querySelector('.prestasi-badge');
    var matchTingkat = tingkat === 'all' || (badge && badge.textContent.trim() === tingkat);
    row.style.display = (matchSearch && matchTingkat) ? '' : 'none';
  });
}
