<?php include '../connection.php';
session_start();
extract($_GET);

 $r=$_SESSION['res'];

 ?>
<script> 
    function printDiv() { 
      var divContents = document.getElementById("div_print").innerHTML; 
      var a = window.open('', '', 'height=500, width=500'); 
      a.document.write(divContents); 
      a.document.close(); 
      a.print(); 
    } 
  </script> 
<body onload="printDiv()">
  <div id="div_print" >
<center>
<h3><i>K&M</i></h3>
           <!--  <p>
              A108 Adam Street, 
              Ernakulam, 
              Kerala, 
              India <br><br>
              <strong>Phone:</strong> +91 6238673277<br> +91 778788260<br>
              <strong>Email:</strong> zephfragrances@gmail.com<br> zephperfumes@gmail.com<br> 
            </p>  -->  
            <img src='../assets/images/logo.png'width='400px'> 
<h1 style="padding-top: 30px;font-size: 60px">Sales Report</h1>

<!-- <h1>View Sales</h1> -->
<table class="table" style="width: 1000px;color: black;font-style: italic;font-family: monospace;font-size: 22px" border="5">
		<tr>
		  <th>Sino</th>
         <th>Date</th>
         <th>Customer</th>
        
           <th>Service</th>

                <th>Status</th>
        
        
		</tr>
		<?php 

       
      $res=$r;
       $slno=1;
       foreach ($res as $row) {
      ?>
        
        
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
</center>