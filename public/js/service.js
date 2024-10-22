function editService(id) {
    window.location.href = `/src/Admin/editService.php?id=${id}`;
}

function deleteService(id) {
    if (confirm('Voulez-vous vraiment supprimer ce service ?')) {
        fetch(`/src/Admin/deleteService.php?id=${id}`,
            {
                method: 'POST',
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Service supprimé avec succès.');
                    location.reload();
                } else {
                    alert('Erreur lors de la suppression du service.');
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
}