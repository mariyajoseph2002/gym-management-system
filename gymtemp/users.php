<?php 
include('dbconnect.php');
/* if(isset($_GET['id']))
{
    extract($_GET);
    $q="update tbl_employee Login_Status='0' where Emp_ID='$id'";
	$ret = mysqli_query($conn ,$q);
	$result = mysqli_fetch_array($ret);
    if($result > 0) 
	{
		header('location: users.php');}
else{
	echo "invalid";
	}
 
}

if(isset($_GET['uid']))
{
    extract($_GET);
    $q="update tbl_employee set Login_Status='1' where Emp_ID='$uid'";
    $ret = mysqli_query($conn ,$q);
	$result = mysqli_fetch_array($ret);
    if($result > 0) 
	{header('location: users.php');}
else{
	echo "mariya";
	}
}  */
?>

<div class="container-fluid">
	
	<div class="row">
	<div class="col-lg-12">
		<p><b>Employee List</p>
			<!-- <button class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> New Employee</button>  -->
	</div>
	</div> 

	<br>
	 <div class="col-md-4">
		<div class="row">
		<div class="container-fluid">
	<div id="msg"></div>
	
	<form action=""  id="manage-user">	
		<input type="hidden" name="Emp_ID"   >
		<div class="form-group">
			<label for="username">Username</label>
			<input type="email" name="Username" id="Username" class="form-control" required   >
		</div>
		<div class="form-group">
			<label for="name">First Name</label>
			<input type="text" name="Emp_fname" id="Emp_fname"  class="form-control" required   >
		</div>
		<div class="form-group">
			<label for="name">Last Name</label>
			<input type="text" name="Emp_lname" id="Emp_lname" class="form-control" required  >
		</div>
		<div class="form-group">
			<label for="name">Phno</label>
			<input type="text" name="Emp_Phno" id="Emp_Phno" maxlength=10 pattern=[0-9]{10} title="enter 10 digits" required=" " class="form-control"  >
		</div>
		<div class="form-group">
			<label for="name">City</label>
			<input type="text" name="Emp_City" id="Emp_City" class="form-control"  required>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="Password" id="Password" maxlength=6 pattern=[0-9]{6} title="not valid password" class="form-control" required  >
		
		</div>
		<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-primary col-sm-3 " type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
			</form>
		
</div>
</div>
</div>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<form>
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Username</th>
					<th class="text-center">Name</th>
					
					<th class="text-center">Phno</th>
					<th class="text-center">Active/inactive</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'dbconnect.php';
 					// $type = array("","Admin","Staff","Alumnus/Alumna");
 					$users = $conn->query("SELECT * FROM tbl_employee order by Emp_fname asc");
 					$i = 1;
 					while($row= $users->fetch_array()):
				 ?>
				 <tr>
				 	<td class="text-center">
				 		<?php echo $i++ ?>
				 	</td>
					 <td>
				 		<?php echo $row['Username'] ?>
				 	</td>
				 	<td>
				 		<?php echo ucwords($row['Emp_fname']) ?>
						 <?php echo ucwords($row['Emp_lname']) ?>
				 	</td>
				 	
				 	
				 	<td>
				 		<?php echo $row['Emp_Phno'] ?>
				 	</td>
					
					 	<td class="text-center">
                    <?php 
                        if($row['Login_Status']=="1")
                            { ?>
                            <a href="eupdate.php?id=<?php echo $row['Emp_ID']?>&y=d" class="btn btn-danger btn-sm">De-activate</a>
                    <?php   }
                    else
					{ 
						?>
                        <a href="eupdate.php?id=<?php echo $row['Emp_ID']?>&y=a" class="btn btn-success btn-sm">Activate</a>
                
				<?php    
				}
                     ?>  
					 </td>
				 	<td>
				 		<center>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary">Action</button>
								  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
					
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_user"  data-Emp_ID= '<?php echo $row['Emp_ID'] ?>' data-Username="<?php echo $row['Username'] ?>" data-Emp_fname="<?php echo $row['Emp_fname'] ?>"data-Emp_lname="<?php echo $row['Emp_lname'] ?>" data-Emp_Phno="<?php echo $row['Emp_Phno'] ?>" data-Emp_City="<?php echo $row['Emp_City'] ?>" data-Password="<?php echo $row['Password'] ?>">Edit</a>
								  <!--   <div class="dropdown-divider"></div>
								    <a class="dropdown-item delete_user" href="javascript:void(0)" data-Emp_ID = '<?php echo $row['Emp_ID'] ?>'>Delete</a>
								  </div> -->
								</div>
								</center>
				 	</td>
				 </tr>
				<?php endwhile; ?>
			</tbody>
			</form>
		</table>
			</div>
		</div>
	</div>

</div>
<script>
	$('table').dataTable();
/* $('#new_user').click(function(){
	uni_modal('New Employee','manage_user.php')
})
$('.edit_user').click(function(){
	uni_modal('Edit User','manage_user.php?Emp_ID='+$(this).attr('data-Emp_ID'))
}) */
function _reset(){
		$('#manage-user').get(0).reset()
		$('#manage-user input,#manage-user textarea').val('')
	}
	$('#manage-user').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_user',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else
				 alert_toast("pls insert valid inputs")
			}
		})
	})
	$('.edit_user').click(function(){
		start_load()
		var cat = $('#manage-user')
		cat.get(0).reset()
		cat.find("[name='Emp_ID']").val($(this).attr('data-Emp_ID'))
		cat.find("[name='Username']").val($(this).attr('data-Username'))
		cat.find("[name='Emp_fname']").val($(this).attr('data-Emp_fname'))
		cat.find("[name='Emp_lname']").val($(this).attr('data-Emp_lname'))
		cat.find("[name='Emp_Phno']").val($(this).attr('data-Emp_Phno'))
		cat.find("[name='Emp_City']").val($(this).attr('data-Emp_City'))
		end_load()
	})
$('.delete_user').click(function(){
		_conf("Are you sure to delete this user?","delete_user",[$(this).attr('data-Emp_ID')])
	})
	function delete_user($Emp_ID){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_user',
			method:'POST',
			data:{Emp_ID:$Emp_ID},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>