
<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
$general=$_GET['general'];
$quotation_ids=explode('@@@',$general);
$update_mem=explode('@@@',$_GET['general_updt']);
$not_null=$_GET['not_null'];
$_GET['general_updt'];
$sub_form=$_GET['sub_form'];
$country_id = $_GET['country_id'];
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id'];
$count=$_GET['count'];
if($_GET['general']!='')
{
	foreach($quotation_ids as $val)
	{

$valexp=explode('-',$val);

if($valexp[2]!='undefined')
{
 $statement = $pdo_conn->prepare("INSERT INTO  fact_family_disease (user_id, unique_no, disease_details, surgery_details,surgery_details_no, mon_exp_on_medicine,mon_exp_on_medicine_no,country_id,state_id,district_id,city_id,area_id) VALUES (:user_id, :unique_no, :disease_details, :surgery_details,:surgery_details_no, :mon_exp_on_medicine,:mon_exp_on_medicine_no, :country_id, :state_id, :district_id, :city_id, :area_id)");

 $pdo_array= array(
	  	':user_id'=>$_GET['user_id'],
		':unique_no'=>$valexp[1],
		':disease_details'=>$valexp[2],
		':surgery_details'=>$valexp[6],
		':surgery_details_no'=>$valexp[5],
		':mon_exp_on_medicine'=>$valexp[3],
		':mon_exp_on_medicine_no'=>$valexp[4],
		':country_id'=>$_GET['country_id'],
 		':state_id'=>$_GET['state_id'],
		':district_id'=>$_GET['district_id'],
		':city_id'=>$_GET['city_id'],
		':area_id'=>$_GET['area_id'],
		);

		
  $result = $statement->execute($pdo_array);
if ($result == TRUE)	
	{
	echo	$msg = "Successfully Added togg";
	}
	else 
	{ 
		$array = array('error'=> $statement->errorinfo());
		echo json_encode($array);
		
	}
}
}

}
 if($not_null=='1')
{
  	foreach($update_mem as $val)
	{
	    $valexp=explode('-',$val);
	
        $prepare_survey = $pdo_conn->prepare("UPDATE fact_family_disease SET  user_id='".$_GET['user_id']."',disease_details='".$valexp[2]."',surgery_details	='".$valexp[6]."',mon_exp_on_medicine='".$valexp[3]."',mon_exp_on_medicine_no='".$valexp[4]."',surgery_details_no='".$valexp[5]."' WHERE  unique_no='".$valexp[1]."' AND disease_id='".$valexp[7]."' ");	
        $result = $prepare_survey->execute();

         if ($result == TRUE)	
	{
		$msg = "Successfully update";

	}
	else 
	{ 
		$array = array('error'=> $prepare_survey->errorinfo());
		echo json_encode($array);
	}
      
	}

	}
	


?>
