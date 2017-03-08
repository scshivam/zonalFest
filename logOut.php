<?php
ob_start();
session_start();
error_reporting(E_ALL);
require "dbConnect.php";
if(isset($_SESSION['Login3']))
{

    session_unset();
    session_destroy();

    header('Refresh:0; URL=index.php');


}
else
{
    header('Refresh:0; URL=index.php');



}