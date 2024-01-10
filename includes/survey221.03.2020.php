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
$survey2=$pdo_conn->prepare("SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."'");
$survey2->execute();
$survey2_records=$survey2->fetch();
$unique_no1=$survey2_records['unique_no'];


?>
<style>
	input.form-control { padding-left: 40px; }

</style>
<input type="hidden" id="unique_no" value="<?php echo $unique_no; ?>">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
<div class="wrapper homepage">

<div class="head_line">
          <h5><span class="notranslate">Family Details </span>- <span class="tamil_font_small">குடும்ப விவரங்கள் </span> </h5>
        </div>
<div class="sub_bg animated bounceInLeft">
  <div class="container">
    <div class="row">
      <div class="col-md-12 survey_content">
	  
        <form class="login_form">
			
          <div class="form-row">
            <div class="col-2">
              <h6 class="serial_no"> 1. </h6>
            </div>
            <div class="col-8">
              <label for="" class=""><span class="notranslate"> Name</span> / பெயர் </label>
              <i class="icon-user icons"></i>
              <input type="text" class="form-control" name="family_head_name" id="family_head_name" value="<?php echo $survey2_records['family_head_name'] ;  ?>"placeholder="குடும்ப தலைவர் ">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-add"> <i class="icon-minus icons "></i></button>
            </div>
          </div>
			
          <div class="col-md-12 nopadd">
			  
            <div class="form-row">
              <div class="col-6">
                <label for="sel2" class=""><span class="notranslate">Gender</span> / பாலினம் </label>
                <select class="form-control" id="gender">
                  <option><span class="notranslate">Select</span></option>
                  <option value="M / ஆண்" <?php if($survey2_records['gender']=='M / ஆண்') {echo "Selected";}?>><span class="notranslate">M</span> / ஆண்</option>
                  <option value="F / பெண்" <?php if($survey2_records['gender']=='F / பெண்') {echo "Selected";}?>><span class="notranslate">F</span> / பெண்</option>
                </select>
              </div>
              <div class="col-6">
                <label for="sel2" class=""><span class="notranslate">Age</span> / வயது </label>
                <select class="form-control" id="age">
                  <option><span class="notranslate">Select</span></option>
                  <option value="01" <?php if($survey2_records['age']=='01') {echo "Selected";}?>>01</option>
                  <option value="02" <?php if($survey2_records['age']=='02') {echo "Selected";}?>>02</option>
                  <option value="03" <?php if($survey2_records['age']=='03') {echo "Selected";}?>>03</option>
                </select>
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="sel2" class=""><span class="notranslate">Relationship</span> / உறவு முறை </label>
                <select class="form-control" id="relationship">
                  <option><span class="notranslate">Select</span></option>
                  <option value="Husband" <?php if($survey2_records['relationship']=='Husband') {echo "Selected";}?>><span class="notranslate">Husband</span></option>
                  <option value="Wife" <?php if($survey2_records['relationship']=='Wife') {echo "Selected";}?>><span class="notranslate">Wife</span></option>
                  <option value="Son" <?php if($survey2_records['relationship']=='Son') {echo "Selected";}?>><span class="notranslate">Son</span></option>
                  <option value="Daughter" <?php if($survey2_records['relationship']=='Daughter') {echo "Selected";}?>><span class="notranslate">Daughter</span></option>
                </select>
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="" class=""><span class="notranslate">Educational Qualification</span> / கல்வி விபரம் </label>
                <i class="icon-notebook icons"></i>
                <input type="text" class="form-control" id="edu_qualification" value="<?php echo $survey2_records['edu_qualification']; ?>">
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-6">
                <label for="" class="two_hgt"><span class="notranslate">Marital Status</span> / நிக்காஹ்  விபரம் </label>
                <i class="icon-heart icons"></i>
                <input type="text" class="form-control" id="marital_status" value="<?php echo $survey2_records['marital_status']; ?>">
              </div>
              <div class="col-6">
                <label for="" class="two_hgt"><span class="notranslate">Voter ID</span> / வாக்காளர் எண் </label>
                <i class="icon-notebook icons"></i>
                <input type="text" class="form-control" id="voter_id" value="<?php echo $survey2_records['voter_id']; ?>">
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="" class=""><span class="notranslate">Business / Occupational Details</span> / தொழில் / வேலை விபரம் </label>
                <i class="icon-user-follow icons"></i>
                <input type="text" class="form-control" id="bussiness_occupation" value="<?php echo $survey2_records['bussiness_occupation']; ?>">
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-6">
                <label for="sel2" class="two_hgt"><span class="notranslate">Work Location</span> / வேலை செய்யுமிடம் </label>
                <select class="form-control" id="work_location">
                  <option><span class="notranslate">Select</span></option>
                  <option value="Local / உள்ளூர்" <?php if($survey2_records['work_location']=='Local / உள்ளூர்') {echo "Selected";}?>><span class="notranslate">Local </span>/ உள்ளூர்</option>
                  <option value="Out Station / வெளியூர்" <?php if($survey2_records['work_location']=='Out Station / வெளியூர்') {echo "Selected";}?>><span class="notranslate">Out Station</span> / வெளியூர்</option>
                  <option value="Foreign / வெளிநாடு" <?php if($survey2_records['work_location']=='Foreign / வெளிநாடு') {echo "Selected";}?>><span class="notranslate">Foreign </span>/ வெளிநாடு </option>
                </select>
              </div>
              <div class="col-6">
                <label for="" class="two_hgt"> <span class="notranslate">Blood Group </span>/ இரத்த வகை </label>
                <i class="icon-drop icons"></i>
                <input type="text" class="form-control"id="blood_group" value="<?php echo $survey2_records['blood_group']; ?>">
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="sel2" class="small_margin_btm"><span class="notranslate">Children (Age 4 to 15) / Adults (Age Above 15) for Maktab </span>/ குர்ஆன் பாடசாலைக்கு வருகிறவரா? (குழந்தைகள் ( வயது 4 to 15 ), பெரியவர்கள்  ( 15 வயதுக்கு மேல்  )) </label>
                <p class="small_note"> </p>
                <div class="row">
                  <div class="col-4">
                    <select class="form-control" id="for_maktab">
                      <option><span class="notranslate">Select</span></option>
                      <option value="Yes / ஆம்" <?php if($survey2_records['for_maktab']=='Yes / ஆம்') {echo "Selected";}?>><span class="notranslate">Yes</span> / ஆம்</option>
                      <option value="No / இல்லை" <?php if($survey2_records['for_maktab']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <select class="form-control" id="child_adult_for_maktab">
                      <option><span class="notranslate">Select</span></option>
                      <option value="Children / குழந்தைகள்" <?php if($survey2_records['child_adult_for_maktab']=='Children / குழந்தைகள்') {echo "Selected";}?>> <span class="notranslate">Children </span>/ குழந்தைகள் </option>
                      <option value="Adults / பெரியவர்கள்" <?php if($survey2_records['child_adult_for_maktab']=='Adults / பெரியவர்கள்') {echo "Selected";}?>><span class="notranslate">Adults</span> / பெரியவர்கள்</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <select class="form-control" id="child_adult_for_maktab_age">
                      <option><span class="notranslate">Age</span></option>
                      <option value="4" <?php if($survey2_records['child_adult_for_maktab_age']=='4') {echo "Selected";}?>>4</option>
                      <option value="5" <?php if($survey2_records['child_adult_for_maktab_age']=='5') {echo "Selected";}?>>5</option>
                      <option value="6" <?php if($survey2_records['child_adult_for_maktab_age']=='6') {echo "Selected";}?>>6</option>
                      <option value="7" <?php if($survey2_records['child_adult_for_maktab_age']=='7') {echo "Selected";}?>>7</option>
                      <option value="8" <?php if($survey2_records['child_adult_for_maktab_age']=='8') {echo "Selected";}?>>8</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="" class=""> <span class="notranslate">Why does he/she miss Maktab? </span> ஏன் வருவதில்லை? </label>
                <i class="icon-question icons"></i>
                <input type="text" class="form-control"id="miss_maktab" value="<?php echo $survey2_records['miss_maktab']; ?>">
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="sel2" class=""><span class="notranslate">Interested in Allin Hifz Course</span> / அரபுக்  கல்லுரியில் இணைய விருப்பமா? </label>
                <select class="form-control" id="allin_hifz_course">
                  <option><span class="notranslate">Select</span></option>
                  <option value="Yes / ஆம்" <?php if($survey2_records['allin_hifz_course']=='Yes / ஆம்') {echo "Selected";}?>><span class="notranslate">Yes</span> / ஆம்</option>
                  <option value="No / இல்லை" <?php if($survey2_records['allin_hifz_course']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                </select>
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="" class=""> <span class="notranslate">Interested in Niswan</span> / நிஸ்வான்  மதரஸாவில்  இணைய விருப்பமா( மாணவிகள் )? </label>
                <select class="form-control" id="interest_in_niswan">
                  <option>Select</option>
                  <option value="Yes / ஆம்" <?php if($survey2_records['interest_in_niswan']=='Yes / ஆம்') { echo "Selected";}?>><span class="notranslate">Yes</span> / ஆம்</option>
                  <option value="No / இல்லை" <?php if($survey2_records['interest_in_niswan']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                </select>
              </div>
            </div>
			  
            <div class="form-row">
              <div class="col-12">
                <label for="sel2" class=""><span class="notranslate">Family Women interested in 1-year Muslim Course</span> / குடும்ப பெண்கள் மதரஸாவில்  இணைய விருப்பமா ? </label>
                <select class="form-control" id="family_women_interest_in_1yr_muslim_course">
                  <option>Select</option>
                  <option value="Yes / ஆம்" <?php if($survey2_records['family_women_interest_in_1yr_muslim_course']=='Yes / ஆம்') {echo "Selected";}?>><span class="notranslate">Yes </span><span class="notranslate">/ ஆம்</option>
                  <option value="No / இல்லை" <?php if($survey2_records['family_women_interest_in_1yr_muslim_course']=='No / இல்லை') {echo "Selected";}?>><span class="notranslate">No</span> / இல்லை</option>
                </select>
              </div>
            </div>
			  
            <hr/>
			  
          </div>
			
          <div class="form-row">
            <div class="col-2">
              <h6 class="serial_no"> 2. </h6>
            </div>
            <div class="col-8">
              <label for="" class=""><span class="notranslate"> Name </span>/ பெயர் </label>
              <i class="icon-user icons"></i>
              <input type="text" class="form-control" id="family_member_name_2" value="<?php echo $survey2_records['family_member_name_2']; ?>" placeholder="குடும்ப உறுப்பினர் ">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-add"> <i class="icon-plus icons"></i></button>
            </div>
          </div>
			
          <div class="form-row">
            <div class="col-2">
              <h6 class="serial_no"> 3. </h6>
            </div>
            <div class="col-8">
              <label for="" class=""><span class="notranslate"> Name</span> / பெயர் </label>
              <i class="icon-user icons"></i>
              <input type="text" class="form-control" id="family_member_name_3" value="<?php echo $survey2_records['family_member_name_3']; ?>" placeholder="குடும்ப உறுப்பினர் ">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-add"> <i class="icon-plus icons "></i></button>
            </div>
          </div>
			
          <div class="form-row">
            <div class="col-2">
              <h6 class="serial_no"> 4. </h6>
            </div>
            <div class="col-8">
              <label for="" class=""><span class="notranslate"> Name</span> / பெயர் </label>
              <i class="icon-user icons"></i>
              <input type="text" class="form-control" id="family_member_name_4" value="<?php echo $survey2_records['family_member_name_4']; ?>" placeholder="குடும்ப உறுப்பினர் ">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-add"> <i class="icon-plus icons "></i></button>
            </div>
          </div>
			
          <div class="form-row">
            <div class="col-2">
              <h6 class="serial_no"> 5. </h6>
            </div>
            <div class="col-8">
              <label for="" class=""> <span class="notranslate">Name</span> / பெயர் </label>
              <i class="icon-user icons"></i>
              <input type="text" class="form-control" id="family_member_name_5" value="<?php echo $survey2_records['family_member_name_5']; ?>" placeholder="குடும்ப உறுப்பினர் ">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-add"> <i class="icon-plus icons "></i></button>
            </div>
          </div>
			
          <div class="form-row">
            <div class="col-2">
              <h6 class="serial_no"> 6. </h6>
            </div>
            <div class="col-8">
              <label for="" class=""> <span class="notranslate">Name</span> / பெயர் </label>
              <i class="icon-user icons"></i>
              <input type="text" class="form-control" id="family_member_name_6"value="<?php echo $survey2_records['family_member_name_6']; ?>" placeholder="குடும்ப உறுப்பினர் ">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-add"> <i class="icon-plus icons "></i></button>
            </div>
          </div>
			
          <div class="form-row">
            <div class="col-2">
              <h6 class="serial_no"> 7. </h6>
            </div>
            <div class="col-8">
              <label for="" class=""> <span class="notranslate">Name </span>/ பெயர் </label>
              <i class="icon-user icons"></i>
              <input type="text" class="form-control" id="family_member_name_7" value="<?php echo $survey2_records['family_member_name_7']; ?>" placeholder="குடும்ப உறுப்பினர் ">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-add"> <i class="icon-plus icons"></i></button>
            </div>
          </div>
			
          <div class="form-row">
            <div class="col-2">
              <h6 class="serial_no"> 8. </h6>
            </div>
            <div class="col-8">
              <label for="" class=""> <span class="notranslate">Name</span> / பெயர் </label>
              <i class="icon-user icons"></i>
              <input type="text" class="form-control"id="family_member_name_8"value="<?php echo $survey2_records['family_member_name_8']; ?>" placeholder="குடும்ப உறுப்பினர் ">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-add"> <i class="icon-plus icons"></i></button>
            </div>
          </div>
			
          <div class="form-row">
            <div class="col-2">
              <h6 class="serial_no"> 9. </h6>
            </div>
            <div class="col-8">
              <label for="" class=""> <span class="notranslate">Name </span>/ பெயர் </label>
              <i class="icon-user icons"></i>
              <input type="text" class="form-control"id="family_member_name_9"value="<?php echo $survey2_records['family_member_name_9']; ?>" placeholder="குடும்ப உறுப்பினர் ">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-add"> <i class="icon-plus icons "></i></button>
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
					      <a onClick="get_member_login_det('<?php echo $unique_no; ?>','<?php echo $user_id; ?>')">
                            <button type="button" class="btn btn-success back_btn"> <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i> <span class="notranslate">Back</span> </button>
                        </div>
                        <div class="col-6">
                            <a onClick="get_survey3_login_det('<?php echo $unique_no; ?>')">
								<button type="button" class="btn btn-success next_btn"> <span class="notranslate">Next </span><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
							</a>
                        </div>
						
                    </div>
                </div>
            </div>
        </div>



<script type="text/javascript">
function get_member_login_det(unique_no,user_id)
{	
  
		$("#previous_id").val('survey1.php');							
		$('#page_replace_div').load(FILE_PATH+"/survey1.php?unique_no="+unique_no+"&user_id="+user_id);
}

</script> 
<script type="text/javascript">
function get_survey3_login_det(unique_no)
{	
         var unique_no=$("#unique_no").val();
       
         var family_head_name =$("#family_head_name").val();
         var gender =$("#gender").val();
         var age   =$("#age ").val();
         var user_id   =$("#user_id").val();
         var relationship   =$("#relationship").val();
         var edu_qualification     =$("#edu_qualification").val();
         var marital_status  =$("#marital_status").val();
         var voter_id    =$("#voter_id").val();
         var bussiness_occupation      =$("#bussiness_occupation").val();
         var work_location      =$("#work_location").val();
         var blood_group       =$("#blood_group").val();
         var for_maktab       =$("#for_maktab").val();
         var child_adult_for_maktab   =$("#child_adult_for_maktab").val();
         var child_adult_for_maktab_age =$("#child_adult_for_maktab_age").val();
         var miss_maktab =$("#miss_maktab").val();
         var allin_hifz_course   =$("#allin_hifz_course").val();
         var interest_in_niswan    =$("#interest_in_niswan").val();
         var family_women_interest_in_1yr_muslim_course=$("#family_women_interest_in_1yr_muslim_course").val();
         var family_member_name_2 =$("#family_member_name_2").val();
         var family_member_name_3 =$("#family_member_name_3").val();
         var family_member_name_4 =$("#family_member_name_4").val();
         var family_member_name_5 =$("#family_member_name_5").val();
         var family_member_name_6 =$("#family_member_name_6").val();
         var family_member_name_7 =$("#family_member_name_7").val();
         var family_member_name_8 =$("#family_member_name_8").val();
         var family_member_name_9 =$("#family_member_name_9").val();
         
         var sendInfo = {
                         unique_no :unique_no,
                         user_id :user_id,
                          family_head_name:family_head_name,
                          gender:gender, 
                          age:age,
                          relationship:relationship,
                          edu_qualification:edu_qualification,
                          marital_status:marital_status,
                          voter_id:voter_id,
                          bussiness_occupation:bussiness_occupation,
                          work_location:work_location,
                          blood_group:blood_group,
                          for_maktab:for_maktab,
                          child_adult_for_maktab:child_adult_for_maktab,
                          child_adult_for_maktab_age:child_adult_for_maktab_age,
                          miss_maktab:miss_maktab,
                          allin_hifz_course:allin_hifz_course,
                          interest_in_niswan:interest_in_niswan,
                          family_women_interest_in_1yr_muslim_course:family_women_interest_in_1yr_muslim_course,
                          family_member_name_2:family_member_name_2,
                          family_member_name_3:family_member_name_3,
                          family_member_name_4:family_member_name_4,
                          family_member_name_5:family_member_name_5,
                          family_member_name_6:family_member_name_6,
                          family_member_name_7:family_member_name_7,
                          family_member_name_8:family_member_name_8,
                          family_member_name_9:family_member_name_9,
                          
                        };
          $.ajax({
          url:FILE_PATH+'/survey2_update.php?action=update',
          type:'GET',
          data: sendInfo,
          timeout:60000,
      success:function(data)
      {   
        //alert(data);
        $("#previous_id").val('survey3.php');							
        $('#page_replace_div').load(FILE_PATH+"/survey3.php?unique_no="+unique_no+"&user_id="+user_id);
       }
});
}
</script>