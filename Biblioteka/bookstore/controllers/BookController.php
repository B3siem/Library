<?php

session_start();

include_once 'models/Book.php';

class BookController {
    private $bookModel;

    public function __construct() {
        $this->bookModel = new Book();
    }

    public function index() {
        // Sprawdź, czy użytkownik jest zalogowany
        if (!isset($_SESSION['user'])) {
            // Jeśli nie, pokaż formularz logowania
            include 'views/login.php';
            return;
        }

        $books = $this->bookModel->getAllBooks();
        include 'views/index.php';
    }

    public function add() {
        // Sprawdź, czy użytkownik jest zalogowany
        if (!isset($_SESSION['user'])) {
            // Jeśli nie, przekieruj do strony logowania
            header("Location: index.php?action=login");
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $price = $_POST['price'];

            $result = $this->bookModel->addBook($title, $author, $price);

            if ($result) {
                header("Location: index.php");
            } else {
                echo "Failed to add book.";
            }
        } else {
            // Jeśli nie było żądania POST, pokaż formularz dodawania
            include 'views/add.php';
        }
    }

    public function edit($id) {
        // Sprawdź, czy użytkownik jest zalogowany
        if (!isset($_SESSION['user'])) {
            // Jeśli nie, przekieruj do strony logowania
            header("Location: index.php?action=login");
            return;
        }

        $book = $this->bookModel->getBookById($id);
        include 'views/edit.php';
    }

    public function update($id) {
        // Sprawdź, czy użytkownik jest zalogowany
        if (!isset($_SESSION['user'])) {
            // Jeśli nie, przekieruj do strony logowania
            header("Location: index.php?action=login");
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $price = $_POST['price'];

            $result = $this->bookModel->updateBook($id, $title, $author, $price);

            if ($result) {
                header("Location: index.php");
            } else {
                echo "Failed to update book.";
            }
        }
    }

    public function delete($id) {
        // Sprawdź, czy użytkownik jest zalogowany
        if (!isset($_SESSION['user'])) {
            // Jeśli nie, przekieruj do strony logowania
            header("Location: index.php?action=login");
            return;
        }

        $result = $this->bookModel->deleteBook($id);

        if ($result) {
            header("Location: index.php");
        } else {
            echo "Failed to delete book.";
        }
    }

    public function login() {
        // Sprawdź, czy użytkownik jest już zalogowany
        if (isset($_SESSION['user'])) {
            header("Location: index.php");
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Tutaj dodaj logikę sprawdzającą, czy użytkownik o podanych danych istnieje
            // Możesz użyć np. funkcji z modelu do weryfikacji danych

            // Przykładowa weryfikacja (tylko dla celów demonstracyjnych, NIE używaj takiej w rzeczywistych projektach)
            if ($this->verifyLogin($username, $password)) {
                // Zalogowano pomyślnie
                $_SESSION['user'] = $username;
                header("Location: index.php");
            } else {
                // Błąd logowania
                echo "Invalid username or password.";
            }
        } else {
            // Jeśli nie było żądania POST, pokaż formularz logowania
            include 'views/login.php';
        }
    }

    public function logout() {
        // Wylogowanie użytkownika
        unset($_SESSION['user']);
        header("Location: index.php");
    }

    private function verifyLogin($username, $password) {
        // Tutaj dodaj bezpieczny kod weryfikacji loginu
        // Pamiętaj, aby unikać używania hardcoded danych w kodzie
        // Użyj bezpiecznych metod, takich jak hashowanie haseł
        // W tym przykładzie założono, że prawidłowy login to 'admin' i hasło to 'password'
        return ($username === 'admin' && $password === 'password');
    }
}
?>
