<?php include('dbconnect.php');
extract($_GET);
?>


			<!-- FORM Panel -->

			<!-- FORM Panel -->

			<!-- Table Panel -->
			
	<div class="container-fluid">
	
	<div class="col-lg-12"> 
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<b></b>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<colgroup>
								<col width="5%">
								<col width="55%">
								<col width="20%">
								<col width="20%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Customer</th>
									<th class="text-center">Service</th>
									<th class="text-center">Amount</th>
									<th class="text-center">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								 if (isset($_POST['sale'])) {
									extract($_POST);
									// echo $monthly;
									if ($daily!="") {
								$i = 1;
								//$package = mysqli_query($conn,"SELECT tbl_service.ser_id,tbl_service.ser_name,tbl_service.price,tbl_ccart.ser_id FROM tbl_service  
								 $package = mysqli_query($conn,"SELECT tbl_service.ser_name,tbl_service.price,tbl_customer.Cust_fname,tbl_mcart.cart_status FROM tbl_service  
								inner join tbl_ccart on tbl_service.ser_id= tbl_ccart.ser_id
								inner join tbl_mcart  on tbl_mcart.mc_id = tbl_ccart.mc_id
								INNER join tbl_customer on tbl_customer.Cust_ID = tbl_mcart.Cust_ID where cart_status='paid' order by Cust_fname"); 

								//$package = $conn->query("SELECT * FROM tbl_service  ");
								/* $package = mysqli_query($conn,"SELECT * FROM  tbl_ccart 
								inner join tbl_mcart  on tbl_mcart.mc_id = tbl_ccart.mc_id
								INNER join tbl_customer on tbl_customer.Cust_ID = tbl_mcart.Cust_ID "); */
								while($row=$package->fetch_assoc()){

								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
									<p> <b><?php echo $row['Cust_fname'] ?></b></p>
								</td><td class="">
									 <p> <b><?php echo $row['ser_name'] ?></b></p> 
										<!--  <p>Description: <small><b><?php echo $row['description'] ?></b></small></p> -->
										
									</td>
									<td class="text-right">
									<b><?php echo number_format($row['price'],2) ?></b>
									</td>
									<td class="text-center">
									<p> <b><?php echo $row['cart_status'] ?></b></p>
										<!-- <button class="btn btn-sm btn-primary edit_package" type="button" data-id="<?php echo $row['ser_id'] ?>" >Edit</button>
										<button class="btn btn-sm btn-danger delete_package" type="button" data-id="<?php echo $row['ser_id'] ?>">Delete</button> -->
									</td>
								</tr>
								<?php }
								}
							 } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<section id="hero" class="d-flex align-items-center" style="height: 700px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
  <h1>Search  Sales</h1>
  <form method="post">
    <table border="10" style="color: black;width: 100px">

  
       <td style="color: white"><input type="date" name="daily" > Date </td>
        <td  style="color: white"> <input type="month" name="monthly"> Month</td>

     <tr>
       <td align="center" colspan="2"><input type="submit" name="sale" class="btn btn-get-started" value="submit"></td>
      </tr>
    

      </tr>
    </table>
<style>
	
	td{
		vertical-align: middle !important;
	}
</style>
<script>
	function _reset(){
		$('#manage-package').get(0).reset()
		$('#manage-package input,#manage-package textarea').val('')
	}
	$('#manage-package').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_package',
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
	})
	$('.edit_package').click(function(){
		start_load()
		var cat = $('#manage-package')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='package']").val($(this).attr('data-package'))
		cat.find("[name='description']").val($(this).attr('data-description'))
		cat.find("[name='amount']").val($(this).attr('data-amount'))
		end_load()
	})
	$('.delete_package').click(function(){
		_conf("Are you sure to delete this package?","delete_package",[$(this).attr('data-id')])
	})
	function delete_package($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_package',
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
	$('table').dataTable()
</script>