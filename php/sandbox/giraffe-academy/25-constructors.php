<!DOCTYPE html>

<?php

class Book
{
    public $title;
    public $author;
    public $pages;
}

$library = array(new Book, new Book);

$library[0]->title = "Harry Potter";
$library[0]->author = "J.K. Rowling";
$library[0]->pages = 4100;

$library[1]->title = "Lord of the Rings";
$library[1]->author = "J. R. R. Tolkien";
$library[1]->pages = 128;

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
