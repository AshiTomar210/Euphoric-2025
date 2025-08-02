
function getNavbarHTML() {
    const isInIncludesFolder = window.location.pathname.includes('/includes/');
    const currentPage = getCurrentPage();
    
    if (isInIncludesFolder) {
        return `
            <nav class="navbar">
                <div class="navbar-logo">
                    <img src="../img/clg logo.jpg" alt="Logo">
                </div>
                <span id="menu-trigger">&#9776;</span>
                <ul class="navbar-links">
                    <li><a href="../index.php" class="${currentPage === 'home' ? 'active' : ''}">Home</a></li>
                    <li><a href="schedule.html" class="${currentPage === 'schedule' ? 'active' : ''}">Schedule</a></li>
                    <li><a href="coordinators.html" class="${currentPage === 'coordinators' ? 'active' : ''}">Coordinators</a></li>
                    <li><a href="rules.html" class="${currentPage === 'rules' ? 'active' : ''}">Rules</a></li>
                    <a href="register-links.php"><button class="register-btn">Register</button></a>
                </ul>
            </nav>
        `;
    } else {
        return `
            <nav class="navbar">
                <div class="navbar-logo">
                    <img src="../img/clg logo.jpg" alt="Logo">
                </div>
                <span id="menu-trigger">&#9776;</span>
                <ul class="navbar-links">
                    <li><a href="index.php" class="${currentPage === 'home' ? 'active' : ''}">Home</a></li>
                    <li><a href="includes/schedule.html" class="${currentPage === 'schedule' ? 'active' : ''}">Schedule</a></li>
                    <li><a href="includes/coordinators.html" class="${currentPage === 'coordinators' ? 'active' : ''}">Coordinators</a></li>
                    <li><a href="includes/rules.html" class="${currentPage === 'rules' ? 'active' : ''}">Rules</a></li>
                    <a href="includes/register-links.php"><button class="register-btn">Register</button></a>
                </ul>
            </nav>
        `;
    }
}

function getCurrentPage() {
    const path = window.location.pathname;
    const filename = path.split('/').pop().toLowerCase();
    
    if (filename === '' || filename === 'index.html' || path.endsWith('/')) {
        return 'home';
    } else if (filename.includes('schedule')) {
        return 'schedule';
    } else if (filename.includes('coordinators')) {
        return 'coordinators';
    } else if (filename.includes('rules')) {
        return 'rules';
    }
    
    return '';
}

function loadNavbar() {
    const container = document.getElementById('navbar-container');
    if (container) {
        container.innerHTML = getNavbarHTML();
        initializeMobileMenu();
    }
}

function initializeMobileMenu() {
    const menuTrigger = document.getElementById('menu-trigger');
    const navbarLinks = document.querySelector('.navbar-links');

    if (menuTrigger && navbarLinks) {
        menuTrigger.addEventListener('click', function() {
            navbarLinks.classList.toggle('active');
        });

        const navLinks = navbarLinks.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    navbarLinks.classList.remove('active');
                }
            });
        });

        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 768) {
                if (!event.target.closest('.navbar')) {
                    navbarLinks.classList.remove('active');
                }
            }
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                navbarLinks.classList.remove('active');
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', loadNavbar);

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', loadNavbar);
} else {
    loadNavbar();
}