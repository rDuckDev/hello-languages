<?php
// assign default values to each field, if necessary
$title = isset($title) ? $title : "Lorem ipsum";
$author = isset($author) ? $author : "J. Doe";
$word_count = isset($word_count) ? $word_count : "NaN";
?>
<article>
    <h2><?= $title ?></h2>
    <h4><?= $author ?></h4>
    Word count: <?= $word_count ?>
</article>
