<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<?php
	$objCon = mysqli_connect("db:3306", getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"), "REGISTRATION_DB") or die("Error Connect to Database");
	for($i=1;$i<=$_POST["hdnLine"];$i++)
	{
		if($_POST["txtCourseID$i"] != "")
		{
			
			$strSQL = "INSERT INTO Course ";
			$strSQL .="(cid,title,dept_name,credits) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$_POST["txtCourseID$i"]."','".$_POST["txtTitle$i"]."', ";
			$strSQL .="'".$_POST["txtDeptName$i"]."', ";
			$strSQL .="'".$_POST["txtCredits$i"]."') ";
			$objQuery = mysqli_query($objCon, $strSQL);
		}
	}

	echo "Save Done.  Click <a href='listRecord.php'>here</a> to view.";

mysqli_close($objCon);
?>
</body>
</html>