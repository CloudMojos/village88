<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📄 Excel to HTML with Pagination</title>
</head>
<body>
<?php
    var_dump($_GET);
    $target_dir = "uploads/";
    $file_name = $_GET["file"];
    
    $target_file = $target_dir . $file_name;
    $file = fopen($target_file, "r");

    ini_set('auto_detect_line_endings', true);
    echo "<table>";
    while (($data = fgetcsv($file)) !== FALSE) {
        echo "<tr>";
            for ($i = 0; $i < count($data); $i++) {
                echo "<td>";
                echo $data[$i];
                echo "</td>";
            }
        echo "</tr>";
    }
    fclose($file);
    echo "</table>";
?>
</body>
</html>