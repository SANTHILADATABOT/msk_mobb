
<?php
include("dbConnect.php");
 
$roll_id=1;

function get_att_name($att_id)
{
	global $pdo_conn;
	$brand = $pdo_conn->prepare("select attendance_type from attendance_type_live where live_id='$att_id'");
	$brand->execute();
	$brand_name = $brand->fetch();
	$get_brand_name=$brand_name['attendance_type']; 
	return $get_brand_name;
}
 
 function get_edu_qualificaqtion($qualification_id)
{
	global $pdo_conn;
	$qualification = $pdo_conn->prepare("select qualification_name from qualification where qualification_id='$qualification_id'");
	$qualification->execute();
	$fet_quali = $qualification->fetch();
	$get_qualification_name=$fet_quali['qualification_name']; 
	return $get_qualification_name;
}
 function get_relationship($relationship_id)
{
	global $pdo_conn;
	$relationship = $pdo_conn->prepare("select relationship_name from relationship where relationship_id='$relationship_id'");
	$relationship->execute();
	$fet_rel= $relationship->fetch();
	$get_rel=$fet_rel['relationship_name']; 
	return $get_rel;
}
 function get_blood_group($blood_id)
{
	global $pdo_conn;
	$blood_group= $pdo_conn->prepare("select blood_group_name from blood_group where blood_id='$blood_id'");
	$blood_group->execute();
	$fet_blood= $blood_group->fetch();
	$get_blood=$fet_blood['blood_group_name']; 
	return $get_blood;
}
	//user name
function get_user_name($user_id)
{
	global $pdo_conn;
	$brand = $pdo_conn->prepare("SELECT staff_name FROM user_creation where user_id='$user_id'");
	$brand->execute();
	$brand_name = $brand->fetch();
	$get_brand_name=$brand_name['staff_name'];
	 
	return ucfirst($get_brand_name);
}
 
 

function get_country_name($country_id)
{
	global $pdo_conn;
	$country = $pdo_conn->prepare("SELECT country_name FROM country where country_id='".$country_id."'");
	$country->execute();
	$country_list = $country->fetch();
	return $country_list['country_name'];
}

function get_state_name($state_id)
{
	global $pdo_conn;
	$state = $pdo_conn->prepare("SELECT state_name FROM  state where 	state_id='".$state_id."'");
	$state->execute();
	$state_list = $state->fetch();
	return $state_list['state_name'];
}

function get_district_name($district_id)
{
	global $pdo_conn;
	$district = $pdo_conn->prepare("SELECT district_name FROM district where 	district_id='".$district_id."'");
	$district->execute();
	$district_list = $district->fetch();
	return $district_list['district_name'];
}

function get_city_name($city_id)
{
	global $pdo_conn;
	$city = $pdo_conn->prepare("SELECT city_name FROM  city where 	city_id='".$city_id."'");
	$city->execute();
	$city_list = $city->fetch();
	return $city_list['city_name'];
}

function get_area_name($area_id)
{
	global $pdo_conn;
	$area = $pdo_conn->prepare("SELECT area_name FROM  area where 	area_id='".$area_id."'");
	$area->execute();
	$area_list = $area->fetch();
	return $area_list['area_name'];
}

function get_name($unique_no)
{
	global $pdo_conn;
	$name = $pdo_conn->prepare("SELECT family_head_name FROM  fact_finding_subform where 	random_no='".$unique_no."'");
	$name->execute();
	$name_list = $name->fetch();
	return $name_list['family_head_name'];
}





if($_POST['action'] == 'state_list'){
	
	$state = $pdo_conn->prepare("SELECT * FROM state WHERE country_id=$_POST[country_id] and status='1' and delete_status='0' ORDER BY state_id ASC");
	$state->execute();
	$state_list = $state->fetchall();
	
	$state_val = '';
	
	  $state_val .='<option value="">Select your State</option>'; 
	foreach($state_list as $value){
		$state_val .= '<option value="'.$value['state_id'].'">'.$value['state_name'].'</option>'; 
	}
	
	
	echo $state_val;	
}	

if($_POST['action'] == 'district_list'){
	
	$district_by_state = $pdo_conn->prepare("SELECT * FROM district WHERE state_id = $_POST[state_id]  and country_id=$_POST[country_id] and status='1' and delete_status='0' ORDER BY district_id ASC");

	$district_by_state->execute();
	$districtbystate = $district_by_state->fetchAll();
	
	$district_val = '';

	  $district_val .='<option value="">Select your District</option>'; 
	foreach($districtbystate as $value){
		$district_val .= '<option value="'.$value['district_id'].'">'.$value['district_name'].'</option>'; 
	}
	
	
	echo $district_val;	
}

if($_POST['action'] == 'city_list'){
	 
	$city = $pdo_conn->prepare("SELECT * FROM city WHERE district_id=$_POST[district_id] and  state_id = $_POST[state_id] and country_id=$_POST[country_id]     and status='1' and delete_status='0'");
	$city->execute();
	$city_list = $city->fetchall();
	
	$city_val = '';
	
	  $city_val .='<option value="">Select your City</option>'; 
	foreach($city_list as $value){
		$city_val .= '<option value="'.$value['city_id'].'">'.$value['city_name'].'</option>'; 
	}
	
	
	echo $city_val;	
}	


if($_POST['action'] == 'area_list'){
	 
	$area = $pdo_conn->prepare("SELECT * FROM area WHERE city_id=$_POST[city_id] AND district_id=$_POST[district_id] and  state_id = $_POST[state_id] and country_id=$_POST[country_id]     and status='1' and delete_status='0'");
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