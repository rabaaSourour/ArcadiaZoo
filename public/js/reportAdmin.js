document.getElementById('animal-filter').addEventListener('change', function () {
    const animalId = this.value; // ID de l'animal sélectionné
    const rows = document.querySelectorAll('#report-table tbody tr');

    // Parcourir toutes les lignes et afficher/cacher selon l'ID de l'animal
    rows.forEach(row => {
        if (!animalId || row.dataset.animalId === animalId) {
            row.style.display = ''; // Afficher la ligne si l'ID correspond ou si aucun animal n'est sélectionné
        } else {
            row.style.display = 'none'; // Masquer la ligne sinon
        }
    });
});

