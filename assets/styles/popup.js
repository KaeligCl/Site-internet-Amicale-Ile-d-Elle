document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modal-overlay');
    const openBtn = document.getElementById('open-modal-btn');
    const closeBtn = document.getElementById('close-modal-btn');

    // Ouvrir
    openBtn.addEventListener('click', () => modal.classList.remove('hidden'));

    // Fermer avec la croix
    closeBtn.addEventListener('click', () => modal.classList.add('hidden'));

    // Fermer en cliquant n'importe où sur l'arrière-plan sombre
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
});