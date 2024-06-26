<?php
$con=mysqli_connect('localhost','root','','veruthe');
$name=$_POST['title'];
$author=$_POST['author'];
$price=$_POST['price'];
$nopages=$_POST['nopages'];
$q="insert into book('title','author','price','nopages') values('$name','$author','$price','$nopages')";
$re=mysqli_query($con,$q);
if($re)
{
    echo "<script>
    alert('inserted successfully');
    </script>";
}
?>