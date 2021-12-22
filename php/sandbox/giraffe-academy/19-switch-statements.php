<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Switch Statements</title>
</head>

<body>
    <form action="" method="POST">
        <fieldset>
            <legend>Grade</legend>

            <p>Enter your grade</p>

            <label for="grade">Grade:</label>
            <input name="grade" type="text" autofocus>

            <input type="submit">
        </fieldset>
    </form>

    <section>
        <?php
        $grade = isset($_POST["grade"]) ? $_POST["grade"] : null;

        if (is_null($grade))
            # early return on no input
            return;

        echo ("<hr>");
        echo ("<strong>Output</strong><br>");

        switch (strtoupper($grade)) {
            case "A+":
            case "A-":
            case "A":
                echo ("Amazing! Congratulations on an A!");
                break;
            case "B+":
            case "B-":
            case "B":
                echo ("You did well! Congratulations on a B!");
                break;
            case "C+":
            case "C":
                echo ("Acceptable! You passed with a C!");
                break;
            case "C-":
            case "D+":
            case "D-":
            case "D":
                echo ("Sorry! You did poorly.");
                break;
            case "F":
                echo ("Sorry! You failed.");
                break;
            default:
                echo ("Invalid input.");
                break;
        }

        echo ("<br>");
        echo ("<hr>");
        ?>
    </section>
</body>

</html>
