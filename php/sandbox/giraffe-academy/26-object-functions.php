<!DOCTYPE html>

<?php

class Student
{
    public $name;
    public $major;
    public $gpa;

    function __construct($name, $major, $gpa)
    {
        $this->name = $name;
        $this->major = $major;
        $this->gpa = $gpa;
    }

    public function has_honors()
    {
        $honors_gpa = 3.5;
        return $this->gpa >= $honors_gpa;
    }
}

$class = array(
    new Student("Jim", "Business", 2.8),
    new Student("Pam", "Art", 3.6)
);

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Object Functions</title>
</head>

<body>
    <?php foreach ($class as $student) { ?>
        <section>
            <hr>
            <h1><?= $student->name ?></h1>
            <h4><?= $student->major ?> Major</h4>
            <p>
                GPA: <?= $student->gpa ?>
                <?= $student->has_honors() ? "(honors)" : "" ?>
            </p>
            <hr>
        </section>
    <?php } ?>
</body>

</html>
