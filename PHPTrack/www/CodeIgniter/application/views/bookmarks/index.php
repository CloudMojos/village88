<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <form action="bookmarks/process" method="POST">
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

    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>URL</th>
            <th>Folder</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php foreach ($all_bookmarks as $bookmark): ?>
            <tr>
                <td><?= $bookmark['bookmark_id'] ?></td>
                <td><?= $bookmark['name'] ?></td>
                <td><a href="<?= $bookmark['url'] ?>"><?= $bookmark['url'] ?></a></td>
                <td><?= $bookmark['folder'] ?></td>
                <td><a href="bookmarks/delete/<?= $bookmark['bookmark_id'] ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>