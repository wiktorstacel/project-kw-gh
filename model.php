<?php

class Model {
    
    private $db;

    public function __construct()
    {
        // Ustawienia bazy danych
        $dbHost = 'localhost';
        $dbName = 'test';
        $dbUser = 'root';
        $dbPassword = '';

        // Inicjalizacja PDO
        try {
            $this->db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Błąd połączenia z bazą danych: " . $e->getMessage();
            die();
        }
    }

    public function zapiszDoBazy($imie, $email)
    {
        try {
            // Przygotuj zapytanie SQL
            $query = "INSERT INTO osoby (imie, email) VALUES (:imie, :email)";
            $stmt = $this->db->prepare($query);

            // Binduj parametry
            $stmt->bindParam(':imie', $imie, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);

            // Wykonaj zapytanie
            $stmt->execute();

            // Zamknij połączenie
            $stmt = null;

            return true; // Zwróć sukces
        } catch (PDOException $e) {
            echo "Błąd zapisu do bazy danych: " . $e->getMessage();
            return false; // Zwróć błąd
        }
    }

    public function walidujDane($imie, $email) {
        // Prosta walidacja danych
        $bledy = [];

        if (empty($imie)) {
            $bledy[] = 'Pole imię nie może być puste.';
        }

        if (strlen($imie)<4) {
            $bledy[] = 'Pole musi być dłuższe niż 4 znaki.';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $bledy[] = 'Nieprawidłowy format adresu email.';
        }

        return $bledy;
    }

    public function pobierzDane()
    {
        try {
            // Przygotuj zapytanie SQL
            $query = "SELECT * FROM osoby";
            $stmt = $this->db->query($query);

            // Pobierz dane
            $dane = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Zamknij połączenie
            $stmt = null;

            return $dane;
        } catch (PDOException $e) {
            echo "Błąd pobierania danych z bazy danych: " . $e->getMessage();
            return false;
        }
    }

    // Dodaj inne metody związane z operacjami na danych

}
