echo" <!DOCTYPE html><html><head><title>Html Form</title>";

if($fail="")
{
	echo "</head><body> From data successfully entered :
	$forename,$surname,$username,$password,$age,$email</body></html> ";

	exit ;
}

echo<<<_END

<style>
.signup {
        border:1px solid #999999;
        font:  normal 14px helvetica;
        color: #49eaca;
      }
    </style>

    <script>
      function validate(form)
      {
        fail  = validateForename(form.forename.value)
        fail += validateSurname(form.surname.value)
        fail += validateUsername(form.username.value)
        fail += validatePassword(form.password.value)
        fail += validateAge(form.age.value)
        fail += validateEmail(form.email.value)

        if   (fail == "")   return true
        else { alert(fail); return false }
      }

      function validateForename(field)
      {
        return (field == "") ? "No Forename was entered.\n" : ""
      }

      function validateSurname(field)
      {
        return (field == "") ? "No Surname was entered.\n" : ""
      }
 function validateUsername(field)
      {
        if (field == "") return "No Username was entered.\n"
        else if (field.length < 5)
          return "Usernames must be at least 5 characters.\n"
        else if (/[^a-zA-Z0-9_-]/.test(field))
          return "Only a-z, A-Z, 0-9, - and _ allowed in Usernames.\n"
        return ""
      }

      function validatePassword(field)
      {
        if (field == "") return "No Password was entered.\n"
        else if (field.length < 6)
          return "Passwords must be at least 6 characters.\n"
        else if (! /[a-z]/.test(field) ||
                 ! /[A-Z]/.test(field) ||
                 ! /[0-9]/.test(field))
          return "Passwords require one each of a-z, A-Z and 0-9.\n"
        return ""
      }

      function validateAge(field)
      {
        if (isNaN(field)) return "No Age was entered.\\n"
        else if (field < 18 || field > 110)
          return "Age must be between 18 and 110.\n"
        return ""
      }

      function validateEmail(field)
      {
        if (field == "") return "No Email was entered.\n"
          else if (!((field.indexOf(".") > 0) &&
                     (field.indexOf("@") > 0)) ||
       /[^a-zA-Z0-9.@_-]/.test(field))
            return "The Email address is invalid.\n"
        return ""
      }
    </script>
  </head>
  <body>
    <table border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
      <th colspan="2" align="center">Signup Form</th>
      <form method="post" action="adduser.php" onsubmit="return validate(this)">
        <tr><td>Forename</td>
          <td><input type="text" maxlength="32" name="forename"></td></tr>
        <tr><td>Surname</td>
          <td><input type="text" maxlength="32" name="surname"></td></tr>
        <tr><td>Username</td>
          <td><input type="text" maxlength="16" name="username"></td></tr>
        <tr><td>Password</td>
          <td><input type="text" maxlength="12" name="password"></td></tr>
        <tr><td>Age</td>
          <td><input type="text" maxlength="3"  name="age"></td></tr>
        <tr><td>Email</td>
          <td><input type="text" maxlength="64" name="email"></td></tr>
        <tr><td colspan="2" align="center"><input type="submit" value="Signup"></td></tr>
      </form>
    </table>
  </body>
</html>                                                                                                                              98,1

_END;

function validate_forename($field)
{
return ($field=="") ? "No Forename is entered <br>": "";}

function validate_surname($field)
{
return ($field=="") ? "No surname is entered <br>":"";}

function validate_username($field)
{
if($field=="") return "No username is entered <br>";
 elseif(strlen($field)<5) return "Length shorter than 5 char <br>";
 elseif(preg_match("/[^a-zA-Z0-9_-]/",$field)) return "Only a-z,A-Z,0-9,_ and - allowed <br>";
 else return ""; }


 function validate_password($field)
 {
 if($field=="") return "No password entered <br>";
 elseif(strlen($field)<6) return "Length of password is smaller than 6 character <br>";
 elseif(!preg_match("/[a-z]/",$field) ||
 		!preg_match("/[A-Z]/",$field) ||
 				!preg_match("/[0-9]/",$field) ) return "Password must contain a-z,A-Z and 0-9 each <br>";
 else return "";
}

 function validate_age($field)
 {
 if($field=="") return "No age entered <br>";
 elseif($field<18 || $field>110) return "Age must be between 18 and 110 <br>";
 else return "";
 }

 function validate_email($field)
 {
 if($field=="") return "No Email entered <br>";
 elseif(!((strpos($field,".") >0) &&
 (strpos($field,"@") >0)) ||
 preg_match("/[^a-zA-Z0-9.@_-]/",$field)) return "Invalid email entered <br>";
 else return "";}

function fix_string($string)
 { if (get_magic_quotes_gpc()) $string=stripslashes($string);
 return htmlentities($string);
 }

 ?>
