<?php
include('dbconnect.php');
if(isset($_GET['sch_id'])){
	$schid = $_GET['sch_id'];
	$user = $conn->query("SELECT * FROM tbl_schedule where  sch_id=".$_GET['sch_id']);
	foreach($user->fetch_array() as $k =>$v){
		$meta[$k] = $v;
	} 
	}
?><!DOCTYPE html>
<html>
<head>
	<title> schedule| PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
<!-- <img  src="adminthings/gym11.jpg" width="1400px" height="300px" > -->
<div class="dispaly-container">
	<form method="POST" id="new_sch">
		<div class="container">
			<div class="col-md-12">
			<div class="row">
				<div class="col-sm-3">
                <input type="hidden" name="sch_id" value="<?php echo isset($meta['sch_id']) ? $meta['sch_id']: '' ?>" >
					<hr class="mb-3">
                    <div class="form-group">

					   <label  class="control-label" for="sch_slot"><b>Slot </b></label>
					   <input class="form-control" id="sch_slot"  type="text" name="sch_slot" value="<?php echo isset($meta['sch_slot']) ? $meta['sch_slot']: '' ?>"required><br>
                      </div>
</div>
<!-- 				
<input class="btn btn-primary" type="submit" id="add" name="create" value="Submit"> -->
					
					<!-- <label for="password"><b>Password</b></label> -->
					<!-- <input class="form-control" id="password"  type="password" name="password" required> -->
					
				</div>
			</div>
		</div>
	</form>
</div>
</html>
<!-- <?php
 /* include('dbconnect.php');
if(isset($_POST['create'])){
	echo "yes";
	$sch_slot=$_POST['sch_slot'];
	$save = mysqli_query($conn,"UPDATE tbl_schedule SET sch_slot='$sch_slot'");
}
else
echo "y"; */
?>  -->
  <script>
	
	$('#new_sch').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_sch',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}else{
					$('#msg').html('<div class="alert alert-danger">error</div>')
					end_load()
				}
			}
		})
	})

</script>  