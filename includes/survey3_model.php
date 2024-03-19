<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
if($_GET['action']=="update") 
{
   
     $prepare_survey = $pdo_conn->prepare("UPDATE fact_finding_form SET old_age_pension='".$_POST['old_age_pension']."',deserted_women_pension='".$_POST['deserted_women_pension']."',marriage_help='".$_POST['marriage_help']."',marriage_help_radio='".$_POST['marriage_help_radio']."',disability_pension='".$_POST['disability_pension']."',widow_aged_welfare='".$_POST['widow_aged_welfare']."',destitute_orphan_welfare='".$_POST['destitute_orphan_welfare']."',incapable_of_working	='".$_POST['incapable_of_working']."',ulama_welfare_card	='".$_POST['ulama_welfare_card']."',ulama_welfare_card_details='".$_POST['ulama_welfare_card_details']."',other_details_1='".$_POST['other_details_1']."',other_details_1_entry='".$_POST['other_details_1_entry']."',marriage_help_radio='".$_POST['marriage_help_radio']."' WHERE  unique_no='".$_POST['unique_no']."' ");	
     $result = $prepare_survey->execute();

} 

?>
