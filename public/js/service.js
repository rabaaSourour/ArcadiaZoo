function deleteService(id) {
    if (confirm('Voulez-vous vraiment supprimer ce service ?')) {
        fetch(`/api/deleteService?id=${id}`,
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