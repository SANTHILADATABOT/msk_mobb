<?php
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
 $food_needed_id=$_GET['food_needed_id'];
 $unique_no=$_GET['unique_no'];
 $completed_status=$_GET['completed_status'];
 
$food_needed = $pdo_conn->prepare("SELECT * FROM food_needed WHERE  food_needed_id='".$food_needed_id."'");
$food_needed->execute(); 
$record = $food_needed->fetch();
?>
 

<style>
  input.form-control {padding-left: 40px;}
</style>
<input type="hidden" name="image_name" id="image_name" value="<?php echo $record['image']; ?>">

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->

<div class="wrapper homepage">
<div class="container-fluid" style="padding:0px;">
  <div class="row">
 
  <div class="col-md-8 top_left" style="padding-left:6px; margin-left:20px;">
  <h3><span class="notranslate">Food Needed Form</span></h3> 
  </div>
  <div class="col-md-2 top_left">

  

  </div>
  <div class="col-md-2 top_left" style="padding-left:6px; margin-left:20px;">
  <i class="fa fa-arrow-circle-left arrow_back" onClick="food_needed_create_back('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')"></i>    </div> 
  </div>                                         
   </div>
   

  <div class="sub_bg animated bounceInLeft">

    <div class="container">
      <div class="row">
        <div class="col-md-12 survey_content">
          <form class="login_form">

            <div class="form-group">
              <label for=""><span class="notranslate">Masjidh Service Committee Name</span><span style="color:red;">*</span></label>
              <input type="text" class="form-control" id="organization_name" name="organization_name" value="<?php echo $record['organization_name'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">City</span></label>              
              <input type="text" class="form-control" id="city" name="city" value="<?php echo $record['city'] ?>"> 
            </div> 
            
            <div class="form-group">
              <label for=""><span class="notranslate">S.No</span></label>
              <input type="number" class="form-control" id="s_no" name="s_no" value="<?php echo $record['s_no'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Family No</span></label>               
              <input type="number" class="form-control" id="family_no" name="family_no" value="<?php echo $record['family_no'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Name</span><span style="color:red;">*</span></label>              
              <input type="text"   id="name" name="name" class="form-control" value="<?php echo $record['name'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Age</span><span style="color:red;">*</span></label>
              <input type="number" class="form-control" id="age" name="age"  value="<?php echo $record['age'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Address</span></label>
              <input type="text" class="form-control" id="address" name="address"   value="<?php echo $record['address'] ?>"> 
            </div>

            <div class="form-group">
              <label for=""><span class="notranslate">Mobile No</span><span style="color:red;">*</span></label>
              <input type="number" class="form-control" id="mobile_no" name="mobile_no"   value="<?php echo $record['mobile_no'] ?>"> 
            </div>


            <div class="form-group">
              <label for=""><span class="notranslate">Annual Income</span></label>
              <input type="number" class="form-control" id="annual_income" name="annual_income" value="<?php echo $record['annual_income'] ?>"> 
            </div>
    
     <!--   aleration-->
          
    <div class="cover-field form-group">
        <h5 class="select-bx">File</h5>
        <div class="row" style="  margin-bottom: 10px;margin-top: 0px;background-color:#f9f9f9;padding: 10px 10px 10px 10px;border-bottom: 1px solid #e6e6e6;" id="pic_div">
            <!--image_shown-->
            <div class="col-xs-5" style="padding:0px;">   <img src="<?php echo $image_path?>/common_images/images.jpg" id='picture' name='picture' style="width: 100px; height: 100px;" >
            </div>
            <div class="col-xs-7" style="padding:0px;margin-top:20px;">
                <div class="col-xs-6" style="padding: 0px;"> <img id='but_takes' enctype="multipart/form-data" src="<?php echo $image_path;?>/common_images/photo.png" style="width:45px;height:45px;"/> </div>
                <div class="col-xs-6" style="padding: 0px;"> <img id='but_selects' enctype="multipart/form-data" src="<?php echo $image_path;?>/common_images/gallery.png" style="width:45px;height:45px;"/> </div>
            </div>
            <div class="col-xs-5" style=" margin-left:45px; padding:0px;">
                <?php if($record['image']!=null){ ?>
                <img src="<?php echo $image_path?>/Food_Needed_Image/<?php echo $record['image']; ?>" id='temp_picture1' name='picture' style="width: 100px; height: 100px;" >
                <button type="button" id="remove_img_btn1" class="bg-danger" onclick="remove_img_btn_click()" style="padding:5px;"><i class="fa fa-trash"></i></button>
                <?php } ?>
                <script>
                    var check_existing_image_removed=false;
                    function remove_img_btn_click(){
                        document.getElementById("temp_picture1").src='';
                        document.getElementById("temp_picture1").style.display="none";
                        document.getElementById("remove_img_btn1").style.display="none";
                        window.localStorage.removeItem("image_name");
                        check_existing_image_removed=true;
                    }
                </script>
            </div>
        </div>    
    </div>
       <!--  End  aleration-->
          
  
          
          
          

          <div class="form-group">
            <label for=""><span class="notranslate">Stage</span></label>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="abandoned_by_husband_or_child" name="stage" value="Abandoned by husband or child"   <?php if($record['stage']=='Abandoned by husband or child') {  echo "checked"; } ?>>                     
              <label class="custom-control-label pt-1" for="abandoned_by_husband_or_child"><span   class="notranslate">Abandoned by husband or child</span></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="widow" name="stage" value="widow" <?php if($record['stage']=='widow') {  echo "checked"; } ?>>                 
              <label class="custom-control-label pt-1" for="widow"><span
                  class="notranslate">widow</span></label>
            </div>              
          </div>

          <div class="form-group">
              <label for=""><span class="notranslate">Disabled Person</span></label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="disabled_person_yes" name="disabled_person" value="Yes" <?php if($record['disabled_person']=='Yes') {  echo "checked"; } ?> >               
                <label class="custom-control-label pt-1" for="disabled_person_yes"><span
                    class="notranslate">Yes</span></label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="disabled_person_no" name="disabled_person" value="No" <?php if($record['disabled_person']=='No') {  echo "checked"; } ?>>                
                <label class="custom-control-label pt-1" for="disabled_person_no"><span
                    class="notranslate">No</span></label>
              </div>             
          </div>

            <div class="form-group">
                <label for=""><span class="notranslate">Food does not need to be guided by labour</span></label>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="food_does_not_needed_yes" name="food_does_not_needed" value="Yes" <?php if($record['food_does_not_needed']=='Yes') {  echo "checked"; } ?>>                
                <label class="custom-control-label pt-1" for="food_does_not_needed_yes"><span
                    class="notranslate">Yes</span></label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="food_does_not_needed_no" name="food_does_not_needed" value="No" <?php if($record['food_does_not_needed']=='No') {  echo "checked"; } ?>>                
                <label class="custom-control-label pt-1" for="food_does_not_needed_no"><span
                    class="notranslate">No</span></label>
              </div> 
            </div>

            <div class="form-group">
                <label for=""><span class="notranslate">Known profession</span></label>
                 <input type="text" name="profession" id="profession"  class="form-control" value="<?php echo $record['profession'] ?>">          
            </div>

            <div class="form-group">
                <label for=""><span class="notranslate">The reason for choosing food</span></label>
                <input type="text" name="reason_for_choosing_food" id="reason_for_choosing_food" class="form-control" value="<?php echo $record['reason_for_choosing_food'] ?>">  
            </div>

            <div class="form-group">
                <label for=""><span class="notranslate">Family Status</span></label>
                <textarea id="family_status" name="family_status" class="form-control" style="height: 100px;"><?php echo $record['family_status'] ?></textarea>  
            </div>

            <div class="form-group">
                <label for=""><span class="notranslate">Sponsor Name</span></label>
                <input type="text" name="thanavanthar_name" id="thanavanthar_name" class="form-control" value="<?php echo $record['thanavanthar_name'] ?>"> 
            </div>

            <div class="form-group">
                <label for=""><span class="notranslate">Mobile No</span></label>
                <input type="number" name="mobile_number" id="mobile_number" class="form-control" value="<?php echo $record['mobile_number'] ?>"> 
            </div>

            <div class="form-group">
                <label for=""><span class="notranslate">The amount of giving</span></label>
               <input type="number" name="amount_of_giving" id="amount_of_giving" class="form-control" value="<?php echo $record['amount_of_giving'] ?>" > 
            </div>

            <div class="form-group">
                <label for=""><span class="notranslate">Co-ordinator Name</span></label>
                <input type="text" name="school_name" id="school_name" class="form-control" value="<?php echo $record['school_name'] ?>">
            </div>
            
            <div class="form-group">
                <label for=""><span class="notranslate">Co-ordinator Phone Number</span></label>
                <input type="number" class="form-control" id="coordinator_phone" name="coordinator_phone"  maxlength="10" onkeypress="return IsNumeric(event);"  value="<?php echo $record['coordinator_phone'] ?>">
            </div>

            <div class="form-group">
                <label for=""><span class="notranslate">Masjidh Imam Name</span></label>
                <input type="text" name="school_imam_signature" id="school_imam_signature" class="form-control" value="<?php echo $record['school_imam_signature'] ?>"> 
            </div>
            
            <div class="form-group">
                <label for=""><span class="notranslate">Masjidh Imam Phone Number</span></label>
                <input type="number" class="form-control" id="masjidh_imam_phone" name="masjidh_imam_phone"  maxlength="10" onkeypress="return IsNumeric(event);"  value="<?php echo $record['masjidh_imam_phone'] ?>">
            </div>

            <div class="form-group">
                <label for=""><span class="notranslate">President Name</span></label>
                <input type="text" name="muttavalli_signature" id="muttavalli_signature" class="form-control" value="<?php echo $record['muttavalli_signature'] ?>" >  
            </div>
            
            <div class="form-group">
                <label for=""><span class="notranslate">President Phone Number</span></label>
                <input type="number" class="form-control" id="phone" name="phone"  maxlength="10" onkeypress="return IsNumeric(event);"  value="<?php echo $record['phone'] ?>">
            </div>


            

              <a class="btn btn-success"   onclick="food_details_entry('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>','<?php echo $food_needed_id ?>','<?php echo $unique_no  ?>','<?php echo $completed_status ?>')" >Submit</a> 
          </form>

        </div>
        </div>
      </div>
    </div>
  </div>


  <script>  
 






 
            function food_details_entry(country_id,state_id,district_id,city_id,area_id,user_id,food_needed_id,unique_no,completed_status)
            {
            
            
              if(food_needed_id!='')
              {
                var action='Update';
              }
              else
              {
                var action='ADD';
              }
            
              var organization_name = $("#organization_name").val();
              var city = $("#city").val();
              var s_no = $("#s_no").val();
              var name = $("#name").val();
              var age = $("#age").val();
              var address = $("#address").val();
              var mobile_no = $("#mobile_no").val();
              var annual_income = $("#annual_income").val();
              var family_no = $("#family_no").val();
              if($("#abandoned_by_husband_or_child").is(':checked'))
              {
                var stage=$("#abandoned_by_husband_or_child").val();
              }
              else if($("#widow").is(':checked'))
              {
                var stage=$("#widow").val();
              }
              else
              {
                var stage='';
              }
            
              if($("#disabled_person_yes").is(':checked'))
              {
                var disabled_person=$("#disabled_person_yes").val();
              }
              else if($("#disabled_person_no").is(':checked'))
              {
                var disabled_person=$("#disabled_person_no").val();
              }
              else
              {
                var disabled_person='';
              }
            
              if($("#food_does_not_needed_yes").is(':checked'))
              {
                var food_does_not_needed=$("#food_does_not_needed_yes").val();
              }
              else if($("#food_does_not_needed_no").is(':checked'))
              {
                var food_does_not_needed=$("#food_does_not_needed_no").val();
              }
              else
              {
                var food_does_not_needed='';
              }
            
            
              var profession = $('#profession').val();
              var reason_for_choosing_food = $('#reason_for_choosing_food').val();
              var family_status = $('#family_status').val();
              var thanavanthar_name = $('#thanavanthar_name').val();
              var mobile_number = $("#mobile_number").val();
              var school_name = $('#school_name').val();
              var coordinator_phone = $('#coordinator_phone').val();
              var school_imam_signature = $('#school_imam_signature').val();
              var masjidh_imam_phone = $('#masjidh_imam_phone').val();
              var muttavalli_signature = $("#muttavalli_signature").val();
              var phone = $('#phone').val();
              var amount_of_giving = $("#amount_of_giving").val();
              var image = window.localStorage.getItem("image_name");
              if((image==null) && (!check_existing_image_removed)){
                  image="<?php echo $record['image']; ?>";
              }
            
              var sendInfo = {
                   
                organization_name: organization_name,
                city: city,
                s_no:s_no,
                name: name,
                address: address,
                age: age,
                mobile_no: mobile_no,
                annual_income: annual_income,
                image: image,
                stage: stage,
                disabled_person: disabled_person,
                food_does_not_needed: food_does_not_needed,
                profession: profession,
                reason_for_choosing_food: reason_for_choosing_food,
                family_status: family_status,
                thanavanthar_name: thanavanthar_name,
                mobile_number: mobile_number,
                school_name: school_name,
                coordinator_phone:coordinator_phone,
                school_imam_signature: school_imam_signature,
                masjidh_imam_phone:masjidh_imam_phone,
                muttavalli_signature: muttavalli_signature,
                phone:phone,
                amount_of_giving: amount_of_giving,
                family_no:family_no,
                country_id:country_id,
                city_id:city_id,
                state_id:state_id,
                district_id:district_id,
                area_id:area_id,
                user_id:user_id,
                action:action,
                food_needed_id : food_needed_id,
              }; 
              if(organization_name=='')
              {
                alert("Please enter Masjidh Service Committee Name");
                document.getElementById('organization_name').focus();
              }
              else if(name=='')
              {
                alert("Please enter The Name");
                document.getElementById('name').focus();
              }
              else if(age=='')
              {
                alert("Please enter The Age");
                document.getElementById('age').focus();
              }
              else if(mobile_no=='')
              {
                alert("Please enter The Mobile Number");
                document.getElementById('mobile_no').focus();
              }
              else
              {
                 
                $.ajax({
                  url:FILE_PATH+'/food_details_form/model.php',
                  type:'POST',
                  data: sendInfo,
                    success:function(msg)
                    {	  
                      alert(msg)
                      window.localStorage.removeItem("image_name");
                	    var user_id = '<?php echo $user_id; ?>';
                        var country_id = '<?php echo $country_id; ?>';
                        var state_id = '<?php echo $state_id; ?>';
                        var district_id = '<?php echo $district_id; ?>';
                        var city_id = '<?php echo $city_id; ?>';
                        var area_id = '<?php echo $area_id; ?>';
                        var user_type = '<?php echo $user_type; ?>';
                        var unique_no = '<?php echo $unique_no; ?>';
                        var completed_status = '<?php echo $completed_status; ?>';
                      $("#previous_id").val('food_details_form/list.php');
                      $('#page_replace_div').load(FILE_PATH + '/food_details_form/list.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status+'&user_type='+user_type);
                    } 
                });
              }
            }
  $(document).ready(function(){
          window.localStorage.removeItem("image_name");
  });
  

$('#but_takes').click(function(){    
  navigator.camera.getPicture(onSuccess, onFail, { quality: 20,
  destinationType: Camera.DestinationType.FILE_URL 
});
    
});

// upload select 
$("#but_selects").click(function(){
  navigator.camera.getPicture(onSuccess, onFail, { quality: 50,
  sourceType: Camera.PictureSourceType.PHOTOLIBRARY, 
  allowEdit: false,
  destinationType: Camera.DestinationType.FILE_URI
});
});


                        
                        function onSuccess(imageURI) 
                        {    
                          //alert(imageURI);
                          var path= '<?php echo $image_path;?>';
                          //alert(path);
                          var image = document.getElementById('picture');
                          image.src = '';   
                          var options = new FileUploadOptions();
                          options.fileKey = "file";
                          options.fileName = imageURI.substr(imageURI.lastIndexOf('/') + 1);
                          options.mimeType = "image/jpeg";                
                          var params = {};
                          params.value1 = "test";
                          params.value2 = "param";
                          options.params = params;
                          options.chunkedMode = false;
                          var ft = new FileTransfer();
                         /* alert(ft);*/
                        
                          ft.upload(imageURI,"<?php echo $image_path;?>/Food_Needed_Image/food_need_images.php", function(result)
                          {
                              
                              var data=result.response;
                            /*  alert(data);*/
                              window.localStorage.setItem("image_name",data.trim());
                            var image = document.getElementById('picture');
                            image.src = '<?php echo $image_path?>/Food_Needed_Image/'+data.trim()  + '?' + Math.random();         
                          }, 
                          function(error)
                          {
                            alert('error : ' + JSON.stringify(error));
                          }, options);
                        //  $("#pic_div_galary").html("<img src='<?php echo $image_path?>enquiry_images/'"+data+" id='picture' name='picture' style='width: 100px; height: 100px;' >")
                        }




function onFail(message) 
{
    alert('Failed because: ' + message);
}

function food_needed_create_back(country_id,state_id,district_id,city_id,area_id,user_id,unique_no,completed_status)
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
  $("#previous_id").val('food_details_form/list.php');
  $('#page_replace_div').load(FILE_PATH + '/food_details_form/list.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status+'&user_type='+user_type);
}

</script>