<?php
header('Access-Control-Allow-Origin: *');
date_default_timezone_set('Asia/Kolkata');
include '../dbConnect.php';
include '../common_function.php';
$user_id = $_GET['user_id'];
$country_id = $_GET['country_id'];
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id'];
$user_type = $_GET['user_type'];
$food_needed_id = $_GET['food_needed_id'];
$unique_no = $_GET['unique_no'];
$completed_status = $_GET['completed_status'];
?>
<style>
    input.form-control {
        padding-left: 40px;
    }
</style>
<div class="wrapper homepage">
    <div class="container-fluid" style="padding:0px;">
        <div class="row">
            <div class="col-md-8 top_left" style="padding-left:6px; margin-left:20px;">
                <h3><span class="notranslate">Create Image Upload</span></h3>
            </div>
            <div class="col-md-2 top_left">



            </div>
            <div class="col-md-2 top_left" style="padding-left:6px; margin-left:20px;">
                <i class="fa fa-arrow-circle-left arrow_back"
                    onClick="food_needed_create_back('<?php echo $country_id; ?>','<?php echo $state_id; ?>','<?php echo $district_id; ?>','<?php echo $city_id; ?>','<?php echo $area_id; ?>','<?php echo $user_id; ?>','<?php echo $unique_no; ?>','<?php echo $completed_status; ?>')"></i>
            </div>
        </div>
    </div>
    <div class="sub_bg animated bounceInLeft">
        <div class="container">
            <div class="row">
                <div class="col-md-12 survey_content">
                    <form class="login_form">
                        <!--   aleration-->
                        <div class="cover-field form-group">
                            <h5 class="select-bx">File</h5>
                            <div class="row"
                                style="  margin-bottom: 10px;margin-top: 0px;background-color:#f9f9f9;padding: 10px 10px 10px 10px;border-bottom: 1px solid #e6e6e6;"
                                id="pic_div">
                                <!--image_shown-->
                                <div class="col-xs-5" style="padding:0px;"> <img
                                        src="<?php echo $image_path; ?>/common_images/images.jpg" id='picture'
                                        name='picture' style="width: 100px; height: 100px;">
                                </div>
                                <div class="col-xs-7" style="padding:0px;margin-top:20px;">
                                    <div class="col-xs-6" style="padding: 0px;"> <img id='but_takes'
                                            enctype="multipart/form-data"
                                            src="<?php echo $image_path; ?>/common_images/photo.png"
                                            style="width:45px;height:45px;" /> </div>
                                    <div class="col-xs-6" style="padding: 0px;"> <img id='but_selects'
                                            enctype="multipart/form-data"
                                            src="<?php echo $image_path; ?>/common_images/gallery.png"
                                            style="width:45px;height:45px;" /> </div>
                                </div>
                                <div class="col-xs-5" style=" margin-left:45px; padding:0px;">
                                    <?php if($record['image']!=null){ ?>
                                    <img src="<?php echo $image_path; ?>/Food_Needed_Image/<?php echo $record['image']; ?>"
                                        id='temp_picture1' name='picture' style="width: 100px; height: 100px;">
                                    <button type="button" id="remove_img_btn1" class="bg-danger"
                                        onclick="remove_img_btn_click()" style="padding:5px;"><i
                                            class="fa fa-trash"></i></button>
                                    <?php } ?>
                                    <script>
                                        var check_existing_image_removed = false;

                                        function remove_img_btn_click() {
                                            document.getElementById("temp_picture1").src = '';
                                            document.getElementById("temp_picture1").style.display = "none";
                                            document.getElementById("remove_img_btn1").style.display = "none";
                                            window.localStorage.removeItem("image_name");
                                            check_existing_image_removed = true;
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <!--  End  aleration-->

                        <a class="btn btn-success"
                            onclick="food_details_entry('<?php echo $country_id; ?>','<?php echo $state_id; ?>','<?php echo $district_id; ?>','<?php echo $city_id; ?>','<?php echo $area_id; ?>','<?php echo $user_id; ?>','<?php echo $food_needed_id; ?>','<?php echo $unique_no; ?>','<?php echo $completed_status; ?>')">Submit</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function food_details_entry() {
        var image = window.localStorage.getItem("image_name");
        var sendInfo = {
            image: image
        };
        $.ajax({
            url: FILE_PATH + '/image_upload_test/model.php',
            type: 'POST',
            data: sendInfo,
            success: function(msg) {
                alert(msg)
                window.localStorage.removeItem("image_name");
                var user_id = '<?php echo $user_id; ?>';
                var country_id = '<?php echo $country_id; ?>';
                var state_id = '<?php echo $state_id; ?>';
                var district_id = '<?php echo $district_id; ?>';
                var city_id = '<?php echo $city_id; ?>';
                var area_id = '<?php echo $area_id; ?>';
                var user_type = '<?php echo $user_type; ?>';
                var unique_no = '<?php echo $unique_no; ?>';
                var completed_status = '<?php echo $completed_status; ?>';
                $("#previous_id").val('image_upload_test/index.php');
                $('#page_replace_div').load(FILE_PATH + '/image_upload_test/index.php?user_id=' +
                    user_id + '&country_id=' + country_id + '&state_id=' + state_id +
                    '&district_id=' + district_id + '&city_id=' + city_id + '&area_id=' + area_id +
                    '&unique_no=' + unique_no + '&completed_status=' + completed_status +
                    '&user_type=' + user_type);
            }
        });
    }
    $('#but_takes').click(function() {
        navigator.camera.getPicture(onSuccess, onFail, {
            quality: 50,
            destinationType: Camera.DestinationType.DATA_URL
        });
    });
    $("#but_selects").click(function() {
        navigator.camera.getPicture(onSuccess, onFail, {
            quality: 50,
            sourceType: Camera.PictureSourceType.PHOTOLIBRARY,
            allowEdit: false,
            destinationType: Camera.DestinationType.DATA_URL
        });
    });
    function onSuccess(imageData) {
        var imageData1="data:image/jpeg;base64," + imageData;
        var image = document.getElementById('picture');
        image.src = imageData1;
        $.ajax({
           type: "POST",
           url: "<?php echo $image_path;?>/image_upload_test/upload_img.php",
           data: { image: image.src },
           success: function(msg){
             alert(msg);
           }
        });
    }
    function onFail(message) {
        alert('Failed because: ' + message);
    }
    function food_needed_create_back(country_id, state_id, district_id, city_id, area_id, user_id, unique_no,
        completed_status) {
        var user_id = '<?php echo $user_id; ?>';
        var country_id = '<?php echo $country_id; ?>';
        var state_id = '<?php echo $state_id; ?>';
        var district_id = '<?php echo $district_id; ?>';
        var city_id = '<?php echo $city_id; ?>';
        var area_id = '<?php echo $area_id; ?>';
        var user_type = '<?php echo $user_type; ?>';
        var unique_no = '<?php echo $unique_no; ?>';
        var completed_status = '<?php echo $completed_status; ?>';
        $("#previous_id").val('image_upload_test/index.php');
        $('#page_replace_div').load(FILE_PATH + '/image_upload_test/index.php?user_id=' + user_id + '&country_id=' +
            country_id + '&state_id=' + state_id + '&district_id=' + district_id + '&city_id=' + city_id +
            '&area_id=' + area_id + '&unique_no=' + unique_no + '&completed_status=' + completed_status +
            '&user_type=' + user_type);
    }
</script>
