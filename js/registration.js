jQuery('#registrationSubmit').click(function(){
    var collegeName=jQuery('#collegeName').val();
    var email=jQuery('#emailId').val();
    var mobileNo=jQuery('#mobileNo').val();
    var website=jQuery('#website').val();
    if(website=='')
    {
    	alert('Invalid Website');
    	return false;
    }
    var collegeAddress=jQuery('#collegeAddress').val();
    if(collegeAddress=='')
    {
    	alert('Invalid Address');
    	return false;
    }
    var collegeCity=jQuery('#collegeCity').val();
    if(collegeCity=='')
    {
    	alert('Invalid City');
    	return false;
    }
	var email=document.getElementById('emailId').value;
	var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
	var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
	var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
	var sQuotedPair = '\\x5c[\\x00-\\x7f]';
	var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
	var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
	var sDomain_ref = sAtom;
	var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
	var sWord = '(' + sAtom + '|' + sQuotedString + ')';
	var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
	var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
    var sAddrSpec = sLocalPart + '\\x40' + sDomain; 
    var sValidEmail = '^' + sAddrSpec + '$'; 
	
    var reValidEmail = new RegExp(sValidEmail);
	
    if(!(reValidEmail.test(email)))
    {
		alert("Invalid E-mail Id..");
		return false;
	}
	if(email.indexOf('.')==-1)
	{
		alert("Invalid E-mail Id..");
		return false;
	}
	var y = document.getElementById('mobileNo').value;
	
	if(isNaN(y)||y.indexOf(" ")!=-1)
	{
		alert("Invalid Mobile No.");
		return false;
	}
	
	if (y.length>10 || y.length<10)
	{
		alert("Mobile No. should be 10 digit");
		return false;
	}
	if (!(y.charAt(0)=="9" || y.charAt(0)=="8" || y.charAt(0)=="7"))
	{
		alert("Invalid Mobile No.");
		return false;
	}
    jQuery.ajax({
        url:"register.php",
        type:"POST",
        data: {collegeName : collegeName,email:email,mobileNo:mobileNo,website:website,collegeAddress:collegeAddress,collegeCity:collegeCity},
        success:function(data){
			
            var result=eval(data);
            if(result=='valid'){
			jQuery('#registrationResult').html("An SMS will be sent on to your Registered Mobile No.");
				jQuery('#emailId').val("");
				jQuery('#mobileNo').val("");
				jQuery('#website').val("");
				jQuery('#collegeAddress').val("");
				jQuery('#collegeCity').val("");
				}else{
                jQuery('#registrationResult').html(result);
				
			}
			
		}
	});
});
