<?php

class Test extends connection{
	private $test_id;
	private $user_id;
	private $category_id;
	private $correct_ans;
	private $incorrect_ans;
	private $score;
	private $bestscore;
	private $question_id;
	private $answer;
	private $game_id;
	
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function setTestId($td=''){
		$this->test_id=$td;
	}
	public function setUserId($ud=''){
		$this->user_id=$ud;
	}
	public function setGameId($gd=''){
		$this->game_id=$gd;
	}
	public function setCategoryId($cd=''){
		$this->category_id=$cd;
	}
	public function setCategoryName($cn=''){
		$this->category_name=$cn;
	}
	public function setUserAnswerId($uad=''){
		$this->user_answer_id=$uad;
	}
	public function setCorrectAns($ca=''){
		$this->correct_answer=$ca;
	}
	public function setScore($se=''){
		$this->score=$se;
	}
	public function setUserAnswer($ur=''){
		$this->user_answer=$ur;
	}
	
	public function setBestScore($be=''){
		$this->best_score=$be;
	}
	
	public function setQuestionId($qd=''){
		$this->question_id=$qd;
	}
	
	//-----------------------------adding the test----------------------------------//
	public function addTest(){
		
$this->sql = "INSERT INTO  tbl_user_answer (question_id,answer,user_id,category_id) VALUES('$this->question_id','$this->user_answer','$this->user_id','$this->category_id')";
					
					 $this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
					$this->affRows=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
					 
					if(($this->affRows)>0){
						return true;
					}
					else{
						return false;
					}
	}
	//--------------------------add score section----------------------------------//
public function addScore(){


	$this->sql_correct_answer = "SELECT count(*)as correct_answer FROM tbl_user_answer ua join tbl_correct_answer ca
						 on ua.question_id = ca.question_id where ua.answer = ca.correct_answer AND ua.user_id='$this->user_id' AND ua.question_id!=0 ";
	$this->sql_incorrect_answer = "SELECT count(*)as incorrect_answer FROM tbl_user_answer ua join tbl_correct_answer ca
					 on ua.question_id = ca.question_id where ua.answer <> ca.correct_answer AND ua.user_id='$this->user_id' AND ua.question_id!=0";

$this->sql = "INSERT INTO  tbl_test (test_id,user_id,category_id,correct_ans,incorrect_ans,score,bestscore)
			 VALUES('$this->test_id','$this->user_id','$this->category_id',($this->sql_correct_answer),($this->sql_incorrect_answer),($this->sql_correct_answer),($this->sql_correct_answer))";


 $this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
					$this->affRows=mysqli_affected_rows($this->conxn) or trigger_error($this->err=mysqli_error($this->conxn));
					 
					if(($this->affRows)>0){
						return true;
					}
					else{
						return false;
					}

}
//-------------------------------------get highest score--------------------------//

public function getHighestScore(){

if(isset($this->user_id)){
$this->sql_correct_answer = "SELECT count(*)as correct_answer FROM tbl_user_answer ua join tbl_correct_answer ca

						 on ua.question_id = ca.question_id where ua.answer = ca.correct_answer AND ua.user_id='$this->user_id'";
}else{
	 $this->sql_correct_answer = "SELECT u.username,max(t.bestscore) as score FROM
			 tbl_test t JOIN tbl_user u on t.user_id = u.user_id
			 JOIN tbl_category c
			 on t.category_id = c.category_id ORDER BY u.username";

} 

 $this->res=mysqli_query($this->conxn,$this->sql_correct_answer) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->numRows=mysqli_num_rows($this->res);
		$this->row=array();
		if($this->numRows>0){

		while($this->row=mysqli_fetch_assoc($this->res)){
			array_push($this->data,$this->row);
			
			
		}
		}
		return $this->data;
					}


	
	//------------------------------view score section------------------------------//
	public function viewScore(){
		
		if(isset($this->user_id)){
			$this->sql="SELECT u.username,t.correct_ans,t.incorrect_ans,t.score,t.bestscore,c.category_name FROM
			 tbl_test t JOIN tbl_user u on t.user_id = u.user_id
			 JOIN tbl_category c
			 on t.category_id = c.category_id WHERE user_id='$this->user_id'";
		}
		
			 else{
			 	$this->sql="SELECT u.username,t.correct_ans,t.incorrect_ans,t.score,t.bestscore,c.category_name FROM
			 tbl_test t JOIN tbl_user u on t.user_id = u.user_id
			 JOIN tbl_category c
			 on t.category_id = c.category_id";
			 }
			
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
		$this->numRows=mysqli_num_rows($this->res);
		$records = ($this->numRows)/5;
		$records = ceil($records);
		
		echo "<ul class='pagination'>";
		for($a=1;$a<=$records;$a++){
			//echo $a;
  			echo "<li><a href='index.php?page=score&action=view&pageNumber=$a'>" .$a. "</a></li>";
		}
			echo "</ul>";

		$pageNumber = $_GET['pageNumber']; 
		if($pageNumber == '' || $pageNumber == '1'){
			$pageNumber1 = 1;
		}else{
			$pageNumber1 = ($pageNumber*5)-5;
		}

	    $this->sql="SELECT u.username,t.correct_ans,t.incorrect_ans,t.score,t.bestscore,c.category_name FROM
			 tbl_test t JOIN tbl_user u on t.user_id = u.user_id
			 JOIN tbl_category c
			 on t.category_id = c.category_id LIMIT $pageNumber1,5";
			 
		$this->resSet=mysqli_query($this->conxn,$this->sql) or trigger_error($this->err=mysqli_error($this->conxn));
			$this->rows=array();
				if($this->numRows>0){

		while($this->rows=mysqli_fetch_assoc($this->resSet)){
			array_push($this->data,$this->rows);
			
		}
		}
		return $this->data;
}
}
?>