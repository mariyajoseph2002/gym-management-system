<?php 

 $username="localhost";
$db_user = "root";
$db_pass = "";
$db_name = "new";

$conn = mysqli_connect($username,$db_user,$db_pass,$db_name);

if(!$conn){
    die("Error : Connection failed!");
}
/* else
echo "Connected!"; */
?>