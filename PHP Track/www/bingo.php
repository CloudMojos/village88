<!-- 
Objectives:
To do basic styling using classes
To apply loop and conditional statements
Create a program that displays a BINGO card that looks like the table below. You can use <table> tag for this.

Note: Do not put number values into arrays.

At first, use pure HTML only. You don't have to worry in styling first! Then once you’re done, style it so that every row has alternate font color, with one row in blue color, and the other row in red color. Make the font size of the first row bolder.

Please attach your solution and indicate the estimated completion time. If you have multiple files, compress them into a zip file. Good luck!
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bingo Revisited</title>
    <style>
        * {
            font-family: sans-serif;
        }
        h1 {
            text-align: center;
        }

        .bingo-table {
            border-collapse: collapse;
            width: 40vw;
            height: 40vw;
            margin: 0 auto;
        }

        .bingo-table td {
            width: 20%;
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
        }

        .color1 {
            color: #336699; 
            background-color: #f2f2f2; 
        }

        .color2 {
            color: #cc6633;
            background-color: #ffffff;
        }
    </style>
</head>
<body>
<?php 
    echo "<h1>Bingo REVISTED</h1>";
    echo "<table class=\"bingo-table\">";
    echo "<tbody>";

    for ($i = 2; $i < 7; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= 5; $j++) {
            $num = $i * $j;
            $color = (($i + $j) % 2 === 0) ? "color1" : "color2";
            echo "<td class=\"$color\">$num</td>";
        }
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
?>
</body>
</html>
