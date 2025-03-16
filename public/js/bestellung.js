document.addEventListener('DOMContentLoaded', function() {
    const bestellenButton = document.getElementById('bestellen-button');

    if (bestellenButton) {
        bestellenButton.addEventListener('click', function() {
            // Bestellung senden
            fetch('../../php/crud/bestellung.php?action=bestellen', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    kunde_ref: 1, 
                    lieferadresse_ref: 1,
                    zahlung_ref: 1, 
                    bestelldatum: new Date().toISOString()
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Bestellung erfolgreich:', data);
                if (data.success) {
                    alert('Bestellung erfolgreich aufgegeben. Bestell-ID: ' + data.bestellung_id);
                } else {
                    alert('Fehler bei der Bestellung: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Fehler beim Bestellen:', error);
                alert('Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.');
            });
        });
    }

    // Bestellungen laden
    function loadBestellungen() {
        fetch('../../php/crud/bestellung.php?action=ladeBestellungen', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                renderBestellungen(data.bestellungen);
            } else {
                console.error('Fehler beim Laden der Bestellungen:', data.error);
            }
        })
        .catch(error => {
            console.error('Fehler beim Laden der Bestellungen:', error);
        });
    }

    // Bestellungen im HTML anzeigen
    function renderBestellungen(bestellungen) {
        const bestellungenContainer = document.getElementById('bestellungen');
        if (!bestellungenContainer) {
            console.error('Bestellungen-Container nicht gefunden!');
            return;
        }

        bestellungenContainer.innerHTML = ''; // Container leeren

        bestellungen.forEach(bestellung => {
            const bestellungElement = document.createElement('div');
            bestellungElement.classList.add('bestellung');

            // Bestelldetails einfügen
            bestellungElement.innerHTML = `
                <div class="bestellung-info">
                    <div>Bestellnummer: ${bestellung.id}</div>
                    <div>Bestelldatum: ${bestellung.bestelldatum}</div>
                    <div>Lieferadresse: ${bestellung.lieferadresse}</div>
                    <div>Zahlungsinformation: ${bestellung.zahlungsinformation}</div>
                </div>
                <div class="bestellte-artikel">
                    <h4>Bestellte Artikel:</h4>
                    <ul>
                        ${renderBestellteArtikel(bestellung.artikel)}
                    </ul>
                </div>
            `;

            bestellungenContainer.appendChild(bestellungElement);
        });
    }

    // Bestellte Artikel einer Bestellung anzeigen
    function renderBestellteArtikel(artikel) {
        return artikel.map(item => `<li>${item.name} - ${item.menge} Stück(e)</li>`).join('');
    }

    // Bestellungen ein-/ausblenden
    function toggleBestellungen() {
        const bestellungenContainer = document.getElementById('bestellungen');
        if (!bestellungenContainer) {
            console.error('Bestellungen-Container nicht gefunden!');
            return;
        }

        bestellungenContainer.classList.toggle('show');
        if (bestellungenContainer.classList.contains('show')) {
            loadBestellungen();
        }
    }

    // Funktionen initialisieren
    const bestellungenContainer = document.getElementById('bestellungen');
    if (bestellungenContainer) {
        loadBestellungen(); // Bestellungen beim Start laden
    } else {
        console.error('Bestellungen-Container nicht gefunden!');
    }
});
