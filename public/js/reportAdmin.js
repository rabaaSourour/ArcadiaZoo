function deleteReport(id) {
    if (confirm('Voulez-vous vraiment supprimer cette rapport ?')) {
        fetch(`/api/deleteReport?id=${id}`,
            {
                method: 'POST',
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('rapport supprimé avec succès.');
                    location.reload();
                } else {
                    alert('Erreur lors de la suppression de rapport.');
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
}

document.getElementById('animal-filter').addEventListener('change', function () {
    const animalId = this.value; 
    const rows = document.querySelectorAll('#report-table tbody tr');

    rows.forEach(row => {
        if (!animalId || row.dataset.animalId === animalId) {
            row.style.display = ''; 
        } else {
            row.style.display = 'none';
        }
    });
});