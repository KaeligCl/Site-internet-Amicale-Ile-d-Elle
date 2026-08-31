document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('navToggle');
    const navHeader = document.querySelector('.nav-mobile-header');
    const navLinks = document.getElementById('navLinks');

    if (!toggleBtn || !navHeader || !navLinks) return;

    function toggleMenu() {
        const isOpen = navLinks.classList.toggle('open');
        toggleBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    }

    toggleBtn.addEventListener('click', toggleMenu);
    navHeader.addEventListener('click', (e) => {
        if (e.target !== toggleBtn) toggleMenu();
    });

    // Refermer le menu après un clic sur un lien (mobile)
    navLinks.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('open');
            toggleBtn.setAttribute('aria-expanded', 'false');
        });
    });
});