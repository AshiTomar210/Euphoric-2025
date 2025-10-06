// Simple auth check: redirect to login if not authenticated
// if (!localStorage.getItem('isAuthenticated') && !window.location.pathname.endsWith('login.html') && !window.location.pathname.endsWith('signup.html')) {
//     window.location.href = 'login.html';
// }

if (
  !localStorage.getItem('isAuthenticated') &&
  !window.location.pathname.endsWith('login.html') &&
  !window.location.pathname.endsWith('signup.html') &&
  !window.location.pathname.endsWith('index.html') &&
  !window.location.pathname.endsWith('rules.html')
) {
  window.location.href = 'login.html';
}


// Load Navbar
fetch('navbar.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('navbar-container').innerHTML = data;
        const menuTrigger = document.getElementById('menu-trigger');
        if (menuTrigger) {
            menuTrigger.addEventListener('click', toggleMenu);
        }
    });

// Load Footer
fetch('footer.html')
    .then(response => response.text())
    .then(data => document.getElementById('footer-container').innerHTML = data);

// Slider JS
const slider = document.querySelector('.slider');
const images = document.querySelectorAll('.slider img');
const dots = document.querySelectorAll('.dot');
let counter = 0;

function slide() {
    slider.style.transform = `translateX(-${counter * 100}%)`;
    dots.forEach(dot => dot.classList.remove('active'));
    dots[counter].classList.add('active');
}

function nextSlide() {
    counter = (counter + 1) % images.length;
    slide();
}

function prevSlide() {
    counter = (counter - 1 + images.length) % images.length;
    slide();
}

images.forEach((img, index) => {
    img.addEventListener('click', () => {
        counter = index;
        slide();
        clearInterval(autoSlide); //Stop auto slide when image is clicked.
        autoSlide = setInterval(nextSlide, 3000); //Restart auto slide after 3 sec.
    });
});

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        counter = index;
        slide();
        clearInterval(autoSlide);
        autoSlide = setInterval(nextSlide, 3000);
    });
});

let autoSlide = setInterval(nextSlide, 3000); // Auto slide every 3 seconds

function toggleMenu(event) {
    event.preventDefault();
    const navbarLinks = document.querySelector('.navbar-links');
    navbarLinks.classList.toggle('active');
}

// Intersection Observer for Events Animation
const eventItems = document.querySelectorAll('.event-item');

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animationPlayState = 'running';
        } else {
            entry.target.style.animationPlayState = 'paused';
        }
    });
}, { threshold: 0.1 }); // Trigger when 10% of the element is visible

eventItems.forEach(item => {
    item.style.animationPlayState = 'paused'; // Pause animation initially
    observer.observe(item);
});

// Scroll-to-top button functionality
(function() {
    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Support both possible ids used in your project
        const btn = document.getElementById('backToTop') || document.getElementById('scrollToTop');
        if (!btn) {
            console.warn('Scroll-to-top button not found');
            return;
        }

        // Ensure an accessible label exists
        if (!btn.getAttribute('aria-label')) {
            btn.setAttribute('aria-label', 'Scroll to top');
        }

        const SHOW_AFTER = 300; // px scrolled before showing button
        let lastKnownScroll = 0;
        let ticking = false;

        function updateVisibility() {
            const scrolled = window.scrollY || document.documentElement.scrollTop;
            if (scrolled > SHOW_AFTER) {
                btn.classList.add('show');
            } else {
                btn.classList.remove('show');
            }
        }

        function onScroll() {
            lastKnownScroll = window.scrollY || document.documentElement.scrollTop;
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    updateVisibility();
                    ticking = false;
                });
                ticking = true;
            }
        }

        // Listen to scroll (passive for performance)
        window.addEventListener('scroll', onScroll, { passive: true });

        // Initial check (in case page loads scrolled)
        updateVisibility();

        // Click => smooth scroll to top
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            // Smooth scroll to top
            window.scrollTo({ 
                top: 0, 
                behavior: 'smooth' 
            });
        });

        // Keyboard support (Enter or Space)
        btn.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                btn.click();
            }
        });

        // Optional: Hide when reaching top quickly
        window.addEventListener('scroll', function() {
            if ((window.scrollY || document.documentElement.scrollTop) === 0) {
                btn.classList.remove('show');
            }
        }, { passive: true });
    });

    // Fallback if DOMContentLoaded already fired
    if (document.readyState === 'loading') {
        // Do nothing, DOMContentLoaded will fire
    } else {
        // DOM is already ready
        document.dispatchEvent(new Event('DOMContentLoaded'));
    }
})();
