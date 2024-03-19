<?php
header( 'Access-Control-Allow-Origin: *');
date_default_timezone_set( 'Asia/Kolkata');
include( "dbConnect.php" );
include( "common_function.php" );

$crt_month = date( 'Y-m' );
$current_date = date('d-m-Y');
$user_id = $_GET['user_id']; 
$country_id = $_GET['country_id']; 
$state_id = $_GET['state_id']; 
$district_id = $_GET['district_id']; 
$city_id = $_GET['city_id']; 
$area_id = $_GET['area_id']; 
$user_type=$_GET['user_type']; 
$survey_id=$_GET['survey_id']; 
$completed_status=$_GET['completed_status'];


if($_GET['survey_id']!='') 
{
  $query="  survey_id='".$survey_id."'";

  $random_no=$survey1_records['unique_no'];
}
 if($_GET['unique_no']=='' || $_GET['unique_no']=='undefined' || $_GET['unique_no']=='0'  )
{
 
  $random_no=uniqid().rand(100000,999999);
  $query="  unique_no='".$random_no."'";
}
else
{
  $query="  unique_no='".$_GET['unique_no']."'";
  $random_no=$_GET['unique_no'];
}
// "SELECT * FROM  fact_finding_form WHERE $query and user_id='".$user_id."' and completed_status='0' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'";
if($completed_status=='')
{
    if($_GET['unique_no']=='')
    {
    $survey1 = $pdo_conn->prepare( "SELECT * FROM  fact_finding_form WHERE  user_id='".$user_id."' and completed_status='0' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'");
    $survey1->execute();
    $survey1_records=$survey1->fetch();
    if($survey1_records['unique_no']!='')
    {
    $_GET['unique_no']=$survey1_records['unique_no'];
    $random_no=$_GET['unique_no'];
    }
    else
    {
  $random_no=uniqid().rand(100000,999999);
    }
        
    }
   //echo "SELECT * FROM  fact_finding_form WHERE $query and user_id='".$user_id."' and completed_status='0' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'";
    else
    {
    $survey1 = $pdo_conn->prepare("SELECT * FROM  fact_finding_form WHERE $query and user_id='".$user_id."' and completed_status='0' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'");
    $survey1->execute();
    $survey1_records=$survey1->fetch();
        
    }
        
    }
else
{
   /// echo "SELECT * FROM  fact_finding_form WHERE $query and user_id='".$user_id."' and completed_status='".$completed_status."' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'";
    $survey1 = $pdo_conn->prepare("SELECT * FROM  fact_finding_form WHERE $query and user_id='".$user_id."' and completed_status='".$completed_status."' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'");
    $survey1->execute();
    $survey1_records=$survey1->fetch();
    
}

$counts_are=count($survey1_records['unique_no']);
$ctn_rds=count($survey1_records['family_no']);
if($_GET['survey_id']!='') 
{
$random_no=$survey1_records['unique_no'];
}


$fami_no=0;
if($_GET['unique_no']=='' || $ctn_rds==0)
{ 
    
    $survy = $pdo_conn->prepare("SELECT family_no FROM  fact_finding_form  order by survey_id desc" );
    $survy->execute();
    $survy_rds=$survy->fetchAll();
    
    foreach($survy_rds as $surv1)
    {
        $fami_no= $surv1['family_no'];
    }
    if($fami_no=='Yes / ஆம்')
    {
        $fami_no=1;
    }
    else
    {
        $fami_no++;
    }
    
    
    
}

 ?>





<style>
  input.form-control {
    padding-left: 40px;
  }
</style>

<input type="hidden" name="unique_no" id="unique_no" value="<?php echo $random_no; ?>">
<input type="hidden" name="user_type" id="user_type" value="<?php echo $user_type; ?>">
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

<?php

$family = $pdo_conn->prepare("SELECT max(family_no) as family_no FROM  fact_finding_form where country_id='$country_id' and state_id='$state_id' and district_id='$district_id' and city_id='$city_id' and area_id='$area_id' ");
$family->execute();
$family_no=$family->fetch();

