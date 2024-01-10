
<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
if($_GET['action']=="update") 
{
	

if(($_POST['disease_details']!='')||($_POST['surgery_details']!='')||($_POST['surgery_details_no']!='')||($_POST['mon_exp_on_medicine']!='')||($_POST['mon_exp_on_medicine_no']!=''))
{
 $statement = $pdo_conn->prepare("INSERT INTO  fact_family_disease (user_id, unique_no, disease_details, surgery_details,surgery_details_no, mon_exp_on_medicine,mon_exp_on_medicine_no,country_id,state_id,district_id,city_id,area_id) VALUES (:user_id, :unique_no, :disease_details, :surgery_details,:surgery_details_no, :mon_exp_on_medicine,:mon_exp_on_medicine_no, :country_id, :state_id, :district_id, :city_id, :area_id)");

 $pdo_array= array(
	  	':user_id'=>$_POST['user_id'],
		':unique_no'=>$_POST['unique_no'],
		':disease_details'=>$_POST['disease_details'],
		':surgery_details'=>$_POST['surgery_details'],
		':surgery_details_no'=>$_POST['surgery_details_no'],
		':mon_exp_on_medicine'=>$_POST['mon_exp_on_medicine'],
		':mon_exp_on_medicine_no'=>$_POST['mon_exp_on_medicine_no'],
		':country_id'=>$_POST['country_id'],
 		':state_id'=>$_POST['state_id'],
		':district_id'=>$_POST['district_id'],
		':city_id'=>$_POST['city_id'],
		':area_id'=>$_POST['area_id'],
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
$prepare_survey = $pdo_conn->prepare("UPDATE fact_finding_form SET  recovered_from_chronic_details='".$_POST['recovered_from_chronic_details']."',govt_insurance_card_avail='".$_POST[govt_insurance_card_avail]."' WHERE  unique_no='".$_POST['unique_no']."'");	
        $result = $prepare_survey->execute();
} 

?>

