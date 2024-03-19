<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "../dbConnect.php" );
include( "../common_function.php" );

if($_POST['action']=="add") 
{
    $image1='';
    $base64_image = $_POST['job_image'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/job_image/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image1 = $filename;}
    }
    $user_id = $_POST['user_id'];
    $statement = $pdo_conn->prepare("INSERT INTO  job_application (user_id, id_no, dob, contact_no ,age, gender, qualification, experience, exp_yes1, exp_yes2, language, city, pincode, passport, marital_status, license, area_of_interest, from_salary, to_salary, physically,disability,job,location,hobbies,name,father_name,mother_name,per_address,mobile_no,whatsapp_no,email,job_image,school_name , school_imam_signature , signature_name , signature_mobile,muththavalli_signature , muththavalli_signature_name , muththavalli_signature_mobile, country_id, state_id, district_id, city_id, area_id) VALUES (:user_id, :id_no, :dob, :contact_no, :age, :gender, :qualification, :experience, :exp_yes1, :exp_yes2,:language, :city, :pincode, :passport, :marital_status, :license, :area_of_interest, :from_salary, :to_salary,:physically,:disability, :job,:location,:hobbies,:name,:father_name,:mother_name,:per_address,:mobile_no,:whatsapp_no,:email,:job_image, :school_name , :school_imam_signature , :signature_name ,:signature_mobile ,:muththavalli_signature , :muththavalli_signature_name , :muththavalli_signature_mobile,:country_id, :state_id, :district_id, :city_id, :area_id)");
    $pdo_array= array(
	 	':user_id'=>$user_id,
		':id_no'=>$_POST['id_no'],
		':dob'=>$_POST['dob'],
		':contact_no'=>$_POST['contact_no'],
		':age'=>$_POST['age'],
		':gender'=>$_POST['gender'],
		':qualification'=>$_POST['qualification'],
		':experience'=>$_POST['experience'],
		':exp_yes1'=>$_POST['exp_yes1'],
		':exp_yes2'=>$_POST['exp_yes2'],
		':language'=>$_POST['language'],
		':city'=>$_POST['city'],
		':pincode'=>$_POST['pincode'],
		':passport'=>$_POST['passport'],
		':marital_status'=>$_POST['marital_status'],
		':license'=>$_POST['insert'],
		':area_of_interest'=>$_POST['area_of_interest'],
		':from_salary'=>$_POST['from_salary'],
		':to_salary'=>$_POST['to_salary'],
		':physically'=>$_POST['physically'],
		':disability'=>$_POST['disability'],
		':job'=>$_POST['insert1'],
		':location'=>$_POST['insert2'],
	     ':hobbies'=>$_POST['hobbies'],
	      ':name'=>$_POST['name'],
	     ':father_name'=>$_POST['father_name'],
	     ':mother_name'=>$_POST['mother_name'],
	     ':per_address'=>$_POST['per_address'],
	     ':mobile_no'=>$_POST['mobile_no'],
	     ':whatsapp_no'=>$_POST['whatsapp_no'],
	     ':email'=>$_POST['email'],
	     ':job_image'=>$image1,
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
    $base64_image = $_POST['job_image'];
    if($base64_image != ''){
        list($type, $data) = explode(';', $base64_image);
        list(, $data)      = explode(',', $data);
        $image_data = base64_decode($data);
        $random_sc = date('dmyhis');
        $random_no=rand(00000,99999);
        $filename = $random_no.$random_sc."."."jpg";
        $filepath = ($_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/job_image/"). $filename;
        file_put_contents($filepath, $image_data);
        if (file_exists($filepath)) {$image1 = $filename;}
    }elseif($_POST['check_existing_image_removed'] == '0'){
        $image1 = $_POST['old_image'];
    }
    $user_id = $_POST['user_id'];
	$pdo_statement=$pdo_conn->prepare("update job_application set user_id='".$user_id."',id_no='".$_POST['id_no']."',dob='".$_POST['dob']."',contact_no='".$_POST['contact_no']."',age='".$_POST['age']."',gender='".$_POST['gender']."',qualification='".$_POST['qualification']."',experience='".$_POST['experience']."',exp_yes1='".$_POST['exp_yes1']."',exp_yes2='".$_POST['exp_yes2']."',language='".$_POST['language']."',city='".$_POST['city']."',pincode='".$_POST['pincode']."',passport='".$_POST['passport']."',marital_status='".$_POST['marital_status']."',license='".$_POST['insert']."',area_of_interest='".$_POST['area_of_interest']."',from_salary='".$_POST['from_salary']."',to_salary='".$_POST['to_salary']."',physically='".$_POST['physically']."',disability='".$_POST['disability']."',job='".$_POST['insert1']."',location='".$_POST['insert2']."',hobbies='".$_POST['hobbies']."',name='".$_POST['name']."' ,father_name='".$_POST['father_name']."',mother_name='".$_POST['mother_name']."',per_address='".$_POST['per_address']."',mobile_no='".$_POST['mobile_no']."',whatsapp_no='".$_POST['whatsapp_no']."',email='".$_POST['email']."',job_image='".$image1."',school_name='".$_POST['school_name']."',school_imam_signature='".$_POST['school_imam_signature']."',signature_name='".$_POST['signature_name']."',signature_mobile='".$_POST['signature_mobile']."',muththavalli_signature='".$_POST['muththavalli_signature']."',muththavalli_signature_name='".$_POST['muththavalli_signature_name']."',muththavalli_signature_mobile='".$_POST['muththavalli_signature_mobile']."',state_id='".$_POST['state_id']."',country_id='".$_POST['country_id']."',state_id='".$_POST['state_id']."',district_id='".$_POST['district_id']."',city_id='".$_POST['city_id']."',area_id='".$_POST['area_id']."' where job_id='".$_POST['job_id']."' ");
    $result = $pdo_statement->execute();
	if(!empty($result)) {
	    echo $msg = "Successfully Updated";
	}
	else { print_r($pdo_statement->errorinfo()); }
} 
 
 if($_POST['action']=="Delete")
{
	
	 
	$pdo_statement="DELETE FROM job_application where job_id='".$_POST['job_id']."' ";
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

	