?>

          <form class="login_form">

            <div class="form-group">
              <label for=""><span class="notranslate">Family No </span>. / குடும்ப எண்    - <span style="color:red"><strong><?php echo $family_no[family_no]; ?> <?php if($family_no[family_no]){ echo 'Previous Family No'; } ?> </strong>    </span>       <!--<i class="fa fa-microphone create"  onclick="studentname_recognize()"></i><i class="fa fa-times create" aria-hidden="true" onclick="erase()"></i>-->
              </label>
              
              <input type='hidden' class="form-control" placeholder='family' id='valfamily_no' name='valfamily_no'>

              <input type='number' class="form-control check_empt" id='family_no' onkeyup="family_number_checking();" onfocus="family_number_checking()" name='family_no'  value='<?php if($_GET['unique_no']!=''){ echo $survey1_records['family_no'];  }  ?>'>
          

           <!--   <select class="form-control" id="family_no" name="family_no">
                <option value=""><span class="notranslate">Select</span></option>
                <option value="Yes / ஆம்" <?php if($survey1_records['family_no']=='Yes / ஆம்') { echo "Selected"; } ?>>
                  <span class="notranslate"> Yes </span>/ ஆம் </option>
                <option value="No / இல்லை"
                  <?php if($survey1_records['family_no']=='No / இல்லை') { echo "Selected"; } ?>> <span
                    class="notranslate">No</span> / இல்லை </option>
              </select>-->
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Mohalla No</span>. / மொஹல்லா எண்</label>
              <select class="form-control check_empt" id="mohalla_no" name="mohalla_no" onchange="mohal_no(this.value)" >
                <option value=""><span class="notranslate">Select</span></option>
                <option value="Yes / ஆம்" <?php if($survey1_records['mohalla_no']=='Yes / ஆம்') { echo "Selected"; } ?>>
                  <span class="notranslate">Yes </span>/ ஆம் </option>

                <option value="No / இல்லை"
                  <?php if($survey1_records['mohalla_no']=='No / இல்லை') { echo "Selected"; } ?>> <span
                    class="notranslate">No</span> / இல்லை </option>
              </select>
              <input type='text' id='mohalla_no_inpt' name='mohalla_no_inpt' value='<?php  echo $survey1_records['mohalla_no_inpt']; ?>' class="form-control check_empt">
            </div>

            <div class="form-group" style="display:none">
              <label for=""><span class="notranslate"> Aadhar No</span>. / ஆதார் எண் </label>
              <select class="form-control check_empt" id="aadhar_no" name="aadhar_no" onchange="adhar_no(this.value)">
                <option value=""><span class="notranslate">Select</span><span class="notranslate"></option>
                <option value="Yes / ஆம்" <?php if($survey1_records['aadhar_no']=='Yes / ஆம்') { echo "Selected"; } ?>>
                  <span class="notranslate">Yes</span><span class="notranslate"> </option>
                <option value="No / இல்லை"
                  <?php if($survey1_records['aadhar_no']=='No / இல்லை') { echo "Selected"; } ?>> <span
                    class="notranslate">No </span></option>
              </select>
              <input type='text' id='aadhar_get_inpt' name='aadhar_get_inpt' value='<?php  echo $survey1_records['aadhar_get_inpt']; ?>' class="form-control check_empt">
            </div>

            <div class="form-row">
              <div class="col-5">
                <label for="" class="two_hgt"><span class="notranslate">Door No</span>. / கதவு எண் </label>
                <i class="icon-home icons"></i>
                <input type="text" class="form-control check_empt" id="door_no" name="door_no"
                  value="<?php echo $survey1_records['door_no']; ?>">
              </div>

              <div class="col-7">
                <label for="" class="two_hgt"><span class="notranslate">Street Name</span> / தெரு பெயர் </label>
                <i class="icon-home icons"></i>
                <input type="text" class="form-control check_empt" id="street_name" name="street_name"
                  value="<?php echo $survey1_records['street_name']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">City</span> / நகர் </label>
              <i class="icon-home icons"></i>
              <input type="" class="form-control check_empt" id="nagar" name="nagar"
                value="<?php echo $survey1_records['nagar']; ?>">
            </div>

            <div class="form-group">
                <label for="" class="two_hgt"><span class="notranslate">Date</span> / நாள் </label>
                <i class="icon-calendar icons"></i>
                <input class="form-control check_empt" type="date" id="date" name="date"
                  value="<?php if( $survey1_records['date']!='') { echo $survey1_records['date']; } else { echo $current_date ; } ?>">
            </div>

            <div class="form-group">
                <label for="" class="two_hgt"><span class="notranslate">Contact No</span>. / தொலைபேசி எண் </label>
                <i class="icon-screen-smartphone icons"></i>
                <input type="text" class="form-control check_empt" id="contact_no" name="contact_no"
                  value="<?php echo $survey1_records['contact_no']; ?>">
            </div>

            <div class="form-group">
              <div>
                <label for=""><span class="notranslate">Mother Tongue</span> / தாய் மொழி </label>
              </div>
              <div class="custom-control-inline custom-checkbox mb-2 mx-4 " onclick="mother_tongue_choose('1')">
                <input type="checkbox" class="custom-control-input chck_box_val " id="mother_tongue_tamil" name="mother_tongue"
                  value="Tamil / தமிழ்" <?php if($survey1_records['mother_tongue']=="Tamil / தமிழ்") : ?>
                  checked="checked" <?php endif; ?> >
                <label class="custom-control-label pt-1" for="mother_tongue_tamil"> <span
                    class="notranslate">Tamil</span> / தமிழ் </label>
              </div>

              <div class="custom-control-inline custom-checkbox mb-2 ml-4"  onclick="mother_tongue_choose('2')">
                <input type="checkbox" class="custom-control-input chck_box_val" id="mother_tongue_urdu" name="mother_tongue"
                  value="Urdu / உருது" <?php if($survey1_records['mother_tongue']=="Urdu / உருது") : ?>
                  checked="checked" <?php endif; ?>>
                <label class="custom-control-label pt-1" for="mother_tongue_urdu"> <span class="notranslate">Urdu
                  </span>/ உருது </label>
              </div>
              
             <div class="custom-control-inline custom-checkbox mb-2 ml-4"  onclick="mother_tongue_choose('3')">
                <input type="checkbox" class="custom-control-input chck_box_val" id="mother_tongue_other" name="mother_tongue"
                  value="Other / பிற மொழிகள்" <?php if($survey1_records['mother_tongue']=="Other / பிற மொழிகள்") : ?>
                  checked="checked" <?php endif; ?>>
                  <label class="custom-control-label pt-1" for="mother_tongue_other"> <span class="notranslate">Other
                  </span>/ பிற மொழிகள்</label>

               <input type='text' name='language_input' id='language_input' value='<?php echo $survey1_records['language_input'];?>' class="form-control" <?php if(($survey1_records['mother_tongue']!="Other / பிற மொழிகள்") ||($survey1_records['mother_tongue']=='')) {?>style="display:none" <?php } ?> >
              </div>

            <div class="form-group">
  <label for=""><span class="notranslate">Ration Card</span> / குடும்ப அட்டை </label>        
  <select class="form-control check_empt" id="ration_card_no" name="ration_card_no" onchange="ration_no(this.value)">
                <option value=""> <span class="notranslate">Select </span></option>
                <option value="Yes / ஆம்"
                  <?php if($survey1_records['ration_card_no']=='Yes / ஆம்') { echo "Selected"; } ?>> <span
                    class="notranslate">Yes</span> / ஆம் </option>
                <option value="No / இல்லை"
                  <?php if($survey1_records['ration_card_no']=='No / இல்லை') { echo "Selected"; } ?>><span
                    class="notranslate"> No </span>/ இல்லை </option>
              </select>
                 <input type='text' id='ration_no_inpt' name='ration_no_inpt' value='<?php echo $survey1_records['ration_no_inpt'] ?>' class="form-control">
            </div>

            <div class="form-group">
              <div class="form-group">
                <label for="sel1"><span class="notranslate">House</span> / வீடு </label>
                <select class="form-control check_empt" id="house" name="house">
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
              <label for=""><span class="notranslate">House Details</span> / வீட்டின் விவரங்கள் </label>
              <i class="icon-home icons"></i>
              <input type="" class="form-control check_empt" id="house_details" name="house_details"
                value="<?php echo $survey1_records['house_details']; ?>">
            </div>
            
            
             <div class="form-group">
              <label for=""><span class="notranslate">Having Land?</span> / காலி இடம் உள்ளதா ? </label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input chck_box_val" id="land_availability_yes"
                  name="getland_availability" value="Yes / ஆம்"
                  <?php if($survey1_records['land_availability']=="Yes / ஆம்") : ?> checked="checked"
                  <?php endif; ?>>
                <label class="custom-control-label pt-1" for="land_availability_yes"> <span
                    class="notranslate">Yes</span><span class="notranslate"> / ஆம் </label>
              </div>
              
               <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input chck_box_val" id="land_availability_no"
                  name="getland_availability" value="No / இல்லை"
                  <?php if($survey1_records['land_availability']=="No / இல்லை") : ?> checked="checked"
                  <?php endif; ?>>
                <label class="custom-control-label pt-1" for="land_availability_no"> <span
                    class="notranslate">No</span> / இல்லை </label>
              </div>
            </div>

             <div class="form-group">
              <label for=""><span class="notranslate">Availability of Toilet ?</span> / கழிவறை  வசதி உள்ளதா? </label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input chck_box_val" id="bathroom_availability_yes"
                  name="bathroom_availability" value="Yes / ஆம்"
                  <?php if($survey1_records['bathroom_availability']=="Yes / ஆம்") : ?> checked="checked"
                  <?php endif; ?>>
                <label class="custom-control-label pt-1" for="bathroom_availability_yes"> <span
                    class="notranslate">Yes</span><span class="notranslate"> / ஆம் </label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input chck_box_val" id="bathroom_availability_no"
                  name="bathroom_availability" value="No / இல்லை"
                  <?php if($survey1_records['bathroom_availability']=="No / இல்லை") : ?> checked="checked"
                  <?php endif; ?>>
                <label class="custom-control-label pt-1" for="bathroom_availability_no"> <span
                    class="notranslate">No</span> / இல்லை </label>
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
          <?php
          if($user_type=='volunteer')
          {
$place = $pdo_conn->prepare("SELECT * FROM  volunteer_otp WHERE user_id='".$user_id."' ");
$place->execute();
$result=$place->fetch();
if($result['complete_status']=='1')
{
          ?>
          <a onClick="get_survey_login_det1()">
             <button type="button" class="btn btn-success next_btn"> <span class="notranslate">Next</span> <i
                class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
          </a>
 <?php
 }
else
{
  ?>
<a onClick="get_survey_login_det1()">
   <button type="button" class="btn btn-success next_btn"> <span class="notranslate">Next</span> <i
class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
          </a>
          
<!--<a onClick="get_survey_login_det2( )">
   <button type="button" class="btn btn-success next_btn"> <span class="notranslate">Next</span> <i
class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
          </a>-->
<?php
}
}
else
{ 
  ?>
<a onClick="get_survey_login_det1()">
             <button type="button" class="btn btn-success next_btn"> <span class="notranslate">Next</span> <i
                class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
          </a>
<?php
}
 ?>
           
        </div>

      </div>
    </div>
  </div>
