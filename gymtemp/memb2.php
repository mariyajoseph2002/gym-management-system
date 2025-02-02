<?php include('dbconnect.php');?>

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
						<b>Member List</b>
						<span class="">
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
								<col width="20%">
                                <col width="20%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class=""> ID</th>
									<th class="">Name</th>
									<th class="">Email</th>
									<th class="">Contact</th>
                                    <th class="">Username</th>
                                    <th class="">Report</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
                              
								<?php 
								$i = 1;
								$member =  $conn->query("SELECT * from tbl_customer ");
								while($row=$member->fetch_assoc()):
								?>
								<tr>
									
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										 <p><b><?php echo $row['Cust_ID'] ?></b></p>
										 
									</td>
									<td class="">
										 <p><b><?php echo ucwords($row['Cust_fname']) ?></b></p>
										 
									</td>
									<td class="">
										 <p><b><?php echo $row['Cust_lname'] ?></b></p>
									</td>
                                    <td class="">
										 <p><b><?php echo $row['Username'] ?></b></p>
										 
									</td>
									<td class="">
										 <p><b><?php echo $row['Cust_Phno'] ?></b></p>
										 
									</td>
                                    <td class="">
										 <p><a class="btn btn-get-started" href="cusrep.php?id=<?php echo $row['Cust_ID']?>"><b>Print</b></a></p>
										 
									</td>
									<td class="text-center">
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
		_conf("Are you sure to delete this topic?","delete_member",[$(this).attr('data-id')],'mid-large')
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