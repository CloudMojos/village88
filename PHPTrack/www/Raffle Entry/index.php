<?php 
    require('new-connection.php');
    var_dump($connection);    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        body {
            width: 80vw;
            margin: 0px auto;
        } 
        form {
            text-align: center;
        }

    </style>
</head>
<body>

<form action="result.php" method="post">
    <label for="name">Your Name (optional):</label><br>
    <input type="text" id="name" name="name"><br><br>

    <label for="phone">Contact number:</label><br>
    <input type="tel" id="phone" name="phone" pattern="(\+63|0)9\d{9}" placeholder="+639 or 09" required>

    <input type="submit" value="Submit">
</form>

</body>
</html>