<?php
include("../dbConnect.php");
include("../common_function.php");
$sess_user_id=$_GET['sess_user_id'];
$sess_usertype_id=$_GET['sess_usertype_id']; 

$date=date("Y");
$st_date=substr($date,2);
$month=date("m");	   
$datee=$st_date.$month;
$mach_id = $_GET['log_id'];

$log_details = $pdo_conn->prepare("SELECT * FROM log_book where log_id=$_GET[log_id] ");
$log_details->execute();
$log=$log_details->fetchAll();
foreach($log as $record)
{
	$entry_date=$record['entry_date'];
	$log_no=$record['log_no'];
	$random_no_edit=$record['random_no'];
	$random_sc_edit=$record['random_sc'];
	$sales_ref_id=$record['sales_ref_id'];
	$acc_year=$record['acc_year'];
	$opening_km=$record['opening_km'];
	$closing_km=$record['closing_km'];
	$total_km=$record['total_km'];
	$litres=$record['litres'];
	$amount=$record['amount'];
	$description=$record['description'];
	$image_name=$record['image_name'];
	$closing_km_img=$record['closing_km_img'];
}?>





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






<input type="hidden" name="att_lati" id="att_lati" class="forme">
<input type="hidden" name="att_long" id="att_long" class="forme"> 
<input type="hidden" id="random_no" value="<?php echo $random_no_edit?>"/>
<input type="hidden" id="random_sc" value="<?php echo $random_sc_edit?>"/>
<input type="hidden" id="acc_year" value="<?php echo $acc_year?>"/>
 



<div class="col-xs-12 bg_color" style="padding-left: 0px;">
      <div class="col-xs-9 top_left">
        <h3 id="h33">Sales Order Entry</h3> 
      </div> 
      <div class="col-xs-3 top_right">  
           <a onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')"><h5>  <i class="fa fa-arrow-circle-o-left"></i> </h5></a>
      </div>
	  </div>



    <div id="machinery_entry" class="cover-page cover-image padding-div">
    <div class="cover-page-content overall_div "><br/>
	
            
            <div class="cover-field" align="right">
				<div class="col-xs-12 invoice-num" style="padding-right: 0px;padding-left: 0px;text-align: center;padding-top: 9px;">
    			<div class="">
            	<label class="invoice" ><?php echo $log_no?></label>
                <input type="hidden" id="hid_invoice" value="<?php echo $log_no ?>"/>
				</div>
				</div>
            </div>
            
            <div class="cover-field">
            	<label class="labele">Date</label>
				<input type="date" class="mac-date" id="entry_date" name="entry_date" value="<?php echo $entry_date; ?>">
            </div>  
            
           
            
           <div class="cover-field">
            <label class="labele">Opening KM<span class="star">*</span></label>
            <input type="number" class="mac-input" name="opening_km" id="opening_km" onKeyUp="get_total_km_up()" value="<?php echo $opening_km;?>">
       		 </div> 
            
          
            
            <div class="cover-field">
                <label class="labele">Closing KM <span class="star">*</span></label>
            <input type="number" class="mac-input" name="closing_km" id="closing_km" onKeyUp="get_total_km_up(),getLocation()" value="<?php echo $closing_km; ?>">
         
            </div> 
            
             <div class="cover-field">
              <label class="labele">Total KM <span class="star">*</span></label>
            <input type="text" class="mac-input" name="total_km" id="total_km" readonly style="background-color:transparent;" value="<?php echo $total_km; ?>">
           </div>
           
           <div class="cover-field">
              <label class="labele">Litres <span class="star">*</span></label>
            <input type="text" class="mac-input" name="litres" id="litres" value="<?php echo $litres; ?>">
           </div>
           
           <div class="cover-field">
              <label class="labele">Amount <span class="star">*</span></label>
            <input type="text" class="mac-input" name="amount" id="amount" value="<?php echo $amount; ?>">
           </div>
           
             <div class="cover-field">
            <label class="labele">Description</label>
            <textarea class="mac-textarea" name="description" id="description" ><?php echo $description;?></textarea>
            </div>
            
             <div class="cover-field">
             <label class="labele_image">Opening Kilo Meter Image</label>
              <?php
              if($image_name!='')
					{
						?>
					<center>	<img src="<?php echo $image_path;?>/uploads/log_book/<?php echo $image_name; ?>" id='picture1' name='picture1' style="width:100px; height: 100px;" ></center>
					<?php }
					else
					{?>
                    <center>
<img src="img/guru-logo.png" id='picture1' name='picture1' style="width: 100px; height: 100px;" >
			</center>		<?php }?>

 <label class="labele_image">Closing Kilo Meter Image</label>
 <?php
              if($closing_km_img!='')
					{ ?>
	<center>	<img src="<?php echo $image_path;?>/uploads/log_book/<?php echo $closing_km_img; ?>" id='picture1' name='picture1' style="width:100px; height: 100px;" ></center>
					<?php }
					else
					{?>
                    <center>
<img src="img/guru-logo.png" id='picture' name='picture' style="width: 100px; height: 100px;" ><?php } ?>
             	    
                     </div>
             
            <a class="pageapp-login-button button button-green" onclick="update_log_book(entry_date.value,random_no.value,random_sc.value,hid_invoice.value,opening_km.value,closing_km.value,total_km.value,litres.value,amount.value,acc_year.value,description.value,'<?php echo $_GET['log_id'];?>','<?php echo $_GET['sess_usertype_id'];  ?>','<?php echo $_GET['sess_user_id']; ?>')">Update</a>
           
           
            <a class="pageapp-login-button button button-green" onClick="log_book_cancel_delete_sub_entry('<?php echo $_GET['sess_usertype_id'];?>','<?php echo $_GET['sess_user_id']; ?>')">Cancel</a>
           
           
		</div>
		</div>
   <div class="overlay"></div>
</div>

<script>

function get_total_km_up()
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

function update_log_book(entry_date,random_no,random_sc,hid_invoice,opening_km,closing_km,total_km,litres,amount,acc_year,description,log_id,sess_usertype_id,sess_user_id)
{
	var latitude = $('#att_lati').val();
	var longitude = $('#att_long').val();
	
	var sendInfo = {
	entry_date: entry_date,
	random_no: random_no,
	random_sc: random_sc,
	log_no: hid_invoice,
	opening_km: opening_km,
	closing_km: closing_km,
	total_km: total_km,
	litres: litres,
	amount: amount,
	acc_year: acc_year,
	description: description,
	log_id: log_id,
	sess_usertype_id: sess_usertype_id,
	sess_user_id: sess_user_id,	
	latitude: latitude,
	longitude: longitude,
	};
	$.ajax({
	type: "POST",
	url: FILE_PATH+'/log_book/model.php?action=UPDATE',
	data: sendInfo,
	success: function(data)
	{
		alert(data);
		$("#page_replace_div").load(FILE_PATH+'/log_book/log_book_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
	}
	});

	
}

function log_book_cancel_delete_sub_entry(sess_usertype_id,sess_user_id)
{ 
	$.ajax({
		type: "POST",
		url: FILE_PATH+'/log_book/model.php?action=CANCEL',
		success: function(data) {alert("Cancelled");
			$("#page_replace_div").load(FILE_PATH+'/log_book/log_book_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
		}
	});
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
	function onError(error)
	 {
		alert('code: '    + error.code    + '\n' + 'message: ' + error.message + '\n');
	}
}

</script>