document.addEventListener('DOMContentLoaded', () => {
    // Éléments du DOM - Galerie
    const modal = document.getElementById('gallery-modal-overlay');
    const closeBtn = document.getElementById('close-gallery-btn');
    const galleryLink = document.getElementById('gallery-event-link');
    const galleryGrid = document.getElementById('gallery-grid');

    // Éléments du DOM - Plein écran
    const fullscreenOverlay = document.getElementById('fullscreen-image-overlay');
    const fullscreenImage = document.getElementById('fullscreen-image');
    const closeFullscreenBtn = document.getElementById('close-fullscreen-btn');

    // Clic sur une carte événement
    document.querySelectorAll('.event').forEach(card => {
        card.addEventListener('click', (e) => {
            e.preventDefault();

            const title = card.dataset.title || 'Événement';
            const lien = card.dataset.lien;

            // 1. Mise à jour du lien cliquable dans le titre de la modale
            if (galleryLink) {
                galleryLink.textContent = title;
                if (lien && lien.trim() !== '') {
                    galleryLink.href = lien;
                    galleryLink.style.pointerEvents = 'auto';
                    galleryLink.style.textDecoration = 'underline';
                } else {
                    galleryLink.removeAttribute('href');
                    galleryLink.style.pointerEvents = 'none';
                    galleryLink.style.textDecoration = 'none';
                }
            }

            // 2. Injection des images Twig
            const photosData = card.querySelector('.event-photos-data');
            galleryGrid.innerHTML = '';

            if (photosData && photosData.children.length > 0) {
                Array.from(photosData.children).forEach(img => {
                    const cloneImg = img.cloneNode(true);
                    
                    // Clic sur une vignette -> Ouverture grand format
                    cloneImg.addEventListener('click', () => {
                        fullscreenImage.src = cloneImg.src;
                        fullscreenOverlay.classList.remove('hidden');
                    });

                    galleryGrid.appendChild(cloneImg);
                });
            } else {
                galleryGrid.innerHTML = '<p style="grid-column: 1/-1; text-align: center; color: #777;">Aucune photo disponible pour cet événement.</p>';
            }

            // 3. Affichage de la modale
            modal.classList.remove('hidden');
        });
    });

    // Fermeture de la galerie
    if (closeBtn) {
        closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
    }
    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) modal.classList.add('hidden');
        });
    }

    // Fermeture du plein écran
    if (closeFullscreenBtn) {
        closeFullscreenBtn.addEventListener('click', () => fullscreenOverlay.classList.add('hidden'));
    }
    if (fullscreenOverlay) {
        fullscreenOverlay.addEventListener('click', (e) => {
            if (e.target === fullscreenOverlay) fullscreenOverlay.classList.add('hidden');
        });
    }
});