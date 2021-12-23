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
