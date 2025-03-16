<?php
session_start();

$response = [
    'success' => false,
    'message' => ''
];


if (isset($_GET['action']) && $_GET['action'] == "login") {
    require_once(__DIR__ . '/../db.php');
    require_once(__DIR__ . '/../auth/auth.php');

    $email = $_POST["email"];
    $passwort = $_POST["passwort"];
//login anweisung
    $sql = "SELECT ID, warenkorb_ref FROM Kunde WHERE email = ? AND passwort = ?";
    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ss", $email, $passwort);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Login erfolgreich
            $row = $result->fetch_assoc();
            startSession($row['ID'], $row['warenkorb_ref']); // Session mit Benutzer-ID und Warenkorb-ID starten
            $response['success'] = true;
            $response['redirect'] = '../../frontend/pages/konto.php';
        } else {
            $response['message'] = "Ungültige E-Mail oder Passwort.";
        }
    }
    echo json_encode($response);
    exit();
}

define('PEPPER_LENGTH', 32);


$pepper = random_bytes(PEPPER_LENGTH);

$pepperHex = bin2hex($pepper);


if (isset($_GET['action']) && $_GET['action'] == "register") {
    require_once(__DIR__ . '/../db.php');
    require_once(__DIR__ . '/../auth/auth.php');

    // Parameter aus dem POST-Array lesen
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $email = $_POST["email"];
    $passwort = $_POST["passwort"];
    $telnummer = $_POST["telnummer"];
    $strasse = $_POST["strasse"];
    $postleitszahl = $_POST["postleitszahl"];
    $ort = $_POST["ort"];

    //Insert-Anweisung für den Warenkorb
    $sqlWarenkorb = "INSERT INTO Warenkorb () VALUES ()";
    $stmtWarenkorb = $mysqli->prepare($sqlWarenkorb);
    $stmtWarenkorb->execute();
    $warenkorbId = $stmtWarenkorb->insert_id;
    //Anweisung für die Zahlung
    $sqlZahlung = "INSERT INTO Zahlung (kontoinhaber, iban) VALUES ('', '')";
    $stmtZahlung = $mysqli->prepare($sqlZahlung);
    $stmtZahlung->execute();
    $zahlungId = $stmtZahlung->insert_id;

     $sqlLieferadresse = "INSERT INTO Lieferadresse (strasse, postleitszahl, ort) VALUES (?, ?, ?)";
    $stmtLieferadresse = $mysqli->prepare($sqlLieferadresse);
    $stmtLieferadresse->bind_param("sss", $strasse, $postleitszahl, $ort);
    $stmtLieferadresse->execute();
    $lieferadresseId = $stmtLieferadresse->insert_id;

    // Passwort mit Pepper hashen
    $passwortWithPepper = $passwort . $pepperHex;
    $hashedPasswort = password_hash($passwortWithPepper, PASSWORD_DEFAULT);

    // Insert zum anlegen des Kunden
    $sqlKunde = "INSERT INTO Kunde (vorname, nachname, email, passwort, telnummer, lieferadresse_ref, zahlung_ref, warenkorb_ref)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtKunde = $mysqli->prepare($sqlKunde);
    $stmtKunde->bind_param("ssssssii", $vorname, $nachname, $email, $hashedPasswort, $telnummer, $lieferadresseId, $zahlungId, $warenkorbId);
    $stmtKunde->execute();

    if ($stmtKunde->affected_rows > 0) {
        // Registrierung erfolgreich, Benutzer-ID holen
        $user_id = $stmtKunde->insert_id;

        // Session mit Benutzer-ID und Warenkorb-ID starten
        startSession($user_id, $warenkorbId);

        // Weiterleitung auf Konto
        header("Location: ../../frontend/pages/konto.php");
        exit(); // Skript nach der Weiterleitung beenden
    } else {
        echo "Fehler bei der Registrierung.";
    }
}



