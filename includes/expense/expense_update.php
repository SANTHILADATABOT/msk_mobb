<?php
include("../db_connection.php"); 

echo "update  daily_expense set expense_type = '$_POST[expense_type]',sub_expense_type='$_POST[sub_exp]',amount='$_POST[amount]',description='$_POST[description]',profile_image_2 ='$_POST[image_name]' ,latitude='$_POST[lati]',longitude='$_POST[longi]' where exp_id ='$_POST[exp_id]'";
$updatesql=mysql_query("update  daily_expense set expense_type = '$_POST[expense_type]',sub_expense_type='$_POST[sub_exp]',amount='$_POST[amount]',description='$_POST[description]',profile_image_2 ='$_POST[image_name]' ,latitude='$_POST[lati]',longitude='$_POST[longi]' where exp_id ='$_POST[exp_id]'");



?>