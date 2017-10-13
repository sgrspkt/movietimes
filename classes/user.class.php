<?php

class User extends connection{
	private $user_id;
	private $first_name;
	private $middle_name;
	private $last_name;
	private $username;
	private $password;
	private $ckpassword;
	private $email;
	private $address;
	private $dob;
	private $phone_number;
	private $term;
	private $user_thumb_image;
	private $file_name;
	private $tmp_file_name;
	private $file_type;
	private $final_file_name;
	private $destination;
	
	
	
	public function __construct(){
		parent::__construct();
		
	}
	public function setUserId($ud=''){
		$this->user_id=$ud;
	}
	public function setFirstName($fn=''){
		$this->first_name=$fn;
	}
	public function setMiddleName($mn=''){
		$this->middle_name=$mn;
	}
	public function setLastName($ln=''){
		$this->last_name=$ln;
	}
	public function setUsername($ue=''){
		$this->username=$ue;
	}
	public function setPassword($pd=''){
		$this->password=$pd;
	}
	public function setCkPassword($cpd=''){
		$this->ckpassword=$cpd;
		}
	public function setEmail($em=''){
		$this->email=$em;
	}
	public function setAddress($as=''){
		$this->address=$as;
	}
	public function setDob($dob=''){
		$this->dob=$dob;
	}
	public function setPhoneNumber($pr=''){
		$this->phone_number=$pr;
	}
	public function setMessage($msg=''){
		$this->msg=$msg;
		}
	public function setTerm($tm=''){
		$this->term=$tm;
	}
	public function setUserThumbImage($ie=''){
		$this->user_thumb_image=$ie;
	}
	public function setFileName($fe=''){
		$this->file_name=$fe;
	}
	public function setTmpFileName($te=''){
		$this->tmp_file_name=$te;
	}
	public function setFileType($ft=''){
		$this->file_type=$ft;
	}
	public function setFinalFileName($ffn=''){
		$this->final_file_name=$ffn;
	}
	public function setDestination($dn=''){
		$this->destination=$dn;
	}
	
	
	//-----------------------------adding the user----------------------------------//
	public function addUser(){

$this->file_name=$_FILES['user_thumb_image']['name'];
			$this->tmp_file_name=$_FILES['user_thumb_image']['tmp_name'];
			$this->file_type=$_FILES['user_thumb_image']['type'];
			$this->final_file_name=date('y_m_d_i_m_s_').$this->file_name;
			$this->destination=('../uploads/').$this->final_file_name;
			if(move_uploaded_file($this->tmp_file_name,$this->destination)){


		$this->sql1="INSERT into tbl_user(first_name,middle_name,last_name,username,password,ckpassword,email,address,dob,user_thumb_image)
					 VALUES('$this->first_name','$this->middle_name','$this->last_name','$this->username','$this->password','$this->ckpassword','$this->email','$this->address','$this->dob','$this->final_file_name')";
					 $this->res1=mysqli_query($this->conxn,$this->sql1) or trigger_error($this->err=mysqli_error($this->conxn));
					$this->affRows1=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));

foreach ($this->phone_number as  $value) {
	$this->sql3="INSERT INTO tbl_phone(user_id,phone_number) VALUES((SELECT user_id FROM tbl_user ORDER BY user_id DESC limit 1),'$value')";
$this->res3=mysqli_query($this->conxn,$this->sql3) or trigger_error($this->err=mysqli_error($this->conxn));
}
					 $this->affRows3=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
					
					if(($this->affRows1)>0 && ($this->affRows3)>0){
						return true;
					}
					else{
						return false;
					}
				}
	}
	
	//------------------------------view user section------------------------------//
	public function viewUser(){
		if(isset($this->user_id)){
			$this->sql="SELECT * FROM tbl_user WHERE user_id='$this->user_id'";
		}
		 elseif(isset($this->term)){
		$this->sql="SELECT u.user_id,u.first_name,u.middle_name,u.last_name,u.username,u.email,u.address,
			 u.dob,p.phone_number,u.user_thumb_image FROM tbl_user u join tbl_phone p on u.user_id=p.user_id
			 WHERE u.user_id LIKE '%{$this->term}%' OR u.first_name LIKE '%{$this->term}%'
			  OR u.middle_name LIKE '%{$this->term}%' OR u.username LIKE '%{$this->term}%'
			  OR u.email LIKE '%{$this->term}%' OR u.address LIKE '%{$this->term}%'
			  OR u.dob LIKE '%{$this->term}%'"; 
		}
		else{
			$this->sql="SELECT u.user_id,u.first_name,u.middle_name,u.last_name,u.username,u.email,u.address,
			 u.dob,p.phone_number,u.user_thumb_image FROM tbl_user u join tbl_phone p on u.user_id=p.user_id"; 
			}
			
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->numRows=mysqli_num_rows($this->res);

		$this->row=array();
		if($this->numRows>0){

		while($this->row=mysqli_fetch_assoc($this->res)){
			array_push($this->data,$this->row);
			$_SESSION['user_id'] = $this->row['user_id'];
			
		}
		}
		return $this->data;
}

//--------------------------validate user section----------------------------------//
public function validateUser(){

	if(isset($this->user_id)){
		$this->sql="SELECT * FROM tbl_user WHERE user_id='$this->user_id'";
	}
	else{
	$this->sql="SELECT * FROM tbl_user WHERE username='$this->username' AND password='$this->password' ";
	
	$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
	$this->numRows=mysqli_num_rows($this->res);
	$query = $this->row=array();
	
    if($this->numRows>0){
			while($this->row=mysqli_fetch_assoc($this->res)){
					array_push($this->data,$this->row);
		$_SESSION['user_id'] = $this->row['user_id'];
	}
	$message = "success";

	}
	else{
		$message = "Invalid Username And Password";
	}
	return $message;

}
}
//--------------------------check username section----------------------------------//
public function checkUsername(){

		$this->sql = "SELECT username from tbl_user WHERE username = '".$_POST["user"]."'";
	
	$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
	$this->numRows=mysqli_num_rows($this->res);
	
    if($this->numRows<=0){

			$output = '';
	}else{
		$output = 'Username is Not Available';
	}
	return $output;
	

}

//--------------------------count user section----------------------------------//
public function countUser(){
		$this->sql="SELECT count(username) as count FROM `tbl_user`";
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->numRows=mysqli_num_rows($this->res);// or trigger_error($this->err=mysqli_error($this->conxn));
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