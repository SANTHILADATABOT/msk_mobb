<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");

$survey = $pdo_conn->prepare("SELECT * FROM job_application WHERE job_id='".$_POST['job_id']."'");
$survey->execute();
$record = $survey->fetch();





?>
<table>
	<tr>
<td>
<td ><b>ID Number :</b></td><td> <?php echo $record['id_no'] ?></td>
<td><b>DOB: </b></td> <td><?php echo $record['dob'] ?></td>
<td><b>Contact No :</b></td><td> <?php echo $record['contact_no	'] ?></td>

</td>
</tr>
<tr>
	<td>
		<td></td>
<td> </td>
<td></td>
</td>
</tr>
<tr>
<td>
<td><b>Age :</b></td><td> <?php echo $record['age'] ?></td>
<td><b>Gender :</b></td><td> <?php echo $record['gender'] ?></td>


<td><b>Qualification</b></td><td> <?php echo $record['qualification'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b> Experience :</b></td><td>  <?php echo $record['experience'] ?></td>


<td><b> Job Experience Description:</b></td><td>   <?php echo $record['exp_yes1'] ?></td> 

<td> <?php echo $record['exp_yes2'] ?>
</td>
</td>
</tr>
<tr>
<td>

<td><b>Language Known :</b>
</td> 
<td><?php echo $record['language'] ?>
</td>

<td><b>City :
</b></td> 
<td><?php echo $record['city'] ?>
</td>



<td><b>Pincode :</b></td><td> <?php echo $record['pincode'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b> Are you Passport Holder:</b></td><td> <?php echo $record['passport'] ?></td>
<td><b>Marital Status :</b></td><td> <?php echo $record['marital_status'] ?></td>
<td><b>Driving License Holder :</b> </td><td><?php echo $record['license'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b>Area of Interest</b><td> <?php echo $record['area_of_interest'] ?></td>


<td><b>Expect Salary :</b></td> <td> <?php echo "From:  ".$record['from_salary']."  "."To ".$record['to_salary']; ?></td> 
<td><b>Are you Physically Challenged :</b></td><td> <?php echo $record['physically'] ?></td>

</td>
</tr>
<tr>
	<td>
<td><b>If the Physically Challenged :</b></td><td> <?php echo $record['disability'] ?></td>
<td><b>Are you looking for a job:</b></td><td> <?php echo $record['job'] ?></td>


<td><b> proforred job location :</b></td><td> <?php echo $record['location'] ?></td>
</td>
</tr>
<tr>
	<td>

<td><b> Hobbies :</b></td><td> <?php echo $record['hobbies'] ?></td>
<td><b> Name :</b></td><td> <?php echo $record['name'] ?></td>
<td><b>Father Name : </b></td><td><?php echo $record['father_name'] ?></td>
</td>
</tr>

<tr>
	<td>
<td> <b>Mother Name :</b> </td><td><?php echo $record['mother_name'] ?></td>

<td> <b>Permanent Address :</b></td><td> <?php echo $record['per_address'] ?></td>
<td><b> Mobile Number :</b></td><td> <?php echo $record['mobile_no'] ?></td>
</td>
</tr>
<td>
	<tr>
		<td>

<td><b> Whatsapp Number :</b></td><td> <?php echo $record['whatsapp_no'] ?></td>
<td><b>Email:</b></td><td> <?php echo $record['email'] ?></td>

<div class="col-md-3 ">
        <div class="form-group">
            <h5 class="view_mode">Image</h5>
            <div class="controls">
                <label name="applicant_image" id="applicant_image">
                     <?php 
					 if($record['job_image']=="")
					 echo "No Image";
					 else
					 {
						 ?>
					<img src="/msk_mob/img/job_image/<?php echo $record['job_image']; ?>"width="100" height="auto" alt="staff image"/>
                    <?php } ?>
                </label>
            </div>
        </div>
    </div>

</table>