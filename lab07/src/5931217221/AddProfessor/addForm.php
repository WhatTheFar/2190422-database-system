<html>
<head>
<title>PHP & MySQL Tutorial</title>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//check Null value
function fncSubmit()
{
	if(document.frmAdd.txtCourseID.value == "")
	{
		alert('Please input CourseID');
		document.frmAdd.txtCourseID.focus();
		return false;
	}	
	if(document.frmAdd.txtTitle.value == "")
	{
		alert('Please input Title');
		document.frmAdd.txtTitle.focus();		
		return false;
	}
	if(document.frmAdd.txtDeptName.value == "")
	{
		alert('Please input Department Name');
		document.frmAdd.txtDeptName.focus();		
		return false;
	}
	if(document.frmAdd.txtCredits.value == "")
	{
		alert('Please input Department Name');
		document.frmAdd.txtCredits.focus();		
		return false;
	}
	document.form1.submit();
}
//-->
</script>
</head>
<body>
<form action="addSave.php" name="frmAdd" method="post" onSubmit="JavaScript:return fncSubmit();">
Select #Record : 
<select name="menu1" onChange="MM_jumpMenu('parent',this,0)">
<?php
for($i=1;$i<=50;$i++)
{
	if($_GET["Line"] == $i)
	{
		$sel = "selected";
	}
	else
	{
		$sel = "";
	}
?>
	<option value="<?php echo $_SERVER["PHP_SELF"];?>?Line=<?php echo $i;?>" <?php echo $sel;?>><?php echo $i;?></option>
<?php
}
?>
</select>
<table width="400" border="1">
  <tr>
    <th width="91"> <div align="center">Professor ID </div></th>
    <th width="160"> <div align="center">Professor Name </div></th>
    <th width="97"> <div align="center">Salary </div></th>
  </tr>
  <?php
  $line = $_GET["Line"];
  if($line == 0){$line=1;}
  for($i=1;$i<=$line;$i++)
  {
  ?>
  <tr>
    <td><div align="center"><input type="text" name="txtPID<?php echo $i;?>" size="8"></div></td>
    <td><input type="text" name="txtPname<?php echo $i;?>" size="20"></td>
    <td><input type="text" name="txtSalary<?php echo $i;?>" size="20"></td>
  </tr>
  <?php
  }
  ?>
  </table>
  <input type="submit" name="submit" value="submit">
  <input type="hidden" name="hdnLine" value="<?php echo $i;?>">
  </form>
</body>
</html>