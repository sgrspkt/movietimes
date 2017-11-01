<?php
require_once('connection.class.php');

class Rating extends Connection{
		private $rating_id;
		private $rating_value;
		private $movie_id;
		private $name;
		private $email;

		/*public function __construct(){
		parent:: __construct();
	}*/

		public function setRatingId($ri=''){
			$this->rating_id=$ri;
		}

		public function setRatingValue($re=''){
			$this->rating_value=$re;
		}
		public function setMovieId($md=''){
			$this->movie_id=$md;
		}
		public function setName($se=''){
			$this->name=$se;
		}
		public function setEmail($el=''){
			$this->email=$el;
		}

		//--------------------------- Add rating-------------------------//

		public function addRating()
		{
try

{

    $con = new Connection();
$db = $con->openConnection();

     // sql to create table

    $sql = $db->prepare("INSERT INTO rating (`rating_value`,`movie_id`,`name`,`email`) VALUES ('$this->rating_value','$this->movie_id','$this->name','$this->email')") ;

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

		//------------------view rating section ------------------------//
		public function viewRating(){
			$con = new Connection();
            $db = $con->openConnection();
			if(isset($this->movie_id)){
				$data = $db->query("SELECT * FROM rating WHERE movie_id = '$this->movie_id'");
				$rating = $data->fetchAll();

			}elseif(isset($this->name)){
				$data = $db->query("SELECT * FROM rating WHERE name='$this->name");
				$rating = $data->fetchAll();
			}
			else{
$data = $db->query("SELECT * FROM rating ORDER BY rating_id DESC");
$rating = $data->fetchAll();

			}
	return $rating;



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
