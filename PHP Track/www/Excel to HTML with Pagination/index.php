<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin: 0 auto;
            width: 400px;
            padding: 1em;
            border: 1px solid #ccc;
            border-radius: 1em;
        }
        label {
            display: block;
            margin-bottom: 0.5em;
        }
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 0.5em;
            margin-bottom: 1em;
            border-radius: 0.25em;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 0.5em;
            border-radius: 0.25em;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
    <title>📄 Excel to HTML with Pagination</title>
</head>
<body>
    <form action="process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="upload">

        <label for="file-name">File name (optional): </label>
        <input type="text" name="file-name">
        <label for="csv">Select csv to upload:</label>
        <input type="file" name="csv" id="csv">
        <input type="submit" value="Upload File" name="submit">
    </form>
<?php
    $dir = "uploads/";
    $files = scandir($dir);
?>
    <ul>
<?php
    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
?>
        <li><a href=<?= "display.php?open=$file" ?>><?= $file ?></a></li>
<?php
        }
    }
?>
    </ul>
</body>
</html>