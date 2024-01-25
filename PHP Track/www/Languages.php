<!-- Objectives:
To generate HTML based on parameters
To explore other built-in functions in PHP
You have an array, called $languages, which has the following information: $languages = array('PHP', 'JS', 'Ruby');

To-do list:

Show a drop-down menu in HTML (using select and option tags) that displays the different languages using for loop.
Create another identical drop-down menu but, this time, use foreach statement.
Insert 2 new states in the array $languages : 'HTML', 'CSS'. (hint: use a php function)
Display a new drop-down menu with the 5 unique states.
Your output should have three drop-down menus. Good luck!

Please attach your solution and indicate the estimated completion time. If you have multiple files, compress them into a zip file. Good luck! -->

<?php 
    $languages = array('PHP', 'JS', 'Ruby');

    function create_select($array) {
        echo "<select>";
        foreach ($array as $value) {
            echo "<option>$value</option>";
        }
        echo "</select>";
    }

    array_push($languages, "HTML");
    array_push($languages, "CSS");
    create_select($languages)
?>