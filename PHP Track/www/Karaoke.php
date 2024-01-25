<!-- Use a rand() function to generate a random number between 1-100.
Store the value returned from the above random function to a variable called $score
Display the following message depending on the karaoke score:
Score below 50: Never sing again, ever!
Score between 50-79: Practice more!
Score between 80-94: You're getting better!
Score between 95-100: What an excellent singer!
Display the score in h1 tag and display in h2 tag the message
After you make the above work, use a for loop to generate your score/message 50 times once you run your PHP script. Make sure to have an appropriate break for each set for readability purposes. Good luck! -->
<?php 
    $score = rand(1,100);
    echo "<h1>$score</h1>";
    if ($score < 50) {
        echo "<h2>Never sing again, ever!</h2>";
    } else if ($score > 50 && $score < 79) {
        echo "<h2>Practive more!</h2>";
    } else if ($score > 80 && $score < 94) {
        echo "<h2>You're getting better!</h2>";
    } else {
        echo "<h2>What an excellent singer!</h2>";
    }
?>