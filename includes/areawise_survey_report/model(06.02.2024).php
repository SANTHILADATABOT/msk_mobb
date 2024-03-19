<?php
$current_date=date('Y-m-d');
include( "../dbConnect.php" );
include( "../common_function.php" );

$user_id=$_GET['user_id'];
 $country_id=$_GET['country_id'];

$state_id=$_GET['state_id'];
$district_id=$_GET['district_id'];
$city_id=$_GET['city_id'];
$area_id=$_GET['area_id'];
$user_type=$_GET['user_type'];

if($user_type=='1')
{
	$state_query='and country_id="'.$country_id.'"';
	$district_query=' and country_id="'.$country_id.'" and state_id="'.$state_id.'"';
	$city_query='and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
	$area_query="and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."'";
}

else if($user_type=='2')
{ 
	$state_query='';
	$district_query='';
	$city_query='';
	$area_query='';
}


else if($user_type=='3')
{
	 
	$state_query=' and country_id="'.$country_id.'" and state_id="'.$state_id.'"';
	$district_query='';
	$city_query='';
	$area_query='';
}
else if($user_type=='4')
{
	 
	$state_query=' and country_id="'.$country_id.'" and state_id="'.$state_id.'"';
	$district_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
	$city_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
	$area_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
}
else if($user_type=='5')
{
     
	  $state_query=" and country_id='".$country_id."' and state_id='".$state_id."'";
	  $district_query="  and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."'";
	  $city_query="  and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."'";
	$area_query="  and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."'";
}


if($_GET['action'] == 'state_list')
{
	$state = $pdo_conn->prepare("SELECT * FROM state WHERE status='1' and delete_status='0' $state_query ORDER BY state_id ASC");
	$state->execute();
	$state_list = $state->fetchall();
	$state_val = '';
	$state_val .='<option value="">Select your State</option>'; 
	foreach($state_list as $value)
	{
	    $state_val .= '<option value="'.$value['state_id'].'">'.$value['state_name'].'</option>'; 
	}
	echo $state_val;	
}	

if($_GET['action'] == 'district_list'){
	
	$district_by_state = $pdo_conn->prepare("SELECT * FROM district WHERE  status='1' and delete_status='0' $district_query ORDER BY district_id ASC");

	$district_by_state->execute();
	$districtbystate = $district_by_state->fetchAll();
	
	$district_val = '';

	  $district_val .='<option value="">Select your District</option>'; 
	foreach($districtbystate as $value){
		$district_val .= '<option value="'.$value['district_id'].'">'.$value['district_name'].'</option>'; 
	}
	
	
	echo $district_val;	
}

if($_GET['action'] == 'city_list'){
	 
	$city = $pdo_conn->prepare("SELECT * FROM city WHERE  status='1' and delete_status='0' $city_query");
	$city->execute();
	$city_list = $city->fetchall();
	
	$city_val = '';
	
	  $city_val .='<option value="">Select your City</option>'; 
	foreach($city_list as $value){
		$city_val .= '<option value="'.$value['city_id'].'">'.$value['city_name'].'</option>'; 
	}
	
	
	echo $city_val;	
}	


if($_GET['action'] == 'area_list'){
	 
	$area = $pdo_conn->prepare("SELECT * FROM area WHERE status='1' and delete_status='0'   $area_query");
	$area->execute();
	$area_list = $area->fetchall();
	
	$area_val = '';
	
	  $area_val .='<option value="">Select your Area</option>'; 
	foreach($area_list as $value){
		$area_val .= '<option value="'.$value['area_id'].'">'.$value['area_name'].'</option>'; 
	}
	
	
	echo $area_val;	
}

?>