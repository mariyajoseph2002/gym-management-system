<?php include('dbconnect.php');
include('../connection.php');
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
                                    <th class="text-center">Payment</th>
									<th class="text-center">Customer</th>
									<th class="text-center">Service</th>
								
									<th class="text-center">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                               // session_start();
								 if (isset($_POST['sale'])) {
									extract($_POST);
									// echo $monthly;
									if ($daily!="") {
								$i = 1;
                                $q="SELECT * FROM `tbl_payment` INNER JOIN `tbl_mcart` USING (`mc_id`)INNER JOIN `tbl_ccart` USING (mc_id) INNER JOIN `tbl_customer` USING(`Cust_ID`) INNER JOIN `tbl_service` USING (ser_id)  where payment_date='$daily' and cart_status='paid' ";
                            }
                             else if ($monthly!="") {
                 
                             
                              $q="SELECT * FROM `tbl_payment` INNER JOIN `tbl_mcart` USING (`mc_id`)INNER JOIN `tbl_ccart` USING (mc_id) INNER JOIN `tbl_customer` USING(`Cust_ID`) INNER JOIN `tbl_service` USING (ser_id)  where payment_date like '$monthly%' and cart_status='paid' ";
                 
                              }
                            }
                              else{
                              $q="SELECT * FROM `tbl_payment` INNER JOIN `tbl_mcart` USING (`mc_id`)INNER JOIN `tbl_ccart` USING (mc_id) INNER JOIN `tbl_customer` USING(`Cust_ID`) INNER JOIN `tbl_service` USING (ser_id) where cart_status='paid' ";
                             }
                 
                                 $res=select($q);
                                 $_SESSION['res']=$res;
                                 $r=$_SESSION['res'];
                 
                        $slno=1;
                        foreach ($res as $row) {
                            ?>
                     <tr>
                         <td><?php echo $slno++; ?></td>
                         
                     
                         <td><?php echo $row['payment_date'] ?></td>
                         <td><?php echo $row['Cust_fname'] ?></td>
                         
                         <td><?php echo $row['ser_name'] ?></td>
                
                       
                         <td><?php echo $row['cart_status'] ?></td>
                         
                     </tr>
                   
                      <?php
                        }
                 
                 
                          ?>
                       
                     </table>
                   <h2><a class="btn btn-get-started" href="sales2.php"><b>Print</b></a></h2>
                 </center>
							
								
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
  <h1>Search  Transaction</h1>
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