<?php
header('Access-Control-Allow-Origin: *');
date_default_timezone_set('Asia/Kolkata');
include '../dbConnect.php';
include '../common_function.php';
$sess_user_id = $_GET['sess_user_id'];
$sess_usertype_id = $_GET['sess_usertype_id'];
$crt_month = date('Y-m');
$current_date = date('Y-m-d');

$country_id = $_GET['country_id'];
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id'];
$user_id = $_GET['user_id'];
$unique_no = $_GET['unique_no'];
$completed_status = $_GET['completed_status'];
$user_type = $_GET['user_type'];

//echo "SELECT * FROM  matrimonial_information WHERE matrimonial_id='".$_GET['matrimonial_id']."'";
$survey1 = $pdo_conn->prepare("SELECT * FROM  matrimonial_information WHERE matrimonial_id='" . $_GET['matrimonial_id'] . "'");
$survey1->execute();
$survey1_records = $survey1->fetch();

?>



<style>
    input.form-control {
        padding-left: 40px;
    }
</style>

<input type="hidden" name="matrimonial_id" id="matrimonial_id" value="<?php echo $_GET['matrimonial_id']; ?>">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">

<div class="wrapper homepage">
    <div class="head_line">
        <h5><span class="notranslate">Matrimonial Information -</span><span class="tamil_font_small"> </span> </h5>
    </div>
    <div class="col-md-2 top_left">
        <i class="fa fa-arrow-circle-left arrow_back"
            onClick="matrimonial_create_back('<?php echo $country_id; ?>','<?php echo $state_id; ?>','<?php echo $district_id; ?>','<?php echo $city_id; ?>','<?php echo $area_id; ?>','<?php echo $user_id; ?>','<?php echo $unique_no; ?>','<?php echo $completed_status; ?>')"></i>
    </div>
    <div class="sub_bg animated bounceInLeft">

        <div class="container">
            <div class="row">
                <div class="col-md-12 survey_content">

                    <form class="login_form">

                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">ID Number</span><span style="color:red;">*</span></label>
                            <i class="icon-home icons"></i>
                            <input type="text" class="form-control" id="id_number" name="id_number"
                                value="<?php echo $survey1_records['id_number']; ?>">

                        </div>

                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">DOB/பிறந்த தேதி</span>
                            </label>
                            <i class="icon-home icons"></i>
                            <input type="date" class="form-control" id="dob" name="dob"
                                value="<?php echo $survey1_records['dob']; ?>">
                        </div>




                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Age/வயது</span> </label>
                            <i class="icon-calendar icons"></i>
                            <input class="form-control" type="text" id="age" name="age"
                                value="<?php echo $survey1_records['age']; ?>">
                        </div>

                        <div class="form-group">
                            <div>
                                <label for=""><span class="notranslate">Gender/பாலினம் </span></label>
                            </div>
                            <div class="custom-control-inline custom-checkbox mb-2 mx-4">
                                <input type="radio" id="gender_male" name="gender" value="male"
                                    <?php if ($survey1_records['gender'] == "male") : ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label pt-1" for="gender_male"> <span
                                        class="notranslate">Male/ஆண் </span> </label>
                            </div>

                            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
                                <input type="radio" id="gender_female" name="gender" value="female"
                                    <?php if ($survey1_records['gender'] == "female") : ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label pt-1" for="gender_female"> <span
                                        class="notranslate">Female/பெண்
                                    </span> </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Height/உயரம்</span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="height" name="height"
                                value="<?php echo $survey1_records['height']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Weight/எடை</span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="weight" name="weight"
                                value="<?php echo $survey1_records['weight']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Colour/நிறம்</span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="color" name="color"
                                value="<?php echo $survey1_records['color']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Mother Tongue/தாய் மொழி
                                </span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="mother_tongue" name="mother_tongue"
                                value="<?php echo $survey1_records['mother_tongue']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Tiniyat
                                    Scholarship/தீனியாத் புலமை</span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="tiniyat_scholarship"
                                name="tiniyat_scholarship" value="<?php echo $survey1_records['tiniyat_scholarship']; ?>">
                        </div>




                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Education
                                    Qualification/கல்வி தகுதி</span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="education_qualification"
                                name="education_qualification" value="<?php echo $survey1_records['education_qualification']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Brother's/சகோதரர்கள்
                                </span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="brother" name="brother"
                                value="<?php echo $survey1_records['brother']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Sister's/சகோதரிகள்
                                </span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="sister" name="sister"
                                value="<?php echo $survey1_records['sister']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Unmarried
                                    Brothers/திருமணமாகாத சகோதரர்கள் </span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="unmarried_brother"
                                name="unmarried_brother" value="<?php echo $survey1_records['unmarried_brother']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Unmarried
                                    Sisters/திருமணமாகாத சகோதரிகள் </span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="unmarried_sister" name="unmarried_sister"
                                value="<?php echo $survey1_records['unmarried_sister']; ?>">
                        </div>
                        <div class="form-group">
                            <div>
                                <label for=""><span class="notranslate">Are you Worker/வேலை செய்பவரா
                                    </span></label>
                            </div>
                            <div class="custom-control-inline custom-checkbox mb-2 mx-4">
                                <input type="radio" id="worker_yes" name="worker" value="yes"
                                    <?php if ($survey1_records['worker'] == "yes") : ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label pt-1" for="worker_yes"> <span
                                        class="notranslate">Yes/ஆம் </span> </label>
                            </div>

                            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
                                <input type="radio" id="worker_no" name="worker" value="no"
                                    <?php if ($survey1_records['worker'] == "no") : ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label pt-1" for="worker_no"> <span
                                        class="notranslate">No/இல்லை
                                    </span> </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <label for=""><span class="notranslate">if yes/ஆமெனில்</span></label>
                            </div>
                            <div class="custom-control-inline custom-checkbox mb-2 mx-4">
                                <input type="radio" id="if_worker_business_business" name="if_worker"
                                    value="business" <?php if ($survey1_records['if_worker'] == "business") : ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label pt-1" for="if_worker_business_business"> <span
                                        class="notranslate">Business</span> </label>
                            </div>

                            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
                                <input type="radio" id="if_worker_employee_employee" name="if_worker"
                                    value="employee" <?php if ($survey1_records['if_worker'] == "no") : ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label pt-1" for="if_worker_employee_employee"> <span
                                        class="notranslate">Employee
                                    </span> </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Monthly Income/மாத
                                    வருமானம் </span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="monthly_income" name="monthly_income"
                                value="<?php echo $survey1_records['monthly_income']; ?>">
                        </div>
                        <div class="form-group">
                            <div>
                                <label for=""><span class="notranslate">Marital Status/திருமண நிலை
                                    </span></label>
                            </div>
                            <div class="custom-control-inline custom-checkbox mb-2 mx-4">
                                <input type="radio" id="marital_status_unmarried" name="marital_status"
                                    value="unmarried" <?php if ($survey1_records['marital_status'] == "unmarried") : ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label pt-1" for="marital_status_unmarried"> <span
                                        class="notranslate">Unmarried</span> </label>
                            </div>

                            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
                                <input type="radio" id="marital_status_widower_widow" name="marital_status"
                                    value="widower_widow" <?php if ($survey1_records['marital_status'] == "widower_widow") : ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label pt-1" for="marital_status_widower_widow"> <span
                                        class="notranslate">Widower/Widow
                                    </span> </label>
                            </div>

                            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
                                <input type="radio" id="marital_status_divorce" name="marital_status"
                                    value="divorce" <?php if ($survey1_records['marital_status'] == "divorce") : ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label pt-1" for="marital_status_divorce"> <span
                                        class="notranslate">Divorce
                                    </span> </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <label for=""><span class="notranslate">Passed Away/கடந்து
                                        சென்றவர்கள்</span></label>
                            </div>
                            <div class="custom-control-inline custom-checkbox mb-2 mx-4">
                                <input type="checkbox" id="passed_away_none" name="passed_away" value="none"
                                    <?php if ($survey1_records['passed_away'] == "none") : ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label pt-1" for="passed_away_none"> <span
                                        class="notranslate">None</span> </label>
                            </div>

                            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
                                <input type="checkbox" id="passed_away_father" name="passed_away" value="father"
                                    <?php if ($survey1_records['passed_away'] == "father") : ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label pt-1" for="passed_away_father"> <span
                                        class="notranslate">Father
                                    </span> </label>
                            </div>

                            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
                                <input type="checkbox" id="passed_away_mother" name="passed_away" value="mother"
                                    <?php if ($survey1_records['passed_away'] == "mother") : ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label pt-1" for="passed_away_mother"> <span
                                        class="notranslate">Mother
                                    </span> </label>
                            </div>
                            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
                                <input type="checkbox" id="passed_away_both" name="passed_away" value="both"
                                    <?php if ($survey1_records['passed_away'] == "both") : ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label pt-1" for="passed_away_both"> <span
                                        class="notranslate">Both
                                    </span> </label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for=""><span class="notranslate">Father's Profession/தந்தையின்
                                    தொழில்</span> </label>
                            <i class="icon-home icons"></i>
                            <input type="" class="form-control" id="father_profession"
                                name="father_profession" value="<?php echo $survey1_records['father_profession']; ?>">
                        </div>

                        <div class="form-group">
                            <div>
                                <label for=""><span class="notranslate">Are you Handicapped?/நீங்கள்
                                        ஊனமுற்றவரா?</span></label>
                            </div>
                            <div class="custom-control-inline custom-checkbox mb-2 mx-4">
                                <input type="checkbox" id="handicapped_yes" name="handicapped" value="yes"
                                    <?php if ($survey1_records['handicapped'] == "yes") : ?> checked="checked" <?php endif; ?>
                                    onclick="check_handicapped(this.value);">
                                <label class="custom-control-label pt-1" for="handicapped_yes"> <span
                                        class="notranslate">Yes/ஆம்</span> </label>
                            </div>

                            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
                                <input type="checkbox" id="handicapped_no" name="handicapped" value="no"
                                    <?php if ($survey1_records['handicapped'] == "no") : ?> checked="checked" <?php endif; ?>
                                    onclick="check_handicapped(this.value);">
                                <label class="custom-control-label pt-1" for="handicapped_no"> <span
                                        class="notranslate">No/இல்லை
                                    </span> </label>

                            </div>
                        </div>

                        <?php //if($survey1_records['handicapped']=="yes"){
                        ?>
                        <div class="form-group check_handicapped" style="display:none;">
                            <label for="" class="two_hgt"><span class="notranslate">If yes Describe/ஆம் எனில்
                                    விளக்கம் </span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="if_handicapped" name="if_handicapped"
                                value="<?php echo $survey1_records['if_handicapped']; ?>">
                        </div>
                        <?php //}
                        ?>

                        <div class="form-group">
                            <label for="" class="two_hgt"><span
                                    class="notranslate">Expectation/எதிர்பார்ப்பு</span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="expectation" name="expectation"
                                value="<?php echo $survey1_records['expectation']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Hint/குறிப்பு</span>
                            </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="hint" name="hint"
                                value="<?php echo $survey1_records['hint']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Date/தேதி</span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="date" class="form-control" id="date" name="date"
                                value="<?php echo $survey1_records['date']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Place/இடம்
                                </span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="place" name="place"
                                value="<?php echo $survey1_records['place']; ?>">
                        </div>
                        <div class="cover-field form-group">
                            <h5 class="select-bx">File</h5>
                            <div class="row"
                                style="  margin-bottom: 10px;margin-top: 0px;background-color:#f9f9f9;padding: 10px 10px 10px 10px;border-bottom: 1px solid #e6e6e6;"
                                id="pic_div">

                                <!--image_shown-->
                                <div class="col-xs-5" style="padding:0px;"> <img
                                        src="<?php echo $image_path; ?>/common_images/images.jpg" id='picture1'
                                        name='picture1' style="width: 100px; height: 100px;">
                                </div>

                                <div class="col-xs-7" style="padding:0px;margin-top:20px;">
                                    <div class="col-xs-6"> <img id='but_takes1' enctype="multipart/form-data"
                                            src="<?php echo $image_path; ?>/common_images/photo.png"
                                            style="width:45px;height:45px;" /> </div>
                                    <div class="col-xs-6"> <img id='but_selects1' enctype="multipart/form-data"
                                            src="<?php echo $image_path; ?>/common_images/gallery.png"
                                            style="width:45px;height:45px;" /> </div>
                                </div>

                                <div class="col-xs-5" style=" margin-left:45px; padding:0px;">
                                    <?php if ($survey1_records['image1'] != null) { ?>
                                    <img src="<?php echo $image_path; ?>/matrimonial_information/<?php echo $survey1_records['image1']; ?>"
                                        id='store_picture1' name='store_picture1'
                                        style="width: 100px; height: 100px;">
                                    <button type="button" id="remove_img_btn1" class="bg-danger"
                                        onclick="remove_img_btn_click('1')" style="padding:5px;"><i
                                            class="fa fa-trash"></i></button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Name/பெயர்
                                </span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="name" name="name"
                                value="<?php echo $survey1_records['name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Father Name/தந்தையின்
                                    பெயர்
                                </span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="father_name" name="father_name"
                                value="<?php echo $survey1_records['father_name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Mother Name/தாய் பெயர்
                                </span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="mother_name" name="mother_name"
                                value="<?php echo $survey1_records['mother_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Address/முழு முகவரி

                                </span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="address" name="address"
                                value="<?php echo $survey1_records['address']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Mobile Number/தொலைபேசி
                                    எண்</span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no"
                                value="<?php echo $survey1_records['mobile_no']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">WhatsApp</span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="whatsapp_no" name="whatsapp_no"
                                value="<?php echo $survey1_records['whatsapp_no']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Email</span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?php echo $survey1_records['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="two_hgt"><span class="notranslate">Mohalla Name/மொஹல்லா
                                    பெயர்</span> </label>
                            <i class="icon-screen-smartphone icons"></i>
                            <input type="text" class="form-control" id="mohalla_name" name="mohalla_name"
                                value="<?php echo $survey1_records['mohalla_name']; ?>">
                        </div>


                        <div class="cover-field form-group">
                            <h5 class="select-bx">File</h5>
                            <div class="row"
                                style="  margin-bottom: 10px;margin-top: 0px;background-color:#f9f9f9;padding: 10px 10px 10px 10px;border-bottom: 1px solid #e6e6e6;"
                                id="pic_div">
                                <div class="col-xs-5" style="padding:0px;"> <img
                                        src="<?php echo $image_path; ?>/common_images/images.jpg" id='picture2'
                                        name='picture2' style="width: 100px; height: 100px;">
                                </div>
                                <div class="col-xs-7" style="padding:0px;margin-top:20px;">
                                    <div class="col-xs-6"> <img id='but_takes2' enctype="multipart/form-data"
                                            src="<?php echo $image_path; ?>/common_images/photo.png"
                                            style="width:45px;height:45px;" /> </div>
                                    <div class="col-xs-6"> <img id='but_selects2' enctype="multipart/form-data"
                                            src="<?php echo $image_path; ?>/common_images/gallery.png"
                                            style="width:45px;height:45px;" /> </div>
                                </div>
                                <div class="col-xs-5" style=" margin-left:45px; padding:0px;">
                                    <?php if ($survey1_records['image2'] != null) { ?>
                                        <img src="<?php echo $image_path; ?>/matrimonial_information/<?php echo $survey1_records['image2']; ?>"
                                        id='store_picture2' name='store_picture2' style="width: 100px; height: 100px;">
                                        <button type="button" id="remove_img_btn2" class="bg-danger"
                                        onclick="remove_img_btn_click('2')" style="padding:5px;"><i
                                            class="fa fa-trash"></i></button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for=""><span class="notranslate">Masjidh Name</span></label>
                            <input type="text" name="school_name" id="school_name" class="form-control"
                                value="<?php echo $survey1_records['school_name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for=""><span class="notranslate">Masjidh Imam signature</span></label>
                            <input type="text" name="school_imam_signature" id="school_imam_signature"
                                class="form-control" value="<?php echo $survey1_records['school_imam_signature']; ?>">
                        </div>

                        <div class="form-group">
                            <label for=""><span class="notranslate">Name</span></label>
                            <input type="text" name="signature_name" id="signature_name" class="form-control"
                                value="<?php echo $survey1_records['signature_name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for=""><span class="notranslate">Mobile</span></label>
                            <input type="text" name="signature_mobile" id="signature_mobile" class="form-control"
                                value="<?php echo $survey1_records['signature_mobile']; ?>">
                        </div>
                        <div class="form-group">
                            <label for=""><span class="notranslate">President signature</span></label>
                            <input type="text" name="muththavalli_signature" id="muththavalli_signature"
                                class="form-control" value="<?php echo $survey1_records['muththavalli_signature']; ?>">
                        </div>

                        <div class="form-group">
                            <label for=""><span class="notranslate">Name</span></label>
                            <input type="text" name="muththavalli_signature_name" id="muththavalli_signature_name"
                                class="form-control" value="<?php echo $survey1_records['muththavalli_signature_name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for=""><span class="notranslate">Mobile</span></label>
                            <input type="text" name="muththavalli_signature_mobile"
                                id="muththavalli_signature_mobile" class="form-control" value="<?php echo $survey1_records['muththavalli_signature_mobile']; ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="no-gutters">
            <div class="col-auto mx-auto">
                <div class="row no-gutters justify-content-center">
                    <div class="col-12">
                        <a
                            onClick="get_matrimonial('<?php echo $country_id; ?>','<?php echo $state_id; ?>','<?php echo $district_id; ?>','<?php echo $city_id; ?>','<?php echo $area_id; ?>','<?php echo $unique_no; ?>','<?php echo $completed_status; ?>')">
                            <button type="button" class="btn btn-success next_btn"> <?php if ($_GET['matrimonial_id'] == '') { ?> <span
                                    class="notranslate"> Save <?php } else {  ?> Update
                                    <?php  } ?></span><i class="fa fa-angle-right fa-lg"
                                    aria-hidden="true"></i> </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    var check_existing_image_removed1 = false;
    var check_existing_image_removed2 = false;
    function remove_img_btn_click(index) {
        document.getElementById("store_picture"+index).src = '';
        document.getElementById("store_picture"+index).style.display = "none";
        document.getElementById("remove_img_btn"+index).style.display = "none";

        if(index=='1'){check_existing_image_removed1 = true;}
        else if(index=='2'){check_existing_image_removed1 = true;}
    }
</script>
<script>
    var upload_image1 = null;
    var upload_image2 = null;
    $('#but_takes1').click(function() {
        navigator.camera.getPicture(onSuccess1, onFail1, {
            quality: 20,
            destinationType: Camera.DestinationType.DATA_URL
        });
    });
    $("#but_selects1").click(function() {
        navigator.camera.getPicture(onSuccess1, onFail1, {
            quality: 50,
            sourceType: Camera.PictureSourceType.PHOTOLIBRARY,
            allowEdit: false,
            destinationType: Camera.DestinationType.DATA_URL
        });
    });
    function onSuccess1(imageData) {
        upload_image1 = "data:image/jpeg;base64," + imageData;
        var image = document.getElementById('picture1');
        image.src = upload_image1;
    }
    function onFail1(message) {
        upload_image1 = null;
        var image = document.getElementById('picture1');
        image.src = "<?php echo $image_path; ?>/common_images/images.jpg";
        alert('Failed because: ' + message);
    }

    $('#but_takes2').click(function() {
        navigator.camera.getPicture(onSuccess2, onFail2, {
            quality: 20,
            destinationType: Camera.DestinationType.DATA_URL
        });
    });
    $("#but_selects2").click(function() {
        navigator.camera.getPicture(onSuccess2, onFail2, {
            quality: 50,
            sourceType: Camera.PictureSourceType.PHOTOLIBRARY,
            allowEdit: false,
            destinationType: Camera.DestinationType.DATA_URL
        });
    });
    function onSuccess2(imageData) {
        upload_image2 = "data:image/jpeg;base64," + imageData;
        var image = document.getElementById('picture2');
        image.src = upload_image2;
    }
    function onFail2(message) {
        upload_image2 = null;
        var image = document.getElementById('picture2');
        image.src = "<?php echo $image_path; ?>/common_images/images.jpg";
        alert('Failed because: ' + message);
    }

    function get_matrimonial(country_id, state_id, district_id, city_id, area_id, unique_no, completed_status) {
        var matrimonial_id = $("#matrimonial_id").val();
        if (matrimonial_id != '') {
            var action = "update";
        } else {
            var action = "add";
        }
        var user_id = $("#user_id").val();
        var id_number = $("#id_number").val();
        var dob = $("#dob").val();
        var age = $("#age").val();
        //   var gender = $(":checkbox[name=gender]:checked").val();
        if ($("#gender_female").is(':checked')) {
            var gender = $("#gender_female").val();
        } else if ($("#gender_male").is(':checked')) {
            var gender = $("#gender_male").val();
        } else {
            var gender = '';
        }
        var height = $("#height").val();
        var weight = $("#weight").val();
        var color = $("#color").val();
        var mother_tongue = $("#mother_tongue").val();
        var tiniyat_scholarship = $("#tiniyat_scholarship").val();
        var education_qualification = $("#education_qualification").val();
        var brother = $("#brother").val();
        var sister = $("#sister").val();
        var unmarried_brother = $("#unmarried_brother").val();
        var unmarried_sister = $("#unmarried_sister").val();
        // var worker = $(":checkbox[name=worker]:checked").val();
        if ($("#worker_yes").is(':checked')) {
            var worker = $("#worker_yes").val();
        } else if ($("#worker_no").is(':checked')) {
            var worker = $("#worker_no").val();
        } else {
            var worker = '';
        }
        // var if_worker = $(":checkbox[name=if_worker]:checked").val();
        if ($("#if_worker_business_business").is(':checked')) {
            var if_worker = $("#if_worker_business_business").val();
        } else if ($("#if_worker_employee_employee").is(':checked')) {
            var if_worker = $("#if_worker_employee_employee").val();
        } else {
            var if_worker = '';
        }
        var monthly_income = $("#monthly_income").val();
        // var marital_status = $(":checkbox[name=marital_status]:checked").val();
        if ($("#marital_status_unmarried").is(':checked')) {
            var marital_status = $("#marital_status_unmarried").val();
        } else if ($("#marital_status_widower_widow").is(':checked')) {
            var marital_status = $("#marital_status_widower_widow").val();
        } else if ($("#marital_status_divorce").is(':checked')) {
            var marital_status = $("#marital_status_divorce").val();
        } else {
            var marital_status = '';
        }
        var passed_away = $(":checkbox[name=passed_away]:checked").val();
        if ($(":checkbox[name=passed_away]:checked").length == 0) {
            var passed_away = '';
        }
        var father_profession = $('#father_profession').val();
        var handicapped = $(":checkbox[name=handicapped]:checked").val();
        if ($(":checkbox[name=handicapped]:checked").length == 0) {
            var handicapped = '';
        }
        var if_handicapped = $('#if_handicapped').val();
        var expectation = $('#expectation').val();
        var hint = $('#hint').val();
        var date = $('#date').val();
        var place = $('#place').val();
        var matrimonial_image1 = upload_image1;
        var old_image1 = "<?php echo $survey1_records['image1']; ?>";
        var name = $('#name').val();
        var father_name = $('#father_name').val();
        var mother_name = $('#mother_name').val();
        var address = $('#address').val();
        var mobile_no = $('#mobile_no').val();
        var whatsapp_no = $('#whatsapp_no').val();
        var email = $('#email').val();
        var mohalla_name = $('#mohalla_name').val();
        var school_name = $('#school_name').val();
        var school_imam_signature = $('#school_imam_signature').val();
        var signature_name = $('#signature_name').val();
        var signature_mobile = $('#signature_mobile').val();
        var muththavalli_signature = $('#muththavalli_signature').val();
        var muththavalli_signature_name = $('#muththavalli_signature_name').val();
        var muththavalli_signature_mobile = $('#muththavalli_signature_mobile').val();

        var matrimonial_image2 = upload_image2;
        var old_image2 = "<?php echo $survey1_records['image2']; ?>";

        if (id_number == '') {
            alert("Please Enter ID Number")
            $('#id_number').focus();
        } else {
            var sendInfo = {
                matrimonial_id: matrimonial_id,
                action: action,
                user_id: user_id,
                id_number: id_number,
                dob: dob,
                age: age,
                gender: gender,
                height: height,
                weight: weight,
                color: color,
                mother_tongue: mother_tongue,
                tiniyat_scholarship: tiniyat_scholarship,
                education_qualification: education_qualification,
                brother: brother,
                sister: sister,
                unmarried_brother: unmarried_brother,
                unmarried_sister: unmarried_sister,
                worker: worker,
                if_worker: if_worker,
                monthly_income: monthly_income,
                marital_status: marital_status,
                passed_away: passed_away,
                father_profession: father_profession,
                handicapped: handicapped,
                if_handicapped: if_handicapped,
                expectation: expectation,
                hint: hint,
                date: date,
                place: place,
                matrimonial_image1: matrimonial_image1,
                check_existing_image_removed1: (check_existing_image_removed1) ? '1' : '0',
                old_image1: old_image1,
                name: name,
                father_name: father_name,
                mother_name: mother_name,
                address: address,
                mobile_no: mobile_no,
                whatsapp_no: whatsapp_no,
                email: email,
                mohalla_name: mohalla_name,
                school_name: school_name,
                school_imam_signature: school_imam_signature,
                signature_name: signature_name,
                signature_mobile: signature_mobile,
                muththavalli_signature: muththavalli_signature,
                muththavalli_signature_name: muththavalli_signature_name,
                muththavalli_signature_mobile: muththavalli_signature_mobile,
                matrimonial_image2: matrimonial_image2,
                check_existing_image_removed2: (check_existing_image_removed2) ? '1' : '0',
                old_image2: old_image2,
                country_id: country_id,
                state_id: state_id,
                district_id: district_id,
                city_id: city_id,
                area_id: area_id,
                unique_no: unique_no,
                completed_status: completed_status,
            };

            $.ajax({
                url: FILE_PATH + '/matrimonial_information/matrimonial_model.php',
                type: 'POST',
                data: sendInfo,
                timeout: 60000,
                success: function(data) {
                    alert(data);
                    $("#previous_id").val('medical_list.php');
                    var user_id = '<?php echo $user_id; ?>';
                    var country_id = '<?php echo $country_id; ?>';
                    var state_id = '<?php echo $state_id; ?>';
                    var district_id = '<?php echo $district_id; ?>';
                    var city_id = '<?php echo $city_id; ?>';
                    var area_id = '<?php echo $area_id; ?>';
                    var user_type = '<?php echo $user_type; ?>';
                    var unique_no = '<?php echo $unique_no; ?>';
                    var completed_status = '<?php echo $completed_status; ?>';
                    $('#page_replace_div').load(FILE_PATH +
                        '/matrimonial_information/matrimonial_list.php?user_id=' + user_id +
                        '&country_id=' + country_id + '&state_id=' + state_id + '&district_id=' +
                        district_id + '&city_id=' + city_id + '&area_id=' + area_id + '&unique_no=' +
                        unique_no + '&completed_status=' + completed_status + '&user_type=' + user_type);
                }
            });
        }
    }

    function matrimonial_create_back(country_id, state_id, district_id, city_id, area_id, user_id, unique_no) {
        var user_id = '<?php echo $user_id; ?>';
        var country_id = '<?php echo $country_id; ?>';
        var state_id = '<?php echo $state_id; ?>';
        var district_id = '<?php echo $district_id; ?>';
        var city_id = '<?php echo $city_id; ?>';
        var area_id = '<?php echo $area_id; ?>';
        var user_type = '<?php echo $user_type; ?>';
        var unique_no = '<?php echo $unique_no; ?>';
        var completed_status = '<?php echo $completed_status; ?>';
        $("#previous_id").val('matrimonial_information/matrimonial_list.php');
        $('#page_replace_div').load(FILE_PATH + '/matrimonial_information/matrimonial_list.php?user_id=' + user_id +
            '&country_id=' + country_id + '&state_id=' + state_id + '&district_id=' + district_id + '&city_id=' +
            city_id + '&area_id=' + area_id + '&unique_no=' + unique_no + '&user_type=' + user_type +
            '&completed_status=' + completed_status);
    }

    function check_handicapped(plan) {
        if (plan == 'yes') {
            $(".check_handicapped").show();
        } else {
            $(".check_handicapped").hide();
        }
    }
</script>
