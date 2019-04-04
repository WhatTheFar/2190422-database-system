<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="1">
    <tr>
      <th>Keyword
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $_GET["txtKeyword"];?>">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>
<?php
if($_GET["txtKeyword"] != "")
	{
	$objCon = mysqli_connect("localhost:3306", "root", "password", "REGISTRATION_DB") or die("Error Connect to Database");
	// Search By Name
	$strSQL = "SELECT * FROM professor WHERE (pname LIKE '%" . $_GET["txtKeyword"] . "%' ) ORDER BY professor.pname";
	$objQuery = mysqli_query($objCon, $strSQL) or die ("Error Query [" . $strSQL . "]");
	?>
	<table width="600" border="1">
	  <tr>
		<th width="91"> <div align="center">ProfessorID </div></th>
		<th width="98"> <div align="center">Name </div></th>
		<th width="98"> <div align="center">Salary </div></th>
	  </tr>
	<?php
	while($objResult = mysqli_fetch_array($objQuery))
	{
	?>
	  <tr>
		<td><div align="center"><?php echo $objResult["pid"];?></div></td>
		<td><?php echo $objResult["pname"];?></td>
		<td><?php echo $objResult["salary"];?></td>
	  </tr>
	<?php
	}
	?>
	</table>
	<?php
	mysqli_close($objCon);
}
?>
</body>
</html>