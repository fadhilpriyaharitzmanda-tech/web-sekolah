(function(){
  var carouselSlides = document.querySelectorAll('.hero-slide');
  var carouselDots = document.querySelectorAll('.hero-dot');
  var currentSlide = 0;
  var slideInterval = setInterval(nextSlide, 5000);
  var isTransitioning = false;

  window.goToSlide = function(index) {
    if (isTransitioning) return;
    isTransitioning = true;
    carouselSlides.forEach(function(s) { s.classList.remove('active'); });
    carouselDots.forEach(function(d) { d.classList.remove('active'); });
    carouselSlides[index].classList.add('active');
    carouselDots[index].classList.add('active');
    currentSlide = index;
    setTimeout(function() { isTransitioning = false; }, 800);
  };

  window.nextSlide = function() {
    goToSlide((currentSlide + 1) % carouselSlides.length);
  };

  window.prevSlide = function() {
    goToSlide((currentSlide - 1 + carouselSlides.length) % carouselSlides.length);
  };

  var rightArrow = document.querySelector('.hero-arrow-right');
  var leftArrow = document.querySelector('.hero-arrow-left');
  if (rightArrow) {
    rightArrow.addEventListener('click', function() {
      clearInterval(slideInterval);
      nextSlide();
      slideInterval = setInterval(nextSlide, 5000);
    });
  }
  if (leftArrow) {
    leftArrow.addEventListener('click', function() {
      clearInterval(slideInterval);
      prevSlide();
      slideInterval = setInterval(nextSlide, 5000);
    });
  }
  carouselDots.forEach(function(dot, i) {
    dot.addEventListener('click', function() {
      clearInterval(slideInterval);
      goToSlide(i);
      slideInterval = setInterval(nextSlide, 5000);
    });
  });

})();
