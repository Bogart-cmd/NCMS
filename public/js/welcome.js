let slideIndex = 0;

function showSlides() {
  const slides = document.getElementsByClassName("mySlides");
  const dots = document.getElementsByClassName("dot");

  // No slides present; nothing to do
  if (!slides || slides.length === 0) {
    return;
  }

  for (let i = 0; i < slides.length; i++) {
    if (slides[i] && slides[i].style) {
      slides[i].style.display = "none";
    }
  }

  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }

  // Safely update dot states if present
  if (dots && dots.length > 0) {
    for (let i = 0; i < dots.length; i++) {
      if (dots[i] && dots[i].className) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
    }
  }

  const activeIdx = slideIndex - 1;
  if (slides[activeIdx] && slides[activeIdx].style) {
    slides[activeIdx].style.display = "block";
  }
  if (dots && dots[activeIdx] && dots[activeIdx].className !== undefined) {
    dots[activeIdx].className += " active";
  }

  setTimeout(showSlides, 3000); // Change image every 3 seconds
}

// Start slideshow after DOM is ready to ensure elements are present
document.addEventListener('DOMContentLoaded', function () {
  slideIndex = 0;
  try { showSlides(); } catch (_) {}
});

// Hamburger menu functionality
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('nav-menu');
    
    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });
        
        // Close menu when clicking on a link
        const navLinks = navMenu.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!hamburger.contains(event.target) && !navMenu.contains(event.target)) {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            }
        });
    }
});

function handleShortcutKeydown(event) {
  // Don't trigger while typing in form fields
  const activeTag = document.activeElement && document.activeElement.tagName;
  if (["INPUT", "TEXTAREA", "SELECT", "BUTTON"].includes(activeTag)) return;

  const key = String(event.key || '').toLowerCase();
  const code = String(event.code || '').toLowerCase();
  const isL = key === 'l' || code === 'keyl';

  // Ignore ctrl+l (address bar)
  if (isL && (event.metaKey || (event.ctrlKey && !event.shiftKey && !event.altKey))) return;

  const combos = [
    event.ctrlKey && event.shiftKey && isL,
    event.altKey && event.shiftKey && isL,
    event.ctrlKey && event.altKey && isL,
  ];

  if (combos.some(Boolean)) {
    try {
      event.preventDefault();
      event.stopPropagation();
    } catch (_) {}
    // Debug signal (remove later if noisy)
    if (typeof console !== 'undefined' && console.debug) {
      console.debug('Admin login shortcut detected', { key, code, ctrl: event.ctrlKey, shift: event.shiftKey, alt: event.altKey });
    }
    window.location.assign('/login-user');
  }
}

// Attach both capture and bubble on window and document to survive stopPropagation
window.addEventListener('keydown', handleShortcutKeydown, true);
window.addEventListener('keydown', handleShortcutKeydown, false);
document.addEventListener('keydown', handleShortcutKeydown, true);
document.addEventListener('keydown', handleShortcutKeydown, false);
