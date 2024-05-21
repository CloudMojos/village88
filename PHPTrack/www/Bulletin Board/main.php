<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📌 Bulletin Board</title>
    <style>
        * {
            margin: 10px;
        }
        body {
            width: 80vw;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
        }
        div {
            width: 20vw;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1>Bulletin Board View</h1>

<?php 
    require_once('new-connection.php');
    // query fetch
    $query = "SELECT * FROM $table";
    $result = fetch_all($query);
    foreach ($result as $key => $value) {
?>
         <div>
         <p style="display: inline-block;"><?= $value['date_created'] ?></p> 
         <h3 style="display: inline-block;"><?= $value['subject'] ?></h3>
         <p><?= $value['details'] ?></p>
        </div>
<?php
    }
?>

</body>
</html>