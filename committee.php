<?php
/**
 * Created by PhpStorm.
 * User: mohit
 * Date: 11/9/16
 * Time: 12:05 PM
 */?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<?php include 'header.php'; ?>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Committee for Tech Fest
                
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a>
                </li>
                <li class="active">Committee</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-responsive">
                <thead>
                <th align="center">S.No</th>
                <th align="center">Events</th>
                <th align="center">Committee</th>
                <th align="center">Contact No.</th>
                </thead>
                <tbody>
                <tr>
                    <td >1.</td>
                    <td >Business Plan</td>
                    <td rowspan="3"> Dr.Binkey Srivastava
                    <br>Dr. Ranchay Bahtija
                        <br>Dr. Mani Tyagi
                    </td><td rowspan="3">9999958118</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Ad-Mad Show</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td> Business Quiz / General Quiz</td>
                </tr>
                <tr>
                    <td >4.</td>
                    <td >Hindi Debate</td>
                    <td rowspan="3"> Dr.Rajesh Mishra
                        <br>Dr. Reena Singh
                        <br>Mr. Alok Kumar Pandey
                        <br>Mr. Pradeep Kataria
                    </td>
                    <td rowspan="3">8266882690</td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>English Debate</td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Just A Minute</td>
                </tr>
                <tr>
                    <td >7.</td>
                    <td >Alogrithm Design & Coding Competition</td>
                    <td rowspan="2">
                        Mr. Ravi Shankar
                        <br>Mr. Arun Tripathi
                    </td>
                    <td rowspan="2">9873816191<br>
                    </td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>Line Follower & Maze Solver</td>
                </tr>
                <tr>
                    <td >9.</td>
                    <td >Circuit Debugging (Logitronix)</td>
                    <td rowspan="2">
                        Mr. N.R. Srivastava
                        <br>Mr. R.U. Khan
                    </td>
                    <td rowspan="2">9897485404<br>9811210366</td>
                </tr>
                <tr>
                    <td>10.</td>
                    <td>Manual Robotics (Robo Race) </td></tr>
                    <tr><td>11.</td><td>Manual Robotics (Robo War)</td>
                    <td>Mr. Satya Prakash Singh</td><td>9718249426</td>
                </tr>
                <tr>
                <td>12.</td>
                <td>Bridge Kriti</td>
                <td >Ms. Sarika Awasthi
                <br> Mr. Siddharth Jain</td><td><br>8126270776</td>
                <tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<?php include 'scripts.php'; ?>
</body>

</html>

