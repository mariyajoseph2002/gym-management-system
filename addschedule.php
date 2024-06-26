<!DOCTYPE html>
<html>
<head>
	<title> schedule| PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
<img  src="adminthings/gym11.jpg" width="1400px" height="300px" >
<div class="dispaly-container">
	<form method="POST">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3">
			
					<hr class="mb-3">
					<label for="sch_slot"><b>Slot start time</b></label>
					<input class="form-control" id="slot_start" type="text" name="slot_start" required><br>

					<label for="Emp_lname"><b>Slot end time</b></label>
					<input class="form-control" id="slot_last"  type="text" name="slot_last" required><br>
				
					
					
					<!-- <label for="password"><b>Password</b></label> -->
					<!-- <input class="form-control" id="password"  type="password" name="password" required> -->
					<hr class="mb-3">
					<input class="btn btn-primary" type="submit" id="register" name="create" value="Submit">
				</div>
			</div>
		</div>
	</form>
</div>
<?php
include('useraccount/dbconnect.php');

if(isset($_POST['create'])){
	//extract($_POST);

	$slot_start=$_POST['slot_start'];
	$slot_last=$_POST['slot_last'];
	
	$sql= "INSERT INTO tbl_schedule(slot_start,slot_last) VALUES('$slot_start','$slot_last')";
	//$stmtinsert = $db->prepare($sql);
	$result= mysqli_query($conn,$sql);
	// insert($sql);
if($result)
	{
		echo "successfully saved";
	}else{
		echo "there were errors while saving the data";
	}
}
?>