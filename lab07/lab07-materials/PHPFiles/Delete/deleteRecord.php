<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$objCon = mysqli_connect("localhost:3306", "root", "password", "REGISTRATION_DB") or die("Error Connect to Database");
$strSQL = "DELETE FROM takes ";
$strSQL .="WHERE student_id = '".$_GET["StudentID"]."' ";
$strSQL .="and cid = '".$_GET["CourseID"]."' ";
$strSQL .="and sect_id = '".$_GET["SectionID"]."' ";
$strSQL .="and semester = '".$_GET["Semester"]."' ";
$strSQL .="and year = '".$_GET["Year"]."' ";

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