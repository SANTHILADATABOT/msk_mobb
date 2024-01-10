<?php
include( "dbConnect.php" );


//echo "SELECT * FROM registration where register_id='".$_GET['register_id']."' and delete_status='0'  ";
$login_main = $pdo_conn->prepare("SELECT * FROM registration where register_id='".$_GET['register_id']."'and delete_status='0'  ");
  $login_main->execute();
  $login_main_check = $login_main->fetch();
   $otp_number=$login_main_check['otp_number'];
//echo $otp_number;

?>
<div class="form-group">
<!--<label for="">Password / OTP</label>-->
<i class="icon-key icons"></i>
<input type="text" class="form-control" id="otp_number" name="otp_number" placeholder="Password / OTP">		
</div>
<div class="container-login100-form-btn m-b-28">
<?php //echo $_GET['register_id'];?>
<div class="wrap-login100-form-btn">
<div class="login100-form-bgbtn"></div>
<a onClick="get_otp('<?php echo $_GET['register_id']; ?>')"class="login100-form-btn">

Login

</a> 
</div>
</div>

<script>
function get_otp(register_id)
{
	var otp_number=$("#otp_number").val();
	//alert(register_id);
	var sendInfo = {	otp_number:otp_number,	};
	$.ajax({
		url:FILE_PATH+'/loginform.php?action=otp_check'+'&register_id='+register_id,
		type:'GET',
		data: sendInfo,
		timeout:60000,
		success:function(data)
		{	
		    //alert(data);
			var trim_value=data.trim();
			if(trim_value=="1")
		{
			$("#previous_id").val('survey1.php');							
			$('#page_replace_div').load(FILE_PATH+'/survey1.php');
		}
	
		else
		{
			alert("Inccorrect OTP");
		}
	}
	});
}
</script>