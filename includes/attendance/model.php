<?php 
include("../dbConnect.php");

$attendance_type = $_POST['attendance_type'];
$description = $_POST['description'];
$staff_latitute = $_POST['staff_latitute'];
$staff_longitute = $_POST['staff_longitute'];
$cur_date=date('Y-m-d');
$ex=explode("T",$_POST['att_entry_date']);
$random_no = $_POST['random_no'];
$random_sc = $_POST['random_sc'];
$user_type = $_POST['sess_usertype_id'];
$sess_user_id = $_POST['sess_user_id'];
$attendance_no = $_POST['attendence_no'];
 $image_name = $_POST['image_name'];

if($_GET['action']=='attendance_entry')
{
 
$pdo_statement = $pdo_conn->prepare("INSERT INTO attendance_entry(staff_name,attendance_no,attendance_type,type_id,entry_date,attendance_time,staff_latitude,staff_longitude,random_no,random_sc,mobile,image_name,description) VALUES (:staff_name,:attendance_no,:attendance_type,:type_id,:entry_date,:attendance_time,:staff_latitude,:staff_longitude,:random_no,:random_sc,:mobile,:image_name,:description)");			
$pdo_array1=array(':staff_name'=>$sess_user_id,':attendance_no'=>$attendance_no,':attendance_type'=>$attendance_type,':type_id'=>'',':entry_date'=>$cur_date,':attendance_time'=>$ex[1],':staff_latitude'=>$staff_latitute,':staff_longitude'=>$staff_longitute,':random_no'=>$random_no,':random_no'=>$random_no,':random_sc'=>$random_sc,':mobile'=>'MOBILE',':image_name'=>$image_name,':description'=>$description);
 
$result=$pdo_statement->execute($pdo_array1);
 
if($result == TRUE)
{
	
	echo "Successfully Created";
}
else
{
	$array = array('error'=> $approve_status->errorinfo());
	echo json_encode($array);
}


}


if($_GET['action']=='attendance_delete')
{
	$deletesql=mysql_query("delete from  attendance_entry where att_id  ='$_POST[att_id]'");
}

?>