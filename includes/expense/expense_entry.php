<?php
include("../dbConnect.php");
 $sess_user_id=$_GET['sess_user_id'];
 $sess_usertype_id=$_GET['sess_usertype_id']; 

$ipadress =$_SERVER['REMOTE_ADDR'];
$date=date("Y");
$st_date=substr($date,2);
$month=date("m");	   
$datee=$st_date.$month;

	//$sql = mysql_fetch_array(mysql_query("select * FROM staff_creation where id='$ses_staff_id'"));
	//$staff_name=$sql['staff_name'];
	
	//$rs1=mysql_query("select expense_no from  daily_expense order by exp_id desc");
	
	
	$login = $pdo_conn->prepare("select expense_no from daily_expense order by exp_id desc");
	$login->execute();	
	$login_count = $login->fetch();
	
	
	if($res1=$login_count)
	{
		$pur_array=explode('-',$res1['expense_no']);
		$year1=$pur_array[1];
		$year2=substr($year1, 0, 2);
		$year='20'.$year2;
		$enquiry_no=$pur_array[2];
	}
	if($enquiry_no=='')
	{
		$enquiry_nos='DE-'.$datee.'-0001';
	}
	elseif($year!=date("Y"))
		$enquiry_nos='DE-'.$datee.'-0001';
	else
	{
		$enquiry_no+=1;
		$enquiry_nos='DE-'.$datee.'-'.str_pad($enquiry_no, 4, '0', STR_PAD_LEFT);
	}
$date=date("Y");
$month=date("m");
$year=date("d");
$hour=date("h");
$minute=date("i");
$second=date("s");
$random_sc = date('dmyhis');
$random_no = rand(00000, 99999);

