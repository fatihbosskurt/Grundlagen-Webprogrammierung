document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const artikelId = urlParams.get('id');
    const artikelColor = urlParams.get('color');

    if (artikelId) {
        const fetchUrl = `../../php/crud/einzelArtikel.php?id=${artikelId}`;
        console.log(`Fetching URL: ${fetchUrl}`);

        // Artikel-Daten holen
        fetch(fetchUrl)
            .then(response => response.json())
            .then(artikel => {
                if (artikel.error) {
                    alert('Artikel nicht gefunden: ' + artikel.error);
                } else {
                    console.log('Artikel Daten:', artikel);
                    // Artikeldaten auf der Seite anzeigen
                    document.getElementById('product-title').textContent = artikel.Bezeichnung;
                    document.getElementById('product-price').textContent = `€${parseFloat(artikel.Preis).toFixed(2).replace('.', ',')}`;
                    document.getElementById('product-description').textContent = artikel.Beschreibung;

                    const specs = document.getElementById('product-specs');
                    specs.innerHTML = `
                        <li><strong>Material:</strong> ${artikel.Material}</li>
                        <li><strong>Pflege:</strong> ${artikel.Pflege}</li>
                    `;

                    const colorOptions = document.getElementById('color-options');
                    const colors = ['schwarz', 'beige', 'rot'];
                    const colorHex = {'schwarz': '#000000', 'beige': '#eed5d2', 'rot': '#8b1a1a'};

                    // Farboptionen anzeigen und Bild bei Klick ändern
                    colors.forEach(color => {
                        const colorLink = document.createElement('a');
                        colorLink.href = `?id=${artikelId}&color=${color}`;
                        colorLink.className = 'color-option';
                        colorLink.dataset.color = color;
                        colorLink.style.backgroundColor = colorHex[color];
                        colorLink.addEventListener('click', (event) => {
                            event.preventDefault();
                            const basePath = artikel.Vorschaubild;
                            const newImagePath = getColorImagePath(basePath, color);
                            console.log(`New image path: ${newImagePath}`);
                            document.getElementById('product-image').src = `../../${newImagePath}`;
                        });
                        colorOptions.appendChild(colorLink);
                    });

                    // Anfangsbild setzen je nach Farbe
                    if (artikelColor) {
                        const basePath = artikel.Vorschaubild;
                        const colorImagePath = getColorImagePath(basePath, artikelColor);
                        console.log(`Initial image path with color: ${colorImagePath}`);
                        document.getElementById('product-image').src = `../../${colorImagePath}`;
                    } else {
                        console.log(`Initial image path: ${artikel.Vorschaubild}`);
                        document.getElementById('product-image').src = `../../${artikel.Vorschaubild}`;
                    }

                    document.getElementById('product_id').value = artikelId;
                }
            })
            .catch(error => {
                console.error('Fehler beim Laden des Artikels:', error);
            });
    } else {
        console.error('Keine Artikel-ID gefunden.');
    }

    // Hilfsfunktion, um den Pfad für das Farb-Bild zu erstellen
    function getColorImagePath(basePath, color) {
        const extensionIndex = basePath.lastIndexOf('.');
        const extension = basePath.substring(extensionIndex);
        const baseName = basePath.substring(0, extensionIndex);
        return `${baseName}_${color}${extension}`;
    }

    // Modal-Fenster für Bildvergrößerung
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modal-image');
    const captionText = document.getElementById('caption');
    const closeBtn = document.getElementsByClassName('close')[0];

    const productImage = document.getElementById('product-image');
    productImage.addEventListener('click', function() {
        modal.style.display = 'block';
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    });

    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    document.getElementById('Hinzufügen').addEventListener('click', function(event) {
        document.getElementById('warenkorb-button').click();
    });
});
