// Load Navbar
// fetch('navbar.html')
//     .then(response => response.text())
//     .then(data => {
//         document.getElementById('navbar-container').innerHTML = data;
//         const menuTrigger = document.getElementById('menu-trigger');
//         if (menuTrigger) {
//             menuTrigger.addEventListener('click', toggleMenu);
//         }
//     });

// Load Footer
console.log("Navbara JS loaded");

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
// ... (previous JavaScript code) ...

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

// ... (rest of your JavaScript code) ...