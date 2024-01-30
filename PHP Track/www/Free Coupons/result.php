<?php 
    session_start();

    $coupon = [];
    for ($i = 0; $i < 7; $i++) {
        $coupon[$i] = rand(0, 9);
    }
    $coupon = implode('', $coupon);

    $_SESSION['counter'] += 1;

    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Coupons</title>
    <style>
        * {
            text-align: center;
        }

        div {
            margin: 0px auto;
            width: 30vw;
            border-radius: 15px;
            border: 1px dashed black;
        }
    </style>
</head>
<body>
    <h1>Welcome Customer!</h1>
    <h3>We're giving away free coupons as token of appreciation.</h3>

    <div>
        <h6>50% Discount</h6>
        <h1><?= $coupon ?></h1>
    </div>
</body>
</html>