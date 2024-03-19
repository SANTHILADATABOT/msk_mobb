	<?php include( "dbConnect.php" ); 
	$get_snoo=$_GET[j];
	?>
	<div id='loging_foirm' class='loging_foirm'>
          <div class="container">

			
          <div class="col-md-12 nopadd">
			  
            <div class="form-row">
              <div class="col-6">
                <label for="sel2" class=""><span class="notranslate">Gender</span> / பாலினம் </label>
                <select class="form-control gendercls" id="gender">
                  <option value=""><span class="notranslate">Select</span></option>
                  <option value="M / ஆண்" <?php if($survey2_records['gender']=='M / ஆண்') {echo "Selected";}?>><span class="notranslate">M</span> / ஆண்</option>
                  <option value="F / பெண்" <?php if($survey2_records['gender']=='F / பெண்') {echo "Selected";}?>><span class="notranslate">F</span> / பெண்</option>
                </select>
              </div>
              <div class="col-6">
                <label for="sel2" class=""><span class="notranslate">Age</span> / வயது </label>
               
               
                <input type="number" class="form-control agecls" id="age" value="<?php echo $survey2_records['age']; ?>"> 
              
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
                      <option value="<?php echo $value['relationship_id']?>" <?php if($survey2_records['relationship']==$value['relationship_id']) {echo "Selected";}?>><?php echo $value['relationship_name']?></option>
                    <?php } ?>
                   
                </select>
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="" class=""><span class="notranslate">Educational Qualification</span> / கல்வி விபரம் </label>
<i class="fa fa-graduation-cap"></i>

                 <select class="form-control select2 educls" id="edu_qualification" onchange='education(this.value,this.id)'>
                  <option value=""><span class="notranslate">Select</span></option>
                    <?php 
                    $qualification = $pdo_conn->prepare("SELECT * FROM qualification WHERE delete_status!='1'");
                    $qualification->execute();
                    $qualification_list = $qualification->fetchall();
                    foreach($qualification_list as $qualifi){?>
                      <option value="<?php echo $qualifi['qualification_id']?>" <?php if($survey2_records['edu_qualification']==$qualifi['qualification_id']) {echo "Selected";}?>><?php echo $qualifi['qualification_name']?></option>
                    <?php } ?>
                   
                </select>
              <input type="text" class="form-control educlsin" id="educ_qualification_inp" value="<?php echo $survey2_records['educ_qualification_inp']; ?>"> 
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-6">
                <label for="" class="two_hgt"><span class="notranslate">Marital Status</span> / நிக்காஹ்  விபரம் </label>
    <i class="fa fa-heart"></i>
                  <select class="form-control maritalcls" id="marital_status" name="marital_status" >
                      <option value="">Select</option>
              <option value='Married' <?php if($survey2_records['marital_status']=='Married'){ echo "Selected"; } ?>>Married</option>
              <option value='Unmarried' <?php if($survey2_records['marital_status']=='Unmarried'){ echo 'Selected';} ?>>Unmarried</option>
              </select>
              <!--  <input type="text" class="form-control" id="marital_status" value="<?php echo $survey2_records['marital_status']; ?>">-->
              </div>
              <div class="col-6">
                <label for="" class="two_hgt"><span class="notranslate">Voter ID</span> / வாக்காளர் அட்டை </label>
                <i class="fa fa-address-card-o"></i>
                <select class="form-control togg_votrcls" id="togg_voter_id" name="togg_voter_id" onchange='toggvoterfun(this.value,this.id)' >
                <option value="">Select</option>
                <option value="Yes / ஆம்" <?php if($survey2_records['voter_id']=='Yes / ஆம்') { echo "Selected"; } ?>>
                 <span class="notranslate">Yes </span>/ ஆம் </option>
                <option value="No / இல்லை"
                  <?php if($survey2_records['voter_id']=='No / இல்லை') { echo "Selected"; } ?>> <span
                    class="notranslate">No</span> / இல்லை </option>
                    </select>
                <input type="text" class="form-control togg_votrcls_in" id="togg_voter_id_in" value="<?php echo $survey2_records['voter_id_in']; ?>">
              </div>
            </div>
            
            
                        <div class="form-row">

            <div class="col-6">
