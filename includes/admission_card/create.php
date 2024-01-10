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
$admission_card_id=$_GET['admission_card_id'];
$unique_no=$_GET['unique_no'];
$completed_status=$_GET['completed_status']; 
$admission_card = $pdo_conn->prepare("SELECT * FROM  admission_card WHERE  admission_card_id='".$admission_card_id."'");
$admission_card->execute(); 
$record = $admission_card->fetch();

$id_number = $pdo_conn->prepare("SELECT * FROM admission_card ORDER BY admission_card_id DESC LIMIT 1;");
$id_number->execute(); 
$id_number_last = $id_number->fetch();


if($admission_card_id!='')
{
	$id=$record['id_number'];	
}
else
{
	$id=$id_number_last['id_number']+1;
}
?>



<style>
  input.form-control {padding-left: 40px;}
</style>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->

<div class="wrapper homepage">
    
    
    <div class="container-fluid"  >
	<div class="row over-jobapp-div">
	        <div class="col-8 job-for ">
			<a>Admission Card Form</a> 
			</div> 
		    <div class="col-2 add-list ">
	 		</div>
			<div class="col-2 add-list">
			<i class="fa fa-arrow-circle-left arrow_back" onClick="admission_card_create_back('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>','<?php echo $unique_no  ?>','<?php echo $completed_status ?>')"></i> 
			</div> 
			</div>
	</div>

  <!--<div class="container-fluid" style="padding:0px;">
  <div class="row">
 
  <div class="col-md-8 top_left" style="padding-left:6px;">
  <h3><span class="notranslate">Admission Form</span></h3> 
  </div>
  <div class="col-md-2 top_left">

  

  </div>
  <div class="col-md-2 top_left">
  <i class="fa fa-arrow-circle-left arrow_back" onClick="admission_card_create_back('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>')"></i>    </div> 
  </div>                                         
   </div>---->
   
  <div class="sub_bg animated bounceInLeft">

    <div class="container">
      <div class="row">
        <div class="col-md-12 survey_content">
          <form class="login_form">
            <div class="row">
            	<div class="col-md-3">
		            <div class="form-group">
		              <label for=""><span class="notranslate">Token No</span></label>              
		              
		          	</div>
	            </div>
	            <div class="col-md-5">
		            <div class="form-group">
		            	<input type="text"   id="token_id" name="token_id" class="form-control" value="<?php echo $record['token_id'] ?>" > 
		            </div>
		        </div>
		         <div class="col-md-3" style="margin-top: 5px;">
		            <div class="form-group">
		            	<label for=""><span class="notranslate">ID Number : <?php echo $id; ?></span></label>
              			<input type="hidden"   id="id_number" name="id_number" class="form-control" value="<?php echo $id; ?>" > 
		            </div>
		        </div>
	        </div>
           
         
            <div class="form-group">
              <label for=""><span class="notranslate">Patient Name</span></label>
              <input type="text" class="form-control" id="patient_name" name="patient_name" value="<?php echo $record['patient_name'] ?>"> 
            </div>

            
            <div class="form-group">
              <label for=""><span class="notranslate">Address</span></label>
              <textarea  class="form-control" id="address" name="address"><?php echo $record['address'] ?></textarea>              
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Phone No</span></label>
              <input type="number" class="form-control" id="mobile_no" name="mobile_no"  maxlength="10" onkeypress="return IsNumeric(event);"  value="<?php echo $record['mobile_no'] ?>"> 
            </div>
