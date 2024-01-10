<style>
    /*********************************15-07-20**********************/
.over-jobapp-div {
    padding: 13px 0px;
}
.job-for a {
    font-size: 19px;
    font-weight: 600;
    font-family: 'Roboto Condensed', sans-serif !important;
}
.job-for {
    border-left: 5px solid #010368;
    background: -webkit-linear-gradient(#010368 , #944962);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.add-list i {
    font-size: 20px;
    line-height: 28px;
    color: #010368;
}
.btn-success {
    background-color: #010368;
    color: #fff !important;
}
.box_class {
    width: 100%;
    height: 50px;
    border: 1px solid black;
    padding: 7px 0px;
    margin: 0px 0px;
}
</style>
<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "../dbConnect.php" );
include( "../common_function.php" );

$user_id = $_GET['user_id']; 
$country_id = $_GET['country_id'];
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id'];
$user_type=$_GET['user_type'];
$medical_help_id=$_GET['medical_help_id'];
$unique_no=$_GET['unique_no'];
$completed_status=$_GET['completed_status'];
 
$medical_help = $pdo_conn->prepare("SELECT * FROM  medical_help WHERE  medical_help_id='".$medical_help_id."'");
$medical_help->execute(); 
$record = $medical_help->fetch();

?>

<?php if($record['entry_date']!='')  { $entry_date = $record['entry_date']; } else {   $entry_date = date('Y-m-d'); } ?>

<style>
  input.form-control {padding-left: 40px;}
</style>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->

