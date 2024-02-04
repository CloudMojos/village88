<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📄 Excel to HTML with Pagination</title>
</head>
<body>
    <?php 
        // Create a form that accepts only csv
        // Two tables. 1 for the table reference and the other is the table data
        // 
    
    ?>
    <form action="process.php" method="post" enctype="multipart/form-data">
    Select csv to upload:
    <input type="file" name="csv" id="csv">
    <input type="submit" value="Upload File" name="submit">
</form>
</body>
</html>