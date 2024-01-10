<?php
date_default_timezone_set('Asia/Kolkata');
header('Access-Control-Allow-Origin: *'); 
include("dbConnect.php");

if($_GET['action']=="logout") 
{
	echo "Logout";
}
?>