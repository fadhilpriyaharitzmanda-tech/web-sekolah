/**
 * SweetAlert2 Helper & Custom Configuration
 * SMKN 2 Karanganyar Admin Panel
 */

// Custom SweetAlert Theme Defaults
const SwalTheme = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success px-4 py-2 me-2 fw-semibold',
    cancelButton: 'btn btn-secondary px-4 py-2 fw-semibold',
    popup: 'rounded-4 shadow-lg border-0'
  },
  buttonsStyling: true,
  confirmButtonColor: '#0b6e3f',
  cancelButtonColor: '#6c757d'
});

// Toast Helper (Floating alert on top right)
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer);
    toast.addEventListener('mouseleave', Swal.resumeTimer);
  }
});

function showToast(message, type = 'success') {
  return Toast.fire({
    icon: type,
    title: message
  });
}

function swalSuccess(message, title = 'Berhasil!') {
  return SwalTheme.fire({
    title: title,
    html: message,
    icon: 'success',
    confirmButtonText: 'Mengerti',
    confirmButtonColor: '#0b6e3f'
  });
}

function swalError(message, title = 'Gagal!') {
  return SwalTheme.fire({
    title: title,
    html: message,
    icon: 'error',
    confirmButtonText: 'Tutup',
    confirmButtonColor: '#dc3545'
  });
}

function swalWarning(message, title = 'Peringatan!') {
  return SwalTheme.fire({
    title: title,
    html: message,
    icon: 'warning',
    confirmButtonText: 'Mengerti',
    confirmButtonColor: '#eab308'
  });
}

function swalInfo(message, title = 'Informasi') {
  return SwalTheme.fire({
    title: title,
    html: message,
    icon: 'info',
    confirmButtonText: 'Tutup',
    confirmButtonColor: '#0b6e3f'
  });
}

/**
 * Percabangan Iya / Tidak (Confirmation Dialog)
 * @param {Object} options { title, text, confirmText, cancelText, icon, isDanger }
 * @param {Function} onConfirm Callback when user clicks 'Iya'
 * @param {Function} onCancel Callback when user clicks 'Tidak'
 * @returns {Promise<boolean>}
 */
function swalConfirm(options, onConfirm, onCancel) {
  const isDanger = options.isDanger !== false;
  const config = {
    title: options.title || 'Konfirmasi Tindakan',
    html: options.text || options.html || 'Apakah Anda yakin ingin melanjutkan?',
    icon: options.icon || (isDanger ? 'warning' : 'question'),
    showCancelButton: true,
    confirmButtonText: options.confirmText || (isDanger ? 'Iya, Lanjutkan' : 'Iya'),
    cancelButtonText: options.cancelText || 'Tidak, Batalkan',
    confirmButtonColor: isDanger ? '#dc3545' : '#0b6e3f',
    cancelButtonColor: '#6c757d',
    reverseButtons: true,
    customClass: {
      confirmButton: isDanger ? 'btn btn-danger px-4 py-2 me-2 fw-semibold' : 'btn btn-success px-4 py-2 me-2 fw-semibold',
      cancelButton: 'btn btn-secondary px-4 py-2 fw-semibold',
      popup: 'rounded-4 shadow-lg border-0'
    }
  };

  return Swal.fire(config).then((result) => {
    if (result.isConfirmed) {
      if (typeof onConfirm === 'function') onConfirm();
      return true;
    } else {
      if (typeof onCancel === 'function') onCancel();
      return false;
    }
  });
}

// Seamlessly enhance standard window.alert with SweetAlert2
window.nativeAlert = window.alert;
window.alert = function (message) {
  if (typeof Swal !== 'undefined') {
    const text = String(message || '');
    let icon = 'info';
    let title = 'Pemberitahuan';
    let btnColor = '#0b6e3f';

    const lower = text.toLowerCase();
    if (lower.includes('berhasil') || lower.includes('sukses') || lower.includes('success')) {
      icon = 'success';
      title = 'Berhasil!';
    } else if (lower.includes('gagal') || lower.includes('error') || lower.includes('salah')) {
      icon = 'error';
      title = 'Terjadi Kesalahan!';
      btnColor = '#dc3545';
    } else if (lower.includes('peringatan') || lower.includes('wajib') || lower.includes('harap') || lower.includes('silakan')) {
      icon = 'warning';
      title = 'Perhatian!';
      btnColor = '#eab308';
    }

    return Swal.fire({
      title: title,
      html: text,
      icon: icon,
      confirmButtonText: 'Tutup',
      confirmButtonColor: btnColor,
      customClass: {
        confirmButton: 'btn btn-success px-4 py-2 fw-semibold',
        popup: 'rounded-4 shadow-lg border-0'
      }
    });
  } else {
    window.nativeAlert(message);
  }
};
