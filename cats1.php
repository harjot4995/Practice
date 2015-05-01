<?php
require_once 'login.php';
$db_server=mysql_connect($db_hostname,$db_username,$db_password);
if(!$db_server) die("Unable to Connect to Mysql:".mysql_error());

mysql_select_db($db_database,$db_server) or die("Could not Select Database:".mysql_error());


$query="DROP TABLE cats";
$result=mysql_query($query);

if(!$result) die("Unable to Delete table".mysql_error());

?>


