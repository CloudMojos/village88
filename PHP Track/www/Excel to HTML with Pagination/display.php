<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📄 Excel to HTML with Pagination</title>
</head>
<body>
<?php
    ini_set('auto_detect_line_endings', true);
    $file = fopen("us-500.csv", "r");
    echo "<table>";
    echo "<tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company Name</th>
            <th>Full Address</th>
            <th>Phone 1</th>
            <th>Phone 2</th>
            <th>Email Address</th>
            <th>Website</th>
        </tr>";
    $i = -1;
    while (($data = fgetcsv($file)) !== FALSE) {
        if ($i == -1) {  $i++; continue; }
        $i++;
        if ($i % 10 == 0) {
            echo "<tr style='background-color: lightgray;'>";
        } else {
            echo "<tr>";
        }
        echo "<td>" . $data[0] . "</td>";
        echo "<td>" . $data[1] . "</td>";
        echo "<td>" . $data[2] . "</td>";
        echo "<td>" . $data[3] . ", " . $data[4] . ", " . $data[5] . ", " . $data[6] . " " . $data[7] . "</td>";
        echo "<td>" . $data[8] . "</td>";
        echo "<td>" . $data[9] . "</td>";
        echo "<td>" . $data[10] . "</td>";
        echo "<td>" . $data[11] . "</td>";
        echo "</tr>";
    }
    fclose($file);
    echo "</table>";
?>
</body>
</html>