<?php

require_once 'kontroler.php';
require_once 'model.php';

// Obsługa żądania użytkownika
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Utworzenie obiektu kontrolera i modelu
$kontroler = new Kontroler();
$model = new Model();

// Pobierz dane z bazy danych
$dane_osob = $model->pobierzDane();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'formularz') {
    $bledy = $model->walidujDane($_POST['imie'], $_POST['email']);

    if (empty($bledy)) {
        // Zapisz do bazy danych tylko wtedy, gdy dane są poprawne
        if ($model->zapiszDoBazy($_POST['imie'], $_POST['email'])) {
            $kontroler->obsluzFormularz($_POST['imie'], $_POST['email'],$dane_osob);
        } else {
            // Obsługa błędu zapisu do bazy danych
            echo "Błąd zapisu do bazy danych.";
        }
    } else {
        include 'views/formularz.php';
    }
} else {
    $kontroler->$action($dane_osob);
}



?>
