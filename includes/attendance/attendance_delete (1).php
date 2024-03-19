<?php
include("../dbConnect.php");
echo "delete from  attendance_entry where att_id  ='$_POST[att_id]'";
$deletesql=mysql_query("delete from  attendance_entry where att_id  ='$_POST[att_id]'");
 ?>