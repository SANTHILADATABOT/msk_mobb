<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
$sess_user_id = $_GET[ 'sess_user_id' ];
$sess_usertype_id = $_GET[ 'sess_usertype_id'];
$crt_month = date( 'Y-m' );
$current_date = date( 'Y-m-d' );

     $user_id = $_GET['user_id']; 
  $country_id = $_GET['country_id'];
  $state_id = $_GET['state_id'];
  $district_id = $_GET['district_id'];
  $city_id = $_GET['city_id'];
  $area_id = $_GET['area_id'];


if($_GET['unique_no']=='')
{
   $random_no=rand(000000,999999);
}
else
{
	   $random_no=$_GET['unique_no'];
}

 
$survey1 = $pdo_conn->prepare("SELECT * FROM  fact_finding_form WHERE unique_no='".$random_no."' ");
$survey1->execute();
$survey1_records=$survey1->fetch();

?>



<style>
  input.form-control {
    padding-left: 40px;
  }
</style>

<input type="hidden" name="unique_no" id="unique_no" value="<?php echo $random_no; ?>">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" name="country_id" id="country_id" value="<?php echo $country_id;  ?>">
<input type="hidden" name="state_id" id="state_id" value="<?php echo $state_id;  ?>">
<input type="hidden" name="district_id" id="district_id" value="<?php echo $district_id;  ?>">
<input type="hidden" name="city_id" id="city_id" value="<?php echo $city_id;  ?>">
<input type="hidden" name="area_id" id="area_id" value="<?php echo $area_id;  ?>">


<div class="wrapper homepage">
  <div class="head_line">
    <h5><span class="notranslate">Personal Details -</span><span class="tamil_font_small"> சொந்த விவரங்கள் </span> </h5>
  </div>
  <div class="sub_bg animated bounceInLeft">

    <div class="container">
      <div class="row">
        <div class="col-md-12 survey_content">



          <form class="login_form">

            <div class="form-group">
              <label for=""><span class="notranslate">Family No </span>. / குடும்ப எண் </label>
              <select class="form-control" id="family_no" name="family_no">
                <option value=""><span class="notranslate">Select</span></option>
                <option value="Yes / ஆம்" <?php if($survey1_records['family_no']=='Yes / ஆம்') { echo "Selected"; } ?>>
                  <span class="notranslate"> Yes </span>/ ஆம் </option>
                <option value="No / இல்லை"
                  <?php if($survey1_records['family_no']=='No / இல்லை') { echo "Selected"; } ?>> <span
                    class="notranslate">No</span> / இல்லை </option>
              </select>
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Mohalla No</span>. / மொஹல்லா எண்</label>
              <select class="form-control" id="mohalla_no" name="mohalla_no">
                <option value=""><span class="notranslate">Select</span></option>
                <option value="Yes / ஆம்" <?php if($survey1_records['mohalla_no']=='Yes / ஆம்') { echo "Selected"; } ?>>
                  <span class="notranslate">Yes </span>/ ஆம் </option>
                <option value="No / இல்லை"
                  <?php if($survey1_records['mohalla_no']=='No / இல்லை') { echo "Selected"; } ?>> <span
                    class="notranslate">No</span> / இல்லை </option>
              </select>
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate"> Aadhar No</span>. / ஆதார் எண் </label>
              <select class="form-control" id="aadhar_no" name="aadhar_no">
                <option value=""><span class="notranslate">Select</span><span class="notranslate"></option>
                <option value="Yes / ஆம்" <?php if($survey1_records['aadhar_no']=='Yes / ஆம்') { echo "Selected"; } ?>>
                  <span class="notranslate">Yes</span><span class="notranslate"> </option>
                <option value="No / இல்லை"
                  <?php if($survey1_records['aadhar_no']=='No / இல்லை') { echo "Selected"; } ?>> <span
                    class="notranslate">No </span></option>
              </select>
            </div>

            <div class="form-row">
              <div class="col-5">
                <label for="" class="two_hgt"><span class="notranslate">Door No</span>. / கதவு எண் </label>
                <i class="icon-home icons"></i>
                <input type="text" class="form-control" id="door_no" name="door_no"
                  value="<?php echo $survey1_records['door_no']; ?>">
              </div>

              <div class="col-7">
                <label for="" class="two_hgt"><span class="notranslate">Street Name</span> / தெரு பெயர் </label>
                <i class="icon-home icons"></i>
                <input type="text" class="form-control" id="street_name" name="street_name"
                  value="<?php echo $survey1_records['street_name']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Nagar</span> / நகர் </label>
              <i class="icon-home icons"></i>
              <input type="" class="form-control" id="nagar" name="nagar"
                value="<?php echo $survey1_records['nagar']; ?>">
            </div>

            <div class="form-row">
              <div class="col-6">
                <label for="" class="two_hgt"><span class="notranslate">Date</span> / நாள் </label>
                <i class="icon-calendar icons"></i>
                <input class="form-control" type="date" id="date" name="date"
                  value="<?php echo $survey1_records['date']; ?>">
              </div>

              <div class="col-6">
                <label for="" class="two_hgt"><span class="notranslate">Contact No</span>. / தொலைபேசி எண் </label>
                <i class="icon-screen-smartphone icons"></i>
                <input type="text" class="form-control" id="contact_no" name="contact_no"
                  value="<?php echo $survey1_records['contact_no']; ?>">
              </div>
            </div>

            <div class="form-group">
              <div>
                <label for=""><span class="notranslate">Mother Tongue</span> / தாய் மொழி </label>
              </div>
              <div class="custom-control-inline custom-checkbox mb-2 mx-4">
                <input type="checkbox" class="custom-control-input" id="mother_tongue_tamil" name="mother_tongue"
                  value="Tamil / தமிழ்" <?php if($survey1_records['mother_tongue']=="Tamil / தமிழ்") : ?>
                  checked="checked" <?php endif; ?>>
                <label class="custom-control-label pt-1" for="mother_tongue_tamil"> <span
                    class="notranslate">Tamil</span> / தமிழ் </label>
              </div>

              <div class="custom-control-inline custom-checkbox mb-2 ml-4">
                <input type="checkbox" class="custom-control-input" id="mother_tongue_urdu" name="mother_tongue"
                  value="Urdu / உருது" <?php if($survey1_records['mother_tongue']=="Urdu / உருது") : ?>
                  checked="checked" <?php endif; ?>>
                <label class="custom-control-label pt-1" for="mother_tongue_urdu"> <span class="notranslate">Urdu
                  </span>/ உருது </label>
              </div>
            </div>
