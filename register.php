
<!DOCTYPE html>
<html>
<head>
<title>Quiz APP</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="stylesheet" href="css/datepicker.css">
        <link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/creditly.css">
<link rel="stylesheet" href="admin/css/custom.css">
<link rel="stylesheet" href="css/custom.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />



</head>
<?php require_once('header.php');?>

<div class="container">
<div class="content">
	<h1>Quiz App Registration</h1>
		<div class="main">
			<div class="row">
			<div class="controls">
				<form action="process/process_add_user.php" method="post" class="creditly-card-form" enctype="multipart/form-data">
					<section class="creditly-wrapper">
						<div class="credit-card-wrapper">
							<div class="form-group">
								<div class="controls">
									<label class="control-label">First Name</label>
									<input class="form-control" type="text" name="first_name" placeholder="Ram" required="required" id="fname">
									<div id="fname-error"></div>
								</div>
								<div class="controls">
									<label class="control-label">Middle Name</label>
									<input class="form-control" type="text" name="middle_name" placeholder="Bahadur" value="Bahadur" id="mname">
									<div id="mname-error"></div>
								</div>
								<div class="controls">
									<label class="control-label">Last Name</label>
									<input class="form-control" type="text" name="last_name" placeholder="Thapa" required="required" id="lname">
									<div id="lname-error"></div>
								</div>
								<div class="controls">
									<label class="control-label">User Name</label>
									<input class="form-control" type="text" name="username" placeholder="Rambahadur" id="usr" required="required">
									<div class="msg"></div>
								</div>
								<div class="controls">
									<label class="control-label">Password</label>
									<input class="form-control" type="password" name="password" placeholder="******" id="password" required="required">
									<span id="strength"></span>
								</div>
								<div class="controls">
									<label class="control-label">Confirm Password<div id="message"></div></label>
									<input class="form-control" type="password" name="ckpassword" placeholder="******" id="checkpassword" required="required">
								</div>

								<div class="controls">
									<label class="control-label">Email</label>
									<input class="form-control" type="email" name="email" placeholder="ram@gmail.com" value="ram@gmail.com" required="required">
								</div>
								<div class="controls">
									<label class="control-label">Address</label>
									<input class="form-control" type="text" name="address" placeholder="kathmandu" value="kathmandu" required="required">
								</div>
								<div class="controls">
									<label class="control-label">Profile Picture</label>
									<input type="file" name="user_thumb_image"/>
								</div>
								<div class="controls">
									<label class="control-label">Date Of Birth</label>
									<input class="form-control" type="text" id="dob" name="dob" placeholder="09-08-1993" required="required">
								</div>
								
								
 <label class="control-label" for="field1">Phone Number</label>
                    <div class="entry input-group col-xs-12">
                        <input class="form-control" name="fields[]" type="text" placeholder="Type answers here" id="phone-number" required="required"/>
                      <span class="input-group-btn">
                          <button class="btn btn-success btn-add" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </span>
                    </div>
                    <div id="phonenum_error_message"></div><button class="submit"><span>SUBMIT</span></button>
</div>
                 
            </div> 
		  </div>
</div>	
					</div>		
						
					</section>
					
				</form>
			
		
       
        
  <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script language="JavaScript" type="text/javascript" src="js/custom.js"></script>
        
        <!-- Load jQuery and bootstrap datepicker scripts -->
       
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#dob').datepicker({
                    format: "dd/mm/yyyy",
                    autoclose: true,
                   endDate: '+0d'
                });  
            
            });



                 $(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
    $(this).parents('.entry:first').remove();

    e.preventDefault();
    return false;
  });
});
        </script>

     </body>
</html>
