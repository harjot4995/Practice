<?php
require_once 'login.php';
$db_server=mysql_connect($db_hostname,$db_username,$db_password);

if(!db_server) die("Unable to connect to Mysql :".mysql_error());

mysql_select_db($db_database,$db_server) or die("Unable to Select Database:".mysql_error());

$query="DESCRIBE cats";

$result=mysql_query($query);

if(!$result) die("Unable to Describe Table ".mysql_error());

$rows=mysql_num_row($result);
echo"<table><tr><th>Column</th><th>Type</th><th>NULL</th><th>Key</th></tr>";
$cols=mysql_num_fields($result);
for($j=0;$j<$rows;++$j)
{
// echo "<br>";
  $row=mysql_fetch_row($result);
  echo"<tr>";
 for($k=0;$k<$cols;++$k)
 {
   echo"<td>$row[$k]</td>";

   echo"</tr>";
 }

 echo"</table>";



?>
