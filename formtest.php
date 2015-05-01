<?php
if(isset($_POST['name']))
{
 $name=$_POST['name'];
}
else
{$name="(not entered)";}

echo<<<_END
<html>
<head>
<title>Formtest</title>
</head>
<body>
Your Name is :$name
<form action="formtest.php" method="post">
What's Your Name
<input type="text" name="name">
<input type="submit" value="Enter">
</form>
</body>
</html>
_END;
?>
