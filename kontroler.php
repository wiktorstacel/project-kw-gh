<?php

class Kontroler {
    
    //private $dane_osob = array(); // Inicjalizuj pustą tablicę na dane osób

    public function index($dane_osob) {

    //    $this->dane_osob = $dane_osob; // Przypisz dane osób do właściwości

        // Pobierz dane lub wykonaj inne operacje biznesowe
        $dane_hello = "Witaj, świat!";
        
        // Wyświetl widok, przekazując mu dane
        include 'views/widok.php';
    }

    public function formularz() {
        include 'views/formularz.php';
    }

    public function obsluzFormularz($imie, $email, $dane_osob) {
        // Logika obsługi formularza (np. zapis do bazy danych)
        // Tu możesz dodać kod do walidacji danych, zapisu do bazy, itp.
    //    $this->dane_osob = $dane_osob;
        
        // Przykład prostego wyświetlenia danych z formularza
        $dane_hello = "Wprowadzone dane: Imię: $imie, Email: $email";
        // Dodaj dane osób do danych z formularza
        //$dane_z_formularza = array_merge($this->dane_osob, array('formularz' => $dane));
        // Wyświetl widok z danymi
        include 'views/widok.php';
    }

    // Dodaj inne metody obsługujące różne akcje

}

?>
