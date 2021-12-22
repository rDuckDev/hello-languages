<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>For Loops</title>
</head>

<body>
    <?php
    $term = 10;

    echo ("<p>Let's count to $term!</p>");

    // count from 1 to 10
    for ($i = 1; $i <= $term; $i++) {
        // include halves in the count
        for ($ii = 0; $ii < 10; $ii += 5) {
            echo ("$i.$ii<br>");
        }
    }
    echo ("<br>");

    $lucky_numbers = array(2, 7, 13, 21, 26, 50);
    $count = count($lucky_numbers);
    echo ("Lucky numbers: ");
    for ($i = 0; $i < $count; $i++) {
        $num = $lucky_numbers[$i];
        $sep = $i == $count - 1
            ? ""
            : ", ";
        echo ("$num" . "$sep");
    }
    echo ("<br><br>");

    $names = array(
        "Kevin",
        "Karen",
        "Oscar",
        "Jim"
    );
    echo ("Students:<br>");
    foreach ($names as $name) {
        echo ("$name<br>");
    }
    ?>
</body>

</html>
