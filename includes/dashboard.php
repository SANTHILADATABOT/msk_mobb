<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );

$sess_user_id = $_GET[ 'sess_user_id' ];
$sess_usertype_id = $_GET[ 'sess_usertype_id' ];
$user_type=$_GET['user_type'];
$unique_no=$_GET['unique_no'];
$user_id = $_GET['user_id'];
$country_id = $_GET['country_id']; 
$state_id = $_GET['state_id']; 
$district_id = $_GET['district_id']; 
$city_id = $_GET['city_id']; 
$area_id = $_GET['area_id']; 
$completed_status=$_GET['completed_status'];
if($completed_status=='')
{
    
    $survey1 = $pdo_conn->prepare("SELECT * FROM  fact_finding_form WHERE user_id='".$user_id."' and completed_status='0' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'");
}
else
{
    $survey1 = $pdo_conn->prepare("SELECT * FROM  fact_finding_form WHERE user_id='".$user_id."' and completed_status='".$completed_status."' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'");
}
$survey1->execute();
$survey1_records=$survey1->fetch();
$counts_are=count($survey1_records['unique_no']);
if($counts_are!='0')
{
$unique_no=$survey1_records['unique_no'];
}
else
{
    $unique_no='';
}
$crt_month = date( 'Y-m' );
$current_date = date( 'Y-m-d' );
?>



<style>
  .wrapper.homepage {
    padding-bottom: 0px;
  }

  input.form-control {
    padding-left: 40px;
  }

  .bt-color {
    background-color: #282c93;
    color: #ffffff;
  }

  .bt-color:hover {
    color: #ffffff;
  }
    .voln_img1 {
      background-color:#fffef9;
      border:1px solid #d8d8d8;
      box-shadow: 5px 5px 5px #efefef;
      border-radius:12px !important;
  }
  .icn-txt {
      font-size:15px !important;
      padding:2px 2px !important;
      font-weight:bold !important;
      height:26px;
  }
    .icn-txt1 {
      font-size:15px !important;
      padding:2px 2px !important;
      font-weight:bold !important;
      height:50px;
  }
</style>

<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;  ?>">
<input type="hidden" name="country_id" id="country_id" value="<?php echo $country_id;  ?>">
<input type="hidden" name="state_id" id="state_id" value="<?php echo $state_id;  ?>">
<input type="hidden" name="district_id" id="district_id" value="<?php echo $district_id;  ?>">
<input type="hidden" name="city_id" id="city_id" value="<?php echo $city_id;  ?>">
<input type="hidden" name="area_id" id="area_id" value="<?php echo $area_id;  ?>">


<div id="contents" class="content-faded">
  <div class="container h-100 animated bounceInLeft"
    style="background-image: url('img/login_bg1.jpg'); background-size: cover;">
      <div class="row mt-4">
   
        <div class="col-6 rounded-lg">
      <div class="align-self-center mx-auto">
        <div class="voln_img1 btn btn-light btn-square-md"> 
          <button type="button" class="btn btn-volu" onClick="get_volunteer_form()">
              <img src="<?php echo $image_path;?>/12.png" style="width:100px;height:100px">
            <p class="notranslate icn-txt"> Volunteer Rights</p>
          </button>
        </div>
      </div>
   
    </div>


    <div class="col-6 rounded-lg">
      <div class="align-self-center mx-auto">
        <div class="voln_img1 btn btn-light btn-square-md"> 
          <button type="button" class="btn btn-volu" onClick="get_survey_form()">
              <img src="<?php echo $image_path;?>/4.png" style="width:100px;height:100px">
            <p class="notranslate icn-txt"> Survey Form </p>
          </button>
        </div>
      </div>
    </div>

  <!--  <div class="mt-4 mb-5">
      <div class="align-self-center mx-auto">
        <div class="voln_img"> <img src="img/sur.png">
          <button type="button" class="btn btn-volu" onClick="get_survey_list()">
            <span class="notranslate"> Survey List </span>
          </button>
        </div>
      </div>
    </div>
