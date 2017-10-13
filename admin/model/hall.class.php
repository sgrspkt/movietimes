<?php
require_once('connection.class.php');

class Hall extends Connection{
		private $hall_id;
		private $hall_name;
		private $hall_location;
		private $hall_map;

		/*public function __construct(){
		parent:: __construct();
	}*/
		
		public function setHallId($hd=''){
			$this->hall_id=$hd;
		}
		
		public function sethallName($ce=''){
			$this->hall_name=$ce;
		}
		public function sethalllocation($hn=''){
			$this->hall_location=$hn;
		}
		public function sethallmap($mp=''){
			$this->hall_map=$mp;
		}
	
		//--------------------------- Add hall-------------------------//
		
		public function addHall()
		{
			
try
 
{
 
    $con = new Connection();
$db = $con->openConnection();
 
     // sql to create table
 
    $sql = $db->prepare("INSERT INTO hall (`hall_name`,`location`,`map`) VALUES ('$this->hall_name','$this->hall_location','$this->hall_map')") ;

    // inserting a record
 
    $sql->execute();
 
   // echo "New record created successfully";
 
}
 
catch (PDOException $e)
 
{
 
    echo "There is some problem in connection: " . $e->getMessage();
 
}
		}
		
		//------------------view category section ------------------------//
		public function viewHall(){
			$con = new Connection();
            $db = $con->openConnection();
			if(isset($this->hall_id)){
				$data = $db->query("SELECT * FROM hall WHERE hall_id = '$this->hall_id'");
				$halls = $data->fetchAll();

			}elseif(isset($this->hall_name)){
				$data = $db->query("SELECT * FROM hall WHERE hall_name='$this->hall_name");
				$halls = $data->fetchAll();
			}
			else{
$data = $db->query("SELECT * FROM hall ORDER BY hall_id DESC");
$halls = $data->fetchAll();

			}
	return $halls;		
			
			
		
}

//----------------------------delete category section -------------------------------//
	public function deleteCategory(){
		
		$this->sql="DELETE FROM tbl_category WHERE category_id='$this->category_id'";
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->affRows=mysqli_affected_rows($this->conxn);// or trigger_error($this->err=mysqli_error($this->conxn));
		if($this->affRows>0){
				return true;
				}
				else{
			return false;
		}
	
	}
	
	
	//----------------------------update category section-----------------------------//
	public function updateCategory(){
		$this->hall_id = (int)$this->hall_id; 
		
		$this->sql="UPDATE hall SET hall_name='$this->hall_name' WHERE hall_id= $this->hall_id ";
		$statement = $db->prepare($sql);
		$update = $statement->execute();


		/*$this->res=	mysqli_query($this->conxn,$this->sql);
		$this->affRows=mysqli_affected_rows($this->conxn);
		if($this->affRows>0){
			return true;
		}else{
			return false;
		}*/
	
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