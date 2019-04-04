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
	$objCon = mysqli_connect("db:3306", getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"), "REGISTRATION_DB") or die("Error Connect to Database");
	// Search By Name
	$strSQL = "SELECT * FROM Student JOIN Takes ON Student.student_id = Takes.student_id WHERE (Student.name LIKE '%" . $_GET["txtKeyword"] . "%' ) ORDER BY Student.name";
	$objQuery = mysqli_query($objCon, $strSQL) or die ("Error Query [" . $strSQL . "]");
	?>
	<table width="600" border="1">
	<tr>
    <th width="91"> <div align="center">Student ID </div></th>
    <th width="97"> <div align="center">Name</div></th>
    <th width="97"> <div align="center">Course ID</div></th>
    <th width="97"> <div align="center">Section ID</div></th>
	  <th width="97"> <div align="center">Year</div></th>
    <th width="198"> <div align="center">Email</div></th>
    <th width="97"> <div align="center">Grade</div></th>
  </tr>
	<?php
	while($objResult = mysqli_fetch_array($objQuery))
	{
	?>
	  <tr>
        <td><div align="center"><?php echo $objResult["student_id"];?></div></td>
        <td><?php echo $objResult["name"];?></td>
        <td><div align="center"><?php echo $objResult["cid"];?></div></td>
        <td><div align="center"><?php echo $objResult["sect_id"];?></div></td>
        <td><div align="center"><?php echo $objResult["year"];?></div></td>
        <td><?php echo $objResult["email"];?></td>
        <td><div align="center"><?php echo $objResult["grade"];?></div></td>
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