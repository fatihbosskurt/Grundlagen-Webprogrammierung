<?php

require_once 'exercises/ex1.php';
require_once 'exercises/ex2.php';
require_once 'exercises/ex3.php';
require_once 'exercises/ex4.php';

/**
 * Sollte Ihre Implementierung NULL zurückgeben, obwohl Sie Code für eine Funktion definiert
 * haben, wird Ihnen auf der Seite nichts angezeigt. Entfernen Sie dann für das Debugging die Überprüfung
 * auf NULL, um in jedem Fall etwas angezeigt zu bekommen.
 *  
 * Hard-gecodete Rückgabewerte sind nicht das Ziel
 * dieser Übung, auch wenn es nur einen Testfall gibt. Ihre Aufgabe besteht darin, wie bereits in GProg im 1.
 * Semester sämtliche Testfälle abzudecken - testen Sie auch gerne mit anderen Werten!
 */

function testFactorial() {
    $input = 5;
    $expected_output = 120;
    $output = calculateFactorial($input);
    if ($output == null) { 
        echo "calculateFactorial() was not tested due to null return";
        return;
    }
    echo "Testing calculateFactorial($input)...\n";
    echo "Expected Output: $expected_output\n";
    echo "Actual Output: $output\n";
    echo "Result: " . (($output === $expected_output) ? "Pass" : "Fail") . "\n";
}

function testStringReverse() {
    $input = "hello";
    $expected_output = "olleh";
    $output = reverseString($input);
    if ($output == null) { 
        echo "reverseString() was not tested due to null return";
        return;
    }
    echo "Testing reverseString(\"$input\")...\n";
    echo "Expected Output: $expected_output\n";
    echo "Actual Output: $output\n";
    echo "Result: " . (($output === $expected_output) ? "Pass" : "Fail") . "\n";
}

function testPalindrome() {
    $input = "racecar";
    $expected_output = true;
    $output = isPalindrome($input);
    if ($output == null) { 
        echo "isPalindrome() was not tested due to null return";
        return;
    }
    echo "Testing isPalindrome(\"$input\")...\n";
    echo "Expected Output: " . ($expected_output ? "true" : "false") . "\n";
    echo "Actual Output: " . ($output ? "true" : "false") . "\n";
    echo "Result: " . (($output === $expected_output) ? "Pass" : "Fail") . "\n";
}

function testFibonacci() {
    $input = 6;
    $expected_output = [0, 1, 1, 2, 3, 5];
    $output = generateFibonacci($input);
    if ($output == null) { 
        echo "generateFibonacci() was not tested due to null return";
        return;
    }
    echo "Testing generateFibonacci($input)...\n";
    echo "Expected Output: " . implode(", ", $expected_output) . "\n";
    echo "Actual Output: " . implode(", ", $output) . "\n";
    echo "Result: " . (($output === $expected_output) ? "Pass" : "Fail") . "\n";
}

$newlines = "<br><br><br>";
echo "Test results:";
echo $newlines;
testFactorial();
echo $newlines;
testStringReverse();
echo $newlines;
testPalindrome();
echo $newlines;
testFibonacci();