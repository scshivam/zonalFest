<?php
require 'dbConnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dr A.P.J.A.K.T.U Zonal Fest | Ghaziabad</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php include 'header.php'; ?>

<header>
	<img src="images/logo1.jpg" class="img-rounded" style="width:70%;margin-left:15%;border-radius: 25px" alt="Zonal Fest Logo"/>
</header>

<div class="container">
    <div class="col-lg-12">
        <h1 style="text-align:center" class="page-header heading">
           <b> Dr. Abdul Kalam Technical Literary And Management Fest</b></h1>
    </div>

    <div class="row" id="Events">

        <div class="col-lg-12">
            <h3 class="page-header">
                Technical Events
            </h3>
        </div>
        <?php
        $eventQuery="SELECT * FROM events WHERE EventType='TECHNICAL' ORDER BY EventName";
        $eventResult=mysqli_query($connect,$eventQuery);
        while($eventRow=mysqli_fetch_assoc($eventResult)) {
            ?>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4><i class="<?php echo $eventRow['Icon']; ?>"></i> <?php echo $eventRow['EventName']; ?></h4>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $eventRow['EventDescr']; ?></p>
                        <a href="eventDetail.php?event=<?php echo $eventRow['EventId']; ?>" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <?php
        } ?>

    </div>
    <div class="row">

        <div class="col-lg-12">
            <h3 class="page-header">
                Literary Events
            </h3>
        </div>
        <?php
        $eventQuery="SELECT * FROM events WHERE EventType='LITERARY' ORDER BY EventName";
        $eventResult=mysqli_query($connect,$eventQuery);
        while($eventRow=mysqli_fetch_assoc($eventResult)) {
            ?>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4><i class="<?php echo $eventRow['Icon']; ?>"></i> <?php echo $eventRow['EventName']; ?></h4>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $eventRow['EventDescr']; ?></p>
                        <a href="eventDetail.php?event=<?php echo $eventRow['EventId']; ?>" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <?php
        } ?>
    </div>
    <div class="row">

        <div class="col-lg-12">
            <h3 class="page-header">
                Business Events
            </h3>
        </div>
        <?php
        $eventQuery="SELECT * FROM events WHERE EventType='MANAGEMENT' ORDER BY EventName";
        $eventResult=mysqli_query($connect,$eventQuery);
        while($eventRow=mysqli_fetch_assoc($eventResult)) {
            ?>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4><i class="<?php echo $eventRow['Icon']; ?>"></i> <?php echo $eventRow['EventName']; ?></h4>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $eventRow['EventDescr']; ?></p>
                        <a href="eventDetail.php?event=<?php echo $eventRow['EventId']; ?>" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <?php
        } ?>
    </div>

    <hr>
    <div class="well">
        <div class="row">
            <div class="col-md-8">
                <p>Regarding Any Queries</p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-default btn-block" href="contact.php">Contact Us</a>
            </div>
        </div>
    </div>

    <hr>
    <?php include 'footer.php'; ?>
</div>
<script src="js/jquery.js"></script>
<!--<script src="js/bootstrap.min.js"></script>-->
<?php include 'scripts.php'; ?>
</body>

</html>

