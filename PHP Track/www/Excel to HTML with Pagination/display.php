<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📄 Excel to HTML with Pagination</title>
    <style>
        h1 {
            text-align: center;
        }

        .pagination {
            margin: 0 auto;
            text-align: center;
            display: block;
        }

        .pagination a {
            color: black;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }

        .pagination a:hover:not(.active) {background-color: #ddd;}

        table {
            width: 69vw;
            margin: 0 auto;
            margin-top: 20px;
            border: 1px solid black;
        }
    </style>
</head>
<?php 
    $current_page = (int) $_GET["p"];
    $file = $_GET["file"];
?>
<body>
    <h1>
        EXCEL TO HTML WITH PAGINATION
    </h1>
    <div class="pagination">
        <a href=<?= "display.php?file={$file}&p=" . --$current_page ?>>&laquo;</a>
        <a href=<?= "display.php?file={$file}&p=0"?>>1</a>
        <a href=<?= "display.php?file={$file}&p=1"?>>2</a>
        <a href=<?= "display.php?file={$file}&p=2"?>>3</a>
        <a href=<?= "display.php?file={$file}&p=3"?>>4</a>
        <a href=<?= "display.php?file={$file}&p=4"?>>5</a>
        <a href=<?= "display.php?file={$file}&p=5"?>>6</a>
<?php 
    $current_page++;
?>
        <a href=<?= "display.php?file={$file}&p=" . ++$current_page ?>>&raquo;</a>
    </div>
<?php
    $target_dir = "uploads/";
    $file_name = $_GET["file"];
    $start = (int) $_GET["p"];

    $target_file = $target_dir . $file_name;
    $file = fopen($target_file, "r");

    ini_set('auto_detect_line_endings', true);
    
    $num_per_page = 50;
    // sa isang sitwasyong gawa-gawa.

    $start_row = $start * $num_per_page;

    $table_header = fgetcsv($file);
    // hanapin kung saan ba dapat magsisimula..
    $cursor = 0;
    while($cursor < $start_row) {
        $data = fgetcsv($file);
        $cursor++;
    }
    $cursor = ftell($file);
    fseek($file, $cursor);
?>
    <table>
        <tr>
<?php
    for ($i = 0; $i < count($table_header); $i++) {
?>
            <th>
                <?= $table_header[$i] ?>
            </th>
<?php
    }
?>
        </tr>
<?php
    // pagkatapos ay ipakita ang kanyang nakuha
    for ($i = 0; $i < $num_per_page; $i++) {
        if (($data = fgetcsv($file)) !== FALSE) {
            echo "<tr>";
            for ($k = 0, $len = count($data); $k < $len; $k++) {
                echo "<td>";
                echo $data[$k];
                echo "</td>";
            }
            echo "</tr>";
        }
    }
    fclose($file);
    echo "</table>";
?>
</body>
</html>