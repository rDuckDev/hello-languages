<!DOCTYPE html>

<?php
# compose the 'Hello World!' message using string concatenation
$hello = "Hello";
$world = "World";
$hello_world = $hello . " " . $world . "!";
?>

<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1/dist/cosmo/bootstrap.min.css">

    <title>Hello World!</title>
</head>

<body class="h-100 d-flex align-items-center">
    <section class="container-fluid text-center">
        <h1><?php echo $hello_world ?></h1>
    </section>
</body>

</html>
