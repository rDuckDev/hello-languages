<!DOCTYPE html>

<?php

class Movie
{
    public $title;
    private $rating;

    function __construct($title, $rating)
    {
        $this->title = $title;
        $this->set_rating($rating);
    }

    public function get_rating()
    {
        return $this->rating;
    }

    public function set_rating($rating)
    {
        $valid_ratings = array("G", "PG", "PG-13", "R", "NR");
        // all ratings must be uppercase
        $rating = strtoupper($rating);

        if (in_array($rating, $valid_ratings)) {
            // assign a valid rating
            $this->rating = $rating;
        } else {
            // otherwise, make the movie unrated
            $this->set_rating("NR");
        }
    }
}

// create a library of movies
$library = array(
    new Movie("Avengers", "PG-13"),
    new Movie("Harry Potter", "Phoenix") // invalid rating
);

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Getters and Setters</title>
</head>

<body>
    <?php foreach ($library as $movie) { ?>
        <section>
            <hr>
            <h2><?= $movie->title ?></h2>
            <h4>Rated <?= $movie->get_rating() ?></h4>
            <hr>
        </section>
    <?php } ?>
</body>

</html>
