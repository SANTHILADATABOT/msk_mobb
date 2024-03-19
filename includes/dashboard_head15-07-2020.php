<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );

$user_id = $_GET['user_id']; 
$country_id = $_GET['country_id'];  
$state_id = $_GET['state_id'];  
$district_id = $_GET['district_id'];  
$city_id = $_GET['city_id']; 
$area_id = $_GET['area_id'];  
$user_type=$_GET['user_type'];

?>
<style>
  .wrapper.homepage {
    padding-bottom: 0px;
  }

  input.form-control {
    padding-left: 40px;
  }

  .bt-color {
    background-color: #282c93;
    color: #ffffff;
  }

  .bt-color:hover {
    color: #ffffff;
  }
</style>

<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;  ?>">
<input type="hidden" name="country_id" id="country_id" value="<?php echo $country_id;  ?>">
<input type="hidden" name="state_id" id="state_id" value="<?php echo $state_id;  ?>">
<input type="hidden" name="district_id" id="district_id" value="<?php echo $district_id;  ?>">
<input type="hidden" name="city_id" id="city_id" value="<?php echo $city_id;  ?>">
<input type="hidden" name="area_id" id="area_id" value="<?php echo $area_id;  ?>">


<div id="contents" class="content-faded">
  <div class="container h-100 animated bounceInLeft"
    style="background-image: url('img/login_bg1.jpg'); background-size: cover;">
    <div class="pt-5">
      <div class="align-self-center mx-auto">
        <div class="voln_img"> <img src="img/vo.png">
          <button type="button" class="btn btn-volu" onClick="get_survey_area()">
            <span class="notranslate"> Survey Area</span>
          </button>
        </div>
      </div>
    </div>

             <!-- <i class="fa fa-microphone create" onclick="door_recognize()"></i>
                <i class="fa fa-times create" aria-hidden="true" onclick="erase(1)"></i>
                 <input type="text" class="form-control" id="door_no" name="door_no">-->
    <div class="mt-4 mb-5">
      <div class="align-self-center mx-auto">
        <div class="voln_img"> <img src="img/sur.png">
          <button type="button" class="btn btn-volu" onclick="page_replace('reports_dashboard.php','sidebar-left','active-sidebar-box')" >
            <span class="notranslate"> Dashboard </span>
          </button>
        </div>
      </div>
    </div>

    <div class="mt-4 mb-5">
      <div class="align-self-center mx-auto">
        <div class="voln_img"> <img src="img/sur.png">
          <button type="button" class="btn btn-volu" onclick="page_replace('survey_report/list.php','sidebar-left','active-sidebar-box')">
            <span class="notranslate"> Survey Reports </span>
          </button>
        </div>
      </div>
    </div>
<?php 
if($user_type!='6') { ?>
    <div class="mt-4 mb-5">
      <div class="align-self-center mx-auto">
        <div class="voln_img"> <img src="img/sur.png">
          <button type="button" class="btn btn-volu" onclick="page_replace('areawise_survey_report/list.php','sidebar-left','active-sidebar-box')">
            <span class="notranslate"> Area Wise Reports </span>
          </button>
        </div>
      </div>
    </div>
<?php } ?>

  </div>
</div>

<script src="wysihtml5-0.3.0"></script>
<script>
function get_survey_area() 
{
  var user_id = $("#user_id").val();   
  $("#previous_id").val('head_form.php');
  $('#page_replace_div').load(FILE_PATH + '/head_form.php?user_id='+user_id);
}

function get_reports_form() 
{
  var user_id = $("#user_id").val();   
  $("#previous_id").val('survey1.php');
  $('#page_replace_div').load(FILE_PATH + '/reports_dashboard.php?user_id='+user_id);
}
 
 function door_recognize() 
{
	var maxMatchess = 1;
	var promptStrings = "Speak now";	
	var languages = "ta-IN";	
	    
	window.plugins.speechrecognizer.startRecognize(function(result){
alert(promptStrings);
	door_no.value =door_no.value+" "+result;
	alert(door_no.value);
	}, function(errorMessage){
	console.log("Error message: " + errorMessage);
	}, maxMatchess, promptStrings, languages);
} 

function erase(data)
{
	if(data==1)
	{
		$('#studentname').val('');
	}
	else if(data==2)
	{
		$('#height').val('');
	}
	else if(data==3)
	{
		$('#weight').val('');
	}
	else if(data==4)
	{
		$('#parent_name').val('');
	}
	else
	{
		$('#address').val('');
	}
}

</script>