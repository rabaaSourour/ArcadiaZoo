// JavaScript to control video playback with toggle switch
const toggle = document.getElementById('toggleVideo');
const video = document.getElementById('videoPlayer');

toggle.addEventListener('change', () => {
    if (toggle.checked) {
        video.pause(); // Stop the video
    } else {
        video.play(); // Play the video
    }
});

// Fonction pour activer/désactiver l'édition
function editSection(id) {
    const section = document.getElementById(id);
    const contentEditableElements = section.querySelectorAll('[contenteditable]');
    contentEditableElements.forEach(element => {
        element.contentEditable = element.contentEditable === "true" ? "false" : "true";
        if (element.contentEditable === "true") {
            element.focus();
        }
    });
}

// Fonction pour supprimer la section
function deleteSection(id) {
    const section = document.getElementById(id);
    if (confirm("Êtes-vous sûr de vouloir supprimer cette section ?")) {
        section.remove();
    }
}

