<?php 
include('dbconnect.php');
session_start();
 if(isset($_GET['Emp_ID'])){
$user = $conn->query("SELECT * FROM tbl_employee where Emp_ID =".$_GET['Emp_ID']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
} 
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	
	<form action=""  id="manage-user">	
		<input type="hidden" name="Emp_ID" value="<?php echo isset($meta['Emp_ID']) ? $meta['Emp_ID']: '' ?>"  >
		<div class="form-group">
			<label for="username">Username</label>
			<input type="email" name="Username" id="Username" class="form-control" required value="<?php echo isset($meta['Username']) ? $meta['Username']: '' ?>"  >
		</div>
		<div class="form-group">
			<label for="name">First Name</label>
			<input type="text" name="Emp_fname" id="Emp_fname" class="form-control" required value="<?php echo isset($meta['Emp_fname']) ? $meta['Emp_fname']: '' ?>"  >
		</div>
		<div class="form-group">
			<label for="name">Last Name</label>
			<input type="text" name="Emp_lname" id="Emp_lname" class="form-control" required value="<?php echo isset($meta['Emp_lname']) ? $meta['Emp_lname']: '' ?>" >
		</div>
		<div class="form-group">
			<label for="name">Phno</label>
			<input type="text" name="Emp_Phno" id="Emp_Phno" maxlength=10 pattern=[0-9]{10} title="enter 10 digits" required=" " class="form-control" value="<?php echo isset($meta['Emp_Phno']) ? $meta['Emp_Phno']: '' ?>" >
		</div>
		<div class="form-group">
			<label for="name">City</label>
			<input type="text" name="Emp_City" id="Emp_City" class="form-control" value="<?php echo isset($meta['Emp_City']) ? $meta['Emp_City']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="Password" id="Password" class="form-control" required  >
		
		</div>
		
			</form>
		
</div>
<script>
	
	$('#manage-user').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_user',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}else{
					$('#msg').html('<div class="alert alert-danger">please insert valid values</div>')
					end_load()
				}
			}
		})
	})

</script>