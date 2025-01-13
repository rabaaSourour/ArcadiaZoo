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

function deleteSection(id) {
    const section = document.getElementById(id);
    if (confirm("Êtes-vous sûr de vouloir supprimer cette section ?")) {
        section.remove();
    }
}

