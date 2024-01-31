<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔐 Authentication I</title>
    <style>
        * {
            margin: 10px;
        }
        body {
            width: 80vw;
            margin: 0 auto;
            text-align: center;
        }
        textarea {
            width: max-content;
            margin: 0 auto;
            display: block;
            resize: none;
        }
    </style>
</head>
<body>
<?php 
    header('Location: register.php');
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
    <h1>Bulletin Board Entry</h1>
    <form action="process.php" method="POST">
        <input type='hidden' name='action' value='entry'>

        <label for="subject">Subject</label>
        <textarea name="subject" id="subject" cols="30" rows="1"></textarea>
        <label for="details">Details</label>
        <textarea name="details" id="details" cols="30" rows="5"></textarea>
        <input type="submit" name="skip" value="Skip">
        <input type="submit" name="add" value="Add">
    </form>
</body>
</html>