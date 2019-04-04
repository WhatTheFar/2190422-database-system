<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$objCon = mysqli_connect("db:3306", getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"), "REGISTRATION_DB") or die("Error Connect to Database");
$strSQL = "DELETE FROM Student ";
$strSQL .="WHERE student_id = '".$_GET["StudentID"]."' ";

$objQuery = mysqli_query($objCon, $strSQL);
if($objQuery)
{
	echo "Record Deleted.";
}
else
{
	echo "Error Delete [".$strSQL."]";
}
mysqli_close($objCon);
?>
</body>
</html>