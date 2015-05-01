<?php
$username='admin';
$password='letmein';
if(isset($_SERVER['PHP_AUTH_USER']) && 
   isset($_SERVER['PHP_AUTH_PW']))
{if($_SERVER['PHP_AUTH_USER'] == $username &&  
    $_SERVER['PHP_AUTH_PW']  == $password )
 {echo"Welcome User : ".$_SERVER['PHP_AUTH_USER']."<br>";
   $salt1="sbcde";
   $token=hash('ripemd128','$salt1mypassword');
   echo"Password : '".$_SERVER['PHP_AUTH_PW']."'";
   echo"<br> the hash value is ".$token;}
  else die("Invalid Username/Password Combination");
}
else
{ header('WWW-Authenticate:Basic realm="Restricted Section"');
  header('HTTP/1.0 401 Unauthorized');
  die("Please Enter the Username and Password");}
?>
