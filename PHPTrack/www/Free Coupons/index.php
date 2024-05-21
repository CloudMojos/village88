<?php 
    session_start();

    
    $customer_left = 10;

    if(!isset($_SESSION['counter'])) {
        $_SESSION['counter'] = 1;
    } 

    if(!isset($_SESSION['customer_left'])) {
        $_SESSION['customer_left'] = 10;
    }

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

        input {
            margin: 0px auto;
            display: block;
        }
    </style>
</head>
<body>
    <h1>Welcome Customer!</h1>
    <h3>We're giving away free coupons as token of appreciation.</h3>
<?php 
    $nth_customer = $_SESSION['customer_left'] - $_SESSION['counter'];
    if ($nth_customer > 0) {
        echo "<p>$nth_customer remaining! </p>";
    } 
?>

    <form action="result.php" method="POST">
        <label for="name">Kindly type your name:</label>
        <input type="text" name="name" id="name">
        <input type="submit" value="submit">
    </form>
</body>
</html>