const nav_responsive = document.querySelector(".nav_responsive");
const navList = document.querySelector(".nav-list");

if (nav_responsive) {
  nav_responsive.addEventListener("click", () => {
    navList.classList.toggle("open");
  });
}