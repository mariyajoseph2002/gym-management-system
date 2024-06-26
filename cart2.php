<?php

session_start();
include('dbconn1.php');
require_once ("createdb.php");
require_once ("component.php");
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
//$id=$_SESSION['id'];
$db = new CreateDb("new", "tbl_service");


if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["ser_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart2.php'</script>";
          }
      }
  }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style5.css">
    <link rel="stylesheet" href="style3.css">
</head>
<body class="bg-light">

<?php
    require_once ('header.php');
 
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>
                <?php
$sql = mysqli_query($conn,"select * from tbl_schedule");
$ret = mysqli_fetch_array($sql);
   /*  $time1 = $ret['time_from'];
    $time2 = $ret['time_to']; */
                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $ser_id = array_column($_SESSION['cart'], 'ser_id');

                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($ser_id as $id){
                                if ($row['ser_id'] == $id){
                                    cartElement( $row['ser_name'],$row['price'], $row['ser_id']);
                                    $total = $total + (int)$row['price'];
                                }
                            }
                        } ?>
                        
                            
                               
                            
                  
                    <?php 
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>
            
                    
            
            </div>
            <select name="sch_slot" class="form-select form-select" aria-label=".form-select-sm example">
            <?php
              
                        $ql="SELECT sch_slot FROM tbl_schedule ";
                        $r=mysqli_query($conn,$ql);
                        while($s=mysqli_fetch_array($r))
                        {
                            ?>
           
                <option value="<?php $s['sch_slot']?>"><?php echo $s['sch_slot']; ?></option>
                                 
                
                <?php } ?>
                </select>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
  
            <div class="pt-4">
                
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                       
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>Rs<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>Rs<?php
                            echo $total;
                            ?></h6>
                            
                    </div>
                    <form  method="POST">
                        <?php
                        // $ql="SELECT sch_slot FROM tbl_schedule ";
                        // $r=mysqli_query($conn,$ql);
                        // while($s=mysqli_fetch_array($r))
                        // {
                            ?>
                           
                                <!-- <input class="form-control" type="button" id="sch_slot" name="sch_slot" value="
                        

                               
                        <?php
                    // } ?>
                     </form><?php
                    if(isset($_POST['sch_slot']))
                    {
                        echo "wor";
                        $sch_slot=$_POST['sch_slot'];
                        // $ins=mysqli_query($conn,"INSERT INTO `tbl_cart`(sch_slot ) VALUES('$sch_slot') ");
                        $ins=mysqli_query($conn,"UPDATE `tbl_cart` SET sch_slot='$sch_slot' WHERE c_id='1' ");
                    }
                    else
                    echo "what";
                    ?>  
                    <br><br>
                        
                      <!-- <button class="btn btn-primary" type=\"submit\" class=\"btn btn-warning\">  -->
                         <form><a href="payform.php">   <input class="btn btn-primary" type="submit" value="Place order"</form> 
                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>