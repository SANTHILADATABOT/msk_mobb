<?php
error_reporting(0);
 $register_id = $_GET['register_id']; ?>

<html>  
      <head>  
           <title>Survey Form</title>  
           <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
      </head>
        
      <body>  
           <div class="container">  
                <br/>  
                <br/>  
                <h3 style="text-align:center;">Enter Mobile Number to Generate OTP</h3>  
                <div class="form-group">  
                     <form name="add_mobile" id="add_mobile">  
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                         <td>
                                             <input type="tel" id="mobile_number1" id="mobile_number[0]" name="mobile_number[0]"   placeholder="Enter Mobile Number" class="form-control name_list" maxlength="10" onkeypress="return IsNumeric(event);" />
                                        </td> 

                                         <td>
                                             <button type="button" name="add" id="add" class="btn btn-success" onclick="mobile_add();">Add More</button>
                                         </td>  
                                    </tr> 
                               </table>  
                               <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit"/>

                          </div>  
                          <input type="text" name="count" id="count" value="">
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script> 
var nums = [];

$(document).ready(function(){
for(j=0; j<4; j++)
{
  mobile_add();
}
});

 var specialKeys = new Array();
specialKeys.push(8); //Backspace
function IsNumeric(e) {
    var keyCode = e.which ? e.which : e.keyCode
    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
    return ret;
}



var i=0;  
// var k=0;
function mobile_add(){
    i++;  

$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="tel" name="mobile_number['+i+']" id="mobile_number['+i+']" placeholder="Enter Mobile Number" class="form-control name_list" maxlength="10" onkeypress="return IsNumeric(event);"/><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
 
var count=$('.name_list').length;
$('#count').val(count);
    }

 
$(document).on('click', '.btn_remove', function(){
  var button_id = $(this).attr("id");   
  $('#row'+button_id+'').remove();  
  var count=$('.name_list').length;
  $('#count').val(count);
});  



$('#submit').click(function(){
  var i_value=$("#count").val();
  var check_count=0;
// alert(i_value);
  
   $(".name_list").each(function(){
  
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
    
    else
    { 
       check_count++;
    }
 
  });
alert("value of: " +  check_count);
alert("value of: " +  i_value);
    if(check_count==i_value)
    {
     $.ajax({
      url:FILE_PATH+'/volunteer_otp.php?register_id=<?php echo $register_id; ?>',
      method:"POST",
      data:$('#add_mobile').serialize(),
      success:function(data)
      {
       alert(data);
       $('#page_replace_div').load(FILE_PATH+'/volunteer_form.php');
      }
    });
  }
  
});

 </script>