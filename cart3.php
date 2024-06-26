<?php

session_start();
include('dbconn1.php');
require_once ("createdb.php");
require_once ("component.php");
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
$cid=$_SESSION['id'];
//$id=$_SESSION['id'];
$db = new CreateDb("new", "tbl_service"); 
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
               // echo $cid;
 $sql = mysqli_query($conn," SELECT * from tbl_service 
 INNER JOIN tbl_ccart ON tbl_service.ser_id = tbl_ccart.ser_id
 INNER join tbl_mcart  on tbl_ccart.mc_id = tbl_mcart.mc_id
 INNER join tbl_customer on tbl_customer.Cust_ID = tbl_mcart.Cust_ID where tbl_customer.Cust_ID=$cid AND tbl_mcart.cart_status = 'pending'");
//$q0= mysqli_query($conn,"SELECT * FROM  `tbl_service` INNER JOIN `tbl_ccart` USING(`ser_id`) WHERE `cm_id`='$cmid' AND `item_id`='$item'";
// $ret = mysqli_fetch_array($sql);

   /*  $time1 = $ret['time_from'];
    $time2 = $ret['time_to']; */
                $total = 0;
                     /*if (isset($_SESSION['cart'])){
                        $ser_id = array_column($_SESSION['cart'], 'ser_id');

                         $result = $db->getData(); */
                         if(mysqli_num_rows($sql) >0){
                        while ($row = mysqli_fetch_array($sql)){
                            /* foreach ($ser_id as $id){
                                if ($row['ser_id'] == $id){ */
                                    cartElement( $row['cc_id'],$row['ser_id'],$row['ser_name'],$row['price']);
                                    $total = $total + (int)$row['price'];
                                }
                            }
                 
                        else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['count'])){
                                $count  = $_SESSION['count'];
                                echo "<h6>Price (<?php echo $count ?> services)</h6>";
                            }else{
                                //$count  = $_SESSION['count'];
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
                    <div class="col-md-6">
                    <h7>Select the schedule</h7>
                       
                    <form action="" method="POST" >
                       
                           <!-- <span class="remove">
                                <input class="form-control" type="button" id="sch_slot" name="sch_slot" value="<?php echo $s['sch_slot']  ?>"/><br>
                        </span>
                         --><br>
                         <select name="sch_slot" id="sch_slot" class="form-select form-select" aria-label=".form-select-sm example" required>
                            <option  value> select </option>
           <?php
              
                        $ql="SELECT sch_id,sch_slot FROM tbl_schedule ";
                        $r=mysqli_query($conn,$ql);
                        while($s=mysqli_fetch_array($r))
                        {
                            ?>
           
                <option  value="<?php echo $s['sch_id']?>"><?php  echo $s['sch_slot'] ?></option>
                <?php } ?>
                  
                 <input type="hidden" name="schslot" id="schslot"> 
                                  
               
                
                </select>
               
                
                     
                   
                </div>
                    <br><br> <br><br>
                      <!-- <button class="btn btn-primary" type=\"submit\" class=\"btn btn-warning\">  -->
                       <a>    
                       
                            <input class="btn btn-primary" id="new"  name="new" type="submit" value="Proceed">
                    </form> 
                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
        function slot(){
            document.getElementById("schslot").value = document.getElemetById("sch_slot").value;
        }
        slot();
    </script>
</body>
</html>
<?php

                    if(isset($_POST['new']))
                    {
                        echo "wor";
                       $schid = $_POST['sch_slot'];
                       if($ins = mysqli_query($conn,"UPDATE tbl_mcart SET sch_id='$schid',total='$total' WHERE Cust_ID='$cid'")){}

                       echo $schid;
                        //echo  $sch_slot;
                        // $ins=mysqli_query($conn,"INSERT INTO `tbl_cart`(sch_slot ) VALUES('$sch_slot') ");
                       //$q=mysqli_query($conn,"SELECT sch_id from tbl_schedule where sch_='$sch_slot'");
                     
                        // if($sch_id=mysqli_fetch_array($q))
             
                        // {
                        //     echo $sch_id['sch_id'];
                        //         $schid = $sch_id['sch_id'];
                        //         echo "updated";
                        //                             }
                            
                        // //$sch_id=$ro['sch_id'];
                        // } 
                        header("location: payform.php");
                    }
                 /*  else
                    echo "what"; */

                //         
                    
                    
?>  

