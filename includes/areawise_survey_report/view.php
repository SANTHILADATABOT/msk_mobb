<?php 
error_reporting(0); 
include( "../dbConnect.php" );
include ("../common_function.php");

//echo "SELECT * FROM fact_finding_form WHERE survey_id='".$_GET['survey_id']."'";
$survey = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE survey_id='".$_GET['survey_id']."'");
$survey->execute();
$record = $survey->fetch();





?>
<label>Family No : <?php echo $record['family_no'] ?></label>
<label>Mohalla No : <?php echo $record['mohalla_no'] ?></label>
<label>Aadhar No : <?php echo $record['aadhar_no'] ?></label>
<label>Door No : <?php echo $record['door_no'] ?></label>
<label>Nagar : <?php echo $record['street_name'] ?></label>
<label>Date : <?php echo $record['date'] ?></label>
<label>Contact No : <?php echo $record['contact_no'] ?></label>
<label>Mother Tongue : <?php echo $record['mother_tongue'] ?></label>
<label>Ration Card No : <?php echo $record['ration_card_no'] ?></label>
<label>House : <?php echo $record['house'] ?></label>
<label>Bathroom Availability : <?php echo $record['bathroom_availability'] ?></label>
<label>Economic Status : <?php echo $record['economic_status'] ?></label>
<label>Gender : <?php echo $record['gender'] ?></label>
<label>Age : <?php echo $record['age'] ?></label>
<label>Relationship : <?php echo $record['relationship'] ?></label>
<label>Education Qualification : <?php echo $record['edu_qualification'] ?></label>
<label>Marital Status : <?php echo $record['marital_status'] ?></label>
<label>Voter id : <?php echo $record['voter_id'] ?></label>
<label>Bussiness Occupation : <?php echo $record['bussiness_occupation'] ?></label>

<label>Work Location : <?php echo $record['work_location'] ?></label>
<label>Blood Group : <?php echo $record['blood_group'] ?></label>
<label> Children (Age 4 to 15) / Adults (Age Above 15) for Maktab : <?php echo $record['for_maktab'] ?></label>
<label> Children/ Adults : <?php echo $record['child_adult_for_maktab'] ?></label>
<label> Age : <?php echo $record['child_adult_for_maktab_age'] ?></label>
<label> Why does he/she miss Maktab? : <?php echo $record['miss_maktab'] ?></label>
<label> Interested in Allin Hifz Course : <?php echo $record['allin_hifz_course'] ?></label>
<label> Interested in Niswan : <?php echo $record['interest_in_niswan'] ?></label>
<label> Family Women interested in 1-year Muslim Course : <?php echo $record['family_women_interest_in_1yr_muslim_course'] ?></label>
<label> Interested in Niswan : <?php echo $record['interest_in_niswan'] ?></label>
<label>2.Family Member Name: <?php echo $record['family_member_name_2'] ?></label>
<label>3.Family Member Name : <?php echo $record['family_member_name_3'] ?></label>
<label>4.Family Member Name : <?php echo $record['family_member_name_4'] ?></label>
<label>5.Family Member Name : <?php echo $record['family_member_name_5'] ?></label>
<label>6.Family Member Name : <?php echo $record['family_member_name_6'] ?></label>
<label>7.Family Member Name : <?php echo $record['family_member_name_7'] ?></label>
<label>8.Family Member Name : <?php echo $record['family_member_name_8'] ?></label>
<label>9.Family Member Name : <?php echo $record['family_member_name_9'] ?></label>
<label>Old Age Pension : <?php echo $record['Old Age Pension'] ?></label>
<label>Deserted Women pension : 

	<?php 
	if($record['deserted_women_pension']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['deserted_women_pension']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['deserted_women_pension']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['deserted_women_pension']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['deserted_women_pension']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['deserted_women_pension']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['deserted_women_pension']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['deserted_women_pension']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['deserted_women_pension']=='9')
	{
		echo $record['family_member_name_9'];
	} 
	?></label>
<label>Marriage help : 
	 <?php 
	if($record['marriage_help_msk']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['marriage_help_msk']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['marriage_help_msk']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['marriage_help_msk']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['marriage_help_msk']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['marriage_help_msk']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['marriage_help_msk']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['marriage_help_msk']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['marriage_help_msk']=='9')
	{
		echo $record['family_member_name_9'];
	} ?>
		

	</label>
