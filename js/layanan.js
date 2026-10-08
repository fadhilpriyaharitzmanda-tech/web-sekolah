function submitAduan(e) {
  e.preventDefault();
  document.getElementById('aduFormContent').style.display = 'none';
  document.getElementById('aduSuccess').classList.add('show');
}

function resetAduan() {
  document.getElementById('aduForm').reset();
  document.getElementById('aduFormContent').style.display = '';
  document.getElementById('aduSuccess').classList.remove('show');
}
