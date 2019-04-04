<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$objCon = mysqli_connect("db:3306", getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"), "REGISTRATION_DB") or die("Error Connect to Database");
$strSQL = "SELECT * FROM Professor";
$objQuery = mysqli_query($objCon, $strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="400" border="1">
  <tr>
    <th width="91"> <div align="center">Professor ID </div></th>
    <th width="160"> <div align="center">Professor Name </div></th>
    <th width="97"> <div align="center">Salary </div></th>
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
?>
</body>
</html>