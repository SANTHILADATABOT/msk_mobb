<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
$sess_user_id = $_GET[ 'sess_user_id' ];
$sess_usertype_id = $_GET[ 'sess_usertype_id' ];
$crt_month = date( 'Y-m' );
$current_date = date( 'Y-m-d' );
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
</style>

<div class="sub_bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12 survey_content">
		  
        <div class="head_line">
          <h5>Govt. / Other NGD'S Related Schemes - <span class="tamil_font_small"> அரசு மற்றும் பிற நல  அமைப்பு சார்ந்த உதவிகள் </span></h5>
        </div>
		  
        <form class="login_form">
			
          <table class="table table-bordered gove_sche">
            <thead>
              <tr>
                <th width="5%">No.</th>
                <th width="80%">Schemes/ தேவைப்படுபவர்களின் விபரம் </th>
                <th width="35%">S.No / வ.எண்</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1 </td>
                <td>Old Age Pension / முதியோர் ஓய்வூதியம் </td>
                <td><select class="form-control serial_select_bg" id="old_age_pension" name="old_age_pension">
                    <option>Select</option>
                    <option> 1 </option>
                    <option>2 </option>
                    <option>3 </option>
                    <option>4 </option>
                    <option>5 </option>
                    <option>6 </option>
                  </select></td>
              </tr>
              <tr>
                <td>2 </td>
                <td>Deserted Women pension / கணவரால் கைவிடப்பட்டோர் </td>
                <td><select class="form-control serial_select_bg" id="deserted_women_pension" name="deserted_women_pension">
                    <option>Select</option>
                    <option> 1 </option>
                    <option>2 </option>
                    <option>3 </option>
                    <option>4 </option>
                    <option>5 </option>
                    <option>6 </option>
                  </select></td>
              </tr>
              <tr>
                <td>3 </td>
                <td> Marriage help / திருமண உதவி
                  <table class="nobg_table">
                    <tr>
                      <td><div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
                          <label class="custom-control-label pt-1" for="customRadio">MSK </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
                          <label class="custom-control-label pt-1" for="customRadio2">அரசு</label>
                        </div></td>
                    </tr>
                  </table></td>
                <td><select class="form-control serial_select_bg" id="marriage_help"  name="marriage_help">
                    <option>Select</option>
                    <option> 1 </option>
                    <option>2 </option>
                    <option>3 </option>
                    <option>4 </option>
                    <option>5 </option>
                    <option>6 </option>
                  </select></td>
              </tr>
              <tr>
                <td>4 </td>
                <td>Disability Pension / ஊனமுற்றோருக்கான உதவி</td>
                <td><select class="form-control serial_select_bg" id="disability_pension" name="disability_pension">
                    <option>Select</option>
                    <option> 1 </option>
                    <option>2 </option>
                    <option>3 </option>
                    <option>4 </option>
                    <option>5 </option>
                    <option>6 </option>
                  </select></td>
              </tr>
              <tr>
                <td>5 </td>
                <td>Widow / Aged unmarried welfare / விதவை / முதிர்கன்னியருக்கான உதவி </td>
                <td><select class="form-control serial_select_bg" id="widow_aged_welfare" name="widow_aged_welfare">
                    <option>Select</option>
                    <option> 1 </option>
                    <option>2 </option>
                    <option>3 </option>
                    <option>4 </option>
                    <option>5 </option>
                    <option>6 </option>
                  </select></td>
              </tr>
              <tr>
                <td>6 </td>
                <td>Destitute / Orphan welfare / ஆதரவற்றோர் / அனாதைகளுக்கான உதவி</td>
                <td><select class="form-control serial_select_bg" id="destitute_orphan_welfare" name="destitute_orphan_welfare">
                    <option>Select</option>
                    <option> 1 </option>
                    <option>2 </option>
                    <option>3 </option>
                    <option>4 </option>
                    <option>5 </option>
                    <option>6 </option>
                  </select></td>
              </tr>
              <tr>
                <td>7 </td>
                <td>Incapable of working / உழைக்க இயலாதவர்</td>
                <td><select class="form-control serial_select_bg" id="incapable_of_working" name="incapable_of_working">
                    <option>Select</option>
                    <option> 1 </option>
                    <option>2 </option>
                    <option>3 </option>
                    <option>4 </option>
                    <option>5 </option>
                    <option>6 </option>
                  </select></td>
              </tr>
              <tr>
              
              <td>8 </td>
              <td>
              
              Ulama welfare card / உலமாக்கள் அட்டை
              <table class="nobg_table">
                <tr>
                  <td><input type="" class="form-control" id="ulama_welfare_card" name="ulama_welfare_card"></td>
                </td>
                
                </tr>
                
              </table>
              </td>
              
            <td><select class="form-control serial_select_bg" id="sel1 " name="marriage_help">
                  <option>Select</option>
                  <option> 1 </option>
                  <option>2 </option>
                  <option>3 </option>
                  <option>4 </option>
                  <option>5 </option>
                  <option>6 </option>
                </select></td>
            </tr>
            <tr>
            
            <td>9 </td>
            <td>
            Others / இதர உதவியின் விபரம்
            <table class="nobg_table">
              <tr>
                <td><input type="" class="form-control" id="other_details_1" name="other_details_1"></td>
              </td>
              
              </tr>
              
            </table>
            </td>
            
            <td><select class="form-control serial_select_bg" id="sel1" name="marriage_help">
                  <option>Select</option>
                  <option> 1 </option>
                  <option>2 </option>
                  <option>3 </option>
                  <option>4 </option>
                  <option>5 </option>
                  <option>6 </option>
                </select></td>
            </tr>
            </tbody>
            
          </table>

          <hr>

          <div class="col-12 nopadd">
            <div class="row">
              <div class="col-6"> <a onClick="get_survey2_login_det()">
                <button type="button" class="btn btn-success back_btn"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i> Back </button>
              </div>
              <div class="col-6"> <a onClick="get_survey4_login_det()">
                <button type="button" class="btn btn-success next_btn"> Next <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
              </div>
            </div>
          </div>
				
        </form>
			  
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function get_survey2_login_det()
{	
		$("#previous_id").val('survey2.php');							
		$('#page_replace_div').load(FILE_PATH+'/survey2.php');
}

</script> 
<script type="text/javascript">
function get_survey4_login_det()
{	
		$("#previous_id").val('survey4.php');							
		$('#page_replace_div').load(FILE_PATH+'/survey4.php');
}
</script>