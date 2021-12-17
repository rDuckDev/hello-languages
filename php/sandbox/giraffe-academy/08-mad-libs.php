<!DOCTYPE html>

<?php
$color = isset($_GET["color"]) ? $_GET["color"] : null;
$plural_noun = isset($_GET["plural_noun"]) ? $_GET["plural_noun"] : null;
$celebrity = isset($_GET["celebrity"]) ? $_GET["celebrity"] : null;

$output_class = is_null($color) || is_null($plural_noun) || is_null($celebrity)
    ? "hide"
    : "show";
?>

<html>

<head>
    <meta charset="utf-8">

    <style type="text/css">
        .hide {
            display: none;
        }

        .show {
            display: "block";
        }
    </style>

    <title>Mad Libs</title>
</head>

<body>
    <form action="08-mad-libs.php" method="GET">
        <fieldset>
            <legend>Mad Libs</legend>

            <label for="color">Color:</label>
            <input name="color" type="text"><br>

            <label for="plural_noun">Plural noun:</label>
            <input name="plural_noun" type="text"><br>

            <label for="celebrity">Celebrity:</label>
            <input name="celebrity" type="text"><br><br>

            <input type="submit">
        </fieldset>
    </form>
    <section class="<?= $output_class ?>">
        <hr>
        <strong>Output</strong><br>
        <?= "Roses are $color<br>" ?>
        <?= "$plural_noun are blue<br>" ?>
        <?= "I love $celebrity" ?>
        <hr>
    </section>
</body>

</html>
