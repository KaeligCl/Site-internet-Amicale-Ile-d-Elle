document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('navToggle');
    const navHeader = document.querySelector('.nav-mobile-header');
    const navLinks = document.getElementById('navLinks');

    function toggleMenu() {
        navLinks.classList.toggle('open');
    }

    toggleBtn.addEventListener('click', toggleMenu);
    navHeader.addEventListener('click', (e) => {
        if (e.target !== toggleBtn) toggleMenu();
    });
});