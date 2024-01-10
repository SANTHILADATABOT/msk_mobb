
  
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
$h=1;
$id=1;

if($completed_status=='')
{
$permission = $pdo_conn->prepare("SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."' and user_id='".$user_id."' and completed_status='0'and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'");
}
else
{
    $permission = $pdo_conn->prepare("SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."' and user_id='".$user_id."' and completed_status='".$completed_status."'and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'");
}
$permission->execute();
$survey6_records = $permission->fetch();
$pre_survey_sub=$pdo_conn->prepare("SELECT * From fact_family_disease  where unique_no='".$_GET['unique_no']."' and user_id='".$user_id."' ");
$pre_survey_sub->execute();
$survey6_sub=$pre_survey_sub->fetchAll();
$not_null=0;
foreach($survey6_sub as $val)
{
$not_null='1';
}
$res_disease = $pdo_conn->prepare("SELECT COUNT(*) FROM fact_family_disease  where unique_no='".$_GET['unique_no']."' and user_id='".$user_id."'   ");
$res_disease->execute();
$num_rows = $res_disease->fetchColumn();
// echo "notnull".$not_null;
?>
<style>
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
<input type='text' id='count' name='count' >
<input type="hidden" id="serial_no_hidden" name="serial_no_hidden" value="<?php if($num_rows==0) { echo 2; } else  { echo $num_rows+1;} ?>">

<div class="wrapper homepage ">
		<div class="head_line">
          <h5>Health Related Services - <span class="tamil_font_small">மருத்துவ உதவிகள் </span></h5>
        </div>

<div class="sub_bg animated bounceInLeft">
  <div class="container">
    <div class="row">
      <div class="col-md-12 survey_content" id='survey_content'>
       
                    <!-----Insert start----------->
<?php if($not_null==0) {?>
        <form class="login_form bor-over">
          <div class="form-row topbtm">
            <div class="col-9">
              <label for="" class="two_hgt"> Disease / நோயின் விபரம் </label>
              <i class="icon-notebook icons"></i>
              <input type="text" class="form-control check_empt" id="disease_details">
            </div>
            <div class="col-3" style="display:none">
              <label for="" class="two_hgt">S.No / வ.எண் </label>
              <select class="form-control serial_select_bg check_empt disease_no select2" multiple id="disease_no" style="width:100%">
                <option>Select</option>
               <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' order by id asc");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expl_dis=explode(',',$disease_no);
                    foreach($relationship_list as $value){
                    $expl_diss=$expl_dis[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expl_dis)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
              </select>
            </div>
          </div>
           <form class="login_form bor-over">
          <div class="form-row topbtm smspace">
            <div class="col-9">
              <label for="" class="three_hgt">Monthly Expenditure on Medicine / மாதாந்திர மருத்துவச்  செலவு</label>
              <i class="icon-event icons"></i>
              <input type="text" class="form-control check_empt" id="mon_exp_on_medicine">
            </div>
            <div class="col-3">
              <label for="" class="three_hgt">S.No / வ.எண் </label>
              <select class="form-control serial_select_bg check_empt mon_exp_on_medicine_no select2" multiple id="mon_exp_on_medicine_no" style="width:100%">
                <option>Select</option>
                <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' order by id asc");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $explo_mon=explode(',',$mon_exp_on_medicine);
                    foreach($relationship_list as $value){
                    $expl_mon=$explo_mon[$j];
                    ?>
                    <option value='<?php echo $value['id'] ?>'<?php if(in_array($value['id'],$explo_mon)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
              </select>
            </div>
          </div>
        </form>
		    <form class="login_form bor-over">
          <div class="form-row topbtm">
            <div class="col-9">
              <label for="" class="three_hgt">Surgery Details (Hospital Cost, Cash in Hand) / அறுவை சிகிச்சையின் விபரம் </label>
              <i class="icon-notebook icons"></i>
              <input type="text" class="form-control check_empt" id="surgery_details">
            </div>
            <div class="col-3">
              <label for="" class="three_hgt">S.No / வ.எண் </label>
              <select class="form-control serial_select_bg check_empt surgery_details_no select2" multiple id="surgery_details_no" style="width:100%">
                <option>Select</option>
                 <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' order by id asc");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $explode_sn=explode(',',$surgery_details_no);
                    foreach($relationship_list as $value){
                    $explode_sn1=$explode_sn[$j];
                    ?>
                    <option value='<?php echo $value['id'] ?>'<?php if(in_array($value['id'],$explode_sn)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
              </select>
            </div>
          </div></form><?php } ?>

           <!------------------------------------update start----------->

       <?php if($not_null=='1') {

$togg_survey_sub_disease=$pdo_conn->prepare("SELECT * From fact_family_disease  where unique_no='".$_GET['unique_no']."' and user_id='".$user_id."' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."' ");
$togg_survey_sub_disease->execute();
$survey6_sub_disease=$togg_survey_sub_disease->fetchAll();


foreach($survey6_sub_disease as $val_disease)
{
    
   
  ?>
        <div class="form-row" id='update_togg_divfam<?php echo $id ?>' >
        <form class="login_form bor-over">
          <div class="form-row topbtm">
                <div class="form-row">
              <h6 class="serial_no"> <?php echo $h ?></h6>
            </div>
            <div class="col-9">
              <label for="" class="two_hgt"> Disease / நோயின் விபரம் </label>
              <i class="icon-notebook icons"></i>
              
              <input type="hidden" name="updatesub_id" id="updatesub_id" class="updatesub_id"  value="<?php echo $val_disease[disease_id];?>">
              <input type="text" class="form-control check_empt update_disease_details_cls" id="update_disease_details" value="<?php echo $val_disease['disease_details'];?>">
            </div>
            
            <div class="col-3" style="display:none">
              <label for="" class="two_hgt">S.Nossss / வ.எண் </label>
              <select class="form-control serial_select_bg check_empt update_disease_no_cls select2" multiple id="update_disease_no" style="width:100%">
                <option>Select</option>
               <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' order by id asc");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expl_dis=explode(',',$disease_no);
                    foreach($relationship_list as $value){
                    $expl_diss=$expl_dis[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expl_dis)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
              </select>
            </div>
          </div>
           <form class="login_form bor-over">
          <div class="form-row topbtm smspace">
            <div class="col-9">
              <label for="" class="three_hgt">Monthly Expenditure on Medicine / மாதாந்திர மருத்துவச்  செலவு</label>
              <i class="icon-event icons"></i>
              <input type="text" class="form-control check_empt update_mon_exp_on_medicine_cls" id="update_mon_exp_on_medicine" value="<?php echo $val_disease['mon_exp_on_medicine'];?>">
              
              
            </div>
            <div class="col-3">
              <label for="" class="three_hgt">S.No / வ.எண் </label>
              <select class="form-control serial_select_bg check_empt update_mon_exp_on_medicine_no_cls select2" multiple id="update_mon_exp_on_medicine_no" style="width:100%">
                <option>Select</option>
              
                <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' order by id asc");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $explo_mon=explode(',',$val_disease[mon_exp_on_medicine_no]);
                    foreach($relationship_list as $value){
                    $expl_mon=$explo_mon[$j];
                    ?>
                    <option value='<?php echo $value['id'] ?>'<?php if(in_array($value['id'],$explo_mon)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
              </select>
            </div>
          </div>
        </form>
		    <form class="login_form bor-over">
          <div class="form-row topbtm">
            <div class="col-9">
              <label for="" class="three_hgt">Surgery Details (Hospital Cost, Cash in Hand) / அறுவை சிகிச்சையின் விபரம் </label>
              <i class="icon-notebook icons"></i>
              <input type="text" class="form-control check_empt update_surgery_details_cls" id="update_surgery_details" value="<?php echo $val_disease['surgery_details'];?>">
            </div>
            <div class="col-3">
                  
              <label for="" class="three_hgt">S.No / வ.எண் </label>
              <select class="form-control serial_select_bg check_empt update_surgery_details_no_cls select2" multiple id="update_surgery_details_no" style="width:100%">
                <option>Select</option>
                
               
                 <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' order by id asc");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $explode_sn=explode(',',$val_disease[surgery_details_no]);
                    foreach($relationship_list as $value){
                    $explode_sn1=$explode_sn[$j];
                    ?>
                    <option value='<?php echo $value['id'] ?>'<?php if(in_array($value['id'],$explode_sn)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
              </select>
            </div>
          </div></form></div>
          <?php 
           $h++;
         $id++;
          }
         
          } ?>


 
             <!-----accordion form start----------->
           
            <div class="form-row" id='togg_divfam0' >
            <div class="col-2">
              <h6 class="serial_no1" id='serial_no0'> </h6>
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-add"> <i class="icon-plus icon-plus1 icons" id='show_formcre0' onclick='show_formcre1(this.id)' ></i>
              <i class='icon-minus icon-minus1 icons' id='0' ></i></button>
            </div>
            <div class='form_crea' id='form_crea0'>
                <?php include('survey6_togg.php') ?>
          </div> </div>
          <div class="questions">
          </div>
          <div>
           <button id="diseases_addAccordion" ><b>Add Diseases Of Family Member</b></button>
             </div>
            <!-----accordion form end----------->
            <form class="login_form bor-over">
          <div class="form-row topbtm smspace">
            <div class="col-12">
              <label for="" class="">Have you recoverd from any chronic diseases? If yes, Details of Doctor & Cost of treatment (This is for Guiding others) / ஏதேனும் நாட்பட்ட நோய்லிருந்து நீங்கள் மீண்டிருக்கிறீர்களா? ஆம், என்றால் மருத்துவர் விவரங்கள் மற்றும் சிகிச்சை செலவு (இது மற்றவர்களுக்கு வழிகாட்டும்) </label>
              <textarea class="form-control text_area_radius check_empt" rows="5" id="recovered_from_chronic_details" name="recovered_from_chronic_details"><?php echo $survey6_records['recovered_from_chronic_details']; ?></textarea>
            </div>
          </div>
        </form>
       
        <form class="login_form bor-over">
          <div class="form-group smspace">
            <label for=""> Availability of Govt.Health Insurance Card? / மருத்துவக் காப்பீட்டுத் திட்ட அடையாள அட்டை உள்ளதா ? </label>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input " id="customRadio" name="example" value="Yes"<?php  if($survey6_records['govt_insurance_card_avail']=='Yes') { ?> checked <?php } ?>>
              <label class="custom-control-label pt-1" for="customRadio">Yes / ஆம் </label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="No" <?php  if($survey6_records['govt_insurance_card_avail']=='No') { ?> checked <?php } ?>>
              <label class="custom-control-label pt-1" for="customRadio2">No / இல்லை </label>
            </div>
          </div>
        </form>
			  
      </div>
    </div>
  </div>
</div>
</div>

		<div class="footer">
            <div class="no-gutters">
                <div class="col-auto mx-auto">
                    <div class="row no-gutters justify-content-center">
					    <div class="col-6">
					      <a onClick="get_survey5_login_det('<?php echo $unique_no; ?>','<?php echo $user_id; ?>')">
                            <button type="button" class="btn btn-success back_btn"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i> Back </button>
                        </div>
                        <div class="col-6">
                            <a onClick="get_survey7_login_det();disease_toggle_login_det('<?php echo $unique_no; ?>','<?php echo $user_id; ?>');">
								<button type="button" class="btn btn-success next_btn"> Next <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
							</a>
                        </div>
						
                    </div>
                </div>
            </div>
        </div>




<script type="text/javascript">
function get_survey5_login_det(unique_no,user_id)
{	
        var user_id = '<?php echo $user_id ?>';
        var country_id ='<?php echo $country_id ?>';
        var state_id = '<?php echo $state_id ?>';
        var district_id = '<?php echo $district_id ?>';
        var city_id = '<?php echo $city_id ?>';
        var area_id =  '<?php echo $area_id ?>';
        var completed_status='<?php echo $completed_status ?>';
		$("#previous_id").val('survey5.php');							
		$('#page_replace_div').load(FILE_PATH+"/survey5.php?unique_no="+unique_no+"&user_id="+user_id+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&completed_status="+completed_status);
}

</script> 
<script type="text/javascript">
function get_survey7_login_det()
{	
    var country_id ='<?php echo $country_id ?>';
    var state_id = '<?php echo $state_id ?>';
    var district_id = '<?php echo $district_id ?>';
    var city_id = '<?php echo $city_id ?>';
    var area_id =  '<?php echo $area_id ?>';
    var unique_no=$("#unique_no").val();
    var user_id = '<?php echo $user_id ?>';
    var disease_details = $("#disease_details").val();
     var disease_no=[];
    jQuery.each(jQuery('.disease_no option:selected'), function() {
    disease_no.push(jQuery(this).val()); 
    });
    var disease_no=disease_no.toString();
    
  
  var surgery_details = $("#surgery_details").val();
  var completed_status='<?php echo $completed_status ?>';
  //var surgery_details_no = $("#surgery_details_no").val();
       var surgery_details_no=[];
    jQuery.each(jQuery('.surgery_details_no option:selected'), function() {
    surgery_details_no.push(jQuery(this).val()); 
    });
    var surgery_details_no=surgery_details_no.toString();
   
  var recovered_from_chronic_details  =$("#recovered_from_chronic_details").val();
  var mon_exp_on_medicine    =$("#mon_exp_on_medicine").val();
  //var mon_exp_on_medicine_no      =$("#mon_exp_on_medicine_no").val();
         var mon_exp_on_medicine_no=[];
    jQuery.each(jQuery('.mon_exp_on_medicine_no option:selected'), function() {
    mon_exp_on_medicine_no.push(jQuery(this).val()); 
    });
    
 var mon_exp_on_medicine_no=mon_exp_on_medicine_no.toString();    
  var govt_insurance_card_avail='';
  
  if($('#customRadio').is(':checked')) 
  { 
    
  var govt_insurance_card_avail = $("#customRadio").val();
 

  }
   if($('#customRadio2').is(':checked')) 
  { 
    
  var govt_insurance_card_avail = $("#customRadio2").val();

  }
    if((disease_details!='')||(surgery_details!='')||(surgery_details_no!='')||(mon_exp_on_medicine!='')||(mon_exp_on_medicine_no!='')||(disease_details!='undefined')||(surgery_details!='undefined')||(surgery_details_no!='undefined')||(mon_exp_on_medicine!='undefined')||(mon_exp_on_medicine_no!='undefined'))
    {
    var sendInfo = {
    unique_no :unique_no, 
    user_id :user_id,
    disease_details:disease_details,
    disease_no:disease_no, 
    surgery_details:surgery_details,
    surgery_details_no:surgery_details_no,
    recovered_from_chronic_details:recovered_from_chronic_details,
    mon_exp_on_medicine:mon_exp_on_medicine,
    mon_exp_on_medicine_no:mon_exp_on_medicine_no,
    govt_insurance_card_avail:govt_insurance_card_avail,
    country_id:country_id,
    state_id:state_id,
    district_id:district_id,
    city_id:city_id,
    area_id:area_id,

   
  };
          $.ajax({
          url:FILE_PATH+'/survey6_model.php?action=update',
          type:'POST',
          data: sendInfo,
          timeout:60000,
          success:function(data)
      {   
        $("#previous_id").val('survey7.php');             
        $('#page_replace_div').load(FILE_PATH+"/survey7.php?unique_no="+unique_no+"&user_id="+user_id+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&completed_status="+completed_status);
       }
});
     
}
}
// 	 $(function () {
//     //Initialize Select2 Elements
//     $(".select2").select2();

// 	});	 
	var j=0;
	
	$(document).ready(function() 
{
$('#diseases_addAccordion').click( function(e) 
    {
        e.preventDefault();
        var j=$('#serial_no_hidden').val();
        var count_minus_button=$('#serial_no_hidden').val();
        for(z=1;z<count_minus_button;z++)
        {
        $('#'+z).removeAttr("style").hide();
        }
      $('.questions').append("<div class='form-row' id='togg_divfam"+j+"' > <div class='col-2'> <h6 class='serial_no1' id='serial_no"+j+"'> "+j+"</h6> </div> <div class='col-8'>   <button type='button' class='btn btn-add'> <i class='icon-plus icon-plus1 icons' id='show_formcre"+j+"' onclick='show_formcre1(this.id)' ></i><i class='icon-minus icon-minus1 icons' id='"+j+"' onclick='remove_name(this.id)'></i></button> </div> <div class='form_crea' id='form_crea"+j+"'></div> </div>");
        
       var unique_no= $("#unique_no").val();
        $('#form_crea'+j).load(FILE_PATH+"/survey6_togg.php?unique_no="+unique_no);
        $('#form_crea'+j).hide();
        $('#count').val(j);
        j++;
        $('#serial_no_hidden').val(j)
        
    });
    
 });

function show_formcre1(id)
{
    var num=id.toString().replace(/\D/g, "");
    var cls_name=$('#show_formcre'+num).attr('class');
 
    if(cls_name=='icon-plus1 icons icon-minus' || cls_name=='icon-plus1 icons icon-minus' )
    {
        $('#form_crea'+num).hide();
        $('#show_formcre'+num).removeClass('icon-minus');
    }
    else 
    {
        $('#form_crea'+num).show();
    }
    
    
    
}

function remove_name(id)
{
   
$("#togg_divfam"+id).remove();
var get_val_name= $('#serial_no_hidden').val();
var count_tot=parseInt(get_val_name)-1;
$('#serial_no_hidden').val(count_tot);
var s_no_get=parseInt(count_tot)-1;
for(z=1;z<s_no_get;z++)
        {
        $('#'+z).removeAttr("style").hide();
        }
        $('#'+s_no_get).removeAttr("style").show();

}

 $('.form_crea').hide();
 $('#togg_divfam0').hide()


		
</script>

  <script type="text/javascript">
function disease_toggle_login_det(unique_no,user_id)
{	
    var not_null='<?php echo $not_null ?>';
    var id='<?php echo $num_rows ?>';
    var country_id ='<?php echo $country_id ?>';
    var state_id = '<?php echo $state_id ?>';
    var district_id = '<?php echo $district_id ?>';
    var city_id = '<?php echo $city_id ?>';
    var area_id =  '<?php echo $area_id ?>';
    var completed_status='<?php echo $completed_status ?>';
    var count=$('#count').val();
    var unique_no=$("#unique_no").val();
    var user_id =user_id;
    var general=[]; 
    var general_updt=[];


   if(count!='')
    {
        var i;
        for(var i=1;i<=count;i++)
        {
            
            var sub_form=1;
            var toggle_disease_details=$("#togg_divfam"+i+" input.toggle_disease_details_cls").val();
            var toggle_mon_exp_on_medicine=$("#togg_divfam"+i+" input.toggle_mon_exp_on_medicine_cls").val();
            var toggle_mon_exp_on_medicine_no=$("#togg_divfam"+i+" select.toggle_mon_exp_on_medicine_no_cls").val();
            var toggle_surgery_details_no=$("#togg_divfam"+i+" select.surgery_details_no_cls").val();
             var surgery_details=$("#togg_divfam"+i+" input.surgery_detailscls").val();
              

if(toggle_disease_details!='undefined')
{
    var a=user_id+'-'+unique_no+'-'+toggle_disease_details+'-'+toggle_mon_exp_on_medicine+'-'+toggle_mon_exp_on_medicine_no+'-'+toggle_surgery_details_no+'-'+surgery_details+"@@@";
}
         general.push(a);

        }
    }
    else
    {
        var sub_form=0;
        var a='';
        general.push(a);
    }
    
     if(not_null=='1')
    {
        for(var i=1;i<=id;i++)
        {

            var sub_form=1;
            var toggle_disease_details=$("#update_togg_divfam"+i+" input.update_disease_details_cls").val();
            var toggle_mon_exp_on_medicine=$("#update_togg_divfam"+i+" input.update_mon_exp_on_medicine_cls").val();
            var toggle_mon_exp_on_medicine_no=$("#update_togg_divfam"+i+" select.update_mon_exp_on_medicine_no_cls").val();
            var toggle_surgery_details_no=$("#update_togg_divfam"+i+" select.update_surgery_details_no_cls").val();
             var surgery_details=$("#update_togg_divfam"+i+" input.update_surgery_details_cls").val();
            var update_sub_id=$("#update_togg_divfam"+i+" input.updatesub_id").val();


    var a=user_id+'-'+unique_no+'-'+toggle_disease_details+'-'+toggle_mon_exp_on_medicine+'-'+toggle_mon_exp_on_medicine_no+'-'+toggle_surgery_details_no+'-'+surgery_details+'-'+update_sub_id+'@@@';
  
            general_updt.push(a);
        }
    }
    
                var sendInfo=1;

     $.ajax({
        url:FILE_PATH+'/survey6_togg_model.php?action=update&general='+general+'&sub_form='+sub_form+'&not_null='+not_null+'&general_updt='+general_updt+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&user_id='+user_id+'&unique_no='+unique_no,
        type:'GET',
        data: sendInfo,
        timeout:60000,
        success:function(data)
        {
           // alert(data);
            window.localStorage.setItem("unique_no",unique_no);
            $("#previous_id").val('survey5.php');							
            $('#page_replace_div').load(FILE_PATH+"/survey7.php?unique_no="+unique_no+"&user_id="+user_id+"&user_type="+user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&completed_status='+completed_status);

        }
    });
}

		
</script>
