<div>
	<?php
	require_once('admin/classes/connection.class.php');
	require_once('admin/classes/category.class.php');
	require_once('admin/classes/question-answer.class.php');
	?>
	<?php

	$viewobj=new QuestionAnswer();
	
	$views=$viewobj->viewQa();

/*echo '<pre>';
print_r($viewobj);
*/


	?>
	
	<!DOCTYPE html>
	<html>
	<head>
	<title>QuizApp | Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/search.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<script src="popup/js/jquery.min.js" language="JavaScript" type="text/javascript" ></script>

	</head>
	<div class="container">
	<div class="row">
	<style type="text/css">
	.row{
	 color:blue;
	 background-color: green;
	 }</style>
	                <form method="post" action="process/process_test.php">
	                 
	                  <?php



	  if(sizeof($views>0)){
	    
	   $newArr = array();
	    foreach($views as $paper) {
	        $id = $paper['category_name'];
	        if (!isset($newArr[$id])) {
	            $newArr[$id] = $paper;
	            $newArr[$id]['answer'] = array();
	        }
	        $newArr[$id]['answer'][] = $paper['answer'];
	    }
	
	    
	$counter = 0;
	  foreach($newArr as $value){
	  	echo '<div class="question-wrapper"><table id="questions-'.$counter.'" class="table table-bordered table-hover" border="0">';
	   echo '<tr><td>'.$value['question_title'].'</td></tr>' ;
	  	foreach ($value['answer'] as $key => $values) {
	  		# code...
	  		$ans = $value['question_id'];
	  		echo '<tr><td><input type="radio" name="'.$ans.'" class="answer" value="'.$values.'">'.$values.'</td></tr>';
	  		
	  	}

	 
	echo '</table><ul class="pager pager-'.$counter.'">
	  <li class="previous" id="prev"><a href="#">Previous</a></li>
	  <li class="next" name="next" id="next"><a href="#">Next</a></li>
	</ul></div>';
	  ?>    
	                <?php
	                $counter++;
	}
	}
	else{
		echo '<div class=score>Your Score is : </div>';
	}
	                ?>
	            

<input type="hidden" name="category-name" id="category-name"/>
<button type="submit" class="btn btn-primary" name="submit">Submit</button>
<script type="text/javascript" src="js/custom.js"></script>
	</form>
	</div>
</div>
	
	        <script type="text/javascript">
	        $('#playbtn').on("click",function(e){


/*var category = $('#category').val();
document.getElementById('category-name').value=category ;
if(category != ''){
					$.ajax({
						url:'',
						method:"POST",
						data:{category,category},
						success:function(data){
							//console.log($.parseJSON(data));

							//console.log(data);
						} 
					});
				}*/
$('.question-wrapper').hide();	
//	e.preventDefault();
//$('.question-wrapper:not(:first)').hide();


});	</script>
	</body>
	</html>
</div>