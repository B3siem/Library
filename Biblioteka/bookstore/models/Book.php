<?php

class Book {
    private $conn;

    public function __construct() {
        // Tutaj dodaj połączenie do bazy danych zgodne z twoją konfiguracją
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "your_database_name";

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getAllBooks() {
        $stmt = $this->conn->prepare("SELECT * FROM books");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBookById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM books WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addBook($title, $author, $price) {
        $stmt = $this->conn->prepare("INSERT INTO books (title, author, price) VALUES (:title, :author, :price)");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':author', $author, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function updateBook($id, $title, $author, $price) {
        $stmt = $this->conn->prepare("UPDATE books SET title = :title, author = :author, price = :price WHERE id = :id");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':author', $author, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteBook($id) {
        $stmt = $this->conn->prepare("DELETE FROM books WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

?>
