

<script>
    	 $(function () {

    //Initialize Select2 Elements

    $(".select2").select2();

	});	 
</script>
	<?php include( "dbConnect.php" );
	?>
	 <form class="login_form bor-over">
          <div class="form-row topbtm">
            <div class="col-9">
              <label for="" class="two_hgt"> Disease / நோயின் விபரம் </label>
              <i class="icon-notebook icons"></i>
              <input type="text" class="form-control check_empt toggle_disease_details_cls" id="toggle_disease_details" >
            </div></div></form>
           
           <form class="login_form bor-over">
          <div class="form-row topbtm smspace">
            <div class="col-9">
              <label for="" class="three_hgt">Monthly Expenditure on Medicine / மாதாந்திர மருத்துவச்  செலவு</label>
              <i class="icon-event icons"></i>
              <input type="text" class="form-control check_empt toggle_mon_exp_on_medicine_cls" id="toggle_mon_exp_on_medicine" value="<?php echo $survey6_records['mon_exp_on_medicine'];?>">
            </div>
            <div class="col-3">
              <label for="" class="three_hgt">S.No / வ.எண் </label>
              <select class="form-control serial_select_bg check_empt toggle_mon_exp_on_medicine_no_cls select2" multiple id="toggle_mon_exp_on_medicine_no" style="width:100%" onchange="hid_val_medicine()">
                  
                  
                  
                <option>Select</option>
                <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' order by id asc");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $explo_mon=explode(',',$mon_exp_on_medicine);
                    foreach($relationship_list as $value){
                    $expl_mon=$explo_mon[$j];
                    ?>
                    <option value='<?php echo $value['id'] ?>'<?php if(in_array($value['id'],$explo_mon)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
              </select>
            </div>
          </div>
        </form>
		    <form class="login_form bor-over">
          <div class="form-row topbtm">
            <div class="col-9">
              <label for="" class="three_hgt">Surgery Details (Hospital Cost, Cash in Hand) / அறுவை சிகிச்சையின் விபரம் </label>
              <i class="icon-notebook icons"></i>
              <input type="text" class="form-control check_empt surgery_detailscls" id="surgery_details" value="<?php echo $survey6_records['surgery_details'];?>">
            </div>
            <div class="col-3">
              <label for="" class="three_hgt">S.No / வ.எண் </label>
              <select class="form-control serial_select_bg check_empt surgery_details_no_cls select2" multiple id="toggle_surgery_details_no" style="width:100%">
                <option>Select</option>
                 <?php 
                    $relationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$_GET['unique_no']."' order by id asc");
                    $relationship->execute();
                    $relationship_list = $relationship->fetchall();
                    $i=1;
                    $j=0;
                    $explode_sn=explode(',',$surgery_details_no);
                    foreach($relationship_list as $value){
                    $explode_sn1=$explode_sn[$j];
                    ?>
                    <option value='<?php echo $value['id'] ?>'<?php if(in_array($value['id'],$explode_sn)) {echo "Selected";}?> > <?php echo $i.'.'.$value['family_head_name']; ?> </option>
                   <?php
                    
                        $i++;
                        $j++;
                    }
                   ?>
              </select>
            </div>
          </div></form></div>
          
          
          
           