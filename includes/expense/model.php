<?php
include("../dbConnect.php");
 
$expense_no = $_POST['expense_no'];
$random_no = $_POST['random_no'];
$random_sc = $_POST['random_sc'];
$entry_date = $_POST['entry_date'];
$expense_type = $_POST['expense_type'];
$sub_exp = $_POST['sub_exp'];
$amount = $_POST['amount'];
$description = $_POST['description'];
$user_id = $_POST['user_id'];
$user_type = $_POST['user_type'];
$ipadress = $_POST['ipadress'];
$ledger_name = $_POST['ledger_name'];
$image_name = $_POST['image_name'];
$lati = $_POST['lati'];
$longi = $_POST['longi'];


if($_GET['action']=='expense_add')
{
	$pdo_statement = $pdo_conn->prepare("INSERT INTO daily_expense(expense_no,random_no,random_sc,entry_date,expense_type,sub_expense_type,amount,description,user_id,user_type,ipaddress,state_id,profile_image,latitude,longitude) VALUES (:expense_no,:random_no,:random_sc,:entry_date,:expense_type,:sub_expense_type,:amount,:description,:user_id,:user_type,:ipaddress,:state_id,:profile_image,:latitude,:longitude)");			
	$pdo_array=array(':expense_no'=>$expense_no,':random_no'=>$random_no,':random_sc'=>$random_sc,':entry_date'=>$entry_date,':expense_type'=>$expense_type,':sub_expense_type'=>$sub_exp,':amount'=>$amount,':description'=>$description,':user_id'=>$user_id,':user_type'=>$user_type,':ipaddress'=>$ipadress,':state_id'=>'',':profile_image'=>$image_name,':latitude'=>$lati,':longitude'=>$longi);
	$result=$pdo_statement->execute($pdo_array);

	if($result == TRUE)
	{
		echo "Successfully Created";
	}
	else
	{
		$array = array('error'=> $pdo_statement->errorinfo());
		echo json_encode($array);
	}
}

if($_GET['action']=='expense_update')
{
	echo "update  daily_expense set expense_type = '$_POST[expense_type]',sub_expense_type='$_POST[sub_exp]',amount='$_POST[amount]',description='$_POST[description]',profile_image_2 ='$_POST[image_name]' ,latitude='$_POST[lati]',longitude='$_POST[longi]' where exp_id ='$_POST[exp_id]'";
$updatesql=mysql_query("update  daily_expense set expense_type = '$_POST[expense_type]',sub_expense_type='$_POST[sub_exp]',amount='$_POST[amount]',description='$_POST[description]',profile_image_2 ='$_POST[image_name]' ,latitude='$_POST[lati]',longitude='$_POST[longi]' where exp_id ='$_POST[exp_id]'");
}

if($_GET['action']=='expense_delete')
{
	$deletesql=mysql_query("delete from  daily_expense where exp_id  ='$_POST[exp_id]'");
}
?>

