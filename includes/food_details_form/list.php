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
		background: -webkit-linear-gradient(#010368, #944962);
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
	}

	.add-list i {
		font-size: 20px;
		line-height: 28px;
		color: #010368;
	}

	.table.new-table>tbody>tr>td,
	.table>tbody>tr>th,
	.table>tfoot>tr>td,
	.table>tfoot>tr>th,
	.table>thead>tr>td,
	.table>thead>tr>th {
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
header('Access-Control-Allow-Origin: *');
date_default_timezone_set('Asia/Kolkata');
include("../dbConnect.php");
include("../common_function.php");
$user_id = $_GET['user_id'];
$country_id = $_GET['country_id'];
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id'];
$user_type = $_GET['user_type'];
$unique_no = $_GET['unique_no'];
$completed_status = $_GET['completed_status'];

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
}
?>

<div class="container-fluid">
	<div class="row over-jobapp-div">

		<div class="col-8 job-for ">
			<a>Food Needed List</a>
		</div>

		<div class="col-2 add-list ">

			<i class="fa fa-plus-square arrow_back" onClick="food_needed_create('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"></i>

		</div>

		<div class="col-2 add-list">
			<i class="fa fa-chevron-circle-left" onClick="food_needed_back('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"></i>
		</div>


	</div>
</div>

<!--<div class="container-fluid" style="padding:0px;">
	<div class="row">
 
	<div class="col-md-8 top_left" style="padding-left:6px;">
	<h3><span class="notranslate">Food Needed Lisst</span></h3> 
	</div>
	<div class="col-md-2 top_left">

	<i class="fa fa-plus-square arrow_back" onClick="food_needed_create('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>')"></i>

	</div>
	<div class="col-md-2 top_left">
	<i class="fa fa-arrow-circle-left arrow_back" onClick="food_needed_back('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>')"></i>    </div> 
	</div>                                         
	 </div>------>

<div class="box-body job-list-table">
	<div class="table-responsive">
		<table id="example" class="table table-bordered table-hover table-striped display nowrap margin-top-10 w-p100 new-table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Mobile</th>
					<th>Reason For Food Need</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$roll_id = 1;
				$food_needed = $pdo_conn->prepare("SELECT * FROM food_needed WHERE delete_status!='1' $query");
				$food_needed->execute();
				$food_needed_list = $food_needed->fetchall();

				foreach ($food_needed_list as $value) { ?>

					<tr>
						<td><?php echo $roll_id; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['mobile_no']; ?></td>
						<td><?php echo $value['reason_for_choosing_food']; ?></td>
						<td>
							<a><i class="fa fa-pencil" aria-hidden="true" onclick="food_needed_edit('<?php echo $value['food_needed_id'] ?>','<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"></i></a>
							<i class="fa fa-trash-o" style="width:20px;height:20px;" onclick="delete_food('<?php echo $value['food_needed_id'] ?>','<?php echo $value['user_id']; ?>','<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"> </i>

						</td>
					</tr>

				<?php $roll_id += 1;
				} ?>


			</tbody>

		</table>
	</div>
</div>

<script type="text/javascript">
	function food_needed_create(country_id, state_id, district_id, city_id, area_id, user_id, unique_no, completed_status) {
	    var user_id = '<?php echo $user_id; ?>';
        var country_id = '<?php echo $country_id; ?>';
        var state_id = '<?php echo $state_id; ?>';
        var district_id = '<?php echo $district_id; ?>';
        var city_id = '<?php echo $city_id; ?>';
        var area_id = '<?php echo $area_id; ?>';
        var user_type = '<?php echo $user_type; ?>';
        var unique_no = '<?php echo $unique_no; ?>';
        var completed_status = '<?php echo $completed_status; ?>';
		$("#previous_id").val('food_details_form/create.php');
		$('#page_replace_div').load(FILE_PATH + '/food_details_form/create.php?user_id=' + user_id + '&country_id=' + country_id + '&state_id=' + state_id + '&district_id=' + district_id + '&city_id=' + city_id + '&area_id=' + area_id + '&user_type='+user_type+'&unique_no=' + unique_no + '&completed_status=' + completed_status);
	}


	function food_needed_back(country_id, state_id, district_id, city_id, area_id, user_id, unique_no, completed_status) {
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
		$('#page_replace_div').load(FILE_PATH + '/dashboard.php?user_id=' + user_id + '&country_id=' + country_id + '&state_id=' + state_id + '&district_id=' + district_id + '&city_id=' + city_id + '&area_id=' + area_id + '&unique_no=' + unique_no + '&completed_status=' + completed_status+'&user_type='+user_type);
	}

	function food_needed_edit(food_needed_id, country_id, state_id, district_id, city_id, area_id, user_id, unique_no, completed_status) {
	    var user_id = '<?php echo $user_id; ?>';
        var country_id = '<?php echo $country_id; ?>';
        var state_id = '<?php echo $state_id; ?>';
        var district_id = '<?php echo $district_id; ?>';
        var city_id = '<?php echo $city_id; ?>';
        var area_id = '<?php echo $area_id; ?>';
        var user_type = '<?php echo $user_type; ?>';
        var unique_no = '<?php echo $unique_no; ?>';
        var completed_status = '<?php echo $completed_status; ?>';
		$("#previous_id").val('food_details_form/create.php');
		$('#page_replace_div').load(FILE_PATH + '/food_details_form/create.php?user_id=' + user_id + '&country_id=' + country_id + '&state_id=' + state_id + '&district_id=' + district_id + '&city_id=' + city_id + '&area_id=' + area_id + '&food_needed_id=' + food_needed_id + '&unique_no=' + unique_no + '&completed_status=' + completed_status+'&user_type='+user_type);
	}

	function delete_food(food_needed_id, user_id, country_id, state_id, district_id, city_id, area_id, unique_no, completed_status) {
		value = confirm("Are Sure You Want Delete?");
		if (value) {
			var sendInfo = {
				food_needed_id: food_needed_id,
				action: 'Delete',
			};

			$.ajax({
				url: FILE_PATH + '/food_details_form/model.php',
				type: 'POST',
				data: sendInfo,
				timeout: 60000,
				success: function(data) {
					alert(data);
            	    var user_id = '<?php echo $user_id; ?>';
                    var country_id = '<?php echo $country_id; ?>';
                    var state_id = '<?php echo $state_id; ?>';
                    var district_id = '<?php echo $district_id; ?>';
                    var city_id = '<?php echo $city_id; ?>';
                    var area_id = '<?php echo $area_id; ?>';
                    var user_type = '<?php echo $user_type; ?>';
                    var unique_no = '<?php echo $unique_no; ?>';
                    var completed_status = '<?php echo $completed_status; ?>';
					$("#page_replace_div").load(FILE_PATH + '/food_details_form/list.php?user_id=' + user_id + '&country_id=' + country_id + '&state_id=' + state_id + '&district_id=' + district_id + '&city_id=' + city_id + '&area_id=' + area_id + '&unique_no=' + unique_no + '&completed_status=' + completed_status+'&user_type='+user_type);
				}
			});
		}
	}
</script>