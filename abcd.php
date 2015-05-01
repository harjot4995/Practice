<?php
$salt1="qm&h*";
$salt2="pg!@";
$pw="acrobat";
$token=hash('ripemd128',"$salt1$pw$salt2");
echo"$token";
echo"<br>";
$pw="mysecret";
$token=hash('ripemd128',"$salt1$pw$salt2");
echo"$token";

?>
