<?php
require_once('connection.class.php');

class Ad extends Connection{
		private $ad_id;
		private $ad_company;
		private $ad_url;
		private $ad_image;
		private $ad_package;
		private $ad_action;

		/*public function __construct(){
		parent:: __construct();
	}*/

		public function setAdId($ad=''){
			$this->ad_id=$ad;
		}

		public function setAdCompany($ae=''){
			$this->ad_company=$ae;
		}
		public function setAdUrl($ac=''){
			$this->ad_url=$ac;
		}
		public function setAdImage($al=''){
			$this->ad_image=$al;
		}
		public function setAdPackage($pe=''){
			$this->ad_package=$pe;
		}
		public function setAdAction($al=''){
			$this->ad_action=$al;
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

		//--------------------------- Add ad-------------------------//

		public function addAd()
		{

try

{

    $con = new Connection();
$db = $con->openConnection();

     // sql to create table
		 $this->ad_company=$_POST['ad_company'];
		 $this->ad_url=$_POST['ad_url'];
		 $this->ad_package=$_POST['ad_package'];
 			$this->file_name=$_FILES['ad_image']['name'];
			$this->tmp_file_name=$_FILES['ad_image']['tmp_name'];
			$this->file_type=$_FILES['ad_image']['type'];
 			$this->final_file_name=date('y_m_d_i_m_s_').$this->file_name;

			$this->destination=('../uploads/').$this->final_file_name;
			//$user_id= $_SESSION['id'];
			if(move_uploaded_file($this->tmp_file_name,$this->destination)){
						$sql = $db->prepare("INSERT INTO advertisement (`ad_company`,`ad_url`,`ad_image`,`ad_package`)
						VALUES ('$this->ad_company','$this->ad_url','$this->final_file_name','$this->ad_package')") ;

						$sql->execute();
    // inserting a record
			   if($sql->execute()){
			    	return true;
			    };

 }
   // echo "New record created successfully";

}

catch (PDOException $e)

{

    echo "There is some problem in connection: " . $e->getMessage();

}
		}

		//------------------view ad section ------------------------//
		public function viewAd(){
			$con = new Connection();
            $db = $con->openConnection();
			if(isset($this->ad_id)){
				//var_dump($this->about_id); die();
				$data = $db->query("SELECT * FROM advertisement WHERE ad_id = '$this->ad_id'");
				$ad = $data->fetchAll();

			}elseif(isset($this->ad_company)){
				$data = $db->query("SELECT * FROM advertisement WHERE ad_company='$this->ad_company'");
				$ad = $data->fetchAll();
			}
			else{
$data = $db->query("SELECT * FROM advertisement  ORDER BY ad_id DESC");
$ad = $data->fetchAll();

			}
	return $ad;



}
public function viewFrontendAd(){
	$con = new Connection();
				$db = $con->openConnection();

$data = $db->query("SELECT * FROM advertisement WHERE ad_action='0' ORDER BY ad_id DESC");
$ad = $data->fetchAll();


return $ad;



}

//----------------------------delete about section -------------------------------//
	public function deleteAbout(){

		$this->sql="DELETE FROM about WHERE about_id='$this->about_id'";
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->affRows=mysqli_affected_rows($this->conxn);// or trigger_error($this->err=mysqli_error($this->conxn));
		if($this->affRows>0){
				return true;
				}
				else{
			return false;
		}

	}


	//----------------------------update ad section-----------------------------//
	public function updateAd(){
		$con = new Connection();
            $db = $con->openConnection();
		    $this->ad_id = (int)$this->ad_id;
 $this->ad_action = (int)$this->ad_action;


			//$user_id= $_SESSION['id'];
			//$this->ad_action;
			if(isset($this->ad_action)){

				$sql="UPDATE advertisement SET ad_action='$this->ad_action' WHERE ad_id= $this->ad_id ";
				$statement = $db->prepare($sql);
				//var_dump($statement); die();
				$update = $statement->execute();
				if($update){
					return true;
				}else{
					return false;
				}

			}
			die('outside');
	// 		$this->file_name=$_FILES[$_POST['ad_image']]['name'];
	// 		$this->tmp_file_name=$_FILES[$_POST['ad_image']]['tmp_name'];
	// 	$this->file_type=$_FILES[$_POST['ad_image']]['type'];
	// 	$this->final_file_name=date('y_m_d_i_m_s_').$this->file_name;
	// 	$this->destination=('../uploads/').$this->final_file_name;
	//
	// 		if(move_uploaded_file($this->tmp_file_name,$this->destination)){
	// 	$sql="UPDATE about SET about_title='$this->about_title', about_desc='$this->about_desc', about_thumbnail='$this->final_file_name'  WHERE about_id= $this->about_id ";
	// 	$statement = $db->prepare($sql);
	// 	var_dump($statement); die();
	// 	$update = $statement->execute();
	// 	if($update){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	//
	// }else{
	// 	die('images not');
	// }
}

	//-----------------------count the number of category-------------------------//
	public function countCategory(){
		$this->sql="SELECT count(category_name) as count FROM `tbl_category`";
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->numRows=mysqli_num_rows($this->res);
			$this->data=array();

			if($this->numRows>0){
				while($this->row=mysqli_fetch_assoc($this->res)){
					array_push($this->data,$this->row);
				}

				}
		return $this->data;
	}

	//--------------------------search ajax for category-------------------------------//
	public function searchAjax(){

		$this->sql="SELECT category_name FROM tbl_category where category_name like '%".$_POST['query']."%'";
		$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
			$output = '<ul class="list-unstyled">';
	$this->numRows = mysqli_num_rows($this->res);
	if($this->numRows>0){
		while($this->row = mysqli_fetch_array($this->res)){
			$output.='<li>'.$this->row['category_name'].'</li>';
		}
	}else{
		$output.='</li>not available</li>';
	}
	$output.='</ul>';
	return  $output;
}
}
