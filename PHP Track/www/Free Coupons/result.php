<?php
// $name = $_POST['name'];
// $course = $_POST['phone'];

require('new-connection.php');

$table = "entries";
$query = "SELECT * FROM $table";
$result = fetch_all($query);
var_dump($result);
?>

<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<title>Submitted Entry</title>
</head>

<body>

</body>
</html>
