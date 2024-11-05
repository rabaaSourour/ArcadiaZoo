function deleteAnimal(id) {
    if (confirm('Voulez-vous vraiment supprimer cette animal ?')) {
        fetch(`/api/deleteAnimal?id=${id}`,
            {
                method: 'POST',
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Animal supprimé avec succès.');
                    location.reload();
                } else {
                    alert('Erreur lors de la suppression de l\'animal.');
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
}


function toggleAnimals(habitatId) {
    // Récupère l'élément de la liste d'animaux correspondant à habitatId
    const selectedAnimalList = document.getElementById(`animals-${habitatId}`);
    
    // Alterne l'affichage pour la liste sélectionnée
    if (selectedAnimalList.style.display === "none" || selectedAnimalList.style.display === "") {
        selectedAnimalList.style.display = "block";
    } else {
        selectedAnimalList.style.display = "none";
    }
}
