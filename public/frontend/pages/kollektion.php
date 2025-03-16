<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kollektion</title>
    <link rel="stylesheet" type="text/css" href="../../styles/global.css">
    <link rel="stylesheet" type="text/css" href="../../styles/rabatt.css">
    <link rel="stylesheet" type="text/css" href="../../styles/kollektion.css">
</head>
<body>
<div id="navbar">
    <?php require_once('../components/navbar.php'); ?>
</div>

<div id="header-image"><img src="../../assets/images/test44.jpg" alt="Header Image"></div>
<h1>BASICS</h1>
<h2>Hier gibts wilde Sachen!</h2>

<?php
require_once('../../php/crud/artikel.php');
?>
<script>
    const artikelJson = <?php echo $artikelJson; ?>;
</script>

<div class="container">
    <div class="filter-container">
        <div class="sortieren">
            <label for="sortieren">Sortieren nach:</label>
            <select id="sortieren">
                <option value="keine-sortierung">Keine Sortierung</option>
                <option value="preis-aufsteigend">Preis aufsteigend</option>
                <option value="preis-absteigend">Preis absteigend</option>
            </select>
        </div>
        <div class="kategorie">
            <label for="kategorie">Kategorie:</label>
            <select id="kategorie">
                <option value="alle">Alle</option>
                <option value="T-Shirt">T-Shirt</option>
                <option value="Sweatshirt">Sweatshirt</option>
                <option value="Hose">Hose</option>
            </select>
        </div>
    </div>

    <div class="collection" id="artikelCollection"></div>
</div>

<script src="../../js/artikel.js"></script>
<script src="../../js/rabatt.js"></script>

<?php require_once('../components/footer.php'); ?>
</body>
</html>
