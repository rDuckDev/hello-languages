<!DOCTYPE html>

<?php

include "../includes/util.php";

$word = get_field_value("word");

// hide the output section when no word is given
$output_classes = is_null($word) || empty($word)
    ? "d-none"
    : "";
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1/dist/cosmo/bootstrap.min.css">

    <title>Anagram Generator</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-xs navbar-dark bg-dark">
            <section class="container">
                <span class="navbar-brand">Anagram Generator</span>
            </section>
        </nav>
    </header>
    <section class="container my-3">
        <form action="index.php" method="POST">
            <fieldset>
                <div class="form-group">
                    <div class="input-group">
                        <input name="word" type="text" value="<?= $word ?>" class="form-control" placeholder="Enter a word to anagram" autofocus>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </div>
            </fieldset>
        </form>
        <section class="my-3 <?= $output_classes ?>">
            <h2>Anagrams of <?= $word ?>:</h2>
            <!-- TODO: list all anagrams -->
        </section>
    </section>
</body>

</html>
