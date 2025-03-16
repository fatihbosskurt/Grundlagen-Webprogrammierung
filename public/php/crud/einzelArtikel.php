<?php
session_start();
require_once(__DIR__ . '/../db.php');
require_once(__DIR__ . '/../auth/auth.php');
//Artikel aus grid von kollektion angeklickte Kleidungskarte wird mit der übergebenen ID geladen
if (isset($_GET['id'])) {
    $artikel_id = $_GET['id'];

    $query = "SELECT * FROM Artikel WHERE ID = ?";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $artikel_id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $artikel = $result->fetch_assoc();
            echo json_encode($artikel);
        } else {
            echo json_encode(['error' => 'Fehler beim Ausführen der SQL-Anweisung: ' . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['error' => 'Fehler beim Vorbereiten der SQL-Anweisung: ' . $mysqli->error]);
    }
    exit;
}
//fehler beim hinzufügen des Artiekls zum Warenkorb, da nicht eingeloggt
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['product_id'])) {
        $artikel_ref = $_POST['product_id'];

        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['error' => 'Benutzer nicht eingeloggt']);
            exit;
        }

        $kunde_id = $_SESSION['user_id'];
        $warenkorb_id = isset($_SESSION['warenkorb_id']) ? $_SESSION['warenkorb_id'] : null;
        if (!$warenkorb_id) {
            //falls User noch kein Warenkorb hat, wird ein neuer angelegt
            $query = "INSERT INTO Warenkorb (kunde_id) VALUES (?)";
            $stmt = $mysqli->prepare($query);
            if ($stmt) {
                $stmt->bind_param("i", $kunde_id);
                if ($stmt->execute()) {
                    $warenkorb_id = $stmt->insert_id;
                    $_SESSION['warenkorb_id'] = $warenkorb_id;
                } else {
                    echo json_encode(['error' => 'Fehler beim Erstellen des Warenkorbs: ' . $stmt->error]);
                    exit;
                }
                $stmt->close();
            } else {
                echo json_encode(['error' => 'Fehler beim Vorbereiten der SQL-Anweisung: ' . $mysqli->error]);
                exit;
            }
        }
        //Artikel wird dem Warenkorb hinzugefügt
        $query = "INSERT INTO WarenkorbArtikel (warenkorb_ref, artikel_ref, artikelmenge) VALUES (?, ?, 1)
                  ON DUPLICATE KEY UPDATE artikelmenge = artikelmenge + 1";
        $stmt = $mysqli->prepare($query);
        if ($stmt) {
            $stmt->bind_param("ii", $warenkorb_id, $artikel_ref);
            if ($stmt->execute()) {
                header("Location: ../../frontend/pages/kleidung.php?id=$artikel_ref");
                exit;
            } else {
                echo json_encode(['error' => 'Fehler beim Ausführen der SQL-Anweisung: ' . $stmt->error]);
            }
            $stmt->close();
        } else {
            echo json_encode(['error' => 'Fehler beim Vorbereiten der SQL-Anweisung: ' . $mysqli->error]);
        }
        exit;
    } else {
        echo json_encode(['error' => 'Produkt-ID fehlt']);
        exit;
    }
}
?>