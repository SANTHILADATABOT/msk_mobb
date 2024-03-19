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
          <h5>Education / Employment Related Services - <span class="tamil_font_small"> கல்வி மற்றும் வேலை சார்ந்த உதவிகள் </span></h5>
        </div>
		  
        <form class="login_form">
			
          <table class="table table-bordered gove_sche">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="80%">Schemes / தேவைப்படுபவர்களின் விபரம் </th>
                <th width="35%">S.No / வ.எண்</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1 </td>
                <td> Higher Education Guidance / மேற்படிப்பிற்கான வழிகாட்டுதல் </td>
                <td><select class="form-control serial_select_bg" id="sel1">
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
                <td> Financial Support for Education / படிப்பதற்கு பொருளாதார உதவி </td>
                <td><select class="form-control serial_select_bg" id="sel1">
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
                <td> School Dropouts Interested in Employment / படிப்பை தொடர முடியாமல் வேலைக்குச் செல்ல விருப்பமுள்ளவர்கள் </td>
                <td><select class="form-control serial_select_bg" id="sel1">
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
                <td>Pre-Matric Scholarship <br>
                  (1st to 10th standard)</td>
                <td><select class="form-control serial_select_bg" id="sel1">
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
                <td>Post-Matric Scholarship <br>
                  (11th to Ph.D)</td>
                <td><select class="form-control serial_select_bg" id="sel1">
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
                <td>Guidance for Employment / வேலை வாய்ப்பிற்கான வழிகாட்டுதல் </td>
                <td><select class="form-control serial_select_bg" id="sel1">
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
              Others / இதர உதவியின் விபரம்
              <table class="nobg_table">
                <tr>
                  <td><input type="" class="form-control" id=""></td>
                </td>
                
                </tr>
                
              </table>
              </td>
              
            <td><select class="form-control serial_select_bg" id="sel1">
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
              <div class="col-6"> <a onClick="get_survey3_login_det()">
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
function get_survey3_login_det()
{	
		$("#previous_id").val('survey3.php');							
		$('#page_replace_div').load(FILE_PATH+'/survey3.php');
}

</script> 
<script type="text/javascript">
function get_survey4_login_det()
{	
		$("#previous_id").val('survey5.php');							
		$('#page_replace_div').load(FILE_PATH+'/survey5.php');
}
</script>