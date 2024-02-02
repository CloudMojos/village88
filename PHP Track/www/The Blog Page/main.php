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
        }
        h1, h3 {
            text-align: center;
        }
        div {
            width: 20vw;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1>🌞</h1>
    <h1>Morning, sunshine!</h1>
    <h3>Morning, <?= $_SESSION['user']['first_name'] ?></h3>

</body>
</html>