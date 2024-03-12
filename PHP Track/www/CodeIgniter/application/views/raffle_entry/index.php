<!DOCTYPE html>
<html>
<head>
    <title>Raffle Entry</title>
</head>
<body>
    <h1>Raffle Entry</h1>
    <p>Random Number: <strong><?= $random_number ?></strong></p>
    <p>Winner Count: <strong><?= $winner_count ?></strong></p>

    <form action="raffleentry/update_winner_count" method="POST">
        <input type="submit" value="Pick Another">
    </form>
</body>
</html>
