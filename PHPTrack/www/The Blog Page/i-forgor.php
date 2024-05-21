<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📄 The Blog Page</title>
</head>
<body>
<?php 
    // header('Location: register.php');

    if (count($_SESSION['error_messages']) > 0) {
        echo "<ul>";
        foreach ($_SESSION['error_messages'] as $message) {
            echo "<li>$message</li>";
        }
        echo "</ul>";
    } 
    $_SESSION['error_messages'] = [];
?>
    <h1>Forgot Password</h1>
    <form action="process.php" method="POST">
        <input type='hidden' name='action' value='forgot-password'>

        <label for="email">Email: </label>
        <input type="text" name="email" id="email">

        <label for="phone">Contact number:</label>
        <input type="tel" id="phone" name="phone">

        <input type="submit" name="reset" value="Reset">
    </form>
    <p>Don't have an account? <a href="register.php">Register instead.</a></p>
    
</body>
</html>