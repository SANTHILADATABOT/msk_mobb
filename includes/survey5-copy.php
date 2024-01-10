<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
$sess_user_id = $_GET[ 'sess_user_id' ];
$sess_usertype_id = $_GET[ 'sess_usertype_id' ];
$crt_month = date( 'Y-m' );
$current_date = date( 'Y-m-d' );
$unique_no=$_GET['unique_no'];

echo "SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."'";

$permission = $pdo_conn->prepare("SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."'");
            $permission->execute();
            $survey3_records = $permission->fetch();
          
//echo "survey3_records".$survey3_records['other_details_1_entry'];
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
          <h5>Guidance / Counselling Related Services - <span class="tamil_font_small"> ஆலோசனை  மற்றும்  வழிகாட்டுதல் </span></h5>
        </div>
		  
        <form class="login_form">
			
          <table class="table table-bordered gove_sche">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="80%">Schemes/ தேவைப்படுபவர்களின் விபரம் </th>
                <th width="35%">S.No / வ.எண்</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1 </td>
                <td> Family Counselling / குடும்ப பிரச்சனை தீர்வுக்கான ஆலோசனை </td>
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
                <td>Nikkah Counselling / நிக்காஹ்விற்கான தகவல் மற்றும் ஆலோசனை </td>
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
                <td> Entrepreneurship Counselling / சிறுதொழில் ஆரம்பிப்பதற்கான ஆலோசனை </td>
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
                <td> Business Counselling / வியாபார ஆலோசனை </td>
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
                <td>Skill Development Guidance & Training / சிறுதொழில் பயிற்சிக்கான வழிகாட்டுதல் </td>
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
                <td> Rehabilitation Counselling for Addicts / மது அடிமை மறுவாழ்விற்கு ஆலோசனை </td>
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
                <td>7 </td>
                <td> Suffering due to Interest based loan / வட்டிக் கடனால் பாதிக்கப்பட்டோர் </td>
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
              <td colspan="2">
              
              Details about the Guidance & Counselling / ஆலோசனை மற்றும் வழிகாட்டுதல் சம்பந்தமான முழு விபரம்
              <table class="nobg_table">
                <tr>
                  <td><textarea class="form-control text_area_radius" rows="5" id="comment" name="text"></textarea></td>
                </td>
                
                </tr>
                
              </table>
              </td>
              
              </tr>
              
              <tr>
              
              <td>9 </td>
              <td colspan="2">
              
              Others / இதர உதவியின் விபரம்
              <table class="nobg_table">
                <tr>
                  <td><input type="" class="form-control" id=""></td>
                </td>
                
                </tr>
                
              </table>
              </td>
              
              </tr>
              
            </tbody>

          </table>

          <hr>

          <div class="col-12 nopadd">
            <div class="row">
              <div class="col-6"> <a onClick="get_survey4_login_det('<?php echo $unique_no; ?>')">
                <button type="button" class="btn btn-success back_btn"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i> Back </button>
              </div>
              <div class="col-6"> <a onClick="get_survey6_login_det()">
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
function get_survey4_login_det(unique_no)
{	

alert(unique_no);
   $("#previous_id").val('survey4.php');             
     $('#page_replace_div').load(FILE_PATH+'/survey4.php?unique_no='+unique_no);
		
}

</script> 
<script type="text/javascript">
function get_survey6_login_det()
{	
		$("#previous_id").val('survey6.php');							
		$('#page_replace_div').load(FILE_PATH+'/survey6.php');
}
</script>