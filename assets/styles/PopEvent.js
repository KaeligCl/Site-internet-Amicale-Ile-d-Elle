document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('gallery-modal-overlay');
    const closeBtn = document.getElementById('close-gallery-btn');
    const modalTitle = document.getElementById('gallery-title');
    
    // On cible tes balises avec la classe "event"
    const eventCards = document.querySelectorAll('.event');

    // Quand on CLIQUE sur une carte d'événement
    eventCards.forEach(card => {
        card.addEventListener('click', (e) => {
            e.preventDefault(); // Empêche le comportement par défaut de la balise <a>
            
            // On cherche le titre à l'intérieur de la carte cliquée
            const titreElement = card.querySelector('.titre-event');
            
            if (titreElement) {
                // On met à jour le titre de la fenêtre modale
                modalTitle.textContent = `Photos de l'évènement : ${titreElement.textContent}`;
            }
            
            // On affiche la fenêtre
            modal.classList.remove('hidden');
        });
    });

    // Fermer la fenêtre avec la croix
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    }

    // Fermer la fenêtre en cliquant sur le fond sombre
    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    }

    // --- NOUVEAU CODE POUR L'AGRANDISSEMENT DES PHOTOS ---
    const fullscreenOverlay = document.getElementById('fullscreen-image-overlay');
    const fullscreenImage = document.getElementById('fullscreen-image');
    const closeFullscreenBtn = document.getElementById('close-fullscreen-btn');
    const galleryImages = document.querySelectorAll('.gallery-grid img');

    // Quand on clique sur une photo de la grille
    galleryImages.forEach(img => {
        img.addEventListener('click', () => {
            // On copie l'adresse (src) de l'image cliquée dans la grande image
            fullscreenImage.src = img.src;
            // On affiche la modale plein écran
            fullscreenOverlay.classList.remove('hidden');
        });
    });

    // Fermer le plein écran avec la croix
    if (closeFullscreenBtn) {
        closeFullscreenBtn.addEventListener('click', () => {
            fullscreenOverlay.classList.add('hidden');
        });
    }

    // Fermer le plein écran en cliquant n'importe où autour de l'image
    if (fullscreenOverlay) {
        fullscreenOverlay.addEventListener('click', (e) => {
            // Si on clique sur le fond noir (et pas sur l'image elle-même)
            if (e.target === fullscreenOverlay) {
                fullscreenOverlay.classList.add('hidden');
            }
        });
    }
});
