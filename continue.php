<?php
session_start();

if(isset($_SESSION['username']))
{
  $username=$_SESSION['username'];
  $password=$_SESSION['password'];
  $forename=$_SESSION['forename'];
  $surname=$_SESSION['surname'];

  destroy_session_and_data();
 
echo "Welcome back $forename.<br> Your full name is $forename$surname.<br>your username is '$username'.<br> and your password is '$password'.";
}

else echo "Please <a href='authenticate.php'> click </a>to login .";
function destroy_session_and_data()
{
 $_SESSION=array();
 setcookie(session_name(),'',time()-2592000,'/');
 session_destroy();
}
?>
