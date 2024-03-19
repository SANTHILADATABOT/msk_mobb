<?php
$current_date = date('Y-m-d');
include("../dbConnect.php");
include("../common_function.php");

$user_id = $_GET['user_id'];
$country_id = $_GET['country_id'];
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id'];
$user_type = $_GET['user_type'];


if ($user_type == '1') {
	$query = '';
} else if ($user_type == '2') {
	$query = '  and country_id="' . $country_id . '"';
} else if ($user_type == '3') {
	$query = '  and country_id="' . $country_id . '"  and state_id="' . $state_id . '" ';
} else if ($user_type == '4') {
	$query = '  and country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '"';
} else if ($user_type == '5') {
	$query = '  and country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '" and city_id="' . $city_id . '"';
} else if ($user_type == '6') {
	$query = '  and country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '" and city_id="' . $city_id . '" and area_id="' . $area_id . '"';
}/* else {
	$query = " and user_id='$user_id'";
}*/
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 top_header">
			<div class="col-xs-6 top_left">
				<a>Survey Report</a>
			</div>
		</div>
	</div>
</div>
<!-- Main content -->
<div class="row">
	<div class="col-md-4">
		<h5 class="list-content">Wanted</h5>
		<select class="form_control select2" id="wanted" name="wanted">
			<!--<option> Select</option>-->
			<option value="Job">Job Wanted</option>
			<option value="Medical">Medical Wanted</option>
			<option value="Marriage">Marriage Wanted</option>
			<option value="MSK">MSk Join</option>
		</select>
		<a onclick="get_survey_filter_list(wanted.value)" class="btn btn-info">Go</a>
	</div>

	<div class="col-md-4">

	</div>
</div>

<table class="border" border="1">
	<thead>

		<tr id='non_medical'>

			<th>#</th>
			<th>Name</th>
			<th>Mobile Number</th>
			<th>Country Name</th>
			<th>State Name</th>
			<th>District Name</th>
			<th>City Name</th>
			<th>Area Name</th>
			<th>completed_status</th>
			<th>Action</th>

		</tr>

		<tr id='medical' style='display:none'>
			<th>#</th>
			<th>Family No</th>
			<th>Disease Details</th>
			<th>Surgery Details</th>
			<th>Name(Surgery)</th>
			<th>Mon Exp on Medicine</th>
			<th>Name(Mon Exp)</th>
			<th>Country Name</th>
			<th>State Name</th>
			<th>District Name</th>
			<th>City Name</th>
			<th>Area Name</th>
			<th>Action</th>

		</tr>

	</thead>
	<tbody id="survey_report_list">
		<?php
		$survey = $pdo_conn->prepare("SELECT survey_id,user_id,country_id,state_id,district_id,city_id,area_id,unique_no,completed_status,family_no,contact_no FROM fact_finding_form where delete_status!='1' and guide_for_emp!='' $query ORDER BY survey_id DESC");
		$survey->execute();
		$survey_list = $survey->fetchall();

		foreach ($survey_list as $value) {
			//  $sql1=mysql_fetch_array(mysql_query("select  completed_status from fact_finding_form"));

			$a = $value[completed_status];
		?>
			<tr>

				<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo $roll_id; ?></td>
				<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo $value['family_no']; ?></td>
				<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo $value['contact_no']; ?></td>
				<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo get_country_name($value['country_id']);	?> </td>
				<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo get_state_name($value['state_id']); ?></td>
				<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo get_district_name($value['district_id']); ?></td>
				<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo get_city_name($value['city_id']); ?></td>
				<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo get_area_name($value['area_id']) ?></td>
				<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php if ($a == 1) {
																																																																																														echo "Completed";
																																																																																													} else {
																																																																																														echo "Not Completed";
																																																																																													} ?></td>
				<td>
					<a onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')" class="btn btn-primary btn-icon rounded-circle">
						<div><i class="fa fa-pencil"></i></div>
					</a>


					<a onclick="survey_view('<?php echo $value['survey_id'] ?>')" title="Edit" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye-slash" style="font-size:30px;color:black"></i></a>
				</td>
			</tr>

		<?php
			$roll_id += 1;
		}
		?>
	</tbody>
</table>


<!-- /.content -->
<script type="text/javascript">
	function get_survey_filter_list(wanted) {
		var user_type = window.localStorage.getItem("user_type");
		var country_id = window.localStorage.getItem("country_id");
		var state_id = window.localStorage.getItem("state_id");
		var district_id = window.localStorage.getItem("district_id");
		var city_id = window.localStorage.getItem("city_id");
		var area_id = window.localStorage.getItem("area_id");
		var user_id = window.localStorage.getItem("user_id")
		var sendInfo = {
			user_type: user_type,
			state_id: state_id,
			district_id: district_id,
			city_id: city_id,
			country_id: country_id,
			area_id: area_id,
			user_id: user_id,
			wanted: wanted,
		};
		jQuery.ajax({
			type: "GET",
			url: FILE_PATH + "/survey_report/survey_list.php",
			data: sendInfo,
			success: function(msg) {
				$("#survey_report_list").html(msg);
				if (wanted == 'Medical') {
					$('#medical').show();
					$('#non_medical').hide();
				} else {
					$('#medical').hide();
					$('#non_medical').show();
				}
			}
		});
	}

	function edit_survey(survey_id, user_id, country_id, state_id, district_id, city_id, area_id, unique_id, comple_st) {
		$('#page_replace_div').load(FILE_PATH + "/survey1.php?unique_no=" + unique_id + "&user_id=" + user_id + "&country_id=" + country_id + "&state_id=" + state_id + "&district_id=" + district_id + "&city_id=" + city_id + "&area_id=" + area_id + "&survey_id=" + survey_id + "&completed_status=" + comple_st);
	}

	function survey_view(survey_id) {

		var user_type = window.localStorage.getItem("user_type");
		var country_id = window.localStorage.getItem("country_id");
		var state_id = window.localStorage.getItem("state_id");
		var district_id = window.localStorage.getItem("district_id");
		var city_id = window.localStorage.getItem("city_id");
		var area_id = window.localStorage.getItem("area_id");
		var user_id = window.localStorage.getItem("user_id");

		//alert(msg);
		$('#page_replace_div').load(FILE_PATH + '/survey_report/view.php?user_id=' + user_id + "&survey_id=" + survey_id + "&country_id=" + country_id + "&state_id=" + state_id + "&district_id=" + district_id + "&city_id=" + city_id + "&area_id=" + area_id);

	}
</script>

<style type="text/css">
	.border {
		border: 1px solid #ccc;
		border-collapse: collapse;
	}

	.button {
		width: 100px;
		background-color: blueviolet;
		color: white;
	}

	.top_header {
		background-color: #282c93;
		color: white;
		text-align: center;
		font-weight: 30px;
		font-size: 20px;
		width: 100%;

	}
</style>