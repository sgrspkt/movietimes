<?php
require_once('connection.class.php');

class About extends Connection{
		private $about_id;
		private $about_title;
		private $about_desc;
		private $about_thumbnail;
		private $file_name;
		private $tmp_file_name;
		private $file_type;
		private $final_file_name;
		private $destination;

		/*public function __construct(){
		parent:: __construct();
	}*/
		
		public function setAboutId($ad=''){
			$this->about_id=$ad;
		}
		
		public function setAboutTitle($ae=''){
			$this->about_title=$ae;
		}
		public function setAboutDesc($ac=''){
			$this->about_desc=$ac;
		}
		public function setAboutThumbnail($al=''){
			$this->about_thumbnail=$al;
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
	
		//--------------------------- Add about-------------------------//
		
		public function addAbout()
		{
			
try
 
{
 
    $con = new Connection();
$db = $con->openConnection();
 
     // sql to create table
 
 			$this->file_name=$_FILES['about_thumbnail']['name'];
			$this->tmp_file_name=$_FILES['about_thumbnail']['tmp_name'];
			$this->file_type=$_FILES['about_thumbnail']['type'];
			$this->final_file_name=date('y_m_d_i_m_s_').$this->file_name;

			$this->destination=('../uploads/').$this->final_file_name;
			//$user_id= $_SESSION['id'];
			if(move_uploaded_file($this->tmp_file_name,$this->destination)){
    $sql = $db->prepare("INSERT INTO about (`about_title`,`about_desc`,`about_thumbnail`) VALUES ('$this->about_title','$this->about_desc','$this->final_file_name')") ;

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
		
		//------------------view category section ------------------------//
		public function viewAbout(){
			$con = new Connection();
            $db = $con->openConnection();
			if(isset($this->about_id)){
				//var_dump($this->about_id); die();
				$data = $db->query("SELECT * FROM about WHERE about_id = '$this->about_id'"); 
				$abouts = $data->fetchAll();

			}elseif(isset($this->about_title)){
				$data = $db->query("SELECT * FROM about WHERE about_title='$this->about_title");
				$abouts = $data->fetchAll();
			}
			else{
$data = $db->query("SELECT * FROM about ORDER BY about_id DESC");
$abouts = $data->fetchAll();

			}
	return $abouts;		
			
			
		
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
	
	
	//----------------------------update about section-----------------------------//
	public function updateAbout(){
		$con = new Connection();
            $db = $con->openConnection();
		    $this->about_id = (int)$this->about_id; 
		    $this->file_name=$_FILES[$_POST['about_thumbnail']]['name'];
		    $this->tmp_file_name=$_FILES[$_POST['about_thumbnail']]['tmp_name'];
			$this->file_type=$_FILES[$_POST['about_thumbnail']]['type'];
			$this->final_file_name=date('y_m_d_i_m_s_').$this->file_name;
			$this->destination=('../uploads/').$this->final_file_name;

			//$user_id= $_SESSION['id'];
			if(move_uploaded_file($this->tmp_file_name,$this->destination)){
		$sql="UPDATE about SET about_title='$this->about_title', about_desc='$this->about_desc', about_thumbnail='$this->final_file_name'  WHERE about_id= $this->about_id ";
		$statement = $db->prepare($sql);
		var_dump($statement); die();
		$update = $statement->execute();
		if($update){
			return true;
		}else{
			return false;
		}

	}else{
		die('images not');
	}
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