</div>



<script type="text/javascript">


$('#family_no').keypress(function(e){ 
   if (this.value.length == 0 && e.which == 48 ){
      return false;
   }
});


 var cls_name=$('#home_icon i').attr('class');

if(cls_name!='fa fa-home')
{
   
    var country_id = $("#country_id").val();
    var state_id = $("#state_id").val();
    var district_id = $("#district_id").val();
    var city_id = $("#city_id").val();
    var area_id = $("#area_id").val();
    var unique_no = $("#unique_no").val();
   
    var country_id1 = $("#ctry_id").val();
    var state_id1 = $("#ste_id").val();
    var district_id1 = $("#disct_id").val();
    var city_id1 = $("#cty_id").val();
    var area_id1 = $("#ara_id").val();
    window.localStorage.setItem("unique_no",unique_no);
if(country_id1=='' || country_id1==undefined)
{
    var textBox = '<input type="hidden" class="textbox"/>';
    $('#hidden_txtbox').append(textBox);  
    $('.textbox:last').attr('id', 'ctry_id');
    $('.textbox:last').attr('value', country_id);
}   
 if(state_id1==''|| state_id1==undefined)
 {
    var textBox = '<input type="hidden" class="textbox"/>';
    $('#hidden_txtbox').append(textBox);  
    $('.textbox:last').attr('id', 'ste_id');
    $('.textbox:last').attr('value', state_id);
 }  
 if(district_id1==''|| district_id1==undefined)
 {
    var textBox = '<input type="hidden" class="textbox"/>';
    $('#hidden_txtbox').append(textBox);  
    $('.textbox:last').attr('id', 'disct_id');
    $('.textbox:last').attr('value', district_id);
 }  
  if(city_id1==''|| city_id1==undefined)
 {
    var textBox = '<input type="hidden" class="textbox"/>';
    $('#hidden_txtbox').append(textBox);  
    $('.textbox:last').attr('id', 'cty_id');
    $('.textbox:last').attr('value', city_id);
 }
   if(area_id1==''|| area_id1==undefined)
 {
    var textBox = '<input type="hidden" class="textbox"/>';
    $('#hidden_txtbox').append(textBox);  
    $('.textbox:last').attr('id', 'ara_id');
    $('.textbox:last').attr('value', area_id);
 }
    var textBox = '<input type="hidden" class="textbox"/>';
    $('#hidden_txtbox').append(textBox);  
    $('.textbox:last').attr('id', 'uni_no');
    $('.textbox:last').attr('value', unique_no);
   // $("#home_icon").append('<i class="fa fa-home" id="homeclass" aria-hidden="true" style="color: #fff; font-size: 1.2rem;" onclick="goto_homepg()"></i>');
}
    function goto_homepg()
    {  
        var user_id = '<?php echo $user_id ?>';
        var user_type = $("#user_type").val();
        // var user_id = $("#user_id").val();

        var country_id = $("#country_id").val();
        var state_id = $("#state_id").val();
        var district_id = $("#district_id").val();
        var city_id = $("#city_id").val();
        var area_id = $("#area_id").val();
        var unique_no = $("#unique_no").val();
        var completed_status='<?php echo $completed_status ?>';

       
        var check_val=$('.check_empt').val();
        var mother_tongue = $(":checkbox[name=mother_tongue]:checked").val();
        var bathroom_availability = $(":radio[name=bathroom_availability]:checked").val();
var land_availability = $(":radio[name=land_availability]:checked").val();
     //   var economic_status = $(":radio[name=economic_status]:checked").val();
       
        
        if($('#marriage_help_msk').is(':checked')) 
        { 
            var marriage_help_radio = $("#marriage_help_msk").val();
        
        }
        if($('#marriage_help_gov').is(':checked')) 
        { 
        
            var marriage_help_radio = $("#marriage_help_gov").val();
        }
        
        if($('#customRadio').is(':checked')) 
        { 
            var govt_insurance_card_avail = $("#customRadio").val();
        }
        if($('#customRadio2').is(':checked')) 
        { 
            var govt_insurance_card_avail = $("#customRadio2").val();
        }
        if($('#customRadio').is(':checked')) 
        { 
            var interest_to_serve_msk = $("#customRadio").val();
        }
        if($('#customRadio2').is(':checked')) 
        { 
            var interest_to_serve_msk = $("#customRadio2").val();
        }
       
        if(check_val!='' || mother_tongue!='' || bathroom_availability!=''  || marriage_help_radio!='' || govt_insurance_card_avail!='' || interest_to_serve_msk!='')
        {
           
            var txt;
            var r = confirm("Exit the Form!");
            if (r == true) {
            txt = "OK!";
            } else {
            txt = " Cancel!";
            }
          if(txt=='OK!')
          {
            $("#previous_id").val('dashboard.php');
            $('#page_replace_div').load(FILE_PATH + "/dashboard.php?unique_no=" + unique_no + "&user_id=" + user_id + "&user_type=" + user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id);
          }
        
        }
        
        
       if(check_val=='' && mother_tongue=='' && bathroom_availability=='' && marriage_help_radio=='' && govt_insurance_card_avail=='' && interest_to_serve_msk=='')
        {
         $("#previous_id").val('dashboard.php');
         $('#page_replace_div').load(FILE_PATH + "/dashboard.php?unique_no=" + unique_no + "&user_id=" + user_id + "&user_type=" + user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id);
        }
    }
    
