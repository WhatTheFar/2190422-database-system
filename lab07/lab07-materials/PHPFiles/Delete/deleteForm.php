<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$objCon = mysqli_connect("localhost:3306", "root", "password", "REGISTRATION_DB") or die("Error Connect to Database");
$strSQL = "SELECT * FROM takes";
$objQuery = mysqli_query($objCon, $strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">StudentID </div></th>
    <th width="98"> <div align="center">CourseID </div></th>
    <th width="198"> <div align="center">SectionID </div></th>
    <th width="97"> <div align="center">Semester </div></th>
    <th width="59"> <div align="center">Year </div></th>
    <th width="71"> <div align="center">Grade </div></th>
    <th width="30"> <div align="center">Delete </div></th>
  </tr>
<?php
while($objResult = mysqli_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["student_id"];?></div></td>
    <td><?php echo $objResult["cid"];?></td>
    <td><?php echo $objResult["sect_id"];?></td>
    <td><div align="center"><?php echo $objResult["semester"];?></div></td>
    <td align="center"><?php echo $objResult["year"];?></td>
    <td align="center"><?php echo $objResult["grade"];?></td>
    <td align="center"><a href="deleteRecord.php?StudentID=<?php echo $objResult["student_id"];?>
	                           &CourseID=<?php echo $objResult["cid"];?>
							   &SectionID=<?php echo $objResult["sect_id"];?>
							   &Semester=<?php echo $objResult["semester"];?>
							   &Year=<?php echo $objResult["year"];?>">Delete</a></td>
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