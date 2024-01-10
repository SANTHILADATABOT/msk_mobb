<?php
include("../dbConnect.php"); 
$sess_user_id=$_GET['sess_user_id'];
$sess_usertype_id=$_GET['sess_usertype_id']; 

?>

<style>
#h33{font-size:18px; font-family:arial; color:#fff; padding-top:15px; padding-left:15px; }
.mac-select{padding-left:5px !important; color:#666 !important;border:1px solid #ccc !important; height:38px !important; }
.mac-date{width:100% !important;border:1px solid #ccc !important;padding-top:10px !important;}
</style>

<script>
function prev_page(sess_user_id,sess_usertype_id)
{
	$("#previous_id").val('attendance/attendance_list.php');
	$("#page_replace_div").load(FILE_PATH+'/attendance/attendance_list.php?&sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
}
function create_att_list(sess_user_id,sess_usertype_id)
{	
	$("#previous_id").val('attendance/att_creation.php');
	$("#page_replace_div").load(FILE_PATH+'/attendance/att_creation.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
}
function get_att_list(sess_usertype_id,from_date,to_date,sess_user_id)
{	
	jQuery.ajax({
	type: "GET",
	url: FILE_PATH+'/attendance/attendance_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id,
	data: "from_date="+from_date+"&to_date="+to_date,
	success: function(data) 
	{
		jQuery("#page_replace_div").html(data);	
	}
	});	
	
}
</script>

<div class="col-xs-12 bg_color" style="padding-left: 0px;">
      <div class="col-xs-8 top_left">
        <h3 id="h33">Attendance Filter</h3> 
      </div> 
      <div class="col-xs-2 top_right">  
           <a onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id ?>')"><h5>  <i class="fa fa-arrow-circle-o-left"></i> </h5></a>
      </div>
	  <div class="col-xs-2 top_right">  
           <a onClick="create_att_list('<?php echo $sess_user_id;?>','<?php echo $sess_usertype_id?>')"><h5>  <i class="fa fa-plus-square-o"></i> </h5></a>
      </div>
</div>


<!--<div style="height:50px; width:100%;background-color:#d8242f;" align="left">
<h3 id="h33">Attendance Filter</h3>
<img src="img/back.png" height="25" width="25" style="float:right; margin-top:-27px; margin-right:15px; z-index:99999 !important;" onClick="prev_page('<?php echo $sess_user_id;?>','<?php echo $sess_usertype_id?>')"></div>
-->


<div id="sales_order" class="cover-page cover-image padding-div">
	<div class="cover-page-content overall_div">
    	<div class="pageapp-login"><br/>
           
               <!-- <div class="cover-field" align="right" style="margin-top:-15px;">
                <a  onClick="create_att_list('<?php echo $sess_user_id;?>','<?php echo $sess_usertype_id?>')" class="pageapp-login-button button button-green btnes">+ &nbsp;&nbsp; create</a>
            </div>--->
            
   
           
            <div class="cover-field">
            	<label class="labele">From Date</label>
                <input type="date" class="mac-date" id="from_date" name="from_date" value="<?php echo date('Y-m-d'); ?>">
            </div> 
            
            <div class="cover-field">
            	<label class="labele">To Date</label>
                <input type="date" class="mac-date" id="to_date" name="to_date" value="<?php echo date('Y-m-d'); ?>">
            </div> 
            
            </div>
                     
          
            <center><a onClick="get_att_list('<?php echo $sess_usertype_id?>',from_date.value,to_date.value,'<?php echo $sess_user_id?>')" class="pageapp-login-button button button-green">GO</a></center>
		</div>
		</div>
   <div class="overlay"></div>
</div>

