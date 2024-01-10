<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );

$sess_user_id = $_GET[ 'sess_user_id' ];
$sess_usertype_id = $_GET[ 'sess_usertype_id' ];
$unique_no=$_GET['unique_no'];
$user_id=$_GET['user_id'];
$crt_month = date( 'Y-m' );
$current_date = date( 'Y-m-d' );
?>

<?php $user_id = $_GET['user_id']; ?>

<?php 
$prepare = $pdo_conn->prepare("SELECT * FROM country WHERE delete_status!='1' and status='1'");
$prepare->execute();
$country_list = $prepare->fetchall();
?>

<style>
.wrapper.homepage {padding-bottom: 0px;}
 input.form-control {padding-left: 40px;}
.bt-color {background-color: #282c93; color: #ffffff;}
.bt-color:hover {color: #ffffff;}

</style>



<div class="wrapper homepage">

  <div class="head_line">
    <h5><span class="notranslate">Add Survey Area</span><span class="tamil_font_small"></span> </h5>
  </div>

  <div class="sub_bg animated bounceInLeft">

    <div class="container">
      <div class="row">
        <div class="col-md-12 survey_content">
          <form id="login_form" class="login_form">
              
             
            
              <div class="form-group">
              <select class="select2 form-control" id="country_id" name="country_id" onchange="state_list(country_id.value)">
                <option value=""><span class="notranslate">Select your Country</span><span class="notranslate"></option>
                    <?php foreach($country_list as $value) : ?>
                        <option value="<?php echo $value['country_id']?>"><?php echo $value['country_name']?></option>
                    <?php endforeach; ?>
              </select>
            </div>
            
            <div class="form-group">
                
              <select class="form-control select2" id="state_id" name="state_id" onchange="dist_list(country_id.value,state_id.value)">
                <option value=""><span class="notranslate">Select your State</span><span class="notranslate"></option>
              </select>
            </div>

            <div class="form-group">
                <select class="form-control select2" id="district_id" name="district_id" onchange="city_list(country_id.value,state_id.value,district_id.value,city_id.value)">
                  <option value=""><span class="notranslate">Select your District</span><span class="notranslate"></option>
                </select>
              </div>

              <div class="form-group">
                <select class="form-control select2" id="city_id" name="city_id" onchange="area_list(country_id.value,state_id.value,district_id.value,city_id.value,area_id.value)">
                  <option value=""><span class="notranslate">Select your City</span><span class="notranslate"></option>
                </select>
              </div>

              
              <div class="form-group">
                <select class="form-control select2" id="area_id" name="area_id">
                  <option value=""><span class="notranslate">Select your Area</span><span class="notranslate"></option>
                </select>
              </div>

              <button type="button" name="submit" id="submit" class="btn bt-color" onclick="validate_help()">Submit</button>
              <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;  ?>">
        
          </form>

        </div>
        </div>
      </div>
    </div>
  </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script>
	

$(".select2").select2();

var specialKeys = new Array();
specialKeys.push(8); //Backspace
  function IsChar(e) {
  var keyCode = e.which ? e.which : e.keyCode
  var ret = ((keyCode > 64 && keyCode < 91) || (keyCode > 96 && keyCode < 123));
  return ret;
  }

var specialKeys = new Array();
specialKeys.push(8); //Backspace
  function IsNumeric(e) 
  {
  var keyCode = e.which ? e.which : e.keyCode
  var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
  return ret;
  }



function state_list(country_id)
  {
	//alert(country_id);
	  jQuery.ajax({
	  type: "POST",
	  url: FILE_PATH+'/common_function.php',
	  data: "country_id="+country_id+"&action="+"state_list",
		  success: function(msg){ 
          // alert(msg);
          $("#state_id").html(msg);
          $("#select2-city_id-container").html('Select your City');
          $("#select2-district_id-container").html('Select your District');
          $("#select2-area_id-container").html('Select your Area');
		  }
	  });
  }


function dist_list(country_id,state_id)
{
  //alert(country_id)
	jQuery.ajax({
	type: "POST",
	url: FILE_PATH+'/common_function.php',
	data: "state_id="+state_id+"&country_id="+country_id+"&action="+"district_list",
		success: function(msg){ 
			    // alert(msg);
          $("#district_id").html(msg);
          $("#select2-city_id-container").html('');
          $("#select2-city_id-container").html('Select your City');
          $("#select2-area_id-container").html('Select your Area');
		}
	});
}

function city_list(country_id,state_id,district_id,city_id)
{
	//alert(state_id);
	jQuery.ajax({
	type: "POST",
	url: FILE_PATH+'/common_function.php',
	data: "country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&action="+"city_list",
		success: function(msg){ 
        // alert(msg);
        $("#city_id").html(msg);
        $("#select2-area_id-container").html('Select your Area');
		}
	});	
}

function area_list(country_id,state_id,district_id,city_id,area_id)
{
	// alert(area_id);
	jQuery.ajax({
	type: "POST",
	url: FILE_PATH+'/common_function.php',
	data: "country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+area_id+"&area_id="+area_id+"&action="+"area_list",
	success: function(msg){ 
	// alert(msg);
	$("#area_id").html(msg);
	}
	});	
}

function validate_help()
{

	/*if($("#name").val() == '')
	{
		$("#name").focus();
		alert("Please enter your name");
		return false;
	}

	if($("#mobile_number").val() == '')
	{
		$("#mobile_number").focus();
		alert("Please enter your mobile number");
		return false;
	}*/

	if($("#country_id").val() == '')
	{
		$("#country_id").focus();
		alert("Please select your country");
		return false;
	}

	if($("#state_id").val() == '')
	{
		$("#state_id").focus();
		alert("Please select your state");
		return false;
	}

	if($("#district_id").val() == '')
	{
		$("#district_id").focus();
		alert("Please select your district");
		return false;
	}

	if($("#city_id").val() == '')
	{
		$("#city_id").focus();
		alert("Please select your city");
		return false;
	}

	if($("#area_id").val() == '')
	{
		$("#area_id").focus();
		alert("Please select your area");
		return false;
	}
	
	var user_id = $("#user_id").val(); 
	/*var name = $("#name").val();
	var mobile = $("#mobile_number").val();
*/	var country_id = $("#country_id").val();
	var state_id = $("#state_id").val();
	var district_id = $("#district_id").val();
	var city_id = $("#city_id").val();
	var area_id = $("#area_id").val();
	var unique_no='<?php echo $unique_no ?>';


	//console.log(`country is: ${$("#country_id").val()} and state is ${$("#state_id").val()} and district is ${$("#district_id").val()} and city is ${$("#city_id").val()} and area is ${$("#area_id").val()}`);

	var sendInfo = {
	/*name:name,
	mobile:mobile,*/
	country_id:country_id,
	state_id:state_id,
	district_id:district_id,
	city_id:city_id,
	area_id:area_id
	};



	$.ajax({
	url:FILE_PATH+'/head_model.php?action=insert',
	type:'GET',
	data: sendInfo,
	success:function(msg)
	{	  
		// alert(msg);  
		$("#contents").removeClass("content-faded");
		$("#contents").addClass("content-show");
		$("#login_form")[0].reset();
		$("#select2-country_id-container").html('Select your Country');
		$("#select2-state_id-container").html('Select your State');
		$("#select2-city_id-container").html('Select your City');
		$("#select2-district_id-container").html('Select your District');
		$("#select2-area_id-container").html('Select your Area');
		$("#page_replace_div").load(FILE_PATH+'/dashboard.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no);
		
        $( "#home_icon" ).show();
        $( "#notifications_icon" ).show();
	} 
	});
}

</script>