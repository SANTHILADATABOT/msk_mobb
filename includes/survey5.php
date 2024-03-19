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
$user_id=$_GET['user_id'];
$country_id = $_GET['country_id'];
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id'];
$completed_status=$_GET['completed_status'];



if($completed_status=='')
{
   $permission = $pdo_conn->prepare("SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."' and completed_status='0' and user_id='".$user_id."' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'");
}
else
{ 
    $permission = $pdo_conn->prepare("SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."' and completed_status='".$completed_status."' and user_id='".$user_id."' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'");
}
$permission->execute();
$survey5_records = $permission->fetch();

$family_counselling=$survey5_records['family_counselling'];
$nikkah_counselling=$survey5_records['nikkah_counselling'];
$entrepreneur_counselling=$survey5_records['entrepreneur_counselling'];
$business_counselling=$survey5_records['business_counselling'];
$guide_for_skill_develop=$survey5_records['guide_for_skill_develop'];
$rehabilitation_counselling=$survey5_records['rehabilitation_counselling'];
$suffer_from_interest_loan=$survey5_records['suffer_from_interest_loan'];

//echo "survey3_records".$survey3_records['other_details_1_entry'];
?>
<style>

.scroll-div {
    overflow: scroll;
}
input.form-control {padding-left: 40px;}
.gove_sche tr td { font-size: 12px;}
thead {background-color: #1f2287;color: #fff;font-size: 13px;}
table.nobg_table { width: 100%;}
table.nobg_table tr {background-color: transparent !important;}
.nobg_table tr td { background-color: transparent;border: 0px;padding: 10px 0px;}
input.form-control.small_bor_radius {border-radius: 20px !important;height: 34px;background-color: #ffebed;border: 0px;}
.serial_select_bg {background-color: #edeef5;border: 0px;border-radius: 4px !important;}
</style>
<input type="hidden" name="unique_no" id="unique_no" value="<?php echo $unique_no; ?>">

<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" name="country_id" id="country_id" value="<?php echo $country_id;  ?>">
<input type="hidden" name="state_id" id="state_id" value="<?php echo $state_id;  ?>">
<input type="hidden" name="district_id" id="district_id" value="<?php echo $district_id;  ?>">
<input type="hidden" name="city_id" id="city_id" value="<?php echo $city_id;  ?>">
<input type="hidden" name="area_id" id="area_id" value="<?php echo $area_id;  ?>">
<div class="wrapper homepage ">
<div class="head_line">
          <h5>Guidance / Counselling Related Services - <span class="tamil_font_small"> ஆலோசனை  மற்றும்  வழிகாட்டுதல் </span></h5>
        </div>
<div class="sub_bg animated bounceInLeft scroll-div">
  <div class="container">
    <div class="row">
      <div class="col-md-12 survey_content">
        
		  
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
                <td><select class="form-control serial_select_bg check_empt family_counselling select2" style="width:100%" multiple id="family_counselling">
                    <option>Select</option>
                   <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $exc=explode(',',$family_counselling);
                    $exs=[];
                    foreach($exc as $ass)
                    {
                        $newString = preg_replace('/\s/', '', $ass);
                       $exs[]=$newString;
                    }
                    print_r($exs);
                    foreach($relationship_list as $value){
                        $expls=$exc[$j];
                       //  $newString = preg_replace('/\s/', '', $expls);
                  
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$exs)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>2 </td>
                <td>Nikkah Counselling / நிக்காஹ்விற்கான தகவல் மற்றும் ஆலோசனை </td>
                <td><select class="form-control serial_select_bg check_empt nikkah_counselling select2" style="width:100%" multiple id="nikkah_counselling">
                    <option>Select</option>
                    <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $excpls=explode(',',$nikkah_counselling);
                    foreach($relationship_list as $value){
                    $expl_rel=$excpls[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$excpls)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>3 </td>
                <td> Entrepreneurship Counselling / சிறுதொழில் ஆரம்பிப்பதற்கான ஆலோசனை </td>
                <td><select class="form-control serial_select_bg check_empt entrepreneur_counselling select2" style="width:100%" multiple id="entrepreneur_counselling">
                    <option>Select</option>
                     <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $explds=explode(',',$entrepreneur_counselling);
                    foreach($relationship_list as $value){
                    $expls_rel=$explds[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$explds)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>4 </td>
                <td> Business Counselling / வியாபார ஆலோசனை </td>
                <td><select class="form-control serial_select_bg check_empt business_counselling select2" style="width:100%" multiple id="business_counselling">
                    <option>Select</option>
                     <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expls_rela=explode(',',$business_counselling);
                    foreach($relationship_list as $value){
                    $expls_relat=$expls_rela[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expls_rela)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>5 </td>
                <td>Skill Development Guidance & Training / சிறுதொழில் பயிற்சிக்கான வழிகாட்டுதல் </td>
                <td><select class="form-control serial_select_bg check_empt guide_for_skill_develop select2" style="width:100%" multiple id="guide_for_skill_develop">
                    <option>Select</option>
                   <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expls_dev=explode(',',$guide_for_skill_develop);
                    foreach($relationship_list as $value){
                    $expl_lis=$expls_dev[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expls_dev)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>6 </td>
                <td> Rehabilitation Counselling for Addicts / மது அடிமை மறுவாழ்விற்கு ஆலோசனை </td>
                <td><select class="form-control serial_select_bg check_empt rehabilitation_counselling select2" style="width:100%" multiple id="rehabilitation_counselling">
                    <option>Select</option>
                     <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expls_coun=explode(',',$rehabilitation_counselling);
                    foreach($relationship_list as $value){
                    $expl_relation=$expls_coun[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expls_coun)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>7 </td>
                <td> Suffering due to Interest based loan / வட்டிக் கடனால் பாதிக்கப்பட்டோர் </td>
                <td><select class="form-control serial_select_bg check_empt suffer_from_interest_loan select2" style="width:100%" multiple id="suffer_from_interest_loan">
                    <option>Select</option>
                     <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expl_suff=explode(',',$suffer_from_interest_loan);
                    foreach($relationship_list as $value){
                    $expl_suffer=$expl_suff[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expl_suff)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
              
              <td>8 </td>
              <td colspan="2">
              
              Details about the Guidance & Counselling / ஆலோசனை மற்றும் வழிகாட்டுதல் சம்பந்தமான முழு விபரம்
              <table class="nobg_table">
                <tr>
                  <td><textarea class="form-control text_area_radius check_empt" rows="5" id="guide_counselling_full_details"><?php echo $survey5_records['guide_counselling_full_details']; ?></textarea></td>
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
            <td><input type="" class="form-control check_empt" id="other_details_3" value="<?php echo $survey5_records['other_details_3'];?>"></td>
                </td>
                
                </tr>
                
              </table>
              </td>
              
              </tr>
              
            </tbody>

          </table>


				
        </form>
			  
      </div>
    </div>
  </div>
</div></div>

		<div class="footer">
            <div class="no-gutters">
                <div class="col-auto mx-auto">
                    <div class="row no-gutters justify-content-center">
					    <div class="col-6">
					      <a onClick="get_survey4_login_det('<?php echo $unique_no; ?>','<?php echo $user_id; ?>')">
                            <button type="button" class="btn btn-success back_btn"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i> Back </button>
                        </div>
                        <div class="col-6">
                            <a onClick="get_survey6_login_det()">
								<button type="button" class="btn btn-success next_btn"> Next <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
							</a>
                        </div>
						
                    </div>
                </div>
            </div>
        </div>




<script type="text/javascript">
function get_survey4_login_det(unique_no,user_id)
{	

   var user_id = '<?php echo $user_id ?>';
    var country_id ='<?php echo $country_id ?>';
    var state_id = '<?php echo $state_id ?>';
    var district_id = '<?php echo $district_id ?>';
    var city_id = '<?php echo $city_id ?>';
    var area_id =  '<?php echo $area_id ?>';
    var completed_status='<?php echo $completed_status ?>';
   $("#previous_id").val('survey4.php');             
     $('#page_replace_div').load(FILE_PATH+"/survey4.php?unique_no="+unique_no+"&user_id="+user_id+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&completed_status="+completed_status);
		
}

</script> 
<script type="text/javascript">
function get_survey6_login_det()
{	
    var unique_no=$("#unique_no").val();
    var user_id = '<?php echo $user_id ?>';
    var user_id = '<?php echo $user_id ?>';
    var country_id ='<?php echo $country_id ?>';
    var state_id = '<?php echo $state_id ?>';
    var district_id = '<?php echo $district_id ?>';
    var city_id = '<?php echo $city_id ?>';
    var area_id =  '<?php echo $area_id ?>';
    var completed_status='<?php echo $completed_status ?>';
    // var family_counselling = $("#family_counselling").val();
    
    var family_counselling=[];
    jQuery.each(jQuery('.family_counselling option:selected'), function() {
    family_counselling.push(jQuery(this).val()); 
    });
    var family_counselling=family_counselling.toString();
   // alert(family_counselling);
    // var nikkah_counselling = $("#nikkah_counselling").val();
    
    var nikkah_counselling=[];
    jQuery.each(jQuery('.nikkah_counselling option:selected'), function() {
    nikkah_counselling.push(jQuery(this).val()); 
    });
    var nikkah_counselling=nikkah_counselling.toString();

    // var entrepreneur_counselling   = $("#entrepreneur_counselling").val();
    
    var entrepreneur_counselling=[];
    jQuery.each(jQuery('.entrepreneur_counselling option:selected'), function() {
    entrepreneur_counselling.push(jQuery(this).val()); 
    });
    
    var entrepreneur_counselling=entrepreneur_counselling.toString();
    //var business_counselling     = $("#business_counselling").val();
    
    var business_counselling=[];
    jQuery.each(jQuery('.business_counselling option:selected'), function() {
    business_counselling.push(jQuery(this).val()); 
    });
    var business_counselling=business_counselling.toString();
    
    // var guide_for_skill_develop  =$("#guide_for_skill_develop").val();
    
    var guide_for_skill_develop=[];
    jQuery.each(jQuery('.guide_for_skill_develop option:selected'), function() {
    guide_for_skill_develop.push(jQuery(this).val()); 
    });
    var guide_for_skill_develop=guide_for_skill_develop.toString();
    
    
    //var rehabilitation_counselling    =$("#rehabilitation_counselling").val();
    
    var rehabilitation_counselling=[];
    jQuery.each(jQuery('.rehabilitation_counselling option:selected'), function() {
    rehabilitation_counselling.push(jQuery(this).val()); 
    });
    var rehabilitation_counselling=rehabilitation_counselling.toString();
    
    
    //var suffer_from_interest_loan      =$("#suffer_from_interest_loan").val();
    
    var suffer_from_interest_loan=[];
    jQuery.each(jQuery('.suffer_from_interest_loan option:selected'), function() {
    suffer_from_interest_loan.push(jQuery(this).val()); 
    });
    var suffer_from_interest_loan=suffer_from_interest_loan.toString();
    
    
    var guide_counselling_full_details      =$("#guide_counselling_full_details").val();
  var other_details_3       =$("#other_details_3").val();
  var sendInfo = {
    unique_no :unique_no, 
    user_id :user_id,
    family_counselling:family_counselling,
    nikkah_counselling:nikkah_counselling, 
    entrepreneur_counselling:entrepreneur_counselling,
    business_counselling:business_counselling,
    guide_for_skill_develop:guide_for_skill_develop,
    rehabilitation_counselling:rehabilitation_counselling,
    suffer_from_interest_loan:suffer_from_interest_loan,
    guide_counselling_full_details:guide_counselling_full_details,
    other_details_3:other_details_3,
    
  };
          $.ajax({
          url:FILE_PATH+'/survey5_model.php?action=update',
          type:'POST',
          data: sendInfo,
          timeout:60000,
  success:function(data)
      {   
       //alert(data);
        $("#previous_id").val('survey6.php');             
        $('#page_replace_div').load(FILE_PATH+"/survey6.php?unique_no="+unique_no+"&user_id="+user_id+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&completed_status="+completed_status);
       }
});
     
}
	
$(function () {

    //Initialize Select2 Elements

    $(".select2").select2();

	});	
		
</script>