?> 
<script>hide_dialog();</script>
<style>
	#h33{font-size:18px; font-family:arial; color:#fff; padding-top:15px; padding-left:15px; }
	.mac-select{padding-left:5px !important; color:#666 !important;border:1px solid #ccc !important; height:38px !important; }
	
	.labele_sub{margin-bottom:-5px !important;font-size:10px !important;}
	.invoice{font-weight:bold !important; font-size:16px !important;color:#666 !important;}
	.mac-input{width:100% !important;border:1px solid #ccc !important;}
	.mac-textarea{width:100% !important;border:1px solid #ccc !important;height:75px;}
	.mac-date{width:100% !important;border:1px solid #ccc !important;padding-top:10px !important;}
	
	.sublist{background-color:#fff !important;padding:10px !important; border:5px solid #eee !important;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.10) !important;}
	.t-data{font-weight:bold !important; font-size:14px !important;}
	.mac-radio{height:25px !important; width:25px !important;}
	.border{padding:0px !important;border:none !important;}
	.check{height:25px !important;width: 25px !important;}  
</style>


<script>

function prev_page(sess_usertype_id,sess_user_id)
{

	$("#page_replace_div").load(FILE_PATH+'/expense/expense_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id+"&staff_id="+staff_id);
}

function get_subtype(exp_id)
{
	if(exp_id == "1")
	{
		$('#sub_expense').show();
	}else
	{
		$('#sub_expense').hide();
		$('#sub_expense_type').val('')
	}
}

function expense_add(sess_user_id,sess_usertype_id,ipadress)
{
	
	var image_name=window.localStorage.getItem("image_name");
	 
	 
	var expense_no=$('#hid_invoice').val();
	var random_sc=$('#random_sc').val();
	var random_no=$('#random_no').val();
	var entry_date=$('#entry_date').val();
	var expense_type=$('#expense_type').val();
	var sub_exp_type=$('#sub_expense_type :selected').text();if(sub_exp_type == "select"){var sub_exp = "";}else{var sub_exp = sub_exp_type;}
	var amount=$('#amount').val();
	var description=$('#description').val();
	var ledger_name=$('#expense_type :selected').text();
	var lati = $('#att_lati').val();
	var longi = $('#att_long').val();
	
	if(expense_type == "")
	{
		alert("select expense type");
	}
	else if(amount == "")
	{
		alert("Enter amount");
	}
	else if(description == "")
	{
		alert("Enter Description");
	}
	else if($('#sub_expense_type').is(':visible') && $('#sub_expense_type').val() == "")
	{
		alert("select sub_expense type");
	}
		else if(lati=='' || longi=='')
	{
	    alert("Please exit your app and turn on your location ")
	}
	else
	{
		jQuery.ajax({
			type: "POST",
			url: FILE_PATH+'/expense/expense_insert.php',
			data:"expense_no="+expense_no+"&random_no="+ random_no+"&random_sc="+random_sc+"&entry_date="+entry_date+"&expense_type="+expense_type+"&sub_exp="+sub_exp+"&amount="+amount+"&description="+description+"&user_id="+sess_user_id+"&user_type="+sess_user_id+"&ipadress="+ipadress+"&ledger_name="+ledger_name+"&image_name="+image_name+"&lati="+lati+"&longi="+longi,
			success: function(data)
			{
				alert(data);
			 	window.localStorage.setItem("image_name","");
				$("#page_replace_div").load(FILE_PATH+'/expense/expense_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
			}
		});
	}
}
</script>

<input type="hidden" name="random_no" id="random_no" value="<?php echo $random_no; ?>"/> 
<input type="hidden" name="random_sc" id="random_sc" value="<?php echo $random_sc; ?>"/>
<input type="hidden" name="att_lati" id="att_lati" class="forme">
<input type="hidden" name="att_long" id="att_long" class="forme"> 


<div class="col-xs-12 bg_color" style="padding-left: 0px;">
      <div class="col-xs-9 top_left">
        <h3 id="h33">Expense Entry</h3> 
      </div> 
      <div class="col-xs-3 top_right">  
           <a onClick="prev_page('<?php echo $sess_user_id;?>','<?php echo $sess_usertype_id?>')"><h5>  <i class="fa fa-arrow-circle-o-left"></i> </h5></a>
      </div>
	  </div>


<!--<div style="height:50px; width:100%;background-color:#d8242f;" align="left">
<h3 id="h33">Expense Entry</h3>
<img src="img/back.png" height="25" width="25" style="float:right; margin-top:-27px; margin-right:15px; z-index:99999 !important;" onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')"></div>
--->
<div id="machinery_entry" class="cover-page cover-image padding-div">
	<div class="cover-page-content overall_div">
		<div class="pageapp-login" style="margin-top: -18px;">
			
            <div class="cover-field" align="right">
			<div class="col-xs-12 invoice-num" style="padding-right: 0px;padding-left: 0px;text-align: center;padding-top: 9px;">
    			<div class="">
                <label class="invoice" ><?php echo $enquiry_nos?></label>
                 <input type="hidden" id="hid_invoice" value="<?php echo $enquiry_nos ?>"/> 
           </div>
		   </div>
			</div>
            
            

            <div class="cover-field">
                <label class="labele">Expense Date</label>
                <input type="date" class="mac-date" id="entry_date" name="entry_date" value="<?php echo date('Y-m-d');?>">
            </div>  

          

            <div class="cover-field">
                <label class="labele">Expense Type</label>
                <select class="mac-select" name="expense_type" id="expense_type" onChange="get_subtype(this.value),getLocation();" >
                    <option value=""> SELECT </option>
						<?php
						$sql = "select * FROM daily_expense_type order by expense_type_id Asc";
						$leave = $pdo_conn->prepare($sql);
						$leave->execute();
						$leave_all = $leave->fetchAll();
						foreach($leave_all as $record)
						{
						$expense_type_id = $record['expense_type_id'];
						$expense_name = $record['expense_name'];
						?>
						<option value="<?php echo $expense_type_id;?>" ><?php echo $expense_name;?></option>
						<?php
						}	
						?>	
                </select> 
            </div>

            <div class="cover-field" style="display:none" id="sub_expense">
           		<label class="labele">Sub-Expense Type</label>
                <select class="mac-select" id="sub_expense_type" name="sub_expense_type" onChange="">
                    <option value="">select</option>
                    <option value="Bus" >Bus</option>
                    <option value="Bike" >Bike</option>
                    <option value="Car">Car</option>
                     <option value="Train">Train</option>       
                </select>
            </div> 

            <div class="cover-field">
                <label class="labele">Amount</label> 
                <input type="number" class="mac-input" id="amount" name="amount" >
            </div>
            
            <div class="cover-field"  id="reasondiv">
                <label class="labele">Description</label>
                <textarea class="mac-textarea" id="description" name="description"></textarea>
            </div> 
            
           <div class="cover-field">  
		   <label class="labele">Photo</label> 
   		   <div class="col-xs-12">
		   <div class="col-xs-6">
                    <div style="">
                  
                    	<img src="img/guru-logo.png" id='picture' name='picture' style="width: 100px; height: 100px;" >
					
                    	</div>
						</div>
						<div class="col-xs-6">
						<div style="margin-top: 36px;">
                        <button class="upload_button take-photo" id='but_takes' enctype="multipart/form-data">Take photo</button>&nbsp;&nbsp;&nbsp;
                              
                    </div> 
					</div>
                     </div>                               
            	</div>
            <center>
            <button class="upload_button button-green" id='but_takes' style="padding:7px 20px;background-color:#d8242f;color: #fff;border-color:#00DF00; margin-top: 20px;" onClick="expense_add('<?php echo $sess_user_id?>','<?php echo $sess_usertype_id ?>','<?php echo $ipadress ?>')">submit</button>   
            </center>
			
			  
    	
    
			
			
			
           </div>
        </div>

</div>


<script>

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
	function onError(error)
	 {
		//alert('code: '    + error.code    + '\n' + 'message: ' + error.message + '\n');
	}
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
	ft.upload(imageURI,'<?php echo $image_path;?>/uploads/expense/image_upload.php', function(result)
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