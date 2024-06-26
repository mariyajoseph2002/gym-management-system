<?php include('dbconnect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-plan">
				<div class="card">
					<div class="card-header">
						    Service Form
				  	</div>
					<div class="card-body">
							<input type="hidden"  name="ser_id">
							<!-- <div class="form-group"> 
								<label class="control-label">Service Name</label>
								<input type="number" class=" text-right" id="ser_name" type="text" name="ser_name"   >
							 </div> -->
	 
							 <div class="form-group"> 
							 <label class="control-label"><b>Service Name</b></label>
							 <input class="form-control" id="ser_name" type="text" name="ser_name" required><br>
							</div>
							<div class="form-group">		
								<label class="control-label"><b>Duration(days)</b></label>
								<input class="form-control" id="duration"  type="text" name="duration" required><br>
							</div>
							<div class="form-group">
								<label class="control-label"><b>Price</b></label>
								<input class="form-control" id="price"  type="text" name="price" required><br>
							</div>
							<!--  <div class="form-group">
								<label class="control-label">Amount</label>
								<input type="number" class="form-control text-right" step="any" name="amount">
							</div>-->
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-primary col-sm-3 " type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		    </div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="row">
				<div class="card col-lg-12">
					<div class="card-body">
						<b>Service List</b>
						<!--  <span class="float:right"><button class="btn btn-primary btn-block btn-sm col-sm-2 float-right"  id="addservice">
					<i class="fa fa-plus"></i> New Entry-->
				<!-- </button></span> -->
					</div>
					<div class="card-body">
						<table class="table table-bordered table-condensed table-hover">
							<colgroup>
								<col width="5%">
								<col width="15%">
								<col width="20%">
								<col width="20%">
								<col width="20%">
								
								
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Service</th>
									<th class="text-center">Duration</th>
									<th class="text-center">Amount</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$plan = $conn->query("SELECT * FROM tbl_service order by ser_id asc");
								//$plan = $conn->query("SELECT * FROM tbl_service
								while($row=$plan->fetch_array()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p><b><?php echo $row['ser_name'] ?></p>
									</td>
									<td class="">
										<p><b><?php echo $row['duration'] ?></p>
									</td>
									<td class="text-right">
										<b><?php echo number_format($row['price'],2) ?></b>
									</td>
									<td class="text-center">
									<!-- <button class="btn btn-sm btn-primary view_plan" type="button" data-ser_id="<?php echo $row['ser_id'] ?>" >View</button> -->
										<button class="btn btn-sm btn-primary edit_service" type="button" data-ser_id="<?php echo $row['ser_id'] ?>" data-ser_name="<?php echo $row['ser_name'] ?>" data-duration="<?php echo $row['duration'] ?>"data-price="<?php echo $row['price'] ?>">Edit</button>
<!-- 										<button class="btn btn-sm btn-danger delete_service" type="button" data-ser_id="<?php echo $row['ser_id'] ?>">Delete</button> -->
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
</style>
<script>
	
	
	/*  $('table').dataTable();
	$('#addservice').click(function(){
		uni_modal('Adds Service','addservice.php')
	})
	function _reset(){
		$('#addservice').get(0).reset()
		$('#addservice input,#addservice textarea').val('')
	}

	$('#addservice').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_service',
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
			}
		})
	})*/
	function _reset(){
		$('#manage-plan').get(0).reset()
		$('#manage-plan input,#manage-plan textarea').val('')
	}
	$('#manage-plan').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_service',
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
				 alert_toast("service name already exist,refresh the page to continue")
			}
		})
	})
	$('.edit_service').click(function(){
		start_load()
		var cat = $('#manage-plan')
		cat.get(0).reset()
		cat.find("[name='ser_id']").val($(this).attr('data-ser_id'))
		cat.find("[name='ser_name']").val($(this).attr('data-ser_name'))
		cat.find("[name='duration']").val($(this).attr('data-duration'))
		cat.find("[name='price']").val($(this).attr('data-price'))
		end_load()
	})
	$('.delete_service').click(function(){
		_conf("Are you sure to delete this service?","delete_service",[$(this).attr('data-ser_id')])
	})
	function delete_service($ser_id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_service',
			method:'POST',
			data:{ser_id:$ser_id},
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