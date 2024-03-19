<?php
include("../dbConnect.php");
$sess_user_id = $_GET['sess_user_id'];
$sess_usertype_id = $_GET['sess_usertype_id']; 
?>
<style>
#h33{font-size:18px; font-family:arial; color:#fff; padding-top:15px; padding-left:15px; }
.mac-select{padding-left:5px !important; color:#666 !important;border:1px solid #ccc !important; height:38px !important; }
.mac-date{width:100% !important;border:1px solid #ccc !important;padding-top:10px !important;}
</style>
<script>hide_dialog();</script>

<div class="col-xs-12 bg_color" style="padding-left: 0px;">
      <div class="col-xs-8 top_left">
        <h3 id="h33">Expense Filter</h3> 
      </div> 
      <div class="col-xs-2 top_right">  
           <a onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id ?>')"><h5>  <i class="fa fa-arrow-circle-o-left"></i> </h5></a>
      </div>
	  <div class="col-xs-2 top_right">  
           <a onClick="create_mach_list('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id ?>')"><h5>  <i class="fa fa-plus-square-o"></i> </h5></a>
      </div>
</div>


<!--<div style="height:50px; width:100%;background-color:#d8242f;" align="left">
<h3 id="h33">Expense Filter</h3>
<img src="img/back.png" height="25" width="25" style="float:right; margin-top:-27px; margin-right:15px; z-index:99999 !important;" onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id ?>')"></div>
--->
<div id="sales_order" class="cover-page cover-image padding-div">
	<div class="cover-page-content  overall_div">
    	<div class="pageapp-login"><br/>
			<!--<div class="spacer"></div>
				<div class="cover-field" align="right" style="margin-top:-15px;">
				<a  onClick="create_mach_list('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id ?>')" class="pageapp-login-button button button-green btnes">+ &nbsp;&nbsp; Entry</a>
			</div> --->          
          
            <div class="cover-field">
            	<label class="labele">From Date</label>
                <input type="date" class="mac-date" id="from_date" name="from_date" value="<?php echo date('Y-m-d'); ?>">
            </div> 
            
            <div class="cover-field">
            	<label class="labele">To Date</label>
                <input type="date" class="mac-date" id="to_date" name="to_date" value="<?php echo date('Y-m-d'); ?>">
            </div> 
            
			<div class="cover-field">
			<label class="labele">Expense Type</label>
			<select class="mac-select" name="expense_type" id="expense_type" onChange="get_subtype(this.value)" >
			<option value="">SELECT</option>
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
			<option value="">SELECT</option>
			<option value="0" >Bus</option>
			<option value="1" >Bike</option>
			<option value="2">Car</option>       
			</select>
			<div id="cust_name_replace_div" style="display:none; color:#F00">*This Field is Required</div>
			</div> 
            
        </div>
                     
             
        <center><a onClick="get_expense_list('<?php echo $sess_usertype_id?>',from_date.value,to_date.value,'<?php echo $sess_user_id ?>')" class="pageapp-login-button button button-green go-btn">GO</a></center>
		</div>
		</div>
   
</div>

<script>
function prev_page(sess_usertype_id,user_id)
{	
	$("#page_replace_div").load(FILE_PATH+'/expense/expense_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+user_id);
}
function create_mach_list(sess_usertype_id,user_id)
{	
	$("#page_replace_div").load(FILE_PATH+'/expense/expense_entry.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+user_id);
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
function get_expense_list(sess_usertype_id,from_date,to_date,user_id)
{	
	var expense_type=$('#expense_type').val();
	var sub_exp=$('#sub_expense_type :selected').text();
	alert(expense_type);
alert(sub_exp);
	jQuery.ajax({
	type: "GET",
	url: FILE_PATH+'/expense/expense_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+user_id,
	data: "from_date="+from_date+"&to_date="+to_date+"&expense_type="+expense_type+"&sub_exp="+sub_exp,
	success: function(data) 
	{		
		jQuery("#page_replace_div").html(data);			
	}
	});		
}

	
</script>