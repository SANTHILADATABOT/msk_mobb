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
</style>

<?php
header( 'Access-Control-Allow-Origin: *' );
date_default_timezone_set( 'Asia/Kolkata' );
include( "../dbConnect.php" );
include( "../common_function.php" );
$sess_user_id = $_GET[ 'sess_user_id' ];
$sess_usertype_id = $_GET[ 'sess_usertype_id'];
$crt_month = date( 'Y-m' );
$current_date = date( 'Y-m-d' );
$country_id = $_GET['country_id'];
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];
$city_id = $_GET['city_id'];
$area_id = $_GET['area_id'];
$user_id = $_GET['user_id']; 
$unique_no=$_GET['unique_no']; 
$completed_status=$_GET['completed_status'];
$user_type=$_GET['user_type'];

$survey1 = $pdo_conn->prepare("SELECT * FROM  join_masjith WHERE join_id='".$_GET['join_id']."'");
$survey1->execute();
$survey1_records=$survey1->fetch();
$serve1=$survey1_records['serve_department'];


?>



<style>
  input.form-control {
    padding-left: 40px;
  }
</style>

<input type="hidden" name="join_id" id="join_id" value="<?php echo $_GET['join_id']; ?>">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
 <input type="hidden" name="image_name" id="image_name" value="<?php echo $survey1_records['image']; ?>">

         
<div class="wrapper homepage">
  
  
  
  <div class="container-fluid"  >
	<div class="row over-jobapp-div">
	        <div class="col-8 job-for ">
			<a>Join Form</a> 
			</div> 
			<div class="col-2 add-list ">
	 		</div>
		   	<div class="col-2 add-list">
			<i class="fa fa-arrow-circle-left arrow_back" onClick="join_create_back('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $user_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')" ></i> 
			</div> 
			</div>
	</div>
  
  
 
  <div class="sub_bg animated bounceInLeft">

    <div class="container">
      <div class="row">
        <div class="col-md-12 survey_content">

          <form class="login_form">
          
              <div class="form-group">
                <label for="" class="two_hgt"><span class="notranslate">District/மாவட்டம்</span></label>
                <i class="icon-home icons"></i>
                <input type="text" class="form-control" id="district_name" name="district_name"
                  value="<?php echo $survey1_records['district_name']; ?>">

              </div>

              <div class="form-group">
                <label for="" class="two_hgt"><span class="notranslate">Taluk/தாலுகா</span> </label>
                <i class="icon-home icons"></i>
                <input type="text" class="form-control" id="taluk" name="taluk"
                  value="<?php echo $survey1_records['taluk']; ?>">
              </div>
           


           
             <div class="form-group">
                <label for="" class="two_hgt"><span class="notranslate">City/நகரம்</span>  </label>
                <i class="icon-calendar icons"></i>
                <input class="form-control" type="text" id="city" name="city"
                  value="<?php echo $survey1_records['city']; ?>">
              </div>
              
              <div class="cover-field form-group">
        <h5 class="select-bx">File</h5>
        <div class="row" style="  margin-bottom: 10px;margin-top: 0px;background-color:#f9f9f9;padding: 10px 10px 10px 10px;border-bottom: 1px solid #e6e6e6;" id="pic_div">
            
            <!--image_shown-->
         <div class="col-xs-5" style="padding:0px;">   <img src="<?php echo $image_path?>/common_images/images.jpg" id='picture' name='picture' style="width: 100px; height: 100px;" >
        </div>
        
        
        <div class="col-xs-7" style="padding:0px;margin-top:20px;">
          <div class="col-xs-6"> <img id='but_takes' enctype="multipart/form-data" src="<?php echo $image_path;?>/common_images/photo.png" style="width:45px;height:45px;"/> </div>
          <div class="col-xs-6"> <img id='but_selects' enctype="multipart/form-data" src="<?php echo $image_path;?>/common_images/gallery.png" style="width:45px;height:45px;"/> </div>
        </div>
        
         
         
         <div class="col-xs-5" style=" margin-left:45px; padding:0px;"> 
         
          
         
         <img 
         <?php 
                if($survey1_records['image']!=null){?>
         
         src="<?php echo $image_path?>/join_form/<?php echo $survey1_records['image']; ?>" 
         id='picture' name='picture' style="width: 100px; height: 100px;" >
          <?php }?>
         
        </div>
            

        </div>    
      </div>
      
          <div class="form-group">
                <label for="" class="two_hgt"><span class="notranslate">Name/பெயர்</span> </label>
                <i class="icon-screen-smartphone icons"></i>
                <input type="text" class="form-control" id="name" name="name"
                  value="<?php echo $survey1_records['name']; ?>">
           
            </div>
              <div class="form-group">
                <label for="" class="two_hgt"><span class="notranslate">Father Name/தந்தையின் பெயர்</span> </label>
                <i class="icon-screen-smartphone icons"></i>
                <input type="text" class="form-control" id="father_name" name="father_name"
                  value="<?php echo $survey1_records['father_name']; ?>">
              </div>
             <div class="form-group">
                <label for="" class="two_hgt"><span class="notranslate">Age/வயது
