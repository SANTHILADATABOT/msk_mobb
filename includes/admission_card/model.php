<?php
 
include( "../dbConnect.php" );
include( "../common_function.php" );

$current_date=date('Y-m-d');
if($_POST['action']=='ADD')
{
	$pdo_statement = $pdo_conn->prepare("INSERT INTO admission_card (entry_date,patient_name, token_id, id_number, address, mobile_no, appointment, hospital_name, contact_person, phone_number, landmark, country_id, state_id, district_id, area_id ,user_id,city_id) VALUES (:entry_date,:patient_name,:token_id,:id_number,:address,:mobile_no,:appointment,:hospital_name,:contact_person,:phone_number,:landmark,:country_id, :state_id, :district_id, :area_id,:user_id,:city_id)");
			
	$pdo_array=array(':entry_date'=>$current_date,':patient_name'=>$_POST['patient_name'],':token_id'=>$_POST['token_id'],':id_number'=>$_POST['id_number'],':address'=>$_POST['address'],':mobile_no'=>$_POST['mobile_no'],':appointment'=>$_POST['appointment'],':hospital_name'=>$_POST['hospital_name'],':contact_person'=>$_POST['contact_person'],':phone_number'=>$_POST['phone_number'],':landmark'=>$_POST['landmark'],':country_id'=>$_POST['country_id'],':state_id'=>$_POST['state_id'],':district_id'=>$_POST['district_id'],':area_id'=>$_POST['area_id'],':user_id'=>$_POST['user_id'],':city_id'=>$_POST['city_id']);
	$result = $pdo_statement->execute($pdo_array);

	if ($result == TRUE)	
	{
		echo $msg = "Successfully Created";
	}
	else 
	{ 
		$array = array('error'=> $pdo_statement->errorinfo());
		echo json_encode($array);
	}
}


if($_POST['action']=='Update')
{ 
  
	 $prepare_food_needed = $pdo_conn->prepare("UPDATE admission_card SET  patient_name='".$_POST['patient_name']."',token_id='".$_POST['token_id']."',id_number='".$_POST['id_number']."',appointment='".$_POST['appointment']."',hospital_name='".$_POST['hospital_name']."',address='".$_POST['address']."',mobile_no='".$_POST['mobile_no']."',contact_person='".$_POST['contact_person']."',phone_number='".$_POST['phone_number']."',landmark='".$_POST['landmark']."',country_id='".$_POST['country_id']."',state_id='".$_POST['state_id']."',district_id='".$_POST['district_id']."',area_id='".$_POST['area_id']."',user_id='".$_POST['user_id']."',city_id='".$_POST['city_id']."'   WHERE  admission_card_id='".$_POST['admission_card_id']."' ");	
        $result = $prepare_food_needed->execute();

  

	if ($result == TRUE)	
	{
		echo $msg = "Successfully Updated";
	}
	else 
	{ 
		$array = array('error'=> $prepare_food_needed->errorinfo());
		echo json_encode($array);	
	}
}
if($_POST['action']=="Delete")
{
	
	 
	$pdo_statement="DELETE FROM admission_card where admission_card_id='".$_POST['admission_card_id']."' ";
	$result=$pdo_conn->exec($pdo_statement);
	
	
	//$pdo_payment_followups="UPDATE paymentfollowups SET delete_status='1' where customer_name=".$_POST['customer_id'];
	//$result_payment_followups = $pdo_conn->exec($pdo_payment_followups);

	if(!empty($result)) 
	{
		echo $msg = "Successfully Deleted";
	}
	//else { print_r($pdo_statement->errorinfo()); }
	
}
?>