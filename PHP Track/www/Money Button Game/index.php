<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Button Game</title>
</head>
<body>

<h2>Your money: $<?php session_start(); echo $_SESSION['money'] ?? 500; ?></h2>

<form action="process.php" method="post">
    <input type="hidden" name="button" value="lowRisk" />
    <input type="submit" value="Bet Low Risk"/>
</form>

<form action="process.php" method="post">
    <input type="hidden" name="button" value="moderateRisk" />
    <input type="submit" value="Bet Moderate Risk"/>
</form>

<form action="process.php" method="post">
    <input type="hidden" name="button" value="highRisk" />
    <input type="submit" value="Bet High Risk"/>
</form>

<form action="process.php" method="post">
    <input type="hidden" name="button" value="severeRisk" />
    <input type="submit" value="Bet Severe Risk"/>
</form>

</body>
</html>