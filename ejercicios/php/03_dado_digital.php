<?php
print "<br>";
$valor= rand(1,6);

print "  <p><span style=\"border: black 2px solid; padding: 10px; font-size: 300%\">"
    . $valor . "</span></p>\n";

print "<p><img src='img/". $valor . ".svg' alt='Dado' width='140' height='140'></p>\n";