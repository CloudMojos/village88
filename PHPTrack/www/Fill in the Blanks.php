<!-- Fill in the blanks
Objectives:
To explore other built-in functions in PHP
To apply loop and conditional statements
Part 1: Create a function called convert_to_blanks() that takes an array of numbers and echo out an underscore, separated by a space.

For example, $list = array(6, 1, 3, 5, 7);

_ _ _ _ _ _
_
_ _ _
_ _ _ _ _
_ _ _ _ _ _ _
Part 2: Modify the function above by allowing the array to contain integers and strings and be passed to the convert_to_blanks() function. 
When a string is passed, display an underscore per character except for the first letter of the string.

For example: $list = array(4, "Michael", 3, "Karen", 2, "Rogie");

_ _ _ _ 
M _ _ _ _ _ _
_ _ _
K _ _ _ _
_ _ 
R _ _ _ _ -->

<?php 
    // This one doesn't return anything.
    function convert_to_blanks($arr) {
        // foreach ($arr as $value) {
        //     echo "$count($value)";
        // }

        foreach ($arr as $value) {
            // $length = strlen($value);
            gettype($value) == "integer" ? $length = $value : $length = strlen($value);
            for ($i = 0; $i < $length; $i++) {
                if ($i == 0 && gettype($value) == "string") {
                    echo $value[0];
                } else {
                    echo "_ ";
                }
            }
            echo "<br>";
        }
    }
    convert_to_blanks([4, "Michael", 3, "Karen", 2, "Rogie"]);
?>