<?php

$ft_per_mi = 5280;

function print_hello($name = null)
{
    $name = is_null($name) ? "User" : $name;
    echo ("Hello $name!");
}

?>
