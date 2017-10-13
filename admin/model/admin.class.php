<?php
class Admin extends connection{
	private $admin_id;
	private $admin_username;
	private $admin_password;
	private $admin_role;
	
	
	/*public function __construct(){
		parent::__construct();
	}*/
	
	public function setAdminID($ad=''){
		$this->admin_id=$ad;
	}
	public function setUsername($ue=''){
			$this->admin_username=$ue;
	}
	public function setPassword($ad=''){
		$this->admin_password=$ad;
	}
	public function setAdminRole($ar=''){
		$this->admin_role=$ar;
	}
	
		
	//---------------adding the admin-----------------
	public function addAdmin(){
		$this->sql="INSERT into tbl_admin (admin_id,username,password,role) VALUES('$this->admin_id','$this->admin_username','$this->admin_password','$this->admin_role')";
					
					 $this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
					 $this->affRows=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
					if($this->affRows>0){
						return true;
					}
					else{
						return false;
					}
	}
	
	
	//---------------------validate admin --------------------------------//
public function validateAdmin(){
	
		$this->sql="SELECT * FROM tbl_admin WHERE username='$this->admin_username' AND password='$this->admin_password' ";
	$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
	$this->numRows=mysqli_num_rows($this->res);
	$this->row=array();
	$this->numRows;
	
    if($this->numRows>0){
		$row=mysqli_fetch_assoc($this->res);
		$_SESSION['username']=$row['username'];
		$username=$_SESSION['username'];
		$_SESSION['admin_id']=$row['admin_id'];
		$this->admin_id=$_SESSION['admin_id'];
$message = "success";
	
	}
	else{
		$message = "Invalid Username And Password";
		
	}
	return $message;
}



//------------------view admin section ------------------------//
		public function viewAdmin(){
			
			$this->sql="SELECT * FROM tbl_admin";
			$this->res=mysqli_query($this->conxn,$this->sql);
			$this->numRows=mysqli_num_rows($this->res);
			$this->data=array();
			
			if($this->numRows>0){
				while($this->row=mysqli_fetch_assoc($this->res)){
					array_push($this->data,$this->row);
				}
				
				}
		return $this->data;
		
}

}
?>