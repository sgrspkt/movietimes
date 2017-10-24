<?php
class Admin extends connection{
	private $admin_id;
	private $username;
	private $admin_password;
	private $admin_ckpassword;
	private $admin_email;
	private $admin_phone;
	private $logo;
	private $facebook_url;
	private $twitter_url;
	private $instagram_url;
	private $role;
	
	/*public function __construct(){
		parent::__construct();
	}*/
	
	public function setAdminID($ad=''){
		$this->admin_id=$ad;
	}
	public function setUsername($ue=''){
		$this->admin_username=$ue;
	}
	public function setPhone($pe=''){
		$this->admin_phone=$pe;
	}
	public function setLogo($lo=''){
		$this->admin_logo=$lo;
	}
	public function setEmail($el=''){
			$this->admin_email=$el;
	}
	public function setPassword($ad=''){
		$this->admin_password=$ad;
	}
	public function setCkPassword($ck=''){
		$this->admin_ckpassword=$ck;
	}
	public function setFacebookUrl($fl=''){
		$this->facebook_url=$fl;
	}
	public function setTwitterUrl($tl=''){
		$this->twitter_url=$tl;
	}
	public function setInstagramUrl($il=''){
		$this->instagram_url=$il;
	}
	public function setRole($re=''){
		$this->role=$re;
	}
	
		
	//---------------adding the admin-----------------

	public function addAdmin()
		{	
try
{
 
    $con = new Connection();
$db = $con->openConnection();
 
     // sql to create table
 
    $sql = $db->prepare("INSERT into admin (username,password,ckpassword,email,phone,logo,facebook_url, twitter_url,instagram_url) VALUES('$this->admin_username','$this->admin_password','$this->admin_ckpassword','$this->admin_email','$this->admin_phone','$this->admin_logo','$this->facebook_url','$this->twitter_url','$this->instagram_url')") ;
    // inserting a record
    if($sql->execute()){
    	return true;
    };
 
   // echo "New record created successfully";
 
}
 
catch (PDOException $e)
 
{
 
    echo "There is some problem in connection: " . $e->getMessage();
 
}
		}
	
	
	
	//---------------------validate admin --------------------------------//
public function validateAdmin(){
	$con = new Connection();
    $db = $con->openConnection();
	$data = $db->query("SELECT * FROM admin WHERE email='$this->admin_email' AND password='$this->admin_password'"); 
				$admin = $data->fetchAll();
				
return $admin;	
}
	

//------------------view admin section ------------------------//
		public function viewAdmin(){
			
			$con = new Connection();
    $db = $con->openConnection();
	$data = $db->query("SELECT * FROM admin");
				$admin = $data->fetchAll();
return $admin;	

			
}

//----------------------------update admin section-----------------------------//
	public function updateAdmin(){
		$con = new Connection();
            $db = $con->openConnection();
		$this->admin_id = (int)$this->admin_id; 
		$sql="UPDATE admin SET username='$this->username', password='$this->admin_password', ckpassword='$this->admin_ckpassword', email='$this->admin_email', phone='$this->admin_phone', logo='$this->admin_logo', facebook_url='$this->facebook_url', twitter_url='$this->twitter_url', instagram_url='$this->instagram_url' WHERE id= $this->admin_id ";
		
		$statement = $db->prepare($sql);
		$update = $statement->execute();


	}
}
?>