<!-- Objectives:
To key value paired (associative) arrays
To use looping statements and print keys and values
Let's create an array of cards that have the following key-value pairs:

$cards['King'] = 13;
$cards['Queen'] = 12;
$cards['Jack'] = 11;
$cards['Ace'] = 1;
Create a function where you can pass in $cards and print an output that looks like below:

List of keys in the array:
• King
• Queen
• Jack
• Ace

The value of King in Pyramid Solitaire is 13.
The value of Queen in Pyramid Solitaire is 12.
The value of Jack in Pyramid Solitaire is 11.
The value of Ace in Pyramid Solitaire is 1. -->

<?php 
    $cards = array();
    $cards['King'] = 13;
    $cards['Queen'] = 12;
    $cards['Jack'] = 11;
    $cards['Ace'] = 1;

    function print_cards($cards) {
        foreach ($cards as $key => $value) {
            echo "The value of $key in Pyramid Solitaire is $value. <br>";
        }
    }
    print_cards($cards);
?>