<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prosta Aplikacja PHP</title>
</head>
<body>

    <?php
    // Sprawdź, czy są dane do wyświetlenia
    if ($dane_osob) {
        echo "<ul>";
        foreach ($dane_osob as $osoba) {
            echo "<li>{$osoba['imie']} - {$osoba['email']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Błąd podczas pobierania danych.</p>";
    }
    ?>

    <h5><?php echo $dane_hello; ?></h5>
    <h5><?php echo $url; ?></h5>
    <h5><?php echo $cleanUrl; ?></h5>
    <p><a href="index.php?action=formularz">Przejdź do formularza</a></p>
</body>
</html>
