document.addEventListener("scroll", function () {
    const navbar = document.getElementById("mainNavbar");
    // Considera la altura del Hero Section para determinar cuándo cambiar el fondo
    const heroSection = document.querySelector("section"); // Asumiendo que tu Hero Section es el primer <section>
    const scrollPosition = window.scrollY;

    if (heroSection) {
        const heroHeight = heroSection.offsetHeight;
        if (scrollPosition > heroHeight * 0.1) {
            // Puedes ajustar este valor (0.6)
            navbar.classList.remove("bg-transparent");
            navbar.classList.add(
                "bg-white/30",
                "backdrop-blur-md",
                "shadow-md"
            );
        } else {
            navbar.classList.add("bg-transparent");
            navbar.classList.remove(
                "bg-white/30",
                "backdrop-blur-md",
                "shadow-md"
            );
        }
    } else if (scrollPosition > 50) {
        // Si no hay Hero Section, cambia con un scroll pequeño
        navbar.classList.remove("bg-transparent");
        navbar.classList.add("bg-white/30", "backdrop-blur-md", "shadow-md");
    } else {
        navbar.classList.add("bg-transparent");
        navbar.classList.remove("bg-white/30", "backdrop-blur-md", "shadow-md");
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const mobileMenuButton = document.getElementById("mobileMenuButton");
    const mobileMenu = document.getElementById("mobileMenu");
    let isMobileMenuOpen = false;

    mobileMenuButton.addEventListener("click", function () {
        isMobileMenuOpen = !isMobileMenuOpen;
        if (isMobileMenuOpen) {
            mobileMenu.classList.remove("opacity-0", "invisible", "max-h-0");
            mobileMenu.classList.add("opacity-100", "visible", "max-h-[500px]");
            // Cambiar el icono del botón a una "X"
            mobileMenuButton.innerHTML = `
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            `;
        } else {
            mobileMenu.classList.remove(
                "opacity-100",
                "visible",
                "max-h-[500px]"
            );
            mobileMenu.classList.add("opacity-0", "invisible", "max-h-0");
            // Restaurar el icono del botón de hamburguesa
            mobileMenuButton.innerHTML = `
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            `;
        }
    });
});
