<?php include('dbconnect.php');
if(isset($_GET['id']))
{
    extract($_GET);
    $q="update tbl_customer Login_Status='0' where Cust_ID='$id'";
	$ret = mysqli_query($conn ,$q);
	$result = mysqli_fetch_array($ret);
    if($result > 0) 
	{
		header('location:members.php');}
else{
	echo "invalid";
	}
 
}

if(isset($_GET['uid']))
{
    extract($_GET);
    $q="update tbl_customer set Login_Status='1' where Cust_ID='$uid'";
    $ret = mysqli_query($conn ,$q);
	$result = mysqli_fetch_array($ret);
    if($result > 0) 
	{header('location: members.php');}
else{
	echo "mariya";
	}
} 
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
						<b>Customer List</b>
						<!-- <span class=""> -->
						<span class="">
						<!--  <button class="btn btn-primary btn-block btn-sm col-sm-2 float-right" type="button" id="new_member"> -->
				<!-- 	 <i class="fa fa-plus"></i> New</button> -->
				 </span>
					</div>

			<div class="card-body">
				
						<table class="table table-bordered table-condensed table-hover">
							<colgroup>
								<col width="5%">
								<col width="15%">
								<col width="20%">
								<col width="20%">
								<col width="20%">
								<col width="25%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Customer ID</th>
									<th class="">First Name</th>
									<th class="">Last Name</th>
									<th class="">Email</th>
									<th class="">Contact</th>
									

									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$member =  $conn->query("SELECT * from tbl_customer ");
								while($row=$member->fetch_array()):
								?>
								<form >
								<tr>
									
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										 <p><b><?php echo $row['Cust_ID'] ?></b></p>
										 
									</td>
									<td class="">
										 <p><b><?php echo ucwords($row['Cust_fname']) ?></b></p>
										 
									</td>
									<td class="">
										 <p><b><?php echo ucwords($row['Cust_lname']) ?></b></p>
										 
									</td>
									<td class="">
										 <p><b><?php echo $row['Username'] ?></b></p>
									</td>
									<td class="">
										 <p><b><?php echo $row['Cust_Phno'] ?></b></p>
										 
									</td>
									

									<td class="text-center">
									<!-- <td><?php echo $row['Login_Status'] ?></td> -->
                    <?php 
                        if($row['Login_Status']=="1")
                            { ?>
                            <a href="update.php?id=<?php echo $row['Cust_ID']?>&y=d" class="btn btn-danger btn-sm">De-activate</a>
                    <?php   }
                    else
					{ 
						?>
                        <a href="update.php?id=<?php echo $row['Cust_ID']?>&y=a" class="btn btn-success btn-sm">Activate</a>
                
				<?php    
				}
                     ?> 
										<!-- <button class="btn btn-sm btn-outline-primary view_member" type="button" data-id="<?php echo $row['Cust_ID'] ?>" >View</button>
										<button class="btn btn-sm btn-outline-primary edit_member" type="button" data-id="<?php echo $row['Cust_ID'] ?>" >Edit</button> -->
										<!-- <button class="btn btn-sm btn-outline-danger delete_member" type="button" data-id="<?php echo $row['Cust_ID'] ?>">Delete</button> -->
									</td>
									<td>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
			</form>
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
	$(document).ready(function(){
		$('table').dataTable()
	})
$('#new_member').click(function(){
		uni_modal("<i class='fa fa-plus'></i> New Member","manage_member.php",'mid-large')
 })
	$('.view_member').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> Member Details","view_member.php?id="+$(this).attr('data-id'),'large')
		
	})
	$('.edit_member').click(function(){
		uni_modal("<i class='fa fa-edit'></i> Manage Member Details","manage_member.php?id="+$(this).attr('data-id'),'mid-large')
		
	})
	$('.delete_member').click(function(){
		_conf("Are you sure to delete this customer?","delete_member",[$(this).attr('data-Cust_ID')],'mid-large')
	})

	function delete_member($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_member',
			method:'POST',
			data:{id:$id},
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