<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Rabatt</title>
    <link rel="stylesheet" type="text/css" href="../../styles/rabatt.css">
</head>
<body>
<div id="rabatt-popup" class="rabatt-popup">
    <div class="rabatt-popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <div id="rabatt-popup-initial">
            <h2>Jetzt 10% Rabatt abholen!</h2>
            <p>Klicke unten auf den Button, um deinen Rabattcode zu erhalten.</p>
            <button class="rabatt-popup-button" onclick="getDiscount()">Rabatt abholen</button>
        </div>
        <div id="rabatt-popup-code" style="display: none;">
            <h2>Dein Rabattcode</h2>
            <p id="discount-code"></p>
            <button class="rabatt-popup-button" onclick="closePopup()">Schließen</button>
        </div>
    </div>
</div>
<script src="../../js/rabatt.js"></script>
</body>
</html>
