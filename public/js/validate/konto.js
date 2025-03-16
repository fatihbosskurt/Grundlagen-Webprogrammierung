function validatePassword(password) {
    if (password.length < 8) {
        return "Das Passwort muss mindestens 8 Zeichen lang sein.";
    }
    if (!/[A-Z]/.test(password)) {
        return "Das Passwort muss mindestens einen Großbuchstaben enthalten.";
    }
    return ""; // Leerstring bedeutet, dass keine Fehlermeldung vorliegt
}

document.querySelector('.registrierungsformular').addEventListener('submit', function(event) {
    var passwordInput = document.getElementById('passwort');
    var password = passwordInput.value.trim();

    var errorMessage = validatePassword(password);
    var errorSpan = document.getElementById('error-password');
    errorSpan.textContent = errorMessage;

    if (errorMessage) {
        event.preventDefault(); // Verhindert das Absenden des Formulars bei Validierungsfehler
    }
});
