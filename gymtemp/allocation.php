<?php include('dbconnect.php');

?>

<div class="container-fluid">
<style>
	input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.5); /* IE */
  -moz-transform: scale(1.5); /* FF */
  -webkit-transform: scale(1.5); /* Safari and Chrome */
  -o-transform: scale(1.5); /* Opera */
  transform: scale(1.5);
  padding: 10px;
}
</style>
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>Allocation List</b>
						<!-- <span class=""> -->

							<!-- <button class="btn btn-primary btn-block btn-sm col-sm-2 float-right" type="button" id="new_member"> -->
					<!-- <i class="fa fa-plus"></i> New</button> -->
				<!-- </span> -->
					</div>
					<div class="card-body">
						
						<table class="table table-bordered table-condensed table-hover">
							<colgroup>
								<col width="5%">
								
								<col width="20%">
								<col width="25%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Customer name</th>
									<th class="">Trainer Name</th>
									
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<form action="manage-allocation" >
								<input type="hidden" id="a_id">
								<?php 
								$i = 1;
								$member =  $conn->query("SELECT * from tbl_customer ");
								while($row=$member->fetch_array()):
								?>
								<tr>
                                <td class="text-center"><?php echo $i++ ?></td>
									
									<td class="">
										 <p><b> <?php echo ucwords($row['Cust_fname']) ?></b></p>
										 
									</td>
									<td class="">
										 <p><b>
				<select name="id" class="custom-select select2" id="t_fname">
					<option value=""></option>
					<?php
						$qr = $conn->query("SELECT * FROM tbl_trainer order by t_fname asc");
						while($r= $qr->fetch_assoc()):
					?>
					<option value="<?php echo $r['t_id'] ?>" <?php echo isset($id) && $id == $row['t_id'] ? 'selected' : '' ?>><?php echo ucwords($r['t_fname']) ?></option>
					<?php endwhile; ?>
				</select>
			</div><!-- <?php echo ucwords($row['t_fname']) ?> --></b></p>
										 
									</td>
									
									<td class="text-center">
										<button class="btn btn-sm btn-outline-primary " type="button" name="save" >Save</button>
										<button class="btn btn-sm btn-outline-primary edit_allocation" type="button" data-a_id="<?php echo $row['a_id'] ?>" >Edit</button>
										<button class="btn btn-sm btn-outline-danger delete_allocation" type="button" data-a_id="<?php echo $row['a_id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?></form>
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
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	
	/* $('#manage-allocation').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=sallocation',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp == 1){
					alert_toast("Data successfully saved.",'success')
					setTimeout(function(){
						location.reload()
					},1000)
				}else if(resp == 2){
					$('#msg').html('<div class="alert alert-danger">ID No already existed.</div>')
					end_load();
				}
			}
		})
	})
	$('.edit_allocation').click(function(){
		start_load()
		var cat = $('#manage-allocation')
		cat.get(0).reset()
		cat.find("[name='a_id']").val($(this).attr('data-a_id'))
		cat.find("[name='Cust_fname']").val($(this).attr('data-Cust_fname'))
		cat.find("[name='t_fname']").val($(this).attr('data-'))
		end_load()
	})
	$('.delete_service').click(function(){
		_conf("Are you sure to delete this service?","delete_service",[$(this).attr('data-ser_id')])
	})
</script> */
	
 <?php
	if(isset($_POST['save']))
	{
		echo"working";
		$t_fname=$_POST['t_fname'];
		$sql="INSERT INTO  tbl_allocation (Cust_fname,t_fname) VALUES('$member','$t_fname')";
		$r=$conn->query($sql);
		}
		else
		echo "not";
		?>