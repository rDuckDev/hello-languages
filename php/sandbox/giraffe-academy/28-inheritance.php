<!DOCTYPE html>

<?php

/** A generic class of chef. */
class Chef
{
    /** The cuisine specialized in by a chef. */
    protected $cuisine_type;

    function __construct()
    {
        $this->cuisine_type = "standard";
    }

    /** This method prints which chef (by cuisine) prepared the given dish. */
    protected function make_dish($dish_name)
    {
        echo ("The $this->cuisine_type chef makes $dish_name.<br>");
    }

    /** This method has the chef prepare chicken. */
    public function make_chicken()
    {
        $this->make_dish("chicken");
    }

    /** This method has the chef prepare salad. */
    public function make_salad()
    {
        $this->make_dish("salad");
    }

    /** This method has the chef prepare their specialty dish. */
    public function make_specialty()
    {
        $this->make_dish("bbq ribs");
    }
}

class ItalianChef extends Chef
{
    function __construct()
    {
        $this->cuisine_type = "italian";
    }

    /** This method has the chef prepare pasta. */
    public function make_pasta()
    {
        $this->make_dish("pasta");
    }

    /** This method has the chef prepare their specialty dish. */
    public function make_specialty()
    {
        $this->make_dish("chicken gnocchi");
    }
}

$chef = new Chef();
$italian_chef = new ItalianChef();

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Inheritance</title>
</head>

<body>
    <?= $chef->make_chicken() ?>
    <?= $italian_chef->make_chicken() ?>
    <hr>
    <?= $chef->make_specialty() ?>
    <?= $italian_chef->make_specialty() ?>
</body>

</html>
