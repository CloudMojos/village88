<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Contacts</h1>
    <table>
        <thead>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php foreach ($all_contacts as $contact): ?>
            <tr>
                <td><?= $contact["name"] ?></td>
                <td><?= $contact["contact_number"] ?></td>
                <td>
                    <a href="contacts/show/<?= $contact["contact_id"] ?>">Show</a>
                    <a href="contacts/edit/<?= $contact["contact_id"] ?>">Edit</a>
                    <form action="contacts/destroy/<?= $contact["contact_id"]?>" method="POST">
                        <input type="submit" value="Remove">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="contacts/new">Add new contact</a>
</body>
</html>