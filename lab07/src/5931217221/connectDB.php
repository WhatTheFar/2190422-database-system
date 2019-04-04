<html>
<head>
	<title>PHP & MySQL Tutorial</title>
</head>
<body>
	<?php
		$objConnect = mysqli_connect("db:3306", getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"), "REGISTRATION_DB");
		if($objConnect)
		{
			echo "Database Connected.";
		}
		else
		{
			echo "Database Connect Failed.";
		}

		mysqli_close($objConnect);
	?>
</body>
</html>