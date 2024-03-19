<?php
header('Access-Control-Allow-Origin: *');
date_default_timezone_set('Asia/Kolkata');
include("../dbConnect.php");
include("../common_function.php");
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
$user_type = $_GET['user_type'];
$completed_status = $_get['completed_status'];


$survey1 = $pdo_conn->prepare("SELECT * FROM  job_application WHERE job_id='" . $_GET['job_id'] . "'");
$survey1->execute();
$survey1_records = $survey1->fetch();
$license1 = $survey1_records['license'];
$job3 = $survey1_records['job'];
$location1 = $survey1_records['location'];
?>



<style>
  input.form-control {
    padding-left: 40px;
  }
</style>

<input type="hidden" name="job_id" id="job_id" value="<?php echo $_GET['job_id']; ?>">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $survey1_records['job_image']; ?>">

<div class="head_line">
  <h5><span class="notranslate">Job Application -</span><span class="tamil_font_small"> </span> </h5>
</div>


<div class="col-md-2 top_left">
  <i class="fa fa-arrow-circle-left arrow_back" onClick="job_create_back('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"></i>
</div>
</div>
<div class="sub_bg animated bounceInLeft">

  <div class="container">
    <div class="row">
      <div class="col-md-12 survey_content">

        <form class="login_form">

          <div class="form-group">
            <label for="" class="two_hgt"><span class="notranslate">ID Number</span></label>
            <i class="icon-home icons"></i>
            <input type="text" class="form-control" id="id_no" name="id_no" value="<?php echo $survey1_records['id_no']; ?>">

          </div>

          <div class="form-group">
            <label for="" class="two_hgt"><span class="notranslate">Age</span> </label>
            <i class="icon-home icons"></i>
            <input type="text" class="form-control" id="age" name="age" value="<?php echo $survey1_records['age']; ?>">
          </div>



          <div class="form-group">
            <label for="" class="two_hgt"><span class="notranslate">DOB</span> </label>
            <i class="icon-calendar icons"></i>
            <input class="form-control" type="date" id="dob" name="dob" value="<?php echo $survey1_records['dob']; ?>">
          </div>

          <div class="form-group">
            <label for="" class="two_hgt"><span class="notranslate">Contact No</span></label>
            <i class="icon-screen-smartphone icons"></i>
            <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php echo $survey1_records['contact_no']; ?>">
          </div>


          <div class="form-group">
            <div>
              <label for=""><span class="notranslate">Gender</span></label>
            </div>
            <div class="custom-control-inline custom-checkbox mb-2 mx-4">
              <input type="radio" id="gender_female" name="gender" value="female" <?php if ($survey1_records['gender'] == "female") : ?> checked="checked" <?php endif; ?>>
              <label class="custom-control-label pt-1" for="gender_female"> <span class="notranslate">Female</span> </label>
            </div>

            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
              <input type="radio" id="gender_male" name="gender" value="male" <?php if ($survey1_records['gender'] == "male") : ?> checked="checked" <?php endif; ?>>
              <label class="custom-control-label pt-1" for="gender_male"> <span class="notranslate">Male
                </span> </label>
            </div>
          </div>

          <div class="form-group">
            <label for=""><span class="notranslate">Education Qualification</span> </label>
            <i class="icon-home icons"></i>
            <input type="" class="form-control" id="qualification" name="qualification" value="<?php echo $survey1_records['qualification']; ?>">
          </div>

          <div class="form-group">
            <div>
              <label for=""><span class="notranslate">Having Previous Experience</span></label>
            </div>
            <div class="custom-control-inline custom-checkbox mb-2 mx-4">
              <input type="radio" id="experience_yes" name="experience" value="yes" <?php if ($survey1_records['experience'] == "yes") : ?> checked="checked" <?php endif; ?>>
              <label class="custom-control-label pt-1" for="experience_yes"> <span class="notranslate">yes</span> </label>
            </div>

            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
              <input type="radio" id="experience_no" name="experience" value="no" <?php if ($survey1_records['experience'] == "no") : ?> checked="checked" <?php endif; ?>>
              <label class="custom-control-label pt-1" for="experience_no"> <span class="notranslate">No
                </span> </label>

            </div>
          </div>
          <div class="form-group">
            <label>If Yes? write down the details</label>
            <input type="text" name="exp_yes1" id="exp_yes1" class="form-control" value="<?php echo $survey1_records['exp_yes1']; ?>">
            <input type="text" name="exp_yes2" id="exp_yes2" class="form-control" value="<?php echo $survey1_records['exp_yes2']; ?>">
          </div>
          <div class="form-group">
            <label for=""><span class="notranslate">Language Known</span></label>
            <input type="text" name="language" id="language" class="form-control" value="<?php echo $survey1_records['language']; ?>">
          </div>

          <div class="form-group">
            <label for="sel1"><span class="notranslate">City</span> </label>
            <input type="text" name="city" class="form-control" id="city" value="<?php echo $survey1_records['city']; ?>">
          </div>


          <div class="form-group">
            <label for="sel1"><span class="notranslate">Pincode</span> </label>
            <input type="text" name="pincode" id="pincode" class="form-control" value="<?php echo $survey1_records['pincode']; ?>">
          </div>

          <div class="form-group">
            <div>
              <label for=""><span class="notranslate">Are you Passport Holder</span></label>
            </div>
            <div class="custom-control-inline custom-checkbox mb-2 mx-4">
              <input type="radio" id="passport_yes" name="passport" value="yes" <?php if ($survey1_records['passport'] == "yes") : ?> checked="checked" <?php endif; ?>>
              <label class="custom-control-label pt-1" for="passport_yes"> <span class="notranslate">yes</span> </label>
            </div>

            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
              <input type="radio" id="passport_no" name="passport" value="no" <?php if ($survey1_records['passport'] == "no") : ?> checked="checked" <?php endif; ?>>
              <label class="custom-control-label pt-1" for="passport_no"> <span class="notranslate">No
                </span> </label>
            </div>
          </div>

          <div class="form-group">
            <div>
              <label for=""><span class="notranslate">Marital Status</span></label>
            </div>
            <div class="custom-control-inline custom-checkbox mb-2 mx-4">
              <input type="radio" id="marital_status_married" name="marital_status" value="married" <?php if ($survey1_records['marital_status'] == "married") : ?> checked="checked" <?php endif; ?>>
              <label class="custom-control-label pt-1" for="marital_status_married"> <span class="notranslate">Married</span> </label>
            </div>

            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
              <input type="radio" id="marital_status_unmarried" name="marital_status" value="unmarried" <?php if ($survey1_records['marital_status'] == "unmarried") : ?> checked="checked" <?php endif; ?>>
              <label class="custom-control-label pt-1" for="marital_status_unmarried"> <span class="notranslate">Unmarried
                </span> </label>
            </div>
          </div>
          <div class="form-group">
            <div>
              <label for=""><span class="notranslate">Driving License Holder</span></label>

            </div>

            <div class="custom-control-inline custom-checkbox mb-2 mx-4">
              <input type="checkbox" class="serve" id="license_yes" name="license" value="yes" <?php if (preg_match("/yes/", "$license1")) {
                                                                                                  echo "checked";
                                                                                                } else {
                                                                                                  echo "";
                                                                                                } ?>>
              <label class="custom-control-label pt-1" for="license_yes"> <span class="notranslate">Yes</span> </label>
            </div>

            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
              <input type="checkbox" class="serve" id="license_no" name="license" value="no" <?php if (preg_match("/no/", "$license1")) {
                                                                                                echo "checked";
                                                                                              } else {
                                                                                                echo "";
                                                                                              } ?>>
              <label class="custom-control-label pt-1" for="license_no"> <span class="notranslate">No
                </span> </label>
            </div>

            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
              <input type="checkbox" class="serve" id="license_two_wheeler" name="license" value="two_wheeler" <?php if (preg_match("/two_wheeler/", "$license1")) {
                                                                                                                  echo "checked";
                                                                                                                } else {
                                                                                                                  echo "";
                                                                                                                } ?>>
              <label class="custom-control-label pt-1" for="license_two_wheeler"> <span class="notranslate">Two_Wheeler
                </span> </label>
            </div>
            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
              <input type="checkbox" class="serve" id="license_four_wheeler" name="license" value="four_wheeler" <?php if (preg_match("/four_wheeler/", "$license1")) {
                                                                                                                    echo "checked";
                                                                                                                  } else {
                                                                                                                    echo "";
                                                                                                                  } ?>>
              <label class="custom-control-label pt-1" for="license_four_wheeler"> <span class="notranslate">Four Wheeler
                </span> </label>
            </div>
          </div>


          <div class="form-group">
            <label for="" class="two_hgt"><span class="notranslate">Area of Interest</span></label>
            <i class="icon-home icons"></i>
            <input type="text" class="form-control" id="area_of_interest" name="area_of_interest" value="<?php echo $survey1_records['area_of_interest']; ?>">

          </div>
          <div class="form-row">

            <label for=""><span class="notranslate">Expect Salary</span></label>

            <div class="form-group">
              <label> From </label> <input type="text" class="form-control" id="from_salary" name="from_salary" value="<?php echo $survey1_records['from_salary']; ?> ">
            </div>
            <div class="form-group">
              <label> To</label> <input type="text" class="form-control" id="to_salary" name="to_salary" value="<?php echo $survey1_records['to_salary']; ?> ">
            </div>
          </div>


          <div class="form-row">
            <div class="form-group">
              <div>
                <label for=""><span class="notranslate">Are you Physically Challenged</span></label>
              </div>
              <div class="custom-control-inline custom-checkbox mb-2 mx-2">
                <input type="radio" id="physically_yes" name="physically" value="yes" <?php if ($survey1_records['physically'] == "yes") : ?> checked="checked" <?php endif; ?> onclick="check_physically(this.value);">
                <label class="custom-control-label pt-1" for="physically_yes"> <span class="notranslate">Yes</span> </label>
              </div>

              <div class="custom-control-inline custom-checkbox mb-2 ml-2">
                <input type="radio" id="physically_no" name="physically" value="no" <?php if ($survey1_records['physically'] == "no") : ?> checked="checked" <?php endif; ?> onclick="check_physically(this.value);">
                <label class="custom-control-label pt-1" for="physically_no"> <span class="notranslate">No
                  </span> </label>
              </div>
            </div>
          </div>

          <div class="form-group check_physically" style="display:None;">
            <label for="" class="two_hgt"><span class="notranslate">Physically Challenged, mentioned the disability</span></label>

            <input type="text" class="form-control" id="disability" name="disability" value="<?php echo $survey1_records['disability']; ?>">

          </div>


          <div class="form-group">
            <div>
              <label for=""><span class="notranslate">Are you looking for a job</span></label>
            </div>
            <div class="custom-control-inline custom-checkbox mb-2 mx-4">
              <input type="checkbox" class="serve1" id="job1_full_time" name="job1" value="full_time" <?php if (preg_match("/full_time/", "$job3")) {
                                                                                                        echo "checked";
                                                                                                      } else {
                                                                                                        echo "";
                                                                                                      } ?>>
              <label class="custom-control-label pt-1" for="job1_full_time"> <span class="notranslate">Full Time</span> </label>
            </div>

            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
              <input type="checkbox" class="serve1" id="job1_part_time" name="job1" value="part_time" <?php if (preg_match("/part_time/", "$job3")) {
                                                                                                        echo "checked";
                                                                                                      } else {
                                                                                                        echo "";
                                                                                                      } ?>>
              <label class="custom-control-label pt-1" for="job1_part_time"> <span class="notranslate">Parttime
                </span> </label>
            </div>

            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
              <input type="checkbox" class="serve1" id="job1_weekend" name="job1" value="weekend" <?php if (preg_match("/weekend/", "$job3")) {
                                                                                                    echo "checked";
                                                                                                  } else {
                                                                                                    echo "";
                                                                                                  } ?>>
              <label class="custom-control-label pt-1" for="job1_weekend"> <span class="notranslate">Weekend
                </span> </label>
            </div>
            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
              <input type="checkbox" class="serve1" id="job1_free_lancher" name="job1" value="free_lancher" <?php if (preg_match("/free_lancher/", "$job3")) {
                                                                                                              echo "checked";
                                                                                                            } else {
                                                                                                              echo "";
                                                                                                            } ?>>
              <label class="custom-control-label pt-1" for="job1_free_lancher"> <span class="notranslate">Free Lancher
                </span> </label>
            </div>
          </div>
          <div class="form-group">
            <div>
              <label for=""><span class="notranslate">Your proforred job location</span></label>
            </div>
            <div class="custom-control-inline custom-checkbox mb-2 mx-4">
              <input type="checkbox" class="serve2" id="location_home_town" name="location" value="home_town" <?php if (preg_match("/home_town/", "$location1")) {
                                                                                                                echo "checked";
                                                                                                              } else {
                                                                                                                echo "";
                                                                                                              } ?>>
              <label class="custom-control-label pt-1" for="location_home_town"> <span class="notranslate">Home Town</span> </label>
            </div>

            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
              <input type="checkbox" class="serve2" id="location_out_of_town" name="location" value="out_of_town" <?php if (preg_match("/out_of_town/", "$location1")) {
                                                                                                                    echo "checked";
                                                                                                                  } else {
                                                                                                                    echo "";
                                                                                                                  } ?>>
              <label class="custom-control-label pt-1" for="location_out_of_town"> <span class="notranslate">Out of Town
                </span> </label>
            </div>

            <div class="custom-control-inline custom-checkbox mb-2 ml-4">
              <input type="checkbox" class="serve2" id="location_abroad" name="location" value="abroad" <?php if (preg_match("/abroad/", "$location1")) {
                                                                                                          echo "checked";
                                                                                                        } else {
                                                                                                          echo "";
                                                                                                        } ?>>
              <label class="custom-control-label pt-1" for="location_abroad"> <span class="notranslate">Abroad
                </span> </label>
            </div>

          </div>

          <div class="form-group">
            <label for="">Hobbies</label>

            <input type="text" class="form-control" id="hobbies" name="hobbies" value="<?php echo $survey1_records['hobbies']; ?>">

          </div>
          <div class="form-group">
            <label for=""><span class="notranslate">Name</span></label>

            <input type="text" class="form-control" id="name" name="name" value="<?php echo $survey1_records['name']; ?>">

          </div>
          <div class="form-group">
            <label for=""><span class="notranslate">Father's Name</span></label>

            <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo $survey1_records['father_name']; ?>">

          </div>

          <div class="form-group">
            <label for=""><span class="notranslate">Mother's Name</span></label>

            <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?php echo $survey1_records['mother_name']; ?>">

          </div>


          <div class="form-group">
            <label for=""><span class="notranslate">Permanent Address</span></label>

            <input type="text" class="form-control" id="per_address" name="per_address" value="<?php echo $survey1_records['per_address']; ?>">

          </div>
          <div class="form-group">
            <label for=""><span class="notranslate">Mobile Number</span></label>

            <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="<?php echo $survey1_records['mobile_no']; ?>">

          </div>
          <div class="form-group">
            <label for=""><span class="notranslate">Whatsapp Number</span></label>

            <input type="text" class="form-control" id="whatsapp_no" name="whatsapp_no" value="<?php echo $survey1_records['whatsapp_no']; ?>">

          </div>
          <div class="form-group">
            <label for="" class="two_hgt"><span class="notranslate">Email</span></label>

            <input type="text" class="form-control" id="email" name="email" value="<?php echo $survey1_records['email']; ?>">

          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="cover-field">
                <h5 class="select-bx">File</h5>
                <div class="row" style="  margin-bottom: 10px;margin-top: 0px;background-color:#f9f9f9;padding: 10px 10px 10px 10px;border-bottom: 1px solid #e6e6e6;" id="pic_div">
                  <div class="col-xs-5" style="padding:0px;"> <img src="<?php echo $image_path ?>/common_images/images.jpg" id='picture' name='picture' style="width: 100px; height: 100px;">
                  </div>
                  <div class="col-xs-7" style="padding:0px;margin-top:20px;">
                    <div class="col-xs-6"> <img id='but_takes' enctype="multipart/form-data" src="<?php echo $image_path; ?>/common_images/photo.png" style="width:45px;height:45px;" /> </div>
                    <div class="col-xs-6"> <img id='but_selects' enctype="multipart/form-data" src="<?php echo $image_path; ?>/common_images/gallery.png" style="width:45px;height:45px;" /> </div>
                  </div>



                  <div class="col-xs-5" style=" margin-left:45px; padding:0px;">
                    <img <?php
                          if ($survey1_records['job_image'] != null) { ?> src="<?php echo $image_path ?>/job_image/<?php echo $survey1_records['job_image']; ?>" id='picture' name='picture' style="width: 100px; height: 100px;">
                  <?php } ?>

                  </div>


                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for=""><span class="notranslate">Masjidh Name</span></label>
            <input type="text" name="school_name" id="school_name" class="form-control" value="<?php echo $survey1_records['school_name'] ?>">
          </div>

          <div class="form-group">
            <label for=""><span class="notranslate">Masjidh Imam signature</span></label>
            <input type="text" name="school_imam_signature" id="school_imam_signature" class="form-control" value="<?php echo $survey1_records['school_imam_signature'] ?>">
          </div>

          <div class="form-group">
            <label for=""><span class="notranslate">Name</span></label>
            <input type="text" name="signature_name" id="signature_name" class="form-control" value="<?php echo $survey1_records['signature_name'] ?>">
          </div>

          <div class="form-group">
            <label for=""><span class="notranslate">Mobile</span></label>
            <input type="text" name="signature_mobile" id="signature_mobile" class="form-control" value="<?php echo $survey1_records['signature_mobile'] ?>">
          </div>
          <div class="form-group">
            <label for=""><span class="notranslate">President signature</span></label>
            <input type="text" name="muththavalli_signature" id="muththavalli_signature" class="form-control" value="<?php echo $survey1_records['muththavalli_signature'] ?>">
          </div>

          <div class="form-group">
            <label for=""><span class="notranslate">Name</span></label>
            <input type="text" name="muththavalli_signature_name" id="muththavalli_signature_name" class="form-control" value="<?php echo $survey1_records['muththavalli_signature_name'] ?>">
          </div>

          <div class="form-group">
            <label for=""><span class="notranslate">Mobile</span></label>
            <input type="text" name="muththavalli_signature_mobile" id="muththavalli_signature_mobile" class="form-control" value="<?php echo $survey1_records['muththavalli_signature_mobile'] ?>">
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
          <a onClick="get_job('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')">
            <button type="button" class="btn btn-success next_btn"> <?php if ($_GET['job_id'] == '') { ?> <span class="notranslate"> Save <?php } else {  ?> Update <?php  } ?></span><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>



