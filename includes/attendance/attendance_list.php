<?php
include("../dbConnect.php"); 
include("../common_function.php"); 
$sess_user_id=$_GET['sess_user_id'];
$sess_usertype_id=$_GET['sess_usertype_id']; 
$current_date=date('Y-m-d');
?>
<script>
function prev_page(sess_usertype_id,sess_user_id)
{
	$("#previous_id").val('dashboard.php');
	$("#page_replace_div").load(FILE_PATH+'/dashboard.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
}
function create_att_list(sess_user_id,sess_usertype_id)
{
	$("#previous_id").val('attendance/att_creation.php');	
	$("#page_replace_div").load(FILE_PATH+'/attendance/att_creation.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
}
function filter_page(sess_usertype_id,sess_user_id)
{
	$("#previous_id").val('attendance/attendance_filter_page.php');	
	$("#page_replace_div").load(FILE_PATH+'/attendance/attendance_filter_page.php?sess_usertype_id='+sess_usertype_id+"&sess_user_id="+sess_user_id);
}
</script>


<style>
#h33{font-size:18px; font-family:arial; color:#fff; padding-top:15px; padding-left:15px; }
.t_icon{color:#fff !important; font-size:20px !important;}
.label{padding:0px !important;margin:0px !important;font-size:12px !important;}
.btnes{border-radius:5px !important; width:30% !important;margin-left:10px;margin-bottom:5px;}

</style>

<!--<div  class="col-sm-12 ">
<h3 id="h33" style="margin-top:0px;"></h3>
<img src="img/back.png" height="25" width="25" style="float:right; margin-top:-27px; margin-right:15px; z-index:99999 !important;" onClick="prev_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')"/>
</div>--->
<div class="col-xs-12 bg_color" style="padding-left: 0px;">
      <div class="col-xs-9 top_left">
        <h3 id="h33">Attendence List</h3> 
      </div> 
      <div class="col-xs-3 top_right">  
           <a onClick="page_replace('dashboard.php','sidebar-left','active-sidebar-box')"><h5>  <i class="fa fa-arrow-circle-o-left"></i> </h5></a>
      </div>
</div>

<div id="machinery_entry" class="cover-page cover-image padding-div" >
    <div class="cover-page-content overall_div" >
<div class="cover-field">
<div class="col-xs-12" style="padding-left: 0px;padding-right: 0px;">
<div class="col-xs-6 first_btn" style="padding-left: 0px;">
<a  onClick="filter_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')" class=""> <i class="fa fa-filter"></i>Filter</a>
</div>
<div class="col-xs-6 first_btn" style="padding-right: 0px;margin-bottom: 22px;">
<a   onClick="create_att_list('<?php echo $sess_user_id?>','<?php echo $sess_usertype_id?>')" class="" > <i class="fa fa-paper-plane" aria-hidden="true"></i>Entry</a>
</div>
</div>
  </div>
<table style="padding:10px; margin:0px !important;" align="center">
<?php
$from_date=$_GET['from_date'];
$to_date=$_GET['to_date'];
if($from_date!=""){ $from_date1 = "entry_date>='$from_date'";}else{$from_date1="entry_date='$current_date'";}
if($to_date!=""){ $to_date1 = "entry_date<='$to_date'";}else{$to_date1='';}
$all_value10 = $from_date1.",".$to_date1;
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
	 
		$sql34 = "SELECT * FROM attendance_entry where $get_query101 att_id!='' and  staff_name='$sess_user_id' order by att_id Desc ";	

 
}
else
{
 
		$sql34 = "SELECT * FROM attendance_entry where staff_name ='$sess_user_id' and entry_date ='$current_date' order by att_id Desc ";
 
}
$login = $pdo_conn->prepare($sql34);
$login->execute();	
$rows = $login->fetchAll();	
$count_records=$login->rowCount();	

if($count_records>0)
{
    $i =1;
	foreach($rows as $record)
	{	  
		$staff_name=get_user_name($record['staff_name']); //commomfunction		
		$attendance_type=get_att_name($record['attendance_type']); //commonfunction
		$attendance_time=$record['attendance_time'];?>        

        <tr width="100%">                
        <th width="50%" ><?php echo $i;?></th>        
        <th  width="50%"><?php echo date("d-m-Y",strtotime($record['entry_date'])); ?></th>                
        </tr>
		
        <tr>
            <td style="text-align:left !important;">
            <label class="label">&nbsp;&nbsp;Staff Name</label>
           
            </td>
			<td > <b>&nbsp;&nbsp;<?php echo $staff_name;?></b></td>
        </tr>  
        
        <tr>
            <td style="text-align:left !important;">
            <label class="label">&nbsp;&nbsp;Attendance Type</label>
            
            </td>
			<td > <b>&nbsp;&nbsp;<?php echo $attendance_type; ?></b></td>
        </tr>
        
                 
        
        <tr>
            <td  style="text-align:left !important;">
            <label class="label">&nbsp;&nbsp;Attendance Time</label>
            
            </td>
			<td > <b>&nbsp;&nbsp;<?php echo $attendance_time; ?></b></td>
        </tr>           
	<?php 
	 $i++;
	} 
}
else
{ ?>    
    <tr>
	<td   class="no_found" style="padding: 6px;color: black;">
    	<b>No Records found</b></td>
	</tr>
<?php 
} ?>
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
