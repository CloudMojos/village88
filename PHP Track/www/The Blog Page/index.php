<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📄 The Blog Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css.php">
</head>
<body>
    <div class="content shadow-lg">
        <h1 class="title">The Blog Page</h1>
        <h3>Login</h3>
        <form action="process.php" method="POST" class="mt-3">
            <input type='hidden' name='action' value='login'>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <input type="submit" name="login" class="btn btn-primary mt-3" value="Login">
        </form>
        <?php if (!empty($_SESSION['error_messages'])): ?>
        <ul class="alert alert-danger mt-3">
            <?php foreach ($_SESSION['error_messages'] as $message): ?>
                <li><?=$message?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php $_SESSION['error_messages'] = []; ?>
        <a class="dropdown-item" href="register.php">New around here? Sign up</a>
        <a class="dropdown-item" href="i-forgor.php">Forgot password?</a>
    </div>
</body>
</html>