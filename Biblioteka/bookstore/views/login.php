<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore - Login</title>
</head>
<body>
    <h1>Login</h1>

    <!-- Formularz logowania -->
    <form action="index.php?action=login" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <!-- Dodaj link powrotu do strony głównej -->
    <a href="index.php">Back to List</a>
</body>
</html>
