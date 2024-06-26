

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
	<form method="POST">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3">
			
					<hr class="mb-3">
					<label for="Emp_fname"><b>First Name</b></label>
					<input class="form-control" id="Emp_fname" type="text" name="Emp_fname" required><br>

					<label for="Emp_lname"><b>Last Name</b></label>
					<input class="form-control" id="Emp_lname"  type="text" name="Emp_lname" required><br>
				
					
					<label for="Username"><b>Email</b></label>
					<input class="form-control" id="Username"  type="text" name="Username" required><br>
			
					<label for="Emp_Phno"><b>Phone Number</b></label>
					<input class="form-control" id="Emp_Phno"  type="text" name="Emp_Phno" required><br>
                    <label for="Emp_City"><b>City</b></label>
					<input class="form-control" id="Emp_City"  type="text" name="Emp_City" required>

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

if(isset($_POST['create']))
{
	//extract($_POST);

	$Emp_fname=$_POST['Emp_fname'];
	$Emp_lname=$_POST['Emp_lname'];
	$Username=$_POST['Username'];
	$Emp_Phno=$_POST['Emp_Phno'];
	$Emp_City=$_POST['Emp_City'];
	//extract($_POST);
	$password=$_POST['password'];
	$q="SELECT * FROM login WHERE Username='$Username'";
	$res=mysqli_query($conn,$q);
	$r=mysqli_fetch_all($res,MYSQLI_ASSOC);
	if(sizeof($r)>0)
	{
		alert("Username already taken");
	}
	else{
	$sql= "INSERT INTO tbl_employee(Username,Emp_fname,Emp_lname,Emp_Phno,Emp_City) VALUES('$Username','$Emp_fname','$Emp_lname','$Emp_Phno','$Emp_City')";
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
}
?>

	</body>
	</html>