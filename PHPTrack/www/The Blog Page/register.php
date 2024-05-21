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
        <h3>Register an account</h3>
        <form action="process.php" method="POST" class="mt-3">
            <input type='hidden' name='action' value='register'>

            <div class="row">
                <div class="form-group col">
                    <label for="first-name">Enter first name:</label>
                    <input type="text" name="first-name" id="first-name" class="form-control">
                </div>
                <div class="form-group col">
                    <label for="last-name">Enter last name:</label>
                    <input type="text" name="last-name" id="last-name" class="form-control">
                </div>
            </div>

            <label for="email">Enter email:</label>
            <input type="text" name="email" id="email" class="form-control">

            <label for="phone">Contact number:</label>
            <input type="tel" id="phone" name="phone" class="form-control">

            <div class="row">
                <div class="form-group col">
                    <label for="password">Enter password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group col">
                    <label for="repeat-password">Repeat Password: </label>
                    <input type="password" name="repeat-password" id="repeat-password" class="form-control">
                </div>
            </div>

            <input type="submit" value="Register" class="mt-3">
        </form>
        <?php if (!empty($_SESSION['error_messages'])): ?>
        <ul class="alert alert-danger mt-3">
            <?php foreach ($_SESSION['error_messages'] as $message): ?>
                <li><?=$message?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php $_SESSION['error_messages'] = []; ?>
        <p>Already have an account? <a href="index.php">Login instead.</a></p>
    </div>  
</body>
</html>