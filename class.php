<?php
require_once 'login.php';
$db_server=new mysqli($db_hostname,$db_username,$db_password,$db_database);

if($db_server->connect_error) die($db_server->connect_error);
$query="SELECT * FROM classics";
$result=$db_server->query($query);
if(!result) die("Unable to Select table:".$db_server->error);
echo"<br> OK! I got the basics";
echo"<br><br><br>";

$rows=$result->num_rows;

for($j=0;$j<$rows;++$j)
{
   $result->data_seek($j);
   $row=$result->fetch_array(MYSQLI_ASSOC);
  
   echo"Author:".$row['author']."<br>";
   echo"Title:".$row['title']."<br>";
   echo"Category:".$row['category']."<br>";
   echo"Year:".$row['year']."<br>";
   echo"ISBN:".$row['isbn']."<br><br><br>";
}

$result->close();
$db_server->close();

?>
