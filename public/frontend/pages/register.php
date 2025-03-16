<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierung</title>
    <link rel="stylesheet" type="text/css" href="../../styles/register.css">
    <link rel="stylesheet" type="text/css" href="../../styles/global.css">

</head>
<body>
<div id="navbar">
    <?php require_once('../../frontend/components/navbar.php'); ?>
</div>
<div id="content">
    <h2>Registrierung</h2>
    <form action="../../php/crud/kunde.php?action=register" method="POST" class="registrierungsformular">
        <div class="formular">
            <div class="links-register">
                <label for="vorname">Vorname:</label><br>
                <input type="text" id="vorname" name="vorname" required><br><br>

                <label for="nachname">Nachname:</label><br>
                <input type="text" id="nachname" name="nachname" required><br><br>

                <label for="strasse">Straße:</label><br>
                <input type="text" id="strasse" name="strasse" required><br><br>

                <label for="postleitszahl">Postleitzahl:</label><br>
                <input type="text" id="postleitszahl" name="postleitszahl" required><br><br>
            </div>
            <div class="rechts-register">
                <label for="ort">Ort:</label><br>
                <input type="text" id="ort" name="ort" required><br><br>

                <label for="telnummer">Telefonnummer:</label><br>
                <input type="tel" id="telnummer" name="telnummer" required><br><br>

                <label for="email">E-Mail:</label><br>
                <input type="email" id="email" name="email" required><br><br>

                <label for="passwort">Passwort:</label><br>
                <input type="password" id="passwort" name="passwort" required><br>
                <span id="error-password" style="color: red;"></span><br>
            </div>
        </div>
        <div id="button">
            <input type="submit" value="Registrieren">
        </div>
    </form>
</div>
<footer>
    <?php require_once('../../frontend/components/footer.php'); ?>
</footer>
<script src="../../js/validate/konto.js"></script>
</body>
</html>
