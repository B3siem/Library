<?php
// Konfiguracja bazy danych
$servername = "localhost:5000";
$username = "admin";
$password = "admin";
$dbname = "Library";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
