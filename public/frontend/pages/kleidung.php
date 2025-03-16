<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Ansicht</title>
    <link rel="stylesheet" type="text/css" href="../../styles/global.css">
    <link rel="stylesheet" type="text/css" href="../../styles/rabatt.css">
    <link rel="stylesheet" type="text/css" href="../../styles/kleidung.css">
    <link rel="stylesheet" type="text/css" href="../../styles/anmelden-popup.css">
</head>
<body>
<?php require_once('../components/rabatt.php'); ?>
<div id="navbar">
    <?php require_once('../components/navbar.php'); ?>
</div>

<section class="product">
    <div class="product-image">
        <img id="product-image" alt="Produktbild">
    </div>

    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modal-image">
        <div id="caption"></div>
    </div>

    <div class="product-info">
        <h2 class="product-title" id="product-title"></h2>
        <p class="product-price" id="product-price"></p>
        <p class="product-description" id="product-description"></p>
        <div class="product-details" id="product-details">
            <form id="add-to-cart-form" action="../../php/crud/einzelArtikel.php" method="post">
                <label for="size">Größe wählen:</label>
                <select id="size" name="size">
                    <option value="small">Klein</option>
                    <option value="medium">Mittel</option>
                    <option value="large">Groß</option>
                </select>
                <br>
                <input type="hidden" name="product_id" id="product_id">
                <button type="submit" id="Hinzufügen">Hinzufügen</button>
            </form>
            <h3>Details</h3>
            <ul id="product-specs"></ul>
            <ul>
                <br>
                <li>Farbe:</li>
                <div id="color-options"></div>
            </ul>
        </div>
    </div>
</section>

<script src="../../js/rabatt.js"></script>
<script src="../../js/einzelArtikel.js"></script>
<script src="../../js/anmelden-popup.js"></script>

<?php require_once('../components/footer.php'); ?>
</body>
</html>
