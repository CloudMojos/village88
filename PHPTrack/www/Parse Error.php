<!-- 
Objectives:
To fix different parse errors
To apply printing functions in debugging
To learn new built-in function
The most common error that you will encounter is the Parse Error. Even before executing your code, the PHP interpreter will parse through every line and look for anything that might cause problems. Basically, it checks to see if your code even looks like PHP! If it is able to find any problems, it will give you a Parse Error. Some of the most common parsing errors are:

Missing single and double quotes.
Missing semicolon
Not closing parentheses in control structures (if, else if, for, foreach, etc.), functions, and arrays
No paired curly brace that results in an error saying "error occurred on the last line of the program"
Your task is to debug an existing code. See below reference:

 -->

<?php
    $array = array("echo", "var_dump");
    echo "<h3>Different ways of debugging:</h3>";
    
    echo "<ul>";
    for($i = 0; $i < sizeof($array); $i++)
    {
      echo '<li>array</li>';
    }
    echo "</ul>";
    var_dump($array);
    
    echo "<h3>Checking if variable is set:</h3>";
    $var1 = "var";
    $var2 = "";
    $var3 = '';
    $var4 = null;
    
    if (isset($var1, $var2, $var3)) {
        echo "The value of var1, var2, var3 are set.";
    }
    if (isset($var4)) {
        echo "The value of var4 is null, therefore, not set.";
    }
    if (isset($var5)) {
        echo "Non-declared var5 is not set.";
    }
?>