<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
</head>
<body>

<h1>Hello world!</h1>

<form action="result" method="post">
    <label for="name">Your Name (optional):</label><br>
    <input type="text" id="name" name="name"><br><br>

    <label for="course">Course Title:</label><br>
    <input type="text" id="course" name="course"><br><br>

    <label for="score">Given Score (1-10):</label><br>
    <input type="number" id ="score" name ="score"><br><br>

    <label for ="reason">Reason:</label><br>
    <textarea id ="reason"name ="reason"></textarea><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>