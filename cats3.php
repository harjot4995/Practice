<?php
require_once 'login.php';
$db_server=mysql_connect($db_hostname,$db_username,$db_password);

if(!$db_server) die("Unable to Connect to Mysql:".mysql_error());

mysql_select_db($db_database) or die("Unable to Select Database:".mysql_error());

if(isset($_POST['delete']) && isset($_POST['id']))
{ $id=get_post('id');
  $query="DELETE FROM cats WHERE id='$id'";
  if(!mysql_query($query,$db_server)){echo "<br> Unable to Delete".mysql_error();}
}

if(isset($_POST['edit']) && isset($_POST['i']))
{
$i=get_post('i');
echo<<<_END
<form  action="cats3.php" method="post"><pre>
<input type="text" name="a">
<input type="hidden" name="i" value="$i">
<input type="submit" value="submit">
</pre></form>
_END;
}

if(isset($_POST['a']) && isset($_POST['i']))
{
$a=get_post('a');
$i=get_post('i');
$query="UPDATE cats SET name='$a' WHERE id='$i'";
if(!mysql_query($query,$db_server)) echo"<br> Unable to do this :".mysql_error();

}

if(isset($_POST['name']) &&
  isset($_POST['type']) &&
  isset($_POST['age'] ))
{
   $name=get_post('name');
   $type=get_post('type');
   $age=get_post('age');
$query="INSERT INTO cats VALUES"."(NULL,'$name','$type','$age')";

if(!mysql_query($query,$db_server)) echo "Unable to Insert Into Table:".mysql_error() ;

echo "Insert ID is ".mysql_insert_id();
}

echo<<<_END
<form action="cats3.php" method="post"><pre>
Name <input type="text" name="name" >
Type <input type="text" name="type">
Age  <input type="text" name="age">
     <input type="submit" value="ADD RECORD"></pre>
</form>
_END;

$query="SELECT * FROM cats ";
$result=mysql_query($query);
$rows=mysql_num_rows($result);

for($j=0;$j<$rows;++$j)
{
  $row=mysql_fetch_row($result);
  
 echo<<<_END
<form action="cats3.php" method="post">
<pre> 
ID     $row[0]
Name   $row[1]
Type   $row[2]<input type="hidden" name="edit" value="yes"><input type="hidden" name="i" value="$row[0]"><input type="submit" value="EDIT">
Age    $row[3]
<input type="hidden" name="delete" value="yes">
<input type="hidden" name="id" value="$row[0]">
<input type="submit" value="Delete Record"></pre>
</form>
_END;

}


mysql_close($db_server);

function get_post($var)
{
 return mysql_real_escape_string($_POST[$var]);
}

?>
