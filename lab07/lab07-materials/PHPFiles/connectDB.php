<html>
<head>
	<title>PHP & MySQL Tutorial</title>
</head>
<body>
	<?php
		$objConnect = mysqli_connect("localhost:3306", "root", "password", "REGISTRATION_DB");
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