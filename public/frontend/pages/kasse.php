<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Kasse</title>
    <link rel="stylesheet" type="text/css" href="../../styles/global.css">
    <link rel="stylesheet" type="text/css" href="../../styles/kasse.css">
</head>
<body>
<div id="navbar">
    <?php require_once('../components/navbar.php'); ?>
</div>

<main>
    <div class="checkout-container">
        <h1>Checkout</h1>
        <div class="checkout-content">
            <form class="checkout-form">
                <div class="form-group">
                    <label for="email">E-Mail-Adresse</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Adresse</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="city">Stadt</label>
                    <input type="text" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="zip">Postleitzahl</label>
                    <input type="text" id="zip" name="zip" required>
                </div>
                <div class="form-group">
                    <label for="country">Land</label>
                    <select id="country" name="country" required>
                        <option value="">Bitte wählen...</option>
                        <option value="DE">Deutschland</option>
                        <option value="AT">Österreich</option>
                        <option value="CH">Schweiz</option>

                    </select>
                </div>
                <button type="submit">Weiter zur Zahlung</button>
            </form>
            <div class="cart-summary">
                <h2>Ihr Warenkorb</h2>
                <div class="cart-item">
                    <span class="item-name">Produkt 1</span>
                    <span class="item-price">€20.00</span>
                </div>
                <div class="cart-item">
                    <span class="item-name">Produkt 2</span>
                    <span class="item-price">€15.00</span>
                </div>
                <div class="total-price">
                    <span>Gesamt:</span>
                    <span>€35.00</span>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once('../components/footer.php'); ?>
</body>
</html>
