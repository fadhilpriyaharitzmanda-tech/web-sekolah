/**
 * Carousel Hero & Beranda Interactions - SMKN 2 Karanganyar
 * Auto-rotation slide banner hero, dots indicator, and arrow navigation.
 */
(function() {
  function initHeroCarousel() {
    var carouselSlides = document.querySelectorAll('.hero-slide');
    var carouselDots = document.querySelectorAll('.hero-dot');
    var heroSection = document.getElementById('heroCarousel');

    if (!carouselSlides || carouselSlides.length === 0) {
      return;
    }

    // Pastikan slide pertama selalu aktif di awal sesuai urutan
    var currentSlide = 0;
    var isTransitioning = false;
    var slideInterval = null;

    // Sinkronisasi kelas active di awal
    carouselSlides.forEach(function(s, idx) {
      if (idx === 0) s.classList.add('active');
      else s.classList.remove('active');
    });
    carouselDots.forEach(function(d, idx) {
      if (idx === 0) d.classList.add('active');
      else d.classList.remove('active');
    });

    // Fungsi ganti ke slide tertentu berurutan
    function goToSlide(index) {
      if (isTransitioning) return;
      if (index < 0 || index >= carouselSlides.length) return;
      if (index === currentSlide && carouselSlides[index].classList.contains('active')) return;

      isTransitioning = true;
      carouselSlides.forEach(function(s) { s.classList.remove('active'); });
      carouselDots.forEach(function(d) { d.classList.remove('active'); });

      if (carouselSlides[index]) {
        carouselSlides[index].classList.add('active');
      }
      if (carouselDots[index]) {
        carouselDots[index].classList.add('active');
      }

      currentSlide = index;
      setTimeout(function() {
        isTransitioning = false;
      }, 700);
    }

    // Fungsi slide berikutnya (berurutan 0 -> 1 -> 2 -> ... -> 0)
    function nextSlide() {
      if (carouselSlides.length <= 1) return;
      var nextIndex = (currentSlide + 1) % carouselSlides.length;
      goToSlide(nextIndex);
    }

    // Fungsi slide sebelumnya
    function prevSlide() {
      if (carouselSlides.length <= 1) return;
      var prevIndex = (currentSlide - 1 + carouselSlides.length) % carouselSlides.length;
      goToSlide(prevIndex);
    }

    // Timer interval otomatis (berjalan setiap 4 detik)
    function startAutoSlide() {
      stopAutoSlide();
      if (carouselSlides.length > 1) {
        slideInterval = setInterval(function() {
          nextSlide();
        }, 4000);
      }
    }

    function stopAutoSlide() {
      if (slideInterval) {
        clearInterval(slideInterval);
        slideInterval = null;
      }
    }

    // Event listener tombol panah kanan
    var rightArrow = document.querySelector('.hero-arrow-right');
    if (rightArrow) {
      rightArrow.addEventListener('click', function(e) {
        e.preventDefault();
        stopAutoSlide();
        nextSlide();
        startAutoSlide();
      });
    }

    // Event listener tombol panah kiri
    var leftArrow = document.querySelector('.hero-arrow-left');
    if (leftArrow) {
      leftArrow.addEventListener('click', function(e) {
        e.preventDefault();
        stopAutoSlide();
        prevSlide();
        startAutoSlide();
      });
    }

    // Event listener dots indikator
    carouselDots.forEach(function(dot, i) {
      dot.addEventListener('click', function(e) {
        e.preventDefault();
        stopAutoSlide();
        goToSlide(i);
        startAutoSlide();
      });
    });

    // Pause hanya saat kursor aktif berinteraksi di atas kontrol/tombol (bukan seluruh layar hero)
    var controls = document.querySelectorAll('.hero-arrow, .hero-dot, .hero-actions');
    controls.forEach(function(ctrl) {
      ctrl.addEventListener('mouseenter', stopAutoSlide);
      ctrl.addEventListener('mouseleave', startAutoSlide);
    });

    if (heroSection) {
      // Support navigasi keyboard panah kiri/kanan saat kursor/fokus di section hero
      heroSection.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowRight') {
          stopAutoSlide();
          nextSlide();
          startAutoSlide();
        } else if (e.key === 'ArrowLeft') {
          stopAutoSlide();
          prevSlide();
          startAutoSlide();
        }
      });

      // Support touch swipe gestures di perangkat layar sentuh / mobile
      var touchStartX = 0;
      var touchEndX = 0;
      heroSection.addEventListener('touchstart', function(e) {
        if (e.changedTouches && e.changedTouches[0]) {
          touchStartX = e.changedTouches[0].screenX;
        }
      }, { passive: true });

      heroSection.addEventListener('touchend', function(e) {
        if (e.changedTouches && e.changedTouches[0]) {
          touchEndX = e.changedTouches[0].screenX;
          var diff = touchStartX - touchEndX;
          if (Math.abs(diff) > 40) {
            stopAutoSlide();
            if (diff > 0) {
              nextSlide(); // Geser ke kiri -> slide berikutnya
            } else {
              prevSlide(); // Geser ke kanan -> slide sebelumnya
            }
            startAutoSlide();
          }
        }
      }, { passive: true });
    }

    // Expose fungsi ke window jika dibutuhkan dari script eksternal
    window.goToSlide = goToSlide;
    window.nextSlide = nextSlide;
    window.prevSlide = prevSlide;

    // Mulai auto-slide langsung saat inisialisasi
    startAutoSlide();
  }

  // Jalankan ketika DOM sudah siap
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initHeroCarousel);
  } else {
    initHeroCarousel();
  }
})();
