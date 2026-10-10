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

    var currentSlide = 0;
    var isTransitioning = false;
    var slideInterval = null;

    // Fungsi ganti ke slide tertentu
    function goToSlide(index) {
      if (isTransitioning) return;
      if (index < 0 || index >= carouselSlides.length) return;

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
      }, 800);
    }

    // Fungsi slide berikutnya
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

    // Timer interval otomatis
    function startAutoSlide() {
      stopAutoSlide();
      if (carouselSlides.length > 1) {
        slideInterval = setInterval(nextSlide, 5000);
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

    // Pause saat hover agar nyaman membaca teks slide
    if (heroSection) {
      heroSection.addEventListener('mouseenter', stopAutoSlide);
      heroSection.addEventListener('mouseleave', startAutoSlide);
    }

    // Expose fungsi ke window jika dibutuhkan dari script eksternal
    window.goToSlide = goToSlide;
    window.nextSlide = nextSlide;
    window.prevSlide = prevSlide;

    // Mulai auto-slide
    startAutoSlide();
  }

  // Jalankan ketika DOM sudah siap
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initHeroCarousel);
  } else {
    initHeroCarousel();
  }
})();
