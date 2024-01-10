<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );

if($_GET['action']=="Insert") 
{

$survey1 = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE unique_no='".$_POST['unique_no']."' ");
$survey1->execute();
$survey1_records=$survey1->fetchAll();

	if(count($survey1_records)>0)
	//if($survey1_records[0]['COUNT(reg_id)']==0)
	{
		
		$sql2 =  "UPDATE fact_finding_form SET 
		family_no='".$_POST['family_no']."',
		mohalla_no='".$_POST['mohalla_no']."',
		aadhar_no='".$_POST['aadhar_no']."',
		door_no='".$_POST['door_no']."',
		street_name='".$_POST['street_name']."',
		nagar='".$_POST['nagar']."',
		date='".$_POST['date']."',
		contact_no='".$_POST['contact_no']."',
		mother_tongue='".$_POST['mother_tongue']."',
		ration_card_no='".$_POST['ration_card_no']."',
		house='".$_POST['house']."',
		bathroom_availability='".$_POST['bathroom_availability']."',
		economic_status='".$_POST['economic_status']."' ";

		$statement = $pdo_conn->prepare($sql2);
		$result2 = $statement->execute();

		//echo "Updated Successfully";
	}
	else
	{
 
//echo "INSERT INTO  fact_finding_form (register_id, unique_no, family_no, mohalla_no, aadhar_no, door_no, street_name, nagar, date, contact_no, mother_tongue, ration_card_no, house, bathroom_availability, economic_status) VALUES (:register_id, :unique_no, :family_no, :mohalla_no, :aadhar_no, :door_no, :street_name, :nagar, :date,:contact_no, :mother_tongue, :ration_card_no, :house, :bathroom_availability, :economic_status)";
  $statement = $pdo_conn->prepare("INSERT INTO  fact_finding_form (register_id, unique_no, family_no, mohalla_no, aadhar_no, door_no, street_name, nagar, date, contact_no, mother_tongue, ration_card_no, house, bathroom_availability, economic_status) 
          VALUES (:register_id, :unique_no, :family_no, :mohalla_no, :aadhar_no, :door_no, :street_name, :nagar, :date,:contact_no, :mother_tongue, :ration_card_no, :house, :bathroom_availability, :economic_status)");

 $pdo_array= array(
	 	':register_id'=>$_POST['register_id'],
		':unique_no'=>$_POST['unique_no'],
		':family_no'=>$_POST['family_no'],
		':mohalla_no'=>$_POST['mohalla_no'],
		':aadhar_no'=>$_POST['aadhar_no'],
		':door_no'=>$_POST['door_no'],
		':street_name'=>$_POST['street_name'],
		':nagar'=>$_POST['nagar'],
		':date'=>$_POST['date'],
		':contact_no'=>$_POST['contact_no'],
		':mother_tongue'=>$_POST['mother_tongue'],
		':ration_card_no'=>$_POST['ration_card_no'],
		':house'=>$_POST['house'],
		':bathroom_availability'=>$_POST['bathroom_availability'],
		':economic_status'=>$_POST['economic_status']);
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

	