-->
    <div class="col-6 rounded-lg" style="margin-top:20px">
      <div class="align-self-center mx-auto">
        <div class="voln_img1 btn btn-light btn-square-md"> 
          <button type="button" class="btn btn-volu" onclick="get_food_needed();"  > 
          <img src="<?php echo $image_path;?>/food.png" style="width:100px;height:100px">
            <p class="notranslate icn-txt1">Food Needed Form</p>
          </button>
        </div>
      </div>
    </div>

    <div class="col-6 rounded-lg" style="margin-top:20px">
      <div class="align-self-center mx-auto">
        <div class="voln_img1 btn btn-light btn-square-md"> 
          <button type="button" class="btn btn-volu" onclick="get_medical_help();" >
              <img src="<?php echo $image_path;?>/1.png" style="width:100px;height:100px">
            <p class="notranslate icn-txt1">Medical Help Form</p>
          </button>
        </div>
      </div>
    </div>

     <div class="col-6 rounded-lg" style="margin-top:20px">
      <div class="align-self-center mx-auto">
        <div class="voln_img1 btn btn-light btn-square-md"> 
          <button type="button" class="btn btn-volu" onclick="get_admission_card();" >
              <img src="<?php echo $image_path;?>/2.png" style="width:100px;height:100px">
            <p class="notranslate icn-txt">Admission card</p>
          </button>
        </div>
      </div>
    </div>
    <div class="col-6 rounded-lg"  style="margin-top:20px">
      <div class="align-self-center mx-auto">
        <div class="voln_img1 btn btn-light btn-square-md"> 
          <button type="button" class="btn btn-volu" onClick="join_form('<?php echo $user_id ?>')">
              <img src="<?php echo $image_path;?>/join.png" style="width:100px;height:100px">
            <p class="notranslate icn-txt"> Join Form</p>
          </button>
        </div>
      </div>
    </div>

    <div class="col-6 rounded-lg" style="margin-top:20px">
      <div class="align-self-center mx-auto">
        <div class="voln_img1 btn btn-light btn-square-md"> 
          <button type="button" class="btn btn-volu" onClick="matrimonial_information('<?php echo $user_id ?>')">
              <img src="<?php echo $image_path;?>/5.png" style="width:100px;height:100px">
            <p class="notranslate icn-txt"> Matrimonial Information</p>
          </button>
        </div>
      </div>
    </div>
 <div class="col-6 rounded-lg"  style="margin-top:20px">
      <div class="align-self-center mx-auto">
        <div class="voln_img1 btn btn-light btn-square-md"> 
          <button type="button" class="btn btn-volu" onClick="job_application('<?php echo $user_id ?>')">
              <img src="<?php echo $image_path;?>/6.png" style="width:100px;height:100px">
            <p class="notranslate icn-txt"> Job Application</p>
          </button>
        </div>
      </div>
    </div>
    <!--<div class="col-6 rounded-lg"  style="margin-top:20px">
      <div class="align-self-center mx-auto">
        <div class="voln_img1 btn btn-light btn-square-md"> 
          <button type="button" class="btn btn-volu" onClick="image_upload_test()">
            <p class="notranslate icn-txt"> Image Upload Test</p>
          </button>
        </div>
      </div>
    </div>-->
  </div>
</div>
</div>

  


<script>

