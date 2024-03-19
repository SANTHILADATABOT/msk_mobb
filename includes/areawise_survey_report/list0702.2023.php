<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
$current_date=date('Y-m-d');
include( "../dbConnect.php" );
include( "../common_function.php" );

$user_id=$_GET['user_id'];
$country_id=$_GET['country_id'];
$state_id=$_GET['state_id'];
$district_id=$_GET['district_id'];
$city_id=$_GET['city_id'];
$area_id=$_GET['area_id'];
$user_type=$_GET['user_type'];

if($user_type=='1')
{
	$query='';
	$country_query='';
	$state_query='';
	$district_query='';
	$city_query='';
	$area_query='';
}

else if($user_type=='2')
{
	$query='  and country_id="'.$country_id.'"';
	$country_query=" and country_id='".$country_id."'";
	$state_query=" and country_id='".$country_id."'";
	$district_query=" and country_id='".$country_id."'";
	$city_query=" and country_id='".$country_id."'";
	$area_query=" and country_id='".$country_id."'";
}


else if($user_type=='3')
{
	$query='  and country_id="'.$country_id.'"  and state_id="'.$state_id.'" ';
	$country_query=" and country_id='".$country_id."'";
	$state_query=' and country_id="'.$country_id.'" and state_id="'.$state_id.'"';
	$district_query=' and country_id="'.$country_id.'" and state_id="'.$state_id.'"';
	$city_query=' and country_id="'.$country_id.'" and state_id="'.$state_id.'"';
	$area_query=' and country_id="'.$country_id.'" and state_id="'.$state_id.'"';
}
else if($user_type=='4')
{
	$query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
	$country_query=" and country_id='$country_id'";
	$state_query=' and country_id="'.$country_id.'" and state_id="'.$state_id.'"';
	$district_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
	$city_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
	$area_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
}
else if($user_type=='5')
{
    $query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'" and city_id="'.$city_id.'"';
	  $country_query=" and country_id='".$country_id."'";
	  $state_query=" and country_id='".$country_id."' and state_id='".$state_id."'";
	  $district_query="  and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."'";
	  $city_query="  and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."'";
	$area_query="  and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."'";
}
 


 ?> 
 <div class="container-fluid"  >
	<div class="row">
		<div class="col-xs-12 top_header">
			<div class="col-xs-6 top_left">
			<a  >Area Wise Report</a> 
			</div> 
		</div>
	</div>
</div>
	<div  class="col-md-2">
		<h5 class="list-content">Country</h5>	 
		<select class="form-control select2 item_name"  name="country_id" id="country_id" onchange="get_state_list(country_id.value)" >
			<option value="">Select Country</option>
				<?php 
				$prepare = $pdo_conn->prepare("SELECT * FROM country WHERE delete_status!='1' and status='1' $country_query ");
				$prepare->execute();
				$country_list = $prepare->fetchall();
				foreach($country_list as $value) { ?>
					<option value="<?php echo $value['country_id']?>"><?php echo $value['country_name']?></option>
				<?php } ?>
		</select>	 
	</div>
    	 
	<div  class="col-md-2">
		<h5 class="list-content">State</h5>
		<select name="state_id" id="state_id" required class="form-control select2 item_name" onchange="get_district_list(country_id.value,state_id.value)">
			<option value="">Select State</option>
			<?php 
// 			$state = $pdo_conn->prepare("SELECT * FROM state WHERE delete_status!='1' and status='1'  $state_query");
// 			$state->execute();
// 			$state_list = $state->fetchall();
// 			foreach($state_list as $value) { 
			?>
				<!--<option value="<?php echo $value['state_id']?>"><?php echo $value['state_name']?></option>-->
			<?php //} ?>
		</select>
	</div>

	<div  class="col-md-2">
		<h5 class="list-content">District</h5>
		<select name="district_id" id="district_id" required class="form-control select2 item_name" onchange="get_city_list(country_id.value,state_id.value,district_id.value)">
			<option value="">Select District</option>
			<?php 
// 			$district = $pdo_conn->prepare("SELECT * FROM district WHERE delete_status!='1' and status='1' $district_query");
// 			$district->execute();
// 			$district_list = $district->fetchall();
// 			foreach($district_list as $value) { 
			?>
				<!--<option value="<?php echo $value['district_id']?>"><?php echo $value['district_name']?></option>-->
			<?php //} ?>
		</select>
	</div>

	<div  class="col-md-2">
		<h5 class="list-content">City</h5>
		<select name="city_id" id="city_id" required class="form-control select2 item_name" onchange="get_area_list(country_id.value,state_id.value,district_id.value,city_id.value)">
			<option value="">Select City</option>
			<?php 
// 			$city = $pdo_conn->prepare("SELECT * FROM city WHERE delete_status!='1' and status='1' $city_query");
// 			$city->execute();
// 			$city_list = $city->fetchall();
// 			foreach($city_list as $value) { 
			?>
				<!--<option value="<?php echo $value['city_id']?>"><?php echo $value['city_name']?></option>-->
			<?php// } ?>
		</select>
	</div>

	<div  class="col-md-2">
		<h5 class="list-content">Area</h5>
		<select name="area_id" id="area_id" required class="form-control select2 item_name"  >
			<option value="">Select Area</option>
			<?php 
