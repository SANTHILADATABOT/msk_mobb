<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
if($_GET['action']=="update") 
{
	

$prepare_survey = $pdo_conn->prepare("UPDATE fact_finding_form SET economic_status='".$_POST['economic_status']."',willing_to_help_in_mohalla='".$_POST['willing_to_help_in_mohalla']."',willing_to_help_in_mohalla_no='".$_POST['willing_to_help_in_mohalla_no']."',interested_to_serve='".$_POST['interested_to_serve']."',interest_to_serve_msk='".$_POST['interest_to_serve_msk']."',interest_to_serve_msk_no='".$_POST['interest_to_serve_msk_no']."',emergency='".$_POST['emergency']."',emergency_no='".$_POST['emergency_no']."',information_provided_by='".$_POST['information_provided_by']."',enumerator_name='".$_POST['enumerator_name']."',enumerator_phone='".$_POST['enumerator_phone']."',completed_status='".$_POST['compl_status']."' WHERE  unique_no='".$_POST['unique_no']."' ");

$result = $prepare_survey->execute();

//echo "Successfully Insert";

} 

?>
