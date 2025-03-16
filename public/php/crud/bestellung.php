<?php
//Funktion zum bestellen
function bestellen($kunde_ref, $lieferadresse_ref, $zahlung_ref, $bestelldatum) {
    require_once('../db.php');
    require_once(__DIR__ . '/../auth/auth.php');

    // Session-Warenkorb-ID wird abgerufen
    $warenkorbId = isset($_SESSION['warenkorb_id']) ? $_SESSION['warenkorb_id'] : null;

    // Artikel aus dem Warenkorb werden geladen
    $querySelectWarenkorb = "SELECT id, artikel_ref, artikelmenge FROM WarenkorbArtikel WHERE warenkorb_ref = ?";
    $stmtSelect = $mysqli->prepare($querySelectWarenkorb);
    $stmtSelect->bind_param("i", $warenkorbId);
    if (!$stmtSelect->execute()) {
        return json_encode(["error" => "Fehler beim Abrufen der Warenkorbartikel: " . $stmtSelect->error]);
    }
    $resultSelect = $stmtSelect->get_result();

    // Artikel aus dem Warenkorb werden als Bestellung hinzugefügt
    $queryInsertBestellung = "INSERT INTO Bestellung (kunde_ref, lieferadresse_ref, zahlung_ref, bestelldatum) VALUES (?, ?, ?, ?)";
    $stmtInsertBestellung = $mysqli->prepare($queryInsertBestellung);
    $stmtInsertBestellung->bind_param("iiis", $kunde_ref, $lieferadresse_ref, $zahlung_ref, $bestelldatum);
    if (!$stmtInsertBestellung->execute()) {
        return json_encode(["error" => "Fehler beim Einfügen der Bestellung: " . $stmtInsertBestellung->error]);
    }
    $bestellungId = $mysqli->insert_id;

    // Durchgehen der Warenkorbartikel und Einfügen in BestellungArtikel
    while ($row = $resultSelect->fetch_assoc()) {
        $artikel_ref = $row['artikel_ref'];
        $artikelmenge = $row['artikelmenge'];

        // INSERT-Anweisung für BestellungArtikel
        $queryInsertBestellungArtikel = "INSERT INTO BestellungArtikel (bestellung_ref, warenkorbartikel_ref, menge) VALUES (?, ?, ?)";
        $stmtInsertBestellungArtikel = $mysqli->prepare($queryInsertBestellungArtikel);
        $stmtInsertBestellungArtikel->bind_param("iii", $bestellungId, $row['id'], $artikelmenge);
        if (!$stmtInsertBestellungArtikel->execute()) {
            return json_encode(["error" => "Fehler beim Einfügen des Bestellartikels: " . $stmtInsertBestellungArtikel->error]);
        }
    }

    // Löschen der Warenkorbartikel, Warenkorb wird geleert
    $queryDeleteWarenkorb = "DELETE FROM WarenkorbArtikel WHERE warenkorb_ref = ?";
    $stmtDelete = $mysqli->prepare($queryDeleteWarenkorb);
    $stmtDelete->bind_param("i", $warenkorbId);
    if (!$stmtDelete->execute()) {
        return json_encode(["error" => "Fehler beim Löschen der Warenkorbartikel: " . $stmtDelete->error]);
    }

    // Aufräumen
    $stmtSelect->close();
    $stmtInsertBestellung->close();
    $stmtInsertBestellungArtikel->close();
    $stmtDelete->close();
    $mysqli->close();

    // Rückgabe der Bestellungs-ID oder einer Bestätigung
    return json_encode(['success' => true, 'message' => 'Bestellung erfolgreich aufgegeben.', 'bestellung_id' => $bestellungId]);
}

//alle Bestellungen des Kunden laden
function ladeBestellungen($kunde_ref) {
    require_once(__DIR__ . '/../db.php');

    $query = "SELECT b.id, b.lieferadresse_ref, b.zahlung_ref, b.bestelldatum, ba.Artikel_ref, ba.Menge 
              FROM Bestellung b
              LEFT JOIN BestellungArtikel ba ON b.id = ba.Bestellung_ref
              WHERE b.kunde_ref = ?";
    $stmt = $mysqli->prepare($query);
    if (!$stmt) {
        echo json_encode(["error" => "Fehler beim Vorbereiten der SQL-Anweisung: " . $mysqli->error]);
        return;
    }

    $stmt->bind_param("i", $kunde_ref);
    if (!$stmt->execute()) {
        echo json_encode(["error" => "Fehler beim Ausführen der SQL-Anweisung: " . $stmt->error]);
        return;
    }

    $result = $stmt->get_result();
    $bestellungen = [];
    while ($row = $result->fetch_assoc()) {
        $bestellung_id = $row['id'];

        // Prüfen, ob die Bestellung bereits im Array existiert
        if (!isset($bestellungen[$bestellung_id])) {
            $bestellungen[$bestellung_id] = [
                'id' => $row['id'],
                'lieferadresse_ref' => $row['lieferadresse_ref'],
                'zahlung_ref' => $row['zahlung_ref'],
                'bestelldatum' => $row['bestelldatum'],
                'artikel' => []
            ];
        }

        // Artikel zur Bestellung hinzufügen
        if (!empty($row['Artikel_ref'])) {
            $bestellungen[$bestellung_id]['artikel'][] = [
                'artikel_ref' => $row['Artikel_ref'],
                'menge' => $row['Menge']
            ];
        }
    }

    $stmt->close();

    // Rückgabe als JSON
    header('Content-Type: application/json');
    echo json_encode(array_values($bestellungen), JSON_PRETTY_PRINT);
}