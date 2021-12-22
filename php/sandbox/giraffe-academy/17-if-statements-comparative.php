<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Comparative If Statements</title>
</head>

<body>
    <?php
    # given three integer values, this function returns the largest value;
    # otherwise, this function returns null on invalid input
    function get_max($n1 = null, $n2 = null, $n3 = null)
    {
        # early return on invalid input
        if (!is_integer($n1)) return null;
        if (!is_integer($n2)) return null;
        if (!is_integer($n3)) return null;

        if ($n1 >= $n2 && $n1 >= $n3) {
            # return $n1 when it is at least equal $n2 and $n3
            return $n1;
        } elseif ($n2 >= $n3) {
            # return $n2 when it is at least equal $n3
            # and strictly greater than $n1
            return $n2;
        } else {
            # return $n3 when it is strictly greater than $1 and $n2
            return $n3;
        }
    }

    # randomly assign three integer values
    $x = rand(0, 50);
    $y = rand(0, 50);
    $z = rand(0, 50);

    echo ("\$x = $x<br>");
    echo ("\$y = $y<br>");
    echo ("\$z = $z<br>");

    echo ("The largest value is " . get_max($x, $y, $z) . ".<br>");
    ?>
</body>

</html>
