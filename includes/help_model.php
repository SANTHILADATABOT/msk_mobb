<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
?>


<?php

if($_GET['action'] == "contact"){
  $country_id = $_GET['country_id'];
  $state_id = $_GET['state_id'];
  $district_id = $_GET['district_id'];
  $city_id = $_GET['city_id'];
  $area_id = $_GET['area_id'];

  $data = array($country_id, $state_id, $district_id, $city_id, $area_id);
 

  $statement = $pdo_conn->prepare("SELECT * FROM registration WHERE country_id = '".$country_id."' AND state_id = '".$state_id."' AND                      district_id = '".$district_id."' AND city_id = '".$city_id."' AND area_id = '".$area_id."' ");
  $statement->execute();
  $check = $statement->fetch();

  $contact_person = $check['mobile'];

  if(count($contact_person)>0)
  {
    echo "Please contact $contact_person for more details";
  }

  else
  {
    echo "Please try again later";
  }

}
?>