<?php

//gibt alle Artikel aus der Artikel Tabelle aus
function readAllArtikel() {
    require_once(__DIR__ . '/../db.php');
    $query = "SELECT * FROM Artikel";
    $stmt = $mysqli->prepare($query);
    if (!$stmt) {
        echo "Fehler beim Vorbereiten der SQL-Anweisung: " . $mysqli->error;
        return [];
    }

    if (!$stmt->execute()) {
        echo "Fehler beim Ausführen der SQL-Anweisung: " . $stmt->error;
        return [];
    }

    $result = $stmt->get_result();
    $artikel = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
    return $artikel;
}

$artikelJson = json_encode(readAllArtikel());

//sortiert Artikel Preis vom niedrigsten zum höchsten Preis
function minPreis() {
    require_once('../db.php');
    $stmt ="SELECT * FROM Artikel ORDER BY Preis ASC" ;
    $result = $mysqli->query($stmt);
}

//sortiert Artikel Preis vom höchsten zum niedrigsten Preis
function maxPreis() {
    require_once('../db.php');
    $stmt ="SELECT * FROM Artikel ORDER BY Preis DESC" ;
    $result = $mysqli->query($stmt);
}

