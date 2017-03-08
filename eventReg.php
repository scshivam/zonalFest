<?php
session_start();
require 'dbConnect.php';
if(!isset($_SESSION['Login3'])) {
    header('Refresh:0;url=index.php');
    die();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Registration</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    
</head>

<body>

<!-- Navigation -->
<?php include 'header.php'; ?>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Event Registration

            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a>
                </li>
                <li class="active">Event Registration</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <!-- Sidebar Column -->
        <div class="col-md-3">
            <h4>Technical Events</h4>
            <div class="list-group">
                <?php
                $eventQuery="SELECT * FROM events WHERE EventType='TECHNICAL' ORDER BY EventName ";
                $eventResult=mysqli_query($connect,$eventQuery);
                while($eventRow=mysqli_fetch_assoc($eventResult)) {
                ?>
                    <a  class="list-group-item" id="<?php echo $eventRow['EventId']; ?>"><i class="<?php echo $eventRow['Icon']; ?>"></i> <?php echo $eventRow['EventName']; ?><span class="badge"><?php echo $eventRow['MaxParti']; ?></span></a>
                <?php } ?>

            </div>
            <h4>Literary Events</h4>
            <div class="list-group">
                <?php
                $eventQuery="SELECT * FROM events WHERE EventType='LITERARY' ORDER BY EventName ";
                $eventResult=mysqli_query($connect,$eventQuery);
                while($eventRow=mysqli_fetch_assoc($eventResult)) {
                    ?>
                    <a  class="list-group-item" id="<?php echo $eventRow['EventId']; ?>"><i class="<?php echo $eventRow['Icon']; ?>"></i> <?php echo $eventRow['EventName']; ?><span class="badge"><?php echo $eventRow['MaxParti']; ?></span></a>
                <?php } ?>

            </div>
            <h4>Mangement Events</h4>
            <div class="list-group">
                <?php
                $eventQuery="SELECT * FROM events WHERE EventType='MANAGEMENT' ORDER BY EventName ";
                $eventResult=mysqli_query($connect,$eventQuery);
                while($eventRow=mysqli_fetch_assoc($eventResult)) {
                    ?>
                    <a  class="list-group-item" id="<?php echo $eventRow['EventId']; ?>"><i class="<?php echo $eventRow['Icon']; ?>"></i> <?php echo $eventRow['EventName']; ?><span class="badge"><?php echo $eventRow['MaxParti']; ?></span></a>
                <?php } ?>

            </div>
        </div>

        <!-- Content Column -->
        <div class="col-md-9">
            <div class="alert alert-info">
            <p><i class="fa fa-hand-o-right "></i> Here, you can register the participant(s) for the events from your college.</p>
            <p><i class="fa fa-hand-o-right "></i> Click on any event to register participants</p>
                </div>
            <?php
            $cid=$_SESSION['c_id'];
            $eventQuery="SELECT * FROM events WHERE 1 ORDER BY EventName ";
            $eventResult=mysqli_query($connect,$eventQuery);
            while($eventRow=mysqli_fetch_assoc($eventResult)) {
                ?>
                <div class="hide" id="event<?php echo $eventRow['EventId']; ?>">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4><i class="<?php echo $eventRow['Icon']; ?>"></i> <?php echo $eventRow['EventName']; ?></h4>
                        </div>
                        <div class="panel-body">
                        <form action="student_registration.php" method="POST">
                        <input name="event" value="<?php echo $eventRow['EventId']; ?>" hidden>
                            <?php
                            for($i=0;$i<$eventRow['MaxParti'];$i++){
                                $t=$i+1;
                                echo "<center><h4>Team ".$t."</h4></center>";
                                $query="Select * from event_register where Event_id='".$eventRow['EventId']."' and College_Code='$cid' and Team_No='$t'";
                                $queryrun=mysqli_query($connect,$query);
                                $r=mysqli_num_rows($queryrun);
                                if($r>0){
                                    $exe=mysqli_fetch_assoc($queryrun);

                                    for($j=0;$j<$eventRow['MaxSize'];$j++){
                                        $q=$j+1;
                                         $uni=$exe['Student'.$q];
                                         if($uni!=''){
                                            $qry1="select * from student_info where Uni_roll='$uni'";
                                            $rst1=mysqli_query($connect,$qry1);
                                            $exe1=mysqli_fetch_assoc($rst1);
                                            ?>

                                            <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" >Student Name<?php echo " ".$q;?></label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="student_<?php echo $t."_".$q;?>" value="<?php echo $exe1['S_name']?>">
                                        </div>
                                        <label class="col-md-3 control-label " >University Roll No</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" name="uni_<?php echo $t."_".$q;?>" value="<?php echo $exe1['Uni_roll']?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label " >Branch</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="Branch_<?php echo $t."_".$q;?>" value="<?php echo $exe1['Branch']?>">
                                        </div>
                                        <label class="col-md-3 control-label " >Year</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" name="Year_<?php echo $t."_".$q;?>" value="<?php echo $exe1['Year']?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label " >Mobile No</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="Mob_<?php echo $t."_".$q;?>" value="<?php echo $exe1['MOB']?>">
                                        </div>
                                        <label class="col-md-3 control-label ">Email</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="Email_<?php echo $t."_".$q;?>" value="<?php echo $exe1['Email']?>">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                            <?php
                                         }
                                         else{
                                            ?>
                                            <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" >Student Name<?php echo " ".$q;?></label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="student_<?php echo $t."_".$q;?>">
                                        </div>
                                        <label class="col-md-3 control-label " >University Roll No</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" name="uni_<?php echo $t."_".$q;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label " >Branch</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="Branch_<?php echo $t."_".$q;?>">
                                        </div>
                                        <label class="col-md-3 control-label " >Year</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" name="Year_<?php echo $t."_".$q;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label " >Mobile No</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="Mob_<?php echo $t."_".$q;?>">
                                        </div>
                                        <label class="col-md-3 control-label ">Email</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="Email_<?php echo $t."_".$q;?>">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                            <?php
                                         }
                                        

                                    }
                                }
                                else{
                                
                                for($j=0;$j<$eventRow['MaxSize'];$j++)
                                {$q=$j+1;
                                ?>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" >Student Name<?php echo " ".$q;?></label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="student_<?php echo $t."_".$q;?>">
                                        </div>
                                        <label class="col-md-3 control-label " >University Roll No</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" name="uni_<?php echo $t."_".$q;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label " >Branch</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="Branch_<?php echo $t."_".$q;?>">
                                        </div>
                                        <label class="col-md-3 control-label " >Year</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" name="Year_<?php echo $t."_".$q;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label " >Mobile No</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="Mob_<?php echo $t."_".$q;?>">
                                        </div>
                                        <label class="col-md-3 control-label ">Email</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="Email_<?php echo $t."_".$q;?>">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            <?php
                            }
                        }
                            echo"<hr style='border:2px;'>";
                        }
                                ?>

                                <input type="button" id="Submit" class="btn btn-primary btn-block" value="Submit Details">
</form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

    <hr>
    <?php include 'footer.php'; ?>

</div>
<script src="js/jquery.js"></script>
<script>
    jQuery('a.list-group-item').click(function(){
        jQuery('a.list-group-item').removeClass('active');
        jQuery('div[id^=event]').removeClass('show');
        jQuery('div[id^=event]').addClass('hide');
        var eventId=jQuery(this).attr('id');
        jQuery(this).addClass('active');
        console.log(eventId);
        jQuery('div#event'+eventId).toggleClass('show hide');
    })
    </script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<?php include 'scripts.php'; ?>
</body>

</html>

