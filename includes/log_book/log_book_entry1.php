<?php
include("../db_connection.php");
$sess_user_id=$_GET['sess_user_id'];
$sess_usertype_id=$_GET['sess_usertype_id']; 
$sess_staff_id=$_GET['staff_id'];
$ipadress =$_SERVER['REMOTE_ADDR'];
$date=date("Y");
$st_date=substr($date,2);
$month=date("m");
$datee=$st_date.$month;
$acc_year=get_academic_year();

$sql="select max(salesorder_no) as set_inv from sales_order_main where acc_year='$acc_year' and main_delete_status!='1'";
$rs=mysql_query($sql);
$rscount=mysql_num_rows($rs);
if($rscount!=0)
{
	while($rsdata=mysql_fetch_object($rs))
	{			
		$set_inv=$rsdata->set_inv;
		$pur_array=explode('-',$set_inv);
		$inv_no=$pur_array[2]+1;
		$reg_nos='SAL-'.$datee.'-'.str_pad($inv_no, 4, '0', STR_PAD_LEFT);
	}
}
else
{
	$inv_no=0001;
	$reg_nos='SAL-'.$datee.'-'.$inv_no;
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
<script>
hide_dialog();
</script>
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
<input type="hidden" name="random_no" id="random_no" value="<?php echo $random_no;?>"/> 
<input type="hidden" name="random_sc" id="random_sc" value="<?php echo $random_sc;?>"/>
<input type="hidden" name="acc_year" id="acc_year" value="<?php echo $acc_year;?>"/>

<div style="height:50px; width:100%;background-color:#d8242f;" align="left">
<h3 id="h33">Sales Order Entry</h3>
<img src="img/back.png" height="25" width="25" style="float:right; margin-top:-27px; margin-right:15px; z-index:99999 !important;" onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>','<?php echo $sess_staff_id?>')"></div>

    <div id="machinery_entry" class="cover-page cover-image">
    <div class="cover-page-content">
    <div class="pageapp-login"><br/>
	<div class="spacer"></div>
            
            <div class="cover-field" align="right">
            	<label class="invoice" ><?php echo $reg_nos?></label>
                <input type="hidden" id="hid_invoice" value="<?php echo $reg_nos ?>"/>
            </div>
            
            <div class="cover-field">
            	<label class="labele">Date</label>
				<input type="date" class="mac-date" id="entry_date" name="entry_date" value="<?php echo date('Y-m-d');?>">
            </div>  
            
           
            
            <div class="cover-field">
            <label class="labele">Distributor Name <span class="star">*</span></label>
            <input type="text" class="mac-input" name="distributor_name" id="distributor_name"  list="languageList" onChange="getLocation();">
            
             	<datalist id="languageList">
                 <?php 
		$sql=mysql_query("SELECT * FROM distributor_creation where delete_status!='1' order by distributor_name ASC");
		while($fetch_sql=mysql_fetch_array($sql))
		{
			$id=$fetch_sql['distributor_id'];
			$name=ucfirst($fetch_sql['distributor_name']);
				?>
			<option value="<?php echo $fetch_sql['distributor_name']?>"></option>
                    <?php }?>
					
				</datalist>
   
            </div> 
            
          
            
            <div class="cover-field">
                <label class="labele">Sub Dealer Name <span class="star">*</span></label>
            <input type="text" class="mac-input" name="sub_dealer_name" id="sub_dealer_name" list="languageList2">
            
            <datalist id="languageList2">
                 <?php 
			$sql=mysql_query("SELECT * FROM sub_dealer_creation where delete_status!='1' order by sub_dealer_name ASC");
		while($fetch_sql=mysql_fetch_array($sql))
		{
			$id=$fetch_sql['sub_dealer_id'];
			$name=ucfirst($fetch_sql['sub_dealer_name']);
			?>
			<option value="<?php echo $fetch_sql['sub_dealer_name']?>"></option>
                    <?php }?>
					
				</datalist>
            </div> 
            
            <?php if($sess_usertype_id!='3'){?>
             <div class="cover-field">
             
              <label class="labele">Sales Rep Name <span class="star">*</span></label>
            <input type="text" class="mac-input" name="sales_ref_name" id="sales_ref_name" list="languageList3">
            
             <datalist id="languageList3">
                 <?php 
			
		$sql=mysql_query("SELECT * FROM sales_ref_creation where delete_status!='1' order by sales_ref_name ASC");
		while($fetch_sql=mysql_fetch_array($sql))
		{
			$id=$fetch_sql['sales_ref_id'];
			$name=ucfirst($fetch_sql['sales_ref_name']);
			?>
			<option value="<?php echo $fetch_sql['sales_ref_name']?>"></option>
                    <?php }?>
					
				</datalist>
                                    
           </div>
              <?php } else {?>
            <div class="cover-field" >
            <label class="labele">Sales Rep Name <span class="star">*</span></label>
            <input type="text"  class="mac-input" name="sales_ref_name" id="sales_ref_name" value="<?php echo get_user_name($sess_user_id);?>" readonly>
            </div> 
           <?php } ?>
<!---------------------------------    Sublist    ----------------------------------------------->
            <span id="machinery_sublist_validation" style="display:none; color:red;">Fill Sublist</span>
            <?php  //include("sales_sublist.php");?>
           
<!-----------------------------------   Sublist End    ---------------------------------------------->   

           
             <div class="cover-field">
            <label class="labele">Description</label>
            <textarea class="mac-textarea" name="description" id="description" ></textarea>
            </div>
              
            <a class="pageapp-login-button button button-green" onclick="submit_salesorder(entry_date.value,random_no.value,random_sc.value,hid_invoice.value,distributor_name.value,sub_dealer_name.value,sales_ref_name.value,acc_year.value,description.value,total_amount.value,total_qty.value,'<?php echo $_GET['sess_usertype_id'];  ?>','<?php echo $_GET['sess_user_id']; ?>','<?php echo $_GET['staff_id']; ?>')">Submit</a> &nbsp; &nbsp; &nbsp; &nbsp;
             <a class="pageapp-login-button button button-green" onClick="sales_order_cancel_delete_sub_entry(random_no.value,random_sc.value,'<?php echo $_GET['sess_usertype_id'];  ?>','<?php echo $_GET['sess_user_id']; ?>','<?php echo $_GET['staff_id']; ?>')">Cancel</a>
           
		</div>
		</div>
   <div class="overlay"></div>
</div>

<script>
function prev_page(sess_usertype_id,sess_user_id,staff_id)
{show_dialog();
	$("#page_replace_div").load(FILE_PATH+'/sales_order/sales_order_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id+"&staff_id="+staff_id);
}
function submit_salesorder(entry_date,random_no,random_sc,salesorder_no,distributor_id,sub_dealer_id,sales_ref_id,acc_year,description,total_amount,total_qty,sess_usertype_id,sess_user_id,staff_id)
{
	
	var latitude = $('#att_lati').val();
	var longitude = $('#att_long').val();
	if(distributor_id == ''){ alert("Enter Dealer Name");}
	else if(sub_dealer_id == ''){alert("Enter Sub Dealer Name");}
	else if(sales_ref_id == ''){alert("Enter Sales Rep Name");}
	else{
		var sendInfo = {
			entry_date: entry_date,
        	random_no: random_no,
			random_sc: random_sc,
			salesorder_no: salesorder_no,
			distributor_id: distributor_id,
			sub_dealer_id: sub_dealer_id,
			sales_ref_id: sales_ref_id,
			total_qty: total_qty,
			total_amount: total_amount,
			acc_year: acc_year,
			description: description,
			total_amount:total_amount,
			sess_usertype_id:sess_usertype_id,
			sess_user_id:sess_user_id,
			latitude:latitude,
			longitude:longitude,
		};
		$.ajax({
    		type: "POST",
			url: FILE_PATH+'/sales_order/model.php?action=SUBMIT',
			data: sendInfo,
			success: function(data){
	$("#page_replace_div").load(FILE_PATH+'/sales_order/sales_order_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id+"&staff_id="+staff_id);
    		}
		});
	
	}
}

function sales_order_cancel_delete_sub_entry(random_no,random_sc,sess_usertype_id,sess_user_id,staff_id)
{ 
	$.ajax({
		type: "POST",
		url: FILE_PATH+'/sales_order/model.php?action=CANCEL&random_no='+random_no+"&random_sc="+random_sc,
		success: function(data) {alert("Cancelled");
			$("#page_replace_div").load(FILE_PATH+'/sales_order/sales_order_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id+"&staff_id="+staff_id);
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