<div class="wrapper homepage">

  <!--<div class="container-fluid" style="padding:0px;">
  <div class="row">
 
  <div class="col-md-8 top_left" style="padding-left:6px;">
  <h3><span class="notranslate">Medical Help Form</span></h3> 
  </div>
  <div class="col-md-2 top_left">

  

  </div>
  <div class="col-md-2 top_left">
  <i class="fa fa-arrow-circle-left arrow_back" onClick="medical_help_create_back('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>')"></i>    </div> 
  </div>                                         
   </div>---->
   
   
   <div class="container-fluid"  >
	<div class="row over-jobapp-div">
	        <div class="col-8 job-for ">
			<a>Medical Help Form</a> 
			</div> 
		    <div class="col-2 add-list ">
	 		</div>
			<div class="col-2 add-list">
			<i class="fa fa-arrow-circle-left arrow_back" onClick="medical_help_create_back('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"></i> 
			</div> 
			</div>
	</div>

   
   
  <div class="sub_bg animated bounceInLeft">

    <div class="container">
      <div class="row">
        <div class="col-md-12 survey_content">
          <form class="login_form">
            
            <div class="form-group">
              <label for=""><span class="notranslate">Date</span></label>
              <input type="date" class="form-control" id="entry_date" name="entry_date" value="<?php echo $entry_date;?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Patient  Name</span></label>
              <input type="text" class="form-control" id="patient_name" name="patient_name" value="<?php echo $record['patient_name'] ?>"> 
            </div>

            <!--<div class="form-group">-->
            <!--  <label for=""><span class="notranslate">Age</span></label>-->
            <!--  <input type="number" class="form-control" id="age" name="age" maxlength="3" onkeypress="return IsNumeric(event);" value="<?php echo $record['age'] ?>"> -->
            <!--</div>-->
            
            <div class="form-row">
              <div class="col-6">
                <label for="" class="two_hgt"><span class="notranslate">Age</span></label>
                <input type="number" class="form-control" id="age" name="age" maxlength="3" onkeypress="return IsNumeric(event);" value="<?php echo $record['age'] ?>"> 
              </div>

              <div class="col-6">
                <label for="" class="two_hgt"><span class="notranslate">Gender</span></label>
                <select class="form-control" id="gender" name="gender">
                
                <option value="Male" <?php if($record['gender']=='Male') { echo "Selected"; } ?>>Male</option>
                <option value="Female" <?php if($record['gender']=='Female') { echo "Selected"; } ?>>Female</option>
                <option value="Others" <?php if($record['gender']=='Others') { echo "Selected"; } ?>>Others</option>
              </select>
              </div>
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Disease Name</span></label>              
              <input type="text"   id="disease_name" name="disease_name" class="form-control" value="<?php echo $record['disease_name'] ?>" > 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Address</span></label>
              <textarea  class="form-control" id="address" name="address"><?php echo $record['address'] ?></textarea>              
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Mobile No</span></label>
              <input type="number" class="form-control" id="mobile_no" name="mobile_no"  maxlength="10" onkeypress="return IsNumeric(event);"  value="<?php echo $record['mobile_no'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Masjidh Service Committee Name</span></label>
              <input type="text" class="form-control" id="organization_name" name="organization_name"  value="<?php echo $record['organization_name'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">City</span></label>
              <input type="text" class="form-control" id="city" name="city"  value="<?php echo $record['city'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Coordinator Name</span></label>
              <input type="text" class="form-control" id="coordinator_name" name="coordinator_name"  value="<?php echo $record['coordinator_name'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Mobile No</span></label>
              <input type="number" class="form-control" id="c_mobile_no" name="c_mobile_no" maxlength="10" onkeypress="return IsNumeric(event);"  value="<?php echo $record['c_mobile_no'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Email</span></label>
              <input type="text" class="form-control" id="email" name="email"  value="<?php echo $record['email'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Is the Masjid Service Group Recommendation Form</span></label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="recommendation_form_yes" name="recommendation_form" value="Yes"  <?php if($record['recommendation_form']=='Yes') {  echo "checked"; } ?>>
                <label class="custom-control-label pt-1" for="recommendation_form_yes"><span   class="notranslate">Yes</span></label> 
              </div>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="recommendation_form_no" name="recommendation_form" value="No"  <?php if($record['recommendation_form']=='No') {  echo "checked"; } ?>>        
                <label class="custom-control-label pt-1" for="recommendation_form_no"><span  class="notranslate">No</span></label>
              </div>                
            </div> 

            <div class="form-group">
              <label for=""><span class="notranslate">Is there a medical report</span></label>              
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="medical_report_yes" name="medical_report" value="Yes"  <?php if($record['medical_report']=='Yes') {  echo "checked"; } ?>>                     
                <label class="custom-control-label pt-1" for="medical_report_yes"><span   class="notranslate">Yes</span></label> 
              </div>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="medical_report_no" name="medical_report" value="No"  <?php if($record['medical_report']=='No') {  echo "checked"; } ?>>        
                <label class="custom-control-label pt-1" for="medical_report_no"><span  class="notranslate">No</span></label>
              </div> 
            </div>


            <div class="form-group">
              <label for=""><span class="notranslate">Doctor's advice</span></label>   
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="surgery" name="doctor_advice" value="Surgery"  <?php if($record['doctor_advice']=='Surgery') {  echo "checked"; } ?>>                
                <label class="custom-control-label pt-1" for="surgery"><span   class="notranslate">Surgery</span></label> 
              </div>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="medicine" name="doctor_advice" value="Medicine"  <?php if($record['doctor_advice']=='Medicine') {  echo "checked"; } ?>>        
                <label class="custom-control-label pt-1" for="medicine"><span  class="notranslate">Medicine</span></label>
              </div>               
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">How much is the doctor's claim for surgery</span></label>
              <input type="text" class="form-control" id="surgery_amount" name="surgery_amount" maxlength="9" value="<?php echo $record['surgery_amount'] ?>"> 
             
            </div>

             <div class="form-group">
              <label for=""><span class="notranslate">How much do you have</span></label>
              <input type="text" class="form-control" id="amount" name="amount"  maxlength="9" value="<?php echo $record['amount'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Have the Chief Minister's Comprehensive Medical Insurance Plan Card</span></label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="medical_insurance_plan_card_yes" name="medical_insurance_plan_card" value="Yes" <?php if($record['medical_insurance_plan_card']=='Yes') {  echo "checked"; } ?> onclick="check_cm_insurance(this.value);">                
                <label class="custom-control-label pt-1" for="medical_insurance_plan_card_yes"><span   class="notranslate">Yes</span></label> 
              </div>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="medical_insurance_plan_card_no" name="medical_insurance_plan_card" value="No" <?php if($record['medical_insurance_plan_card']=='No') {  echo "checked"; } ?> onclick="check_cm_insurance(this.value);">        
                <label class="custom-control-label pt-1" for="medical_insurance_plan_card_no"><span  class="notranslate">No</span></label>
              </div>
            </div>

            <div class="form-group cm_insurance_plan" style="display:None;">
              <label for=""><span class="notranslate">If not, you can bring it</span></label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="bring_it_yes" name="bring_it" value="Yes"  <?php if($record['bring_it']=='Yes') {  echo "checked"; } ?>>                
                <label class="custom-control-label pt-1" for="bring_it_yes"><span   class="notranslate">Yes</span></label> 
              </div>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="bring_it_no" name="bring_it" value="No"  <?php if($record['bring_it']=='No') {  echo "checked"; } ?>>        
                <label class="custom-control-label pt-1" for="bring_it_no"><span  class="notranslate">No</span></label>
              </div> 
            </div>
            
            <div class="form-group">
              <label for=""><span class="notranslate">Ready to go to any hospital in Tamil Nadu</span></label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="any_hospital_in_tamilnadu_yes" name="any_hospital_in_tamilnadu" value="Yes" <?php if($record['any_hospital_in_tamilnadu']=='Yes') {  echo "checked"; } ?>>                
                <label class="custom-control-label pt-1" for="any_hospital_in_tamilnadu_yes"><span   class="notranslate">Yes</span></label> 
              </div>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="any_hospital_in_tamilnadu_no" name="any_hospital_in_tamilnadu" value="No" <?php if($record['any_hospital_in_tamilnadu']=='No') {  echo "checked"; } ?>>        
                <label class="custom-control-label pt-1" for="any_hospital_in_tamilnadu_no"><span  class="notranslate">No</span></label>
              </div> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Will you inform us on what day and date at what time to meet doctor except on sundays</span></label>
              <input type="text" name="will_you_form"  id="will_you_form"  class="form-control" value="<?php echo $record['will_you_form'] ?>">
            </div>


            <div class="form-group">
              <label for=""><span class="notranslate">As far as possible medical treatment is done in private</span></label>
              <input type="text" class="form-control" id="medical_treatment_private" name="medical_treatment_private" value="<?php echo $record['medical_treatment_private'] ?>">
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">If cant ,treatment will be given in Government Hospital Ok</span></label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="government_hospital_yes" name="government_hospital" value="Yes" <?php if($record['government_hospital']=='Yes') {  echo "checked"; } ?>>                
                <label class="custom-control-label pt-1" for="government_hospital_yes"><span   class="notranslate">Yes</span></label> 
              </div>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="government_hospital_no" name="government_hospital" value="No" <?php if($record['government_hospital']=='No') {  echo "checked"; } ?>>        
                <label class="custom-control-label pt-1" for="government_hospital_no"><span  class="notranslate">No</span></label>
              </div> 
            </div>

        

            <center><a class="btn btn-success"   onclick="medical_help_add('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>','<?php echo $medical_help_id ?>','<?php echo $unique_no?>','<?php echo $completed_status ?>')" >Submit</a> 
          </center>
          </form>

        </div>
        </div>
      </div>
    </div>
  </div>


  <script>  
 

 
