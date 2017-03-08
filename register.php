<?php
	session_start();
	require 'dbConnect.php';
	if(isset($_POST['collegeName']))
	{
		$cc=$_POST['collegeName'];
		$checkQuery="Select CollegeName,EmailId from college_Register where CollegeCode='$cc'";
		$checkResult=mysqli_query($connect,$checkQuery)or die();
		$num=mysqli_num_rows($checkResult);
		if($num>0)
		{
			$row=mysqli_fetch_assoc($checkResult);
			$str=$row['CollegeName'].' has Already Registered (Email Id:'.$row['EmailId'].')';
			echo json_encode($str);
			die();
		}
		else
		{
			$nameQuery="Select CollegeName from uptu_college where CollegeId='$cc'";
			$nameResult=mysqli_query($connect,$nameQuery)or die();
			$row=mysqli_fetch_assoc($nameResult);
			$collegeName=mysqli_real_escape_string($connect,$row['CollegeName']);
			$email=$_POST['email'];
			$mob=$_POST['mobileNo'];
			$website=str_replace('"','\"',(str_replace("'",'\'',$_POST['website'])));
			$collegeAddress=mysqli_real_escape_string($connect,$_POST['collegeAddress']);
			$collegeCity=mysqli_real_escape_string($connect,$_POST['collegeCity']);
			$chars = "abcdefghijkmnpqrstuvwxyz23456789@";
			$length=8;
			srand((double)microtime()*1000000);
			$str = "";
			$i = 0;
			
			while($i <= $length){
				$num = rand() % 33;
				$tmp = substr($chars, $num, 1);
				$str = $str . $tmp;
				$i++;
			}
			$addQuery="INSERT INTO college_Register (CollegeCode,CollegePass,CollegeName,Address,City,EmailId,MobileNo,Website) VALUES ('$cc','$str','$collegeName','$collegeAddress','$collegeCity','$email','$mob','$website')";
			$addResult=mysqli_query($connect,$addQuery)or die(mysqli_error($connect));
			$loginAdd="INSERT INTO zonal_login (Login1,Login2,Login3) VALUES ('$email','$str','USER')";
			$addResult=mysqli_query($connect,$loginAdd)or die(mysqli_error($connect));
			$body='Welcome To Dr. Abdul Kalam Technical Management And Literary Fest. Your Email Id: '.$email.', Your Password is: '.$str;
			$uname="kietgzb";
			$pwd="123456";
			
			$senderid="KIETGZ";
			$response="0";
			$message=$body;
			$data="username=".$uname."&pass=".$pwd."&senderid=".$senderid."&dest_mobileno=".$mob."&message=".$message."&response=".$response;
			
			$ch=curl_init('http://203.129.203.243/blank/sms/user/urlsms.php');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result=curl_exec($ch);
			curl_close($ch);
			echo json_encode('valid');
		}
		//echo json_encode('abc');
	}
?>