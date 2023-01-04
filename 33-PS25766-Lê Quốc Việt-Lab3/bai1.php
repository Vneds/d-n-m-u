<?php
$say = function($name){
    echo "Hello" . $name;
};

$say("World"); // "Hello World"

function myCaller($myCallback)
{
    echo $myCallback();
}
// "Hello"
myCaller ( function() { echo "Hello";} );

    $a = array (1, 2, 3, 4, 5);
    $b = array_map ( function($n)
    {
        return $n * $n * $n;
    }, $a) ;
    print_r($b);
    
    
?>