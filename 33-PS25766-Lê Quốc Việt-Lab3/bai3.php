<?php
    

$str = "082307";
$new = chunk_split($str,2,":");
echo substr($new,0,-1);
?>