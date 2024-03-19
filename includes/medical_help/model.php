<?php
 
include( "../dbConnect.php" );
include( "../common_function.php" );

if($_POST['action']=='ADD')
{
    $image1='';
    $base64_image = $_POST['medical_image1'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/medical_help/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image1 = $filename;}
    }
    $image2='';
    $base64_image = $_POST['medical_image2'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/medical_help/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image2 = $filename;}
    }
    $image3='';
    $base64_image = $_POST['medical_image3'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/medical_help/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image3 = $filename;}
    }
    $image4='';
    $base64_image = $_POST['medical_image4'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/medical_help/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image4 = $filename;}
    }
    $image5='';
    $base64_image = $_POST['medical_image5'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/medical_help/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image5 = $filename;}
    }
	$pdo_statement = $pdo_conn->prepare("INSERT INTO medical_help (entry_date,patient_name, age, gender, disease_name, address, mobile_no, city, organization_name, coordinator_name, c_mobile_no, email,recommendation_form,medical_report , doctor_advice, surgery_amount, amount, medical_insurance_plan_card,bring_it,any_hospital_in_tamilnadu,medical_treatment_private,will_you_form,government_hospital,image1, image2, image3, image4, image5, school_name, school_imam_signature, signature_name, signature_mobile, muththavalli_signature, muththavalli_signature_name, muththavalli_signature_mobile, country_id, state_id, district_id, city_id, area_id ,user_id) VALUES (:entry_date,:patient_name,:age, :gender, :disease_name,:address,:mobile_no,:city,:organization_name,:coordinator_name,:c_mobile_no,:email,:recommendation_form,:medical_report, :doctor_advice,:surgery_amount,:amount,:medical_insurance_plan_card,:bring_it,:any_hospital_in_tamilnadu,:medical_treatment_private,:will_you_form,:government_hospital, :image1, :image2, :image3, :image4, :image5, :school_name, :school_imam_signature, :signature_name, :signature_mobile, :muththavalli_signature, :muththavalli_signature_name, :muththavalli_signature_mobile, :country_id, :state_id, :district_id, :city_id, :area_id,:user_id)");
			
	$pdo_array=array(':entry_date'=>$_POST['entry_date'],':patient_name'=>$_POST['patient_name'],':age'=>$_POST['age'],':gender'=>$_POST['gender'],':disease_name'=>$_POST['disease_name'],':address'=>$_POST['address'],':mobile_no'=>$_POST['mobile_no'],':city'=>$_POST['city'],':organization_name'=>$_POST['organization_name'],':coordinator_name'=>$_POST['coordinator_name'],':c_mobile_no'=>$_POST['c_mobile_no'],':email'=>$_POST['email'],':recommendation_form'=>$_POST['recommendation_form'],':medical_report'=>$_POST['medical_report'],':doctor_advice'=>$_POST['doctor_advice'],':surgery_amount'=>$_POST['surgery_amount'],':amount'=>$_POST['amount'],':medical_insurance_plan_card'=>$_POST['medical_insurance_plan_card'],':bring_it'=>$_POST['bring_it'],':any_hospital_in_tamilnadu'=>$_POST['any_hospital_in_tamilnadu'],':medical_treatment_private'=>$_POST['medical_treatment_private'],':will_you_form'=>$_POST['will_you_form'],':government_hospital'=>$_POST['government_hospital'],':image1'=>$image1,':image2'=>$image2,':image3'=>$image3,':image4'=>$image4,':image5'=>$image5,':school_name'=>$_POST['school_name'],':school_imam_signature'=>$_POST['school_imam_signature'],':signature_name'=>$_POST['signature_name'],':signature_mobile'=>$_POST['signature_mobile'],':muththavalli_signature'=>$_POST['muththavalli_signature'],':muththavalli_signature_name'=>$_POST['muththavalli_signature_name'],':muththavalli_signature_mobile'=>$_POST['muththavalli_signature_mobile'],':country_id'=>$_POST['country_id'],':state_id'=>$_POST['state_id'],':district_id'=>$_POST['district_id'],':city_id'=>$_POST['city_id'],':area_id'=>$_POST['area_id'],':user_id'=>$_POST['user_id']);
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
    $image1='';
    $base64_image = $_POST['medical_image1'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/medical_help/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image1 = $filename;}
    }elseif($_POST['check_existing_image_removed1'] == '0'){
        $image1 = $_POST['old_image1'];
    }
    $image2='';
    $base64_image = $_POST['medical_image2'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/medical_help/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image2 = $filename;}
    }elseif($_POST['check_existing_image_removed2'] == '0'){
        $image2 = $_POST['old_image2'];
    }
    $image3='';
    $base64_image = $_POST['medical_image3'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/medical_help/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image3 = $filename;}
    }elseif($_POST['check_existing_image_removed3'] == '0'){
        $image3 = $_POST['old_image3'];
    }
    $image4='';
    $base64_image = $_POST['medical_image4'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/medical_help/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image4 = $filename;}
    }elseif($_POST['check_existing_image_removed4'] == '0'){
        $image4 = $_POST['old_image4'];
    }
    $image5='';
    $base64_image = $_POST['medical_image5'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/medical_help/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image5 = $filename;}
    }elseif($_POST['check_existing_image_removed5'] == '0'){
        $image5 = $_POST['old_image5'];
    }
	 $prepare_food_needed = $pdo_conn->prepare("UPDATE medical_help SET  entry_date='".$_POST['entry_date']."',patient_name='".$_POST['patient_name']."',age='".$_POST['age']."',gender='".$_POST['gender']."',disease_name='".$_POST['disease_name']."',city='".$_POST['city']."',address='".$_POST['address']."',mobile_no='".$_POST['mobile_no']."',organization_name='".$_POST['organization_name']."',coordinator_name='".$_POST['coordinator_name']."',c_mobile_no='".$_POST['c_mobile_no']."',email='".$_POST['email']."',recommendation_form='".$_POST['recommendation_form']."',medical_report='".$_POST['medical_report']."',doctor_advice='".$_POST['doctor_advice']."',surgery_amount='".$_POST['surgery_amount']."',amount='".$_POST['amount']."',medical_insurance_plan_card='".$_POST['medical_insurance_plan_card']."',bring_it='".$_POST['bring_it']."',any_hospital_in_tamilnadu='".$_POST['any_hospital_in_tamilnadu']."',will_you_form='".$_POST['will_you_form']."',medical_treatment_private='".$_POST['medical_treatment_private']."'  ,government_hospital='".$_POST['government_hospital']."', image1='".$image1."',image2='".$image2."',image3='".$image3."',image4='".$image4."',image5='".$image5."',school_name='".$_POST['school_name']."', school_imam_signature='".$_POST['school_imam_signature']."', signature_name='".$_POST['signature_name']."', signature_mobile='".$_POST['signature_mobile']."', muththavalli_signature='".$_POST['muththavalli_signature']."', muththavalli_signature_name='".$_POST['muththavalli_signature_name']."', muththavalli_signature_mobile='".$_POST['muththavalli_signature_mobile']."',country_id='".$_POST['country_id']."',city_id='".$_POST['city_id']."',state_id='".$_POST['state_id']."',district_id='".$_POST['district_id']."',area_id='".$_POST['area_id']."',user_id='".$_POST['user_id']."'   WHERE  medical_help_id='".$_POST['medical_help_id']."' ");	
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