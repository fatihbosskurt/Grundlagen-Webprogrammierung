<?php
session_start();

function startSession($user_id, $warenkorb_id) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['warenkorb_id'] = $warenkorb_id;
}

function endSession() {
    session_unset();
    session_destroy();
    header("Location: /frontend/pages/login.php"); // weiterleitung auf login
    exit();
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])) {
    endSession();
}
?>
