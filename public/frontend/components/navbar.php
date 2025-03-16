<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>F A B E</title>
    <link rel="stylesheet" type="text/css" href="../../styles/global.css">
</head>
<body>
<?php
require_once(__DIR__ . '/../../php/auth/auth.php');

// Überprüfen, ob der Benutzer eingeloggt ist
$redirect_url = isLoggedIn() ? "/frontend/pages/konto.php" : "/frontend/pages/login.php";
?>
<nav>
    <a class="links" href="../../../index.php"><img src="../../assets/images/Logo.png" alt="Logo"></a>
    <div class="mitte">
        <a class="startseite" href="../../../index.php">Startseite</a>
        <a class="kollektion" href="/frontend/pages/kollektion.php">Kollektion</a>
    </div>

    <div class="rechts">
        <a class="konto-icon" href="<?php echo $redirect_url; ?>">
            <img src="../../assets/images/konto.png" alt="Konto Icon">
        </a>
        <button class="warenkorb-icon" id="warenkorb-button">
            <img src="../../assets/images/warenkorb.png" alt="Warenkorb Icon">
        </button>
        <?php if (isLoggedIn()): ?>
            <form method="post" style="display:inline;">
                <button type="submit" name="logout" class="logout-icon">
                    <img src="../../assets/images/logout.png" alt="Logout Icon">
                </button>
            </form>
        <?php endif; ?>
    </div>
</nav>
<?php require_once('warenkorb.php'); ?>
<script src="../../js/warenkorb.js"></script>
</body>
</html>
