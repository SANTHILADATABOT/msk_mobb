<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
if($_GET['action']=="update") 
{
/*echo "UPDATE fact_finding_form SET higher_edu_guide='".$_POST['higher_edu_guide']."',fin_support_for_edu='".$_POST['fin_support_for_edu']."',school_dropouts_interest_in_emp='".$_POST['school_dropouts_interest_in_emp']."',pre_matric_scholarship='".$_POST['pre_matric_scholarship']."',post_matric_scholarship='".$_POST['post_matric_scholarship']."',guide_for_emp='".$_POST['guide_for_emp']."',other_details_2='".$_POST['other_details_2']."',other_details_entry2='".$_POST['other_details_entry2']."' WHERE  unique_no='".$_POST['unique_no']."'";*/
$prepare_survey = $pdo_conn->prepare("UPDATE fact_finding_form SET higher_edu_guide='".$_POST['higher_edu_guide']."
',fin_support_for_edu='".$_POST['fin_support_for_edu']."',school_dropouts_interest_in_emp='".$_POST['school_dropouts_interest_in_emp']."',pre_matric_scholarship='".$_POST['pre_matric_scholarship']."',post_matric_scholarship='".$_POST['post_matric_scholarship']."',guide_for_emp='".$_POST['guide_for_emp']."',other_details_2='".$_POST['other_details_2']."',other_details_entry2='".$_POST['other_details_entry2']."' WHERE  unique_no='".$_POST['unique_no']."' ");

$result = $prepare_survey->execute();

echo "Successfully Update";

} 

?>
