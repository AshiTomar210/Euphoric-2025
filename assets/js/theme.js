const themeToggle = document.getElementById("theme-toggle");
const themeIcon = document.getElementById("theme-icon");
// Apply saved theme on page load
const savedTheme = localStorage.getItem("theme");
if (savedTheme === "dark") {
  document.body.classList.add("dark-mode");
  document.body.classList.remove("light-mode");
  if (themeIcon) themeIcon.textContent = "☀️";
} else {
  document.body.classList.remove("dark-mode");
  document.body.classList.add("light-mode");
  if (themeIcon) themeIcon.textContent = "🌙";
}
// Theme toggle event listener
if (themeToggle && themeIcon) {
  themeToggle.addEventListener("click", function () {
    const isDark = document.body.classList.toggle("dark-mode");
    document.body.classList.toggle("light-mode", !isDark);
    themeIcon.textContent = isDark ? "☀️" : "🌙";
    localStorage.setItem("theme", isDark ? "dark" : "light");
  });
}
