<?php require_once 'login.php'; 
$server=new mysqli($db_hostname,$db_username,$db_password,$db_database);

if($server->connect_error) die($server->connect_error);

if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) 
{
  /*
  $un=mysql_entities_fix_string($server,$_SERVER['PHP_AUTH_USER']);
  $pw=mysql_entities_fix_string($server,$_SERVER['PHP_AUTH_PW']);
  */
  $un=$_SERVER['PHP_AUTH_USER'];
  $pw=$_SERVER['PHP_AUTH_PW'];
  $query="SELECT * FROM users WHERE username='$un' ";
  $result=$server->query($query);

 if(!$result) die($server->error);
 elseif($result->num_rows)
   {
     $row=$result->fetch_array(MYSQLI_NUM);
     $result->close();
     $salt1="qm&h*";
     $salt2="pg!@";
     $token=hash('ripemd128',"$salt1$pw$salt2");
     
       if($token == $row[3])
{        session_start();
         $_SESSION['username']=$un;
         $_SESSION['password']=$pw;
         $_SESSION['forename']=$row[0];
         $_SESSION['surname']=$row[1];
        echo "$row[0]$row[1] :Hi $row[0] you are logged in as '$row[2]'";
		die("<p><a href=continue.php> Click here to continue</a></p>");
	}
	       else die("Invalid Password Combination : $token");
	    }
	  else{echo"Invalid Username/Password Combination";}
	}

	else
	 {
	   header('WWW-Authenticate:Basic realm="Restricted Section"');
	   header('HTTP/1.0 401 Unauthorized');
	   die('Please Enter Username and Password');
	}

	$server->close();
/*
function mysql_entities_fix_string($server,$var)
{
 return  htmlentities(mysql_fix_string($server,$var));
}

function mysql_fix_string($connection,$var)
{if(get_magic_quotes_gpc()) $var=stripslashes($var);
return connection->real_escape_string($var);
}
*/
?>
