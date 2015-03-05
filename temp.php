<?php //convert.php

$f=$c='';
if(isset($_POST['f'])) $f=santizeString($_POST['f']);
if(isset($_POST['c'])) $c=santizeString($_POST['c']);

if($f!='')
{
  $c=intval((5/9)*($f-32));
  $out="$f f is equal to $c c";
}
elseif($c!='')
{
 $f="$c c is equal to $f f";
 $out="$c c is equal to $f f";
}
else $out="";

echo<<<_END
<html>
<head>
<title>Temperature Converter</title>
</head>
<body>
<pre>Enter the Fahrenheit or Celsius and click to convert

 <b>$out</b>
<form action="temp.php" method="post">
<input type="text" name="f">
<input type="text" name="c">
<input type="submit" value="Convert">
</form></pre>
<b>$out</b>
</body>
</html>
_END;

function sanitizeString($var)
{
 $var=striplashes($var);
 $var=strip_tags($var);
 $var=htmlentities($var);
return $var;
}

?>
