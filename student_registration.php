<?php
session_start();
include'dbConnect.php';
$c_id=$_SESSION['c_id'];
$event_id=$_POST['event'];
//$student=array();
$qry1="SELECT Id FROM event_register WHERE Event_id='$event_id' AND College_Code='$c_id'";
$res1=mysqli_query($connect,$qry1) or die(mysqli_error($connect));
$nm1=mysqli_num_rows($res1);
$eventQuery="SELECT * FROM events WHERE EventId='$event_id' ";
            $eventResult=mysqli_query($connect,$eventQuery);
            $eventRow=mysqli_fetch_assoc($eventResult);

            for($i=0;$i<$eventRow['MaxParti'];$i++){
                	$t=$i+1;
                    
                    for($j=0;$j<$eventRow['MaxSize'];$j++)
                                {	$q=$j+1;
                                	if(isset($_POST['uni_'.$t.'_'.$q])){

                                		 $uni[$j]=mysqli_real_escape_string($connect,$_POST['uni_'.$t.'_'.$q]);
                                		if(isset($_POST['uni_'.$t.'_'.$q]))
                                			$student[$j]=mysqli_real_escape_string($connect,$_POST['student_'.$t.'_'.$q]);
                                		else
                                			$student[$j]='';
                                		if(isset($_POST['Branch_'.$t.'_'.$q]))
                                			$Branch[$j]=mysqli_real_escape_string($connect,$_POST['Branch_'.$t.'_'.$q]);
                                		else
                                			$Branch[$j]='';
                                		if(isset($_POST['Year_'.$t.'_'.$q]))
                                			$Year[$j]=mysqli_real_escape_string($connect,$_POST['Year_'.$t.'_'.$q]);
                                		else
                                			$Year[$j]='';
                                		if(isset($_POST['Mob_'.$t.'_'.$q]))
                                			$Mob[$j]=mysqli_real_escape_string($connect,$_POST['Mob_'.$t.'_'.$q]);
                                		else
                                			$Mob[$j]='';
                                		if(isset($_POST['Email_'.$t.'_'.$q]))
                                			$Email[$j]=mysqli_real_escape_string($connect,$_POST['Email_'.$t.'_'.$q]);
                                		else
                                			$Email[$j]='';
                                	}
                                	else{
                                		$uni[$j]='';
                                	}
                                		

                                }
                                	if($uni[0]!=''){
                                		if($nm1>$i)
											{
												 $qry2="UPDATE event_register SET Student1='$uni[0]',Student2='$uni[1]',Student3='$uni[2]',Student4='$uni[3]' where Team_No='$t' and College_Code='$c_id' and Event_id='$event_id'";
												$res2=mysqli_query($connect,$qry2);

												for($j=0;$j<$eventRow['MaxSize'];$j++){
													if($uni[$j]!=''){
														$qry3="select * from student_info where Uni_roll='$uni[$j]'";
														$res3=mysqli_query($connect,$qry3);
														$nm3=mysqli_num_rows($res3);
														if($nm3>0){
															 $qry4="UPDATE student_info set S_name='$student[$j]',Branch='$Branch[$j]',Year='$Year[$j]',MOB='$Mob[$j]',Email='$Email[$j]' where Uni_roll='$uni[$j]'";
															$res4=mysqli_query($connect,$qry4);

														}
														else{
														$qry4="insert into student_info (Uni_roll,S_name,C_id,Branch,Year,MOB,Email) values ('$uni[$j]','$student[$j]','$c_id','$Branch[$j]','$Year[$j]','$Mob[$j]','$Email[$j]')";
														$res4=mysqli_query($connect,$qry4);

													}
													}
												}
											}
											else{
												$qry2="insert into event_register (Team_No,College_Code,Event_id,Student1,Student2,Student3,Student4) values ('$t','$c_id','$event_id','$uni[0]','$uni[1]','$uni[2]','$uni[3]')";
												$res2=mysqli_query($connect,$qry2);


												for($j=0;$j<$eventRow['MaxSize'];$j++){
													if($uni[$j]!=''){
														$qry3="select * from student_info where Uni_roll='$uni[$j]'";
														$res3=mysqli_query($connect,$qry3);
														$nm3=mysqli_num_rows($res3);
														if($nm3>0){
															 $qry4="update student_info set S_name='$student[$j]',Branch='$Branch[$j]',Year='$Year[$j]',MOB='$Mob[$j]',Email='$Email[$j]' where Uni_roll='$uni[$j]'";
															$res4=mysqli_query($connect,$qry4);


														}
														else{
														 $qry4="insert into student_info (Uni_roll,S_name,C_id,Branch,Year,MOB,Email) values ('$uni[$j]','$student[$j]','$c_id','$Branch[$j]','$Year[$j]','$Mob[$j]','$Email[$j]')";
														$res4=mysqli_query($connect,$qry4);

													}
													}
												}
											}

                                	}
                                	else
                                		{
                               		 $t;

                     }
             }	
            header('Location:eventReg.php');
?>