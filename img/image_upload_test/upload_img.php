<?php
include("../../includes/dbConnect.php");
include("../../includes/common_function.php");
/*if(isset($_FILES["file"])){
    $image_size=$_FILES["file"]["size"];
    $random_sc = date('dmyhis');
    $random_no=rand(00000,99999);
    $new_name = $random_no.$random_sc."."."jpg";
    
    move_uploaded_file($_FILES["file"]["tmp_name"],$_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/Food_Needed_Image/".$new_name);
    echo $new_name;
}
else{
    echo "Something went wrong";
}*/
?>

<?php
$base64_image = $_POST['image'];
list($type, $data) = explode(';', $base64_image);
list(, $data)      = explode(',', $data);
$image_data = base64_decode($data);
$folder_path = $_SERVER['DOCUMENT_ROOT']."/msk_mobb/img/image_upload_test/";
$random_sc = date('dmyhis');
$random_no=rand(00000,99999);
$filename = $random_no.$random_sc."."."jpg";
$filepath = $folder_path . $filename;
file_put_contents($filepath, $image_data);
if (file_exists($filepath)) {
    echo 'Image saved successfully at: ' . $filepath;
} else {
    echo 'Error saving image.';
}
?>
