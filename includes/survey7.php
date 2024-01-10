<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "dbConnect.php" );
include( "common_function.php" );
$sess_user_id = $_GET[ 'sess_user_id' ];
$sess_usertype_id = $_GET[ 'sess_usertype_id' ];
$crt_month = date( 'Y-m' );
$current_date = date( 'Y-m-d' );

$unique_no=$_GET['unique_no'];

$user_id=$_GET['user_id'];
$country_id = $_GET['country_id'];
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id'];
$completed_status=$_GET['completed_status'];

 

    $permission = $pdo_conn->prepare("SELECT * From fact_finding_form  where unique_no='".$_GET['unique_no']."' and user_id='".$user_id."' and country_id='".$country_id."' and state_id='".$state_id."' and district_id='".$district_id."' and city_id='".$city_id."' and area_id='".$area_id."'");

$permission->execute();
$survey3_records = $permission->fetch();
$emergency_no=$survey3_records['emergency_no'];
$interest_to_serve_msk_no=$survey3_records['interest_to_serve_msk_no'];
 $willing_to_help_in_mohalla=$survey3_records['willing_to_help_in_mohalla'];
  $willing_to_help_in_mohalla_no=$survey3_records['willing_to_help_in_mohalla_no'];
$interest_serve_msk=$survey3_records['interest_to_serve_msk'];
$interest_to_serve=$survey3_records['interested_to_serve'];
$interest_to_serve_msk_no=$survey3_records['interest_to_serve_msk_no'];
 $emergency=$survey3_records['emergency'];
 $information_provided_by=$survey3_records['information_provided_by'];
$economic_status=$survey3_records['economic_status'];
$enumerator_name=$survey3_records['enumerator_name'];
$enumerator_phone=$survey3_records['enumerator_phone'];

