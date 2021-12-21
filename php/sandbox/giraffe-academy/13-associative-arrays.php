<!DOCTYPE html>

<?php
$student = isset($_POST["student"])
    ? $_POST["student"]
    : null;

$output_style = is_null($student)
    ? "display:none"
    : "display:block";
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Associative Arrays</title>
</head>

<body>
    <?php
    $grades = array(
        "Jim" => "A+",
        "Pam" => "B-",
        "Oscar" => "C+",
    );

    echo (count($grades) . " students took an exam...<br>");
    foreach ($grades as $name => $grade) {
        echo ("$name received a grade of $grade.<br>");
    }

    $grades["Jim"] = "F";
    $grades["Pam"] = "B+";
    echo ("<br>After careful review, their grades were changed...<br>");
    foreach ($grades as $name => $grade) {
        echo ("$name received a grade of $grade.<br>");
    }
    echo ("<br>");
    ?>

    <form action="13-associative-arrays.php" method="POST">
        <fieldset>
            <legend>Grade Search</legend>

            <label for="student">Student</label>
            <input name="student" type="text">

            <input type="submit">
        </fieldset>
    </form>

    <section style="<?= $output_style ?>">
        <hr>
        <strong>Output</strong><br>
        <?= "$student received a grade of $grades[$student].<br>" ?>
        <hr>
    </section>
</body>

</html>
