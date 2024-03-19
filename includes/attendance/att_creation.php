<?php
include("../dbConnect.php");
$sess_user_id=$_GET['sess_user_id']; 
$sess_usertype_id=$_GET['sess_usertype_id'];

$year=date('Y');
$date=date("Y");
$st_date=substr($date,2);
$month=date("m");
$day=date("d");	   
$datee=$st_date.$month.$day; 
	
	//$rs1=mysql_query("select attendance_no from attendance_entry order by att_id desc");
	
	$login = $pdo_conn->prepare("select attendance_no from attendance_entry order by att_id desc");
	$login->execute();	
	$login_count = $login->fetch();
	
	if($res1=$login_count)
	{
		$pur_array=explode('-',$res1['attendance_no']);	
	   	$year1=$pur_array[1];
        $year2=substr($year1, 0, 2);
	    $year='20'.$year2;
		$enquiry_no=$pur_array[2];
	}
	if($enquiry_no=='')
		$enquiry_nos='ATN-'.$datee.'-0001';
	elseif($year!=date("Y"))
		$enquiry_nos='ATN-'.$datee.'-0001';
	else
	{
		$enquiry_no+=1;
		$enquiry_nos='ATN-'.$datee.'-'.str_pad($enquiry_no, 4, '0', STR_PAD_LEFT);
	}

$date=date("Y");
$month=date("m");
$year=date("d");
$hour=date("h");
$minute=date("i");
$second=date("s");
$random_sc = date('dmyhis');
$random_no = rand(00000, 99999);
$time_date=date('d-m-Y').'T'.date('H:i');
$get_att_time=date('d-m-Y h:i: a', strtotime($time_date));
?>
<script>hide_dialog();</script>

 <!------------------------------------------------------------------ Popup --------------------------------------------------------->