<label for="" class="two_hgt"><span class="notranslate">Aadhaar</span> /ஆதார்
</lable><i class="fa fa-address-card-o"></i>
                <select class="form-control togg_aadharrcls" id="togg_aadharr_id" name="togg_aadharr_id" onchange='toggaadharrfun(this.value,this.id)' >
                <option value="">Select</option>
                <option value="Yes / ஆம்" <?php if($survey2_records['aadharr_id']=='Yes / ஆம்') { echo "Selected"; } ?>>
                 <span class="notranslate">Yes </span>/ ஆம் </option>
                <option value="No / இல்லை"
                  <?php if($survey2_records['aadharr_id']=='No / இல்லை') { echo "Selected"; } ?>> <span
                    class="notranslate">No</span> / இல்லை </option>
                    </select>
                <input type="text" class="form-control togg_aadharrcls_in" id="togg_aadharr_id_in" value="<?php echo $survey2_records['aadharr_id_in']; ?>">
              </div>
            </div></div>
			  
            <div class="form-row">
              <div class="col-12">
                 <label for="" class=""><span class="notranslate">Occupational Details/Education/</span>வேலை விபரம் /கல்வி</label>
              <i class="fa fa-briefcase"></i>
                <input type="text" class="form-control businesscls" id="bussiness_occupation" value="<?php echo $survey2_records['bussiness_occupation']; ?>">
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-6">
                <label for="sel2" class="two_hgt"><span class="notranslate">Work Location</span> / வேலை செய்யுமிடம் </label>
               <i class="fa fa-map-marker"></i>

                <select class="form-control wrklctcls" id="work_location">
                  <option value=""><span class="notranslate">Select</span></option>
                  <option value="Local / உள்ளூர்" <?php if($survey2_records['work_location']=='Local / உள்ளூர்') {echo "Selected";}?>><span class="notranslate">Local </span>/ உள்ளூர்</option>
                  <option value="Out Station / வெளியூர்" <?php if($survey2_records['work_location']=='Out Station / வெளியூர்') {echo "Selected";}?>><span class="notranslate">Out Station</span> / வெளியூர்</option>
                  <option value="Foreign / வெளிநாடு" <?php if($survey2_records['work_location']=='Foreign / வெளிநாடு') {echo "Selected";}?>><span class="notranslate">Foreign </span>/ வெளிநாடு </option>
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
                    <select class="form-control childcls" id="for_maktab">
                      <option value=""><span class="notranslate">Select</span></option>
                      <option value="Yes / ஆம்" <?php if($survey2_records['for_maktab']=='Yes / ஆம்') {echo "Selected";}?>><span class="notranslate">Yes</span> / ஆம்</option>
                      <option value="No / இல்லை" <?php if($survey2_records['for_maktab']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <select class="form-control adu_or_chicls" id="child_adult_for_maktab">
                      <option value=""><span class="notranslate">Select</span></option>
                      <option value="Children / குழந்தைகள்" <?php if($survey2_records['child_adult_for_maktab']=='Children / குழந்தைகள்') {echo "Selected";}?>> <span class="notranslate">Children </span>/ குழந்தைகள் </option>
                      <option value="Adults / பெரியவர்கள்" <?php if($survey2_records['child_adult_for_maktab']=='Adults / பெரியவர்கள்') {echo "Selected";}?>><span class="notranslate">Adults</span> / பெரியவர்கள்</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <select class="form-control age_chilcls" id="child_adult_for_maktab_age">
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
                <i class="icon-question icons"></i>
                <input type="text" class="form-control missclss"id="miss_maktab" value="<?php echo $survey2_records['miss_maktab']; ?>">
              </div>
            </div>
            
            <div class="form-group">
              <label for=""><span class="notranslate">Children Interested in Makthab Madrasa (Age 4-15)</span> / மக்தப் மதரஸாவின் சேர்க்கவேண்டிய  மாணவ /மாணவிகள் (வயது 4-15) </label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio"  onclick="toggchild_int_rad(this.value,'<?php echo $get_snoo?>');"  class="custom-control-input chck_box_val" id="child_interest_yes<?php echo $get_snoo?>"
                  name="child_interest<?php echo $get_snoo?>" value="Yes / ஆம்"
                  >
                <label class="custom-control-label pt-1" for="child_interest_yes<?php echo $get_snoo?>"> <span
                    class="notranslate">Yes</span><span class="notranslate"> / ஆம் </label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" onclick="toggchild_int_rad(this.value,'<?php echo $get_snoo?>');"   class="custom-control-input chck_box_val" id="child_interest_no<?php echo $get_snoo?>"
                  name="child_interest<?php echo $get_snoo?>" value="No / இல்லை"
                  >
                <label class="custom-control-label pt-1" for="child_interest_no<?php echo $get_snoo?>"> <span
                    class="notranslate">No</span> / இல்லை </label>
              </div>
                           <input type="hidden" class="form-control togg_cls_child"  id="toggchind_hid_box<?php echo $get_snoo ?>" >

            </div>
            
            <div class="form-group">
               <label for=""><span class="notranslate">Interested in Makthab Madrasa (Adult)</span> / மக்தப் மதரஸாவின் சேர விருப்பம் உள்ள  பெரியவர்கள்  </label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio"  onclick="toggmaqtab_int_rad(this.value,'<?php echo $get_snoo?>');"  class="custom-control-input chck_box_val" id="maqtab_interest_yes<?php echo $get_snoo?>"
                  name="maqtab_interest<?php echo $get_snoo?>" value="Yes / ஆம்"
                 >
                <label class="custom-control-label pt-1" for="maqtab_interest_yes<?php echo $get_snoo?>"> <span
                    class="notranslate">Yes</span><span class="notranslate"> / ஆம் </label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" onclick="toggmaqtab_int_rad(this.value,'<?php echo $get_snoo?>');"  class="custom-control-input chck_box_val" id="maqtab_interest_no<?php echo $get_snoo?>"
                  name="maqtab_interest<?php echo $get_snoo?>" value="No / இல்லை"
                  >
                <label class="custom-control-label pt-1" for="maqtab_interest_no<?php echo $get_snoo?>"> <span
                    class="notranslate">No</span> / இல்லை </label>
              </div>
              
                <input type="hidden" class="form-control togg_cls_maqtab"  id="toggmaqtab_hid_box<?php echo $get_snoo?>" >

            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="sel2" class=""><span class="notranslate">Interested in Aalim Hifz Course</span> / அரபுக்  கல்லுரியில் இணைய விருப்பமா? </label>
                <select class="form-control allin_hifzcls" id="allin_hifz_course">
                  <option value=""><span class="notranslate">Select</span></option>
                  <option value="Yes / ஆம்" <?php if($survey2_records['allin_hifz_course']=='Yes / ஆம்') {echo "Selected";}?>><span class="notranslate">Yes</span> / ஆம்</option>
                  <option value="No / இல்லை" <?php if($survey2_records['allin_hifz_course']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                </select>
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="" class=""> <span class="notranslate">Interested in Niswan</span> / நிஸ்வான்  மதரஸாவில்  இணைய விருப்பமா( மாணவிகள் )? </label>
                <select class="form-control niswancls" id="interest_in_niswan">
                  <option value="">Select</option>
                  <option value="Yes / ஆம்" <?php if($survey2_records['interest_in_niswan']=='Yes / ஆம்') { echo "Selected";}?>><span class="notranslate">Yes</span> / ஆம்</option>
                  <option value="No / இல்லை" <?php if($survey2_records['interest_in_niswan']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                </select>
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="sel2" class=""><span class="notranslate">Family Women interested in 1-year Muslim Course</span> / குடும்ப பெண்கள் மதரஸாவில்  இணைய விருப்பமா ? </label>
                <select class="form-control faml_wmcls" id="family_women_interest_in_1yr_muslim_course">
                  <option value="" >Select</option>
                  <option value="Yes / ஆம்" <?php if($survey2_records['family_women_interest_in_1yr_muslim_course']=='Yes / ஆம்') {echo "Selected";}?>><span class="notranslate">Yes </span><span class="notranslate">/ ஆம்</option>
                  <option value="No / இல்லை" <?php if($survey2_records['family_women_interest_in_1yr_muslim_course']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                </select>
              </div>
            </div>
			  
            <hr/>
          </div>
          </div> </div>
          
       <script>
   
    function toggchild_int_rad(res,sub_id)
{
    $('#toggchind_hid_box'+sub_id).val(res);
}
function toggmaqtab_int_rad(res,sub_id)
{
    
    $('#toggmaqtab_hid_box'+sub_id).val(res);
}
</script>