function medical_help_add(country_id,state_id,district_id,city_id,area_id,user_id,medical_help_id,unique_no,completed_status)
{ 

  if(medical_help_id!='')
  {
    var action='Update';
  }
  else
  {
    var action='ADD';
  }

  var organization_name = $("#organization_name").val();
  var city = $("#city").val();
  var entry_date = $("#entry_date").val();
  var patient_name = $("#patient_name").val();
  var age = $("#age").val();
  var gender = $("#gender").val();
  var address = $("#address").val();
  var mobile_no = $("#mobile_no").val();
  var disease_name = $("#disease_name").val();
  var coordinator_name = $("#coordinator_name").val();
  var email = $("#email").val();
  var c_mobile_no = $("#c_mobile_no").val();
  var disease_name = $("#disease_name").val();
  var medical_treatment_private=$("#medical_treatment_private").val();
  var surgery_amount = $("#surgery_amount").val();
  var amount=$("#amount").val();
  var will_you_form=$("#will_you_form").val();


  if($("#recommendation_form_yes").is(':checked'))
  {
    var recommendation_form=$("#recommendation_form_yes").val();
  }

  else if($("#recommendation_form_no").is(':checked'))
  {
    var recommendation_form=$("#recommendation_form_no").val();
  } 
  else
  {
     var recommendation_form='';
  }

  if($("#medical_report_yes").is(':checked'))
  {
    var medical_report=$("#medical_report_yes").val();
  }
  else if($("#medical_report_no").is(':checked'))
  {
    var medical_report=$("#medical_report_no").val();
  }
  else
  { 
    var medical_report='';
  }


   if($("#medical_insurance_plan_card_yes").is(':checked'))
  {
    var medical_insurance_plan_card=$("#medical_insurance_plan_card_yes").val();
  }
  else if($("#medical_insurance_plan_card_no").is(':checked'))
  {
    var medical_insurance_plan_card=$("#medical_insurance_plan_card_no").val();
  }
  else 
   {
    var medical_insurance_plan_card='';
   }

 
  if($("#surgery").is(':checked'))
  {
    var doctor_advice=$("#surgery").val();
  }
  else if($("#medicine").is(':checked'))
  {
    var doctor_advice=$("#medicine").val();
  }
  else
  { 
    var doctor_advice='';
   }


   if($("#bring_it_yes").is(':checked'))
  {
    var bring_it=$("#bring_it_yes").val();
  }
  else if($("#bring_it_no").is(':checked'))
  {
    var bring_it=$("#bring_it_no").val();
  }
  else
  { 
    var bring_it='';
   }


  if($("#any_hospital_in_tamilnadu_yes").is(':checked'))
  {
    var any_hospital_in_tamilnadu=$("#any_hospital_in_tamilnadu_yes").val();
  }
  else if($("#any_hospital_in_tamilnadu_no").is(':checked'))
  {
    var any_hospital_in_tamilnadu=$("#any_hospital_in_tamilnadu_no").val();
  }
  else
  { 
    var any_hospital_in_tamilnadu='';
  }


  if($("#government_hospital_yes").is(':checked'))
  {
    var government_hospital=$("#government_hospital_yes").val();
  }
  else if($("#government_hospital_no").is(':checked'))
  {
    var government_hospital=$("#government_hospital_no").val();
  }
  else
  { 
    var government_hospital='';
  } 

  if(patient_name=='')
  {
    alert("Please Enter Patient Name")
    $('#patient_name').focus();
  }
  else if(mobile_no=='')
  {
    alert("Please Enter Mobile Number")
    $('#mobile_no').focus();
  }
  else if(address=='')
  {
    alert("Please Enter Address")
    $('#address').focus();
  }
  else
  {
    var sendInfo = {
      entry_date: entry_date,
      patient_name: patient_name,
      age:age,
      gender:gender,
      disease_name: disease_name,
      address: address,
      mobile_no: mobile_no,
      city: city,
      organization_name: organization_name,
      coordinator_name: coordinator_name,
      email: email,
      recommendation_form : recommendation_form,
      medical_report: medical_report,
      doctor_advice: doctor_advice,      
      surgery_amount: surgery_amount,
      amount: amount,
      medical_insurance_plan_card: medical_insurance_plan_card,
      bring_it: bring_it,
      any_hospital_in_tamilnadu: any_hospital_in_tamilnadu,
      medical_treatment_private: medical_treatment_private,
      will_you_form: will_you_form,
      government_hospital:government_hospital,
      country_id:country_id,
      city_id:city_id,
      state_id:state_id,
      district_id:district_id,
      area_id:area_id,
      user_id:user_id,
      action:action,
      medical_help_id : medical_help_id,
    }; 
    $.ajax({
      url:FILE_PATH+'/medical_help/model.php',
      type:'POST',
      data: sendInfo,
      success:function(msg)
      {	  
        alert(msg)
        $("#previous_id").val('medical_help/list.php');
        $('#page_replace_div').load(FILE_PATH + '/medical_help/list.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
      } 
    });
  }
}
  
 
function medical_help_create_back(country_id,state_id,district_id,city_id,area_id,user_id,unique_no,completed_status)
{

  $("#previous_id").val('medical_help/list.php');
  $('#page_replace_div').load(FILE_PATH + '/medical_help/list.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
}

function check_cm_insurance(plan){
    if(plan=='No'){
        $(".cm_insurance_plan").show();
    }else{
        $(".cm_insurance_plan").hide();
    }
}
</script>