<script>
  $('#but_takes').click(function() {
    navigator.camera.getPicture(onSuccess, onFail, {
      quality: 20,
      destinationType: Camera.DestinationType.FILE_URL
    });
  });

  // upload select 
  $("#but_selects").click(function() {
    navigator.camera.getPicture(onSuccess, onFail, {
      quality: 50,
      sourceType: Camera.PictureSourceType.PHOTOLIBRARY,
      allowEdit: false,
      destinationType: Camera.DestinationType.FILE_URI
    });
  });

  function onSuccess(imageURI) {
    //alert(imageURI);
    var image = document.getElementById('picture');
    //image.style.display = 'block';
    image.src = imageURI + '?' + Math.random();
    var options = new FileUploadOptions();
    options.fileKey = "file";
    options.fileName = imageURI.substr(imageURI.lastIndexOf('/') + 1);
    options.mimeType = "image/jpeg";
    var params = {};
    params.value1 = "test";
    params.value2 = "param";
    options.params = params;
    options.chunkedMode = false;
    var ft = new FileTransfer();
    ft.upload(imageURI, "<?php echo $image_path; ?>/job_image/job_image.php", function(result) {
        //alert(result.response);
        var data = result.response;
        window.localStorage.setItem("image_name", data.trim());
      },
      function(error) {
        alert('error : ' + JSON.stringify(error));
      }, options);
  }

  function onFail(message) {
    alert('Failed because: ' + message);
  }




  function get_job(country_id, state_id, district_id, city_id, area_id, unique_no, completed_status) {

    var job_id = $("#job_id").val();
    if (job_id != '') {
      var action = "update";
    } else {
      var action = "add";
    }

    var user_id = $("#user_id").val();
    var id_no = $("#id_no").val();
    var dob = $("#dob").val();
    var contact_no = $("#contact_no").val();
    var age = $("#age").val();
    // var gender = $(":checkbox[name=gender]:checked").val();
    if ($("#gender_female").is(':checked')) {
      var gender = $("#gender_female").val();
    } else if ($("#gender_male").is(':checked')) {
      var gender = $("#gender_male").val();
    } else {
      var gender = '';
    }
    var qualification = $("#qualification").val();
    // var experience = $(":checkbox[name=experience]:checked").val();
    if ($("#experience_yes").is(':checked')) {
      var experience = $("#experience_yes").val();
    } else if ($("#experience_no").is(':checked')) {
      var experience = $("#experience_no").val();
    } else {
      var experience = '';
    }

    var exp_yes1 = $("#exp_yes1").val();
    var exp_yes2 = $("#exp_yes2").val();
    var language = $("#language").val();
    var city = $("#city").val();
    var pincode = $('#pincode').val();
    // var passport = $(":checkbox[name=passport]:checked").val();
    if ($("#passport_yes").is(':checked')) {
      var passport = $("#passport_yes").val();
    } else if ($("#passport_no").is(':checked')) {
      var passport = $("#passport_no").val();
    } else {
      var passport = '';
    }

    // var marital_status = $(":checkbox[name=marital_status]:checked").val();
    if ($("#marital_status_married").is(':checked')) {
      var marital_status = $("#marital_status_married").val();
    } else if ($("#marital_status_unmarried").is(':checked')) {
      var marital_status = $("#marital_status_unmarried").val();
    } else {
      var marital_status = '';
    }


    var insert = [];
    $('.serve').each(function() {
      if ($(this).is(":checked")) {
        insert.push($(this).val());
      }
    });
    insert = insert.toString();

    var area_of_interest = $('#area_of_interest').val();
    var from_salary = $('#from_salary').val();
    var to_salary = $('#to_salary').val();
    // var physically = $(":checkbox[name=physically]:checked").val();
    if ($("#physically_yes").is(':checked')) {
      var physically = $("#physically_yes").val();
    } else if ($("#physically_no").is(':checked')) {
      var physically = $("#physically_no").val();
    } else {
      var physically = '';
    }

    var disability = $('#disability').val();
    var job1 = $(":checkbox[name=job1]:checked").val();
    var insert1 = [];
    $('.serve1').each(function() {
      if ($(this).is(":checked")) {
        insert1.push($(this).val());
      }
    });

    insert1 = insert1.toString();
    var insert2 = [];
    $('.serve2').each(function() {
      if ($(this).is(":checked")) {
        insert2.push($(this).val());
      }
    });
    insert2 = insert2.toString();

    var hobbies = $('#hobbies').val();
    var name = $('#name').val();
    var father_name = $('#father_name').val();
    var mother_name = $('#mother_name').val();
    var per_address = $('#per_address').val();
    var mobile_no = $('#mobile_no').val();
    var whatsapp_no = $('#whatsapp_no').val();
    var email = $('#email').val();

    var school_name = $('#school_name').val();
    var school_imam_signature = $('#school_imam_signature').val();
    var signature_name = $('#signature_name').val();
    var signature_mobile = $('#signature_mobile').val();
    var muththavalli_signature = $('#muththavalli_signature').val();
    var muththavalli_signature_name = $('#muththavalli_signature_name').val();
    var muththavalli_signature_mobile = $('#muththavalli_signature_mobile').val();
    var job_image = window.localStorage.getItem("image_name");

    if (id_no == '') {
      alert("Please enter ID Number");
      $("#id_no").focus();
    } else {
      var sendInfo = {
        job_id: job_id,
        action: action,

        user_id: user_id,
        id_no: id_no,
        dob: dob,
        contact_no: contact_no,
        age: age,
        gender: gender,
        qualification: qualification,
        experience: experience,
        exp_yes1: exp_yes1,
        exp_yes2: exp_yes2,
        language: language,
        city: city,
        pincode: pincode,
        passport: passport,
        marital_status: marital_status,
        insert: insert,
        area_of_interest: area_of_interest,
        from_salary: from_salary,
        to_salary: to_salary,
        physically: physically,
        disability: disability,
        insert1: insert1,
        insert2: insert2,
        hobbies: hobbies,
        name: name,
        father_name: father_name,
        mother_name: mother_name,
        per_address: per_address,
        mobile_no: mobile_no,
        whatsapp_no: whatsapp_no,
        email: email,
        job_image: job_image,
        school_name: school_name,
        school_imam_signature: school_imam_signature,
        signature_name: signature_name,
        signature_mobile: signature_mobile,
        muththavalli_signature: muththavalli_signature,
        muththavalli_signature_name: muththavalli_signature_name,
        muththavalli_signature_mobile: muththavalli_signature_mobile,
        country_id: country_id,
        city_id: city_id,
        state_id: state_id,
        district_id: district_id,
        area_id: area_id,
      };
      $.ajax({
        url: FILE_PATH + '/job_application/job_model.php',
        type: 'POST',
        data: sendInfo,
        timeout: 60000,
        success: function(data) {
          alert(data);
          window.localStorage.removeItem("image_name");
          $("#previous_id").val('job_list.php');
    	    var user_id = '<?php echo $user_id; ?>';
            var country_id = '<?php echo $country_id; ?>';
            var state_id = '<?php echo $state_id; ?>';
            var district_id = '<?php echo $district_id; ?>';
            var city_id = '<?php echo $city_id; ?>';
            var area_id = '<?php echo $area_id; ?>';
            var user_type = '<?php echo $user_type; ?>';
            var unique_no = '<?php echo $unique_no; ?>';
            var completed_status = '<?php echo $completed_status; ?>';
          $('#page_replace_div').load(FILE_PATH + "/job_application/job_list.php?user_id=" + user_id + '&country_id=' + country_id + '&state_id=' + state_id + '&district_id=' + district_id + '&city_id=' + city_id + '&area_id=' + area_id + '&unique_no=' + unique_no + '&completed_status=' + completed_status+'&user_type='+user_type);
        }
      });
    }
  }
  $(document).ready(function(){
          window.localStorage.removeItem("image_name");
  });


  function job_create_back(country_id, state_id, district_id, city_id, area_id, user_id, unique_no, completed_status) {
	    var user_id = '<?php echo $user_id; ?>';
        var country_id = '<?php echo $country_id; ?>';
        var state_id = '<?php echo $state_id; ?>';
        var district_id = '<?php echo $district_id; ?>';
        var city_id = '<?php echo $city_id; ?>';
        var area_id = '<?php echo $area_id; ?>';
        var user_type = '<?php echo $user_type; ?>';
        var unique_no = '<?php echo $unique_no; ?>';
        var completed_status = '<?php echo $completed_status; ?>';
    $("#previous_id").val('job_application/job_list.php');
    $('#page_replace_div').load(FILE_PATH + '/job_application/job_list.php?user_id=' + user_id + '&country_id=' + country_id + '&state_id=' + state_id + '&district_id=' + district_id + '&city_id=' + city_id + '&area_id=' + area_id + '&unique_no=' + unique_no + '&completed_status=' + completed_status+'&user_type='+user_type);
  }

  function check_physically(plan) {
    if (plan == 'yes') {
      $(".check_physically").show();
    } else {
      $(".check_physically").hide();
    }
  }
</script>