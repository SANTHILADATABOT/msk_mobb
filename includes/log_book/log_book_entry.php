<?php 
//$ses_site=$_GET['site_id'];
$ses_site="1";
 
?>
<?php
include("../dbConnect.php");
include("../common_function.php");
$sess_user_id=$_GET['sess_user_id'];
$sess_usertype_id=$_GET['sess_usertype_id']; 

$ipadress =$_SERVER['REMOTE_ADDR'];
$date=date("Y");
$st_date=substr($date,2);
$month=date("m");
$datee=$st_date.$month;
$acc_year=get_academic_year();

  
$prepare_statement=$pdo_conn->prepare("select max(log_no) as set_inv from log_book where acc_year='$acc_year' and main_delete_status!='1'");

$prepare_statement->execute();
 $rscount = $prepare_statement->fetch();
if($rscount!=0)
{
	 		
		$set_inv=$rscount['set_inv'];
		$pur_array=explode('-',$set_inv);
		$inv_no=$pur_array[2]+1;
		$reg_nos='LOG-'.$datee.'-'.str_pad($inv_no, 4, '0', STR_PAD_LEFT);
	
}
else
{
	$inv_no=0001;
	$reg_nos='LOG-'.$datee.'-'.$inv_no;
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
	
	.labele_image{}
	.labele_sub{margin-bottom:-5px !important;font-size:10px !important;}
	
	.mac-input{width:100% !important;border:1px solid #ccc !important;}
	.mac-textarea{width:100% !important;border:1px solid #ccc !important;height:75px;}
	.mac-date{width:100% !important;border:1px solid #ccc !important;padding-top:10px !important;}
	.cover-field{margin-bottom:5px !important;}
	.sublist{background-color:#fff !important;padding:10px !important; border:5px solid #eee !important;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.10) !important;}
	.t-data{font-weight:bold !important; font-size:14px !important;}
	.mac-radio{height:25px !important; width:25px !important;}
	.border{padding:0px !important;border:none !important;}
	.check{height:25px !important;width: 25px !important;}  
	.check{height:25px !important;width: 25px !important;}  
</style>
<input type="hidden" name="att_lati" id="att_lati" class="forme">
<input type="hidden" name="att_long" id="att_long" class="forme"> 
<input type="hidden" name="random_no" id="random_no" value="<?php echo $random_no;?>"/> 
<input type="hidden" name="random_sc" id="random_sc" value="<?php echo $random_sc;?>"/>
<input type="hidden" name="acc_year" id="acc_year" value="<?php echo $acc_year;?>"/>



<div class="col-xs-12 bg_color" style="padding-left: 0px;">
      <div class="col-xs-9 top_left">
        <h3 id="h33">Log Book Entry</h3> 
      </div> 
      <div class="col-xs-3 top_right">  
           <a onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')"><h5>  <i class="fa fa-arrow-circle-o-left"></i> </h5></a>
      </div>
	  </div>
<!--<div style="height:50px; width:100%;background-color:#d8242f;" align="left">
<h3 id="h33">Log Book Entry</h3>
<img src="img/back.png" height="25" width="25" style="float:right; margin-top:-27px; margin-right:15px; z-index:99999 !important;" onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')" ></div>
----->
    <div id="machinery_entry" class="cover-page cover-image padding-div" >
    <div class="cover-page-content overall_div" style="margin-top: 50px;">
    <div class="pageapp-login">
	
	
	
	 <div class="cover-field" align="right">
			<div class="col-xs-12 invoice-num" style="padding-right: 0px;padding-left: 0px;text-align: center; padding-top: 10px;">
   
			<div class="">
                <label class="invoice" id="hid_invoice"><?php echo $reg_nos?></label>
                <!-- <input type="hidden"  value="<?php echo $reg_nos ?>"/>-->
           </div>
		   </div>
			</div>
            
            <!--<div class="cover-field" align="right">
            	<label class="invoice" ><?php echo $reg_nos?></label>
                <input type="hidden" id="hid_invoice" value="<?php echo $reg_nos ?>"/>
            </div>-->
            
            <div class="cover-field">
            	<label class="labele">Date</label>
				<input type="date" class="mac-date" id="entry_date" name="entry_date" value="<?php echo date('Y-m-d');?>">
            </div>  
            
           
            
            <div class="cover-field">
            <label class="labele">Opening KM<span class="star">*</span></label>
            <input type="number" class="mac-input" name="opening_km" id="opening_km" onKeyUp="get_total_km(),getLocation()">
       		 </div> 
            
          
            
            <div class="cover-field">
                <label class="labele">Closing KM </label>
            <input type="number" class="mac-input" name="closing_km" id="closing_km" onKeyUp="get_total_km()">
         
            </div> 
            
             <div class="cover-field">
              <label class="labele">Total KM  </label>
            <input type="number" class="mac-input" name="total_km" id="total_km" readonly style="background-color:transparent;" >
           </div>
           
           <div class="cover-field">
              <label class="labele">Litres  </label>
            <input type="number" class="mac-input" name="litres" id="litres">
           </div>
           
           <div class="cover-field">
              <label class="labele">Amount  </label>
            <input type="number" class="mac-input" name="amount" id="amount">
           </div>
        
           
             <div class="cover-field">
            <label class="labele">Description</label>
            <textarea class="mac-textarea" name="description" id="description" ></textarea>
            </div>
            
             <div class="row"> 
				 <label class="labele_image">Opening Kilo Meter</label>
				  
				    		 
					<div class="col-xs-6" >

						<img src="img/guru-logo.png" id='picture' name='picture' style="width: 100px; height: 100px;" >

					</div>
					<div class="col-xs-6" style="margin-top: 36px;">
						<button class="upload_button take-photo" id='but_takes' enctype="multipart/form-data">Take photo</button> 

					</div>  
				       
			 </div>  			
              <div class="row">
				<label class="labele_image">Closing Kilo Meter</label>
				 

					<div class="col-xs-6"  >

					<img src="img/guru-logo.png" id='picture1' name='picture1' style="width: 100px; height: 100px;" >

					</div>
					<div  class="col-xs-6" style="margin-top: 36px;">
					<button class="upload_button take-photo" id='but_takes1' enctype="multipart/form-data">Take photo</button>
					</div>  
			 				
            	</div>
              
   
			 <div >
           <center>  <a  style="width: 88px; "class="pageapp-login-button button button-green" onclick="submit_logbook(entry_date.value,random_no.value,random_sc.value,hid_invoice.value,opening_km.value,closing_km.value,total_km.value,litres.value,amount.value,acc_year.value,description.value,'<?php echo $_GET['sess_usertype_id'];  ?>','<?php echo $_GET['sess_user_id']; ?>')">Submit</a> </center>&nbsp; &nbsp; &nbsp; &nbsp;
              </div>
			  
		
		</div>
   
</div>
</div>
<script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script>

function get_total_km()
{
	var opening_km=document.getElementById('opening_km').value;
	var closing_km=document.getElementById('closing_km').value;
	if((opening_km!='')&&(closing_km!=''))
	{
		var total_km=parseFloat(closing_km)-parseFloat(opening_km);
		document.getElementById('total_km').value=total_km;
	}
}
function prev_page(sess_usertype_id,sess_user_id)
{
	$("#previous_id").val('log_book/log_book_list.php');
	$("#page_replace_div").load(FILE_PATH+'/log_book/log_book_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
}
function submit_logbook(entry_date,random_no,random_sc,hid_invoice,opening_km,closing_km,total_km,litres,amount,acc_year,description,sess_usertype_id,sess_user_id)
{
	
	var image_name=window.localStorage.getItem("image_name");
	var closing_km_img=window.localStorage.getItem("image_name1");
	
	var latitude = $('#att_lati').val();
	var longitude = $('#att_long').val();
	 
	if(opening_km == ''){ alert("Enter Opening KM");}
		else if(longitude=='' || latitude=='')
	{
	    alert("Please exit your app and turn on your location ")
	}
	
	else{
		window.localStorage.setItem("image_name","");
		window.localStorage.setItem("image_name1","");
		var sendInfo = {
			entry_date: entry_date,
        	random_no: random_no,
			random_sc: random_sc,
			hid_invoice: hid_invoice,
			opening_km: opening_km,
			closing_km: closing_km,
			total_km: total_km,
			litres: litres,
			amount: amount,
			acc_year: acc_year,
			description: description,
			sess_usertype_id:sess_usertype_id,
			sess_user_id:sess_user_id,			
			latitude:latitude,
			longitude:longitude,
			image_name:image_name,
			closing_km_img:closing_km_img,
		};
		$.ajax({
    		type: "POST",
			url: FILE_PATH+'/log_book/model.php?action=SUBMIT',
			data: sendInfo,
			success: function(data)
			{
				alert(data);
				$("#page_replace_div").load(FILE_PATH+'/log_book/log_book_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
    		}
		});
	
	}
}

function sales_order_cancel_delete_sub_entry(random_no,random_sc,sess_usertype_id,sess_user_id)
{ 
	$.ajax({
		type: "POST",
		url: FILE_PATH+'/sales_order/model.php?action=CANCEL&random_no='+random_no+"&random_sc="+random_sc,
		success: function(data) 
		{
			alert("Cancelled");
			$("#page_replace_div").load(FILE_PATH+'/sales_order/sales_order_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
		}
	});
}

/*function getLocation()
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
		alert('code: '    + error.code    + '\n' + 'message: ' + error.message + '\n');
	}
}
*/

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
	ft.upload(imageURI,'<?php echo $image_path;?>/uploads/log_book/image_upload.php', function(result)
	{
		//alert('successfully uploaded ' + result.response);
		var trim_date=result.response.trim();
		window.localStorage.setItem("image_name",trim_date);
			
	}, 
	function(error)
	{
		alert('error : ' + JSON.stringify(error));
	}, options);
	
}
$('#but_takes1').click(function(){     
 navigator.camera.getPicture(onSuccess1, onFail, { quality: 20,
destinationType: Camera.DestinationType.FILE_URL 
});});
// Change image source and upload photo to server
function onSuccess1(imageURI) 
{           
	
	var image = document.getElementById('picture1');	
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

	ft.upload(imageURI,'<?php echo $image_path;?>/uploads/log_book/image_upload.php', function(result)
	{

		var trim_date=result.response.trim();
		window.localStorage.setItem("image_name1",trim_date);
			
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