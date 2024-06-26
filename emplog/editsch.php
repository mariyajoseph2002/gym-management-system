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
					   <input class="form-control" id="editsch_slot"  type="text" name="sch_slot" required><br>
                      </div>
</div>
				
<input class="btn btn-primary" type="submit" id="add" name="edit" value="Submit">
	
</div>
			</div>
		</div>
	</form>
    <?php include('dbconnect.php');
//session_start();
include('../connection.php');
if (isset($_POST['edit'])) {
	/* echo "yes";
	extract($_POST); */
	$sch_slot=$_POST['editsch_slot'];
	$q="update tbl_schedule set sch_slot='$sch_slot' where sch_id='$sch_id'";
	update($q);
	 alert('sucessfully');
  return redirect('schedule.php');

}

?>   