<?php
include("../dbConnect.php");
include("../common_function1.php");  
$sess_user_id=$_GET['sess_user_id'];
$sess_usertype_id=$_GET['sess_usertype_id']; 
$current_date=date('Y-m-d');
?>
<style>
#h33{font-size:18px; font-family:arial; color:#fff; padding-top:15px; padding-left:15px; }
.t_icon{color:#fff !important; font-size:20px !important;}
.label{padding:0px !important;margin:0px !important;font-size:12px !important;}
.btnes{border-radius:5px !important; width:30% !important;margin-left:10px;margin-bottom:5px;}
.cover-field{margin-bottom:0px !important; margin-top:10px !important;}
</style>


<script>

	function prev_page(sess_usertype_id,sess_user_id)
	{
		$("#previous_id").val('dashboard.php');	
		$("#page_replace_div").load(FILE_PATH+'/dashboard.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
	}
	function create_mach_list(sess_user_id,sess_usertype_id)
	{
		$("#previous_id").val('expense/expense_entry.php');	
		$("#page_replace_div").load(FILE_PATH+'/expense/expense_entry.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
	}
	function filter_page(sess_usertype_id,sess_user_id)
	{
		
		$("#previous_id").val('expense/filter_page.php');	
		$("#page_replace_div").load(FILE_PATH+'/expense/filter_page.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
	}	
	function delete_filter(exp_id,sess_usertype_id,expense_no,sess_user_id)
	{
		if (confirm("Are you sure to delete?")) 
		{
			jQuery.ajax({
			type: "POST",
			url: FILE_PATH+'/expense/expense_delete.php',
			data: "exp_id="+exp_id+"&exp_no="+expense_no,
			success: function(data)
			{
				$('#page_replace_div').load( FILE_PATH+'/expense/expense_list.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
			}
			});
		}
	}
	</script>



<div class="col-xs-12 bg_color" style="padding-left: 0px;">
      <div class="col-xs-6 top_left">
        <h3 id="h33">Expense List</h3> 
      </div> 
      <div class="col-xs-6 top_right">  
           <a onClick="page_replace('dashboard.php','sidebar-left','active-sidebar-box')"><h5>  <i class="fa fa-arrow-circle-o-left"></i> </h5></a>
      </div>
</div>

<!--<div style="height:50px; width:100%; background-color:#d8242f;" align="left">
	<h3 id="h33" style="margin-top:0px;">Expense List</h3>
<img src="img/back.png" height="25" width="25" style="float:right; margin-top:-27px; margin-right:15px; z-index:99999 !important;" onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')"></div>

<div class="cover-field" >
    <a  onClick="filter_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')" class="pageapp-login-button button button-green btnes"> <i class="fa fa-filter"></i>&nbsp;&nbsp; Filter</a>
    <a  style="margin-left:29%" onClick="create_mach_list('<?php echo $sess_user_id?>','<?php echo $sess_usertype_id?>')" class="pageapp-login-button button button-green btnes" >+ &nbsp;&nbsp; Entry</a>
</div>-->
<div id="machinery_entry" class="cover-page cover-image padding-div" >
    <div class="cover-page-content overall_div" >
<div class="cover-field">
<div class="col-xs-12" style="padding-left: 0px;padding-right: 0px;">
<div class="col-xs-6 first_btn" style="padding-left: 0px;">
<a  onClick="filter_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')" class=""> <i class="fa fa-filter"></i>Filter</a>
</div>
<div class="col-xs-6 first_btn" style="padding-right: 0px; margin-bottom: 22px;">
<a   onClick="create_mach_list('<?php echo $sess_user_id?>','<?php echo $sess_usertype_id?>')" class="" > <i class="fa fa-paper-plane" aria-hidden="true"></i>Entry</a>
</div>
</div>
  </div>
  
<table style="padding:10px; margin:0px !important;" align="center">
<?php
$from_date=$_GET['from_date'];
$to_date=$_GET['to_date'];
$expense_type=$_GET['expense_type'];
$sub_exp=$_GET['sub_exp'];

  
if($from_date!=""){ $from_date1 = "entry_date>='$from_date'";}else{$from_date1="entry_date='$current_date'";}
if($to_date!=""){ $to_date1 = "entry_date<='$to_date'";}else{$to_date1='';}
if($expense_type ==""){ $expense_type1="";}else{ $expense_type1 = "expense_type='$expense_type'";}
if($sub_exp!="SELECT"){ $sub_exp1 = "sub_expense_type='$sub_exp'";}else{$sub_ex1p="";}



$all_value10 = $from_date1.",".$to_date1.",".$expense_type1.",".$sub_exp1;
$all_array10 = explode(',',$all_value10);
foreach($all_array10 as $value10)
{ 
	if($value10!='')
	{
		$get_query101 .= $value10." AND ";
	}
}
if($_GET['from_date'])
{
	if($sess_usertype_id != '1')
	{
		$sql34 = "SELECT * FROM daily_expense where $get_query101 and staff_id='$sess_user_id' exp_id!='' order by exp_id desc ";	
	}
	else
	{
		$sql34 = "SELECT * FROM daily_expense where $get_query101 exp_id!='' order by exp_id desc ";	
	}	
}
else
{
	if($sess_usertype_id != '1')
	{
		$sql34 = "SELECT * FROM daily_expense where entry_date ='$current_date' and staff_id='$sess_user_id' order by exp_id desc ";
	}
	else
	{
		$sql34 = "SELECT * FROM daily_expense where entry_date ='$current_date'  order by exp_id desc ";
	}
}
$login = $pdo_conn->prepare($sql34);
$login->execute();	
$rows = $login->fetchAll();	
$count_records=$login->rowCount();	

if($count_records>0)
{echo "";
    $i=1;
	foreach($rows as $record)
	{		
		$exp_no=$record['expense_no'];
		$exp_type=get_exp_name($record['expense_type']);
		$sub_exp=$record['sub_expense_type'];
		$amount=$record['amount'];
		$description=$record['description'];
		$staff_name = get_user_name($record['staff_id']);
		?>
		<tr>
			<th width="50%" ><?php echo $i;?></th>
			<th ><div align="left">&nbsp;&nbsp;<b><?php echo date("d-m-Y",strtotime($record['entry_date'])); ?></b></div></th>
		</tr>		
		
		<tr>
			<td >
			<label class="label">&nbsp;&nbsp;Staff Name</label>
			</td>
			<td><b>&nbsp;&nbsp;<?php echo $staff_name;?></b></td>
		</tr>

		<tr>
			<td >
			<label class="label">&nbsp;&nbsp;Expense Type</label>
			
			</td>
			<td><b>&nbsp;&nbsp;<?php echo $exp_type; ?></b></td>
		</tr>
		<?php 
		if($sub_exp !="")
		{?>
			<tr>
			<td  >
			<label class="label">&nbsp;&nbsp;Sub_Expense Type</label>
			
			</td>
			<td><b>&nbsp;&nbsp;<?php echo $sub_exp; ?></b></td>
			</tr>
		<?php }?>
		
		<tr>
			<td >
			<label class="label">&nbsp;&nbsp;Amount</label>
			
			</td>
			<td><b>&nbsp;&nbsp;<?php echo $amount;?></b></td>
		</tr>

		<tr>
			<td  >
			<label class="label">&nbsp;&nbsp;Description</label>
			
			</td>
			<td><b>&nbsp;&nbsp;<?php echo $description;?></b></td>
		</tr>

		<?php 
		 $i++;
	}
}
else
{
?>
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
<style>
table th {
    text-align: center;
}
table tr td {
    padding: 9px;
	background: #82c3bd;
    color: white;
}
table tr th {
    background: #009688;
    color: white;
	padding: 9px;
}
.label {
    padding: 0px !important;
    margin: 0px !important;
    font-size: 12px !important;
    font-weight: 500;
}
b {
    font-weight: 200;
}
tr:hover>td {
    background: #82c3bd;
}
</style>