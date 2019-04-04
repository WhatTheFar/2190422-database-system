<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$objCon = mysqli_connect("db:3306", getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"), "REGISTRATION_DB") or die("Error Connect to Database");
$strSQL = "SELECT * FROM Course";
$objQuery = mysqli_query($objCon, $strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">CourseID </div></th>
    <th width="98"> <div align="center">Title </div></th>
    <th width="198"> <div align="center">Dept_Name </div></th>
    <th width="97"> <div align="center">Credits </div></th>
  </tr>
<?php
while($objResult = mysqli_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["cid"];?></div></td>
    <td><?php echo $objResult["title"];?></td>
    <td><?php echo $objResult["dept_name"];?></td>
    <td><div align="center"><?php echo $objResult["credits"];?></div></td>
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