<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Strings</title>
</head>

<body>
    <?php
    // print a plaintext string to HTML
    echo ("Literal: rDuckDev");
    echo ("<hr>");

    // print a plaintext string variable to HTML
    $brand = "rDuckDev";
    echo ("Variable: $brand");
    echo ("<hr>");

    // print string manipulations
    // HT: https://plentifun.com/funny-tongue-twisters
    $tongue_twister = "Duck takes licks in lakes Luke Luck likes.";
    echo ("Phrase: $tongue_twister<br>");
    echo ("Upper: " . strtoupper($tongue_twister) . "<br>");
    echo ("Lower: " . strtolower($tongue_twister) . "<br>");
    echo ("<br>");
    echo ("Length: " . strlen($tongue_twister) . " characters<br>");
    echo ("Character (6): " . $tongue_twister[6 - 1] . "<br>");
    echo ("<br>");
    $tongue_twister[32] = "i";
    echo ("Reword (char): $tongue_twister<br>");
    echo ("Reword (word): " . str_replace("Lick", "Lake", $tongue_twister) . "<br>");
    echo ("First word: " . substr($tongue_twister, 0, 4) . "<br>");
    ?>
</body>

</html>
