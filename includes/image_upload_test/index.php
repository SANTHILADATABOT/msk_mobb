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
			<a>Image Upload Test</a>
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
	$survey = $pdo_conn->prepare("SELECT * FROM image_upload_test");
	$survey->execute();
	$survey_list = $survey->fetchall();
?>
    <tr>
        <th>Id</th>
    	<th>Name</th>
    	<th>Image</th>
	</tr>
<?php
foreach($survey_list as $value)
{ ?>
    <tr>
		<td><?php echo $value['id'];?></td>
		<td><?php echo $value['img1']; ?></td>
		<td><img src="<?php echo $image_path?>/image_upload_test/<?php echo $value['img1']; ?>" id='temp_picture1' name='picture' style="width: 100px; height: 100px;" ></td>
	</tr>
	<?php
} ?>
</table>
</div>
</div>
</div>

<script>
function gotoPage() {
	    var user_id = '<?php echo $user_id; ?>';
        var country_id = '<?php echo $country_id; ?>';
        var state_id = '<?php echo $state_id; ?>';
        var district_id = '<?php echo $district_id; ?>';
        var city_id = '<?php echo $city_id; ?>';
        var area_id = '<?php echo $area_id; ?>';
        var user_type = '<?php echo $user_type; ?>';
        var unique_no = '<?php echo $unique_no; ?>';
        var completed_status = '<?php echo $completed_status; ?>';
    $("#previous_id").val('image_upload_test/create.php');
    $("#page_replace_div").load(FILE_PATH+'/image_upload_test/create.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status+'&user_type='+user_type);

}
function job_back()
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