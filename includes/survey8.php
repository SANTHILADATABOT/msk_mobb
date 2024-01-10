<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
$sess_user_id = $_GET[ 'sess_user_id' ];
$sess_usertype_id = $_GET[ 'sess_usertype_id' ];
$crt_month = date( 'Y-m' );
$current_date = date( 'Y-m-d' );
$user_id=$_GET['user_id'];
$country_id = $_GET['country_id'];
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id'];
?>
<style>
input.form-control {padding-left: 10px;}
.gove_sche tr td { font-size: 12px;}
thead {background-color: #703864;background-image: linear-gradient(316deg, #c76161 0%, #010368 74%);color: #fff;font-size: 13px;}
table.nobg_table { width: 100%;}
table.nobg_table tr {background-color: transparent !important;}
.nobg_table tr td { background-color: transparent;border: 0px;padding: 10px 0px;}
input.form-control.small_bor_radius {border-radius: 20px !important;height: 34px;background-color: #ffebed;border: 0px;}
.serial_select_bg {background-color: #ffedee;border: 0px;border-radius: 4px !important;}
.text_area_radius{border-radius: 25px !important;}
</style>
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" name="country_id" id="country_id" value="<?php echo $country_id;  ?>">
<input type="hidden" name="state_id" id="state_id" value="<?php echo $state_id;  ?>">
<input type="hidden" name="district_id" id="district_id" value="<?php echo $district_id;  ?>">
<input type="hidden" name="city_id" id="city_id" value="<?php echo $city_id;  ?>">
<input type="hidden" name="area_id" id="area_id" value="<?php echo $area_id;  ?>">
<div class="container-login100" style="background-image: url('img/login_bg1.jpg'); background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-md-12 survey_content"> 
        <center>
          <img src="img/done.png" width="28%">
        </center>
        <center>
          <h4 class="login_head completessurvey"> Survey Completed</h4>
        </center>
        <div class="wrap-login100-form-btn addsurvey">
          <div class="login100-form-bgbtn"></div>
          <a onClick="get_survey6_login_det()">

          <button class="login100-form-btn"><i class="icon-plus icons"></i> &nbsp; Survey form </button>
          </a> 
		</div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
//$("#homeclass").remove();
$("#uni_no").remove();
function get_survey6_login_det()
{ 
var user_id=$("#user_id").val();
var sendInfo = {
              //unique_no:unique_no,
              user_id:user_id,
              };
              console.log(sendInfo);

              $.ajax({
          
          type:'POST',
          data: sendInfo,
          timeout:60000,
success:function(data)
                { 
    var country_id ='<?php echo $country_id ?>';
    var state_id = '<?php echo $state_id ?>';
    var district_id = '<?php echo $district_id ?>';
    var city_id = '<?php echo $city_id ?>';
    var area_id =  '<?php echo $area_id ?>';
    $("#previous_id").val('survey1.php');             
    $('#page_replace_div').load(FILE_PATH+'/survey1.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id);
    
}
});
}


</script>