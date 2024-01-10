<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "../dbConnect.php" );
include( "../common_function.php" );

if($_POST['action']=="add") 
{

  $user_id = $_POST['user_id'];
 


 
$statement = $pdo_conn->prepare("INSERT INTO  join_masjith (user_id, district_name, taluk, city, image, name, father_name, age, profession, pay_amount, address, blood_group, mobile_no, email,serve_department, other_services, country_id, state_id, district_id, city_id, area_id) VALUES (:user_id, :district_name, :taluk, :city, :image, :name, :father_name, :age, :profession, :pay_amount, :address, :blood_group, :mobile_no, :email,:serve_department, :other_services, :country_id, :state_id, :district_id, :city_id, :area_id)");

 $pdo_array= array(
	 	':user_id'=>$user_id,
		':district_name'=>$_POST['district_name'],
		':taluk'=>$_POST['taluk'],
		':city'=>$_POST['city'],
		':image'=>$_POST['join_image'],
		':name'=>$_POST['name'],
		':father_name'=>$_POST['father_name'],
		':age'=>$_POST['age'],
		':profession'=>$_POST['profession'],
		':pay_amount'=>$_POST['pay_amount'],
		':address'=>$_POST['address'],
		':blood_group'=>$_POST['blood_group'],
		':mobile_no'=>$_POST['mobile_no'],
		':email'=>$_POST['email'],
		':serve_department'=>$_POST['insert'],
		':other_services'=>$_POST['other_services'],
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
	 
$user_id = $_POST['user_id'];

$pdo_statement=$pdo_conn->prepare("update join_masjith set user_id='".$user_id."',district_name='".$_POST['district_name']."',taluk='".$_POST['taluk']."',city='".$_POST['city']."',image='".$_POST['join_image']."',name='".$_POST['name']."',father_name='".$_POST['father_name']."',age='".$_POST['age']."',profession='".$_POST['profession']."',pay_amount='".$_POST['pay_amount']."',address='".$_POST['address']."',blood_group='".$_POST['blood_group']."',mobile_no='".$_POST['mobile_no']."',email='".$_POST['email']."',serve_department='".$_POST['insert']."',other_services='".$_POST['other_services']."',country_id='".$_POST['country_id']."',state_id='".$_POST['state_id']."',district_id='".$_POST['district_id']."',city_id='".$_POST['city_id']."',area_id='".$_POST['area_id']."' where join_id='".$_POST['join_id']."' ");
	   $result = $pdo_statement->execute();

	  
	if(!empty($result)) {
	echo $msg = "Successfully Updated";
	}
	else { print_r($pdo_statement->errorinfo()); }
	
	//echo json_encode(array('data'=>$msg, 'err'=>'1', 'contactsql'=>$contactsql, 'c1'=>$c1, 'c2'=>$c2));
	
} 
 
 if($_POST['action']=="Delete")
{
	
	 
	$pdo_statement="DELETE FROM join_masjith where join_id='".$_POST['join_id']."' ";
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

	