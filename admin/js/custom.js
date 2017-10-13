     $(document).ready(function () {
             
     $('#sign-in-admin').click(function(){
        console.log($('#admin_username').val());
    var form = $('#login-admin-form');
    if($('#admin_username').val() == "" || $('#admin_password').val() == ""){
        $('.login-danger').html('Please enter username and password');
    }else{

        $.post($('#login-admin-form').attr('action'),$('#login-admin-form :input').serializeArray(),
                function(data){
                    if(jQuery.trim(data) === "success"){
                        window.location.href="index.php"; 
                    }else{
                        console.log(data);
                        $('.login-danger').addClass('alert alert-danger ')
                    $('.login-danger').html(data);                  
                    }
                    });
                }
        });
    
    $('#login-admin-form').submit(function(){
        return false;
    });        

     });      
     /*plus minus script*/
     
          $(function()
{
    $(document).on('click', '.btn-adds', function(e)
    {
        e.preventDefault();
        var controlForm = $('.controls form:first');
    currentEntry = $(this).parents('.entry:first');
            newEntry = $(currentEntry.clone()).appendTo(controlForm);
        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-adds')
            .removeClass('btn-adds').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
    $(this).parents('.entry:first').remove();

    e.preventDefault();
    return false;
  });
});



