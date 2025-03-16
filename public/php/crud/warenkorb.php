<?php
session_start();

function ladeWarenkorb() {
    require_once(__DIR__ . '/../db.php');
    require_once(__DIR__ . '/../auth/auth.php');

    // Warenkorb aus Session mit Artikeln wird geladen
    $query = "SELECT wa.ID, wa.Artikel_ref, a.Bezeichnung AS Name, a.Vorschaubild AS Bild, a.Preis, wa.Artikelmenge AS Menge
              FROM WarenkorbArtikel wa
              INNER JOIN Artikel a ON wa.Artikel_ref = a.ID
              WHERE wa.Warenkorb_ref = ?";

    $stmt = $mysqli->prepare($query);
    if (!$stmt) {
        echo json_encode(["error" => "Fehler beim Vorbereiten der SQL-Anweisung: " . $mysqli->error]);
        return;
    }

    // Warenkorb-ID aus der Session holen
    $warenkorbId = isset($_SESSION['warenkorb_id']) ? $_SESSION['warenkorb_id'] : null;
    if (!$warenkorbId) {
        echo json_encode(["error" => "Warenkorb-ID ist nicht gesetzt."]);
        return;
    }

    $stmt->bind_param("i", $warenkorbId);

    if (!$stmt->execute()) {
        echo json_encode(["error" => "Fehler beim Ausführen der SQL-Anweisung: " . $stmt->error]);
        return;
    }

    $result = $stmt->get_result(); 
    $warenkorb = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    echo json_encode($warenkorb);
}

$action = isset($_GET['action']) ? $_GET['action'] : '';
if ($action === 'ladeWarenkorb') {
    ladeWarenkorb();
}
function leereWarenkorb() {
}
    