<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
$sess_user_id = $_GET[ 'sess_user_id' ];
$sess_usertype_id = $_GET[ 'sess_usertype_id' ];
$country_id = $_GET['country_id'];
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id'];
$crt_month = date( 'Y-m' );
$current_date = date( 'Y-m-d' );
$unique_no=$_GET['unique_no'];
$user_id=$_GET['user_id'];
$completed_status=$_GET['completed_status'];
//echo "<br>";
//$unique_no='821441';



if($completed_status=='')
{
   
    $permission = $pdo_conn->prepare("SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."' and user_id='".$user_id."' and completed_status='0' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'");
}
else
{
   
    $permission = $pdo_conn->prepare("SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."' and user_id='".$user_id."' and completed_status='".$completed_status."' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'");
}

$permission->execute();
$survey3_records = $permission->fetch();
$old_age_pension=$survey3_records['old_age_pension'];
$deserted_women_pension=$survey3_records['deserted_women_pension'];
$marriage_help=$survey3_records['marriage_help'];
$disability_pension=$survey3_records['disability_pension'];
$widow_aged_welfare=$survey3_records['widow_aged_welfare'];
$destitute_orphan_welfare=$survey3_records['destitute_orphan_welfare'];
$incapable_of_working=$survey3_records['incapable_of_working'];
$ulama_welfare_card=$survey3_records['ulama_welfare_card'];
$other_details_1=$survey3_records['other_details_1'];


$survey_sub=$pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' and user_id='".$user_id."'");
$survey_sub->execute();
$survey2_sub=$survey_sub->fetchAll();
$not_null=0;
foreach($survey2_sub as $val)
{
$not_null='1';
}
          
//echo "survey3_records".$survey3_records['other_details_1_entry'];
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

<div class="wrapper homepage ">

<div class="head_line">
          <h5><span class="notranslate">Govt. / Other NGD'S Related Schemes</span> - <span class="tamil_font_small"> அரசு மற்றும் பிற நல  அமைப்பு சார்ந்த உதவிகள் </span></h5>
        </div>

<div class="sub_bg animated bounceInLeft">
  <div class="container">
    <div class="row">
      <div class="col-md-12 survey_content">
		  
        
		  
        <form class="login_form">
		<div class="table-responsive">
          <table class="table table-bordered gove_sche">
            <thead>
              <tr>
                <th width="5%"><span class="notranslate">No</span>.</th>
                <th width="80%"><span class="notranslate">Schemes/ </span>தேவைப்படுபவர்களின் விபரம் </th>
                <th width="35%"><span class="notranslate">S.No </span>/ வ.எண்</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1 </td>
                <td><span class="notranslate">Old Age Pension</span> / முதியோர் ஓய்வூதியம் </td>
                <td><select class="form-control serial_select_bg check_empt select2 old_age_pension" style="width:100%" id="old_age_pension" name="old_age_pension" multiple>
                    <option value=''><span >Select</span></option>
                    <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' and user_id='".$user_id."'"  );
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $exp=explode(',',$old_age_pension);
                    foreach($relationship_list as $value){
                      $explod_old=$exp[$j];
                    ?>
                
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$exp)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                    <?php
                    $i++;
                    $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              
             <!--  
            <tr>
                <td>1 </td>
                <td><span class="notranslate">Old Age Pension</span> / முதியோர் ஓய்வூதியம் </td>
                <td>
                    <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' and user_id='".$user_id."'"  and random_no!='' and family_head_name!='');
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    foreach($relationship_list as $value)
                    {?>
                        <label><input type="checkbox" value="<?php echo $value['family_head_name'] ?>" <?php if($value['family_head_name']==$old_age_pension) : ?>
                  checked="checked" <?php endif; ?> name="old_age_pension"> <?php echo $value['family_head_name'] ?></label>
                    <?php
                    $i++;
                    }
                    ?>
                 </td>
            </tr>-->
              
              
              <tr>
                <td>2 </td>
                <td><span class="notranslate">Deserted Women pension</span> / கணவரால் கைவிடப்பட்டோர் </td>
                <td><select class="form-control serial_select_bg check_empt select2 deserted_women_pension" style="width:100%" multiple id="deserted_women_pension" name="deserted_women_pension">
                    <option value=''>Select</option>
                    <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' and user_id='".$user_id."' and random_no!='' and family_head_name!=''");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $exp=explode(',',$deserted_women_pension);
                    foreach($relationship_list as $value){
                  $women_pen=$exp[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$exp)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                    <?php
                    $i++;
                    $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>3 </td>
                <td> <span class="notranslate">Marriage help </span>/ திருமண உதவி
                  <table class="nobg_table">
                    <tr>
                      <td><div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="marriage_help_msk" name="example" value="MSK"  <?php  if($survey3_records['marriage_help_radio']=='MSK') { ?> checked <?php } ?>>
                          <label class="custom-control-label pt-1" for="marriage_help_msk"><span class="notranslate">MSK</span> </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="marriage_help_gov" name="example" value="Goverment" <?php  if($survey3_records['marriage_help_radio']=='Goverment') { ?> checked <?php } ?>>
                          <label class="custom-control-label pt-1" for="marriage_help_gov">அரசு</label>
                        </div></td>
                    </tr>
                  </table></td>
                <td><select class="form-control serial_select_bg check_empt marriage_help select2" style="width:100%" multiple id="marriage_help"  name="marriage_help">
                    <option value=''><span class="notranslate">Select</span></option>
                     <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' and user_id='".$user_id."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $marr_exp=explode(',',$marriage_help);
                    foreach($relationship_list as $value){
                    $marriage_exp=$marr_exp[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$marr_exp)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>4 </td>
                <td><span class="notranslate">Disability Pension </span>/ ஊனமுற்றோருக்கான உதவி</td>
                <td><select class="form-control serial_select_bg check_empt disability_pension select2" style="width:100%" multiple id="disability_pension" name="disability_pension">
                    <option value=''><span class="notranslate">Select</span></option>
                    <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' and user_id='".$user_id."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $diab_exp=explode(',',$disability_pension);
                    foreach($relationship_list as $value){
                    $disablity_exp=$diab_exp[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$diab_exp)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>5 </td>
                <td><span class="notranslate">Widow / Aged unmarried welfare</span> / விதவை / முதிர்கன்னியருக்கான உதவி </td>
                <td><select class="form-control serial_select_bg check_empt select2 widow_aged_welfare" style="width:100%" multiple id="widow_aged_welfare" multiple name="widow_aged_welfare">
                    <option value=''><span class="notranslate">Select</span></option>
                   <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' and user_id='".$user_id."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expl=explode(',',$widow_aged_welfare);
                    foreach($relationship_list as $value){
                    $explode_widow=$expl[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expl)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>6 </td>
                <td><span class="notranslate">Destitute / Orphan welfare</span> / ஆதரவற்றோர் / அனாதைகளுக்கான உதவி</td>
                <td><select class="form-control serial_select_bg check_empt destitute_orphan_welfare select2" style="width:100%" multiple id="destitute_orphan_welfare" name="destitute_orphan_welfare">
                    <option value=''><span class="notranslate">Select</span></option>
                    <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' and user_id='".$user_id."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expl_rela=explode(',',$destitute_orphan_welfare);
                    foreach($relationship_list as $value){
                    $explo_dest=$expl_rela[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expl_rela)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
                <td>7 </td>
                <td><span class="notranslate">Incapable of working</span> / உழைக்க இயலாதவர்</td>
                <td><select class="form-control serial_select_bg check_empt incapable_of_working select2" style="width:100%" multiple id="incapable_of_working" name="incapable_of_working">
                    <option value=''><span class="notranslate">Select</span><span class="notranslate"></option>
                    <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' and user_id='".$user_id."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expl_inca=explode(',',$incapable_of_working);
                    foreach($relationship_list as $value){
                    $explo_inca=$expl_inca[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expl_inca)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                  </select></td>
              </tr>
              <tr>
              
              <td>8 </td>
              <td>
              
             <span class="notranslate"> Ulama welfare card</span> / உலமாக்கள் அட்டை
              <table class="nobg_table">
                <tr>
                  <td><input type="text" class="form-control" id="ulama_welfare_card_details" name="ulama_welfare_card_details" value="<?php echo $survey3_records['ulama_welfare_card_details'];  ?>"></td>
                </td>
                
                </tr>
                
              </table>
              </td>
              
            <td><select class="form-control serial_select_bg check_empt ulama_welfare_card select2" style="width:100%" multiple id="ulama_welfare_card" name="ulama_welfare_card">
                  <option value='' ><span class="notranslate">Select</span></option>
                   <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' and user_id='".$user_id."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expl_we=explode(',',$ulama_welfare_card);
                    foreach($relationship_list as $value){
                    $ex_wel=$expl_we[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expl_we)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                </select></td>
            </tr>
            <tr>
            
            <td>9 </td>
            <td>
            <span class="notranslate">Others </span>/ இதர உதவியின் விபரம்
            <table class="nobg_table">
              <tr>
                <td><input type="text" class="form-control check_empt" id="other_details_1_entry" name="other_details_1_entry" value="<?php echo $survey3_records['other_details_1_entry'];  ?>"></td>
              </td>
              
              </tr>
              
            </table>
            </td>
            
            <td>
            	<select class="form-control serial_select_bg check_empt other_details_1 select2" style="width:100%" multiple id="other_details_1" name="other_details_1">
                  <option value=''><span class="notranslate">Select</span></option>
                    <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' and user_id='".$user_id."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $explo_other=explode(',',$other_details_1);
                    foreach($relationship_list as $value){
                    $explde_oth=$explo_other[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$explo_other)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                    <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                </select>
            </td>
            </tr>
            </tbody>
            
          </table>
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
			      <a onClick="get_survey2_login_det('<?php echo $unique_no; ?>','<?php echo $user_id; ?>')">
                    <button type="button" class="btn btn-success back_btn"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i> <span class="notranslate">Back </span></button>
                </div>
                <div class="col-6">
                    <a onClick="get_survey4_login_det()">
						<button type="button" class="btn btn-success next_btn"><span class="notranslate"> Next</span> <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
					</a>
                </div>
				
            </div>
        </div>
    </div>
</div>









<script type="text/javascript">
function get_survey2_login_det(unique_no,user_id)
{	
        var user_id = '<?php echo $user_id ?>';
        var country_id ='<?php echo $country_id ?>';
        var state_id = '<?php echo $state_id ?>';
        var district_id = '<?php echo $district_id ?>';
        var city_id = '<?php echo $city_id ?>';
        var area_id =  '<?php echo $area_id ?>';
        var completed_status='<?php echo $completed_status ?>';
        $("#previous_id").val('survey2.php');             
        $('#page_replace_div').load(FILE_PATH+"/survey2.php?unique_no="+unique_no+"&user_id="+user_id+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&completed_status="+completed_status);
     
		 
}
  

</script> 
<script type="text/javascript">
function get_survey4_login_det()
{	
    var unique_no=$("#unique_no").val();
    var country_id ='<?php echo $country_id ?>';
    var state_id = '<?php echo $state_id ?>';
    var district_id = '<?php echo $district_id ?>';
    var city_id = '<?php echo $city_id ?>';
    var area_id =  '<?php echo $area_id ?>';
    var completed_status='<?php echo $completed_status ?>';
    var marriage_help_radio='';

  if($('#marriage_help_msk').is(':checked')) 
  { 
  var marriage_help_radio = $("#marriage_help_msk").val();
  //alert(marriage_help_radio);
  }
   if($('#marriage_help_gov').is(':checked')) 
  { 
    
  var marriage_help_radio = $("#marriage_help_gov").val();

  }
    //alert(marriage_help_radio);
  //var old_age_pension = $("#old_age_pension").val();
  
   var old_age_pension = [];
  
   jQuery.each(jQuery('.old_age_pension option:selected'), function() {
        old_age_pension.push(jQuery(this).val()); 
    });
   
    var old_age_pension=old_age_pension.toString();



  
  
  //var deserted_women_pension = $("#deserted_women_pension").val();
  
  var deserted_women_pension=[];
  
     jQuery.each(jQuery('.deserted_women_pension option:selected'), function() {
        deserted_women_pension.push(jQuery(this).val()); 
    });
   
    var deserted_women_pension=deserted_women_pension.toString();

  
//  var marriage_help   = $("#marriage_help").val();
  var marriage_help=[];
       jQuery.each(jQuery('.marriage_help option:selected'), function() {
        marriage_help.push(jQuery(this).val()); 
    });
   
    var marriage_help=marriage_help.toString();

  //var user_id   = $("#user_id").val();
  var disability_pension=[];
  
    jQuery.each(jQuery('.disability_pension option:selected'), function() {
        disability_pension.push(jQuery(this).val()); 
    });
   
    var disability_pension=disability_pension.toString();
  
  //var disability_pension     = $("#disability_pension").val();
  //var widow_aged_welfare  =$("#widow_aged_welfare").val();
  
    var widow_aged_welfare=[];
  
    jQuery.each(jQuery('.widow_aged_welfare option:selected'), function() {
        widow_aged_welfare.push(jQuery(this).val()); 
    });
   
    var widow_aged_welfare=widow_aged_welfare.toString();
  
  //var destitute_orphan_welfare    =$("#destitute_orphan_welfare").val();
  var destitute_orphan_welfare=[];
      jQuery.each(jQuery('.destitute_orphan_welfare option:selected'), function() {
        destitute_orphan_welfare.push(jQuery(this).val()); 
    });
   
    var destitute_orphan_welfare=destitute_orphan_welfare.toString();
  
  
 // var incapable_of_working      =$("#incapable_of_working").val();
  var incapable_of_working=[];
      jQuery.each(jQuery('.incapable_of_working option:selected'), function() {
        incapable_of_working.push(jQuery(this).val()); 
    });
   
    var incapable_of_working=incapable_of_working.toString();
  
  
  //var ulama_welfare_card      =$("#ulama_welfare_card").val();
  
  var ulama_welfare_card=[];
      jQuery.each(jQuery('.ulama_welfare_card option:selected'), function() {
        ulama_welfare_card.push(jQuery(this).val()); 
    });
   
    var ulama_welfare_card=ulama_welfare_card.toString();
  
 
  
  var ulama_welfare_card_details       =$("#ulama_welfare_card_details").val();
  //var other_details_1       =$("#other_details_1").val();
  
    var other_details_1=[];
      jQuery.each(jQuery('.other_details_1 option:selected'), function() {
        other_details_1.push(jQuery(this).val()); 
    });
   
    var other_details_1=other_details_1.toString();
  
  var other_details_1_entry   =$("#other_details_1_entry").val();
     var user_id = '<?php echo $user_id ?>';
  var sendInfo = {
    unique_no :unique_no, 
    user_id:user_id,
    old_age_pension:old_age_pension,
    deserted_women_pension:deserted_women_pension, 
    marriage_help:marriage_help,
    marriage_help_radio:marriage_help_radio,
    disability_pension:disability_pension,
    widow_aged_welfare:widow_aged_welfare,
    destitute_orphan_welfare:destitute_orphan_welfare,
    incapable_of_working:incapable_of_working,
    ulama_welfare_card:ulama_welfare_card,
    ulama_welfare_card_details:ulama_welfare_card_details,
    other_details_1:other_details_1,
    other_details_1_entry:other_details_1_entry, 
   
  };
          $.ajax({
          url:FILE_PATH+'/survey3_model.php?action=update',
          type:'POST',
          data: sendInfo,
          timeout:60000,
      success:function(data)
      {   
       // window.localStorage.setItem("unique_no",unique_no);
       // alert(data);
        $("#previous_id").val('survey4.php');             
        $('#page_replace_div').load(FILE_PATH+"/survey4.php?unique_no="+unique_no+"&user_id="+user_id+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&completed_status="+completed_status);
       }
});
		 
}
$(function () {

    //Initialize Select2 Elements

    $(".select2").select2();

	});

</script>