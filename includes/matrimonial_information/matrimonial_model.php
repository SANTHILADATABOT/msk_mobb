<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "../dbConnect.php" );
include( "../common_function.php" );

if($_POST['action']=="add") 
{
    $image1='';
    $base64_image = $_POST['matrimonial_image1'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/matrimonial_information/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image1 = $filename;}
    }
    $image2='';
    $base64_image = $_POST['matrimonial_image2'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/matrimonial_information/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image2 = $filename;}
    }
    $user_id = $_POST['user_id'];
    $statement = $pdo_conn->prepare("INSERT INTO  matrimonial_information (user_id, id_number, dob, age ,gender, height, weight, color, mother_tongue, tiniyat_scholarship, education_qualification, brother, sister, unmarried_brother, unmarried_sister, worker, if_worker, monthly_income, marital_status, passed_away,father_profession, handicapped, if_handicapped, expectation, hint, date, place, image1, name, father_name, mother_name, address, mobile_no, whatsapp_no, email, mohalla_name, image2 ,school_name , school_imam_signature , signature_name , signature_mobile,muththavalli_signature , muththavalli_signature_name , muththavalli_signature_mobile, country_id, state_id, district_id, city_id, area_id) VALUES (:user_id, :id_number, :dob, :age, :gender, :height, :weight, :color, :mother_tongue, :tiniyat_scholarship, :education_qualification, :brother, :sister, :unmarried_brother, :unmarried_sister, :worker, :if_worker, :monthly_income, :marital_status, :passed_away, :father_profession, :handicapped, :if_handicapped, :expectation, :hint, :date, :place, :image1, :name, :father_name, :mother_name, :address, :mobile_no, :whatsapp_no, :email, :mohalla_name, :image2 , :school_name , :school_imam_signature , :signature_name ,:signature_mobile ,:muththavalli_signature , :muththavalli_signature_name , :muththavalli_signature_mobile,:country_id, :state_id, :district_id, :city_id, :area_id)");
    $pdo_array= array(
		':user_id'=>$user_id,
		':id_number'=>$_POST['id_number'],
		':dob'=>$_POST['dob'],
		':age'=>$_POST['age'],
		':gender'=>$_POST['gender'],
		':height'=>$_POST['height'],
		':weight'=>$_POST['weight'],
		':color'=>$_POST['color'],
		':mother_tongue'=>$_POST['mother_tongue'],
		':tiniyat_scholarship'=>$_POST['tiniyat_scholarship'],
		':education_qualification'=>$_POST['education_qualification'],
		':brother'=>$_POST['brother'],
		':sister'=>$_POST['sister'],
		':unmarried_brother'=>$_POST['unmarried_brother'],
		':unmarried_sister'=>$_POST['unmarried_sister'],
		':worker'=>$_POST['worker'],
		':if_worker'=>$_POST['if_worker'],
		':monthly_income'=>$_POST['monthly_income'],
		':marital_status'=>$_POST['marital_status'],
		':passed_away'=>$_POST['passed_away'],
		':father_profession'=>$_POST['father_profession'],
		':handicapped'=>$_POST['handicapped'],
		':if_handicapped'=>$_POST['if_handicapped'],
		':expectation'=>$_POST['expectation'],
		':hint'=>$_POST['hint'],
		':date'=>$_POST['date'],
		':place'=>$_POST['place'],
		':image1'=>$image1,
		':name'=>$_POST['name'],
		':father_name'=>$_POST['father_name'],
		':mother_name'=>$_POST['mother_name'],
		':address'=>$_POST['address'],
		':mobile_no'=>$_POST['mobile_no'],
		':whatsapp_no'=>$_POST['whatsapp_no'],
		':email'=>$_POST['email'],
		':mohalla_name'=>$_POST['mohalla_name'],
		':image2'=>$image2,
		':school_name'=>$_POST['school_name'],
		':school_imam_signature'=>$_POST['school_imam_signature'],
		':signature_name'=>$_POST['signature_name'],
		':signature_mobile'=>$_POST['signature_mobile'],
		':muththavalli_signature'=>$_POST['muththavalli_signature'],
		':muththavalli_signature_name'=>$_POST['muththavalli_signature_name'],
		':muththavalli_signature_mobile'=>$_POST['muththavalli_signature_mobile'],
		':country_id'=>$_POST['country_id'],
		':state_id'=>$_POST['state_id'],
	     ':district_id'=>$_POST['district_id'],
	     ':city_id'=>$_POST['city_id'],
	     ':area_id'=>$_POST['area_id']);
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
if($_POST['action']=="update")
{
    $image1='';
    $base64_image = $_POST['matrimonial_image1'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/matrimonial_information/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image1 = $filename;}
    }elseif($_POST['check_existing_image_removed1'] == '0'){
        $image1 = $_POST['old_image1'];
    }
    $image2='';
    $base64_image = $_POST['matrimonial_image2'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/matrimonial_information/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image2 = $filename;}
    }elseif($_POST['check_existing_image_removed2'] == '0'){
        $image2 = $_POST['old_image2'];
    }
    $user_id = $_POST['user_id'];
    $pdo_statement=$pdo_conn->prepare("update matrimonial_information set user_id='".$user_id."',id_number='".$_POST['id_number']."',dob='".$_POST['dob']."',age='".$_POST['age']."',gender='".$_POST['gender']."',height='".$_POST['height']."',weight='".$_POST['weight']."',color='".$_POST['color']."',mother_tongue='".$_POST['mother_tongue']."',tiniyat_scholarship='".$_POST['tiniyat_scholarship']."',education_qualification='".$_POST['education_qualification']."',brother='".$_POST['brother']."',sister='".$_POST['sister']."',unmarried_brother='".$_POST['unmarried_brother']."',unmarried_sister='".$_POST['unmarried_sister']."',worker='".$_POST['worker']."',if_worker='".$_POST['if_worker']."',monthly_income='".$_POST['monthly_income']."',marital_status='".$_POST['marital_status']."',passed_away='".$_POST['passed_away']."',father_profession='".$_POST['father_profession']."',handicapped='".$_POST['handicapped']."',if_handicapped='".$_POST['if_handicapped']."',expectation='".$_POST['expectation']."',hint='".$_POST['hint']."' ,date='".$_POST['date']."',place='".$_POST['place']."',image1='".$image1."',name='".$_POST['name']."',father_name='".$_POST['father_name']."',mother_name='".$_POST['mother_name']."',address='".$_POST['address']."',mobile_no='".$_POST['mobile_no']."',whatsapp_no='".$_POST['whatsapp_no']."',email='".$_POST['email']."',mohalla_name='".$_POST['mohalla_name']."',image2='".$image2."',school_name='".$_POST['school_name']."',school_imam_signature='".$_POST['school_imam_signature']."',signature_name='".$_POST['signature_name']."',signature_mobile='".$_POST['signature_mobile']."',muththavalli_signature='".$_POST['muththavalli_signature']."',muththavalli_signature_name='".$_POST['muththavalli_signature_name']."',muththavalli_signature_mobile='".$_POST['muththavalli_signature_mobile']."',country_id='".$_POST['country_id']."',state_id='".$_POST['state_id']."',district_id='".$_POST['district_id']."',city_id='".$_POST['city_id']."',area_id='".$_POST['area_id']."' where matrimonial_id='".$_POST['matrimonial_id']."' ");
	    $result = $pdo_statement->execute();
        echo	$msg = "Successfully Updated";
} 
 
 if($_POST['action']=="Delete")
{
	
	 
	$pdo_statement="DELETE FROM matrimonial_information where matrimonial_id='".$_POST['matrimonial_id']."' ";
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

