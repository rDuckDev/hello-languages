<!DOCTYPE html>

<?php
$fruits = isset($_POST["fruits"])
    ? $_POST["fruits"]
    : null;

$output_style = is_null($fruits)
    ? "display:none"
    : "display:block";
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Checkboxes</title>
</head>

<body>
    <form action="12-checkboxes.php" method="POST">
        <fieldset>
            <legend>Favorite Fruits</legend>

            <p>Please submit your favorite fruits</p>

            <input name="fruits[]" type="checkbox" value="apples">Apples<br>
            <input name="fruits[]" type="checkbox" value="oranges">Oranges<br>
            <input name="fruits[]" type="checkbox" value="pears">Pears<br><br>

            <input type="submit">
        </fieldset>
    </form>

    <section style="<?= $output_style ?>">
        <hr>
        <strong>Output</strong><br>
        <p>Preferred fruits:</p>
        <?php
        foreach ($fruits as $fruit_name) {
            echo ($fruit_name . "<br>");
        }
        ?>
        <hr>
    </section>
</body>

</html>
