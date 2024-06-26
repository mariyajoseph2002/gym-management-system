<!DOCTYPE html>
<html lang="zxx">

<?php
error_reporting(0);

include("dbconnect.php");
session_start();
$prid = $_GET['id'];
//$mcid=$_SESSION['mcid'];

?>

	<!-- Custom-Files -->
	<!-- Bootstrap-Core-Css -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Style-Css -->
	
	<!-- breadcrumb -->
	<!-- //banner -->




	<!-- register -->
	  
<style>

label
{
text-transform:capitalize;	
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="assets/css/rep.css" rel="stylesheet" />
<link href="assets/css/bootstrap2.css" rel="stylesheet" />
  <!--<script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>-->
</head>

<style>
#table td
{
	width:150px;
}
.printtable
{
font-family:DIN Medium,Arial, Helvetica, sans-serif;
font-size:14px;	
}
</style>




<body ng-controller='mainController'>

<!--<style>
div
{
text-transform:capitalize;
margin-bottom:5px;	
}

</style>-->

<style>
.bo td
{
border:1px solid #ccc;	
}

.bo th
{
border:1px solid #fff;	
}
</style>
<script> 
    function printDiv() { 
      var divContents = document.getElementById("div_print").innerHTML; 
      var a = window.open('', '', 'height=500, width=500'); 
      a.document.write(divContents); 
      a.document.close(); 
      a.print(); 
    } 
  </script> 

<br>
<br>
	<input type="submit" value="Print" onClick="PrintDiv();" class="btn btn-primary"/>  <a href="index.php" class="btn btn-danger float-right">&lt;&lt;BACK</a>




<style type="text/css">



</style>
<body onload="printDiv()">
  <div id="div_print" >
<div id="divToPrint" class='printable'>
	<h3><i>K&M</i></h3>
<?php


/* $g=0;



$i = 1;
$result = mysqli_query($conn,"select * from tbl_customer where Cust_ID='$prid'");

$row=mysqli_fetch_array($result); */
/* customer_id=$row['Cust_ID'];
$c_id=explode("-", $customer_id);

$result34 = mysqli_query($conn,"select * from tbl_customer where Cust_ID='$customer_id'");

$row34=mysqli_fetch_array($result34); */

?>

<center>
<table class='printtable'><tr></td>
<table style='width:900px'><tr><td colspan=2>
	<caption></caption>
<img src='../assets/images/logo.png'width='400px'>
</td></tr>



<tr><td colspan=2>

<table>
<tr>
<td width='350px'  >


</div>
</td>
<td>
<!--<span style='font-size:26px;'><b>REGISTRATION SLIP</b></span>-->



</td>

</tr>
</table>
</td></tr>

<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            <!-- Invoice -->
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                <!-- ID: #111-222 -->
                Date:<h6 id="heading" class="print-date" style="text-align: left;margin: 5px 50px;"> </h6>

            </small>
        </h1>
		</div>

<div class="container px-0">
	<div class="row mt-4">
		<div class="col-12 col-lg-12">
			<div class="row">
				<div class="col-12">
					<div class="text-center text-150">
						<i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
						<span class="text-default-d3">Customer Report</span>
					</div>
				</div>
			</div>
			<hr class="row brc-default-l1 mx-n1 mb-4" />
			<div class="row border-b-2 brc-default-l2"></div>


			<div class="table-responsive">
                        <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                            <thead class="bg-none bgc-default-tp1">
                                <tr class="text-white">
                                    
        
          


<br><br>



<tr style='background:#ccc;' >
<th style='font-weight:bold;text-align:center;' height='40px'> USERNAME </th>
<th style='font-weight:bold;text-align:center;'>CUST FNAME</th>
<th style='font-weight:bold;text-align:center;'>CUST LNAME</th>
<th style='font-weight:bold;text-align:center;'>HOUSENAME</th>
<th style='font-weight:bold;text-align:center;'>PLACE </th>
<th style='font-weight:bold;text-align:center;'>PIN </th>
<th style='font-weight:bold;text-align:center;'>THONE </th>
</tr>
</tr>
                            </thead>
                           
                            <tbody class="text-95 text-secondary-d3">
                                <tr></tr>
<?php
$result = mysqli_query($conn,"select * from tbl_customer where Cust_ID='$prid'");


/* result = mysqli_query($conn,"select * from tbl_ccart where 	mc_id='$mcid'"); */

while($row=mysqli_fetch_array($result))
{
    ?>
    <td class="">
										 <p><b><?php echo $row['Username'] ?></b></p>
										 
									</td>
	<td class="">
										 <p><b><?php echo ucwords($row['Cust_fname']) ?></b></p>
										 
									</td>
                                    </td>
	<td class="">
										 <p><b><?php echo ucwords($row['Cust_lname']) ?></b></p>
										 
									</td>
									<td class="">
										 <p><b><?php echo $row['Cust_housename'] ?></b></p>
									</td>
                                    <td class="">
										 <p><b><?php echo $row['Cust_Place'] ?></b></p>
										 
									</td>
                                    <td class="">
										 <p><b><?php echo $row['Cust_Pin'] ?></b></p>
										 
									</td>
									<td class="">
										 <p><b><?php echo $row['Cust_Phno'] ?></b></p>
										 
									</td>
                                    <?php
                                    }
                                    ?>
									 </tbody>
</table>                                
	
</div>
            </div>
        </div>
    </div>
</div>
<script> 
    document.querySelector(".print-date").innerHTML = new Date().toDateString();
    function printDiv() { 
  print()
    } 
    </script>


</center>
  
		
     
    

<?php

// mysqli_close($conn);

?>

