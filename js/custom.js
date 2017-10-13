
$(document).ready(function(){

$('.question-wrapper:not(:first)').hide();
$('.question-wrapper:first #prev:last').hide();
$('.question-wrapper:last #next:last').hide();
$('.question-wrapper:last #submitbtn').show();


$('.next').on("click",function(){
		var parent = $(this).parent().parent().hide();
				$(parent).next().show();
				
				});

$('.previous').on("click",function(){
				
				var par = $(this).parent().parent().hide();
				$(par).prev().show();
				
				});
$(document).on('click','li',function(){
			$('#play').show();
			$('.select_cat').hide();
		});

/*username availability check use of ajax*/
$('#usr').keyup(function(){
	var user = $(this).val();
	$.ajax({
		url:'process/usercheck.php',
		method:"POST",
		data:{user:user},
		datatype:"text",
		success:function(data){
			$('.msg').addClass('success');
			$('.msg').text(data);
			
		},
		error:function(data){
			$('.msg').addClass('error');
			$('.msg').text(data);
			
		}
	});
});

/*user login check validation*/
$('#userlogin').click(function(){
	var form = $('#login_form');
	if($('#login_username').val() == "" || $('#login_password').val() == ""){
		$('.login-danger').html('Please enter username and password');
	}else{

		$.post($('#login_form').attr('action'),$('#login_form :input').serializeArray(),
				function(data){
					if(jQuery.trim(data) === "success"){
						//console.log('hello');
						window.location.href="index.php"; 
					}else{
						$('.login-danger').addClass('alert alert-danger ')
					$('.login-danger').html(data);					
					}
					});
				}
		});
	
	$('#login_form').submit(function(){
		return false;
	});
		
/*check password match*/
$('#checkpassword').on('keyup', function () {
    if ($(this).val() == $('#password').val()) {
    	$('#message').html('');
        $(".submit").attr("disabled", false);
    } else{ 
    	$('#message').html('not matching').css({'color':'red','font-size':'1em'});
     $(".submit").attr("disabled", true);
 }
});

/*strength of password*/
$('#password').on('keyup',function(){
	var len = $('#password').val().length;
	if(len<1){
	$('#strength').html('');
	$('#strength').removeClass('red');
	$('#strength').removeClass('orange');
	$('#strength').removeClass('green');

	}
	else if(len<=4){

	$('#strength').html("Weak");
	$('#strength').addClass('red');
	$('#strength').removeClass('orange');
	$('#strength').removeClass('green');

	}else if(len<=8){
		$('#strength').html('Good');
		$('#strength').addClass('orange');
		$('#strength').removeClass('red');
		$('#strength').removeClass('green');
	
	}else{
		$('#strength').html('Strong');
		$('#strength').addClass('green');
		$('#strength').removeClass('orange');
		$('#strength').removeClass('red');
	
	}

});

/*cancel quiz game*/
$("tr").not(":first").addClass('ans');
$('.close').on('click',function(){
	window.location.href="../index.php";
})

/*Phone number validation on registration*/
$('#phone-number').on('keyup',function(e){
	var patternphone= new RegExp(/^\d{10}$/);
	var phone = $("#phone-number").val();
   if(patternphone.test(phone)){
   	$("#phonenum_error_message").addClass('validphone');
   	$('#phonenum_error_message').removeClass('invalidphone');
    $("#phonenum_error_message").hide();
    $('.submit').attr("disabled", false);
   }
   else{
   	$('#phonenum_error_message').addClass('invalidphone');
   	$('#phonenum_error_message').removeClass('validphone');
   	$("#phonenum_error_message").html("Invalid phone number");
   $("#phonenum_error_message").show();
   e.preventDefault();
   $('.submit').attr("disabled", true);
   }
  
});

/*dynamic input field validation on registration*/

$('.btn btn-success btn-add').on('click',function(e){
	var patternphone= new RegExp(/^\d{10}$/);
	var phone = $("#phone-number").val();
   if(patternphone.test(phone)){
   	$("#phonenum_error_message").addClass('validphone');
   	$('#phonenum_error_message').removeClass('invalidphone');
    $("#phonenum_error_message").hide();
    $('.submit').attr("disabled", false);
   }
   else{
   	$('#phonenum_error_message').addClass('invalidphone');
   	$('#phonenum_error_message').removeClass('validphone');
   	$("#phonenum_error_message").html("Invalid phone number");
   $("#phonenum_error_message").show();
   e.preventDefault();
   $('.submit').attr("disabled", true);
   }
  
});

/*first name middle name last name regular expression check*/
$('#fname').on('keyup',function(e){
	var patternname= new RegExp(/^[a-zA-Z]+$/);
	var firstname = $("#fname").val();
   if(patternname.test(firstname)){
    $("#fname-error").hide();
   } else{
   	$("#fname-error").html("Only characters only");
   $("#fname-error").show();
   e.preventDefault();
   }
});

$('#mname').on('keyup',function(e){
	var patternname= new RegExp(/^[a-zA-Z]+$/);
	var middlename = $("#mname").val();

 if(patternname.test(middlename)){
   		$("#mname-error").hide();
   }
   else if(middlename == ''){
   	$("#mname-error").html("");
   } else{
   	$("#mname-error").html("Only characters only");
   $("#mname-error").show();
    e.preventDefault();
   }
});


$('#lname').on('keyup',function(e){
	var patternname= new RegExp(/^[a-zA-Z]+$/);
	var lastname = $("#lname").val();

 if(patternname.test(lastname)){
   		$("#lname-error").hide();
   } else{
   	$("#lname-error").html("Only characters only");
   $("#lname-error").show();
    e.preventDefault();
   }
});

/* timer for first page */
if(window.location.href == 'http://localhost:7080/quiz/process/process_playQuiz.php'){
	var count = 100;
	var counter = setInterval(timer,1000);

	function timer(){
		count--;
		if(count == 0){
			clearInterval(counter);
			$('#next').hide();
		$('#submitbtn').show();
		}
		document.getElementById('num').innerHTML = 'You have ' + ' ' + count + '' + ' seconds to answer';
	}
	timer();
}
});