</span> </label>
                <i class="icon-screen-smartphone icons"></i>
                <input type="text" class="form-control" id="age" name="age"
                  value="<?php echo $survey1_records['age']; ?>">
              </div>

             <div class="form-group">
                <label for="" class="two_hgt"><span class="notranslate">Profession/தொழில்</span> </label>
                <i class="icon-screen-smartphone icons"></i>
                <input type="text" class="form-control" id="profession" name="profession"
                  value="<?php echo $survey1_records['profession']; ?>">
              </div>

            
             <div class="form-group">
                <label for="" class="two_hgt"><span class="notranslate">
                   Do you want to pay the amount?(month/year)/தொகையை செலுத்த விரும்புகிறீர்களா? (மாதம் / ஆண்டு)</span> </label>
                <i class="icon-screen-smartphone icons"></i>
                <input type="text" class="form-control" id="pay_amount" name="pay_amount"
                  value="<?php echo $survey1_records['pay_amount']; ?>">
              </div>

           <div class="form-group">
                <label for="" class="two_hgt"><span class="notranslate">Address</span> </label>
                <i class="icon-screen-smartphone icons"></i>
                <input type="text" class="form-control" id="address" name="address"
                  value="<?php echo $survey1_records['address']; ?>">
              </div>
              
              <div class="form-group">
                <label for="" class="two_hgt"><span class="notranslate">Blood Group</span> </label>
                <i class="icon-screen-smartphone icons"></i>
                <input type="text" class="form-control" id="blood_group" name="blood_group"
                  value="<?php echo $survey1_records['blood_group']; ?>">
              </div>
              
              <div class="form-group">
                <label for="" class="two_hgt"><span class="notranslate">Mobile Number(Whatsapp)/தொலைபேசி எண் (வாட்ஸ்அப்)</span> </label>
                <i class="icon-screen-smartphone icons"></i>
                <input type="text" class="form-control" id="mobile_no" name="mobile_no"
                  value="<?php echo $survey1_records['mobile_no']; ?>">
              </div>

            


              <div class="form-group">
                <label for="" class="two_hgt"><span class="notranslate">Email Id</span> </label>
                <i class="icon-screen-smartphone icons"></i>
                <input type="text" class="form-control" id="email" name="email"
                  value="<?php echo $survey1_records['email']; ?>">
              </div>

                            <div class="form-group">
              <div>
                <label for=""><span class="notranslate">The Department you Want to Serve/சேவை செய்ய விரும்பும் துறை</span></label>
              
              </div>
              
              <div class="custom-control-inline custom-checkbox mb-2">
              	
                <input type="checkbox" class="serve" id="serve_department_donate_blood" name="serve_department"
                  value="donate_blood" <?php if (preg_match("/donate_blood/", "$serve1")) { echo "checked";} else {echo "";} ?> >
                <label class="custom-control-label pt-1" for="serve_department_donate_blood"> <span
                    class="notranslate">Donate Blood / இரத்த தானம்</span>  </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
              	
                <input type="checkbox" class="serve" id="serve_department_donate_food" name="serve_department"
                  value="donate_food" <?php if (preg_match("/donate_food/", "$serve1")) { echo "checked";} else {echo "";} ?> >
                <label class="custom-control-label pt-1" for="serve_department_donate_food"> <span
                    class="notranslate">Donate Food / உணவு தானம்</span>  </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
              	
                <input type="checkbox" class="serve" id="serve_department_serve_food" name="serve_department"
                  value="serve_food" <?php if (preg_match("/serve_food/", "$serve1")) { echo "checked";} else {echo "";} ?> >
                <label class="custom-control-label pt-1" for="serve_department_serve_food"> <span
                    class="notranslate">Serve Food / உணவு தானம்</span>  </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
              	
                <input type="checkbox" class="serve" id="serve_department_monthly_food" name="serve_department"
                  value="monthly_food" <?php if (preg_match("/monthly_food/", "$serve1")) { echo "checked";} else {echo "";} ?> >
                <label class="custom-control-label pt-1" for="serve_department_monthly_food"> <span
                    class="notranslate">Monthly Food for families who are unable to work / உழைக்க இயலாத குடும்பங்களுக்கு மாதந்தோறும் உணவு </span>  </label>
              </div></br>

              <div class="custom-control-inline custom-checkbox mb-2">
              	
                <input type="checkbox" class="serve" id="serve_department_magdab_department" name="serve_department"
                  value="magdab_department" <?php if (preg_match("/magdab_department/", "$serve1")) { echo "checked";} else {echo "";} ?> >
                <label class="custom-control-label pt-1" for="serve_department_magdab_department"> <span
                    class="notranslate">Magdab Madrasa Department/மாக்தாப் மதரஸா துறை</span>  </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_educational" name="serve_department"
                 value="educational"<?php if (preg_match("/educational/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_educational"> <span class="notranslate">
                Department of Educational Assistance/கல்வி உதவி பெற்றுத்தரும்  துறை
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_free_tuition" name="serve_department"
                 value="free_tuition"<?php if (preg_match("/free_tuition/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_free_tuition"> <span class="notranslate">
                Free tuition / இலவச கல்வி
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_school_leavers" name="serve_department"
                  value="school_leavers" <?php if (preg_match("/school_leavers/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_school_leavers"> <span class="notranslate">
                     Guidance Department for school leavers/பள்ளிப்படிப்பை இழந்தவர்களுக்கு வழிகாட்டும் துறை
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_grow_trees" name="serve_department"
                  value="grow_trees" <?php if (preg_match("/grow_trees/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_grow_trees"> <span class="notranslate">
                     Grow trees / மரங்களை வளர்க்க
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2 ">
                <input type="checkbox" class="serve" id="serve_department_non_interest" name="serve_department"value="non_interest" <?php if (preg_match("/non_interest/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_non_interest"> <span class="notranslate">
              Non-interest banking sector serve/வட்டியில்லா வங்கி அமைக்கும் துறை
                  </span> </label>
              </div>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_alcohol_addicts" name="serve_department"
                  value="alcohol_addicts"<?php if (preg_match("/alcohol_addicts/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_alcohol_addicts"> <span class="notranslate">
                  Departments that help alcohol addicts recover/மது அடிமைகள் மறு வாழ்வு பெற உதவும் துறைகள்
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_niswan" name="serve_department"value="niswan" <?php if (preg_match("/niswan/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_niswan"> <span class="notranslate">
                   Niswan Department of Women/பெண்கள் நிஸ்வான் துறை
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_sell_products" name="serve_department"value="sell_products" <?php if (preg_match("/sell_products/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_sell_products"> <span class="notranslate">
                   Sell products from cottage industries / குடிசை தொழில் மூலம் உற்பத்தியாகும் பொருட்களின் விற்பனை
                  </span> </label>
              </div></br>

              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_orphans" name="serve_department"
                  value="orphans"  <?php if (preg_match("/orphans/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_orphans"> <span class="notranslate">Department of Unsupported and Orphans/ஆதரிக்கப்படாத மற்றும் அனாதைகளின் துறை
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_medical" name="serve_department"
                  value="medical" <?php if (preg_match("/medical/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_medical"> <span class="notranslate">medical department/மருத்துவ துறை
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_government" name="serve_department"
                  value="government"<?php if (preg_match("/government/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_government"> <span class="notranslate">Department of Government Assistance/அரசாங்க உதவிகள் பெற்று தரும் துறை
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_employment" name="serve_department"
                  value="employment"<?php if (preg_match("/employment/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_employment"> <span class="notranslate">
                    Department of Employment/வேலை வாய்ப்புத் துறை
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2 ">
                <input type="checkbox" class="serve" id="serve_department_marriage" name="serve_department"
                  value="marriage"<?php if (preg_match("/marriage/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_marriage"> <span class="notranslate">Marriage Information Setting Department/திருமண தகவல் அமைக்கும் துறை
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_public_relations" name="serve_department"value="public_relations" <?php if (preg_match("/public_relations/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_public_relations"> <span class="notranslate">
                 Department of Public Relations (notice, banner)/மக்கள் தொடர்பு துறை(நோட்டீஸ்,பேனர்)
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_family" name="serve_department"
                  value="family" <?php if (preg_match("/family/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_family"> <span class="notranslate">Department to guide family problems/குடும்ப பிரச்சினைகளுக்கு வழிகாட்டும் துறை
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_sponsors" name="serve_department"
                  value="sponsors"<?php if (preg_match("/sponsors/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_sponsors"> <span class="notranslate">
                Department of Connecting Sponsors/தனவந்தர்கள் இணைக்கும் துறை
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_public" name="serve_department"value="public" <?php if (preg_match("/public/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_public"> <span class="notranslate">
              Public sector/ பொதுத்துறை
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_sports" name="serve_department"value="sports" <?php if (preg_match("/sports/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_sports"> <span class="notranslate">
              Sports training and exercise / விளையாட்டுப் பயிற்சி மற்றும் உடற்பயிற்சி
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_prayer" name="serve_department"value="prayer" <?php if (preg_match("/prayer/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_prayer"> <span class="notranslate">
             Prayer / பிரார்த்தனை
             </span> </label>
              </div></br>

               <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_business" name="serve_department"
                  value="business"<?php if (preg_match("/business/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_business"> <span class="notranslate">Guiding department to start small business/சிறுதொழில் தொடங்க வழிகாட்டும் துறை
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_information" name="serve_department"value="information" <?php if (preg_match("/information/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_information"> <span class="notranslate">
                Information and Technology Department/தகவல் மற்றும் தொழில் நுட்பத்துறை
                  </span> </label>
              </div></br>
              
                 <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_school_maintenance" name="serve_department"value="school_maintenance" <?php if (preg_match("/school_maintenance/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_school_maintenance"> <span class="notranslate">
              School Maintenance/பள்ளிவாசல் பராமரிப்பு
                  </span> </label>
              </div></br>
              
               <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_quran_pronunciation" name="serve_department"value="quran_pronunciation" <?php if (preg_match("/quran_pronunciation/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_quran_pronunciation"> <span class="notranslate">
              The quran is the field of teaching with proper pronunciation/
குர்ஆன் என்பது சரியான உச்சரிப்புடன் கற்பிக்கும் துறையாகும்
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline custom-checkbox mb-2">
                <input type="checkbox" class="serve" id="serve_department_dua_jama" name="serve_department"value="dua_jama" <?php if (preg_match("/dua_jama/", "$serve1")) { echo "checked";} else {echo "";} ?>>
                <label class="custom-control-label pt-1" for="serve_department_dua_jama"> <span class="notranslate">
              Department of Dua Jama'at/துஆ ஜமாஅத் துறை
                  </span> </label>
              </div></br>
              
              <div class="custom-control-inline mb-2">
                <label for="other_services"> <span class="notranslate">
           Other Services / வேறு சேவைகள் 
                  </span> </label>
                  <textarea class="serve" id="other_services" name="other_services" rows="4" style="border:1px solid black;"><?php echo $survey1_records['other_services']; ?></textarea>
              </div></br>
              
              

              
               
              
              <div class="row no-gutters justify-content-center">
        <div class="col-12">
           <a  onClick="get_join('<?php echo $country_id ?>','<?php echo $state_id ?>','<?php echo $district_id ?>','<?php echo $city_id ?>','<?php echo $area_id ?>','<?php echo $unique_no ?>','<?php echo $completed_status ?>')">
          		<button type="button" class="btn btn-success next_btn" > <?php if($_GET['join_id']=='')  { ?> <span class="notranslate"> Save <?php } else {  ?> Update <?php  } ?></span><i
                class="fa fa-angle-right fa-lg" aria-hidden="true"></i> </button>
          </a>
        </div>
      </div>
              
              
            </div>
       </div> 
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
        


     





<script>

$('#but_takes').click(function(){
  navigator.camera.getPicture(onSuccess, onFail, { quality: 20,
    destinationType: Camera.DestinationType.FILE_URL 
  });
});

$("#but_selects").click(function(){
  navigator.camera.getPicture(onSuccess, onFail, { quality:50,
    sourceType: Camera.PictureSourceType.PHOTOLIBRARY, 
    allowEdit: false,
    destinationType: Camera.DestinationType.FILE_URI
  });
});

function onSuccess(imageURI) 
{    
//   alert(imageURI);
  var image = document.getElementById('picture'); 
    //image.style.display = 'block';
  image.src = imageURI  + '?' + Math.random();
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
  //ft.upload(imageURI,"<?php echo $image_path;?>/matrimonial_information/matrimonial_image.php", function(result)

   ft.upload(imageURI,"<?php echo $image_path;?>/join_form/join_image.php", function(result)
  {
   // alert(result.response);
    var data=result.response;
    window.localStorage.setItem("image_name",data.trim());
  }, 
  function(error)
  {
    alert('error : ' + JSON.stringify(error));
  }, options);  
}

function onFail(message) 
{
    alert('Failed because: ' + message);
}


  function get_join(country_id,state_id,district_id,city_id,area_id,unique_no,completed_status) 
  {
   
var join_id=$("#join_id").val();
  if(join_id!='')
  {
    var action="update";
  }
  else
  {
    var action="add";
  }

    var user_id=$("#user_id").val();
   
    var district_name = $("#district_name").val();
    var taluk = $("#taluk").val();
    var city = $("#city").val();
    var image_name=$("#image_name").val();
    var join_image=window.localStorage.getItem("image_name");
    var  name=$("#name").val();
    var father_name = $("#father_name").val();
    var age = $("#age").val();
    var profession = $("#profession").val();
     var pay_amount = $("#pay_amount").val();
    var address = $("#address").val();
    var blood_group = $("#blood_group").val();
    var mobile_no = $("#mobile_no").val();
    var email = $("#email").val();
    var other_services = $("#other_services").val();
     var insert = [];
     $('.serve').each(function() {
          if ($(this).is(":checked")) {
                  insert.push($(this).val());
                   }
                });
    insert = insert.toString();
    if(name==''){
        alert('Please Enter Name');
        $('#name').focus();
    }else{
    var sendInfo = {
      join_id:join_id,
      action:action,
      user_id:user_id,
      district_name:district_name,
      taluk:taluk,
      city:city,
      image_name:image_name,
      join_image:join_image,
      name:name,
      father_name:father_name,
      age:age,
      profession:profession,
      pay_amount:pay_amount,
      address:address,
      blood_group:blood_group,
      mobile_no:mobile_no,
      email:email,
      other_services:other_services,
      insert:insert,
    country_id:country_id,
    city_id:city_id,
    state_id:state_id,
    district_id:district_id,
    area_id:area_id,


    };
    $.ajax({
          url:FILE_PATH+'/join_form/join_model.php',
          type:'POST',
          data:sendInfo,
          timeout:60000,
      success:function(data)
      {   
        alert(data);
          window.localStorage.removeItem("image_name");
        $("#previous_id").val('join_form/join_list.php');             
	    var user_id = '<?php echo $user_id; ?>';
        var country_id = '<?php echo $country_id; ?>';
        var state_id = '<?php echo $state_id; ?>';
        var district_id = '<?php echo $district_id; ?>';
        var city_id = '<?php echo $city_id; ?>';
        var area_id = '<?php echo $area_id; ?>';
        var user_type = '<?php echo $user_type; ?>';
        var unique_no = '<?php echo $unique_no; ?>';
        var completed_status = '<?php echo $completed_status; ?>';
        $('#page_replace_div').load(FILE_PATH+ '/join_form/join_list.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status+'&user_type='+user_type);
       }
});
}
   }
  $(document).ready(function(){
          window.localStorage.removeItem("image_name");
  });  


function join_create_back(country_id,state_id,district_id,city_id,area_id,user_id,unique_no,completed_status)
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
  $("#previous_id").val('join_form/list.php');
  $('#page_replace_div').load(FILE_PATH + '/join_form/join_list.php?user_id='+user_id+'&country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id+'&unique_no='+unique_no+'&completed_status='+completed_status+'&user_type='+user_type);
}


</script>