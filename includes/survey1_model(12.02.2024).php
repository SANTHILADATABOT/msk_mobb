<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );

if($_POST['action']=="fam_num_checking") 
{
$sql = "SELECT family_no FROM fact_finding_form  WHERE family_no='".$_POST['family_no']."'  and country_id='".$_POST['country_id']."'  and state_id='".$_POST['state_id']."'  and district_id='".$_POST['district_id']."'  and city_id='".$_POST['city_id']."'  and area_id='".$_POST['area_id']."'  and delete_status!='1' order by survey_id desc limit 1"; 
// $sql = "SELECT family_no FROM fact_finding_form  WHERE country_id='".$_POST['country_id']."'  and state_id='".$_POST['state_id']."'  and district_id='".$_POST['district_id']."'  and city_id='".$_POST['city_id']."'  and area_id='".$_POST['area_id']."'  and delete_status!='1' order by survey_id desc limit 1"; 
$result = $pdo_conn->prepare($sql); 
$result->execute([$bar]); 
$family_no=$result->fetch();
echo $family_no[family_no];
//echo $number_of_rows = $result->fetchColumn(); 
}

if($_GET['action']=="Insert") 
{

 $user_id = $_POST['user_id'];
  $country_id = $_POST['country_id'];
 
$state_id = $_POST['state_id'];
$district_id = $_POST['district_id'];
$city_id = $_POST['city_id'];
$area_id = $_POST['area_id'];

$survey1 = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE unique_no='".$_POST['unique_no']."' ");
$survey1->execute();
$survey1_records=$survey1->fetchAll();

	if(count($survey1_records)>0)
	//if($survey1_records[0]['COUNT(reg_id)']==0)
	{
		
		$sql2 =  "UPDATE fact_finding_form SET 
		family_no='".$_POST['family_no']."',
		mohalla_no='".$_POST['mohalla_no']."',
		mohalla_no_inpt='".$_POST['mohalla_no_inpt']."',
		aadhar_no='".$_POST['aadhar_no']."',
		aadhar_get_inpt='".$_POST['aadhar_get_inpt']."',
		door_no='".$_POST['door_no']."',
		street_name='".$_POST['street_name']."',
		nagar='".$_POST['nagar']."',
		date='".$_POST['date']."',
		contact_no='".$_POST['contact_no']."',
		mother_tongue='".$_POST['mother_tongue']."',
		ration_card_no='".$_POST['ration_card_no']."',
		ration_no_inpt='".$_POST['ration_no_inpt']."',
		house='".$_POST['house']."',
		house_details='".$_POST['house_details']."',
		bathroom_availability='".$_POST['bathroom_availability']."',	land_availability='".$_POST['land_availability']."',	language_input='".$_POST['language_input']."' where unique_no='".$_POST['unique_no']."' ";

		$statement = $pdo_conn->prepare($sql2);
		$result2 = $statement->execute();

		//echo "Updated Successfully";
	}
	else
	{
 
//echo "INSERT INTO  fact_finding_form (register_id, unique_no, family_no, mohalla_no, aadhar_no, door_no, street_name, nagar, date, contact_no, mother_tongue, ration_card_no, house, bathroom_availability, economic_status) VALUES (:register_id, :unique_no, :family_no, :mohalla_no, :aadhar_no, :door_no, :street_name, :nagar, :date,:contact_no, :mother_tongue, :ration_card_no, :house, :bathroom_availability, :economic_status)";
  $statement = $pdo_conn->prepare("INSERT INTO  fact_finding_form (user_id, unique_no, family_no, mohalla_no,mohalla_no_inpt, aadhar_no,aadhar_get_inpt, door_no, street_name, nagar, date, contact_no, mother_tongue, ration_card_no,ration_no_inpt, house, house_details, bathroom_availability, country_id, state_id, district_id, city_id, area_id,land_availability,language_input) 
          VALUES (:user_id, :unique_no, :family_no, :mohalla_no,:mohalla_no_inpt, :aadhar_no,:aadhar_get_inpt, :door_no, :street_name, :nagar, :date,:contact_no, :mother_tongue, :ration_card_no,:ration_no_inpt, :house, :house_details, :bathroom_availability, :country_id, :state_id, :district_id, :city_id, :area_id, :land_availability, :language_input)");

 $pdo_array= array(
	 	':user_id'=>$user_id,
		':unique_no'=>$_POST['unique_no'],
		':family_no'=>$_POST['family_no'],
		':mohalla_no'=>$_POST['mohalla_no'],
		':mohalla_no_inpt'=>$_POST['mohalla_no_inpt'],
		':aadhar_no'=>$_POST['aadhar_no'],
		':aadhar_get_inpt'=>$_POST['aadhar_get_inpt'],
		':door_no'=>$_POST['door_no'],
		':street_name'=>$_POST['street_name'],
		':nagar'=>$_POST['nagar'],
		':date'=>$_POST['date'],
		':contact_no'=>$_POST['contact_no'],
		':mother_tongue'=>$_POST['mother_tongue'],
		':ration_card_no'=>$_POST['ration_card_no'],
		':ration_no_inpt'=>$_POST['ration_no_inpt'],
		':house'=>$_POST['house'],
		':house_details'=>$_POST['house_details'],
		':bathroom_availability'=>$_POST['bathroom_availability'],
		':country_id'=>$country_id,
		':state_id'=>$state_id,
		':district_id'=>$district_id,
		':city_id'=>$city_id,
		':area_id'=>$area_id,
		':land_availability'=>$_POST['land_availability'],
		':language_input'=>$_POST['language_input']);

		

		
  $result = $statement->execute($pdo_array);
  if ($result == TRUE)	
	{
		echo $msg = "Successfully Created";
	}
	else 
	{ 
		$array = array('error'=> $statement->errorinfo());
		echo json_encode($array);
		
	}

		 
	}
	count($survey1_records);
}
 
	?>

	