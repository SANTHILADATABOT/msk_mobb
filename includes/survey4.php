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
//$unique_no='623748';


if($completed_status=='')
{
    $permission = $pdo_conn->prepare("SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."' and user_id='".$user_id."' and completed_status='0' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'");
}
else
{
    $permission = $pdo_conn->prepare("SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."' and user_id='".$user_id."' and completed_status='".$completed_status."' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'");
}
$permission->execute();
$survey4_records = $permission->fetch();

$higher_edu_guide=$survey4_records['higher_edu_guide'];
$fin_support_for_edu=$survey4_records['fin_support_for_edu'];
$school_dropouts_interest_in_emp=$survey4_records['school_dropouts_interest_in_emp'];
$pre_matric_scholarship=$survey4_records['pre_matric_scholarship'];
$post_matric_scholarship=$survey4_records['post_matric_scholarship'];
$guide_for_emp=$survey4_records['guide_for_emp'];
$other_details_entry2=$survey4_records['other_details_entry2'];



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
          <h5>Education / Employment Related Services - <span class="tamil_font_small"> கல்வி மற்றும் வேலை சார்ந்த உதவிகள் </span></h5>
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
                <th width="80%">Schemes / தேவைப்படுபவர்களின் விபரம் </th>
                <th width="35%">S.No / வ.எண்</th>
              </tr>
            </thead>
            <tbody>
        <tr>
                <td>1 </td>               
                <td> Higher Education Guidance / மேற்படிப்பிற்கான வழிகாட்டுதல் </td>
                <td><select class="form-control serial_select_bg check_empt higher_edu_guide select2" style="width:100%" multiple id="higher_edu_guide" name="higher_edu_guide">
                    <option>Select</option>
                       <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expll=explode(',',$higher_edu_guide);
                    $expll1=[];
                    foreach($expll as $a)
                    {
                        $newString = preg_replace('/\s/', '', $a);
                        $expll1[]=$newString;
                    }
                    print_r($expll1);
                    foreach($relationship_list as $value){
                        $expld=$expll[$j];
                        
                      
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expll1)) {echo "Selected";}?> ><?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
             
              <tr>
                <td>2 </td>
                <td> Financial Support for Education / படிப்பதற்கு பொருளாதார உதவி </td>
                <td><select class="form-control serial_select_bgc check_empt fin_support_for_edu select2" style="width:100%" multiple id="fin_support_for_edu" name="fin_support_for_edu">
                    <option>Select</option>
                    <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expls=explode(',',$fin_support_for_edu);
                    foreach($relationship_list as $value){
                    $explr=$expls[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expls)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>3 </td>
                <td> School Dropouts Interested in Employment / படிப்பை தொடர முடியாமல் வேலைக்குச் செல்ல விருப்பமுள்ளவர்கள் </td>
                <td><select class="form-control serial_select_bg check_empt school_dropouts_interest_in_emp select2" style="width:100%" multiple id="school_dropouts_interest_in_emp" name="school_dropouts_interest_in_emp">
                    <option>Select</option>
                      <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $exple=explode(',',$school_dropouts_interest_in_emp);
                    foreach($relationship_list as $value){
                        $explc=$exple[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$exple)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>4 </td>
                <td>Pre-Matric Scholarship <br>
                  (1st to 10th standard)</td>
                <td><select class="form-control serial_select_bg check_empt select2 pre_matric_scholarship" style="width:100%" multiple id="pre_matric_scholarship" name="pre_matric_scholarship">
                    <option>Select</option>
                     <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $explod_sch=explode(',',$pre_matric_scholarship);
                    foreach($relationship_list as $value){
                    $expl_schol=$explod_sch[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$explod_sch)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>5 </td>
                <td>Post-Matric Scholarship <br>
                  (11th to Ph.D)</td>
                <td><select class="form-control serial_select_bg check_empt select2 post_matric_scholarship" style="width:100%" multiple id="post_matric_scholarship" name="post_matric_scholarship">
                    <option>Select</option>
                     <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expls=explode(',',$post_matric_scholarship);
                    foreach($relationship_list as $value){
                    $exploss=$expls[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expls)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>6 </td>
                <td>Guidance for Employment / வேலை வாய்ப்பிற்கான வழிகாட்டுதல் </td>
                <td><select class="form-control serial_select_bg check_empt guide_for_emp select2" style="width:100%" multiple id="guide_for_emp" name="guide_for_emp">
                    <option>Select</option>
                      <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expl_gu=explode(',',$guide_for_emp);
                    foreach($relationship_list as $value){
                    $explss=$expl_gu[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expl_gu)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
              
              <td>7 </td>
              <td>
              Others / இதர உதவியின் விபரம்
              <table class="nobg_table">
                <tr>
                  <td><input type="" class="form-control check_empt" id="other_details_2" name="other_details_2" value="<?php echo $survey4_records['other_details_2'] ?>"></td>
                </td>
                
                </tr>
                
              </table>
              </td>
              
            <td><select class="form-control serial_select_bg check_empt other_details_entry2 select2" style="width:100%" multiple id="other_details_entry2" name="other_details_entry2">
                  <option>Select</option>
                   <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expls_other=explode(',',$other_details_entry2);
                    foreach($relationship_list as $value){
                    $explds=$expls_other[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expls_other)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                </select></td>
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
					      <a onClick="get_survey3_login_det('<?php echo $unique_no; ?>','<?php echo $user_id; ?>')">
                            <button type="button" class="btn btn-success back_btn"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i> Back </button>
                        </div>
                        <div class="col-6">
                            <a onClick="get_survey4_login_det()">
								<button type="button" class="btn btn-success next_btn"> Next <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
							</a>
                        </div>
						
                    </div>
                </div>
            </div>
        </div>


<script type="text/javascript">
function get_survey3_login_det(unique_no,user_id)
{	
        var user_id = '<?php echo $user_id ?>';
        var country_id ='<?php echo $country_id ?>';
        var state_id = '<?php echo $state_id ?>';
        var district_id = '<?php echo $district_id ?>';
        var city_id = '<?php echo $city_id ?>';
        var area_id =  '<?php echo $area_id ?>';
        var completed_status='<?php echo $completed_status ?>';
		$("#previous_id").val('survey3.php');							
		$('#page_replace_div').load(FILE_PATH+"/survey3.php?unique_no="+unique_no+"&user_id="+user_id+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+'&completed_status='+completed_status);
}

</script> 
<script type="text/javascript">
function get_survey4_login_det()
{	

var unique_no=$("#unique_no").val();
//var user_id=$("#user_id").val();
    var user_id = '<?php echo $user_id ?>';
//var higher_edu_guide = $("#higher_edu_guide").val();

  var higher_edu_guide=[];
      jQuery.each(jQuery('.higher_edu_guide option:selected'), function() {
        higher_edu_guide.push(jQuery(this).val()); 
    });
   
    var higher_edu_guide=higher_edu_guide.toString();
  
 

var country_id ='<?php echo $country_id ?>';
var state_id = '<?php echo $state_id ?>';
var district_id = '<?php echo $district_id ?>';
var city_id = '<?php echo $city_id ?>';
var area_id =  '<?php echo $area_id ?>';
var completed_status='<?php echo $completed_status ?>';
//var fin_support_for_edu  = $("#fin_support_for_edu").val();
  
  var fin_support_for_edu=[];
      jQuery.each(jQuery('.fin_support_for_edu option:selected'), function() {
        fin_support_for_edu.push(jQuery(this).val()); 
    });
   
    var fin_support_for_edu=fin_support_for_edu.toString();
  
//  var school_dropouts_interest_in_emp= $("#school_dropouts_interest_in_emp").val();
  
    var school_dropouts_interest_in_emp=[];
      jQuery.each(jQuery('.school_dropouts_interest_in_emp option:selected'), function() {
        school_dropouts_interest_in_emp.push(jQuery(this).val()); 
    });
   
    var school_dropouts_interest_in_emp=school_dropouts_interest_in_emp.toString();
  
  //var pre_matric_scholarship= $("#pre_matric_scholarship").val();
  
      var pre_matric_scholarship=[];
      jQuery.each(jQuery('.pre_matric_scholarship option:selected'), function() {
        pre_matric_scholarship.push(jQuery(this).val()); 
    });
   
    var pre_matric_scholarship=pre_matric_scholarship.toString();
  
  //var post_matric_scholarship=$("#post_matric_scholarship").val();
  
      var post_matric_scholarship=[];
      jQuery.each(jQuery('.post_matric_scholarship option:selected'), function() {
        post_matric_scholarship.push(jQuery(this).val()); 
    });
   
    var post_matric_scholarship=post_matric_scholarship.toString();
  
 // var guide_for_emp=$("#guide_for_emp").val();
  
        var guide_for_emp=[];
      jQuery.each(jQuery('.guide_for_emp option:selected'), function() {
        guide_for_emp.push(jQuery(this).val()); 
    });
   
    var guide_for_emp=guide_for_emp.toString();
  
  
 var other_details_2=$("#other_details_2").val();
  
        var other_details_entry2=[];
      jQuery.each(jQuery('.other_details_entry2 option:selected'), function() {
        other_details_entry2.push(jQuery(this).val()); 
    });
   
    var other_details_entry2=other_details_entry2.toString();
  
  
 // var other_details_entry2=$("#other_details_entry2").val();
  
  var sendInfo = {
    unique_no :unique_no, 
    user_id :user_id,
    higher_edu_guide:higher_edu_guide,
    fin_support_for_edu:fin_support_for_edu, 
    school_dropouts_interest_in_emp:school_dropouts_interest_in_emp,
    pre_matric_scholarship:pre_matric_scholarship,
    post_matric_scholarship:post_matric_scholarship,
    guide_for_emp:guide_for_emp,
    other_details_2:other_details_2,
    other_details_entry2:other_details_entry2,
       
  };
   $.ajax({
          url:FILE_PATH+'/survey4_model.php?action=update',
          type:'POST',
          data: sendInfo,
          timeout:60000,
      success:function(data)
      {   
     //  window.localStorage.setItem("unique_no",unique_no);
        //alert(data);
        $("#previous_id").val('survey5.php');             
        $('#page_replace_div').load(FILE_PATH+"/survey5.php?unique_no="+unique_no+"&user_id="+user_id+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+'&completed_status='+completed_status);
       }
});
     
}
$(function () {

    //Initialize Select2 Elements

    $(".select2").select2();

	});		
</script>