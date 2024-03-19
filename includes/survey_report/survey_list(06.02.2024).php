<?php 
error_reporting(0); 
include( "../dbConnect.php" );
include ("../common_function.php");
$wanted=$_GET['wanted'];
$user_id=$_GET['user_id'];
$country_id=$_GET['country_id'];
$state_id=$_GET['state_id'];
$district_id=$_GET['district_id'];
$city_id=$_GET['city_id'];
$area_id=$_GET['area_id'];
$user_type=$_GET['user_type'];
$query='';

if($wanted=='Job')
{ 
	$query='   and guide_for_emp!="" ';
}

else if($wanted=='Medical')
{
	$query='   and disease_no!=""';
}

else if($wanted=='Marriage')
{
	$query='   and marriage_help!=""';
}

else if($wanted=='MSK')
{
	$query='   and interested_to_serve!=""';
}
 
if($user_type=='2')
{
	$query.='  and country_id="'.$country_id.'"';	 
}
else if($user_type=='3')
{
	$query.='  and country_id="'.$country_id.'"  and state_id="'.$state_id.'" ';
}
else if($user_type=='4')
{
	$query.='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
}
else if($user_type=='5')
{
    $query.='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'" and city_id="'.$city_id.'"';	  
}
else if ($user_type=='6') 
{
    $query.='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'" and city_id="'.$city_id.'" and area_id="'.$area_id.'"';
}

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


