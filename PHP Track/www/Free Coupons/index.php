<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
</head>
<body>

<form action="result.php" method="post">
    <label for="name">Your Name (optional):</label><br>
    <input type="text" id="name" name="name"><br><br>

    <label for="phone">Contact number:</label><br>
    <input type="tel" id="phone" name="phone" pattern="(\+63|0)9\d{9}" placeholder="+639 or 09" required>

    <input type="submit" value="Submit">
</form>

</body>
</html>