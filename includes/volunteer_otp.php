<?php
include( "dbConnect.php" );
include( "common_function.php" );

$user_id = $_GET['user_id'];
$country_id = $_GET['country_id'];  
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id']; 
// echo "<script>alert(".$register_id.")</script>";
$count = count($_POST["mobile_number"]);

$new_array = array_values($_POST["mobile_number"]);
// echo var_dump($new_array);
 $otp = mt_rand(1111, 9999);  
if($count > 0)  
{  
     for($i=0; $i<$count; $i++)  
     {
         
          if(trim($new_array[$i] != ''))
          {  
               $sql = "INSERT INTO volunteer_otp (user_id, mobile_number, otp, country_id, state_id, district_id, city_id, area_id,user_type) VALUES (:user_id, :mobile_number, :otp, :country_id, :state_id, :district_id, :city_id, :area_id,:user_type)";  
               $stmt = $pdo_conn->prepare($sql);
               $pdo_array = array(':user_id'=>$user_id, ':mobile_number'=>$new_array[$i], ':otp'=>$otp, ':country_id'=>$country_id, ':state_id'=>$state_id, ':district_id'=>$district_id, ':city_id'=>$city_id, ':area_id'=>$area_id,':user_type'=>'volunteer');
               $result =$stmt->execute($pdo_array);  
               
               $otp_id = $pdo_conn->lastInsertId();
               
               $sql_volunteer = "INSERT INTO usercreation (username, mobile, password, email, otp_number, otp_id, country_id, state_id, district_id, city_id, area_id,if_volunteer_user, active_status) VALUES (:username, :mobile, :password, :email, :otp_number, :otp_id, :country_id, :state_id, :district_id, :city_id, :area_id,:if_volunteer_user, :active_status)";  
               
               $stmt_volunteer = $pdo_conn->prepare($sql_volunteer);
               $pdo_array_volunteer = array(':username'=>$new_array[$i], ':mobile'=>$new_array[$i], ':password'=>$otp, ':email'=>$new_array[$i], ':otp_number'=>$otp, ':otp_id'=>$otp_id, ':country_id'=>$country_id, ':state_id'=>$state_id, ':district_id'=>$district_id, ':city_id'=>$city_id, ':area_id'=>$area_id,':if_volunteer_user'=>'volunteer',':active_status'=>'1');
               $result =$stmt_volunteer->execute($pdo_array_volunteer);  

               
              // echo print_r($pdo_array_volunteer);

               //SEND SMS
               $to_mobile = $new_array[$i];
               $otp_number=$otp;
               $description='Hi '.$name.', Your OTP is '.$otp_number;
               /* $url="http://login.smsgatewayhub.com/api/mt/SendSMS?APIKey=AIzaSyCwWYdIuiwCZ5XvvvUlFubu0QPzS2PpvRw&senderid=CARGEK&channel=2&DCS=0&flashsms=0&number=".$mobile."&text=".$description."&route=1";

               $ch = curl_init();
               curl_setopt($ch, CURLOPT_URL, str_replace(' ','%20',$url));
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
               $data = curl_exec($ch);
               curl_close($ch);*/
               }  
     }  
     
     echo "Your OTP is ".$otp_number;  
}
 
?>

   
  
