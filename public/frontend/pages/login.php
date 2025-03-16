<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../../styles/global.css">
    <link rel="stylesheet" type="text/css" href="../../styles/login.css">
    <script src="../../js/login.js" defer></script>
</head>
<body>
<div id="navbar">
    <?php require_once('../components/navbar.php'); ?>
</div>
<div id="content">
    <h2>Login</h2>
    <form action="../../php/crud/kunde.php?action=login" method="POST" class="loginformular">
        <label for="email">E-Mail:</label><br>
        <input type="email" id="email" name="email" placeholder="Ihre E-Mail" required><br><br>
        <label for="passwort">Passwort:</label><br>
        <input type="password" id="passwort" name="passwort" placeholder="Ihr Passwort" required><br><br>
        <a href="../../frontend/pages/register.php">Registrieren</a><br>
        <input type="submit" value="Login">
    </form>
    <br><br>
    <p id="error-message" style="color: red;"></p>
</div>
<footer>
    <?php require_once('../../frontend/components/footer.php'); ?>
</footer>
</body>
</html>
