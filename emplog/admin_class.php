<?php
session_start();
ini_set('display_errors', 1);
$id=$_SESSION['id'];
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	 include 'dbconnect.php';
    // include 'db_connect.php';
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}
	function login(){
  extract($_POST);	
			$qry = $this->db->query("SELECT * FROM logi where Username = '".$Username."' and Password = '".$Password."' ");
			if($qry->num_rows > 0){echo "working";
				foreach ($qry->fetch_array() as $key => $value) {
					if($key != 'passwors' && !is_numeric($key))
						$_SESSION['login_'.$key] = $value;
				}
			/* if($_SESSION['login_User_Type'] == 4){
				$_SESSION["username"]=$Username;

				 header("location:userhome.php");

			} */
			 if($_SESSION['login_User_Type'] != 1){
					foreach ($_SESSION as $key => $value) {
						unset($_SESSION[$key]);
					}
						return 2 ;
						exit;
					}
				
						return 1;
			}else{
					return 3;
				}
		}
	function login2(){
		
			extract($_POST);
			if(isset($email))
				$username = $email;
		$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".md5($password)."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
			if($_SESSION['login_alumnus_id'] > 0){
				$bio = $this->db->query("SELECT * FROM alumnus_bio where id = ".$_SESSION['login_alumnus_id']);
				if($bio->num_rows > 0){
					foreach ($bio->fetch_array() as $key => $value) {
						if($key != 'passwors' && !is_numeric($key))
							$_SESSION['bio'][$key] = $value;
					}
				}
			}
			if($_SESSION['bio']['status'] != 1){
					foreach ($_SESSION as $key => $value) {
						unset($_SESSION[$key]);
					}
					return 2 ;
					exit;
				}
				return 1;
		}else{
			return 3;
		}
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../login.php");
	}
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		$data = " Username = '$Username' ";
		$data .= ", Emp_fname = '$Emp_fname' ";
		$data .= ", Emp_lname = '$Emp_lname' ";
		
		$data .= ", Emp_Phno = '$Emp_Phno' ";
		$data .= ", Emp_City = '$Emp_City' ";
		$data .= ", Password = '".md5($Password)."' ";
		/*  $data .= ", type = '$type' ";
		if($type == 1)
			$establishment_id = 0;
		$data .= ", establishment_id = '$establishment_id' ";*/
		/* $chk = $this->db->query("SELECT * from tbl_employee where Username = '$Username' and Emp_ID !='$Emp_ID' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		} */
		if(empty($Emp_ID)){
			$save = $this->db->query("INSERT INTO tbl_employee set $data");
			

		}else{
			$save = $this->db->query("UPDATE tbl_employee set ".$data." where Emp_ID = ".$Emp_ID);
		}
		if($save){
			return 1;
		}
	}


	
	function save_service(){
		extract($_POST);
		$id = $_SESSION['id'];
		$data = " ser_name = '$ser_name' ";
		$data .= ", duration = '$duration' ";
		$data .= ", price = '$price' ";
		$data .= ",Emp_ID = $id ";

			if(empty($ser_id)){
				$save = $this->db->query("INSERT INTO tbl_service set $data");
			}else{
				$save = $this->db->query("UPDATE tbl_service set $data where ser_id = $ser_id");
			}
		if($save)
			return 1;
	}

	function save_package(){
		extract($_POST);
	
		$data = " package = '$package' ";
		$data .= ", description = '$description' ";
		$data .= ", amount = '$amount' ";
			if(empty($id)){
				$save = $this->db->query("INSERT INTO packages set $data");
			}else{
				$save = $this->db->query("UPDATE packages set $data where id = $id");
			}
		if($save)
			return 1;
	}

	
	function delete_service(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM tbl_service where ser_id = ".$ser_id);
		if($delete){
			return 1;
		}
	}
	function save_trainer(){
		extract($_POST);
		
		 $data = " Username = '$Username' ";
		$data .= ", t_fname = '$t_fname' ";
		$data .= ", t_lname = '$t_lname' ";
		
		$data .= ", t_phno  = '$t_phno' ";
		$data .= ", t_place  = '$t_place' ";
		$data .= ", Password = '$Password' "; 
		/* if(isset($_POST['submit']))
		{
		 $t_fname=$_POST['t_fname'];
	  $t_lname=$_POST['t_lname'];
	$Username=$_POST['Username'];
	$t_phno=$_POST['t_phno'];
	$t_place=$_POST['t_place'];
	$Password=$_POST['Password']; */
		// $data = " Login_Status  = '$Password' ";
			if(empty($t_id)){
				// $save = $this->db->query("INSERT INTO tbl_trainer(Username,t_fname,t_lname,t_phno,t_place,Password) Values($Username,$t_fname,$t_lname,$t_phno,$t_place,$Password)");
				$save = $this->db->query("INSERT INTO tbl_trainer set ".$data);
			}else{
				$save = $this->db->query("UPDATE tbl_trainer set $data where t_id = $t_id");
			}
		if($save)
			return 1;
		
	}
	function delete_trainer(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM tbl_trainer where 't_id' = ".$t_id);
		if($delete){
			return 1;
		}
	}

	function save_sch(){
		extract($_POST);
		$id = $_SESSION['id'];
		$dt = "sch_slot = '$sch_slot' ";
		$dt .= ",Emp_ID = $id "; 

		if(empty($sch_id)){
			$save = $this->db->query("INSERT INTO tbl_schedule SET ".$dt);
		}else{
			$save = $this->db->query("UPDATE tbl_schedule set sch_slot='$sch_slot' where sch_id=$sch_id");
		}
		if($save)
			return 1;
	}
	function delete_sch(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM tbl_schedule where sch_id = ".$sch_id);
		if($delete){
			return 1;
		}
	}
	function get_schedule(){
		extract($_POST);
		$data = array();
		$qry = $this->db->query("SELECT s.*,concat(m.lastname,',',m.firstname,' ', m.middlename) as name FROM schedules s inner join members m on m.id = s.member_id");
		while($row=$qry->fetch_assoc()){
			
			$data[] = $row;
		}
			return json_encode($data);
	}

	}	