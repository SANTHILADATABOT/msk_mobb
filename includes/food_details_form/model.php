<?php

include( "../dbConnect.php" );
include( "../common_function.php" );

if($_POST['action']=='ADD')
{
    $image1='';
    $base64_image = $_POST['image'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/Food_Needed_Image/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image1 = $filename;}
    }
	$pdo_statement = $pdo_conn->prepare("INSERT INTO food_needed (organization_name,city,s_no,name, age, address, mobile_no, annual_income, image, stage, disabled_person, food_does_not_needed, profession, reason_for_choosing_food, family_status, thanavanthar_name, mobile_number, school_name, coordinator_phone, school_imam_signature, masjidh_imam_phone, muttavalli_signature, phone, amount_of_giving, country_id, state_id, district_id, city_id, area_id ,user_id,family_no) VALUES (:organization_name,:city,:s_no,:name, :age, :address, :mobile_no, :annual_income, :image, :stage, :disabled_person, :food_does_not_needed,:profession, :reason_for_choosing_food, :family_status, :thanavanthar_name, :mobile_number, :school_name, :coordinator_phone, :school_imam_signature, :masjidh_imam_phone, :muttavalli_signature, :phone, :amount_of_giving,:country_id, :state_id, :district_id, :city_id, :area_id,:user_id,:family_no)");
		
	$pdo_array=array(':organization_name'=>$_POST['organization_name'],':city'=>$_POST['city'],':s_no'=>$_POST['s_no'],':name'=>$_POST['name'],':age'=>$_POST['age'],':address'=>$_POST['address'],':mobile_no'=>$_POST['mobile_no'],':annual_income'=>$_POST['annual_income'],':image'=>$image1,':stage'=>$_POST['stage'],':disabled_person'=>$_POST['disabled_person'],':food_does_not_needed'=>$_POST['food_does_not_needed'],':profession'=>$_POST['profession'],':reason_for_choosing_food'=>$_POST['reason_for_choosing_food'],':family_status'=>$_POST['family_status'],':thanavanthar_name'=>$_POST['thanavanthar_name'],':mobile_number'=>$_POST['mobile_number'],':school_name'=>$_POST['school_name'],':coordinator_phone'=>$_POST['coordinator_phone'],':school_imam_signature'=>$_POST['school_imam_signature'],':masjidh_imam_phone'=>$_POST['masjidh_imam_phone'],':muttavalli_signature'=>$_POST['muttavalli_signature'],':phone'=>$_POST['phone'],':amount_of_giving'=>$_POST['amount_of_giving'],':country_id'=>$_POST['country_id'],':state_id'=>$_POST['state_id'],':district_id'=>$_POST['district_id'],':city_id'=>$_POST['city_id'],':area_id'=>$_POST['area_id'],':user_id'=>$_POST['user_id'],':family_no'=>$_POST['family_no']);

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
elseif($_POST['action']=='Update')
{
    $image1='';
    $base64_image = $_POST['image'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/Food_Needed_Image/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image1 = $filename;}
    }elseif($_POST['check_existing_image_removed'] == '0'){
        $image1 = $_POST['old_image'];
    }
    //if($_POST['image']!=null){
	 $prepare_food_needed = $pdo_conn->prepare("UPDATE food_needed SET  organization_name='".$_POST['organization_name']."',city='".$_POST['city']."',age='".$_POST['age']."',s_no='".$_POST['s_no']."',name='".$_POST['name']."',address='".$_POST['address']."',mobile_no='".$_POST['mobile_no']."',annual_income='".$_POST['annual_income']."',image='".$image1."',stage='".$_POST['stage']."',disabled_person='".$_POST['disabled_person']."',food_does_not_needed='".$_POST['food_does_not_needed']."',profession='".$_POST['profession']."',reason_for_choosing_food='".$_POST['reason_for_choosing_food']."',family_status='".$_POST['family_status']."',thanavanthar_name='".$_POST['thanavanthar_name']."',mobile_number='".$_POST['mobile_number']."',school_name='".$_POST['school_name']."',coordinator_phone='".$_POST['coordinator_phone']."',school_imam_signature='".$_POST['school_imam_signature']."' ,masjidh_imam_phone='".$_POST['masjidh_imam_phone']."' ,muttavalli_signature='".$_POST['muttavalli_signature']."',phone='".$_POST['phone']."',amount_of_giving='".$_POST['amount_of_giving']."',country_id='".$_POST['country_id']."',city_id='".$_POST['city_id']."',state_id='".$_POST['state_id']."',district_id='".$_POST['district_id']."',area_id='".$_POST['area_id']."',user_id='".$_POST['user_id']."',family_no='".$_POST['family_no']."'  WHERE  food_needed_id='".$_POST['food_needed_id']."' ");	
        $result = $prepare_food_needed->execute();
     /*}else{
         $prepare_food_needed = $pdo_conn->prepare("UPDATE food_needed SET  organization_name='".$_POST['organization_name']."',city='".$_POST['city']."',age='".$_POST['age']."',s_no='".$_POST['s_no']."',name='".$_POST['name']."',address='".$_POST['address']."',mobile_no='".$_POST['mobile_no']."',annual_income='".$_POST['annual_income']."',stage='".$_POST['stage']."',disabled_person='".$_POST['disabled_person']."',food_does_not_needed='".$_POST['food_does_not_needed']."',profession='".$_POST['profession']."',reason_for_choosing_food='".$_POST['reason_for_choosing_food']."',family_status='".$_POST['family_status']."',thanavanthar_name='".$_POST['thanavanthar_name']."',mobile_number='".$_POST['mobile_number']."',school_name='".$_POST['school_name']."',coordinator_phone='".$_POST['coordinator_phone']."',school_imam_signature='".$_POST['school_imam_signature']."' ,masjidh_imam_phone='".$_POST['masjidh_imam_phone']."' ,muttavalli_signature='".$_POST['muttavalli_signature']."',phone='".$_POST['phone']."',amount_of_giving='".$_POST['amount_of_giving']."',country_id='".$_POST['country_id']."',city_id='".$_POST['city_id']."',state_id='".$_POST['state_id']."',district_id='".$_POST['district_id']."',area_id='".$_POST['area_id']."',user_id='".$_POST['user_id']."'  WHERE  food_needed_id='".$_POST['food_needed_id']."' ");	
        $result = $prepare_food_needed->execute();
     }*/ 
  

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
	
	 
	$pdo_statement="DELETE FROM food_needed where food_needed_id='".$_POST['food_needed_id']."' ";
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