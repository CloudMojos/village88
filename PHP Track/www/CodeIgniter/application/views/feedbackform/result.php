<?php
    // $name = $_POST['name'];
    // $name = " ";
    // // $course = $_POST['course'];
    // $course = " "; 
    // // $score = $_POST['score'];
    // $score = " "; 
    // // $reason = $_POST['reason'];
    // $reason = " ";
?>

<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<title>Submitted Entry</title>
</head>

<body>

<h2>Your Submitted Entry:</h2>

<p>Your Name (optional): <?php echo $name; ?></p>
<p>Course Title: <?php echo $course; ?></p>
<p>Given Score (1-10): <?php echo $score; ?>pts</p>
<p>Reason: <?php echo $reason; ?></p>

</body>
</html>
