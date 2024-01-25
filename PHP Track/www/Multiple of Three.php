<?php
    for ($x = 1; $x <= 1000; $x++) {
        echo "$x => ";
        if ($x % 3 == 0) { // check if $x is divisible by 3
            echo "Multiple";
        } else {
            echo "Not multiple";
        }
        echo "<br>";
    }
?> 
