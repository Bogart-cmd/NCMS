document.addEventListener('DOMContentLoaded', function() {
  // Enhance page-scroll scrollbar: show enlarged thumb while actively scrolling
  const scroller = document.querySelector('.page-scroll');
  if (scroller) {
    let scrollTimer = null;
    const setActive = () => {
      scroller.classList.add('is-scrolling');
      if (scrollTimer) clearTimeout(scrollTimer);
      scrollTimer = setTimeout(() => scroller.classList.remove('is-scrolling'), 350);
    };
    scroller.addEventListener('scroll', setActive, { passive: true });
    scroller.addEventListener('mouseenter', () => scroller.classList.add('is-scrolling'));
    scroller.addEventListener('mouseleave', () => scroller.classList.remove('is-scrolling'));
  }
  // Sticky header disabled; ensure no fixed-header padding remains
  document.body.classList.remove('has-fixed-header');

  const hamburger = document.getElementById('hamburger');
  const navMenu = document.getElementById('nav-menu');
  const pageScroll = document.querySelector('.page-scroll');

  if (hamburger && navMenu) {
    const toggleMenu = () => {
      hamburger.classList.toggle('active');
      navMenu.classList.toggle('active');
      if (pageScroll) {
        if (navMenu.classList.contains('active')) {
          pageScroll.classList.add('menu-open');
        } else {
          pageScroll.classList.remove('menu-open');
        }
      }
    };

    hamburger.addEventListener('click', toggleMenu);

    // Close menu when clicking a link
    const navLinks = navMenu.querySelectorAll('a');
    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
      });
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
      if (!hamburger.contains(event.target) && !navMenu.contains(event.target)) {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
        if (pageScroll) pageScroll.classList.remove('menu-open');
      }
    });
  }

  // Back-to-top button logic
  let backToTop = document.getElementById('back-to-top');
  if (!backToTop) {
    backToTop = document.createElement('button');
    backToTop.id = 'back-to-top';
    backToTop.className = 'back-to-top';
    backToTop.setAttribute('aria-label', 'Back to top');
    backToTop.innerHTML = '↑';
    document.body.appendChild(backToTop);
  }

  const toggleBackToTop = () => {
    if (window.scrollY > 400) {
      backToTop.style.display = 'flex';
    } else {
      backToTop.style.display = 'none';
    }
  };

  window.addEventListener('scroll', toggleBackToTop, { passive: true });
  toggleBackToTop();

  backToTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
});


