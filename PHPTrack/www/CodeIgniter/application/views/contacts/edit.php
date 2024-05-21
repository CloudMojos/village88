<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../../">Go back</a>
    <h1>Edit Contact</h1>
    <form action="../update/<?= $contact_id ?>" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name">

        <label for="contact-number">Contact Number</label>
        <input type="text" name="contact-number">

        <input type="submit" value="Update">
    </form>
</body>
</html>