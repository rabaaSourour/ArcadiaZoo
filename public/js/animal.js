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
    const selectedAnimalList = document.getElementById(`animals-${habitatId}`);
    if (selectedAnimalList.style.display === "none" || selectedAnimalList.style.display === "") {
        selectedAnimalList.style.display = "block";
    } else {
        selectedAnimalList.style.display = "none";
    }
}

document.querySelectorAll('.animal-card').forEach(card => {
    card.addEventListener('click', () => {
        const animalName = card.dataset.animalName;
        fetch('/api/animalConsultationIncrement', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ name: animalName })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
        })
        .catch(error => console.error('Erreur:', error));
    });
});