<?php 

    include("dbconnect.php");

    $id = $_GET['id'];
    $sts =  $_GET['y'];

    if($sts=='d'){
        $sql1 = mysqli_query($conn,"update tbl_employee set Login_Status=0 where Emp_ID=$id");
        $q=mysqli_query($conn,"select Username from tbl_employee where Emp_ID='$id'");
        $r=mysqli_fetch_assoc($q);
        $username=$r['Username'];

        $sql2 = mysqli_query($conn,"update login set L_Status=0 where Username='$username'");
        }else{
            $sql1 = mysqli_query($conn,"update tbl_employee set Login_Status=1 where Emp_ID=$id");
            $q=mysqli_query($conn,"select Username from tbl_employee where Emp_ID='$id'");
        $r=mysqli_fetch_assoc($q);
        $username=$r['Username'];

        $sql2 = mysqli_query($conn,"update login set L_Status=1 where Username='$username'");
        }
header("location: index.php");
?>