<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$objCon = mysqli_connect("db:3306", getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"), "REGISTRATION_DB") or die("Error Connect to Database");
$strSQL = "SELECT * FROM Student";
$objQuery = mysqli_query($objCon, $strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">StudentID </div></th>
    <th width="98"> <div align="center">StudentName </div></th>
    <th width="98"> <div align="center">Year </div></th>
    <th width="97"> <div align="center">Email </div></th>
    <th width="30"> <div align="center">Delete </div></th>
  </tr>
<?php
while($objResult = mysqli_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["student_id"];?></div></td>
    <td><?php echo $objResult["name"];?></td>
    <td align="center"><?php echo $objResult["year"];?></td>
    <td><div align="center"><?php echo $objResult["email"];?></div></td>
    <td align="center"><a href="deleteRecord.php?StudentID=<?php echo $objResult["student_id"];?>
	                           &Name=<?php echo $objResult["name"];?>
							   &Year=<?php echo $objResult["year"];?>
							   &Email=<?php echo $objResult["email"];?>">Delete</a></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($objCon);
?>
</body>
</html>