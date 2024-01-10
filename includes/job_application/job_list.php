<style>
    /*********************************15-07-20**********************/
.over-jobapp-div {
    padding: 13px 0px;
}
.job-for a {
    font-size: 19px;
    font-weight: 600;
    font-family: 'Roboto Condensed', sans-serif !important;
}
.job-for {
    border-left: 5px solid #010368;
    background: -webkit-linear-gradient(#010368 , #944962);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.add-list i {
    font-size: 20px;
    line-height: 28px;
    color: #010368;
}
.table.new-table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    border: 1px solid #01036821 !important;
    padding: 7px;
}
.job-list-table {
    padding: 21px 21px;
}
div#page_replace_div {
    overflow-x: hidden;
}
</style>

<?php
$current_date=date('Y-m-d');

header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "../dbConnect.php" );
include( "../common_function.php" );
$user_id = $_GET['user_id']; 
$country_id = $_GET['country_id'];
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id'];
$unique_no=$_GET['unique_no'];
$completed_status=$_GET['completed_status'];
$user_type  =   $_GET['user_type'];


?>

<div class="container-fluid"  >
	<div class="row over-jobapp-div">
	
			<div class="col-8 job-for ">
			<a>Job Application List</a> 
			</div> 
		
		
		    
		<div class="col-2 add-list ">
	 
				<i class="fa fa-plus-square" onClick="gotoPage('job_application/job_application','<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id;?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"></i>
    
			</div>
			
			<div class="col-2 add-list">
		
			<i class="fa fa-chevron-circle-left" onClick="job_back('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"></i>
			
			</div>
			
			
	</div>
</div>

	



<div class="row job-list-table"> 
<div class="col-12">
<div class="table-responsive">
<table  class="table new-table" style="padding:10px; margin:0px !important;" align="center">

<?php 
	$survey = $pdo_conn->prepare("SELECT * FROM job_application where user_id='".$user_id."' ");
	$survey->execute();
	$survey_list = $survey->fetchall();

?>
                <th>#</th>
				<th>Name</th>
				<th>Mobile Number</th>
				<th>Age</th>
				<th>Gender</th>
				<th>Qualification</th>
				<th>Experience</th>
				<th>Action</th>
<?php

foreach($survey_list as $value)
		 	{ ?>
		
		    <tr>
				<td><?php echo $roll_id;?></td>
				<td><?php echo $value['name']; ?></td>
				<td><?php echo $value['mobile_no']; ?></td>
				<td><?php echo $value['age']; ?></td>
				<td><?php echo $value['gender'];	?>	</td>
				<td><?php echo $value['qualification']; ?></td>
				<td><?php echo $value['experience']; ?></td>
				<td><i class="fa fa-edit"   onclick="edit_job('<?php echo $value['job_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"  > </i>


	

			<i class="fa fa-trash-o" style="width:20px;height:20px;" onclick="delete_job('<?php echo $value['job_id']?>','<?php echo $value['user_id']; ?>','<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"> 				</i></td>
			   
			</tr>
			
			<?php 	$roll_id+=1;		} ?>			
					 
</table>
</div>
</div>
</div>

<script>

function edit_job(job_id,user_id,country_id,state_id,district_id,city_id,area_id,unique_no,completed_status)
{

	$("#page_replace_div").load(FILE_PATH+'/job_application/job_application.php?job_id='+job_id+"&user_id="+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
	hide_dialog();
}



function delete_job(job_id,user_id,country_id,state_id,district_id,city_id,area_id,unique_no,completed_status)
{	
	value=confirm("Are Sure You Want Delete?");
	if(value)
	{		
		var sendInfo = 
		{				
			job_id:job_id,	
			action: 'Delete',
		};

		$.ajax({
		url:FILE_PATH+'/job_application/job_model.php',
		type:'POST',
		data: sendInfo,
		timeout:60000,
		success:function(data)
		{
			alert(data);
			$("#page_replace_div").load(FILE_PATH+'/job_application/job_list.php?job_id='+job_id+"&user_id="+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
		}				
		});	
	}
}

function gotoPage(link,country_id,state_id,district_id,city_id,area_id,user_id,unique_no,completed_status) {


      $("#page_replace_div").load(FILE_PATH+'/'+link+'.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);

    $("#previous_id").val('job_application/job_application.php'); 
}
function job_back(country_id,state_id,district_id,city_id,area_id,user_id,unique_no,completed_status)
{
	$("#previous_id").val('dashboard.php');
	$('#page_replace_div').load(FILE_PATH + '/dashboard.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status);
}
</script>
<style>
.icon-div
{
color:white !important;
padding-top: 8px;
font-size:20px	
}
table.table tr th {
    text-align: center;
}
</style>