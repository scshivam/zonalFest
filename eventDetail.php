<?php
require 'dbConnect.php';
if(isset($_GET['event']) && !empty($_GET['event'])){
    $EventId=mysqli_real_escape_string($connect,$_GET['event']);
    $eventQuery="SELECT * FROM events WHERE EventId='$EventId'";
    $eventResult=mysqli_query($connect,$eventQuery);
    if(mysqli_num_rows($eventResult)>0){
        $eventRow=mysqli_fetch_assoc($eventResult);
    }else{
        header('Refresh:0;url=index.php');
        die();
    }

}else{
    header('Refresh:0;url=index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Detail</title>
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
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="<?php echo $eventRow['Icon']; ?>"></i> <?php echo $eventRow['EventName']; ?>

            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a>
                </li>
                <li class="active"><?php echo $eventRow['EventName']; ?></li>
            </ol>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-6">

            <img class="img-responsive" src="images/<?php echo $eventRow['EventImage']; ?>" width="900px"alt="">

            <hr>
<?php
            $i=1;
            $ruleQuery="SELECT * FROM rules WHERE EventId='$EventId'";
            $ruleResult=mysqli_query($connect,$ruleQuery);
            $nm1=mysqli_num_rows($ruleResult);
            if($nm1>0)
            {
            ?>
            <p class="lead">Event Rules</p>
            <?php
        }
            while($ruleRow=mysqli_fetch_assoc($ruleResult)){
                echo '<p>'.$i++.'. '.$ruleRow['RuleDescr'].'</p>';
            }?>


        </div>
        <div class="col-md-6">
            <div class="well">
                <h4>Max Teams: <?php echo $eventRow['MaxParti']; ?></h4>
                <h4>Event Detail</h4>
                <p><?php echo $eventRow['EventDescr']; ?></p>
                <?php echo $eventRow['EventFullDescr']; ?>
            </div>

        </div>

    </div>

    <hr>
    <?php include 'footer.php'; ?>

</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php include 'scripts.php'; ?>
</body>

</html>

