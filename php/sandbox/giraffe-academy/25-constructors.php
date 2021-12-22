<!DOCTYPE html>

<?php

class Book
{
    public $title;
    public $author;
    public $pages;

    function __construct($arg_title, $arg_author, $arg_pages)
    {
        $this->title = $arg_title;
        $this->author = $arg_author;
        $this->pages = $arg_pages;

        echo ("$arg_title was added to the library!<br>");
    }
}

$library = array(
    new Book(
        "Harry Potter",
        "J.K. Rowling",
        4100
    ),
    new Book(
        "Lord of the Rings",
        "J. R. R. Tolkien",
        128
    )
);

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Classes and Objects</title>
</head>

<body>
    <?php foreach ($library as $book) { ?>
        <section>
            <hr>
            <h2><?= $book->title ?></h2>
            <h4>By <?= $book->author ?></h4>
            <p>Page count: <?= $book->pages ?></p>
            <hr>
        </section>
    <?php } ?>

</body>

</html>
