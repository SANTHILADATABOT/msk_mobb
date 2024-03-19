<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );

if($_GET['action']=="Check_User_Active")
{
    $user_id = $_POST['user_id'];
    $statement_chactive = $pdo_conn->prepare("SELECT * FROM usercreation WHERE user_id = '".$user_id."'");
    $statement_chactive->execute();
    $check_chactive = $statement_chactive->fetch();
    if($check_chactive['active_status']!='1'){echo "User not Active";exit;}
}
?>

	