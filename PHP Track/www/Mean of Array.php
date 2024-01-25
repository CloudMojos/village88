<?php 
    $numbers = [13, 143, 88, 65, 120];
    $sum = 0;
    foreach ($numbers as $key => $number) {
        $sum = $sum + $number;
    }
    echo $sum / count($numbers);
?>