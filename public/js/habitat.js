function deleteHabitat(id) {
    if (confirm('Voulez-vous vraiment supprimer ce habitat ?')) {
        fetch(`/api/deleteHabitat?id=${id}`,
            {
                method: 'POST',
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Service supprimé avec succès.');
                    location.reload();
                } else {
                    alert('Erreur lors de la suppression de l\'habitat.');
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
}