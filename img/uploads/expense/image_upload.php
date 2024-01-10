<?php
//Allow Headers
 
include("../../../includes/dbConnect.php");
$new_image_name =$_FILES["file"]["name"];
$random_sc = date('dmyhis');
	$random_no=rand(00000,99999);
	$new_name = $random_no.$random_sc."."."jpg";
//Move your files into upload folder
 
move_uploaded_file($_FILES["file"]["tmp_name"],$_SERVER['DOCUMENT_ROOT']."/guruveda_marketing_mob/img/uploads/expense/".$new_name);
 
echo $new_name;
 
?>