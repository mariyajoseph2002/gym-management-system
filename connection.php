
<?php 
//session_start();
$username="localhost";
$db_user = "root";
$db_pass = "";
$db_name = "new";

$con = mysqli_connect($username,$db_user,$db_pass,$db_name);

$con=mysqli_connect("localhost","root","","new");
 function insert($qry){
 	$res=mysqli_query($GLOBALS['con'],$qry);
 	return mysqli_insert_id($GLOBALS['con']);
 }

function select($qry){
	$res=mysqli_query($GLOBALS['con'],$qry);
	$result=mysqli_fetch_all($res,MYSQLI_ASSOC);
	return $result;
}
function update($q){
		mysqli_query($GLOBALS['con'],$q);
}
function redirect($url){?>
		<script type="text/javascript">
			window.location="<?php echo $url ?>";
		</script>
		<?php
		
}
function alert($msg){
		echo "<script> alert('$msg')</script>";
}
function delete($qry){
		$res=mysqli_query($GLOBALS['con'],$qry);
		return $res;
		
}
?>
	
