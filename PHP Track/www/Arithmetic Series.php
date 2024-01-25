<?php 
    $numbers = array(2, 5, 8, 11, 14); 
    $partial_sum = 0;
    echo "The arithmetic series is: <br>";
    for ($i = 0; $i < count($numbers); $i++) { 
    $partial_sum = $partial_sum + $numbers[$i]; 
    echo "$numbers[$i] = $partial_sum <br>";
    }
?>