<?php 
error_reporting(0);
include( "../dbConnect.php" );
include ("../common_function.php");
$country_id=$_POST['country_id'];
$area_id=$_POST['area_id'];
$city_id=$_POST['city_id'];
$state_id=$_POST['state_id'];
$district_id=$_POST['district_id'];
$query=$_POST['query'];

//$query='';

if($country_id!='')
{
	$query.='   and country_id="'.$country_id.'"';
}
if($state_id!='')
{
	$query.='   and state_id="'.$state_id.'"';
}
if($district_id!='')
{
	$query.='   and district_id="'.$district_id.'"';
}
if($city_id!='')
{
	$query.='   and city_id="'.$city_id.'"';
}

if($area_id!='')
{
	$query.='   and area_id="'.$area_id.'"';
}
$survey = $pdo_conn->prepare("SELECT survey_id,user_id,country_id,state_id,district_id,city_id,area_id,contact_no,unique_no,completed_status FROM fact_finding_form WHERE delete_status!='1' $query ORDER BY survey_id DESC");
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
    <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo get_district_name($value['district_id']); ?></td>
    <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo get_city_name($value['city_id']); ?></td> 
    <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo get_area_name($value['area_id']) ?></td>
    <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php if ($a==1) {echo "Completed";}else{echo "Not Completed";}?></td>
    <td><a onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')" class="btn btn-primary btn-icon rounded-circle" ><div><i class="fa fa-pencil"></i></div> </a>
    <a onclick="survey_view('<?php echo $value['survey_id'] ?>')" title="Edit" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye-slash" style="font-size:30px;color:black"></i></a>  
    </td>
    </tr>
<?php 
$roll_id+=1;
}
?>
	
<script type="text/javascript">	

function edit_survey(survey_id,user_id,country_id,state_id,district_id,city_id,area_id,unique_id,comple_st)
{
	$('#page_replace_div').load(FILE_PATH+"/survey1.php?unique_no="+unique_id+"&user_id="+user_id+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&survey_id="+survey_id+"&completed_status="+comple_st);
}

</script>						
				 
			 