<?php
	session_start();
	require 'dbConnect.php';
	if(isset($_POST['loginId']) && isset($_POST['loginPass'])){
		$loginId=mysqli_real_escape_string($connect,$_POST['loginId']);
		$loginPass=mysqli_real_escape_string($connect,$_POST['loginPass']);
		$hash1=$_POST['loginId'];
		$hash2=$_POST['loginPass'];
		if(preg_match('/\s/', $hash1)) {
		echo json_encode('Your Email Id Contains Invalid Characters');
		die();
		}
		
		if(preg_match('/[\'"]/', $hash1)){
		echo json_encode('Your Email Id Contains Invalid Characters');
		die();
		}
		
		if(preg_match('/[\/\\\\]/', $hash1)){
		echo json_encode('Your Email Id Contains Invalid Characters');
		die();
		}
		
		if(preg_match('/(AND|null|where|limit)/i', $hash1)) {
		echo json_encode('Your Email Id Contains Invalid Characters');
		die();
		}
		
		
		if(preg_match('/(union|select|from|where)/i', $hash1)) {
		echo json_encode('Your Email Id Contains Invalid Characters');
		die();
		}
		
		if(preg_match('/(order|having|limit)/i', $hash1)) {
		echo json_encode('Your Email Id Contains Invalid Characters');
		die();
		}
		
		
		if(preg_match('/(into|file|case)/i', $hash1)) {
		echo json_encode('Your Email Id Contains Invalid Characters');
		die();
		}
		
		
		if(preg_match('/(--|#|\/\*\!\$\%\^\&\(\))/', $hash1)){
		echo json_encode('Your Email Id Contains Invalid Characters');
		die();
		}
		
		
		if(preg_match('/\s/', $hash2)) {
		echo json_encode('Your Password Contains Invalid Characters');
		die();
		}
		
		if(preg_match('/[\'"]/', $hash2)){
		echo json_encode('Your Password Contains Invalid Characters');
		die();
		}
		
		if(preg_match('/[\/\\\\]/', $hash2)) {
		echo json_encode('Your Password Contains Invalid Characters');
		die();
		}
		
		if(preg_match('/(and|null|where|limit)/i', $hash2)) {
		echo json_encode('Your Password Contains Invalid Characters');
		die();
		}
		
		
		if(preg_match('/(union|select|from|where)/i', $hash2)) {
		echo json_encode('Your Password Contains Invalid Characters');
		die();
		}
		
		if(preg_match('/(order|having|limit)/i', $hash2)) {
		echo json_encode('Your Password Contains Invalid Characters');
		die();
		}
		
		if(preg_match('/(into|file|case)/i', $hash2)){
		echo json_encode('Your Password Contains Invalid Characters');
		die();
		}
		
		if(preg_match('/(--|#|\/\*\!\$\%\^\&\(\))/', $hash2)) {
		echo json_encode('Your Password Contains Invalid Characters');
		die();
		}
	
		$loginQuery="SELECT Login3 FROM zonal_login WHERE Login1='$loginId' AND Login2='$loginPass' ";
		$loginResult=mysqli_query($connect,$loginQuery);
		$loginNum=mysqli_num_rows($loginResult);
		if($loginNum>0){
			$loginRow=mysqli_fetch_assoc($loginResult);
			$_SESSION['Login3']=$loginRow['Login3'];
			if($_SESSION['Login3']=='USER'){
				$_SESSION['Login2']==$loginId;
				$qry1="SELECT CollegeCode FROM college_register WHERE EmailId='$loginId'";
				$res1=mysqli_query($connect,$qry1) or die(mysqli_error($connect));
				$res2=mysqli_fetch_assoc($res1);
				$_SESSION['c_id']=$res2['CollegeCode'];
				}elseif($_SESSION['Login3']=='ADMIN'){
				$_SESSION['Login2']=='Admin';
			}
			echo json_encode('valid');
			}else{
			echo json_encode('invalid');
		}
		
	}
