document.addEventListener('DOMContentLoaded', () => {
    // Dropdowns für Sortierung und Kategorien holen
    const sortierenSelect = document.getElementById('sortieren');
    const kategorieSelect = document.getElementById('kategorie');

    function renderArtikel(artikel) {
        const container = document.getElementById('artikelCollection');
        container.innerHTML = ''; // Inhalt leeren

        artikel.forEach(item => {
            const link = document.createElement('a');
            link.href = `kleidung.php?id=${item['ID']}`; // Link zur Artikelseit
            link.className = 'item-link';
            const itemDiv = document.createElement('div');
            itemDiv.className = 'item';

            const img = document.createElement('img');
            img.src = `../../assets/images/${encodeURIComponent(basename(item['Vorschaubild']))}`;
            itemDiv.appendChild(img);

            const h3 = document.createElement('h3');
            h3.textContent = item['Bezeichnung'];
            itemDiv.appendChild(h3);

            const p = document.createElement('p');
            p.textContent = `Preis: €${parseFloat(item['Preis']).toFixed(2).replace('.', ',')}`;
            itemDiv.appendChild(p);

            link.appendChild(itemDiv);
            container.appendChild(link);

            // Bild beim Hover ändern
            img.addEventListener('mouseenter', () => changeImageOnHover(img, basename(item['Vorschaubild'])));
            img.addEventListener('mouseleave', () => resetImage(img));
        });
    }

    function basename(path) {
        return path.split(/[\\/]/).pop();
    }

    let hoverTimers = new Map();

    function changeImageOnHover(img, originalBasename) {
        // Originalbild merken
        const originalPath = img.src;
        img.dataset.originalSrc = originalPath;

        // Neue Bildpfade
        const newPathBeige = originalPath.replace(originalBasename, `${originalBasename.split('.')[0]}_beige.${originalBasename.split('.')[1]}`);
        const newPathRot = originalPath.replace(originalBasename, `${originalBasename.split('.')[0]}_rot.${originalBasename.split('.')[1]}`);
        const newPathSchwarz = originalPath.replace(originalBasename, `${originalBasename.split('.')[0]}_schwarz.${originalBasename.split('.')[1]}`);

        // Timer für Bildwechsel
        const timer1 = setTimeout(() => {
            img.src = newPathBeige;
            const timer2 = setTimeout(() => {
                img.src = newPathRot;
                const timer3 = setTimeout(() => {
                    img.src = newPathSchwarz;
                }, 550);
                hoverTimers.set(img, timer3);
            }, 550);
            hoverTimers.set(img, timer2);
        }, 300);

        hoverTimers.set(img, timer1);
    }

    function resetImage(img) {
        // Bild zurücksetzen
        img.src = img.dataset.originalSrc;

        if (hoverTimers.has(img)) {
            clearTimeout(hoverTimers.get(img));
            hoverTimers.delete(img);
        }
    }

    function sortArtikel(artikel, criterion) {
        // Artikel sortieren
        let sortedArtikel = [...artikel];
        if (criterion === 'preis-aufsteigend') {
            sortedArtikel.sort((a, b) => parseFloat(a.Preis) - parseFloat(b.Preis));
        } else if (criterion === 'preis-absteigend') {
            sortedArtikel.sort((a, b) => parseFloat(b.Preis) - parseFloat(a.Preis));
        }
        return sortedArtikel;
    }

    function filterKategorie(artikel, kategorie) {
        // Artikel nach Kategorie filtern
        if (kategorie === 'alle') {
            return artikel;
        } else {
            return artikel.filter(item => item.Kategorie === kategorie);
        }
    }

    function updateArtikel() {
        // Artikel filtern und sortieren
        let filteredArtikel = filterKategorie(artikelJson, kategorieSelect.value);
        let sortedArtikel = sortArtikel(filteredArtikel, sortierenSelect.value);
        renderArtikel(sortedArtikel); // Gefilterte und sortierte Artikel anzeigen
    }

    // Event-Listener für Dropdown-Änderungen
    sortierenSelect.addEventListener('change', updateArtikel);
    kategorieSelect.addEventListener('change', updateArtikel);

    renderArtikel(artikelJson); // Artikel initial anzeigen
});
