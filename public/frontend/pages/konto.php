<?php
require_once('../../php/auth/auth.php');
require_once('../../php/crud/kunde.php');

if (!isLoggedIn()) {
    header("Location: ../../frontend/pages/login.php");
    exit();
}

// Laden der Kundendaten
$kunde = kundeLaden($_SESSION['user_id']);

// Überprüfen, ob Daten geladen wurden
if ($kunde) {
    // Extrahieren der Daten für das HTML
    $kontoInfo = [
        'vorname' => $kunde['vorname'],
        'nachname' => $kunde['nachname'],
        'email' => $kunde['email'],
        'telnummer' => $kunde['telnummer']

    ];

    $lieferadresse = [
        'strasse' => $kunde['strasse'],
        'postleitszahl' => $kunde['postleitszahl'],
        'ort' => $kunde['ort']

    ];

    $zahlungsinformationen = [
        'kontoinhaber' => $kunde['kontoinhaber'],
        'iban' => $kunde['iban']

    ];
    //hardcode Bilder für nutzer id 1&2
    if ($_SESSION['user_id'] == 1) {
        $profilbild_pfad = "../../assets/images/pb.png";
    } elseif ($_SESSION['user_id'] == 2) {
        $profilbild_pfad = "../../assets/images/pb2.png";
    } else {
        $profilbild_pfad = "../../assets/images/user.png";
    }

} else {
    echo "Fehler beim Laden der Kundendaten.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Konto</title>
    <link rel="stylesheet" type="text/css" href="../../styles/global.css">
    <link rel="stylesheet" type="text/css" href="../../styles/konto.css">
</head>
<body>
    <div id="navbar">
        <?php require_once('../../frontend/components/navbar.php'); ?>
    </div>
    <div id="content">
        <div class="profil">
        <div class="profilbild-container">
                <img src="<?php echo $profilbild_pfad; ?>" alt="Profilbild" class="profilbild">
            </div>
            <div class="info">
                <div>Vorname: <span id="vorname"><?php echo htmlspecialchars($kontoInfo['vorname']); ?></span></div>
                <div>Nachname: <span id="nachname"><?php echo htmlspecialchars($kontoInfo['nachname']); ?></span></div>
                <div>E-Mail: <span id="email"><?php echo htmlspecialchars($kontoInfo['email']); ?></span></div>
                <div>Telefonnummer: <span id="telefonnummer"><?php echo htmlspecialchars($kontoInfo['telnummer']); ?></span></div>
            </div>
        </div>
        <div class="section">
            <div class="info editable" onclick="openModal('lieferadresseModal')">
                Lieferadresse: <span id="lieferadresse">
                <?php echo $lieferadresse ? htmlspecialchars($lieferadresse['strasse'] . ', ' . $lieferadresse['postleitszahl'] . ' ' . $lieferadresse['ort']) : 'Keine Lieferadresse gefunden'; ?>
                </span>
            </div>
        </div>
        <div class="section">
            <div class="info editable" onclick="openModal('zahlungsinformationModal')">
                Zahlungsinformation: <span id="zahlungsinformation">
                <?php echo $zahlungsinformationen ? htmlspecialchars($zahlungsinformationen['kontoinhaber'] . ', ' . $zahlungsinformationen['iban']) : 'Keine Zahlungsinformationen gefunden'; ?>
                </span>
            </div>
        </div>
        <div class="section">
            <div class="info" onclick="toggleBestellungen()">
                Bestellungen anzeigen
            </div>
            <div id="bestellungen" class="bestellungen">
            </div>
        </div>
        <div class="delete">
            <button id="delete-account-button">Konto löschen</button>
            <p id="error-message" style="color: red;"></p>
        </div>
    </div>

    <!-- Lieferadresse Modal -->
    <div id="lieferadresseModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('lieferadresseModal')">&times;</span>
            <h2>Lieferadresse bearbeiten</h2>
            <form action="konto.php?action=speichernLieferadresse" method="POST">
    <label for="strasse">Straße:</label><br>
    <input type="text" id="strasse" name="strasse" value="<?php echo $lieferadresse ? htmlspecialchars($lieferadresse['strasse']) : ''; ?>" required><br>
    <label for="postleitszahl">Postleitzahl:</label><br>
    <input type="text" id="postleitszahl" name="postleitszahl" value="<?php echo $lieferadresse ? htmlspecialchars($lieferadresse['postleitszahl']) : ''; ?>" required><br>
    <label for="ort">Ort:</label><br>
    <input type="text" id="ort" name="ort" value="<?php echo $lieferadresse ? htmlspecialchars($lieferadresse['ort']) : ''; ?>" required><br><br>
    <input type="submit" value="Speichern">
</form>
        </div>
    </div>

    <!-- Zahlungsinformation Modal -->
    <div id="zahlungsinformationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('zahlungsinformationModal')">&times;</span>
            <h2>Zahlungsinformation bearbeiten</h2>
            <form action="konto.php?action=speichernZahlungsinformationen" method="POST">
                <label for="kontoinhaber">Kontoinhaber:</label><br>
                <input type="text" id="kontoinhaber" name="kontoinhaber" value="<?php echo $zahlungsinformationen ? htmlspecialchars($zahlungsinformationen['kontoinhaber']) : ''; ?>" required><br>
                <label for="iban">IBAN:</label><br>
                <input type="text" id="iban" name="iban" value="<?php echo $zahlungsinformationen ? htmlspecialchars($zahlungsinformationen['iban']) : ''; ?>" required><br><br>
                <input type="submit" value="Speichern">
            </form>
        </div>
    </div>

    <footer>
        <?php require_once('../../frontend/components/footer.php'); ?>
    </footer>
    <script src="../../js/konto.js"></script>
</body>
</html>