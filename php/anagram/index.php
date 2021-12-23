<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1/dist/cosmo/bootstrap.min.css">

    <title>Anagram</title>
</head>

<body>
    <header>
        <h1>Anagram Generator</h1>
    </header>
    <form action="index.php" method="POST">
        <label for="word">Enter a word:</label>
        <input name="word" type="text">
        <input type="submit">
    </form>
    <section>
        <h2>Anagrams of {word}:</h2>
        <!-- TODO: list all anagrams -->
    </section>
</body>

</html>
