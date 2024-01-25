<?php
// What do you think will be the output of the code below? Try to guess before running it!

$list = array(2,4,6,8);
foreach($list as $key => $value)
{
 echo $key . " - " . $value ."<br />";
}
// What would be the output of the following code? Try to guess before running it!

$list = array(2,4,6,8);
foreach($list as $value)
{
 echo $value ."<br />";
}
// What will be the output of this? Again, guess the output before running the code.

$fruits= array("A" => "Apple", "B" => "Banana");
foreach($fruits as $key => $value)
{
 echo $key . " - " . $value ."<br />";
}
// How about the following code? Try to guess the output of the code before running it!

$fruits= array("A" => "Apple", "B" => "Banana");
foreach($fruits as $key => $value)
{
 echo $value ."<br />";
}
// Let's change the echo statement. Make a guess!

$fruits= array("A" => "Apple", "B" => "Banana");
foreach($fruits as $key => $value)
{
 echo $key ."<br />";
}
// Okay. Now let's make it more challenging. What would be the output of the following code?

$plots = array( array("a1", "a2", "a3"), array("b1", "b2", "b3"), array("c1", "c2", "c3") );
foreach($plots as $key => $value)
{
 echo "Key is {$key}<br />";
 echo "logging the value";
 var_dump($value);
}
// Now what about this? Again guess the output before running the code.

$plots = array( array("a1", "a2", "a3"), array("b1", "b2", "b3"), array("c1", "c2", "c3") );
foreach($plots as $value)
{
 echo "logging the value";
 var_dump($value);
}
// Okay. Now let's make it even harder. What would be the output of the following code?

$nations = array( array("PH"=>"Philippines", "KR"=>"South Korea"), array("PHP"=>"Philippine peso", "KRW"=>"South Korean won"), array("Manila"=>"Maynilad", "Seoul"=>"Seorabeol") );
foreach($nations as $key => $value)
{
 echo "key is {$key}<br />";
 foreach($value as $key2=>$value2)
 {
     echo $key2 ." - " . $value2."<br />";
 }
}
// At last! What about this?

$nations = array( array("PH"=>"Philippines", "KR"=>"South Korea"), array("PHP"=>"Philippine peso", "KRW"=>"South Korean won"), array("Manila"=>"Maynilad", "Seoul"=>"Seorabeol") );
foreach($nations as $nation)
{
 foreach($nation as $key=>$value)
 {
     echo $key ." - " . $value."<br />";
 }
}

?>