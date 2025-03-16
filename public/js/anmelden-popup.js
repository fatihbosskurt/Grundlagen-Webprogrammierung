//code wird erst ausgeführt wenn dom vollständig geladen ist
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("add-to-cart-form"); //formular wird in form gespeichert

    //event listener submit hinzugefügen
    form.addEventListener("submit", function(event) {
        event.preventDefault(); //verhindert neu laden der seite
        const formData = new FormData(form); //formulardaten werden in einem FormData Objekt gespeichert

        fetch(form.action, { //anfrage and die url
            method: "POST",
            body: formData
        })
            .then(response => response.json()) //in json umwandeln
            .then(data => {
                if (data.error) {
                    if (data.error === 'Benutzer nicht eingeloggt') { //anmelde popup wird aufgerufen (wen nicht eingeloggt)
                        showLoginPopup();
                    } else {
                        alert(data.error);
                    }
                } else {
                    window.location.href = `../../frontend/pages/kleidung.php?id=${formData.get('product_id')}`; //wenn eingeloggt,artikel wird hinzugefügt
                }
            })
            .catch(error => console.error('Error:', error)); //fehlermeldung für konsole
    });
//erstellt neues pop up element
    function showLoginPopup() {
        const popup = document.createElement('div');
        popup.id = 'login-popup';
        popup.innerHTML = `
            <div class="popup-content">
                <span class="close-btn">&times;</span>
                <h2>Bitte anmelden</h2>
                <p>Sie müssen sich zuerst anmelden, um den Artikel hinzuzufügen.</p>
                <a href="../../frontend/pages/login.php" class="login-btn">Anmelden</a>
            </div>
        `;
        document.body.appendChild(popup);

        document.querySelector('.close-btn').addEventListener('click', function() { //button, der die meldung schließt
            popup.remove();
        });
    }
});
