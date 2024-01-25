<!-- Part I -->

<?php 
    $digits = array(3, 12, 30);
    function exponential($arr, $k)
    {
        $result = array();
        foreach ($arr as $val) {
            $exp = pow($val, $k);
            array_push($result, $exp);
        }
        return $result;
    }
    $result = exponential($digits, 3);
    var_dump($result); 
    /* expected output:
            array (size=3)
            0 => int 27
            1 => int 1728
            2 => int 27000
    */
?>

<!-- Part II -->

<?php 
    $digits = array(8,11, 4);
    $result = exponential($digits, 4);  
    var_dump($result);
    /* This should dump which contains [4096, 14641,  256]. */
?>