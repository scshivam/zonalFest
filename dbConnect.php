<?php
$user='root';
$password='';
$host='127.0.0.1';
$db='uptuzonal';
if($connect=mysqli_connect($host,$user,$password,$db)){
    date_default_timezone_set('Asia/Kolkata');
	
}else{
	
   // die();
}
?>