<?php
include("../db_connection.php");

$sess_user_id=$_GET['sess_user_id'];
$sess_usertype_id=$_GET['sess_usertype_id']; 
$ses_staff_id=$_GET['staff_id'];
$ipadress =$_SERVER['REMOTE_ADDR'];
$date=date("Y");
$st_date=substr($date,2);
$month=date("m");	   
$datee=$st_date.$month;

$sql = "SELECT * FROM daily_expense  where exp_id='$_GET[exp_id]' ";
$rows = $db->fetch_all_array($sql);
foreach($rows as $record)
{
	$random_no_edit = $record['random_no'];
	$random_sc_edit = $record['random_sc'];
	$expense_no_edit = $record['expense_no'];
	$entry_date_edit = $record['entry_date'];
	$expense_type_edit = $record['expense_type'];
	$sub_expense_type_edit = $record['sub_expense_type'];
	$amount_edit = $record['amount'];
	$description_edit = $record['description'];
	$ipadress = $record['ipaddress'];
	$profile_image = $record['profile_image'];
	$profile_image_2 = $record['profile_image_2'];
	
}	
if($expense_type_edit == "1" )
{
	$display=inline;
}else
{
	$display=none;
	
}
?> 

<style>
	#h33{font-size:18px; font-family:arial; color:#fff; padding-top:15px; padding-left:15px; }
	.mac-select{padding-left:5px !important; color:#666 !important;border:1px solid #ccc !important; height:38px !important; }
	.labele{margin-bottom:-5px !important;}
	.labele_sub{margin-bottom:-5px !important;font-size:10px !important;}
	.invoice{font-weight:bold !important; font-size:16px !important;color:#666 !important;}
	.mac-input{width:100% !important;border:1px solid #ccc !important;}
	.mac-textarea{width:100% !important;border:1px solid #ccc !important;height:75px;}
	.mac-date{width:100% !important;border:1px solid #ccc !important;padding-top:10px !important;}
	.cover-field{margin-bottom:5px !important;}
	.sublist{background-color:#fff !important;padding:10px !important; border:5px solid #eee !important;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.10) !important;}
	.t-data{font-weight:bold !important; font-size:14px !important;}
	.mac-radio{height:25px !important; width:25px !important;}
	.border{padding:0px !important;border:none !important;}
	.check{height:25px !important;width: 25px !important;}  .button-green{background-color:#d8242f !important;}
</style>
 <input type="hidden" name="att_lati" id="att_lati" class="forme">
<input type="hidden" name="att_long" id="att_long" class="forme"> 
<input type="hidden" name="random_no" id="random_no" value="<?php echo $random_no; ?>"/> 
<input type="hidden" name="random_sc" id="random_sc" value="<?php echo $random_sc; ?>"/>

<div style="height:50px; width:100%;background-color:#d8242f;" align="left">
<h3 id="h33">Expense Entry</h3>
<img src="img/back.png" height="25" width="25" style="float:right; margin-top:-27px; margin-right:15px; z-index:99999 !important;" onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>','<?php echo $ses_staff_id?>')"></div>

    <div id="machinery_entry" class="cover-page cover-image">
    <div class="cover-page-content">
    <div class="pageapp-login"><br/>
	<div class="spacer"></div>
            
            <div class="cover-field" align="right">
            	<label class="invoice" ><?php echo $enquiry_nos?></label>
                <input type="hidden" id="hid_invoice" value="<?php echo $enquiry_nos ?>"/>
            </div>
            
            <div class="cover-field">
            	<label class="labele">Expense Date</label>
				<input type="date" class="mac-date" id="entry_date" name="entry_date" value="<?php echo date('Y-m-d');?>" readonly>
            </div>  
          
            
            <div class="cover-field">
                <label class="labele">Expense Type</label>
                <select class="mac-select" name="expense_type" id="expense_type" onChange="get_subtype(this.value)" disabled >
                <option value=""> SELECT </option>
                <?php
                    $sql = "select * FROM daily_expense_type order by expense_type_id Asc ";
                    $sql_exe=mysql_query($sql);
                    while($rsdata=mysql_fetch_object($sql_exe))
                    {
                       $id=$rsdata->expense_type_id;
						$ledger_name=$rsdata->expense_name;
                        ?>
                        <option value="<?php echo $id;?>"<?php if($expense_type_edit == $id){ ?>selected<?php } ?> ><?php echo $ledger_name;?></option>
                        <?php }?>
                </select> 
            </div>
            
            <div class="cover-field" style="display:<?php echo $display ?>" id="sub_expense">
                <label class="labele">Sub-Expense Type</label>
                <select class="mac-select" id="sub_expense_type" name="sub_expense_type" onChange="">
                <option value="">select</option>
                <option value="Bus" <?php if($sub_expense_type_edit=="Bus") { echo "selected"; }?>>Bus</option>
                <option value="Bike" <?php if($sub_expense_type_edit=="Bike") { echo "selected"; }?>>Bike</option>
                <option value="Car" <?php if($sub_expense_type_edit=="Car") { echo "selected"; }?>>Car</option>
                 <option value="Train" <?php if($sub_expense_type_edit=="Train") { echo "selected"; }?>>Train</option>       
				</select>
            <div id="cust_name_replace_div" style="display:none; color:#F00">*This Field is Required</div>
            </div> 
            
            
             <div class="cover-field">
                <label class="labele">Amount</label> 
                <input type="number" class="mac-input" id="amount" name="amount"  value="<?php echo $amount_edit ?>" readonly>
            </div>
                     
         
            <div class="cover-field"  id="reasondiv">
                <label class="labele">Description</label>
                <textarea class="mac-textarea" id="description" name="description"><?php echo $description_edit ?></textarea>
            </div> 
            
           <div class="cover-field">                                
                    
                    <table align="left" style="border:none">
                    <tr>
                    <td width="50%" style="border:none">
                    <?php 
                    
                     if($profile_image!='')
					{
						?>
					<center>	<img src="<?php echo serverpath();?>/uploads/expense/<?php echo $profile_image; ?>" id='picture1' name='picture1' style="width:100px; height: 100px;" ></center>
					<?php }
					else
					{?>
<img src="img/kuntyres_logo.jpg" id='picture1' name='picture1' style="width: 100px; height: 100px;" >
                       
                        
					<?php }?>
					
                    </td>
                     <td width="50%" style="border:none">
                      <?php 
                     if($profile_image_2!='')
					{ ?>
                    <center>	<img src="<?php echo serverpath();?>/uploads/expense/<?php echo $profile_image; ?>" id='picture1' name='picture1' style="width:100px; height: 100px;" ></center>
					<?php } else {?>
                      	<center><img src="img/kuntyres_logo.jpg" id='picture' name='picture' style="width: 100px; height: 100px;" ></center>
                          <button class="upload_button" id='but_takes' enctype="multipart/form-data">Take photo</button>&nbsp;<?php }?>
                  </td>
                    </tr>
                    </table>
                    
                    	
                    <div style="width:100%; text-align:center; padding:10px;">
                      
                                 
                    </div>                                    
            	</div>
            
                          
             <center>
            <a class="pageapp-login-button button button-green" onClick="expense_update('<?php echo $sess_user_id?>','<?php echo $sess_usertype_id ?>','<?php echo $ipadress ?>','<?php echo $_GET['exp_id'] ?>',<?php echo $ses_staff_id ?>)">Update</a>
            </center>
		</div>
		</div>
   <div class="overlay"></div>
</div>


<script>

$(document).ready(function(){
	hide_dialog();


});
function prev_page(sess_usertype_id,sess_user_id,staff_id)
{
show_dialog();
	$("#page_replace_div").load(FILE_PATH+'/expense/expense_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id+"&staff_id="+staff_id);
}
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
}
}
function expense_update(user_id,user_type,ipadress,exp_id,staff_id)
{
	var image_name=window.localStorage.getItem("image_name");
	window.localStorage.setItem("image_name","");
	var expense_no=$('#hid_invoice').val();
	var random_sc=$('#random_sc').val();
	var random_no=$('#random_no').val();
	var entry_date=$('#entry_date').val();
	var expense_type=$('#expense_type').val();
	var sub_exp_type=$('#sub_expense_type :selected').text();if(sub_exp_type == "select"){var sub_exp = "";}else{var sub_exp = sub_exp_type;}
	var amount=$('#amount').val();
	var description=$('#description').val();
	var lati = $('#att_lati').val();
	var longi = $('#att_long').val();
	if(expense_type == "")
	{
		alert("select expense type");
	}else if(amount == "")
	{
		alert("Enter amount");
	}else if(description == "")
	{
		alert("Enter Description");
	}else if($('#sub_expense_type').is(':visible') && $('#sub_expense_type').val() == "")
	{
		alert("select sub_expense type");
	}else{
		
		jQuery.ajax({
			type: "POST",
			url: FILE_PATH+'/expense/expense_update.php',
			data:"expense_no="+expense_no+"&random_no="+ random_no+"&random_sc="+random_sc+"&entry_date="+entry_date+"&expense_type="+expense_type+"&sub_exp="+sub_exp+"&amount="+amount+"&description="+description+"&user_id="+user_id+"&user_type="+user_type+"&ipadress="+ipadress+"&exp_id="+exp_id+"&image_name="+image_name+"&lati="+lati+"&longi="+longi,
			success: function(data){
				alert(data);
			$("#page_replace_div").load(FILE_PATH+'/expense/expense_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
			}
		});
	}
}
function get_subtype(exp_id)
{
	
	if(exp_id == "1")
	{
		$('#sub_expense').show();
	}else
	{
		$('#sub_expense').hide();
	}
	
}
$('#but_takes').click(function(){   
    	getLocation();
navigator.camera.getPicture(onSuccess, onFail, { quality: 20,
destinationType: Camera.DestinationType.FILE_URL 
});});

// upload select 
$("#but_selects").click(function(){
navigator.camera.getPicture(onSuccess, onFail, { quality: 50,
sourceType: Camera.PictureSourceType.PHOTOLIBRARY, 
allowEdit: true,
destinationType: Camera.DestinationType.FILE_URI
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
	ft.upload(imageURI,'<?php echo $image_path;?>/uploads/expense/image_upload.php', function(result)
	{//alert(result.response);
		//alert('successfully uploaded ' + result.response);
		window.localStorage.setItem("image_name",result.response);
			
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