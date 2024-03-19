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
$user_type=$_GET['user_type'];
$completed_status=$_GET['completed_status'];

if ($user_type == '1') {
	$query = '';
} else if ($user_type == '2') {
	$query = ' where country_id="' . $country_id . '"';
} else if ($user_type == '3') {
	$query = ' where country_id="' . $country_id . '" and state_id="' . $state_id . '" ';
} else if ($user_type == '4') {
	$query = ' where country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '"';
} else if ($user_type == '5') {
	$query = ' where country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '" and city_id="' . $city_id . '"';
} else if ($user_type == '6') {
	$query = ' where country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '" and city_id="' . $city_id . '" and area_id="' . $area_id . '"';
}
?> 


<div class="container-fluid"  >
	<div class="row over-jobapp-div">
	
			<div class="col-8 job-for ">
			<a>Join Form</a> 
			</div> 
		
		
		    
		<div class="col-2 add-list ">
	 
				<i class="fa fa-plus-square icon-div arrow_back " onClick="gotoPage('join_form/join_create','<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id;?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"></i>
    
			</div>
			
			<div class="col-2 add-list">
		
			<i class="fa fa-chevron-circle-left" onClick="join_back('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"></i>
			
			</div>
			
			
	</div>
</div>
<!--  <div class="container-fluid"  >
	<div class="row">
		<div class="col-xs-12 top_header">
			<div class="col-xs-6 top_left">
			<a  >Join Report</a> 
			</div> 
		</div>
	</div>
</div> -->
<!--<div class="col-xs-2 top_left">
	 
				<i class="fa fa-plus-square icon-div arrow_back " onClick="gotoPage('join_form/join_create','<?php echo $user_id;?>')"></i>
    
			</div>	
     Main content -->
 
 		<!-- /.box-header -->
<div class="row job-list-table"> 
<div class="col-12">
<div class="table-responsive" >
<table  class="table new-table border" style="padding:10px; margin:0px !important;" align="center" border="1">				              	              
	
		<thead>
			<tr>
				<th>#</th>
				
				<th>Name</th>
				<th>Father Name</th>
				<th>Profession</th>
				<th>District Name</th>
				<th>Pay Amonut</th>
				<th>Mobile Number</th>
				<th>Serve Department</th>
				<th>Action</th>
			</tr>
		</thead>
								
			<?php
			//$survey = $pdo_conn->prepare("SELECT * FROM join_masjith where user_id='".$user_id."' order by join_id desc");
			$survey = $pdo_conn->prepare("SELECT * FROM join_masjith $query order by join_id desc");
			$survey->execute();
			$survey_list = $survey->fetchall();

			foreach($survey_list as $value)
		 	{ ?>
		
		    <tr>
				<td><?php echo $roll_id;?></td>
				
				<td><?php echo $value['name']; ?></td>
				<td><?php echo $value['father_name'];	?>	</td>
				<td><?php echo $value['profession']; ?></td>
				<td><?php echo $value['district_name']; ?></td>
				<td><?php echo $value['pay_amount']; ?></td>
				<td><?php echo $value['mobile_no']; ?></td>
				<td><?php echo $value['serve_department']; ?> </td>
				
				<td><i class="fa fa-edit"   onclick="edit_join('<?php echo $value['join_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"  > </i>


	

			<i class="fa fa-trash-o" style="width:20px;height:20px;" onclick="delete_join('<?php echo $value['join_id']?>','<?php echo $value['user_id']; ?>','<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"> 				</i></td>
			   
			</tr>
			
			<?php 	$roll_id+=1;		} ?>			
	</table>
</div>
</div>
</div>


							<!-- /.content -->
<script type="text/javascript">
	
