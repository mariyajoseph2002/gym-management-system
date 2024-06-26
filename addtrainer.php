
<!DOCTYPE html>
<html>
<head>
	<title>employee | PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
<img  src="adminthings/gym8.jpg" width="1500px" height="400px" >
<div class="dispaly-container">
	<form  method="post">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3">
			
					<hr class="mb-3">
					<label for="t_fname"><b>First Name</b></label>
					<input class="form-control" id="t_fname" type="text" name="t_fname" required><br>

					<label for="t_lname"><b>Last Name</b></label>
					<input class="form-control" id="t_lname"  type="text" name="t_lname" required><br>
				
					
					<label for="Username"><b>Email</b></label>
					<input class="form-control" id="Username"  type="text" name="Username" required><br>
			
					<label for="t_phno"><b>Phone Number</b></label>
					<input class="form-control" id="t_phno"  type="text" name="t_phno" required><br>
                    <label for="t_place"><b>Place</b></label>
					<input class="form-control" id="t_place"  type="text" name="t_place" required><br>
					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required><br>
				

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
	$t_fname=$_POST['t_fname'];
	$t_lname=$_POST['t_lname'];
	$Username=$_POST['Username'];
	$t_phno=$_POST['t_phno'];
	$t_place=$_POST['t_place'];
	$password=$_POST['password'];
	$q="SELECT * FROM login WHERE Username='$Username'";
	$res=mysqli_query($conn,$q);
	$r=mysqli_fetch_all($res,MYSQLI_ASSOC);
	if(sizeof($r)>0)
	{
		alert("Username already taken");
	}
	else{
	$sql="INSERT INTO tbl_trainer(Username,t_fname,t_lname,t_phno,t_place,Password) VALUES('$Username','$t_fname','$t_lname','$t_phno','$t_place','$password')";
	//$stmtinsert = $db->prepare($sql);
	$result= mysqli_query($conn,$sql);
	if($result)
	{
		echo "successfully saved";
	}else{
		echo "there were errors while saving the data";
	}
}
}
?>