

<div class="tab-frame">
  <input type="radio" checked name="tab" id="tab1" onClick="filter_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')">
  <label for="tab1">Filter</label>
    
  <input type="radio" name="tab" id="tab2" onClick="create_att_list('<?php echo $sess_user_id?>','<?php echo $sess_usertype_id?>')">
  <label for="tab2">Create</label>
  
  <!--<input type="radio" name="tab" id="tab3">
  <label for="tab3">tab3</label>-->
 
  <div class="tab"><a onClick="filter_page('<?php echo $sess_usertype_id?>','<?php echo $sess_user_id?>')"> </a></div>
  <div class="tab"><a onClick="create_att_list('<?php echo $sess_user_id?>','<?php echo $sess_usertype_id?>')"> </a> </div>
  <!--<div class="tab">sample content 3</div>--->
</div>

