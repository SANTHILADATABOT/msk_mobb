<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
$quotation_ids=explode(',',$_GET['general']);
$update_mem=explode(',',$_GET['general_updt']);
$not_null=$_GET['not_null'];
$sub_form=$_GET['sub_form'];
$country_id = $_GET['country_id'];
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id'];
$count=$_GET['count'];
function subform_count($unique_no)
{
global $pdo_conn;
$sql_count = "SELECT COUNT(*) FROM fact_finding_subform WHERE random_no='".$unique_no."' ";
$count_res = $pdo_conn->query($sql_count);
$sub_count = $count_res->fetchColumn();
return $sub_count;
}



 if($not_null=='0')
 {

 $statement = $pdo_conn->prepare("INSERT INTO  fact_finding_subform (user_id, random_no, family_head_name, gender,age, relationship,edu_qualification, educ_qualification_inp, marital_status, voter_id, voter_id_in,bussiness_occupation, work_location, blood_group,for_maktab, child_adult_for_maktab, child_adult_for_maktab_age, miss_maktab, allin_hifz_course, interest_in_niswan,country_id,state_id,district_id,city_id,area_id,aadharr_id, aadharr_id_in,family_women_interest_in_1yr_muslim_course,child_interest,maqtab_interest) VALUES (:user_id, :random_no, :family_head_name, :gender,:age, :relationship,:edu_qualification, :educ_qualification_inp, :marital_status, :voter_id, :voter_id_in,:bussiness_occupation,:work_location, :blood_group, :for_maktab,:child_adult_for_maktab, :child_adult_for_maktab_age, :miss_maktab, :allin_hifz_course, :interest_in_niswan, :country_id, :state_id, :district_id, :city_id, :area_id, :aadharr_id, :aadharr_id_in, :family_women_interest_in_1yr_muslim_course, :child_interest, :maqtab_interest)");
 if($_GET['famil_head_main']!='')
 {

 $pdo_array= array(
	  	':user_id'=>$_GET['user_id'],
		':random_no'=>$_GET['unique_no'],
		':family_head_name'=>$_GET['famil_head_main'],
		':gender'=>$_GET['gendermain'],
		':age'=>$_GET['age'],
		':relationship'=>$_GET['relation_main'],
 		':edu_qualification'=>$_GET['edu_main'],
		':educ_qualification_inp'=>$_GET['edu_in_main'],
		':marital_status'=>$_GET['mari_st_main'],
		':voter_id'=>$_GET['voter_main'],
		':voter_id_in'=>$_GET['voter_in_main'],
		':bussiness_occupation'=>$_GET['busines_main'],
		':work_location'=>$_GET['wrklt_main'],
		':blood_group'=>$_GET['blood_main'],
		':for_maktab'=>$_GET['childcls_main'],
		':child_adult_for_maktab'=>$_GET['adu_or_chicls_main'],
		':child_adult_for_maktab_age'=>$_GET['age_chilcls_main'],
		':miss_maktab'=>$_GET['missclss_main'],
		':allin_hifz_course'=>$_GET['allin_hifzcls_main'],
		':interest_in_niswan'=>$_GET['niswancls_main'],
	':family_women_interest_in_1yr_muslim_course'=>$_GET['faml_wmcls_main'],
		':country_id'=>$_GET['country_id'],
 		':state_id'=>$_GET['state_id'],
		':district_id'=>$_GET['district_id'],
		':city_id'=>$_GET['city_id'],
		':area_id'=>$_GET['area_id'],
    	':aadharr_id_in'=>$_GET['aadharr_in_main'],
		':aadharr_id'=>$_GET['aadharr_main'],
		':child_interest'=>$_GET['child_interest'],
      	':maqtab_interest'=>$_GET['maqtab_interest'],
		);

		
  $result = $statement->execute($pdo_array);
if ($result == TRUE)	
	{
		$msg = "Successfully Created";
		 $fact_subform=subform_count($_GET['unique_no']);
	}
	else 
	{ 
		$array = array('error'=> $statement->errorinfo());
		echo json_encode($array);
		
	}
 
}
}
else if($not_null=='1')
{
  	foreach($update_mem as $val)
	{
	    $valexp=explode('-',$val);
	  if($valexp[22]!='No / இல்லை') {  $adhaar_in=$valexp[23]; } else { $adhaar_in='';}
 if($valexp[10]!='No / இல்லை') {  $voter_in=$valexp[11]; } else { $voter_in='';}
	 if($valexp[3]!='')
	 {
        $prepare_survey = $pdo_conn->prepare("UPDATE fact_finding_subform SET  user_id='".$valexp[1]."',aadharr_id='".$valexp[22]."',aadharr_id_in	='".$adhaar_in."',family_head_name='".$valexp[3]."',gender='".$valexp[4]."',age='".$valexp[5]."',relationship='".$valexp[6]."',edu_qualification='".$valexp[7]."',educ_qualification_inp='".$valexp[8]."',marital_status='".$valexp[9]."',voter_id='".$valexp[10]."',voter_id_in	='".$voter_in."',bussiness_occupation	='".$valexp[12]."',work_location='".$valexp[13]."',blood_group='".$valexp[14]."',for_maktab='".$valexp[15]."',child_adult_for_maktab='".$valexp[16]."',child_adult_for_maktab_age='".$valexp[17]."',miss_maktab='".$valexp[18]."',allin_hifz_course='".$valexp[19]."',interest_in_niswan='".$valexp[20]."',family_women_interest_in_1yr_muslim_course='".$valexp[21]."',child_interest='".$valexp[24]."',maqtab_interest='".$valexp[25]."'  WHERE  random_no='".$valexp[2]."' AND id='".$valexp[0]."' ");	
        $result = $prepare_survey->execute();

         if ($result == TRUE)	
	{
		$msg = "Successfully update";
         $fact_subform=subform_count($valexp[2]);
         
	}
	else 
	{ 
		$array = array('error'=> $prepare_survey->errorinfo());
		echo json_encode($array);
	}
      
	}

	}
	

}
if($_GET['general']!='')
{
	foreach($quotation_ids as $val)
	{

$valexp=explode('-',$val);



  $statement = $pdo_conn->prepare("INSERT INTO  fact_finding_subform (user_id, random_no, family_head_name, gender,age, relationship,edu_qualification, educ_qualification_inp, marital_status, voter_id, voter_id_in, bussiness_occupation, work_location, blood_group,for_maktab, allin_hifz_course, interest_in_niswan, family_women_interest_in_1yr_muslim_course,aadharr_id,aadharr_id_in,country_id,state_id,district_id,city_id,area_id,child_interest,maqtab_interest) 
          VALUES (:user_id, :random_no, :family_head_name, :gender,:age, :relationship,:edu_qualification, :educ_qualification_inp, :marital_status, :voter_id, :voter_id_in, :bussiness_occupation,:work_location, :blood_group, :for_maktab, :allin_hifz_course, :interest_in_niswan, :family_women_interest_in_1yr_muslim_course, :aadharr_id, :aadharr_id_in, :country_id, :state_id, :district_id, :city_id, :area_id, :child_interest, :maqtab_interest)");


          if($valexp[2]!='')
             {

 $pdo_array= array(
	 	':user_id'=>$valexp[0],
		':random_no'=>$valexp[1],
		':family_head_name'=>$valexp[2],
		':gender'=>$valexp[3],
		':age'=>$valexp[4],
		':relationship'=>$valexp[5],
		':edu_qualification'=>$valexp[6],
    	':educ_qualification_inp'=>$valexp[7],
 		':marital_status'=>$valexp[8],
		':voter_id'=>$valexp[9],
		':voter_id_in'=>$valexp[10],
		':bussiness_occupation'=>$valexp[11],
		':work_location'=>$valexp[12],
		':blood_group'=>$valexp[13],
		':for_maktab'=>$valexp[14],
		':allin_hifz_course'=>$valexp[18],
		':interest_in_niswan'=>$valexp[19],
		':family_women_interest_in_1yr_muslim_course'=>$valexp[20],
		':aadharr_id'=>$valexp[21],
     	':aadharr_id_in'=>$valexp[22],
		':country_id'=>$valexp[23],
		':state_id'=>$valexp[24],
		':district_id'=>$valexp[25],
		':city_id'=>$valexp[26],
		':area_id'=>$valexp[27],
 	    ':child_interest'=>$valexp[28],
		':maqtab_interest'=>$valexp[29],
 	

		);
  $result = $statement->execute($pdo_array);
  if ($result == TRUE)	
	{
	    $msg = "Successfully Created";
	}
	else 
	{ 
		$array = array('error'=> $statement->errorinfo());
		echo json_encode($array);
		
	}
}
}
}
if(($_GET['general']!='')||($not_null=='1')||($not_null=='0'))
{
    echo $count_val=subform_count($_GET[unique_no]);
}

 if($_GET['action']=="back") 
 { 
 $login_main=$pdo_conn->prepare("SELECT * FROM fact_finding_form where unique_no='".$_POST['unique_no']."' "); 

	$login_main->execute();
 	$login_main_check = $login_main->fetchAll();
   $unique_no=$login_main_check[0]['unique_no'];
}

 if($_GET['action']=='delete')
 {
     
//       $pdo_statement=$pdo_conn->prepare("DELETE FROM fact_finding_subform where id='".$_GET['id']."' "); 
// 	$pdo_statement->execute();



}



	?>