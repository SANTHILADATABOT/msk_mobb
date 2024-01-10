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
$user_type=$_GET['user_type'];
$unique_no=$_GET['unique_no'];
?> 
 <div class="container-fluid"  >
	<div class="row">
		<div class="col-xs-12 top_header">
			<div class="col-xs-6 top_left">
			<a  >Join Report</a> 
			</div> 
		</div>
	</div>
</div>

    <!-- Main content -->
 
 		<!-- /.box-header -->
<div class="row"> 
<div class="col-xs-12">
<div class="table-responsive" style="margin-top: 35px;">
<table  class="table" style="padding:10px; margin:0px !important;" align="center">
	
		
			
				<th>#</th>
				<th>Name</th>
				<th>Father Name</th>
				<th>Profession</th>
				<th>District Name</th>
				<th>Pay Amonut</th>
				<th>Mobile Number</th>
				<th>Serve Department</th>
			
		
								
			<?php
//echo "SELECT * FROM fact_finding_form where delete_status!='1' $query ORDER BY survey_id DESC";
			$survey = $pdo_conn->prepare("SELECT * FROM join_masjith order by join_id desc");
			$survey->execute();
			$survey_list = $survey->fetchall();

			foreach($survey_list as $value)
		 	{  ?>
		
		    <tr>
				<td><?php echo $roll_id; ?></td>
				<td><?php echo $value['name']; ?></td>
				<td><?php echo $value['father_name'];	?>	</td>
				<td><?php echo $value['profession']; ?></td>
				<td><?php echo $value['district_name']; ?></td>
				<td><?php echo $value['pay_amount']; ?></td>
				<td><?php echo $value['mobile_no']; ?></td>
				<td><?php echo $value['serve_department']; ?> </td>
				
			   
			</tr>
			
			<?php 	$roll_id+=1;	} ?>			
	</table>
</div>
</div>
</div>


							<!-- /.content -->


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
 