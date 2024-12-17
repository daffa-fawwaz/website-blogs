const btnNavMobile = document.getElementById("btn-nav-mobile");
const btnCloseNavMobile = document.getElementById("close-navbar");
const navMobile = document.getElementById("nav-mobile");
const layout = document.getElementById("layout");

btnNavMobile.addEventListener("click", function () {
  navMobile.classList.add("translate-x-0");
  navMobile.classList.remove("-translate-x-full");
  layout.classList.remove("opacity-0");
  layout.classList.add("z-50");
});

btnCloseNavMobile.addEventListener("click", function () {
  navMobile.classList.add("-translate-x-full");
  navMobile.classList.remove("translate-x-0");
  layout.classList.add("opacity-0");
  layout.classList.remove("z-50");
});

layout.addEventListener("click", function () {
  navMobile.classList.add("-translate-x-full");
  navMobile.classList.remove("translate-x-0");
  layout.classList.add("opacity-0");
  layout.classList.remove("z-50");
});