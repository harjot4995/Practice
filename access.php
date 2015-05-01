<?php
require_once 'login.php';
$db_server=mysql_connect($db_hostname,$db_username,$db_password);
if(!$db_server) die("Unable to Connect to Mysql:".mysql_error());
mysql_select_db($db_database,$db_server) or die("Unable to Select Database:".mysql_error());
$query="SELECT * FROM customers";
$result=mysql_query($query);
if(!$result) echo"<br> Unable to Access Table:".mysql_error();
$rows=mysql_num_rows($result);
for($j=0;$j<$rows;++$j)
{ $row=mysql_fetch_row($result);
  echo " The ISBN for  ".$row[0]." is :".$row[1];
  echo"<br>";
  $subquery="SELECT author,title FROM classics WHERE isbn='$row[1]'";
  $res=mysql_query($subquery);
  $k=mysql_num_rows($res);
for($m=0;$m<$k;++$m)
{   $c=mysql_fetch_row($res);
    echo "Author :".$c[0];
    echo"<br>Titile :".$c[1];
    echo"<br>";
}}mysql_close($db_server);
?>
