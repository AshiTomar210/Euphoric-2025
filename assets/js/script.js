document.addEventListener("DOMContentLoaded", function () {
  // Determine correct base path for includes
  let basePath = location.pathname.includes("/includes/") ? "../" : "./";

  // Load Navbar
  fetch(basePath + "navbar.html")
    .then(response => {
      if (!response.ok) throw new Error("Failed to load navbar.html");
      return response.text();
    })
    .then(data => {
      const navbarContainer = document.getElementById("navbar-container");
      if (navbarContainer) {
        navbarContainer.innerHTML = data;

        // Navbar menu toggle
        const menuTrigger = document.getElementById("menu-trigger");
        const navbarLinks = document.querySelector(".navbar-links");
        if (menuTrigger && navbarLinks) {
          menuTrigger.addEventListener("click", function (event) {
            event.preventDefault();
            navbarLinks.classList.toggle("active");
          });
        }

        // Theme toggle logic with localStorage
        const toggle = document.getElementById("theme-toggle");
        const savedTheme = localStorage.getItem("theme");

        if (savedTheme === "light") {
          document.body.classList.add("light-mode");
          if (toggle) toggle.checked = true;
        } else {
          document.body.classList.remove("light-mode");
          if (toggle) toggle.checked = false;
        }

        if (toggle) {
          toggle.addEventListener("change", function () {
            if (toggle.checked) {
              document.body.classList.add("light-mode");
              localStorage.setItem("theme", "light");
            } else {
              document.body.classList.remove("light-mode");
              localStorage.setItem("theme", "dark");
            }
          });
        }
      }
    })
    .catch(error => {
      console.error("Navbar Load Error:", error);
    });

  // Load Footer
  fetch(basePath + "footer.html")
    .then(response => {
      if (!response.ok) throw new Error("Failed to load footer.html");
      return response.text();
    })
    .then(data => {
      const footerContainer = document.getElementById("footer-container");
      if (footerContainer) {
        footerContainer.innerHTML = data;
      }
    })
    .catch(error => {
      console.error("Footer Load Error:", error);
    });
});
