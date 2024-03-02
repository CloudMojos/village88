<?php require('new-connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    // I-fetch yung names ng files...
    $query = "SELECT name FROM files";
    $files = fetch_all($query);
    // $dir = "uploads/";
    // $files = scandir($dir);
?>
    <ul>  
<?php
    foreach ($files as $file) {
?>
    <li><a href=<?= "display.php?file={$file["name"]}&p=0"?>><?= "{$file["name"]}" ?></a></li>
<?php
    }
?>
    </ul>
</body>
</html>