<label>Marriage help : <?php echo $record['marriage_help_radio'] ?></label>
<label>Disability Pension :  
	<?php 
 
	if($record['disability_pension']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['disability_pension']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['disability_pension']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['disability_pension']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['disability_pension']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['disability_pension']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['disability_pension']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['disability_pension']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['disability_pension']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?></label>
<label>Widow / Aged unmarried welfare :  
	
	<?php 
 
	if($record['widow_aged_welfare']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['widow_aged_welfare']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['widow_aged_welfare']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['widow_aged_welfare']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['widow_aged_welfare']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['widow_aged_welfare']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['widow_aged_welfare']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['widow_aged_welfare']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['widow_aged_welfare']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Destitute / Orphan welfare :  
	
	<?php 
	if($record['destitute_orphan_welfare']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['destitute_orphan_welfare']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['destitute_orphan_welfare']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['destitute_orphan_welfare']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['destitute_orphan_welfare']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['destitute_orphan_welfare']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['destitute_orphan_welfare']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['destitute_orphan_welfare']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['destitute_orphan_welfare']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Incapable of working : 
	<?php 
	if($record['incapable_of_working']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['incapable_of_working']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['incapable_of_working']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['incapable_of_working']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['incapable_of_working']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['incapable_of_working']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['incapable_of_working']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['incapable_of_working']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['incapable_of_working']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Ulama welfare card Details: <?php echo $record['ulama_welfare_card_details'] ?></label>
<label>ulama welfare card :  
	

		<?php 
	if($record['ulama_welfare_card']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['ulama_welfare_card']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['ulama_welfare_card']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['ulama_welfare_card']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['ulama_welfare_card']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['ulama_welfare_card']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['ulama_welfare_card']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['ulama_welfare_card']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['ulama_welfare_card']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Others Details : <?php echo $record['other_details_1_entry'] ?></label>
<label>Other Details:  
		<?php 
	if($record['other_details_1']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['other_details_1']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['other_details_1']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['other_details_1']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['other_details_1']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['other_details_1']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['other_details_1']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['other_details_1']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['other_details_1']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Incapable of working : 
		<?php 
	if($record['incapable_of_working']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['incapable_of_working']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['incapable_of_working']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['incapable_of_working']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['incapable_of_working']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['incapable_of_working']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['incapable_of_working']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['incapable_of_working']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['incapable_of_working']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Higher Education Guidance :  
	<?php 
	if($record['higher_edu_guide']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['higher_edu_guide']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['higher_edu_guide']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['higher_edu_guide']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['higher_edu_guide']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['higher_edu_guide']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['higher_edu_guide']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['higher_edu_guide']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['higher_edu_guide']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Financial Support for Education :  
	
	<?php 
	if($record['fin_support_for_edu']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['fin_support_for_edu']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['fin_support_for_edu']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['fin_support_for_edu']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['fin_support_for_edu']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['fin_support_for_edu']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['fin_support_for_edu']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['fin_support_for_edu']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['fin_support_for_edu']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>School Dropouts Interested in Employment :  
<?php 
	if($record['school_dropouts_interest_in_emp']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['school_dropouts_interest_in_emp']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['school_dropouts_interest_in_emp']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['school_dropouts_interest_in_emp']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['school_dropouts_interest_in_emp']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['school_dropouts_interest_in_emp']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['school_dropouts_interest_in_emp']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['school_dropouts_interest_in_emp']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['school_dropouts_interest_in_emp']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>

</label>
<label>Pre-Matric Scholarship  :  
	
	<?php 
	if($record['pre_matric_scholarship']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['pre_matric_scholarship']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['pre_matric_scholarship']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['pre_matric_scholarship']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['pre_matric_scholarship']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['pre_matric_scholarship']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['pre_matric_scholarship']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['pre_matric_scholarship']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['pre_matric_scholarship']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Post_Matric Scholarship :  
	
	<?php 
	if($record['post_matric_scholarship']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['post_matric_scholarship']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['post_matric_scholarship']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['post_matric_scholarship']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['post_matric_scholarship']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['post_matric_scholarship']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['post_matric_scholarship']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['post_matric_scholarship']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['post_matric_scholarship']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Guidance for Employment :  
	<?php 
	if($record['guide_for_emp']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['guide_for_emp']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['guide_for_emp']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['guide_for_emp']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['guide_for_emp']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['guide_for_emp']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['guide_for_emp']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['guide_for_emp']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['guide_for_emp']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Others Details Entry : <?php echo $record['other_details_2'] ?></label>
<label>Others Details  :  
	
	<?php 
	if($record['other_details_entry2']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['other_details_entry2']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['other_details_entry2']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['other_details_entry2']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['other_details_entry2']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['other_details_entry2']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['other_details_entry2']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['other_details_entry2']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['other_details_entry2']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Family Counselling :  
	
	<?php 
	if($record['family_counselling']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['family_counselling']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['family_counselling']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['family_counselling']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['family_counselling']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['family_counselling']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['family_counselling']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['family_counselling']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['family_counselling']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Nikkah Counselling : 
	
	<?php 
	if($record['nikkah_counselling']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['nikkah_counselling']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['nikkah_counselling']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['nikkah_counselling']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['nikkah_counselling']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['nikkah_counselling']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['nikkah_counselling']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['nikkah_counselling']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['nikkah_counselling']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Entrepreneurship Counselling :  
	
	<?php 
	if($record['entrepreneur_counselling']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['entrepreneur_counselling']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['entrepreneur_counselling']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['entrepreneur_counselling']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['entrepreneur_counselling']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['entrepreneur_counselling']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['entrepreneur_counselling']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['entrepreneur_counselling']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['entrepreneur_counselling']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Business Counselling :  
	
	<?php 
	if($record['business_counselling']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['business_counselling']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['business_counselling']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['business_counselling']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['business_counselling']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['business_counselling']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['business_counselling']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['business_counselling']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['business_counselling']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Skill Development Guidance & Training :  
	
	<?php 
	if($record['guide_for_skill_develop']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['guide_for_skill_develop']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['guide_for_skill_develop']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['guide_for_skill_develop']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['guide_for_skill_develop']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['guide_for_skill_develop']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['guide_for_skill_develop']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['guide_for_skill_develop']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['guide_for_skill_develop']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label>Rehabilitation Counselling for Addicts :  
	
	<?php 
	if($record['rehabilitation_counselling']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['rehabilitation_counselling']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['rehabilitation_counselling']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['rehabilitation_counselling']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['rehabilitation_counselling']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['rehabilitation_counselling']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['rehabilitation_counselling']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['rehabilitation_counselling']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['rehabilitation_counselling']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label> Suffering due to Interest based loan :  
	
	<?php 
	if($record['suffer_from_interest_loan']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['suffer_from_interest_loan']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['suffer_from_interest_loan']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['suffer_from_interest_loan']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['suffer_from_interest_loan']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['suffer_from_interest_loan']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['suffer_from_interest_loan']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['suffer_from_interest_loan']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['suffer_from_interest_loan']=='9')
	{
		echo $record['family_member_name_9'];
	} 
	else {
	 	echo "-";
	 } ?>
</label>
<label> Details about the Guidance & Counselling : <?php echo $record['guide_counselling_full_details'] ?>
	

</label>
 
<label> Others : <?php echo $record['other_details_3'] ?></label>
<label> Disease Details : <?php echo $record['disease_details'] ?></label>
<label> Disease Details :  
		<?php 
	if($record['disease_no']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['disease_no']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['disease_no']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['disease_no']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['disease_no']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['disease_no']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['disease_no']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['disease_no']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['disease_no']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label> Surgery Details (Hospital Cost, Cash in Hand) : <?php echo $record['surgery_details'] ?></label>
<label>  Surgery Details :  
	

	<?php 
	if($record['surgery_details_no']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['surgery_details_no']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['surgery_details_no']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['surgery_details_no']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['surgery_details_no']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['surgery_details_no']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['surgery_details_no']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['surgery_details_no']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['surgery_details_no']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
<label> Have you recoverd from any chronic diseases? If yes, Details of Doctor & Cost of treatment (This is for Guiding others) : <?php echo $record['recovered_from_chronic_details'] ?></label>
<label> Monthly Expenditure on Medicine : <?php echo $record['mon_exp_on_medicine'] ?></label>
<label>Monthly Expenditure :  
	
<?php 
	if($record['mon_exp_on_medicine_no']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['mon_exp_on_medicine_no']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['mon_exp_on_medicine_no']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['mon_exp_on_medicine_no']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['mon_exp_on_medicine_no']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['mon_exp_on_medicine_no']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['mon_exp_on_medicine_no']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['mon_exp_on_medicine_no']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['mon_exp_on_medicine_no']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>

</label>
<label>Availability of Govt.Health Insurance Card : <?php echo $record['govt_insurance_card_avail'] ?></label>
<label> Are you willing to financially help those who are suffering in your Mohalla? :  
	

	<?php 
	if($record['willing_to_help_in_mohalla']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['willing_to_help_in_mohalla']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['willing_to_help_in_mohalla']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['willing_to_help_in_mohalla']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['willing_to_help_in_mohalla']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['willing_to_help_in_mohalla']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['willing_to_help_in_mohalla']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['willing_to_help_in_mohalla']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['willing_to_help_in_mohalla']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>
</label>
 
<label>Are you Interested to serve in the Mohalla Sevai Kuzhu? : 
		<?php 
	if($record['interest_to_serve_msk_no']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['interest_to_serve_msk_no']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['interest_to_serve_msk_no']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['interest_to_serve_msk_no']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['interest_to_serve_msk_no']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['interest_to_serve_msk_no']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['interest_to_serve_msk_no']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['interest_to_serve_msk_no']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['interest_to_serve_msk_no']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>

	</label>
<label>Emergency :  
	
			<?php 
	if($record['emergency_no']=='1')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['emergency_no']=='2')
	{
		echo $record['family_member_name_2'];
	} 
	else if($record['emergency_no']=='3')
	{
		echo $record['family_member_name_3'];
	} 
	else if($record['emergency_no']=='4')
	{
		echo $record['family_member_name_4'];
	} 
	else if($record['emergency_no']=='5')
	{
		echo $record['family_member_name_5'];
	} 
	else if($record['emergency_no']=='6')
	{
		echo $record['family_member_name_6'];
	} 
	else if($record['emergency_no']=='7')
	{
		echo $record['family_member_name_7'];
	} 
	else if($record['emergency_no']=='8')
	{
		echo $record['family_member_name_8'];
	} 
	else if($record['emergency_no']=='9')
	{
		echo $record['family_member_name_9'];
	}  ?>

</label>
<label>Family member who provided information : <?php echo $record['information_provided_by'] ?></label>
<label>Enumerator Name : <?php echo $record['enumerator_name'] ?></label>
<label>Enumerator Mobile No : <?php echo $record['enumerator_phone'] ?></label>
<label></label>