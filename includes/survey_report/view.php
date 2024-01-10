<?php 
error_reporting(0); 
include( "../dbConnect.php" );
include ("../common_function.php");

//echo "SELECT * FROM fact_finding_form WHERE survey_id='".$_GET['survey_id']."'";
$survey = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE survey_id='".$_GET['survey_id']."'");
$survey->execute();
$record = $survey->fetch();

$sno=1;
$f_noo=0;

 function val_of_family_name($exp_val)
    {
        $i=1;
	global $pdo_conn;
        $get_val=explode(",",$exp_val);
        $get_count=count($get_val);
        foreach($get_val as  $val_get)
        {
             if($i==$get_count) {$val_con="";  } else {$val_con=","; }
            
             $findrelationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where id='".$val_get."'");
                    $findrelationship->execute();
                    
                    $fetrelationship_list = $findrelationship->fetch();
                    $get_val_name.=$fetrelationship_list['family_head_name'].$val_con;
$i++;
        }
      //return   'ss';
      return   $get_val_name;
         
}
?>
<label>Family No : <?php echo $record['family_no'] ?></label>
<label>Mohalla No : <?php echo $record['mohalla_no'] ?><?php if($record['mohalla_no']=='Yes / ஆம்'){ echo "-".$record['mohalla_no_inpt'] ;} ?></label>
<label>Door No : <?php echo $record['door_no'] ?></label>
<label>Street Name:<?php echo $record['street_name'] ?></label>
<label>City : <?php echo $record['nagar'] ?></label>
<label>Date : <?php echo $record['date'] ?></label>
<label>Contact No : <?php echo $record['contact_no'] ?></label>
<label>Mother Tongue : <?php echo $record['mother_tongue'] ?><?php if($record['mother_tongue']=="Other / பிற மொழிகள்")  { echo "-".$record['language_input']; } ?></label>
<label>Ration Card No : <?php echo $record['ration_card_no'] ?><?php if($record['ration_card_no']=='Yes / ஆம்'){ echo "-".$record['ration_no_inpt'] ;} ?></label>
<label>House : <?php echo $record['house'] ?></label>
<label>Having Land?: <?php echo $record['land_availability'] ?></label>
<label>Availability of Toilet? : <?php echo $record['bathroom_availability'] ?></label>
<label style="font-size:15px">Family Members Details</label>

<?php 
$survey2_sub_det=$pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$record['unique_no']."'  ");
$survey2_sub_det->execute();
$fet_sub_det=$survey2_sub_det->fetchAll();

foreach($fet_sub_det as $sur2_val)
{

    $f_noo++;
?>
<label><?php echo $f_noo.".";?>Family Member Name : <?php echo $sur2_val['family_head_name'] ?></label>
<label>Gender : <?php echo $sur2_val['gender'] ?></label>
<label>Age : <?php echo $sur2_val['age'] ?></label>
<label>Relationship : <?php echo get_relationship($sur2_val['relationship']); ?></label>
<label>Education Qualification : <?php echo get_edu_qualificaqtion($sur2_val['edu_qualification']);?><?php if($sur2_val['edu_qualification']=="3"){ echo "-".$sur2_val['educ_qualification_inp']; } ?> </label>
<label>Marital Status : <?php echo $sur2_val['marital_status'] ?></label>
<label>Voter Id : <?php echo $sur2_val['voter_id'] ?><?php if($sur2_val['voter_id']=='Yes / ஆம்'){ echo "-".$sur2_val['voter_id_in'] ;} ?></label>
<label>Aadhaar No : <?php echo $sur2_val['aadharr_id'] ?><?php if($sur2_val['aadharr_id']=='Yes / ஆம்'){ echo "-".$sur2_val['aadharr_id_in']; } ?></label>

<label> Occupational Details/Education : <?php echo $sur2_val['bussiness_occupation'] ?></label>

<label>Work Location : <?php echo $sur2_val['work_location'] ?></label>
<label>Blood Group : <?php echo get_blood_group($sur2_val['blood_group']); ?></label>
<label> Children Interested in Makthab Madrasa (Age 4-15) : <?php echo $sur2_val['child_interest'] ?></label>
<label> Interested in Makthab Madrasa (Adult) : <?php echo $sur2_val['maqtab_interest'] ?></label>

<label> Interested in Aalim Hifz Course : <?php echo $sur2_val['allin_hifz_course'] ?></label>
<label> Interested in Niswan : <?php echo $sur2_val['interest_in_niswan'] ?></label>
<label> Family Women interested in 1-year Muslim Course : <?php echo $sur2_val['family_women_interest_in_1yr_muslim_course'] ?></label>
<?php } ?>

<label>Old Age Pension : <?php echo $record['old_age_pension'] ?></label>
<label>Deserted Women pension :  <?php	echo $record['deserted_women_pension'];?></label>
<label>Marriage help From : <?php echo $record['marriage_help_radio'] ?></label>
<label>Marriage help : <?php echo $record['marriage_help'];?>	</label>
<label>Disability Pension :<?php echo $record['disability_pension'];?>
</label>
<label>Widow / Aged unmarried welfare :<?php echo $record['widow_aged_welfare'];?>
</label>