<input type="checkbox">
            <div class="form-group">
              <label for=""><span class="notranslate">Ration Card No</span>. / குடும்ப அட்டை எண் </label>
              <select class="form-control" id="ration_card_no" name="ration_card_no">
                <option value=""> <span class="notranslate">Select </span></option>
                <option value="Yes / ஆம்"
                  <?php if($survey1_records['ration_card_no']=='Yes / ஆம்') { echo "Selected"; } ?>> <span
                    class="notranslate">Yes</span> / ஆம் </option>
                <option value="No / இல்லை"
                  <?php if($survey1_records['ration_card_no']=='No / இல்லை') { echo "Selected"; } ?>><span
                    class="notranslate"> No </span>/ இல்லை </option>
              </select>
            </div>

            <div class="form-group">
              <div class="form-group">
                <label for="sel1"><span class="notranslate">House</span> / வீடு </label>
                <select class="form-control" id="house" name="house">
                  <option value=""> <span class="notranslate">Select </span></option>
                  <option value="Own House / சொந்த வீடு"
                    <?php if($survey1_records['house']=='Own House / சொந்த வீடு') { echo "Selected"; } ?>><span
                      class="notranslate"> Own House</span> / சொந்த வீடு </option>
                  <option value="Rented / வாடகை வீடு"
                    <?php if($survey1_records['house']=='Rented / வாடகை வீடு') { echo "Selected"; } ?>> <span
                      class="notranslate">Rented</span> / வாடகை வீடு </option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Availability of Toilet</span> / <span
                  class="notranslate">Bathroom</span>? / கழிவறை / குளியலறை வசதி உள்ளதா? </label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="bathroom_availability_yes"
                  name="bathroom_availability" value="Yes / ஆம்"
                  <?php if($survey1_records['bathroom_availability']=="Yes / ஆம்") : ?> checked="checked"
                  <?php endif; ?>>
                <label class="custom-control-label pt-1" for="bathroom_availability_yes"> <span
                    class="notranslate">Yes</span><span class="notranslate"> / ஆம் </label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="bathroom_availability_no"
                  name="bathroom_availability" value="No / இல்லை"
                  <?php if($survey1_records['bathroom_availability']=="No / இல்லை") : ?> checked="checked"
                  <?php endif; ?>>
                <label class="custom-control-label pt-1" for="bathroom_availability_no"> <span
                    class="notranslate">No</span> / இல்லை </label>
              </div>
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Family's Economic Status</span> / குடும்ப பொருளாதார நிலை </label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="economic_status_B" name="economic_status" value="B"
                  <?php if($survey1_records['economic_status']=="B") : ?> checked="checked" <?php endif; ?>>
                <label class="custom-control-label pt-1" for="economic_status_B"><span class="notranslate">B</span>
                </label>
              </div>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="economic_status_C" name="economic_status" value="C"
                  <?php if($survey1_records['economic_status']=="C") : ?> checked="checked" <?php endif; ?>>
                <label class="custom-control-label pt-1" for="economic_status_C"><span
                    class="notranslate">C</span></label>
              </div>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="economic_status_D" name="economic_status" value="D"
                  <?php if($survey1_records['economic_status']=="D") : ?> checked="checked" <?php endif; ?>>
                <label class="custom-control-label pt-1" for="economic_status_D"><span
                    class="notranslate">D</span></label>
              </div>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="economic_status_E" name="economic_status" value="E"
                  <?php if($survey1_records['economic_status']=="E") : ?> checked="checked" <?php endif; ?>>
                <label class="custom-control-label pt-1" for="economic_status_E"><span
                    class="notranslate">E</span></label>
              </div>
            </div>


            <!--<a onClick="get_survey_login_det1( )">
          		<button type="button" class="btn btn-success next_btn" > Next <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></button>
          </a>-->
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
        <div class="col-12">
          <a onClick="get_survey_login_det1( )">
            <button type="button" class="btn btn-success next_btn"> <span class="notranslate">Next</span> <i
                class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
          </a>
        </div>

      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  function get_survey_login_det1() 
  {
    var unique_no = $("#unique_no").val();
    var user_id = $("#user_id").val();
    var country_id = $("#country_id").val();
    var state_id = $("#state_id").val();
    var district_id = $("#district_id").val();
    var city_id = $("#city_id").val();
    var area_id = $("#area_id").val();
    var family_no = $('#family_no').val();
    var mohalla_no = $('#mohalla_no').val();
    var aadhar_no = $('#aadhar_no').val();
    var door_no = $('#door_no').val();
    var street_name = $('#street_name').val();
    var nagar = $('#nagar').val();
    var date = $('#date').val();
    var contact_no = $('#contact_no').val();
    var mother_tongue = $(":checkbox[name=mother_tongue]:checked").val();
    var ration_card_no = $('#ration_card_no').val();
    var house = $('#house').val();
    var bathroom_availability = $(":radio[name=bathroom_availability]:checked").val();
    var economic_status = $(":radio[name=economic_status]:checked").val();

    // ****************validation start*******************
    // if(family_no == ''){
    //     alert("Please select Yes or No for Family No.");
    //     $("#family_no").focus();
    //     return false;
    // }

    // if(mohalla_no == ''){
    //     alert("Please select Yes or No for Mohalla No.");
    //     $("#mohalla_no").focus();
    //     return false;
    // }

    // if(aadhar_no == ''){
    //     alert("Please select Yes or No for AAadhar No.");
    //     $("#aadhar_no").focus();
    //     return false;
    // }

    // if(door_no == ''){
    //     alert("Please wnter your Door No.");
    //     $('#door_no').focus();
    //     return false;
    // }

    // if(street_name == ''){
    //     alert("Please enter your Street Name.");
    //     $('#street_name').focus();
    //     return false;
    // }

    // if(nagar == ''){
    //     alert("Please enter your Nagar.");
    //     $('#nagar').focus();
    //     return false;
    // }

    // if(date == ''){
    //     alert("Please enter Date.");
    //     $('#date').focus();
    //     return false;
    // }

    // if(contact_no == ''){
    //     alert("Please enter your Contact No.");
    //     $('#contact_no').focus();
    //     return false;
    // }

    //  if ($('input[name="mother_tongue"]:checked').length == 0){
    //     alert("Please choose your Mother Tongue.");
    //     $('#mother_tongue').focus();
    //      return false;
    //  }

    /* if(ration_card_no == ''){
         alert("Please select Yes or No for Ration Card No.");
         $('#ration_card_no').focus();
         return false;
     }
   */
    // if(house == ''){
    //     alert("Please select your type of House.");
    //     $('#house').focus();
    //     return false;
    // }

    // if(bathroom_availability == ''){
    //     alert("Please choose Yes or No for availability of Toilet/Bathroom.");
    //     $('#bathroom_availability').focus();
    //     return false;
    // }

    // if(economic_status == ''){
    //     alert("Please choose your Family's Economic Status.");
    //     $('#economic_status').focus();
    //     return false;
    // }
    // ***************validation ends******************



    var sendInfo = {
      unique_no: unique_no,
      user_id: user_id,
      country_id: country_id,
      state_id: state_id,
      district_id: district_id,
      city_id: city_id,
      area_id: area_id,
      family_no: family_no,
      mohalla_no: mohalla_no,
      aadhar_no: aadhar_no,
      door_no: door_no,
      street_name: street_name,
      nagar: nagar,
      date: date,
      contact_no: contact_no,
      mother_tongue: mother_tongue,
      ration_card_no: ration_card_no,
      house: house,
      bathroom_availability: bathroom_availability,
      economic_status: economic_status,
    };


    $.ajax({
      url: FILE_PATH + '/survey1_model.php?action=Insert',
      type: 'POST',
      data: sendInfo,
      timeout: 60000,
      success: function (data) {
        //alert(data);
        $("#previous_id").val('survey2.php');
        $('#page_replace_div').load(FILE_PATH + "/survey2.php?unique_no=" + unique_no + "&user_id=" + user_id);
      }
    });


    // $("#previous_id").val('survey2.php');							
    // $('#page_replace_div').load(FILE_PATH+'/survey2.php?random_no='+random_no);
  }

</script>