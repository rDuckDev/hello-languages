<!DOCTYPE html>

<?php include "includes/util.php" ?>

<html>

<head>
    <meta charset="utf-8">
    <title>PHP Includes</title>
</head>

<body>
    <?php
    echo ("PHP Includes");

    // $title = "My First Post";
    // $author = "rDuckDev";
    // $word_count = 400;
    include "includes/article-header.php"
    ?>
    <hr>
    <h2>Utilities</h2>
    <p>There are <?= $ft_per_mi ?> ft. per mi.</p>
    <p><?= print_hello() ?></p>
</body>

</html>