<label>Destitute / Orphan welfare :  <?php echo $record['destitute_orphan_welfare'];?>
</label>
<label>Incapable of working :  <?php echo $record['incapable_of_working'];?>
</label>

<label>Ulama welfare card Details: <?php echo $record['ulama_welfare_card_details'] ?></label>
<label>ulama welfare card :   <?php echo $record['ulama_welfare_card'] ?></label>
<label>Others: <?php echo $record['other_details_1'] ?></label>
<label>Others Details : <?php echo $record['other_details_1_entry'] ?></label>
<label>Incapable of working : <?php echo $record['incapable_of_working'] ?></label>
<label>Higher Education Guidance :   <?php echo $record['higher_edu_guide'] ?></label>
<label>Financial Support for Education :   <?php echo $record['fin_support_for_edu'] ?></label>
<label>School Dropouts Interested in Employment : <?php echo $record['school_dropouts_interest_in_emp'] ?></label> 
<label>Pre-Matric Scholarship  :   <?php echo $record['pre_matric_scholarship'] ?></label> 
<label>Post_Matric Scholarship :  <?php echo $record['post_matric_scholarship'] ?></label> 
<label>Guidance for Employment :  <?php echo $record['guide_for_emp'] ?></label>
<label>Others Details Entry : <?php echo $record['other_details_2'] ?></label>
<label>Others Details  :  <?php echo $record['other_details_entry2'] ?></label>
<label>Family Counselling :  <?php echo $record['family_counselling'] ?></label>
<label>Nikkah Counselling :  <?php echo $record['nikkah_counselling'] ?></label>
<label>Entrepreneurship Counselling :  <?php echo $record['entrepreneur_counselling'] ?></label>
<label>Business Counselling :   <?php echo $record['business_counselling'] ?></label>
<label>Skill Development Guidance & Training :<?php echo $record['guide_for_skill_develop'] ?></label>
<label>Rehabilitation Counselling for Addicts :<?php echo $record['rehabilitation_counselling'] ?></label>
<label> Suffering due to Interest based loan : <?php echo $record['suffer_from_interest_loan'] ?></label> 
<label> Details about the Guidance & Counselling : <?php echo $record['guide_counselling_full_details'] ?>
</label>
<label> Others : <?php echo $record['other_details_3'] ?></label>

<label  style="font-size:15px">Disease Details</label>


<?php 
$togg_survey_sub_disease=$pdo_conn->prepare("SELECT * From fact_family_disease  where unique_no='".$record['unique_no']."'  ");
$togg_survey_sub_disease->execute();
$survey6_sub_disease=$togg_survey_sub_disease->fetchAll();

foreach($survey6_sub_disease as $val_disease)
{

    
$monthly_family_members_name=val_of_family_name($val_disease['mon_exp_on_medicine_no']);
$surgical_family_members_name=val_of_family_name($val_disease['surgery_details_no']);
?>
    
<label><?php echo $sno++;?> Disease Details : <?php echo $val_disease['disease_details'] ?></label>
<label> Monthly Expenditure on Medicine : <?php echo $val_disease['mon_exp_on_medicine'] ?></label>
<label>Monthly Expenditure :  <?php echo $monthly_family_members_name; ?></label> 


<label> Surgery Details (Hospital Cost, Cash in Hand) : <?php echo $val_disease['surgery_details'] ?></label>
<label>  Surgery Details :  <?php echo $surgical_family_members_name ?></label>

<?php } ?>
<label> Have you recoverd from any chronic diseases? If yes, Details of Doctor & Cost of treatment (This is for Guiding others) : <?php echo $record['recovered_from_chronic_details'] ?></label>
<label>Availability of Govt.Health Insurance Card : <?php echo $record['govt_insurance_card_avail'] ?></label>


<label> Are you willing to financially help those who are suffering in your Mohalla? :  <?php echo $record['willing_to_help_in_mohalla_no'] ?><?php if($record['willing_to_help_in_mohalla']!=''){ echo "-".$record['willing_to_help_in_mohalla'];}?></label>
<label>Are you Interested to serve in the Mohalla Sevai Kuzhu? : <?php if($record['interest_to_serve_msk_no']!='') { echo $record['interest_to_serve_msk_no'];}?>
<?php if($record['interest_to_serve_msk']!='') { echo "-".$record['interest_to_serve_msk'];}?>
<?php if($record['interested_to_serve']!='') { echo "-".$record['interested_to_serve'];}?></label>
<label>Emergency :  <?php echo $record['emergency'] ?></label>
<label>Emergency Needed Person:  <?php echo $record['emergency_no'] ?></label>
<label>Family member who provided information : <?php echo $record['information_provided_by'] ?></label>
<label>Family's Economic Status : <?php echo $record['economic_status'] ?></label>
<label>Enumerator Name : <?php echo $record['enumerator_name'] ?></label>
<label>Enumerator Mobile No : <?php echo $record['enumerator_phone'] ?></label>
