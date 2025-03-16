// Funktion, um das Popup beim Laden der Seite zu öffnen
window.onload = function() {
    openPopup();
}

// Funktion, um das Popup zu öffnen
function openPopup() {
    console.log("Popup öffnen");    
    var popup = document.getElementById("rabatt-popup");
    popup.style.display = "flex"; // Popup sichtbar machen
    document.body.classList.add("blurred"); // Hintergrund verschwommen machen
}

// Funktion, um das Popup zu schließen
function closePopup() {
    console.log("Popup schließen");
    var popup = document.getElementById("rabatt-popup");
    popup.style.display = "none"; // Popup ausblenden
    document.body.classList.remove("blurred"); // Hintergrund wieder normal machen
}

// Funktion, um einen zufälligen Rabattcode zu generieren und anzuzeigen
function getDiscount() {
    console.log("Rabatt erhalten");
    var initialContent = document.getElementById("rabatt-popup-initial");
    var codeContent = document.getElementById("rabatt-popup-code");
    var discountCodeElement = document.getElementById("discount-code");

    // Zufälligen Rabattcode generieren
    var discountCode = generateRandomCode(11);
    console.log("Generierter Rabattcode:", discountCode);
    discountCodeElement.textContent = discountCode; // Rabattcode anzeigen

    // Initialen Inhalt ausblenden und den Code anzeigen
    initialContent.style.display = "none";
    codeContent.style.display = "block";
}

// Funktion zum Generieren eines zufälligen Codes mit der angegebenen Länge
function generateRandomCode(length) {
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var code = '';
    for (var i = 0; i < length; i++) {
        var randomIndex = Math.floor(Math.random() * characters.length);
        code += characters[randomIndex];
    }
    return code;
}
window.onload = function() {
    console.log("Seite geladen");
    openPopup();
}
