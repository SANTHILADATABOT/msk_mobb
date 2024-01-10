<?php
 
include( "../dbConnect.php" );
include( "../common_function.php" );


if($_POST['action']=='ADD')
{ 	 
	$pdo_statement = $pdo_conn->prepare("INSERT INTO medical_help (entry_date,patient_name, age, gender, disease_name, address, mobile_no, city, organization_name, coordinator_name, email,recommendation_form,medical_report , doctor_advice, surgery_amount, amount, medical_insurance_plan_card,bring_it,any_hospital_in_tamilnadu,medical_treatment_private,will_you_form,government_hospital, country_id, state_id, district_id, city_id, area_id ,user_id) VALUES (:entry_date,:patient_name,:age,:disease_name,:address,:mobile_no,:city,:organization_name,:coordinator_name,:email,:recommendation_form,:medical_report, :doctor_advice,:surgery_amount,:amount,:medical_insurance_plan_card,:bring_it,:any_hospital_in_tamilnadu,:medical_treatment_private,:will_you_form,:government_hospital,:country_id, :state_id, :district_id, :city_id, :area_id,:user_id)");
			
	$pdo_array=array(':entry_date'=>$_POST['entry_date'],':patient_name'=>$_POST['patient_name'],':age'=>$_POST['age'],':gender'=>$_POST['gender'],':disease_name'=>$_POST['disease_name'],':address'=>$_POST['address'],':mobile_no'=>$_POST['mobile_no'],':city'=>$_POST['city'],':organization_name'=>$_POST['organization_name'],':coordinator_name'=>$_POST['coordinator_name'],':email'=>$_POST['email'],':recommendation_form'=>$_POST['recommendation_form'],':medical_report'=>$_POST['medical_report'],':doctor_advice'=>$_POST['doctor_advice'],':surgery_amount'=>$_POST['surgery_amount'],':amount'=>$_POST['amount'],':medical_insurance_plan_card'=>$_POST['medical_insurance_plan_card'],':bring_it'=>$_POST['bring_it'],':any_hospital_in_tamilnadu'=>$_POST['any_hospital_in_tamilnadu'],':medical_treatment_private'=>$_POST['medical_treatment_private'],':will_you_form'=>$_POST['will_you_form'],':government_hospital'=>$_POST['government_hospital'],':country_id'=>$_POST['country_id'],':state_id'=>$_POST['state_id'],':district_id'=>$_POST['district_id'],':city_id'=>$_POST['city_id'],':area_id'=>$_POST['area_id'],':user_id'=>$_POST['user_id']);
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
  
	 $prepare_food_needed = $pdo_conn->prepare("UPDATE medical_help SET  entry_date='".$_POST['entry_date']."',patient_name='".$_POST['patient_name']."',age='".$_POST['age']."',gender='".$_POST['gender']."',disease_name='".$_POST['disease_name']."',city='".$_POST['city']."',address='".$_POST['address']."',mobile_no='".$_POST['mobile_no']."',organization_name='".$_POST['organization_name']."',coordinator_name='".$_POST['coordinator_name']."',email='".$_POST['email']."',recommendation_form='".$_POST['recommendation_form']."',medical_report='".$_POST['medical_report']."',doctor_advice='".$_POST['doctor_advice']."',surgery_amount='".$_POST['surgery_amount']."',amount='".$_POST['amount']."',medical_insurance_plan_card='".$_POST['medical_insurance_plan_card']."',bring_it='".$_POST['bring_it']."',any_hospital_in_tamilnadu='".$_POST['any_hospital_in_tamilnadu']."',will_you_form='".$_POST['will_you_form']."' ,government_hospital='".$_POST['government_hospital']."',country_id='".$_POST['country_id']."',city_id='".$_POST['city_id']."',state_id='".$_POST['state_id']."',district_id='".$_POST['district_id']."',area_id='".$_POST['area_id']."',user_id='".$_POST['user_id']."'   WHERE  medical_help_id='".$_POST['medical_help_id']."' ");	
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
	
	 
	$pdo_statement="DELETE FROM medical_help where medical_help_id='".$_POST['medical_help_id']."' ";
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