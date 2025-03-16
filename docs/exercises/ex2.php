<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String umdrehen</title>
</head>
<body>

<h2>String umdrehen</h2>

<form method="post">
    <label for="inputString">String eingeben:</label><br>
    <input type="text" id="inputString" name="inputString"><br><br>
    <input type="submit" value="Ausführen">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function reverseString($str) {
        $reversed = "";

        for ($i = strlen($str) - 1; $i >= 0; $i--) {
            $reversed .= $str[$i];
        }

        return $reversed;
    }

    $inputString = $_POST["inputString"];
    $reversedString = reverseString($inputString);
    echo "<p>Reversed string: $reversedString</p>";
}
?>

</body>
</html>
