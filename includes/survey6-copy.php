<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
$sess_user_id = $_GET[ 'sess_user_id' ];
$sess_usertype_id = $_GET[ 'sess_usertype_id' ];
$crt_month = date( 'Y-m' );
$current_date = date( 'Y-m-d' );
echo $unique_no=$_GET['unique_no'];

echo "SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."'";

$permission = $pdo_conn->prepare("SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."'");
            $permission->execute();
            $survey3_records = $permission->fetch();
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
<input type="hidden" name="unique_no" id="unique_no" value="<?php echo $unique_no; ?>">
<div class="sub_bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12 survey_content">
        <div class="head_line">
          <h5>Health Related Services - <span class="tamil_font_small">மருத்துவ உதவிகள் </span></h5>
        </div>
		  
        <form class="login_form bor-over">
			
          <div class="form-row topbtm">
            <div class="col-9">
              <label for="" class="two_hgt"> Disease / நோயின் விபரம் </label>
              <i class="icon-notebook icons"></i>
              <input type="text" class="form-control">
            </div>
            <div class="col-3">
              <label for="" class="two_hgt">S.No / வ.எண் </label>
              <select class="form-control serial_select_bg" id="sel1">
                <option>Select</option>
                <option> 1 </option>
                <option>2 </option>
                <option>3 </option>
                <option>4 </option>
                <option>5 </option>
                <option>6 </option>
              </select>
            </div>
          </div>
          <div class="form-row topbtm">
            <div class="col-9">
              <label for="" class="three_hgt">Surgery Details (Hospital Cost, Cash in Hand) / அறுவை சிகிச்சையின் விபரம் </label>
              <i class="icon-notebook icons"></i>
              <input type="text" class="form-control">
            </div>
            <div class="col-3">
              <label for="" class="three_hgt">S.No / வ.எண் </label>
              <select class="form-control serial_select_bg" id="sel1">
                <option>Select</option>
                <option> 1 </option>
                <option>2 </option>
                <option>3 </option>
                <option>4 </option>
                <option>5 </option>
                <option>6 </option>
              </select>
            </div>
          </div>
          <div class="form-row topbtm smspace">
            <div class="col-12">
              <label for="" class="">Have you recoverd from any chronic diseases? If yes, Details of Doctor & Cost of treatment (This is for Guiding others) / ஏதேனும் நாட்பட்ட நோய்லிருந்து நீங்கள் மீண்டிருக்கிறீர்களா? ஆம், என்றால் மருத்துவர் விவரங்கள் மற்றும் சிகிச்சை செலவு (இது மற்றவர்களுக்கு வழிகாட்டும்) </label>
              <textarea class="form-control text_area_radius" rows="5" id="comment" name="text"></textarea>
            </div>
          </div>
        </form>
        <form class="login_form bor-over">
          <div class="form-row topbtm smspace">
            <div class="col-9">
              <label for="" class="three_hgt">Monthly Expenditure on Medicine / மாதாந்திர மருத்துவச்  செலவு</label>
              <i class="icon-event icons"></i>
              <input type="text" class="form-control">
            </div>
            <div class="col-3">
              <label for="" class="three_hgt">S.No / வ.எண் </label>
              <select class="form-control serial_select_bg" id="sel1">
                <option>Select</option>
                <option> 1 </option>
                <option>2 </option>
                <option>3 </option>
                <option>4 </option>
                <option>5 </option>
                <option>6 </option>
              </select>
            </div>
          </div>
        </form>
		  
        <form class="login_form bor-over">
          <div class="form-group smspace">
            <label for=""> Availability of Govt.Health Insurance Card? / மருத்துவக் காப்பீட்டுத் திட்ட அடையாள அட்டை உள்ளதா ? </label>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
              <label class="custom-control-label pt-1" for="customRadio">Yes / ஆம் </label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
              <label class="custom-control-label pt-1" for="customRadio2">No / இல்லை </label>
            </div>
          </div>
        </form>
		  
        <hr>
		  
        <div class="col-12 nopadd">
          <div class="row">
            <div class="col-6"> <a onClick="get_survey5_login_det('<?php echo $unique_no; ?>')">
              <button type="button" class="btn btn-success back_btn"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i> Back </button>
            </div>
            <div class="col-6"> <a onClick="get_survey7_login_det()">
              <button type="button" class="btn btn-success next_btn"> Next <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
            </div>
          </div>
        </div>
			  
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function get_survey5_login_det(unique_no)
{	
  
		$("#previous_id").val('survey5.php');							
		$('#page_replace_div').load(FILE_PATH+'/survey5.php?unique_no='+unique_no);
}

</script> 
<script type="text/javascript">
function get_survey7_login_det()
{	
		$("#previous_id").val('survey7.php');							
		$('#page_replace_div').load(FILE_PATH+'/survey7.php');
}
</script>