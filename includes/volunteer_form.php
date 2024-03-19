<?php
include( "dbConnect.php" );
error_reporting(0);
$user_id = $_GET['user_id'];
$unique_no=$_GET['unique_no'];
$country_id = $_GET['country_id'];  
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id'];
$completed_status=$_GET['completed_status'];
$user_type=$_GET['user_type'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Rights</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      .mobile-width{
        max-width: 500px;
      }
      .main {
        margin: 0 auto;
        max-width: 700px;
        height: 100px; 
      }

      .form-control:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }

      .duplicate {
        border: 2px solid red;
        box-shadow: none;
        outline: none;
        background-color: coral;
      }
    </style>
</head>
<body>
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" name="country_id" id="country_id" value="<?php echo $country_id;  ?>">
<input type="hidden" name="state_id" id="state_id" value="<?php echo $state_id;  ?>">
<input type="hidden" name="district_id" id="district_id" value="<?php echo $district_id;  ?>">
<input type="hidden" name="city_id" id="city_id" value="<?php echo $city_id;  ?>">
<input type="hidden" name="area_id" id="area_id" value="<?php echo $area_id;  ?>">

    <h3 class="text-center pt-4 pb-4">Enter Mobile Number to Generate OTP</h3>
    <div class="container main">
        <form name="add_mobile" id="add_mobile">
          <div id="dynamic_field">
            <div class="input-group mb-3">
              <input type="tel" class="form-control mr-3 mobile-width mobile" id="mobile_number[0]" name="mobile_number[0]"  placeholder="Enter Mobile Number" maxlength="10" onkeypress="return IsNumeric(event);">
              <div class="input-group-append">
                <button class="btn btn-success add" type="button" onclick="mobile_add();">Add More</button>
              </div>
            </div>
          </div>
            <button type="button" name="submit" id="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="count" id="count" value="">
            
               
          </form>
         <?php
        $otp_no = $pdo_conn->prepare("SELECT otp from volunteer_otp order by otp_id desc limit 0,1");
        $otp_no->execute();
        $otp = $otp_no->fetchall();
    ?>
    
    <strong>
        <div align="center" id='mobile_otp' style="display:None;font-size:20px"></div> 
    </strong>
    
    </div>

</body>
</html>

<script>

  user_id = $("#user_id").val();
  country_id = $("#country_id").val();
  state_id = $("#state_id").val();
  district_id = $("#district_id").val();
  city_id = $("#city_id").val();
  area_id = $("#area_id").val();

$(document).ready(function(){
  for(j=0; j<4; j++)
  {
    mobile_add(); 
  }
});

var specialKeys = new Array();
specialKeys.push(8); //Backspace
function IsNumeric(e) 
{
var keyCode = e.which ? e.which : e.keyCode
var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
return ret;
}

var i =0;
function mobile_add(){
  i++;
  $("#dynamic_field").append(
    '<div class="input-group mb-3" id="row'+i+'">'+
      '<input type="tel" class="form-control mr-3 mobile-width mobile" id="mobile_number['+i+']" name="mobile_number['+i+']"  placeholder="Enter Mobile Number" maxlength="10" onkeypress="return IsNumeric(event);">'+
        '<div class="input-group-append">'+
          '<button class="btn btn-danger btn_remove" id="'+i+'" type="button">'+
              '<i class="fa fa-times" aria-hidden="true"></i>'+
          '</button>'+
        '</div>'+
   '</div>');

  var count = $(".mobile").length; 
  // alert("Total count is:" + count);
  $("#count").val(count);
}


$(document).on('click', '.btn_remove', function(){
  var button_id = $(this).attr("id");   
  
  $('#row'+button_id+'').remove();    
  var count = $(".mobile").length; 
  
  $("#count").val(count);
}); 

$('#submit').click(function(){

  var i_value=$("#count").val();
  var check_count=0;
  var obj = {};

    $(".mobile").each(function()
    {
      var mobile_number=$(this).val();
      var regex = /^[1-9]\d{9}$/;

      if(mobile_number=='')
      {
        alert("please enter mobile number");
        $(this).focus();
        return false;
      }

      else if(regex.test(mobile_number) === false)
      {       
        alert("Please enter a valid 10 digit phone number (only numbers)");
        $(this).focus();
        return false;
      }

      else if(obj.hasOwnProperty(this.value)) 
      {
        console.log(obj.hasOwnProperty(this.value));
        alert("All mobile numbers should be unique");
        $(this).addClass("duplicate");
        $(this).focus();
        $(this).css('background', 'pink');  
        return false;
      }

      else
      {
        $(this).removeClass("duplicate");
        $(this).css('background', 'none'); 
        obj[this.value] = this.value; 
        check_count++;
      }

    });

    if(check_count==i_value)
    {
	    var user_id = '<?php echo $user_id; ?>';
        var country_id = '<?php echo $country_id; ?>';
        var state_id = '<?php echo $state_id; ?>';
        var district_id = '<?php echo $district_id; ?>';
        var city_id = '<?php echo $city_id; ?>';
        var area_id = '<?php echo $area_id; ?>';
        var user_type = '<?php echo $user_type; ?>';
        var unique_no = '<?php echo $unique_no; ?>';
        var completed_status = '<?php echo $completed_status; ?>';
      $.ajax({
      url:FILE_PATH+'/volunteer_otp.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&user_type='+user_type+'&unique_no='+unique_no+'&completed_status='+completed_status,
      method:"POST",
      data:$('#add_mobile').serialize(),
        success:function(msg)
        {
            //alert(msg);
            $('#mobile_otp').text(msg);
            $('#mobile_otp').show();
            // var unique_no='<?php echo $unique_no ?>';
            // var user_id = $("#user_id").val();
            // var country_id = $("#country_id").val();
            // var state_id = $("#state_id").val();
            // var district_id = $("#district_id").val();
            // var city_id = $("#city_id").val();
            // var area_id = $("#area_id").val();
            // var completed_status='<?php echo $completed_status ?>';
        //   $('#page_replace_div').load(FILE_PATH+'/survey1.php?unique_no='+unique_no+'&user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&completed_status='+completed_status);
        }
      });
    }
});
</script>
 
