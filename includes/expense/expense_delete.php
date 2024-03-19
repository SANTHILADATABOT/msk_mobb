<?php
include("../db_connection.php");
 $deletesql=mysql_query("delete from  daily_expense where exp_id  ='$_POST[exp_id]'");
?>