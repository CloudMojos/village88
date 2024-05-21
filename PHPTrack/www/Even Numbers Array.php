<!-- Objectives:
To use looping statements with arrays
To apply var_dump() in logging array's value
Create an array that inclusively contains all even numbers between 0 to 10,000. Use the var_dump() function at the end to display the array values.

var_dump($even_array); -->

<?php 

    $even_array = array();

    for ($i = 0; $i <= 10000; $i+= 2) {
        array_push($even_array, $i);
    }

    var_dump($even_array);
?>