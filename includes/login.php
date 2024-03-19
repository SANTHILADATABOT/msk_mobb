<?php

date_default_timezone_set('Asia/Kolkata');
header('Access-Control-Allow-Origin: *'); 
include("dbConnect.php");
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
        <input type="text" class="form-control" id="username" name="username" placeholder="Username / Mobile Number ">
      </div>
      <div class="form-group"> 
        <!--<label for="">Password / OTP</label>--> 
        <i class="icon-key icons"></i>
        <input type="text" class="form-control" id="password" name="password" placeholder="Password / OTP" required>
      </div>

	  
      <div class="container-login100-form-btn m-b-28">
        <div class="wrap-login100-form-btn">
          <div class="login100-form-bgbtn"></div>
          <a onClick="get_login()" class="login100-form-btn"><span class="notranslate"> Login</span> </a> </div>
      </div>
    </form>
  </div>
</div>


<script type="text/javascript">
  $("#homeclass").remove();
//$('.fa fa-home').removeClass();
function get_login( )
{	
//alert(); 
$("#previous_id").val('dashbord.php'); 
	var username=$("#username").val();
	var password=$("#password").val();
	
	if((username!='')&&(password!=''))
	{
  var token_id = window.localStorage.getItem("tokenid");
  // alert("Token id is: " + token_id);
	// var register_id=$("#register_id").val();
	var sendInfo = {
		username:username,
		password:password, 
    token_id: token_id
	};
	$.ajax({
		url:FILE_PATH+'/loginform.php?action=login',
		type:'GET',
		data: sendInfo,
		timeout:60000,
		success:function(data)
		{	
//alert(data);
            var data_trim=data.trim();
            var data_split=data_trim.split("@@");
            var user_id=data_split[0];
            var country_id=data_split[1];
            var state_id=data_split[2];
            var district_id=data_split[3];
            var city_id=data_split[4];
            var area_id=data_split[5];
            var user_type=data_split[6];
            var unique_no=data_split[7];
            //alert('sss'+user_id);
            window.localStorage.setItem("unique_no",unique_no);
            window.localStorage.setItem("user_id",user_id);
            window.localStorage.setItem("country_id",country_id);
            window.localStorage.setItem("state_id",state_id);
            window.localStorage.setItem("district_id",district_id);
            window.localStorage.setItem("city_id",city_id);
            window.localStorage.setItem("area_id",area_id);
            window.localStorage.setItem("user_type",user_type);
            
            if(data_split!='0')
            {	
                page_replace('dashboard_head.php','sidebar-left','active-sidebar-box');
                // $("#page_replace_div").load(FILE_PATH+'/otp.php?register_id='+register_id);
                //$("#page_replace_div").load(FILE_PATH+'/dashboard_head.php?user_id='+user_id+'&unique_no='+unique_no);
                $( "#home_icon" ).show();
                $( "#notifications_icon" ).show();

            } 
            else
            {
                alert("Invalid Login");
            }
		} 
	
	});
}
else

{
    alert("Enter Username And Password");
}
}
	
</script>