document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modal-overlay');
    const openBtns = document.querySelectorAll('.open-modal-btn');
    const closeBtn = document.getElementById('close-modal-btn');

    // Éléments internes de la modale à mettre à jour
    const modalImg = document.getElementById('modal-img');
    const modalTitle = document.getElementById('modal-title');
    const modalPrice = document.getElementById('modal-price');
    const modalDesc = document.getElementById('modal-description');

    // Attacher l'événement sur TOUS les boutons
    openBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Récupération des données depuis les attributs data-*
            modalImg.src = btn.dataset.image;
            modalImg.alt = btn.dataset.nom;
            modalTitle.textContent = btn.dataset.nom;
            modalPrice.textContent = `Prix plein : ${btn.dataset.prixPlein}€ / membre : ${btn.dataset.prixMembre}€`;
            modalDesc.textContent = btn.dataset.description;

            // Rattacher la réservation au matériel cliqué
            const equipementInput = document.getElementById('equipement-id-input');
            if (equipementInput) {
                equipementInput.value = btn.dataset.equipementId || '';
            }

            // Affichage de la modale
            modal.classList.remove('hidden');
        });
    });

    // Fermer avec la croix
    closeBtn.addEventListener('click', () => modal.classList.add('hidden'));

    // Fermer en cliquant sur l'arrière-plan
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
});