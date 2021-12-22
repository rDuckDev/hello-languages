<!DOCTYPE html>

<?php

function print_hello($name = null, $age = null)
{
    // assign default values, when necessary
    $name = is_null($name) ? "User" : $name;
    $age = is_null($age) ? 0 : $age;

    echo ("Hello $name (age $age)!<br>");
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Functions</title>
</head>

<body>
    <?php
    print_hello();
    print_hello("Tom");
    print_hello("Dave", 43);
    print_hello("Oscar", 25);
    ?>
</body>

</html>
