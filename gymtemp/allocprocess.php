<?php
include('dbconnect.php');
$cid = $_GET['cid'];
$tid = $_GET['tid'];

$q=mysqli_query($conn,"select mc_id from tbl_mcart where Cust_ID=$cid");
if($r=mysqli_fetch_assoc($q))
{
    echo "yes";
    $mcid=$r['mc_id'];
}
$qu=mysqli_query($conn,"select pay_id from tbl_payment where mc_id=$mcid");
if($re=mysqli_fetch_assoc($qu))
{
    echo "yes";
    $pid=$re['pay_id'];
}

// echo $cid."<br>".$trid;
//$q=mysqli_query($conn,"select tbl_payment.pay_id,tbl_payment.mc_id,tbl_mcart.mc_id,tbl_mcart.Cust_ID from tbl_payment inner join tbl_mcart on tbl_payment.mc_id=tbl_mcart.mc_id where tbl_mcart.Cust_ID=$cid");
//$query ="INSERT INTO tbl_allocation(Cust_id,t_id) VALUES ($cid,$tid)";
//$member =  $conn->query($query);
//maid ="INSERT INTO tbl_mallocation(pay_id,pay_id,Emp_id) VALUES ($pid,$id)";
/* $in1 ="INSERT INTO tbl_mallocation(pay_id)VALUES ($pid)";
$mem =  $conn->query($in1);

$que="INSERT INTO tbl_callocation(t_id) VALUES ($tid)";
$mem =  $conn->query($que); */
/* if($member){
    header('Location: index.php?page=allocation2');
} */
$cmart = mysqli_query($conn,"select ma_id from tbl_mallocation where pay_id=$pid and Cust_ID='$cid'");
if(mysqli_num_rows($cmart) > 0){
    $cmsql = mysqli_fetch_array($cmart);
    $maid = $cmsql['ma_id'];
  
   $sql = mysqli_query($conn,"select * from tbl_mallocation where pay_id=$pid and Cust_ID='$cid'");
    $sqlret = mysqli_fetch_array($sql);        
    if(mysqli_num_rows($sql) > 0){
                $maid = $sqlret['ma_id'];
                $q2=mysqli_query($conn,"insert into tbl_callocation values(null,'$maid','$tid')");
                
              }
            }else{
            $q= mysqli_query($conn,"INSERT  into tbl_mallocation(ma_id,pay_id,Cust_ID) values(null,'$pid','$cid')");
            $cmart = mysqli_query($conn,"select ma_id from tbl_mallocation where pay_id=$pid and Cust_ID='$cid'");

    $cmsql = mysqli_fetch_array($cmart);
    $maid = $cmsql['ma_id'];
            $q2=mysqli_query($conn,"insert into tbl_callocation values(null,'$maid','$tid')");
            }
if($q){
    ?>
    <script>
    alert("Successfully saved");
    <script> <?php   
    header('Location: index.php?page=allocation2');
   
   
       
     
      
}
else{
    echo $conn->error;
}

?>