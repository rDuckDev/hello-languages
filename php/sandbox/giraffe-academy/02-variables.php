<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Mad Libs (Variables)</title>
</head>

<body>
    <?php
    $character_name = "Otis";
    $character_age = 28;

    echo ("There once was a man named $character_name.<br>");
    echo ("He was $character_age years old.<br>");

    $character_name = "Odie";

    echo ("He really liked the name $character_name.<br>");
    echo ("But didn't like being $character_age.");
    ?>
</body>

</html>
