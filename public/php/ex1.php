<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["number"])) {
        $result = calculateFactorial($_POST["number"]);
        echo "Factorial of ".$_POST["number"]." is ".$result;
    }
}

function calculateFactorial($n) {
    if ($n < 0) {
        return "Factorial is not defined for negative numbers";
    }
    $factorial = 1;
    for ($i = 1; $i <= $n; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}
?>