function family_number_checking() {
    var family_no = $('#family_no').val();
    var country_id = $("#country_id").val();
    var state_id = $("#state_id").val();
    var district_id = $("#district_id").val();
    var city_id = $("#city_id").val();
    var area_id = $("#area_id").val();

  $.ajax({
    type: "POST",
 url: FILE_PATH + '/survey1_model.php',
    data: {
      "action":"fam_num_checking",
      "family_no": family_no,
      "country_id": country_id,
      "state_id": state_id,
      "district_id": district_id,
      "city_id": city_id,
      "area_id": area_id,
    },
    dataType: 'json',
    timeout: 60000,
    success: function(obj) {
     $('#valfamily_no').val(obj);
    }
  });

}

function user_not_active_logout(){
    window.localStorage.removeItem("unique_no");
    window.localStorage.removeItem("user_id");
    window.localStorage.removeItem("country_id");
    window.localStorage.removeItem("state_id");
    window.localStorage.removeItem("district_id");
    window.localStorage.removeItem("city_id");
    window.localStorage.removeItem("area_id");
    window.localStorage.removeItem("user_type");
    $("#notifications_icon").hide();
    $("#page_replace_div").load(FILE_PATH+'/main_dashboard.php');
}
function ch_user_not_active_logout(){
    var user_id = '<?php echo $user_id ?>';
    var sendInfo={user_id:user_id};
    $.ajax({
        url: FILE_PATH + '/survey1_model.php?action=Check_User_Active',
        type: 'POST',
        data: sendInfo,
        timeout: 60000,
        success: function (data) {
            if(data.includes("User not Active")){
        	    user_not_active_logout();
            }
        }
    });
}
$(document).ready(function(){
    ch_user_not_active_logout();
});

 
  function get_survey_login_det1() 
  {
      
    var unique_no = $("#unique_no").val();
     var user_type = $("#user_type").val();
     var user_id = '<?php echo $user_id ?>'; 
     var completed_status='<?php echo $completed_status ?>';
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
    var house_details = $('#house_details').val();
    var mohalla_no_inpt = $("#mohalla_no_inpt").val();
    var aadhar_get_inpt = $('#aadhar_get_inpt').val();
    var ration_no_inpt = $('#ration_no_inpt').val();
    var bathroom_availability = $(":radio[name=bathroom_availability]:checked").val();
    var land_availability = $(":radio[name=getland_availability]:checked").val();
    var language_input = $('#language_input').val();

    
   // var economic_status = $(":radio[name=economic_status]:checked").val();
    var rescount_checking = $('#valfamily_no').val();
    var unique_no_already = '<?php echo $_GET['unique_no'];?>';
    
   // alert(rescount_checking);
   // alert(unique_no_already);
    
    if(unique_no_already == ''){
        
        /*if(rescount_checking!=0 && family_no!='')
        {
            alert("Family Number Already Exist!");
            return false;
        }*/
        
        if(family_no!=''){

            if(parseInt(family_no)<=parseInt(rescount_checking)  && family_no!=''){
                alert("Family Number Already Exist");
                return false;
            }
        }
    }
    
    
    
if(family_no!='')
{
    if(mother_tongue==undefined)
    {
        mother_tongue='';
    }
    if(bathroom_availability==undefined)
    {
        bathroom_availability='';
    }
     if(land_availability==undefined)
    {
        land_availability='';
    }
    // if(economic_status==undefined)
    // {
    //     economic_status='';
    // }

    var sendInfo = {
      unique_no: unique_no,
      user_id: user_id,
      user_type:user_type,
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
      house_details:house_details,
      mohalla_no_inpt: mohalla_no_inpt,
      aadhar_get_inpt: aadhar_get_inpt,
      ration_no_inpt: ration_no_inpt,
      bathroom_availability: bathroom_availability,
     land_availability: land_availability,
     language_input: language_input,

     
    };
    $.ajax({
        url: FILE_PATH + '/survey1_model.php?action=Insert',
        type: 'POST',
        data: sendInfo,
        timeout: 60000,
        success: function (data) {
            if(data.includes("User not Active")){
        	    user_not_active_logout();
            }
            else{
                $("#previous_id").val('survey2.php');
                $('#page_replace_div').load(FILE_PATH + '/survey2.php?unique_no=' + unique_no + '&user_id=' + user_id + '&user_type=' + user_type+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&completed_status='+completed_status);
            }
        }
    });

}
else
{
alert("Please Fill Family No");
}
  }
function get_survey_login_det2()
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


function studentname_recognize() 
{	
	var maxMatchess = 1;
	var promptStrings = "Speak now";	
	var languages = "ta-IN";					
	window.plugins.speechrecognizer.startRecognize(function(result){	
	studentname.value =studentname.value+" "+result;
	}, function(errorMessage){
	console.log("Error message: " + errorMessage);
	}, maxMatchess, promptStrings, languages);
} 
var ration=$('#ration_card_no').val();
var aadhar_no=$('#aadhar_no').val();
var mohalla_no=$('#mohalla_no').val();
adhar_no(aadhar_no);
mohal_no(mohalla_no);
ration_no(ration);
function adhar_no(val)
{
    if(val=='Yes / ஆம்')
    {
        
       $('#aadhar_get_inpt').show();
    
    }
    else
    {
          $('#aadhar_get_inpt').hide();
    }
}
function mohal_no(val)
{
   
      if(val=='Yes / ஆம்')
    {
        
       $('#mohalla_no_inpt').show();
    
    }
    else
    {
          $('#mohalla_no_inpt').hide();
    }
}
function ration_no(val)
{
     if(val=='Yes / ஆம்')
    {
        
       $('#ration_no_inpt').show();
    
    }
    else
    {
          $('#ration_no_inpt').hide();
    }
}

function mother_tongue_choose(data){
    if(data=="1")
    {
        document.getElementById("mother_tongue_urdu").checked = false;
        document.getElementById("mother_tongue_other").checked = false;
        $('#language_input').hide();

    }
    else if(data=="2")
    {
        document.getElementById("mother_tongue_tamil").checked = false;
        document.getElementById("mother_tongue_other").checked = false;
        $('#language_input').hide();

    }
     else
    {
        document.getElementById("mother_tongue_tamil").checked = false;
        document.getElementById("mother_tongue_urdu").checked = false;
        $('#language_input').show();
    }
}

$( document ).ready(function() {
    family_number_checking();
    
});

$( document ).ready(function() 
{
window.localStorage.setItem("unique_no",unique_no);
});
      

</script>


<style>
.create {
    padding-left: 21px;
    color: red;
    font-size: 20px;
}
    
</style>