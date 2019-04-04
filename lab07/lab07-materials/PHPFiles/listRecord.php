<html>
<head>
<title>PHP & MySQL Tutorial</title>
<?php
  $objCon = mysqli_connect("localhost:3306", "root", "password", "REGISTRATION_DB") or die("Error Connect to Database");
  $strSQL = "SELECT * FROM Student";
  $objQuery = mysqli_query($objCon, $strSQL) or die ("Error Query [".$strSQL."]");
?>
</head>
<body>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">Student ID </div></th>
    <th width="97"> <div align="center">Name</div></th>
	  <th width="97"> <div align="center">Year</div></th>
    <th width="198"> <div align="center">Email</div></th>
  </tr>
  <?php
    while($objResult = mysqli_fetch_array($objQuery))
    {
    ?>
      <tr>
        <td><div align="center"><?php echo $objResult["student_id"];?></div></td>
        <td><?php echo $objResult["name"];?></td>
        <td><div align="center"><?php echo $objResult["year"];?></div></td>
        <td><?php echo $objResult["email"];?></td>
      </tr>
    <?php
    }
  ?>
</table>
</body>
<?php
  mysqli_close($objCon);
?>
</html>