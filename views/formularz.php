<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prosta Aplikacja PHP - Formularz</title>
</head>
<body>
    <h2>Prosty Formularz</h2>

    <!-- Wyświetl błędy, jeśli istnieją - czy to nie mieszanie logiki z widokiem?-->
    <?php if (!empty($bledy)) : ?>
        <ul style="color: red;">
            <?php foreach ($bledy as $blad) : ?>
                <li><?php echo htmlspecialchars($blad); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="index.php?action=formularz" method="post">
        <label for="imie">Imię:</label>
        <input type="text" name="imie" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <input type="submit" value="Wyślij">
    </form>
    <br>
    <p><a href="index.php?action=index">Wróć do strony głównej</a></p>
</body>
</html>

