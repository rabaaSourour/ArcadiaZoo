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


function toggleReports(animalId) {
    // Récupère l'élément de la liste d'animaux correspondant à habitatId
    const reportList = document.getElementById('report-' + animalId);
    
    // Alterne l'affichage pour la liste sélectionnée
    if (reportList.style.display === "none" || reportList.style.display === "") {
        reportList.style.display = "block";
    } else {
        reportList.style.display = "none";
    }
}
