<?php include('dbconnect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-trainer">
				<div class="card">
					<div class="card-header">
						    Trainer Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="t_id">
							<div class="form-group">
								<label class="control-label">Email</label>
								<input type="email" class="form-control" name="Username" id="Username">
							</div>
							<div class="form-group">
								<label class="control-label">First Name</label>
								<input type="text" class="form-control" name="t_fname" id="t_fname">
							</div>
							<div class="form-group">
								<label class="control-label">Last Name</label>
								<input type="text" class="form-control" name="t_lname" id="t_lname">
							</div>
							<div class="form-group">
								<label class="control-label">Contact</label>
								<input type="text" class="form-control" title="enter 10 digits"  pattern="[0-9]{10}" maxlength=10 name="t_phno" id="t_phno">
							</div>
							<div class="form-group">
								<label class="control-label">Place</label>
								<input type="text" class="form-control" name="t_place" >
							</div>
							<div class="form-group">
								<label class="control-label">Password</label>
								<input type="password" class="form-control" name="Password">
							</div>
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3" name="submit"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<b>List of Trainers</b>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
								
									<th class="text-center">Information</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$trainer = $conn->query("SELECT t_id,Username,t_fname,t_lname,t_phno,t_place,Login_Status FROM tbl_trainer order by t_id asc");
								while($row=$trainer->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
									<p><small><i class="fa fa-at"></i> <b><?php echo $row['Username'] ?></b></small></p>
										<p><i class="fa fa-user"></i> <b><?php echo $row['t_fname'] ?></b></p>
										<p><i class="fa fa-user"></i> <b><?php echo $row['t_lname'] ?></b></p>

										<p><small><i class="fa fa-phone-square-alt"></i> <b><?php echo $row['t_phno'] ?></b></small></p>
										<p><small><i class="fa fa-money-bill"></i> <b><?php echo $row['t_place'] ?></b></small></p>
										
									</td>
									<td class="text-center">
									<!-- <td><?php echo $row['Login_Status'] ?></td> -->
                    <?php 
                        if($row['Login_Status']=="1")
                            { ?>
                            <a href="tupdate.php?id=<?php echo $row['t_id']?>&y=d" class="btn btn-danger btn-sm">De-activate</a>
                    <?php   }
                    else
					{ 
						?>
                        <a href="tupdate.php?id=<?php echo $row['t_id']?>&y=a" class="btn btn-success btn-sm">Activate</a>
                
				<?php    
				}
                     ?> 
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_trainer" type="button" data-t_id="<?php echo $row['t_id'] ?>" data-Username="<?php echo $row['Username'] ?>" data-t_fname="<?php echo $row['t_fname'] ?>"data-t_lname="<?php echo $row['t_lname'] ?>" data-t_phno="<?php echo $row['t_phno'] ?>" data-t_place="<?php echo $row['t_place'] ?>" >Edit</button>
										<!-- <button class="btn btn-sm btn-danger delete_trainer" type="button" data-t_id="<?php echo $row['t_id'] ?>">Delete</button> -->
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin:unset;
	}
</style>
<script>
	function _reset(){
		$('#manage-trainer').get(0).reset()
		$('#manage-trainer input,#manage-trainer textarea').val('')
	}
	$('#manage-trainer').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_trainer',
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
				alert_toast("something")
			}
		})
	})
	$('.edit_trainer').click(function(){
		start_load()
		var cat = $('#manage-trainer')
		cat.get(0).reset()
		cat.find("[name='t_id']").val($(this).attr('data-t_id'))
		cat.find("[name='Username']").val($(this).attr('data-Username'))
		cat.find("[name='t_fname']").val($(this).attr('data-t_fname'))
		cat.find("[name='t_lname']").val($(this).attr('data-t_lname'))
		cat.find("[name='t_phno']").val($(this).attr('data-t_phno'))
		cat.find("[name='t_place']").val($(this).attr('data-t_place'))
		cat.find("[name='Password']").val($(this).attr('data-Password'))
		end_load()
	})
	$('.delete_trainer').click(function(){
		_conf("Are you sure to delete this trainer?","delete_trainer",[$(this).attr('data-t_id')])
	})
	function delete_trainer($t_id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_trainer',
			method:'POST',
			data:{t_id:$t_id},
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
	$('table').dataTable()
</script>