<style>
.errorClass {border: 2px solid red !important;}
.successClass {border: 2px solid green !important;}
#fonte{font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size:16px; color:#333; font-weight:500;}
.bottome1{ border-bottom:none !important;}
.bottome{ border-bottom:1px solid #ccc !important;}
.pade{ padding:8px 15px !important;}
.right{ border-right:none;}
.top{border:1px solid #fff;}
#h33{font-size:18px; font-family:arial; color:#fff; padding-top:15px; padding-left:15px; }
.border{ border:none;}
a:hover{ cursor:pointer}
.bg{background-color:#d8242f;}

.forme{border-bottom:1px solid #333 !important;color:#333 !important;padding-left:0px !important;width:90% !important; height:30px !important;}
.select{width:90% !important;padding-left:0px !important;color:#333 !important;border-bottom:1px solid #333 !important;}
.t-area{border-bottom:1px solid #333 !important;color:#333 !important;padding-left:0px !important;width:90% !important; height:75px !important;}
.btn{padding:10px 20px !important; background-color:#d8242f !important;border:2px solid #d8242f !important;color:#fff !important;width:60% !important;}
</style>

<div class="col-xs-12 bg_color" style="padding-left: 0px;">
      <div class="col-xs-9 top_left">
        <h3 id="h33">Attendance Creation</h3> 
      </div> 
      <div class="col-xs-3 top_right">  
           <a onClick="prev_page('<?php echo $sess_user_id;?>','<?php echo $sess_usertype_id?>')"><h5>  <i class="fa fa-arrow-circle-o-left"></i> </h5></a>
      </div>
	  </div>

<!--<div style="height:50px; width:100%; background-color:#d8242f;" align="left">
	<h3 id="h33" style="margin-top:0px;">Attendance Creation</h3>
	<img src="img/back.png" height="25" width="25" style="float:right; margin-top:-27px; margin-right:15px; z-index:99999 !important;" onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')">
</div>--->

<div id="sales_order" class="cover-page cover-image padding-div">
<div class="cover-page-content-dash overall_div" align="center" style="background-color:#fff;">
    <div class="pageapp-login" align="center">
        <div class="cover-field" style="margin-top:0px;width: 100%;margin-left: 25%;">    
            <span style=" padding-right:3px;"><?php echo  date('Y-m-d').'T'.date('H:i');  ?></span>    
            <input type="hidden" name="att_entry_date"  id="att_entry_date"  class="form-control"   value="<?php echo date('Y-m-d').'T'.date('H:i'); ?>">
            <input type="hidden" name="random_no" id="random_no" value="<?php echo $random_no;?>">
            <input type="hidden" name="random_sc" id="random_sc" value="<?php echo $random_sc;?>">    
        </div> 
		
		<?php
			$current_time=date('Y-m-d');

			$office_in = $pdo_conn->prepare("select * from attendance_entry where staff_name='$sess_user_id' and attendance_type='1' and entry_date='$current_time'");
			$office_in->execute();	
			$get_office_in_count=$office_in->rowCount();	

			$office_out = $pdo_conn->prepare("select * from attendance_entry where staff_name='$sess_user_id' and attendance_type='2' and entry_date='$current_time'");
			$office_out->execute();	
			$get_office_out_count=$office_out->rowCount();	

			$site_in = $pdo_conn->prepare("select * from attendance_entry where staff_name='$sess_user_id' and attendance_type='3' and entry_date='$current_time'");
			$site_in->execute();	
			$get_site_in_count=$site_in->rowCount();	

			$site_out = $pdo_conn->prepare("select * from attendance_entry where staff_name='$sess_user_id' and attendance_type='4' and entry_date='$current_time'");
			$site_out->execute();	
			$get_site_out_count=$site_out->rowCount();

			$lunch_in = $pdo_conn->prepare("select * from attendance_entry where staff_name='$sess_user_id' and attendance_type='5' and entry_date='$current_time'");
			$lunch_in->execute();	
			$get_lunch_in_count=$lunch_in->rowCount();

			$lunch_out = $pdo_conn->prepare("select * from attendance_entry where staff_name='$sess_user_id' and attendance_type='6' and entry_date='$current_time'");
			$lunch_out->execute();	
			$get_lunch_out_count=$lunch_out->rowCount();			

			$count = $get_office_in_count+$get_office_out_count+$get_site_out_count+$get_site_in_count+$get_lunch_in_count+$get_lunch_out_count;
			?>
		<div class="cover-field new-label">
		<label style="float:left; ">Attendance Type</label>       
		<select name="attendance_type" id="attendance_type" class="mac-select"  > 
			<option value="" >SELECT</option>

			<?php

			if($count == "0")
			{				
				$sql = "select * FROM attendance_type_live order by live_id ASC";
				$leave = $pdo_conn->prepare($sql);
				$leave->execute();
				$leave_all = $leave->fetchAll();
				foreach($leave_all as $record)
				{
					$live_id = $record['live_id'];
					$attendance_type = $record['attendance_type'];
				?>
				<option value="<?php echo $live_id;?>" ><?php echo $attendance_type;?></option>
				<?php
				}
			}
			else 
			{
			if($get_office_in_count =='0') 
			{?>
			<option value="1" >Home Out </option>
			<?php }
			if($get_office_out_count =='0') 
			{?>
			<option value="2" >Home In</option><?php 
			} ?>
			<option value="7" >Office IN</option>
			<option value="8" >Office Out</option>
			<option value="3" >Site IN</option>
			<option value="4" >Site OUT</option>
			<?php 
			if($get_lunch_in_count =='0') 
			{?>
			<option value="5" >Lunch IN</option>
			<?php }
			if($get_lunch_out_count == '0') 
			{?>
			<option value="6" >Lunch OUT</option>
			<?php 
			} 
			}?> 
		</select> 		
		</div>  
        
                      
    </div>
	
	<div class="cover-field"  id="reasondiv">
		<label class="labele" style="float: left;">Description</label>
		<textarea class="mac-textarea" id="description" name="description"></textarea>
	</div> 
	<div class="row">  
		   <label class="labele">Photo</label> 
   		</div>
   		<div class="row">    
		   <div class="col-xs-6">
                     
                  
                    	<img src="img/guru-logo.png" id='picture' name='picture' style="width: 100px; height: 100px;" >
					
                    	 
						</div>
						<div class="col-xs-6">
						<div style="margin-top: 36px;">
                        <button class="upload_button take-photo" id='but_takes' enctype="multipart/form-data">Take photo</button>&nbsp;&nbsp;&nbsp;
                              
                    </div> 
					</div>
                                                   
            	</div>
    <div class="cover-field">
    	<input type="hidden" name="att_lati" id="att_lati" class="forme">
    	<input type="hidden" name="att_long" id="att_long" class="forme">
    </div>    
    
  
    
    <div class="cover-field">
    	<button class="upload_button button-green"  style="padding:7px 20px;background-color:#d8242f;color: #fff;border-color:#00DF00" onClick="att_creation_basis_daily(attendance_type.value,description.value,att_lati.value,att_long.value,'<?php echo $time_date?>',random_no.value,random_sc.value,'<?php echo $sess_usertype_id?>','<?php echo $enquiry_nos;?>','<?php echo $sess_user_id?>')">submit</button>   
    </div>

	
</div>
</div>
 <!------------------------------------------------------------------ End -----------------------------------------------------------------> 
 <script>
 $(document).ready(function() {
     getLocation();
 });
function getLocation()
{

var options =
{
enableHighAccuracy: true,
maximumAge: 3600000
}
var watchID = navigator.geolocation.getCurrentPosition(onSuccess, onError, options);

function onSuccess(position)
{
  
document.getElementById("att_lati").value=position.coords.latitude;
document.getElementById("att_long").value=position.coords.longitude;

};   
function onError(error) {
	 
alert('code: '    + error.code    + '\n' + 'message: ' + error.message + '\n');
};
}


function att_creation_basis_daily(attendance_type,description,att_lati,att_long,att_entry_date,random_no,random_sc,sess_usertype_id,enquiry_nos,sess_user_id)
{

	var image_name=window.localStorage.getItem("image_name");
	
	if((attendance_type!='') )
	{ 
    		jQuery.ajax({
    		url:FILE_PATH+'/attendance/model.php?action=attendance_entry',
    		type:'POST',
    		data:"attendance_type="+attendance_type+"&description="+description+"&staff_latitute="+att_lati+"&staff_longitute="+att_long+"&att_entry_date="+att_entry_date+"&random_no="+random_no+"&random_sc="+random_sc+"&sess_usertype_id="+sess_usertype_id+"&sess_user_id="+sess_user_id+"&attendence_no="+enquiry_nos+"&image_name="+image_name,
    		success:function(data)
    		{
    			alert(data);	
    			window.localStorage.setItem("image_name","");		
    			$('#page_replace_div').load(FILE_PATH+'/attendance/attendance_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);				
    		}
    		
    		});
    	 
	}
	else
	{
		alert("Select Atendance Type");
	}	
}

function prev_page(sess_usertype_id,sess_user_id)
{
	$("#previous_id").val('attendance/attendance_list.php');	
	$("#page_replace_div").load(FILE_PATH+'/attendance/attendance_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
}


$('#but_takes').click(function(){     

navigator.camera.getPicture(onSuccess, onFail, { quality: 20,
destinationType: Camera.DestinationType.FILE_URL 
});});
// Change image source and upload photo to server
function onSuccess(imageURI) 
{           
	var image = document.getElementById('picture');	
	image.src = imageURI  + '?' + Math.random();   
	
	var options = new FileUploadOptions();
	options.fileKey = "file";
	options.fileName = imageURI.substr(imageURI.lastIndexOf('/') + 1); 
	options.mimeType = "image/jpeg";                
	var params = {};
	params.value1 = "test";
	params.value2 = "param";
	options.params = params;
	options.chunkedMode = false;
	var ft = new FileTransfer();
	ft.upload(imageURI,'<?php echo $image_path;?>/uploads/attendance/image_upload.php', function(result)
	{//alert(result.response);
		//alert('successfully uploaded ' + result.response);
			var trim_date=result.response.trim();
		window.localStorage.setItem("image_name",trim_date);
			
	}, 
	function(error)
	{
		alert('error : ' + JSON.stringify(error));
	}, options);
	
}
function onFail(message) 
{
	alert('Failed because: ' + message);
}

</script>


 <!------------------------------------------------------------------ Popup --------------------------------------------------------->
          
<style>
.errorClass {
  border: 2px solid red !important;
}

.successClass {
  border: 2px solid green !important;
}
#fonte{font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size:16px; color:#333; font-weight:500;}
.bottome1{ border-bottom:none !important;}
.bottome{ border-bottom:1px solid #ccc !important;}
.pade{ padding:8px 15px !important;}
.right{ border-right:none;}
.top{border:1px solid #fff;}
#h33{font-size:18px; font-family:arial; color:#fff; padding-top:15px; padding-left:15px; }
.border{ border:none;}
a:hover{ cursor:pointer}
.bg{background-color:#d8242f;}
.datee{width:125px;height:30px;}
.btne{width:60px; height:30px;background-color:#d8242f;color:#fff;border-color:#d8242f;}
.pageapp-login {
    width: 100%;
}
</style>


  
 <!------------------------------------------------------------------ End -----------------------------------------------------------------> 

