<!-- 
Objectives:
To do basic styling using classes
To apply loop and conditional statements
Create a program that displays a BINGO card that looks like the table below. You can use <table> tag for this.

Note: Do not put number values into arrays.

At first, use pure HTML only. You don't have to worry in styling first! Then once you’re done, style it so that every row has alternate font color, with one row in blue color, and the other row in red color. Make the font size of the first row bolder.

Please attach your solution and indicate the estimated completion time. If you have multiple files, compress them into a zip file. Good luck!
 -->

<?php 
    echo "<table>";
    echo "<thead>";
    echo "<tr>
        <th>B</th>
        <th>I</th>
        <th>N</th>
        <th>G</th>
        <th>O</th>
        </tr>";
    echo "</thead>";
    echo "<tbody>";
    for ($i = 2; $i < 7; $i++) {
        echo "<tr>";
        for ($j = $i; $j <= $i * 5; $j+= $i) {
            echo "<td>$j</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
?>