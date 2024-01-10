<?php
date_default_timezone_set('Asia/Kolkata');
header('Access-Control-Allow-Origin: *'); 
include("dbConnect.php");
include( "common_function.php" );
?>


<?php 
if($_GET['action']=="insert")
{
  /*$name = $_GET['name'];
  $mobile = $_GET['mobile'];*/
  $country_id = $_GET['country_id'];
  $state_id = $_GET['state_id'];
  $district_id = $_GET['district_id'];
  $city_id = $_GET['city_id'];
  $area_id = $_GET['area_id'];

  $val = array($country_id, $state_id, $district_id, $city_id, $area_id);
  // echo var_export($val);

  $sql = "INSERT INTO survey_area (country_id, state_id, district_id, city_id, area_id) VALUES (:country_id, :state_id, :district_id, :city_id, :area_id)";
  
  $stmt = $pdo_conn->prepare($sql);

  $data = array(
    
    ':country_id'=>$country_id,
    ':state_id'=>$state_id,
    ':district_id'=>$district_id,
    ':city_id'=>$city_id,
    ':area_id'=>$area_id
  );

  $stmt->execute($data); 
  echo "Inserted successfully";
}

else
{
  echo "Not inserted";
}

?>
