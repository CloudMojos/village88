<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📌 Bulletin Board </title>
    <style>
        * {
            margin: 20px;
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
    <h3>Bulletin Board Entry</h3>
    <form action="process.php">
        <label for="subject">Subject</label>
        <textarea name="subject" id="subject" cols="30" rows="1"></textarea>
        <label for="details">Details</label>
        <textarea name="details" id="details" cols="30" rows="5"></textarea>
        <input type="submit" value="Submit">
    </form>
</body>
</html>