//speichern und updaten der Zahlungsinformation
    if (isset($_GET['action']) && $_GET['action'] == "speichernZahlungsinformationen") {
        require_once(__DIR__ . '/../db.php');
        require_once(__DIR__ . '/../auth/auth.php');

        $user_id = $_SESSION['user_id'];
        $kontoinhaber = $_POST["kontoinhaber"];
        $iban = $_POST["iban"];

        $sql = "UPDATE Zahlung z
                    JOIN Kunde k ON k.Zahlung_ref = z.id
                    SET z.kontoinhaber = ?, z.iban = ?
                    WHERE k.ID = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("ssi", $kontoinhaber, $iban, $user_id);
            if ($stmt->execute()) {
                header("Location: ../../frontend/pages/konto.php");
                exit();
            } else {
                echo "Fehler beim Speichern der Zahlungsinformationen.";
            }
        }
        //speichern und updaten der Lieferadresse
        if (isset($_GET['action']) && $_GET['action'] == "speichernLieferadresse") {
            require_once(__DIR__ . '/../db.php');
            require_once(__DIR__ . '/../auth/auth.php');
        
            // Debugging-Code zur Überprüfung der POST-Daten
            if (isset($_POST['strasse']) && isset($_POST['postleitszahl']) && isset($_POST['ort'])) {
                error_log("POST-Daten: Strasse = " . $_POST['strasse'] . ", Postleitszahl = " . $_POST['postleitszahl'] . ", Ort = " . $_POST['ort']);
            } else {
                error_log("POST-Daten fehlen");
            }
        
            $user_id = $_SESSION['user_id'];
            $strasse = $_POST["strasse"] ?? '';
            $postleitszahl = $_POST["postleitszahl"] ?? '';
            $ort = $_POST["ort"] ?? '';
        
            // Überprüfen, ob die Werte nicht leer sind
            if (empty($strasse) || empty($postleitszahl) || empty($ort)) {
                echo "Alle Felder müssen ausgefüllt sein.";
                exit();
            }
        
            $sql = "UPDATE Lieferadresse l
                    JOIN Kunde k ON k.Lieferadresse_ref = l.id
                    SET l.strasse = ?, l.postleitszahl = ?, l.ort = ?
                    WHERE k.ID = ?";
            $stmt = $mysqli->prepare($sql);
            if (!$stmt) {
                echo "Fehler beim Vorbereiten der SQL-Anweisung: " . $mysqli->error;
                exit();
            }
            $stmt->bind_param("sssi", $strasse, $postleitszahl, $ort, $user_id);
            if ($stmt->execute()) {
                header("Location: ../../frontend/pages/konto.php");
                exit();
            } else {
                echo "Fehler beim Speichern der Lieferadresse: " . $stmt->error;
            }
            $stmt->close();
        }

    //kunde wird geladen
    function kundeLaden($user_id) {
        require_once(__DIR__ . '/../db.php');
        require_once(__DIR__ . '/../auth/auth.php');

        if (!isset($_SESSION)) {
            session_start();
        }

        $query = "SELECT k.vorname, k.nachname, k.email, k.telnummer, k.Lieferadresse_ref, k.Zahlung_ref, 
                        l.strasse, l.postleitszahl, l.ort,
                        z.kontoinhaber, z.iban
                FROM Kunde k
                LEFT JOIN Lieferadresse l ON k.Lieferadresse_ref = l.id
                LEFT JOIN Zahlung z ON k.Zahlung_ref = z.id
                WHERE k.ID = ?";

        $stmt = $mysqli->prepare($query);
        if (!$stmt) {
            echo "Fehler beim Vorbereiten der SQL-Anweisung: " . $mysqli->error;
            return null;
        }

        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $stmt->close();
            return $row;
        } else {
            $stmt->close();
            return null;
        }
    }

    //Kundenkonto löschen
    if (isset($_GET['action']) && $_GET['action'] == "kundeLoeschen" && $_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once(__DIR__ . '/../db.php');
        require_once(__DIR__ . '/../auth/auth.php');
        
        if (!isset($_SESSION['user_id'])) {
            echo "Keine gültige Session gefunden.";
            exit();
        }
    
        $user_id = $_SESSION['user_id'];
        error_log("kundeLoeschen Methode aufgerufen für Benutzer-ID: " . $user_id);
        
        $stmt = $mysqli->prepare("DELETE FROM Kunde WHERE ID = ?");
        if (!$stmt) {
            echo "Fehler beim Vorbereiten der SQL-Anweisung: " . $mysqli->error;
            exit();
        }
        
        $stmt->bind_param("i", $user_id);
        
        if ($stmt->execute()) {
            echo "Benutzer erfolgreich gelöscht.";
        } else {
            echo "Fehler beim Löschen des Benutzers: " . $stmt->error;
        }
        
        $stmt->close();
        exit();
    }
