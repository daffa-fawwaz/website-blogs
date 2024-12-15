const layoutNav = document.getElementById("layout-navbar")
const btnHome = document.getElementById("home")
const nav = document.getElementById("nav-home")
const hiddenNav = document.getElementsByClassName("hidden-nav")

btnHome.addEventListener("mouseenter", function() {
    layoutNav.classList.remove("hidden")
})

for(let i = 0; i < hiddenNav.length; i++ ) {
    hiddenNav[i].addEventListener("mouseenter", function() {
        layoutNav.classList.add("hidden")
    })
}

layoutNav.addEventListener("mouseenter", function(e) {
    layoutNav.classList.remove("hidden")
})

layoutNav.addEventListener("mouseleave", function() {
    layoutNav.classList.add("hidden")
})

nav.addEventListener("mouseleave", function() {
    layoutNav.classList.add("hidden")
})