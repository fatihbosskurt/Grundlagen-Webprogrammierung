// Funktion, die beim Laden der Seite aufgerufen wird
document.addEventListener('DOMContentLoaded', () => {
    // Elemente aus dem DOM abrufen
    const warenkorbButton = document.getElementById('warenkorb-button');
    const warenkorbOverlay = document.getElementById('warenkorb-overlay');
    const warenkorbItemsContainer = document.getElementById('warenkorb-items');
    const gesamtpreisElement = document.getElementById('gesamtpreis');
    const bestellbutton = document.getElementById('bestellbutton');
    const closeWarenkorbButton = document.getElementById('close-warenkorb');
    const aktualisierenButton = document.getElementById('warenkorb-aktualisieren');
    let warenkorb = [];

    // Funktion, um den Warenkorb zu öffnen und Artikel zu laden
    function warenkorbOeffnen() {
        ladenArtikel();
        warenkorbOverlay.classList.add('active');
    }

    // Funktion, um den Warenkorb zu schließen
    function warenkorbSchliessen() {
        warenkorbOverlay.classList.remove('active');
    }

    // Funktion zum Rendern der Warenkorb-Artikel
    function renderWarenkorb(items) {
        warenkorbItemsContainer.innerHTML = '';
        let gesamtpreis = 0;

        items.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.classList.add('warenkorb-item');
            const preis = parseFloat(item.Preis);
            const menge = parseInt(item.Menge, 10);
            gesamtpreis += preis * menge;
            itemElement.innerHTML = `
                <img src="../../${item.Bild}" alt="${item.Name}">
                <div class="warenkorb-item-details">
                    <div>${item.Name}</div>
                    <div>Preis: ${item.Preis.toFixed(2).replace('.', ',')} €</div>
                    <div>Menge: ${item.Menge}</div>
                </div>
            `;
            warenkorbItemsContainer.appendChild(itemElement);
        });

        gesamtpreisElement.textContent = gesamtpreis.toFixed(2);
    }

    // Funktion zum Laden der Warenkorb-Artikel vom Server
    function ladenArtikel() {
        fetch('../../php/crud/warenkorb.php?action=ladeWarenkorb')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Fehler beim Laden der Warenkorb-Artikel: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                console.log('Daten vom Server:', data);
                renderWarenkorb(data);
            })
            .catch(error => {
                console.error('Fehler beim Laden der Warenkorb-Artikel:', error);
            });
    }

    // Event Listener für den Warenkorb-Button, Schließen-Button und Aktualisieren-Button
    if (warenkorbButton) warenkorbButton.addEventListener('click', warenkorbOeffnen);
    if (closeWarenkorbButton) closeWarenkorbButton.addEventListener('click', warenkorbSchliessen);
    if (aktualisierenButton) aktualisierenButton.addEventListener('click', ladenArtikel);

    ladenArtikel(); // Beim Laden der Seite Warenkorb-Artikel laden
});