$("#homeclass").remove();
$("#uni_no").remove();
function get_volunteer_form() 
{
    var user_id = '<?php echo $user_id; ?>';
    var country_id = '<?php echo $country_id; ?>';
    var state_id = '<?php echo $state_id; ?>';
    var district_id = '<?php echo $district_id; ?>';
    var city_id = '<?php echo $city_id; ?>';
    var area_id = '<?php echo $area_id; ?>';
    var user_type = '<?php echo $user_type; ?>';
    var unique_no = '<?php echo $unique_no; ?>';
    var completed_status = '<?php echo $completed_status; ?>';
    $("#previous_id").val('volunteer_form.php');
    $('#page_replace_div').load(FILE_PATH + '/volunteer_form.php?user_id='+user_id+'&user_type='+user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
}

function get_survey_form() 
{
    var user_id = '<?php echo $user_id; ?>';
    var country_id = '<?php echo $country_id; ?>';
    var state_id = '<?php echo $state_id; ?>';
    var district_id = '<?php echo $district_id; ?>';
    var city_id = '<?php echo $city_id; ?>';
    var area_id = '<?php echo $area_id; ?>';
    var user_type = '<?php echo $user_type; ?>';
    var unique_no = '<?php echo $unique_no; ?>';
    var completed_status = '<?php echo $completed_status; ?>';
    $("#previous_id").val('survey1.php');
    $('#page_replace_div').load(FILE_PATH + '/survey1.php?user_id='+user_id+'&user_type='+user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
}
   


function get_food_needed() 
{
    var user_id = '<?php echo $user_id ?>';
    var unique_no = '<?php echo $unique_no ?>';
    var completed_status='<?php echo $completed_status ?>';
    var country_id = '<?php echo $country_id;  ?>';
    var state_id = '<?php echo $state_id;  ?>';
    var district_id = '<?php echo $district_id;  ?>';
    var city_id = '<?php echo $city_id;  ?>';
    var area_id = '<?php echo $area_id;  ?>';
    var user_type   =   '<?php echo $user_type; ?>';
    $("#previous_id").val('food_details_form/list.php');
    $('#page_replace_div').load(FILE_PATH + '/food_details_form/list.php?user_id='+user_id+'&user_type='+user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
}
   

function get_medical_help() 
{
    var user_id = '<?php echo $user_id; ?>';
    var country_id = '<?php echo $country_id; ?>';
    var state_id = '<?php echo $state_id; ?>';
    var district_id = '<?php echo $district_id; ?>';
    var city_id = '<?php echo $city_id; ?>';
    var area_id = '<?php echo $area_id; ?>';
    var user_type = '<?php echo $user_type; ?>';
    var unique_no = '<?php echo $unique_no; ?>';
    var completed_status = '<?php echo $completed_status; ?>';
    $("#previous_id").val('medical_help/list.php');
    $('#page_replace_div').load(FILE_PATH + '/medical_help/list.php?user_id='+user_id+'&user_type='+user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
}
   

function get_survey_list()
{
    var user_id = '<?php echo $user_id ?>';
    var unique_no = '<?php echo $unique_no ?>';
    var completed_status='<?php echo $completed_status ?>';
    var country_id = $("#country_id").val();
    var state_id = $("#state_id").val();
    var district_id = $("#district_id").val();
    var city_id = $("#city_id").val();
    var area_id = $("#area_id").val();
  $("#previous_id").val('medical_help/list.php');
  $('#page_replace_div').load(FILE_PATH + '/survey_report/list.php?user_id='+user_id+'&user_type='+user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
}

function get_admission_card()
{
    var user_id = '<?php echo $user_id; ?>';
    var country_id = '<?php echo $country_id; ?>';
    var state_id = '<?php echo $state_id; ?>';
    var district_id = '<?php echo $district_id; ?>';
    var city_id = '<?php echo $city_id; ?>';
    var area_id = '<?php echo $area_id; ?>';
    var user_type = '<?php echo $user_type; ?>';
    var unique_no = '<?php echo $unique_no; ?>';
    var completed_status = '<?php echo $completed_status; ?>';
    $("#previous_id").val('admission_card/list.php');
    $('#page_replace_div').load(FILE_PATH + '/admission_card/list.php?user_id='+user_id+'&user_type='+user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no);
}
function join_form(user_id)
{
    var user_id = '<?php echo $user_id; ?>';
    var country_id = '<?php echo $country_id; ?>';
    var state_id = '<?php echo $state_id; ?>';
    var district_id = '<?php echo $district_id; ?>';
    var city_id = '<?php echo $city_id; ?>';
    var area_id = '<?php echo $area_id; ?>';
    var user_type = '<?php echo $user_type; ?>';
    var unique_no = '<?php echo $unique_no; ?>';
    var completed_status = '<?php echo $completed_status; ?>';
    $("#previous_id").val('join_form/join_list.php');
    $('#page_replace_div').load(FILE_PATH +  '/join_form/join_list.php?user_id='+user_id+'&user_type='+user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
}
    
function matrimonial_information(user_id)
{
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
    $('#page_replace_div').load(FILE_PATH + '/matrimonial_information/matrimonial_list.php?user_id='+user_id+'&user_type='+user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
}
function job_application(user_id)
{
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
    $('#page_replace_div').load(FILE_PATH + '/job_application/job_list.php?user_id='+user_id+'&user_type='+user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
}
/*function image_upload_test()
{
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
    $('#page_replace_div').load(FILE_PATH + '/image_upload_test/index.php?user_id='+user_id+'&user_type='+user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
}*/
</script>