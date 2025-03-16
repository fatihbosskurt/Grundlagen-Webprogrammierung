document.addEventListener('DOMContentLoaded', function() {
    var deleteButton = document.getElementById('delete-account-button');

    // Überprüfen, ob der Löschen-Button existiert
    if (deleteButton) {
        deleteButton.addEventListener('click', function() {
            // Bestätigung, ob das Konto wirklich gelöscht werden soll
            if (confirm('Sind Sie sicher, dass Sie Ihr Konto löschen möchten?')) {
                fetch('../../php/crud/kunde.php?action=kundeLoeschen', {
                    method: 'POST'
                })
                .then(response => response.text())
                .then(data => {
                    // Erfolgreiche Löschung
                    if (data.includes('Benutzer erfolgreich gelöscht.')) {
                        alert('Ihr Konto wurde erfolgreich gelöscht.');
                        // Weiterleitung zur Login-Seite
                        window.location.href = '../../frontend/pages/login.php';
                    } else {
                        document.getElementById('error-message').textContent = 'Fehler beim Löschen des Kontos: ' + data;
                    }
                })
                .catch(error => {
                    document.getElementById('error-message').textContent = 'Ein Fehler ist aufgetreten: ' + error;
                });
            }
        });
    } else {
        console.error('Das Element mit der ID "delete-account-button" wurde nicht gefunden.');
    }
});

function saveLieferadresse() {
    var strasse = document.getElementById('strasse').value;
    var postleitszahl = document.getElementById('postleitszahl').value;
    var ort = document.getElementById('ort').value;
    var lieferadresse = strasse + ', ' + postleitszahl + ' ' + ort;
    // Lieferadresse auf der Seite anzeigen
    document.getElementById('lieferadresse').textContent = lieferadresse;
    closeModal('lieferadresseModal');
}

function saveZahlungsinformation() {
    var kontoinhaber = document.getElementById('kontoinhaber').value;
    var iban = document.getElementById('iban').value;
    var zahlungsinformation = kontoinhaber + ', ' + iban;
    // Zahlungsinformation auf der Seite anzeigen
    document.getElementById('zahlungsinformation').textContent = zahlungsinformation;
    closeModal('zahlungsinformationModal');
}

// Event-Listener für das Formular der Lieferadresse
document.getElementById('lieferadresseForm').addEventListener('submit', function(event) {
    event.preventDefault();
    saveLieferadresse();
});

// Event-Listener für das Formular der Zahlungsinformation
document.getElementById('zahlungsinformationForm').addEventListener('submit', function(event) {
    event.preventDefault();
    saveZahlungsinformation();
});

// Funktion zum Öffnen eines Modal-Fensters
function openModal(modalId) {
    document.getElementById(modalId).style.display = "block";
}

// Funktion zum Schließen eines Modal-Fensters
function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

// Funktion zum Anzeigen oder Verstecken der Bestellungen
function toggleBestellungen() {
    var bestellungen = document.getElementById('bestellungen');
    if (bestellungen.style.display === "none" || bestellungen.style.display === "") {
        bestellungen.style.display = "block";
    } else {
        bestellungen.style.display = "none";
    }
}
