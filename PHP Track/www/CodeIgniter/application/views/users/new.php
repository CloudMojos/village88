<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./create" method="POST">
        <input type="hidden" name="action" value="create_user">

        <label for="first-name">First Name</label>
        <input type="text" name="first-name">

        <label for="last-name">Last Name</label>
        <input type="text" name="last-name">

        <label for="email">Email</label>
        <input type="email" name="email">

        <input type="submit" value="Submit">
    </form>
</body>
</html>