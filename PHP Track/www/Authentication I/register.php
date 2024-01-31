<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔐 Authentication I</title>
    <style>
        * {
            padding: 0px;
            /* border: 0px; */
            box-sizing: border-box;
            margin: 5px;
        }
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        form {
            padding: 10px;
            border: 1px dashed black;
            display: flex;
            flex-direction: column;
            input[type=submit] {
                align-self: flex-end;
            }
        }
    </style>
</head>
<body>
<?php 
    var_dump($_SESSION['error_messages']);
    if (count($_SESSION['error_messages']) > 0) {
        echo "<ul>";
        foreach ($_SESSION['error_messages'] as $message) {
            echo "<li>$message</li>";
        }
        echo "</ul>";
    } else if (isset($_SESSION['form_submitted'])) {
        echo "<h3>Thank you for your patience! Please wait for a response from our IT team.</h3>";
    }

    $_SESSION['error_messages'] = [];
?>
    <h1>Register</h1>
    <form action="process.php" method="POST">
        <input type='hidden' name='action' value='register'>

        <label for="first-name">Enter first name:</label>
        <input type="text" name="first-name" id="first-name">

        <label for="last-name">Enter last name:</label>
        <input type="text" name="last-name" id="last-name">

        <label for="email">Enter email:</label>
        <input type="email" name="email" id="email">

        <label for="password">Enter password:</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Register">
    </form>
</body>
</html>