<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>While Loops</title>
</head>

<body>
    <?php
    $idx = 1;
    $term = 10;

    echo ("<p>Let's count to $term!</p>");

    while ($idx <= $term) {
        echo ("$idx<br>");
        $idx++;
    }
    ?>
</body>

</html>
