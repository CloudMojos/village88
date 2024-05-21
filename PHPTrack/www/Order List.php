<?php 
    function print_orders($orders) {
        // Start the ordered list
        echo "<ol>";
        // Loop through the array
        foreach ($orders as $order) {
            // Print each value in a list item
            echo "<li>$order</li>";
        }
        // End the ordered list
        echo "</ol>";
    }
    $x = array('Spanish Latte', 'Vanilla Latte', 'French Vanilla');
    print_orders($x);
?>