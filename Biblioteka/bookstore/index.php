<?php
// Włącz raportowanie błędów na czas developmentu
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Rozpocznij sesję
session_start();

// Wczytaj kontroler
include_once 'controllers/BookController.php';

// Utwórz instancję kontrolera
$bookController = new BookController();

// Ustaw domyślną akcję (jeśli nie przekazano żadnej)
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Obsługa różnych akcji
switch ($action) {
    case 'index':
        $bookController->index();
        break;
    case 'add':
        $bookController->add();
        break;
    case 'edit':
        // Przyjmuję, że id jest przekazywane jako parametr w adresie (np. ?action=edit&id=1)
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $bookController->edit($id);
        break;
    case 'update':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $bookController->update($id);
        break;
    case 'delete':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $bookController->delete($id);
        break;
    case 'login':
        $bookController->login();
        break;
    case 'logout':
        $bookController->logout();
        break;
    default:
        // Jeśli żadna akcja nie pasuje, przejdź do strony głównej
        $bookController->index();
        break;
}
?>