?>
<style>
input.form-control {padding-left: 40px;}
.gove_sche tr td { font-size: 12px;}
thead {background-color: #1f2287;color: #fff;font-size: 13px;}
table.nobg_table { width: 100%;}
table.nobg_table tr {background-color: transparent !important;}
.nobg_table tr td { background-color: transparent;border: 0px;padding: 10px 0px;}
input.form-control.small_bor_radius {border-radius: 20px !important;height: 34px;background-color: #ffebed;border: 0px;}
.serial_select_bg {background-color: #edeef5;border: 0px;border-radius: 4px !important;}
</style>
<input type="hidden" name="unique_no" id="unique_no" value="<?php echo $unique_no; ?>">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" name="country_id" id="country_id" value="<?php echo $country_id;  ?>">
<input type="hidden" name="state_id" id="state_id" value="<?php echo $state_id;  ?>">
<input type="hidden" name="district_id" id="district_id" value="<?php echo $district_id;  ?>">
<input type="hidden" name="city_id" id="city_id" value="<?php echo $city_id;  ?>">
<input type="hidden" name="area_id" id="area_id" value="<?php echo $area_id;  ?>">
<div class="wrapper homepage ">
<div class="sub_bg animated bounceInLeft">
  <div class="container">
    <div class="row">
      <div class="col-md-12 survey_content">
		  
        <form class="login_form bor-over">
          <div class="form-group smspace">
            <label for=""> Are you willing to financially help those who are suffering in your Mohalla? / நமது மொஹல்லா பாதிக்கப்பட்டவர்களுக்கு பொருளாதார உதவி செய்ய விரும்புவர்களின் விபரம் </label>
            <div class="form-row smspace">
              <div class="col-3">
                <label for="" class="two_hgt">Name / பெயர் </label>
                
              </div>
              <div class="col-9">
                  <select class="form-control serial_select_bg check_empt willing_to_help_in_mohalla select2" multiple id="willing_to_help_in_mohalla" style="width:100%">
                  <option>Select</option>
                 <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                     $expl_suff=explode(',',$willing_to_help_in_mohalla);
                    foreach($relationship_list as $value){
                   $expl_suffs=$expl_suff[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expl_suff)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
                </select>
                <!--<label for="" class="two_hgt"></label>-->
                <!--<i class="icon-user icons"></i>-->
                <!--<input type="text" class="form-control check_empt" id="willing_to_help_in_mohalla_no" value="<?php echo $willing_to_help_in_mohalla_no;?>">-->
              </div>
            </div>
          </div>
        </form>
		  
        <form class="login_form bor-over">
          <div class="form-group smspace">
            <label for=""> Are you Interested to serve in the Mohalla Sevai Kuzhu? / சேவைக் குழுவில் பங்குபெற விருப்பமா ?</label>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input chck_box_val11" id="customRadio_11" name="example" <?php if($survey3_records['interest_to_serve_msk']=="Yes"){?> checked="checked" <?php } ?> value="Yes">
             <label class="custom-control-label pt-1" for="customRadio_11"  >Yes / ஆம் </label>          
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input chck_box_val22" id="customRadio_22" name="example" <?php if($survey3_records['interest_to_serve_msk']=="No"){?> checked="checked" <?php } ?> value="No">
          <label class="custom-control-label pt-1" for="customRadio_22" >No / இல்லை </label>            </div>
          <div class="form-row smspace willing-btm">
            <div class="col-3">
              <label for="" class="two_hgt">Name / பெயர்  </label>
             
            </div>
            <div class="col-9">
                 <select class="form-control serial_select_bg check_empt interest_to_serve_msk_no select2" style="width:100%" multiple  id="interest_to_serve_msk_no">
                <option>Select</option>
                 <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $explo_sn=explode(',',$interest_to_serve_msk_no);
                    foreach($relationship_list as $value){
                    $expls=$explo_sn[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$explo_sn)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
              </select>
              
              <!--<label for="" class="two_hgt"></label>-->
              <!--<i class="icon-user icons"></i>-->
              <!--<input type="text" class="form-control check_empt" id="interested_to_serve" value="<?php echo $interest_to_serve;?>">-->
            </div>
          </div>
        </form>
		  
        <form class="login_form bor-over">
          <div class="form-row smspace">
            
            <div class="col-3">
              <label for="" class="two_hgt">Name / பெயர்  </label>
              
            </div>
            <div class="col-9">
                <select class="form-control serial_select_bg check_empt emergency_no select2" style="width:100%" multiple id="emergency_no" value="<?php echo $interested_to_serve;?>">
                <option>Select</option>
               <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."'");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $expl_em=explode(',',$emergency_no);
                    foreach($relationship_list as $value){
                    $expl_emc=$expl_em[$j];
                    ?>
                    <option value='<?php echo $value['family_head_name'] ?>'<?php if(in_array($value['family_head_name'],$expl_em)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
              </select>
              </div>
              <div class="col-12">
              <label for="" class="two_hgt">Emergency / அவசர தேவை </label>
              <i class="icon-people icons"></i>
              <input type="text" class="form-control check_empt" id="emergency" value="<?php echo $emergency;?>">
            </div>
          </div>
        </form>
		  
        <form class="login_form bor-over">
          <div class="form-row smspace">
            <div class="col-12">
              <label for="" class="two_hgt">Family member who provided information / தகவல் கொடுப்பவரின்  பெயர் </label>
              <i class="icon-people icons"></i>
              <input type="text" class="form-control check_empt" id="information_provided_by" value="<?php echo $information_provided_by;?>">
            </div>
          </div>
        </form>
                <form class="login_form bor-over">

        <div class="form-group">
              <label for=""><span class="notranslate">Family's Economic Status</span> / குடும்ப பொருளாதார நிலை </label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input chck_box_val" id="economic_status_A" name="economic_status" value="A"
                  <?php if($economic_status=="A") : ?> checked="checked" <?php endif; ?>>
                <label class="custom-control-label pt-1" for="economic_status_A"><span class="notranslate">A</span>
                </label>
              </div>
            <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input chck_box_val" id="economic_status_B" name="economic_status" value="B"
            <?php if($economic_status=="B") : ?> checked="checked" <?php endif; ?>>
            <label class="custom-control-label pt-1" for="economic_status_B"><span class="notranslate">B</span>
            </label>
            </div>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input chck_box_val" id="economic_status_C" name="economic_status" value="C"
                  <?php if($economic_status=="C") : ?> checked="checked" <?php endif; ?>>
                <label class="custom-control-label pt-1" for="economic_status_C"><span
                    class="notranslate">C</span></label>
              </div>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input chck_box_val" id="economic_status_D" name="economic_status" value="D"
                  <?php if($economic_status=="D") : ?> checked="checked" <?php endif; ?>>
                <label class="custom-control-label pt-1" for="economic_status_D"><span
                    class="notranslate">D</span></label>
              </div>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input chck_box_val" id="economic_status_E" name="economic_status" value="E"
                  <?php if($economic_status=="E") : ?> checked="checked" <?php endif; ?>>
                <label class="custom-control-label pt-1" for="economic_status_E"><span
                    class="notranslate">E</span></label>
              </div>
            </div>
		   </form>
        <form class="login_form bor-over">
          <div class="form-group smspace">
            <label for="" style="text-align:center;"> Enumerator / கணக்கெடுப்பவரின் விபரம் </label>
          </div>
          <div class="form-row smspace enum">
            <div class="col-5">
              <label for="" class="two_hgt">Name / பெயர் </label>
              <i class="icon-user  icons"></i>
              <input type="text" class="form-control check_empt" id="enumerator_name" value="<?php echo $enumerator_name;?>">
            </div>
            <div class="col-7">
              <label for="" class="two_hgt">Phone Number / தொலைபேசி எண் </label>
              <i class="icon-phone icons"></i>
              <input type="text" class="form-control check_empt" id="enumerator_phone" value="<?php echo $enumerator_phone;?>">
            </div>
          </div>
          
             
        </form>
		  

			  
      </div>
    </div>
  </div>
</div>
</div>

<div class="footer">
            <div class="no-gutters">
                <div class="col-auto mx-auto">
                    <div class="row no-gutters justify-content-center">
					    <div class="col-6">
					      <a onClick="get_survey6_login_det('<?php echo $unique_no; ?>','<?php echo $user_id; ?>')">
                            <button type="button" class="btn btn-success back_btn"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i> Back </button>
                        </div>
                        <div class="col-6">
                            <a onClick="get_survey8_login_det()">
								<button type="button" class="btn btn-success next_btn"> Submit Form </button>
							</a>
                        </div>
						
                    </div>
                </div>
            </div>
        </div>



<script type="text/javascript">
function get_survey6_login_det(unique_no,user_id)
{	

    var user_id = '<?php echo $user_id ?>';
    var country_id ='<?php echo $country_id ?>';
    var state_id = '<?php echo $state_id ?>';
    var district_id = '<?php echo $district_id ?>';
    var city_id = '<?php echo $city_id ?>';
    var area_id =  '<?php echo $area_id ?>';
    var completed_status='<?php echo $completed_status ?>';
    $("#previous_id").val('survey6.php');             
    $('#page_replace_div').load(FILE_PATH+"/survey6.php?unique_no="+unique_no+"&user_id="+user_id+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&completed_status="+completed_status);
		
}

</script> 
<script type="text/javascript">
function get_survey8_login_det()
{	
    var unique_no=$("#unique_no").val();
    var completed_status='<?php echo $completed_status ?>';
    var user_id = '<?php echo $user_id ?>';
    var country_id ='<?php echo $country_id ?>';
    var state_id = '<?php echo $state_id ?>';
    var district_id = '<?php echo $district_id ?>';
    var city_id = '<?php echo $city_id ?>';
    var area_id =  '<?php echo $area_id ?>';
 // var willing_to_help_in_mohalla=$("#willing_to_help_in_mohalla").val();
     var economic_status = $(":radio[name=economic_status]:checked").val();
  if(economic_status==undefined)
    {
        economic_status='';
    }
    var willing_to_help_in_mohalla=[];
    jQuery.each(jQuery('.willing_to_help_in_mohalla option:selected'), function() {
    willing_to_help_in_mohalla.push(jQuery(this).val()); 
    });
    var willing_to_help_in_mohalla=willing_to_help_in_mohalla.toString();
    var willing_to_help_in_mohalla_no= $("#willing_to_help_in_mohalla_no").val();
   var interest_to_serve_msk = $(":radio[name=example]:checked").val();
   if(interest_to_serve_msk==undefined)
    {
     interest_to_serve_msk='';
    }

    var interest_to_serve_msk_no=[];
    jQuery.each(jQuery('.interest_to_serve_msk_no option:selected'), function() {
    interest_to_serve_msk_no.push(jQuery(this).val()); 
    });
    var interest_to_serve_msk_no=interest_to_serve_msk_no.toString();
    
    
    
    var interested_to_serve = $("#interested_to_serve").val();
    var emergency  =$("#emergency").val();
    // var emergency_no    =$("#emergency_no").val();
    var emergency_no=[];
    jQuery.each(jQuery('.emergency_no option:selected'), function() {
    emergency_no.push(jQuery(this).val()); 
    });
    var emergency_no=emergency_no.toString();
    

  var information_provided_by      =$("#information_provided_by").val();
  var enumerator_name      =$("#enumerator_name").val();
  var enumerator_phone      =$("#enumerator_phone").val();
  var compl_status='1';
 var sendInfo = {
    unique_no :unique_no, 
    user_id :user_id,
    willing_to_help_in_mohalla:willing_to_help_in_mohalla,
    willing_to_help_in_mohalla_no:willing_to_help_in_mohalla_no, 
    interested_to_serve:interested_to_serve,
    interest_to_serve_msk:interest_to_serve_msk,
    interest_to_serve_msk_no:interest_to_serve_msk_no,
    emergency:emergency,
    emergency_no:emergency_no,
    information_provided_by:information_provided_by,
    enumerator_name:enumerator_name,
    enumerator_phone:enumerator_phone,
    compl_status:compl_status,
    economic_status: economic_status,

  };
          $.ajax({
          url:FILE_PATH+'/survey7_model.php?action=update',
          type:'POST',
          data: sendInfo,
          timeout:60000,
          success:function(data)
      {   
           
           var unique_no=$("#unique_no").val();
       
        $("#previous_id").val('survey8.php');             
        $('#page_replace_div').load(FILE_PATH+"/survey8.php?unique_no="+unique_no+"&user_id="+user_id+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&completed_status="+completed_status);
       }
});
     
}
  
 $(function () {

    //Initialize Select2 Elements

    $(".select2").select2();

	});	 
</script>