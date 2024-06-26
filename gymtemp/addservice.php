
<!DOCTYPE html>
<html>
<head>
	<title>service | PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
<img  src="assets/img/gym11.jpg" width="1400px" height="300px" >
<div class="dispaly-container">
	<form action="" method="POST" id="addservice">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3">
			
					<hr class="mb-3">
					<label for="ser_name"><b>Service Name</b></label>
					<input class="form-control" id="ser_name" type="text" name="ser_name" value="<?php echo isset($meta['ser_name']) ? $meta['ser_name']: '' ?>"><br>

					<label for="duration"><b>Duration</b></label>
					<input class="form-control" id="duration"  type="text" name="duration" value="<?php echo isset($meta['duration']) ? $meta['duration']: '' ?>"required><br>
				
					
			
			
					<label for="price"><b>Price</b></label>
					<input class="form-control" id="price"  type="text" name="price"value="<?php echo isset($meta['price']) ? $meta['price']: '' ?>" required><br>
                   

					<!-- <label for="password"><b>Password</b></label> -->
					<!-- <input class="form-control" id="password"  type="password" name="password" required> -->
					<hr class="mb-3">
					 <!-- <input class="btn btn-primary" type="submit" id="register" name="create" value="Submit">  -->
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	
	$('#addservice').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_service',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}else{
					$('#msg').html('<div class="alert alert-danger"></div>')
					end_load()
				}
			}
		})
	})

</script>
