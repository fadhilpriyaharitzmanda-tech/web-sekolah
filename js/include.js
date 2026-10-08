function setActiveNav(page) {
  var links = document.querySelectorAll('[data-page="' + page + '"]');
  links.forEach(function(el) { el.classList.add('active'); });
}

function toggleDrawer() {
  var drawer = document.getElementById('drawer');
  var overlay = document.getElementById('drawerOverlay');
  var isOpen = !drawer.classList.contains('open');
  drawer.classList.toggle('open', isOpen);
  overlay.classList.toggle('open', isOpen);
}

function toggleDrawerSubnav(btn) {
  var parent = btn.closest('.drawer-subnav');
  if (parent) parent.classList.toggle('open');
}

function initScrollHeader() {
  var header = document.getElementById('header');
  if (!header) return;
  function onScroll() {
    header.classList.toggle('scrolled', window.scrollY > 50);
  }
  window.addEventListener('scroll', onScroll);
  onScroll();
}

function initFadeIn() {
  var observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.1 });
  document.querySelectorAll('section').forEach(function(section) {
    var rect = section.getBoundingClientRect();
    if (rect.top < window.innerHeight) {
      section.classList.add('visible');
    } else {
      section.classList.add('fade-in');
      observer.observe(section);
    }
  });
}

function initBackToTop() {
  var btn = document.getElementById('backToTop');
  if (!btn) return;
  window.addEventListener('scroll', function() {
    btn.classList.toggle('show', window.scrollY > 500);
  });
  btn.addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}

function initDrawerLinks() {
  document.querySelectorAll('.drawer-nav a').forEach(function(link) {
    link.addEventListener('click', function() {
      toggleDrawer();
    });
  });
}

function initEntrance() {
  var main = document.querySelector('main');
  if (!main) return;
  var target = main.querySelector(':scope > section:first-child, :scope > .container:first-child');
  if (!target) return;
  var rect = target.getBoundingClientRect();
  if (rect.top >= window.innerHeight) return;
  var container = target.querySelector('.hero-entrance') || target.querySelector(':scope > .container') || target;
  var items = container.children;
  for (var i = 0; i < items.length && i < 8; i++) {
    var el = items[i];
    if (!el.style.animation) {
      el.style.animation = 'fadeUp 0.6s ease-out ' + (i * 0.1).toFixed(1) + 's both';
    }
  }
}

function initAnimate() {
  var observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      if (entry.isIntersecting) {
        animateGrid(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  document.querySelectorAll('[data-animate]').forEach(function(grid) {
    var rect = grid.getBoundingClientRect();
    if (rect.top < window.innerHeight) {
      animateGrid(grid);
    } else {
      observer.observe(grid);
    }
  });
  function animateGrid(grid) {
    var items = grid.children;
    for (var i = 0; i < items.length && i < 10; i++) {
      items[i].style.animation = 'fadeUp 0.5s ease-out ' + (i * 0.1).toFixed(1) + 's both';
    }
  }
}

function initPage(pageName) {
  if (pageName) setActiveNav(pageName);
  initEntrance();
  initAnimate();
  initScrollHeader();
  initBackToTop();
  initFadeIn();
  initDrawerLinks();
}
