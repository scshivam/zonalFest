jQuery('#loginSubmit').click(function(){
    var loginId=jQuery('#loginId').val();
    var loginPass=jQuery('#loginPass').val();
    
    jQuery.ajax({
        url:"authentication.php",
        type:"POST",
        data: {loginId : loginId,loginPass:loginPass},
        success:function(data){

            var result=eval(data);
            if(result=='valid'){
                location.reload();
            }
			else if(result=='Your Password Contains Invalid Characters')
			{
				jQuery('#loginResult').html('Your Password Contains Invalid Characters!!');
			}
			else if(result=='Your Email Id Contains Invalid Characters')
			{
				jQuery('#loginResult').html('Your Email Id Contains Invalid Characters!!');
			}
			else{
                jQuery('#loginResult').html('UserName or Password are Incorrect!!');

            }

        }
    });
});
