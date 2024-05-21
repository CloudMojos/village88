<!-- Objectives:
To generate output as an associative array
To use looping and printing statements
Create a function get_count() that takes an array of numbers and then returns how many 1’s and 0’s from the given array as an associative array. Do not use any built-in PHP function to get this work. See if you can do this using arrays and for loops!

For example:

$binary = array( 1, 1, 0, 1, 1, 0, 1); 
$output = get_count($binary); 
var_dump($output); 
//$output should be equal to array("zeroes" => 2,  "ones" => 5); -->

<?php 
    function get_count($array) {
        $output = array();
        $output["zeroes"] = 0;
        $output["ones"] = 0 ;
        foreach ($array as $value) {
            if ($value == 0) {
                $output["zeroes"]++;
            } else {
                $output["ones"]++;
            }
        }
        return $output;
    }
    $binary = array(1, 1, 0, 1, 1, 0, 1);
    $output = get_count($binary);
    var_dump($output)
?>