if($wanted!="Medical")
{
   
$survey = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE delete_status!='1' $query and user_id='$user_id' ORDER BY survey_id DESC");
$survey->execute();
$survey_list = $survey->fetchAll();

foreach($survey_list as $value){
$a = $value[completed_status];

?>

   <tr>
	<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo $roll_id;?></td>
	<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo $value['family_no']; ?></td>
    <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo $value['contact_no']; ?></td>
	<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo get_country_name($value['country_id']);	?>	</td>
	<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo get_state_name($value['state_id']); ?></td>
	<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo  get_district_name($value['district_id']); ?></td>
	<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo  get_city_name($value['city_id']); ?></td> 
	<td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php echo  get_area_name($value['area_id']); ?></td>
    <td onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')"><?php if ($a==1) {echo "Completed";}else{echo "Not Completed";}?></td>
    <td> 
     <a onclick="edit_survey('<?php echo $value['survey_id']; ?>','<?php echo $value['user_id']; ?>','<?php echo $value['country_id'] ?>','<?php echo $value['state_id'] ?>','<?php echo $value['district_id'] ?>','<?php echo $value['city_id'] ?>','<?php echo $value['area_id'] ?>','<?php echo $value['unique_no'] ?>','<?php echo $value['completed_status'] ?>')" class="btn btn-primary btn-icon rounded-circle" ><div><i class="fa fa-pencil"></i></div> </a>
              
  	<a onclick="survey_view('<?php echo $value['survey_id']  ?>')" title="Edit"><i class="fa fa-eye-slash" style="font-size:30px;color:black"></i>
   	</a>  
  	</td>
</tr>
					
<?php 
$roll_id+=1;
}
}else { 
							     
							 
							 
							 	$res_medical = $pdo_conn->prepare("SELECT DISTINCT a.country_id,a.district_id,a.state_id,a.city_id,a.area_id,a.survey_id,a.unique_no,a.family_no,b.disease_details,b.surgery_details,b.surgery_details_no,b.mon_exp_on_medicine,b.mon_exp_on_medicine_no,a.contact_no,a.user_id,a.completed_status FROM  fact_family_disease b left join fact_finding_form a ON a.unique_no=b.unique_no  WHERE  b.delete_status!='1' and a.user_id!='0' and a.user_id='$user_id' and a.delete_status!='1' ORDER BY a.survey_id DESC");
						
								$res_medical->execute();
								$fet_list_medical = $res_medical->fetchall();
		
								foreach($fet_list_medical as $get_value)
							 	{ 
								// $get_survey_id=survye_id_from_unique_no($get_value[unique_no]);
								
				           	   
                                  

								?>
							
							    <tr>
									<td  onclick="edit_survey('<?php echo $get_value['survey_id']; ?>','<?php echo $get_value['user_id']; ?>','<?php echo $get_value['country_id'] ?>','<?php echo $get_value['state_id'] ?>','<?php echo $get_value['district_id'] ?>','<?php echo $get_value['city_id'] ?>','<?php echo $get_value['area_id'] ?>','<?php echo $get_value['unique_no'] ?>','<?php echo $get_value['completed_status'] ?>')" align="center"><?php echo $roll_id;?></td>
									 <td onclick="edit_survey('<?php echo $get_value['survey_id']; ?>','<?php echo $get_value['user_id']; ?>','<?php echo $get_value['country_id'] ?>','<?php echo $get_value['state_id'] ?>','<?php echo $get_value['district_id'] ?>','<?php echo $get_value['city_id'] ?>','<?php echo $get_value['area_id'] ?>','<?php echo $get_value['unique_no'] ?>','<?php echo $get_value['completed_status'] ?>')" align="center" class="style2 right">&nbsp;<?php echo $get_value['family_no'];?></td>
									<td onclick="edit_survey('<?php echo $get_value['survey_id']; ?>','<?php echo $get_value['user_id']; ?>','<?php echo $get_value['country_id'] ?>','<?php echo $get_value['state_id'] ?>','<?php echo $get_value['district_id'] ?>','<?php echo $get_value['city_id'] ?>','<?php echo $get_value['area_id'] ?>','<?php echo $get_value['unique_no'] ?>','<?php echo $get_value['completed_status'] ?>')" align="center"><?php echo $get_value['disease_details']?></td>
									<td onclick="edit_survey('<?php echo $get_value['survey_id']; ?>','<?php echo $get_value['user_id']; ?>','<?php echo $get_value['country_id'] ?>','<?php echo $get_value['state_id'] ?>','<?php echo $get_value['district_id'] ?>','<?php echo $get_value['city_id'] ?>','<?php echo $get_value['area_id'] ?>','<?php echo $get_value['unique_no'] ?>','<?php echo $get_value['completed_status'] ?>')" align="center"><?php echo $get_value['surgery_details']; ?></td>
									<td onclick="edit_survey('<?php echo $get_value['survey_id']; ?>','<?php echo $get_value['user_id']; ?>','<?php echo $get_value['country_id'] ?>','<?php echo $get_value['state_id'] ?>','<?php echo $get_value['district_id'] ?>','<?php echo $get_value['city_id'] ?>','<?php echo $get_value['area_id'] ?>','<?php echo $get_value['unique_no'] ?>','<?php echo $get_value['completed_status'] ?>')" align="center"><?php echo val_of_family_name($get_value['surgery_details_no']); ?></td>
									<td onclick="edit_survey('<?php echo $get_value['survey_id']; ?>','<?php echo $get_value['user_id']; ?>','<?php echo $get_value['country_id'] ?>','<?php echo $get_value['state_id'] ?>','<?php echo $get_value['district_id'] ?>','<?php echo $get_value['city_id'] ?>','<?php echo $get_value['area_id'] ?>','<?php echo $get_value['unique_no'] ?>','<?php echo $get_value['completed_status'] ?>')" align="center"><?php echo $get_value['mon_exp_on_medicine'];?>	</td>
									<td onclick="edit_survey('<?php echo $get_value['survey_id']; ?>','<?php echo $get_value['user_id']; ?>','<?php echo $get_value['country_id'] ?>','<?php echo $get_value['state_id'] ?>','<?php echo $get_value['district_id'] ?>','<?php echo $get_value['city_id'] ?>','<?php echo $get_value['area_id'] ?>','<?php echo $get_value['unique_no'] ?>','<?php echo $get_value['completed_status'] ?>')" align="center"><?php echo val_of_family_name($get_value['mon_exp_on_medicine_no']); ?></td>
									<td onclick="edit_survey('<?php echo $get_value['survey_id']; ?>','<?php echo $get_value['user_id']; ?>','<?php echo $get_value['country_id'] ?>','<?php echo $get_value['state_id'] ?>','<?php echo $get_value['district_id'] ?>','<?php echo $get_value['city_id'] ?>','<?php echo $get_value['area_id'] ?>','<?php echo $get_value['unique_no'] ?>','<?php echo $get_value['completed_status'] ?>')" align="center"><?php echo get_country_name($get_value['country_id']);	?>	</td>
									<td onclick="edit_survey('<?php echo $get_value['survey_id']; ?>','<?php echo $get_value['user_id']; ?>','<?php echo $get_value['country_id'] ?>','<?php echo $get_value['state_id'] ?>','<?php echo $get_value['district_id'] ?>','<?php echo $get_value['city_id'] ?>','<?php echo $get_value['area_id'] ?>','<?php echo $get_value['unique_no'] ?>','<?php echo $get_value['completed_status'] ?>')" align="center"><?php echo get_state_name($get_value['state_id']); ?></td>
									<td onclick="edit_survey('<?php echo $get_value['survey_id']; ?>','<?php echo $get_value['user_id']; ?>','<?php echo $get_value['country_id'] ?>','<?php echo $get_value['state_id'] ?>','<?php echo $get_value['district_id'] ?>','<?php echo $get_value['city_id'] ?>','<?php echo $get_value['area_id'] ?>','<?php echo $get_value['unique_no'] ?>','<?php echo $get_value['completed_status'] ?>')" align="center"><?php echo get_district_name($get_value['district_id']); ?></td>
									<td onclick="edit_survey('<?php echo $get_value['survey_id']; ?>','<?php echo $get_value['user_id']; ?>','<?php echo $get_value['country_id'] ?>','<?php echo $get_value['state_id'] ?>','<?php echo $get_value['district_id'] ?>','<?php echo $get_value['city_id'] ?>','<?php echo $get_value['area_id'] ?>','<?php echo $get_value['unique_no'] ?>','<?php echo $get_value['completed_status'] ?>')" align="center"><?php echo get_city_name($get_value['city_id']); ?></td> 
									<td onclick="edit_survey('<?php echo $get_value['survey_id']; ?>','<?php echo $get_value['user_id']; ?>','<?php echo $get_value['country_id'] ?>','<?php echo $get_value['state_id'] ?>','<?php echo $get_value['district_id'] ?>','<?php echo $get_value['city_id'] ?>','<?php echo $get_value['area_id'] ?>','<?php echo $get_value['unique_no'] ?>','<?php echo $get_value['completed_status'] ?>')" align="center"><?php echo get_area_name($get_value['area_id']) ?></td>
									
								    <td> 
								    <a onclick="edit_survey('<?php echo $get_value['survey_id']; ?>','<?php echo $get_value['user_id']; ?>','<?php echo $get_value['country_id'] ?>','<?php echo $get_value['state_id'] ?>','<?php echo $get_value['district_id'] ?>','<?php echo $get_value['city_id'] ?>','<?php echo $get_value['area_id'] ?>','<?php echo $get_value['unique_no'] ?>','<?php echo $get_value['completed_status'] ?>')" class="btn btn-primary btn-icon rounded-circle" ><div><i class="fa fa-pencil"></i></div> </a>
							  			<a href="#" title="View" id="quotation_view_modal" onclick="survey_view('<?php echo $get_value[survey_id] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye"  style="font-size:30px;color:black" aria-hidden="true"></i></a>  

							  		</td>
										</tr>
								
								<?php 
									$roll_id+=1;
							 
							 	}
							  } 
?>