<style>

.serial_no1 {
    margin-top: 25px;
    font-family: sans-serif;
    background-color: #edeef5;
    padding: 10px;
    border-radius: 66px;
    text-align: center;
    font-size: 17px;
    margin-bottom: 0px;
}

</style>

<script>
    function main_child_interest(res)
    {
        $('#main_hid_child').val(res)
    }
    
    function main_maqtab_interest(res)
    {
        $('#main_hid_maqtab').val(res)
    }
    
    function child_int_rad(res,sub_id)
{
    $('#chind_hid_box'+sub_id).val(res);
}
function maqtab_int_rad(res,sub_id)
{
    
    $('#maqtab_hid_box'+sub_id).val(res);
}
</script>
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
$user_id = $_GET['user_id'];
$user_type=$_GET['user_type'];
$country_id = $_GET['country_id']; 
$state_id = $_GET['state_id']; 
$district_id = $_GET['district_id']; 
$city_id = $_GET['city_id']; 
$area_id = $_GET['area_id']; 
$completed_status=$_GET['completed_status'];
$survey2=$pdo_conn->prepare("SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."' and user_id='".$user_id."' ");
$survey2->execute();
$survey2_records=$survey2->fetch();
$unique_no1=$survey2_records['unique_no'];
$survey_sub=$pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' and user_id='".$user_id."' ");
$survey_sub->execute();
$survey2_sub=$survey_sub->fetchAll();
$not_null=0;
foreach($survey2_sub as $val)
{
$not_null='1';
}
$res = $pdo_conn->prepare("SELECT COUNT(*) FROM fact_finding_subform  where random_no='".$_GET['unique_no']."' and user_id='".$user_id."'   ");
$res->execute();
$num_rows = $res->fetchColumn();

?>
<style>
	input.form-control { padding-left: 40px; }

</style>

<input type="hidden" id="unique_no" value="<?php echo $unique_no; ?>">
<input type="hidden" name="user_type" id="user_type" value="<?php echo $user_type; ?>">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" name="country_id" id="country_id" value="<?php echo $country_id;  ?>">
<input type="hidden" name="state_id" id="state_id" value="<?php echo $state_id;  ?>">
<input type="hidden" name="district_id" id="district_id" value="<?php echo $district_id;  ?>">
<input type="hidden" name="city_id" id="city_id" value="<?php echo $city_id;  ?>">
<input type="hidden" name="area_id" id="area_id" value="<?php echo $area_id;  ?>">




<?php
if($not_null=='0')
{
?>
<div class="wrapper homepage">
<div class="head_line">
<h5><span class="notranslate">Family Details </span>- <span class="tamil_font_small">குடும்ப விவரங்கள் </span> </h5>
</div>
<div class="sub_bg animated bounceInLeft">
  <div class="container">
      <!-----accordion----------->
        <div class="row ">
            
            <div class="col-md-12 survey_content" >
                </p>
                </div>
                <button class="accordion"><span> குடும்ப தலைவர்</span></button>
                <div class="panel">
                <p></p>
                </div>
            </div>
       
      <!-----accordion----------->
    <div class="row">
      <div class="col-md-12 survey_content" id='survey_content'> 
        <form class="login_form">
			<div id='loging_foirm' class='loging_foirm'>
          
          <div class="form-row">
            <div class="col-2">
              <h6 class="serial_no">1. </h6>
            </div>
            <div class="col-8 ">
              <label for="" class=""><span class="notranslate"> Name</span> / பெயர் </label>
              <i class="icon-user icons"></i>
              <input type="text" class="headmain_famhead form-control check_empt" name="family_head_name" id="family_head_name" value="<?php echo $survey2_records['family_head_name'] ;  ?>"placeholder="குடும்ப தலைவர் ">
            </div>
            <div class="col-2">
             
            </div>
          </div>
			
          <div class="col-md-12 nopadd" id='headfrm'>
			  
            <div class="form-row">
              <div class="col-6">
                <label for="sel2" class=""><span class="notranslate">Gender</span> / பாலினம் </label>
                <select class="form-control main_gen check_empt" id="gender">
                  <option value=""><span class="notranslate">Select</span></option>
                  <option value="M / ஆண்" <?php if($survey2_records['gender']=='M / ஆண்') {echo "Selected";}?>><span class="notranslate">M</span> / ஆண்</option>
                  <option value="F / பெண்" <?php if($survey2_records['gender']=='F / பெண்') {echo "Selected";}?>><span class="notranslate">F</span> / பெண்</option>
                </select>
              </div>
              <div class="col-6">
                <label for="sel2" class=""><span class="notranslate">Age</span> / வயது </label>
                
                  <input type="number" class="form-control main_age" id="age" value="<?php echo $survey2_records['age']; ?>"> 
                <!--<select class="form-control main_age check_empt" id="age">-->
                <!--  <option><span class="notranslate">Select</span></option>-->
                <!--  <?php for($i=1;$i<=100;$i++)  { ?>-->
                <!--    <option value="<?php echo $i ?>" <?php if($survey2_records['age']==$i) {echo "Selected";}?>><?php echo $i; ?></option>-->
                  
                <!--  <?php } ?>-->
                <!--</select>-->
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="sel2" class=""><span class="notranslate">Relationship</span> / உறவு முறை </label>
                <select class="form-control select2 rela_main check_empt" id="relationship">
                  <option value=""><span class="notranslate">Select</span></option>
                    <?php 
                    $relationship = $pdo_conn->prepare("SELECT * FROM relationship WHERE delete_status!='1'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    foreach($relationship_list as $value){?>
                      <option value="<?php echo $value['relationship_id']?>" <?php if($survey2_records['relationship']==$value['relationship_id']) {echo "Selected";}?>><?php echo $value['relationship_name']?></option>
                    <?php } ?>
                   
                </select>
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="" class=""><span class="notranslate">Educational Qualification</span> / கல்வி விபரம் </label>
<i class="fa fa-graduation-cap"></i>
                 <!--<select class="form-control select2 edu_main check_empt" id="edu_qualification" onchange='education(this.value,this.id)'>-->
                 <select class="form-control select2 edu_main check_empt" id="edu_qualification">
                  <option value=""><span class="notranslate">Select</span></option>
                    <?php 
                    $qualification = $pdo_conn->prepare("SELECT * FROM qualification WHERE delete_status!='1'");
                    $qualification->execute();
                    $qualification_list = $qualification->fetchall();
                    foreach($qualification_list as $qualifi){?>
                      <option value="<?php echo $qualifi['qualification_id']?>" <?php if($survey2_records['edu_qualification']==$qualifi['qualification_id']) {echo "Selected";}?>><?php echo $qualifi['qualification_name']?></option>
                    <?php } ?>
                   
                </select>
              <input type="text" class="form-control edu_main_ip check_empt" id="educ_qualification_inp" value="<?php echo $survey2_records['educ_qualification_inp']; ?>"> 
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-6">
                <label for="" class="two_hgt"><span class="notranslate">Marital Status</span> / நிக்காஹ்  விபரம் </label>
                  <i class="fa fa-heart"></i>
                  <select class="form-control main_marrial check_empt" id="marital_status" name="marital_status" >
                      <option value=''>Select</option>
              <option value='Married' <?php if($survey2_records['marital_status']=='Married'){ echo "Selected"; } ?>>Married</option>
              <option value='Unmarried' <?php if($survey2_records['marital_status']=='Unmarried'){ echo 'Selected';} ?>>Unmarried</option>
              </select>
              </div>
              <div class="col-6">
                <label for="" class="two_hgt"><span class="notranslate">Voter ID</span> / வாக்காளர் அட்டை </label>
<i class="fa fa-address-card-o"></i>
                <select class="form-control voter_ismain check_empt" id="voter_id" name="voter_id" onchange='voterfun(this.value,this.id)' >
                <option value="">Select</option>
                <option value="Yes / ஆம்" <?php if($survey2_records['voter_id']=='Yes / ஆம்') { echo "Selected"; } ?>>
                 <span class="notranslate">Yes </span>/ ஆம் </option>
                <option value="No / இல்லை"
                  <?php if($survey2_records['voter_id']=='No / இல்லை') { echo "Selected"; } ?>> <span
                    class="notranslate">No</span> / இல்லை </option>
                    </select>
                <input type="text" class="form-control main_vote_ip check_empt" id="voter_id_in" value="<?php echo $survey2_records['voter_id_in']; ?>">
              </div>
            </div>
			  
<div class="form-row">
<div class="col-6">
<label for="" class="two_hgt"><span class="notranslate">Aadhaar</span> / ஆதார் 
</label>
<i class="fa fa-address-card-o"></i>
                <select class="form-control aadharr_ismain check_empt" id="aadharr_id" name="aadharr_id" onchange='aadharrfun(this.value,this.id)' >
                <option value="">Select</option>
                <option value="Yes / ஆம்" <?php if($survey2_records['aadharr_id']=='Yes / ஆம்') { echo "Selected"; } ?>>
                 <span class="notranslate">Yes </span>/ ஆம் </option>
                <option value="No / இல்லை"
                  <?php if($survey2_records['aadharr_id']=='No / இல்லை') { echo "Selected"; } ?>> <span
                    class="notranslate">No</span> / இல்லை </option>
                    </select>
                <input type="text" class="form-control main_aadharr_ip" id="aadharr_id_in" >
              </div>
            </div>
            <div class="form-row">
              <div class="col-12">
                <label for="" class=""><span class="notranslate">Occupational Details/Education/</span>வேலை விபரம் /கல்வி</label>
              <i class="fa fa-briefcase"></i>
                <input type="text" class="form-control business_main check_empt" id="bussiness_occupation" value="<?php echo $survey2_records['bussiness_occupation']; ?>">
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-6">
                <label for="sel2" class="two_hgt"><span class="notranslate">Work Location</span> / வேலை செய்யுமிடம் </label>
                <i class="fa fa-map-marker"></i>

                <select class="form-control wrklo_main check_empt" id="work_location">
                  <option value=""><span class="notranslate">Select</span></option>
                  <option value="Local / உள்ளூர்" <?php if($survey2_records['work_location']=='Local / உள்ளூர்') {echo "Selected";}?>><span class="notranslate">Local </span>/ உள்ளூர்</option>
                  <option value="Out Station / வெளியூர்" <?php if($survey2_records['work_location']=='Out Station / வெளியூர்') {echo "Selected";}?>><span class="notranslate">Out Station</span> / வெளியூர்</option>
                  <option value="Foreign / வெளிநாடு" <?php if($survey2_records['work_location']=='Foreign / வெளிநாடு') {echo "Selected";}?>><span class="notranslate">Foreign </span>/ வெளிநாடு </option>
                </select>
              </div>
              <div class="col-6">
                 
                <label for="" class="two_hgt"> <span class="notranslate">Blood Group </span>/ இரத்த வகை </label>
<i class="fa fa-tint"></i>
                   <select class="form-control select2 boold_grpmain check_empt" id="blood_group">
                  <option value=""><span class="notranslate">Select</span></option>
                    <?php 
                    $blood_grp = $pdo_conn->prepare("SELECT * FROM blood_group");
                    $blood_grp->execute();
                    $blood_grp_list = $blood_grp->fetchall();
                    foreach($blood_grp_list as $blood){?>
                      <option value="<?php echo $blood['blood_id']?>" <?php if($blood['blood_id']==$survey2_records['blood_group']) {echo "Selected";}?>><?php echo $blood['blood_group_name']?></option>
                    <?php } ?>
                   
                </select>
             <!--   <input type="text" class="form-control"id="blood_group" value="<?php //echo $survey2_records['blood_group']; ?>">-->
              </div>
            </div>
			  
            <div class="form-row" style="display:none">
              <div class="col-12">
                <label for="sel2" class="small_margin_btm"><span class="notranslate">Children (Age 4 to 20) / Adults (Age Above 20) for Maktab </span>/ குர்ஆன் பாடசாலைக்கு வருகிறவரா? (குழந்தைகள் ( வயது 4 to 15 ), பெரியவர்கள்  ( 15 வயதுக்கு மேல்  )) </label>
                <p class="small_note"> </p>
                <div class="row">
                  <div class="col-4">
                    <select class="form-control chil_to_adumian check_empt" id="for_maktab">
                      <option value=""><span class="notranslate">Select</span></option>
                      <option value="Yes / ஆம்" <?php if($survey2_records['for_maktab']=='Yes / ஆம்') {echo "Selected";}?>><span class="notranslate">Yes</span> / ஆம்</option>
                      <option value="No / இல்லை" <?php if($survey2_records['for_maktab']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <select class="form-control chi_or_adu_main check_empt" id="child_adult_for_maktab">
                      <option value=""><span class="notranslate">Select</span></option>
                      <option value="Children / குழந்தைகள்" <?php if($survey2_records['child_adult_for_maktab']=='Children / குழந்தைகள்') {echo "Selected";}?>> <span class="notranslate">Children </span>/ குழந்தைகள் </option>
                      <option value="Adults / பெரியவர்கள்" <?php if($survey2_records['child_adult_for_maktab']=='Adults / பெரியவர்கள்') {echo "Selected";}?>><span class="notranslate">Adults</span> / பெரியவர்கள்</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <select class="form-control age_adu_main check_empt" id="child_adult_for_maktab_age">
                    <option><span class="notranslate">Age</span></option>
                    <option value="4" <?php if($survey2_records['child_adult_for_maktab_age']=='4') {echo "Selected";}?>>4</option>
                    <option value="5" <?php if($survey2_records['child_adult_for_maktab_age']=='5') {echo "Selected";}?>>5</option>
                    <option value="6" <?php if($survey2_records['child_adult_for_maktab_age']=='6') {echo "Selected";}?>>6</option>
                    <option value="7" <?php if($survey2_records['child_adult_for_maktab_age']=='7') {echo "Selected";}?>>7</option>
                    <option value="8" <?php if($survey2_records['child_adult_for_maktab_age']=='8') {echo "Selected";}?>>8</option>
                    <option value="9" <?php if($survey2_records['child_adult_for_maktab_age']=='9') {echo "Selected";}?>>9</option>
                    <option value="10" <?php if($survey2_records['child_adult_for_maktab_age']=='10') {echo "Selected";}?>>10</option>
                    <option value="11" <?php if($survey2_records['child_adult_for_maktab_age']=='11') {echo "Selected";}?>>11</option>
                    <option value="12" <?php if($survey2_records['child_adult_for_maktab_age']=='12') {echo "Selected";}?>>12</option>
                    <option value="13" <?php if($survey2_records['child_adult_for_maktab_age']=='13') {echo "Selected";}?>>13</option>
                    <option value="14" <?php if($survey2_records['child_adult_for_maktab_age']=='14') {echo "Selected";}?>>14</option>
                    <option value="15" <?php if($survey2_records['child_adult_for_maktab_age']=='15') {echo "Selected";}?>>15</option>
                    <option value="16" <?php if($survey2_records['child_adult_for_maktab_age']=='16') {echo "Selected";}?>>16</option>
                    <option value="17" <?php if($survey2_records['child_adult_for_maktab_age']=='17') {echo "Selected";}?>>17</option>
                    <option value="18" <?php if($survey2_records['child_adult_for_maktab_age']=='18') {echo "Selected";}?>>18</option>
                    <option value="19" <?php if($survey2_records['child_adult_for_maktab_age']=='19') {echo "Selected";}?>>19</option>
                    <option value="20" <?php if($survey2_records['child_adult_for_maktab_age']=='20') {echo "Selected";}?>>20</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
			  
            <div class="form-row" style="display:none">
              <div class="col-12">
                <label for="" class=""> <span class="notranslate">Why does he/she miss Maktab? </span> ஏன் வருவதில்லை? </label>
                <i class="icon-question icons "></i>
                <input type="text" class="form-control miss_mab_main check_empt"id="miss_maktab" value="<?php echo $survey2_records['miss_maktab']; ?>">
              </div>
            </div>
            
            
             <div class="form-group">
              <label for="">
                  <span class="notranslate">Children Interested in Makthab Madrasa (Age 4-15)</span> / மக்தப் மதரஸாவின் சேர்க்கவேண்டிய  மாணவ /மாணவிகள் (வயது 4-15) </label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" onclick="main_child_interest(this.value)" class="custom-control-input chck_box_val" id="child_interest_yes"
                  name="child_interest" value="Yes / ஆம்"
                  <?php if($survey2_records['child_interest']=="Yes / ஆம்") : ?> checked="checked"
                  <?php endif; ?>>
                <label class="custom-control-label pt-1" for="child_interest_yes"> <span
                    class="notranslate">Yes</span><span class="notranslate"> / ஆம்  </span></label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" onclick="main_child_interest(this.value)" class="custom-control-input chck_box_val" id="child_interest_no"
                  name="child_interest" value="No / இல்லை"
                  <?php if($survey2_records['child_interest']=="No / இல்லை") : ?> checked="checked"
                  <?php endif; ?>>
                <label class="custom-control-label pt-1" for="child_interest_no"> <span
                    class="notranslate">No</span> / இல்லை </label>
              </div>
              
<input type="hidden" name="main_hid_child" id="main_hid_child" class="main_hid_child">
            </div>
            
              <div class="form-group">
             <label for=""><span class="notranslate">Interested in Makthab Madrasa (Adult)</span> / மக்தப் மதரஸாவின் சேர விருப்பம் உள்ள  பெரியவர்கள்  </label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" onclick="main_maqtab_interest(this.value)" class="custom-control-input chck_box_val" id="maqtab_interest_yes"
                  name="maqtab_interest" value="Yes / ஆம்"
                  <?php if($survey2_records['maqtab_interest']=="Yes / ஆம்") : ?> checked="checked"
                  <?php endif; ?>>
                <label class="custom-control-label pt-1" for="maqtab_interest_yes"> <span
                    class="notranslate">Yes</span><span class="notranslate"> / ஆம்  </span></label>
              
                           
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" onclick="main_maqtab_interest(this.value)" class="custom-control-input chck_box_val" id="maqtab_interest_no"
                  name="maqtab_interest" value="No / இல்லை"
                  <?php if($survey2_records['maqtab_interest']=="No / இல்லை") : ?> checked="checked"
                  <?php endif; ?>>
                <label class="custom-control-label pt-1" for="maqtab_interest_no"> <span
                    class="notranslate">No</span> / இல்லை </label>
              </div>
              
               <input type="hidden" name="main_hid_maqtab"  class="main_hid_maqtab"  id="main_hid_maqtab">

            </div>
            
            <div class="form-row">
              <div class="col-12">
                <label for="sel2" class=""><span class="notranslate">Interested in Aalim Hifz Course</span> / அரபுக்  கல்லுரியில் இணைய விருப்பமா? </label>
                <select class="form-control interst_allin_main check_empt" id="allin_hifz_course">
                  <option value=""><span class="notranslate">Select</span></option>
                  <option value="Yes / ஆம்" <?php if($survey2_records['allin_hifz_course']=='Yes / ஆம்') {echo "Selected";}?>><span class="notranslate">Yes</span> / ஆம்</option>
                  <option value="No / இல்லை" <?php if($survey2_records['allin_hifz_course']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                </select>
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="" class=""> <span class="notranslate">Interested in Niswan</span> / நிஸ்வான்  மதரஸாவில்  இணைய விருப்பமா( மாணவிகள் )? </label>
                <select class="form-control insters_niswan_main check_empt" id="interest_in_niswan">
                  <option value="">Select</option>
                  <option value="Yes / ஆம்" <?php if($survey2_records['interest_in_niswan']=='Yes / ஆம்') { echo "Selected";}?>><span class="notranslate">Yes</span> / ஆம்</option>
                  <option value="No / இல்லை" <?php if($survey2_records['interest_in_niswan']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                </select>
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="sel2" class=""><span class="notranslate">Family Women interested in 1-year Muslim Course</span> / குடும்ப பெண்கள் மதரஸாவில்  இணைய விருப்பமா ? </label>
                <select class="form-control women_interst_main check_empt" id="family_women_interest_in_1yr_muslim_course">
                  <option value="">Select</option>
                  <option value="Yes / ஆம்" <?php if($survey2_records['family_women_interest_in_1yr_muslim_course']=='Yes / ஆம்') {echo "Selected";}?>><span class="notranslate">Yes </span><span class="notranslate">/ ஆம்</span></option>
                  <option value="No / இல்லை" <?php if($survey2_records['family_women_interest_in_1yr_muslim_course']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                </select>
              </div>
            </div>
			  
            <hr/>
          </div>
          </div>
		

			
     <div class="form-row family_member2" id='divfam0'>
            <div class="col-2">
              <h6 class="serial_no1" id='serial_no0'></h6>
            </div>
            <div class="col-8">
              <label for="" class=""><span class="notranslate"> Name </span>/ பெயர் </label>
              <i class="icon-user icons"></i>
              <input type="text" class="form-control fam_mee check_empt" id='family_mem0' value="" placeholder="குடும்ப உறுப்பினர் ">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-add"> <i class="icon-plus icon-plus1 icons" id='show_formcre0' onclick='show_formcre1(this.id)' ></i><i class='icon-minus icon-minus1 icons' id='0' onclick='main_remove_name(this.id)'></i></button>
            </div>
            
            <div class='form_crea' id='form_crea0'>
                <?php include('survey2_togg.php') ?>
          </div>
          </div>
   <div class="questions">
  
    

</div>
<div>
    <button id="addAccordion">Add Family Member</button>
</div>
<br />
			
</div>	
</form>

</div>
</div>
</div>
  <?php
  }
  if($not_null=='1')
{
?>
<div class="wrapper homepage">

<div class="head_line">

  

        <!--  <h5><span class="notranslate">Family Details </span>- <span class="tamil_font_small">குடும்ப விவரங்கள் </span> </h5>
-->        </div>
<div class="sub_bg animated bounceInLeft">
  <div class="container">
      <!-----accordion----------->
        <div class="row ">
            
            <div class="col-md-12 survey_content" >
    
                    
                    
                    
                </p>
                </div>
                <button class="accordion"><span> குடும்ப தலைவர்</span></button>
                <div class="panel">
                <p></p>
                </div>
            </div>
       
               
      <!-----accordion----------->
    <div class="row">

      <div class="col-md-12 survey_content" id='survey_content'> 
	  
        <form class="login_form">
             <?php
   $h=1;
   $id=1;
 
$survey_sub=$pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' and user_id='".$user_id."' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."' order by id asc");
$survey_sub->execute();
$survey2_sub=$survey_sub->fetchAll();
$store_id_edu=[];
$store_id_voter=[];
$total_id=[];
$non_edu=[];
$non_vote=[];
$non_aadhar=[];

foreach($survey2_sub as $val)
{
    
    if($h==1)
    {
    $first_id=$val[0]['id'];
    }
    $total_id[]=$val['id'];
   $count_mem=count($survey2_sub);
   $sub_id=$val['id'];

   
  ?>
			<div id='divform<?php echo $id ?>' class='loging_foirm'>
		<input type="hidden" class="form-control sub_id_val" name="sub_id_val" id="sub_id_val" value="<?php echo $sub_id;  ?>">
          <div class="form-row">
            <div class="col-2">
              <h6 class="serial_no"> <?php echo $h ?></h6>
            </div>
            <div class="col-8 ">
              <label for="" class=""><span class="notranslate"> Name</span> / பெயர் </label>
              <i class="icon-user icons"></i>
              
              <input type="text" class="form-control main_famhead fam_mee" name="family_head_name" id="family_head_name" value="<?php echo $val['family_head_name'] ;  ?>"placeholder="குடும்ப தலைவர் ">
            </div>
            <div class="col-2">
                        <button type="button" class="btn btn-add"> <i class="icon-plus icon-plus1 icons" id='show_formcre<?php echo $id ?>' onclick='show_formcre2(this.id)' ></i></button>
            <!-- <button type="button" class="btn btn-add"> <i class="icon-minus icons" id='0'  onclick='showandhide(this.id)'></i></button>-->
            </div>
          </div>
			
          <div class="col-md-12 nopadd" id='headfrm<?php echo $id ?>'>
           
            <div class="form-row">
              <div class="col-6">
                <label for="sel2" class=""><span class="notranslate">Gender</span> / பாலினம் </label>
                <select class="form-control gendercls" id="gender">
                  <option value=""><span class="notranslate">Select</span></option>
                  <option value="M / ஆண்" <?php if($val['gender']=='M / ஆண்') {echo "Selected";}?>><span class="notranslate">M</span> / ஆண்</option>
                  <option value="F / பெண்" <?php if($val['gender']=='F / பெண்') {echo "Selected";}?>><span class="notranslate">F</span> / பெண்</option>
                </select>
              </div>
              <div class="col-6">
                <label for="sel2" class=""><span class="notranslate">Age</span> / வயது </label>
                <input type="number" class="form-control updateagecls" id="age" value="<?php echo $val['age']; ?>"> 

              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="sel2" class=""><span class="notranslate">Relationship</span> / உறவு முறை </label>
                <select class="form-control select2 relationshpcls" id="relationship">
                  <option value=""><span class="notranslate">Select</span></option>
                    <?php 
                    $relationship = $pdo_conn->prepare("SELECT * FROM relationship WHERE delete_status!='1'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    foreach($relationship_list as $value){?>
                      <option value="<?php echo $value['relationship_id']?>" <?php if($val['relationship']==$value['relationship_id']) {echo "Selected";}?>><?php echo $value['relationship_name']?></option>
                    <?php } ?>
                   
                </select>
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="" class=""><span class="notranslate">Educational Qualification</span> / கல்வி விபரம் </label>
<i class="fa fa-graduation-cap"></i>

                 <select class="form-control select2 educls" id="edu_qualification" onchange="education1(this.value,'<?php echo $id ?>')">
                  <option value=""><span class="notranslate">Select</span></option>
                    <?php 
                    $qualification = $pdo_conn->prepare("SELECT * FROM qualification WHERE delete_status!='1'");
                    $qualification->execute();
                    $qualification_list = $qualification->fetchall();
                    foreach($qualification_list as $qualifi){?>
                      <option value="<?php echo $qualifi['qualification_id']?>" <?php if($val['edu_qualification']==$qualifi['qualification_id']) {echo "Selected";}?>><?php echo $qualifi['qualification_name']?></option>
                    <?php } ?>
                   
                </select>
                <?php 
                if($val['edu_qualification']=='3')
                {
                    $store_id_edu[]=$val['id'];
                }
                else
                {
                    $non_edu[]=$val['id'];
                }
                ?>
              <!--<input type="text" class="form-control educlsin" id="educ_qualification_inp" value="<?php //if($val['edu_qualification']==3) { echo $val['educ_qualification_inp']; } ?>"> -->
              <input type="text" class="form-control educlsin" id="educ_qualification_inp" value="<?php echo $val['educ_qualification_inp']; ?>"> 
              
             
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-6">
                <label for="" class="two_hgt"><span class="notranslate">Marital Status</span> / நிக்காஹ்  விபரம் </label>
 <i class="fa fa-heart"></i>                  <select class="form-control maritalcls" id="marital_status" name="marital_status" >
                      <option value=''>Select</option>
              <option value='Married' <?php if($val['marital_status']=='Married'){ echo "Selected"; } ?>>Married</option>
              <option value='Unmarried' <?php if($val['marital_status']=='Unmarried'){ echo 'Selected';} ?>>Unmarried</option>
              </select>
              <!--  <input type="text" class="form-control" id="marital_status" value="<?php echo $survey2_records['marital_status']; ?>">-->
              </div>
              <div class="col-6">
             <label for="" class="two_hgt"><span class="notranslate">Voter ID</span> / வாக்காளர் அட்டை </label> 	

                <i class="fa fa-address-card-o"></i>
                <select class="form-control votrcls" id="voter_id" name="voter_id" onchange="voterfun1(this.value,'<?php echo $id ?>')"
                <option value="">Select</option>
                <option value="Yes / ஆம்" <?php if($val['voter_id']=='Yes / ஆம்') { echo "Selected"; } ?>>
                 <span class="notranslate">Yes </span>/ ஆம் </option>
                <option value="No / இல்லை"
                  <?php if($val['voter_id']=='No / இல்லை') { echo "Selected"; } ?>> <span
                    class="notranslate">No</span> / இல்லை </option>
                    </select>
                    <?php
                    if($val['voter_id']=='Yes / ஆம்')
                    {
                      $store_id_voter[]=$val['id'];
                    }
                    else
                    {
                        $non_vote[]=$val['id'];
                    }
                    ?>
               
              
                
                
                  <input type="text" class="form-control votrcls_in" id="voter_id_in"    <?php  if($val['voter_id']!='No / இல்லை') { ?>value="<?php echo $val['voter_id_in']; ?>" <?php  } ?>   <?php  if($val['voter_id']=='No / இல்லை') { ?>style="display:none" <?php  } ?>>
             
              </div>
            </div>
            
            
            	  <div class="form-row">

            <div class="col-6">
<label for="" class="two_hgt"><span class="notranslate">Aadhaar No</span> / ஆதார் அட்டை எண்
</lable><i class="fa fa-address-card-o"></i>
                <select class="form-control aadharrcls" id="aadharr_id" name="aadharr_id" onchange='aadharrfun(this.value,this.id)' >
                <option value="">Select</option>
                <option value="Yes / ஆம்" <?php if($val['aadharr_id']=='Yes / ஆம்') { echo "Selected"; } ?>>
                 <span class="notranslate">Yes </span>/ ஆம் </option>
                <option value="No / இல்லை"
                  <?php if($val['aadharr_id']=='No / இல்லை') { echo "Selected"; } ?>> <span
                    class="notranslate">No</span> / இல்லை </option>
                    </select>
             <input type="text" class="form-control updateaadharr_in" id="aadharr_id_in"   <?php  if($valaadharr_id='No / இல்லை') { ?> value="<?php echo $val['aadharr_id_in']; ?>" <?php  } ?>   <?php  if($val['aadharr_id']=='No / இல்லை') { ?>style="display:none" <?php  } ?>>

              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
         <label for="" class=""><span class="notranslate">Occupational Details/Education/</span>வேலை விபரம் /கல்வி</label>           
              <i class="fa fa-briefcase"></i>
                <input type="text" class="form-control businesscls" id="bussiness_occupation" value="<?php echo $val['bussiness_occupation']; ?>">
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-6">
                <label for="sel2" class="two_hgt"><span class="notranslate">Work Location</span> / வேலை செய்யுமிடம் </label>
                <i class="fa fa-map-marker"></i>

                <select class="form-control wrklctcls" id="work_location">
                  <option value=""><span class="notranslate">Select</span></option>
                  <option value="Local / உள்ளூர்" <?php if($val['work_location']=='Local / உள்ளூர்') {echo "Selected";}?>><span class="notranslate">Local </span>/ உள்ளூர்</option>
                  <option value="Out Station / வெளியூர்" <?php if($val['work_location']=='Out Station / வெளியூர்') {echo "Selected";}?>><span class="notranslate">Out Station</span> / வெளியூர்</option>
                  <option value="Foreign / வெளிநாடு" <?php if($val['work_location']=='Foreign / வெளிநாடு') {echo "Selected";}?>><span class="notranslate">Foreign </span>/ வெளிநாடு </option>
                </select>
              </div>
              <div class="col-6">
                 
                <label for="" class="two_hgt"> <span class="notranslate">Blood Group </span>/ இரத்த வகை </label>
              <i class="fa fa-tint"></i>

                   <select class="form-control select2 blooddcls" id="blood_group">
                  <option value=""><span class="notranslate">Select</span></option>
                    <?php 
                    $blood_grp = $pdo_conn->prepare("SELECT * FROM blood_group");
                    $blood_grp->execute();
                    $blood_grp_list = $blood_grp->fetchall();
                    foreach($blood_grp_list as $blood){?>
                      <option value="<?php echo $blood['blood_id']?>" <?php if($blood['blood_id']==$val['blood_group']) {echo "Selected";}?>><?php echo $blood['blood_group_name']?></option>
                    <?php } ?>
                   
                </select>
             <!--   <input type="text" class="form-control"id="blood_group" value="<?php //echo $survey2_records['blood_group']; ?>">-->
              </div>
            </div>
			  
            <div class="form-row"  style="display:none">
              <div class="col-12">
                <label for="sel2" class="small_margin_btm"><span class="notranslate">Children (Age 4 to 20) / Adults (Age Above 20) for Maktab </span>/ குர்ஆன் பாடசாலைக்கு வருகிறவரா? (குழந்தைகள் ( வயது 4 to 15 ), பெரியவர்கள்  ( 15 வயதுக்கு மேல்  )) </label>
                <p class="small_note"> </p>
                <div class="row">
                  <div class="col-4">
                    <select class="form-control childcls" id="for_maktab">
                      <option value=""><span class="notranslate">Select</span></option>
                      <option value="Yes / ஆம்" <?php if($val['for_maktab']=='Yes / ஆம்') {echo "Selected";}?>><span class="notranslate">Yes</span> / ஆம்</option>
                      <option value="No / இல்லை" <?php if($val['for_maktab']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <select class="form-control adu_or_chicls" id="child_adult_for_maktab">
                      <option value=""><span class="notranslate">Select</span></option>
                      <option value="Children / குழந்தைகள்" <?php if($val['child_adult_for_maktab']=='Children / குழந்தைகள்') {echo "Selected";}?>> <span class="notranslate">Children </span>/ குழந்தைகள் </option>
                      <option value="Adults / பெரியவர்கள்" <?php if($val['child_adult_for_maktab']=='Adults / பெரியவர்கள்') {echo "Selected";}?>><span class="notranslate">Adults</span> / பெரியவர்கள்</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <select class="form-control age_chilcls" id="child_adult_for_maktab_age">
                    <option><span class="notranslate">Age</span></option>
                    <option value="4" <?php if($val['child_adult_for_maktab_age']=='4') {echo "Selected";}?>>4</option>
                    <option value="5" <?php if($val['child_adult_for_maktab_age']=='5') {echo "Selected";}?>>5</option>
                    <option value="6" <?php if($val['child_adult_for_maktab_age']=='6') {echo "Selected";}?>>6</option>
                    <option value="7" <?php if($val['child_adult_for_maktab_age']=='7') {echo "Selected";}?>>7</option>
                    <option value="8" <?php if($val['child_adult_for_maktab_age']=='8') {echo "Selected";}?>>8</option>
                    <option value="9" <?php if($val['child_adult_for_maktab_age']=='9') {echo "Selected";}?>>9</option>
                    <option value="10" <?php if($val['child_adult_for_maktab_age']=='10') {echo "Selected";}?>>10</option>
                    <option value="11" <?php if($val['child_adult_for_maktab_age']=='11') {echo "Selected";}?>>11</option>
                    <option value="12" <?php if($val['child_adult_for_maktab_age']=='12') {echo "Selected";}?>>12</option>
                    <option value="13" <?php if($val['child_adult_for_maktab_age']=='13') {echo "Selected";}?>>13</option>
                    <option value="14" <?php if($val['child_adult_for_maktab_age']=='14') {echo "Selected";}?>>14</option>
                    <option value="15" <?php if($val['child_adult_for_maktab_age']=='15') {echo "Selected";}?>>15</option>
                    <option value="16" <?php if($val['child_adult_for_maktab_age']=='16') {echo "Selected";}?>>16</option>
                    <option value="17" <?php if($val['child_adult_for_maktab_age']=='17') {echo "Selected";}?>>17</option>
                    <option value="18" <?php if($val['child_adult_for_maktab_age']=='18') {echo "Selected";}?>>18</option>
                    <option value="19" <?php if($val['child_adult_for_maktab_age']=='19') {echo "Selected";}?>>19</option>
                    <option value="20" <?php if($val['child_adult_for_maktab_age']=='20') {echo "Selected";}?>>20</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
			  
            <div class="form-row"  style="display:none">
              <div class="col-12">
                <label for="" class=""> <span class="notranslate">Why does he/she miss Maktab? </span> ஏன் வருவதில்லை? </label>
                <i class="icon-question icons "></i>
                <input type="text" class="form-control missclss"id="miss_maktab" value="<?php echo $survey2_records['miss_maktab']; ?>">
              </div>
            </div>
            
             <div class="form-group">
              <label for=""><span class="notranslate">Children Interested in Makthab Madrasa (Age 4-15)</span> / மக்தப் மதரஸாவின் சேர்க்கவேண்டிய  மாணவ /மாணவிகள் (வயது 4-15) </label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio"  onclick="child_int_rad(this.value,'<?php echo $sub_id?>');" class="custom-control-input chck_box_val" id="child_interest_yes<?php echo $sub_id?>"
                  name="child_interest<?php echo $sub_id?>" value="Yes / ஆம்"
                  <?php if($val['child_interest']=="Yes / ஆம்") : ?> checked="checked"
                  <?php endif; ?>>
                <label class="custom-control-label pt-1" for="child_interest_yes<?php echo $sub_id?>"> <span
                    class="notranslate">Yes</span><span class="notranslate"> / ஆம் </label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio"  onclick="child_int_rad(this.value,'<?php echo $sub_id?>');" class="custom-control-input chck_box_val" id="child_interest_no<?php echo $sub_id?>"
                  name="child_interest<?php echo $sub_id?>" value="No / இல்லை"
                  <?php if($val['child_interest']=="No / இல்லை") : ?> checked="checked"
                  <?php endif; ?>>
                <label class="custom-control-label pt-1" for="child_interest_no<?php echo $sub_id?>"> <span
                    class="notranslate">No</span> / இல்லை </label>
              </div>
                           <input type="hidden" name="chind_hid_box<?php echo $sub_id?>" id="chind_hid_box<?php echo $sub_id ?>" class="chind_hid_box" value="<?php echo $val['child_interest'];?>">

            </div>
              <div class="form-group">
               <label for=""><span class="notranslate">Interested in Makthab Madrasa (Adult)</span> / மக்தப் மதரஸாவின் சேர விருப்பம் உள்ள  பெரியவர்கள்  </label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio"  onclick="maqtab_int_rad(this.value,'<?php echo $sub_id?>');"  class="custom-control-input chck_box_val" id="maqtab_interest_yes<?php echo $sub_id?>"
                  name="maqtab_interest<?php echo $sub_id?>" value="Yes / ஆம்"
                  <?php if($val['maqtab_interest']=="Yes / ஆம்") : ?> checked="checked"
                  <?php endif; ?>>
                <label class="custom-control-label pt-1" for="maqtab_interest_yes<?php echo $sub_id?>"> <span
                    class="notranslate">Yes</span><span class="notranslate"> / ஆம் </label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" onclick="maqtab_int_rad(this.value,'<?php echo $sub_id?>');"  class="custom-control-input chck_box_val" id="maqtab_interest_no<?php echo $sub_id?>"
                  name="maqtab_interest<?php echo $sub_id?>" value="No / இல்லை"
                  <?php if($val['maqtab_interest']=="No / இல்லை") : ?> checked="checked"
                  <?php endif; ?>>
                <label class="custom-control-label pt-1" for="maqtab_interest_no<?php echo $sub_id?>"> <span
                    class="notranslate">No</span> / இல்லை </label>
              </div>
              
                <input type="hidden" name="maqtab_hid_box<?php echo $sub_id?>" id="maqtab_hid_box<?php echo $sub_id?>" class="maqtab_hid_box"  value="<?php echo $val['maqtab_interest'];?>">
>
            </div>
            
			  
            <div class="form-row">
              <div class="col-12">
                <label for="sel2" class=""><span class="notranslate">Interested in Aalim Hifz Course</span> / அரபுக்  கல்லுரியில் இணைய விருப்பமா? </label>
                <select class="form-control allin_hifzcls" id="allin_hifz_course">
                  <option value=""><span class="notranslate">Select</span></option>
                  <option value="Yes / ஆம்" <?php if($val['allin_hifz_course']=='Yes / ஆம்') {echo "Selected";}?>><span class="notranslate">Yes</span> / ஆம்</option>
                  <option value="No / இல்லை" <?php if($val['allin_hifz_course']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                </select>
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="" class=""> <span class="notranslate">Interested in Niswan</span> / நிஸ்வான்  மதரஸாவில்  இணைய விருப்பமா( மாணவிகள் )? </label>
                <select class="form-control niswancls" id="interest_in_niswan">
                  <option value="">Select</option>
                  <option value="Yes / ஆம்" <?php if($val['interest_in_niswan']=='Yes / ஆம்') { echo "Selected";}?>><span class="notranslate">Yes</span> / ஆம்</option>
                  <option value="No / இல்லை" <?php if($val['interest_in_niswan']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                </select>
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="sel2" class=""><span class="notranslate">Family Women interested in 1-year Muslim Course</span> / குடும்ப பெண்கள் மதரஸாவில்  இணைய விருப்பமா ? </label>
                <select class="form-control faml_wmcls" id="family_women_interest_in_1yr_muslim_course">
                  <option value="">Select</option>
                  <option value="Yes / ஆம்" <?php if($val['family_women_interest_in_1yr_muslim_course']=='Yes / ஆம்') {echo "Selected";}?>><span class="notranslate">Yes </span><span class="notranslate">/ ஆம்</option>
                  <option value="No / இல்லை" <?php if($val['family_women_interest_in_1yr_muslim_course']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                </select>
              </div>
            </div>
			  
            <hr/>
          </div>
          </div>
		
<?php
$h++;
$id++;
}
$store_id_edu=implode(',',$store_id_edu);
$store_id_voter=implode(',',$store_id_voter);
$total_id=implode(',',$total_id);
$non_edu=implode(',',$non_edu);
$non_vote=implode(',',$non_vote);

?>
			
     <div class="form-row family_member2" id='divfam0' >
            <div class="col-2">
              <h6 class="serial_no1" id='serial_no0'> </h6>
            </div>
            <div class="col-8">
              <label for="" class=""><span class="notranslate"> Name </span>/ பெயர் </label>
              <i class="icon-user icons"></i>
              <input type="text" class="form-control fam_mee" id='family_mem0' value="" placeholder="குடும்ப உறுப்பினர் ">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-add"> <i class="icon-plus icon-plus1 icons" id='show_formcre0' onclick='show_formcre1(this.id)' ></i>
              <i class='icon-minus icon-minus1 icons' id='0' ></i></button>
            </div>
            
            <div class='form_crea' id='form_crea0'>
                <?php include('survey2_togg.php') ?>
          </div>
          </div>
          
			
   <div class="questions">
  
    

</div>
<div>
    <button id="addAccordion">Add Family Member</button>
</div>
<br />
			
    		</div>	
        </form>
			  
      </div>

    </div>
  </div>
  
  
  
  
  
  <?php
}

  ?>
  

		<div class="footer">
            <div class="no-gutters">
                <div class="col-auto mx-auto">
                    <div class="row no-gutters justify-content-center">
					    <div class="col-6">
					      <a onClick="get_member_login_det('<?php echo $unique_no; ?>','<?php echo $user_id; ?>','<?php echo $user_type; ?>')">
                            <button type="button" class="btn btn-success back_btn"> <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i> <span class="notranslate">Back</span> </button>
                        </div>
                        <div class="col-6">
                           <?php
if($user_type=='volunteer')
          {
$place = $pdo_conn->prepare("SELECT * FROM  volunteer_otp WHERE user_id='".$user_id."' ");
$place->execute();
$result=$place->fetch();
if($result['complete_status']=='1')
{
          ?>
<a onClick="get_survey3_login_det('<?php echo $unique_no; ?>','<?php echo $user_id; ?>')">
             <button type="button" class="btn btn-success next_btn"> <span class="notranslate">Next</span> <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
          </a>
 <?php
 }
else
{
  ?>
    <!--<a onClick="get_survey3_login_det2( )">
     <button type="button" class="btn btn-success next_btn"> <span class="notranslate">Next</span> 
      <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
          </a>-->
          
    <a onClick="get_survey3_login_det('<?php echo $unique_no; ?>','<?php echo $user_id; ?>')">
     <button type="button" class="btn btn-success next_btn"> <span class="notranslate">Next</span> 
      <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
          </a>
<?php
}
}
else
{
 ?>
        <a onClick="get_survey3_login_det('<?php echo $unique_no; ?>','<?php echo $user_id; ?>')">
				<button type="button" class="btn btn-success next_btn"> <span class="notranslate">Next </span><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
							</a> 
              <?php
    }
            ?>
                        </div>
						
                    </div>
                </div>
            </div>
        </div></div>
<input type='hidden' id='count' name='count' >
<input type="hidden" id="serial_no_hidden" name="serial_no_hidden" value="<?php if($num_rows==0) { echo 2; } else  { echo $num_rows+1;} ?>">



<script type="text/javascript">


$.fn.reverseChildren = function() {
  return this.each(function(){
    var $this = $(this);
    $this.children().each(function(){
      $this.prepend(this);
    });
  });
};
$('.survey_content').reverseChildren();



 $('.form_crea').hide();
 $('.detail_frm').hide();
 $('#divfam0').hide();
$(document).ready(function() {
    varz=0;
    var notnul='<?php echo $not_null ?>';
   
    if(notnul==1)
    {
    var educa='<?php echo $store_id_edu ?>'.split(',');
    var voter='<?php echo $store_id_voter ?>'.split(',');
    var tot_id='<?php echo $total_id ?>'.split(',');
    var non_edu='<?php echo $non_edu ?>'.split(',');
    var non_vote='<?php echo $non_vote ?>'.split(',');
   
    for(var i=0;i<educa.length;i++)
    {
            $('#divform'+educa[i]+' input.educlsin').show();
    }
     for(var i=0;i<voter.length;i++)
    {
         $('#divform'+voter[i]+' input.votrcls_in').show();
    }
     for(var i=0;i<non_edu.length;i++)
    {
            $('#divform'+non_edu[i]+' input.educlsin').hide();
    }
     for(var i=0;i<non_vote.length;i++)
    {
         $('#divform'+non_vote[i]+' input.votrcls_in').hide();
    }
    }
   
<?php if($not_null=="1"){ ?>
    var j= parseInt("<?php echo $h; ?>")-1;
<?php  } else { ?>
    var j=1;
<?php  }  ?>

    //$( "button" ).button();
    $('#addAccordion').click( function(e) 
    {
       
        e.preventDefault();
        var j=$('#serial_no_hidden').val();
        var count_minus_button=$('#serial_no_hidden').val();
        for(z=1;z<count_minus_button;z++)
        {
        $('#'+z).removeAttr("style").hide();
        }
        
        $('.questions').append("<div class='form-row' id='divfam"+j+"' > <div class='col-2'> <h6 class='serial_no1' id='serial_no"+j+"'> "+j+"</h6> </div> <div class='col-8'> <label for='' class=''><span class='notranslate'> Name </span>/ பெயர் </label> <i class='icon-user icons'></i> <input type='text' class='form-control fam_mee' id='family_mem"+j+"' value='' placeholder='குடும்ப உறுப்பினர் '> </div> <div class='col-2'> <button type='button' class='btn btn-add'> <i class='icon-plus icon-plus1 icons' id='show_formcre"+j+"' onclick='show_formcre1(this.id)' ></i><i class='icon-minus icon-minus1 icons' id='"+j+"' onclick='remove_name(this.id)'></i></button> </div> <div class='form_crea' id='form_crea"+j+"'></div> </div>");
        
        $('#form_crea'+j).load(FILE_PATH+"/survey2_togg.php?j="+j);
        $('#form_crea'+j).hide();
        $('#count').val(j);
        j++;
        $('#serial_no_hidden').val(j)
        
    });
    
});
function serial_no(val)
{
    var main=$("input[type='text'].main_famhead").length;
    var sub=$("input[type='text'].fam_mee").length
    var tot=parseInt(main)+parseInt(sub);
}
       
function show_formcre1(id)
{
 
    var num=id.toString().replace(/\D/g, "");
    var cls_name=$('#show_formcre'+num).attr('class');
 
    if(cls_name=='icon-plus1 icons icon-minus' || cls_name=='icon-plus1 icons icon-minus' )
    {
        $('#form_crea'+num).hide();
        $('#show_formcre'+num).addClass('icon-plus');
        $('#show_formcre'+num).removeClass('icon-minus');
    }
    else if((cls_name=='icon-plus icon-plus1 icons')||(cls_name=='icon-plus1 icons icon-plus'))
    {
        $('#form_crea'+num).show();
        $('#show_formcre'+num).removeClass('icon-plus');
        $('#show_formcre'+num).addClass('icon-minus');
    }
    
    
    
}
function showandhide(id)
{
   
     var cls_name=$('#'+id).attr('class');
  
      if(cls_name=='icon-minus icons' || cls_name=='icons icon-minus')
    {
        $('#headfrm').hide();
        $('#'+id).addClass('icon-plus');
        $('#'+id).removeClass('icon-minus');
    }
    else if((cls_name=='icons icon-plus')||(cls_name=='icon-plus icons'))
    {
    
        $('#headfrm').show();
        $('#'+id).removeClass('icon-plus');
        $('#'+id).addClass('icon-minus');
     
    }
}
function remove_name(id)
{
   
    $("#divfam"+id).remove();

    
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

function main_remove_name(id)
{
   var sub_val_id=$("#sub_id_val").val();
        $("#divform"+sub_val_id).remove();
        var sendInfo='';
		$.ajax({
	    url:FILE_PATH+'/survey2_update.php?action=delete&id='+sub_val_id,
		type:'POST',
		data:sendInfo,
		timeout:60000,
		success:function(data)
		{
		//	alert(data);
		}				
		});	  
    
}


function updateremove_name(id)
{	
    
    var sub_val_id=$("#sub_id_val").val();
        $("#divform"+sub_val_id).remove();
        var sendInfo='';
		$.ajax({
	    url:FILE_PATH+'/survey2_update.php?action=delete&id='+sub_val_id,
		type:'POST',
		data:sendInfo,
		timeout:60000,
		success:function(data)
		{
$(".loging_foirm").load(".loging_foirm");
		
		}				
		});	

}
function remove_name1(id)
{	
    
    var sub_val_id=$("#sub_id_val").val();
        $("#divform"+sub_val_id).remove();
        var sendInfo='';
		$.ajax({
	    url:FILE_PATH+'/survey2_update.php?action=delete&id='+sub_val_id,
		type:'POST',
		data:sendInfo,
		timeout:60000,
		success:function(data)
		{
			//alert(data);
		
		}				
		});	

}

/*function remove_name1(id)
{
     $("#divform"+id).remove();
 
}*/
function show_formcre2(id)
{
    
      var num=id.toString().replace(/\D/g, "");
    var cls_name=$('#show_formcre'+num).attr('class');
 
    if(cls_name=='icon-plus1 icons icon-minus' ||cls_name=='icon-minus icons' )
    {
        $('#headfrm'+num).hide();
        $('#show_formcre'+num).addClass('icon-plus');
        $('#show_formcre'+num).removeClass('icon-minus');
    }
    else if((cls_name=='icon-plus icon-plus1 icons')||(cls_name=='icon-plus1 icons icon-plus'))
    {
    
        $('#headfrm'+num).show();
        $('#show_formcre'+num).removeClass('icon-plus');
        $('#show_formcre'+num).addClass('icon-minus');
     
    }
    
}
function get_member_login_det(unique_no,user_id,user_type)
{
         var user_id = '<?php echo $user_id ?>';
        var country_id ='<?php echo $country_id ?>';
        var state_id = '<?php echo $state_id ?>';
        var district_id = '<?php echo $district_id ?>';
        var city_id = '<?php echo $city_id ?>';
        var area_id =  '<?php echo $area_id ?>';
        var completed_status='<?php echo $completed_status ?>';
		$("#previous_id").val('survey1.php');							
		$('#page_replace_div').load(FILE_PATH+"/survey1.php?unique_no="+unique_no+"&user_id="+user_id+"&user_type="+user_type+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&completed_status="+completed_status);
}

</script> 
<script type="text/javascript">
function get_survey3_login_det(unique_no,user_id)
{	
    var not_null='<?php echo $not_null ?>';
    var id='<?php echo $id ?>';
    var first_id='<?php echo $first_id ?>';
    var country_id ='<?php echo $country_id ?>';
    var state_id = '<?php echo $state_id ?>';
    var district_id = '<?php echo $district_id ?>';
    var city_id = '<?php echo $city_id ?>';
    var area_id =  '<?php echo $area_id ?>';
    var completed_status='<?php echo $completed_status ?>';
    var count=$('#count').val();
    var general=[];
    var general_updt=[];
    var unique_no=$("#unique_no").val();
    var user_id =user_id;
    if(not_null=='1')
    {
        for(var i=1;i<=id;i++)
        {
            var gendercls=$("#divform"+i+" select.gendercls").val();
            var updateage=$("#divform"+i+" input.updateagecls").val();
            var relation=$("#divform"+i+" select.relationshpcls").val();
            var edu=$("#divform"+i+" select.educls").val();
            var sub_id=$("#divform"+i+" input.sub_id_val").val();
            var edu_in=$("#divform"+i+" input.educlsin").val();
            var mari_st=$("#divform"+i+" select.maritalcls").val();
            var voter=$("#divform"+i+" select.votrcls").val();
            var voter_in=$("#divform"+i+" input.votrcls_in").val();
            var busines=$("#divform"+i+" input.businesscls").val();
            var wrklt=$("#divform"+i+" select.wrklctcls").val();
            var blood=$("#divform"+i+" select.blooddcls").val();
            var childcls=$("#divform"+i+" select.childcls").val();
            var adu_or_chicls=$("#divform"+i+" select.adu_or_chicls").val();
            var age_chilcls=$("#divform"+i+" select.age_chilcls").val();
            var missclss=$("#divform"+i+" input.missclss").val();
            var allin_hifzcls=$("#divform"+i+" select.allin_hifzcls").val();
            var niswancls=$("#divform"+i+" select.niswancls").val();
            var faml_wmcls=$("#divform"+i+" select.faml_wmcls").val();
            var famil_head=$("#divform"+i+" input.fam_mee").val();
            var aadharr=$("#divform"+i+" select.aadharrcls").val();
            var aadharr_in=$("#divform"+i+" input.updateaadharr_in").val();
            var child_interest=$("#divform"+i+" input.chind_hid_box").val();
            var maqtab_interest=$("#divform"+i+" input.maqtab_hid_box").val();
            if(sub_id!=undefined)
            {
            var a=sub_id+'-'+user_id+'-'+unique_no+'-'+famil_head+'-'+gendercls+'-'+updateage+'-'+relation+'-'+edu+'-'+edu_in+'-'+mari_st+'-'+voter+'-'+voter_in+'-'+busines+'-'+wrklt+'-'+blood+'-'+childcls+'-'+adu_or_chicls+'-'+age_chilcls+'-'+missclss+'-'+allin_hifzcls+'-'+niswancls+'-'+faml_wmcls+'-'+aadharr+'-'+aadharr_in+'-'+child_interest+'-'+maqtab_interest;
            }
            
        
            general_updt.push(a);
        }
    }
   // alert(general_updt);
             
    if(count!='')
    {
        var i;
        for(var i=1;i<=count;i++)
        {

            var sub_form=1;
            var gendercls=$("#divfam"+i+" select.gendercls").val();
            var age=$("#divfam"+i+" input.agecls").val();
            console.log(age);
            var relation=$("#divfam"+i+" select.relationshpcls").val();
            var edu=$("#divfam"+i+" select.educls").val();
            var edu_in=$("#divfam"+i+" input.educlsin").val();
            var mari_st=$("#divfam"+i+" select.maritalcls").val();
            var voter=$("#divfam"+i+" select.togg_votrcls").val();
            var voter_in=$("#divfam"+i+" input.togg_votrcls_in").val();
            var busines=$("#divfam"+i+" input.businesscls").val();
            var wrklt=$("#divfam"+i+" select.wrklctcls").val();
            var blood=$("#divfam"+i+" select.blooddcls").val();
            var childcls=$("#divfam"+i+" select.childcls").val();
            // var adu_or_chicls=$("#divfam"+i+" select.adu_or_chicls").val();
            // var age_chilcls=$("#divfam"+i+" select.age_chilcls").val();
            // var missclss=$("#divfam"+i+" input.missclss").val();
            var allin_hifzcls=$("#divfam"+i+" select.allin_hifzcls").val();
            var niswancls=$("#divfam"+i+" select.niswancls").val();
            var faml_wmcls=$("#divfam"+i+" select.faml_wmcls").val();
             var famil_head=$("#divfam"+i+" input.fam_mee").val();
            // var aadharr=1;
            // var aadharr_in=1;
            var aadharr=$("#divfam"+i+" select.togg_aadharrcls").val();
            var aadharr_in=$("#divfam"+i+" input.togg_aadharrcls_in").val();
              var toggchild_interest=$("#toggchind_hid_box"+i).val();
            var toggmaqtab_interest=$("#toggmaqtab_hid_box"+i).val();
            


            if(famil_head!=undefined)
            {
                if(famil_head!='')
                {

                   //  var a=user_id+'-'+unique_no+'-'+famil_head+'-'+gendercls+'-'+age+'-'+relation+'-'+edu+'-'+edu_in+'-'+mari_st+'-'+voter+'-'+voter_in+'-'+busines+'-'+wrklt+'-'+blood+'-'+childcls+'-'+allin_hifzcls+'-'+niswancls+'-'+faml_wmcls;
                   
                   
             
                    
                     var a=user_id+'-'+unique_no+'-'+famil_head+'-'+gendercls+'-'+age+'-'+relation+'-'+edu+'-'+edu_in+'-'+mari_st+'-'+voter+'-'+voter_in+'-'+busines+'-'+wrklt+'-'+blood+'-'+childcls+'-'+adu_or_chicls+'-'+age_chilcls+'-'+missclss+'-'+allin_hifzcls+'-'+niswancls+'-'+faml_wmcls+'-'+aadharr+'-'+aadharr_in+'-'+country_id+'-'+state_id+'-'+district_id+'-'+city_id+'-'+area_id+'-'+toggchild_interest+'-'+toggmaqtab_interest;
                    general.push(a);
                }
            }
        }
    }
    else
    {
        var sub_form=0;
        var a='';
        general.push(a);
    }
            
    var unique_no=$("#unique_no").val();
    var user_type=$("#user_type").val();
    var user_id =user_id;
    var gendermain=$("#survey_content select.main_gen").val();
    var age_main=$("#survey_content input.main_age").val();
    var relation_main=$("#survey_content select.rela_main").val();
    var edu_main=$("#survey_content select.edu_main").val();
    var edu_in_main=$("#survey_content input.edu_main_ip").val();
    var mari_st_main=$("#survey_content select.main_marrial").val();
    var voter_main=$("#survey_content select.voter_ismain").val();
    var voter_in_main=$("#survey_content input.main_vote_ip").val();
    var busines_main=$("#survey_content input.business_main").val();
    var wrklt_main=$("#survey_content select.wrklo_main").val();
    var blood_main=$("#survey_content select.boold_grpmain").val();
    var childcls_main=$("#survey_content select.chil_to_adumian").val();
    var adu_or_chicls_main=$("#survey_content select.chi_or_adu_main").val();
    var age_chilcls_main=$("#survey_content select.age_adu_main").val();
    var missclss_main=$("#survey_content input.miss_mab_main").val();
    var allin_hifzcls_main=$("#survey_content select.interst_allin_main").val();
    var niswancls_main=$("#survey_content select.insters_niswan_main").val();
    var faml_wmcls_main=$("#survey_content select.women_interst_main").val();
     var famil_head_main=$("#survey_content input.headmain_famhead").val();
    var aadharr_main=$("#survey_content select.aadharr_ismain").val();
    var aadharr_in_main=$("#survey_content input.main_aadharr_ip").val();
    var child_interest = $("#survey_content input.main_hid_child").val();
    var maqtab_interest =$("#survey_content input.main_hid_maqtab").val();




    var sendInfo = {
                unique_no :unique_no,
                user_id :user_id,
                user_type:user_type,
                gendermain:gendermain,
                age:age_main,
                relation_main:relation_main,
                edu_main:edu_main,
                edu_in_main:edu_in_main,
                mari_st_main:mari_st_main,
                voter_main:voter_main,
                voter_in_main:voter_in_main,
                busines_main:busines_main,
                wrklt_main:wrklt_main,
                blood_main:blood_main,
                childcls_main:childcls_main,
                adu_or_chicls_main:adu_or_chicls_main,
                age_chilcls_main:age_chilcls_main,
                missclss_main:missclss_main,
                allin_hifzcls_main:allin_hifzcls_main,
                niswancls_main:niswancls_main,
                faml_wmcls_main:faml_wmcls_main,
                famil_head_main:famil_head_main,
                aadharr_main:aadharr_main,
                aadharr_in_main:aadharr_in_main,
                country_id:country_id,
                child_interest:child_interest,
                maqtab_interest:maqtab_interest,

                };
                if(not_null=='0')
                {
                    sendInfo=sendInfo;
                }
                else if(not_null=='1')
                {
                    sendInfo='';
                }
                
         //  alert(general);

    $.ajax({
        url:FILE_PATH+'/survey2_update.php?action=update&general='+general+'&sub_form='+sub_form+'&not_null='+not_null+'&general_updt='+general_updt+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&user_id='+user_id+'&unique_no='+unique_no+'&famil_head_main='+famil_head_main+'&age='+age+'&relation_main='+relation_main+'&edu_main='+edu_main+'&edu_in_main='+edu_in_main+'&gendermain='+gendermain+'&faml_wmcls_main='+faml_wmcls_main,
        type:'GET',
        data: sendInfo,
        timeout:60000,
        success:function(data)
        {

if(data!=0)
{

            window.localStorage.setItem("unique_no",unique_no);
            $("#previous_id").val('survey3.php');							
            $('#page_replace_div').load(FILE_PATH+"/survey3.php?unique_no="+unique_no+"&user_id="+user_id+"&user_type="+user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&completed_status='+completed_status);
}
else
{
    alert("Add Atleast One Family Member");
}
        }
    });
}

function get_survey3_login_det2()
{
    var unique_no=$("#unique_no").val();
    var sendInfo = {
        unique_no :unique_no, 
    };
    $.ajax({
        url:FILE_PATH+'/delete.php?action=delete',
        type:'POST',
        data: sendInfo,
        timeout:60000,
        success:function(data)
        { 
        
        $("#previous_id").val('volunteer_login.php');             
        $('#page_replace_div').load(FILE_PATH+'/volunteer_login.php');
        }    
    });
}

var edu=$('#edu_qualification').val();
var voter=$('#voter_id').val();
var aadharr=$('#aadharr_id').val();
education(edu,id);
voterfun(voter,id);
education1(edu,id);
voterfun1(voter,id);
aadharrerfun1(aadharr,id);

function education(val,id)
{
    var num=id.toString().replace(/\D/g, "");
    if(num=='')
    {
        if(val=='3')
        {
            $('#educ_qualification_inp').show();
        }
        else
        {
            $('#educ_qualification_inp').hide();
        }
    }
    if(num!='')
    {
        if(val=='3')
        {
          $('#divfam'+num+' input.educlsin').show();
        }
        else
        {
          $('#divfam'+num+' input.educlsin').hide();
        }
    }
}
 function aadharrfun(val,id)
{
    var num=id.toString().replace(/\D/g, "");
      if(num=='')
      {
        if(val=='Yes / ஆம்')
        {

            $('.updateaadharr_in').show();
           $('.main_aadharr_ip').show();

            
            
        }
        else
        {
            $('.updateaadharr_in').hide();
                       $('.main_aadharr_ip').hide();

        }
      }
      if(num!='')
      {
          if(val=='Yes / ஆம்')
        {
            $('.updateaadharr_in').show();
                                   $('.main_aadharr_ip').show();

        }
        else
        {
            $('.updateaadharr_in').hide();
                                   $('.main_aadharr_ip').hide();

        }
      }
}

function voterfun(val,id)
{
    var num=id.toString().replace(/\D/g, "");
    
      if(num=='')
      {
        if(val=='Yes / ஆம்')
        {
            $('#voter_id_in').show();
        }
        else
        {
            $('#voter_id_in').hide();
           $('#voter_id_in').val('');

        }
      }
      if(num!='')
      {
          if(val=='Yes / ஆம்')
        {
               $('#divfam'+num+' input.votrcls_in').show();
        }
        else
        {
               $('#divfam'+num+' input.votrcls_in').hide();
               $('#divfam'+num+' input.votrcls_in').val('');

        }
      }
}
 function toggaadharrfun(val,id)
{
    var num=id.toString().replace(/\D/g, "");
      if(num=='')
      {
        if(val=='Yes / ஆம்')
        {

            $('.togg_aadharrcls_in').show();
        }
        else
        {
            $('.togg_aadharrcls_in').hide();
            $('.togg_aadharrcls_in').val('');

        }
      }
      if(num!='')
      {
          if(val=='Yes / ஆம்')
        {

            $('.togg_aadharrcls_in').show();
        }
        else
        {

            $('.togg_aadharrcls_in').hide();
           $('.togg_aadharrcls_in').val('');

        }
      }
}


function toggvoterfun(val,id)
{
    
    var num=id.toString().replace(/\D/g, "");

      if(num=='')
      {
        if(val=='Yes / ஆம்')
        {
            $('.togg_votrcls_in').show();
        }
        else
        {
            $('.togg_votrcls_in').hide();
          $('.togg_votrcls_in').val('');

        }
      }
      if(num!='')
      {
          if(val=='Yes / ஆம்')
        {
            $('.togg_votrcls_in').show();
        }
        else
        {
            $('.togg_votrcls_in').hide();
            $('.togg_votrcls_in').val('');

        }
      }
}


function education1(val,id)
{
     
    if(val=='3')
    {
        $('#headfrm'+id+' input.educlsin').show();
    }
    else
    {
        $('#headfrm'+id+' input.educlsin').hide();
       
    }
}
function voterfun1(val,id)
{

    if(val=='Yes / ஆம்')
    {
        $('#headfrm'+id+' input.votrcls_in').show();
       // $('#voter_id_in').show();
    }
    else
    {
        $('#headfrm'+id+' input.votrcls_in').hide();
        //$('#voter_id_in').hide();
    }
}
function aadharrerfun1(val,id)
{

    if(val=='Yes / ஆம்')
    {
        $('#headfrm'+id+' input.aadharrcls_in').show();
       // $('#voter_id_in').show();
    }
    else
    {
        $('#headfrm'+id+' input.aadharrcls_in').hide();
        //$('#voter_id_in').hide();
    }
}


</script>
<!-----accordion script----------->
<script>
/*var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}


*/


</script>
<!-----accordion script----------->