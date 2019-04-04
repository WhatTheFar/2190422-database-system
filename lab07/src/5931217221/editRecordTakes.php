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
		$strSQL = "UPDATE Takes SET ";
		$strSQL .="student_id = '".$_POST["txtStudentID$i"]."' ";
		$strSQL .=",cid = '".$_POST["txtCourseID$i"]."' ";
		$strSQL .=",sect_id = '".$_POST["txtSectID$i"]."' ";
		$strSQL .=",semester = '".$_POST["txtSemester$i"]."' ";
		$strSQL .=",year = '".$_POST["txtYear$i"]."' ";
		$strSQL .=",grade = '".$_POST["txtGrade$i"]."' ";
		$strSQL .="WHERE student_id = '".$_POST["hdnStudentID$i"]."' ";
		$strSQL .="and cid = '".$_POST["hdnCourseID$i"]."' ";
		$strSQL .="and sect_id = '".$_POST["hdnSectID$i"]."' ";
		$strSQL .="and semester = '".$_POST["hdnSemester$i"]."' ";
		$strSQL .="and year = '".$_POST["hdnYear$i"]."' ";
		$objQuery = mysqli_query($objCon, $strSQL) or die ("Error Query [".$strSQL."]");
	}
	//header("location:$_SERVER[PHP_SELF]");
	//exit();
}

$strSQL = "SELECT * FROM Takes ORDER BY cid ASC";
$objQuery = mysqli_query($objCon, $strSQL) or die ("Error Query [".$strSQL."]");
?>
<form name="frmMain" method="post" action="editRecordTakes.php?Action=Save">
<table width="600" border="1">
  <tr>
    <th width="98"> <div align="center">StudentID </div></th>
    <th width="20"> <div align="center">CourseID </div></th>
    <th width="20"> <div align="center">SectionID </div></th>
    <th width="59"> <div align="center">Semester </div></th>
    <th width="20"> <div align="center">Year </div></th>
	<th width="20"> <div align="center">Grade </div></th>
  </tr>
<?php
$i =0;
while($objResult = mysqli_fetch_array($objQuery))
{
	$i = $i + 1;
?>
  <tr>
    <td>
		<input type="hidden" name="hdnStudentID<?php echo $i;?>" size="10" value="<?php echo $objResult["student_id"];?>">
		<input type="text" name="txtStudentID<?php echo $i;?>" size="10" value="<?php echo $objResult["student_id"];?>">
	</td>
    <td>
    	<input type="hidden" name="hdnCourseID<?php echo $i;?>" size="10" value="<?php echo $objResult["cid"];?>">
    	<input type="text" name="txtCourseID<?php echo $i;?>" size="10" value="<?php echo $objResult["cid"];?>">
    </td>
    <td>
    	<input type="hidden" name="hdnSectID<?php echo $i;?>" size="10" value="<?php echo $objResult["sect_id"];?>">
    	<input type="text" name="txtSectID<?php echo $i;?>" size="20" value="<?php echo $objResult["sect_id"];?>">
    </td>
    <td>
    	<input type="hidden" name="hdnSemester<?php echo $i;?>" size="10" value="<?php echo $objResult["semester"];?>">
    	<div align="center"><input type="text" name="txtSemester<?php echo $i;?>" size="10" value="<?php echo $objResult["semester"];?>"></div>
    </td>
    <td>
			<input type="hidden" name="hdnYear<?php echo $i;?>" size="10" value="<?php echo $objResult["year"];?>">
			<div align="center"><input type="text" name="txtYear<?php echo $i;?>" size="10" value="<?php echo $objResult["year"];?>"></div>
		</td>
    <td><div align="center"><input type="text" name="txtGrade<?php echo $i;?>" size="10" value="<?php echo $objResult["grade"];?>"></div></td>
	<!-- <td><div align="center"><input type="text" name="txtTimeslotID<?php echo $i;?>" size="15" value="<?php echo $objResult["timeslot_id"];?>"></div></td> -->
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