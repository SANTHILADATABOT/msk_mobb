<script> hide_dialog(); </script>
<?php
include("../dbConnect.php");
include("../common_function.php");
$sess_usertype_id=$_GET['sess_usertype_id'];
$sess_user_id=$_GET['sess_user_id'];
$current_date=date('Y-m-d');
 

?>
<style>
#h33{font-size:18px; font-family:arial; color:#fff; padding-top:15px; padding-left:15px; }
	.t_icon{color:#fff !important; font-size:20px !important;}
	.label{padding:0px !important;margin:0px !important;font-size:12px !important;font-weight:400;}
	.btnes{border-radius:5px !important; width:30% !important;margin-left:10px;margin-bottom:5px;}
	.cover-field{margin-bottom:0px !important; margin-top:10px !important;}
	table tr th {
    background: #009688;
    color: white;
    padding: 9px;
}
table tr td {
    padding: 9px;
    background: #82c3bd;
    color: white;
}
tr:hover>td {
    background: #82c3bd;
}
</style>

<div class="col-xs-12 bg_color" style="padding-left: 0px;">
      <div class="col-xs-9 top_left">
        <h3 id="h33">Log Book List</h3> 
      </div> 
      <div class="col-xs-3 top_right">  
           <a onClick="page_replace('dashboard.php','sidebar-left','active-sidebar-box')"><h5>  <i class="fa fa-arrow-circle-o-left"></i> </h5></a>
      </div>
</div>

<!--<div style="height:50px; width:100%; background-color:#d8242f;" align="left">
	<h3 id="h33" style="margin-top:0px;">Log Book List</h3>
<img src="img/back.png" height="25" width="25" style="float:right; margin-top:-27px; margin-right:15px; z-index:99999 !important;" onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')"></div>
--->
<div id="machinery_entry" class="cover-page cover-image padding-div" >
    <div class="cover-page-content overall_div" >
<div class="cover-field">
<div class="col-xs-12" style="padding-left: 0px;padding-right: 0px;">
<div class="col-xs-6 first_btn" style="padding-left: 0px;">
<a  onClick="filter_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')" class=""> <i class="fa fa-filter"></i>Filter</a>
</div>
<div class="col-xs-6 first_btn" style="padding-right: 0px; margin-bottom: 22px;">
<a   onClick="create_new_log('<?php echo $sess_user_id?>','<?php echo $sess_usertype_id?>')" class="" > <i class="fa fa-paper-plane" aria-hidden="true"></i>Entry</a>
</div>
</div>
  </div>
  
<!--<div class="cover-field" >
    <a  onClick="filter_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')" class="pageapp-login-button button button-green btnes"> <i class="fa fa-filter"></i>&nbsp;&nbsp; Filter</a>
    <a  style="margin-left:29%" onClick="create_new_log('<?php echo $sess_user_id?>','<?php echo $sess_usertype_id?>')" class="pageapp-login-button button button-green btnes" >+ &nbsp;&nbsp; Entry</a>
</div>--->
  
<table style="padding:10px; margin:0px !important;" align="center">
<?php
$from_date=$_GET['from_date'];
$to_date=$_GET['to_date'];



  
if($from_date!=""){ $from_date1 = "entry_date>='$from_date'";}else{$from_date1="entry_date='$current_date'";}
if($to_date!=""){ $to_date1 = "entry_date<='$to_date'";}else{$to_date1='';}
 
if($_GET['from_date'])
{
	$sql34 = "SELECT * FROM log_book where $from_date1 and $to_date1 and main_delete_status!= '1' order by log_id desc";	
}
else
{	  
	$sql34 = "SELECT * FROM log_book where entry_date ='$current_date' and main_delete_status!= '1' order by log_id desc "; 
}
$rows = $pdo_conn->prepare($sql34);	
$log_book_list=$rows->execute(); 
$log_book_list=$rows->fetchAll();
if(count($log_book_list)>0)
{
	$i=count($log_book_list)+1;
	foreach($log_book_list as $record)
	{	
		$status = $record[delivery_status];
		$i--;

		?>
		<tr>
		<th width="40%" >&nbsp;&nbsp;<?php echo $i;?></th>
		<th colspan="2" ><div align="left">&nbsp;&nbsp;<?php echo date("d-m-Y",strtotime($record['entry_date'])); ?></div></th>
		<th width="13%">
		<i class="fa fa-pencil" style="font-size:20px;" onClick="edit_log_book('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>','<?php echo $record['log_no']?>','<?php echo $record['log_id']?>')"></i>
		</th>
		</tr>

		<tr>
		<td width="40%">
		<label class="label">&nbsp;&nbsp;Log No</label></td>
		<td colspan="2" >
		&nbsp;&nbsp;<?php echo $record['log_no']?><input type="hidden" id="hid_invoice_no" value="<?php echo $record['log_no']?>"/>
		<input type="hidden" id="hid_mach_id" value="<?php echo $record['log_id']?>"/>
		</td>
		<th>
		<i class="fa fa-trash" style="font-size:20px;" onClick="log_book_entry_delete('<?php echo $record['log_id']; ?>','<?php echo $record['random_no']; ?>','<?php echo $record['random_sc']; ?>','<?php echo $record['log_no']; ?>','<?php echo $sess_usertype_id ?>','<?php echo $sess_user_id?>')"></i>
		</th>

		</tr>

		<tr>
		<td  style="text-align:left !important;">
		<label class="label">&nbsp;&nbsp;Sales Ref Name</label></td>
		<td colspan="2" >
		&nbsp;&nbsp;<?php echo  $record['sales_ref_id']; ?>
		</td>
		</tr>

		<tr>
		<td style="text-align:left !important;" >
		<label class="label">&nbsp;&nbsp;Opening KM</label></td>
		<td colspan="2" >
		&nbsp;&nbsp;<?php echo number_format($record['opening_km'],2); ?>
		</td>
		</tr>
		<tr>
		<td width="46%"  style="text-align:left !important;">
		<label class="label">&nbsp;&nbsp;Closing KM</label></td>
		<td colspan="2" >
		&nbsp;&nbsp;<?php echo number_format($record['closing_km'],2); ?>
		</td>
		</tr>

		<tr>
		<td style="text-align:left !important;" >
		<label class="label">&nbsp;&nbsp;Total KM</label></td>
		<td colspan="2">
		&nbsp;&nbsp;<?php echo number_format($record['total_km'],2); ?>
		</td>
		</tr>
		<tr>
		<td style="text-align:left !important;">
		<label class="label">&nbsp;&nbsp;Total Amount</label></td>
		<td>
		&nbsp;&nbsp;<?php echo number_format($record['amount'],2); ?>
		</td>
		</tr>

		<?php 
	} 
}
else
{?>    
	<tr>
	<td  class="no_found" style="padding: 6px;color: black;">
	<b>No Records found</b></td>
	</tr>
<?php 
}
?>
</table>

	</div>
	</div>
<script>
function prev_page(sess_usertype_id,sess_user_id)
{
	$("#previous_id").val('dashboard.php');
	$("#page_replace_div").load(FILE_PATH+'/dashboard.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
}
function create_new_log(sess_user_id,sess_usertype_id)
{
	$("#previous_id").val('log_book/log_book_entry.php');
	$("#page_replace_div").load(FILE_PATH+'/log_book/log_book_entry.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
}
function filter_page(sess_usertype_id,sess_user_id)
{
	$("#previous_id").val('log_book/log_book_filter.php');
	$("#page_replace_div").load(FILE_PATH+'/log_book/log_book_filter.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
}

function edit_log_book(sess_usertype_id,sess_user_id,invoice_no,log_id)
{
	$("#previous_id").val('log_book/log_book_update.php');
	$("#page_replace_div").load(FILE_PATH+'/log_book/log_book_update.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id+"&log_id="+log_id);
}
	
	
function log_book_entry_delete(log_id,random_no,random_sc,log_no,sess_usertype_id,sess_user_id)
{ 
	if(confirm("Are you sure?"))
	{
		$.ajax({
		type: "POST",
		url: FILE_PATH+'/log_book/model.php?action=DELETE&log_id='+log_id+"&random_no="+random_no+"&random_sc="+random_sc+"&log_no="+log_no,
		success: function(data) 
		{
			$("#page_replace_div").load(FILE_PATH+'/log_book/log_book_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);			
		}
		});
	}
}

</script>


