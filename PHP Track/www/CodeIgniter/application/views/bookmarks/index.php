<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="process" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>

        <label for="course">URL:</label><br>
        <input type="url" id="url" name="url"><br><br>

        <label for="folder">Folder:</label><br>
        <select name="folder" id="folder">
            <option value="favorites">Favorites</option>
            <option value="programming">Programming</option>
            <option value="school">School</option>
            <option value="others">Others</option>
        </select>

        <input type="submit" value="Submit">
    </form>
</body>
</html>