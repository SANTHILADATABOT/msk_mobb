
<?php
 include("../dbConnect.php");
include("../common_function.php");
$sess_usertype_id=$_GET['sess_usertype_id'];
$sess_user_id=$_GET['sess_user_id'];

$current_date=date('Y-m-d');
$ses_site=$_GET['site_id'];
?>
<style>
#h33{font-size:18px; font-family:arial; color:#fff; padding-top:15px; padding-left:15px; }
.mac-select{padding-left:5px !important; color:#666 !important;border:1px solid #ccc !important; height:38px !important; }
.mac-date{width:100% !important;border:1px solid #ccc !important;padding-top:10px !important;}
</style>

<div class="col-xs-12 bg_color" style="padding-left: 0px;">
      <div class="col-xs-9 top_left">
        <h3 id="h33">Log Book Filter</h3> 
      </div> 
      <div class="col-xs-3 top_right">  
           <a onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')"><h5>  <i class="fa fa-arrow-circle-o-left"></i> </h5></a>
      </div>
	 
</div>



<!--<div style="height:50px; width:100%;background-color:#d8242f;" align="left">
<h3 id="h33">Log Book Filter</h3>
<img src="img/back.png" height="25" width="25" style="float:right; margin-top:-27px; margin-right:15px; z-index:99999 !important;" onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $ses_site ?>','<?php echo $sess_user_id?>')"></div>
--->
<div id="sales_order" class="cover-page cover-image padding-div">
	<div class="cover-page-content">
    	<div class=" overall_div">

          
            <div class="cover-field">
            	<label class="labele">From Date</label>
                <input type="date" class="mac-date" id="from_date" name="from_date" value="<?php echo date('Y-m-d'); ?>">
            </div> 
            
            <div class="cover-field">
            	<label class="labele">To Date</label>
                <input type="date" class="mac-date" id="to_date" name="to_date" value="<?php echo date('Y-m-d'); ?>">
            </div> 
           
           
           
          
            
             
            <center><a onClick="get_log_book_list(from_date.value,to_date.value,'<?php echo $_GET['sess_usertype_id'];  ?>','<?php echo $_GET['sess_user_id']; ?>')" class="pageapp-login-button button button-green" style="width: 70px;
    margin-top: 38px;">GO</a></center>
		</div>
		  </div>
		</div>
  
</div>

<script>
function prev_page(sess_usertype_id,site_id,sess_user_id)
{	
	$("#previous_id").val('log_book/log_book_list.php');
	$("#page_replace_div").load(FILE_PATH+'/log_book/log_book_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
}	
function get_log_book_list(from_date,to_date,sess_usertype_id,sess_user_id)
{	
	jQuery.ajax({
	type: "POST",
	url: FILE_PATH+'/log_book/log_book_list.php?from_date='+from_date+"&to_date="+to_date+"&sess_usertype_id="+sess_usertype_id+"&sess_user_id="+sess_user_id,
	success: function(data) 
	{
		jQuery("#page_replace_div").html(data);	     	
	}
	});
}	
</script>