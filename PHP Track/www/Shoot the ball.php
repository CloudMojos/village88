<!-- Objectives:
To generate random values
To use looping and printing statements
For this exercise, you will create a program that simulates practice of throwing a ball 1,000 times. Your program should display how many times the ball shoots to the basket ring. Below is an example result (note that the attempt if shoot or miss still depends on your generated random value):

Practice starts...
Attempt #1: Shooting the ball... Success! ... Got 1x success and 0x epic fail(s) so far
Attempt #2: Shooting the ball... Epic Fail! ... Got 1x success and 1x epic fail(s) so far
Attempt #3: Shooting the ball... Epic Fail! ... Got 1x success and 2x epic fail(s) so far
Attempt #4: Shooting the ball... Success! ... Got 2x success and 2x epic fail(s) so far
........
Attempt #1000: Shooting the ball... Success! ... Got 550x success and 450x epic fail(s) so far
Practice ended.
Please attach your solution and indicate the estimated completion time. If you have multiple files, compress them into a zip file. Good luck! -->

<?php 
    $success = 0;
    $fail = 0;
    for ($i = 0; $i < 1000; $i++) {
        echo "Shooting the ball... ";
        $shoot = rand(0, 1);
        if ($shoot == 0) {
            echo "Success!";
            $success++;
        } else {
            echo "Epic fail!";
            $fail++;
        } 
        echo " ... ";
        echo "Got $success x success(es) and $fail x epic fail(s) so far";
        echo "<br>";
    }
?>