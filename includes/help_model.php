<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
?>


<?php

if($_GET['action'] == "contact"){
  $type = $_GET['type'];
  $name = $_GET['name'];
  $mobile = $_GET['mobile'];
  $blood_id = ($type=='Blood')?$_GET['blood_id']:'0';
  $country_id = $_GET['country_id'];
  $state_id = $_GET['state_id'];
  $district_id = $_GET['district_id'];
  $city_id = $_GET['city_id'];
  $area_id = $_GET['area_id'];
  $rewards = $_GET['rewards'];


  $statement_insert = $pdo_conn->prepare("INSERT INTO  helpers_details (helper_name, mobile_no, country_id, state_id, district_id, city_id, area_id,help_type,blood_id,remarks) VALUES ('$name', '$mobile', '$country_id', '$state_id','$district_id', '$city_id','$area_id', '$type', '$blood_id', '$remarks')");
  $result = $statement_insert->execute($pdo_array);
  


 $statement = $pdo_conn->prepare("SELECT * FROM usercreation WHERE country_id = '".$country_id."' AND state_id = '".$state_id."' AND district_id = '".$district_id."' AND city_id = '".$city_id."' AND area_id = '".$area_id."' ");
  $statement->execute();
  $check = $statement->fetch();
  
  $contact_person = $check['mobile'];

  if(count($contact_person)>0)
  {
    echo "Please contact $contact_person for more details";
  }

  else
  {
    echo "Please contact 8695725780 for more details";
  }

}
?>