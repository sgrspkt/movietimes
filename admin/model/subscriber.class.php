<?php
require_once('connection.class.php');
class Subscriber extends Connection{
		private $subscriber_id;
		private $subscriber_email;

		public function __construct(){
		parent:: __construct();
	}
		
		public function setSubscriberId($sd=''){
			$this->subscriber_id=$sd;
		}
		
		public function setSubscriberName($se=''){
			$this->subscriber_email=$se;
		}
	
		
		
		//--------------------------- Add subscriber-------------------------//
		
		public function addcategory()
		{
			
			 $this->sql="INSERT INTO tbl_category (category_id,category_name) VALUES ('$this->category_id','$this->category_name')";
			$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->affRows=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
			
			if($this->affRows>0){
				
				return true;
			}
			else{
				return false;
			}
			

		}
		
		//------------------view category section ------------------------//
		public function viewCategory(){
			if(isset($this->category_id)){
				$this->sql="SELECT * FROM tbl_category WHERE category_id='$this->category_id'";
				
			}elseif(isset($this->category_name)){
			$this->sql="SELECT * FROM tbl_category WHERE category_name='$this->category_name'";
				
			}
			else{
			$this->sql="SELECT * FROM tbl_category ORDER BY category_id DESC";
			
			}
			
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
		$this->category_id = (int)$this->category_id; 
		
		$this->sql="UPDATE tbl_category SET category_name='$this->category_name' WHERE category_id= $this->category_id ";
		
		$this->res=	mysqli_query($this->conxn,$this->sql);
		$this->affRows=mysqli_affected_rows($this->conxn);
		if($this->affRows>0){
			return true;
		}else{
			return false;
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