<?php
if(isset($_FILES["file"])){
    $image_size=$_FILES["file"]["size"];
    $random_sc = date('dmyhis');
    $random_no=rand(00000,99999);
    $new_name = $random_no.$random_sc."."."jpg";
    
    move_uploaded_file($_FILES["file"]["tmp_name"],$_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/Food_Needed_Image/".$new_name);
    echo $new_name;
}
else{
    echo "Something went wrong";
}
?>