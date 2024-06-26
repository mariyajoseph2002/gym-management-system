<?php 

include('dbconnect.php');

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

	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height:150px;
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
								<col width="20%">
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
								
								<?php 
								$i = 1;
								$member =  $conn->query("SELECT * from tbl_customer inner join tbl_mcart on tbl_customer.Cust_ID=tbl_mcart.Cust_ID where tbl_mcart.cart_status='paid'");
								while($row = mysqli_fetch_array($member)):
									
								?>
								
								<tr>
                                <td class="text-center"><?php echo $i++ ?></td>
								<input type="hidden" name="cid" id="cid<?php echo $i;?>" value="<?php echo $row['Cust_ID']?>">
									<td class="">
										 <p><b><?php echo ucwords($row['Cust_fname']) ?></b></p>
										 
									</td>
									<td class="">
										 
				<select name="tid" id="tid<?php echo $i;?>" class="custom-select select2" id="t_fname">
					<?php
						$qr = $conn->query("SELECT * FROM tbl_trainer order by t_fname asc");
						while($r = mysqli_fetch_array($qr)){
							$cid = $row['Cust_ID'];
							$qry = $conn->query("SELECT t_id FROM tbl_allocation WHERE Cust_id = $cid");
							// var_dump($qry);
							// die();
							$r2 = mysqli_fetch_array($qry);
							$id = $r2['t_id'];

					?>
					<option value="<?php echo $r['t_id'] ?>" <?php echo isset($id) && ($id == $r['t_id'] ) ? 'selected' : '' ?>><?php echo ucwords($r['t_fname']) ?></option>
					<?php } ?>	
				</select>
				
			</div>
		 
				 
									</td>
									
									<td class="text-center">
															
										<button class="btn btn-sm btn-outline-primary" type="submit" name="save" onclick="prcess('tid<?php echo $i;?>','cid<?php echo $i;?>')">Save</button>
										<button class="btn btn-sm btn-outline-primary edit_member" type="submit" name="edit">Edit</button>
										
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
	<script>
			
			
			function prcess(tid,cid){
				const cid1 = document.getElementById(cid).value;
				console.log(cid1);
				const tid1 = document.getElementById(tid).value;
				console.log(tid1);
				window.location.replace('allocprocess.php?cid='+cid1+'&tid='+tid1);
			}
		</script>
	 <?php
	if(isset($_POST['save']))
	{
		
		  echo "saved";
		}
		?> 