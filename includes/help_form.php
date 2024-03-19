<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
?>

<?php 
$prepare = $pdo_conn->prepare("SELECT * FROM country WHERE delete_status!='1' and status='1'");
$prepare->execute();
$country_list = $prepare->fetchall();
?>

<style>
	input.form-control {
		padding-left: 40px;
	}
</style>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->

<div class="wrapper homepage">
	<input type="hidden" class="form-control" id="type" name="type" value="<?php echo $_GET['type'];?>">
	<div class="head_line">
		<h5><span class="notranslate">Helper Details</span><span class="tamil_font_small"></span> </h5>
	</div>
	<div class="sub_bg animated bounceInLeft">
		<div class="container">
			<div class="row">
				<div class="col-md-12 survey_content">
					<form class="login_form">
						<div class="form-group">
							<label for=""><span class="notranslate">Enter Name</span></label>
							<i class="fa fa-user-o icons" aria-hidden="true"></i>
							<input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Name"
								onkeypress="return IsChar(event);">
						</div>
						<div class="form-group">
							<label for=""><span class="notranslate">Enter Mobile Number</span></label>
							<i class="fa fa-mobile icons" aria-hidden="true"></i>
							<input type="text" class="form-control" id="mobile_number" name="mobile_number" value="" placeholder="Enter Mobile Number"
								maxlength="10" onkeypress="return IsNumeric(event);">
						</div>

                        <?php
                        if(isset($_GET['type'])){
                            if(/*($_GET['type']=='Widow') ||*/ ($_GET['type']=='Blood')){ ?>
						<div class="form-group">
							<select class="select2 form-control" id="blood_id" name="blood_id">
								<option value=""><span class="notranslate">Select your Blood Group</span></option>
                        		<?php
                        	    $blood_grp = $pdo_conn->prepare("SELECT * FROM blood_group where status='1'");
                        	    $blood_grp->execute();
                        	    $blood_grp_list = $blood_grp->fetchall();
                        	    foreach ($blood_grp_list as $blood) { ?>
                        		<option value="<?php echo $blood['blood_id'] ?>">
                        			<?php echo $blood['blood_group_name'] ?>
                        		</option>
                        		<?php } ?>
							</select>
						</div>
						<?php }
						} ?>
						
						<div class="form-group">
							<select class="select2 form-control" id="country_id" name="country_id"
								onchange="state_list(country_id.value)">
								<option value=""><span class="notranslate">Select your Country</span><span
										class="notranslate"></option>
								<?php foreach($country_list as $value) : ?>
								<option value="<?php echo $value['country_id']?>">
									<?php echo $value['country_name']?>
								</option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<select class="form-control select2" id="state_id" name="state_id"
								onchange="dist_list(country_id.value,state_id.value)">
								<option value=""><span class="notranslate">Select your State</span><span
										class="notranslate"></option>
							</select>
						</div>

						<div class="form-group">
							<select class="form-control select2" id="district_id" name="district_id"
								onchange="city_list(country_id.value,state_id.value,district_id.value,city_id.value)">
								<option value=""><span class="notranslate">Select your District</span><span
										class="notranslate"></option>
							</select>
						</div>

						<div class="form-group">
							<select class="form-control select2" id="city_id" name="city_id"
								onchange="area_list(country_id.value,state_id.value,district_id.value,city_id.value,area_id.value)">
								<option value=""><span class="notranslate">Select your City</span><span
										class="notranslate"></option>
							</select>
						</div>


						<div class="form-group">
							<select class="form-control select2" id="area_id" name="area_id">
								<option value=""><span class="notranslate">Select your Area</span><span
										class="notranslate"></option>
							</select>
						</div>

						<div class="form-group">
							<label for=""><span class="notranslate">Enter Remarks</span></label>
							<textarea class="form-control" id="remarks" name="remarks" value=""
								rows="3" placeholder="Enter Remarks"></textarea>
						</div>
						
						<button type="button" name="submit" id="submit" class="btn btn-success"
							onclick="validate_help()">Submit</button>

					</form>

				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$(".select2").select2();

	var specialKeys = new Array();
	specialKeys.push(8); //Backspace
	function IsChar(e) {
		var keyCode = e.which ? e.which : e.keyCode
		var ret = ((keyCode > 64 && keyCode < 91) || (keyCode > 96 && keyCode < 123));
		return ret;
	}

	var specialKeys = new Array();
	specialKeys.push(8); //Backspace
	function IsNumeric(e) {
		var keyCode = e.which ? e.which : e.keyCode
		var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
		return ret;
	}


	function state_list(country_id) {
		//alert(country_id);
		jQuery.ajax({
			type: "POST",
			url: FILE_PATH + '/common_function.php',
			data: "country_id=" + country_id + "&action=" + "state_list",
			success: function (msg) {
				// alert(msg);
				$("#state_id").html(msg);
				$("#select2-city_id-container").html('Select your City');
				$("#select2-district_id-container").html('Select your District');
				$("#select2-area_id-container").html('Select your Area');
			}
		});
	}


	function dist_list(country_id, state_id) {
		//alert(country_id)
		jQuery.ajax({
			type: "POST",
			url: FILE_PATH + '/common_function.php',
			data: "state_id=" + state_id + "&country_id=" + country_id + "&action=" + "district_list",
			success: function (msg) {
				// alert(msg);
				$("#district_id").html(msg);
				$("#select2-city_id-container").html('');
				$("#select2-city_id-container").html('Select your City');
				$("#select2-area_id-container").html('Select your Area');
			}
		});
	}

	function city_list(country_id, state_id, district_id, city_id) {
		//alert(state_id);
		jQuery.ajax({
			type: "POST",
			url: FILE_PATH + '/common_function.php',
			data: "country_id=" + country_id + "&state_id=" + state_id + "&district_id=" + district_id + "&city_id=" + city_id + "&action=" + "city_list",
			success: function (msg) {
				// alert(msg);
				$("#city_id").html(msg);
				$("#select2-area_id-container").html('Select your Area');
			}
		});
	}

	function area_list(country_id, state_id, district_id, city_id, area_id) {
		// alert(area_id);
		jQuery.ajax({
			type: "POST",
			url: FILE_PATH + '/common_function.php',
			data: "country_id=" + country_id + "&state_id=" + state_id + "&district_id=" + district_id + "&city_id=" + city_id + area_id + "&area_id=" + area_id + "&action=" + "area_list",
			success: function (msg) {
				// alert(msg);
				$("#area_id").html(msg);
			}
		});
	}

	function validate_help() {

		if ($("#name").val() == '') {
			$("#name").focus();
			alert("Please enter your name");
			return false;
		}

		if ($("#type").val() == '') {
			$("#type").focus();
			alert("Please enter your name");
			return false;
		}

		if ($("#mobile_number").val() == '') {
			$("#mobile_number").focus();
			alert("Please enter your mobile number");
			return false;
		}

		if ($("#blood_id").val() == '') {
			$("#blood_id").focus();
			alert("Please select your Blood Group");
			return false;
		}

		if ($("#country_id").val() == '') {
			$("#country_id").focus();
			alert("Please select your country");
			return false;
		}

		if ($("#state_id").val() == '') {
			$("#state_id").focus();
			alert("Please select your state");
			return false;
		}

		if ($("#district_id").val() == '') {
			$("#district_id").focus();
			alert("Please select your district");
			return false;
		}

		if ($("#city_id").val() == '') {
			$("#city_id").focus();
			alert("Please select your city");
			return false;
		}

		if ($("#area_id").val() == '') {
			$("#area_id").focus();
			alert("Please select your area");
			return false;
		}

		if ($("#remarks").val() == '') {
			$("#remarks").focus();
			alert("Please enter your remarks");
			return false;
		}

		var type = $("#type").val();
		var name = $("#name").val();
		var mobile = $("#mobile_number").val();
		var blood_id = $("#blood_id").val();
		var country_id = $("#country_id").val();
		var state_id = $("#state_id").val();
		var district_id = $("#district_id").val();
		var city_id = $("#city_id").val();
		var area_id = $("#area_id").val();
		var remarks = $("#remarks").val();


		console.log(`country is: ${$("#country_id").val()} and state is ${$("#state_id").val()} and district is ${$("#district_id").val()} and city is ${$("#city_id").val()} and area is ${$("#area_id").val()}`);

		var sendInfo = {
			type: type,
			name: name,
			mobile: mobile,
			blood_id: blood_id,
			country_id: country_id,
			state_id: state_id,
			district_id: district_id,
			city_id: city_id,
			area_id: area_id,
			remarks: remarks
		};

		//alert(`The form details are ${sendInfo}`);

		$.ajax({
			url: FILE_PATH + '/help_model.php?action=contact',
			type: 'GET',
			data: sendInfo,
			success: function (msg) {
				alert(msg);
				//$("#previous_id").val('help_dashboard.php');
				$('#page_replace_div').load(FILE_PATH + '/help_dashboard.php');
			}
		});
	}

</script>