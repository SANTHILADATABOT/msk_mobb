<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
$sess_user_id = $_GET[ 'sess_user_id' ];
$sess_usertype_id = $_GET[ 'sess_usertype_id' ];
$crt_month = date( 'Y-m' );
$current_date = date('Y-m-d');
$unique_no=$_GET['unique_no'];
$user_id = $_GET['user_id']; 
$user_type=$_GET['user_type'];



?>

<html>
</html>