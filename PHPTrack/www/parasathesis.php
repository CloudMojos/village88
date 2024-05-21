<?php
    $url = 'https://traffic-data.onrender.com/find?class=car'; 
    $jsonString = file_get_contents($url);
    $jsonObject = json_decode($jsonString);
    var_dump($jsonObject)
?>

