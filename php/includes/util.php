<?php

/**
 * Given the name of an HTML form field, this function attempts
 * to read its assigned value from a POST (or GET) request.
 *
 * @param string $name The of a form field.
 * @return mixed The value assigned to the given field,
 * or null when no value is set.
 */
function get_field_value(string $name): mixed
{
    // return null when the field name is missing or invalid
    if (
        is_null($name)
        || !is_string($name)
        || strlen($name) <= 0
    )
        return null;

    // assume no value is assigned to the given field
    $value = null;

    if (isset($_POST[$name])) {
        // attempt to assign a value from a POST request
        $value = $_POST[$name];
    } elseif (isset($_GET[$name])) {
        // otherwise, attempt to assign a value from a GET request
        $value = $_GET[$name];
    }

    // return the assigned value, or null when no value is set
    return $value;
}

/**
 * HT: https://www.geeksforgeeks.org/php-program-for-write-a-program-to-print-all-permutations-of-a-given-string/
 *
 * This function swaps characters at positions $i and $j of a given string.
 *
 * @param string $str The string for which characters are swapped.
 * @param int $i The first character swap index.
 * @param int $j The second character swap index.
 *
 * @return string A copy of the given string with characters $i and $j swapped.
 */
function swap($str, $i, $j)
{
    // split the string into its individual characters
    $str_chars = str_split($str);

    // swap characters $i and $j of the given string
    $swap_char = $str_chars[$i];
    $str_chars[$i] = $str_chars[$j];
    $str_chars[$j] = $swap_char;

    // rejoin the string characters, and return the new string
    return implode($str_chars);
}
