// Funktion zur Behandlung der Antwort vom Server nach dem Login
function handleLoginResponse(response) {
    if (response.success) {
        // Bei erfolgreichem Login zur angegebenen Seite weiterleiten
        window.location.href = response.redirect;
    } else {
        // Fehlermeldung anzeigen, wenn das Login fehlschlägt
        document.getElementById('error-message').textContent = response.message;
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('.loginformular');
    
    // Event-Listener für das Absenden des Login-Formulars
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Standardformular-Absenden verhindern

        const formData = new FormData(form);
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => handleLoginResponse(data))
        .catch(error => console.error('Error:', error)); 
    });
});
