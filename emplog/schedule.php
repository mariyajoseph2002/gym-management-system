<?php include('dbconnect.php');
//session_start();
include('../connection.php');
/* 
if (isset($_GET['sch_id'])) {
	extract($_GET);

	 $q="select * from tbl_schedule where sch_id='$sch_id'";
	$res=select($q);

}
if (isset($_POST['edit'])) {
	/* echo "yes";
	extract($_POST); */
	/* $sch_slot=$_POST['sch_slot'];
	$q="update tbl_schedule set sch_slot='$sch_slot' where sch_id='$sch_id'";
	update($q);
	 alert('sucessfully'); */ 
 // return redirect('schedule.php');

//}

?>
<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
				
					<form method="POST" action="" id="new_sch">
		<div class="container">
			<div class="col-md-12">
			<div class="row">
				<div class="col-sm-3">
                <input type="hidden" name="sch_id" >
					<hr class="mb-3">
                    <div class="form-group">
					
					   <label  class="control-label" for="sch_slot"><b>Slot </b></label>
					   <input class="form-control" id="sch_slot"  type="text" name="sch_slot" required><br>
				
                      </div>
</div>
				
<input class="btn btn-primary" type="submit" id="add" name="create" value="Submit">
					
					<!-- <label for="password"><b>Password</b></label> -->
					<!-- <input class="form-control" id="password"  type="password" name="password" required> -->
					
				</div>
			</div>
		</div>
	</form>
			<div class="card-body">
						<form>
						<table class="table table-bordered table-condensed table-hover">
							<colgroup>
								<col width="5%">
								<col width="15%">
								<col width="15%">
								
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Schedule slot</th>
									<th class="">Action</th>
									</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$member =  $conn->query("SELECT * from tbl_schedule ");
								while($row=$member->fetch_array()):
								?>
								<tr>
									
									<td class="text-center"><?php echo $i++ ?></td>
									<!-- td class="">
										 <p><b><?php echo $row['sch_id'] ?></b></p>
										 
									</td> -->
									
									<td class="">
										 <p><b><?php echo ucwords($row['sch_slot']) ?></b></p>
										 
									</td>
									<td class="text-center">
										<!--  <button class="btn btn-sm btn-outline-primary view_member" type="button" data-sch_id="<?php echo $row['sch_id'] ?>" >View</button>-->
										<!--  <form > <input class="btn btn-sm btn-outline-primary edit_sch" value="Edit" name="edit" type="button" data-sch_id="<?php echo $row['sch_id'] ?>" data-sch_slot="<?php echo $row['sch_slot'] ?>"></button> </form>  -->
<!-- 										<button class="btn btn-sm btn-outline-danger delete_sch"  href="javascript:void(0)" type="button" data-sch_id="<?php echo $row['sch_id'] ?>">Delete</button> -->
<!-- <a class="btn btn-success" href="?sch_id=<?php echo $row['sch_id'] ?>">Update</a> -->
 <td align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"> 

									</td>
									</tr>
								<?php endwhile; 
								?>
							</tbody>
								</form>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>	
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
	.avatar {
	    display: flex;
	    border-radius: 100%;
	    width: 100px;
	    height: 100px;
	    align-items: center;
	    justify-content: center;
	    border: 3px solid;
	    padding: 5px;
	}
	.avatar img {
	    max-width: calc(100%);
	    max-height: calc(100%);
	    border-radius: 100%;
	}
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
a.fc-daygrid-event.fc-daygrid-dot-event.fc-event.fc-event-start.fc-event-end.fc-event-past {
    cursor: pointer;
}
a.fc-timegrid-event.fc-v-event.fc-event.fc-event-start.fc-event-end.fc-event-past {
    cursor: pointer;
}
</style>
 <script>
	 
 	/* $('#new_schedule').click(function(){
		uni_modal('New Schedule','manage_schedule2.php')
	}) */
	  $('.edit_sch').click(function(){
		start_load()
		var cat = $('#new_sch')
		cat.get(0).reset()
		cat.find("[name='sch_id']").val($(this).attr('data-sch_id'))
		cat.find("[name='sch_slot']").val($(this).attr('data-sch_slot'))
		
 
	/* 	 $.ajax({
			url:'ajax.php?action=save_sch',
			method:'POST',
			data:{sch_id:$sch_id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})  */ 
	 end_load()
	}) 

$('.delete_sch').click(function(){
		_conf("Are you sure to delete this schedule?","delete_sch",[$(this).attr('data-sch_id')])
	})
	function delete_sch($sch_id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_sch',
			method:'POST',
			data:{sch_id:$sch_id},
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
	<?php
 include('dbconnect.php');
 $id=$_SESSION['id'];
if(isset($_POST['create'])){
	// echo "yes";
	$sch_slot=$_POST['sch_slot'];

	$save = mysqli_query($conn,"INSERT INTO tbl_schedule(sch_slot,Emp_ID) VALUES('$sch_slot','$id')");
}
else
// echo "y";
?> 