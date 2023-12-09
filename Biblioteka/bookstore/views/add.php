<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore - Add a Book</title>
</head>
<body>
    <h1>Add a New Book</h1>

    <!-- Formularz do dodawania nowej książki -->
    <form action="index.php?action=add" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" required>

        <label for="author">Author:</label>
        <input type="text" name="author" required>

        <label for="price">Price:</label>
        <input type="text" name="price" required>

        <button type="submit">Add Book</button>
    </form>

    <!-- Dodaj link powrotu do strony głównej -->
    <a href="index.php">Back to List</a>
</body>
</html>
