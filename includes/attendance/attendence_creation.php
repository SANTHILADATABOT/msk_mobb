<?php 
include("../dbConnect.php");

$attendance_type = $_POST['attendance_type'];
$staff_latitute = $_POST['staff_latitute'];
$staff_longitute = $_POST['staff_longitute'];
$cur_date=date('Y-m-d');
$ex=explode("T",$_POST['att_entry_date']);
$random_no = $_POST['random_no'];
$random_sc = $_POST['random_sc'];
$sess_usertype_id = $_POST['sess_usertype_id'];
$sess_user_id = $_POST['sess_user_id'];
$attendance_no = $_POST['attendence_no'];

//echo "INSERT INTO attendance_entry(staff_name,attendance_no,attendance_type,entry_date,) VALUES ($sess_user_id,$attendance_no,$attendance_type,$att_entry_date)";
$pdo_statement = $pdo_conn->prepare("INSERT INTO attendance_entry(staff_name,attendance_no,attendance_type,type_id,entry_date,attendance_time,staff_latitude,staff_longitude,random_no,random_sc,mobile) VALUES (:staff_name,:attendance_no,:attendance_type,:type_id,:entry_date,:attendance_time,:staff_latitude,:staff_longitude,:random_no,:random_sc,:mobile)");			
$pdo_array=array(':staff_name'=>$sess_user_id,':attendance_no'=>$attendance_no,':attendance_type'=>$attendance_type,':type_id'=>'',':entry_date'=>$cur_date,':attendance_time'=>$ex[1],':staff_latitude'=>$staff_latitute,':staff_longitude'=>$staff_longitute,':random_no'=>$random_no,':random_no'=>$random_no,':random_sc'=>$random_sc,':mobile'=>'MOBILE');

$result=$pdo_statement->execute($pdo_array);

if($result == TRUE)
{
	echo "Successfully Created";
}
else
{
	$array = array('error'=> $approve_status->errorinfo());
	echo json_encode($array);
}






?>