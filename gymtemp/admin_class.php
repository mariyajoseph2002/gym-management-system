<?php
session_start();
ini_set('display_errors', 1);
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
		//  if($_SESSION['login_User_Type'] == 4){
		// 		$_SESSION["username"]=$Username;

		// 		 header("location:userhome.php");

		// 	} 
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
 
function login1(){
	
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
		$data .= ", Password = '$Password' ";
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
			$save = $this->db->query("INSERT INTO tbl_employee set ".$data);
			$data = " Username = '$Username' ";
			$data .= ", Password = '$Password' ";
			$save = $this->db->query("INSERT INTO login set $data"); 
		}else{
			$save = $this->db->query("UPDATE tbl_employee set ".$data." where Emp_ID = ".$Emp_ID);
		}
		if($save){
			return 1;
		}
	}
	function delete_user(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM tbl_employee where Emp_ID = ".$Emp_ID);
		if($delete)
			return 1;
	}
	function signup(){
		extract($_POST);
		$data = " name = '".$firstname.' '.$lastname."' ";
		$data .= ", username = '$email' ";
		$data .= ", password = '".md5($password)."' ";
		$chk = $this->db->query("SELECT * FROM users where username = '$email' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("INSERT INTO users set ".$data);
		if($save){
			$uid = $this->db->insert_id;
			$data = '';
			foreach($_POST as $k => $v){
				if($k =='password')
					continue;
				if(empty($data) && !is_numeric($k) )
					$data = " $k = '$v' ";
				else
					$data .= ", $k = '$v' ";
			}
			if($_FILES['img']['tmp_name'] != ''){
							$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
							$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
							$data .= ", avatar = '$fname' ";

			}
			$save_alumni = $this->db->query("INSERT INTO alumnus_bio set $data ");
			if($data){
				$aid = $this->db->insert_id;
				$this->db->query("UPDATE users set alumnus_id = $aid where id = $uid ");
				$login = $this->login2();
				if($login)
				return 1;
			}
		}
	}
	
	
	function save_service(){
		extract($_POST);
		$data = " ser_name = '$ser_name' ";
		$data .= ", duration = '$duration' ";
		$data .= ", price = '$price' ";
		
			if(empty($ser_id)){
				$save = $this->db->query("INSERT INTO tbl_service set ".$data);
			}else{
				$save = $this->db->query("UPDATE tbl_service set $data where ser_id = $ser_id");
			}
		if($save)
			return 1;
	}
	function delete_(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM tbl_service where ser_id = ".$ser_id);
		if($delete){
			return 1;
		}
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
	function delete_package(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM packages where id = ".$id);
		if($delete){
			return 1;
		}
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
				/* var_dump($data);
				die(); */
				$data = " Username = '$Username' ";
				$data .= ", Password = '$Password' "; 
				$save = $this->db->query("INSERT INTO login set ".$data);
			}else{
				$save = $this->db->query("UPDATE tbl_trainer set ".$data." where t_id = $t_id");
			}
		if($save)
			return 1;
		
	}
	function delete_trainer(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM tbl_trainer where t_id = ".$t_id);
		if($delete){
			return 1;
		}
	}
	function sallocation()
	{
		extract($_POST); 
		 $data = '';
	foreach($_POST as $k=> $v){
			if(!empty($v)){
				if(!in_array($k,array('a_id','id'))){
					if(empty($data))
					$data .= " $k='{$v}' ";
					else
					$data .= ", $k='{$v}' ";
				}
			}
		} 
		$data = ", Cust_fname ='$Cust_fname' ";
		$data .= ", id ='$id' ";
		if(empty($aid)){

			$save = $this->db->query("INSERT INTO tbl_allocation set ".$data);
		}else{
			$save = $this->db->query("UPDATE tbl_allocation set ".$data." where sch_id=".$sch_id);
		}
		if($save)
			return 1;

	}
	
	function save_sch(){
		extract($_POST);
		
        $data = " sch_slot = '$sch_slot' ";
		
		if(empty($sch_id)){

			$save = $this->db->query("INSERT INTO tbl_schedule set ".$data);
		}else{
			$save = $this->db->query("UPDATE tbl_schedule set $data where sch_id=".$sch_id);
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
	function save_payment(){
		extract($_POST);
		$data = '';
		foreach($_POST as $k=> $v){
			if(!empty($v)){
				if(empty($data))
				$data .= " $k='{$v}' ";
				else
				$data .= ", $k='{$v}' ";
			}
		}
			$save = $this->db->query("INSERT INTO payments set ".$data);
		if($save)
			return 1;
	}
	function renew_membership(){
		extract($_POST);
		$prev = $this->db->query("SELECT * FROM registration_info where id = $rid")->fetch_array();
		$data = '';
		foreach($prev as $k=> $v){
			if(!empty($v) && !is_numeric($k) && !in_array($k,array('id','start_date','end_date','date_created'))){
				if(empty($data))
				$data .= " $k='{$v}' ";
				else
				$data .= ", $k='{$v}' ";
				$$k=$v;
			}
		}
				$data .= ", start_date ='".date("Y-m-d")."' ";
				$plan = $this->db->query("SELECT * FROM plans where id = $plan_id")->fetch_array()['plan'];
				$data .= ", end_date ='".date("Y-m-d",strtotime(date('Y-m-d').' +'.$plan.' months'))."' ";
				$save = $this->db->query("INSERT INTO registration_info set $data");
				if($save){
					$id = $this->db->insert_id;
					$this->db->query("UPDATE registration_info set status = 0 where member_id = $member_id and id != $id ");
					return $id;
				}

	}
	function end_membership(){
		extract($_POST);
		$update = $this->db->query("UPDATE registration_info set status = 0 where id = ".$rid);
		if($update){
			return 1;
		}
	}
	
	function save_membership(){
		extract($_POST);
		$data = '';
		foreach($_POST as $k=> $v){
		if(!empty($v)){
			if(empty($data))
			$data .= " $k='{$v}' ";
			else
			$data .= ", $k='{$v}' ";
			$$k=$v;
		}
	}
	$data .= ", start_date ='".date("Y-m-d")."' ";
	$plan = $this->db->query("SELECT * FROM plans where id = $plan_id")->fetch_array()['plan'];
	$data .= ", end_date ='".date("Y-m-d",strtotime(date('Y-m-d').' +'.$plan.' months'))."' ";
	$save = $this->db->query("INSERT INTO registration_info set $data");
	if($save){
		$id = $this->db->insert_id;
		$this->db->query("UPDATE registration_info set status = 0 where member_id = $member_id and id != $id ");
		return 1;
	}
  }
 }

