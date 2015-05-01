<?php
echo<<<_END
<html>
<head>
<title>Formtest</title>
</head>
<body>
<form action="formtest1.php" method="post"><pre>
Loan Amount      <input type="text" name="principle" size="20" maxlength="7">
Monthly Repayment<input type="text" name="monthly">
Years            <input type="text" name="year" value="25">
Interest         <input type="text" name="rate" value="6">
Text             <textarea name="name" cols="19" rows="5" wrap="hard">Default Text</textarea>
Fav. Color
            Black  <input type="checkbox" name="ice[]" value="1">
            Blue   <input type="checkbox" name="ice[]" value="2" checked="checked">
            Red    <input type="checkbox" name="ice[]" value-"3">
Age Criteria
   <label> 8-12 yr <input type="radio" name="age" value="1"></label>
   <label>12-18 yr <input type="radio" name="age" value="2" checked="checked"></label>
   <label>18-24 yr <input type="radio" name="age" value"3"></label>
Fav. Veg
          <select name="veg" size="2" multiple="multiple">
          <option value="Peas">   Peas</option>
          <option value="Beans">  Beans</option>
           <option selected="selected" value="Carrots">Carrots</option>
                   </select>
                       <input type="submit"></pre>
</form>
</body>
</html>
_END;
?>
