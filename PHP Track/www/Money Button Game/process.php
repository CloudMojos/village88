<?php
session_start();
$money = $_SESSION['money'] ?? 500;
$buttonValue = $_POST['button'];

switch ($buttonValue) {
    case 'lowRisk':
        $earnings = rand(25, 100);
        break;
    case 'moderateRisk':
        $earnings = rand(-100, 100);
        break;
    case 'highRisk':
        $earnings = rand(-500, 2500);
        break;
    case 'severeRisk':
        $earnings = rand(-3000, 5000);
        break;
    default:
        header('Location: index.php');
        exit();
}

$_SESSION['money'] = $money + $earnings;

header('Location: index.php');
?>
