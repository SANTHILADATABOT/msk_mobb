<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );

$user_id = $_GET['user_id']; 
$country_id = $_GET['country_id'];  
$state_id = $_GET['state_id'];  
$district_id = $_GET['district_id'];  
$city_id = $_GET['city_id']; 
$area_id = $_GET['area_id'];  
$user_type=$_GET['user_type'];
$unique_no = $_GET['unique_no'];


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
    <div class="col-6 ">
      <div class=" bdr">
        <div class="voln_img1 btn btn-light btn-square-md rounded-lg"> <img src="<?php echo $image_path;?>/vo.png" style="width:100px;height:100px"><br />
          <button type="button" class="btn btn-volu" onClick="get_survey_area()">
            <p class="notranslate icn-txt" style=""> Survey Area</p>
          </button>
          
        </div>
      </div>
    </div>

<!--    <div class="mt-4 mb-5">
      <div class="align-self-center mx-auto">
        <div class="voln_img"> <img src="img/sur.png">
          <button type="button" class="btn btn-volu" onclick="page_replace('reports_dashboard.php','sidebar-left','active-sidebar-box')" >
            <span class="notranslate"> Dashboard </span>
          </button>
        </div>
      </div>
    </div>
-->
    <div class="col-6 mb-5">
      <div class="align-self-center mx-auto">
        <div class="voln_img1 btn btn-light btn-square-md rounded-lg"> <img src="<?php echo $image_path;?>/sur.png" style="width:100px;height:100px"><br />
          <button type="button " class="btn btn-volu" onclick="page_replace('survey_report/list.php','sidebar-left','active-sidebar-box')">
            <p class="notranslate icn-txt"> Survey Reports </p>
          </button>
        </div>
      </div>
    </div>
<?php 
if($user_type!='6') { ?>
    <div class="col-6" style="margin-top:-20px">
      <div class="align-self-center mx-auto">
        <div class="voln_img1 btn btn-light btn-square-md rounded-lg"> <img src="<?php echo $image_path;?>/sur.png" style="width:100px;height:100px">
          <button type="button" class="btn btn-volu" onclick="page_replace('areawise_survey_report/list.php','sidebar-left','active-sidebar-box')">
            <span class="notranslate icn-txt"> Area Wise Reports </span>
          </button>
        </div>
      </div>
    </div>
<?php } ?>

   <!-- <div class="mt-4 mb-5">
      <div class="align-self-center mx-auto">
        <div class="voln_img"> <img src="img/sur.png">
          <button type="button" class="btn btn-volu" onClick="get_survey_area1()">
            <span class="notranslate"> Area Survey Completed</span>
          </button>
        </div>
      </div>
    </div>-->
    
    </div>
  </div>
</div>


<script>
function get_survey_area() 
{
    var user_id = $("#user_id").val();   
    var unique_no='<?php echo $unique_no ?>';
    var country_id = $("#country_id").val();
    var state_id = $("#state_id").val();
    var district_id = $("#district_id").val();
    var city_id = $("#city_id").val();
    var area_id = $("#area_id").val();
  $("#previous_id").val('dashboard.php');
  $('#page_replace_div').load(FILE_PATH + '/dashboard.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no);
}

function get_reports_form() 
{
    var user_id = $("#user_id").val();   
    var unique_no='<?php echo $unique_no ?>';
    var country_id = $("#country_id").val();
    var state_id = $("#state_id").val();
    var district_id = $("#district_id").val();
    var city_id = $("#city_id").val();
    var area_id = $("#area_id").val();
  $("#previous_id").val('reports_dashboard.php');
  $('#page_replace_div').load(FILE_PATH + '/reports_dashboard.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no);
}
function get_survey_area1() {
    var user_id = $("#user_id").val();
    var unique_no='<?php echo $unique_no ?>';  
    var country_id = $("#country_id").val();
    var state_id = $("#state_id").val();
    var district_id = $("#district_id").val();
    var city_id = $("#city_id").val();
    var area_id = $("#area_id").val();
    $("#previous_id").val('survey1.php');
    $('#page_replace_div').load(FILE_PATH + '/survey_area.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no);
  }


  function medical_help() {
    var user_id = $("#user_id").val();
    var unique_no='<?php echo $unique_no ?>'; 
    var country_id = $("#country_id").val();
    var state_id = $("#state_id").val();
    var district_id = $("#district_id").val();
    var city_id = $("#city_id").val();
    var area_id = $("#area_id").val();
    $("#previous_id").val('medical_creation.php');
    $('#page_replace_div').load(FILE_PATH + '/medical_help/medical_list.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no);
  }

  
function join_report() {
    var user_id = $("#user_id").val();
    var unique_no='<?php echo $unique_no ?>';  
    var country_id = $("#country_id").val();
    var state_id = $("#state_id").val();
    var district_id = $("#district_id").val();
    var city_id = $("#city_id").val();
    var area_id = $("#area_id").val();
    $("#previous_id").val('join_report.php');
    $('#page_replace_div').load(FILE_PATH + '/join_form/join_report.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no);
  } 

 /* function matrimonial_information() {
    var user_id = $("#user_id").val();
   
    $("#previous_id").val('create.php');
    $('#page_replace_div').load(FILE_PATH + '/matrimonial_information/matrimonial_list.php?user_id='+user_id);
  } */
</script>