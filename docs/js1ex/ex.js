/**
 * Erste Formen der Validierung haben Sie bereits in HTML kennengelernt.
 * Nutzen Sie dieses Wissen nun gemeinsam mit JavaScript, um Rückmeldungen bei falscher Eingabe selbst zu programmieren.

 * @todo Der Hintergrund des Input-Feldes soll rot werden, wenn die Angaben noch nicht den Anforderungen entsprechen
bzw. gruen werden, wenn alles den Vorgaben entspricht. Diese Vorgaben müssen Sie im HTML-Dokument eigenständig festlegen,
also z.B. min./max. Laenge, required etc.
 */

function submitForm(event) {
    event.preventDefault(); // Verhindert das Standardverhalten des Formulars
    
    // Zugriff auf die Input-Felder
    var emailInput = document.getElementById('email');
    var passwordInput = document.getElementById('password');
    
    // Überprüfen der Eingaben
    if (isValidEmail(emailInput.value) && isValidPassword(passwordInput.value)) {
        // Wenn die Eingaben den Anforderungen entsprechen, ändere das Styling auf 'green'
        emailInput.style.backgroundColor = 'green';
        passwordInput.style.backgroundColor = 'green';
    } else {
        // Wenn die Eingaben nicht den Anforderungen entsprechen, ändere das Styling auf 'red'
        emailInput.style.backgroundColor = 'red';
        passwordInput.style.backgroundColor = 'red';
    }
}

// Funktion zur Überprüfung der Email
function isValidEmail(email) {
    // Hier können Sie Ihre eigenen Validierungsregeln für die Email eingeben
    return email.includes('@');
}

// Funktion zur Überprüfung des Passworts
function isValidPassword(password) {
    // Hier können Sie Ihre eigenen Validierungsregeln für das Passwort eingeben
    return password.length >= 8;
}