<label><strong><u>Hospital Details</u></strong></label>

            <div class="form-group" style="margin-top: 15px;">
              <label for=""><span class="notranslate">Appointment Date and Time</span></label>
              <input type="datetime-local" class="form-control" id="appointment" name="appointment"
                  value="<?php echo $record['appointment']; ?>">
            </div>
            
            <div class="form-group" style="margin-top: 15px;">
              <label for=""><span class="notranslate">Hospital Name</span></label>
              <input type="text" class="form-control" id="hospital_name" name="hospital_name"  value="<?php echo $record['hospital_name'] ?>"> 
            </div>
            
            <div class="form-group" style="margin-top: 15px;">
              <label for=""><span class="notranslate">Hospital Name</span></label>
              <input type="text" class="form-control" id="hospital_name" name="hospital_name"  value="<?php echo $record['hospital_name'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Contact Person</span></label>
              <input type="text" class="form-control" id="contact_person" name="contact_person"  value="<?php echo $record['contact_person'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Phone Number</span></label>
              <input type="number" class="form-control" id="phone_number" name="phone_number" maxlength="10" onkeypress="return IsNumeric(event);"  value="<?php echo $record['phone_number'] ?>"> 
            </div>

           

            <div class="form-group">
              <label for=""><span class="notranslate">Way To Hospital</span></label>
              <input type="text" class="form-control" id="landmark" name="landmark"  value="<?php echo $record['landmark'] ?>"> 
            </div>
        
<center>
            <a class="btn btn-success"   onclick="admission_card_add('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>','<?php echo $admission_card_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')" >Save</a> 

            </center>

          </form>


<div class="box_class">
	<center>
	<label><strong> OFFICE CONTACT : 0424 - 4061617,8695725780,8695025780,9842725780</strong></label><br>
	<label><strong>WE DONT HAVE MONEY TO PAY GENEROUSLY,BUT WE HAVE OPEN HEART TO GUIDE YOU</strong></label>
	
</center>
</div>
        </div>
        </div>
      </div>
    </div>
  </div>


  <script>  
 

 
function admission_card_add(country_id,state_id,district_id,city_id,area_id,user_id,admission_card_id,unique_no,completed_status)
{ 

  if(admission_card_id!='')
  {
    var action='Update';
  }
  else
  {
    var action='ADD';
  }

  var token_id = $("#token_id").val();
  var id_number = $("#id_number").val();
  var patient_name = $("#patient_name").val();
  var address = $("#address").val();
  var mobile_no = $("#mobile_no").val();
  var appointment = $("#appointment").val();
  var hospital_name = $("#hospital_name").val();
  var contact_person	 = $("#contact_person").val();
  var phone_number = $("#phone_number").val();
  var landmark = $("#landmark").val();

  if(token_id=='')
  {
    alert("Please Enter Token ID")
    $('#patient_name').focus();
  }
  else if(id_number=='')
  {
    alert("Please Enter ID Number")
    $('#mobile_no').focus();
  }
  else if(patient_name=='')
  {
    alert("Please Enter Patient Name")
    $('#address').focus();
  }
  else
  {
    var sendInfo = {
      token_id: token_id,
      patient_name: patient_name,
      id_number:id_number,
      address: address,
      mobile_no: mobile_no,
      appointment: appointment,
      hospital_name: hospital_name,
      contact_person: contact_person,
      phone_number: phone_number,
      landmark: landmark,
      country_id:country_id,
      city_id:city_id,
      state_id:state_id,
      district_id:district_id,
      area_id:area_id,
      user_id:user_id,
      action:action,
      admission_card_id : admission_card_id,
    }; 
    $.ajax({
      url:FILE_PATH+'/admission_card/model.php',
      type:'POST',
      data: sendInfo,
      success:function(msg)
      {	  
        alert(msg)
        $("#previous_id").val('admission_card/list.php');
        $('#page_replace_div').load(FILE_PATH + '/admission_card/list.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
      } 
    });
  }
}
  
 
function admission_card_create_back(country_id,state_id,district_id,city_id,area_id,user_id,unique_no,completed_status)
{

  $("#previous_id").val('admission_card/list.php');
  $('#page_replace_div').load(FILE_PATH + '/admission_card/list.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
}
</script>

<style type="text/css">
	.box_class
{	
  width: 100%;
  height: 50px;
  border: 1px solid black;
  padding: 7px;
  margin: 20px;

}

</style>