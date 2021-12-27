<!DOCTYPE html>

<?php

include "../includes/util.php";
include "../includes/permutations.php";
include "../includes/lexicon.php";

// read a value from the word field, if given
$word = get_field_value("word");
// generate every unique anagram for the given word
$anagrams = (new Permutations($word))->get_permutations();
// generate a lexicon of English words
$lexicon = (new Lexicon())->get_terms();
// identify all anagrams that are also English words
$dictionary_words = array_intersect_assoc($anagrams, $lexicon);

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
                    <small class="form-text text-muted">
                        Hint: want a word with multiple anagrams?
                        Try entering the word <em>beast</em>.
                    </small>
                </div>
            </fieldset>
        </form>
        <section class="my-3 <?= $output_classes ?>">
            <h2>Anagrams of <?= $word ?>:</h2>
            <ul class="list-group">
                <?php foreach ($dictionary_words as $word => $nil) { ?>
                    <li class="list-group-item"><?= $word ?></li>
                <?php } ?>
            </ul>
        </section>
    </section>
</body>

</html>
