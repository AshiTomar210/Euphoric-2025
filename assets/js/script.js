document.addEventListener("DOMContentLoaded", function () {
  // Load Navbar
  fetch("navbar.html") // or "assets/navbar.html" based on your file structure
    .then(response => response.text())
    .then(data => {
      document.getElementById("navbar-container").innerHTML = data;

      // After navbar is loaded, attach menu click handler
      const menuTrigger = document.getElementById("menu-trigger");
      const navbarLinks = document.querySelector(".navbar-links");

      if (menuTrigger && navbarLinks) {
        menuTrigger.addEventListener("click", function (event) {
          event.preventDefault();
          navbarLinks.classList.toggle("active");
        });
      }
    });

  // Load Footer
  fetch("footer.html")
    .then(response => response.text())
    .then(data => document.getElementById("footer-container").innerHTML = data);

  // Slider and Observer code here...
});
