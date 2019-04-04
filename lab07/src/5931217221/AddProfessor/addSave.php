<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<?php
	$objCon = mysqli_connect("db:3306", getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"), "REGISTRATION_DB") or die("Error Connect to Database");
	for($i=1;$i<=$_POST["hdnLine"];$i++)
	{
		if($_POST["txtPID$i"] != "")
		{
			
			$strSQL = "INSERT INTO Professor ";
			$strSQL .="(pid,pname,salary) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$_POST["txtPID$i"]."','".$_POST["txtPname$i"]."', ";
			$strSQL .="'".$_POST["txtSalary$i"]."') ";
			$objQuery = mysqli_query($objCon, $strSQL);
		}
	}

	echo "Save Done.  Click <a href='listRecord.php'>here</a> to view.";

mysqli_close($objCon);
?>
</body>
</html>