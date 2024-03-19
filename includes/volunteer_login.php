<?php

date_default_timezone_set('Asia/Kolkata');
header('Access-Control-Allow-Origin: *'); 
include("dbConnect.php");
?>

<?php
//echo "SELECT * FROM  volunteer_otp WHERE unique_no='".$random_no."'";
$place = $pdo_conn->prepare("SELECT * FROM  volunteer_otp WHERE unique_no='".$random_no."' ");
$place->execute();
$result=$place->fetch();

?>

<style>
input.form-control {
    padding-left: 46px;
}
.form-control {  font-family: Poppins-Regular_0 !important; }
.wrapper.homepage {
    padding-bottom: 0px;
}
</style>


<div class="container-login100 animated bounceInLeft" style="background-image: url('img/login_bg1.jpg'); background-size: cover;">
  <div class="row"> 
    
    <!--<div class="col-md-12 mb-5 mt-2 login_logo"><img src="img/msk-logo.png" alt="MSK Logo" style="float: right;margin-right: 17px;
    margin-top: 12px;">  </div>-->
    <div class="col-md-12 mb-3 mt-2 login_logo">
      <center>
        <img src="img/msk-logo.png" alt="MSK Logo" style="">
      </center>
    </div>
    <div class="col-12">
      <center>
        <h4 class="login_head"><span class="notranslate">WELCOME TO MSK</span></h4>
      </center>
    </div>
    <div class="col-12">
      <center>
        <h5 class="small_login_head pb-4"><span class="notranslate">Fact Finding Form </span>- <span class="tamil_font_small_login"><span class="translate">மக்கள் நிலைப் பதிவேடு </span></span></h5>
      </center>
    </div>
    
    <form class="login_form col-md-12">
      <div class="form-group"> 
        <!--<label for="">Username / Mobile Number </label>--> 
        <i class="icon-user icons"></i>
        <input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" placeholder="Enter Mobile Number" onkeypress="return IsNumeric(event);">
      </div>
      <div class="form-group"> 
        <!--<label for="">Password / OTP</label>--> 
        <i class="icon-key icons"></i>
        <input type="text" class="form-control" id="otp" name="otp" maxlength="6" placeholder="Enter OTP" onkeypress="return IsNumeric(event);">
      </div>

	  
      <div class="container-login100-form-btn m-b-28">
        <div class="wrap-login100-form-btn">
          <div class="login100-form-bgbtn"></div>
          <a onClick="check_volunteer_login()" class="login100-form-btn"><span class="notranslate"> Login</span> </a> </div>
      </div>
    </form>
  </div>
</div>


<script type="text/javascript">

var specialKeys = new Array();
specialKeys.push(8); //Backspace
function IsNumeric(e) 
{
var keyCode = e.which ? e.which : e.keyCode
var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
return ret;
}

function check_volunteer_login( )
{
	if($("#mobile").val() == '')
	{
		alert("Please Enter Mobile Number");
		$("#mobile").focus();
		return false;
	}

	if($("#otp").val() == '')
	{
		alert("Please Enter OTP");
		$("#otp").focus();
		return false;
	}

	$("#previous_id").val('dashbord.php'); 
	var mobile=$("#mobile").val();
	var otp=$("#otp").val();
	var sendInfo = {
	mobile:mobile,
	otp:otp,

	};

	console.log(sendInfo);


	$.ajax({
	url:FILE_PATH+'/volunteer_model.php?action=volunteer_login',
	type:'GET',
	data: sendInfo,
	timeout:60000,
	success:function(datas)
	{	  
		//alert(datas);   
	var data_trim = datas.trim();
	var data_split = data_trim.split("@@");
	console.log(data_split[5]);    
	var country_id = data_split[0]; 

	var state_id = data_split[1];
	var district_id = data_split[2];
	var city_id = data_split[3];
	var area_id = data_split[4];
	var user_id = data_split[6]; 
	var user_type = data_split[7]; 
	var unique_no = data_split[8]; 
	
	if(data_trim!='0')
	{
	    window.localStorage.setItem("unique_no",unique_no);
        window.localStorage.setItem("user_id",user_id);
        window.localStorage.setItem("country_id",country_id);
        window.localStorage.setItem("state_id",state_id);
        window.localStorage.setItem("district_id",district_id);
        window.localStorage.setItem("city_id",city_id);
        window.localStorage.setItem("area_id",area_id);
        window.localStorage.setItem("user_type",user_type);

		//alert(user_id);
		$("#page_replace_div").load(FILE_PATH+'/survey1.php?user_id='+user_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&country_id="+country_id+"&user_type="+user_type+"&unique_no="+unique_no);
		$("#notifications_icon").show();
	}
	else
	{
		alert("invalid login credentials");
	}
	} 
	});

}
	
</script>