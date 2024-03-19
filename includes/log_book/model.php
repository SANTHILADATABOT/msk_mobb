<?php
include("../dbConnect.php");
$sess_user_type_id=$_POST[sess_usertype_id];
$sess_user_id=$_POST[sess_user_id];
 

function get_log_book_model_log_invoice($acc_year)
{
	$date=date("Y");
	$st_date=substr($date,2);
	$month=date("m");	   
	$datee=$st_date.$month;
	$prepare_statement=$pdo_conn->prepare("select max(log_no) as set_inv from log_book where acc_year='$acc_year' and main_delete_status!='1'");

	$prepare_statement->execute();
	$rscount = $prepare_statement->fetch();
	if($rscount!=0)
	{		
		$set_inv=$rsdata->set_inv;
		$pur_array=explode('-',$set_inv);
		$inv_no=$pur_array[2]+1;
		$reg_nos='LOG-'.$datee.'-'.str_pad($inv_no, 4, '0', STR_PAD_LEFT);
	}
	else
	{
		$inv_no=0001;
		$reg_nos='LOG-'.$datee.'-'.$inv_no;
	}
	return $reg_nos;
}

$action = $_GET['action'];
$cur_date=date('Y-m-d');


switch ($action) {
    case "SUBMIT":

		//$log_no=get_log_book_model_log_invoice($_POST['acc_year']);
		$log_no="LOG-4552414";
		$pdo_statement = $pdo_conn->prepare("INSERT INTO log_book (entry_date,random_no,random_sc,log_no,sales_ref_id,opening_km,closing_km,total_km,litres,amount,description,sess_user_type_id,sess_user_id,acc_year,latitude,longitude,image_name,closing_km_img)values(:entry_date,:random_no,:random_sc,:log_no,:sales_ref_id,:opening_km,:closing_km,:total_km,:litres,:amount,:description,:sess_user_type_id,:sess_user_id,:acc_year,:latitude,:longitude,:image_name,:closing_km_img)");	
 		$array_data=array(':entry_date'=>$_POST['entry_date'],':random_no'=>$_POST['random_no'],':random_sc'=>$_POST['random_sc'],':log_no'=>$log_no,':sales_ref_id'=>$sess_user_id,':opening_km'=>$_POST['opening_km'],':closing_km'=>$_POST['closing_km'],':total_km'=>$_POST['total_km'],':litres'=>$_POST['litres'],':amount'=>$_POST['amount'],':description'=>$_POST['description'],':sess_user_type_id'=>$sess_user_type_id,':sess_user_id'=>$sess_user_id,':acc_year'=>$_POST['acc_year'],':latitude'=>$_POST['latitude'],':longitude'=>$_POST['longitude'],':image_name'=>$_POST['image_name'],':closing_km_img'=>$_POST['closing_km_img']);
		$result=$pdo_statement->execute($array_data);
		if($result == TRUE)
		{			 
			echo $msg="Successfully Created";
		}
		else
		{
			$array = array('error'=> $pdo_statement->errorinfo());
		}

	break;

	case "UPDATE":	
	 
		$Insql=$pdo_conn->prepare("update log_book set entry_date='$_POST[entry_date]',sales_ref_id='$sess_user_id',opening_km='$_POST[opening_km]',closing_km='$_POST[closing_km]',total_km='$_POST[total_km]',litres='$_POST[litres]',amount='$_POST[amount]',description='$_POST[description]',sess_user_type_id='$sess_user_type_id',sess_user_id='$sess_user_id',sess_ipaddress='$sess_ipaddress',latitude='$_POST[latitude]',longitude='$_POST[longitude]' where random_no='$_POST[random_no]' and random_sc='$_POST[random_sc]' and 	log_no='$_POST[log_no]' and log_id ='$_POST[log_id]'");
		$result=$Insql->execute();
		if($result == TRUE)
		{
			echo "Successfully Updated";
		}
		else
		{
			$array = array('error'=> $Insql->errorinfo());
		}

	break;

	case "DELETE":
	
		$Insql=$pdo_conn->prepare("update log_book set main_delete_status='1'  where log_id='$_GET[log_id]'");
		$result=$Insql->execute();
		if($result == TRUE)
		{
			echo "Successfully Deleted";
		}
		else
		{
			$array = array('error'=> $Insql->errorinfo());
		}
	break;	
}

?>