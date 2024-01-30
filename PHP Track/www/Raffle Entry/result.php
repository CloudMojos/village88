<?php
$name = $_POST['name'];
$phone = $_POST['phone'];

require('new-connection.php');
$table = "entries";
?>

<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<title>Submitted Entry</title>
    <style>
        body {
            width: 80vw;
            margin: 0px auto;
            text-align: center;
        }
        table {
            width: max-content;
            margin: 0px auto;
        }
    </style>
</head>
<body>
<?php 
    // $query = "INSERT INTO '{$table}'(name, phone_number, date_created) VALUES('{$name}', '{$phone}', NOW())";
    $query = "INSERT INTO {$table}(name, phone_number, date_created) VALUES('{$name}', '{$phone}', NOW())";
    $id = run_mysql_query($query);
    if(run_mysql_query($query))
    {
        echo "New lesson has been added!";
    }
    else
    {
        echo "Failed to add new lesson "; 
    }
    $query = "SELECT * FROM $table";
    $result = fetch_all($query);
?>
    <h3>Success! <?= $phone ?> now added!</h3>
    <table>
        <thead>
            <th>No.</th>
            <th>Contact number</th>
            <th>Date inserted</th>
        </thead>
        <tbody>
<?php 
        foreach ($result as $index => $item) {
            $name = $item['name'];
            $number = $item['phone_number'];
            $date = date_create($item['date_created']);
            $date = date_format($date, 'F j, Y, h:i A');
?>
            <tr>
                <td><?= $index ?></td>
                <td><?= $number ?></td>
                <td><?= $date ?></td>
            </tr>
<?php
        }
?>
        </tbody>
    </table>
</body>
</html>