// 			$area = $pdo_conn->prepare("SELECT * FROM area WHERE delete_status!='1' and status='1' $area_query");
// 			$area->execute();
// 			$area_list = $area->fetchall();
// 			foreach($area_list as $value) { 
			?>
				<!--<option value="<?php echo $value['area_id']?>"><?php echo $value['area_name']?></option>-->
			<?php //} ?>
		</select>
			<div class="btn btn-info">
			 <a onclick="get_filter_list(country_id.value,state_id.value,district_id.value,city_id.value,area_id.value)" class="hvr-sweep-to-top">GO</a>
		</div>
	</div>

	<div  class="col-md-2">
	
	</div>
     

 
 <!-- /.box-header --> 
	           
			     
<table  border="1">
    <thead>
        <tr>
        <th>#</th>
        <th>Name</th>
        <th>Mobile Number</th>
        <th>Country Name</th>
        <th>State Name</th>
        <th>District Name</th>
        <th>City Name</th>
        <th>Area Name</th>
        <th>Completed_status</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody id="areawise_count_list" >	
        <?php
        $survey = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE delete_status!='1' $query ORDER BY survey_id DESC");
        $survey->execute();
        $survey_list = $survey->fetchall();
        foreach($survey_list as $value)
        {
            $a = $value[completed_status];
        ?>
        
            
        <tr>
            
            
            
        <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo $roll_id;?></td>
        <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo get_name($value['unique_no']); ?></td>
        <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo $value['contact_no']; ?></td>
        <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo get_country_name($value['country_id']);	?>	</td>
        <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo get_state_name($value['state_id']); ?></td>
        <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo  get_district_name($value['district_id']); ?></td>
        <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo  get_city_name($value['city_id']); ?></td> 
        <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo  get_area_name($value['area_id']); ?></td> 
        <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php if ($a==1) {echo "Completed";}else{echo "Not Completed";}?></td>
        <td> 
         <a onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')" class="btn btn-primary btn-icon rounded-circle" ><div><i class="fa fa-pencil"></i></div> </a>
              
        <a onclick="area_wise_report_view('<?php echo $value['survey_id'] ?>')" title="Edit" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye-slash" style="font-size:30px;color:black"></i></a>  
        </td>
        </tr>
        
        <?php $roll_id+=1;}?>
    </tbody>
</table>
 
 
 		 
<script type="text/javascript">
	
function get_state_list(country_id)
{

   var user_type = window.localStorage.getItem("user_type");
 
	var state_id =   window.localStorage.getItem("state_id");
    
	 var send_info={ 
	 	country_id: country_id,
	 	state_id:state_id,
	 	user_type:user_type,
	 	action : "state_list",
	 };
	jQuery.ajax({
	type: "GET",
	url: FILE_PATH +"/areawise_survey_report/model.php",
	data: send_info,
		success: function(msg)
		{ 
		    $("#state_id").html(msg);		 
		}
	});
}

function get_district_list(country_id,state_id)
{
	var user_type = window.localStorage.getItem("user_type");

	var district_id =   window.localStorage.getItem("district_id");
	var send_info={ 
	 	country_id: country_id,
	 	state_id:state_id,
	 	district_id:district_id,
	 	user_type:user_type,
	 	action : "district_list",
	 };
	 
	jQuery.ajax({
	type: "GET",
	url: FILE_PATH +"/areawise_survey_report/model.php",
	data: send_info,
		success: function(msg)
		{ 
		    $("#district_id").html(msg);		 
		}
	});
}

function get_city_list(country_id,state_id,district_id)
{
	var user_type = window.localStorage.getItem("user_type");
	var city_id =   window.localStorage.getItem("city_id");
	var send_info={ 
	 	country_id: country_id,
	 	state_id:state_id,
	 	district_id:district_id,
	 	user_type:user_type,
	 	city_id:city_id,
	 	action : "city_list",
	 };
	jQuery.ajax({
	type: "GET",
	url: FILE_PATH +"/areawise_survey_report/model.php",
	data: send_info,
		success: function(msg)
		{ 
		    $("#city_id").html(msg);		 
		}
	});
}

function get_area_list(country_id,state_id,district_id,city_id)
{
	var user_type = window.localStorage.getItem("user_type");
	var area_id =   window.localStorage.getItem("area_id");
	var send_info={ 
	 	country_id: country_id,
	 	state_id:state_id,
	 	district_id:district_id,
	 	city_id:city_id,
	 	area_id :area_id,
	 	user_type:user_type,
	 	action : "area_list",
	 };
 
	jQuery.ajax({
	type: "GET",
	url: FILE_PATH +"/areawise_survey_report/model.php",
	data: send_info,
		success: function(msg)
		{ 
		    $("#area_id").html(msg);		 
		}
	});
} 

function  get_filter_list(country_id,state_id,district_id,city_id,area_id)
{
	 
	jQuery.ajax({
	type: "POST",
	url: FILE_PATH +"/areawise_survey_report/areawise_survey_list.php",
	data: "country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id,
	success: function(msg)
	{ 
		// /alert(msg);
	 $("#areawise_count_list").html(msg);
	}
});
}


function area_wise_report_view(survey_id)
{ 
	var user_id=   window.localStorage.getItem("user_id");
	$('#page_replace_div').load(FILE_PATH + '/areawise_survey_report/view.php?user_id='+user_id+"&survey_id="+survey_id);
}	


function edit_survey(survey_id,user_id,country_id,state_id,district_id,city_id,area_id,unique_id,comple_st)
{
	$('#page_replace_div').load(FILE_PATH+"/survey1.php?unique_no="+unique_id+"&user_id="+user_id+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&survey_id="+survey_id+"&completed_status="+comple_st);
}

</script>

<style type="text/css">
	
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