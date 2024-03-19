<?php
function get_user_name($staff_name_id)
{
	global $pdo_conn;
	$step_views = $pdo_conn->prepare("SELECT user_name FROM user_creation where user_id='".$staff_name_id."'");
	$step_views->execute();
	$step_views_all = $step_views->fetch();	
	return $step_views_all['user_name'];
}
function get_att_name($live_id)
{
	global $pdo_conn;
	$step_views = $pdo_conn->prepare("SELECT attendance_type FROM attendance_type_live where live_id='".$live_id."'");
	$step_views->execute();
	$step_views_all = $step_views->fetch();	
	return $step_views_all['attendance_type'];
}

function get_exp_name($exp_type)
{	
	global $pdo_conn;
	$exp = $pdo_conn->prepare("select * FROM daily_expense_type where expense_type_id='".$exp_type."'");
	$exp->execute();
	$exp_all = $exp->fetch();	
	return $exp_all['expense_name'];
}

?>