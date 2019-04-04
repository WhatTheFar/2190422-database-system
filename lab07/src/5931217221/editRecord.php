<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$objCon = mysqli_connect("db:3306", getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"), "REGISTRATION_DB") or die("Error Connect to Database");

//*** Update Condition ***//
if($_GET["Action"] == "Save")
{
	for($i=1;$i<=$_POST["hdnLine"];$i++)
	{
		$strSQL = "UPDATE Section SET ";
		$strSQL .="cid = '".$_POST["txtCourseID$i"]."' ";
		$strSQL .=",sect_id = '".$_POST["txtSectID$i"]."' ";
		$strSQL .=",semester = '".$_POST["txtSemester$i"]."' ";
		$strSQL .=",year = '".$_POST["txtYear$i"]."' ";
		$strSQL .=",building = '".$_POST["txtBuilding$i"]."' ";
		$strSQL .=",room = '".$_POST["txtRoom$i"]."' ";
		$strSQL .=",timeslot_id = '".$_POST["txtTimeslotID$i"]."' ";
		$strSQL .="WHERE cid = '".$_POST["hdnCourseID$i"]."' ";
		$strSQL .="and sect_id = '".$_POST["hdnSectID$i"]."' ";
		$strSQL .="and semester = '".$_POST["hdnSemester$i"]."' ";
		$strSQL .="and year = '".$_POST["hdnYear$i"]."' ";
		$objQuery = mysqli_query($objCon, $strSQL) or die ("Error Query [".$strSQL."]");
	}
	//header("location:$_SERVER[PHP_SELF]");
	//exit();
}

$strSQL = "SELECT * FROM Section ORDER BY cid ASC";
$objQuery = mysqli_query($objCon, $strSQL) or die ("Error Query [".$strSQL."]");
?>
<form name="frmMain" method="post" action="editRecord.php?Action=Save">
<table width="600" border="1">
  <tr>
    <th width="91"> CourseID </th>
    <th width="98"> <div align="center">SectionID </div></th>
    <th width="20"> <div align="center">Semester </div></th>
    <th width="20"> <div align="center">Year </div></th>
    <th width="59"> <div align="center">Building </div></th>
    <th width="20"> <div align="center">Room </div></th>
	<th width="20"> <div align="center">Timeslot_ID </div></th>
  </tr>
<?php
$i =0;
while($objResult = mysqli_fetch_array($objQuery))
{
	$i = $i + 1;
?>
  <tr>
    <td>
		<input type="hidden" name="hdnCourseID<?php echo $i;?>" size="10" value="<?php echo $objResult["cid"];?>">
		<input type="text" name="txtCourseID<?php echo $i;?>" size="10" value="<?php echo $objResult["cid"];?>">
	</td>
    <td>
    	<input type="hidden" name="hdnSectID<?php echo $i;?>" size="10" value="<?php echo $objResult["sect_id"];?>">
    	<input type="text" name="txtSectID<?php echo $i;?>" size="10" value="<?php echo $objResult["sect_id"];?>">
    </td>
    <td>
    	<input type="hidden" name="hdnSemester<?php echo $i;?>" size="10" value="<?php echo $objResult["semester"];?>">
    	<input type="text" name="txtSemester<?php echo $i;?>" size="20" value="<?php echo $objResult["semester"];?>">
    </td>
    <td>
    	<input type="hidden" name="hdnYear<?php echo $i;?>" size="10" value="<?php echo $objResult["year"];?>">
    	<div align="center"><input type="text" name="txtYear<?php echo $i;?>" size="10" value="<?php echo $objResult["year"];?>"></div>
    </td>
    <td><div align="center"><input type="text" name="txtBuilding<?php echo $i;?>" size="40" value="<?php echo $objResult["building"];?>"></div></td>
    <td><div align="center"><input type="text" name="txtRoom<?php echo $i;?>" size="10" value="<?php echo $objResult["room"];?>"></div></td>
	<td><div align="center"><input type="text" name="txtTimeslotID<?php echo $i;?>" size="15" value="<?php echo $objResult["timeslot_id"];?>"></div></td>
  </tr>
<?php
}
?>
</table>
  <input type="submit" name="submit" value="submit">
  <input type="hidden" name="hdnLine" value="<?php echo $i;?>">
</form>
<?php
mysqli_close($objCon);
?>
</body>
</html>