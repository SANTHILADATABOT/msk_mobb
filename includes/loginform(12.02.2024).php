<?php
date_default_timezone_set('Asia/Kolkata');
header('Access-Control-Allow-Origin: *'); 
include("dbConnect.php");
include( "common_function.php" );
if($_GET['action']=="login") 
{		
	$password = $_GET['password'];
	$username=$_GET['username'];	
	$token_id=$_GET['token_id'];
	
 $sql = "SELECT count(*) FROM usercreation  where (username='".$username."' || mobile='".$username."') and password='".$password."'  and delete_status='0' "; 
$result = $pdo_conn->prepare($sql); 
$result->execute([$bar]); 
$number_of_rows = $result->fetchColumn(); 

if($number_of_rows==1)
{
	$login_main=$pdo_conn->prepare("SELECT * FROM usercreation where  (username='".$username."' || mobile='".$username."') and password='".$password."' and delete_status='0' "); 

	$login_main->execute();
	$login_main_check = $login_main->fetch();
	$user_id=$login_main_check["user_id"]; 
	$otp_number=$login_main_check['otp_number'];

	$country_id=$login_main_check['country_id'];
	$state_id=$login_main_check['state_id'];
	$district_id=$login_main_check['district_id'];
	$city_id=$login_main_check['city_id'];
	$area_id=$login_main_check['area_id'];
	$user_type=$login_main_check['user_type'];
	
    $survey1 = $pdo_conn->prepare("SELECT * FROM  fact_finding_form WHERE  user_id='".$user_id."' and country_id='".$country_id."'  and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'and completed_status='0'");
    $survey1->execute();
    $survey1_records=$survey1->fetch();
    $unique_no=$survey1_records['unique_no'];
	
	$row_count=$login_main->rowCount();
	if(count($login_main_check)>0)
	{	
        /*session_start();
        $_SESSION['msk_signin_user_id']=$user_id;
        $_SESSION['msk_signin_country_id']=$country_id;
        $_SESSION['msk_signin_state_id']=$state_id;
        $_SESSION['msk_signin_district_id']=$district_id;
        $_SESSION['msk_signin_city_id']=$city_id;
        $_SESSION['msk_signin_area_id']=$area_id;
        $_SESSION['msk_signin_user_type']=$user_type;
        $_SESSION['msk_signin_unique_no']=$unique_no;
        session_write_close();*/
		echo  $user_id."@@".$country_id."@@".$state_id."@@".$district_id."@@".$city_id."@@".$area_id."@@".$user_type.'@@'.$unique_no;
		
		/*$url="http://login.smsgatewayhub.com/api/mt/SendSMS?APIKey=ZQJHEb7q4EuPv16s5IOKWg&senderid=CARGEK&channel=2&DCS=0&flashsms=0&number=".$mobile."&text=".$description."&route=1";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, str_replace(' ','%20',$url));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$data = curl_exec($ch);
		curl_close($ch);*/
 
		//////////Updating otp Number///////////
		$login_sub2 = $pdo_conn->prepare("UPDATE usercreation set otp_number='".$random_no."' , token_id='".$token_id."'  where user_id='$login_main_check[user_id]' and delete_status='0'"); 
		$login_result=$login_sub2->execute();
		//echo  $login_main_check['user_id']; 			
	}	
	else
	{ 
		echo 0;
	} 
}
else
{
echo 0;

}
}




if($_GET['action']=="otp_check") 
{
	
//echo "SELECT user_id,otp_number FROM usercreation where user_id='".$_GET['user_id']."' and delete_status='0'  ";	
	$sql=$pdo_conn->prepare("SELECT * FROM usercreation where user_id='".$_GET['user_id']."'");
	$sql->execute();
	$record = $sql->fetch();
	$otp_number=$record['otp_number'];
	$otp_status=$record['otp_status'];
	$current_date = date('Y-m-d');
	if($otp_number==$_GET['otp_number'])
	{
		//echo "1";
		$login_sub2 = $pdo_conn->prepare("UPDATE usercreation set otp_status='1',otp_modified='".$current_date."' where user_id='".$_GET['user_id']."' and delete_status='0'"); 
		$login_result=$login_sub2->execute();
	}
	else
	{		
		echo "0";
	} 
}

?>