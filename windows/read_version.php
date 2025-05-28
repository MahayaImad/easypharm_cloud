<?php
$file = fopen( "version.txt", "r" );
$content = fgets($file, 4096);
fclose($file);
echo "aaa" ;
echo $content ;
echo "bbb" ;
?>