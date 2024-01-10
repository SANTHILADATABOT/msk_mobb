<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
if($_GET['action']=="update") 
{
echo "UPDATE fact_finding_form SET family_counselling='".$_POST['family_counselling']."
',nikkah_counselling='".$_POST['nikkah_counselling']."',entrepreneur_counselling='".$_POST['entrepreneur_counselling']."',business_counselling='".$_POST['business_counselling']."',guide_for_skill_develop='".$_POST['guide_for_skill_develop']."',rehabilitation_counselling='".$_POST['rehabilitation_counselling']."',suffer_from_interest_loan='".$_POST['suffer_from_interest_loan']."',guide_counselling_full_details='".$_POST['guide_counselling_full_details']."',other_details_3='".$_POST['other_details_3']."' WHERE  unique_no='".$_POST['unique_no']."' ";

$prepare_survey = $pdo_conn->prepare("UPDATE fact_finding_form SET family_counselling='".$_POST['family_counselling']."
',nikkah_counselling='".$_POST['nikkah_counselling']."',entrepreneur_counselling='".$_POST['entrepreneur_counselling']."',business_counselling='".$_POST['business_counselling']."',guide_for_skill_develop='".$_POST['guide_for_skill_develop']."',rehabilitation_counselling='".$_POST['rehabilitation_counselling']."',suffer_from_interest_loan='".$_POST['suffer_from_interest_loan']."',guide_counselling_full_details='".$_POST['guide_counselling_full_details']."',other_details_3='".$_POST['other_details_3']."' WHERE  unique_no='".$_POST['unique_no']."' ");

$result = $prepare_survey->execute();

  if ($result == TRUE)	
	{
		echo $msg = "Successfully Updatesd";
	}
	else 
	{ 
		$array = array('error'=> $prepare_survey->errorinfo());
		echo json_encode($array);
		
	}
//echo "Successfully Update";

} 

?>