function edit_join(join_id,user_id,country_id,state_id,district_id,city_id,area_id,unique_no,completed_status)
{

/*$("#page_replace_div").load(FILE_PATH+'/customer_creation/create.php?customer_id='+customer_id+"&user_type_id="+user_type_id+"&usercreation_id="+usercreation_id);
	hide_dialog(); */

	    var user_id = '<?php echo $user_id; ?>';
        var country_id = '<?php echo $country_id; ?>';
        var state_id = '<?php echo $state_id; ?>';
        var district_id = '<?php echo $district_id; ?>';
        var city_id = '<?php echo $city_id; ?>';
        var area_id = '<?php echo $area_id; ?>';
        var user_type = '<?php echo $user_type; ?>';
        var unique_no = '<?php echo $unique_no; ?>';
        var completed_status = '<?php echo $completed_status; ?>';
	$("#page_replace_div").load(FILE_PATH+"/join_form/join_create.php?join_id="+join_id+"&user_id="+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status+'&user_type='+user_type);
	hide_dialog();
}



function delete_join(join_id,user_id,country_id,state_id,district_id,city_id,area_id,unique_no,completed_status)
{	
	value=confirm("Are Sure You Want Delete?");
	if(value)
	{		
		var sendInfo = 
		{				
			join_id:join_id,	
			action: 'Delete',
		};

		$.ajax({
		url:FILE_PATH+'/join_form/join_model.php',
		type:'POST',
		data: sendInfo,
		timeout:60000,
		success:function(data)
		{
    	    var user_id = '<?php echo $user_id; ?>';
            var country_id = '<?php echo $country_id; ?>';
            var state_id = '<?php echo $state_id; ?>';
            var district_id = '<?php echo $district_id; ?>';
            var city_id = '<?php echo $city_id; ?>';
            var area_id = '<?php echo $area_id; ?>';
            var user_type = '<?php echo $user_type; ?>';
            var unique_no = '<?php echo $unique_no; ?>';
            var completed_status = '<?php echo $completed_status; ?>';
			alert(data);
			$("#page_replace_div").load(FILE_PATH+'/join_form/join_list.php?join_id='+join_id+'&user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status+'&user_type='+user_type);
		}				
		});	
	}
}

function gotoPage(link,country_id,state_id,district_id,city_id,area_id,user_id,unique_no,completed_status) {
	    var user_id = '<?php echo $user_id; ?>';
        var country_id = '<?php echo $country_id; ?>';
        var state_id = '<?php echo $state_id; ?>';
        var district_id = '<?php echo $district_id; ?>';
        var city_id = '<?php echo $city_id; ?>';
        var area_id = '<?php echo $area_id; ?>';
        var user_type = '<?php echo $user_type; ?>';
        var unique_no = '<?php echo $unique_no; ?>';
        var completed_status = '<?php echo $completed_status; ?>';
    $("#page_replace_div").load(FILE_PATH+'/'+link+'.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status+'&user_type='+user_type);

    $("#previous_id").val('join_form/join_create.php');
}

function join_back(country_id,state_id,district_id,city_id,area_id,user_id,unique_no,completed_status)
{
	    var user_id = '<?php echo $user_id; ?>';
        var country_id = '<?php echo $country_id; ?>';
        var state_id = '<?php echo $state_id; ?>';
        var district_id = '<?php echo $district_id; ?>';
        var city_id = '<?php echo $city_id; ?>';
        var area_id = '<?php echo $area_id; ?>';
        var user_type = '<?php echo $user_type; ?>';
        var unique_no = '<?php echo $unique_no; ?>';
        var completed_status = '<?php echo $completed_status; ?>';
	$("#previous_id").val('dashboard.php');
	$('#page_replace_div').load(FILE_PATH + '/dashboard.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status+'&user_type='+user_type);
}

</script>

<style type="text/css">
	
	.border
	{
		border: 1px solid #ccc;
		border-collapse: collapse;
	}
	.button
	{
		width: 100px;
    background-color: blueviolet;
    color: white;
	}

	.top_header
	{
		background-color: #282c93;
		color: white;
		text-align: center;
		font-weight: 30px;
		font-size: 20px;
		width: 100%;

	}
</style>
 