<!DOCTYPE html>
<html lang="zxx">
<?php
error_reporting(0);

include("dbconn1.php");
session_start();
$mcid=$_SESSION['mcid'];
//echo $mcid;
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
<script>
    alert("successfull");
    </script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
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
 <script type="text/javascript">     
        function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=300,height=300');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
     </script>

<br>
<br>
	<input type="submit" value="Print" onClick="PrintDiv();" class="btn btn-primary"/>  <a href="index.php" class="btn btn-danger float-right">&lt;&lt;BACK</a>




<style type="text/css">



</style>
<div id="divToPrint" class='printable'>
	<h3><i>K&M</i></h3>
<?php


$g=0;



$i = 1;
$result = mysqli_query($conn,"select * from tbl_mcart where mc_id='$mcid'");

$row=mysqli_fetch_array($result);
$customer_id=$row['Cust_ID'];
$c_id=explode("-", $customer_id);

$result34 = mysqli_query($conn,"select * from tbl_customer where Cust_ID='$customer_id'");

$row34=mysqli_fetch_array($result34);
$mcid=$_SESSION['mcid'];
$q=mysqli_query($conn,"SELECT payment_date from tbl_payment where mc_id='$mcid'");
$ro=mysqli_fetch_assoc($q);
$date=$ro['payment_date']; 
?>

<center>
<table class='printtable'><tr></td>
<table style='width:900px'><tr><td colspan=2>
	<caption></caption>
<img src='assets/images/logo.png'width='400px'>
</td></tr>



<tr><td colspan=2>

<table>
<tr>
<td width='350px'  >
<div style='font-size:16px;width:300px;padding:4px;margin-bottom:5px;'>
TO
</div>
</td>
<td>
<!--<span style='font-size:26px;'><b>REGISTRATION SLIP</b></span>-->



</td>

</tr>
</table>
</td></tr>


<tr style='font-size:16px;'><td>



<table style='text-transform: uppercase;'>
<tr><th width='150' align='left'  colspan=2><?php echo $row34['Cust_fname']." ". $row34['Cust_lname']; ?> </td></tr>

<tr><td align='left'>Phone :</td><td ><?php echo $row34['Cust_Phno']?></td></tr>
</table>


</td><td align='right'>

<table cellpadding='4' cellspacing='10'>
<tr><th  width='160px' align='left'>Invoice No : </th><td width='160px' ><?php echo "INC-".$_SESSION['mcid'];?>  </td></tr>
<?php
/* $mcid=$_SESSION['mcid']
$q=mysqli_query($conn,"SELECT payment_date from tbl_payment where mc_id='$mcid'");
$ro=mysqli_fetch_assoc($q);
$date=$ro['payment_date'];  */
?>
<tr><th  width='160px' align='left'>Date : </th><td width='160px' ><?php echo "$date";?>  </td></tr>
</table>


</td></tr>

</table>

<br><br>

<table  border="1" class='printtable' style="border-collapse:collapse;font-size:14px;font-family:DIN Medium,Arial, Helvetica, sans-serif;" width="900px" height="700px" align="center" cellpadding="10"  style="padding:10px;">

<tr style='background:#ccc;' >
<th style='font-weight:bold;text-align:center;' height='40px'> NO </th>
<th style='font-weight:bold;text-align:center;'>SERVICE NAME</th>
<th style='font-weight:bold;text-align:center;'>PRICE </th>

</tr>

<?php
$result = mysqli_query($conn,"select * from tbl_ccart inner join tbl_mcart  on tbl_mcart.mc_id= tbl_ccart.mc_id where 	tbl_ccart.mc_id='$mcid'");

while($row=mysqli_fetch_array($result))
{
	
	//$amt=$row['order_qty']*$row['price'];
	$result2 = mysqli_query($conn,"select * from tbl_service where ser_id='$row[ser_id]' ");
	$row2=mysqli_fetch_array($result2);
	
	echo "<tr valign='top' height='40px'>
	<td style='text-align:center;'>$i</td>
	<td width='450' > ";?>
    <?php
	  
	echo $row2['ser_name'] ;
	
	?>
   
	
	<?php echo "</td>
	
	
	<td style='text-align:right;'>$row2[price]</td>
		
	</tr>";
	$total=$total+$row2['price'];
		$i++;
	
	
	
}

?>


<tr valign='top'>
	<td style='text-align:center;' colspan='6'></td>
	</tr>

<tr  height='50px'>
<th style='background:#ccc;font-size:16px;' align='left' >
TOTAL AMOUNT</th><th colspan="4"  style='text-align:right;font-size:16px;'> INR <?php echo $total ?></th>


</tr>


</table>


<table style='width:900px'><tr><td>
<h6 style="font-family:Georgia, 'Times New Roman', Times, serif"><b>NOTE:</b></h6>
<p style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:18px">A printed copy of the receipt must be carried .</p>

</td></tr>


</table>



</td></tr>
</table> 
<br>
<br>


<table>
<tr>
<td width='250px'  >
<div style='font-size:16px;width:300px;padding:4px;margin-bottom:5px;'>
OFFICE SEAL
<br>

</div>
</td>

</tr>
</table>



</center>
  
		
     
    

<?php

mysqli_close($con);

?>

</div>