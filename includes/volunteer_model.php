<?php

date_default_timezone_set('Asia/Kolkata');
header('Access-Control-Allow-Origin: *'); 
include("dbConnect.php");
?>


<?php 
if($_GET['action']=="volunteer_login")
{
  $mobile = $_GET['mobile'];
  $otp = $_GET['otp'];
// / echo "SELECT * FROM volunteer_otp WHERE mobile_number = '".$mobile."' AND otp = '".$otp."' ";
  $statement = $pdo_conn->prepare("SELECT * FROM volunteer_otp WHERE mobile_number = '".$mobile."' AND otp = '".$otp."' ");
  $statement->execute();
  $check = $statement->fetch();
  $count =$statement->rowCount();
  $fetched_otp = $check['otp'];
  $country_id = $check['country_id'];
  $state_id = $check['state_id'];
  $district_id = $check['district_id'];
  $user_id=$check['user_id'];
  $city_id = $check['city_id'];
  $area_id = $check['area_id'];
  $otp_id = $check['area_id'];
  $user_type=$check['user_type'];

    $survey1 = $pdo_conn->prepare("SELECT * FROM  fact_finding_form WHERE  user_id='".$user_id."' and country_id='".$country_id."'  and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'and completed_status='0'");
    $survey1->execute();
    $survey1_records=$survey1->fetch();
    $unique_no=$survey1_records['unique_no'];

  if($count>0)
  {
	  echo  $country_id."@@".$state_id."@@".$district_id."@@".$city_id."@@".$area_id."@@".$otp_id."@@".$user_id."@@".$user_type."@@".$unique_no;
  }
  else
  {
	  echo "0";
  }
}
?>
