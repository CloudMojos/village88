<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📄 The Blog Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css.php">
</head>
<body>
<div class="container d-flex flex-column">
        <h1 class="mt-3">Login</h1>
        <?php 
            // header('Location: register.php');
        ?> 
        <div class="content d-flex align-items-center flex-column align-self-center border p-3">
            <form action="process.php" method="POST" class="mt-3">
                <input type='hidden' name='action' value='login'>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <input type="submit" name="login" class="btn btn-primary" value="Login">
            </form>
            <?php if (!empty($_SESSION['error_messages'])): ?>
            <ul class="alert alert-danger mt-3">
                <?php foreach ($_SESSION['error_messages'] as $message): ?>
                    <li><?=$message?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <?php $_SESSION['error_messages'] = []; ?>
            <div class="border w-100 m-3"></div>
            <a class="dropdown-item" href="register.php">New around here? Sign up</a>
            <a class="dropdown-item" href="i-forgor.php">Forgot password?</a>
        </div>
    </div>  
</body>
</html>