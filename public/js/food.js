function deleteFood(id) {
    if (confirm('Voulez-vous vraiment supprimer cette nourriture ?')) {
        fetch(`/api/deleteFood?id=${id}`,
            {
                method: 'POST',
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('nourriture supprimé avec succès.');
                    location.reload();
                } else {
                    alert('Erreur lors de la suppression du nourriture.');
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
}